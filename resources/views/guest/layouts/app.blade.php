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
</body>

</html>
