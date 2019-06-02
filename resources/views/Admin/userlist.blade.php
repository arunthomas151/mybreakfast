<!DOCTYPE html>
<html lang="en">

<head>
    <title>User List</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="row">
                <div class="col-md-11 text-right">
                    <br>
                    <a class="button button-icon button-primary" href="#" data-toggle="modal" data-target="#search">
                        <span>Search</span><span class="icon material-icons-chevron_right"></span></a>
                </div>
            </div>
            <div class="container-fluid"></div>
            
                <br>
                @if (!$users->count())
                <div class="text-center">
                    <h5>Empty List</h5><br>
                </div>
                @else
                <div class="row">
                <div class="text-center">
                    <h5>Users List</h5><br>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>Gender</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Mobile</th>
                            {{-- <th>status</th> --}}
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->u_name }}</td>
                            <td>{{ $user->u_email }}</td>
                            <td>{{ $user->u_gender }}</td>
                            <td>{{ $user->s_name }}</td>
                            <td>{{ $user->d_name }}</td>
                            <td>{{ $user->u_mob }}</td>
                            {{-- @if ($user->status ==1)
                            <td></td>
                            @else
                            <td>Blocked</td>
                            @endif --}}
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
                @endif
                <!-- RD Mailform-->
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Admin.footer')
</body>

</html>

<div class="modal login" id="search">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="text-center">
                <h5>House Owners Search</h5>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox1">

                            <form method="post" action="/search" accept-charset="UTF-8">
                                @csrf
                                <select type="text" id="type" name="type" class="form-control" required>
                                    <option class="form-control" value="" disabled selected>Select Type Of User</option>
                                    <option class="form-control" value="2">House Owner</option>
                                    <option class="form-control" value="3">Vehicle Owner</option>
                                    <option class="form-control" value="4">Normal User</option>
                                </select>
                                <br>
                                <select type="text" id="state2" class="form-control" required>
                                    <option class="form-control" value="" disabled selected>Select Your State</option>
                                    @foreach ($states as $state)
                                    <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <label class="errortext" style="display:none; color:red" id="state_1"></label>
                                <br>
                                <select type="text" id="district1" name="district1" class="form-control" required>
                                    <option class="form-control" value="" disabled selected>Select Your District
                                    </option>
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
    var success2 = function (data) {
        $("#district1").empty();
        $html = '<option class="form-control" value="" disabled selected>Select Your District</option>';
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
            success: success2,
        });
    }

    $("#state2").on("change", selectdistrict);

</script>
