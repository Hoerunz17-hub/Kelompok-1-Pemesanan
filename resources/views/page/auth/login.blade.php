<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Login</title>

  <link href="{{ asset('assetsbackend/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assetsbackend/css/app-style.css') }}" rel="stylesheet"/>
</head>

<body class="bg-theme bg-theme1">

<div id="wrapper">
  <div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
      <div class="card-content p-2">

        <div class="text-center mb-3">
          <img src="{{ asset('assetsbackend/images/logo-icon.png') }}" alt="logo">
        </div>

        <div class="card-title text-uppercase text-center py-3">Login</div>

        <form method="POST" action="{{ route('login.post') }}">
          @csrf

          {{-- Email --}}
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control input-shadow"
                   placeholder="Enter Email" value="{{ old('email') }}" required>
          </div>

          {{-- Password --}}
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password"
                   class="form-control input-shadow" required>
          </div>

          {{-- Role --}}
          <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control" required>
              <option value="">-- Select Role --</option>
              <option value="waiters">Waiters</option>
              <option value="admin">Admin</option>
              <option value="super_admin">Super Admin</option>
            </select>
          </div>

          {{-- Error Message --}}
          @error('login')
            <span class="text-danger small">{{ $message }}</span>
          @enderror

          {{-- Submit --}}
          <button type="submit" class="btn btn-light btn-block mt-3">
            Sign In
          </button>

        </form>

      </div>
    </div>
  </div>
</div>

</body>
</html>