<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>User Home</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
</head>

<body>
    <!-- Page Header-->
    <header class="page-header">
        @include('User.usermenu')
    </header>
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
                        <div class="button-wrap"></div>
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
                        <div class="button-wrap"></div>
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
                        <div class="button-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
                  
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

    </section>

    @include('User.footer')
</body>

</html>
