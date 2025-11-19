<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $product_id = $request->product_id;
        $qty = $request->qty ?? 1;

        if (isset($cart[$product_id])) {
            // Jika produk sudah ada, qty bertambah otomatis
            $cart[$product_id]['qty'] += $qty;
        } else {
            // Tambah produk baru
            $cart[$product_id] = [
                'id' => $product_id,
                'name' => $request->name,
                'price' => $request->price,
                'qty' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Item ditambahkan',
            'cart' => $cart
        ]);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'message' => 'Item dihapus',
            'cart' => $cart
        ]);
    }

    public function getCart()
    {
        return response()->json([
            'cart' => session()->get('cart', [])
        ]);
    }
}
