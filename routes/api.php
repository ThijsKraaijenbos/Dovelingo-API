<?php

use App\Http\Controllers\Api\V1\ExerciseController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/exercises', [ExerciseController::class, 'index']);
});
