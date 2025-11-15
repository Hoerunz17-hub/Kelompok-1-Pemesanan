@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="mb-3">
            <a href="/user/create" class="btn-create">ADD</a>
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
                                    <th scope="col">ADDRES</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="{{ asset('assetsbackend/images/logo-icon.png') }}" alt="photo"
                                            class="img-fluid rounded" style="width:80px; height:50px; object-fit:cover;">

                                    </td>
                                    <td>Otto</td>
                                    <td>langen</td>
                                    <td>0876</td>
                                    <td>@mdo</td>
                                    <td>Admin</td>
                                    <td> <label class="switch">
                                            <input type="checkbox" class="toggle-status">
                                            <span class="slider round"></span>
                                        </label></td>
                                    <td>
                                        <a href="#" class="btn-view">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="/user/edit" class="btn-edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="#" class="btn-delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>

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
@endsection
