<?php

use App\Http\Controllers\Api\V1\BadgeController;
use App\Http\Controllers\Api\V1\ExerciseController;
use App\Http\Controllers\ApiAuthController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

//Api Key middleware
Route::middleware('auth:sanctum')->group(function () {

    //V1 API Routes
    Route::prefix('v1')->group(function () {
        Route::get('/exercises', [ExerciseController::class, 'index']);
        Route::post('/update-points', [BadgeController::class, 'updatePoints']);
        Route::get('/user/{userId}/badges', [BadgeController::class, 'getUserBadges']);
    });
});
