<aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <!-- Brand Logo -->
    <div class="brand-link" style="background-color: transparent; cursor: default;">
        <img src="{{ asset('backend/uploads/avatar/avatar.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="color: #fff;"><strong>ORCHARD</strong></span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" style="height: calc(100vh - 60px); overflow: hidden;">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('backend.dashboard') }}" class="nav-link {{ request()->is('backend/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-gauge"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- Product --}}
                <li class="nav-item">
                    <a href="{{ route('backend.products.index') }}" class="nav-link {{ request()->is('backend/products*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-cart-plus"></i>
                        <p>Add Products</p>
                    </a>
                </li>
                {{-- Sales --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search-dollar"></i>
                        <p>Sales</p>
                    </a>
                </li>
                {{-- User --}}
                <li class="nav-item">
                    <a href="{{ route('backend.user.index') }}" class="nav-link {{ request()->is('backend/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Users</p>
                    </a>
                </li>
                {{-- Report --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-table-cells"></i>
                        <p>Report</p>
                    </a>
                </li>
                {{-- Settings --}}
                <li class="nav-item">
                    <a href="#settingsDropdown" class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="settingsDropdown">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>Settings</p>
                    </a>
                    <div id="settingsDropdown" class="collapse">
                        <a href="{{ route('backend.roles.user-role') }}" class="dropdown-item">Role Management</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</aside>
