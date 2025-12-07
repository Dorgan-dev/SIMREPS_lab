@extends('guest.layouts.auth')

@section('content')
    <main id="main" class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">

        <div class="container py-5">
            <div class="row justify-content-center">

                <div class="col-lg-5 col-md-8">

                    <div class="login-box bg-white p-2 p-md-5 shadow-lg rounded" data-aos="fade-up">

                        <div class="text-center mb-4">
                            <img src="{{ asset(getSetting('site_logo')) }}" alt="Logo SIMREPS"
                                style="max-width:140px;">
                        </div>

                        <p class="text-center text-muted mb-4">Silakan masukkan detail akun Anda.</p>

                        {{-- Form Login --}}
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf

                            {{-- Username --}}
                            <div class="mb-4">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Masukkan username" value="{{ old('username') }}">
                            </div>

                            {{-- Password --}}
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Kata Sandi</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan kata sandi" required>

                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Remember + Forgot --}}
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Ingat Saya</label>
                                </div>

                                <a href="#" class="text-decoration-none">Lupa Kata Sandi?</a>
                            </div>

                            {{-- Login Google --}}
                            <a href="{{ route('redirect.google') }}"
                                class="btn btn-light border d-flex align-items-center justify-content-center gap-2 w-100 mb-3"
                                style="font-weight: 500;">

                                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                                    alt="Google Logo" width="22" height="22">

                                Login dengan Google
                            </a>

                            {{-- Tombol Login --}}
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                                Masuk
                            </button>

                        </form>

                        <hr class="my-4">

                        {{-- Registrasi --}}
                        <div class="text-center">
                            <p class="mb-0">Belum punya akun?
                                <a href="{{ route('home.register') }}" class="fw-bold text-decoration-none">
                                    Daftar Sekarang
                                </a>
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
