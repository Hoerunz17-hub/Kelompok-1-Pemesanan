<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderBackendController extends Controller
{
    public function index(){
        return view('page.backend.order.index');
    }

    public function detail(){
        return view('page.backend.order.detail');
    }

    public function payment(){
        return view('page.backend.order.payment');
    }
}
