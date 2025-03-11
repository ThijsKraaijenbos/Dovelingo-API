<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Gif;

class GifsController extends Controller
{
    public function getData()
    {
        $gifs = Gif::all();
        return response()->json($gifs);
    }
}
