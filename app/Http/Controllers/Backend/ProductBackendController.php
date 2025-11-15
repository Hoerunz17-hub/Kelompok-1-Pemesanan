<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductBackendController extends Controller
{
    public function index(){
        return view('page.backend.product.index');
    }
    public function create(){
        return view('page.backend.product.create');
    }
    public function edit(){
        return view('page.backend.product.edit');
    }
}
