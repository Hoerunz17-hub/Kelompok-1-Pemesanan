<!DOCTYPE html>
<html lang="en">

<head>
    <title>Warung Makan Sejahtera</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


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
            document.querySelectorAll('.add-to-cart').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    let productId = this.dataset.id;
                    let qty = parseInt(
                        this.closest('.product-item').querySelector('.input-number').value
                    );

                    fetch('/cart/add', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                product_id: productId,
                                qty: qty
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            console.log(data.message);
                            alert("Produk berhasil ditambahkan ke cart!");
                        });
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll(".quantity-right-plus").forEach(btn => {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    let input = this.closest(".product-qty").querySelector(".input-number");
                    let oldValue = parseInt(input.value) || 1;
                    input.value = oldValue + 1;
                });
            });

            document.querySelectorAll(".quantity-left-minus").forEach(btn => {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    let input = this.closest(".product-qty").querySelector(".input-number");
                    let oldValue = parseInt(input.value) || 1;
                    if (oldValue > 1) {
                        input.value = oldValue - 1;
                    }
                });
            });

        });
    </script>
    <script>
        function showPremiumToast(type, message) {
            let toastContainer = document.getElementById('toast-premium-container');
            let icon = type === 'success' ? '✔️' : '❌';

            // Buat elemen toast
            let toast = document.createElement('div');
            toast.classList.add('toast-premium', type === 'success' ? 'toast-success' : 'toast-error');

            toast.innerHTML = `
        <div class="icon">${icon}</div>
        <div>${message}</div>
        <div class="close-btn" onclick="this.parentElement.remove()">×</div>
    `;

            toastContainer.appendChild(toast);

            // Mainkan suara
            document.getElementById('toastSound').play();

            // Auto hilang 3 detik
            setTimeout(() => {
                toast.style.opacity = 0;
                toast.style.transform = 'translateX(50%)';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>
    <script>
        function showToast(message, type = 'success') {
            const toastEl = document.getElementById('mainToast');
            const toastMessage = document.getElementById('toastMessage');
            const toastSound = document.getElementById('toastSound'); // audio

            // Set warna sesuai type
            toastEl.className = `toast text-white bg-${type}`;

            // Set pesan
            toastMessage.innerHTML = message;

            // Munculkan toast
            const toast = new bootstrap.Toast(toastEl);
            toast.show();

            // 🔊 Putar suara
            if (toastSound) {
                toastSound.currentTime = 0; // restart
                toastSound.play();
            }
        }
    </script>


    <audio id="toastSound">
        <source src="{{ asset('sounds/notif_tokped.wav') }}" type="audio/mpeg">
    </audio>
    @if (session('success'))
        <script>
            showPremiumToast('success', "{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            showPremiumToast('error', "{{ session('error') }}");
        </script>
    @endif

</body>

</html>
