@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="mb-3">
            <a href="/product/create" class="btn-create">ADD</a>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Table User</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">Product Not Found</td>
                                    </tr>
                                @endif
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                                    class="product-img"
                                                    style="width:160px; height:100px; object-fit:cover; border-radius:8px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>


                                        <td> <label class="switch">
                                                <input type="checkbox" class="toggle-status" data-id="{{ $product->id }}"
                                                    {{ $product->is_active === 'active' ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label></td>
                                        <td>
                                            <a href="#" class="btn-view">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="/product/edit/{{ $product->id }}" class="btn-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="/product/delete/{{ $product->id }}" class="btn-delete"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay toggle-menu"></div>
    </div>
    <style>
        .mb-3 {
            width: 100%;
            padding: 20px;
            border-radius: 20px;
        }

        .mb-3 {
            display: flex;
            justify-content: flex-end;
            /* tombol ke kanan */
        }

        .btn-create {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 150px;
            height: 48px;
            border-radius: 10px;

            background: linear-gradient(135deg, #8A90F1, #7B74E9);
            color: white;
            font-size: 17px;
            font-weight: 600;
            text-decoration: none;

            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            transition: 0.25s ease;
        }

        .btn-create:hover {
            opacity: 0.92;
            transform: translateY(-2px);
        }


        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #53DFD3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        /* Tombol DETAIL (biru yang sudah ada) */
        .btn-view {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #1e3c72, #2a5298);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            color: white;
            margin-right: 5px;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
        }

        /* Tombol EDIT (abu gelap, mirip foto) */
        .btn-edit {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #4a4a4a, #3b3b3b);
            /* ABU GELAP */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            color: white;
            margin-right: 5px;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
        }

        /* Tombol DELETE (merah maroon sama banget seperti foto) */
        .btn-delete {
            display: inline-flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 28px;
            border-radius: 40px;

            background: linear-gradient(to right, #8d2245, #a02a58);
            /* MERAH MAROON */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);

            color: white;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
        }

        /* Hover efek */
        .btn-edit:hover {
            background: linear-gradient(to right, #3a3a3a, #2f2f2f);
        }

        .btn-delete:hover {
            background: linear-gradient(to right, #7c1c3c, #8d2245);
        }

        .btn-view:hover {
            background: linear-gradient(to right, #182f5c, #24467f);
        }
    </style>
    {{-- Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".toggle-status").forEach(toggle => {
                toggle.addEventListener("change", function() {
                    let productId = this.dataset.id;
                    let status = this.checked ? 1 : 0;

                    fetch(`/product/toggle/${productId}`, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                status: status
                            })
                        })
                        .then(res => res.json())
                        .then(data => console.log("Status updated:", data))
                        .catch(err => console.error("Error:", err));
                });
            });
        });
    </script>
@endsection
