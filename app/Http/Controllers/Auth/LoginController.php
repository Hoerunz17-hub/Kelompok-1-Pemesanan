<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan Halaman Login
    public function index()
    {
        return view('page.auth.login');
    }

    // Proses Login
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4',
            'role'     => 'required|in:waiters,admin,super_admin',
        ]);

        // Cek email + password
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['login' => 'Email atau password salah'])->withInput();
        }

        $user = Auth::user();

        // Cek role yang dipilih harus sama dengan role user
        if ($user->role !== $request->role) {
            Auth::logout();
            return back()->withErrors(['login' => 'Role tidak sesuai'])->withInput();
        }

        // Cek status aktif
        if ($user->is_active !== 'active') {
            Auth::logout();
            return back()->withErrors(['login' => 'Akun anda nonaktif'])->withInput();
        }

        // Redirect sesuai role
        if ($user->role === 'waiters') {
            return redirect()->route('frontend.home');
        }

        if ($user->role === 'admin' || $user->role === 'super_admin') {
            // route yang benar → dashboard
            return redirect()->route('dashboard');
        }

        Auth::logout();
        return back()->withErrors(['login' => 'Role tidak dikenali']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
}