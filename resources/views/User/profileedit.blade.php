<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Profile Edit</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.usermenu')
    </header>
    <div class="text-center">
            <br><h5 style="font-size:30px;">Edit Profile</h5>
    </div>
    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
        data-simulate-touch="false" data-slide-effect="fade">
        <div class="profile" align:="center">
            <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
                data-simulate-touch="false" data-slide-effect="fade">
                <form method="post" action="/usersaveprofile" accept-charset="UTF-8">
                    @csrf
                    <label style="color:black; font-size: 17px;">Enter Your Name :</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ $data[0]->u_name }}" required onchange="Validatename()" ;>
                    <label class="errortext" style="display:nne; color:red" id="name_l"></label>
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
                                $("#name_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000)
                            .fadeOut();
                                document.getElementById('name').value = "";
                                return false;
                            }
                            return true;
                        }

                    </script>
                    <label style="color:black; font-size: 17px;">Enter Your Address :</label>
                    <input type="text" class="form-control"
                        value="{{ $data[0]->address }}" name="address" id="address" required
                        onchange="Validateaddress()" ;>
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
                                $("#address_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000)
                                    .fadeOut();
                                document.getElementById('address').value = "";
                                return false;
                            }
                            return true;
                        }

                    </script>
                    <label style="color:black; font-size: 17px;">Email Address :</label>
                    <input id="email1" readonly="form-control" value="{{ $data[0]->u_email }}" readonly type="text"
                         name="email">
                        <label style="color:black; font-size: 17px;">Enter Your Mobile Number :</label>
                    <input type="text" class="form-control" value="{{ $data[0]->u_mob }}"
                        name="mobile" id="mobile" required onchange="Validatep()";>
                    <label class="errortext" style="display:none; color:red" id="mobile_1"></label>
                    <script>
                        function Validatep() {
                            var val = document.getElementById('mobile').value;
                            if (!val.match(/^[7-9][0-9]{9,9}$/)) {
                                $("#mobile_1").html('Must. 10 and Numbers Allowed..!').fadeIn().delay(4000).fadeOut();
                                document.getElementById('mobile').value = "";
                                return false;
                            }
                            return true;
                        }

                    </script>
                    {{-- <label><b>Sex :</b></label>
                                                <label><input type="radio" name="sex" id="male" required checked="true" value="Male">Male</label>&nbsp;&nbsp;
                                              <label><input type="radio" name="sex" id="female" required value="Female">Female</label><br>
                                      <br> --}}
                    {{-- <input type="text" readonly placeholder="Select Your Date Of Birth" class="form-control" name="dob" id="dob"  required><br> --}}
                    <label style="color:black; font-size: 17px;">Select Your State :</label>
                    <select type="text" id="state" class="form-control" required>
                        <option class="form-control" value="{{ $data[0]->sid }}" disabled selected>{{ $data[0]->s_name }}</option>
                        @foreach ($states as $state)
                        <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}</option>
                        @endforeach
                    </select>
                    <label class="errortext" style="display:none; color:red" id="state_1"></label>
                    <label style="color:black; font-size: 17px;">Select Your District  :</label>
                    <select type="text" id="district" name="district" class="form-control" required>
                        <option class="form-control" value="{{ $data[0]->did }}">{{ $data[0]->d_name }}</option>
                    </select>
                    <label class="errortext" style="display:none; color:red" id="district_1"></label>
                    <label style="color:black; font-size: 17px;">Enter Your Place :</label>
                    <input type="text" value="{{ $data[0]->pname }}" id="place" name="place"
                        class="form-control1" onchange="Validateplace();" required>
                    <label class="errortext" style="display:none; color:red" id="place_1"></label>
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
                                $("#place_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000)
                                .fadeOut();
                                document.getElementById('place').value = "";
                                return false;
                            }
                            return true;
                        }

                    </script>
                    <label style="color:black; font-size: 17px;">Enter Your Adhar Number :</label>
                    <input type="text" value="{{ $data[0]->adharno }}" class="form-control"
                        name="idno" id="idno" onclick="ValidateFileUpload();"
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
            document.getElementById('place').value = "";
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