<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Contact Us</title>
    @include('home.header')
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('Home.homemenu')
    </header>

    <section class="section-sm bg-white">
        <div class="shell" data-photo-swipe-gallery="gallery">
            <h4>Contact Us</h4>
            <div><br>
                <h6>Email : </h6>
                <h5>arunthomas15011995@gmail.com</h5>
                <br>
                <h6>Contact No :</h6>
                <h5>9544103818</h5>
            </div>
            <!-- RD Mailform-->
            {{-- <form class="rd-mailform text-md-right" data-form-output="form-output-global" data-form-type="contact"
                method="post" action="bat/rd-mailform.php">
                <div class="range range-sm-50 range-30">
                    <div class="cell-md-4">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-name">Name</label>
                            <input class="form-input" id="contact-name" type="text" name="name"
                                data-constraints="@Required">
                        </div>
                    </div>
                    <div class="cell-md-4">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-phone">Phone</label>
                            <input class="form-input" id="contact-phone" type="text" name="phone"
                                data-constraints="@Numeric @Required">
                        </div>
                    </div>
                    <div class="cell-md-4">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-email">Email</label>
                            <input class="form-input" id="contact-email" type="email" name="email"
                                data-constraints="@Email @Required">
                        </div>
                    </div>
                    <div class="cell-md-12">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-message">Message</label>
                            <textarea class="form-input" id="contact-message" name="message"
                                data-constraints="@Required"></textarea>
                        </div>
                        <div class="form-button group-sm text-center text-lg-left"></div>
                    </div>
                </div>
                <button class="button button-primary" type="submit">send</button>
            </form> --}}
        </div>
    </section>
    @include('Home.footer')
</body>

</html>
