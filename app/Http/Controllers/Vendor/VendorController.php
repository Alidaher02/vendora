<?php

namespace App\Http\Controllers\Vendor;

use App\Enums\StoreStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Store $store)
    {
    

        $store = Auth::user()->store;
        $categories = $store?->categories()->latest()->get();

        
    $products = $store 
        ? $store->products()->latest()->get()
        : collect();

        return view('vendor.vendor' , [
            'store' => $store,
            'categories' => $categories,
            'products' => $products
        ]);

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:stores,name'],
            'slug' => ['required', 'string', 'min:3', 'max:100', 'alpha_dash', 'unique:stores,slug'],
            'description' => ['required', 'string', 'min:20', 'max:1000'],
            'address' => ['required', 'string', 'min:5', 'max:255'],
            'phone' => ['required', 'string', 'min:8', 'max:20'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        
        if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('images', 'public');
            }


       Auth::user()->store()->create($validated);

       return redirect('/vendor')->with('success' , 'Store Creates Successfully!');
    }


        public function update(Request $request)
    {   

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:stores,name'],
            'slug' => ['required', 'string', 'min:3', 'max:100', 'alpha_dash'],
            'description' => ['required', 'string', 'min:20', 'max:1000'],
            'address' => ['required', 'string', 'min:5', 'max:255'],
            'phone' => ['required', 'string', 'min:8', 'max:20'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
           
        ]);

            $store = Auth::user()->store;

            if ($store->status == StoreStatus::REJECTED)
            {
               
            Auth::user()->store()->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'address' => $request->address,
                'phone' => $request->phone,
                'status' => StoreStatus::PENDING,
            ]);

            }
            else
            {

            Auth::user()->store()->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'address' => $request->address,
                'phone' => $request->phone,
                'status' => $store->status,
            ]);

            }


       return redirect('/vendor')->with('success' , 'Store Creates Successfully!');
    }



}
