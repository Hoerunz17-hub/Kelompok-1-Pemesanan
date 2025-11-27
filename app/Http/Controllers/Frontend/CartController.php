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
        // Generate invoice
        $lastOrder = Order::latest('id')->first();
        $nextId = $lastOrder ? $lastOrder->id + 1 : 1;

        $no_invoice = 'INV-' . date('Ymd') . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        // Ambil data waiter
      $waiters = User::where('role', 'waiters')->get();



        // Ambil cart
        $cart = session('cart', []);

        return view('page.frontend.cart.index', compact('no_invoice', 'waiters', 'cart'));
    }


    public function getCart()
    {
        $cart = session('cart', []);

        return view('page.frontend.cart.index', compact('cart'));
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

    // Tambah ke cart
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

    // HITUNG TOTAL CART
    $total = 0;
    foreach ($cart as $row) {
        $total += $row['qty'] * $row['price'];
    }

    // RENDER ULANG CART LIST
    $html = view('page.frontend.cart.cart-list', compact('cart'))->render();

    return response()->json([
        'message' => 'Item ditambahkan',
        'cart_count' => count($cart),
        'cart_total' => $total,
        'html' => $html
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

    // Hitung total cost
    $total_cost = 0;
    foreach ($cart as $item) {
        $total_cost += $item['qty'] * $item['price'];
    }

    // Simpan order
    $order = Order::create([
        'no_invoice'     => $request->no_invoice,
        'table_no'       => $request->table_no,
        'name'           => $request->name,
        'order_type'     => $request->order_type,
        'waiters_id'      => $request->waiters_id,
        'note'           => $request->note,
        'total_cost'     => $total_cost,
        'status'         => 'accepted',   // WAJIB
    'is_paid'        => 'unpaid',     // WAJIB
    ]);

    // Simpan detail
    foreach ($cart as $row) {
        OrderDetail::create([
            'order_id'  => $order->id,
            'product_id' => $row['id'],
            'qty'       => $row['qty'],
            'price'     => $row['price'],
            'subtotal'  => $row['qty'] * $row['price'],
        ]);
    }

    // Kosongkan cart
    session()->forget('cart');

    return redirect()->route('order.index')->with('success', 'Order berhasil Dibuat!');
}

}
