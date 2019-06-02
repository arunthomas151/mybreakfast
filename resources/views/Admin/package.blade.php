<!DOCTYPE html>
<html lang="en">

<head>
    <title>Packages</title>
    @include('Admin.header')
    <style>
        .imgBox {
            border: 1px solid #e0bd4cb0;
            margin: 1px;
            padding: 24px;
            box-shadow: -1px 3px 5px #af9e6a;
        }

    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid"><br>
                @if (!$package->count())
                <div class="text-center">
                    <h5>Empty List</h5><br>
                </div>
                @else
                <div class="text-center">
                    <h5>Packages</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <section class="section-sm row row">
                            @foreach ($package as $packages)
                            <div class="col-md-6" style="padding-bottom:45px">
                                <div class="row imgBox">
                                    <div class="col-md-4">
                                        <img src="images/package/{{ $packages->pkimage}}" alt=""
                                            style=" height:200px" />

                                        <img src="images/room/{{ $packages->nrimage}}" alt="" style=" height:200px" />
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <img src="images/breakfast/{{ $packages->bimage}}" alt=""
                                            style=" height:200px" />

                                        <img src="images/vehicle/{{ $packages->vimage}}" alt="" style=" height:200px" />
                                    </div> --}}
                                    <div class="col-md-4">
                                        {{-- <label>{{ $packages->pkname }}</label><br> --}}
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
                                        {{-- <label>{{ $breakfasts->rid }}</label> --}}

                                        {{-- <form method="post" action="#">
                                                                    @csrf
                                                                    <input type="hidden" name="roomid" value="{{ $packages->vid }}">
                                        <a class="button button-icon button-primary book-package" href="#"
                                            data-toggle="modal" data-target="#booknow"
                                            data-packageid="{{ $packages->pkid }}"><span>More</span><span
                                                class="icon material-icons-chevron_right"></span></a>
                                        </form> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
        </section>
    </div>
    @endif

    </div>
    </section>
    <!-- END PAGE CONTAINER-->
    </div>
    @include('Admin.footer')
</body>

</html>
