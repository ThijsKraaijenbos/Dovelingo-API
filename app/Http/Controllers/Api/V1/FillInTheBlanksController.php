<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FillInTheBlanks;
use App\Models\User;
use App\Models\UserFillInTheBlanks;
use Illuminate\Http\Request;

class FillInTheBlanksController extends Controller
{
    public function getData()
    {
        $blank = FillInTheBlanks::all();
        return response()->json($blank);
    }

    public function getUserFillInTheBlanks(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $fillInTheBlanks = UserFillInTheBlanks::where('user_id', $user->id)
            ->with('fillInTheBlanks')
            ->get();

        if ($fillInTheBlanks->isEmpty()) {
            return response()->json(['error' => 'No data found'], 404);
        } else {
            return response()->json($fillInTheBlanks);
        }
    }

    public function storeUserFillInTheBlanks(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'fill_in_the_blanks_id' => 'required|integer',
            'completed' => 'required|integer',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $completed = $request->completed;
        $fillInTheBlanksdId = $request->fill_in_the_blanks_id;

        if(FillInTheBlanks::where('id', $fillInTheBlanksdId)->exists()) {
            $userWord = UserFillInTheBlanks::create([
                'user_id' => $user->id,
                'fill_in_the_blanks_id' => $fillInTheBlanksdId,
                'completed' => $completed
            ]);

            return response()->json($userWord, status: 201);
        } else {
            return response()->json("this word doesn't exist", status: 404);
        }
    }

    public function updateUserFillInTheBlanks(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'user_fill_in_the_blanks_id' => 'required|integer',
            'completed' => 'required|integer',
        ]);

        $user = User::where('sso_token', $request->query('token'))->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $userFillInTheBlanksId = $request->user_fill_in_the_blanks_id;
        $completed = $request->completed;
        $userFillInTheBlanks = UserFillInTheBlanks::where('id', $userFillInTheBlanksId)->first();

        if(UserFillInTheBlanks::where('id', $userFillInTheBlanksId)->exists()) {
            $userFillInTheBlanks->update([
                'completed' => $completed
            ]);

            return response()->json($userFillInTheBlanks, status: 200);
        } else {
            return response()->json("this user hasnt made this exercise before", status: 404);
        }
    }
}
