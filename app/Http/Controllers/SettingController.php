<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // Halaman pengaturan
    public function index()
    {
        $logo = getSetting('site_logo');
        return view('_admin.setting', compact('logo'));
    }

    // Upload / Update logo
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $setting = Setting::where('key', 'site_logo')->first();

        // Hapus file lama jika ada
        if ($setting && $setting->value && Storage::exists('public/' . $setting->value)) {
            Storage::delete('public/' . $setting->value);
        }

        // Upload file baru
        $file = $request->file('logo');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Simpan langsung ke public/img
        $file->move(public_path('img'), $filename);

        // Simpan path di database
        $setting = Setting::firstOrCreate(['key' => 'site_logo']);
        $setting->value = 'img/' . $filename;
        $setting->save();


        return back()->with('success', 'Logo berhasil diperbarui.');
    }

    // Hapus logo
    public function deleteLogo()
    {
        $setting = Setting::where('key', 'site_logo')->first();

        if ($setting->value && Storage::exists('public/' . $setting->value)) {
            Storage::delete('public/' . $setting->value);
        }

        $setting->value = null;
        $setting->save();

        return back()->with('success', 'Logo berhasil dihapus.');
    }
}
