<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Store;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Reflection;

class CartController extends Controller
{
    public function index()
    {      
        return view('customer.cart' , [
            'cartItems' => Auth::user()->cart->items
        ]);
    }


    public function store(Product $product)
    {
        $cart = Auth::user()->cart;

        if(!$cart)
        {
         $cart =  Auth::user()->cart()->create([
          'customer_id' => Auth::id()
          ]);
        }

        $item = $cart->items()->where('product_id' , $product->id)->first();

        if($item)
        {
            return response()->json([
                'error' => 'Item Already in Cart!'
            ] , 400);
        }
        else
        {
            $cartItems = $cart->items()->create([
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price
        ]);   
        }

        
         return response()->json([
            'message' => 'Item Added to Cart!'
         ]);
    }

    public function loadTotal()
    {
        $cart = Auth::user()->cart;

        $total = $cart->items()->selectRaw('SUM(price*quantity) as total')->value('total');

        return response()->json([
            'total' => $total
        ]);
    }

    public function cartCount()
    {
        $cart = Auth::user()->cart;

        $count = $cart->items()->count();

        return response()->json([
            'count' => $count
        ]);
    }

    public function loadItems()
    {
        $cart = Auth::user()->cart;

        $items = $cart->items()->with('product.store')->get();

        return response()->json([
            'items' => $items
        ]);
    }

    public function increment(CartItem $item)
    {
        $quantity = $item->quantity;
        $product = Product::find($item->product_id);

        if($item->quantity >= $product->stock)
        {
        return response()->json([
            'error' => 'No More Items in Stock!'
        ] , 400);
        }

         $item->update([
            'quantity' => $quantity + 1
        ]);


        return response()->json([
            'quantity' => $item->quantity,
            'message' => 'Item Incremented!'
        ]);
    }

        public function decrement(CartItem $item)
    {
        
        $quantity = $item->quantity;
        
        if($item->quantity <= 1)
        {
        return response()->json([
            'error' => 'item is 0'
        ] , 400);
        }


        $item->update([
                'quantity' => $quantity - 1
            ]);

        return response()->json([
            'quantity' => $item->quantity,
            'message' => 'Item Decremented!'
        ]);
    }

    public function quanCount(CartItem $item)
    {
        return response()->json([
            'count' => $item->quantity
        ]);
    }

    public function destroy(CartItem $item)
    {
        $item->delete();

        return response()->json([
            'message' => 'Item Deleted Successfully!'
        ]);
    }



}
    