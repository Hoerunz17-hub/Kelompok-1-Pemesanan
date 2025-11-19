@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create Product</div>
                    <hr>
                    <form action="/product/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-rounded" id="name" name="name"
                                placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label for="price">PRICE</label>
                            <input type="number" class="form-control form-control-rounded" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control form-control-rounded" id="category" name="category">
                                <option value="">-- Pilih Category --</option>
                                <option value="Makanan Pembuka">Makanan Pembuka</option>
                                <option value="Menu Utama">Menu Utama</option>
                                <option value="Makanan Penutup">Makanan Penutup</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="image">Upload Foto</label>

                            <div class="custom-upload-box">
                                <span class="choose-btn">Choose File</span>
                                <span id="file-name">No file chosen</span>
                                <input type="file" id="image" name="image" accept="image/*">
                            </div>

                            <!-- PREVIEW FOTO -->
                            <img id="preview" src="" alt="Preview Foto"
                                style="display:none; width:120px; margin-top:10px; border-radius:10px;">
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
        /* Supaya nama file tidak mendorong tombol */
        #file-name {
            color: white;
            opacity: 0.8;
            font-size: 15px;

            max-width: 250px;
            /* batas lebar text */
            white-space: nowrap;
            /* jangan turun baris */
            overflow: hidden;
            /* sembunyikan overflow */
            text-overflow: ellipsis;
            /* tambah … */
        }

        .custom-upload-box {
            width: 100%;
            height: 50px;
            border-radius: 40px;

            /* WARNA SAMA seperti input lain */
            background: rgba(255, 255, 255, 0.25);

            display: flex;
            align-items: center;
            padding: 0 10px;
            gap: 15px;
            position: relative;
            cursor: pointer;

            /* efek transparan lembut */
            backdrop-filter: blur(3px);
        }

        /* tombol putih "Choose File" tetap seperti gambar */
        .choose-btn {
            background: white;
            color: #333;
            padding: 8px 22px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }

        /* teks nama file mengikuti gaya input lain */
        #file-name {
            color: white;
            opacity: 0.8;
            font-size: 15px;
        }

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
        document.getElementById("image").addEventListener("change", function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let preview = document.getElementById("preview");
                preview.src = reader.result;
                preview.style.display = "block";
            }
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
        document.getElementById("image").addEventListener("change", function(event) {

            // 🔹 Nama File
            let fileName = event.target.files.length ? event.target.files[0].name : "No file chosen";
            document.getElementById("file-name").textContent = fileName;

            // 🔹 Preview Foto
            let reader = new FileReader();
            reader.onload = function() {
                let preview = document.getElementById("preview");
                preview.src = reader.result;
                preview.style.display = "block";
            }

            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]); // tampilkan foto
            }
        });
    </script>
@endsection
