<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// TODO: All routes with functions needs change

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

// Authenticated
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');

    Route::get('/orders', function () {
        return view('profile.orders');
    })->name('orders');

    Route::get('/password-change', function () {
        return view('profile.password-change');
    })->name('password-change');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// Search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Product
Route::get('/products/{category}', [ProductController::class, 'index'])->name('products');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product-show');
Route::get('/products/{product}/variants', [ProductController::class, 'variants']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('can:update,product');

// Others - needs changes
Route::get('/cart', function () {
    return view('order.cart');
})->name('cart');

Route::get('/delivery-payment', function () {
    return view('order.delivery-payment');
})->name('delivery-payment');

Route::get('/order-info', function () {
    return view('order.order-info');
})->name('order-info');