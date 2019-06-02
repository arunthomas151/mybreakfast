<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Rooms</title>
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
        <div class="row">
            <div class="col-md-11 text-right">
                <a class="button button-icon button-primary" href="#" data-toggle="modal" data-target="#search">
                    <span>Search</span><span class="icon material-icons-chevron_right"></span></a>
            </div>
        </div>
        @if (!$room->count())
        <div class="text-center">
                <h5 style="font-size:30px;">No Rooms Yet</h5><br>
        </div>
        @else
        <div class="text-center">
                <h5 style="font-size:30px;">Rooms</h5><br>
        </div>
        @foreach ($room as $rooms)
        <div class="col-md-6" style="padding-bottom:45px">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/room/{{ $rooms->nrimage}}" alt="" width="370" height="244" />
                </div>

                <div class="col-md-6">
                    <label>{{ $rooms->rname }}</label><br>
                    <label>{{ $rooms->type }}</label><br>
                    <label>{{ $rooms->rcontact }}</label><br>
                    <label>{{ $rooms->s_name }}</label><br>
                    <label>{{ $rooms->d_name }}</label><br>
                    <label>{{ $rooms->pname }}</label><br>
                    <label>Rs : </label><label>{{ $rooms->rent }}</label>
                    {{-- <label>{{ $breakfasts->rid }}</label> --}}
                    <form method="post" action="#">
                        @csrf
                        <input type="hidden" name="roomid" value="{{ $rooms->nrid }}">
                        <a class="button button-icon button-primary book-rooms" href="#" data-toggle="modal"
                        data-target="#booknow" data-roomid="{{ $rooms->nrid }}" data-did="{{ $rooms->did }}">
                            <span>Book Now</span><span class="icon material-icons-chevron_right"></span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </section>

    <div class="divider"></div>

    <section class="section-sm bg-white">
        <div class="shell">
            <h4>Spacious rooms</h4>
        </div>
    </section>

    <!-- RD Parallax-->
    <section class="rd-parallax" data-on="false" data-lg-on="true" data-direction="inverse">
        <div class="rd-parallax-layer" data-type="media" data-url="Home/images/pararooms-parallax-01.jpg"></div>
        <div class="rd-parallax-layer rd-parallax-modern" data-type="html">
            <div class="shell section-md">
                <div class="range">
                    <div class="cell-lg-9 cell-md-11">
                        <h1>Queen Room <br class="veil reveal-lg-block">
                        </h1>
                    </div>
                </div>
                {{-- <a class="button button-icon button-primary" href="#" data-toggle="modal" data-target="#booknow"><span>Book Now</span><span class="icon material-icons-chevron_right"></span></a> --}}
            </div>
        </div>
    </section>
    </div>

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

                            <form method="post" action="/rbooking" accept-charset="UTF-8" enctype="multipart/form-data">
                                <div class="text-center">
                                        <h5 style="font-size:30px;">Booking Details</h5><br>
                                </div>
                                @csrf
                                <input type="hidden" name="roomid" id="rmid">
                                <input type="hidden" name="disis" id="disid">
                                <input type="text" readonly placeholder="Select Check In Date" class="form-control"
                                    name="cidate" id="cidate" required>
                                <label class="errortext" style="display:none; color:red" id="cidate_1"></label><br>
                                <input type="text" readonly placeholder="Select Ckeck Out Date" class="form-control"
                                    name="codate" id="codate" required>
                                <label class="errortext" style="display:none; color:red" id="avdate_1"></label><br>
                                <select type="text" id="breakfastid" name="breakfastid" class="form-control" required>
                                  <option class="form-control" value="" disabled selected>Select A Breakfast</option>
                                  @foreach ($breakfast as $breakfasts)
                                <option class="form-control" value="{{ $breakfasts->bid }}">{{ $breakfasts->bfname }}
                                </option>
                                @endforeach
                                </select><br>
                                <input type="text" class="form-control" placeholder="Enter Number of Persons" name="nop"
                                    id="nop" required onchange="Validatenop();">
                                <label class="errortext" style="display:none; color:red" id="nop_1"></label>
                                <script>
                                    function Validatenop() {
                                        var val = document.getElementById('nop').value;
                                        if (!val.match(/^[1-7]{0,1}$/)) {
                                            $("#nop_1").html('Only Numbers are Allowed..!').fadeIn().delay(4000)
                                                .fadeOut();
                                            document.getElementById('nop').value = "";
                                            return false;
                                        }
                                        return true;
                                    }

                                </script>
                                <label><input type="checkbox" name="needv" value="1"> Need A vehicle</label> <br><br>
                                <input class="btn btn-default btn-login" type="submit" value="next">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal login" id="search">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox">
                            <h6>Search</h6><br>
                            <form method="post" action="/roomsearch" accept-charset="UTF-8">
                                @csrf
                                <select type="text" id="state1" class="form-control" required>
                                    <option class="form-control" value="0">Select Your State</option>
                                    @foreach ($states as $state)
                                    <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <label class="errortext" style="display:none; color:red" id="state_1"></label>
                                <br>
                                <select type="text" id="district1" name="district1" class="form-control" required>
                                    <option class="form-control" value="0">Select Your District</option>
                                </select>
                                <label class="errortext" style="display:none; color:red" id="district_1"></label>
                                <script>
                                    function Validatestate() {
                                        var val = document.getElementById('state').value;
                                        var val1 = document.getElementById('district').value;
                                        if (val == 0) {
                                            $("#state_1").html('Must Select a State..!').fadeIn().delay(4000).fadeOut();
                                            document.getElementById('password1').value = "";
                                            return false;
                                        } else {
                                            if (val1 == 0) {
                                                $("#district_1").html('Must Select a district..!').fadeIn().delay(4000)
                                                    .fadeOut();
                                                document.getElementById('password1').value = "";
                                                return false;
                                            }
                                        }
                                        return true;
                                    }

                                </script>
                                <br>
                                <input class="btn1" type="submit" value="search" name="search"
                                    onclick="Validatestate();">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(".book-rooms").on("click", function () {
        $roomid = $(this).data("roomid");
        $("#rmid").val($roomid);
        $disid = $(this).data("did");
        $("#disid").val($disid);
    });</script>
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

    

