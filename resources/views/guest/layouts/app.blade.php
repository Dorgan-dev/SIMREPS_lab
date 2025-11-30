<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest.layouts.head')
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        @include('guest.layouts.header')
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer accent-background">
        @include('guest.layouts.footer')
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('guest/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('guest/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('guest/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="guest/js/main.js"></script>

    <!-- Modal Notifikasi -->
    <div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header" id="notifHeader">
                    <h5 class="modal-title" id="notifModalLabel">Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Body Modal -->
                <div class="modal-body" id="notifMessage">
                    <!-- Pesan akan diisi melalui JavaScript -->
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer" id="notifFooter">
                    <button type="button" class="btn" id="notifButton" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Script modal --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successMessage = @json(session('success'));
            var errorMessage = @json(session('error'));

            var header = document.getElementById('notifHeader');
            var footer = document.getElementById('notifFooter');
            var button = document.getElementById('notifButton');
            var content = document.getElementById('notifContent');
            var title = document.getElementById('notifModalLabel');
            var messageElement = document.getElementById('notifMessage');

            if (successMessage) {

                messageElement.innerHTML = successMessage;

                // WARNA SUCCESS
                header.classList.add('bg-success');
                title.classList.add('text-white'); // <- perbaikan penting
                button.classList.add('btn-success');
                footer.classList.add('border-success');
                title.innerHTML = "Berhasil";

                new bootstrap.Modal(document.getElementById('notifModal')).show();

            } else if (errorMessage) {

                messageElement.innerHTML = errorMessage;

                // WARNA ERROR
                header.classList.add('bg-danger');
                title.classList.add('text-white'); // <- perbaikan penting
                button.classList.add('btn-danger');
                footer.classList.add('border-danger');
                title.innerHTML = "Gagal";

                new bootstrap.Modal(document.getElementById('notifModal')).show();
            }
        });
    </script>
</body>

</html>
