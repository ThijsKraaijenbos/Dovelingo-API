<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUsers(Request $request)
    {
        $ssoToken = $request->token;
        if ($ssoToken) {
            $user = User::Where('sso_token', $ssoToken)->first();
            return response()->json($user, 200);
        }

        $users = User::all();
        return response()->json($users, 200);
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'display_name' => 'string',
            'role' => 'string'
        ]);

        $ssoToken = $request->token;
        $user = User::Where('sso_token', $ssoToken)->get()->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if ($request->display_name) {
            $user->display_name = $request->display_name;
            $user->save();
        }
        if ($request->role) {
            $user->role = $request->role;
            $user->save();
        }

        return response()->json($user, 200);
    }
}
