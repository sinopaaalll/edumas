    <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            @if (auth()->user()->role === 'masyarakat')
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                  <img alt="image" src="{{ auth()->user()->image() }}" class="rounded-circle mr-1" style="width: 40px; height:40px">
                  <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                
                  <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                  </a>
                  <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                      <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                  </div>
              </li>
            @else
              <li class="nav-link nav-link-lg nav-link-user"">
                <img alt="image" src="{{ auth()->user()->image() }}" class="rounded-circle mr-1" style="width: 35px; height:35px">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
              </li>
              <li>
                <a href="{{ route('logout') }}" class="btn btn-danger">
                  Logout <i class="fas fa-arrow-right"></i>
                </a>
              </li>
            @endif
        </ul>
      </nav>