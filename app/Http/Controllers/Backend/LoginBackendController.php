<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBackendController extends Controller
{
    // Halaman Login
    public function login()
    {
        return view('page.auth.login');
    }

    // Proses Login
    public function authenticate(Request $request)
    {
        // Validasi input (TERMASUK ROLE)
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required|in:waiters,admin,super_admin',
        ]);

        // Cek email + password SAJA
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()
                ->withErrors(['login' => 'Email atau password salah'])
                ->withInput();
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // 🔥 CEK ROLE FORM vs DATABASE
        if ($user->role !== $request->role) {
            Auth::logout();
            return back()
                ->withErrors(['login' => 'Role tidak sesuai dengan akun'])
                ->withInput();
        }

        // 🔒 CEK STATUS AKTIF
        if ($user->is_active !== 'active') {
            Auth::logout();
            return back()
                ->withErrors(['login' => 'Akun anda nonaktif'])
                ->withInput();
        }

        // ✅ REDIRECT SESUAI ROLE
        switch ($user->role) {
            case 'waiters':
                return redirect()->route('frontend.home');

            case 'admin':
            case 'super_admin':
                return redirect()->route('dashboard');

            default:
                Auth::logout();
                return back()
                    ->withErrors(['login' => 'Role tidak dikenali']);
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}