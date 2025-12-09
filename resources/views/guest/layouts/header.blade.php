<div class="container-fluid container-xl position-relative d-flex align-items-center">

    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename ms-2">SIMREPS</h1>
    </a>

    <!-- Navbar -->
    <nav id="navmenu" class="navmenu">
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            </li>
            <li>
                <a href="{{ route('home.about') }}" class="{{ request()->is('about') ? 'active' : '' }}">Tentang
                    SIMREPS</a>
            </li>
            <li class="dropdown">
                <a href="#">
                    <span>Ketersediaan</span>
                    <i class="bi bi-chevron-down toggle-dropdown"></i>
                </a>
                <ul>
                    <li><a href="{{ route('home.rooms') }}">Play Room</a></li>
                    <li><a href="{{ route('home.consoles') }}">Console</a></li>
                    <li><a href="#">Jadwal Hari Ini</a></li>
                    <li><a href="#">Reservasi Mendatang</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('home.contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Kontak &
                    Bantuan</a>
            </li>
        </ul>

        <!-- Mobile Nav Toggle -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <!-- Authentication Section -->
    @guest
        <!-- Tombol Daftar/Masuk untuk pengguna belum login -->
        <a class="btn-getstarted ms-3" href="{{ route('home.login') }}">Daftar / Masuk</a>
    @endguest

    @auth
        <!-- Dropdown Profil untuk pengguna yang sudah login -->
        <li class="dropdown" style="list-style: none; margin-left: 20px;">
            <a href="#" class="dropdown-toggle d-flex align-items-center" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-person-circle bg-shapes" style="font-size: 32px; color: #ffffff;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('auth') }}">Dashboard</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @endauth

</div>
