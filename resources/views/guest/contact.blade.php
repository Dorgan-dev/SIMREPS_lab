{{-- Memberi tahu Blade untuk menggunakan layout master yang baru dibuat --}}
@extends('guest.layouts.app')

{{-- Mendefinisikan konten untuk @yield('content') di layout master --}}
@section('content')

    <section id="contact" class="contact section">

        {{-- Section Title --}}
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak Kami</h2>
            <p>Kami siap melayani Anda. Silakan isi formulir di bawah ini atau hubungi kami melalui detail yang tersedia.</p>
        </div>

        {{-- Konten Utama Kontak: Baris dengan 2 Kolom --}}
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                {{-- Kolom Kiri: Detail Kontak (4 dari 12 kolom) --}}
                <div class="col-lg-4">
                    <div class="info-wrap">

                        {{-- Elemen Alamat --}}
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>Jl. Jend. Sudirman No. 123, Pekanbaru, Riau, 28282</p>
                            </div>
                        </div>

                        {{-- Elemen Email --}}
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p>info@simreps.com</p>
                            </div>
                        </div>

                        {{-- Elemen Telepon --}}
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h3>Telepon</h3>
                                <p>+62 812 3456 7890</p>
                            </div>
                        </div>

                        {{-- Elemen Peta (Embed Google Maps) --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.382024505963!2d101.4475475!3d0.5053155!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac0372074e5f%3A0x6b45a0890b21a329!2sPekanbaru%2C%20Riau!5e0!3m2!1sid!2sid!4v1700400000000!5m2!1sid!2sid"
                            frameborder="0"
                            style="border:0; width: 100%; height: 270px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>
                </div>

                {{-- Kolom Kanan: Formulir Kontak (8 dari 12 kolom) --}}
                <div class="col-lg-8">
                    <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        @csrf {{-- Wajib untuk semua form di Laravel --}}

                        <div class="row gy-4">

                            {{-- Input Nama --}}
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                            </div>

                            {{-- Input Email --}}
                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                            </div>

                            {{-- Input Subjek --}}
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                            </div>

                            {{-- Input Pesan --}}
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Pesan Anda" required></textarea>
                            </div>

                            {{-- Area Status Pesan (Digunakan oleh JS/AJAX form) --}}
                            <div class="col-md-12 text-center">
                                <div class="loading">Memuat</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                                <button type="submit">Kirim Pesan</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection
