<nav class="main-header navbar navbar-expand navbar-white fixed-top" id="navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto d-flex align-items-center">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="navbar-search">
                <form class="form-inline">
                    <div class="input-group">
                        <input id="search-input" type="search" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Search" style="width: 200px; border-top-right-radius: 0; border-bottom-right-radius: 0;" autocomplete="off">
                        <button id="search-button" type="submit" class="btn btn-outline-light search-btn" style="border: 1px solid #ced4da; background-color: transparent; height: 38px; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" style="padding: 10px;">
                <i class="far fa-bell" style="font-size: 20px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item"></a>
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item"></a>
            </div>
        </li>
        <li class="nav-item dropdown" style="margin-top: -15px;">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <img src="{{ asset('backend/uploads/avatar/avatar.jpg') }}" class="img-circle" alt="User Image" style="width: 40px; height: 40px; box-shadow: none;">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href=""><i class="fa-solid fa-gear"></i>  Setting</a>
                <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i>  Logout</a>
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</nav>




