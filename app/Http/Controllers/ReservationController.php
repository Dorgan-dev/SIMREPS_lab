<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Console;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /* ============================================================
     | ADMIN - INDEX (default: riwayat)
     ============================================================ */
    public function index()
    {
        // Ambil data reservasi beserta console dan customer
        $reservations = Reservation::with(['console', 'customer'])
            ->latest()
            ->paginate(10);

        return view('_admin.reservation', [
            'reservations' => $reservations, // kirim variabel reservations ke view
            'mode' => 'riwayat'
        ]);
    }

    /* ============================================================
     | ADMIN - PENDING (Menunggu konfirmasi)
     ============================================================ */
    public function pending()
    {
        $reservations = Reservation::with('console.room')
            ->where('status', 'Menunggu')
            ->orderBy('waktu_mulai')
            ->get();

        return view('_admin.reservation', [
            'reservations' => $reservations,
            'mode' => 'pengajuan',
        ]);
    }

    /* ============================================================
     | ADMIN - STORE MANUAL
     ============================================================ */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'     => 'required|exists:users,id',
            'console_id'      => 'required|exists:consoles,id',
            'tanggal_bermain' => 'required|date',
            'waktu_mulai'     => 'required',
            'durasi_jam'      => 'required|integer|min:1',
            'disetujui_oleh'  => 'required|string|max:100',
            'status'          => 'required|in:Dipesan,Berlangsung,Selesai,Dibatalkan',
        ]);

        $start = Carbon::parse($request->tanggal_bermain . ' ' . $request->waktu_mulai);
        $end   = $start->copy()->addHours($request->durasi_jam);

        Reservation::create([
            'customer_id'     => $request->customer_id,
            'console_id'      => $request->console_id,
            'tanggal_bermain' => $request->tanggal_bermain,
            'waktu_mulai'     => $start,
            'waktu_selesai'   => $end,
            'durasi_jam'      => $request->durasi_jam,
            'disetujui_oleh'  => $request->disetujui_oleh,
            'status'          => $request->status,
        ]);

        return redirect()
            ->route('reservation.index')
            ->with('success', 'Data reservasi berhasil ditambahkan!');
    }

    /* ============================================================
     | CUSTOMER - MEMBUAT RESERVASI
     ============================================================ */
    public function customerStore(Request $request)
    {
        $validated = $request->validate([
            'console_id'      => 'required|exists:consoles,id',
            'tanggal_bermain' => 'required|date',
            'waktu_mulai'     => 'required|date_format:H:i',
            'durasi_jam'      => 'required|integer|min:1',
        ]);

        $start = Carbon::parse($validated['tanggal_bermain'] . ' ' . $validated['waktu_mulai'])
            ->timezone('Asia/Jakarta');

        $end = $start->copy()->addHours($validated['durasi_jam']);

        Reservation::create([
            'cust_id'         => Auth::id(),
            'console_id'      => $validated['console_id'],
            'tanggal_bermain' => $validated['tanggal_bermain'],
            'waktu_mulai'     => $start,
            'waktu_selesai'   => $end,
            'durasi_jam'      => $validated['durasi_jam'],
            'status'          => 'Menunggu',
        ]);

        // Update status console
        $console = Console::find($validated['console_id']);
        if ($console) {
            $console->status = 'Dipesan';
            $console->save();
        }

        return back()->with('success', 'Reservasi berhasil dibuat!');
    }

    /* ============================================================
     | ADMIN - SETUJUI / TOLAK
     ============================================================ */
    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'status'         => 'Diterima',
            'disetujui_oleh' => Auth::id(),
        ]);

        return back()->with('success', 'Reservasi disetujui.');
    }

    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'status'         => 'Ditolak',
            'disetujui_oleh' => Auth::id(),
        ]);

        return back()->with('error', 'Reservasi ditolak.');
    }

    /* ============================================================
     | ADMIN - SEDANG BERJALAN
     ============================================================ */
    public function running()
    {
        $now = now();

        $reservations = Reservation::with('console.room')
            ->whereIn('status', ['Berlangsung', 'Diterima'])
            ->where('waktu_selesai', '>', $now)
            ->orderBy('waktu_mulai')
            ->get();

        return view('_admin.reservation', [
            'reservations' => $reservations,
            'mode' => 'berjalan',
        ]);
    }

    /* ============================================================
     | ADMIN - RIWAYAT
     ============================================================ */
    public function history()
    {
        $reservations = Reservation::with('console.room')
            ->whereIn('status', ['Selesai', 'Ditolak', 'Dibatalkan'])
            ->orderBy('waktu_mulai', 'desc')
            ->get();

        return view('_admin.reservation', [
            'reservations' => $reservations,
            'mode' => 'riwayat',
        ]);
    }

    /* ============================================================
     | JADWAL HARI INI
     ============================================================ */
    public function today()
    {
        $today = Carbon::today()->toDateString();

        $reservations = Reservation::with(['console.room'])
            ->whereDate('waktu_mulai', $today)
            ->orderBy('waktu_mulai')
            ->get();

        return view('guest.reservations-today', compact('reservations'));
    }

    /* ============================================================
     | JADWAL MENDATANG
     ============================================================ */
    public function upcoming()
    {
        $today = Carbon::today()->toDateString();

        $reservations = Reservation::with(['console.room'])
            ->whereDate('waktu_mulai', '>', $today)
            ->orderBy('waktu_mulai')
            ->get();

        return view('guest.reservations-upcoming', compact('reservations'));
    }

    /* ============================================================
     | HAPUS RESERVASI
     ============================================================ */
    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();

        return back()->with('success', 'Data reservasi berhasil dihapus!');
    }
}
