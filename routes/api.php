<?php

use App\Http\Controllers\Api\V1\ExerciseController;
use App\Http\Controllers\Api\V1\SSOAuthController;
use App\Http\Controllers\ApiAuthController;
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
    });
});
