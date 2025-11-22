<?php

use Illuminate\Support\Facades\Route;

// AUTH CONTROLLER
use App\Http\Controllers\Auth\LoginController;

// FRONTEND
use App\Http\Controllers\Frontend\HomeFrontendController;
use App\Http\Controllers\Frontend\CartController;

// BACKEND
use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\UserBackendController;
use App\Http\Controllers\Backend\ProductBackendController;
use App\Http\Controllers\Backend\OrderBackendController;
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


// CART
Route::get('/cart', [CartController::class, 'index'])->name('page.frontend.cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/submit', [CartController::class, 'submitOrder'])->name('cart.submit');

// Order (pakai resource)
Route::resource('order', OrderBackendController::class);
Route::get('/order/detail/{id}', [OrderBackendController::class, 'detail'])->name('backend.order.detail');
Route::get('/order/payment/{id}', [OrderBackendController::class, 'payment'])->name('backend.order.payment');

// Order Detail (nested routes)
Route::prefix('orders/{order}')->group(function () {
    Route::get('/details', [OrderDetailBackendController::class, 'index'])->name('orders.details.index');
    Route::post('/details', [OrderDetailBackendController::class, 'store'])->name('orders.details.store');
    Route::put('/details/{detail}', [OrderDetailBackendController::class, 'update'])->name('orders.details.update');
    Route::delete('/details/{detail}', [OrderDetailBackendController::class, 'destroy'])->name('orders.details.destroy');


/*
|--------------------------------------------------------------------------
| FRONTEND (Waiters + Super Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:waiters,super_admin'])->group(function () {

    Route::get('/', [HomeFrontendController::class, 'index'])->name('frontend.home');

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

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.post')
    ->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| BACKEND (Admin + Super Admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,super_admin'])->group(function () {

    // ========== ADMINPANEL ========== //
    Route::get('/adminpanel', [DashboardBackendController::class, 'index'])
        ->name('backend.adminpanel');

    // DASHBOARD DEFAULT
    Route::get('/dashboard', [DashboardBackendController::class, 'index'])
        ->name('backend.dashboard');

    // USER
    Route::resource('/backend/user', UserBackendController::class);

    // PRODUCT
    Route::get('/backend/product', [ProductBackendController::class, 'index'])->name('backend.product.index');
    Route::get('/backend/product/create', [ProductBackendController::class, 'create'])->name('backend.product.create');
    Route::post('/backend/product/store', [ProductBackendController::class, 'store'])->name('backend.product.store');
    Route::get('/backend/product/edit/{id}', [ProductBackendController::class, 'edit'])->name('backend.product.edit');
    Route::post('/backend/product/update/{id}', [ProductBackendController::class, 'update'])->name('backend.product.update');
    Route::get('/backend/product/delete/{id}', [ProductBackendController::class, 'destroy'])->name('backend.product.delete');
    Route::post('/backend/product/toggle/{id}', [ProductBackendController::class, 'toggle'])->name('backend.product.toggle');

    // ORDER
    Route::get('/backend/order', [OrderBackendController::class, 'index'])->name('backend.order.index');
    Route::post('/backend/order/store', [OrderBackendController::class, 'store'])->name('backend.order.store');
    Route::get('/backend/order/detail/{id}', [OrderBackendController::class, 'detail'])->name('backend.order.detail');
    Route::get('/backend/order/payment/{id}', [OrderBackendController::class, 'payment'])->name('backend.order.payment');

    Route::resource('/backend/orders', OrderBackendController::class);

    Route::prefix('/backend/orders/{order}')->group(function () {
        Route::get('/details', [OrderDetailBackendController::class, 'index'])->name('backend.orders.details.index');
        Route::post('/details', [OrderDetailBackendController::class, 'store'])->name('backend.orders.details.store');
        Route::put('/details/{detail}', [OrderDetailBackendController::class, 'update'])->name('backend.orders.details.update');
        Route::delete('/details/{detail}', [OrderDetailBackendController::class, 'destroy'])->name('backend.orders.details.destroy');
    });
});