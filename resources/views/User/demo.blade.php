<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Profile View</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.usermenu')
    </header>
    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
        data-simulate-touch="false" data-slide-effect="fade">

    </div>
    @include('User.footer')

</body>

</html>
