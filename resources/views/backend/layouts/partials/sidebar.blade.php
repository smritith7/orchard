<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('backend.dashboard')}}" class="brand-link">
      <img src="{{asset('backend/uploads/avatar/avatar.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- Product --}}
          <li class="nav-item">
            <a href="{{route('backend.products.index')}}" class="nav-link">
              <i class="nav-icon fa-solid fa-cart-plus"></i>
              <p>
               Add Products
              </p>
            </a>
          </li>

          {{-- Sales --}}
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-search-dollar"></i>
              <p>
              Sales
              </p>
            </a>
          </li>

           {{-- User --}}
           <li class="nav-item">
            <a href="{{route('backend.user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Users
              </p>
            </a>
          </li>

           {{-- Report --}}
           <li class="nav-item">
            <a href="{{route('backend.user.index')}}" class="nav-link">
              <i class="nav-icon fa-solid fa-table-cells"></i>
              <p>
                Report
              </p>
            </a>
          </li>

           {{-- Settings --}}
           <li class="nav-item">
            <a href="#settingsDropdown" class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="settingsDropdown">
              <i class="nav-icon fa-solid fa-gear"></i>
              <p>
                Settings
              </p>
            </a>
            <div id="settingsDropdown" class="collapse">
              <a href="" class="dropdown-item">Role Management</a>
              <a href="" class="dropdown-item">Unit Management</a>
            </div>
          </li>

           {{-- Alert --}}
           <li class="nav-item">
            <a href="{{route('backend.user.index')}}" class="nav-link">
              <i class="nav-icon fa-solid fa-bell"></i>
              <p>
                Alerts
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    /* Hover effect */
    .nav-item a:hover {
      background-color: #50646b;
      color: #fff;
    }
    .dropdown-hover:hover {
      background-color: #343a40;
      color: white;
    }
  </style>
