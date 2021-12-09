<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="logo-unib.png">
      </div>
      <div class="sidebar-brand-text mx-3">FEB UNIB</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(Route::is('dashboard')) active @endif">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item @if(Route::is('profile.*')) active @endif">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="fas fa-user-alt"></i>
          <span>Profile</span></a>
    </li>
    @if (Auth::user()->role === 'MAHASISWA' || Auth::user()->role === 'ALUMNI')
    <li class="nav-item @if(Route::is('pelatihan.*')) active @endif">
        <a class="nav-link" href="{{ route('pelatihan.index') }}">
            <i class="fas fa-child"></i>
            <span>Pelatihan</span></a>
    </li>
    <li class="nav-item @if(Route::is('kejuaraan.*')) active @endif">
        <a class="nav-link" href="{{ route('kejuaraan.index') }}">
            <i class="fas fa-running"></i>
            <span>Kejuaraan</span></a>
    </li>
    <li class="nav-item @if(Route::is('organisasi.*')) active @endif">
        <a class="nav-link" href="{{ route('organisasi.index') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Organisasi</span></a>
    </li>
    <li class="nav-item @if(Route::is('berita-mahasiswa')) active @endif">
        <a class="nav-link" href="{{ route('berita-mahasiswa') }}">
            <i class="fas fa-newspaper"></i>
            <span>Berita</span></a>
    </li>
    @endif
    @if (Auth::user()->role === 'MAHASISWA')
    <li class="nav-item @if(Route::is('yudisium.*')) active @endif">
        <a class="nav-link" href="{{ route('yudisium.index') }}">
          <i class="fas fa-address-card"></i>
          <span>Pendaftaran Yudisium</span></a>
    </li>
    @endif
    @if (Auth::user()->role === 'ADMIN')
    <li class="nav-item @if(Route::is('data-mahasiswa.*')) active @endif">
        <a class="nav-link" href="{{ route('data-mahasiswa.index') }}">
          <i class="fas fa-user-tag"></i>
          <span>Data Mahasiswa</span></a>
    </li>
    <li class="nav-item @if(Route::is('data-alumni.*')) active @endif">
        <a class="nav-link" href="{{ route('data-alumni.index') }}">
          <i class="fas fa-user-tie"></i>
          <span>Data Alumni</span></a>
    </li>
    <li class="nav-item @if(Route::is('data-yudisium.*')) active @endif">
        <a class="nav-link" href="{{ route('data-yudisium.index') }}">
          <i class="fas fa-address-card"></i>
          <span>Data Yudisium</span></a>
    </li>
    <li class="nav-item @if(Route::is('data-pelatihan.*')) active @endif">
        <a class="nav-link" href="{{ route('data-pelatihan.index') }}">
            <i class="fas fa-child"></i>
          <span>Data Pelatihan</span></a>
    </li>
    <li class="nav-item @if(Route::is('data-kejuaraan.*')) active @endif">
        <a class="nav-link" href="{{ route('data-kejuaraan.index') }}">
            <i class="fas fa-running"></i>
          <span>Data Kejuaraan</span></a>
    </li>
    <li class="nav-item @if(Route::is('data-organisasi.*')) active @endif">
        <a class="nav-link" href="{{ route('data-organisasi.index') }}">
            <i class="fas fa-chalkboard-teacher"></i>
          <span>Data Organisasi</span></a>
    </li>
    <li class="nav-item @if(Route::is('data-berita.*')) active @endif">
        <a class="nav-link" href="{{ route('data-berita.index') }}">
          <i class="fas fa-newspaper"></i>
          <span>Berita</span></a>
    </li>
    @endif

    <hr class="sidebar-divider">
  </ul>
  <!-- Sidebar -->
