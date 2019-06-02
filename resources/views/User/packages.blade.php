<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Packages</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
    <style>
        .imgBox {
            border: 1px solid #e0bd4cb0;
            margin: 1px;
            padding: 24px;
            box-shadow: -1px 3px 5px #af9e6a;
        }

    </style>
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.usermenu')
    </header>
    <section class="section-sm row bg-white row">
        @if (!$package->count())
        <div class="text-center">
                <h5 style="font-size:30px;">No Packages Yet</h5><br>
        </div>
        @else
        <div class="text-center">
                <h5 style="font-size:30px;">Packages</h5><br>
        </div>
        @foreach ($package as $packages)
        <div class="col-md-6" style="padding-bottom:45px">
            <div class="row imgBox">
                <div class="col-md-4">
                    <img src="images/package/{{ $packages->pkimage}}" alt="" style=" height:200px" />

                    <img src="images/room/{{ $packages->nrimage}}" alt="" style=" height:200px" />
                </div>
                <div class="col-md-4">
                        <label><b>Package :</b></label>
                        <label>{{ $packages->pkinfo }}</label><br>
                        <label><b>Room :</b></label>
                        <label>{{ $packages->rname }}</label><br>
                        <label><b>Breakfast :</b></label>
                        <label>{{ $packages->bfname }}</label><br>
                        {{-- <label>{{ $packages->description }}</label><br> --}}
                        <label><b>Vehicle :</b></label>
                        <label>{{ $packages->vrno }}</label><br>
                        <label>{{ $packages->s_name }}</label><br>
                        <label>{{ $packages->d_name }}</label><br>
                        <label>{{ $packages->pname }}</label>
                        <label>{{ $packages->rcontact }}</label><br>
                        <label>Rs : </label><label>{{ $packages->rent }}</label>

                    <form method="post" action="#">
                        @csrf
                        <input type="hidden" name="roomid" value="{{ $packages->vid }}">
                        <a class="button button-icon button-primary book-package" href="#" data-toggle="modal"
                    data-target="#booknow" data-packageid="{{ $packages->pkid }}"><span>Book Now</span><span
                                class="icon material-icons-chevron_right"></span></a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        
    </section>

    @include('User.footer1')
</body>

</html>
<div class="modal login" id="booknow">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox">
                            {{-- <script src="Home/js/jquery.min.js" type="text/javascript"></script> --}}
                            <script src="Home/js/jquery-ui.js" type="text/javascript"></script>
                            <link href="Home/css/jquery-ui.css" rel="stylesheet" />

                            <form method="post" action="/pbooking" accept-charset="UTF-8" enctype="multipart/form-data">
                                <div class="text-center">
                                        <h5 style="font-size:30px;">Booking Details</h5><br>
                                </div>
                                @csrf
                                <input type="hidden" name="pkid" id="pkid">
                                <input type="text" readonly placeholder="Choose A Date" class="form-control"
                                    name="cidate" id="cidate" required>
                                <label class="errortext" style="display:none; color:red" id="cidate_1"></label><br>
                                <input type="text" class="form-control" placeholder="Enter Number of Persons" name="nop"
                                    id="nop" required onchange="Validatenop();">
                                <label class="errortext" style="display:none; color:red" id="nop_1"></label>
                                <script>
                                    function Validatenop() {
                                        var val = document.getElementById('nop').value;
                                        if (!val.match(/^[1-9]{0,1}$/)) {
                                            $("#nop_1").html('Only Numbers are Allowed..!').fadeIn().delay(4000)
                                                .fadeOut();
                                            document.getElementById('nop').value = "";
                                            return false;
                                        }
                                        return true;
                                    }

                                </script><br>
                                <input class="btn btn-default btn-login" type="submit" value="save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var d = new Date();
    var year = d.getFullYear();
    d.setFullYear(year);
    $('#cidate').datepicker({
        changeYear: true,
        changeMonth: true,
        maxDate: '7d',
        minDate: '0',
        defaultDate: d
    });

    $(".book-package").on("click", function () {
        $packageid = $(this).data("packageid");
        $("#pkid").val($packageid);
    });

</script>
<script>
    var success = function (data) {
        if (data == 1) {
            // alert(data);
            $("#cidate_1").html('The date also choosed...!').fadeIn().delay(4000).fadeOut();
            document.getElementById('cidate').value = "";
        }
    }

    var checkavailability = function () {
        // e.preventDefault();
        $cidate = $(cidate).val();
        $pkid = $(pkid).val();
        if ($cidate == "") {
            $("#cidate_1").html('Must choose a date...!').fadeIn().delay(4000).fadeOut();
        }
        // $rmid=$('rmid').val();
        // alert($nrid);
        $.ajax({
            type: "post",
            url: "{{ route('pavailability') }}",
            data: {
                'cidate': $cidate,
                'pkid': $pkid,
                _token: '{{csrf_token()}}'
            },
            success: success,
        });
    }

    $("#nop").on("click", checkavailability);

</script>
<script>
    var successs7 = function (data) {
        var val = document.getElementById('nop').value;
        // alert(val);
            if (data >= val) {
                // alert(data);
            }
            else{
                if(val == ""){

                }
                else{
                    $("#nop_1").html('Enter A Number Less Than '+data+' ..!').fadeIn().delay(4000).fadeOut();
                    document.getElementById('nop').value = "";
                }
            }
        }
    
        var checkpcapacity = function () {
            // e.preventDefault();
            $cpy = $(this).val();
            $pkid = $(pkid).val();
            // alert($cpy);
            $.ajax({
                type: "post",
                url: "{{ route('pcapacity') }}",
                data: {
                    'cpy': $cpy,
                    'pkid': $pkid,
                    _token: '{{csrf_token()}}'
                },
                success: successs7,
            });
        }
    
        $("#nop").on("keyup", checkpcapacity);
    
    </script>
