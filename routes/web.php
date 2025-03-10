<?php

use App\Http\Controllers\Api\ExercisesFiller;
use App\Http\Controllers\LetterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filler', [ExercisesFiller::class, 'index'])->name('filler.index');

Route::post('/filler', [ExercisesFiller::class, 'store'])->name('filler.store');

Route::get('/letters', [LetterController::class, 'index'])->name('letters.index');

Route::post('/letters', [LetterController::class, 'store'])->name('letters.store');


