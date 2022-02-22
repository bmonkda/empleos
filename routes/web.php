<?php

use App\Http\Controllers\EmpleoController;
use Illuminate\Support\Facades\Route;



Route::get('/',[EmpleoController::class, 'index'])->name('empleos.index');

Route::get('empleos/{empleo}',[EmpleoController::class, 'show'])->name('empleos.show');

Route::get('category/{category}', [EmpleoController::class, 'category'])->name('empleos.category');

Route::get('modo/{modo}', [EmpleoController::class, 'modo'])->name('empleos.modo');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
