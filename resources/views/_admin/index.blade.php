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

            <div class="row">
                <!-- Chart & Tabel Reservasi Terbaru -->
                <div class="col-lg-9">
                    <!-- Grafik Pendapatan -->
                    <div class="chart mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 px-3 pt-3">
                            <h5 class="mb-0">Grafik Pendapatan 7 Hari Terakhir</h5>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-primary active">7 Hari</button>
                                <button type="button" class="btn btn-outline-primary">30 Hari</button>
                                <button type="button" class="btn btn-outline-primary">1 Tahun</button>
                            </div>
                        </div>
                        <canvas id="myChart" aria-label="Revenue statistics" role="img"></canvas>
                    </div>

                    <!-- Tabel Reservasi Terbaru -->
                    <div class="users-table table-wrapper">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Reservasi Terbaru</h5>
                            <a href="" class="btn btn-sm btn-primary">
                                <i data-feather="eye" style="width: 16px; height: 16px;"></i> Lihat Semua
                            </a>
                        </div>
                        <table class="posts-table">
                            <thead>
                                <tr class="users-table-info">
                                    <th>ID Reservasi</th>
                                    <th>Customer</th>
                                    <th>PlayStation</th>
                                    <th>Paket</th>
                                    <th>Waktu Mulai</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestReservations ?? [] as $reservation)
                                    <tr>
                                        <td><strong>#{{ $reservation->id }}</strong></td>
                                        <td>
                                            <div class="pages-table-img">
                                                <picture>
                                                    <img src="{{ $reservation->user->profile_photo_url ?? asset('img/avatar/default.png') }}"
                                                        alt="{{ $reservation->user->name }}">
                                                </picture>
                                                {{ $reservation->user->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">
                                                <i data-feather="monitor" style="width: 14px; height: 14px;"></i>
                                                PS {{ $reservation->playstation->nama ?? '-' }}
                                            </span>
                                        </td>
                                        <td>{{ $reservation->paket->nama ?? '-' }}</td>
                                        <td>{{ $reservation->waktu_mulai ? \Carbon\Carbon::parse($reservation->waktu_mulai)->format('H:i, d/m/Y') : '-' }}
                                        </td>
                                        <td>
                                            @if ($reservation->status == 'active')
                                                <span class="badge-active">Sedang Bermain</span>
                                            @elseif($reservation->status == 'pending')
                                                <span class="badge-pending">Menunggu</span>
                                            @elseif($reservation->status == 'completed')
                                                <span class="badge bg-success">Selesai</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $reservation->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="p-relative">
                                                <button class="dropdown-btn transparent-btn" type="button"
                                                    title="More info">
                                                    <div class="sr-only">More info</div>
                                                    <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                </button>
                                                <ul class="users-item-dropdown dropdown">
                                                    <li><a
                                                            href="">Detail</a>
                                                    </li>
                                                    <li><a
                                                            href="">Edit</a>
                                                    </li>
                                                    @if ($reservation->status == 'active')
                                                        <li><a
                                                                href="">Selesaikan</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i data-feather="inbox" style="width: 48px; height: 48px; opacity: 0.3;"></i>
                                            <p class="text-muted mt-2">Belum ada reservasi</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Sidebar Kanan -->
                <div class="col-lg-3">
                    <!-- Status PlayStation -->
                    <article class="white-block mb-4">
                        <div class="top-cat-title">
                            <h3>Status PlayStation</h3>
                            <p>{{ $totalPS ?? 0 }} Unit PlayStation</p>
                        </div>
                        <ul class="top-cat-list">
                            @forelse($playstations ?? [] as $ps)
                                <li>
                                    <a href="">
                                        <div class="top-cat-list__title">
                                            <i data-feather="monitor" style="width: 16px; height: 16px;"></i>
                                            {{ $ps->nama }}
                                            <span>
                                                @if ($ps->status == 'tersedia')
                                                    <span class="badge bg-success">Tersedia</span>
                                                @elseif($ps->status == 'digunakan')
                                                    <span class="badge bg-warning">Digunakan</span>
                                                @else
                                                    <span class="badge bg-danger">Maintenance</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="top-cat-list__subtitle">
                                            {{ $ps->tipe ?? 'PS4' }} -
                                            @if ($ps->status == 'digunakan')
                                                <span class="warning">Sisa: {{ $ps->remaining_time ?? '0' }} menit</span>
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
                            <a href=""
                                class="btn btn-sm btn-outline-primary w-100">
                                <i data-feather="settings" style="width: 14px; height: 14px;"></i> Kelola PlayStation
                            </a>
                        </div>
                    </article>

                    <!-- Chart Donut - Statistik Status -->
                    <article class="customers-wrapper mb-4">
                        <h5 class="text-center mb-3">Distribusi Status PS</h5>
                        <canvas id="customersChart" aria-label="PlayStation status statistics" role="img"></canvas>
                        <div class="text-center mt-3">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <small class="text-muted d-block">Tersedia</small>
                                    <strong class="text-success">{{ $availablePS ?? 0 }}</strong>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Digunakan</small>
                                    <strong class="text-warning">{{ $activePS ?? 0 }}</strong>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Maintenance</small>
                                    <strong class="text-danger">{{ $maintenancePS ?? 0 }}</strong>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Paket Populer -->
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

            <!-- Quick Actions -->
            <div class="row mt-4">
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
        </div>
    </main>

    @push('scripts')
        <script>
            // Inisialisasi Feather Icons
            if (typeof feather !== 'undefined') {
                feather.replace();
            }

            // Chart Pendapatan (Line Chart)
            const ctx = document.getElementById('myChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($revenueLabels ?? ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']) !!},
                        datasets: [{
                            label: 'Pendapatan (Rp)',
                            data: {!! json_encode($revenueData ?? [0, 0, 0, 0, 0, 0, 0]) !!},
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.1)',
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + value.toLocaleString('id-ID');
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Chart Status PS (Donut Chart)
            const statusCtx = document.getElementById('customersChart');
            if (statusCtx) {
                new Chart(statusCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Tersedia', 'Digunakan', 'Maintenance'],
                        datasets: [{
                            data: [
                                {{ $availablePS ?? 0 }},
                                {{ $activePS ?? 0 }},
                                {{ $maintenancePS ?? 0 }}
                            ],
                            backgroundColor: [
                                'rgb(34, 197, 94)',
                                'rgb(251, 146, 60)',
                                'rgb(239, 68, 68)'
                            ],
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        }
                    }
                });
            }
        </script>
    @endpush
@endsection
