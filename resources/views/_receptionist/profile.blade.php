@extends('_receptionist.layouts.app')

@section('content')
    <div class="container py-5">

        <!-- Alert Messages -->
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

                <!-- Page Title -->
                <h3 class="mb-4 fw-bold {{ config('app.env') == 'production' ? 'text-light' : 'text-dark' }}">
                    <i class="bi bi-person-circle me-2"></i>Profil Akun
                </h3>

                <!-- Profile Photo Card -->
                <div
                    class="card shadow-sm mb-4 {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-white text-dark' }}">
                    <div class="card-body text-center py-5">
                        <div class="position-relative d-inline-block mb-3">
                            <div class="rounded-circle border border-3 {{ config('app.env') == 'production' ? 'border-secondary' : 'border-light' }} p-2 shadow"
                                style="width: 150px; height: 150px; overflow: hidden; margin: 0 auto;">
                                <img src="{{ auth()->user()->profile_photo_url }}" alt="Foto Profil"
                                    class="img-fluid rounded-circle w-100 h-100" style="object-fit: cover;">
                            </div>
                            <button type="button"
                                class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 end-0 shadow-sm"
                                data-bs-toggle="modal" data-bs-target="#changePhotoModal" style="width: 40px; height: 40px;"
                                title="Ubah foto profil">
                                <i class="bi bi-camera-fill"></i>
                            </button>
                        </div>
                        <h5 class="mt-3 mb-1 fw-bold">{{ auth()->user()->name }}</h5>
                        <p class="text-muted mb-0">
                            <small>{{ auth()->user()->role == 1 ? 'Admin' : (auth()->user()->role == 2 ? 'Resepsionis' : 'Customer') }}</small>
                        </p>
                    </div>
                </div>

                <!-- Profile Information Card -->
                <article class="sign-up">
                    <h1 class="sign-up__title">Informasi Pribadi</h1>
                    <form action="{{ route('receptionist.profile.update') }}" method="POST" class="form sign-up-form">
                        @csrf

                        <div class="row">
                            <!-- Nama Lengkap -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper">
                                    <p class="form-label">Nama Lengkap</p>
                                    <input type="text" name="name"
                                        class="form-input @error('name') is-invalid @enderror"
                                        value="{{ old('name', auth()->user()->name) }}" placeholder="Masukkan nama lengkap"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </label>
                            </div>

                            <!-- Username (Read-only) -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper readonly-field">
                                    <p class="form-label">Username</p>
                                    <input type="text" name="username"
                                        class="form-input @error('username') is-invalid @enderror"
                                        value="{{ auth()->user()->username }}" readonly>
                                    @error('username')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email (Read-only) -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper readonly-field">
                                    <p class="form-label">Email</p>
                                    <input type="email" name="email"
                                        class="form-input @error('email') is-invalid @enderror"
                                        value="{{ auth()->user()->email }}" readonly>
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </label>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper">
                                    <p class="form-label">Nomor Telepon</p>
                                    <input type="tel" name="no_hp"
                                        class="form-input @error('no_hp') is-invalid @enderror"
                                        value="{{ old('no_hp', auth()->user()->no_hp) }}"
                                        placeholder="Contoh: 081234567890" required>
                                    @error('no_hp')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Jenis Kelamin -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper">
                                    <p class="form-label">Jenis Kelamin</p>
                                    <select name="jenis_kelamin"
                                        class="form-input @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="" disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </label>
                            </div>

                            <!-- Role (Read-only) -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper readonly-field">
                                    <p class="form-label">Role</p>
                                    <input type="text" name="role" class="form-input"
                                        value="{{ auth()->user()->role == 1 ? 'Admin' : (auth()->user()->role == 2 ? 'Resepsionis' : 'Customer') }}"
                                        readonly>
                                </label>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-label-wrapper mt-4">
                            <button type="reset" class="form-btn transparent-btn">
                                <i class="bi bi-arrow-clockwise me-2"></i>Reset
                            </button>
                            <button type="submit" class="form-btn primary-default-btn">
                                <i class="bi bi-check-circle me-2"></i>Perbarui Data
                            </button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>

    <!-- Modal Upload Photo -->
    <div class="modal fade" id="changePhotoModal" tabindex="-1" aria-labelledby="changePhotoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div
                class="modal-content {{ config('app.env') == 'production' ? 'bg-dark text-light' : 'bg-white text-dark' }}">
                <form action="{{ route('receptionist.profile.photo.update') }}" method="POST"
                    enctype="multipart/form-data" id="photoUploadForm">
                    @csrf

                    <!-- Modal Header -->
                    <div
                        class="modal-header border-bottom {{ config('app.env') == 'production' ? 'border-secondary' : '' }}">
                        <h5 class="modal-title fw-bold" id="changePhotoModalLabel">
                            <i class="bi bi-camera-fill me-2"></i>Ubah Foto Profil
                        </h5>
                        <button type="button"
                            class="btn-close {{ config('app.env') == 'production' ? 'btn-close-white' : '' }}"
                            data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Current Photo -->
                        <div class="text-center mb-4">
                            <p class="text-muted mb-2 small">Foto profil saat ini:</p>
                            <img id="current-photo" src="{{ auth()->user()->profile_photo_url }}"
                                class="rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;"
                                alt="Current Photo">
                        </div>

                        <!-- File Input -->
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label fw-semibold">
                                <i class="bi bi-image me-2"></i>Pilih foto baru
                            </label>
                            <input type="file" name="profile_photo" id="profile_photo"
                                class="form-control @error('profile_photo') is-invalid @enderror {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : '' }}"
                                accept="image/jpeg,image/png,image/jpg,image/webp" onchange="previewPhoto(event)"
                                required>
                            @error('profile_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-2">
                                <i class="bi bi-info-circle me-1"></i>Format: JPG, PNG, WEBP | Maksimal: 2MB | Min:
                                100x100px
                            </small>
                        </div>

                        <!-- Preview Container -->
                        <div id="preview-container" class="text-center d-none mt-4">
                            <p class="text-muted mb-2 small">Preview foto baru:</p>
                            <img id="photo-preview" class="rounded-circle border border-primary"
                                style="width: 120px; height: 120px; object-fit: cover;" alt="Preview">
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div
                        class="modal-footer border-top {{ config('app.env') == 'production' ? 'border-secondary' : '' }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary" id="submitPhotoBtn">
                            <i class="bi bi-check-lg me-2"></i>Simpan Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewPhoto(event) {
            const input = event.target;
            const preview = document.getElementById('photo-preview');
            const container = document.getElementById('preview-container');
            const submitBtn = document.getElementById('submitPhotoBtn');

            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Validate file size
                if (file.size > 2048000) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB');
                    input.value = '';
                    container.classList.add('d-none');
                    return;
                }

                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak valid! Gunakan JPG, PNG, atau WEBP');
                    input.value = '';
                    container.classList.add('d-none');
                    return;
                }

                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('d-none');
                    submitBtn.disabled = false;
                }
                reader.readAsDataURL(file);
            } else {
                container.classList.add('d-none');
                submitBtn.disabled = true;
            }
        }

        // Reset modal on close
        document.getElementById('changePhotoModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('photoUploadForm').reset();
            document.getElementById('preview-container').classList.add('d-none');
        });
    </script>

    <style>
        .btn:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        .card {
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control:read-only {
            cursor: not-allowed;
            opacity: 0.7;
        }

        .readonly-field:hover input {
            cursor: not-allowed;
            background-color: #444444 !important;
            opacity: 0.7;
        }

        .rounded-circle img {
            transition: transform 0.3s ease;
        }

        .rounded-circle:hover img {
            transform: scale(1.05);
        }
    </style>
@endsection
