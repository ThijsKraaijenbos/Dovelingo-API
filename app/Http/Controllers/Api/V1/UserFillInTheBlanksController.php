<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FillInTheBlanks;
use App\Models\User;
use App\Models\UserFillInTheBlanks;
use App\Models\UserSentenceBuilding;
use App\Models\UserWord;
use Illuminate\Http\Request;

class UserFillInTheBlanksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userFillInTheBlanks = UserFillInTheBlanks::all();
        return response()->json($userFillInTheBlanks);
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
        $fillInTheBlanksId = $request->fill_in_the_blanks_id;
        $user = User::where('sso_token', $request->query('token'))->first();

        if(FillInTheBlanks::where('id', $fillInTheBlanksId)->exists()) {
            $userFillInTheBlanks = UserFillInTheBlanks::create([
                'user_id' => $user->id,
                'fill_in_the_blanks_id' => $fillInTheBlanksId,
                'completed' => $completed
            ]);

            return response()->json($userFillInTheBlanks, status: 201);
        } else {
            return response()->json("this sentence doesn't exist", status: 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFillInTheBlanks $userFillInTheBlanks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserFillInTheBlanks $userFillInTheBlanks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $completed = $request->completed;
        $userFillInTheBlanksId = $request->user_sentence_building_id;
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFillInTheBlanks $userFillInTheBlanks)
    {
        //
    }
}
