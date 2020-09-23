<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome &mdash; Users</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('welcome/assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('welcome/assets/css/style.css') }}">

</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ URL::asset('welcome/assets/img/logo/loder.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('fronts.partials.header')

    <main>
        <!--? slider Area Start-->
        @include('fronts.partials.slider')
        <!-- ? services-area -->
        @yield('content')

        <br><br>

    </main>

    @include('fronts.partials.footer')


  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<script src="{{ URL::asset('welcome/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ URL::asset('welcome/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ URL::asset('welcome/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ URL::asset('welcome/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ URL::asset('welcome/assets/js/wow.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/animated.headline.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Date Picker -->
<script src="{{ URL::asset('welcome/assets/js/gijgo.min.js') }}"></script>
<!-- Nice-select, sticky -->
<script src="{{ URL::asset('welcome/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/jquery.sticky.js') }}"></script>
<!-- Progress -->
<script src="{{ URL::asset('welcome/assets/js/jquery.barfiller.js') }}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{ URL::asset('welcome/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/waypoints.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/hover-direction-snake.min.js') }}"></script>

<!-- contact js -->
<script src="{{ URL::asset('welcome/assets/js/contact.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/jquery.form.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/mail-script.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ URL::asset('welcome/assets/js/plugins.js') }}"></script>
<script src="{{ URL::asset('welcome/assets/js/main.js') }}"></script>

</body>
</html>

{{-- <!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Bimo &amp; Jado</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/style.css') }}">

</head>

<body>

    {{-- @include('fronts.partials.header') --}}

    {{-- @yield('slider') --}}

    {{-- @yield('content') --}}

{{-- <br/>
<br>
<br> --}}




    <!-- JS here -->
    {{-- <script src="{{ URL::asset('frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/ajax-form.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/scrollIt.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/gijgo.min.js') }}"></script>

    <!--contact js-->
    <script src="{{ URL::asset('frontend/js/contact.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/mail-script.js') }}"></script>

    <script src="{{ URL::asset('frontend/js/main.js') }}"></script>

</body>

</html> --}}


