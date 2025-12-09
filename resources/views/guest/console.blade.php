@extends('guest.layouts.app')

@section('content')
    <div class="container mb-4" data-aos="fade-up">

        {{-- HEADER --}}
        <div class="row py-4 mb-3 border-bottom">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-1">Available PlayStation Units</h2>
                <p class="text-muted mb-0">
                    Pilih dan lakukan reservasi PlayStation favoritmu
                </p>
            </div>
        </div>

        {{-- LIST CONSOLE --}}
        <div class="row g-4">

            @forelse ($consoles as $console)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                    <div class="card h-100 shadow-sm border-0">

                        {{-- GAMBAR & STATUS --}}
                        <div class="position-relative">
                            @php
                                $images = $console->images ?? collect();
                                $primary = $images->where('is_primary', true)->first();

                                $imgSrc = $primary
                                    ? asset('storage/' . $primary->image_path)
                                    : asset('storage/default-image.png');

                                $statusClass = match ($console->status) {
                                    'Tersedia' => 'bg-success text-white',
                                    'Dipesan' => 'bg-warning text-dark',
                                    'Perbaikan' => 'bg-danger text-white',
                                    default => 'bg-secondary text-white',
                                };
                            @endphp

                            <img src="{{ $imgSrc }}" class="card-img-top rounded-top" alt="{{ $console->nama_unit }}"
                                style="height: 200px; object-fit: cover;">

                            <span class="badge {{ $statusClass }} position-absolute top-0 end-0 m-2">
                                {{ $console->status }}
                            </span>
                        </div>

                        {{-- CONTENT --}}
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title mb-1">{{ $console->nama_unit }}</h5>

                            {{-- KATEGORI --}}
                            <small class="text-muted d-flex align-items-center mb-1 gap-2">
                                <i class="bi bi-controller"></i>{{ $console->kategori }}
                            </small>

                            {{-- RUANGAN --}}
                            <small class="text-muted d-flex align-items-center mb-1 gap-2">
                                <i class="bi bi-door-open"></i>
                                {{ $console->room->name ?? 'Tidak ada ruangan' }}
                            </small>

                            {{-- NOMOR UNIT --}}
                            <small class="text-muted d-flex align-items-center mb-3 gap-2">
                                <i class="bi bi-hdd"></i>Unit #{{ $console->nomor_unit }}
                            </small>

                            {{-- HARGA --}}
                            <h6 class="text-primary fw-bold mt-auto mb-3 text-center">
                                Rp {{ number_format($console->harga_per_jam) }} / jam
                            </h6>

                            {{-- TOMBOL BOOKING --}}
                            @if ($console->status == 'Tersedia')
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#orderModal" data-console-id="{{ $console->id }}"
                                    data-nama="{{ $console->nama_unit }}" data-harga="{{ $console->harga_per_jam }}">
                                    <i class="bi bi-calendar2-plus"></i> Booking Sekarang
                                </button>
                            @else
                                <button class="btn btn-secondary w-100" disabled>
                                    <i class="bi bi-lock"></i> Tidak Tersedia
                                </button>
                            @endif

                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> Belum ada console yang tersedia.
                    </div>
                </div>
            @endforelse

        </div>
        {{-- PAGINATION --}}
        @if ($consoles->hasPages())
            <div class="mt-5 pt-4 border-top text-center">

                <small class="text-muted d-block mb-3">
                    Menampilkan <strong>{{ $consoles->firstItem() }}</strong> –
                    <strong>{{ $consoles->lastItem() }}</strong> dari
                    <strong>{{ $consoles->total() }}</strong> console
                </small>

                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-center">

                        {{-- PREVIOUS --}}
                        <li class="page-item {{ $consoles->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $consoles->previousPageUrl() }}" tabindex="-1">
                                &laquo; Previous
                            </a>
                        </li>

                        {{-- NUMBER --}}
                        @foreach ($consoles->links()->elements[0] as $page => $url)
                            <li class="page-item {{ $page == $consoles->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- NEXT --}}
                        <li class="page-item {{ !$consoles->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $consoles->nextPageUrl() }}">
                                Next &raquo;
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>
        @endif

    </div>


    {{-- MODAL BOOKING --}}
    <div class="modal fade" id="orderModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('customer.reservation.store') }}" method="POST">
                @csrf

                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h1 class="modal-title fs-5">
                            <i class="bi bi-controller"></i> Form Reservasi Konsol
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        {{-- INFO KONSOL --}}
                        <div class="alert alert-info mb-4">
                            <div><strong>Konsol:</strong> <span id="modal-nama-unit"></span></div>
                            <div><strong>Harga/jam:</strong> Rp <span id="modal-harga-per-jam"></span></div>
                            <input type="hidden" name="console_id" id="modal-console-id">
                            <input type="hidden" name="harga_per_jam" id="modal-harga-input">
                        </div>

                        {{-- NAMA PEMESAN --}}
                        @auth
                            <div class="mb-3">
                                <small class="text-muted">Reservasi untuk:</small>
                                <p class="fw-bold">{{ Auth::user()->name }}</p>
                            </div>
                        @else
                            <div class="mb-4">
                                <label class="form-label fw-bold">Atas Nama</label>
                                <input type="text" class="form-control" name="cust_id" required>
                            </div>
                        @endauth

                        {{-- FORM WAKTU --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Bermain</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_bermain" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Waktu Mulai</label>
                            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Durasi (Jam)</label>
                            <input type="number" class="form-control" id="durasi_jam" name="durasi_jam" min="1"
                                required>
                        </div>

                        <input type="hidden" name="status" value="Dipesan">
                    </div>

                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Konfirmasi Reservasi
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    {{-- SCRIPT MODAL --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('orderModal');

            modal.addEventListener('show.bs.modal', event => {
                const btn = event.relatedTarget;

                // SET DATA KONSOLE → INPUT
                const id = btn.getAttribute('data-console-id');
                const nama = btn.getAttribute('data-nama');
                const harga = btn.getAttribute('data-harga');

                document.getElementById('modal-console-id').value = id;
                document.getElementById('modal-harga-input').value = harga;

                // SET TAMPILAN
                document.getElementById('modal-nama-unit').textContent = `${nama} (ID: ${id})`;
                document.getElementById('modal-harga-per-jam').textContent =
                    new Intl.NumberFormat('id-ID').format(harga);

                // AUTO ISI TANGGAL/WAKTU SAAT INI
                const now = new Date();
                document.getElementById('tanggal').value = now.toISOString().split('T')[0];

                const hh = String(now.getHours()).padStart(2, '0');
                const mm = String(now.getMinutes()).padStart(2, '0');
                document.getElementById('waktu_mulai').value = `${hh}:${mm}`;
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
@endsection
