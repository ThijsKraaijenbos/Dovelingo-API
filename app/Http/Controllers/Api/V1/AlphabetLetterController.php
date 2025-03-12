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
    public function storeUserAlphabetLetter(Request $request)
    {
        $request->validate([
            'alphabet_letter_id' => 'required|integer',
            'completed' => 'required|integer'
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $completed = $request->completed;
        $alphabetLetterId = $request->alphabet_letter_id;

        if(AlphabetLetter::where('id', $alphabetLetterId)->exists()) {
            $userAlphabetLetter = UserAlphabetLetter::create([
                'user_id' => $user->id,
                'alphabet_letter_id' => $alphabetLetterId,
                'completed' => $completed
            ]);
//            return response()->json(['it exists']);
            return response()->json($userAlphabetLetter, status: 201);
        } else {
            return response()->json("this word doesn't exist", status: 404);
        }
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
