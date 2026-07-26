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
    public function index()
    {
        return view('vendor.categories');
    }

    public function show($slug)
    {
        $category = Auth::user()
        ->store
        ->categories()
        ->where('slug' , $slug)
        ->firstOrFail();

        $products = Product::where('category_id' , $category->id)->latest()->get();

        return view('vendor.showCategory' , [
            'category' => $category,
            'products' => $products
        ]);
    }

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
    if ($category->products()->exists()) {
        return response()->json([
            'message' => 'Cannot delete category because it has products.'
        ], 400);
    }

    $category->delete();

    return response()->json([
        'message' => 'Category deleted successfully.'
    ]);
}

}
