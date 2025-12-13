<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper d-flex align-items-center" title="Home" style="text-decoration:none;">
                <span class="sr-only">Home</span>

                <!-- Lingkaran putih untuk logo -->
                <div
                    style="background:white; padding:9px; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                    <img src="{{ asset(getSetting('site_logo')) }}" alt="Logo SIMREPS"
                        style="max-width:50px; max-height:40px;">
                </div>

                <!-- Teks logo -->
                <div class="logo-text" style="color:white; margin-left:10px;">
                    <span class="logo-title">SIMREPS</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>
            </a>

            <button class="sidebar-toggle transparent-btn mt-4" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>

        <div class="sidebar-body">
            <a href="{{ route('reseptionist.profile') }}" class="sidebar-user">
                <span class="sidebar-user-img">
                    <img id="current-photo" src="{{ auth()->user()->profile_photo_url }}" class="rounded-circle border"
                        style="width: 48px; height: 48px; object-fit: cover;" alt="Current">
                </span>
                <div class="sidebar-user-info">
                    <span class="sidebar-user__title">{{ Auth::user()->name }}</span>
                    <span class="sidebar-user__subtitle">
                        {{ Auth::user()->role == 1 ? 'Administrator' : (Auth::user()->role == 2 ? 'Resepsionis' : 'Pelanggan') }}
                    </span>
                </div>
            </a>
            <ul class="sidebar-body-menu">
                <!-- Dashboard -->
                <li>
                    <a class="{{ Request::routeIs('admin') ? 'active' : '' }}" href="{{ route('reseptionist.dashboard') }}">
                        <span class="icon home" aria-hidden="true"></span> Dashboard
                    </a>
                </li>

                <!-- Bookings Data -->
                <li>
                    <a class="show-cat-btn {{ Request::routeIs('reservations.index*') || Request::routeIs('') || Request::routeIs('admin.history*') ? 'active' : '' }}"
                        href="##">
                        <span class="icon document" aria-hidden="true"></span> Data Pemesanan
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('reseptionist.reservations.pending') }}" class="nav-link">
                                <i class="bi bi-inbox"></i> Pengajuan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('reseptionist.reservations.ongoing') }}" class="nav-link">
                                <i class="bi bi-play-circle"></i> Sedang Berjalan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('reseptionist.reservations.history') }}" class="nav-link">
                                <i class="bi bi-clock-history"></i> Riwayat Pesanan
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Users -->
                <li>
                    <a href="{{ route('reseptionist.customers.index') }}"
                        class="{{ Request::routeIs('customers.index*') ? 'active' : '' }}">
                        <span class="icon user-3" aria-hidden="true"></span> Pelanggan
                    </a>
                </li>

                <!-- Consoles -->
                <li>
                    <a class="{{ Request::routeIs('reseptionist.consoles.*') ? 'active' : '' }}"
                        href="{{ route('reseptionist.consoles.index') }}">
                        <span class="icon fas fa-cogs" aria-hidden="true"></span> Konsol
                    </a>
                </li>

                <!-- Rooms -->
                <li>
                    <a class="{{ Request::routeIs('reseptionist.rooms*') ? 'active' : '' }}"
                        href="{{ route('reseptionist.rooms.index') }}">
                        <span class="icon fas fa-door-open" aria-hidden="true"></span> Ruangan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
