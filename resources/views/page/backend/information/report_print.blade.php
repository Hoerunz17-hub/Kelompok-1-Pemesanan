<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .info {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 6px;
        }

        table th {
            background: #eee;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>LAPORAN PENJUALAN</h2>
        <p>Dicetak pada: {{ now()->format('d M Y H:i') }}</p>
    </div>

    @foreach ($reports as $report)
        <h3 style="margin-top:25px;">
            {{ strtoupper($report['label']) }}
        </h3>

        <p>
            <strong>Periode:</strong>
            {{ $report['start']->format('d M Y') }}
            -
            {{ $report['end']->format('d M Y') }}
        </p>

        <div class="info">
            <strong>Total Order:</strong> {{ $report['data']['totalOrders'] }} |
            <strong>Total Pendapatan:</strong>
            Rp {{ number_format($report['data']['totalRevenue'], 0, ',', '.') }} |
            <strong>Total Produk Terjual:</strong>
            {{ $report['data']['totalSoldProducts'] }}
        </div>

        <table style="margin-bottom: 20px;">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah Terjual</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($report['data']['sales'] as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td class="text-right">{{ $item->total_sold }}</td>
                        <td class="text-right">
                            Rp {{ number_format($item->total_revenue, 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center;">
                            Tidak ada data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endforeach

</body>



</html>
