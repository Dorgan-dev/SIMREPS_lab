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
            <a href="{{ route('admin.profile') }}" class="sidebar-user">
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
                    <a class="{{ Request::routeIs('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
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
                        <li>
                            <a href=""
                                class="{{ Request::routeIs('reservations.index*') ? 'active' : '' }}">Pemesanan</a>
                        </li>
                        <li>
                            <a href=""
                                class="{{ Request::routeIs('admin.history*') ? 'active' : '' }}">Riwayat</a>
                        </li>
                    </ul>
                </li>

                <!-- Users -->
                <li>
                    <a class="show-cat-btn {{ Request::routeIs('customers.index*') || Request::routeIs('admin.staff*') ? 'active' : '' }}"
                        href="##">
                        <span class="icon user-3" aria-hidden="true"></span> Pengguna
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{ route('admin.customers.index') }}"
                                class="{{ Request::routeIs('customers.index*') ? 'active' : '' }}">Pelanggan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.staff.index') }}"
                                class="{{ Request::routeIs('admin.staff*') ? 'active' : '' }}">Staf
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Consoles -->
                <li>
                    <a class="{{ Request::routeIs('console.*') ? 'active' : '' }}"
                        href="{{ route('admin.consoles.index') }}">
                        <span class="icon fas fa-cogs" aria-hidden="true"></span> Konsol
                    </a>
                </li>

                <!-- Rooms -->
                <li>
                    <a class="{{ Request::routeIs('admin.room*') ? 'active' : '' }}"
                        href="{{ route('admin.rooms.index') }}">
                        <span class="icon fas fa-door-open" aria-hidden="true"></span> Ruangan
                    </a>
                </li>
            </ul>

            <span class="system-menu__title">Sistem</span>
            <ul class="sidebar-body-menu">
                <!-- Settings -->
                <li>
                    <a href="{{ route('admin.settings.index') }}"
                        class="{{ Request::routeIs('settings.*') ? 'active' : '' }}">
                        <span class="icon setting" aria-hidden="true"></span> Pengaturan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
