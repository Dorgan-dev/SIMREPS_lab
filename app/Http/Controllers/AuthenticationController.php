<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            return redirect()->back();
        }


        return view('guest.login');
    }

    /**
     * LOGIN MANUAL
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->back();
        }

        return back()->with('error', 'Username atau password salah.');
    }


    /**
     * REGISTER
     */
    public function register(Request $request)
    {
        // Validasi input untuk registrasi
        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username',
            'email'         => 'required|string|email|max:255|unique:users,email',
            'no_hp'         => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        // Membuat pengguna baru
        User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password'      => Hash::make($request->password),
            'role'          => 3  // Default role untuk customer
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('home.login')->with('success', 'Akun berhasil dibuat! Silahkan login.');
    }

    /**
     * GOOGLE LOGIN - Redirect ke Google
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * GOOGLE CALLBACK - Menangani callback dari Google
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Cari user berdasarkan email
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name'     => $googleUser->name,
                'email'    => $googleUser->email,
                'username' => explode('@', $googleUser->email)[0],
                'password' => Hash::make(Str::random(16)),
                'google_id' => $googleUser->id,     // penting!
                'password_set' => false,            // tandai: belum set password manual
                'role'     => 3,
            ]);
        } else {
            // Update google_id kalau kosong
            if (!$user->google_id) {
                $user->google_id = $googleUser->id;
                $user->save();
            }
        }

        Auth::login($user);

        return $this->redirectByRole($user->role);
    }



    /**
     * FUNGSI BANTUAN - Redirect berdasarkan role pengguna
     */
    private function redirectByRole($role)
    {
        return match ($role) {
            1 => redirect()->route('admin.dashboard'),  // Admin
            2 => redirect()->route('admin.dashboard'),  // Admin sementara
            3 => redirect()->route('customer.dashboard'),  // Customer
            default => redirect()->route('home'),  // Halaman default jika tidak ada role yang dikenali
        };
    }

    /**
     * LOGOUT
     */
    public function logout()
    {
        // Logout pengguna dan invalidate session
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home.login');
    }
}
