@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="mb-3">
            <a href="{{ route('user.create') }}" class="btn-create">ADD</a>
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
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($users as $index => $user)
                                    <tr>
                                        <th scope="row">{{ $users->firstItem() + $index }}</th>

                                        {{-- IMAGE BULAT --}}
                                        <td>
                                            @if ($user->image)
                                                <img src="{{ asset('storage/' . $user->image) }}"
                                                    class="rounded-circle"
                                                    style="width:60px; height:60px; object-fit:cover;"
                                                    alt="photo">
                                            @else
                                                <img src="{{ asset('assetsbackend/images/logo-icon.png') }}"
                                                    class="rounded-circle"
                                                    style="width:60px; height:60px; object-fit:cover;"
                                                    alt="photo">
                                            @endif
                                        </td>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->address ?? '-' }}</td>
                                        <td>{{ $user->phonenumber ?? '-' }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>

                                        {{-- STATUS --}}
                                        <td>
                                            <form action="{{ route('user.toggle', $user->id) }}" method="POST" class="toggle-form">
                                                @csrf

                                                <label class="switch">
                                                    <input type="checkbox" 
                                                           onchange="this.form.submit()" 
                                                           {{ $user->is_active == 'active' ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </form>
                                        </td>

                                        {{-- ACTION --}}
                                        <td>
                                            {{-- VIEW --}}
                                            <a href="{{ route('user.show', $user->id) }}" class="btn-view">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            {{-- EDIT --}}
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            {{-- DELETE --}}
                                            <form action="{{ route('user.destroy', $user->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')

                                                <button onclick="return confirm('Yakin ingin menghapus user?')"
                                                    class="btn-delete" style="border:none; cursor:pointer;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data user.</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                        {{-- PAGINATION --}}
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="overlay toggle-menu"></div>
    </div>

    {{-- STYLE --}}
    <style>
        .mb-3 {
            width: 100%;
            padding: 20px;
            border-radius: 20px;
            display: flex;
            justify-content: flex-end;
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
        .btn-create:hover { opacity: 0.92; transform: translateY(-2px); }

        .switch { position: relative; width: 60px; height: 34px; }
        .switch input { display: none; }
        .slider {
            position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
            background-color: #ccc; transition: .4s; border-radius: 34px;
        }
        .slider:before {
            position: absolute; content: ""; height: 26px; width: 26px; left: 4px; bottom: 4px;
            background-color: white; transition: .4s; border-radius: 50%;
        }
        input:checked + .slider { background-color: #53DFD3; }
        input:checked + .slider:before { transform: translateX(26px); }

        .btn-view, .btn-edit, .btn-delete {
            display: inline-flex; justify-content: center; align-items: center;
            width: 45px; height: 28px; border-radius: 40px; color: white;
            font-size: 17px; text-decoration: none; transition: 0.2s; margin-right: 5px;
        }
        .btn-view { background: linear-gradient(to right, #1e3c72, #2a5298); }
        .btn-edit { background: linear-gradient(to right, #4a4a4a, #3b3b3b); }
        .btn-delete { background: linear-gradient(to right, #8d2245, #a02a58); }
    </style>
@endsection