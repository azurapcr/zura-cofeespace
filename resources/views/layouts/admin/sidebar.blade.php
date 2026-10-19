
<aside class="sidebar-wrapper" id="sidebar">
    <div class="sidebar-brand p-4">
        <a href="{{ url('/admin/dashboard') }}" class="brand-title">
            <span class="brand-icon">☕</span>
            <span>Coffee Space</span>
        </a>
        <p class="brand-subtitle"></p>
    </div>

    <nav class="sidebar-menu p-3">
        <small class="menu-label">MENU UTAMA</small>

        <a href="{{ url('/admin/dashboard') }}"
           class="sidebar-menu-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/menu') }}"
           class="sidebar-menu-link {{ request()->is('menu*') ? 'active' : '' }}">
            <i class="bi bi-cup-hot"></i>
            <span>Data Menu</span>
        </a>

        <a href="{{ url('/pelanggan') }}"
           class="sidebar-menu-link {{ request()->is('pelanggan*') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span>Data Pelanggan</span>
        </a>

        <a href="{{ url('/pesanan') }}"
           class="sidebar-menu-link {{ request()->is('pesanan*') ? 'active' : '' }}">
            <i class="bi bi-receipt"></i>
            <span>Data Pesanan</span>
        </a>

        <a href="{{ route('users.index') }}"
           class="sidebar-menu-link {{ request()->is('users*') ? 'active' : '' }}">
            <i class="bi bi-person-gear"></i>
            <span>Data User</span>
        </a>
    </nav>
</aside>
