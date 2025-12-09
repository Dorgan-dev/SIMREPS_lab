<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        // ✅ Reservasi Hari Ini
        $todayReservations = Reservation::whereDate('created_at', $today)->count();

        // ✅ Total PS
        $totalPS = Console::count();

        // ✅ PS Sedang Digunakan
        $activePS = Reservation::where('status', 'Berlangsung')->count();

        // ✅ PS Tersedia
        $availablePS = Console::where('status', 'Tersedia')->count();

        // ✅ PS Maintenance
        $maintenancePS = Console::where('status', 'Perbaikan')->count();

        // ✅ Persentase Pemakaian PS
        $psUsagePercent = $totalPS > 0 ? round(($activePS / $totalPS) * 100, 1) : 0;

        // ✅ Pendapatan Hari Ini (REAL dari harga console)
        $todayRevenue = Reservation::join('consoles', 'reservations.console_id', '=', 'consoles.id')
            ->whereDate('reservations.created_at', $today)
            ->where('reservations.status', 'Selesai')
            ->sum(DB::raw('reservations.durasi_jam * consoles.harga_per_jam'));

        // ✅ Member Aktif
        $activeMembers = User::where('role', 'customer')->count();

        // ✅ Member Baru Bulan Ini
        $newMembers = User::where('role', 'customer')
            ->whereMonth('created_at', now()->month)
            ->count();

        // ✅ Reservasi Terbaru
        $latestReservations = Reservation::with(['console', 'customer'])
            ->latest()
            ->limit(5)
            ->get();

        // ✅ Grafik 7 Hari Terakhir
        $revenueData = [];
        $revenueLabels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $revenue = Reservation::join('consoles', 'reservations.console_id', '=', 'consoles.id')
                ->whereDate('reservations.created_at', $date)
                ->where('reservations.status', 'Selesai')
                ->sum(DB::raw('reservations.durasi_jam * consoles.harga_per_jam'));

            $revenueData[] = $revenue;
            $revenueLabels[] = $date->format('D');
        }

        // ✅ Data PS Sidebar
        $playstations = Console::latest()->limit(5)->get();

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
            'latestReservations',
            'revenueData',
            'revenueLabels',
            'playstations'
        ));
    }


    public function customer()
    {
        $user = User::all();
        return view('_admin.customer', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function profile()
    {
        return view('_admin.profile');
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
