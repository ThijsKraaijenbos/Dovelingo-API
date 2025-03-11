<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FillInTheBlanks;

class FillInTheBlanksController extends Controller
{
    public function getData()
    {
        $blank = FillInTheBlanks::all();
        return response()->json($blank);
    }
}
