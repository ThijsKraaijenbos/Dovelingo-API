<?php

namespace App\Http\Controllers;

use App\Models\Gif;
use App\Models\SentenceBuilding;
use App\Models\Word;
use Illuminate\Http\Request;

class GifsController extends Controller
{
    public function getData()
    {
        $gifs = Gif::all();
        return response()->json($gifs);
    }
}
