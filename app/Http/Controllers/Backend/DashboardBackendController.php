<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardBackendController extends Controller
{
  public function index()
{
    // TOTAL
    $totalOrders   = Order::count();
    $totalRevenue  = Order::sum('grand_amount');
    $totalVisitors = Order::distinct('table_no')->count('table_no');

    // DATA HARI INI
    $todayOrders   = Order::whereDate('created_at', today())->count();
    $todayRevenue  = Order::whereDate('created_at', today())->sum('grand_amount');
    $todayVisitors = Order::whereDate('created_at', today())->distinct('table_no')->count('table_no');

    // DATA KEMARIN
    $yesterdayOrders   = Order::whereDate('created_at', today()->subDay())->count();
    $yesterdayRevenue  = Order::whereDate('created_at', today()->subDay())->sum('grand_amount');
    $yesterdayVisitors = Order::whereDate('created_at', today()->subDay())->distinct('table_no')->count('table_no');

    // GROWTH
    $growthOrders = $yesterdayOrders > 0
        ? (($todayOrders - $yesterdayOrders) / $yesterdayOrders) * 100
        : 100;

    $growthRevenue = $yesterdayRevenue > 0
        ? (($todayRevenue - $yesterdayRevenue) / $yesterdayRevenue) * 100
        : 100;

    $growthVisitors = $yesterdayVisitors > 0
        ? (($todayVisitors - $yesterdayVisitors) / $yesterdayVisitors) * 100
        : 100;

    // PROGRESS BAR (ambil presentase dari total)
    $progressOrders   = min(100, ($todayOrders / max(1, $totalOrders)) * 100);
    $progressRevenue  = min(100, ($todayRevenue / max(1, $totalRevenue)) * 100);
    $progressVisitors = min(100, ($todayVisitors / max(1, $totalVisitors)) * 100);

    // HISTORY TABLE
    $orders = Order::latest()->take(10)->get();

    return view('page.backend.dashboard.index', compact(
        'totalOrders',
        'totalRevenue',
        'totalVisitors',
        'growthOrders',
        'growthRevenue',
        'growthVisitors',
        'progressOrders',
        'progressRevenue',
        'progressVisitors',
        'orders'
    ));
}

   public function detail($id)
{
    $order = Order::with('details.product')->findOrFail($id);

    return view('page.backend.dashboard.detail', compact('order'));
}

}
