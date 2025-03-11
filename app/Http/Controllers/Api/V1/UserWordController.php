<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\UserWord;
use App\Models\Word;
use Illuminate\Http\Request;

class UserWordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userWords = UserWord::all();
        return response()->json($userWords);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $completed = $request->completed;
        $wordId = $request->word_id;

        if(Word::where('id', $wordId)->exists()) {
            $userWord = UserWord::create([
                'user_id' => 1,
                'word_id' => $wordId,
                'completed' => $completed
            ]);
        } else {
            return response()->json("this word doesn't exist");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserWord $userWord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserWord $userWord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserWord $userWord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserWord $userWord)
    {
        //
    }
}
