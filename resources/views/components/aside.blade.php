
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset("dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
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
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="{{ url("admin") }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("admin/about-us") }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>About us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("admin/brands") }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Brands</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("admin/categories") }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("admin/products") }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Products</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ url("admin/books") }}" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-circle text-warning"></i>--}}
{{--                        <p>Book</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                    <li class="nav-item">
                        <a href="{{ url("admin/feedbacks") }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Feedback</p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
