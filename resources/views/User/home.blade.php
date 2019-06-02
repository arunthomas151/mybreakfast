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
    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
        data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-slide swiper-slide-default" data-slide-bg="Home/images/slide-01.jpg">

        </div>
    </div>

    @include('User.footer')
</body>

</html>
