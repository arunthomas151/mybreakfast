<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicles</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid"><br>
                @if (!$vehicle->count())
                <div class="text-center">
                    <h5>Empty Lisr</h5><br>
                </div>
                @else
                <div class="text-center">
                    <h5>Vehicles</h5><br>
                </div>
                <div class="row">
                    @foreach ( $vehicle as $vehicles)
                    <div class="col-md-6 pb-5">
                        <div class="row">
                            <div class="col">
                                <img src="images/vehicle/{{ $vehicles->vimage }}" class="roomimg" />
                            </div>
                            <div class="col">
                                <label>{{ $vehicles->vrno }}</label><br>
                                {{-- <label>{{ $vehicles->vdname }}</label><br> --}}
                                <label>{{ $vehicles->vdlicence }}</label><br>
                                <label>{{ $vehicles->vcontact }}</label><br>
                                <label>{{ $vehicles->s_name }}</label><br>
                                <label>{{ $vehicles->d_name }}</label><br>
                                <label>{{ $vehicles->pname }}</label><br>
                                {{-- <label>{{ $vehicles->pname }}</label><br> --}}
                                <label>Rs : </label><label>{{ $vehicles->rent }}</label>
                                {{-- <label>{{ $vehicles->lmark }}</label> --}}
                            </div>
                        </div>
                        {{-- <form method="post" action="\editvehicle">
                                          @csrf
                                          <input type="hidden" name="vid" value="{{ $vehicles->vid }}">
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
        </section>

        <!-- END PAGE CONTAINER-->
    </div>
    @include('Admin.footer')
</body>

</html>
