<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Homepage;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [Homepage::class, 'index'])->name('homepage');

// Authentication
Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    //Login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    // TODO: Add change password

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
