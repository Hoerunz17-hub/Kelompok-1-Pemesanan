@extends('layout.backend.app')
@section('content')

    <style>
        .report-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            padding-top: 25px;
        }

        .report-container {
            width: 100%;
            max-width: 1100px;
            padding: 0 20px;
        }

        /* Card Statistik */
        .stat-card {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            border-radius: 14px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            color: white;
            padding: 22px;
        }

        .stat-title {
            font-size: 14px;
            opacity: .8;
        }

        .stat-number {
            font-size: 26px;
            font-weight: bold;
        }
    </style>

    <div class="report-wrapper">
        <div class="report-container">

            <!-- HEADER -->
            <div class="text-center mb-4">
                <h3 class="font-weight-bold">Laporan Penjualan</h3>
            </div>

            <!-- CARDS -->
            <div class="row">

                <!-- Total Orders -->
                <div class="col-md-4 mb-3">
                    <div class="stat-card">
                        <div class="stat-number">
                            {{ $totalOrders }}
                            <span class="float-right"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                        <p class="stat-title">Total Order ({{ ucfirst($filter) }})</p>
                    </div>
                </div>

                <!-- Total Pendapatan -->
                <div class="col-md-4 mb-3">
                    <div class="stat-card">
                        <div class="stat-number">
                            Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                            <span class="float-right"><i class="fa fa-wallet"></i></span>
                        </div>
                        <p class="stat-title">Total Pendapatan ({{ ucfirst($filter) }})</p>
                    </div>
                </div>

                <!-- Total Produk Terjual -->
                <div class="col-md-4 mb-3">
                    <div class="stat-card">
                        <div class="stat-number">
                            {{ $totalSoldProducts }}
                            <span class="float-right"><i class="fa fa-box"></i></span>
                        </div>
                        <p class="stat-title">Total Produk Terjual</p>
                    </div>
                </div>

            </div>

            <!-- FILTER -->
            <div class="card mt-4">
                <div class="card-body d-flex flex-wrap justify-content-between align-items-center">

                    <form action="{{ route('report.today') }}" method="GET" class="d-flex gap-2">
                        <select name="filter" class="form-control" style="min-width: 170px;">
                            <option value="today" {{ $filter == 'today' ? 'selected' : '' }}>Harian</option>
                            <option value="weekly" {{ $filter == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                            <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                        </select>

                        <button class="btn btn-primary">Tampilkan</button>
                    </form>

                    <div class="text-right mt-2 mt-md-0">
                        <strong>Periode:</strong><br>
                        {{ $start->format('d M Y') }} - {{ $end->format('d M Y') }}
                    </div>

                </div>
            </div>

            <!-- TABEL -->
            <div class="card mt-3">
                <div class="card-header text-center">
                    <h5 class="mb-0 font-weight-bold">Detail Penjualan</h5>
                </div>

                <div class="card-body">
                    @if ($sales->count())
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Terjual</th>
                                        <th>Total Pendapatan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($sales as $item)
                                        <tr>
                                            <td class="text-left">{{ $item->product_name }}</td>
                                            <td>{{ $item->total_sold }}</td>
                                            <td>Rp {{ number_format($item->total_revenue, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">Tidak ada data pada periode ini.</div>
                    @endif
                </div>
            </div>
            <a href="{{ route('report.print', ['filter' => $filter]) }}" target="_blank" class="btn btn-danger">
                <i class="fa fa-file-pdf"></i> Cetak PDF
            </a>
        </div>

    </div>

@endsection
