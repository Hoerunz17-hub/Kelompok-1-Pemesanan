@extends('layout.backend.app')
@section('content')
<div class="clearfix"></div>

<div class="container-fluid d-flex justify-content-center">
    <div class="col-lg-6">

        <div class="card shadow-lg">
            <div class="card-body">

                <h3 class="text-center mb-3" style="font-weight:600;">Detail User</h3>
                <hr>

                {{-- FOTO USER --}}
                <div class="text-center mb-3">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}"
                             class="rounded-circle shadow"
                             style="width:140px; height:140px; object-fit:cover;">
                    @else
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center shadow"
                             style="width:140px; height:140px;">
                            <span style="font-size:14px; opacity:0.7;">No Image</span>
                        </div>
                    @endif
                </div>

                {{-- DATA LIST --}}
                <ul class="list-group detail-list">

                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Name</strong>
                        <span>{{ $user->name }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Address</strong>
                        <span>{{ $user->address ?? '-' }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <strong>No Handphone</strong>
                        <span>{{ $user->phonenumber ?? '-' }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Email</strong>
                        <span>{{ $user->email }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Role</strong>
                        <span class="badge badge-info p-2">{{ $user->role }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Status</strong>
                        <span class="badge {{ $user->is_active == 'active' ? 'badge-success' : 'badge-danger' }} p-2">
                            {{ ucfirst($user->is_active) }}
                        </span>
                    </li>

                </ul>

                {{-- BUTTON --}}
                <div class="text-center mt-4">
                    <a href="{{ route('user.index') }}" class="btn btn-light btn-round px-5">Back</a>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-round px-5">Edit</a>
                </div>

            </div>
        </div>
    </div>

    <div class="overlay toggle-menu"></div>
</div>

<style>
    .detail-list .list-group-item {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        border: none;
        border-radius: 10px;
        margin-bottom: 10px;
        backdrop-filter: blur(3px);
    }
</style>

@endsection