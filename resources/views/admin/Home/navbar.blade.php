<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3 ">
        <div class="input-group input-group-sm align-items-center ">
            <input class="form-control form-control-navbar " type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <span class="btn  border-5 mx-1 "type="submit">
                    <button class="btn border"><i class="fa-solid fa-magnifying-glass"
                            style="color: #f7fdf7;"></i></button>
                </span>
            </div>

        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



        <div class="dropdown">
            @if (Auth::check())
                <input type="checkbox" id="dropdown">

                <label class="dropdown__face" for="dropdown">
                    <div class="dropdown__text">{{ Auth::user()->email }}</div>

                    <div class="dropdown__arrow"></div>
                </label>

                <ul class="dropdown__items" >
                    
                    <li><a class="dropdown-item" href="{{route('admin.user.edit',['id'=>Auth::user()->id])}}"><i class="fa-solid fa-user-gear fa-lg mr-2"></i>Tài
                            Khoản</a></li><br>
                        
                    {{-- <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gears fa-lg mr-2"></i>Cài đặt</a>
                    </li> --}}
                    <div class="dropdown-divider "></div>
                    <li><a class="dropdown-item" href="/admin/logout">
                            <i class="fa-solid fa-right-from-bracket fa-lg mr-2"></i>Thoát</a></li>

                </ul>
            @endif
        </div>

        <svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7"
                    result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>
    </ul>



</nav>
