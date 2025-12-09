@extends('guest.layouts.app')

@section('content')
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-5">Available PlayStation Units</h3>
            </div>

            @forelse ($consoles as $console)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm">

                        {{-- GAMBAR CONSOLE --}}
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

                            <img src="{{ $imgSrc }}" class="card-img-top" alt="{{ $console->nama_unit }}"
                                style="height: 200px; object-fit: cover;">

                            <span class="badge {{ $statusClass }} position-absolute top-0 end-0 m-2">
                                {{ $console->status }}
                            </span>
                        </div>

                        {{-- CONTENT --}}
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">{{ $console->nama_unit }}</h5>

                            {{-- KATEGORI --}}
                            <div class="mb-2">
                                <small class="text-muted d-flex align-items-center gap-2">
                                    <i class="bi bi-controller"></i>
                                    <span>{{ $console->kategori }}</span>
                                </small>
                            </div>

                            {{-- ROOM NAME (BARU DITAMBAHKAN) --}}
                            <div class="mb-2">
                                <small class="text-muted d-flex align-items-center gap-2">
                                    <i class="bi bi-door-open"></i>
                                    <span>Ruangan: {{ $console->room->name ?? 'Tidak ada ruangan' }}</span>
                                </small>
                            </div>

                            {{-- NOMOR UNIT --}}
                            <div class="mb-3">
                                <small class="text-muted d-flex align-items-center gap-2">
                                    <i class="bi bi-hdd"></i>
                                    <span>Unit #{{ $console->nomor_unit }}</span>
                                </small>
                            </div>

                            {{-- HARGA --}}
                            <div class="mb-3 mt-auto">
                                <h6 class="text-primary fw-bold mb-0">
                                    Rp {{ number_format($console->harga_per_jam) }}/jam
                                </h6>
                            </div>

                            {{-- BUTTON --}}
                            <div>
                                @if ($console->status == 'Tersedia')
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#orderModal" data-console-id="{{ $console->id }}"
                                        data-nama="{{ $console->nama_unit }}" data-harga="{{ $console->harga_per_jam }}">
                                        <i class="bi bi-calendar2-plus"></i> Booking
                                    </button>
                                @else
                                    <button class="btn btn-secondary w-100" disabled>
                                        <i class="bi bi-lock"></i> Sudah dipesan
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle"></i> Belum ada console yang tersedia.
                    </div>
                </div>
            @endforelse

        </div>

        {{-- PAGINATION CUSTOM --}}
        @if ($consoles->hasPages())
            <div class="mt-5 pt-4 border-top">
                {{-- Info Data --}}
                <div class="text-center mb-4">
                    <small class="text-muted d-block">
                        Menampilkan <strong>{{ $consoles->firstItem() }}</strong> hingga
                        <strong>{{ $consoles->lastItem() }}</strong> dari
                        <strong>{{ $consoles->total() }}</strong> console
                    </small>
                    <small class="text-muted d-block mt-1">
                        Halaman <strong>{{ $consoles->currentPage() }}</strong> dari
                        <strong>{{ $consoles->lastPage() }}</strong>
                    </small>
                </div>

                {{-- Pagination Numbers --}}
                <div class="d-flex justify-content-center gap-2 mb-4">
                    @foreach ($consoles->getUrlRange(1, $consoles->lastPage()) as $page => $url)
                        @if ($page == $consoles->currentPage())
                            <span class="badge bg-primary" style="padding: 8px 12px; font-size: 14px; cursor: pointer;">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="badge bg-light border"
                                style="padding: 8px 12px; font-size: 14px; text-decoration: none; color: #333; cursor: pointer;">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                </div>

                {{-- Next & Previous Buttons --}}
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    @if ($consoles->onFirstPage())
                        <button class="btn btn-outline-secondary" disabled>
                            <i class="bi bi-chevron-left"></i> Previous
                        </button>
                    @else
                        <a href="{{ $consoles->previousPageUrl() }}" class="btn btn-outline-primary">
                            <i class="bi bi-chevron-left"></i> Previous
                        </a>
                    @endif

                    @if ($consoles->hasMorePages())
                        <a href="{{ $consoles->nextPageUrl() }}" class="btn btn-outline-primary">
                            Next <i class="bi bi-chevron-right"></i>
                        </a>
                    @else
                        <button class="btn btn-outline-secondary" disabled>
                            Next <i class="bi bi-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </div>
        @endif
    </div>

    {{-- Modal Booking --}}
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('customer.reservation.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h1 class="modal-title fs-5" id="orderModalLabel">
                            <i class="bi bi-controller"></i> Form Reservasi Konsol
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        {{-- Info Konsol --}}
                        <div class="alert alert-info mb-4" role="alert">
                            <div class="mb-2">
                                <strong>Konsol Terpilih:</strong> <span id="modal-nama-unit"></span>
                            </div>
                            <div>
                                <strong>Harga per Jam:</strong> Rp <span id="modal-harga-per-jam"></span>
                            </div>
                            <input type="hidden" name="console_id" id="modal-console-id" required>
                            <input type="hidden" name="harga_per_jam" id="modal-harga-input" required>
                        </div>

                        {{-- Nama Pemesan --}}
                        @auth
                            <div class="mb-3">
                                <small class="text-muted">Reservasi untuk:</small>
                                <p class="fw-bold mb-0">{{ Auth::user()->name }}</p>
                            </div>
                        @else
                            <div class="mb-4">
                                <label for="cust_id" class="form-label fw-bold">Atas Nama</label>
                                <input type="text" class="form-control" id="cust_id" name="cust_id"
                                    placeholder="Masukkan nama pemesan" required>
                            </div>
                        @endauth

                        {{-- Tanggal Bermain --}}
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-bold">Tanggal Bermain</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_bermain" required>
                        </div>

                        {{-- Waktu Mulai --}}
                        <div class="mb-3">
                            <label for="waktu_mulai" class="form-label fw-bold">Waktu Mulai</label>
                            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                        </div>

                        {{-- Durasi Jam --}}
                        <div class="mb-3">
                            <label for="durasi_jam" class="form-label fw-bold">Durasi (Jam)</label>
                            <input type="number" class="form-control" id="durasi_jam" name="durasi_jam"
                                placeholder="Masukkan durasi jam" min="1" required>
                        </div>

                        <input type="hidden" name="status" value="Dipesan">
                    </div>

                    <div class="modal-footer border-top pt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Konfirmasi Reservasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orderModal = document.getElementById('orderModal');

            orderModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Ambil data dari tombol
                const consoleId = button.getAttribute('data-console-id');
                const nama = button.getAttribute('data-nama');
                const harga = button.getAttribute('data-harga');

                // ✅ ISI KE INPUT HIDDEN
                document.getElementById('modal-console-id').value = consoleId;
                document.getElementById('modal-harga-input').value = harga;

                // ✅ ISI KE TEKS PREVIEW
                document.getElementById('modal-nama-unit').textContent = `${nama} (ID: ${consoleId})`;
                document.getElementById('modal-harga-per-jam').textContent =
                    new Intl.NumberFormat('id-ID').format(harga);

                // ✅ AUTO ISI TANGGAL & WAKTU SAAT INI
                const now = new Date();

                document.getElementById('tanggal').value = now.toISOString().split('T')[0];

                const hh = String(now.getHours()).padStart(2, '0');
                const mm = String(now.getMinutes()).padStart(2, '0');
                document.getElementById('waktu_mulai').value = `${hh}:${mm}`;
            });
        });
    </script>
@endsection
