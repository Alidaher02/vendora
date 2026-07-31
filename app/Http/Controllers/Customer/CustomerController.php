<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Enums\StoreStatus;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
      
        return view('customer.stores' , [
            'stores' => Store::where('status' , StoreStatus::APPROVED)->latest()->paginate(4)
        ]);
    }

    public function storeSearch(Request $request)
    {
        $stores = Store::whereRaw('LOWER(name) LIKE ?', [
            '%' . strtolower($request->search) . '%'
        ])
        ->limit(5)
        ->get();

        return response()->json($stores);
    }

    public function showStore($slug)
    {
        $store = Store::where('slug' , $slug)->firstOrFail();
        $categories = $store->categories()->get();
        $prodcuts = $store->products()->latest()->paginate(8);

        return view('customer.storeShow' , [
            'store' => $store,
            'categories' => $categories,
            'products' => $prodcuts
        ]);
    }

    public function productSearch(Request $request ,Store $store)
    {
        $products = Product::whereRaw('LOWER(name) LIKE ?', [
                '%' . strtolower($request->search) . '%'
            ])
            ->limit(5)
            ->get();

        return response()->json($products);
    }

    public function showProduct(Product $product)
    {


        return view('customer.productShow' , [
            'product' => $product
        ]);
    }
}
