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

        if (!Auth::check()) {

            if (Auth::user()->role == 1) {
                return redirect()->route('admin.index');
            }

            if (Auth::user()->role == 2) {
                return redirect()->route('resepsionis.index');
            }

            return redirect()->route('customer.index');
        }
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

        // $user = User::where('email', $request->email)->first();
        // if ($user && Hash::check($request->password, $user->password)) {

        //         if (Auth::user()->role == 1) {
        //             return redirect()->route('admin.index');
        //         }

        //         if (Auth::user()->role == 2) {
        //             return redirect()->route('resepsionis.index');
        //         }

        //         return redirect()->route('customer.index');
        // }

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 1) {
                return redirect()->route('admin.index');
            }

            if (Auth::user()->role == 2) {
                return redirect()->route('resepsionis.index');
            }

            return redirect()->route('customer.index');
        }

        return back()->with('error', 'Username atau password salah.');
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
