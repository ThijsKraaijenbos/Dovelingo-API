<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Gif;

class GifsController extends Controller
{
    public function getData()
    {
        $gifs = Gif::all();

        $gifs->transform(function ($gif) {
            $gif->gif_path = env('APP_URL') . '/storage/' . $gif->gif_path;
            return $gif;
        });

        return response()->json($gifs);
    }
}
