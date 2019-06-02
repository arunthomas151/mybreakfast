{{-- <link href="Home/css/bootstrap1.css" rel="stylesheet" /> --}}

<link href="Home/css/login-register.css" rel="stylesheet" />
<link href="css/my.css" rel="stylesheet" />

{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}

<script src="Home/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="Home/js/bootstrap.js" type="text/javascript"></script>
<script src="Home/js/login-register.js" type="text/javascript"></script>
<style>
    .rsa{
        color: #00deff80;
        text-align: center;
        /* text-decoration: overline; */
        text-transform: uppercase;
        font-family: helvetica;
        font-size: 13px;
    }
</style>
<!-- RD Navbar-->
<div class="rd-navbar-wrap">
    <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
        data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
        data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="80px" data-lg-stick-up-offset="185px"
        data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
        {{-- <div style="color: #00deff80;
        text-align: center;
        /* text-decoration: overline; */
        text-transform: uppercase;
        font-family: helvetica;
        font-size: 13px;"><br>
            {{ $data[0]->u_name}}</b>
        </div> --}}

        <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="/i"><img src="Home/images/b&blogo.png"
                            width="152" height="15" alt=""></a></div>
            </div>
            <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li><a href="/user">Home</a></li>
                        <li><a href="/urooms">Rooms</a></li>
                        <li><a href="/package">Packages</a></li>
                        <li><a href="/ubooking">Bookings</a></li>
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
                                <a href="/uprofile">{{ $data[0]->u_name }}</a>
                            {{-- <div class="col-md-12 col-lg-12 " align="center">
                                <a href="/uprofile" class="imag"><img
                                        alt="User Pic" src="images/user/{{ $data[0]->image }}"
                            class="img-circle img-responsive"></a>  --}}
                                {{-- <label class="rsa">{{ $data[0]->u_name }}</label> --}}
                        {{-- </div> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
