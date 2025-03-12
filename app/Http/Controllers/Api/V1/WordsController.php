<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAlphabetLetter;
use App\Models\UserWord;
use App\Models\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function getData(Request $request)
    {
        $lesson_id = $request->lesson_id;

        if($lesson_id == null) {
            $words = Word::all();
            return response()->json($words);
        } else {
            $words = Word::where('lesson_id', $lesson_id)->get();
            return response()->json($words);
        }
    }

    public function getUserWords(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $words = UserWord::where('user_id', $user->id)
            ->with('word')
            ->get();

        if($words->isEmpty()) {
            return response()->json(['This user has not made any word exercises yet'], 404);
        } else {
            return response()->json($words);
        }
    }

    public function storeUserWords(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'word_id' => 'required|integer',
            'completed' => 'required|integer',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $completed = $request->completed;
        $wordId = $request->word_id;

        if(Word::where('id', $wordId)->exists()) {
            $userWord = UserWord::create([
                'user_id' => $user->id,
                'word_id' => $wordId,
                'completed' => $completed
            ])->with('word')
                ->get();;

            return response()->json($userWord, status: 201);
        } else {
            return response()->json("This word doesn't exist", status: 404);
        }

    }

    public function updateUserWords(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'user_word_id' => 'required|integer',
            'completed' => 'required|integer',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $userWordId = $request->user_word_id;
        $completed = $request->completed;
        $userWord = UserWord::where('id', $userWordId)->first();

        if(UserWord::where('id', $userWordId)->exists()) {
            $userWord->update([
                'completed' => $completed
            ]);

            return response()->json($userWord->with('word')->get(), status: 200);
        } else {
            return response()->json("This user hasn't made this exercise before", status: 404);
        }
    }

}
