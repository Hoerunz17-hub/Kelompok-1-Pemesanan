@extends('layout.backend.app')
@section('content')

    <div class="clearfix"></div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Detail Transaksi #{{ $order->id }}</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <!-- LEFT -->
                            <div class="col-md-6">
                                <h6>Informasi Pesanan</h6>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nomor Meja</th>
                                        <td>{{ $order->table_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Type</th>
                                        <td>{{ $order->order_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span
                                                class="badge
                                            @if ($order->status == 'finished') badge-success
                                            @elseif($order->status == 'pending') badge-warning
                                            @else badge-secondary @endif">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Note</th>
                                        <td>{{ $order->note ?? '-' }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- RIGHT -->
                            <div class="col-md-6">
                                <h6>Informasi Pembayaran</h6>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Total Cost</th>
                                        <td>Rp {{ number_format($order->total_cost) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Uang Diterima</th>
                                        <td>Rp {{ number_format($order->tendered) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Grand Amount</th>
                                        <td>Rp {{ number_format($order->grand_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Metode Bayar</th>
                                        <td>{{ ucfirst($order->payment_method) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- IF ORDER DETAILS EXIST -->
                        @if (isset($order->details) && $order->details->count() > 0)
                            <div class="mt-4">
                                <h6>Rincian Produk</h6>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->details as $d)
                                            <tr>
                                                <td>{{ $d->product->name ?? 'Produk' }}</td>
                                                <td>{{ $d->qty }}</td>
                                                <td>Rp {{ number_format($d->price) }}</td>
                                                <td>Rp {{ number_format($d->subtotal) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <a href="{{ route('dashboard') }}" class="btn btn-dark mt-3">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
