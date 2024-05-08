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
    // TODO: needs changes - adding Controllers
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');

    // TODO: needs changes - adding Controllers
    Route::get('/orders', function () {
        return view('profile.orders');
    })->name('orders');

    // TODO: needs changes - adding Controllers
    Route::get('/password-change', function () {
        return view('profile.password-change');
    })->name('password-change');

    // TODO: needs changes - adding Controllers
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
Route::get('/products/{category}', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/{product}/variants', [ProductController::class, 'variants']);

// TODO: Others - needs changes
Route::get('/cart', function () {
    return view('order.cart');
})->name('cart');

Route::get('/delivery-payment', function () {
    return view('order.delivery-payment');
})->name('delivery-payment');

Route::get('/order-info', function () {
    return view('order.order-info');
})->name('order-info');
