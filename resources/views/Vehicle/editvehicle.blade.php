<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Vehicle</title>
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
                            <br>
                            <h4>Edit Vehicle</h4><br>
                            <div class="swiper-container swiper-slider swiper-white" data-loop="false"
                                data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
                                <form method="post" action="/vehiclesave" accept-charset="UTF-8"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="vid" value="{{ $vehicle[0]->vid }}">
                                    <input type="text" class="form-control" readonly value="{{ $vehicle[0]->vrno }}"
                                        placeholder="Enter Your Vehicle Register Number" name="vno" id="vno" required
                                        onchange="Validatevno()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="vno_l"></label>
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
                                    <br>
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->voname }}"
                                        placeholder="Enter Vehicle Owner Name" name="voname" id="voname" required
                                        onchange="Validatevoname()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="voname_l"></label>
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
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->vdname }}"
                                        placeholder="Enter Vehicle Driver Name" name="vdname" id="vdname" required
                                        onchange="Validatevdname()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="vdname_l"></label>
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
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->vdlicence }}"
                                        placeholder="Enter Driver Licence Number" name="dlno" id="dlno" required
                                        onchange="Validatedlno()" ;>
                                    <label class="errortext" style="display:nne; color:red" id="dlno_l"></label>
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
                                    <br>
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->vcontact }}"
                                        placeholder="Enter Driver Contact Number" name="contact" id="contact" required
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
                                    <label class="errortext" style="display:none; color:red" id="district_1"></label>
                                    <label class="imglabel" style="color:black">Upload Vehicle Image</label>
                                    <input type="file" value="{{ $vehicle[0]->vimage }}" class="form-control" id="pic"
                                        accept=".png, .jpg, .jpeg,.JPG" name="pic" required onchange="Validateimage();">
                                    <label class="errortext" style="display:nne; color:red" id="pic_l"></label>
                                    <script>
                                        function Validateimage() {
                                            var val = document.getElementById('pic').value;
                                            if (val == "") {
                                                $("#pic_l").html('Must Select An Image..!').fadeIn().delay(4000)
                                                    .fadeOut();
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <br>
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->nofseat }}"
                                        placeholder="Enter Seating Capacity" name="nofseat" id="nofseat" required
                                        onchange="Validateamnt();">
                                    <label class="errortext" style="display:none; color:red" id="nofseat_1"></label>
                                    <script>
                                        function Validateamnt() {
                                            var val = document.getElementById('nofseat').value;
                                            if (!val.match(/^[3-9][0]{0,1}$/)) {
                                                $("#nofseat_1").html('Enter A Number Between 3 & 10..!').fadeIn().delay(
                                                    4000).fadeOut();
                                                document.getElementById('nofseat').value = "";
                                                return false;
                                            }
                                            return true;
                                        }

                                    </script>
                                    <br>
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->rkm }}"
                                        placeholder="Enter Minumum Kilometer" name="klmtr" id="klmtr" required
                                        onchange="Validatekm();">
                                    <label class="errortext" style="display:none; color:red" id="klmtr_1"></label>
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
                                    <br>
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->wtime }}"
                                        placeholder="Enter Minumum Waiting Time" name="wtime" id="wtime" required
                                        onchange="Validatetime();">
                                    <label class="errortext" style="display:none; color:red" id="wtime_1"></label>
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
                                    <br>
                                    <input type="text" class="form-control" value="{{ $vehicle[0]->rent }}"
                                        placeholder="Enter Your Vehicle Rent" name="vrmnt" id="vrmnt" required
                                        onchange="Validateamnt()" ;>
                                    <label class="errortext" style="display:none; color:red" id="vrmnt_1"></label>
                                    <script>
                                        function Validateamnt() {
                                            var val = document.getElementById('vrmnt').value;
                                            if (!val.match(/^[1-9][0-9]{2,4}$/)) {
                                                $("#vrmnt_1").html('Enter An Amount Between 100 & 5000..!').fadeIn()
                                                    .delay(4000).fadeOut();
                                                document.getElementById('vrmnt').value = "";
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
