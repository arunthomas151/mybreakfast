{{-- <link href="Home/css/bootstrap1.css" rel="stylesheet" /> --}}

<link href="Home/css/login-register.css" rel="stylesheet" />
<link href="css/my.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}

<script src="Home/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="Home/js/bootstrap.js" type="text/javascript"></script>
<script src="Home/js/login-register.js" type="text/javascript"></script>

<!-- RD Navbar-->
<div class="rd-navbar-wrap">
    <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
        data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
        data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="80px" data-lg-stick-up-offset="185px"
        data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
        <div style="color:cornsilk; text-align:center"><br>
            Unknown</b>
        </div>
        <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="/user"><img src="Home/images/b&blogo.png"
                            width="152" height="15" alt=""></a></div>
            </div>
            <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li><a href="/user">Home</a></li>
                        <li><a href="/user">Rooms</a></li>
                        <li><a href="/user">Packages</a></li>
                        <li><a href="/user">Bookings</a></li>
                        <li>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <div class="col-md-12 col-lg-12 " align="center"><a href="/user" class="imag"><img
                                        alt="User Pic" src="images/admin.jpg" class="img-circle img-responsive"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
