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

use function Pest\Laravel\json;

class ProductController extends Controller
{
    
   public function index()
   {
        $store = Auth::user()->store;
        $categories = $store->categories()->get();
        $products = $store 
        ? $store->products()->paginate(5)
        : collect();

    return view('vendor.products' ,[
      'store' => $store,
      'products' => $products,
      'categories' => $categories

    ]);
   }

   public function productCount()
   {
     $store = Auth::user()->store;
     $countProducts = $store->products()->count();
     $countCategories = $store->categories()->count();
    
    return response()->json([

        'countProducts' => $countProducts,
        'countCategories' => $countCategories

    ]);
   }





public function storeProduct(Request $request)
    {
    $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:20', 'max:1000'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
    ]);


        if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('images', 'public');
            }
      
        $product = Auth::user()->store->products()->create($validated);
        $product->refresh();

            return response()->json([
                'html' => view('components.product-card', [
                    'product' => $product
                ])->render()
            ]);
    }

    public function update(Request $request ,  Product $product)
    {       
    if ($product->store_id !== Auth::user()->store->id) {
        abort(403);
    }
            $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:20', 'max:1000'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
    ]);
            if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('images', 'public');
            }
      

        $product->update($validated);


        return redirect('/products');
    }




    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'success' => true
        ]);
    }






}


