<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Room</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Owner.ownermenu')
        <section>
            <div class="container-fluid">
                <div class="text-center"><br>
                    <h5 style="font-size:30px;">Edit Room</h5>
                </div>
                <div class="profile" align:="center">
                    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
                        data-simulate-touch="false" data-slide-effect="fade">
                        <form method="post" action="/saveroom" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="roomid" id="roomid" value="{{ $room[0]->nrid }}">
                            <label style="color:black; font-size: 17px;">Select Your Room Type :</label>
                            <select type="text" id="type" name="type" class="form-control" required>
                                <option class="form-control" value="{{ $room[0]->tid }}" selected disabled>{{ $room[0]->type }}
                                </option>
                                @foreach ($types as $type)
                                <option class="form-control" value="{{ $type['tid'] }}">{{ $type['type'] }}
                                </option>
                                @endforeach
                            </select>
                            <label class="errortext" style="display:none; color:red" id="type_1"></label>
                            <label style="color:black; font-size: 17px;">Upload Your Room Image :</label>
                            <input type="file" class="form-control" id="pic" value="{{ $room[0]->nrimage }}"
                                accept=".png, .jpg, .jpeg,.JPG" name="pic" required onchange="ValidateFileUpload();">
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
                            <label style="color:black; font-size: 17px;">Room Capacity :</label>
                            <input type="text" class="form-control" placeholder="Room Capacity"
                            name="roomcp" id="roomcp" readonly required value="{{ $room[0]->capacity }}" >
                            <label style="color:black; font-size: 17px;">Enter Your Room Rent :</label>
                            <input type="text" class="form-control" value="{{ $room[0]->rent }}"
                                name="rmnt" id="rmnt" required
                                onchange="Validateamnt()" ;>
                            <label class="errortext" style="display:none; color:red" id="rmnt_1"></label>
                            <script>
                                function Validateamnt() {
                                    var val = document.getElementById('rmnt').value;
                                    if(val < 100)
                                    {
                                        $("#rmnt_1").html('Enter An Amount Greater Than 100..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('rmnt').value = "";
                                    }
                                    if(val > 2500)
                                    {
                                        $("#rmnt_1").html('Enter An Amount Less Than 2500..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('rmnt').value = "";
                                    }
                                    if (!val.match(/^[1-9][0-9]{1,4}$/)) {
                                        $("#rmnt_1").html('Only Numbers Are Allowed..!').fadeIn()
                                            .delay(4000).fadeOut();
                                        document.getElementById('rmnt').value = "";
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
        var success6 = function (data) {
            // alert(data);
          document.getElementById('roomcp').value= data;
          }
      
          var roomcapacity = function () {
              $tid = $(this).val();
            //   alert($tid);
              $.ajax({
                  type: "post",
                  url: "{{ route('roomcapacity') }}",
                  data: {
                      'tid': $tid,
                      _token: '{{csrf_token()}}'
                  },
                  success: success6,
              });
          }
      
          $("#type").on("change", roomcapacity);
      </script>
