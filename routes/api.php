<?php
use App\Http\Controllers\Api\V1\{
    AllowedUsersController as V1AllowedUsersController,
    AlphabetLetterController as V1AlphabetLetterController,
    BadgeController as V1BadgeController,
    LessonController as V1LessonController,
    FillInTheBlanksController as V1FillInTheBlanksController,
    GifsController as V1GifsController,
    UserController as V1UserController,
    SentenceBuildingController as V1SentenceBuildingController,
    WordsController as V1WordsController
};

use App\Http\Controllers\Api\SSOAuthController;
use App\Http\Middleware\UpdateStreak;
use Illuminate\Support\Facades\Route;


//SSO Auth Route
Route::get('/auth/redirect-back-url/{redirect}/', [SSOAuthController::class, 'login'])->middleware(UpdateStreak::class);

//Api Key middleware
Route::middleware('auth:sanctum')->group(function () {

    //V1 API Routes
    Route::prefix('v1')->group(function () {
        Route::post('/update-points', [V1BadgeController::class, 'updatePoints']);

        Route::get('/users', [V1UserController::class, 'getUsers']);
        Route::patch('/users', [V1UserController::class, 'updateUser']);

        Route::get('/user/badges', [V1BadgeController::class, 'getUserBadges']);
        Route::get('/badges', [V1BadgeController::class, 'getAllBadges']);
        Route::get('/lessons', [V1LessonController::class, 'index']);
        Route::get('/words',[V1WordsController::class, 'getData']);

        Route::get('/sentence-building',[V1SentenceBuildingController::class, 'getData']);
        Route::get('/fill-in-the-blanks',[V1FillInTheBlanksController::class, 'getData']);
        Route::get('/gifs',[V1GifsController::class, 'getData']);
        Route::get('/alphabet-letters', [V1AlphabetLetterController::class, 'getData']);

        Route::get('/user/alphabet-letters', [V1AlphabetLetterController::class, 'getUserAlphabetLetters']);
        Route::post('/user/alphabet-letters', [V1AlphabetLetterController::class, 'storeUserAlphabetLetter']);
        Route::patch('/user/alphabet-letters', [V1AlphabetLetterController::class, 'updateUserAlphabetLetter']);

        Route::get('/user/words', [V1WordsController::class, 'getUserWords']);
        Route::post('/user/words', [V1WordsController::class, 'storeUserWords']);
        Route::patch('/user/words', [V1WordsController::class, 'updateUserWords']);

        Route::get('/user/fill-in-the-blanks', [V1FillInTheBlanksController::class, 'getUserFillInTheBlanks']);
        Route::post('/user/fill-in-the-blanks', [V1FillInTheBlanksController::class, 'storeUserFillInTheBlanks']);
        Route::patch('/user/fill-in-the-blanks', [V1FillInTheBlanksController::class, 'updateUserFillInTheBlanks']);

        Route::get('/user/sentence-building', [V1SentenceBuildingController::class, 'getUserSentenceBuilding']);
        Route::post('/user/sentence-building', [V1SentenceBuildingController::class, 'storeUserSentenceBuilding']);
        Route::patch('/user/sentence-building', [V1SentenceBuildingController::class, 'updateUserSentenceBuilding']);

        Route::post('/allowed-users', [V1AllowedUsersController::class, 'store']);
    });
});
