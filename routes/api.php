<?php

use App\Http\Controllers\Api\V1\AlphabetLetterController;
use App\Http\Controllers\Api\V1\BadgeController;
use App\Http\Controllers\Api\V1\ExerciseController;
use App\Http\Controllers\Api\V1\LessonController;
use App\Http\Controllers\Api\V1\SSOAuthController;
use App\Http\Controllers\Api\V1\UserAlphabetLetterController;
use App\Http\Controllers\Api\V1\UserFillInTheBlanksController;
use App\Http\Controllers\Api\V1\UserSentenceBuildingController;
use App\Http\Controllers\Api\V1\UserWordController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Api\V1\FillInTheBlanksController;
use App\Http\Controllers\Api\V1\GifsController;
use App\Http\Controllers\Api\V1\SentenceBuildingController;
use App\Http\Controllers\Api\V1\WordsController;
use App\Models\UserAlphabetLetter;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');



//SSO Auth Route
Route::get('/auth/redirect-back-url/{redirect}/', [SSOAuthController::class, 'login'])->middleware(\App\Http\Middleware\UpdateStreak::class);

//Api Key middleware
Route::middleware('auth:sanctum')->group(function () {

    //V1 API Routes
    Route::prefix('v1')->group(function () {
        Route::get('/exercises', [ExerciseController::class, 'index']);
        Route::post('/update-points', [BadgeController::class, 'updatePoints']);

        Route::get('/user/badges', [BadgeController::class, 'getUserBadges']);
        Route::get('/badges', [BadgeController::class, 'getAllBadges']);
        Route::get('/lessons', [LessonController::class, 'index']);
        Route::get('/words',[WordsController::class, 'getData']);

        Route::get('/sentence-building',[SentenceBuildingController::class, 'getData']);
        Route::get('/fill-in-the-blanks',[FillInTheBlanksController::class, 'getData']);
        Route::get('/gifs',[GifsController::class, 'getData']);
        Route::get('/alphabet-letters', [AlphabetLetterController::class, 'index']);

        Route::get('/user/alphabet-letters', [AlphabetLetterController::class, 'getUserAlphabetLetters']);

        Route::get('/user-alphabet-letters', [UserAlphabetLetterController::class, 'index']);
        Route::post('/user-alphabet-letters', [UserAlphabetLetterController::class, 'store']);
        Route::patch('/user-alphabet-letters', [UserAlphabetLetterController::class, 'update']);

        Route::get('/user-words', [UserWordController::class, 'index']);
        Route::post('/user-words', [UserWordController::class, 'store']);
        Route::patch('/user-words', [UserWordController::class, 'update']);

        Route::get('/user-fill-in-the-blanks', [UserFillInTheBlanksController::class, 'index']);
        Route::post('/user-fill-in-the-blanks', [UserFillInTheBlanksController::class, 'store']);
        Route::patch('/user-fill-in-the-blanks', [UserFillInTheBlanksController::class, 'update']);

        Route::get('/user-sentence-building', [UserSentenceBuildingController::class, 'index']);
        Route::post('/user-sentence-building', [UserSentenceBuildingController::class, 'store']);
        Route::patch('/user-sentence-building', [UserSentenceBuildingController::class, 'update']);

    });
});
