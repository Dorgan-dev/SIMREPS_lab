<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // ============================
    // ADMIN - INDEX
    // ============================
    public function index(Request $request)
    {
        $filterableColumns   = ['durasi_jam', 'waktu_mulai', 'waktu_selesai', 'status'];
        $reservation['data'] = Reservation::filter($request, $filterableColumns)->paginate(10)->withQueryString();

        return view('_admin.reservation', $reservation);
    }

    // ============================
    // ADMIN - STORE
    // ============================
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'     => 'required|numeric|exists:users,id',
            'console_id'      => 'required|numeric|exists:consoles,id',
            'tanggal_bermain' => 'required|date',
            'waktu_mulai'     => 'required',
            'durasi_jam'      => 'required|integer|min:1',
            'disetujui_oleh'  => 'required|string|max:100',
            'status'          => 'required|in:Dipesan,Berlangsung,Selesai,Dibatalkan',
        ]);

        // Hitung waktu mulai & selesai
        $start = Carbon::parse($request->tanggal_bermain . ' ' . $request->waktu_mulai);
        $end   = $start->copy()->addHours($request->durasi_jam);

        Reservation::create([
            'customer_id'    => $request->customer_id,
            'console_id'     => $request->console_id,
            'tanggal_bermain' => $request->tanggal_bermain,
            'waktu_mulai'    => $start,
            'durasi_jam'     => $request->durasi_jam,
            'waktu_selesai'  => $end,
            'disetujui_oleh' => $request->disetujui_oleh,
            'status'         => $request->status,
        ]);

        return redirect()
            ->route('reservation.index')
            ->with('success', 'Data reservasi berhasil ditambahkan!');
    }


    // ============================
    // CUSTOMER - STORE
    // ============================
    public function customerStore(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home.login')->with('error', 'Silakan login dulu');
        }

        $validated = $request->validate([
            'tanggal_bermain' => 'required|date',
            'waktu_mulai'     => 'required',
            'durasi_jam'      => 'required|integer|min:1',
            'console_id'      => 'required|integer',
            'status'          => 'required'
        ]);

        $start = Carbon::parse(
            $validated['tanggal_bermain'] . ' ' . $validated['waktu_mulai']
        )->timezone('Asia/Jakarta');

        $end = $start->copy()->addHours((int) $validated['durasi_jam']);

        Reservation::create([
            'cust_id'        => Auth::id(),
            'console_id'     => $validated['console_id'],
            'tanggal_bermain' => $validated['tanggal_bermain'],
            'waktu_mulai'    => $start,
            'waktu_selesai'  => $end,
            'durasi_jam'     => $validated['durasi_jam'],
            'status'         => $validated['status'],
        ]);

        return back()->with('success', 'Reservasi berhasil dibuat!');
    }
    // ============================
    // ADMIN - UPDATE
    // ============================
    public function update(Request $request, string $id)
    {
        $request->validate([
            'customer_id'     => 'required|numeric',
            'console_id'      => 'required|numeric',
            'tanggal'         => 'required|date',
            'waktu_mulai'     => 'required',
            'durasi_jam'      => 'required|integer|min:1',
            'disetujui_oleh'  => 'required|string',
            'status'          => 'required|in:Dipesan,Berlangsung,Selesai,Dibatalkan',
        ]);

        $reservation = Reservation::findOrFail($id);

        $start = Carbon::parse($request->tanggal . ' ' . $request->waktu_mulai);
        $end   = $start->copy()->addHours($request->durasi_jam);

        $reservation->update([
            'customer_id'   => $request->customer_id,
            'console_id'    => $request->console_id,
            'tanggal'       => $request->tanggal,
            'waktu_mulai'    => $start,
            'durasi_jam'     => $request->durasi_jam,
            'waktu_selesai'  => $end,
            'disetujui_oleh' => $request->disetujui_oleh,
            'status'         => $request->status,
        ]);

        return back()->with('success', 'Data reservasi berhasil diperbarui!');
    }

    // ============================
    // ADMIN - DELETE
    // ============================
    public function destroy(string $id)
    {
        Reservation::findOrFail($id)->delete();
        return back()->with('success', 'Data reservasi berhasil dihapus!');
    }
}
