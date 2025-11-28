<?php

use Illuminate\Support\Facades\Route;

// FRONTEND CONTROLLERS
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Frontend\CartController;

// BACKEND CONTROLLERS
use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\UserBackendController;
use App\Http\Controllers\Backend\ProductBackendController;
use App\Http\Controllers\Backend\OrderBackendController;
use App\Http\Controllers\Backend\OrderDetailBackendController;

// AUTH
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| FRONTEND (Waiters + Super Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:waiters,super_admin'])->group(function () {

    // HOME
    Route::get('/', [HomeFrontendController::class, 'index'])->name('frontend.home');

    // CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/submit', [CartController::class, 'submitOrder'])->name('cart.submit');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.post');
});

Route::get('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| BACKEND (Admin + Super Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,super_admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/adminpanel', [DashboardBackendController::class, 'index'])->name('adminpanel');
    Route::get('/dashboard', [DashboardBackendController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */
    Route::resource('/user', UserBackendController::class);
    Route::post('/user/toggle/{id}', [UserBackendController::class, 'toggle'])->name('user.toggle');

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::get('/product', [ProductBackendController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductBackendController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductBackendController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductBackendController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductBackendController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductBackendController::class, 'destroy'])->name('product.delete');
    Route::post('/product/toggle/{id}', [ProductBackendController::class, 'toggle'])->name('product.toggle');

    /*
    |--------------------------------------------------------------------------
    | ORDER
    |--------------------------------------------------------------------------
    */
    Route::get('/order', [OrderBackendController::class, 'index'])->name('order.index');
    Route::post('/order/store', [OrderBackendController::class, 'store'])->name('order.store');

    // Order detail page
    Route::get('/order/detail/{id}', [OrderBackendController::class, 'detail'])->name('order.detail');

    // Payment page (GET)
    Route::get('/order/payment/{id}', [OrderBackendController::class, 'payment'])->name('order.payment');
    
    // Payment process (POST) — FIX 100%
    Route::post('/order/payment/{id}/process', [OrderBackendController::class, 'processPayment'])->name('order.payment.process');

    // Delete
    Route::delete('/order/destroy/{id}', [OrderBackendController::class, 'destroy'])->name('order.destroy');

    /*
    |--------------------------------------------------------------------------
    | ORDER DETAIL (Nested)
    |--------------------------------------------------------------------------
    */
    Route::prefix('/order/{order}')->group(function () {
        Route::get('/details', [OrderDetailBackendController::class, 'index'])->name('order.details.index');
        Route::post('/details', [OrderDetailBackendController::class, 'store'])->name('order.details.store');
        Route::put('/details/{detail}', [OrderDetailBackendController::class, 'update'])->name('order.details.update');
        Route::delete('/details/{detail}', [OrderDetailBackendController::class, 'destroy'])->name('order.details.destroy');
    });
});