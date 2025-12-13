<nav class="main-nav--bg">
    <div class="container main-nav">
        <div class="main-nav-start">
            <div class="search-wrapper">
                <i data-feather="search" aria-hidden="true"></i>
                <input type="text" placeholder="Enter keywords ..." required aria-label="Search">
            </div>
        </div>
        <div class="main-nav-end">
            <!-- Menu Toggle Button -->
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button" aria-label="Toggle menu">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>

            <!-- Theme Switcher -->
            <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme"
                aria-label="Switch theme">
                <span class="sr-only">Switch theme</span>
                <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
            </button>

            <!-- Notification Wrapper -->
            <div class="notification-wrapper">
                <button class="gray-circle-btn dropdown-btn" title="To messages" type="button"
                    aria-label="View notifications">
                    <span class="sr-only">To messages</span>
                    <span class="icon notification active" aria-hidden="true"></span>
                </button>
                <ul class="users-item-dropdown notification-dropdown dropdown" role="menu">
                    <li>
                        <a href="##" role="menuitem">
                            <div class="notification-dropdown-icon info">
                                <i data-feather="check"></i>
                            </div>
                            <div class="notification-dropdown-text">
                                <span class="notification-dropdown__title">System just updated</span>
                                <span class="notification-dropdown__subtitle">The system has been successfully upgraded.
                                    Read more here.</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="##" role="menuitem">
                            <div class="notification-dropdown-icon danger">
                                <i data-feather="info" aria-hidden="true"></i>
                            </div>
                            <div class="notification-dropdown-text">
                                <span class="notification-dropdown__title">The cache is full!</span>
                                <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory
                                    space.</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="##" role="menuitem">
                            <div class="notification-dropdown-icon info">
                                <i data-feather="check" aria-hidden="true"></i>
                            </div>
                            <div class="notification-dropdown-text">
                                <span class="notification-dropdown__title">New Subscriber here!</span>
                                <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="link-to-page" href="##">Go to Notifications page</a>
                    </li>
                </ul>
            </div>

            <!-- User Profile Wrapper -->
            <div class="nav-user-wrapper">
                <button class="nav-user-btn dropdown-btn" title="My profile" type="button" aria-label="User profile">
                    <span class="sr-only">My profile</span>
                    <span class="nav-user-img">
                        <picture>
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="User photo"
                                style="width:40px; height:40px; border-radius:50%; object-fit:cover;">
                        </picture>
                    </span>
                </button>
                <ul class="users-item-dropdown nav-user-dropdown dropdown" role="menu">
                    <li>
                        <a href="{{ route('admin.profile') }}" role="menuitem">
                            <i data-feather="user" aria-hidden="true"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal" role="menuitem">
                            <i data-feather="settings" aria-hidden="true"></i>
                            <span>Reset Password</span>
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST" role="form">
                            @csrf
                            <button type="submit" class="danger"
                                style="background:none; border:none; padding:0; cursor:pointer; color:#e3342f;"
                                aria-label="Log out">
                                <i data-feather="log-out" aria-hidden="true"></i>
                                <span>Log out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
