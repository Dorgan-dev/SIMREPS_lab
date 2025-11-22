{{-- Menggunakan Master Layout Autentikasi --}}
@extends('guest.layouts.auth')

@section('content')
    <main id="main" class="d-flex align-items-center justify-content-center" style="min-height: 90vh;">

        <div class="container py-5">
            <div class="row justify-content-center">

                {{-- Kolom untuk menampung form registrasi --}}
                {{-- Menggunakan col-lg-6 agar form yang lebih panjang terlihat proporsional --}}
                <div class="col-lg-6 col-md-10">

                    {{-- Card atau Box Registrasi --}}
                    <div class="register-box bg-white p-4 p-md-5 shadow-lg rounded" data-aos="fade-up">

                        <h2 class="text-center mb-4">Daftar Akun Baru</h2>
                        <p class="text-center text-muted mb-4">Lengkapi data di bawah ini untuk bergabung dengan SIMREPS.</p>

                        {{-- Formulir Registrasi --}}
                        <form action="{{ route('auth.register') }}" method="POST" class="php-email-form">
                            @csrf {{-- Token keamanan Laravel wajib --}}

                            <div class="row">

                                {{-- Input Nama Lengkap --}}
                                <div class="col-md-12 form-group mb-3">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Input Username --}}
                                <div class="col-md-6 form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" required autocomplete="username">
                                    @error('username')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Input Jenis Kelamin (Dropdown) --}}
                                <div class="col-md-6 form-group mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Input Email --}}
                                <div class="col-md-6 form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Input No. HP --}}
                                <div class="col-md-6 form-group mb-3">
                                    <label for="no_hp">Nomor Telepon</label>
                                    <input type="tel" name="no_hp" id="no_hp"
                                        class="form-control @error('no_hp') is-invalid @enderror"
                                        value="{{ old('no_hp') }}" required autocomplete="tel">
                                    @error('no_hp')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Input Password --}}
                                <div class="col-md-6 form-group mb-3">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                {{-- Input Konfirmasi Password --}}
                                <div class="col-md-6 form-group mb-4">
                                    <label for="password-confirm">Konfirmasi Kata Sandi</label>
                                    <input type="password" name="password_confirmation" id="password-confirm"
                                        class="form-control" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Tombol Daftar --}}
                            <div class="d-grid gap-2 mt-2">
                                <button type="submit" class="btn btn-primary btn-getstarted">
                                    Daftar Akun
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">

                        {{-- Tautan ke Halaman Login --}}
                        <div class="text-center">
                            <p class="mb-0">Sudah punya akun?
                                <a href="{{ route('home.login') }}" class="fw-bold text-decoration-none">Masuk di sini</a>
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
