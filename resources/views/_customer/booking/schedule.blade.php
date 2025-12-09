@extends('_customer.layouts.app')

@section('title', 'Booking ' . $console->nama_unit)

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Booking PlayStation</h3>
                    <p class="text-subtitle text-muted">Pilih jadwal booking untuk {{ $console->nama_unit }}</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Booking</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pilih Jadwal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <!-- Console Info -->
                <div class="col-md-5">
                    <div class="card">
                        @if ($console->primaryImage)
                            <img src="{{ asset('storage/' . $console->primaryImage->image_path) }}" class="card-img-top"
                                alt="{{ $console->nama_unit }}" style="height: 250px; object-fit: cover;">
                        @else
                            <div class="text-white card-img-top bg-gradient-primary d-flex align-items-center justify-content-center"
                                style="height: 250px;">
                                <i class="bi bi-controller" style="font-size: 5rem;"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 card-title">{{ $console->nama_unit }}</h4>
                                <span class="badge bg-primary">{{ $console->kategori }}</span>
                            </div>

                            <p class="text-muted">{{ $console->nomor_unit }}</p>

                            <div class="list-group list-group-flush">
                                @if ($console->room)
                                    <div class="px-0 list-group-item">
                                        <i class="bi bi-geo-alt-fill text-primary"></i>
                                        <strong>Ruangan:</strong> {{ $console->room->name }}
                                    </div>
                                @endif

                                <div class="px-0 list-group-item">
                                    <i class="bi bi-cash-stack text-success"></i>
                                    <strong>Harga:</strong>
                                    <span class="mb-0 h5 text-primary">
                                        Rp {{ number_format($console->harga_per_jam, 0, ',', '.') }}/jam
                                    </span>
                                </div>

                                <div class="px-0 list-group-item">
                                    <i class="bi bi-circle-fill text-success"></i>
                                    <strong>Status:</strong>
                                    <span class="badge bg-success">{{ $console->status }}</span>
                                </div>
                            </div>

                            @if ($console->deskripsi)
                                <div class="pt-3 mt-3 border-top">
                                    <p class="mb-0 text-muted small">{{ $console->deskripsi }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Booking</h4>
                        </div>

                        <div class="card-body">
                            <!-- Alert Messages -->
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div id="availabilityAlert" class="alert alert-dismissible fade d-none" role="alert">
                                <span id="alertMessage"></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="console_id" value="{{ $console->id }}">

                                <!-- Tanggal -->
                                <div class="mb-3 form-group">
                                    <label for="tanggal" class="form-label">
                                        <i class="bi bi-calendar3"></i> Tanggal <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="tanggal" name="tanggal" min="{{ date('Y-m-d') }}"
                                        value="{{ old('tanggal') }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Waktu Mulai -->
                                <div class="mb-3 form-group">
                                    <label for="waktu_mulai" class="form-label">
                                        <i class="bi bi-clock"></i> Waktu Mulai <span class="text-danger">*</span>
                                    </label>
                                    <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror"
                                        id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required>
                                    @error('waktu_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Durasi -->
                                <div class="mb-3 form-group">
                                    <label for="durasi_jam" class="form-label">
                                        <i class="bi bi-hourglass-split"></i> Durasi <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('durasi_jam') is-invalid @enderror" id="durasi_jam"
                                        name="durasi_jam" required>
                                        <option value="">-- Pilih Durasi --</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('durasi_jam') == $i ? 'selected' : '' }}>
                                                {{ $i }} Jam
                                            </option>
                                        @endfor
                                    </select>
                                    @error('durasi_jam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Summary Box -->
                                <div id="summaryBox" class="card bg-light d-none">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <i class="bi bi-info-circle"></i> Ringkasan Booking
                                        </h6>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <small class="text-muted">Waktu Selesai:</small>
                                            </div>
                                            <div class="col-6 text-end">
                                                <strong id="waktuSelesai">-</strong>
                                            </div>
                                        </div>
                                        <div class="mt-2 row">
                                            <div class="col-6">
                                                <small class="text-muted">Total Harga:</small>
                                            </div>
                                            <div class="col-6 text-end">
                                                <h5 class="mb-0 text-primary" id="totalHarga">-</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="gap-2 mt-4 d-grid">
                                    <button type="button" id="checkBtn" class="btn btn-primary btn-lg"
                                        onclick="console.log('Button clicked!')">
                                        <i class="bi bi-search"></i> Cek Ketersediaan
                                    </button>

                                    <button type="submit" id="bookBtn" class="btn btn-success btn-lg d-none">
                                        <i class="bi bi-check-circle"></i> Booking Sekarang
                                    </button>

                                    <a href="{{ route('booking.index') }}" class="btn btn-secondary btn-lg">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Script loaded!'); // Debug log

        const checkBtn = document.getElementById('checkBtn');
        const bookBtn = document.getElementById('bookBtn');
        const summaryBox = document.getElementById('summaryBox');
        const alertBox = document.getElementById('availabilityAlert');
        const alertMessage = document.getElementById('alertMessage');

        console.log('checkBtn:', checkBtn); // Debug log
        console.log('bookBtn:', bookBtn); // Debug log

        if (!checkBtn) {
            console.error('Button tidak ditemukan!');
            return;
        }

        // Reset form state when inputs change
        ['tanggal', 'waktu_mulai', 'durasi_jam'].forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.addEventListener('change', function() {
                    bookBtn.classList.add('d-none');
                    checkBtn.classList.remove('d-none');
                    summaryBox.classList.add('d-none');
                    alertBox.classList.add('d-none');
                });
            }
        });

        // Check Availability
        checkBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            console.log('Button diklik!'); // Debug log

            const tanggal = document.getElementById('tanggal').value;
            const waktuMulai = document.getElementById('waktu_mulai').value;
            const durasiJam = document.getElementById('durasi_jam').value;
            const consoleId = {{ $console->id }};

            console.log('Data:', {
                tanggal,
                waktuMulai,
                durasiJam
            }); // Debug log

            if (!tanggal || !waktuMulai || !durasiJam) {
                showAlert('Mohon lengkapi semua field!', 'danger');
                return;
            }

            checkBtn.disabled = true;
            checkBtn.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span> Mengecek...';

            try {
                const response = await fetch('{{ route('booking.check') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        console_id: consoleId,
                        tanggal: tanggal,
                        waktu_mulai: waktuMulai,
                        durasi_jam: parseInt(
                            durasiJam) // CAST ke integer di frontend juga
                    })
                });

                console.log('Response status:', response.status); // Debug
                console.log('Response headers:', response.headers); // Debug

                // Cek jika response bukan JSON
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    const text = await response.text();
                    console.error('Response HTML:', text); // Debug - tampilkan error page
                    showAlert('Server error. Cek console untuk detail.', 'danger');
                    return;
                }

                const data = await response.json();
                console.log('Response:', data); // Debug log

                if (data.available) {
                    showAlert(data.message, 'success');
                    document.getElementById('waktuSelesai').textContent = data.waktu_selesai;
                    document.getElementById('totalHarga').textContent = data.total_harga_formatted;
                    summaryBox.classList.remove('d-none');
                    bookBtn.classList.remove('d-none');
                    checkBtn.classList.add('d-none');
                } else {
                    showAlert(data.message, 'danger');
                    summaryBox.classList.add('d-none');
                }

            } catch (error) {
                console.error('Error:', error); // Debug log
                showAlert('Terjadi kesalahan. Silakan coba lagi.', 'danger');
            } finally {
                checkBtn.disabled = false;
                checkBtn.innerHTML = '<i class="bi bi-search"></i> Cek Ketersediaan';
            }
        });

        function showAlert(message, type) {
            alertMessage.innerHTML = (type === 'success' ?
                '<i class="bi bi-check-circle"></i> ' :
                '<i class="bi bi-exclamation-triangle"></i> ') + message;
            alertBox.className = 'alert alert-' + type + ' alert-dismissible fade show';
            alertBox.classList.remove('d-none');
        }
    });
</script>

@push('scripts')
    <!-- Additional scripts if needed -->
@endpush
