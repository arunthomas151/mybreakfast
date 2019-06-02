{{-- <link href="Home/css/bootstrap1.css" rel="stylesheet" /> --}}

<link href="Home/css/login-register.css" rel="stylesheet" />
<link href="css/my.css" rel="stylesheet" />
<link href="Home/css/jquery-ui.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}

<script src="Home/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="Home/js/bootstrap.js" type="text/javascript"></script>
<script src="Home/js/login-register.js" type="text/javascript"></script>
<script src="Home/js/jquery.min.js" type="text/javascript"></script>
<script src="Home/js/jquery-ui.js" type="text/javascript"></script>

<!-- RD Navbar-->
<div class="rd-navbar-wrap">
    <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
        data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
        data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="80px" data-lg-stick-up-offset="185px"
        data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
        <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="/"><img src="Home/images/b&blogo.png"
                            width="152" height="15" alt=""></a></div>
            </div>
            <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/rooms">Rooms</a></li>
                        <li><a href="/specials">Packages</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/contacts">Contacts</a></li>
                        <li><a href="javascript:void(0)" onclick="openLoginModal();">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<!doctype html>


{{-- <script src="Home/jquery.js"></script> --}}
<div class="modal login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body1">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox">
                            <h4>Login</h4><br>
                            <form method="post" action="/login" accept-charset="UTF-8">
                                @csrf
                                <input type="text" class="form-control" placeholder="Enter Your Email Address"
                                    name="email" id="email" required onchange="Validateemail1()" ;>
                                <label class="errortext" style="display:nne; color:red" id="email_1"></label><br>
                                {{-- @if ($errors->has('email'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif --}}
                                <script>
                                    function Validateemail1() {
                                        var email = document.getElementById('email');
                                        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                        if (!filter.test(email.value)) {
                                            email.value = "";
                                            $("#email_1").html('Please provide a valid email address').fadeIn().delay(
                                                4000).fadeOut();
                                            return false;
                                        }
                                        return false;
                                    }

                                </script>
                                <input id="password" class="form-control" type="password"
                                    placeholder="Enter Your Password" name="password" required>
                                {{-- @if ($errors->has('password'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif --}}
                                <label class="errortext" style="display:nne; color:red" id="emailerror"></label><br>
                                <input class="btn btn-default btn-login" type="submit" id="login" value="Login">
                            </form>
                            <br>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            <h4>Registration</h4><br>
                            <form method="post" action="/register" accept-charset="UTF-8">
                                @csrf
                                <select type="text" id="type" name="type" class="form-control" required>
                                    <option class="form-control" value="" disabled selected>Select Type Of User</option>
                                    <option class="form-control" value="2">House Owner</option>
                                    <option class="form-control" value="3">Vehicle Owner</option>
                                    <option class="form-control" value="4">Normal User</option>
                                </select>
                                <br>
                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name"
                                    id="name" required onchange="Validatename()" ;>
                                <label class="errortext" style="display:nne; color:red" id="name_l"></label><br>
                                <script>
                                    jQuery(document).ready(function () {
                                        jQuery('#name').keyup(function () {
                                            var str = jQuery('#name').val();


                                            var spart = str.split(" ");
                                            for (var i = 0; i < spart.length; i++) {
                                                var j = spart[i].charAt(0).toUpperCase();
                                                spart[i] = j + spart[i].substr(1);
                                            }
                                            jQuery('#name').val(spart.join(" "));

                                        });
                                    });

                                </script>
                                <script>
                                    function Validatename() {
                                        var val = document.getElementById('name').value;
                                        if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                            $("#name_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(
                                                4000).fadeOut();
                                            document.getElementById('name').value = "";
                                            return false;
                                        }
                                        return true;
                                    }

                                </script>
                                <input id="email1" class="form-control" type="text"
                                    placeholder="Enter Your Email Address" name="email" onchange="Validateemail();"
                                    value="{{ old('email') }}" required>
                                {{-- @if ($errors->has('email'))
                                                  <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif --}}
                                <label class="errortext" style="display:nne; color:red" id="email_2"></label><br>
                                <script>
                                    function Validateemail() {
                                        var email = document.getElementById('email1');
                                        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                        if (!filter.test(email.value)) {
                                            email.value = "";
                                            $("#email_2").html('Please provide a valid email address').fadeIn().delay(
                                                4000).fadeOut();
                                            return false;
                                        }
                                        return false;
                                    }

                                </script>
                                <input type="text" class="form-control" placeholder="Enter Your Number" name="mobile"
                                    id="mobile" required onchange="Validatep()" ;>
                                <label class="errortext" style="display:none; color:red" id="mobile_1"></label>
                                <script>
                                    function Validatep() {
                                        var val = document.getElementById('mobile').value;
                                        if (!val.match(/^[7-9][0-9]{9,9}$/)) {
                                            $("#mobile_1").html('Must. 10 and Numbers Allowed..!').fadeIn().delay(4000)
                                                .fadeOut();
                                            document.getElementById('mobile').value = "";
                                            return false;
                                        }
                                        return true;
                                    }

                                </script>
                                <br>
                                <label><b>Sex :</b></label>
                                <label><input type="radio" name="sex" id="male" required checked="true"
                                        value="Male">Male</label>&nbsp;&nbsp;
                                <label><input type="radio" name="sex" id="female" required
                                        value="Female">Female</label><br>
                                <br>
                                <input type="text" readonly placeholder="Select Your Date Of Birth" class="form-control"
                                    name="dob" id="dob" required><br>
                                <select type="text" id="state" class="form-control" required>
                                    <option class="form-control" value="" disabled selected>Select Your State</option>
                                    @foreach ($states as $state)
                                    <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <label class="errortext" style="display:none; color:red" id="state_1"></label>
                                <br>
                                <select type="text" id="district" name="district" class="form-control" required>
                                    <option class="form-control" value="" disabled selected>Select Your District
                                    </option>
                                </select>
                                <label class="errortext" style="display:none; color:red" id="district_1"></label>
                                <br>
                                <input id="password1" class="form-control" type="password"
                                    placeholder=" Enter Your Password" name="password" required
                                    onclick="Validatestate();" onchange="Validatepassword1();">
                                <label class="errortext" style="display:none; color:red" id="password_1"></label>
                                <script>		
                                    function Validatepassword1() 
                                    {
                                        var val = document.getElementById('password1').value;
                                    
                                        if (!val.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/)) 
                                        {
                                           $("#password_1").html('Password should a capital letter and small letter and a Number and atleast 6 characters...!').fadeIn().delay(4000).fadeOut();
                                            
                                                 document.getElementById('password1').value = "";
                                            return false;
                                        }
                                    
                                        return true;
                                    }
                                    
                                    </script>
                                <script>
                                    function Validatestate() {
                                        var val = document.getElementById('state').value;
                                        var val1 = document.getElementById('district').value;
                                        if (val == 0) {
                                            $("#state_1").html('Must Select a State..!').fadeIn().delay(4000).fadeOut();
                                            return false;
                                        } else {
                                            if (val1 == 0) {
                                                $("#district_1").html('Must Select a district..!').fadeIn().delay(4000)
                                                    .fadeOut();
                                                return false;
                                            }
                                        }
                                        return true;
                                    }

                                </script>
                                <br>

                                <input id="cpassword" class="form-control" type="password"
                                    placeholder=" Enter Your Password Again" name="cpassword" required
                                    onchange="Validatepassword();">
                                <script>
                                    function Validatepassword() {
                                        var pas = document.getElementById('password1').value;
                                        var cpas = document.getElementById('cpassword').value;
                                        if (pas != cpas) {
                                            $("#password_1").html('Password Miss Match..!').fadeIn().delay(4000)
                                                .fadeOut();
                                            document.getElementById('password1').value = "";
                                            document.getElementById('cpassword').value = "";
                                            return false;
                                        }
                                        return true;
                                    }

                                </script>
                                <br>
                                <input class="btn btn-default btn-register" id="register" type="submit" value="Register"
                                    name="Register">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span>Looking to
                        <a href="javascript: showRegisterForm();">create an account</a>
                        ?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>Already have an account?</span>
                    <a href="javascript: showLoginForm();">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- select district from table corresponding state table --}}
