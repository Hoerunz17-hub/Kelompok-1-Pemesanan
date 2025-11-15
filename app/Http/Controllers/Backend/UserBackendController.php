<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserBackendController extends Controller
{
   public function index(){
    return view('page.backend.user.index');
   }

   public function create(){
    return view('page.backend.user.create');
   }

   public function edit(){
    return view('page.backend.user.edit');
   }
}
