@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create User</div>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="fileInput">Upload Foto</label>

                            <div class="custom-upload-box">
                                <span class="choose-btn">Choose File</span>
                                <span id="file-name">No file chosen</span>
                                <input type="file" id="fileInput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-6">Name</label>
                            <input type="text" class="form-control form-control-rounded" id="input-6"
                                placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label for="input-7">PRICE</label>
                            <input type="number" class="form-control form-control-rounded" id="input-7">
                        </div>




                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5"><i></i>
                                Submit</button>
                            <button type="cancel" class="btn btn-light btn-round px-5"><i></i>
                                cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="overlay toggle-menu"></div>
    </div>
    <style>
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
@endsection
