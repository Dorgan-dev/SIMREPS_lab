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
        return view('_admin.profile.index');
    }

    /**
     * Update data profil (tanpa foto)
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user1 = User::findOrfail($user->id);

        $user1->update([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Data profil berhasil diperbarui!');
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
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $auth = Auth::user();
        $user = User::findOrfail($auth->id);

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Password saat ini wajib diisi',
            'current_password.current_password' => 'Password saat ini tidak sesuai',
            'password.required' => 'Password baru wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }
}
