<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiUser;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login-api-user');
    }

    // Handle login and issue API token
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $apiUser = ApiUser::where('email', $validated['email'])->first();

        if (! $apiUser || ! Hash::check($validated['password'], $apiUser->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        // Check for an existing token
        $existingToken = $apiUser->tokens()->first();

        if ($existingToken) {
            $token = $existingToken->token; // Return the existing token
        } else {
            $token = $apiUser->createToken('API Token')->plainTextToken;
        }

        return back()->with('token', $token);
    }
}
