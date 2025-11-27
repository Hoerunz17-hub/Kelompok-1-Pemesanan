@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container-fluid">

        {{-- ===================== INFORMASI ORDER ===================== --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">INVOICE {{ $order->no_invoice }}</h5>

                    <div class="row mb-4">

                        <div class="col-md-4 mb-2">
                            <strong>No Invoice:</strong> {{ $order->no_invoice }}
                        </div>

                        <div class="col-md-4 mb-2">
                            <strong>No Meja:</strong> {{ $order->table_no ?? '-' }}
                        </div>

                        <div class="col-md-4 mb-2">
                            <strong>Nama Pelanggan:</strong> {{ $order->name ?? '-' }}
                        </div>

                        <div class="col-md-4 mb-2">
                            <strong>Type Order:</strong>
                            <span
                                class="badge
                            @if ($order->order_type == 'dine-in') bg-primary
                            @elseif($order->order_type == 'takeaway') bg-info @endif">
                                {{ ucfirst($order->order_type) }}
                            </span>
                        </div>

                        <div class="col-md-4 mb-2">
                            <strong>Status:</strong>
                            <span class="badge bg-warning">{{ $order->status }}</span>
                        </div>

                        <div class="col-md-4 mb-2">
                            <strong>Paid:</strong>
                            <span class="badge {{ $order->is_paid ? 'bg-success' : 'bg-danger' }}">
                                {{ $order->is_paid ? 'PAID' : 'UNPAID' }}
                            </span>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- ===================== DETAIL ITEM ===================== --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">DETAIL PESANAN {{ $order->no_invoice }}</h5>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ITEM</th>
                                    <th>QTY</th>
                                    <th>PRICE</th>
                                    <th>SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($order->details as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail->product->name }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>{{ number_format($detail->price) }}</td>
                                        <td>{{ number_format($detail->subtotal) }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


        {{-- ====================== CATATAN & EXTRA ======================= --}}
        @if ($order->note || $order->extra_price)
            <div class="col-lg-12">

                <div class="card"
                    style="background: rgba(0, 150, 200, 0.30);
                   border-radius: 12px;
                   padding: 14px 20px;
                   margin-bottom: 16px;
                   backdrop-filter: blur(4px);
                   border: 1px solid rgba(255,255,255,0.15);">

                    <div class="d-flex justify-content-between" style="color:white; font-size:15px; font-weight:500;">

                        {{-- NOTES --}}
                        <span>
                            {{ $order->note ?? '-' }}
                        </span>

                        {{-- EXTRA PRICE --}}
                        <span>
                            {{ number_format($order->extra_price ?? 0) }}
                        </span>

                    </div>

                </div>

            </div>
        @endif



        {{-- ===================== TOTAL & WAITER ===================== --}}
        <div class="col-lg-12">

            <div class="card"
                style="background: rgba(0, 120, 160, 0.35);
            border-radius: 12px; padding: 18px;">

                <div class="d-flex justify-content-between"
                    style="color:white; font-size:16px; font-weight:600; margin-bottom:14px;">
                    <span>Total</span>
                    <span>{{ number_format($order->total_cost) }}</span>
                </div>

                <hr style="border-color: rgba(255,255,255,0.2); margin: 0 0 14px;">

                <div class="d-flex justify-content-between" style="color:white; font-size:15px; font-weight:500;">
                    <span>Waiter</span>
                    <span>{{ $order->waiter->name ?? '-' }}</span>
                </div>

            </div>

        </div>

        <div class="overlay toggle-menu"></div>

    </div>
@endsection
