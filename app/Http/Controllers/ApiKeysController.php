<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApiKeysController extends Controller
{
    /**
     * @return View
     */
    public function index() : View {
        return view('api-key-generator');
    }

    /**
     * @param Request $request
     * @return Factory|\Illuminate\Contracts\View\View|Application|object
     */
    public function generateToken(Request $request) {
        $token = $request->user()->createToken($request->token_name);

        return view('api-key-generator')->with(['token' => $token->plainTextToken]);
    }
}
