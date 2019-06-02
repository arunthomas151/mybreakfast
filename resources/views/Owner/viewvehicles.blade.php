<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicles</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Owner.viewroommenu')
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="my">
                                    <a class="button button-icon button-primary" href="/avehicles"><span>Add
                                            Vehicle</span><span class="icon material-icons-chevron_right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid">
                @if (!$vehicle->count())
                <div class="text-center"><br>
                    <h5 style="font-size:30px;">No Vehicles Yet</h5><br>
            </div>
                @else
                <div class="text-center"><br>
                    <h5 style="font-size:30px;">Vehicles</h5><br>
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
                            <label>{{ $vehicles->vdname }}</label><br>
                            <label>{{ $vehicles->vdlicence }}</label><br>
                            <label>{{ $vehicles->vcontact }}</label><br>
                            {{-- <label>{{ $vehicles->pname }}</label><br> --}}
                            <label>Rs : </label><label>{{ $vehicles->rent }}</label>
                            {{-- <label>{{ $vehicles->lmark }}</label> --}}
                        </div>
                    </div>
                    <form method="post" action="\editvehicle">
                        @csrf
                        <input type="hidden" name="vid" value="{{ $vehicles->vid }}">
                        <button type="submit" class="button button-icon button-primary" name="vrooms"
                            value="1">Edit<span class="icon material-icons-chevron_right"></span></button>
                    </form>
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
    @include('Owner.footer')
</body>

</html>
