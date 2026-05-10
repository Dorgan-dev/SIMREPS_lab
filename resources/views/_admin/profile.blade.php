@extends('_admin.layouts.app')

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
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center py-5">
                        <div class="position-relative d-inline-block mb-3">
                            <div class="rounded-circle border border-3 p-2 shadow"
                                style="width: 150px; height: 150px; overflow: hidden; margin: 0 auto;">
                                <img src="{{ auth()->user()->profile_photo_url }}" alt="Foto Profil"
                                    class="img-fluid rounded-circle w-100 h-100" style="object-fit: cover;">
                            </div>
                            <button type="button"
                                class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 end-0 shadow-sm"
                                data-bs-toggle="modal" data-bs-target="#changePhotoModal" style="width: 40px; height: 40px;"
                                title="Ubah foto profil">
                                <i data-feather="edit" style="font-size: 18px;"></i>
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
                    <form action="{{ route('admin.profile.update') }}" method="POST" class="form sign-up-form"
                        id="profileForm">
                        @csrf

                        <!-- Nama Lengkap & Username -->
                        <div class="row">
                            <!-- Nama Lengkap -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper">
                                    <p class="form-label">Nama Lengkap</p>
                                    <input type="text" name="name"
                                        class="form-input @error('name') is-invalid @enderror"
                                        value="{{ old('name', auth()->user()->name) }}" placeholder="Masukkan nama lengkap"
                                        data-original="{{ auth()->user()->name }}" required>
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </label>
                            </div>

                            <!-- Username (Read-only) -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper readonly-field">
                                    <p class="form-label">Username</p>
                                    <input type="text" class="form-input @error('username') is-invalid @enderror"
                                        value="{{ auth()->user()->username }}" readonly>
                                </label>
                            </div>
                        </div>

                        <!-- Email & Nomor Telepon -->
                        <div class="row">
                            <!-- Email (Read-only) -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper readonly-field">
                                    <p class="form-label">Email</p>
                                    <input type="email" class="form-input @error('email') is-invalid @enderror"
                                        value="{{ auth()->user()->email }}" readonly>
                                </label>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper">
                                    <p class="form-label">Nomor Telepon</p>
                                    <input type="tel" name="no_hp"
                                        class="form-input @error('no_hp') is-invalid @enderror"
                                        value="{{ old('no_hp', auth()->user()->no_hp) }}"
                                        placeholder="Contoh: 081234567890" data-original="{{ auth()->user()->no_hp }}">
                                    @error('no_hp')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <!-- Jenis Kelamin & Role -->
                        <div class="row">
                            <!-- Jenis Kelamin -->
                            <div class="col-md-6">
                                <label class="form-label-wrapper">
                                    <p class="form-label">Jenis Kelamin</p>
                                    <select name="jenis_kelamin"
                                        class="form-input @error('jenis_kelamin') is-invalid @enderror"
                                        data-original="{{ auth()->user()->jenis_kelamin }}" required>
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
                                    <input type="text" class="form-input"
                                        value="{{ auth()->user()->role == 1 ? 'Admin' : (auth()->user()->role == 2 ? 'Resepsionis' : 'Customer') }}"
                                        readonly>
                                </label>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-3">
                            <!-- Tombol Reset -->
                            <div class="col-md-6 mb-2 mb-md-0">
                                <button type="reset" class="form-btn btn-secondary w-100 h-200 btn-lg" id="resetBtn">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Reset
                                </button>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="col-md-6">
                                <button type="submit" class="form-btn btn-primary w-100 btn-lg" id="submitBtn" disabled>
                                    <i class="bi bi-check-circle me-2"></i>Perbarui Data
                                </button>
                            </div>
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
            <div class="modal-content">
                <form action="{{ route('admin.profile.photo.update') }}" method="POST" enctype="multipart/form-data"
                    id="photoUploadForm">
                    @csrf

                    <!-- Modal Header -->
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold" id="changePhotoModalLabel">
                            <i class="bi bi-camera-fill me-2"></i>Ubah Foto Profil
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Current Photo -->
                        <div class="text-center mb-4">
                            <p class="text-muted mb-2 small">Foto profil saat ini:</p>
                            <img id="current-photo" src="{{ auth()->user()->profile_photo_url }}"
                                class="rounded-circle border shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;" alt="Current Photo">
                        </div>

                        <!-- File Input -->
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label fw-semibold">
                                <i class="bi bi-image me-2"></i>Pilih foto baru
                            </label>
                            <input type="file" name="profile_photo" id="profile_photo"
                                class="form-control @error('profile_photo') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/jpg,image/webp">
                            @error('profile_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="d-block mt-2 text-secondary">
                                <i class="bi bi-info-circle me-1"></i>Format: JPG, PNG, WEBP | Maksimal: 5MB
                            </small>
                        </div>

                        <!-- Error Message -->
                        <div id="error-message" class="alert alert-danger d-none" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <span id="error-text"></span>
                        </div>

                        <!-- Preview Container -->
                        <div id="preview-container" class="text-center d-none mt-4">
                            <p class="text-muted mb-2 small">Preview foto baru:</p>
                            <img id="photo-preview" class="rounded-circle border border-primary shadow"
                                style="width: 120px; height: 120px; object-fit: cover;" alt="Preview">
                        </div>

                        <!-- Delete Photo Option -->
                        @if (auth()->user()->profile_photo)
                            <div class="text-center mt-4 pt-3 border-top">
                                <button type="button" class="btn btn-outline-danger btn-sm" id="deletePhotoBtn">
                                    <i class="bi bi-trash me-1"></i>Hapus Foto Profil
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary" id="submitPhotoBtn" disabled>
                            <i class="bi bi-upload me-2"></i>Simpan Foto
                        </button>
                    </div>
                </form>

                <!-- Hidden Delete Form -->
                <form id="deletePhotoForm" action="{{ route('admin.profile.photo.delete') }}" method="POST"
                    class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* =====================
               PROFILE FORM LOGIC
            ===================== */
            const form = document.getElementById('profileForm');
            const submitBtn = document.getElementById('submitBtn');
            const inputs = form.querySelectorAll('[data-original]');

            function checkChanges() {
                let changed = false;

                inputs.forEach(input => {
                    if (input.value !== input.dataset.original) {
                        changed = true;
                    }
                });

                submitBtn.disabled = !changed;
            }

            inputs.forEach(input => {
                input.addEventListener('input', checkChanges);
                input.addEventListener('change', checkChanges);
            });

            form.addEventListener('reset', () => {
                setTimeout(() => submitBtn.disabled = true, 0);
            });


            /* =====================
               PHOTO UPLOAD LOGIC
            ===================== */
            const photoInput = document.getElementById('profile_photo');
            const preview = document.getElementById('photo-preview');
            const previewContainer = document.getElementById('preview-container');
            const submitPhotoBtn = document.getElementById('submitPhotoBtn');
            const errorMessage = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');
            const modal = document.getElementById('changePhotoModal');
            const photoUploadForm = document.getElementById('photoUploadForm');
            const deleteBtn = document.getElementById('deletePhotoBtn');
            const deleteForm = document.getElementById('deletePhotoForm');

            if (photoInput) {
                photoInput.addEventListener('change', function() {
                    const file = this.files[0];
                    errorMessage.classList.add('d-none');
                    previewContainer.classList.add('d-none');
                    submitPhotoBtn.disabled = true;

                    if (!file) return;

                    const allowed = ['image/jpeg', 'image/png', 'image/webp'];
                    if (!allowed.includes(file.type) || file.size > 5 * 1024 * 1024) {
                        errorText.textContent = 'File tidak valid';
                        errorMessage.classList.remove('d-none');
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = e => {
                        preview.src = e.target.result;
                        previewContainer.classList.remove('d-none');
                        submitPhotoBtn.disabled = false;
                    };
                    reader.readAsDataURL(file);
                });
            }

            if (deleteBtn) {
                deleteBtn.addEventListener('click', () => {
                    if (confirm('Yakin ingin menghapus foto profil?')) {
                        deleteForm.submit();
                    }
                });
            }

            if (modal) {
                modal.addEventListener('hidden.bs.modal', () => {
                    photoUploadForm.reset();
                    previewContainer.classList.add('d-none');
                    errorMessage.classList.add('d-none');
                    submitPhotoBtn.disabled = true;
                });
            }

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
            background-color: #666666 !important;
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
