<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\CategoryController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



Route::middleware('guest')->group(function(){        
Route::get('/register' , [RegisterController::class , 'create'])->name('register');
Route::post('/register' , [RegisterController::class , 'store']);
Route::get('/login' , [SessionsController::class , 'create'])->name('login');
Route::post('/login' , [SessionsController::class , 'store']);
});

Route::delete('/logout' , [SessionsController::class , 'destroy'])->middleware('auth');

Route::middleware(['auth' , 'admin'])->group(function(){

Route::get('/admin' , [AdminController::class , 'index']);

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
Route::delete('/products/deleteProduct/{product}' , [ProductController::class , 'destroy']);
Route::get('/products/count' , [ProductController::class , 'productCount']);




});


Route::middleware(['auth' , 'customer'])->group(function(){
        
Route::get('/stores' , [CustomerController::class , 'index']);
Route::get('/stores/{slug}' , [CustomerController::class , 'showStore']);
Route::get('/stores/search' , [CustomerController::class , 'storeSearch']);

});


