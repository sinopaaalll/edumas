<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6 col-lg-2">
          <h1 class="mb-0 site-logo">
            <a href="{{ route('home') }}" class="mb-0">E-Dumas</a>
          </h1>
        </div>

        <div class="col-12 col-md-10 d-none d-lg-block">
          <nav class="site-navigation position-relative text-right" role="navigation" >
            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li class="{{ Request::is('/') ? "active" : "" }}">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
              </li>
              <li class="{{ Request::is('pengaduan') ? "active" : "" }}"><a href="{{ route('pengaduan') }}" class="nav-link">Pengaduan</a></li>
              <li class="{{ Request::is('team') ? "active" : "" }}"><a href="{{ route('team') }}" class="nav-link">Team</a></li>
              <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>

              <li>
                <a href="{{ route('login') }}" class="nav-link btn btn-outline-danger">Log In</a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px" >
          <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>
      </div>
    </div>
  </header>