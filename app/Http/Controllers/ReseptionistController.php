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

class ReseptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        // =====================================================
        // 1. STATISTIK PLAYSTATION
        // =====================================================
        $totalPS       = Console::count();
        $availablePS   = Console::where('status', 'Tersedia')->count();
        $activePS      = Console::where('status', 'Dipesan')->count();
        $maintenancePS = Console::where('status', 'Perbaikan')->count();

        $psUsagePercent = $totalPS > 0
            ? round(($activePS / $totalPS) * 100, 1)
            : 0;

        // =====================================================
        // 2. STATISTIK RESERVASI
        // =====================================================
        $latestReservations = Reservation::with(['console', 'customer'])->latest()->paginate(10);
        $totalReservations = Reservation::count();  // Total reservasi
        $todayReservations = Reservation::whereDate('created_at', $today)->count();  // Reservasi hari ini
        $thisMonthReservations = Reservation::whereMonth('created_at', now()->month)->count();  // Reservasi bulan ini

        // Persentase Pertumbuhan Reservasi
        $previousDayReservations = Reservation::whereDate('created_at', Carbon::yesterday())->count();
        $reservationGrowth = $previousDayReservations > 0 ? round((($todayReservations - $previousDayReservations) / $previousDayReservations) * 100, 1) : 0;

        // =====================================================
        // 3. PENDAPATAN
        // =====================================================
        $todayRevenue = Reservation::join('consoles', 'reservations.console_id', '=', 'consoles.id')
            ->whereDate('reservations.created_at', $today)
            ->where('reservations.status', 'Selesai')
            ->sum(DB::raw('reservations.durasi_jam * consoles.harga_per_jam'));

        // =====================================================
        // 4. DATA MEMBER (CUSTOMER)
        // =====================================================
        // Pastikan role '3' sesuai dengan role yang digunakan untuk customer di tabel users
        $totalMembers = User::where('role', '3')->count();  // Total customer
        $newMembersToday = User::where('role', '3')->whereDate('created_at', $today)->count();  // Member baru hari ini
        $newMembersThisMonth = User::where('role', '3')->whereMonth('created_at', now()->month)->count();  // Member baru bulan ini

        // Persentase Pertumbuhan Member Baru
        $previousDayMembers = User::where('role', '3')->whereDate('created_at', Carbon::yesterday())->count();
        $memberGrowth = $previousDayMembers > 0 ? round((($newMembersToday - $previousDayMembers) / $previousDayMembers) * 100, 1) : 0;

        // =====================================================
        // 5. DATA SIDEBAR PLAYSTATION
        // =====================================================
        $playstations = Console::latest()->limit(5)->get();

        // =====================================================
        // 6. GRAFIK PENDAPATAN 7 HARI TERAKHIR
        // =====================================================
        [$revenueLabels, $revenueData] = $this->getWeeklyRevenue();

        // =====================================================
        // 7. GRAFIK JUMLAH CONSOLE PER RUANGAN
        // =====================================================
        $consolePerRoom = Room::withCount('consoles')->get();
        $roomLabels = $consolePerRoom->pluck('name');
        $roomData   = $consolePerRoom->pluck('consoles_count');

        // =====================================================
        // 8. GRAFIK JUMLAH RUANGAN PER KATEGORI
        // =====================================================
        $roomCategories = Room::select('category', DB::raw('COUNT(*) as total'))
            ->groupBy('category')
            ->get();

        $roomCategoryLabels = $roomCategories->pluck('category');
        $roomCategoryData   = $roomCategories->pluck('total');

        // =====================================================
        // 9. TOTAL RUANGAN & DETAIL KATEGORI
        // =====================================================
        $totalRooms   = Room::count();
        $vipRoom      = Room::where('category', 'VIP')->count();
        $standardRoom = Room::where('category', 'Standard')->count();
        $premiumRoom  = Room::where('category', 'Premium')->count();
        $bookedRooms = Reservation::join('consoles', 'reservations.console_id', '=', 'consoles.id')
            ->where('reservations.status', ['Diterima', 'Berlangsung']) // status aktif
            ->distinct('consoles.room_id')  // distinct agar menghitung ruangan per ID
            ->count('consoles.room_id');
        // Persentase ruangan yang dipesan
        $bookedRoomsPercent = $totalRooms > 0 ? round(($bookedRooms / $totalRooms) * 100, 1) : 0;

        // =====================================================
        // 10. RETURN KE VIEW
        // =====================================================
        return view('_reseptionist.index', compact(
            'totalPS',
            'availablePS',
            'bookedRoomsPercent',
            'activePS',
            'maintenancePS',
            'psUsagePercent',
            'latestReservations',
            'totalReservations',
            'todayReservations',
            'thisMonthReservations',
            'reservationGrowth',
            'todayRevenue',
            'revenueLabels',
            'revenueData',
            'totalMembers',
            'bookedRooms',
            'newMembersToday',
            'newMembersThisMonth',
            'memberGrowth',
            'playstations',
            'roomLabels',
            'roomData',
            'roomCategoryLabels',
            'roomCategoryData',
            'totalRooms',
            'vipRoom',
            'standardRoom',
            'premiumRoom'
        ));
    }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
