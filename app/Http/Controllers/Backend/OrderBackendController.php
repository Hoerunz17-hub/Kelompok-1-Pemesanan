<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderBackendController extends Controller
{
    // 📌 Tampilkan semua data order
    public function index()
    {
        $orders = Order::with(['waiter', 'casier'])
               ->orderBy('id', 'asc')
               ->paginate(10);

        return view('page.backend.order.index', compact('orders'));
    }

    // 📌 Form tambah order
    public function create()
    {
        $waiters = User::where('role', 'waiter')->get();
        $cashiers = User::where('role', 'kasir')->get();

        return view('page.backend.order.create', compact('waiters', 'cashiers'));
    }

    // 📌 Simpan order baru
    public function store(Request $request)
    {
        $request->validate([
            'no_invoice'   => 'required|unique:orders',
            'waiters_id'   => 'required|exists:users,id',
            'casier_id'    => 'nullable|exists:users,id',
            'table_no'     => 'nullable|string',
            'order_type'   => 'required|in:dine_in,takeaway',
            'order_date'   => 'nullable|date',
            'total_cost'   => 'required|integer',
            'discount'     => 'required|integer',
            'grand_amount' => 'required|integer',
            'payment_method' => 'required|in:cash,transfer,qris',
            'is_paid'        => 'required|in:paid,unpaid',
            'status'         => 'required|in:accepted,in_progress,served,finished,cancelled',
            'note'           => 'nullable|string'
        ]);

        Order::create($request->all());

        return redirect()->route('backend.order.index')->with('success', 'Order berhasil dibuat.');
    }

    // 📌 Lihat detail order
    public function show($id)
    {
        $order = Order::with(['waiter', 'casier'])->findOrFail($id);
        return view('page.backend.order.detail', compact('order'));
    }

    // 📌 Form edit order
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $waiters = User::where('role', 'waiter')->get();
        $cashiers = User::where('role', 'kasir')->get();

        return view('page.backend.order.edit', compact('order', 'waiters', 'cashiers'));
    }

    // 📌 Update order
    public function update(Request $request, $id)
    {
        $request->validate([
            'waiters_id'   => 'required|exists:users,id',
            'casier_id'    => 'nullable|exists:users,id',
            'table_no'     => 'nullable|string',
            'order_type'   => 'required|in:dine_in,takeaway',
            'order_date'   => 'nullable|date',
            'total_cost'   => 'required|integer',
            'discount'     => 'required|integer',
            'grand_amount' => 'required|integer',
            'payment_method' => 'required|in:cash,transfer,qris',
            'is_paid'        => 'required|in:paid,unpaid',
            'status'         => 'required|in:accepted,in_progress,served,finished,cancelled',
            'note'           => 'nullable|string'
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('backend.order.index')->with('success', 'Order berhasil diperbarui.');
    }

    // 📌 Hapus order
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('backend.order.index')->with('success', 'Order berhasil dihapus.');
    }

    // 🧾 Halaman pembayaran
    public function payment($id)
    {
        $order = Order::findOrFail($id);
        return view('page.backend.order.payment', compact('order'));
    }
}
