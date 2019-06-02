<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Package</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Owner.ownermenu')
        <section>
            <div class="container-fluid"><br>
                <div class="text-center">
                    <h5 style="font-size:30px;">Add Package</h5>
                </div>
                <div class="profile" align:="center">
                    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
                        data-simulate-touch="false" data-slide-effect="fade">
                        <form method="post" action="/addpackage" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <input type="text" class="form-control" placeholder="Enter Package Name" name="pname"
                                id="pname" required onkeyup="capitalize(this.id, this.value);"
                                onchange="Validatepname()" ;>
                            <label class="errortext" style="display:nne; color:red" id="pname_l"></label>
                            <script>
                                function Validatepname() {
                                    var val = document.getElementById('pname').value;
                                    if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                        $("#pname_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('pname').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <br>
                            <input type="text" class="form-control" placeholder="Enter Package Info" name="pinfo"
                                id="pinfo" onkeyup="capitalize(this.id, this.value);" required
                                onchange="Validatepinfo()" ;>
                            <label class="errortext" style="display:nne; color:red" id="pinfo_l"></label>
                            <script>
                                function Validatepinfo() {
                                    var val = document.getElementById('pinfo').value;
                                    if (!val.match(/^[A-Za-z][A-Za-z" "]{10,}$/)) {
                                        $("#pinfo_l").html('Min. 10 and Only Alphabets Allowed..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('pinfo').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <br>
                            <select type="text" id="roomid" name="roomid" class="form-control" required>
                                <option class="form-control" value="" disabled selected>Select A Room</option>
                                @foreach ($room as $rooms)
                                <option class="form-control" value="{{ $rooms->nrid }}">{{ $rooms->rname }}
                                </option>
                                @endforeach
                            </select><br>
                            <select type="text" id="breakfastid" name="breakfastid" class="form-control" required>
                                <option class="form-control" value="" disabled selected>Select A Breakfast</option>
                                @foreach ($breakfast as $breakfasts)
                                <option class="form-control" value="{{ $breakfasts->bid }}">
                                    {{ $breakfasts->bfname }}</option>
                                @endforeach
                            </select><br>
                            <select type="text" id="vehicleid" name="vehicleid" class="form-control" required>
                                <option class="form-control" value="" disabled selected>Select A Vehicle</option>
                                @foreach ($vehicle as $vehicles)
                                <option class="form-control" value="{{ $vehicles->vid }}">{{ $vehicles->vrno }}
                                </option>
                                @endforeach
                            </select><br>
                            <input type="text" class="form-control" placeholder="Enter Package Starting Time"
                                name="pstime" id="pstime" required onchange="Validatestime()" ;>
                            <label class="errortext" style="display:nne; color:red" id="pstime_l"></label>
                            <script>
                                function Validatestime() {
                                    var val = document.getElementById('pstime').value;
                                    if (!val.match(/^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/)) {
                                        $("#pstime_l").html('Enter A valid Time Like 09:30..!').fadeIn().delay(
                                            4000).fadeOut();
                                        document.getElementById('pstime').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <br>
                            <input type="text" class="form-control" placeholder="Enter Package Ending Time"
                                name="petime" id="petime" required onchange="Validateetime()" ;>
                            <label class="errortext" style="display:nne; color:red" id="petime_l"></label>
                            <script>
                                function Validateetime() {
                                    var val1 = document.getElementById('pstime').value;
                                    var val = document.getElementById('petime').value;
                                    if (!val.match(/^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/)) {
                                        $("#petime_l").html('Enter A valid Time Like 09:30..!').fadeIn().delay(
                                            4000).fadeOut();
                                        document.getElementById('petime').value = "";
                                        return false;
                                    } else {
                                        if (val1 > val) {
                                            $("#petime_l").html('Ending Time Less Than Starting Time..!')
                                                .fadeIn().delay(4000).fadeOut();
                                            document.getElementById('petime').value = "";
                                            document.getElementById('pstime').value = "";
                                            return false;
                                        }
                                    }
                                    return true;
                                }

                            </script>
                            <label class="errortext" style="display:none; color:red" id="district_1"></label>
                            <label class="imglabel" style="color:black">Upload Package Image</label>
                            <input type="file" class="form-control" id="pic" accept=".png, .jpg, .jpeg,.JPG" name="pic"
                                required onchange="ValidateFileUpload();">
                            <label class="errortext" style="display:nne; color:red" id="pic_1"></label>
                            <<script>
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
                            <br>
                            <input type="text" class="form-control" placeholder="Enter Your Package Amount" name="amnt"
                                id="amnt" required onchange="Validateamnt()" ;>
                            <label class="errortext" style="display:none; color:red" id="amnt_1"></label>
                            <script>
                                function Validateamnt() {
                                    var val = document.getElementById('amnt').value;
                                    if (val < 100) {
                                        $("#amnt_1").html('Enter An Amount Greater Than 100..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('amnt').value = "";
                                    }
                                    if (val > 3500) {
                                        $("#amnt_1").html('Enter An Amount Less Than 3500..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('amnt').value = "";
                                    }
                                    if (!val.match(/^[1-9][0-9]{1,4}$/)) {
                                        $("#amnt_1").html('Only Numbers Are Allowed..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('amnt').value = "";
                                        return false;
                                    }
                                    return true;
                                }

                            </script>
                            <br>
                            <input class="btn1" type="submit" value="add" name="save">
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
