<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\UserBackendController;
use App\Http\Controllers\Backend\LoginBackendController;
use App\Http\Controllers\Backend\OrderBackendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Backend\ProductBackendController;
use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\OrderDetailBackendController;

// ========== FRONTEND ==========
Route::get('/', [HomeFrontendController::class, 'index']);

// ========== LOGIN ==========
Route::get('/login', [LoginBackendController::class, 'login'])->name('login');

// ========== DASHBOARD ==========
Route::get('/adminpanel', [DashboardBackendController::class, 'index'])->name('backend.dashboard');

// ========== USER CRUD ==========
Route::resource('/user', UserBackendController::class, ['as' => 'backend']);

// ========== PRODUCT CRUD ==========
Route::get('/product', [ProductBackendController::class,'index']);
Route::get('/product/create', [ProductBackendController::class,'create']);
Route::post('/product/store', [ProductBackendController::class,'store']);
Route::get('/product/delete/{id}', [ProductBackendController::class,'destroy']);
Route::get('/product/edit/{id}', [ProductBackendController::class,'edit']);
Route::post('/product/update/{id}', [ProductBackendController::class,'update']);
Route::post('/product/toggle/{id}', [ProductBackendController::class,'toggle']);

// ========== ORDER (Custom karena berbeda struktur) ==========
Route::get('/order', [OrderBackendController::class, 'index'])->name('backend.order.index');
Route::post('/order/store', [OrderBackendController::class, 'index'])->name('order.store');
Route::get('/order/detail/{id}', [OrderBackendController::class, 'detail'])->name('backend.order.detail');
Route::get('/order/payment/{id}', [OrderBackendController::class, 'payment'])->name('backend.order.payment');

// CART
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/submit', [CartController::class, 'submitOrder'])->name('cart.submit');

// Order (pakai resource)
Route::resource('orders', OrderBackendController::class);

// Order Detail (nested routes)
Route::prefix('orders/{order}')->group(function () {
    Route::get('/details', [OrderDetailBackendController::class, 'index'])->name('orders.details.index');
    Route::post('/details', [OrderDetailBackendController::class, 'store'])->name('orders.details.store');
    Route::put('/details/{detail}', [OrderDetailBackendController::class, 'update'])->name('orders.details.update');
    Route::delete('/details/{detail}', [OrderDetailBackendController::class, 'destroy'])->name('orders.details.destroy');
});


