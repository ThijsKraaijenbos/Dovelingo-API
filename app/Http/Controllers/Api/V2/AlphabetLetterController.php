<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use App\Models\User;
use App\Models\UserAlphabetLetter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlphabetLetterController extends Controller
{
    public function getData()
    {
        $alphabetLetters = AlphabetLetter::all();

        $alphabetLetters->transform(function ($letter) {
            $letter->sign = env('APP_URL') . '/storage/' . $letter->sign;
            return $letter;
        });

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

        if($alphabetLetters->isEmpty()) {
            return response()->json(['This user has not made any alphabet letters exercises yet'], 404);
        } else {
            return response()->json($alphabetLetters);
        }
    }

    public function storeUserAlphabetLetter(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
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
            ])->with('alphabetLetter')->get();

            return response()->json($userAlphabetLetter, status: 201);
        } else {
            return response()->json("This alphabet letter doesn't exist", status: 404);
        }

    }

    public function updateUserAlphabetLetter(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'user_alphabet_letter_id' => 'required|integer',
            'completed' => 'required|integer',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $userAlphabetLetterId = $request->user_alphabet_letter_id;
        $completed = $request->completed;
        $userAlphabetLetter = UserAlphabetLetter::where('id', $userAlphabetLetterId)->first();

        if(UserAlphabetLetter::where('id', $userAlphabetLetterId)->exists()) {
            $userAlphabetLetter->update([
                'completed' => $completed
            ]);

            return response()->json($userAlphabetLetter->with('alphabetLetter')->get(), status: 200);
        } else {
            return response()->json("This user hasn't made this exercise before", status: 404);
        }
    }

}
