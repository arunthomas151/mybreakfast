<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Profile Completion</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.profilemenu')
    </header>
    <div class="text-center">
           <br> <h5 style="font-size:30px;">Profile</h5>
    </div>
    <div class="profile" align:="center">
        <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
            data-simulate-touch="false" data-slide-effect="fade">
            <form method="post" action="/usaveprofile" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" placeholder="Enter Your Address" name="address" id="address"
                    required onchange="Validateaddress()" ;>
                <label class="errortext" style="display:nne; color:red" id="address_l"></label>
                <script>
                        jQuery(document).ready(function () {
                            jQuery('#address').keyup(function () {
                                var str = jQuery('#address').val();
            
            
                                var spart = str.split(" ");
                                for (var i = 0; i < spart.length; i++) {
                                    var j = spart[i].charAt(0).toUpperCase();
                                    spart[i] = j + spart[i].substr(1);
                                }
                                jQuery('#address').val(spart.join(" "));
            
                            });
                        });
            
                    </script>
                <script>
                    function Validateaddress() {
                        var val = document.getElementById('address').value;
                        if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                            $("#address_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                            document.getElementById('address').value = "";
                            return false;
                        }
                        return true;
                    }

                </script>
                <label style="color:black; font-size: 17px;">Upload Your Image</label>
                <input type="file" class="form-control" onchange="ValidateFileUpload();" id="pic" accept=".png, .jpg, .jpeg,.JPG" name="pic" required>
                <label class="errortext" style="display:none; color:red" id="pic_1"></label><br>
                <script>
                        function ValidateFileUpload() {
                            var fuData = document.getElementById('pic');
                            var FileUploadPath = fuData.value;
        
                            //To check if user upload any file
                            if (FileUploadPath == '') {
                                $("#pic_1").html('Select An Image..!').fadeIn().delay(4000).fadeOut();
        
                            } else {
                                var Extension = FileUploadPath.substring(
                                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
        
                                //The file uploaded is an image
        
                                if (Extension == "png" || Extension == "JPG" || Extension == "jpeg" ||
                                    Extension == "jpg") {}
        
        
                                //The file upload is NOT an image
                                else {
                                    $("#pic_1").html(
                                            'Photo only allows file types of PNG, JPG, JPEG...!')
                                        .fadeIn().delay(4000).fadeOut();
                                    document.getElementById('pic').value = "";
        
                                }
                            }
                        }
        
                    </script>
                <input type="text" id="place" name="place" placeholder="Enter Your Place" class="form-control1"
                    onchange="Validateplace();" required>
                <label class="errortext" style="display:none; color:red" id="place_1"></label><br>
                <script>
                        jQuery(document).ready(function () {
                            jQuery('#place').keyup(function () {
                                var str = jQuery('#place').val();
            
            
                                var spart = str.split(" ");
                                for (var i = 0; i < spart.length; i++) {
                                    var j = spart[i].charAt(0).toUpperCase();
                                    spart[i] = j + spart[i].substr(1);
                                }
                                jQuery('#place').val(spart.join(" "));
            
                            });
                        });
            
                    </script>
                <script>
                    function Validateplace() {
                        var val = document.getElementById('place').value;
                        if (!val.match(/^[A-Z][A-Za-z" "]{3,}$/)) {
                            $("#place_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                            document.getElementById('place').value = "";
                            return false;
                        }
                        return true;
                    }

                </script>
                <br>
                <input type="text" class="form-control" placeholder="Enter Your Adhar Number" name="idno" id="idno"
                    required onchange="Validateid()" ;>
                <label class="errortext" style="display:none; color:red" id="idno_1"></label>
                <script>
                    function Validateid() {
                        var val = document.getElementById('idno').value;
                        if (!val.match(/^[0-9][0-9]{11,11}$/)) {
                            $("#idno_1").html('Must. 12 and Numbers Allowed..!').fadeIn().delay(4000).fadeOut();
                            document.getElementById('idno').value = "";
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


    @include('User.footer')
</body>

</html>
