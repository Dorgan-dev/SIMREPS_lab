<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('_admin/img/svg/Logo.svg') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('_admin/css/style.min.css') }}">
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        @include('_admin.layouts.sidebar')

        <div class="main-wrapper">
            <!-- ! Main nav -->
            @include('_admin.layouts.topbar')

            <!-- ! Main -->
            @yield('content')

            <!-- ! Footer -->
            @include('_admin.layouts.footer')
        </div>
    </div>
    {{-- Modal Notifikasi --}}
    <div class="modal fade" id="notifModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- membuat modal center -->
            <div class="modal-content shadow-lg rounded-3">
                <div class="modal-header">
                    <h5 class="modal-title">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="notificationMessage" class="mb-0"></p>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Chart library -->
    <script src="{{ asset('_admin/plugins/chart.min.js') }}"></script>
    <!-- Icons library -->
    <script src="{{ asset('_admin/plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('_admin/js/script.js') }}"></script>
    <!-- Bootstrap JS -->
    <script>
        function showNotification(message) {
            const messageEl = document.getElementById('notificationMessage');
            const modalEl = document.getElementById('notifModal');

            if (!modalEl || !messageEl) {
                console.error("Elemen modal atau message tidak ditemukan!");
                return;
            }

            messageEl.textContent = message;

            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    </script>

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                showNotification("{{ session('success') }}");
            });
        </script>
    @endif
</body>

</html>
