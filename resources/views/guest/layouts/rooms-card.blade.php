<div class="row gy-4">

    @foreach ($rooms as $room)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">

            <div class="course-card">

                {{-- IMAGE ROOM --}}
                <div class="course-image">
                    @php
                        $primaryImage = $room->images->where('is_primary', true)->first();
                        $imagePath = $primaryImage->image_path ?? 'default-image.png';
                    @endphp

                    <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $room->name }}" class="img-fluid">

                    {{-- BADGE VIP --}}
                    @if ($room->category === 'VIP')
                        <div class="badge popular">Popular</div>
                    @endif
                </div>

                {{-- CONTENT --}}
                <div class="course-content">

                    {{-- META --}}
                    <div class="course-meta">
                        <span class="level">{{ $room->category ?? 'Standard' }}</span>
                        <span class="duration">1 Hour</span>
                    </div>

                    {{-- ROOM NAME --}}
                    <h3><a href="#">{{ $room->name }}</a></h3>

                    {{-- DESCRIPTION --}}
                    <p>{{ $room->description }}</p>

                    {{-- STATS --}}
                    <div class="course-stats">

                        {{-- RATING (STATIS) --}}
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span>(4.8)</span>
                        </div>

                        {{-- JUMLAH RESERVASI --}}
                        <div class="students">
                            <i class="bi bi-people-fill"></i>
                            <span>
                                {{ $room->consoles->sum(fn($c) => $c->reservations->count()) }}
                                Reservations
                            </span>
                        </div>

                        {{-- JUMLAH CONSOLE --}}
                        <div class="students">
                            <i class="bi bi-controller"></i>
                            <span>{{ $room->consoles->count() }} Console</span>
                        </div>

                    </div>

                    {{-- BUTTON RESERVASI --}}
                    <a href="{{ route('room.detail', $room->id) }}" class="btn-course">
                        Reserve Now
                    </a>

                </div>
            </div>

        </div>
    @endforeach

</div>
