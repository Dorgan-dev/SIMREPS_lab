<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view(match ($role) {
            1 => '_admin.profile',
            2 => '_receptionist.profile',
            3 => '_customer.profile',
            default => abort(403),
        });
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
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $user->update([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);


        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update foto profil
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([ // Validasi foto
            'profile_photo' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:5120', // 5MB
                'dimensions:min_width=100,min_height=100,max_width=4000,max_height=4000',
            ]
        ], [
            'profile_photo.required' => 'Silakan pilih foto terlebih dahulu',
            'profile_photo.image' => 'File harus berupa gambar',
            'profile_photo.mimes' => 'Format foto harus JPEG, PNG, JPG, atau WEBP',
            'profile_photo.max' => 'Ukuran foto maksimal 5MB',
            'profile_photo.dimensions' => 'Dimensi foto minimal 100x100px dan maksimal 4000x4000px',
        ]);

        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        try {
            $user->deleteOldProfilePhoto(); // Hapus foto lama jika ada

            $file = $request->file('profile_photo'); // Simpan foto baru
            $fileName = 'user_' . $user->id . '_' . time() . '.' . $file->extension();
            $path = $file->storeAs('profile_photos', $fileName, 'public');

            $user->update([ // Update database dengan path foto baru
                'profile_photo' => $path,
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
        $user = User::findOrFail($auth->id);

        try {
            $user->deleteOldProfilePhoto(); // Hapus foto lama dari penyimpanan

            $user->update([ // Set foto profil di database menjadi null
                'profile_photo' => null,
            ]);

            return redirect()->back()->with('success', 'Foto profil berhasil dihapus! Kembali ke avatar default.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }

    /**
     * Ganti password
     */
    public function changePassword(Request $request)
    {
        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        $request->validate([ // Validasi password baru
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($user->google_id && !$user->password_set) { // CASE 1: USER GOOGLE & BELUM PERNAH SET PASSWORD
            $user->update([
                'password' => Hash::make($request->new_password),
                'password_set' => 1,
            ]);

            return back()->with('success', 'Password berhasil dibuat!');
        }

        $request->validate([ // CASE 2: USER BIASA ATAU USER GOOGLE YANG SUDAH SET PASSWORD
            'current_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $user->password)) { // Validasi password lama
            return back()->withErrors([
                'current_password' => 'Password lama salah!',
            ]);
        }

        $user->update([ // Update password baru
            'password' => Hash::make($request->new_password),
            'password_set' => 1,
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}
