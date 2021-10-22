<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{setting()->sitename}}-@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public')}}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{asset('public')}}/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="{{asset('public')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{asset('public')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
   
    <link rel="stylesheet" href="{{asset('public')}}/assets/css/app.css">
    <link rel="shortcut icon" href="{{logo()['fav']}}" type="image/x-icon">
    @stack('style-lib')
    @stack('style')
</head>

<body>
    <div id="app">
       @include('admin.partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading d-flex justify-content-between">
                <h3>@yield('title')</h3>
                <form action="@route('logout')" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Logout</button>
                </form>
            </div>
            <div class="page-content">
               @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('public')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{asset('public')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{asset('public')}}/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{asset('public')}}/assets/js/pages/dashboard.js"></script>

    <script src="{{asset('public')}}/assets/js/main.js"></script>

    <script src="{{asset('public/js/sweetalert2@11.js')}}"></script>
    @include('alerts.error')
    @include('alerts.errors')
    @include('alerts.success')

    @stack('script-lib')
    @stack('script')
</body>

</html>