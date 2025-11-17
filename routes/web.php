<?php

use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\LoginBackendController;
use App\Http\Controllers\Backend\OrderBackendController;
use App\Http\Controllers\Backend\ProductBackendController;
use App\Http\Controllers\Backend\UserBackendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
use Illuminate\Support\Facades\Route;

// ========== FRONTEND ==========
Route::get('/', [HomeFrontendController::class, 'index']);

// ========== LOGIN ==========
Route::get('/login', [LoginBackendController::class, 'login'])->name('login');

// ========== DASHBOARD ==========
Route::get('/adminpanel', [DashboardBackendController::class, 'index'])->name('backend.dashboard');

// ========== USER CRUD ==========
Route::resource('/user', UserBackendController::class, [
    'as' => 'backend'  // route name: backend.user.index, backend.user.create, dll
]);

// ========== PRODUCT CRUD ==========
Route::resource('/product', ProductBackendController::class, [
    'as' => 'backend'
]);

// ========== ORDER (Custom karena berbeda struktur) ==========
Route::get('/order', [OrderBackendController::class, 'index'])->name('backend.order.index');
Route::get('/order/detail/{id}', [OrderBackendController::class, 'detail'])->name('backend.order.detail');
Route::get('/order/payment/{id}', [OrderBackendController::class, 'payment'])->name('backend.order.payment');