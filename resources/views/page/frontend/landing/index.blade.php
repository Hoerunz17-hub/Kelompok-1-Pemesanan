@extends('layout.mart.app')

@section('content')
    <!---Hero--->
    <section class="py-3"
        style="background-image: url('images/background-pattern.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="banner-blocks">

                        <div class="banner-ad large bg-info block-1">

                            <div class="swiper main-swiper">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories my-3">Best Selling</div>
                                                <h3 class="display-4">Wedding Cake & Birthday Cake</h3>
                                                <p>Dari ulang tahun hingga pernikahan, CakeMart siap maniskan setiap momen
                                                    indah dengan cake istimewa</p>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src="{{ asset('assetsfrontend/images/pinkcake-no-bg.png') }}"
                                                    class="img-fluid cake-img">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories mb-3 pb-3">100% natural</div>
                                                <h3 class="banner-title">Fresh Smoothie & Summer Juice</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                                <a href="#"
                                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop
                                                    Collection</a>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src="{{ asset('assetsfrontend/images/product-thumb-1.png') }}"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories mb-3 pb-3">100% natural</div>
                                                <h3 class="banner-title">Heinz Tomato Ketchup</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                                <a href="#"
                                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop
                                                    Collection</a>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src="{{ asset('assetsfrontend/images/product-thumb-2.png') }}"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-pagination"></div>

                            </div>
                        </div>

                        <div class="banner-ad bg-success-subtle block-2"
                            style="background:url('images/ad-image-1.png') no-repeat;background-position: right bottom">
                            <div class="row banner-content p-5">

                                <div class="content-wrapper col-md-7">
                                    <div class="categories sale mb-3 pb-3">20% off</div>
                                    <h3 class="banner-title">Fruits & Vegetables</h3>
                                    <a href="#" class="d-flex align-items-center nav-link">Shop Collection <svg
                                            width="24" height="24">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg></a>
                                </div>

                            </div>
                        </div>

                        <div class="banner-ad bg-danger block-3"
                            style="background:url('images/ad-image-2.png') no-repeat;background-position: right bottom">
                            <div class="row banner-content p-5">

                                <div class="content-wrapper col-md-7">
                                    <div class="categories sale mb-3 pb-3">15% off</div>
                                    <h3 class="item-title">Baked Products</h3>
                                    <a href="#" class="d-flex align-items-center nav-link">Shop Collection <svg
                                            width="24" height="24">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg></a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- / Banner Blocks -->

                </div>
            </div>
        </div>
    </section>

    <!---Menu Pembuka--->
    <section class="py-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>Makanan Pembuka</h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-all">All</a>
                                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-fruits">Fruits & Veges</a>
                                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-juices">Juices</a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                aria-labelledby="nav-all-tab">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                    <div class="col">
                                         @foreach ($activeProduct as $produk)
                                        <div class="product-item">
                                            <span class="badge bg-success position-absolute m-3">-30%</span>
                                            <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                                    <use xlink:href="#heart"></use>
                                                </svg></a>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img src="{{ asset('storage/' . $produk->image) }}"
                                                        class="tab-image">
                                                </a>
                                            </figure>
                                            <h3>{{ $produk->name }}</h3>
                                            <span class="price">{{ $produk->price }}</span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity"
                                                        class="form-control input-number" value="1">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a href="#" class="nav-link add-to-cart"
                                                    data-id="{{ $produk->id }}"
                                                    data-name="{{ $produk->name }}"
                                                    data-price="{{ $produk->price }}">
                                                    Add to Cart <iconify-icon icon="uil:shopping-cart"></iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        <script>
                                                document.addEventListener("DOMContentLoaded", function() {

                                                    document.querySelectorAll('.quantity-right-plus').forEach(btn => {
                                                        btn.addEventListener('click', function(e) {
                                                            e.preventDefault();
                                                            let input = this.closest('.product-qty').querySelector('.input-number');
                                                            let val = parseInt(input.value);
                                                            input.value = val + 1;
                                                        });
                                                    });

                                                    document.querySelectorAll('.quantity-left-minus').forEach(btn => {
                                                        btn.addEventListener('click', function(e) {
                                                            e.preventDefault();
                                                            let input = this.closest('.product-qty').querySelector('.input-number');
                                                            let val = parseInt(input.value);
                                                            if (val > 1) input.value = val - 1;
                                                        });
                                                    });

                                                    // Add To Cart
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
                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                                                },
                                                                body: JSON.stringify({
                                                                    product_id: productId,
                                                                    qty: qty
                                                                })
                                                            })
                                                            .then(res => res.json())
                                                            .then(data => {
                                                                console.log(data);
                                                            });
                                                        });
                                                    });

                                                });
                                                </script>
                                    </div>

                                </div>
                                <!-- / product-grid -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <div class="banner-ad bg-danger mb-3"
                        style="background: url('images/ad-image-3.png');background-repeat: no-repeat;background-position: right bottom;">
                        <div class="banner-content p-5">

                            <div class="categories text-primary fs-3 fw-bold">Upto 25% Off</div>
                            <h3 class="banner-title">Luxa Dark Chocolate</h3>
                            <p>Very tasty & creamy vanilla flavour creamy muffins.</p>
                            <a href="#" class="btn btn-dark text-uppercase">Show Now</a>

                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-ad bg-info"
                        style="background: url('images/ad-image-4.png');background-repeat: no-repeat;background-position: right bottom;">
                        <div class="banner-content p-5">

                            <div class="categories text-primary fs-3 fw-bold">Upto 25% Off</div>
                            <h3 class="banner-title">Creamy Muffins</h3>
                            <p>Very tasty & creamy vanilla flavour creamy muffins.</p>
                            <a href="#" class="btn btn-dark text-uppercase">Show Now</a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            let productId = this.dataset.id;
            let name = this.dataset.name;
            let price = this.dataset.price;

            let qtyInput = this.closest('.product-item')
                            .querySelector('.input-number');
            let qty = parseInt(qtyInput.value);

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
                console.log(data);
                });
            });
        });
    </script>
@endsection
