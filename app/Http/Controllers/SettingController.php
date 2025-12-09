<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Console;
use App\Models\Setting;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // =========================
    // HALAMAN SETTINGS
    // =========================
    public function index(Request $request)
    {
        $logo = getSetting('site_logo');
        $rooms = Room::all();
        $consoles = Console::all(); // 🔥 TAMBAHAN

        // RUANGAN
        $roomImages = [];
        if ($request->room_id) {
            $room = Room::with('images')->find($request->room_id);
            $roomImages = $room ? $room->images : [];
        }

        // CONSOLE
        $consoleImages = [];
        if ($request->console_id) {
            $console = Console::with('images')->find($request->console_id);
            $consoleImages = $console ? $console->images : [];
        }

        return view('_admin.setting', compact(
            'logo',
            'rooms',
            'roomImages',
            'consoles',       // 🔥 WAJIB
            'consoleImages'   // 🔥 WAJIB
        ));
    }

    // =========================
    // UPLOAD FOTO ROOM
    // =========================
    public function uploadRoomImages(Request $request)
    {
        $request->validate([
            'room_id'   => 'required|exists:rooms,id',
            'images.*'  => 'image|max:2048'
        ]);

        $room = Room::findOrFail($request->room_id);

        foreach ($request->file('images') as $image) {
            $path = $image->store('rooms', 'public');

            $room->images()->create([
                'image_path' => $path,
                'is_primary' => false
            ]);
        }

        return back()->with('success', 'Foto room berhasil diupload');
    }

    // =========================
    // UPLOAD FOTO CONSOLE
    // =========================
    public function uploadConsoleImages(Request $request)
    {
        $request->validate([
            'console_id' => 'required|exists:consoles,id',
            'images.*'   => 'image|max:2048'
        ]);

        $console = Console::findOrFail($request->console_id);

        foreach ($request->file('images') as $image) {
            $path = $image->store('consoles', 'public');

            $console->images()->create([
                'image_path' => $path,
                'is_primary' => false
            ]);
        }

        return back()->with('success', 'Foto console berhasil diupload');
    }

    public function setPrimaryConsoleImage($id)
    {
        // Cari image berdasarkan id
        $image = Image::findOrFail($id);

        // Pastikan ini image milik console
        if ($image->imageable_type !== 'App\Models\Console') {
            return abort(400, 'Invalid image type');
        }

        // Reset semua image console terkait
        Image::where('imageable_id', $image->imageable_id)
            ->where('imageable_type', 'App\Models\Console')
            ->update(['is_primary' => false]);

        // Set image ini jadi primary
        $image->is_primary = true;
        $image->save();

        return redirect()->back()->with('success', 'Gambar utama console berhasil diubah');
    }

    // =========================
    // SET FOTO UTAMA (ROOM / CONSOLE)
    // =========================
    public function setPrimaryRoomImage($id)
    {
        $image = Image::findOrFail($id);

        Image::where('imageable_id', $image->imageable_id)
            ->where('imageable_type', $image->imageable_type)
            ->update(['is_primary' => false]);

        $image->update(['is_primary' => true]);

        return back()->with('success', 'Foto utama berhasil diperbarui');
    }

    // =========================
    // DELETE FOTO (ROOM / CONSOLE)
    // =========================
    public function deleteRoomImage($id)
    {
        $image = Image::findOrFail($id);

        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }

    // =========================
    // LOGO WEBSITE
    // =========================
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $setting = Setting::where('key', 'site_logo')->first();

        if ($setting && $setting->value && Storage::exists('public/' . $setting->value)) {
            Storage::delete('public/' . $setting->value);
        }

        $file = $request->file('logo');
        $filename = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('img'), $filename);

        $setting = Setting::firstOrCreate(['key' => 'site_logo']);
        $setting->value = 'img/' . $filename;
        $setting->save();

        return back()->with('success', 'Logo berhasil diperbarui.');
    }

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
