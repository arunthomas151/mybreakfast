<link href="css/my.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}

<script src="Home/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="Home/js/bootstrap.js" type="text/javascript"></script>
<script src="Home/js/login-register.js" type="text/javascript"></script>
<div class="page-wrapper">
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar2">
        <div class="logo">
            <a href="#">
                <img src="Dashboard/images/" alt="ADMIN" />
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar1">
            <div class="account2">
                <div class="image img-cir img-120">
                    <img src="Dashboard/images/admin.jpg" />
                </div>
                <h4 class="name">ADMIN</h4><br>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
                        <a href="/admin">
                            <i class="fas fa-chart-bar"></i>Home</a>
                    </li>
                    <li>
                        <a href="/userlist">
                            <i class="fas fa-shopping-basket"></i>Users List</a>
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
                                <a href="/ahouse">
                                    <i class="fas fa-tachometer-alt"></i>Houses</a>
                            </li>
                            <li>
                                <a href="/vehicles">
                                    <i class="fas fa-tachometer-alt"></i>Vehicles</a>
                            </li>
                            <li>
                                <a href="/packages">
                                    <i class="fas fa-tachometer-alt"></i>Packages</a>
                            </li>
                            <li>
                                <a href="/breakfasts">
                                    <i class="fas fa-tachometer-alt"></i>Breakfasts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-trophy"></i>Locations
                            <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="/state">
                                    <i class="fas fa-table"></i>States</a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#addstate">
                                    <i class="fas fa-table"></i>Add State</a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#adddistrict">
                                    <i class="fas fa-table"></i>Add District</a>
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
                                        <a href="/adprofile">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="/acpassword">
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
                        <img src="Dashboard/images/admin.jpg" />
                    </div>
                    <h4 class="name">Ghost Ryder</h4><br>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
                            <a href="/admin">
                                <i class="fas fa-chart-bar"></i>Home</a>
                        </li>
                        <li>
                            <a href="/userlist">
                                <i class="fas fa-shopping-basket"></i>Users List</a>
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
                                    <a href="/ahouse">
                                        <i class="fas fa-tachometer-alt"></i>House</a>
                                </li>
                                <li>
                                    <a href="/vehicles">
                                        <i class="fas fa-tachometer-alt"></i>Vehicles</a>
                                </li>
                                <li>
                                    <a href="/packages">
                                        <i class="fas fa-tachometer-alt"></i>Packages</a>
                                </li>
                                <li>
                                    <a href="/breakfasts">
                                        <i class="fas fa-tachometer-alt"></i>Breakfasts</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Locations
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/state">
                                        <i class="fas fa-table"></i>States</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#addstate">
                                        <i class="fas fa-table"></i>Add State</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#adddistrict">
                                        <i class="fas fa-table"></i>Add District</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END HEADER DESKTOP-->

        <!-- BREADCRUMB-->
        <section class="m-t-75 container-fluid">

        </section>
        <!-- END BREADCRUMB-->
        <div class="modal login" id="addstate">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="text-center">
                            <h5 style="font-size:30px;">Add State</h5><br>
                        </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="content">
                                <div class="form loginBox1">
                                    <form method="post" action="/savestate" accept-charset="UTF-8"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="state" id="state" class="form-control"
                                            placeholder="Enter State Name" required onchange="Validatename();">
                                        <label class="errortext" style="display:nne; color:red"
                                            id="state_l"></label><br>
                                        <script>
                                            jQuery(document).ready(function () {
                                                jQuery('#state').keyup(function () {
                                                    var str = jQuery('#state').val();


                                                    var spart = str.split(" ");
                                                    for (var i = 0; i < spart.length; i++) {
                                                        var j = spart[i].charAt(0).toUpperCase();
                                                        spart[i] = j + spart[i].substr(1);
                                                    }
                                                    jQuery('#state').val(spart.join(" "));

                                                });
                                            });

                                        </script>
                                        <script>
                                            function Validatename() {
                                                var val = document.getElementById('state').value;
                                                if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                    $("#state_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                                        .delay(4000).fadeOut();
                                                    document.getElementById('state').value = "";
                                                    return false;
                                                }
                                                return true;
                                            }

                                        </script>
                                        <input class="btn1" type="submit" value="save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal login" id="adddistrict">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="text-center">
                            <h5 style="font-size:30px;">Add District</h5><br>
                        </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="content">
                                <div class="form loginBox1">
                                    <form method="post" action="/savedistrict" accept-charset="UTF-8"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <select type="text" id="state1" name="state1" class="form-control" required>
                                            <option class="form-control" value="" disabled selected >Select Your State</option>
                                            @foreach ($states as $state)
                                            <option class="form-control" value="{{ $state['sid'] }}">
                                                {{ $state['s_name'] }}</option>
                                            @endforeach
                                        </select>
                                        <label class="errortext" style="display:none; color:red" id="state_1"></label>
                                        <br>
                                        <input type="text" name="district" id="district" class="form-control"
                                            onclick="validatestate();" placeholder="Enter State Name" required
                                            onchange="Validatename();">
                                        <label class="errortext" style="display:nne; color:red"
                                            id="district_l"></label><br>
                                        <script>
                                            jQuery(document).ready(function () {
                                                jQuery('#district').keyup(function () {
                                                    var str = jQuery('#district').val();


                                                    var spart = str.split(" ");
                                                    for (var i = 0; i < spart.length; i++) {
                                                        var j = spart[i].charAt(0).toUpperCase();
                                                        spart[i] = j + spart[i].substr(1);
                                                    }
                                                    jQuery('#district').val(spart.join(" "));

                                                });
                                            });

                                        </script>
                                        <script>
                                            function Validatename() {
                                                var val = document.getElementById('district').value;
                                                if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                    $("#district_l").html('Min. 3 and Only Alphabets Allowed..!')
                                                        .fadeIn().delay(4000).fadeOut();
                                                    document.getElementById('district').value = "";
                                                    return false;
                                                }
                                                return true;
                                            }

                                            function validatestate() {
                                                var val1 = document.getElementById('state1').value;
                                                // alert(val1);
                                                if (val1 == 0) {
                                                    $("#district_l").html('Must Select A Satate..!').fadeIn().delay(
                                                        4000).fadeOut();
                                                    document.getElementById('district').value = "";
                                                }
                                            }

                                        </script>
                                        <input class="btn1" type="submit" value="save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var successs = function (data) {
                if (data == 1) {
                    //   alert(data);
                    $("#state_l").html('The name is also used').fadeIn().delay(4000).fadeOut();
                    document.getElementById('state').value = "";
                }
            }

            var checkstate = function () {
                // e.preventDefault();
                $s_name = $(this).val();
                $.ajax({
                    type: "post",
                    url: "{{ route('checkstate') }}",
                    data: {
                        's_name': $s_name,
                        _token: '{{csrf_token()}}'
                    },
                    success: successs,
                });
            }

            $("#state").on("keyup", checkstate);

        </script>
        <script>
            var success1 = function (data) {
                if (data == 1) {
                    //   alert(data);
                    $("#district_l").html('The name is also used').fadeIn().delay(4000).fadeOut();
                    document.getElementById('district').value = "";
                }
            }

            var checkdistrict = function () {
                // e.preventDefault();
                $sid = document.getElementById('state1').value;
                $d_name = $(this).val();
                // alert(val1);
                if ($sid == 0) {
                    $("#district_l").html('Must Select A Satate..!').fadeIn().delay(4000).fadeOut();
                    document.getElementById('district').value = "";
                }
                // alert($sid);
                $.ajax({
                    type: "post",
                    url: "{{ route('checkdistrict') }}",
                    data: {
                        'sid': $sid,
                        'd_name': $d_name,
                        _token: '{{csrf_token()}}'
                    },
                    success: success1,
                });
            }

            $("#district").on("keyup", checkdistrict);

        </script>
