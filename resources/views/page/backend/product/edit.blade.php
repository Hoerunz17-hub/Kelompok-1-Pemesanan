@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">Edit Product</div>
                    <hr>
                    <!-- PENTING: method POST sesuai route update kamu -->
                    <form action="/product/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">

                            <label for="image">Ubah Foto </label>

                            <!-- FOTO LAMA / PREVIEW BARU -->
                            <div id="image-preview-container">
                                <img id="preview-image"
                                    src="{{ $product->image ? asset('storage/' . $product->image) : '' }}"
                                    style="
                width: 100%;
                height: 220px;
                object-fit: cover;
                border-radius: 12px;
                display: {{ $product->image ? 'block' : 'none' }};
             ">
                            </div>

                            <!-- TOMBOL UPLOAD -->
                            <label class="upload-btn">
                                Pilih Foto
                                <input type="file" id="image" name="image" accept="image/*">
                            </label>

                            <small id="file-name" style="color:#fff; opacity:.8;">Tidak ada file dipilih</small>

                        </div>


                        <div class="form-group">
                            <label for="input-6">Name</label>
                            <!-- beri name supaya request bisa terbaca -->
                            <input type="text" name="name" class="form-control form-control-rounded" id="input-6"
                                placeholder="Enter Your Name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="input-7">PRICE</label>
                            <input type="number" name="price" class="form-control form-control-rounded" id="input-7"
                                value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5"><i></i>
                                Submit</button>
                            <button type="button" class="btn btn-light btn-round px-5"
                                onclick="window.location.href='/product'">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="overlay toggle-menu"></div>
    </div>

    <style>
        .upload-btn {
            background: #ffffff;
            color: #333;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            display: inline-block;
            margin-top: 15px;
        }

        .upload-btn input {
            display: none;
        }

        .custom-upload-box {
            width: 100%;
            height: 50px;
            border-radius: 40px;

            /* WARNA SAMA seperti input lain */
            background: rgba(255, 255, 255, 0.12);

            display: flex;
            align-items: center;
            padding: 0 10px;
            gap: 15px;
            position: relative;
            cursor: pointer;

            /* efek transparan lembut */
            backdrop-filter: blur(3px);
        }

        .choose-btn {
            background: white;
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }

        #file-name {
            color: white;
            opacity: 0.85;
            font-size: 14px;
        }

        /* letakkan input file absolut & transparan di atas seluruh box */
        .custom-upload-box input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
    </style>

    <script>
        const input = document.getElementById('image');
        const fileName = document.getElementById('file-name');
        const previewImg = document.getElementById('preview-image');

        input.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                fileName.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
