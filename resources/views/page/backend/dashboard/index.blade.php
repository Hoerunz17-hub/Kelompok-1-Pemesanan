@extends('layout.backend.app')
@section('content')
    <!-- Start wrapper-->


    <!--Start sidebar-wrapper-->

    <!--End sidebar-wrapper-->

    <!--Start topbar header-->

    <!--End topbar header-->

    <div class="clearfix"></div>


    <div class="container-fluid">

        <!--Start Dashboard Content-->

        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-4 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $totalOrders }}
                                <span class="float-right"><i class="fa fa-shopping-cart"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">
                                Total Orders
                                <span class="float-right {{ $growthOrders >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ number_format($growthOrders, 1) }}%
                                    <i
                                        class="zmdi {{ $growthOrders >= 0 ? 'zmdi-long-arrow-up' : 'zmdi-long-arrow-down' }}"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ number_format($totalRevenue) }}
                                <span class="float-right"><i class="fa fa-usd"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>

                            <p class="mb-0 text-white small-font">
                                Total Revenue
                                <span class="float-right {{ $growthRevenue >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ number_format($growthRevenue, 1) }}%
                                    <i
                                        class="zmdi {{ $growthRevenue >= 0 ? 'zmdi-long-arrow-up' : 'zmdi-long-arrow-down' }}"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $totalVisitors }}
                                <span class="float-right"><i class="fas fa-utensils"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">
                                Visitors
                                <span class="float-right {{ $growthVisitors >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ number_format($growthVisitors, 1) }}%
                                    <i
                                        class="zmdi {{ $growthVisitors >= 0 ? 'zmdi-long-arrow-up' : 'zmdi-long-arrow-down' }}"></i>
                                </span>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">History Transaksi
                        <div class="card-action">
                            <div class="dropdown">
                                <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                    data-toggle="dropdown">
                                    <i class="icon-options"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void();">Action</a>
                                    <a class="dropdown-item" href="javascript:void();">Another action</a>
                                    <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>INVOICE</th>
                                    <th>Nama</th>
                                    <th>Nomor Meja</th>
                                    <th>Tanggal</th>
                                    <th>Total Uang</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->no_invoice }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->table_no }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>Rp {{ number_format($item->grand_amount) }}</td>
                                        <td>{{ $item->payment_method }}</td>

                                        <td>
                                            <a href="{{ route('detail', $item->id) }}" class="btn-view">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div><!--End Row-->

        <!--End Dashboard Content-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->


    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->

    <!--End footer-->

    <!--start color switcher-->

    <!--end color switcher-->

    <style>
        .btn-view {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #1e3c72, #2a5298);
            /* warna tabel */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            text-decoration: none;
            transition: 0.2s;
        }

        .btn-view:hover {
            background: linear-gradient(to right, #182f5c, #24467f);
            /* versi gelap saat hover */
        }
    </style>
@endsection
