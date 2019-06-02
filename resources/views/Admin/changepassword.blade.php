{{-- <!DOCTYPE html> --}}
<html>

<head>
    <title>Change Password</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid">
                    <div class="text-center"><br>
                        <h5 style="font-size:30px;">Change Password</h5>
                    </div>
                        <div class="profile">
                            <div class="swiper-container swiper-slider swiper-white" data-loop="false"
                                data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
                                <form method="post" action="/asavepassword" accept-charset="UTF-8">
                                    @csrf
                                    <input id="opassword" class="form-control" type="password"
                                        placeholder=" Enter Current Password" name="opassword" required>
                                    <label class="errortext" style="display:none; color:red" id="opassword_1"></label>
                                    <br>
                                    <input id="npassword" class="form-control" type="password"
                                        placeholder=" Enter New Password" name="npassword" required onchange="Validatepassword1();">
                                    <label class="errortext" style="display:none; color:red" id="npassword_1"></label>
                                    <br>
                                    <script>		
                                            function Validatepassword1() 
                                            {
                                                var val = document.getElementById('npassword').value;
                                            
                                                if (!val.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/)) 
                                                {
                                                   $("#npassword_1").html('Password should a capital letter and small letter and a Number and atleast 6 characters...!').fadeIn().delay(4000).fadeOut();
                                                    
                                                         document.getElementById('npassword').value = "";
                                                    return false;
                                                }
                                            
                                                return true;
                                            }
                                            
                                            </script>
                                    <input id="cpassword" class="form-control" type="password"
                                        placeholder=" Enter Your Password Again" name="cpassword" required
                                        onchange="Validatepassword();">
                                    <script>
                                        function Validatepassword() {
                                            var pas = document.getElementById('npassword').value;
                                            var cpas = document.getElementById('cpassword').value;
                                            if (pas != cpas) {
                                                $("#npassword_1").html('Password Miss Match..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('npassword').value = "";
                                                document.getElementById('cpassword').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <br>
                                    <input class="btn1" type="submit" id="changepss" value="save" name="save">
                                </form>
                            </div>
                        </div>
                    </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Admin.footer')
</body>

</html>
<script>
     var success2 = function (data) {
        //  alert(data);
        if (data == 0) {
            // alert(data);
            // alert("Invalid Credentials..!");
            $("#opassword_1").html('Wrong Old Password..!').fadeIn().delay(4000).fadeOut();
            document.getElementById('opassword').value = "";
        }
    }

    var checkpassword = function () {
        // e.preventDefault();
        $opassword = $(this).val();
        // alert($opassword);
        $.ajax({
            type: "post",
            url: "{{ route('ckeckpassword') }}",
            data: {
                'opassword': $opassword,
                _token: '{{csrf_token()}}'
            },
            success: success2,
        });
    }

    $("#opassword").on("change", checkpassword);
</script>
