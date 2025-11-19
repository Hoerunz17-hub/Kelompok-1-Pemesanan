<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeFrontendController extends Controller
{
    public function index(){

        // Ambil hanya hero dengan status aktif
        $activeProduct = Product::where('is_active', 'active')->get();

        // Kirim data ke view landing page
        return view('page.frontend.landing.index', compact('activeProduct'));
    }
}
