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
        $fillInTheBlanks = FillInTheBlanks::all();

        $fillInTheBlanks->transform(function ($singleFillInTheBlanks) {
            $singleFillInTheBlanks->image_url = env('APP_URL') . '/storage/' . $singleFillInTheBlanks->sign;
            return $singleFillInTheBlanks;
        });

        return response()->json($fillInTheBlanks);
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
            return response()->json(['This user has not made any fill in the blanks exercises yet'], 404);
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
            ])->with('fillInTheBlanks')
                ->get();

            return response()->json($userWord, status: 201);
        } else {
            return response()->json("This fill in the blanks exercise doesn't exist", status: 404);
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

            return response()->json($userFillInTheBlanks->with('fillInTheBlanks')->get(), status: 200);
        } else {
            return response()->json("This user hasn't made this exercise before", status: 404);
        }
    }
}
