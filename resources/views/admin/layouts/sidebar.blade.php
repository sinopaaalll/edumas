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
            @if (auth()->user()->role == 'masyarakat')  
              <li class="menu-header">Pengaduan</li>
              <li class="{{ Request::is('pengaduans/create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengaduans.create') }}"><i class="fas fa-pen"></i> 
                  <span>Tulis Pengaduan</span></a>
              </li>
              <li class="{{ Request::is('pengaduans') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengaduans.index') }}"><i class="fas fa-clipboard"></i> 
                  <span>Data Pengaduan</span></a>
              </li>
            @else
              <li class="menu-header">Pages</li>
              <li class="dropdown {{ Request::is(['kategoris*','pengaduans*']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bullhorn"></i> <span>Pengaduan</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ Request::is('pengaduans*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengaduans.index') }}">Data Pengaduan</a></li>
                  @if (auth()->user()->role == 'admin')
                    <li class="{{ Request::is('kategoris*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kategoris.index') }}">Kategori Pengaduan</a></li>
                  @endif
                </ul>
              </li>

              <li class="dropdown {{ Request::is(['users*','masyarakats*']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                  @if (auth()->user()->role == 'admin')
                    <li class="{{ Request::is('users*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('users.index') }}">Petugas</a></li>
                  @endif
                  <li class="{{ Request::is('masyarakats*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('masyarakats.index') }}">Masyarakat</a></li>
                </ul>
              </li>
              
              <li class="{{ Request::is('laporan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('laporan.index') }}"><i class="fas fa-book"></i> 
                  <span>Laporan Pengaduan</span></a>
              </li>
              @endif

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