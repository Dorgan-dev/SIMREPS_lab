<div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

        @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="course-card">
                    <div class="course-image">

                        {{-- IMAGE --}}
                        @php
                            $primaryImage = $room->images->where('is_primary', true)->first();
                        @endphp

                        <img src="{{ asset('storage/' . ($primaryImage->image_path ?? 'default-image.png')) }}"
                            alt="{{ $room->name }}" class="img-fluid">

                        {{-- BADGE --}}
                        @if ($room->category === 'VIP')
                            <div class="badge popular">Popular</div>
                        @endif

                        {{-- PRICE (STATIC DULU, BISA DINAMIS NANTI) --}}
                        <div class="price-badge">$5 / Hour</div>
                    </div>

                    <div class="course-content">
                        <div class="course-meta">
                            <span class="level">{{ $room->category ?? 'Standard' }}</span>
                            <span class="duration">1 Hour</span>
                        </div>

                        {{-- ROOM NAME --}}
                        <h3>
                            <a href="#">{{ $room->name }}</a>
                        </h3>

                        {{-- DESCRIPTION --}}
                        <p>
                            {{ $room->description }}
                        </p>

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
                                <span>
                                    {{ $room->consoles->sum(fn($c) => $c->reservations->count()) }} Reservations
                                </span>
                            </div>
                        </div>

                        {{-- LINK RESERVASI DINAMIS --}}
                        <a href="{{ route('room.detail', $room->id) }}" class="btn-course">
                            Reserve Now
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
