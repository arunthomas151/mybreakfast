<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Gallery</title>
    @include('Home.header')
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('Home.homemenu')
    </header>
    <section class="section-sm bg-white">
            <div class="shell">
                <h4>Gallery</h4>
                <div class="range range-50">
                    @foreach ($rooms as $room)
                    <div class="cell-sm-6 cell-md-4"><img src="images/room/{{ $room->nrimage }}" alt="" width="370"
                        height="244" />
                    </div>
                    @endforeach
                    @foreach ($vehicles as $vehicle)
                    <div class="cell-sm-6 cell-md-4"><img src="images/vehicle/{{ $vehicle->vimage }}" alt="" width="370"
                        height="244" />
                    </div>
                    @endforeach
                    @foreach ($packages as $package)
                    <div class="cell-sm-6 cell-md-4"><img src="images/package/{{ $package->pkimage }}" alt="" width="370"
                        height="244" />
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    @include('Home.footer')
</body>

</html>
