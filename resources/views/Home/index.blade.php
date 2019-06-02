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
    <div class="swiper-container swiper-slider swiper-white" data-loop="false" data-autoplay="false"
        data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide-default" data-slide-bg="Home/images/slide-01.jpg">
                <div class="swiper-slide-caption">
                    <div class="shell">
                        <div class="range text-center text-lg-left">
                            <div class="cell-lg-5 text-lg-right">
                                <h1>Bed & Breakfast</h1>
                            </div>
                            <div class="cell-lg-5">
                                {{-- <div class="divider-vertical divider-lighter"> --}}
                                    <div class="heading-5">P.O. box 160001 <br class="veil reveal-lg-block"> 1 lone
                                        mountain trail
                                    </div>
                                    <div class="heading-5">Golden Lake, MT 59716 <br class="veil reveal-lg-block"> <a
                                            href="callto:#">800.548.4486</a> or <a href="callto:#">406.995.5000</a>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="button-wrap"><a class="button button-primary" href="#">Online booking</a></div>
                        <div class="heading-6">Enjoy the breathtaking view from the rooms of our hotel! Located not far
                            from the downtown, Kernesco can offer you not just comfortable accommodation, but also a
                            wide variety of services to make your stay unforgettable.</div>
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
                            <div class="cell-lg-5">
                                <div class="divider-vertical divider-lighter">
                                    <div class="heading-5">P.O. box 160001 <br class="veil reveal-lg-block"> 1 lone
                                        mountain trail
                                    </div>
                                    <div class="heading-5">Golden Lake, MT 59716 <br class="veil reveal-lg-block"> <a
                                            href="callto:#">800.548.4486</a> or <a href="callto:#">406.995.5000</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-wrap"><a class="button button-primary" href="#">Online booking</a></div>
                        <div class="heading-6"> Get a free night at our hotel!<br>Your entire stay will be for a total
                            of 8 days.<br>Low season rates apply Oct - April</div>
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
                            <div class="cell-lg-5">
                                <div class="divider-vertical divider-lighter">
                                    <div class="heading-5">P.O. box 160001 <br class="veil reveal-lg-block"> 1 lone
                                        mountain trail
                                    </div>
                                    <div class="heading-5">Golden Lake, MT 59716 <br class="veil reveal-lg-block"> <a
                                            href="callto:#">800.548.4486</a> or <a href="callto:#">406.995.5000</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-wrap"><a class="button button-primary" href="#">Online booking</a></div>
                        <div class="heading-6">Maximize your stay with whale watching in Los Angeles! Start your day off
                            with a delicious breakfast and take with you our gourmet sandwiches and muffins for lunch.
                            Return to a bottle of wine and complimentary gift waiting in your room.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination" data-index-bullet="true"></div>
    </div>

    <section class="section-sm bg-white">
        <div class="shell">
            <h4>Rooms</h4>
        </div>
        <div class="swiper-container swiper-slider swiper-carousel" data-loop="false" data-autoplay="false"
            data-simulate-touch="false" data-slide-effect="fade">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-slide-bg="">
                    <div class="swiper-slide-caption">
                        <div class="shell">
                            <div class="range range-sm-center range-40 range-sm-50">
                                <div class="cell-sm-9 cell-md-6">
                                    <div class="postfix-md-right--14 relative">
                                        <div class="swiper-carousel-titile">
                                            <h1>The Verdi Suite</h1>
                                        </div><img src="Home/images/home-01-585x384.jpg" width="585" height="384"
                                            alt="">
                                    </div>
                                    <p>All rooms have <span class="text-italic text-gray-darker">digital flat screen
                                            Television, free Wi-Fi, fresh Towels, Tea and Coffee making facilities,
                                            bottled water, Radio/ Alarm Clock and Hairdryer.</span>
                                        We have a large Breakfast room
                                        where you can eat before heading off on your day’s activity in
                                        the Los Angeles area.
                                    </p>
                                </div>
                                <div class="cell-sm-9 cell-md-6">
                                    <div class="preffix-md-left--13"><img src="/Home/images/home-02-585x384.jpg"
                                            width="585" height="384" alt=""></div>
                                    <h6>The Verdi suite</h6>
                                    <p><span class="text-bold">$155</span> Jan 1 - April 30 (except Dec 18-31 & Feb 14 &
                                        15) <br> <span class="text-bold">$225</span> May 1 - Oct 15
                                    </p><a class="button button-primary" href="#">more info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-slide-bg="">
                    <div class="swiper-slide-caption">
                        <div class="shell">
                            <div class="range range-sm-center range-50">
                                <div class="cell-sm-9 cell-md-6">
                                    <div class="postfix-md-right--14 relative">
                                        <div class="swiper-carousel-titile">
                                            <h1>The Vivaldi Suite</h1>
                                        </div><img src="Home/images/home-05-585x384.jpg" width="585" height="384"
                                            alt="">
                                    </div>
                                    <p>All rooms have <span class="text-italic text-gray-darker">digital flat screen
                                            Television, free Wi-Fi, fresh Towels, Tea and Coffee making facilities,
                                            bottled water, Radio/ Alarm Clock and Hairdryer.</span>
                                        We have a large Breakfast room
                                        where you can eat before heading off on your day’s activity in
                                        the Los Angeles area.
                                    </p>
                                </div>
                                <div class="cell-sm-9 cell-md-6">
                                    <div class="preffix-md-left--13"><img src="Home/images/home-03-585x384.jpg"
                                            width="585" height="384" alt=""></div>
                                    <h6>The Vivaldi suite</h6>
                                    <p><span class="text-bold">$165</span> Jan 1 - April 30 (except Dec 18-31 & Feb 14 &
                                        15) <br> <span class="text-bold">$215</span> May 1 - Oct 15
                                    </p><a class="button button-primary" href="#">more info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-slide-bg="">
                    <div class="swiper-slide-caption">
                        <div class="shell">
                            <div class="range range-sm-center range-50">
                                <div class="cell-sm-9 cell-md-6">
                                    <div class="postfix-md-right--14 relative">
                                        <div class="swiper-carousel-titile">
                                            <h1>The Rossini Suite</h1>
                                        </div><img src="Home/images/home-06-585x384.jpg" width="585" height="384"
                                            alt="">
                                    </div>
                                    <p>All rooms have <span class="text-italic text-gray-darker">digital flat screen
                                            Television, free Wi-Fi, fresh Towels, Tea and Coffee making facilities,
                                            bottled water, Radio/ Alarm Clock and Hairdryer.</span>
                                        We have a large Breakfast room
                                        where you can eat before heading off on your day’s activity in
                                        the Los Angeles area.
                                    </p>
                                </div>
                                <div class="cell-sm-9 cell-md-6">
                                    <div class="preffix-md-left--13"><img src="Home/images/home-04-585x384.jpg"
                                            width="585" height="384" alt=""></div>
                                    <h6>The Rossini suite</h6>
                                    <p><span class="text-bold">$159</span> Jan 1 - April 30 (except Dec 18-31 & Feb 14 &
                                        15) <br> <span class="text-bold">$210</span> May 1 - Oct 15
                                    </p><a class="button button-primary" href="#">more info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination" data-index-bullet="true"></div>
        </div>
        <div class="button-wrap"><a class="button button-lg button-primary" href="rooms.html">View all rooms</a></div>
    </section>

    <section class="section-sm bg-white">
        <div class="shell">
            <h4>Breakfast</h4>
            <div class="range range-md-justify">
                <div class="cell-md-5"><img src="Home/images/home-05-471x496.jpg" alt="" width="471" height="496" />
                </div>
                <div class="cell-md-6">
                    <p class="inset-lg-right-30">Breakfast is served between 08:00 and 09:00 in our bright, spacious
                        breakfast room.</p>
                    <div class="range">
                        <div class="cell-md-6">
                            <h4>A.</h4>
                            <div class="heading-6 heading-6-classic">Guests can firstly help <br
                                    class="veil reveal-md-block">themselves to:
                            </div>
                            <ul class="list text-italic text-spacing-25">
                                <li>Choice of cereals</li>
                                <li>Porridge (available to order)</li>
                                <li>Fruit juice</li>
                                <li>Fresh fruit salad</li>
                                <li>Natural yoghurt</li>
                            </ul>
                        </div>
                        <div class="cell-md-6">
                            <h4>B.</h4>
                            <div class="heading-6 heading-6-classic">Followed by full English <br
                                    class="veil reveal-md-block">breakfast:
                            </div>
                            <ul class="list text-italic text-spacing-25">
                                <li>Cocklakes Farm sausage</li>
                                <li>Cocklakes Farm back bacon</li>
                                <li>Sauteed mushrooms</li>
                                <li>Grilled tomatoes</li>
                                <li>Baked beans</li>
                            </ul>
                        </div>
                    </div><a class="button button-icon button-primary" href="#"><span>more breakfasts</span><span
                            class="icon material-icons-chevron_right"></span></a>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section class="section-sm">
        <div class="shell">
            <h4>Welcome!</h4>
            <div class="range">
                <div class="cell-md-6">
                    <div class="heading-6 inset-lg-right-30 text-spacing-25">We can assure you of a warm welcome at our
                        Kernesco Bed and Breakfast in Los Angeles, conveniently located just 2 minutes from Los Angeles
                        downtown, having the spectacular view.</div>
                    <div class="range">
                        <div class="cell-md-6">
                            <div class="widget-custom">
                                <h5 class="widget-custom-title">Current weather:</h5><img
                                    src="Home/images/home-06-193x69.png" alt="" width="193" height="69" /><a
                                    class="button button-icon button-icon-sm button-primary" href="#"><span>week`s
                                        weather</span><span class="icon material-icons-chevron_right"></span></a>
                            </div>
                        </div>
                        <div class="cell-md-6">
                            <div class="heading-6-modern">We are open 24h!<br><span>Call to make a reservation:</span>
                            </div>
                            <div class="heading-4 heading-4-classic"><a href="callto:#">(800) 123 1234</a></div>
                        </div>
                    </div>
                </div>
                <div class="cell-md-6">
                    <p class="text-spacing-25">
                        Our Bed and Breakfast has six comfortable rooms offering a variety
                        of accommodation – singles, doubles and twins. At the start of the
                        day we provide hearty Lakeland breakfasts and can cater for most
                        guests` dietary requirements (just let us know at time of booking).
                        Packed lunches are available at a nominal cost and we will be
                        pleased to fill your flask with tea or coffee free of charge, just drop
                        it off at breakfast. When you arrive back to our B & B from your
                        busy day, home-made cake will be waiting for you!
                    </p><a class="button button-icon button-primary" href="#"><span>read more about us</span><span
                            class="icon material-icons-chevron_right"></span></a>
                </div>
            </div>
        </div>
    </section>
    @include('Home.footer')
</body>

</html>
