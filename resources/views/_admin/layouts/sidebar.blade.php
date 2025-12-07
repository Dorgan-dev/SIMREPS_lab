<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper d-flex align-items-center" title="Home" style="text-decoration:none;">
                <span class="sr-only">Home</span>

                {{-- Lingkaran putih untuk logo --}}
                <div
                    style="background:white; padding:8px; border-radius:50%; display:flex; align-items:center; justify-content:center; margin-right:10px;">
                    <img src="{{ asset(getSetting('site_logo')) }}" alt="Logo SIMREPS"
                        style="max-width:50px; max-height:40px;">
                </div>

                {{-- Teks logo --}}
                <div class="logo-text" style="color:white;">
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
            <div class="sidebar-footer">
                <a href="{{ route('admin.profile') }}" class="sidebar-user">
                    <span class="sidebar-user-img">
                        <picture>
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="User photo"
                                style="width:55px; height:55px; border-radius:50%; object-fit:cover;">
                        </picture>
                    </span>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user__title">{{ Auth::user()->name }}</span>
                        <span class="sidebar-user__subtitle">
                            {{ Auth::user()->role == 1 ? 'Administrator' : (Auth::user()->role == 2 ? 'Resepsionis' : 'Customer') }}
                        </span>
                    </div>
                </a>
            </div>

            <ul class="sidebar-body-menu">
                {{-- Dashboard --}}
                <li>
                    <a class="{{ Request::routeIs('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <span class="icon home" aria-hidden="true"></span>Dashboard
                    </a>
                </li>

                {{-- Bookings Data --}}
                <li>
                    <a class="show-cat-btn {{ Request::routeIs('reservations.index*') || Request::routeIs('') || Request::routeIs('admin.history*') ? 'active' : '' }}"
                        href="##">
                        <span class="icon document" aria-hidden="true"></span>Bookings Data
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="" class="{{ Request::routeIs('') ? 'active' : '' }}">
                                Request
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reservations.index') }}"
                                class="{{ Request::routeIs('reservations.index*') ? 'active' : '' }}">
                                Reservations
                            </a>
                        </li>
                        <li>
                            <a href="" class="{{ Request::routeIs('admin.history*') ? 'active' : '' }}">
                                History
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Users --}}
                <li>
                    <a class="show-cat-btn {{ Request::routeIs('customers.index*') || Request::routeIs('admin.staff*') ? 'active' : '' }}"
                        href="##">
                        <span class="icon user-3" aria-hidden="true"></span>Users
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{ route('admin.customers.index') }}"
                                class="{{ Request::routeIs('customers.index*') ? 'active' : '' }}">
                                Customers
                            </a>
                        </li>
                        <li>
                            <a href="" class="{{ Request::routeIs('admin.staff*') ? 'active' : '' }}">
                                Staff
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Consoles --}}
                <li>
                    <a class="{{ Request::routeIs('console.*') ? 'active' : '' }}"
                        href="{{ route('admin.consoles.index') }}">
                        <span class="icon fas fa-cogs" aria-hidden="true"></span>Consoles
                    </a>
                </li>

                {{-- Rooms --}}
                <li>
                    <a class="{{ Request::routeIs('admin.room*') ? 'active' : '' }}"
                        href="{{ route('admin.rooms.index') }}">
                        <span class="icon fas fa-door-open" aria-hidden="true"></span>Rooms
                    </a>
                </li>

                {{-- Media --}}
                <li>
                    <a class="show-cat-btn {{ Request::routeIs('admin.media*') ? 'active' : '' }}" href="##">
                        <span class="icon image" aria-hidden="true"></span>Media
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="" class="{{ Request::routeIs('admin.media.index') ? 'active' : '' }}">
                                Media-01
                            </a>
                        </li>
                        <li>
                            <a href="" class="{{ Request::routeIs('admin.media.gallery') ? 'active' : '' }}">
                                Media-02
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Pages --}}
                <li>
                    <a class="show-cat-btn {{ Request::routeIs('admin.pages*') ? 'active' : '' }}" href="##">
                        <span class="icon paper" aria-hidden="true"></span>Pages
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="" class="{{ Request::routeIs('admin.pages.index') ? 'active' : '' }}">
                                All pages
                            </a>
                        </li>
                        <li>
                            <a href="" class="{{ Request::routeIs('admin.pages.create') ? 'active' : '' }}">
                                Add new page
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Comments --}}
                <li>
                    <a href="" class="{{ Request::routeIs('admin.comments*') ? 'active' : '' }}">
                        <span class="icon message" aria-hidden="true"></span>
                        Comments
                    </a>
                    <span class="msg-counter">7</span>
                </li>
            </ul>

            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
                {{-- Appearance --}}
                <li>
                    <a href="" class="{{ Request::routeIs('admin.appearance*') ? 'active' : '' }}">
                        <span class="icon edit" aria-hidden="true"></span>Appearance
                    </a>
                </li>

                {{-- Settings --}}
                <li>
                    <a href="{{ route('admin.settings.index') }}"
                        class="{{ Request::routeIs('settings.*') ? 'active' : '' }}">
                        <span class="icon setting" aria-hidden="true"></span>Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>

<style>
    /* Style untuk active menu */
    .sidebar-body-menu a.active {
        background-color: rgba(255, 255, 255, 0.1);
        border-left: 3px solid #fff;
        font-weight: 600;
    }

    .cat-sub-menu a.active {
        color: #fff;
        font-weight: 600;
        background-color: rgba(255, 255, 255, 0.05);
    }

    /* Smooth transition */
    .sidebar-body-menu a {
        transition: all 0.3s ease;
    }
</style>
