<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use Illuminate\Http\Request;

class AlphabetLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alphabetLetters = AlphabetLetter::all();
        return response()->json($alphabetLetters);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AlphabetLetter $alphabetLetter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlphabetLetter $alphabetLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlphabetLetter $alphabetLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlphabetLetter $alphabetLetter)
    {
        //
    }
}
