<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiUser;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    // Show the login form
    public function showCheckTokenForm()
    {
        return view('check-api-user');
    }

    // Handle login and issue API token
    public function checkToken(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $apiUser = ApiUser::where('email', $validated['email'])->first();


        if (!$apiUser || !Hash::check($validated['password'], $apiUser->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        // Check for an existing token
        $existingToken = $apiUser->tokens()->first();

        if ($request->checkToken) {
            if ($existingToken) {
                $message = "Je kunt je API token niet opnieuw bekijken, genereer een nieuwe als je je oude niet had opgeslagen. Vraag Thijs om hulp als je tegen problemen aan loopt"; // Return the existing token
                return back()->with('token', $message);
            } else {
                $token = $apiUser->createToken('API Token')->plainTextToken;
                return back()->with([
                    'token' => $token,
                    'token_first' => true
                ]);
            }
        }
        if ($request->generateNewToken) {
            if ($existingToken) {
                $existingToken->delete();
                $token = $apiUser->createToken('API Token')->plainTextToken;
                return back()->with([
                    'token' => $token,
                    'token_first' => true
                ]);
            } else {
                $token = $apiUser->createToken('API Token')->plainTextToken;
                return back()->with([
                    'token' => $token,
                    'token_first' => true
                ]);
            }
        }

    }
}
