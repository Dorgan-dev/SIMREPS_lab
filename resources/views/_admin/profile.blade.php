@extends('_admin.layouts.app')

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
                <h3 class="mb-4 fw-bold {{ config('app.env') == 'production' ? 'text-light' : 'text-dark' }}">
                    <i class="bi bi-person-circle me-2"></i>Profil Akun
                </h3>

                <!-- Card Foto Profil -->
                <div
                    class="card shadow-sm mb-4 {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-white text-dark' }}">
                    <div class="card-body text-center py-4">
                        <div class="position-relative d-inline-block">
                            <div class="rounded-circle border border-3 {{ config('app.env') == 'production' ? 'border-secondary' : 'border-light' }} p-2 shadow"
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
                        <small class="text-muted">
                            @{{ auth()->user()->username }}
                        </small>
                    </div>
                </div>

                <!-- Card Informasi Profil -->
                <div
                    class="card shadow-sm {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-white text-dark' }}">
                    <div class="card-header {{ config('app.env') == 'production' ? 'bg-secondary' : 'bg-light' }} py-3">
                        <h5 class="mb-0 fw-semibold">
                            <i class="bi bi-info-circle me-2"></i>Informasi Pribadi
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <!-- Nama Lengkap -->
                                <div class="col-md-12">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="bi bi-person-fill me-2 text-primary"></i>Nama Lengkap
                                    </label>
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg {{ $errors->has('name') ? 'is-invalid' : '' }}
                                        {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-light' }}"
                                        value="{{ old('name', auth()->user()->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Username -->
                                <div class="col-md-6">
                                    <label for="username" class="form-label fw-semibold">
                                        <i class="bi bi-at me-2 text-info"></i>Username
                                    </label>
                                    <input type="text" name="username" id="username"
                                        class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}
                                        {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-light' }}"
                                        value="{{ old('username', auth()->user()->username) }}" readonly>
                                    <small class="text-muted d-block mt-1">
                                        <i class="bi bi-lock-fill me-1"></i>Username tidak dapat diubah
                                    </small>
                                    @error('username')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label fw-semibold">
                                        <i class="bi bi-gender-ambiguous me-2 text-success"></i>Jenis Kelamin
                                    </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="form-select {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}
                                        {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-light' }}" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="bi bi-envelope-fill me-2 text-danger"></i>Email
                                    </label>
                                    <input type="email" name="email" id="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}
                                        {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-light' }}"
                                        value="{{ old('email', auth()->user()->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label fw-semibold">
                                        <i class="bi bi-telephone-fill me-2 text-warning"></i>Nomor Telepon
                                    </label>
                                    <input type="tel" name="no_hp" id="no_hp"
                                        class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}
                                        {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-light' }}"
                                        value="{{ old('no_hp', auth()->user()->no_hp) }}"
                                        placeholder="08xxxxxxxxxx" required>
                                    @error('no_hp')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Role -->
                                <div class="col-md-12">
                                    <label for="role" class="form-label fw-semibold">
                                        <i class="bi bi-shield-fill-check me-2 text-primary"></i>Role
                                    </label>
                                    <input type="text" name="role" id="role"
                                        class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}
                                        {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : 'bg-light' }}"
                                        value="{{ auth()->user()->role == 1 ? 'Admin' : (auth()->user()->role == 2 ? 'Resepsionis' : 'Customer') }}"
                                        readonly>
                                    @error('role')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Foto -->
    <div class="modal fade" id="changePhotoModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div
                class="modal-content {{ config('app.env') == 'production' ? 'bg-dark text-light' : 'bg-white text-dark' }}">

                <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data"
                    id="photoUploadForm">
                    @csrf

                    <div
                        class="modal-header border-bottom {{ config('app.env') == 'production' ? 'border-secondary' : '' }}">
                        <h5 class="modal-title fw-bold">
                            <i class="bi bi-camera-fill me-2"></i>Ubah Foto Profil
                        </h5>
                        <button type="button"
                            class="btn-close {{ config('app.env') == 'production' ? 'btn-close-white' : '' }}"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <img id="current-photo" src="{{ auth()->user()->profile_photo_url }}"
                                class="rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;"
                                alt="Current">
                        </div>

                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Pilih foto baru</label>
                            <input type="file" name="profile_photo" id="profile_photo"
                                class="form-control @error('profile_photo') is-invalid @enderror
                               {{ config('app.env') == 'production' ? 'bg-dark text-light border-secondary' : '' }}"
                                accept="image/jpeg,image/png,image/jpg,image/webp" onchange="previewPhoto(event)"
                                required>

                            @error('profile_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <small class="text-muted d-block mt-2">
                                <i class="bi bi-info-circle me-1"></i>
                                Format: JPG, PNG, WEBP | Maksimal: 2MB | Min: 100x100px
                            </small>
                        </div>

                        <div id="preview-container" class="text-center d-none mt-3">
                            <p class="text-muted mb-2 small">Preview foto baru:</p>
                            <img id="photo-preview" class="rounded-circle border border-primary"
                                style="width: 120px; height: 120px; object-fit: cover;" alt="Preview">
                        </div>
                    </div>

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

                // Validasi ukuran file (2MB)
                if (file.size > 2048000) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB');
                    input.value = '';
                    container.classList.add('d-none');
                    return;
                }

                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak valid! Gunakan JPG, PNG, atau WEBP');
                    input.value = '';
                    container.classList.add('d-none');
                    return;
                }

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

        // Reset form saat modal ditutup
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

        .rounded-circle img {
            transition: transform 0.3s ease;
        }

        .rounded-circle:hover img {
            transform: scale(1.05);
        }
    </style>
@endsection
