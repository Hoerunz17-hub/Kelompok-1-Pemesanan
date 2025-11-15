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
                            <h5 class="text-white mb-0">9526 <span class="float-right"><i
                                        class="fa fa-shopping-cart"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total Orders <span class="float-right">+4.2%
                                    <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">8323 <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total Revenue <span class="float-right">+1.2% <i
                                        class="zmdi zmdi-long-arrow-up"></i></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">6200 <span class="float-right"><i
                                        class="fas fa-utensils"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i
                                        class="zmdi zmdi-long-arrow-up"></i></span></p>
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
                                <tr>
                                    <td>142718</td>
                                    <td>Mamat</td>
                                    <td>#9405822</td>
                                    <td>3 Aug 2017</td>
                                    <td>$ 1250.000</td>
                                    <td>Cash</td>
                                    <td>
                                        <a href="#" class="btn-view">
                                            <i class="fa fa-eye"></i>
                                        </a>



                                    </td>
                                </tr>


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
