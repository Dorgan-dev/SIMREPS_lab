<div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

        <!-- Room 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="course-card">
                <div class="course-image">
                    <img src="{{ asset('img/room1.jpg') }}" alt="Room 1" class="img-fluid">
                    <div class="badge popular">Popular</div>
                    <div class="price-badge">$5 / Hour</div>
                </div>

                <div class="course-content">
                    <div class="course-meta">
                        <span class="level">VIP Room</span>
                        <span class="duration">1 Hour</span>
                    </div>

                    <h3><a href="#">Room A - Premium PS5</a></h3>
                    <p>
                        Rasakan pengalaman bermain terbaik dengan konsol PS5 dan layar 4K.
                        Cocok untuk gaming bersama teman atau turnamen.
                    </p>

                    <div class="instructor">
                        <img src="{{ asset('img/staff1.jpg') }}" alt="Staff" class="instructor-img">
                        <div class="instructor-info">
                            <h6>Rico Santoso</h6>
                            <span>Room Manager</span>
                        </div>
                    </div>

                    <div class="course-stats">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span>(4.8)</span>
                        </div>

                        <div class="students">
                            <i class="bi bi-people-fill"></i>
                            <span>120 Reservations</span>
                        </div>
                    </div>

                    <a href="{{ url('reservation/room1') }}" class="btn-course">Reserve Now</a>
                </div>
            </div>
        </div>

    </div>
</div>
