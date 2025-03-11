<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SentenceBuilding;

class SentenceBuildingController extends Controller
{
    public function getData()
    {
        $sentence = SentenceBuilding::all();
        return response()->json($sentence);
    }
}
