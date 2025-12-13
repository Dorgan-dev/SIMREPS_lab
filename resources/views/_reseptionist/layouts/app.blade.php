<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMREPS | Admin Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/SIMREPS_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('_admin/css/style.min.css') }}">
</head>

<body>

    @php
        $user = Auth::user();
        $showOldPassword = !($user->google_id && !$user->password_set);
    @endphp

    <div class="layer"></div>

    <div class="page-flex">
        @include('_reseptionist.layouts.sidebar')

        <div class="main-wrapper">
            @include('_reseptionist.layouts.topbar')
            @yield('content')
            @include('_reseptionist.layouts.footer')
        </div>
    </div>

    {{-- =============== NOTIFIKASI =============== --}}
    <div class="modal fade" id="notifModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-3">
                <div class="modal-header">
                    <h5 class="modal-title">Notifikasi</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="notificationMessage" class="mb-0"></p>
                </div>
            </div>
        </div>
    </div>

    {{-- =============== MODAL GANTI PASSWORD =============== --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-3">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Ganti Password</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('admin.change-password') }}" method="POST">
                    @csrf

                    <div class="modal-body">

                        {{-- Password Lama --}}
                        @if ($showOldPassword)
                            <div class="mb-3">
                                <label class="form-label">Password Lama</label>
                                <input type="password" name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    value="{{ old('current_password') }}">

                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif

                        {{-- Password Baru --}}
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="new_password"
                                class="form-control @error('new_password') is-invalid @enderror" required minlength="6"
                                value="{{ old('new_password') }}">

                            @error('new_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password Baru --}}
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required
                                minlength="6" value="{{ old('new_password_confirmation') }}">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Update Password</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- =============== JS =============== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('_admin/plugins/chart.min.js') }}"></script>
    <script src="{{ asset('_admin/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('_admin/js/script.js') }}"></script>

    {{-- Tampilkan modal Ganti Password HANYA jika ada error --}}
    @if ($errors->has('current_password') || $errors->has('new_password') || $errors->has('new_password_confirmation'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('changePasswordModal'));
                modal.show();
            });
        </script>
    @endif


    {{-- Notifikasi success --}}
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let msg = "{{ session('success') }}";
                showNotification(msg);
            });
        </script>
    @endif

    <script>
        function showNotification(message) {
            const messageEl = document.getElementById('notificationMessage');
            const modalEl = document.getElementById('notifModal');

            messageEl.textContent = message;
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    </script>

    @stack('scripts')

</body>

</html>
