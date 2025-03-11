<?php

use App\Http\Controllers\Api\V1\ExerciseController;
use App\Http\Controllers\Api\V1\SSOAuthController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Api\V1\FillInTheBlanksController;
use App\Http\Controllers\Api\V1\GifsController;
use App\Http\Controllers\Api\V1\SentenceBuildingController;
use App\Http\Controllers\Api\V1\WordsController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');



//SSO Auth Route
Route::get('/auth/redirect-back-url/{redirect}/', [SSOAuthController::class, 'login']);

//Api Key middleware
Route::middleware('auth:sanctum')->group(function () {

    //V1 API Routes
    Route::prefix('v1')->group(function () {
        Route::get('/exercises', [ExerciseController::class, 'index']);
        Route::get('/words',[WordsController::class, 'getData']);
        Route::get('/sentence-building',[SentenceBuildingController::class, 'getData']);
        Route::get('/fill-in-the-blanks',[FillInTheBlanksController::class, 'getData']);
        Route::get('/gifs',[GifsController::class, 'getData']);
    });
});
