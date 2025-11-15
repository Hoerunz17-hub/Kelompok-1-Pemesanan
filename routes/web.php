<?php

use App\Http\Controllers\Frontend\HomeFrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeFrontendController::class,'index']);
