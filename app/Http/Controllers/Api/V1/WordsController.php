<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Word;

class WordsController extends Controller
{
    public function getData()
    {
        $words = Word::all();
        return response()->json($words);
    }
}
