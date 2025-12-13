@extends('_customer.layouts.app')

@section('title', 'Pilih PlayStation')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Pilih PlayStation</h3>
                    <p class="text-subtitle text-muted">Pilih console yang ingin Anda booking</p>
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

            <!-- Console Grid -->
            @if ($consoles->count() > 0)
                <div class="row">
                    @foreach ($consoles as $console)
                        <div class="col-12 col-md-6 col-lg-4 console-card" data-category="{{ $console->kategori }}">
                            <div class="card h-100">
                                <!-- Image -->
                                <div class="card-img-top" style="height: 200px; overflow: hidden; position: relative;">
                                    @if ($console->primaryImage)
                                        <img src="{{ asset('storage/' . $console->primaryImage->image_path) }}"
                                            alt="{{ $console->nama_unit }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div class="text-white d-flex align-items-center justify-content-center bg-gradient-primary"
                                            style="width: 100%; height: 100%;">
                                            <i class="bi bi-controller" style="font-size: 4rem;"></i>
                                        </div>
                                    @endif

                                    <!-- Badge Kategori -->
                                    <div class="top-0 m-2 position-absolute end-0">
                                        <span class="badge bg-light text-dark">{{ $console->kategori }}</span>
                                    </div>

                                    <!-- Badge Status -->
                                    <div class="top-0 m-2 position-absolute start-0">
                                        @if ($console->status == 'Tersedia')
                                            <span class="badge bg-success">Tersedia</span>
                                        @elseif($console->status == 'Dipesan')
                                            <span class="badge bg-warning">Dipesan</span>
                                        @else
                                            <span class="badge bg-danger">Perbaikan</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $console->nama_unit }}</h5>
                                    <p class="card-text text-muted small">{{ $console->nomor_unit }}</p>

                                    @if ($console->room)
                                        <div class="mb-2">
                                            <i class="bi bi-geo-alt-fill text-primary"></i>
                                            <small class="text-muted">{{ $console->room->name }}</small>
                                        </div>
                                    @endif

                                    @if ($console->deskripsi)
                                        <p class="card-text small text-muted">
                                            {{ Str::limit($console->deskripsi, 80) }}
                                        </p>
                                    @endif

                                    <div class="mt-auto">
                                        <div class="mb-3 d-flex justify-content-between align-items-center">
                                            <div>
                                                <small class="text-muted d-block">Harga per jam</small>
                                                <h4 class="mb-0 text-primary">
                                                    Rp {{ number_format($console->harga_per_jam, 0, ',', '.') }}
                                                </h4>
                                            </div>
                                        </div>

                                        <a href="{{ route('booking.schedule', $console->id) }}"
                                            class="btn btn-primary w-100">
                                            <i class="bi bi-calendar-check"></i> Booking Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card">
                    <div class="py-5 text-center card-body">
                        <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                        <h5 class="mt-3">Tidak Ada Console Tersedia</h5>
                        <p class="text-muted">Mohon maaf, saat ini tidak ada console yang tersedia untuk booking.</p>
                        <a href="{{ route('customer.dashboard') }}" class="mt-3 btn btn-primary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
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
            const consoleCards = document.querySelectorAll('.console-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const category = this.dataset.category;

                    // Update active button
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'btn-primary');
                        b.classList.add('btn-outline-primary');
                    });
                    this.classList.add('active', 'btn-primary');
                    this.classList.remove('btn-outline-primary');

                    // Filter cards
                    consoleCards.forEach(card => {
                        if (category === 'all' || card.dataset.category === category) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endpush
