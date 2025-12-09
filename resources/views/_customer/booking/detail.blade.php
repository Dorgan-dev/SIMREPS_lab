@extends('_customer.layouts.app')

@section('title', 'Detail Booking')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Detail Booking</h3>
                    <p class="text-subtitle text-muted">Informasi booking Anda</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Booking</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
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

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <!-- Informasi Booking -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 card-title">Informasi Booking</h4>
                            @php
                                $statusColors = [
                                    'Menunggu' => 'warning',
                                    'Diterima' => 'success',
                                    'Berlangsung' => 'primary',
                                    'Selesai' => 'secondary',
                                    'Ditolak' => 'danger',
                                    'Dibatalkan' => 'dark',
                                ];
                                $statusColor = $statusColors[$reservation->status] ?? 'secondary';
                            @endphp
                            <span class="badge bg-{{ $statusColor }} fs-6">{{ $reservation->status }}</span>
                        </div>

                        <div class="card-body">
                            <!-- Console Info -->
                            <div class="pb-4 mb-4 d-flex border-bottom">
                                <div class="me-3">
                                    @if ($reservation->console->primaryImage)
                                        <img src="{{ asset('storage/' . $reservation->console->primaryImage->image_path) }}"
                                            alt="{{ $reservation->console->nama_unit }}" class="rounded"
                                            style="width: 120px; height: 120px; object-fit: cover;">
                                    @else
                                        <div class="text-white rounded bg-gradient-primary d-flex align-items-center justify-content-center"
                                            style="width: 120px; height: 120px;">
                                            <i class="bi bi-controller" style="font-size: 3rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="mb-1">{{ $reservation->console->nama_unit }}</h4>
                                    <p class="mb-2 text-muted">{{ $reservation->console->nomor_unit }}</p>
                                    <span class="badge bg-primary">{{ $reservation->console->kategori }}</span>
                                    @if ($reservation->console->room)
                                        <span class="badge bg-info">{{ $reservation->console->room->name }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Booking Details -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-person-circle text-primary me-2 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Customer</small>
                                            <strong>{{ $reservation->customer->name }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-hash text-primary me-2 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Booking ID</small>
                                            <strong>#{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-calendar-event text-primary me-2 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Tanggal & Waktu Mulai</small>
                                            <strong>{{ $reservation->waktu_mulai->format('d M Y, H:i') }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-calendar-check text-primary me-2 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Waktu Selesai</small>
                                            <strong>{{ $reservation->waktu_selesai->format('d M Y, H:i') }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-hourglass-split text-primary me-2 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Durasi</small>
                                            <strong>{{ $reservation->durasi_jam }} Jam</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-clock-history text-primary me-2 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Dibuat Pada</small>
                                            <strong>{{ $reservation->created_at->format('d M Y, H:i') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    @if ($reservation->status == 'Menunggu')
                        <div class="mt-3 card">
                            <div class="card-body">
                                <h5 class="mb-3 card-title">
                                    <i class="bi bi-exclamation-circle text-warning"></i>
                                    Menunggu Konfirmasi Admin
                                </h5>
                                <p class="mb-3 text-muted">
                                    Booking Anda sedang menunggu konfirmasi dari admin. Silakan hubungi admin untuk
                                    informasi pembayaran.
                                </p>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancelModal">
                                    <i class="bi bi-x-circle"></i> Batalkan Booking
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($reservation->status == 'Diterima')
                        <div class="mt-3 card">
                            <div class="card-body">
                                <h5 class="mb-3 card-title text-success">
                                    <i class="bi bi-check-circle"></i>
                                    Booking Diterima
                                </h5>
                                <p class="mb-0 text-muted">
                                    Booking Anda telah dikonfirmasi. Silakan datang sesuai jadwal yang telah ditentukan.
                                </p>
                            </div>
                        </div>
                    @endif

                    @if ($reservation->status == 'Ditolak')
                        <div class="mt-3 card">
                            <div class="card-body">
                                <h5 class="mb-3 card-title text-danger">
                                    <i class="bi bi-x-circle"></i>
                                    Booking Ditolak
                                </h5>
                                <p class="mb-0 text-muted">
                                    Mohon maaf, booking Anda ditolak. Silakan hubungi admin untuk informasi lebih lanjut.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Ringkasan Pembayaran -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 card-title">Ringkasan Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Harga per Jam</span>
                                <span>Rp {{ number_format($reservation->console->harga_per_jam, 0, ',', '.') }}</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Durasi</span>
                                <span>{{ $reservation->durasi_jam }} Jam</span>
                            </div>
                            <hr>
                            <div class="mb-3 d-flex justify-content-between">
                                <strong>Total Harga</strong>
                                <h4 class="mb-0 text-primary">
                                    Rp {{ number_format($totalHarga, 0, ',', '.') }}
                                </h4>
                            </div>

                            @if ($reservation->status == 'Menunggu')
                                <div class="mb-0 alert alert-info">
                                    <small>
                                        <i class="bi bi-info-circle"></i>
                                        Silakan hubungi admin untuk informasi pembayaran.
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-3 card">
                        <div class="card-body">
                            <h6 class="mb-3 card-title">Quick Actions</h6>
                            <div class="gap-2 d-grid">
                                <a href="{{ route('booking.index') }}" class="btn btn-outline-primary">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Booking
                                </a>
                                <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-house"></i> Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Cancel Booking -->
    <div class="modal fade" id="cancelModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-white modal-header bg-danger">
                    <h5 class="modal-title">Batalkan Booking</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('booking.cancel', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin membatalkan booking ini?</p>
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i>
                            <strong>Perhatian!</strong> Booking yang sudah dibatalkan tidak dapat dikembalikan.
                        </div>
                        <div class="mb-3">
                            <label for="cancel_reason" class="form-label">Alasan Pembatalan (Opsional)</label>
                            <textarea class="form-control" id="cancel_reason" name="cancel_reason" rows="3"
                                placeholder="Contoh: Ada keperluan mendadak..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-x-circle"></i> Ya, Batalkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection