<?php

namespace App\Http\Controllers;

use App\Models\FillInTheBlanks;
use App\Models\SentenceBuilding;
use App\Models\Word;
use Illuminate\Http\Request;

class FillInTheBlanksController extends Controller
{
    public function getData()
    {
        $blank = FillInTheBlanks::all();
        return response()->json($blank);
    }
}
