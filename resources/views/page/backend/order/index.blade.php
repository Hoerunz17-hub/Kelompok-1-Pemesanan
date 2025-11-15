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
                                    <th scope="col">STATUS PAYMENT</th>
                                    <th scope="col">STATUS PAID</th>

                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>02

                                    </td>
                                    <td>Otto</td>
                                    <td>
                                        <span class="badge-order">Dine In</span>
                                    </td>

                                    <td>
                                        <span class="badge-payment">Pending</span>
                                    </td>

                                    <td>
                                        <span class="badge-paid">Paid</span>
                                    </td>


                                    <td>
                                        <a href="/order/detail" class="btn-view">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="/order/payment" class="btn-edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="#" class="btn-delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay toggle-menu"></div>
    </div>
    <style>
        /* ===================== */
        /*       BADGE ORDER     */
        /* ===================== */
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


        /* ===================== */
        /*     BADGE PAYMENT     */
        /* ===================== */
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


        /* ===================== */
        /*       BADGE PAID      */
        /* ===================== */
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


        /* Tombol DETAIL (biru yang sudah ada) */
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

        /* Tombol EDIT (abu gelap, mirip foto) */
        .btn-edit {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #4a4a4a, #3b3b3b);
            /* ABU GELAP */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            color: white;
            margin-right: 5px;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
        }

        /* Tombol DELETE (merah maroon sama banget seperti foto) */
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

        /* Hover efek */
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
