<?php

use App\Http\Controllers\Api\ExercisesFiller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filler', [ExercisesFiller::class, 'index'])->name('filler.index');

Route::post('/filler', [ExercisesFiller::class, 'store'])->name('filler.store');


