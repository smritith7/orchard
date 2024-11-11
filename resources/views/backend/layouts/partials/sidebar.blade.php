<aside class="main-sidebar sidebar-dark-secondary elevation-4" id="sidebar" style="position: fixed">
    <!-- Brand Logo -->
    <div class="brand-link" style="background-color: transparent; cursor: default;">
        <img src="{{ asset('backend/uploads/avatar/avatar.jpg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="color: #fff;"><strong>ORCHARD</strong></span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" style="height: calc(100vh - 60px); overflow-y: auto;">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('backend.dashboard') }}"
                        class="nav-link {{ request()->routeIs('backend.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-gauge"></i>
                        <p class="nav-text" style="font-size: 1.1rem;">Dashboard</p>
                    </a>
                </li>

                {{-- Users --}}
                <li class="nav-item">
                    <a class="nav-link  href="#"
                        data-toggle="collapse" data-target="#dropdown1" aria-expanded="{{ request()->routeIs('backend.user.*') ? 'true' : 'false' }}" aria-controls="dropdown1">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p class="nav-text" style="font-size: 1.1rem;">Users</p>
                    </a>
                    <div class="collapse {{ request()->routeIs('backend.user.*') ? 'show' : '' }}" id="dropdown1">
                        <ul class="nav flex-column pl-3">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('backend.user.index') ? 'active' : '' }}"
                                    href="{{ route('backend.user.index') }}">Admin User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('backend.user.employee') ? 'active' : '' }}"
                                    href="#">Employees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('backend.user.customer') ? 'active' : '' }}"
                                    href="#">Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>



                {{-- Products --}}
                <li class="nav-item">
                    <a href="{{ route('backend.products.index') }}"
                        class="nav-link {{ request()->routeIs('backend.products.*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-cart-plus"></i>
                        <p class="nav-text" style="font-size: 1.1rem;">Products</p>
                    </a>
                </li>

                {{-- Sales --}}
                <li class="nav-item">
                    <a href="{{ route('backend.sales.index') }}"
                        class="nav-link {{ request()->routeIs('backend.sales.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-search-dollar"></i>
                        <p class="nav-text" style="font-size: 1.1rem;">Sales</p>
                    </a>
                </li>

                {{-- Roles --}}
                <li class="nav-item">
                    <a href="{{ route('backend.roles.user-role') }}"
                        class="nav-link {{ request()->routeIs('backend.roles.*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-wrench"></i>
                        <p class="nav-text" style="font-size: 1.1rem;">Roles</p>
                    </a>
                </li>

                {{-- Report --}}
                <li class="nav-item">
                    <a href="{{route('backend.reports.index')}}" class="nav-link {{ request()->routeIs('backend.reports*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-table-cells"></i>
                        <p class="nav-text" style="font-size: 1.1rem;">Report</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
