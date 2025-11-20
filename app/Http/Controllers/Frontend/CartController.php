<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(){
        return View('page.frontend.cart.index');
    }

    // TAMPILKAN CART (canvas)
    public function show()
    {
        $cart = session('cart', []);

        // No Invoice generator
        $lastOrder = Order::latest('id')->first();
        $nextId = $lastOrder ? $lastOrder->id + 1 : 1;

        $no_invoice = 'INV-' . date('Ymd') . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        // Ambil waiter
        $waiters = User::where('role', 'waiter')->get();

        return view('layout.mart.canvascart', compact('cart', 'no_invoice', 'waiters'));
    }

    // TAMBAH ITEM KE CART
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $product_id = $request->product_id;
        $qty = $request->qty;

        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        if (isset($cart[$product_id])) {
            $cart[$product_id]['qty'] += $qty;
        } else {
            $cart[$product_id] = [
                'id' => $product_id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Item ditambahkan',
            'cart_count' => count($cart)
        ]);
    }

    // HAPUS ITEM CART
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Item dihapus']);
    }

    // SUBMIT ORDER (CART → DATABASE)
    public function submitOrder(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart masih kosong');
        }

        // Buat order
        $order = Order::create([
            'no_invoice'    => $request->invoice_number,
            'waiter_id'     => $request->waiter_id,
            'no_meja'       => $request->no_meja,
            'type_order'    => $request->type_order,
            'note'          => $request->note,
            'status_payment' => 'Pending',
            'status_paid'    => 0,
        ]);

        // Simpan order item
        foreach ($cart as $row) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $row['id'],
                'qty' => $row['qty'],
                'price' => $row['price'],
                'subtotal' => $row['price'] * $row['qty'],
            ]);
        }

        // kosongkan cart
        session()->forget('cart');

        return redirect()->route('order.index')->with('success', 'Order berhasil Dibuat!');
    }
}
