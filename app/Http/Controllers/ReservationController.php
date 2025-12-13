<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Console;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // ============================================================
    // INDEX - menampilkan daftar reservasi (default: riwayat)
    // ============================================================
    public function index()
    {
        $user = auth()->user();

        // Admin view - Ambil semua reservasi terbaru
        if ($user->isAdmin()) {
            $reservations = Reservation::with(['console.room', 'customer'])
                ->latest()
                ->paginate(10); // pakai pagination agar tidak load semua data sekaligus

            return view('_admin.reservation', [
                'reservations' => $reservations,
                'mode' => 'riwayat',
            ]);
        }

        // Receptionist view - Ambil reservasi yang sedang berlangsung atau diterima
        $now = now();
        $reservations = Reservation::with('console.room')
            ->whereIn('status', ['Berlangsung', 'Diterima'])
            ->where('waktu_selesai', '>', $now)
            ->orderBy('waktu_mulai')
            ->get();

        // Tentukan mode berdasarkan role
        $mode = 'berjalan'; // default mode

        return view('_receptionist.reservation', [
            'reservations' => $reservations,
            'mode' => $mode,
        ]);
    }

    // ============================================================
    // PENDING - reservasi menunggu konfirmasi
    // ============================================================
    public function pending()
    {
        $user = Auth::user();

        $reservations = Reservation::with(['console.room', 'customer'])
            ->where('status', 'Menunggu')
            ->orderBy('waktu_mulai')
            ->get();

        if ($user->isAdmin()) {
            return view('_admin.reservation', [
                'reservations' => $reservations,
                'mode' => 'pengajuan',
            ]);
        }

        return view('_receptionist.reservation', [
            'reservations' => $reservations,
            'mode' => 'pengajuan',
        ]);
    }

    // ============================================================
    // CUSTOMER STORE - buat reservasi baru
    // ============================================================
    public function customerStore(Request $request)
    {
        $validated = $request->validate([
            'console_id'      => 'required|exists:consoles,id',
            'tanggal_bermain' => 'required|date',
            'waktu_mulai'     => 'required|date_format:H:i',
            'durasi_jam'      => 'required|integer|min:1',
        ]);

        // Gabungkan tanggal + jam jadi datetime
        $start = Carbon::parse($validated['tanggal_bermain'] . ' ' . $validated['waktu_mulai'])
            ->setTimezone(config('app.timezone', 'Asia/Jakarta'));

        $end = $start->copy()->addHours($validated['durasi_jam']);

        Reservation::create([
            'cust_id'       => Auth::id(),
            'console_id'    => $validated['console_id'],
            'waktu_mulai'   => $start,
            'waktu_selesai' => $end,
            'durasi_jam'    => $validated['durasi_jam'],
            'status'        => 'Menunggu',
        ]);

        // Update status console
        $console = Console::find($validated['console_id']);
        if ($console) {
            $console->status = 'Dipesan';
            $console->save();
        }

        return back()->with('success', 'Reservasi berhasil dibuat!');
    }

    // ============================================================
    // APPROVE reservasi (Admin/role yang punya izin)
    // ============================================================
    public function approve($id)
    {
        $user = auth()->user();
        if (!$user || !$user->canApproveReservation()) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'status' => 'Diterima',
            'disetujui_oleh' => $user->id,
        ]);

        return back()->with('success', 'Reservasi disetujui.');
    }

    // ============================================================
    // REJECT reservasi (Admin/role yang punya izin)
    // ============================================================
    public function reject($id)
    {
        $user = auth()->user();
        if (!$user || !$user->canApproveReservation()) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'status' => 'Ditolak',
            'disetujui_oleh' => $user->id,
        ]);

        return back()->with('error', 'Reservasi ditolak.');
    }

    // ============================================================
    // HISTORY - reservasi selesai / ditolak / dibatalkan
    // ============================================================
    public function history()
    {
        $user = auth()->user();

        $reservations = Reservation::with('console.room')
            ->whereIn('status', ['Selesai', 'Ditolak', 'Dibatalkan'])
            ->orderBy('waktu_mulai', 'desc')
            ->paginate(10);

        if ($user->isAdmin()) {
            return view('_admin.reservation', [
                'reservations' => $reservations,
                'mode' => 'riwayat',
            ]);
        }

        return view('_receptionist.reservation', [
            'reservations' => $reservations,
            'mode' => 'riwayat',
        ]);
    }

    // ============================================================
    // TODAY - jadwal hari ini (guest)
    // ============================================================
    public function today()
    {
        $today = Carbon::today()->toDateString();
        $reservations = Reservation::with(['console.room'])
            ->whereDate('waktu_mulai', $today)
            ->orderBy('waktu_mulai')
            ->get();

        return view('guest.reservations-today', compact('reservations'));
    }

    // ============================================================
    // UPCOMING - jadwal mendatang (guest)
    // ============================================================
    public function upcoming()
    {
        $today = Carbon::today()->toDateString();
        $reservations = Reservation::with(['console.room'])
            ->whereDate('waktu_mulai', '>', $today)
            ->orderBy('waktu_mulai')
            ->get();

        return view('guest.reservations-upcoming', compact('reservations'));
    }

    // ============================================================
    // DESTROY - hapus reservasi (Admin / izin delete)
    // ============================================================
    public function destroy($id)
    {
        $user = Auth::user();

        // Periksa akses
        if (!$user || !$user->canDeleteReservation()) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        // Hapus reservasi
        Reservation::findOrFail($id)->delete();

        return back()->with('success', 'Data reservasi berhasil dihapus!');
    }
}
