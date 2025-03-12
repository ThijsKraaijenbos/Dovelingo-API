<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FillInTheBlanks;

class FillInTheBlanksController extends Controller
{
    public function getData()
    {
        $fillInTheBlanks = FillInTheBlanks::all();

        $fillInTheBlanks->transform(function ($singleFillInTheBlanks) {
            $singleFillInTheBlanks->image_url = env('APP_URL') . '/storage/' . $singleFillInTheBlanks->sign;
            return $singleFillInTheBlanks;
        });

        return response()->json($fillInTheBlanks);
    }
}
