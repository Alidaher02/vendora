<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\CategoryController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use App\Http\Controllers\StripeWebhookController;
use App\Models\User;


Route::redirect('/' , '/login');


Route::middleware('guest')->group(function(){        
Route::get('/register' , [RegisterController::class , 'create'])->name('register');
Route::post('/register' , [RegisterController::class , 'store']);
Route::get('/login' , [SessionsController::class , 'create'])->name('login');
Route::post('/login' , [SessionsController::class , 'store']);
});

Route::delete('/logout' , [SessionsController::class , 'destroy'])->middleware('auth');

Route::middleware(['auth' , 'admin'])->group(function(){

Route::get('/admin' , [AdminController::class , 'index']);
Route::get('/admin/stores' , [AdminController::class , 'storeRequests']);
Route::patch('/stores/{store}/approve' , [AdminController::class , 'approveStore']);
Route::patch('/stores/{store}/reject' , [AdminController::class , 'rejectStore']);
Route::get('/admin/store' , [AdminController::class , 'stores']);
Route::get('/admin/products' , [AdminController::class , 'products']);
Route::get('/admin/orders' , [AdminController::class , 'orders']);

Route::get('/admin/vendors' , [AdminController::class , 'vendors']);
Route::get('/admin/customers' , [AdminController::class , 'customers']);
Route::get('/admin/settings' , [AdminController::class , 'settings']);

Route::patch('/profile/update' , [AdminController::class , 'updateProfile']);


});


Route::middleware(['auth' , 'vendor'])->group(function(){
        
Route::get('/vendor' , [VendorController::class , 'index']);
Route::post('/vendor' , [VendorController::class , 'store']);
Route::patch('/vendor' , [VendorController::class , 'update']);
Route::get('/products' , [ProductController::class , 'index']);



Route::post('/categories/addCategory' , [CategoryController::class , 'storeCategory']);
Route::delete('/categories/deleteCategory/{category}' , [CategoryController::class , 'destroyCategory']);
Route::get('/categories/loadCategories' , [CategoryController::class , 'categories']);

Route::get('/categories' , [CategoryController::class , 'index']);
Route::get('/categories/{slug}' , [CategoryController::class , 'show']);



Route::post('/products/addProduct' , [ProductController::class , 'storeProduct']);
Route::patch('/products/edit/{product}' , [ProductController::class , 'update']);
Route::delete('/products/deleteProduct/{product}' , [ProductController::class , 'destroy']);
Route::get('/products/count' , [ProductController::class , 'productCount']);







});


Route::middleware(['auth' , 'customer'])->group(function(){
        
Route::get('/stores' , [CustomerController::class , 'index']);
Route::get('/stores/search' , [CustomerController::class , 'storeSearch']);
Route::get('/stores/{slug}' , [CustomerController::class , 'showStore']);

Route::get('/stores/{slug}/products' , [CustomerController::class , 'loadProducts']);
Route::get('/store/{slug}/products' , [CustomerController::class , 'filterProducts']);
Route::get('/store/{slug}/products/categories' , [CustomerController::class, 'filterByCategories']);


Route::get('/products/search' , [CustomerController::class , 'productSearch']);
Route::get('/products/{product}' , [CustomerController::class , 'showProduct']);

Route::get('/store/cart' , [CartController::class , 'index']);
Route::post('/store/cart/{product}' , [CartController::class , 'store']);

Route::get('/store/cart/total' , [CartController::class , 'loadTotal']);
Route::get('/cart/count' , [CartController::class , 'cartCount']);

Route::get('/cart/items' , [CartController::class , 'loadItems']);

Route::patch('/cart/items/{item}/inc' , [CartController::class , 'increment']);
Route::patch('/cart/items/{item}/dec' , [CartController::class , 'decrement']);

Route::get('/store/cart/quantity/{item}' , [CartController::class , 'quanCount']);

Route::delete('/cart/items/{item}' , [CartController::class , 'destroy']);


Route::get('/checkout' , [OrderController::class , 'index']);
Route::post('/checkout' , [OrderController::class , 'order']);

Route::get('/orders' , [Ordercontroller::class , 'loadOrders']);
Route::delete('/orders/{order}' , [OrderController::class , 'destroy']);

Route::get('/orders/count' , [OrderController::class , 'orderCount']);

});


Route::post('/api/stripe/webhook', [StripeWebhookController::class, 'handle']);