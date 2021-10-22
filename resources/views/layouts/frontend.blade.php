<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{@setting()->sitename}} - @yield('title')</title>

    <link rel="stylesheet" href="{{asset('public/assets/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/frontend')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('public/assets/frontend')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/frontend')}}/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/frontend')}}/css/owl.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/frontend')}}/css/main.css">

    <link rel="shortcut icon" href="{{logo()['fav']}}" type="image/x-icon">

</head>
<body>

    <div class="overlay"></div>
    <!-- Loader -->
    <div class="loader">
        <div class="boxes">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Loader -->

    <!-- Header Starts Here -->
    @include('frontend.partials.header')
    <!-- Header Ends Here -->

    @yield('content')

    <!-- Footer Section Starts Here -->
    @include('frontend.partials.footer')
    <!-- Footer Section Ends Here -->


    <script src="{{asset('public/assets/frontend')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/viewport.jquery.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/wow.min.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/owl.min.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/tilt.js"></script>
    <script src="{{asset('public/assets/frontend')}}/js/main.js"></script>
    
    <script src="{{asset('public/js/sweetalert2@11.js')}}"></script>
    @include('alerts.error')
    @include('alerts.errors')
    @include('alerts.success')

</body>
</html>