<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiUser;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('register-api-user');
    }

    // Handle form submission
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:api_users',
            'password' => 'required|min:6',
        ]);

        ApiUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/register-api-user')->with('success', 'API User created successfully');
    }
}
