    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('dashboard') }}">E-Dumas</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('dashboard') }}">ED</a>
          </div>

          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
              <a class="nav-link active" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> 
                <span>Dashbaord</span></a>
            </li>
            
            <li class="menu-header">Pages</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bullhorn"></i> <span>Pengaduan</span></a>
              <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="{{ route('kategoris.index')}}">Kategori Pengaduan</a></li>
                <li class=""><a class="nav-link" href="layout-default.html">Pengaduan</a></li>
              </ul>
            </li>

            <li class="dropdown {{ Request::is(['users*','masyarakats*']) ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Request::is('users*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('users.index') }}">Petugas</a></li>
                <li class="{{ Request::is('masyarakats*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('masyarakats.index') }}">Masyarakat</a></li>
              </ul>
            </li>
            
            <li>
              <a class="nav-link" href="blank.html"><i class="fas fa-book"></i> 
                <span>Laporan Pengaduan</span></a>
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