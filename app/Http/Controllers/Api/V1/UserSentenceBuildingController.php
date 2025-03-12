<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SentenceBuilding;
use App\Models\User;
use App\Models\UserSentenceBuilding;
use App\Models\UserWord;
use Illuminate\Http\Request;

class UserSentenceBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userSentenceBuilding = UserSentenceBuilding::all();
        return response()->json($userSentenceBuilding);
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
        $sentenceBuildingId = $request->sentence_building_id;
        $user = User::where('sso_token', $request->query('token'))->first();

        if(SentenceBuilding::where('id', $sentenceBuildingId)->exists()) {
            $userSentenceBuilding = UserSentenceBuilding::create([
                'user_id' => $user->id,
                'sentence_building_id' => $sentenceBuildingId,
                'completed' => $completed
            ]);

            return response()->json($userSentenceBuilding, status: 201);
        } else {
            return response()->json("this sentence doesn't exist", status: 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSentenceBuilding $userSentenceBuilding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSentenceBuilding $userSentenceBuilding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $completed = $request->completed;
        $userSentenceBuildingId = $request->user_sentence_building_id;
        $userSentenceBuilding = UserSentenceBuilding::where('id', $userSentenceBuildingId)->first();

        if(UserSentenceBuilding::where('id', $userSentenceBuildingId)->exists()) {
            $userSentenceBuilding->update([
                'completed' => $completed
            ]);

            return response()->json($userSentenceBuilding, status: 200);
        } else {
            return response()->json("this user hasnt made this exercise before", status: 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserSentenceBuilding $userSentenceBuilding)
    {
        //
    }
}
