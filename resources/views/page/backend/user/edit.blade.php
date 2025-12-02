@extends('layout.backend.app')
@section('content')
<div class="clearfix"></div>
<div class="container-fluid d-flex justify-content-center">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="card-title">Edit User</div>
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
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- NAME --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" 
                            class="form-control form-control-rounded"
                            value="{{ old('name', $user->name) }}"
                            id="nameInput"
                            placeholder="Enter Name" required>
                    </div>

                    {{-- USERNAME (AUTO) --}}
                    <div class="form-group">
                        <label for="username">Username (auto)</label>
                        <input type="text" readonly
                            class="form-control form-control-rounded bg-light"
                            id="usernameAuto"
                            value="{{ old('username', $user->username) }}">
                    </div>

                    {{-- ADDRESS --}}
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input name="address" type="text" 
                            class="form-control form-control-rounded"
                            value="{{ old('address', $user->address) }}"
                            placeholder="Enter Address">
                    </div>

                    {{-- PHONE --}}
                    <div class="form-group">
                        <label for="phonenumber">No Handphone</label>
                        <input name="phonenumber" type="text" 
                            class="form-control form-control-rounded"
                            value="{{ old('phonenumber', $user->phonenumber) }}"
                            placeholder="Enter Mobile Number">
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" 
                            class="form-control form-control-rounded"
                            value="{{ old('email', $user->email) }}"
                            placeholder="Enter Email" required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-group">
                        <label for="password">Password (Kosongkan jika tidak diganti)</label>
                        <input name="password" type="password" 
                            class="form-control form-control-rounded"
                            placeholder="Enter new password">
                    </div>

                    {{-- ROLE --}}
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control form-control-rounded" required>
                            <option value="waiters" {{ $user->role=='waiters' ? 'selected' : '' }}>Waiter</option>
                            <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
                            <option value="super_admin" {{ $user->role=='super_admin' ? 'selected' : '' }}>Super Admin</option>
                        </select>
                    </div>

                    {{-- STATUS --}}
                    <div class="form-group">
                        <label for="is_active">Status</label>
                        <select name="is_active" class="form-control form-control-rounded" required>
                            <option value="active" {{ $user->is_active=='active' ? 'selected' : '' }}>Active</option>
                            <option value="nonactive" {{ $user->is_active=='nonactive' ? 'selected' : '' }}>Non Active</option>
                        </select>
                    </div>

                    {{-- FOTO --}}
                    <div class="form-group">
                        <label>Foto Lama</label><br>
                        <img src="{{ asset('storage/' . $user->image) }}" 
                             alt="User Image" 
                             width="90" 
                             style="border-radius:10px">
                    </div>

                    <div class="form-group">
                        <label for="fileInput">Upload Foto Baru</label>
                        <div class="custom-upload-box" onclick="document.getElementById('fileInput').click()">
                            <span class="choose-btn">Choose File</span>
                            <span id="file-name">No file chosen</span>
                            <input type="file" name="image" id="fileInput" accept="image/*">
                        </div>

                        {{-- PREVIEW --}}
                        <img id="previewImage" src="#" 
                            style="display:none; width:120px; margin-top:10px; border-radius:10px;">
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-light btn-round px-5">Update</button>
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
    // PREVIEW FOTO BARU
    document.getElementById('fileInput').addEventListener('change', function() {
        const file = this.files[0];
        const fileName = file ? file.name : "No file chosen";
        document.getElementById('file-name').textContent = fileName;

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('previewImage');
                img.style.display = 'block';
                img.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // AUTO GENERATE USERNAME DARI NAME
    document.getElementById("nameInput").addEventListener("input", function() {
        let username = this.value.toLowerCase().replace(/\s+/g, '');
        document.getElementById("usernameAuto").value = username;
    });
</script>
@endsection