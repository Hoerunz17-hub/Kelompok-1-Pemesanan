<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBackendController extends Controller
{
    public function login()
    {
        return view('page.auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Email atau password salah');
        }

        // Regenerasi session
        $request->session()->regenerate();

        // Ambil role user
        $role = Auth::user()->role;

        // Redirect berdasarkan role
        switch ($role) {
            case 'admin':
            case 'super_admin':
                return redirect('/adminpanel');

            case 'waiters':
                return redirect('/');

            default:
                Auth::logout();
                return redirect('/login')->with('error', 'Role tidak dikenali!');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout');
    }
}