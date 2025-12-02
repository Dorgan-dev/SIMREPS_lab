@extends('guest.layouts.app')
@section('content')
    <!-- SIMREPS Hero Section -->
    <section id="simreps-hero" class="courses-hero section light-background">

        <div class="hero-content">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="hero-text">
                            <h1>Sistem Informasi Manajemen dan Reservasi PlayStation (SIMREPS)</h1>
                            <p>Kelola reservasi PlayStation, pantau ketersediaan Play Room, dan berikan pengalaman bermain terbaik bagi pelanggan dengan mudah dan cepat melalui SIMREPS.</p>
                            <div class="hero-stats">
                                <div class="stat-item">
                                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="1500"
                                        data-purecounter-duration="2"></span>
                                    <span class="label">Pelanggan Terdaftar</span>
                                </div>
                                <div class="stat-item">
                                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="120"
                                        data-purecounter-duration="2"></span>
                                    <span class="label">Unit Konsol PS5</span>
                                </div>
                                <div class="stat-item">
                                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="98"
                                        data-purecounter-duration="2"></span>
                                    <span class="label">Tingkat Kepuasan %</span>
                                </div>
                            </div>

                            <div class="hero-buttons">
                                <a href="#featured-rooms" class="btn btn-primary">Booking Sekarang</a>
                                <a href="#about" class="btn btn-outline">Pelajari Fitur</a>
                            </div>

                            <div class="hero-features">
                                <div class="feature">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Reservasi Aman & Terjamin</span>
                                </div>
                                <div class="feature">
                                    <i class="bi bi-clock"></i>
                                    <span>Akses 24/7</span>
                                </div>
                                <div class="feature">
                                    <i class="bi bi-people"></i>
                                    <span>Layanan Pelanggan Terbaik</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="hero-image">
                            <div class="main-image">
                                <!-- Placeholder image for PlayStation reservation/gaming -->
                                <img src="assets/img/education/courses-13.webp" onerror="this.onerror=null;this.src='https://placehold.co/600x400/283593/ffffff?text=SIMREPS+Reservasi';" alt="Reservasi PlayStation" class="img-fluid rounded-lg shadow-xl">
                            </div>

                            <div class="floating-cards">
                                <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card-icon">
                                        <i class="bi bi-controller"></i>
                                    </div>
                                    <div class="card-content">
                                        <h6>Play Room VIP 1</h6>
                                        <span>5 Slot Tersedia</span>
                                    </div>
                                </div>

                                <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                                    <div class="card-icon">
                                        <i class="bi bi-controller"></i>
                                    </div>
                                    <div class="card-content">
                                        <h6>Play Room Standard 2</h6>
                                        <span>3 Slot Tersedia</span>
                                    </div>
                                </div>

                                <div class="course-card" data-aos="fade-up" data-aos-delay="500">
                                    <div class="card-icon">
                                        <i class="bi bi-controller"></i>
                                    </div>
                                    <div class="card-content">
                                        <h6>Play Room Standard 3</h6>
                                        <span>2 Slot Tersedia</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="hero-background">
            <div class="bg-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>

    </section><!-- /SIMREPS Hero Section -->

    <!-- Featured Play Rooms Section -->
    <section id="featured-rooms" class="featured-courses section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Play Rooms Unggulan</h2>
            <p>Temukan dan pesan Play Room eksklusif untuk pengalaman bermain PlayStation yang menyenangkan dan nyaman.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                @include('guest.layouts.rooms-card')
            </div>

            <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
                <a href="rooms.html" class="btn-more">Lihat Semua Play Rooms</a>
            </div>

        </div>

    </section><!-- /Featured Play Rooms Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
        @include('guest.layouts.testimoni')
    </section><!-- /Testimonials Section -->

    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Artikel Terbaru Gaming & Sistem</h2>
            <p>Tips, berita, dan update terbaru seputar dunia PlayStation, game terbaru, dan penggunaan reservasi digital SIMREPS.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="card-top d-flex align-items-center">
                            <img src="assets/img/person/person-f-12.webp" alt="Author" class="rounded-circle me-2">
                            <span class="author-name">By Andy Glamer</span>
                            <span class="ms-auto likes"><i class="bi bi-heart"></i> 65</span>
                        </div>
                        <div class="card-img-wrapper">
                            <!-- Placeholder image for gaming post 1 -->
                            <img src="assets/img/blog/blog-post-1.webp" onerror="this.onerror=null;this.src='https://placehold.co/400x250/212121/ffffff?text=PS5+Games';" alt="Post Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="blog-details.html">5 Game PS5 Terbaik yang Wajib Dicoba di Play Room Kami</a></h5>
                            <p class="card-text">Rekomendasi game-game terbaru dan tips untuk pengalaman gaming maksimal...</p>
                        </div>
                    </div>
                </div><!-- End Post Item Card -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card position-relative">
                        <div class="card-top d-flex align-items-center">
                            <img src="assets/img/person/person-f-13.webp" alt="Author" class="rounded-circle me-2">
                            <span class="author-name">By Den Viliamson</span>
                            <span class="ms-auto likes"><i class="bi bi-heart"></i> 35</span>
                        </div>
                        <div class="card-img-wrapper">
                            <!-- Placeholder image for management post 2 -->
                            <img src="assets/img/blog/blog-post-2.webp" onerror="this.onerror=null;this.src='https://placehold.co/400x250/212121/ffffff?text=SIMREPS+Management';" alt="Post Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="blog-details.html">Tips Mengelola Play Rooms secara Efektif dengan SIMREPS</a></h5>
                            <p class="card-text">Strategi manajemen Play Room agar selalu tersedia dan pelanggan puas...</p>
                        </div>
                    </div>
                </div><!-- End Post Item Card -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card">
                        <div class="card-top d-flex align-items-center">
                            <img src="assets/img/person/person-m-10.webp" alt="Author" class="rounded-circle me-2">
                            <span class="author-name">By Jones Robbert</span>
                            <span class="ms-auto likes"><i class="bi bi-heart"></i> 58</span>
                        </div>
                        <div class="card-img-wrapper">
                            <!-- Placeholder image for tutorial post 3 -->
                            <img src="assets/img/blog/blog-post-3.webp" onerror="this.onerror=null;this.src='https://placehold.co/400x250/212121/ffffff?text=SIMREPS+Tutorial';" alt="Post Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="blog-details.html">Panduan Cepat Reservasi Online PlayStation di SIMREPS</a></h5>
                            <p class="card-text">Simak langkah-langkah mudah untuk booking ruangan dalam hitungan detik...</p>
                        </div>
                    </div>
                </div><!-- End Post Item Card -->

            </div>

        </div>

    </section><!-- /Recent Blog Posts Section -->

    <!-- Cta Section -->
    <section id="cta" class="cta section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="cta-content">
                        <h2>Mulai Booking PlayStation Anda Sekarang</h2>
                        <p>Gunakan SIMREPS untuk memudahkan reservasi PlayStation, mengelola slot ruangan, dan memberikan pengalaman terbaik bagi pelanggan.</p>

                        <div class="features-list">
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Tim profesional yang mendukung operasional Anda</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="350">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Reservasi cepat dan aman melalui sistem digital</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Akses 24/7 untuk mengelola Play Rooms</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Laporan operasional dan analisis yang lengkap</span>
                            </div>
                        </div>

                        <div class="cta-actions" data-aos="fade-up" data-aos-delay="500">
                            <a href="rooms.html" class="btn btn-primary">Booking Sekarang</a>
                            <a href="enroll.html" class="btn btn-outline">Daftar Akun</a>
                        </div>

                        <div class="stats-row" data-aos="fade-up" data-aos-delay="400">
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="1500"
                                        data-purecounter-duration="2" class="purecounter"></span>+</h3>
                                <p>Pelanggan Terdaftar</p>
                            </div>
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="50"
                                        data-purecounter-duration="2" class="purecounter"></span>+</h3>
                                <p>Play Rooms Tersedia</p>
                            </div>
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="98"
                                        data-purecounter-duration="2" class="purecounter"></span>%</h3>
                                <p>Tingkat Kepuasan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="cta-image">
                        <!-- Placeholder image for CTA -->
                        <img src="assets/img/education/courses-4.webp" onerror="this.onerror=null;this.src='https://placehold.co/600x400/283593/ffffff?text=SIMREPS+CTA';" alt="Platform Reservasi PlayStation" class="img-fluid rounded-lg shadow-xl">
                        <div class="floating-element student-card" data-aos="zoom-in" data-aos-delay="600">
                            <div class="card-content">
                                <i class="bi bi-person-check-fill"></i>
                                <div class="text">
                                    <span class="number">250</span>
                                    <span class="label">Reservasi Sukses Hari Ini</span>
                                </div>
                            </div>
                        </div>
                        <div class="floating-element course-card" data-aos="zoom-in" data-aos-delay="700">
                            <div class="card-content">
                                <i class="bi bi-controller"></i>
                                <div class="text">
                                    <span class="number">50+</span>
                                    <span class="label">Unit PS5 Tersedia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Cta Section -->
@endsection
