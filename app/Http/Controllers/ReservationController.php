<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Console;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // ============================
    // ADMIN - INDEX
    // ============================
    public function index()
    {
        $data = Reservation::with(['console.room'])
            ->latest()
            ->paginate(10);

        $mode = 'riwayat';

        return view('_admin.reservation', [
            'reservations' => $data,
            'mode' => 'pengajuan' // atau berjalan / riwayat
        ]);
    }

    public function pending()
    {
        $reservations = Reservation::with('console.room', 'approver')
            ->where('status', 'menunggu')
            ->orderBy('waktu_mulai', 'asc')
            ->get();

        return view('_admin.reservation', [
            'reservations' => $reservations,
            'mode' => 'pengajuan',
        ]);
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
        $validated = $request->validate([
            'console_id' => 'required|exists:consoles,id',
            'tanggal_bermain' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'durasi_jam' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);

        $start = \Carbon\Carbon::parse($validated['tanggal_bermain'] . ' ' . $validated['waktu_mulai'])
            ->timezone('Asia/Jakarta');

        $end = $start->copy()->addHours((int) $validated['durasi_jam']);

        $reservation = Reservation::create([
            'cust_id' => Auth::id(),
            'console_id' => $validated['console_id'],
            'waktu_mulai' => $start,
            'waktu_selesai' => $end,
            'durasi_jam' => (int) $validated['durasi_jam'],
            'status' => 'Menunggu',
        ]);

        // Update status console jadi "Dipesan"
        $console = Console::find($validated['console_id']);
        if ($console) {
            $console->status = 'Dipesan'; // pastikan 'Dipesan' ada di enum status console
            $console->save();
        }

        return back()->with('success', 'Reservasi berhasil dibuat dan status console diperbarui!');
    }

    public function pengajuan()
    {
        $data = Reservation::with(['console.room'])
            ->where('status', 'Menunggu')
            ->orderBy('waktu_mulai', 'asc')
            ->paginate(10);

        return view('_admin.reservation', [
            'data' => $data,
            'mode' => 'pengajuan'
        ]);
    }



    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'status' => 'Diterima',
            'disetujui_oleh' => Auth::user()->id
        ]);

        return back()->with('success', 'Reservasi disetujui.');
    }


    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'status' => 'Ditolak',
            'disetujui_oleh' => Auth::user()->id
        ]);

        return back()->with('error', 'Reservasi ditolak.');
    }

    public function running()
    {
        $now = now();

        $reservations = Reservation::with('console.room', 'approver')
            ->whereIn('status', ['Berlangsung', 'Diterima'])
            ->where('waktu_selesai', '>', $now)
            ->orderBy('waktu_mulai', 'asc')
            ->get();

        return view('_admin.reservation', [
            'reservations' => $reservations,
            'mode' => 'berjalan',
        ]);
    }

    public function history()
    {
        $reservations = Reservation::with('console.room', 'approver')
            ->whereIn('status', ['Selesai', 'Ditolak', 'Dibatalkan'])
            ->orderBy('waktu_mulai', 'desc')
            ->get();

        return view('_admin.reservation', [
            'reservations' => $reservations,
            'mode' => 'riwayat',
        ]);
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

    // ✅ JADWAL HARI INI
    public function today()
    {
        $today = Carbon::today();

        $reservations = Reservation::with(['console.room'])
            ->whereDate('waktu_mulai', $today)
            ->orderBy('waktu_mulai', 'asc')
            ->get();

        return view('guest.reservations-today', compact('reservations'));
    }

    // ✅ RESERVASI MENDATANG
    public function upcoming()
    {
        $today = Carbon::today();

        $reservations = Reservation::with(['console.room'])
            ->whereDate('waktu_mulai', '>', $today)
            ->orderBy('waktu_mulai', 'asc')
            ->get();

        return view('guest.reservations-upcoming', compact('reservations'));
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
