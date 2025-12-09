@extends('guest.layouts.app')

@section('content')
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

        </div>

    </section>
@endsection
