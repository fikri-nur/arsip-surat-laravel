<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-solid fa-magnifying-glass-chart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Arsip Surat</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item -->
    <li class="nav-item {{ request()->routeIs('surat.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('surat.index') }}">
            <i class="fas fa-fw fa-solid fa-database"></i>
            <span>Arsip Surat</span></a>
    </li>

    <li class="nav-item {{ request()->routeIs('surat.kategori') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('surat.kategori') }}">
            <i class="fas fa-fw fa-solid fa-database"></i>
            <span>Kategori Surat</span></a>
    </li>

    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-solid fa-database"></i>
            <span>About</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
