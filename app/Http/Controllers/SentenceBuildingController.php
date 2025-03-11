<?php

namespace App\Http\Controllers;

use App\Models\SentenceBuilding;
use App\Models\Word;
use Illuminate\Http\Request;

class SentenceBuildingController extends Controller
{
    public function getData()
    {
        $sentence = SentenceBuilding::all();
        return response()->json($sentence);
    }
}
