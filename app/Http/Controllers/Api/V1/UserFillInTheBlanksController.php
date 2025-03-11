<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FillInTheBlanks;
use App\Models\UserFillInTheBlanks;
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

        if(FillInTheBlanks::where('id', $fillInTheBlanksId)->exists()) {
            $userFillInTheBlanks = UserFillInTheBlanks::create([
                'user_id' => 1,
//            'user_id' => auth()->user()->id,
                'fill_in_the_blanks_id' => $fillInTheBlanksId,
                'completed' => $completed
            ]);
        } else {
            return response()->json("this sentence doesn't exist");
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
    public function update(Request $request, UserFillInTheBlanks $userFillInTheBlanks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFillInTheBlanks $userFillInTheBlanks)
    {
        //
    }
}
