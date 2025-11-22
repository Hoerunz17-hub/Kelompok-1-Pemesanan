<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeFrontendController extends Controller
{
    public function index(){

        $menuPembuka = Product::where('category', 'Makanan Pembuka')->get();
        $menuUtama = Product::where('category', 'Menu Utama')->get();
        $menuPenutup = Product::where('category', 'Makanan Penutup')->get();

        return view('page.frontend.landing.index', compact('menuPembuka', 'menuUtama', 'menuPenutup'));

    }
}