</script>
<script>
var success1 = function (data) {
        if (data == 1) {
            // alert(data);
            $("#avdate_1").html('The dates also choosed...!').fadeIn().delay(4000).fadeOut();
            document.getElementById('cidate').value = "";
            document.getElementById('codate').value = "";
        }
    }

    var checkavailability = function () {
        // e.preventDefault();
        $cidate = $(cidate).val();
        $codate = $(codate).val();
        if ($codate == "") {
            $("#avdate_1").html('Must choose a date...!').fadeIn().delay(4000).fadeOut();
            document.getElementById('cidate').value = "";
        }
        $nrid = $(rmid).val();
        // $rmid=$('rmid').val();
        // alert($nrid);
        $.ajax({
            type: "post",
            url: "{{ route('ravailability') }}",
            data: {
                'cidate': $cidate,
                'codate': $codate,
                'nrid': $nrid,
                _token: '{{csrf_token()}}'
            },
            success: success1,
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
    var success = function (data) {
        $("#district1").empty();
        $html = '<option class="form-control" value="0">Select Your District</option>';
        $.each(data, function (k, v) {
            $html += '<option class="form-control" value="' + v.did + '">' + v.d_name + '</option>';
        });
        $("#district1").html($html);

    }

    var selectdistrict = function () {
        $sid = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('districta') }}",
            data: {
                'sid': $sid,
                _token: '{{csrf_token()}}'
            },
            success: success,
        });
    }

    $("#state1").on("change", selectdistrict);

</script>
<script>
    var success3 = function (data) {
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
    
        var checkcapacity = function () {
            // e.preventDefault();
            $cpy = $(this).val();
            $nrid = $(rmid).val();
            // alert($cpy);
            // $rmid=$('rmid').val();
            // alert($nrid);
            $.ajax({
                type: "post",
                url: "{{ route('rcapacity') }}",
                data: {
                    'cpy': $cpy,
                    'nrid': $nrid,
                    _token: '{{csrf_token()}}'
                },
                success: success3,
            });
        }
    
        $("#nop").on("keyup", checkcapacity);
    
    </script>
