<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .center {
            text-align: center;
        }

        .line {
            border-bottom: 1px dashed #000;
            margin: 8px 0;
        }

        table {
            width: 100%;
        }

        .bold {
            font-weight: bold;
        }

        .mb-1 {
            margin-bottom: 4px;
        }

        .mt-1 {
            margin-top: 4px;
        }

        .mt-2 {
            margin-top: 8px;
        }
    </style>
</head>

<body>

    {{-- ======================== HEADER TOKO ======================== --}}
    <div class="center" style="font-size:14px; font-weight:bold;">
        WARUNG MAKAN SEJAHTERA
    </div>
    <div class="center" style="font-size:10px;">
        Jln. Raya Bahagia No. 15<br>
        Telp: 0812-3456-7890
    </div>

    <div class="line"></div>

    {{-- ======================== INFORMASI ORDER ======================== --}}
    <table>
        <tr>
            <td>Invoice</td>
            <td style="text-align:right;">{{ $order->no_invoice }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td style="text-align:right;">{{ $order->name }}</td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td style="text-align:right;">
                {{ date('d/m/Y H:i', strtotime($order->created_at)) }}
            </td>
        </tr>
        <tr>
            <td>Pelayan</td>
            <td style="text-align:right;">{{ $order->waiter->name ?? '-' }}</td>
        </tr>
        <tr>
            <td>No Meja</td>
            <td style="text-align:right;">{{ $order->table_no }}</td>
        </tr>
    </table>

    <div class="line"></div>

    {{-- ======================== DETAIL ITEM ======================== --}}
    @foreach ($order->details as $d)
        <div class="bold">{{ $d->product->name }}</div>
        <table>
            <tr>
                <td>{{ $d->qty }} x {{ number_format($d->price) }}</td>
                <td style="text-align:right;">
                    {{ number_format($d->qty * $d->price) }}
                </td>
            </tr>
        </table>
    @endforeach

    <div class="line"></div>

    {{-- ======================== TOTAL ======================== --}}
    <table>
        <tr>
            <td>Biaya Lainnya</td>
            <td style="text-align:right;">
                {{ number_format($order->other_cost ?? 0) }}
            </td>
        </tr>

        <tr>
            <td class="bold">TOTAL</td>
            <td style="text-align:right;" class="bold">
                {{ number_format($order->total_cost) }}
            </td>
        </tr>

        <tr>
            <td>Bayar</td>
            <td style="text-align:right;">
                {{ number_format($order->tendered) }}
            </td>
        </tr>

        <tr>
            <td>Kembali</td>
            <td style="text-align:right;">
                {{ number_format($order->change_amount) }}
            </td>
        </tr>
    </table>

    <div class="line"></div>

    {{-- ======================== CATATAN ======================== --}}
    @if ($order->note)
        <p style="font-size:11px;">
            <b>Catatan:</b><br>
            {{ $order->note }}
        </p>

        <div class="line"></div>
    @endif

    {{-- ======================== FOOTER ======================== --}}
    <p class="center" style="font-size:11px;">
        Terima kasih atas kunjungan Anda<br>
        Semoga hari Anda menyenangkan 😊
    </p>

</body>

</html>
