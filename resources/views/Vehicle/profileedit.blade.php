<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
    @include('Vehicle.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Vehicle.vehiclemenu')
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile" align:="center">
                            <h2>Edit Profile</h2><br>
                            <div class="swiper-container swiper-slider swiper-white" data-loop="false"
                                data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
                                <form method="post" action="/vehicleeditp" accept-charset="UTF-8">
                                    @csrf
                                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name"
                                        id="name" value="{{ $data[0]->u_name }}" required onchange="Validatename()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="name_l"></label><br>
                                    <script>
                                        function Validatename() {
                                            var val = document.getElementById('name').value;
                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                $("#name_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                                    .delay(4000).fadeOut();
                                                document.getElementById('name').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
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
                                    <input type="text" class="form-control" placeholder="Enter Your Address"
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
                                                $("#address_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                                    .delay(4000).fadeOut();
                                                document.getElementById('address').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <input id="email1" readonly="form-control" value="{{ $data[0]->u_email }}" readonly
                                        type="text" placeholder="Enter Your Email Address" name="email"
                                        onchange="Validateemail()" ;
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
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
                                            var filter =
                                                /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                            if (!filter.test(email.value)) {
                                                email.value = "";
                                                $("#email_2").html('Please provide a valid email address').fadeIn()
                                                    .delay(4000).fadeOut();
                                                return false;
                                            }
                                            return false;
                                        }

                                    </script>
                                    <input type="text" class="form-control" value="{{ $data[0]->u_mob }}"
                                        placeholder="Enter Your Mobile Number" name="mobile" id="mobile" required
                                        onchange="Validatep()" ;>
                                    <label class="errortext" style="display:none; color:red" id="mobile_1"></label>
                                    <script>
                                        function Validatep() {
                                            var val = document.getElementById('mobile').value;
                                            if (!val.match(/^[7-9][0-9]{9,9}$/)) {
                                                $("#mobile_1").html('Must. 10 and Numbers Allowed..!').fadeIn().delay(
                                                    4000).fadeOut();
                                                document.getElementById('mobile').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <br>
                                    {{-- <label><b>Sex :</b></label>
                                                            <label><input type="radio" name="sex" id="male" required checked="true" value="Male">Male</label>&nbsp;&nbsp;
                                                          <label><input type="radio" name="sex" id="female" required value="Female">Female</label><br>
                                                  <br> --}}
                                    {{-- <input type="text" readonly placeholder="Select Your Date Of Birth" class="form-control" name="dob" id="dob"  required><br> --}}
                                    <select type="text" id="state" class="form-control" required>
                                        <option class="form-control" value="{{ $data[0]->sid }}">{{ $data[0]->s_name }}
                                        </option>
                                        @foreach ($states as $state)
                                        <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label class="errortext" style="display:none; color:red" id="state_1"></label>
                                    <br>
                                    <select type="text" id="district" name="district" class="form-control" required>
                                        <option class="form-control" value="{{ $data[0]->did }}">{{ $data[0]->d_name }}
                                        </option>
                                    </select>
                                    <label class="errortext" style="display:none; color:red" id="district_1"></label>
                                    <br>
                                    <input type="text" value="{{ $data[0]->pname }}" id="place" name="place"
                                        placeholder="Enter Your Place" class="form-control1" onchange="Validateplace();"
                                        required>
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
                                                $("#place_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                                    .delay(4000).fadeOut();
                                                document.getElementById('place').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script><br>
                                    <input type="text" value="{{ $data[0]->adharno }}" class="form-control"
                                        placeholder="Enter Your Adhar Number" name="idno" id="idno"
                                        onclick="ValidateFileUpload();" required onchange="Validateid()" ;>
                                    <label class="errortext" style="display:none; color:red" id="idno_1"></label>
                                    <script>
                                        function Validateid() {
                                            var val = document.getElementById('idno').value;
                                            if (!val.match(/^[0-9][0-9]{11,11}$/)) {
                                                $("#idno_1").html('Must. 12 and Numbers Allowed..!').fadeIn().delay(
                                                    4000).fadeOut();
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
                    </div>
                </div>
            </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Vehicle.footer')
</body>

</html>
<script>
    var success = function (data) {
        document.getElementById('place').value = "";
        $("#district").empty();
        $html = '<option class="form-control" value="0">Select Your District</option>';
        $.each(data, function (k, v) {
            $html += '<option class="form-control" value="' + v.did + '">' + v.d_name + '</option>';
        });
        $("#district").html($html);

    }

    var selectdistrict = function () {
        $sid = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('districtr') }}",
            data: {
                'sid': $sid,
                _token: '{{csrf_token()}}'
            },
            success: success,
        });
    }

    $("#state").on("change", selectdistrict);

</script>
