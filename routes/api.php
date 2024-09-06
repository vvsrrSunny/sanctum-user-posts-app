<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// public routes
Route::post('/register', RegisterController::class)->name('register.store');
Route::post('/login', LoginController::class)->name('login.store');

// protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout.store');

    Route::resource('users', UserController::class)->only('show');
});
