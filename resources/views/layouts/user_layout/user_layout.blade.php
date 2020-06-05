<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Goodwin HTML Template - Goodwin eCommerce HTML Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <!-- Vendor CSS -->
    <link href="{{url('js/user_js/js/vendor/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('js/user_js/js/vendor/slick/slick.min.css')}}" rel="stylesheet">
    <link href="{{url('js/user_js/js/vendor/fancybox/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{url('js/user_js/js/vendor/animate/animate.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{url('css/user_css/css/style-light.css')}}" rel="stylesheet">
    <!--icon font-->
    <link href="{{url('fonts/user_fonts/fonts/icomoon/icomoon.css')}}" rel="stylesheet">
    <!--custom font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body class="home-page is-dropdn-click has-slider">
    <div id="app">
    <div class="body-preloader">
        <div class="loader-wrap">
            <div class="dots">
                <div class="dot one"></div>
                <div class="dot two"></div>
                <div class="dot three"></div>
            </div>
        </div>
    </div>
    @include('layouts.user_layout.user_header')

    {{-- content --}}
    <div class="page-content">

        @yield('content')
    </div>
    @include('layouts.user_layout.user_footer')
    </div>
<script src="{{asset('js/app.js')}}"></script>
 {{-- <script src="{{url('js/user_js/js/vendor/jquery/jquery.min.js')}}"></script> --}}
    <script src="{{url('js/user_js/js/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/slick/slick.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/scrollLock/jquery-scrollLock.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/instafeed/instafeed.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/ez-plus/jquery.ez-plus.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/tocca/tocca.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/isotope/jquery.isotope.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/fancybox/jquery.fancybox.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/cookie/jquery.cookie.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/lazysizes/lazysizes.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/lazysizes/ls.bgset.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/form/jquery.form.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/form/validator.min.js')}}"></script>
    <script src="{{url('js/user_js/js/vendor/slider/slider.js')}}"></script>
    <script src="{{url('js/user_js/js/app.js')}}"></script>
{{-- <script src="{{asset('js/app.js')}}"></script> --}}
    {{-- <script src="{{url('js/user_js/js/customUserScripts.js')}}"></script> --}}

</body>