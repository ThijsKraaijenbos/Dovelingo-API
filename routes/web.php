<?php

use App\Http\Controllers\Api\ExercisesFiller;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filler', [ExercisesFiller::class, 'index'])->name('filler.index');
Route::post('/filler', [ExercisesFiller::class, 'store'])->name('filler.store');

Route::get('/api-user/login', [ApiAuthController::class, 'showLoginForm'])->name('api-user.showLoginForm');
Route::post('/api-user/login', [ApiAuthController::class, 'login'])->name('api-user.login');

Route::get('/api-user/register', [ApiUserController::class, 'showRegistrationForm'])->name('api-user.showRegisterForm');
Route::post('/api-user/register', [ApiUserController::class, 'register'])->name('api-user.register');
