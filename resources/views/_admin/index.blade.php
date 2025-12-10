@extends('_admin.layouts.app')

@section('content')
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <!-- Header Dashboard -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="main-title mb-1">Dashboard PlayStation Rental</h2>
                    <p class="text-muted">Selamat datang, {{ auth()->user()->name }}! 👋</p>
                </div>
                <div class="text-end">
                    <small class="text-muted d-block">{{ now()->format('l, d F Y') }}</small>
                    <small class="text-muted">{{ now()->format('H:i') }} WIB</small>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-3">Quick Actions</h5>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <a href="" class="btn btn-primary w-100">
                                        <i data-feather="plus-circle" style="width: 18px; height: 18px;"></i>
                                        <span class="d-block mt-1">Reservasi Baru</span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="" class="btn btn-info w-100">
                                        <i data-feather="monitor" style="width: 18px; height: 18px;"></i>
                                        <span class="d-block mt-1">Tambah PlayStation</span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="" class="btn btn-warning w-100">
                                        <i data-feather="users" style="width: 18px; height: 18px;"></i>
                                        <span class="d-block mt-1">Kelola Member</span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="" class="btn btn-success w-100">
                                        <i data-feather="file-text" style="width: 18px; height: 18px;"></i>
                                        <span class="d-block mt-1">Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="row stat-cards mb-4">
                <!-- Total Reservasi Hari Ini -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon primary">
                            <i data-feather="calendar" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $todayReservations ?? 0 }}</p>
                            <p class="stat-cards-info__title">Reservasi Hari Ini</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>
                                    {{ $reservationGrowth ?? '0' }}%
                                </span>
                                Dari kemarin
                            </p>
                        </div>
                    </article>
                </div>

                <!-- PS Sedang Digunakan -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon warning">
                            <i data-feather="play-circle" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $activePS ?? 0 }}/{{ $totalPS ?? 0 }}</p>
                            <p class="stat-cards-info__title">PS Sedang Digunakan</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit warning">
                                    <i data-feather="activity" aria-hidden="true"></i>
                                    {{ $psUsagePercent ?? '0' }}%
                                </span>
                                Tingkat Penggunaan
                            </p>
                        </div>
                    </article>
                </div>

                <!-- Pendapatan Hari Ini -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon success">
                            <i data-feather="dollar-sign" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">Rp {{ number_format($todayRevenue ?? 0, 0, ',', '.') }}</p>
                            <p class="stat-cards-info__title">Pendapatan Hari Ini</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>
                                    {{ $revenueGrowth ?? '0' }}%
                                </span>
                                Dari kemarin
                            </p>
                        </div>
                    </article>
                </div>

                <!-- Total Member Aktif -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon purple">
                            <i data-feather="users" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $activeMembers ?? 0 }}</p>
                            <p class="stat-cards-info__title">Member Aktif</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="user-plus" aria-hidden="true"></i>
                                    +{{ $newMembers ?? 0 }}
                                </span>
                                Bulan ini
                            </p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="row stat-cards mb-4">
                <!-- ====== PIE CHART STATUS PS ====== -->
                <div class="col-md-6 col-xl-3">

                    <article class="white-block mb-4">
                        <div class="top-cat-title text-center">
                            <h3>Status PlayStation</h3>
                            <p>Total {{ $totalPS ?? 0 }} Unit</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <canvas id="customersChart" width="220" height="220"></canvas>
                        </div>
                        <div class="text-center mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <small class="text-muted d-block">Tersedia</small>
                                    <strong class="text-success fs-5">{{ $availablePS ?? 0 }}</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">Digunakan</small>
                                    <strong class="text-warning fs-5">{{ $activePS ?? 0 }}</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">Maintenance</small>
                                    <strong class="text-danger fs-5">{{ $maintenancePS ?? 0 }}</strong>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Status PS Sidebar -->
                <div class="col-md-6 col-xl-3">
                    <article class="white-block mb-4">
                        <div class="top-cat-title">
                            <h3>Status PlayStation</h3>
                            <p>{{ $totalPS ?? 0 }} Unit PlayStation</p>
                        </div>
                        <ul class="top-cat-list">
                            @forelse($playstations ?? [] as $ps)
                                <li>
                                    <a href="#">
                                        <div class="top-cat-list__title">
                                            <i data-feather="monitor" style="width: 16px; height: 16px;"></i>
                                            {{ $ps->nama_unit }}
                                            <span>
                                                @if ($ps->status == 'Tersedia')
                                                    <span class="badge bg-success">Tersedia</span>
                                                @elseif($ps->status == 'Dipesan')
                                                    <span class="badge bg-warning">Digunakan</span>
                                                @else
                                                    <span class="badge bg-danger">Maintenance</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="top-cat-list__subtitle">
                                            {{ $ps->kategori ?? 'PS4' }} -
                                            @if ($ps->status == 'Dipesan')
                                                <span class="warning">Sedang digunakan</span>
                                            @else
                                                <span class="success">Siap digunakan</span>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @empty
                                <li class="text-center py-3 text-muted">
                                    <small>Belum ada data PlayStation</small>
                                </li>
                            @endforelse
                        </ul>
                        <div class="mt-3 text-center">
                            <a href="#" class="btn btn-sm btn-outline-primary w-100">
                                <i data-feather="settings" style="width: 14px; height: 14px;"></i> Kelola PlayStation
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-6">
                    <article class="white-block mb-4">
                        <div class="top-cat-title">
                            <h3>Jumlah Console per Ruangan</h3>
                        </div>
                        <canvas id="consoleRoomChart" aria-label="Console per Room Chart" role="img"></canvas>
                    </article>
                </div>


                <!-- Paket Populer -->
                <div class="col-md-6 col-xl-3">
                    <article class="white-block">
                        <div class="top-cat-title">
                            <h3>Paket Populer</h3>
                            <p>Berdasarkan pemesanan</p>
                        </div>
                        <ul class="top-cat-list">
                            @forelse($popularPackages ?? [] as $package)
                                <li>
                                    <a href="">
                                        <div class="top-cat-list__title">
                                            {{ $package->nama }} <span>{{ $package->bookings_count ?? 0 }}x</span>
                                        </div>
                                        <div class="top-cat-list__subtitle">
                                            Rp {{ number_format($package->harga, 0, ',', '.') }} - {{ $package->durasi }}
                                            jam
                                            <span class="success">+{{ $package->growth ?? 0 }}%</span>
                                        </div>
                                    </a>
                                </li>
                            @empty
                                <li class="text-center py-3 text-muted">
                                    <small>Belum ada data paket</small>
                                </li>
                            @endforelse
                        </ul>
                        <div class="mt-3 text-center">
                            <a href="" class="btn btn-sm btn-outline-primary w-100">
                                <i data-feather="package" style="width: 14px; height: 14px;"></i> Kelola Paket
                            </a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="users-table table-wrapper">
                <table class="posts-table">
                    <thead>
                        <tr class="users-table-info">
                            <th>
                                <label class="users-table__checkbox ms-20">
                                    <input type="checkbox" class="check-all">Console
                                </label>
                            </th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Duration (Hours)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestReservations as $reservation)
                            <tr>
                                <td>
                                    {{ $reservation->console->nama_unit ?? '-' }}
                                </td>
                                <td>
                                    {{ $reservation->customer->name ?? '-' }}
                                </td>
                                <td>
                                    @if ($reservation->status == 'pending')
                                        <span class="badge-pending">Pending</span>
                                    @elseif($reservation->status == 'active')
                                        <span class="badge-active">Active</span>
                                    @elseif($reservation->status == 'selesai' || $reservation->status == 'Selesai')
                                        <span class="badge-success">Selesai</span>
                                    @else
                                        <span class="badge-inactive">Cancelled</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($reservation->tanggal_bermain)->format('d.m.Y') }}</td>
                                <td>{{ $reservation->durasi_jam ?? '-' }}</td>
                                <td>
                                    <span class="p-relative">
                                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                            <div class="sr-only">More info</div>
                                            <i data-feather="more-horizontal" aria-hidden="true"></i>
                                        </button>
                                        <ul class="users-item-dropdown dropdown">
                                            <li>
                                                <a
                                                    href="{{ route('admin.reservations.edit', $reservation->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ route('admin.reservations.show', $reservation->id) }}">View</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $reservation->id }}').submit();">
                                                    Trash
                                                </a>
                                                <form id="delete-form-{{ $reservation->id }}"
                                                    action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                        </ul>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i data-feather="inbox" style="width: 48px; height: 48px; opacity: 0.3;"></i>
                                    <p class="text-muted mt-2">No reservations found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($latestReservations->hasPages())
                <div class="mt-4">
                    {{ $latestReservations->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>
    </main>

    @push('scripts')
        <script>
            // Feather Icons
            if (typeof feather !== 'undefined') feather.replace();

            // Chart Status PS
            const statusCtx = document.getElementById('customersChart');
            if (statusCtx) {
                new Chart(statusCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Tersedia', 'Dipesan', 'Perbaikan'],
                        datasets: [{
                            data: [{{ $availablePS ?? 0 }}, {{ $activePS ?? 0 }}, {{ $maintenancePS ?? 0 }}],
                            backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                            borderWidth: 3,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        cutout: '65%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20,
                                    boxWidth: 15
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.label + ': ' + context.raw + ' Unit';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            const ctxRoom = document.getElementById('consoleRoomChart').getContext('2d');

            new Chart(ctxRoom, {
                type: 'bar', // bisa diganti 'pie', 'doughnut', dsb
                data: {
                    labels: {!! json_encode($roomLabels) !!}, // nama ruangan
                    datasets: [{
                        label: 'Jumlah Console',
                        data: {!! json_encode($roomData) !!}, // jumlah console
                        backgroundColor: '#4e73df', // warna bar
                        borderColor: '#2e59d9',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            } // supaya angka tidak pecahan
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
