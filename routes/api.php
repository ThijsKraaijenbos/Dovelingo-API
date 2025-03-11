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
        Route::get('/sentence_building',[SentenceBuildingController::class, 'getData']);
        Route::get('/fill_in_the_blanks',[FillInTheBlanksController::class, 'getData']);
        Route::get('/gifs',[GifsController::class, 'getData']);

        Route::get('/user-words', [\App\Http\Controllers\Api\V1\UserWordController::class, 'index']);
        Route::post('/user-words', [\App\Http\Controllers\Api\V1\UserWordController::class, 'store']);
        Route::patch('/user-words', [\App\Http\Controllers\Api\V1\UserWordController::class, 'update']);

        Route::get('/user-fill-in-the-blanks', [\App\Http\Controllers\Api\V1\UserFillInTheBlanksController::class, 'index']);
        Route::post('/user-fill-in-the-blanks', [\App\Http\Controllers\Api\V1\UserFillInTheBlanksController::class, 'store']);
        Route::patch('/user-fill-in-the-blanks', [\App\Http\Controllers\Api\V1\UserFillInTheBlanksController::class, 'update']);


        Route::get('/user-sentence-building', [\App\Http\Controllers\Api\V1\UserSentenceBuildingController::class, 'index']);
        Route::post('/user-sentence-building', [\App\Http\Controllers\Api\V1\UserSentenceBuildingController::class, 'store']);
        Route::patch('/user-sentence-building', [\App\Http\Controllers\Api\V1\UserSentenceBuildingController::class, 'update']);

    });
});

