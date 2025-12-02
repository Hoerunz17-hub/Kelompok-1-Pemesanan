<!DOCTYPE html>
<html lang="en">

<head>
    <title>FoodMart - Order Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsfrontend/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsfrontend/style.css') }}">

    @include('layout.mart.css')
</head>

<body>
    <div class="p-4 shadow rounded" style="max-width: 420px; margin: 40px auto;">
        <div class="d-flex justify-content-center mb-3">
            <a href="/" type="button" class="btn-close" aria-label="Close"></a>
        </div>

        <form action="{{ route('cart.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="order-md-last">

                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Order</span>

                    <span class="badge bg-primary rounded-pill">
                        <select class="transparent-arrows" name="table_no">
                            <option>001</option>
                            <option>002</option>
                            <option>003</option>
                        </select>
                    </span>
                </h4>

                <ul class="list-group mb-3" id="cart-list">
                    @include('page.frontend.cart.cart-list')
                </ul>

                <div class="d-flex gap-2 mb-3">

                    <!-- Name otomatis sesuai user login -->
                    <div class="flex-fill">
                        <label class="form-label">Name</label>
                        <input type="text"
                               class="form-control"
                               name="customer_name"
                               value="{{ Auth::user()->name }}"
                               readonly>
                    </div>

                    <div class="flex-fill">
                        <label class="form-label">No Invoice</label>
                        <input type="text" class="form-control" name="no_invoice" value="{{ $no_invoice }}" readonly>
                    </div>
                </div>

                <div class="d-flex gap-2 mb-3">
                    <select class="form-select transparent-arrow" name="order_type" style="background-color:#ffe19f;">
                        <option value="dine_in">Dine In</option>
                        <option value="takeaway">Take Away</option>
                    </select>

                    <select class="form-select transparent-arrow" name="waiters_id" style="background-color:#ffe19f;">
                        @foreach ($waiters as $pelayan)
                            <option value="{{ $pelayan->id }}">{{ $pelayan->name }}</option>
                        @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetsfrontend/js/plugins.js') }}"></script>
    <script src="{{ asset('assetsfrontend/js/script.js') }}"></script>

</body>

</html>