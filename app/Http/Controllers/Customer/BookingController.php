<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Console;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Tampilkan riwayat booking user
     */
    public function index()
    {
        $bookings = Reservation::with(['console.images', 'console.room'])
            ->where('cust_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('_customer.booking.index', compact('bookings'));
    }

    /**
     * Tampilkan daftar console yang tersedia untuk booking
     */
    public function showConsoles()
    {
        $consoles = Console::with(['room', 'images' => function($q) {
            $q->where('is_primary', 1);
        }])
        ->where('status', 'Tersedia')
        ->get();

        return view('_customer.booking.consoles', compact('consoles'));
    }

    /**
     * Tampilkan halaman pilih jadwal untuk console tertentu
     */
    public function showSchedule($consoleId)
    {
        // Ambil data console dengan relasi room dan images
        $console = Console::with(['room', 'images' => function($q) {
            $q->where('is_primary', 1);
        }])->findOrFail($consoleId);

        // Cek apakah console tersedia
        if ($console->status !== 'Tersedia') {
            return redirect()->route('home')->with('error', 'Console tidak tersedia untuk booking');
        }

        return view('_customer.booking.schedule', compact('console'));
    }

    /**
     * Cek ketersediaan jadwal (AJAX)
     */
    public function checkAvailability(Request $request)
    {
        try {
            // Log untuk debug
            \Log::info('Check availability request:', $request->all());

            $validated = $request->validate([
                'console_id' => 'required|exists:consoles,id',
                'tanggal' => 'required|date|after_or_equal:today',
                'waktu_mulai' => 'required|date_format:H:i',
                'durasi_jam' => 'required|integer|min:1|max:12'
            ]);

            $consoleId = $validated['console_id'];
            $tanggal = $validated['tanggal'];
            $waktuMulai = $tanggal . ' ' . $validated['waktu_mulai'];
            $durasiJam = (int) $validated['durasi_jam']; // CAST ke integer
            
            // Hitung waktu selesai
            $waktuSelesai = Carbon::parse($waktuMulai)->addHours($durasiJam)->format('Y-m-d H:i:s');

            // Cek apakah ada reservasi yang bentrok
            $conflict = Reservation::where('console_id', $consoleId)
                ->whereIn('status', ['Menunggu', 'Diterima', 'Berlangsung'])
                ->where(function($query) use ($waktuMulai, $waktuSelesai) {
                    // Cek semua kemungkinan overlap
                    $query->whereBetween('waktu_mulai', [$waktuMulai, $waktuSelesai])
                        ->orWhereBetween('waktu_selesai', [$waktuMulai, $waktuSelesai])
                        ->orWhere(function($q) use ($waktuMulai, $waktuSelesai) {
                            $q->where('waktu_mulai', '<=', $waktuMulai)
                              ->where('waktu_selesai', '>=', $waktuSelesai);
                        });
                })
                ->exists();

            if ($conflict) {
                return response()->json([
                    'available' => false,
                    'message' => 'Jadwal tidak tersedia. Silakan pilih waktu lain.'
                ]);
            }

            // Ambil harga console
            $console = Console::find($consoleId);
            $totalHarga = $console->harga_per_jam * $durasiJam;

            return response()->json([
                'available' => true,
                'message' => 'Jadwal tersedia!',
                'waktu_selesai' => Carbon::parse($waktuSelesai)->format('d/m/Y H:i'),
                'total_harga' => $totalHarga,
                'total_harga_formatted' => 'Rp ' . number_format($totalHarga, 0, ',', '.')
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'available' => false,
                'message' => 'Data tidak valid: ' . implode(', ', $e->errors())
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Check availability error: ' . $e->getMessage());
            return response()->json([
                'available' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Simpan booking ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'console_id' => 'required|exists:consoles,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required|date_format:H:i',
            'durasi_jam' => 'required|integer|min:1|max:12'
        ]);

        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $consoleId = $request->console_id;
        $tanggal = $request->tanggal;
        $waktuMulai = $tanggal . ' ' . $request->waktu_mulai;
        $durasiJam = (int) $request->durasi_jam; // CAST ke integer
        $waktuSelesai = Carbon::parse($waktuMulai)->addHours($durasiJam);

        // Cek lagi ketersediaan sebelum simpan (double check)
        $conflict = Reservation::where('console_id', $consoleId)
            ->whereIn('status', ['Menunggu', 'Diterima', 'Berlangsung'])
            ->where(function($query) use ($waktuMulai, $waktuSelesai) {
                $query->whereBetween('waktu_mulai', [$waktuMulai, $waktuSelesai])
                    ->orWhereBetween('waktu_selesai', [$waktuMulai, $waktuSelesai])
                    ->orWhere(function($q) use ($waktuMulai, $waktuSelesai) {
                        $q->where('waktu_mulai', '<=', $waktuMulai)
                          ->where('waktu_selesai', '>=', $waktuSelesai);
                    });
            })
            ->exists();

        if ($conflict) {
            return back()->with('error', 'Jadwal sudah dibooking oleh orang lain. Silakan pilih waktu lain.');
        }

        // Simpan reservasi
        DB::beginTransaction();
        try {
            $reservation = Reservation::create([
                'cust_id' => auth()->id(),
                'console_id' => $consoleId,
                'waktu_mulai' => $waktuMulai,
                'waktu_selesai' => $waktuSelesai,
                'durasi_jam' => $durasiJam,
                'status' => 'Menunggu'
            ]);

            DB::commit();

            return redirect()->route('booking.detail', $reservation->id)
                ->with('success', 'Booking berhasil dibuat! Silakan lanjutkan pembayaran.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Tampilkan detail booking
     */
    public function detail($reservationId)
    {
        $reservation = Reservation::with(['console.images', 'console.room', 'customer'])
            ->where('cust_id', auth()->id())
            ->findOrFail($reservationId);

        $totalHarga = $reservation->console->harga_per_jam * $reservation->durasi_jam;

        return view('_customer.booking.detail', compact('reservation', 'totalHarga'));
    }

    /**
     * Batalkan booking
     */
    public function cancel(Request $request, $reservationId)
    {
        $request->validate([
            'cancel_reason' => 'nullable|string|max:500'
        ]);

        $reservation = Reservation::where('cust_id', auth()->id())
            ->where('status', 'Menunggu')
            ->findOrFail($reservationId);

        $reservation->update([
            'status' => 'Dibatalkan'
        ]);

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil dibatalkan.');
    }
}