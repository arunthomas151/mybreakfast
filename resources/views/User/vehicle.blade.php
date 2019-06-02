<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Vehicles</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.usermenu')
    </header>
    <section class="section-sm row bg-white">
        @if (!$vehicle->count())
        <div class="text-center">
                <h5 style="font-size:30px;">No Vehicles Yet</h5><br>
        </div>
        @else
        <div class="text-center">
        <h5 style="font-size:30px;">Vehicles</h5><br>
</div>
@foreach ($vehicle as $vehicles)
<div class="col-md-6" style="padding-bottom:45px">
<div class="row">
    <div class="col-md-6">
        <img src="images/vehicle/{{ $vehicles->vimage}}" alt="" width="370" height="244" />
    </div>

    <div class="col-md-6">
    <input type="hidden" name="roomid" id="roomid" value="{{ $roomid }}">
        <label>{{ $vehicles->voname }}</label><br>
        <label>{{ $vehicles->vcontact }}</label><br>
        <label>{{ $vehicles->s_name }}</label><br>
        <label>{{ $vehicles->d_name }}</label><br>
        <label>{{ $vehicles->pname }}</label><br>
        <label>Rs : </label><label>{{ $vehicles->rent }}</label>
        {{-- <label>{{ $breakfasts->rid }}</label> --}}
        <form method="post" action="#">
            @csrf
            <input type="hidden" name="roomid" value="{{ $vehicles->vid }}">
            <a class="button button-icon button-primary book-vehicle" href="#" data-toggle="modal"
        data-target="#booknow" data-roomid="{{ $roomid }}" data-vehicleid="{{ $vehicles->vid }}"><span>Book Now</span>
                <span class="icon material-icons-chevron_right"></span></a>
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

                            <form method="post" action="\vbooking" accept-charset="UTF-8" enctype="multipart/form-data">
                                <div class="text-center">
                                        <h5 style="font-size:30px;">Booking Details</h5><br>
                                </div>
                                @csrf
                                <input type="hidden" name="vehicleid" id="vehicleid">
                                <input type="hidden" name="roomid1" id="roomid1">
                                <input type="text" readonly placeholder="Select Starting Date" class="form-control"
                                    name="cidate" id="cidate" required>
                                <label class="errortext" style="display:none; color:red" id="cidate_1"></label><br>
                                <input type="text" readonly placeholder="Select Ending Date" class="form-control"
                                    name="codate" id="codate" required>
                                <label class="errortext" style="display:none; color:red" id="avdate_1"></label><br>
                                <input type="text" class="form-control" placeholder="Enter Number of Persons" name="nop"
                                    id="nop" required onchange="Validatenop();">
                                <label class="errortext" style="display:none; color:red" id="nop_1"></label><br>
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

                                </script>
                                <input class="btn btn-default btn-login" type="submit" value="next">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#cidate").datepicker({
            // numberOfMonths: 1,
            changeYear: true,
            changeMonth: true,
            minDate: '0',
            maxDate: '7d',
            onSelect: function (selected) {
                var minday = new Date(selected);
                var maxday = new Date(selected);
                minday.setDate(minday.getDate() + 1);
                maxday.setDate(maxday.getDate() + 4);
                // alert(maxday);
                $("#codate").datepicker("option", "minDate", minday);
                $("#codate").datepicker("option", "maxDate", maxday);
            }
        });
        $("#codate").datepicker({
            // numberOfMonths: 1,
            changeYear: true,
            changeMonth: true,
            minDate: '0',
            maxDate: '7d',
            onSelect: function (selected) {
                var minday = new Date(selected);
                minday.setDate(minday.getDate() - 1);
            }

        });
    });

    $(".book-vehicle").on("click", function () {
        $vehicleid = $(this).data("vehicleid");
        $("#vehicleid").val($vehicleid);
        $roomid2 = $(this).data("roomid");
        $("#roomid1").val($roomid2);
    });

</script>
<script>
    var success = function (data) {
        if (data == 1) {
            // alert(data);
            $("#avdate_1").html('The dates also choosed...!').fadeIn().delay(4000).fadeOut();
            document.getElementById('cidate').value = "";
            document.getElementById('codate').value = "";
        }
    }

    var checkavailability = function () {
        // e.preventDefault();
        $vcidate = $(cidate).val();
        $vcodate = $(codate).val();
        if ($vcodate == "") {
            $("#avdate_1").html('Must choose a date...!').fadeIn().delay(4000).fadeOut();
            document.getElementById('cidate').value = "";
        }
        $vehicleid = $(vehicleid).val();
        // alert($vcidate);
        $.ajax({
            type: "post",
            url: "{{ route('vavailability') }}",
            data: {
                'vcidate': $vcidate,
                'vcodate': $vcodate,
                'vehicleid': $vehicleid,
                _token: '{{csrf_token()}}'
            },
            success: success,
        });
    }

    $("#nop").on("click", checkavailability);

</script>
<script>
    $("#codate").on("click", function () {
        $vcidate = $(cidate).val();
        if ($vcidate == "") {
            $("#cidate_1").html('Must choose a date...!').fadeIn().delay(4000).fadeOut();
        }
    });

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
    
        var checkvcapacity = function () {
            // e.preventDefault();
            $cpy = $(this).val();
            $vid = $(vehicleid).val();
            // alert($cpy);
            // $rmid=$('rmid').val();
            // alert($nrid);
            $.ajax({
                type: "post",
                url: "{{ route('vcapacity') }}",
                data: {
                    'cpy': $cpy,
                    'vid': $vid,
                    _token: '{{csrf_token()}}'
                },
                success: successs7,
            });
        }
    
        $("#nop").on("keyup", checkvcapacity);
    
    </script>
