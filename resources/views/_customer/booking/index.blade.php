@extends('_customer.layouts.app')

@section('title', 'Riwayat Booking')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Riwayat Booking</h3>
                    <p class="text-subtitle text-muted">Daftar booking PlayStation Anda</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Button Booking Baru -->
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Mau Booking Lagi?</h5>
                            <p class="mb-0 text-muted">Pilih PlayStation dan buat booking baru</p>
                        </div>
                        <a href="{{ route('customer.dashboard') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Booking Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Booking List -->
            @if ($bookings->count() > 0)
                <div class="row" id="bookingContainer">
                    @foreach ($bookings as $booking)
                        <div class="mb-3 col-12 booking-card" data-status="{{ $booking->status }}">
                            <div class="shadow-sm card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Console Image -->
                                        <div class="col-md-2 col-12">
                                            @if ($booking->console->primaryImage)
                                                <img src="{{ asset('storage/' . $booking->console->primaryImage->image_path) }}"
                                                    alt="{{ $booking->console->nama_unit }}" class="rounded img-fluid"
                                                    style="width: 100%; height: 120px; object-fit: cover;">
                                            @else
                                                <div class="text-white rounded bg-gradient-primary d-flex align-items-center justify-content-center"
                                                    style="width: 100%; height: 120px;">
                                                    <i class="bi bi-controller" style="font-size: 3rem;"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Booking Info -->
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2 d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h5 class="mb-1">{{ $booking->console->nama_unit }}</h5>
                                                    <span class="badge bg-primary">{{ $booking->console->kategori }}</span>
                                                    @if ($booking->console->room)
                                                        <span class="badge bg-info">{{ $booking->console->room->name }}</span>
                                                    @endif
                                                </div>
                                                @php
                                                    $statusColors = [
                                                        'Menunggu' => 'warning',
                                                        'Diterima' => 'success',
                                                        'Berlangsung' => 'primary',
                                                        'Selesai' => 'secondary',
                                                        'Ditolak' => 'danger',
                                                        'Dibatalkan' => 'dark',
                                                    ];
                                                    $statusColor = $statusColors[$booking->status] ?? 'secondary';
                                                @endphp
                                                <span class="badge bg-{{ $statusColor }}">{{ $booking->status }}</span>
                                            </div>

                                            <div class="mb-2 row g-2">
                                                <div class="col-md-6">
                                                    <small class="text-muted d-block">
                                                        <i class="bi bi-calendar-event"></i> Tanggal & Waktu
                                                    </small>
                                                    <strong>{{ $booking->waktu_mulai->format('d M Y, H:i') }}</strong>
                                                </div>
                                                <div class="col-md-6">
                                                    <small class="text-muted d-block">
                                                        <i class="bi bi-hourglass-split"></i> Durasi
                                                    </small>
                                                    <strong>{{ $booking->durasi_jam }} Jam</strong>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-hash text-muted me-1"></i>
                                                <small class="text-muted">
                                                    Booking ID: #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}
                                                </small>
                                                <span class="mx-2 text-muted">•</span>
                                                <small class="text-muted">
                                                    {{ $booking->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Price & Action -->
                                        <div class="text-end col-md-3 col-12">
                                            <div class="mb-2">
                                                <small class="text-muted d-block">Total Harga</small>
                                                <h4 class="mb-2 text-primary">
                                                    Rp {{ number_format($booking->console->harga_per_jam * $booking->durasi_jam, 0, ',', '.') }}
                                                </h4>
                                            </div>

                                            <div class="gap-2 d-grid">
                                                <a href="{{ route('booking.detail', $booking->id) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> Lihat Detail
                                                </a>

                                                @if ($booking->status == 'Menunggu')
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#cancelModal{{ $booking->id }}">
                                                        <i class="bi bi-x-circle"></i> Batalkan
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Cancel per Booking -->
                        @if ($booking->status == 'Menunggu')
                            <div class="modal fade" id="cancelModal{{ $booking->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="text-white modal-header bg-danger">
                                            <h5 class="modal-title">Batalkan Booking</h5>
                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('booking.cancel', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin membatalkan booking <strong>{{ $booking->console->nama_unit }}</strong>?</p>
                                                <div class="alert alert-warning">
                                                    <i class="bi bi-exclamation-triangle"></i>
                                                    <strong>Perhatian!</strong> Booking yang sudah dibatalkan tidak dapat dikembalikan.
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cancel_reason{{ $booking->id }}" class="form-label">
                                                        Alasan Pembatalan (Opsional)
                                                    </label>
                                                    <textarea class="form-control" id="cancel_reason{{ $booking->id }}"
                                                        name="cancel_reason" rows="3"
                                                        placeholder="Contoh: Ada keperluan mendadak..."></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-x-circle"></i> Ya, Batalkan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Empty State saat Filter -->
                <div id="emptyState" class="card d-none">
                    <div class="py-5 text-center card-body">
                        <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                        <h5 class="mt-3">Tidak Ada Booking</h5>
                        <p class="text-muted">Tidak ada booking dengan status yang dipilih.</p>
                    </div>
                </div>
            @else
                <!-- Empty State awal -->
                <div class="card">
                    <div class="py-5 text-center card-body">
                        <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                        <h5 class="mt-3">Belum Ada Booking</h5>
                        <p class="text-muted">Anda belum memiliki riwayat booking. Mulai booking sekarang!</p>
                        <a href="{{ route('home.rooms') }}" class="mt-3 btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Booking Sekarang
                        </a>
                    </div>
                </div>
            @endif
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const bookingCards = document.querySelectorAll('.booking-card');
            const emptyState = document.getElementById('emptyState');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const status = this.dataset.status;

                    // Update active button
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'btn-primary', 'btn-success', 'btn-info',
                            'btn-secondary');
                        if (b.dataset.status === 'Diterima') {
                            b.classList.add('btn-outline-success');
                        } else if (b.dataset.status === 'Berlangsung') {
                            b.classList.add('btn-outline-info');
                        } else if (b.dataset.status === 'Selesai') {
                            b.classList.add('btn-outline-secondary');
                        } else {
                            b.classList.add('btn-outline-primary');
                        }
                    });

                    // Set active button
                    if (status === 'Diterima') {
                        this.classList.add('active', 'btn-success');
                        this.classList.remove('btn-outline-success');
                    } else if (status === 'Berlangsung') {
                        this.classList.add('active', 'btn-info');
                        this.classList.remove('btn-outline-info');
                    } else if (status === 'Selesai') {
                        this.classList.add('active', 'btn-secondary');
                        this.classList.remove('btn-outline-secondary');
                    } else {
                        this.classList.add('active', 'btn-primary');
                        this.classList.remove('btn-outline-primary');
                    }

                    // Filter cards
                    let visibleCount = 0;
                    bookingCards.forEach(card => {
                        if (status === 'all' || card.dataset.status === status) {
                            card.style.display = 'block';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Show/hide empty state
                    if (emptyState) {
                        if (visibleCount === 0) {
                            emptyState.classList.remove('d-none');
                        } else {
                            emptyState.classList.add('d-none');
                        }
                    }
                });
            });
        });
    </script>
@endpush
