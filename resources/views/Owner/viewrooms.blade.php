<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rooms</title>
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
                                    <form method="post" action="/viewaddroom">
                                        @csrf
                                        <input type="hidden" name="homeid" value="{{ $rmid }}">
                                        <button type="submit" class="button button-icon button-primary" name="vrooms"
                                            value="1">Add Room<span
                                                class="icon material-icons-chevron_right"></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid"><br>
                <div class="text-center">
                        <h5 style="font-size:30px;">Rooms</h5><br>
                </div>
                @if (!$room->count())
                <div class="text-center">
                        <br><h5 style="font-size:30px;">Empty List</h5><br>
                </div>
                @else
                <div class="row"><br>
                @foreach ($room as $rooms)
                <div class="col-md-6 pb-5">
                    <div class="row">
                        <div class="col">
                            <img src="images/room/{{ $rooms->nrimage}}" class="roomimg" />
                        </div>
                        <div class="col">
                            <label>{{ $rooms->rname }}</label><br>
                            <label>{{ $rooms->type }}</label><br>
                            <label>Rs : </label><label>{{ $rooms->rent }}</label>
                        </div>
                    </div>
                    <form method="post" action="\editroom">
                        @csrf
                        <input type="hidden" name="roomid" value="{{ $rooms->nrid }}">
                        <button type="submit" class="button button-icon button-primary" name="vrooms"
                            value="1">Edit<span class="icon material-icons-chevron_right"></span></button>
                    </form>
                </div>
                @endforeach
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
