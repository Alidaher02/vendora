<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Store;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Reflection;
use App\Enums\OrderStatus;
use App\Notifications\OrderPlaced;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Policies\OrderPolicy;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Payment;


class OrderController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart;

        if(!$cart || $cart->items()->count() === 0)
        {
            return redirect('/store/cart')
            ->with('error', 'Your cart is empty.');
        }

        return view('customer.checkout');
    }

    
 public function order(Request $request)
{
    $cart = Auth::user()->cart;
    $items = $cart->items;

    if ($items->isEmpty()) {
        return response()->json([
            'error' => 'Cart is Empty!'
        ], 400);
    }

    return DB::transaction(function () use ($request, $items) {

        $request->validate([
            'recipient_name' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'notes' => 'nullable',
        ]);

        $order = Auth::user()->orders()->create([
            'total_price' => Auth::user()->cart->items()
                ->selectRaw('SUM(price*quantity) as total')
                ->value('total'),

            'status' => OrderStatus::PENDING,
            'recipient_name' => $request->recipient_name,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'notes' => $request->notes
        ]);


        foreach ($items as $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'store_id' => $item->product->store_id,
                'price' => $item->price,
                'quantity' => $item->quantity,
            ]);

        }


        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $order->total_price * 100,
            'currency' => 'usd',
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);


        Payment::create([
            'order_id' => $order->id,
            'payment_method' => 'stripe',
            'stripe_payment_id' => $paymentIntent->id,
            'amount' => $order->total_price,
            'status' => 'pending',
        ]);

        $cart = Auth::user()->cart;
        if($cart)
        {
            $cart->items()->delete();
        }

        return response()->json([
            'message' => 'Order Created!',
            'clientSecret' => $paymentIntent->client_secret
        ]);

    });
}

    public function loadOrders()
    {
        $orders = Auth::user()->orders()->with('orderItems.product')->get();
        return view('customer.orders' , compact('orders'));
    }

    public function orderCount()
    {
        $orderCount = Auth::user()->orders()->count();

        return response()->json([
            'orderCount' => $orderCount
        ]);
    }

    public function destroy(Order $order)
    {
   
        Gate::authorize('updateOrDelete', $order);

        if($order->status !== 'pending' && $order->status !== 'cancelled') {
            return Redirect::back()->with('error', 'You can only delete pending orders.');
        }

        $order->delete();

        return Redirect::back()->with('success', 'Order deleted successfully.');
    }
}

