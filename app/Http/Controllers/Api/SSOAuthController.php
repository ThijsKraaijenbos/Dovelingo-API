<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SSOAuthController extends Controller
{
    public function login(Request $request, $redirect) {
        $requestData = $request->all();

        //Format redirect back URL
        $formattedUrl = "http://" . $redirect;

        $allowedUser = DB::table('allowed_users')->where('email', $requestData['email'])->exists();
        if (!$allowedUser) {
            return response()->json(['Deze gebruiker heeft geen toegang']);
        }


        $user = User::where('email', $requestData['email'])->first();
        //If user already exists update user token
        if ($user && $user->sso_token !== $requestData['token']) {
            $user->sso_token = $requestData['token'];
            $user->save();

        }

        //If no user exists with this email, create a new user
        if (!$user) {
            //Split name to get the last name for the username
            $displayName = explode(',', $requestData['name']);

            //Create user
            $user = User::create([
                'display_name' => $displayName[0],
                'full_name' => $requestData['name'],
                'email' => $requestData['email'],
                'sso_token' => $requestData['token'],
                'role' => "student",
                'score' => 0,
                'streak' => 0,
            ]);

        }

        return redirect()->to($formattedUrl . '?sso_token=' . urlencode($requestData['token']));
    }
}
