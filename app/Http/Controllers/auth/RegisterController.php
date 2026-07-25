<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => ['required' , 'string' , 'max:255'],
        'email' => ['required' , 'string' , 'email' , 'max:255' , 'unique:users'],
        'password' => ['required' , 'string' , Password::default()],
        'role' => ['required']
        ]);

        $user = User::create($validated);

        return redirect('/login')->with('success' , 'Your Successfully Registered!');
    }
}
