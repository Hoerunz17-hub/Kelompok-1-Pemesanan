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
        $qty = $request->qty;

        if (isset($cart[$product_id])) {
            // Kalau sudah ada, tambahkan qty
            $cart[$product_id]['qty'] += $qty;
        } else {
            // Tambah barang baru
            $cart[$product_id] = [
                'id' => $product_id,
                'name' => $request->name,
                'price' => $request->price,
                'qty' => $qty
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Item ditambahkan',
            'cart' => $cart
        ]);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Item dihapus']);
    }
}
