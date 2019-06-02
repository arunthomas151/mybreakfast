<!DOCTYPE html>
<html lang="en">

<head>
    <title>States</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <h4 class="statedis">States</h4>
                        <br>
                        <table>
                            <?php $a=1; ?>
                            @foreach ($states as $state)
                            <tr>
                                <td>{{ $a }}</td>
                                <td>
                                    <form action="/district" method="POST">
                                        @csrf
                                        <input type="hidden" name="sid" value="{{ $state['sid'] }}">
                                        <button class="statebutton" type="submit"> {{ $state['s_name'] }}</button>
                                    </form>
                                </td>
                                {{-- <td><a href="district/{{ $state['sid'] }}">{{ $state['s_name'] }}</a></td> --}}
                                <td>
                                    <a class="button button-icon button-primary edit-state" href="#"
                                        data-sname="{{ $state['s_name'] }}" data-sid="{{ $state['sid'] }}"
                                        data-toggle="modal" data-target="#editstate"><span>Edit</span><span
                                            class="icon material-icons-chevron_right"></span></a></td>
                            </tr>
                            <?php $a=$a+1; ?>
                            @endforeach
                        </table><br>
                    </div>
                    <div class="col-md-6">
                        @if (!$districts->count())
                        <br>
                        <h5>Empty List</h5>
                        @else
                        <br>
                        <h4 class="statedis">Districts</h4><br>
                        <table>
                            <?php $a=1; ?>
                            @foreach ($districts as $district)
                            <tr>
                                <td>{{$a}}</td>
                                {{-- <td>{{ $district['s_name'] }}</td> --}}
                                <td>{{ $district['d_name'] }}</td>
                                <td><a class="button button-icon button-primary edit-district" href="#"
                                        data-sid1="{{ $district['sid'] }}" data-dname="{{ $district['d_name'] }}"
                                        data-did="{{  $district['did'] }}" data-toggle="modal"
                                        data-target="#editdistrict"><span>Edit</span><span
                                            class="icon material-icons-chevron_right"></span></a></td>
                                </td>
                            </tr>
                            <?php $a=$a+1; ?>
                            @endforeach
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Admin.footer')
</body>

</html>
<div class="modal login" id="editstate">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="text-center">
                    <h5 style="font-size:30px;"></h5>Edit State<br>
                </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox1">
                            <form method="post" action="/editstate" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="sid" id="sid">
                                <input type="text" name="state2" id="state2" class="form-control"
                                    placeholder="Enter State Name" required onchange="Validateename();">
                                <label class="errortext" style="display:nne; color:red" id="estate_l"></label><br>
                                <script>
                                    jQuery(document).ready(function () {
                                        jQuery('#state2').keyup(function () {
                                            var str = jQuery('#state2').val();


                                            var spart = str.split(" ");
                                            for (var i = 0; i < spart.length; i++) {
                                                var j = spart[i].charAt(0).toUpperCase();
                                                spart[i] = j + spart[i].substr(1);
                                            }
                                            jQuery('#state2').val(spart.join(" "));

                                        });
                                    });

                                </script>
                                <script>
                                    function Validateename() {
                                        var val = document.getElementById('state2').value;
                                        if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                            $("#estate_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(
                                                4000).fadeOut();
                                            document.getElementById('state2').value = "";
                                            return false;
                                        }
                                        return true;
                                    }

                                </script>
                                <input class="btn1" type="submit" value="save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal login" id="editdistrict">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="text-center">
                    <h5 style="font-size:30px;">Edit District</h5><br>
                </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox1">
                            <form method="post" action="/editdistrict" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="did" id="did">
                                <select type="text" id="state3" name="state3" class="form-control" required>
                                    <option class="form-control" value="" disabled selected>Select Your State</option>
                                    @foreach ($states as $state)
                                    <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <label class="errortext" style="display:none; color:red" id="state_1"></label>
                                <br>
                                <input type="text" name="district2" id="district2" class="form-control"
                                    onclick="validatestate();" placeholder="Enter State Name" required
                                    onchange="Validatename();">
                                <label class="errortext" style="display:nne; color:red" id="edistrict_l"></label><br>
                                <script>
                                    jQuery(document).ready(function () {
                                        jQuery('#district2').keyup(function () {
                                            var str = jQuery('#district2').val();


                                            var spart = str.split(" ");
                                            for (var i = 0; i < spart.length; i++) {
                                                var j = spart[i].charAt(0).toUpperCase();
                                                spart[i] = j + spart[i].substr(1);
                                            }
                                            jQuery('#district2').val(spart.join(" "));

                                        });
                                    });

                                </script>
                                <script>
                                    function Validatename() {
                                        var val = document.getElementById('district2').value;
                                        if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                            $("#edistrict_l").html('Min. 3 and Only Alphabets Allowed..!').fadeIn()
                                                .delay(4000).fadeOut();
                                            document.getElementById('district2').value = "";
                                            return false;
                                        }
                                        return true;
                                    }

                                    function validatestate() {
                                        var val1 = document.getElementById('state3').value;
                                        // alert(val1);
                                        if (val1 == 0) {
                                            $("#edistrict_l").html('Must Select A Satate..!').fadeIn().delay(4000)
                                                .fadeOut();
                                            document.getElementById('district2').value = "";
                                        }
                                    }

                                </script>
                                <input class="btn1" type="submit" value="save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var success = function (data) {
        if (data == 1) {
            //   alert(data);
            $("#estate_l").html('The name is also used').fadeIn().delay(4000).fadeOut();
            document.getElementById('state2').value = "";
        }
    }

    var checkstate2 = function () {
        // e.preventDefault();
        $s_name = $(this).val();
        $.ajax({
            type: "post",
            url: "{{ route('checkstate') }}",
            data: {
                's_name': $s_name,
                _token: '{{csrf_token()}}'
            },
            success: success,
        });
    }

    $("#state2").on("keyup", checkstate2);

</script>
<script>
    var successs1 = function (data) {
        if (data == 1) {
            //   alert(data);
            $("#edistrict_l").html('The name is also used').fadeIn().delay(4000).fadeOut();
            document.getElementById('district2').value = "";
        }
    }

    var checkdistrict2 = function () {
        // e.preventDefault();
        $sid = document.getElementById('state3').value;
        $d_name = $(this).val();
        // alert(val1);
        if ($sid == 0) {
            $("#edistrict_l").html('Must Select A Satate..!').fadeIn().delay(4000).fadeOut();
            document.getElementById('district2').value = "";
        }
        // alert($sid);
        $.ajax({
            type: "post",
            url: "{{ route('checkdistrict') }}",
            data: {
                'sid': $sid,
                'd_name': $d_name,
                _token: '{{csrf_token()}}'
            },
            success: successs1,
        });
    }

    $("#district2").on("keyup", checkdistrict2);


    $(".edit-state").on("click", function () {
        $sname = $(this).data("sname");
        $sid = $(this).data("sid");
        // alert($sid);
        $("#state2").val($sname);
        $("#sid").val($sid);
    });
    $(".edit-district").on("click", function () {
        $sid1 = $(this).data("sid1");
        // alert($sname1);
        $dname = $(this).data("dname");
        $did = $(this).data("did");
        $("#district2").val($dname);
        $("#state3").val($sid1);
        $("#did").val($did);
    });

</script>
