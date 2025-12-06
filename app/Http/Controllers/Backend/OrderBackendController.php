<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class OrderBackendController extends Controller
{
    public function index()
    {
        $orders = Order::with(['waiter', 'casier'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('page.backend.order.index', compact('orders'));
    }

    public function create()
    {
        $waiters = User::where('role', 'waiter')->get();
        $cashiers = User::where('role', 'kasir')->get();

        // Generate Invoice
        $last = Order::latest('id')->first();
        $next = $last ? $last->id + 1 : 1;

        $no_invoice = 'INV-' . now()->format('Ymd') . '-' . str_pad($next, 4, '0', STR_PAD_LEFT);

        return view('page.backend.order.create', compact('waiters', 'cashiers', 'no_invoice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_invoice'  => 'required|string|unique:orders,no_invoice',
            'waiters_id'  => 'required|exists:users,id',
            'table_no'    => 'nullable|string',
            'order_type'  => 'required|in:dine_in,takeaway',
            'total_cost'  => 'required|numeric|min:0',
            'name'        => 'nullable|string',
            'note'        => 'nullable|string',
        ]);

        Order::create([
            'no_invoice'  => $request->no_invoice,
            'waiters_id'  => $request->waiters_id,
            'table_no'    => $request->table_no,
            'order_type'  => $request->order_type,
            'total_cost'  => (float) $request->total_cost,
            'name'        => $request->name,
            'note'        => $request->note,
            'status'      => 'accepted',
            'is_paid'     => 'unpaid',
        ]);

        return redirect()->route('order.index')->with('success', 'Order berhasil dibuat.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $waiters = User::where('role', 'waiter')->get();
        $cashiers = User::where('role', 'kasir')->get();

        return view('page.backend.order.edit', compact('order', 'waiters', 'cashiers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'waiters_id'      => 'required|exists:users,id',
            'casier_id'       => 'nullable|exists:users,id',
            'name'            => 'nullable|string',
            'table_no'        => 'nullable|string',
            'order_type'      => 'required|in:dine_in,takeaway',
            'order_date'      => 'nullable|date',
            'total_cost'      => 'required|numeric|min:0',
            'discount'        => 'nullable|numeric|min:0',
            'grand_amount'    => 'nullable|numeric|min:0',
            'payment_method'  => 'nullable|string',
            'is_paid'         => 'required|in:paid,unpaid',
            'status'          => 'required|in:accepted,in_progress,served,finished,cancelled',
            'note'            => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'waiters_id'     => $request->waiters_id,
            'casier_id'      => $request->casier_id,
            'name'           => $request->name,
            'table_no'       => $request->table_no,
            'order_type'     => $request->order_type,
            'order_date'     => $request->order_date,
            'total_cost'     => (float) $request->total_cost,
            'discount'       => (float) ($request->discount ?? 0),
            'grand_amount'   => (float) ($request->grand_amount ?? $request->total_cost),
            'payment_method' => $request->payment_method,
            'is_paid'        => $request->is_paid,
            'status'         => $request->status,
            'note'           => $request->note,
        ]);

        return redirect()->route('order.index')->with('success', 'Order berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
    }

    public function detail($id)
    {
        $order = Order::with(['details.product', 'waiter', 'casier'])
            ->findOrFail($id);

        return view('page.backend.order.detail', compact('order'));
    }

    public function payment($id)
    {
        $order = Order::with(['details.product', 'waiter', 'casier'])->findOrFail($id);
        $details = $order->details;

        return view('page.backend.order.payment', compact('order', 'details'));
    }


    public function processPayment(Request $request, $id)
    {
        $request->validate([
            'paid_amount' => 'required|numeric|min:0'
        ]);

        $order = Order::findOrFail($id);

        $total = (float) $order->total_cost;

        // Jika nominal kurang
        if ($request->paid_amount < $total) {
            return redirect()
                ->back()
                ->with('error', 'Nominal pembayaran kurang.');
        }

        $order->update([
            'is_paid'        => 'paid',
            'status'         => 'finished',
            'casier_id'      => auth()->id(),
            'tendered'       => (float) $request->paid_amount,
            'change_amount'  => (float) $request->paid_amount - $total,
            'grand_amount'   => $total,
        ]);

        return redirect()
            ->route('order.index')
            ->with('success', 'Pembayaran berhasil.');
    }




public function print($id)
{
    $order = Order::with('details.product', 'waiter', 'casier')->findOrFail($id);
$pdf = PDF::loadView('page.backend.order.print', [
    'order' => $order
    ])->setPaper([0, 0, 300, 600], 'portrait'); // ukuran struk

    return $pdf->stream("invoice-$order->no_invoice.pdf");
}

}
