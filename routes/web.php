<?php

use App\Http\Controllers\Backend\DashboardBackendController;
use App\Http\Controllers\Backend\LoginBackendController;
use App\Http\Controllers\Backend\OrderBackendController;
use App\Http\Controllers\Backend\ProductBackendController;
use App\Http\Controllers\Backend\UserBackendController;
use App\Http\Controllers\Frontend\HomeFrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeFrontendController::class,'index']);

//ROUTE LOGIN
Route::get('/login',[LoginBackendController::class,'login']);

//BACKEND USER
Route::get('/adminpanel',[DashboardBackendController::class,'index']);
Route::get('/user',[UserBackendController::class,'index']);
Route::get('/user/create',[UserBackendController::class,'create']);
Route::get('/user/edit',[UserBackendController::class,'edit']);


//BACKEND ORDER
Route::get('/order',[OrderBackendController::class,'index']);
Route::get('/order/detail',[OrderBackendController::class,'detail']);
Route::get('/order/payment',[OrderBackendController::class,'payment']);

//BACKEND PRODUCT
Route::get('/product',[ProductBackendController::class,'index']);
Route::get('/product/create',[ProductBackendController::class,'create']);
Route::get('/product/edit',[ProductBackendController::class,'edit']);
