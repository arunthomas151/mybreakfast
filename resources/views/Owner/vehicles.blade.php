<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Vehicle</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Owner.ownermenu')
        <section>
            <div class="container-fluid"><br>
                <div class="text-center">
                    <h5 style="font-size:30px;">Add Vehicle</h5>
                </div>
                <div class="profile" align:="center">
                    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
                        data-simulate-touch="false" data-slide-effect="fade">
                        <form method="post" action="/addvehicle" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <input type="text" class="form-control" placeholder="Enter Vehicle Register Number"
                                name="vno" id="vno" required onchange="Validatevno()" ;>
                            <label class="errortext" style="display:nne; color:red" id="vno_l"></label><br>
                            <script>
                                function Validatevno() {
                                    var val = document.getElementById('vno').value;
                                    if (!val.match(
                                            /^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{1,4}$/)) {
                                        $("#vno_l").html('Provide A Valid Register Number Like KL 06 J 957..!')
                                            .fadeIn().delay(4000).fadeOut();
                                        document.getElementById('vno').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <input type="text" class="form-control" placeholder="Enter Vehicle Owner Name" name="voname"
                                id="voname" required onchange="Validatevoname()" ;>
                            <label class="errortext" style="display:nne; color:red" id="voname_l"></label><br>
                            <script>
                                jQuery(document).ready(function () {
                                    jQuery('#voname').keyup(function () {
                                        var str = jQuery('#voname').val();


                                        var spart = str.split(" ");
                                        for (var i = 0; i < spart.length; i++) {
                                            var j = spart[i].charAt(0).toUpperCase();
                                            spart[i] = j + spart[i].substr(1);
                                        }
                                        jQuery('#voname').val(spart.join(" "));

                                    });
                                });

                            </script>
                            <script>
                                function Validatevoname() {
                                    var val = document.getElementById('voname').value;
                                    if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                        $("#voname_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('voname').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <input type="text" class="form-control" placeholder="Enter Vehicle Driver Name"
                                name="vdname" id="vdname" required onchange="Validatevdname()" ;>
                            <label class="errortext" style="display:nne; color:red" id="vdname_l"></label><br>
                            <script>
                                jQuery(document).ready(function () {
                                    jQuery('#vdname').keyup(function () {
                                        var str = jQuery('#vdname').val();


                                        var spart = str.split(" ");
                                        for (var i = 0; i < spart.length; i++) {
                                            var j = spart[i].charAt(0).toUpperCase();
                                            spart[i] = j + spart[i].substr(1);
                                        }
                                        jQuery('#vdname').val(spart.join(" "));

                                    });
                                });

                            </script>
                            <script>
                                function Validatevdname() {
                                    var val = document.getElementById('vdname').value;
                                    if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                        $("#vdname_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('vdname').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <input type="text" class="form-control" placeholder="Enter Driver Licence Number"
                                name="dlno" id="dlno" required onchange="Validatedlno()" ;>
                            <label class="errortext" style="display:nne; color:red" id="dlno_l"></label><br>
                            <script>
                                function Validatedlno() {
                                    var val = document.getElementById('dlno').value;
                                    if (!val.match(/^[0-9]{1}[/][0-9]{1,4}[/][0-9]{4}$/)) {
                                        $("#dlno_l").html('Provide A valid Licence Number Like 6/3297/2013..!')
                                            .fadeIn().delay(4000).fadeOut();
                                        document.getElementById('dlno').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <input type="text" class="form-control" placeholder="Enter Driver Contact Number"
                                name="contact" id="contact" required onchange="Validateid()" ;>
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
                            <label class="errortext" style="display:none; color:red" id="district_1"></label>
                            <label class="imglabel" style="color:black">Upload Vehicle Image</label>
                            <input type="file" class="form-control" id="pic" accept=".png, .jpg, .jpeg,.JPG" name="pic"
                                required onchange="ValidateFileUpload();">
                            <label class="errortext" style="display:nne; color:red" id="pic_1"></label><br>
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
                            <input type="text" class="form-control" placeholder="Enter Seating Capacity" name="nofseat"
                                id="nofseat" required onchange="Validateamnt1();">
                            <label class="errortext" style="display:none; color:red" id="nofseat_1"></label><br>
                            <script>
                                function Validateamnt1() {
                                    var val = document.getElementById('nofseat').value;
                                    if (!val.match(/^[3-9][0]{0,1}$/)) {
                                        $("#nofseat_1").html('Enter A Number Between 3 & 9..!').fadeIn().delay(
                                            4000).fadeOut();
                                        document.getElementById('nofseat').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <input type="text" class="form-control" placeholder="Enter Minumum Kilometer" name="klmtr"
                                id="klmtr" required onchange="Validatekm();">
                            <label class="errortext" style="display:none; color:red" id="klmtr_1"></label><br>
                            <script>
                                function Validatekm() {
                                    var val = document.getElementById('klmtr').value;
                                    if (!val.match(/^[1-9][0]{0,1}$/)) {
                                        $("#klmtr_1").html('Enter A Number Between 1 & 10..!').fadeIn().delay(
                                            4000).fadeOut();
                                        document.getElementById('klmtr').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <input type="text" class="form-control" placeholder="Enter Minumum Waiting Time"
                                name="wtime" id="wtime" required onchange="Validatetime();">
                            <label class="errortext" style="display:none; color:red" id="wtime_1"></label><br>
                            <script>
                                function Validatetime() {
                                    var val = document.getElementById('wtime').value;
                                    if (!val.match(/^[1-9][0-2]{0,1}$/)) {
                                        $("#wtime_1").html('Enter A Hour Between 1 & 12 hrs..!').fadeIn().delay(
                                            4000).fadeOut();
                                        document.getElementById('wtime').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <input type="text" class="form-control" placeholder="Enter Your Vehicle Rent" name="vrmnt"
                                id="vrmnt" required onchange="Validateamnt()" ;>
                            <label class="errortext" style="display:none; color:red" id="vrmnt_1"></label><br>
                            <script>
                                function Validateamnt() {
                                    var val = document.getElementById('vrmnt').value;
                                    if (val < 100) {
                                        $("#vrmnt_1").html('Enter An Amount Greater Than 100..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('vrmnt').value = "";
                                    }
                                    if (val > 2500) {
                                        $("#vrmnt_1").html('Enter An Amount Less Than 2500..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('vrmnt').value = "";
                                    }
                                    if (!val.match(/^[1-9][0-9]{1,4}$/)) {
                                        $("#vrmnt_1").html('Only Numbers Are Allowed..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('vrmnt').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
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
