<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmpleoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ModoController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('categories', CategoryController::class)->names('admin.categories');

Route::resource('modos', ModoController::class)->names('admin.modos');

Route::resource('empleos', EmpleoController::class)->names('admin.empleos');