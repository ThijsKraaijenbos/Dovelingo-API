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

            $words->transform(function ($word) {
                $word->gif_path = env('APP_URL') . '/storage/' . $word->gif_path;
                return $word;
            });

            return response()->json($words);

        } else {
            $word = Word::where('lesson_id', $lesson_id)->get();
            $word->transform(function ($word) {
                $word->gif_path = env('APP_URL') . '/storage/' . $word->gif_path;
                return $word;
            });

            return response()->json($word);
        }

    }
}
