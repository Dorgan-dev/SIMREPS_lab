@extends('guest.layouts.app')
@section('content')
    <!-- Courses Hero Section -->
    <section id="courses-hero" class="courses-hero section light-background">

        <div class="hero-content">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="hero-text">
                            <h1>Sistem Informasi Manajemen dan Reservasi Playstation</h1>
                            <p>Discover thousands of high-quality courses designed by industry professionals. Learn
                                at your own pace, gain in-demand skills, and advance your career from anywhere in
                                the world.
                            </p>
                            <div class="hero-stats">
                                <div class="stat-item">
                                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="50000"
                                        data-purecounter-duration="2"></span>
                                    <span class="label">Students Enrolled</span>
                                </div>
                                <div class="stat-item">
                                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="1200"
                                        data-purecounter-duration="2"></span>
                                    <span class="label">Expert Courses</span>
                                </div>
                                <div class="stat-item">
                                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="98"
                                        data-purecounter-duration="2"></span>
                                    <span class="label">Success Rate %</span>
                                </div>
                            </div>

                            <div class="hero-buttons">
                                <a href="#courses" class="btn btn-primary">Booking Now</a>
                                <a href="#about" class="btn btn-outline">Learn More</a>
                            </div>

                            <div class="hero-features">
                                <div class="feature">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Certified Programs</span>
                                </div>
                                <div class="feature">
                                    <i class="bi bi-clock"></i>
                                    <span>Lifetime Access</span>
                                </div>
                                <div class="feature">
                                    <i class="bi bi-people"></i>
                                    <span>Expert Instructors</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="hero-image">
                            <div class="main-image">
                                <img src="assets/img/education/courses-13.webp" alt="Online Learning" class="img-fluid">
                            </div>

                            <div class="floating-cards">
                                <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card-icon">
                                        <i class="bi bi-code-slash"></i>
                                    </div>
                                    <div class="card-content">
                                        <h6>Web Development</h6>
                                        <span>2,450 Students</span>
                                    </div>
                                </div>

                                <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                                    <div class="card-icon">
                                        <i class="bi bi-palette"></i>
                                    </div>
                                    <div class="card-content">
                                        <h6>UI/UX Design</h6>
                                        <span>1,890 Students</span>
                                    </div>
                                </div>

                                <div class="course-card" data-aos="fade-up" data-aos-delay="500">
                                    <div class="card-icon">
                                        <i class="bi bi-graph-up"></i>
                                    </div>
                                    <div class="card-content">
                                        <h6>Digital Marketing</h6>
                                        <span>3,200 Students</span>
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

    </section><!-- /Courses Hero Section -->

    <!-- Featured Courses Section -->
    <section id="featured-courses" class="featured-courses section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Play Rooms</h2>
            <p>Ruangan untuk bermain dengan pengalaman yang menyenangkan</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                @include('guest.layouts.rooms-card')
            </div>

            <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
                <a href="courses.html" class="btn-more">View All Courses</a>
            </div>

        </div>

    </section><!-- /Featured Courses Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
        @include('guest.layouts.testimoni')
    </section><!-- /Testimonials Section -->

    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Recent Blog Posts</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="card-top d-flex align-items-center">
                            <img src="assets/img/person/person-f-12.webp" alt="Author" class="rounded-circle me-2">
                            <span class="author-name">By Andy glamer</span>
                            <span class="ms-auto likes"><i class="bi bi-heart"></i> 65</span>
                        </div>
                        <div class="card-img-wrapper">
                            <img src="assets/img/blog/blog-post-1.webp" alt="Post Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="blog-details.html">Sed ut perspiciatis unde omnis iste
                                    natus</a></h5>
                            <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                                aut fugit, sed quia consequuntur magni dolores eos qui ratione...</p>
                        </div>
                    </div>
                </div><!-- End Post Item Card -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card position-relative">
                        <div class="card-top d-flex align-items-center">
                            <img src="assets/img/person/person-f-13.webp" alt="Author" class="rounded-circle me-2">
                            <span class="author-name">By Den viliamson</span>
                            <span class="ms-auto likes"><i class="bi bi-heart"></i> 35</span>
                        </div>
                        <div class="card-img-wrapper">
                            <img src="assets/img/blog/blog-post-2.webp" alt="Post Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="blog-details.html">Nemo enim ipsam voluptatem quia
                                    voluptas sit</a></h5>
                            <p class="card-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque corrupti quos...</p>
                        </div>
                    </div>
                </div><!-- End Post Item Card -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card">
                        <div class="card-top d-flex align-items-center">
                            <img src="assets/img/person/person-m-10.webp" alt="Author" class="rounded-circle me-2">
                            <span class="author-name">By Jones robbert</span>
                            <span class="ms-auto likes"><i class="bi bi-heart"></i> 58</span>
                        </div>
                        <div class="card-img-wrapper">
                            <img src="assets/img/blog/blog-post-3.webp" alt="Post Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="blog-details.html">Ut enim ad minima veniam, quis
                                    nostrum exercitationem</a></h5>
                            <p class="card-text">Quis autem vel eum iure reprehenderit qui in ea voluptate velit
                                esse quam nihil molestiae consequatur, vel illum qui dolorem...</p>
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
                        <h2>Transform Your Future with Expert-Led Online Courses</h2>
                        <p>Join thousands of successful learners who have advanced their careers through our
                            comprehensive online education platform.</p>

                        <div class="features-list">
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>20+ Expert instructors with industry experience</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="350">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Certificate of completion for every course</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>24/7 access to course materials and resources</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Interactive assignments and real-world projects</span>
                            </div>
                        </div>

                        <div class="cta-actions" data-aos="fade-up" data-aos-delay="500">
                            <a href="courses.html" class="btn btn-primary">Booking Now</a>
                            <a href="enroll.html" class="btn btn-outline">Enroll Now</a>
                        </div>

                        <div class="stats-row" data-aos="fade-up" data-aos-delay="400">
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="15000"
                                        data-purecounter-duration="2" class="purecounter"></span>+</h3>
                                <p>Students Enrolled</p>
                            </div>
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="150"
                                        data-purecounter-duration="2" class="purecounter"></span>+</h3>
                                <p>Courses Available</p>
                            </div>
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="98"
                                        data-purecounter-duration="2" class="purecounter"></span>%</h3>
                                <p>Success Rate</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="cta-image">
                        <img src="assets/img/education/courses-4.webp" alt="Online Learning Platform" class="img-fluid">
                        <div class="floating-element student-card" data-aos="zoom-in" data-aos-delay="600">
                            <div class="card-content">
                                <i class="bi bi-person-check-fill"></i>
                                <div class="text">
                                    <span class="number">2,450</span>
                                    <span class="label">New Students This Month</span>
                                </div>
                            </div>
                        </div>
                        <div class="floating-element course-card" data-aos="zoom-in" data-aos-delay="700">
                            <div class="card-content">
                                <i class="bi bi-play-circle-fill"></i>
                                <div class="text">
                                    <span class="number">50+</span>
                                    <span class="label">Hours of Content</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Cta Section -->
@endsection
