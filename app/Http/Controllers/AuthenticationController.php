<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->role == 1) {
                return redirect()->route('admin');
            }

            if (Auth::user()->role == 2) {
                return redirect()->route('user.reseptionis');
            }

            return redirect()->route('customer.index');
        }
        return view('guest.login');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Jika user masuk karena diarahkan middleware (intended), gunakan itu
            if (session('url.intended')) {
                return redirect()->intended();
            }

            // Kalau tidak ada intended URL (misalnya login manual),
            // arahkan sesuai role
            return match (Auth::user()->role) {
                1 => redirect()->route('admin'),
                2 => redirect()->route('resepsionis.index'),
                default => redirect()->route('customer.index'),
            };
        }

        return back()->with('error', 'Username atau password salah.')->withInput();
    }
    /**
     * Proses Register
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username',
            'email'         => 'required|string|email|max:255|unique:users,email',
            'no_hp'         => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password'      => Hash::make($request->password),
            'role'          => 3
        ]);

        // 3. Arahkan ke halaman login
        return redirect()->route('home.login')->with('success', 'Akun berhasil dibuat! Silahkan login untuk melanjutkan.');
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home.login');
    }
}
