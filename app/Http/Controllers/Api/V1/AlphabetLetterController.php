<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use App\Models\User;
use App\Models\UserAlphabetLetter;
use Illuminate\Http\Request;

class AlphabetLetterController extends Controller
{
    public function getData()
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
//            return response()->json(['it exists']);
            return response()->json($userAlphabetLetter, status: 201);
        } else {
            return response()->json("This alphabet letter doesn't exist", status: 404);
        }
    }

}
