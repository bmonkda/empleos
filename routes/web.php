<?php

use App\Http\Controllers\EmpleoController;
use Illuminate\Support\Facades\Route;



Route::get('/',[EmpleoController::class, 'index'])->name('empleos.index');

Route::get('empleos/{empleo}',[EmpleoController::class, 'show'])->name('empleos.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
