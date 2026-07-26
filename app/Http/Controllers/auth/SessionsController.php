<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Enums\UserRole;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($validated)) {
        return back()->withErrors([
            'email' => 'Invalid Credentials!'
        ]);
    }

    $request->session()->regenerate();

    if (Auth::user()->isVendor()) {
        return redirect('/vendor');
    }

    if (Auth::user()->isAdmin()) {
        return redirect('/admin');
    }

    if (Auth::user()->isCustomer()) {
        return redirect('/stores');
    }

    return redirect('/');
}

    public function destroy()
    {
        Auth::logout();

        return redirect('/login');
    }
}
