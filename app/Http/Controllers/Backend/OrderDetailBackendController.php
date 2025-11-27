<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailBackendController extends Controller
{
    // Menampilkan detail item untuk 1 order
    public function index($order_id)
    {
        $order = Order::with('details.product')->findOrFail($order_id);

        return view('page.backend.order.detail', compact('order'));
    }

    // Tambah item ke order
    public function store(Request $request, $order_id)
    {
        $request->validate([
            'products_id' => 'required|exists:products,id',
            'qty'         => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->products_id);

        OrderDetail::create([
            'order_id'   => $order_id,
            'product_id' => $product->id,
            'qty'         => $request->qty,
            'price'       => $product->price,
            'total_price' => $product->price * $request->qty,
        ]);

        return back()->with('success', 'Item berhasil ditambahkan.');
    }

    // Update jumlah qty
    public function update(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $detail = OrderDetail::findOrFail($id);

        $detail->update([
            'qty'         => $request->qty,
            'total_price' => $detail->price * $request->qty,
        ]);

        return back()->with('success', 'Item berhasil diperbarui.');
    }

    // Hapus item
    public function destroy($id)
    {
        OrderDetail::findOrFail($id)->delete();

        return back()->with('success', 'Item berhasil dihapus.');
    }
}
