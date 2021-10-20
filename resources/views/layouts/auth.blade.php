<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#######</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
           @yield('content')
        </div>

    </div>
    <script src="{{asset('public/js/sweetalert2@11.js')}}"></script>
    @include('alerts.error')
    @include('alerts.errors')
    @include('alerts.success')
</body>

</html>