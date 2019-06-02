<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Home</title>
    @include('Home.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
</head>

<body>
    <!-- Page Header-->
    <header class="page-header">
        @include('Home.homemenu')
    </header>
    <!-- Swiper-->
    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="3000"
        data-simulate-touch="false" data-slide-effect="fade" >
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide-default" data-slide-bg="Home/images/slide-01.jpg">
                <div class="swiper-slide-caption">
                    <div class="shell">
                        <div class="range text-center text-lg-left">
                            <div class="cell-lg-5 text-lg-right">
                                <h1>Bed & Breakfast</h1>
                            </div>
                        </div>
                        <div class="button-wrap"><a class="button button-primary" href="/rooms">Online booking</a></div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-default" data-slide-bg="Home/images/slide-02.jpg">
                <div class="swiper-slide-caption">
                    <div class="shell">
                        <div class="range text-center text-lg-left">
                            <div class="cell-lg-5 text-lg-right">
                                <h1>Bed & Breakfast</h1>
                            </div>
                        </div>
                        <div class="button-wrap"><a class="button button-primary" href="/rooms">Online booking</a></div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-default" data-slide-bg="Home/images/slide-03.jpg">
                <div class="swiper-slide-caption">
                    <div class="shell">
                        <div class="range text-center text-lg-left">
                            <div class="cell-lg-5 text-lg-right">
                                <h1>Bed & Breakfast</h1>
                            </div>
                        </div>
                        <div class="button-wrap"><a class="button button-primary" href="/rooms">Online booking</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination" data-index-bullet="true"></div>
    </div>

    <div class="divider"></div>

    <section class="section-sm">
        <div class="shell">
            <div class="range">
                <div class="cell-md-6">
                    <div class="range">
                        <div class="cell-md-6">
                            <div class="widget-custom">
                            </div>
                        </div>
                        <div class="cell-md-6">
                        </div>
                    </div>
                </div>
                <div class="cell-md-6">
                </div>
            </div>
        </div>
    </section>
    @include('Home.footer')
</body>

</html>
