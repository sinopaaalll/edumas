    <div class="main-sidebar sidebar-style-2 bg-dark">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
          <li class="menu-header">PENGADUAN MASYARAKAT</li>
            <a href="{{ url('home') }}"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>

          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
              <a class="nav-link active" href="{{ url('home') }}"><i class="fas fa-fire"></i> 
                <span>Dashbaord</span></a>
            </li>
            <li class="menu-header">Profil</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Profil</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">Admin</a></li>
              </ul>
            </li>
            
            <li class="menu-header">Pengaduan</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>PENGADUAN</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">PENGADUAN MASUK</a></li>
                <li><a class="nav-link" href="layout-transparent.html">PENGADUAN PROSES</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">PENGADUAN DITOLAK</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">PENGADUAN SELESAI</a></li>
              </ul>
            </li>
            <li>
            <li class="menu-header">Petugas</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>PETUGAS</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">PETUGAS MASYARAKAT</a></li>
              </ul>
            </li>
            <li class="menu-header">LAPORAN</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>LAPORAN</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">LAPORAN MASYARAKAT</a></li>
              </ul>
            </li>
              <a class="nav-link" href="blank.html"><i class="far fa-square"></i> 
                <span>Blank Page</span></a>
            </li>

            {{-- <li class="dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
              </ul>
            </li> --}}

          </ul>

        
        </aside>
      </div>