<script>
    var success = function (data) {
        // alert(data);
        $("#district").empty();
        $html = '<option class="form-control" value="" disabled selected>Select Your District</option>';
        $.each(data, function (k, v) {
            $html += '<option class="form-control" value="' + v.did + '">' + v.d_name + '</option>';
        });
        $("#district").html($html);

    }

    var selectdistrict = function () {
        $sid = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('districtq') }}",
            data: {
                'sid': $sid,
                _token: '{{csrf_token()}}'
            },
            success: success,
        });
    }

    $("#state").on("change", selectdistrict);

</script>
<script>
    var d = new Date();
    var year = d.getFullYear() - 20;
    d.setFullYear(year);
    $('#dob').datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: '1940:' + year + '',
        defaultDate: d
    });

</script>
<script>
    var success1 = function (data) {
        if (data == 1) {
            $("#email_2").html('The email address is also used').fadeIn().delay(4000).fadeOut();
            document.getElementById('email1').value = "";
        }
    }

    var username = function () {
        // e.preventDefault();
        $email = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('valemail') }}",
            data: {
                'email': $email,
                _token: '{{csrf_token()}}'
            },
            success: success1,
        });
    }

    $("#email1").on("change", username);

</script>
<script>
    var success2 = function (data) {
        if (data == 0) {
            // alert(data);
            alert("Invalid Credentials..!");
            $("#emailerror").html('Invalid Credentials..!').fadeIn().delay(4000).fadeOut();
            document.getElementById('email').value = "";
            document.getElementById('password').value = "";
        }
    }

    var checkpassword = function () {
        // e.preventDefault();
        $email = $(email).val();
        $password = $(password).val();
        // alert($password);
        $.ajax({
            type: "post",
            url: "{{ route('checkuser') }}",
            data: {
                'email': $email,
                'password': $password,
                _token: '{{csrf_token()}}'
            },
            success: success2,
        });
    }

    $("#login").on("click", checkpassword);
    $("#register").on("click", function () {
        var pas = document.getElementById('password1').value;
        var cpas = document.getElementById('cpassword').value;
        if (pas != cpas) {
            $("#password_1").html('Password Miss Match..!').fadeIn().delay(4000).fadeOut();
            document.getElementById('password1').value = "";
            document.getElementById('cpassword').value = "";
            return false;
        }
        return true;
    })

</script>
