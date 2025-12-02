@extends('guest.layouts.app')

@section('content')
        <!-- Main Content -->
        <main class="main">
            <!-- Page Title -->
            <div class="page-title light-background">
                <div class="container page-title light-background section-title">
                    <h2>Kontak Kami</h2>
                    <p>Kami siap melayani Anda. Silakan isi formulir di bawah ini atau hubungi kami melalui detail yang
                        tersedia.</p>
                </div>
            </div>

            <!-- Contact Section -->
            <section id="contact-details" class="contact section">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-main-wrapper">
                        <!-- Google Map -->
                        <div class="map-wrapper" style="height: 400px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1994.8101487257734!2d101.42489609468213!3d0.5708481072156557!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab67086f2e89%3A0x65a24264fec306bb!2sPoliteknik%20Caltex%20Riau!5e0!3m2!1sen!2sid!4v1764677704481!5m2!1sen!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <!-- Contact Information -->
                        <div class="contact-content">
                            <div class="contact-cards-container" data-aos="fade-up" data-aos-delay="300">
                                <div class="contact-card">
                                    <div class="icon-box">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h4>Location</h4>
                                        <p>Jl. Umban Sari No.1, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28265</p>
                                    </div>
                                </div>

                                <div class="contact-card">
                                    <div class="icon-box">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h4>Email</h4>
                                        <p>ridho24ti@mahasiswa.pcr.ac.id</p>
                                    </div>
                                </div>

                                <div class="contact-card">
                                    <div class="icon-box">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h4>Call</h4>
                                        <p>+62 898 8182 167</p>
                                    </div>
                                </div>

                                <div class="contact-card">
                                    <div class="icon-box">
                                        <i class="bi bi-clock"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h4>Open Hours</h4>
                                        <p>Monday-Friday: 9AM - 6PM</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Form -->
                            <div class="contact-form-container" data-aos="fade-up" data-aos-delay="400">
                                <h3>Get in Touch</h3>
                                <p>Silakan isi formulir berikut untuk menghubungi kami. Tim kami akan dengan senang hati
                                    membantu Anda dan memberikan respon secepat mungkin.</p>

                                <form action="{{ url('forms/contact') }}" method="post" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Your Name" required="">
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Your Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Subject" required="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
                                    </div>

                                    <div class="my-3">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                    </div>

                                    <div class="form-submit">
                                        <button type="submit">Send Message</button>
                                        <div class="social-links">
                                            <a href="https://www.instagram.com/mridhospt_/"><i class="bi bi-twitter"></i></a>
                                            <a href="https://www.instagram.com/mridhospt_/"><i class="bi bi-facebook"></i></a>
                                            <a href="https://www.instagram.com/mridhospt_/"><i class="bi bi-instagram"></i></a>
                                            <a href="https://www.instagram.com/mridhospt_/"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /Contact Section -->

        </main>
@endsection
