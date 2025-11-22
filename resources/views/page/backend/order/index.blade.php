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
                                @foreach ( $orders as $order )
                                <tr>
                                    <th scope="row">{{ $order->no_invoice }}</th>
                                    <td>{{ $order->table_no}}</td>
                                    <td>{{ $order->name}}</td>
                                    <td>
                                        <span class="badge-order">{{ $order->order_type}}</span>
                                    </td>

                                    <td>
                                        <span class="badge-payment">{{ $order->total_cost}}</span>
                                    </td>

                                    <td>
                                        <span class="badge-paid">{{ $order->status}}</span>
                                    </td>

                                    <td>
                                        <span class="badge-paid">{{ $is_paid}}is_paid</span>
                                    </td>

                                    <td>
                                        <a href="/order/detail/{{ $order->id }}" class="btn-view">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="/order/payment/{{ $order->id }}" class="btn-edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="#" class="btn-delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
            /* Hijau */
            display: inline-block;
        }

        .badge-payment {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #c82333;
            /* Merah */
            display: inline-block;
        }

        .badge-paid {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #28a745;
            /* Hijau */
            display: inline-block;
        }

        .btn-view {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #1e3c72, #2a5298);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            color: white;
            margin-right: 5px;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-edit {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #4a4a4a, #3b3b3b);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            color: white;
            margin-right: 5px;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-delete {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #8d2245, #a02a58);
            /* MERAH MAROON */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            color: white;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-edit:hover {
            background: linear-gradient(to right, #3a3a3a, #2f2f2f);
        }

        .btn-delete:hover {
            background: linear-gradient(to right, #7c1c3c, #8d2245);
        }

        .btn-view:hover {
            background: linear-gradient(to right, #182f5c, #24467f);
        }
    </style>
@endsection
