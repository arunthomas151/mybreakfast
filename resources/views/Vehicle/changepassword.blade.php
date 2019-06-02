<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password</title>
    @include('Vehicle.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Vehicle.vehiclemenu')
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile">
                            <h5>Change Password</h5><br>
                            <div class="swiper-container swiper-slider swiper-white" data-loop="false"
                                data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
                                <form method="post" action="/vsavepassword" accept-charset="UTF-8">
                                    @csrf
                                    <input id="opassword" class="form-control" type="password"
                                        placeholder=" Enter Current Password" name="opassword" required
                                        onchange="Validatestate();">
                                    <label class="errortext" style="display:none; color:red" id="password_1"></label>
                                    <br>
                                    <input id="password1" class="form-control" type="password"
                                        placeholder=" Enter New Password" name="password" required
                                        onchange="Validatestate();">
                                    <label class="errortext" style="display:none; color:red" id="password_1"></label>
                                    <br>
                                    <input id="cpassword" class="form-control" type="password"
                                        placeholder=" Enter Your Password Again" name="cpassword" required
                                        onchange="Validatepassword();">
                                    <script>
                                        function Validatepassword() {
                                            var pas = document.getElementById('password1').value;
                                            var cpas = document.getElementById('cpassword').value;
                                            if (pas != cpas) {
                                                $("#password_1").html('Password Miss Match..!').fadeIn();
                                                return false;
                                            }
                                            if (pas == cpas) {
                                                $("#password_1").html('Password Miss Match..!').fadeOut();
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <br>
                                    <input class="btn1" type="submit" value="save" name="save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Vehicle.footer')
</body>

</html>
