<?php
// app/Http/Controllers/Admin/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil
     */
    public function index()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 1: // Admin
                return view('_admin.profile');

            case 2: // Resepsionist
                return view('_resepsionist.profile');

            case 3: // Customer
                return view('_customer.profile');

            default:
                abort(403, 'Unauthorized');
        }
    }

    /**
     * Update data profil (tanpa foto)
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
     * Update foto profil
     */
    public function updatePhoto(Request $request)
    {
        // 1. VALIDASI FILE
        $request->validate([
            'profile_photo' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048', // 2MB
                'dimensions:min_width=100,min_height=100,max_width=4000,max_height=4000'
            ]
        ], [
            'profile_photo.required' => 'Silakan pilih foto terlebih dahulu',
            'profile_photo.image' => 'File harus berupa gambar',
            'profile_photo.mimes' => 'Format foto harus JPEG, PNG, JPG, atau WEBP',
            'profile_photo.max' => 'Ukuran foto maksimal 2MB',
            'profile_photo.dimensions' => 'Dimensi foto minimal 100x100px dan maksimal 4000x4000px',
        ]);

        $auth = Auth::user();
        $user = User::findOrfail($auth->id);

        try {
            // 2. HAPUS FOTO LAMA (jika ada)
            $user->deleteOldProfilePhoto();

            // 3. SIMPAN FOTO BARU
            $file = $request->file('profile_photo');

            // Generate nama file unik: user_1_1701234567.jpg
            $fileName = 'user_' . $user->id . '_' . time() . '.' . $file->extension();

            // Simpan ke storage/app/public/profile_photos/
            $path = $file->storeAs('profile_photos', $fileName, 'public');

            // 4. UPDATE DATABASE
            $user->update([
                'profile_photo' => $path
            ]);

            return redirect()->back()->with('success', 'Foto profil berhasil diperbarui! 🎉');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengupload foto: ' . $e->getMessage());
        }
    }

    /**
     * Hapus foto profil (kembali ke default)
     */
    public function deletePhoto()
    {
        $auth = Auth::user();
        $user = User::findOrfail($auth->id);

        try {
            // Hapus file dari storage
            $user->deleteOldProfilePhoto();

            // Update database (set null)
            $user->update([
                'profile_photo' => null
            ]);

            return redirect()->back()->with('success', 'Foto profil berhasil dihapus! Kembali ke avatar default.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }

    /**
     * GANTI PASSWORD
     */
    public function changePassword(Request $request)
    {
        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        // Validasi password baru dulu
        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        // CASE 1 : USER GOOGLE & BELUM PERNAH SET PASSWORD
        if ($user->google_id && !$user->password_set) {

            $user->update([
                'password' => Hash::make($request->new_password),
                'password_set' => 1,
            ]);

            return back()->with('success', 'Password berhasil dibuat!');
        }

        // CASE 2 : USER BIASA ATAU USER GOOGLE YANG SUDAH SET PASSWORD
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
}
