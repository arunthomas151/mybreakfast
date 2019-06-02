{{-- <link href="Home/css/bootstrap1.css" rel="stylesheet" /> --}}

<link href="Home/css/login-register.css" rel="stylesheet" />
<link href="css/my.css" rel="stylesheet" />
<link href="Home/css/jquery-ui.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}

<script src="Home/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="Home/js/bootstrap.js" type="text/javascript"></script>
<script src="Home/js/login-register.js" type="text/javascript"></script>

<div class="page-wrapper">
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar2">
        <div class="logo">
            <a href="#">
                {{-- <img src="Dashboard/images/" alt="ADMIN" /> --}}
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar1">
            <div class="account2">
                <div class="image img-cir img-120">
                    <img src="images/user/{{ $data[0]->image }}" />
                </div>
                <h4 class="name" style="color:#af9e6a;">{{ $data[0]->u_name }}</h4>
              
                <a class="fas" style="font-size: 20px;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                    {{ __('Sign Out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">
                    <li>
                        <a href="/owner">
                            <i class="fas fa-chart-bar"></i>Home</a>
                    </li>
                    <li>
                        <a href="/bookings">
                            <i class="fas fa-shopping-basket"></i>Bookings</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-trophy"></i>Add New
                            <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="/arooms">
                                    <i class="fas fa-tachometer-alt"></i>House</a>
                            </li>
                            <li>
                                <a href="/avehicles">
                                    <i class="fas fa-tachometer-alt"></i>Vehicle</a>
                            </li>
                            <li>
                                <a href="/apackages">
                                    <i class="fas fa-tachometer-alt"></i>Package</a>
                            </li>
                            <li>
                                <a href="/abreakfasts">
                                    <i class="fas fa-tachometer-alt"></i>Breakfast</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-trophy"></i>View More
                            <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="/vhouse">
                                    <i class="fas fa-tachometer-alt"></i>Houses</a>
                            </li>
                            <li>
                                <a href="/vvehicles">
                                    <i class="fas fa-tachometer-alt"></i>Vehicles</a>
                            </li>
                            <li>
                                <a href="/vpackages">
                                    <i class="fas fa-tachometer-alt"></i>Packages</a>
                            </li>
                            <li>
                                <a href="/vbreakfasts">
                                    <i class="fas fa-tachometer-alt"></i>Breakfasts</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container2">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop2">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap2">
                        <div class="logo d-block d-lg-none">
                            <a href="#">
                                <img src="" alt="ADMIN" />
                            </a>
                        </div>
                        <div class="header-button2">
                            <div class="header-button-item js-item-menu">
                                <i class="zmdi zmdi-search"></i>
                                <div class="search-dropdown js-dropdown">
                                    <form action="">
                                        <input class="au-input au-input--full au-input--h65" type="text"
                                            placeholder="Search for datas &amp; reports..." />
                                        <span class="search-dropdown__icon">
                                            <i class="zmdi zmdi-search"></i>
                                        </span>
                                    </form>
                                </div>
                            </div>
                            <div class="header-button-item mr-0 js-sidebar-btn">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                            <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="/vprofile">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="/cpassword">
                                            <i class="zmdi zmdi-settings"></i>Change Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->
        <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
            <div class="logo">
                <a href="#">
                    <img src="Dashboard/images/" alt="ADMIN" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="images/user/{{ $data[0]->image }}" />
                    </div>
                    <h4 class="name" style="color:#af9e6a;">{{ $data[0]->u_name }}</h4>
                    <a class="fas" style="font-size: 20px;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Sign Out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="/owner">
                                <i class="fas fa-chart-bar"></i>Home</a>
                        </li>
                        <li>
                            <a href="/bookings">
                                <i class="fas fa-shopping-basket"></i>Bookings</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Add New
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/arooms">
                                        <i class="fas fa-tachometer-alt"></i>House</a>
                                </li>
                                <li>
                                    <a href="/avehicles">
                                        <i class="fas fa-tachometer-alt"></i>Vehicle</a>
                                </li>
                                <li>
                                    <a href="/apackages">
                                        <i class="fas fa-tachometer-alt"></i>Package</a>
                                </li>
                                <li>
                                    <a href="/abreakfasts">
                                        <i class="fas fa-tachometer-alt"></i>Breakfast</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>View More
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/vhouse">
                                        <i class="fas fa-tachometer-alt"></i>Houses</a>
                                </li>
                                <li>
                                    <a href="/vvehicles">
                                        <i class="fas fa-tachometer-alt"></i>Vehicles</a>
                                </li>
                                <li>
                                    <a href="/vpackages">
                                        <i class="fas fa-tachometer-alt"></i>Packages</a>
                                </li>
                                <li>
                                    <a href="/vbreakfasts">
                                        <i class="fas fa-tachometer-alt"></i>Breakfasts</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END HEADER DESKTOP-->
        <!-- BREADCRUMB-->
        <section class="au-breadcrumb">
            
        </section>
        <!-- END BREADCRUMB-->
