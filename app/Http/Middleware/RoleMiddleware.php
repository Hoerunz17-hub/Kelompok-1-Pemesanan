<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Cek apakah role user masuk daftar role yg diperbolehkan
        if (!in_array($user->role, $roles)) {
            Auth::logout();  // paksa logout
            return redirect()->route('login')->withErrors(['login' => 'Akses ditolak. Role tidak sesuai.']);
        }

        return $next($request);
    }
}