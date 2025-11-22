@extends('guest.layouts.auth')

@section('content')
    <main id="main" class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">

        <div class="container py-5">
            <div class="row justify-content-center">

                {{-- Kolom untuk menampung form login (Pusatkan di tengah) --}}
                <div class="col-lg-5 col-md-8">

                    {{-- Card atau Box Login --}}
                    <div class="login-box bg-white p-4 p-md-5 shadow-lg rounded" data-aos="fade-up">

                        <h2 class="text-center mb-4">Masuk ke SIMREPS</h2>
                        <p class="text-center text-muted mb-4">Silakan masukkan detail akun Anda.</p>

                        {{-- Formulir Login --}}
                        <form action="{{ route('auth.login') }}" method="POST" class="php-email-form">
                            @csrf {{-- Token keamanan Laravel wajib --}}

                            {{-- Input Email --}}
                            {{-- <div class="form-group mb-3">
                                <label for="email">Alamat Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Enter your username" value="{{ old('username') }}">
                            </div>

                            {{-- Input Password --}}
                            <div class="form-group mb-3">
                                <label for="password">Kata Sandi</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Remember Me & Lupa Password --}}
                            <div class="form-group d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Ingat Saya
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn-link" href="">
                                        Lupa Kata Sandi?
                                    </a>
                                @endif
                            </div>

                            {{-- Tombol Login --}}
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-getstarted">
                                    Masuk
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">

                        {{-- Tautan Registrasi --}}
                        <div class="text-center">
                            <p class="mb-0">Belum punya akun?
                                <a href="{{ route('home.register') }}" class="fw-bold text-decoration-none">Daftar
                                    Sekarang</a>
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </main>
    <!-- Modal Notifikasi -->
    <div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="notifModalLabel">Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body" id="notifMessage">
                    <!-- Pesan akan diisi melalui JavaScript -->
                </div>

                <!-- Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>

    {{-- Script modal --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successMessage = @json(session('success'));
            var errorMessage = @json(session('error'));
            var messageElement = document.getElementById('notifMessage');

            if (successMessage) {
                messageElement.innerHTML = successMessage;
                var notifModal = new bootstrap.Modal(document.getElementById('notifModal'));
                notifModal.show();
            } else if (errorMessage) {
                messageElement.innerHTML = errorMessage;
                var notifModal = new bootstrap.Modal(document.getElementById('notifModal'));
                notifModal.show();
            }
        });
    </script>
@endsection
