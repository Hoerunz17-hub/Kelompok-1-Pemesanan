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

    @include('layout.mart.svg')

    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>

    @include('layout.mart.navbar')

    @yield('content')

    @include('layout.mart.footer')

    <script src="{{ asset('assetsfrontend/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assetsfrontend/js/plugins.js') }}"></script>
    <script src="{{ asset('assetsfrontend/js/script.js') }}"></script>
    <script>
        function updateCartList(cart) {
            let html = '';

            let total = 0;

            Object.values(cart).forEach(item => {
                total += item.price * item.qty;

                html += `
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">${item.name}</h6>
                            <small class="text-body-secondary">Qty: ${item.qty}</small>
                        </div>
                        <span class="text-body-secondary">$${item.price * item.qty}</span>
                    </li>
                `;
            });

            html += `
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong>$${total}</strong>
                </li>
            `;

            document.getElementById('cart-list').innerHTML = html;
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.addEventListener("click", function(e) {
                let btn = e.target.closest(".add-to-cart");
                if (!btn) return;

                e.preventDefault();

                let productId = btn.dataset.id;
                let qty = 1; // default 1 untuk navbar / card kecil

                fetch('/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        qty: qty
                    })
                })
                .then(res => res.json())
                .then(data => {
                    updateCartList(data.cart);
                });
            });

        });
    </script>

</body>

</html>
