<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Enums\UserRole;



class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $stores = Store::all();
        $orders = Order::with('customer.store')->get();
        $products = Product::all();
        $recentOrders = Order::orderByDesc('created_at')->take(5)->get();
        $pendingStores = Store::where('status' , 'pending')->get();
        $pendingOrders = Order::where('status' , 'pending')->get();

        return view('admin.admin' , [
            'users' => $users->count(),
            'stores' => $stores->count(),
            'orders' => $orders->count(),
            'products' => $products->count(),
            'recentOrders' => $recentOrders,
            'pendingStores' => $pendingStores->count(),
            'pendingOrders' => $pendingOrders->count()
        ]);
    }

    public function storeRequests(Store $store)
    {
        $pendingStores = Store::where('status' , 'pending')->get();

        return view('admin.storeRequests' , [
            'pendingStores' => $pendingStores
        ]);
    }

    public function approveStore(Store $store)
    {

        if($store->status->value === 'pending')
        {
            $store->status = 'approved';
            $store->save();

            return redirect('/admin/stores')->with('success' , 'Store Approved Successfully!');
        }
    }

        public function rejectStore(Store $store)
    {
        if($store->status->value === 'pending')
        {
            $store->status = 'rejected';
            $store->save();

            return redirect('/admin/stores')->with('success' , 'Store Rejected Successfully!');
        }
    }

        public function stores(Store $store)
    {
        $stores = Store::all();

        return view('admin.stores' , [
            'stores' => $stores
        ]);
    }

        public function products(Store $store)
    {
        $products = $products = Product::orderByDesc('price')->paginate(5);

        return view('admin.products' , [
            'products' => $products
        ]);
    }

            public function orders()
    {
        $orders = Order::with('customer.store')->paginate(10);

        return view('admin.orders' , [
            'orders' => $orders
        ]);
    }

    public function vendors()
    {
    $vendors = User::where('role', 'vendor')->get();

        return view('admin.vendors' , [
            'vendors' => $vendors
        ]);
    }

    public function customers()
{
    $customers = User::where('role', 'customer')->get();

    return view('admin.customers', [
        'customers' => $customers
    ]);
}

    public function settings()
    {
        return view('admin.settings');
    }

    public function updateProfile(Request $request)
    {


        $user = Auth::user();

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
            ]);

        if($user->name === $validated['name'] && $user->email === $validated['email'])
        {
            return redirect()->back()->with('info', 'No changes were made to the profile.');
        }

        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


}
