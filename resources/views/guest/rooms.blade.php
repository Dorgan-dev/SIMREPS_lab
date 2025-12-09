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

            {{-- PAGINATION --}}
            @if ($rooms->hasPages())
                <div class="mt-5 pt-4 border-top text-center">

                    <small class="text-muted d-block mb-3">
                        Menampilkan <strong>{{ $rooms->firstItem() }}</strong> –
                        <strong>{{ $rooms->lastItem() }}</strong> dari
                        <strong>{{ $rooms->total() }}</strong> room
                    </small>

                    <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-md">

                            {{-- PREVIOUS --}}
                            <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $rooms->previousPageUrl() }}">
                                    &laquo; Previous
                                </a>
                            </li>

                            {{-- NUMBER --}}
                            @foreach ($rooms->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $rooms->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- NEXT --}}
                            <li class="page-item {{ !$rooms->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $rooms->nextPageUrl() }}">
                                    Next &raquo;
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            @endif

        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>

@endsection
