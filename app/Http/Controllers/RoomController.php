<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        $data = Room::paginate(10);
        if ($auth->role != 1) {
            return view('_reseptionist.room', compact('data'));
        }
        return view('_admin.room', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'category'       => 'nullable|string|max:255',
            'description'    => 'nullable|string',
        ]);

        // Upload Gambar
        $imageName = null;

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/rooms'), $imageName);
        }

        // Simpan ke database
        Room::create([
            'name'           => $validated['name'],
            'category'       => $validated['category'],
            'description'    => $validated['description'],
        ]);

        return redirect()->back()->with('success', 'Room berhasil ditambahkan!');
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
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Ambil data ruangan berdasarkan id
        $room = Room::findOrFail($id);

        // Update data
        $room->update([
            'name'           => $validated['name'],
            'category'       => $validated['category'] ?? 'Standard', // default Standard
            'description'    => $validated['description'],
        ]);

        return redirect()->back()->with('success', 'Room berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->back()->with('success', 'Data ruangan berhasil dihapus!');
    }
}
