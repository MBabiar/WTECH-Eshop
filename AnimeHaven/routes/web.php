<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordChangeController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// Authentication
Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

    // Login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    // Forgot Password
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Authenticated
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');

    // Password Change
    Route::get('/password-change', [PasswordChangeController::class, 'edit'])->name('password.change');
    Route::post('/password-change', [PasswordChangeController::class, 'update'])->name('password.change');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('order.show');

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// Admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::put('/products/{product}/image', [ProductController::class, 'updateImage'])->name('product.addImage');
    Route::delete('/products/{product}/image', [ProductController::class, 'destroyImage'])->name('product.destroyImage');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
});

// Search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Product
Route::get('/products/search', [ProductController::class, 'indexSearch'])->name('product.index-search');
Route::get('/products/{category}', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/{product}/variants', [ProductController::class, 'variants']);

//Cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/{variant_id}/increment', [CartController::class, 'incrementAmount'])->name('cart.incrementAmount');
Route::post('/cart/{variant_id}/decrement', [CartController::class, 'decrementAmount'])->name('cart.decrementAmount');
Route::delete('/cart/{variant_id}', [CartController::class, 'destroy'])->name('cart.destroy');

// Order
Route::get('/delivery-payment', [OrderController::class, 'showDeliveryPaymentForm'])->name('delivery-payment');
Route::post('/delivery-payment', [OrderController::class, 'storeDeliveryPayment'])->name('store-delivery-payment');
Route::get('/order-info', [OrderController::class, 'showOrderInfo'])->name('order-info');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
