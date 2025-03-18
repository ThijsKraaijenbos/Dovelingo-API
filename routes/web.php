<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ExercisesFiller;
use App\Http\Controllers\Api\V1\AllowedUsersController;
use App\Http\Controllers\Api\V1\LetterController;
use App\Http\Controllers\Api\V1\TrophyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filler', [ExercisesFiller::class, 'index'])->name('filler.index');
Route::post('/filler', [ExercisesFiller::class, 'store'])->name('filler.store');

Route::get('/api-user/check-token', [ApiAuthController::class, 'showCheckTokenForm'])->name('api-user.showCheckTokenForm');
Route::post('/api-user/check-token', [ApiAuthController::class, 'checkToken'])->name('api-user.checkToken');

Route::get('/api-user/register', [ApiUserController::class, 'showRegistrationForm'])->name('api-user.showRegisterForm');
Route::post('/api-user/register', [ApiUserController::class, 'register'])->name('api-user.register');

Route::get('/letters', [LetterController::class, 'index'])->name('letters.index');
Route::post('/letters', [LetterController::class, 'store'])->name('letters.store');

Route::get('/trophies', [TrophyController::class, 'index'])->name('trophies.index');
Route::post('/trophies', [TrophyController::class, 'store'])->name('trophies.store');

Route::get('/emails', function () {
    return view('email');
})->name('emails.create');
Route::post('/emails', [AllowedUsersController::class, 'store'])->name('emails.store');

