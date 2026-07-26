<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Enums\StoreStatus;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.stores' , [
            'stores' => Store::where('status' , StoreStatus::APPROVED)->latest()->get()
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

        return view('customer.storeShow' , [
            'store' => $store,
            'categories' => $categories
        ]);
    }

}
