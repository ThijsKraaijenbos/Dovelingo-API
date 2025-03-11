<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function getData()
    {
        $words = Word::all();
        return response()->json($words);
    }
}
