<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Profile View</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.usermenu')
    </header>
    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
        data-simulate-touch="false" data-slide-effect="fade">
        <div class="pediti" align:="center">
            <div class="pedit">
                <h5>Profile</h5>
                <table>
                    <tr>
                        <td colspan="2">
                            <div class="col-md-12 col-lg-12 " align="center"><a href="#" data-toggle="modal"
                                    data-target="#imageedit" class="imag"><img alt="User Pic"
                                        src="images/user/{{ $data[0]->image }}" class="img-circle img-responsive"></a>
                            </div>
            </div>
            </td>
            </tr>
            <tr>
                <td class="lp">Name :</td>
                <td class="rp">{{ $data[0]->u_name }}</td>
            </tr>
            <tr>
                <td class="lp">Email :</td>
                <td class="rp">{{ $data[0]->u_email }}</td>
            </tr>
            <tr>
                <td class="lp">Gender :</td>
                <td class="rp">{{ $data[0]->u_gender }}</td>
            </tr>
            <tr>
                <td class="lp">Date Of Birth :</td>
                <td class="rp">{{ $data[0]->dob }}</td>
            </tr>
            <tr>
                <td class="lp">Address :</td>
                <td class="rp">{{ $data[0]->address }}</td>
            </tr>
            <tr>
                <td class="lp">Mobile Number :</td>
                <td class="rp">{{ $data[0]->u_mob }}</td>
            </tr>
            <tr>
                <td class="lp">Adhar Number :</td>
                <td class="rp">{{ $data[0]->adharno }}</td>
            </tr>
            <tr>
                <td class="lp">State :</td>
                <td class="rp">{{ $data[0]->s_name }}</td>
            </tr>
            <tr>
                <td class="lp">District :</td>
                <td class="rp">{{ $data[0]->d_name }}</td>
            </tr>
            <tr>
                <td class="lp">Place :</td>
                <td class="rp">{{ $data[0]->pname }}</td>
            </tr>
            <tr>
                <td class="lp" colspan="2"><a class="button button-icon button-primary"
                        href="/ueprofile"><span>Edit</span><span class="icon material-icons-chevron_right"></span></a>
                </td>
            </tr>
            </table>
        </div>
    </div>
    </div>
    </div>

    @include('User.footer')

</body>

</html>
<div class="modal login" id="imageedit">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox">
                            <form method="post" action="/usaveimage" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <label class="imglabel" style="color:black">Upload Your Image</label>
                                <input type="file" class="form-control" id="pic" accept=".png, .jpg, .jpeg,.JPG"
                                    name="pic" required onchange="ValidateFileUpload();">
                                <label class="errortext" style="display:none; color:red" id="pic_1"></label>
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
                                                $("#pic_1").html('Photo only allows file types of PNG, JPG, JPEG...!')
                                                    .fadeIn().delay(4000).fadeOut();
                                                document.getElementById('pic').value = "";

                                            }
                                        }
                                    }

                                </script>
                                <br>
                                <input class="btn btn-default btn-login" type="submit" value="save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
