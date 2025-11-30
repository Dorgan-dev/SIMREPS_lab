@extends('guest.layouts.app')

@section('content')
    <section id="contact" class="contact section">

        {{-- Section Title --}}
        <div class="container section-title" data-aos="fade-up">
            <h2>Ketersediaan Perangkat Konsol</h2>
            <p>Kami siap melayani Anda. Silakan pilih perangkat yang tersedia.</p>
        </div>

        <div class="m-4">
            <h1 class="h3 mb-2 text-gray-800">Data Console PlayStation</h1>
            <p class="mb-4">Daftar unit konsol yang tersedia untuk reservasi.</p>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Console Table</h6>
                        <form method="GET" action="">
                            <select name="kategori" onchange="this.form.submit()" class="form-select">
                                <option value="">Semua Kategori</option>
                                <option value="PS3" {{ request('kategori') == 'PS3' ? 'selected' : '' }}>PS 3</option>
                                <option value="PS4" {{ request('kategori') == 'PS4' ? 'selected' : '' }}>PS 4</option>
                                <option value="PS5" {{ request('kategori') == 'PS5' ? 'selected' : '' }}>PS 5</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Console ID</th>
                                    <th>Nama Konsol</th>
                                    <th>Nomor Unit</th>
                                    <th>Kategori</th>
                                    <th>Harga/Jam</th>
                                    <th>Ruangan</th>
                                    <th>Status</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr>
                                        <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                        <td>{{ $item->console_id }}</td>
                                        <td>{{ $item->nama_unit }}</td>
                                        <td>{{ $item->nomor_unit }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>Rp {{ number_format($item->harga_per_jam, 0, ',', '.') }}</td>
                                        <td>{{ $item->ruangan_id }}</td>
                                        <td>
                                            <span
                                                class="badge
                                            @if ($item->status == 'Tersedia') bg-success text-white
                                            @elseif($item->status == 'Dipesan') bg-warning text-dark
                                            @elseif($item->status == 'Perbaikan') bg-danger text-white
                                            @else bg-secondary text-white @endif">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-booking"
                                                data-console-id="{{ $item->console_id }}"
                                                data-nama="{{ $item->nama_unit }}" data-harga="{{ $item->harga_per_jam }}"
                                                data-bs-toggle="modal" data-bs-target="#orderModal">
                                                Booking
                                            </button>


                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted">Belum ada data console yang
                                            tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Booking --}}
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('customer.reservation.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="orderModalLabel">Form Reservasi Konsol</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Info Konsol --}}
                        <div class="mb-3 alert alert-info p-2">
                            <strong>Konsol Terpilih:</strong> <span id="modal-nama-unit"></span><br>
                            <strong>Harga per Jam:</strong> Rp <span id="modal-harga-per-jam"></span>
                            <input type="hidden" name="console_id" id="modal-console-id" required>
                            <input type="hidden" name="harga_per_jam" id="modal-harga-input" required>
                        </div>

                        @auth
                            <p>Reservasi untuk <strong>{{ Auth::user()->name }}</strong></p>
                        @else
                            <div class="mb-3">
                                <label for="cust_id" class="form-label">Atas Nama</label>
                                <input type="text" class="form-control" id="cust_id" name="cust_id"
                                    placeholder="Masukkan pemesan" required>
                            </div>
                        @endauth

                        {{-- Tanggal Bermain --}}
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Bermain</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_bermain" required>
                        </div>

                        {{-- Waktu Mulai --}}
                        <div class="mb-3">
                            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                        </div>

                        {{-- Durasi Jam --}}
                        <div class="mb-3">
                            <label for="durasi_jam" class="form-label">Durasi (Jam)</label>
                            <input type="number" class="form-control" id="durasi_jam" name="durasi_jam"
                                placeholder="Masukkan durasi jam" min="1" required>
                        </div>

                        <input type="hidden" name="status" value="Dipesan">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi Reservasi</button>
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

                const consoleId = button.getAttribute('data-console-id');
                const nama = button.getAttribute('data-nama');
                const harga = button.getAttribute('data-harga');

                document.getElementById('modal-console-id').value = consoleId;
                document.getElementById('modal-harga-input').value = harga;

                document.getElementById('modal-nama-unit').textContent = `${nama} (ID: ${consoleId})`;
                document.getElementById('modal-harga-per-jam').textContent =
                    new Intl.NumberFormat('id-ID').format(harga);

                // isi tanggal & waktu otomatis
                const now = new Date();
                document.getElementById('tanggal').value = now.toISOString().split('T')[0];

                const hh = String(now.getHours()).padStart(2, '0');
                const mm = String(now.getMinutes()).padStart(2, '0');
                document.getElementById('waktu_mulai').value = `${hh}:${mm}`;
            });
        });
    </script>
@endsection
