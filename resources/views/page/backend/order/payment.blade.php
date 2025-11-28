@extends('layout.backend.app')
@section('content')
<div class="clearfix"></div>

<div class="container-fluid">

    {{-- ===================== INVOICE HEADER ===================== --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">INVOICE</h5>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Invoice</th>
                            <td>{{ $order->no_invoice }}</td>
                        </tr>
                        <tr>
                            <th>No Meja</th>
                            <td>{{ $order->table_no }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>Type Order</th>
                            <td>{{ $order->order_type }}</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- ===================== RINGKASAN ORDER ===================== --}}
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">RINGKASAN ORDER</h5>

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
                            @foreach ($details as $i => $d)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $d->product->name }}</td>
                                    <td>{{ $d->qty }}</td>
                                    <td>{{ number_format($d->price) }}</td>
                                    <td>{{ number_format($d->qty * $d->price) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- ===================== TOTAL ===================== --}}
                <div class="bg-light p-3 rounded mt-3">
                    <div class="d-flex justify-content-between" style="font-size:16px; font-weight:600;">
                        <span>Total</span>
                        <span>Rp {{ number_format($order->total_cost, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- ===================== FORM PAYMENT ===================== --}}
                <form action="{{ route('order.payment.process', $order->id) }}" method="POST">
                    @csrf
                
                    <div class="form-group">
                        <label>Nominal Pembayaran</label>
                        <input type="number" name="paid_amount" class="form-control" required>
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-3">
                        Bayar Sekarang
                    </button>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection