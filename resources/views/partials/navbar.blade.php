<div id="sidebar" class="d-flex flex-column p-3">
    <!-- Sidebar Header -->
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="me-2 rounded-circle">
            <span id="sidebar-title" class="fs-5 fw-bold">PockétDex</span>
        </a>
    </div>
    <hr>

    <!-- Menu -->
    <ul class="nav nav-pills flex-column mb-auto">
        <!-- <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link sidebar-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i> <span class="sidebar-text">Dashboard</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link sidebar-link {{ Request::routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house"></i> <span class="sidebar-text">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('gallery') }}" class="nav-link sidebar-link {{ Request::routeIs('gallery') ? 'active' : '' }}">
                <i class="bi bi-collection"></i> <span class="sidebar-text">Gallery</span>
            </a>
        </li>
        <li>
            <a href="{{ route('news.index') }}" class="nav-link sidebar-link {{ Request::routeIs('news') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> <span class="sidebar-text">News</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('forum') }}" class="nav-link sidebar-link {{ Request::is('forum*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i> <span class="sidebar-text">Forum</span>
            </a>
        </li>
        <li>
            <a href="{{ route('about') }}" class="nav-link sidebar-link {{ Request::routeIs('about') ? 'active' : '' }}">
                <i class="bi bi-info-circle"></i> <span class="sidebar-text">About</span>
            </a>
        </li>
    </ul>
    <hr>

    <!-- User Authentication Links -->
    <div class="nav-item">
        <a href="{{ route('profile.show') }}" class="nav-link sidebar-link {{ Request::routeIs('profile.show') ? 'active' : '' }}">
            @auth
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle" alt="User Avatar" style="width: 50px; height: 50px;">
                <span class="sidebar-text">{{ Auth::user()->name }}</span>
            @else
                Profile
            @endauth
        </a>
    </div>
    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <!-- Team Management -->
        <div class="nav-item">
            <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="nav-link sidebar-link {{ Request::routeIs('teams.show') ? 'active' : '' }}">
                <i class="bi bi-people"></i> <span class="sidebar-text">Team Settings</span>
            </a>
        </div>
    @endif
    <div class="nav-item">
        @auth
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <a href="{{ route('logout') }}" class="nav-link sidebar-link"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="bi bi-box-arrow-right"></i> <span class="sidebar-text">Logout</span>
                </a>
            </form>
        @else
            <a href="{{ route('login') }}" class="nav-link sidebar-link">
                <i class="bi bi-box-arrow-in-right"></i> <span class="sidebar-text">Login</span>
            </a>
        @endauth
    </div>
</div>
