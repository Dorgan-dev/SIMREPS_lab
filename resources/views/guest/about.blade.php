@extends('guest.layouts.app')

@section('content')
    <main id="main">

        <section class="section-title" data-aos="fade-up">
            <div class="container">
                <h2>Tentang Kami</h2>
                <p>Mengenal lebih dekat SIMREPS dan apa yang kami perjuangkan.</p>
            </div>
        </section>

        ---

        <section id="about" class="about section">
            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('img/main.jpg') }}" class="img-fluid rounded" alt="Ilustrasi tentang SIMREPS">
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3>Kami adalah Jembatan Digital Anda</h3>
                        <p class="fst-italic">
                            SIMREPS hadir sebagai solusi teknologi terdepan untuk mempermudah operasional dan pengambilan
                            keputusan bisnis Anda.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Berdiri sejak tahun 2020 dengan fokus pada inovasi.</li>
                            <li><i class="bi bi-check-circle"></i> Melayani klien dari berbagai sektor industri.</li>
                            <li><i class="bi bi-check-circle"></i> Tim yang terdiri dari profesional berpengalaman dan
                                bersertifikat.</li>
                        </ul>
                        <p>
                            Dedikasi kami adalah memberikan layanan yang tidak hanya memenuhi, tetapi melampaui ekspektasi,
                            menjadikan teknologi sebagai aset nyata bagi pertumbuhan bisnis Anda.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        ---

        <section id="goals" class="goals section bg-light"> {{-- Gunakan background terang untuk kontras --}}
            <div class="container" data-aos="fade-up">

                <div class="row mb-5">
                    <div class="col-md-12">
                        <h3 class="mb-3 text-center">✨ Visi Kami</h3>
                        <p class="text-center">Menjadi perusahaan teknologi terpercaya yang diakui secara global dalam
                            menyediakan solusi digital yang adaptif dan berdampak positif bagi masyarakat dan industri.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="mb-3 text-center">🎯 Misi Kami</h3>
                    </div>
                    <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-3 shadow-sm bg-white rounded flex-fill">
                            <h4>Inovasi Berkelanjutan</h4>
                            <p>Terus berinvestasi dalam penelitian dan pengembangan untuk menawarkan produk dan layanan yang
                                selalu relevan.</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="p-3 shadow-sm bg-white rounded flex-fill">
                            <h4>Kualitas Layanan Prima</h4>
                            <p>Memastikan setiap klien menerima dukungan dan solusi dengan standar kualitas tertinggi.</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="p-3 shadow-sm bg-white rounded flex-fill">
                            <h4>Pengembangan Sumber Daya Manusia</h4>
                            <p>Menciptakan lingkungan kerja yang mendorong pembelajaran dan pertumbuhan profesional bagi tim
                                kami.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        ---

        <section id="team" class="team section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Tim Kami</h2>
                <p>Kami bangga dengan tim ahli yang berdedikasi untuk kesuksesan Anda.</p>
            </div>

            <div class="container">
                <div class="row gy-4">

                    {{-- Contoh Anggota Tim 1 --}}
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <img src="assets/img/team/team-1.webp" class="img-fluid" alt="CEO">
                            <div class="member-info">
                                <h4>Nama Pimpinan</h4>
                                <span>Chief Executive Officer</span>
                                <p>Fokus pada strategi bisnis dan pertumbuhan perusahaan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <img src="assets/img/team/team-2.webp" class="img-fluid" alt="CTO">
                            <div class="member-info">
                                <h4>Nama CTO</h4>
                                <span>Chief Technology Officer</span>
                                <p>Memimpin arah pengembangan produk dan inovasi teknologi.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Tambahkan anggota tim lainnya di sini --}}

                </div>
            </div>
        </section>

    </main>
@endsection
