<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('image/key.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block font">AdminLTE 3</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column font" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        
                        <li  class=" nav-item   ">

                            <a href="{{ route('admin.user.create') }}"
                                class="nav-link   {{ request()->is('admin/user/create') ? 'active '    : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User-Create</p>
                            </a>
                            
                        </li>

                        <li class="nav-item ">

                            <a href="{{ route('admin.product.create') }}"
                                class="nav-link {{ request()->is('admin/product/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products-Create</p>
                            </a>


                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}"
                                class="nav-link {{ request()->is('admin/category/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category-Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

        
    </div>

</aside>
