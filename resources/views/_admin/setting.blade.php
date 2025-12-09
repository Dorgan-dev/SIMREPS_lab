@extends('_admin.layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Pengaturan Website</h3>

        @php
            $activeTab = request('tab', 'website');
        @endphp

        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link {{ $activeTab == 'website' ? 'active' : '' }}" href="?tab=website">WEBSITE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab == 'rooms' ? 'active' : '' }}" href="?tab=rooms">RUANGAN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab == 'consoles' ? 'active' : '' }}" href="?tab=consoles">CONSOLE</a>
            </li>
        </ul>

        <div class="tab-content">

            {{-- ======================
                TAB: WEBSITE (LOGO)
            ======================= --}}
            <div class="tab-pane fade {{ $activeTab == 'website' ? 'show active' : '' }}" id="website">

                <div class="card mb-4">
                    <div class="card-header">Logo Website</div>
                    <div class="card-body">

                        @if ($logo)
                            <p>Logo saat ini:</p>
                            <img src="{{ asset($logo) }}" style="max-height: 100px;">
                        @else
                            <p class="text-muted">Belum ada logo.</p>
                        @endif

                        <hr>

                        <form action="{{ route('admin.settings.update.logo') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label class="form-label">Upload Logo Baru</label>

                            <input type="file" id="logo-input" name="logo" class="form-control mb-3">
                            <button class="btn btn-primary" id="logo-save-btn" disabled>Simpan</button>
                        </form>

                        @if ($logo)
                            <form action="{{ route('admin.settings.delete.logo') }}" method="POST" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus Logo</button>
                            </form>
                        @endif

                    </div>
                </div>

            </div>

            {{-- ======================
                TAB: RUANGAN (FOTO)
            ======================= --}}
            <div class="tab-pane fade {{ $activeTab == 'rooms' ? 'show active' : '' }}" id="rooms">

                <div class="card">
                    <div class="card-header">Foto Ruangan</div>
                    <div class="card-body">

                        {{-- PILIH RUANGAN --}}
                        <form method="GET">
                            <input type="hidden" name="tab" value="rooms">

                            <label class="form-label">Pilih Ruangan</label>
                            <select name="room_id" class="form-control mb-3" onchange="this.form.submit()">
                                <option value="">-- Pilih Ruangan --</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}"
                                        {{ request('room_id') == $room->id ? 'selected' : '' }}>
                                        {{ $room->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>


                        @if (request('room_id'))
                            {{-- FORM UPLOAD --}}
                            <form action="{{ route('admin.room.images.upload') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ request('room_id') }}">

                                <label class="form-label">Upload Foto Ruangan</label>
                                <input type="file" name="images[]" multiple class="form-control mb-3"
                                    id="room-image-input">

                                <button class="btn btn-primary" id="room-upload-btn" disabled>Upload</button>
                            </form>

                            <hr>

                            {{-- GALERI --}}
                            <div class="row">
                                @foreach ($roomImages as $img)
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid"
                                                style="height:150px; object-fit:cover;">

                                            <div class="card-body text-center">

                                                {{-- SET PRIMARY --}}
                                                <form action="{{ route('admin.room.images.primary', $img->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="btn btn-sm {{ $img->is_primary ? 'btn-success' : 'btn-warning' }} mb-2">
                                                        {{ $img->is_primary ? 'Foto Utama' : 'Jadikan Utama' }}
                                                    </button>
                                                </form>

                                                {{-- DELETE --}}
                                                <form action="{{ route('admin.room.images.delete', $img->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">Silakan pilih ruangan terlebih dahulu.</p>
                        @endif

                    </div>
                </div>

            </div>

            {{-- ======================
                TAB: CONSOLE (FOTO)
            ======================= --}}
            <div class="tab-pane fade {{ $activeTab == 'consoles' ? 'show active' : '' }}" id="consoles">

                <div class="card">
                    <div class="card-header">Foto Console</div>
                    <div class="card-body">

                        {{-- PILIH CONSOLE --}}
                        <form method="GET">
                            <input type="hidden" name="tab" value="consoles">

                            <label class="form-label">Pilih Console</label>
                            <select name="console_id" class="form-control mb-3" onchange="this.form.submit()">
                                <option value="">-- Pilih Console --</option>
                                @foreach ($consoles as $c)
                                    <option value="{{ $c->id }}"
                                        {{ request('console_id') == $c->id ? 'selected' : '' }}>
                                        {{ $c->nama_unit }} (Unit #{{ $c->nomor_unit }})
                                    </option>
                                @endforeach
                            </select>
                        </form>


                        @if (request('console_id'))
                            {{-- FORM UPLOAD --}}
                            <form action="{{ route('admin.console.images.upload') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="console_id" value="{{ request('console_id') }}">

                                <label class="form-label">Upload Foto Console</label>
                                <input type="file" name="images[]" multiple class="form-control mb-3"
                                    id="console-image-input">

                                <button class="btn btn-primary" id="console-upload-btn" disabled>Upload</button>
                            </form>

                            <hr>

                            {{-- GALERI --}}
                            <div class="row">
                                @foreach ($consoleImages as $img)
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid"
                                                style="height:150px; object-fit:cover;">

                                            <div class="card-body text-center">

                                                {{-- SET PRIMARY --}}
                                                <form action="{{ route('admin.console.images.primary', $img->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button
                                                        class="btn btn-sm {{ $img->is_primary ? 'btn-success' : 'btn-warning' }} mb-2">
                                                        {{ $img->is_primary ? 'Foto Utama' : 'Jadikan Utama' }}
                                                    </button>
                                                </form>

                                                {{-- DELETE --}}
                                                <form action="{{ route('admin.console.images.delete', $img->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">Silakan pilih console terlebih dahulu.</p>
                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            // ENABLE/DISABLE BUTTON LOGO
            document.getElementById('logo-input')?.addEventListener('change', function() {
                document.getElementById('logo-save-btn').disabled = !this.files.length;
            });

            // ENABLE UPLOAD RUANGAN
            document.getElementById('room-image-input')?.addEventListener('change', function() {
                document.getElementById('room-upload-btn').disabled = !this.files.length;
            });

            // ENABLE UPLOAD CONSOLE
            document.getElementById('console-image-input')?.addEventListener('change', function() {
                document.getElementById('console-upload-btn').disabled = !this.files.length;
            });
        </script>
    @endpush

@endsection
