@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create User</div>
                    <hr>

                    {{-- TAMPILKAN ERROR VALIDASI --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- FORM MULAI --}}
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" 
                                   class="form-control form-control-rounded"
                                   value="{{ old('name') }}"
                                   placeholder="Enter Your Name" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input name="address" type="text" 
                                   class="form-control form-control-rounded"
                                   value="{{ old('address') }}"
                                   placeholder="Enter Your Address">
                        </div>
                    
                        <div class="form-group">
                            <label for="phonenumber">No Handphone</label>
                            <input name="phonenumber" type="text" 
                                   class="form-control form-control-rounded"
                                   value="{{ old('phonenumber') }}"
                                   placeholder="Enter Your Mobile Number">
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" 
                                   class="form-control form-control-rounded"
                                   value="{{ old('email') }}"
                                   placeholder="Enter Email" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" 
                                   class="form-control form-control-rounded"
                                   placeholder="Enter Password" required>
                        </div>

                        {{-- ROLE --}}
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control form-control-rounded" required>
                                <option value="">-- Choose Role --</option>
                                <option value="waiters" {{ old('role')=='waiters' ? 'selected' : '' }}>Waiter</option>
                                <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
                                <option value="super_admin" {{ old('role')=='super_admin' ? 'selected' : '' }}>Super Admin</option>
                            </select>
                        </div>

                        {{-- STATUS --}}
                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select name="is_active" class="form-control form-control-rounded" required>
                                <option value="">-- Choose Status --</option>
                                <option value="active" {{ old('is_active')=='active' ? 'selected' : '' }}>Active</option>
                                <option value="nonactive" {{ old('is_active')=='nonactive' ? 'selected' : '' }}>Non Active</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="fileInput">Upload Foto</label>
                            <div class="custom-upload-box" onclick="document.getElementById('fileInput').click()">
                                <span class="choose-btn">Choose File</span>
                                <span id="file-name">No file chosen</span>
                                <input type="file" name="image" id="fileInput" accept="image/*">
                            </div>
                        </div>
                    
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-light btn-round px-5">Save</button>
                            <a href="{{ route('user.index') }}" class="btn btn-light btn-round px-5">Cancel</a>
                        </div>
                    </form>
                    {{-- FORM SELESAI --}}

                </div>
            </div>
        </div>

        <div class="overlay toggle-menu"></div>
    </div>

    {{-- STYLE --}}
    <style>
        .custom-upload-box {
            width: 100%;
            height: 50px;
            border-radius: 40px;
            background: rgba(255, 255, 255, 0.25);
            display: flex;
            align-items: center;
            padding: 0 10px;
            gap: 15px;
            position: relative;
            cursor: pointer;
            backdrop-filter: blur(3px);
        }

        .choose-btn {
            background: white;
            color: #333;
            padding: 8px 22px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }

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
        document.getElementById('fileInput').addEventListener('change', function() {
            const fileName = this.files.length ? this.files[0].name : "No file chosen";
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
@endsection