<!DOCTYPE html>
<html lang="en">

<head>
    <title>Breakfasts</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid"><br>
                @if (!$breakfast->count())
                <div class="text-center">
                    <h5>Empty List</h5><br>
                </div>
                @else
                <div class="text-center">
                    <h5>Breakfasts</h5><br>
                </div>
                <div class="row">
                        @foreach ($breakfast as $breakfasts)
                        <div class="col-md-6 pb-5">
                            <div class="row">
                                <div class="col">
                                    <img src="images/breakfast/{{ $breakfasts->bimage}}" class="roomimg" />
                                </div>
                                <div class="col">
                                    <label>{{ $breakfasts->cname }}</label><br>
                                    <label>{{ $breakfasts->bfname }}</label><br>
                                    <label>{{ $breakfasts->description }}</label><br>
                                    <label>Rs : </label><label>{{ $breakfasts->rent }}</label>
                                    {{-- <label>{{ $breakfasts->pname }}</label> --}}
                                    {{-- <label>{{ $breakfasts->rid }}</label> --}}
                                </div>
                            </div>
                            {{-- <form method="post" action="">
                                              @csrf
                                              <input type="hidden" name="bid" value="{{ $breakfasts->bid }}">
                            <button type="submit" class="button button-icon button-primary" name="breakfast"
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
