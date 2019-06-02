<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password</title>
    @include('User.header')
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
            @include('User.usermenu')
        </header>
        <section class="section-sm row bg-white row">
                <div class="text-center">
                        <h5 style="font-size:30px;">Change Password</h5>
                </div>
                        <div class="profile">
                            <div class="swiper-container swiper-slider swiper-white" data-loop="false"
                                data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
                                <form method="post" action="/usavepassword" accept-charset="UTF-8">
                                    @csrf
                                    <input id="opassword" class="form-control" type="password"
                                        placeholder=" Enter Current Password" name="opassword" required>
                                    <label class="errortext" style="display:none; color:red" id="password_1"></label>
                                    <br>
                                    <input id="password1" class="form-control" type="password"
                                        placeholder=" Enter New Password" name="password" required onchange="Validatepassword1();">
                                    <label class="errortext" style="display:none; color:red" id="password_2"></label>
                                    <br>
                                    <script>		
                                            function Validatepassword1() 
                                            {
                                                var val = document.getElementById('password1').value;
                                            
                                                if (!val.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/)) 
                                                {
                                                   $("#password_2").html('Password should a capital letter and small letter and a Number and atleast 6 characters...!').fadeIn().delay(4000).fadeOut();
                                                    
                                                         document.getElementById('password1').value = "";
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
                                            var pas = document.getElementById('password1').value;
                                            var cpas = document.getElementById('cpassword').value;
                                            if (pas != cpas) {
                                                $("#password_2").html('Password Miss Match..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('password1').value="";
                                                document.getElementById('cpassword').value="";
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
        </section>
        @include('user.footer')
</body>
            
  
</html>
<script>
        var success2 = function (data) {
           //  alert(data);
           $opassword = $(opassword).val();
           // alert($opassword);
           if (data == 0) {
               // alert(data);
               // alert("Invalid Credentials..!");
               $("#password_1").html('Wrong Old Password..!').fadeIn().delay(4000).fadeOut();
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
   