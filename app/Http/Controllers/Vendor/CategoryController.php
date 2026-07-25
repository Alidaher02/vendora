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


class CategoryController extends Controller
{

    public function categories()
    {
        
       $store = Auth::user()->store;
       $categories =  $store->categories()->latest()->get();
        return response()->json([
            'categories' => $categories
        ]);
    }


    public function storeCategory(Request $request)
    {
    $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'slug' => ['required', 'string', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
    ]);


        if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('images', 'public');
            }
      
        $category = Auth::user()->store->categories()->create($validated);

        return response()->json([
            'message' => 'category was created!',
            'category' => $category
        ]);
    }   


    
        public function destroyCategory(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'category was deleted!'
        ]);
    }

}
