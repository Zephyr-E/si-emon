<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ url('templates/backend') }}/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Si Emon</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    @if (Auth::user()->rule == 'Admin')
    <li
        class="nav-item {{ in_array(Route::currentRouteName(), ['program.index', 'program.create', 'program.edit']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('program.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Program</span>
        </a>
    </li>
    <li class="nav-item {{ in_array(Route::currentRouteName(), ['kegiatan.index', 'kegiatan.create' , 'kegiatan.edit'
        ]) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kegiatan.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Kegiatan</span>
        </a>
    </li>
    <li
        class="nav-item {{ in_array(Route::currentRouteName(), ['user.index', 'user.create', 'user.edit']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengguna</span>
        </a>
    </li>
    @endif
    <li
        class="nav-item {{ in_array(Route::currentRouteName(), ['realisasi.index', 'realisasi.create', 'realisasi.edit']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('realisasi.index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Realisasi</span>
        </a>
    </li>
    @if (Auth::user()->rule == 'Admin')
    <li
        class="nav-item {{ in_array(Route::currentRouteName(), ['report']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('report') }}">
            <i class="fas fa-fw fa-print"></i>
            <span>Report</span>
        </a>
    </li>
    @endif
</ul>
<!-- Sidebar -->