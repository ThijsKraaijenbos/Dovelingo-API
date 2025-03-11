<?php

use App\Http\Controllers\Api\V1\ExerciseController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\FillInTheBlanksController;
use App\Http\Controllers\GifsController;
use App\Http\Controllers\SentenceBuildingController;
use App\Http\Controllers\WordsController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

//Api Key middleware
Route::middleware('auth:sanctum')->group(function () {

    //V1 API Routes
    Route::prefix('v1')->group(function () {
        Route::get('/exercises', [ExerciseController::class, 'index']);
        Route::get('/words',[WordsController::class, 'getData']);
        Route::get('/user-words', [\App\Http\Controllers\Api\V1\UserWordController::class, 'index']);
        Route::get('/sentence_building',[SentenceBuildingController::class, 'getData']);
        Route::get('/fill_in_the_blanks',[FillInTheBlanksController::class, 'getData']);
        Route::get('/gifs',[GifsController::class, 'getData']);
    });
});

