<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SentenceBuilding;
use App\Models\User;
use App\Models\UserSentenceBuilding;
use Illuminate\Http\Request;

class SentenceBuildingController extends Controller
{
    public function getData()
    {
        $sentence = SentenceBuilding::all();
        return response()->json($sentence);
    }

    public function getUserSentenceBuilding(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $sentenceBuilding = UserSentenceBuilding::where('user_id', $user->id)
            ->with('sentenceBuilding')
            ->get();

        if($sentenceBuilding->isEmpty()) {
            return response()->json(['This user has not made any sentence building exercises yet'], 404);
        } else {
            return response()->json($sentenceBuilding);
        }
    }

    public function storeUserSentenceBuilding(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'sentence_building_id' => 'required|integer',
            'completed' => 'required|integer',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $completed = $request->completed;
        $sentenceBuildingId = $request->sentence_building_id;

        if(SentenceBuilding::where('id', $sentenceBuildingId)->exists()) {
            $userSentenceBuilding = UserSentenceBuilding::create([
                'user_id' => $user->id,
                'sentence_building_id' => $sentenceBuildingId,
                'completed' => $completed
            ])->with('sentenceBuilding')
                ->get();

            return response()->json($userSentenceBuilding, status: 201);
        } else {
            return response()->json("This sentence building exercise doesn't exist", status: 404);
        }
    }

    public function updateUserSentenceBuilding(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'user_sentence_building_id' => 'required|integer',
            'completed' => 'required|integer',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $userSentenceBuildingId = $request->user_sentence_building_id;
        $completed = $request->completed;
        $userSentenceBuilding = UserSentenceBuilding::where('id', $userSentenceBuildingId)->first();

        if(UserSentenceBuilding::where('id', $userSentenceBuildingId)->exists()) {
            $userSentenceBuilding->update([
                'completed' => $completed
            ]);

            return response()->json($userSentenceBuilding->with('sentenceBuilding')->get(), status: 200);
        } else {
            return response()->json("This user hasn't made this exercise before", status: 404);
        }
    }
}
