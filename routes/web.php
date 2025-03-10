<?php

use App\Http\Controllers\Api\ExercisesFiller;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\LetterController;
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
