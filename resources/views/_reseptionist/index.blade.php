@extends('_reseptionist.layouts.app')

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
                <!-- TOTAL RESERVASI -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item py-3">
                        <div class="stat-cards-icon primary">
                            <i data-feather="calendar"></i> <!-- Ikon untuk Reservasi -->
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $totalReservations ?? 0 }}</p>
                            <p class="stat-cards-info__title">Total Reservasi</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>
                                    {{ $reservationGrowth ?? 0 }}%
                                </span>Growth To Day
                            </p>
                        </div>
                    </article>
                </div>

                <!-- PS SEDANG DIGUNAKAN -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item py-3">
                        <div class="stat-cards-icon warning">
                            <i data-feather="play-circle"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $activePS ?? 0 }}/{{ $totalPS ?? 0 }}</p>
                            <p class="stat-cards-info__title">PS Sedang Digunakan</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit warning">
                                    {{ $psUsagePercent ?? 0 }}%
                                </span>
                                Tingkat Pemakaian
                            </p>
                        </div>
                    </article>
                </div>

                <!-- JUMLAH RUANGAN YANG DIPESAN -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item py-3">
                        <div class="stat-cards-icon info">
                            <i data-feather="box"></i> <!-- Ikon untuk Ruangan -->
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $bookedRooms ?? 0 }}</p>
                            <p class="stat-cards-info__title">Ruangan dalam Pesanan</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit info">
                                    {{ $bookedRoomsPercent ?? 0 }}%
                                </span>
                                Dari Total Ruangan
                            </p>
                        </div>
                    </article>
                </div>

                <!-- MEMBER AKTIF -->
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item py-3">
                        <div class="stat-cards-icon purple">
                            <i data-feather="users"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $totalMembers ?? 0 }}</p>
                            <p class="stat-cards-info__title">Total Member</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    +{{ $newMembersToday ?? 0 }}
                                </span>
                                Member Baru Hari Ini
                            </p>
                        </div>
                    </article>
                </div>

                <div class="row stat-cards mb-4">
                    <!-- ====== Bar chart ====== -->
                    <div class="col-lg-6 col-md-12">
                        <article class="white-block mb-4 d-flex flex-column" style="min-height: 350px;">
                            <div class="top-cat-title">
                                <h3>Jumlah Console per Ruangan</h3>
                            </div>
                            <canvas id="consoleRoomChart" height="343" aria-label="Console per Room Chart"role="img">
                            </canvas>
                        </article>
                    </div>

                    <!-- ====== PIE CHART STATUS PS ====== -->
                    <div class="col-md-6 col-xl-3">
                        <article class="white-block mb-4 d-flex flex-column" style="min-height: 416px;">
                            <div class="top-cat-title text-center mb-2">
                                <h3>Status PlayStation</h3>
                                <p>Total {{ $totalPS ?? 0 }} Unit</p>
                            </div>

                            <div class="d-flex justify-content-center">
                                <canvas id="customersChart" width="220"></canvas>
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

                    <!-- ====== BAR CHART JUMLAH RUANGAN PER KATEGORI ====== -->
                    <div class="col-md-6 col-xl-3">
                        <article class="white-block mb-4 d-flex flex-column" style="min-height: 416px;">
                            <div class="top-cat-title text-center mb-2">
                                <h3>Jumlah Ruangan per Kategori</h3>
                                <p>Total {{ $totalRooms }} Ruangan</p>
                            </div>

                            <div class="d-flex justify-content-center">
                                <canvas id="roomCategoryChart" height="210"></canvas>
                            </div>

                            <div class="text-center mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <small class="text-muted d-block">VIP</small>
                                        <strong class="text-primary fs-5">{{ $vipRoom ?? 0 }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Standard</small>
                                        <strong class="text-success fs-5">{{ $standardRoom ?? 0 }}</strong>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted d-block">Premium</small>
                                        <strong class="text-warning fs-5">{{ $premiumRoom ?? 0 }}</strong>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Quick Actions -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Quick Actions</h5>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary w-100">
                                            <i data-feather="box" style="width: 18px; height: 18px;"></i>
                                            <span class="d-block mt-1">Kelola Ruangan</span>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('admin.consoles.index') }}" class="btn btn-info w-100">
                                            <i data-feather="monitor" style="width: 18px; height: 18px;"></i>
                                            <span class="d-block mt-1">Kelola PlayStation</span>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('admin.customers.index') }}" class="btn btn-warning w-100">
                                            <i data-feather="users" style="width: 18px; height: 18px;"></i>
                                            <span class="d-block mt-1">Kelola Member</span>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('admin.settings.index') }}" class="btn btn-success w-100">
                                            <i data-feather="settings" style="width: 18px; height: 18px;"></i>
                                            <span class="d-block mt-1">Pengaturan</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
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
                                            <button class="dropdown-btn transparent-btn" type="button"
                                                title="More info">
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
            //Pie Chart
            const ctxRoom = document.getElementById('consoleRoomChart').getContext('2d');
            new Chart(ctxRoom, {
                type: 'bar', // bisa diganti 'pie', 'doughnut', dsb
                data: {
                    labels: {!! json_encode($roomLabels) !!}, // nama ruangan
                    datasets: [{
                        data: [{{ $vipRoom ?? 0 }}, {{ $standardRoom ?? 0 }}, {{ $premiumRoom ?? 0 }}],
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
            //Bar Chart jumlah ruangan berdasarkan kategori
            document.addEventListener("DOMContentLoaded", function() {
                const ctx = document.getElementById('roomCategoryChart');

                if (ctx) {
                    const labels = @json($roomCategoryLabels);
                    const data = @json($roomCategoryData);

                    const backgroundColors = [
                        '#4e73df', // biru
                        '#1cc88a', // hijau
                        '#f6c23e', // kuning
                    ];

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Ruangan',
                                data: data,
                                backgroundColor: backgroundColors.slice(0, labels.length),
                                borderRadius: 6,
                                borderWidth: 0
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return context.raw + ' Ruangan';
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection
