@extends('layout.mart.app')

@section('content')
    <!-- PREMIUM TOAST -->
    <div id="toast-premium-container" class="toast-premium-wrapper"></div>

    <!-- Menu Pembuka -->
    <section >
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>Makanan Pembuka</h3>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="pane-pembuka-all" role="tabpanel">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                    @foreach ($menuPembuka as $produk)
                                        <div class="col">
                                            <div class="product-item">

                                                <a href="#" class="btn-wishlist">
                                                    <svg width="24" height="24">
                                                        <use xlink:href="#heart"></use>
                                                    </svg>
                                                </a>

                                                <figure>
                                                    <a href="#">
                                                        <img src="{{ asset('storage/' . $produk->image) }}"
                                                            class="tab-image">
                                                    </a>
                                                </figure>

                                                <h4>{{ $produk->name }}</h4>
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

                                                        <input type="text" class="form-control input-number"
                                                            value="1">

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
                                                        data-id="{{ $produk->id }}" data-name="{{ $produk->name }}"
                                                        data-price="{{ $produk->price }}">
                                                        Add to Cart <iconify-icon icon="uil:shopping-cart"></iconify-icon>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- / product-grid -->

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- SCRIPT: hanya untuk Add to Cart (tombol plus/minus di-handle oleh FoodMart) -->



    <!---Menu Utama--->
    <section class="py-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>Makanan Utama</h3>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="pane-pembuka-all" role="tabpanel"
                                aria-labelledby="nav-all-tab">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">


                                    @foreach ($menuUtama as $produk)
                                        <div class="col">
                                            <div class="product-item">
                                                <a href="#" class="btn-wishlist"><svg width="24"
                                                        height="24">
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
                                                        <input type="text" name="quantity"
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
                                                        data-id="{{ $produk->id }}" data-name="{{ $produk->name }}"
                                                        data-price="{{ $produk->price }}">
                                                        Add to Cart <iconify-icon icon="uil:shopping-cart"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                                <!-- / product-grid -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---Menu Penutup--->
    <section class="py-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>Makanan Penutup</h3>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="pane-penutup-all" role="tabpanel"
                                aria-labelledby="nav-all-tab">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">


                                    @foreach ($menuPenutup as $produk)
                                        <div class="col">
                                            <div class="product-item">
                                                <a href="#" class="btn-wishlist"><svg width="24"
                                                        height="24">
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
                                                        <input type="text" name="quantity"
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
                                                        data-id="{{ $produk->id }}" data-name="{{ $produk->name }}"
                                                        data-price="{{ $produk->price }}">
                                                        Add to Cart <iconify-icon icon="uil:shopping-cart"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                                <!-- / product-grid -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .toast-premium-wrapper {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 99999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast-premium {
            min-width: 280px;
            max-width: 320px;
            padding: 15px 20px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2), 0 0 15px rgba(0, 255, 157, 0.6);
            color: white;
            font-size: 15px;
            font-weight: 500;
            animation: slideRight 0.4s ease-out forwards;
            opacity: 0;
        }

        @keyframes slideRight {
            from {
                transform: translateX(50%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .toast-premium .icon {
            font-size: 22px;
        }

        /* Success */
        .toast-success {
            background: linear-gradient(135deg, #00d27f 0%, #009e60 100%);
            box-shadow: 0 0 20px rgba(0, 255, 157, 0.7);
        }

        .toast-error {
            background: linear-gradient(135deg, #ff4b4b 0%, #d40000 100%);
            box-shadow: 0 0 20px rgba(255, 60, 60, 0.7);
        }

        .toast-premium .close-btn {
            margin-left: auto;
            cursor: pointer;
            font-weight: bold;
            opacity: 0.7;
        }

        .toast-premium .close-btn:hover {
            opacity: 1;
        }

        .tab-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

    </style>
@endsection
