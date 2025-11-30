<div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">SIMREPS</h1>
    </a>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            </li>

            <li>
                <a href="{{ route('home.about') }}" class="{{ request()->is('about') ? 'active' : '' }}">Tentang</a>
            </li>

            <li class="dropdown">
                <a href="#">
                    <span>Ketersediaan</span>
                    <i class="bi bi-chevron-down toggle-dropdown"></i>
                </a>

                <ul>
                    <li><a href="{{ route('home.room')}}">Ruangan</a></li>
                    <li><a href="{{ route('home.console')}}">Console</a></li>
                    <li><a href="#">Jadwal Hari Ini</a></li>
                    <li><a href="#">Reservasi Mendatang</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('home.contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Kontak</a>
            </li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="{{ route('home.login') }}">Daftar / Masuk</a>

</div>
