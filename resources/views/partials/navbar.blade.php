<div id="sidebar" class="d-flex flex-column p-3">
    <!-- Sidebar Header -->
    <div class="d-flex align-items-center mb-3">
        <a href="/" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="me-2 rounded-circle">
            <span id="sidebar-title" class="fs-5 fw-bold">PockétDex</span>
        </a>
    </div>
    <hr>

    <!-- Menu -->
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link sidebar-link {{ Request::routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i> <span class="sidebar-text">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('gallery') }}" class="nav-link sidebar-link {{ Request::routeIs('gallery') ? 'active' : '' }}">
                <i class="bi bi-collection"></i> <span class="sidebar-text">Gallery</span>
            </a>
        </li>
        <li>
            <a href="{{ route('news') }}" class="nav-link sidebar-link {{ Request::routeIs('news') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> <span class="sidebar-text">News</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('forum') }}" class="nav-link sidebar-link {{ Request::is('forum*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i> <span class="sidebar-text">Forum</span>
            </a>
        </li>
        <li>
            <a href="{{ route('deckbuilder') }}" class="nav-link sidebar-link {{ Request::routeIs('deckbuilder') ? 'active' : '' }}">
                <i class="bi bi-tools"></i> <span class="sidebar-text">Deck Builder</span>
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
        <a href="{{ route('profile.show') }}" class="nav-link sidebar-link">
            <i class="bi bi-person-circle"></i> <span class="sidebar-text">Profile</span>
        </a>
    </div>
    <div class="nav-item">
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <a href="{{ route('logout') }}" class="nav-link sidebar-link"
               onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="bi bi-box-arrow-right"></i> <span class="sidebar-text">Logout</span>
            </a>
        </form>
    </div>    
</div>
