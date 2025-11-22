<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation  = Reservation::all();
        return view('_admin.reservation', compact('reservation'));
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
        // dd($request->all());

        $mulai = Carbon::createFromFormat('H:i', $request->waktu_mulai);
        $durasi = Carbon::createFromFormat('H:i', $request->durasi_jam);

        $request->validate([
            'cust_id' => 'required|numeric',
            'console_id' => 'required|numeric',
            'waktu_mulai' => 'required|date_format:H:i',
            'durasi_jam' => 'required|date_format:H:i',
            'disetujui_oleh' => 'required|string|max:100',
            'status' => 'required|in:Dipesan,Berlangsung,Selesai,Dibatalkan',
        ]);

        // Reservation::create($request->all());
        Reservation::create([
            'cust_id' => $request->cust_id,
            'console_id' => $request->console_id,
            'waktu_mulai' => $mulai,
            'durasi_jam' => $durasi,
            'disetujui_oleh' => $request->disetujui_oleh,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data reservasi berhasil ditambahkan!');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cust_id'        => 'required|numeric',
            'console_id'     => 'required|numeric',
            'waktu_mulai'    => 'required|date_format:H:i',
            'durasi_jam'     => 'required|date_format:H:i',
            'disetujui_oleh' => 'required',
            'status'         => 'required|in:Dipesan,Berlangsung,Selesai,Dibatalkan',
        ]);

        $reservation = Reservation::findOrFail($id);

        // Convert H:i → H:i:s (wajib agar update bekerja)
        $waktuMulai = $request->waktu_mulai . ':00';
        $durasiJam = $request->durasi_jam . ':00';

        // Update data
        $reservation->update([
            'cust_id'        => $request->cust_id,
            'console_id'     => $request->console_id,
            'waktu_mulai'    => $waktuMulai,
            'durasi_jam'     => $durasiJam,
            'disetujui_oleh' => $request->disetujui_oleh,
            'status'         => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data reservasi berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->back()->with('success', 'Data reservasi berhasil dihapus!');
    }
}
