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
                    <!-- Submenu level 1 dengan submenu level 2 di dalamnya -->
                    <li class="dropdown">
                        <a href="#">
                            <span>Ruangan</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="#">Ruangan VIP</a></li>
                            <li><a href="#">Ruangan Reguler</a></li>

                            <!-- Submenu level 2 dengan submenu level 3 -->
                            <li class="dropdown">
                                <a href="#">Fasilitas Ruangan</a>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                                <ul>
                                    <li><a href="#">AC</a></li>
                                    <li><a href="#">Proyektor</a></li>
                                    <li><a href="#">Wi-Fi</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Submenu level 1 dengan submenu level 2 di dalamnya -->
                    <li class="dropdown">
                        <a href="#">
                            <span>Console</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="#">Play Station 5</a></li>
                            <li><a href="#">Play Station 4</a></li>
                            <li><a href="#">Play Station 3</a></li>
                        </ul>
                    </li>

                    <!-- Submenu level 1 lainnya -->
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
