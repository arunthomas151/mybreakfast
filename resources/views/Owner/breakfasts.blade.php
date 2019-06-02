<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Breakfast</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Owner.ownermenu')
        <section>
            <div class="container-fluid"><br>
                <div class="text-center">
                    <h4 style="font-size:30px;">Add Breakfast</h4>
                </div>
                        <div class="profile" align:="center">
                            <div class="swiper-container swiper-slider swiper-white" data-loop="false"
                                data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
                                <form method="post" action="/addbreakfast" accept-charset="UTF-8"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <select type="text" id="cate" class="form-control" required>
                                        <option class="form-control" value="" disabled selected>Select Breakfast Catogory</option>
                                        @foreach ($cate as $cates)
                                        <option class="form-control" value="{{ $cates['cid'] }}">{{ $cates['cname'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label class="errortext" style="display:none; color:red" id="cate_1"></label>
                                    <br>
                                    <select type="text" id="food" name="food" class="form-control" required>
                                        <option class="form-control" value="" selected disabled>Select Food Type</option>
                                    </select>
                                    <label class="errortext" style="display:none; color:red" id="food_1"></label>
                                    <br>
                                    <input type="text" class="form-control" onkeyup="capitalize(this.id, this.value);" placeholder="Enter Breakfast Description"
                                        name="binfo" id="binfo" required onchange="Validatepinfo()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="binfo_l"></label>
                                    <script>
                                        function Validatepinfo() {
                                            var val = document.getElementById('binfo').value;
                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{20,}$/)) {
                                                $("#binfo_l").html('Min. 20 and Only Alphabets Allowed..!').fadeIn()
                                                    .delay(4000).fadeOut();
                                                document.getElementById('binfo').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
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
                                    <label class="errortext" style="display:none; color:red" id="district_1"></label>
                                    <label class="imglabel" style="color:black">Upload Breakfast Image</label>
                                    <input type="file" class="form-control" id="pic" accept=".png, .jpg, .jpeg,.JPG"
                                        name="pic" required onchange="ValidateFileUpload();">
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
                                                        $("#pic_1").html('Photo only allows file types of PNG, JPG, JPEG...!').fadeIn().delay(4000).fadeOut();
                                                        document.getElementById('pic').value = "";
                            
                                                    }
                                                }
                                            }
                            
                                        </script>
                                    <input type="text" class="form-control" placeholder="Enter Your Breakfast Amount"
                                        name="amnt" id="amnt" required onchange="Validateamnt()" ;>
                                    <label class="errortext" style="display:none; color:red" id="amnt_1"></label>
                                    <script>
                                        function Validateamnt() {
                                            var val = document.getElementById('amnt').value;
                                            if (!val.match(/^[1-9][0-9]{1,3}$/)) {
                                                $("#amnt_1").html('Enter A Lower Amount Less Than 5000..!').fadeIn()
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
    var success = function (data) {
        $("#food").empty();
        $html = '<option class="form-control" value="0">Select Food Type</option>';
        $.each(data, function (k, v) {
            $html += '<option class="form-control" value="' + v.bfid + '">' + v.bfname + '</option>';
        });
        $("#food").html($html);

    }

    var selectfoods = function () {
        $cid = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('foods') }}",
            data: {
                'cid': $cid,
                _token: '{{csrf_token()}}'
            },
            success: success,
        });
    }

    $("#cate").on("change", selectfoods);

</script>
