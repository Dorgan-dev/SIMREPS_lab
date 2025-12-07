<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuest
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user SUDAH login → redirect sesuai role
        if (Auth::check()) {

            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role == 2) {
                return redirect()->route('user.reseptionis');
            }

            return redirect()->route('customer.index');
        }

        // Jika user belum login → lanjut ke halaman login
        return $next($request);
    }
}
