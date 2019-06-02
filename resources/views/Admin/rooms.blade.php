<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rooms</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid"><br>
                    @if (!$room->count())
                    <div class="text-center">
                            <h5>Empty List</h5><br>
                        </div>
                    @else
                    <div class="text-center">
                            <h5>Rooms</h5><br>
                    </div>
                    <div class="row"><br>
                    @foreach ($room as $rooms)
                    <div class="col-md-6 pb-5 text-center">
                        <div class="row">
                            <div class="col">
                                <img src="images/room/{{ $rooms->nrimage}}" class="roomimg" />
                            </div>
                            <div class="col">
                                <label>{{ $rooms->rname }}</label><br>
                                <label>{{ $rooms->type }}</label><br>
                                <label>{{ $rooms->s_name }}</label><br>
                                <label>{{ $rooms->d_name }}</label><br>
                                <label>{{ $rooms->pname }}</label><br>
                                <label>Rs : </label><label>{{ $rooms->rent }}</label>
                                {{-- <label>{{ $breakfasts->rid }}</label> --}}
                            </div>
                        </div>
                        {{-- <form method="post" action="\editroom">
                                              @csrf
                                              <input type="hidden" name="roomid" value="{{ $rooms->nrid }}">
                        <button type="submit" class="button button-icon button-primary" name="vrooms"
                            value="1">More<span class="icon material-icons-chevron_right"></span></button>
                        </form> --}}
                    </div>
                    @endforeach
                </div>
                    @endif
                    <!-- RD Mailform-->
                    <div class="range range-sm-50 range-30">
                        <div class="cell-md-4">
                            <div class="form-wrap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- END PAGE CONTAINER-->
    </div>
    @include('Admin.footer')
</body>

</html>
