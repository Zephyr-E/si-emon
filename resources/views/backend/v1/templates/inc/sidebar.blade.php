<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ url('templates/backend') }}/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Si Emon</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('program.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Program</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kegiatan.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Kegiatan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Pengguna</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('realisasi.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Realisasi</span>
        </a>
    </li>
</ul>
<!-- Sidebar -->