<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('guest.login');
        }
        return view('_admin.index');
    }

    public function customer()
    {
        $user = User::all();
        return view('_admin.customer', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function profile()
    {
        return view('_admin.profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');
        $user->jenis_kelamin = $request->input('jenis_kelamin');

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * GANTI PASSWORD
     */
    public function changePassword(Request $request)
    {
        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        // Validasi password baru
        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        // CASE 1 : USER GOOGLE BELUM PERNAH SET PASSWORD
        if ($user->google_id && !$user->password_set) {

            $user->update([
                'password' => Hash::make($request->new_password),
                'password_set' => true,     // tandai sudah punya password manual
            ]);

            return back()->with('success', 'Password berhasil dibuat!');
        }

        // CASE 2 : USER GOOGLE SUDAH SET PASSWORD / USER BIASA
        $request->validate([
            'current_password' => 'required',
        ]);
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama salah!',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
            'password_set' => 1,
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
