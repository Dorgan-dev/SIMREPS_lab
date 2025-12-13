<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsoleController extends Controller
{
    public function index(Request $request)
    {
        $query = Console::with('room')->orderBy('id', 'desc');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $filterableColumns = ['kategori'];
        $query = Console::filter($request, $filterableColumns)->with('room')->orderBy('id', 'desc');
        $console['data'] = $query->paginate(10)->withQueryString();
        $console['rooms'] = Room::orderBy('name')->get();


        $auth = Auth::user();
        if ($auth->role != 1) {
            return view('_receptionist.console', $console);
        }
        return view('_admin.console', $console);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'nama_unit' => 'required|string|max:255',
            'nomor_unit' => 'required|string|max:100',
            'kategori' => 'required|string',
            'harga_per_jam' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Console::create($validated);

        return redirect()->route('admin.consoles.index')->with('success', 'Console ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $item = Console::findOrFail($id);

        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'nama_unit' => 'required|string|max:255',
            'nomor_unit' => 'required|string|max:100',
            'kategori' => 'required|string',
            'harga_per_jam' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $item->update($validated);

        return redirect()->route('admin.consoles.index')->with('success', 'Console diupdate.');
    }


    public function destroy($id)
    {
        $item = Console::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.consoles.index')->with('success', 'Console dihapus.');
    }
}
