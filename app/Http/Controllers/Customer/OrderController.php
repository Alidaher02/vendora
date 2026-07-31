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

    public function order()
    {
        $cart = Auth::user()->cart;
        $items = $cart->items;

        if($cart->items->isEmpty())
        {
            return response()->json([
                'error' => 'Cart is Empty!'
            ] , 400);
        }

        $order = Auth::user()->orders()->create([
            'total_price' => Auth::user()->cart->items()
                                         ->selectRaw('SUM(price*quantity) as total')
                                         ->value('total'),
            'status' => OrderStatus::PENDING 
        ]);

        foreach ($items as $item) {

            $orderItems = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'store_id' => $item->product->store_id,
            'price' => $item->price,
            'quantity' => $item->quantity

        ]);
        }


        $cart->items()->delete();

        return response()->json([
            'message' => 'Order Placed!'
        ]);
        

    }
}

