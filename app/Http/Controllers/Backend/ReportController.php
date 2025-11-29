<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function today(Request $request)
    {
        $filter = $request->get('filter', 'today');

        // Tentukan periode
        switch ($filter) {
            case 'weekly':
                $start = now()->startOfWeek();
                $end   = now()->endOfWeek();
                break;

            case 'monthly':
                $start = now()->startOfMonth();
                $end   = now()->endOfMonth();
                break;

            default:
                $start = now()->startOfDay();
                $end   = now()->endOfDay();
        }

        // Total Order
        $totalOrders = DB::table('orders')
            ->where('is_paid', 'paid')
            ->whereBetween('created_at', [$start, $end])
            ->count();

        // Total Pendapatan
        $totalRevenue = DB::table('orders')
            ->where('is_paid', 'paid')
            ->whereBetween('created_at', [$start, $end])
            ->sum('total_cost');

        // Total Produk Terjual
        $totalSoldProducts = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.is_paid', 'paid')
            ->whereBetween('order_details.created_at', [$start, $end])
            ->sum('order_details.qty');

        // Detail Penjualan per Produk
        $sales = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.is_paid', 'paid')
            ->whereBetween('order_details.created_at', [$start, $end])
            ->selectRaw("
                products.name AS product_name,
                SUM(order_details.qty) AS total_sold,
                SUM(order_details.subtotal) AS total_revenue
            ")
            ->groupBy('products.name')
            ->orderBy('total_sold', 'desc')
            ->get();

        return view('page.backend.information.today', [
            'filter'            => $filter,
            'start'             => $start,
            'end'               => $end,
            'totalOrders'       => $totalOrders,
            'totalRevenue'      => $totalRevenue,
            'totalSoldProducts' => $totalSoldProducts,
            'sales'             => $sales,
        ]);
    }
}