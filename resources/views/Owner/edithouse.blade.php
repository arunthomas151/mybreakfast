<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit House</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Owner.ownermenu')
        <section>
            <div class="container-fluid"><br>
                <div class="text-center">
                        <h5 style="font-size:30px;">Edit House</h5>
                    </div>
                        <div class="profile" align:="center">
                            <div class="swiper-container swiper-slider swiper-white" data-loop="false"
                                data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
                                <form method="post" action="/savehouse" accept-charset="UTF-8"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $house[0]->rmid }}" name="homeid">
                                    <label style="color:black; font-size: 17px;">Enter Your House Name :</label>
                                    <input type="text" class="form-control" value="{{ $house[0]->rname }}"
                                       name="hname" id="hname" required
                                        onchange="Validatehname()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="hname_l"></label>
                                    <script>
                                            jQuery(document).ready(function () {
                                                jQuery('#hname').keyup(function () {
                                                    var str = jQuery('#hname').val();
                                
                                
                                                    var spart = str.split(" ");
                                                    for (var i = 0; i < spart.length; i++) {
                                                        var j = spart[i].charAt(0).toUpperCase();
                                                        spart[i] = j + spart[i].substr(1);
                                                    }
                                                    jQuery('#hname').val(spart.join(" "));
                                
                                                });
                                            });
                                
                                        </script>
                                    <script>
                                        function Validatehname() {
                                            var val = document.getElementById('hname').value;
                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                $("#hname_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                                    .delay(4000).fadeOut();
                                                document.getElementById('hname').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <label style="color:black; font-size: 17px;">Enter Your Contact Number :</label>
                                    <input type="text" class="form-control" value="{{ $house[0]->rcontact }}"
                                         name="contact" id="contact" required
                                        onchange="Validateid()" ;>
                                    <label class="errortext" style="display:none; color:red" id="contact_1"></label>
                                    <script>
                                        function Validateid() {
                                            var val = document.getElementById('contact').value;
                                            if (!val.match(/^[0-9][0-9]{9,9}$/)) {
                                                $("#contact_1").html('Must. 10 and Numbers Allowed..!').fadeIn().delay(
                                                    4000).fadeOut();
                                                document.getElementById('contact').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <label style="color:black; font-size: 17px;">Select Your House State :</label>
                                    <select type="text" id="state" class="form-control" required>
                                        <option class="form-control" value="{{ $house[0]->sid }}" disabled selected>
                                            {{ $house[0]->s_name }}</option>
                                        @foreach ($states as $state)
                                        <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label class="errortext" style="display:none; color:red" id="state_1"></label>
                                    <label style="color:black; font-size: 17px;">Select Your House District :</label>
                                    <select type="text" id="district" name="district" class="form-control" required>
                                        <option class="form-control" value="{{ $house[0]->did }}" disabled selected>
                                            {{ $house[0]->d_name }}</option>
                                    </select>
                                    <label class="errortext" style="display:none; color:red"
                                        id="district_1"></label>
                                        <label style="color:black; font-size: 17px;">Enter Your Place :</label>
                                    <input type="text" id="place" name="place" value="{{ $house[0]->pname }}"
                                        class="form-control1" onchange="Validateplace();"
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

                                    </script>
                                    <label style="color:black; font-size: 17px;">Upload Your Room Image :</label>
                                    <input type="file" class="form-control" id="pic" accept=".png, .jpg, .jpeg,.JPG"
                                        name="pic" required onchange="ValidateFileUpload();">
                                    <label class="errortext" style="display:nne; color:red" id="pic_1"></label>
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
                                    <label style="color:black; font-size: 17px;">Enter Your Land Mark :</label>
                                    <input type="text" class="form-control" value="{{ $house[0]->lmark }}"
                                        name="lmark" id="lmark" required onkeyup="capitalize(this.id, this.value);"
                                        onchange="Validatehlmark()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="lmark_l"></label>
                                    <script>
                                            function capitalize(textboxid, str) {
                                                // string with alteast one character
                                                if (str && str.length >= 1) {
                                                    var firstChar = str.charAt(0);
                                                    var remainingStr = str.slice(1);
                                                    str = firstChar.toUpperCase() + remainingStr;
                                                }
                                                document.getElementById(textboxid).value = str;
                                            }
                                        
                                        </script>
                                    <script>
                                        function Validatehlmark() {
                                            var val = document.getElementById('lmark').value;
                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                $("#lmark_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                                    .delay(4000).fadeOut();
                                                document.getElementById('lmark').value = "";
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
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Owner.footer')
</body>

</html>
<script>
    var success = function (data) {
        $("#district").empty();
        $html = '<option class="form-control" value="" disabled selected>Select Your House District</option>';
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
