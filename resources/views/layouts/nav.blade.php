<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">HotelBooking</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a href="#hero" class="active">Home<br /></a>
                </li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Rooms</a></li>
                <li><a href="#events">Services</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @auth
            <a class="btn-getstarted" href="{{ route('login') }}">Logout</a>
        @else
            <a class="btn-getstarted" href="{{ route('login') }}">Log in</a>
        @endauth
    </div>
</header>

<main class="main">
