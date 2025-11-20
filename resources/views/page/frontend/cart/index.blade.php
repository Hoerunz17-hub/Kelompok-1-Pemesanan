<!DOCTYPE html>
<html lang="en">

<head>
    <title>FoodMart - Free eCommerce Grocery Store HTML Website Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsfrontend/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsfrontend/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    @include('layout.mart.css')
</head>

<body>

    <div class="p-4 shadow rounded" style="max-width: 420px; margin: 40px auto;">
        <div class="d-flex justify-content-center mb-3">
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
            <div class="order-md-last">

            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Order</span>
                <span class="badge bg-primary rounded-pill">
                <select class="transparent-arrows" name="order_number">
                    <option>001</option>
                    <option>002</option>
                    <option>003</option>
                </select>
                </span>
            </h4>

            <ul class="list-group mb-3" id="cart-list">
                @foreach (session('cart', []) as $item)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $item['name'] }}</h6>
                            <small class="text-body-secondary">Qty: {{ $item['qty'] }}</small>
                        </div>
                        <span class="text-body-secondary">${{ $item['price'] * $item['qty'] }}</span>
                    </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong>${{ collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']) }}</strong>
                </li>
            </ul>

            <div class="d-flex gap-2 mb-3">
                <div class="flex-fill">
                <label class="form-label text-body-primary">Name</label>
                <input type="text" class="form-control" name="customer_name">
                </div>

                @php
                $last = \App\Models\Order::latest('id')->first();
                $nextId = $last ? $last->id + 1 : 1;
                $no_invoice = 'INV-' . date('Ymd') . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
                @endphp

                <div class="flex-fill">
                <label class="form-label">No Invoice</label>
                <input type="text" class="form-control" name="invoice_number" value="{{ $no_invoice }}" readonly>
                </div>
            </div>

            <div class="d-flex gap-2 mb-3">
                <select class="form-select transparent-arrow" name="type" style="background-color:#ffe19f;">
                <option>Dine in</option>
                <option>Take Away</option>
                </select>

                <select class="form-select transparent-arrow" name="cashier" style="background-color:#ffe19f;">
                <option>Yudi</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Note</label>
                <input type="text" class="form-control" name="note" style="background-color:#ffe19f;">
            </div>

            <button type="submit" class="w-100 btn btn-primary btn-lg">
                Konfirmasi Pesanan
            </button>

            </div>
        </form>
    </div>

    <script src="{{ asset('assetsfrontend/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assetsfrontend/js/plugins.js') }}"></script>
    <script src="{{ asset('assetsfrontend/js/script.js') }}"></script>
</body>

</html>
