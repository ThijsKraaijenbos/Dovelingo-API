<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use App\Models\User;
use App\Models\UserAlphabetLetter;
use Illuminate\Http\Request;

class UserAlphabetLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAlphabetLetters = UserAlphabetLetter::all();
        return response()->json($userAlphabetLetters);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $completed = $request->completed;
        $alphabetLetterId = $request->alphabet_letter_id;
        $user = User::where('sso_token', $request->query('token'))->first();

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
     * Display the specified resource.
     */
    public function show(UserAlphabetLetter $userAlphabetLetter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAlphabetLetter $userAlphabetLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $completed = $request->completed;
        $userAlphabetLetterId = $request->user_alphabet_letter_id;
        $userAlphabetLetter = UserAlphabetLetter::where('id', $userAlphabetLetterId)->first();

        if(UserAlphabetLetter::where('id', $userAlphabetLetterId)->exists()) {
            $userAlphabetLetter->update([
                'completed' => $completed
            ]);

            return response()->json($userAlphabetLetter, status: 200);
        } else {
            return response()->json("this user hasnt made this exercise before", status: 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAlphabetLetter $userAlphabetLetter)
    {
        //
    }
}
