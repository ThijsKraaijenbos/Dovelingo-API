<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function getData(Request $request)
    {
        $lesson_id = $request->lesson_id;

        if($lesson_id == null) {
            $words = Word::all();
            return response()->json($words);
        } else {
            $words = Word::where('lesson_id', $lesson_id)->get();
            return response()->json($words);
        }

    }
}
