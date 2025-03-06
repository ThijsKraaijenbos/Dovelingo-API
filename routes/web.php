<?php

use App\Http\Controllers\Api\ExercisesFiller;
use App\Http\Controllers\ApiKeysController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filler', [ExercisesFiller::class, 'index'])->name('filler.index');
Route::post('/filler', [ExercisesFiller::class, 'store'])->name('filler.store');


Route::get('/tokens/create', [ApiKeysController::class, 'index'])->name('tokens.index');
Route::post('/tokens/create', [ApiKeysController::class, 'generateToken'])->name('tokens.generate');

