@extends('_customer.layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="container py-5">

        <!-- Alert Success/Error -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="mb-4 fw-bold">
                    <i class="bi bi-person-circle me-2"></i>Profil Saya
                </h3>

                <!-- Card Foto Profil -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center py-4">
                        <div class="position-relative d-inline-block">
                            <div class="rounded-circle border border-3 p-2 shadow"
                                style="width: 150px; height: 150px; overflow: hidden; margin: 0 auto;">
                                <img src="{{ auth()->user()->profile_photo_url }}" alt="Foto Profil"
                                    class="img-fluid rounded-circle w-100 h-100" style="object-fit: cover;">
                            </div>
                            <button type="button"
                                class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 end-0 shadow-sm"
                                data-bs-toggle="modal" data-bs-target="#changePhotoModal"
                                style="width: 40px; height: 40px;">
                                <i class="bi bi-camera-fill"></i>
                            </button>
                        </div>
                        <h5 class="mt-3 mb-0">{{ auth()->user()->name }}</h5>
                    </div>
                </div>

                <!-- Card Informasi Profil -->
                <div class="card shadow-sm">
                    <div class="card-header py-3">
                        <h5 class="mb-0 fw-semibold">
                            <i class="bi bi-info-circle me-2"></i>Informasi Pribadi
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="row g-4">
                                <!-- Nama Lengkap -->
                                <div class="col-md-12">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="bi bi-person-fill me-2 text-primary"></i>Nama Lengkap
                                    </label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', auth()->user()->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Username (readonly) -->
                                <div class="col-md-6">
                                    <label for="username" class="form-label fw-semibold">
                                        <i class="bi bi-at me-2 text-info"></i>Username
                                    </label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="{{ auth()->user()->username }}" readonly>
                                    <small class="text-muted d-block mt-1">
                                        <i class="bi bi-lock-fill me-1"></i>Username tidak dapat diubah
                                    </small>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label fw-semibold">
                                        <i class="bi bi-gender-ambiguous me-2 text-success"></i>Jenis Kelamin
                                    </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="bi bi-envelope-fill me-2 text-danger"></i>Email
                                    </label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', auth()->user()->email) }}" required>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label fw-semibold">
                                        <i class="bi bi-telephone-fill me-2 text-warning"></i>Nomor Telepon
                                    </label>
                                    <input type="tel" name="no_hp" id="no_hp" class="form-control"
                                        value="{{ old('no_hp', auth()->user()->no_hp) }}" placeholder="08xxxxxxxxxx"
                                        required>
                                </div>

                                <!-- Role -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-shield-fill-check me-2 text-primary"></i>Role
                                    </label>
                                    <input type="text" class="form-control" value="Customer" readonly>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 d-flex gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary btn-lg px-4">
                                    <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="bi bi-pencil-square me-2"></i>Perbarui Data
                                </button>

                                <!-- Button to open password modal -->
                                <button type="button" class="btn btn-warning btn-lg px-4" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal">
                                    <i class="bi bi-key-fill me-2"></i>Ganti Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ganti Password -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Ganti Password</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('customer.change-password') }}" method="POST">
                    @csrf

                    <div class="modal-body">

                        @php
                            // Jika user punya password_set = false, berarti Google login & belum punya password
                            $requiresOldPassword = auth()->user()->password_set == 1;
                        @endphp

                        {{-- Password Lama (hanya jika sudah pernah set password) --}}
                        @if ($requiresOldPassword)
                            <div class="mb-3">
                                <label class="form-label">Password Lama</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Upload Foto -->
    <div class="modal fade" id="changePhotoModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('customer.profile.photo.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="bi bi-camera-fill me-2"></i>Ubah Foto Profil
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <img id="current-photo" src="{{ auth()->user()->profile_photo_url }}"
                                class="rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;"
                                alt="Current">
                        </div>

                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Pilih foto baru</label>
                            <input type="file" name="profile_photo" id="profile_photo" class="form-control"
                                accept="image/*" required>
                            <small class="text-muted d-block mt-2">
                                Format: JPG, PNG, WEBP | Maks: 2MB | Min: 100x100px
                            </small>
                        </div>
                    </div>

                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
