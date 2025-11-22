@extends('layout.backend.app')
@section('content')
<div class="clearfix"></div>
<div class="container-fluid d-flex justify-content-center">
    <div class="col-lg-7"> {{-- Form lebih lebar --}}
        <div class="card">
            <div class="card-body">

                <div class="card-title text-center mb-3" style="font-size: 22px; font-weight:600;">
                    Edit User
                </div>
                <hr>

                {{-- FORM MULAI --}}
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- FOTO PREVIEW DI TENGAH --}}
                    <div class="text-center mb-3">

                        @if ($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}"
                                class="rounded-circle shadow"
                                style="width:120px; height:120px; object-fit:cover;">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                style="width:120px; height:120px; opacity:0.7;">
                                <span style="font-size:13px;">No Image</span>
                            </div>
                        @endif

                    </div>

                    {{-- UPLOAD FOTO --}}
                    <div class="form-group mb-4">
                        <label for="fileInput" class="font-weight-bold">Upload Foto</label>

                        <div class="custom-upload-box" onclick="document.getElementById('fileInput').click()">
                            <span class="choose-btn">Choose File</span>
                            <span id="file-name">{{ $user->image ?? 'No file chosen' }}</span>
                            <input type="file" name="image" id="fileInput" accept="image/*">
                        </div>
                    </div>

                    {{-- NAME --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Name</label>
                        <input name="name" type="text" value="{{ $user->name }}"
                            class="form-control form-control-rounded" required>
                    </div>

                    {{-- ADDRESS --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <input name="address" type="text" value="{{ $user->address }}"
                            class="form-control form-control-rounded">
                    </div>

                    {{-- PHONE --}}
                    <div class="form-group">
                        <label class="font-weight-bold">No Handphone</label>
                        <input name="phonenumber" type="text" value="{{ $user->phonenumber }}"
                            class="form-control form-control-rounded">
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input name="email" type="email" value="{{ $user->email }}"
                            class="form-control form-control-rounded" required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Password (opsional)</label>
                        <input name="password" type="password" class="form-control form-control-rounded"
                            placeholder="Kosongkan jika tidak ingin ubah password">
                    </div>

                    {{-- ROLE --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Role</label>
                        <select name="role" class="form-control form-control-rounded" required>
                            <option value="waiter" {{ $user->role == 'waiter' ? 'selected' : '' }}>Waiter</option>
                            <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="super admin" {{ $user->role == 'super admin' ? 'selected' : '' }}>Super Admin</option>
                        </select>
                    </div>

                    {{-- STATUS --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Status</label>
                        <select name="is_active" class="form-control form-control-rounded" required>
                            <option value="active" {{ $user->is_active == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="nonactive" {{ $user->is_active == 'nonactive' ? 'selected' : '' }}>Non Active</option>
                        </select>
                    </div>

                    {{-- SUBMIT --}}
                    <div class="form-group mt-4 text-center">
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

<style>
    .custom-upload-box {
        width: 100%;
        height: 42px; /* lebih kecil */
        border-radius: 35px;
        background: rgba(255, 255, 255, 0.25);
        display: flex;
        align-items: center;
        padding: 0 10px;
        gap: 10px;
        cursor: pointer;
        backdrop-filter: blur(3px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        position: relative;
    }

    .choose-btn {
        background: white;
        color: #333;
        padding: 6px 16px; /* lebih kecil */
        border-radius: 18px;
        font-weight: 600;
        font-size: 13px; /* diperkecil */
        white-space: nowrap;
    }

    #file-name {
        color: white;
        opacity: 0.9;
        font-size: 14px; /* sedikit kecil */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .custom-upload-box input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
        left: 0;
        top: 0;
    }
</style>

<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        const fileName = this.files.length ? this.files[0].name : "No file chosen";
        document.getElementById('file-name').textContent = fileName;
    });
</script>
@endsection