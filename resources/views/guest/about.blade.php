@extends('guest.layouts.app')

@section('content')
    <main id="main">

        <!-- Section Title -->
        <section class="page-title light-background">
            <div class="container page-title light-background section-title">
                <h2>Tentang Kami</h2>
                <p>Mengenal lebih dekat SIMREPS sebagai platform manajemen dan reservasi PlayStation yang modern dan
                    efisien.</p>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('img/main.jpg') }}" class="img-fluid rounded" alt="Tentang SIMREPS">
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3>Sistem Informasi untuk Pengelolaan PS yang Lebih Mudah</h3>
                        <p class="fst-italic">
                            SIMREPS hadir sebagai solusi digital untuk membantu pemilik rental PlayStation dalam mengelola
                            reservasi, transaksi, hingga laporan operasional secara praktis dan terintegrasi.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Dikembangkan sejak 2020 dengan fokus pada layanan rental
                                PS.</li>
                            <li><i class="bi bi-check-circle"></i> Mendukung berbagai jenis usaha rental, dari skala kecil
                                hingga besar.</li>
                            <li><i class="bi bi-check-circle"></i> Dibangun oleh tim profesional berpengalaman di bidang
                                sistem informasi.</li>
                        </ul>
                        <p>
                            Tujuan kami adalah menghadirkan teknologi yang mempermudah kegiatan operasional dan memberikan
                            pengalaman reservasi yang cepat serta nyaman bagi pelanggan.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- Goals Section -->
        <section id="goals" class="goals section bg-light">
            <div class="container" data-aos="fade-up">

                <div class="row mb-5">
                    <div class="col-md-12 text-center">
                        <h3 class="mb-3">✨ Visi Kami</h3>
                        <p>
                            Menjadi platform manajemen dan reservasi PlayStation terbaik yang memberikan solusi efektif,
                            efisien, dan mudah digunakan oleh semua pemilik rental di Indonesia.
                        </p>
                    </div>
                </div>

                <div class="row gy-4">
                    <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-4 shadow-sm bg-white rounded flex-fill">
                            <h4>Inovasi Berkelanjutan</h4>
                            <p>Menghadirkan fitur-fitur terbaru untuk mendukung kebutuhan operasional rental PlayStation.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="p-4 shadow-sm bg-white rounded flex-fill">
                            <h4>Layanan Berkualitas</h4>
                            <p>Memberikan pengalaman pengguna terbaik bagi pemilik rental dan pelanggan.</p>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="p-4 shadow-sm bg-white rounded flex-fill">
                            <h4>Peningkatan SDM</h4>
                            <p>Mendukung pengembangan kemampuan tim melalui pembelajaran teknologi terkini.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Team Section -->
        <section id="team" class="team section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Tim Kami</h2>
                <p>Tim profesional yang berdedikasi untuk menghadirkan pengalaman manajemen dan reservasi PlayStation
                    terbaik.</p>
            </div>

            <div class="container">
                <div class="row gy-4">

                    <!-- Team Member 1 -->
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member shadow-sm rounded bg-white p-4 text-center">
                            <img src="{{ asset('assets/img/team/team-1.webp') }}" class="img-fluid rounded-circle mb-3"
                                alt="M. Ridho Saputra">
                            <div class="member-info">
                                <h4>M. Ridho Saputra</h4>
                                <span>Chief Executive Officer</span>
                                <p>Bertanggung jawab atas visi dan strategi perusahaan serta memastikan SIMREPS terus
                                    berkembang sesuai kebutuhan pengguna.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member shadow-sm rounded bg-white p-4 text-center">
                            <img src="{{ asset('assets/img/team/team-2.webp') }}" class="img-fluid rounded-circle mb-3"
                                alt="M. Rasyid Mustafa">
                            <div class="member-info">
                                <h4>M. Rasyid Mustafa</h4>
                                <span>Chief Technology Officer</span>
                                <p>Memimpin pengembangan fitur SIMREPS dan memastikan teknologi selalu mutakhir dan aman
                                    untuk pengguna.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member shadow-sm rounded bg-white p-4 text-center">
                            <img src="{{ asset('assets/img/team/team-3.webp') }}" class="img-fluid rounded-circle mb-3"
                                alt="Dimas Putra Pratama">
                            <div class="member-info">
                                <h4>Dimas Putra Pratama</h4>
                                <span>Chief Operating Officer</span>
                                <p>Memastikan operasional SIMREPS berjalan lancar, dari manajemen reservasi hingga pelayanan
                                    pelanggan.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
