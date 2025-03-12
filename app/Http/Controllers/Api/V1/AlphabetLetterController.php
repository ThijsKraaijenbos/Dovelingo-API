<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use App\Models\User;
use App\Models\UserAlphabetLetter;
use Illuminate\Http\Request;

class AlphabetLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alphabetLetters = AlphabetLetter::all();
        return response()->json($alphabetLetters);
    }

    public function getUserAlphabetLetters(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $alphabetLetters = UserAlphabetLetter::where('user_id', $user->id)
            ->with('alphabetLetter')
            ->get();

        return response()->json($alphabetLetters);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlphabetLetter $alphabetLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlphabetLetter $alphabetLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlphabetLetter $alphabetLetter)
    {
        //
    }
}
