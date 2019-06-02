<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Rooms</title>
    @include('Home.header')
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('Home.homemenu')
    </header>

    <section class="section-sm bg-white">
        <div class="shell">
            <h4>Rooms</h4>
            <div class="range range-50">
                @foreach ($room as $rooms)
                <div class="cell-sm-6 cell-md-4"><img src="images/room/{{ $rooms->nrimage }}" alt="" width="370"
                        height="244" />
                    <label>{{ $rooms->rname }}</label><br>
                    <label>{{ $rooms->type }}</label><br>
                    <label>{{ $rooms->rent }}</label><br>
                    {{-- <a class="button button-icon button-primary" href="javascript:void(0)"
                        onclick="openLoginModal();"><span>Book Now</span><span
                            class="icon material-icons-chevron_right"></span></a> --}}
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section class="section-sm bg-white">
        <div class="shell">
            <h4>Spacious rooms</h4>
        </div>
    </section>

    <!-- RD Parallax-->
    <section class="rd-parallax" data-on="false" data-lg-on="true" data-direction="inverse">
        <div class="rd-parallax-layer" data-speed="0.35" data-type="media"
            data-url="Home/images/pararooms-parallax-01.jpg"></div>
        <div class="rd-parallax-layer rd-parallax-modern" data-speed="0.3" data-type="html">
            <div class="shell section-md">
                <div class="range">
                    <div class="cell-lg-9 cell-md-11">
                        <h1>Queen Room <br class="veil reveal-lg-block"> is Available Now!
                        </h1>
                        <p class="parallax-content">Want to live like a queen? Book our Queen room. It is available now.
                            You will get 1 king size bed, a flat-screen cable TV, a fridge, a microwave, and a work
                            desk. Free Wi-Fi is available in all rooms.</p>
                    </div>
                </div>
                <a class="button button-icon button-primary" href="javascript:void(0)"
                    onclick="openLoginModal();"><span>Book Now</span><span
                        class="icon material-icons-chevron_right"></span></a>
            </div>
        </div>
    </section>
    @include('Home.footer')
</body>

</html>
