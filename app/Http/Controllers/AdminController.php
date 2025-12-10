<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Console;
use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        // ===== STATISTIK UTAMA =====
        $totalPS        = Console::count();
        $availablePS    = Console::where('status', 'Tersedia')->count();
        $activePS       = Console::where('status', 'Dipesan')->count();
        $maintenancePS  = Console::where('status', 'Perbaikan')->count();

        $psUsagePercent = $totalPS > 0
            ? round(($activePS / $totalPS) * 100, 1)
            : 0;

        $todayReservations = Reservation::whereDate('created_at', $today)->count();

        // ===== PENDAPATAN HARI INI =====
        $todayRevenue = Reservation::join('consoles', 'reservations.console_id', '=', 'consoles.id')
            ->whereDate('reservations.created_at', $today)
            ->where('reservations.status', 'Selesai')
            ->sum(DB::raw('reservations.durasi_jam * consoles.harga_per_jam'));

        // ===== DATA MEMBER =====
        $activeMembers = User::where('role', 'customer')->count();

        $newMembers = User::where('role', 'customer')
            ->whereMonth('created_at', now()->month)
            ->count();

        // ===== RESERVASI TERBARU =====
        // Gunakan paginate agar Blade bisa menampilkan data dinamis dengan paging
        $latestReservations = Reservation::with(['console', 'customer'])
            ->latest()
            ->paginate(10);

        // ===== GRAFIK 7 HARI TERAKHIR =====
        [$revenueLabels, $revenueData] = $this->getWeeklyRevenue();

        // ===== DATA PLAYSTATION SIDEBAR =====
        $playstations = Console::latest()->limit(5)->get();

        // Data chart jumlah console per ruangan
        $consolePerRoom = Room::withCount('consoles')->get();

        // Siapkan data untuk chart
        $roomLabels = $consolePerRoom->pluck('name'); // nama ruangan
        $roomData   = $consolePerRoom->pluck('consoles_count'); // jumlah console

        return view('_admin.index', compact(
            'todayReservations',
            'totalPS',
            'activePS',
            'availablePS',
            'maintenancePS',
            'psUsagePercent',
            'todayRevenue',
            'activeMembers',
            'newMembers',
            'latestReservations', // <-- Blade akan pakai variabel ini
            'revenueLabels',
            'revenueData',
            'playstations',
            'roomData',
            'roomLabels'
        ));
    }

    /**
     * Ambil data pendapatan 7 hari terakhir
     */
    private function getWeeklyRevenue(): array
    {
        $labels = [];
        $data   = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $revenue = Reservation::join('consoles', 'reservations.console_id', '=', 'consoles.id')
                ->whereDate('reservations.created_at', $date)
                ->where('reservations.status', 'Selesai')
                ->sum(DB::raw('reservations.durasi_jam * consoles.harga_per_jam'));

            $labels[] = $date->format('D');
            $data[]   = $revenue;
        }

        return [$labels, $data];
    }

    public function customer()
    {
        $users = User::all();
        return view('_admin.customer', compact('users'));
    }

    public function profile()
    {
        return view('_admin.profile');
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
        //
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
    public function update(Request $request) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
