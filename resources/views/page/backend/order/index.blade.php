@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Table Kasir</h5>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NOINVOICE</th>
                                    <th scope="col">NO MEJA</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">TIPE ORDERAN</th>
                                    <th scope="col">COST</th>
                                    <th scope="col">STATUS PAYMENT</th>
                                    <th scope="col">STATUS PAID</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->no_invoice }}</th>
                                        <td>{{ $order->table_no }}</td>
                                        <td>{{ $order->name }}</td>

                                        <td>
                                            <span class="badge-order">{{ $order->order_type }}</span>
                                        </td>

                                        <td>
                                            <span class="badge-payment">{{ $order->total_cost }}</span>
                                        </td>

                                        <td>
                                            <span class="badge-paid">{{ $order->status }}</span>
                                        </td>

                                        <td>
                                            <span class="badge-paid">{{ $order->is_paid }}</span>
                                        </td>

                                        <td>

                                            <!-- Detail -->
                                            <a href="/order/detail/{{ $order->id }}" class="btn-view">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <!-- Payment -->
                                            <a href="{{ route('order.payment', $order->id) }}" class="btn-payment">
                                                <i class="fa fa-credit-card"></i>
                                            </a>

                                            <!-- Delete — sudah diperbaiki -->
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete"
                                                    onclick="return confirm('Yakin ingin menghapus order ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="overlay toggle-menu"></div>
    </div>

    <style>
        .badge-order {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #28a745;
            display: inline-block;
        }

        .badge-payment {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #c82333;
            display: inline-block;
        }

        .badge-paid {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #28a745;
            display: inline-block;
        }

        .btn-view,
        .btn-payment,
        .btn-delete {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 45px;
            height: 28px;
            border-radius: 40px;
            color: white;
            margin-right: 5px;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-view {
            background: linear-gradient(to right, #1e3c72, #2a5298);
        }

        .btn-payment {
            background: linear-gradient(to right, #009ffd, #2a2a72);
        }

        .btn-delete {
            background: linear-gradient(to right, #8d2245, #a02a58);
        }

        .btn-view:hover {
            background: linear-gradient(to right, #182f5c, #24467f);
        }

        .btn-payment:hover {
            background: linear-gradient(to right, #0084d6, #1e1e5c);
        }

        .btn-delete:hover {
            background: linear-gradient(to right, #7c1c3c, #8d2245);
        }
    </style>
@endsection