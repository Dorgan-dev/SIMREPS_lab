@extends('guest.layouts.app')

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>{{ $room->name }}</h1>
                        <p class="mb-0">{{ $room->category }} Room</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="">Rooms</a></li>
                    <li class="current">{{ $room->name }}</li>
                </ol>
            </div>
        </nav>
    </div>

    <section class="room-detail section">
        <div class="container" data-aos="fade-up">

            {{-- PHOTO GALLERY SLIDER --}}
            <div class="row mb-5">
                <div class="col-lg-8">
                    <div id="roomGalleryCarousel" class="carousel slide" data-bs-ride="carousel">
                        {{-- INDICATOR --}}
                        <div class="carousel-indicators">
                            @foreach ($room->images as $index => $image)
                                <button type="button" data-bs-target="#roomGalleryCarousel"
                                    data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}">
                                </button>
                            @endforeach
                        </div>

                        {{-- SLIDER --}}
                        <div class="carousel-inner">
                            @forelse ($room->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100"
                                        style="height: 500px; object-fit: cover; border-radius: 10px;">
                                </div>
                            @empty
                                {{-- FALLBACK JIKA BELUM ADA FOTO --}}
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/default-image.png') }}" class="d-block w-100"
                                        style="height: 500px; object-fit: cover; border-radius: 10px;">
                                </div>
                            @endforelse
                        </div>


                        <button class="carousel-control-prev" type="button" data-bs-target="#roomGalleryCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#roomGalleryCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                {{-- ROOM INFO SIDEBAR --}}
                <div class="col-lg-4">
                    <div class="room-info-card">
                        <div class="price-section">
                            <h3>Kategory: <span>{{ $room->category }}</span></h3>
                            @if ($room->category === 'VIP')
                                <span class="badge bg-warning text-dark">Popular</span>
                            @endif
                        </div>

                        <div class="room-features mt-4">
                            <div class="feature-item">
                                <i class="bi bi-controller"></i>
                                <div>
                                    <strong>{{ $room->consoles->count() }}</strong>
                                    <span>PlayStation Units</span>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-people-fill"></i>
                                <div>
                                    <strong>{{ $room->capacity ?? 'N/A' }}</strong>
                                    <span>Max Capacity</span>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-wifi"></i>
                                <div>
                                    <strong>Free WiFi</strong>
                                    <span>High Speed</span>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-tv"></i>
                                <div>
                                    <strong>HD Display</strong>
                                    <span>Premium Quality</span>
                                </div>
                            </div>
                        </div>

                        <a href="" class="btn btn-primary w-100 mt-4">
                            <i class="bi bi-calendar-check"></i> Reserve Now
                        </a>
                    </div>
                </div>
            </div>

            {{-- ROOM DESCRIPTION --}}
            <div class="row mb-5">
                <div class="content-section">
                    <h3>About This Room</h3>
                    <p>{{ $room->description }}</p>

                    <h4 class="mt-4">Room Amenities</h4>
                    <ul class="amenities-list">
                        <li><i class="bi bi-check-circle-fill"></i> High-quality gaming chairs</li>
                        <li><i class="bi bi-check-circle-fill"></i> Air conditioning</li>
                        <li><i class="bi bi-check-circle-fill"></i> Snack & beverage area</li>
                        <li><i class="bi bi-check-circle-fill"></i> Private restroom</li>
                        <li><i class="bi bi-check-circle-fill"></i> Soundproof walls</li>
                        <li><i class="bi bi-check-circle-fill"></i> LED ambient lighting</li>
                    </ul>
                </div>
            </div>

            {{-- PLAYSTATION LIST --}}
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-4" data-aos="fade-up">Available PlayStation Units</h3>
                </div>

                @forelse ($room->consoles as $console)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="ps-card">

                            {{-- GAMBAR CONSOLE --}}
                            <div class="course-image" style="position: relative;">

                                @php
                                    // Safe collection
                                    $imagesCollection = $console->images ?? collect();

                                    // Primary image
                                    $primaryImage = $imagesCollection->where('is_primary', true)->first();

                                    // Final image source
                                    $imgSrc = $primaryImage
                                        ? asset('storage/' . $primaryImage->image_path)
                                        : asset('storage/default-image.png');

                                    // Badge Styling
                                    $statusClass = match ($console->status) {
                                        'Tersedia' => 'bg-success text-white',
                                        'Dipesan' => 'bg-warning text-dark',
                                        'Perbaikan' => 'bg-danger text-white',
                                        default => 'bg-secondary text-white',
                                    };
                                @endphp

                                <img src="{{ $imgSrc }}" class="img-fluid w-100"
                                    style="height: 200px; object-fit: cover;">

                                {{-- Badge Status --}}
                                <span class="badge {{ $statusClass }}"
                                    style="position: absolute; top: 10px; right: 10px;">
                                    {{ $console->status }}
                                </span>
                            </div>

                            {{-- CONTENT --}}
                            <div class="ps-content">
                                <h5>{{ $console->nama_unit }}</h5>

                                <div class="ps-type">
                                    <i class="bi bi-controller"></i>
                                    <span>{{ $console->kategori }}</span>
                                </div>

                                <div class="ps-specs mt-2">
                                    <small class="text-muted">
                                        <i class="bi bi-hdd"></i> Unit #{{ $console->nomor_unit }}
                                    </small>
                                </div>

                                <div class="mt-1 mb-2">
                                    <strong>Rp {{ number_format($console->harga_per_jam) }}/jam</strong>
                                </div>

                                {{-- Button Booking --}}
                                @if ($console->status == 'Tersedia')
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                        data-bs-target="#orderModal" data-console-id="{{ $console->id }}"
                                        data-nama="{{ $console->nama_unit }}" data-harga="{{ $console->harga_per_jam }}">
                                        Booking
                                    </button>
                                @else
                                    <button class="btn btn-secondary mt-2" disabled>
                                        Sudah dipesan
                                    </button>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Belum ada unit console di room ini.
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- RESERVATION STATS --}}
            <div class="row mt-5">
                <div class="col-12">
                    <div class="stats-card">
                        <div class="stat-item">
                            <i class="bi bi-calendar-check"></i>
                            <div>
                                <h4>120</h4>
                                <span>Total Reservations</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="bi bi-star-fill"></i>
                            <div>
                                <h4>4.8</h4>
                                <span>Average Rating</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="bi bi-clock"></i>
                            <div>
                                <h4>1-24</h4>
                                <span>Hours Available</span>
                            </div>
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

                        <input type="hidden" name="status" value="Menunggu">
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


    <style>
        /* Room Info Card */
        .room-info-card {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .price-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .price-section .price {
            color: #5fcf80;
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        .price-section .price span {
            font-size: 18px;
            color: #666;
            font-weight: normal;
        }

        .room-features {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .feature-item i {
            font-size: 32px;
            color: #5fcf80;
        }

        .feature-item strong {
            display: block;
            font-size: 18px;
            color: #333;
        }

        .feature-item span {
            font-size: 14px;
            color: #666;
        }

        /* Room Manager Card */
        .room-manager-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .room-manager-card h5 {
            margin-bottom: 15px;
            color: #333;
        }

        .manager-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .manager-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .manager-info h6 {
            margin: 0;
            color: #333;
            font-size: 16px;
        }

        .manager-info span {
            font-size: 14px;
            color: #666;
        }

        /* Content Section */
        .content-section {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .content-section h3 {
            color: #333;
            margin-bottom: 20px;
        }

        .content-section h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .amenities-list {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 10px;
        }

        .amenities-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
        }

        .amenities-list li i {
            color: #5fcf80;
            font-size: 18px;
        }

        /* PlayStation Card */
        .ps-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ps-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .ps-image {
            position: relative;
            /* sudah ada, pastikan ada */
            overflow: visible;
            /* ubah dari hidden ke visible agar badge tidak terpotong */
            height: 200px;
            /* tetap seperti semula */
        }

        .ps-status {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            /* pastikan badge di atas gambar */
            padding: 5px 15px;
            /* sudah ada, bisa disesuaikan */
            border-radius: 20px;
            /* sudah ada */
            font-size: 12px;
            /* sudah ada */
            font-weight: bold;
            /* sudah ada */
            text-transform: uppercase;
            /* sudah ada */
            white-space: nowrap;
            /* supaya tulisan status tidak terpotong jadi baris baru */
        }


        .ps-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .ps-status.available {
            background: #5fcf80;
            color: #fff;
        }

        .ps-status.unavailable {
            background: #dc3545;
            color: #fff;
        }

        .ps-content {
            padding: 20px;
        }

        .ps-content h5 {
            margin-bottom: 10px;
            color: #333;
            font-size: 18px;
        }

        .ps-type {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }

        .ps-type i {
            color: #5fcf80;
        }

        /* Stats Card */
        .stats-card {
            background: linear-gradient(135deg, #5fcf80 0%, #4ab96d 100%);
            border-radius: 10px;
            padding: 40px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 20px;
            color: #fff;
        }

        .stat-item i {
            font-size: 48px;
            opacity: 0.9;
        }

        .stat-item h4 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
            color: #fff;
        }

        .stat-item span {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Carousel Custom Styling */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            padding: 20px;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        /* Rating */
        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rating i {
            color: #ffc107;
        }

        .rating span {
            margin-left: 5px;
            color: #666;
        }

        /* Responsive */
        @media (max-width: 991px) {

            .room-info-card,
            .room-manager-card {
                margin-top: 30px;
            }

            .stats-card {
                flex-direction: column;
                text-align: center;
            }

            .stat-item {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
@endsection
