@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')

<div class="row h-100 justify-content-center">
    <div class="col-lg-5">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{asset('public/assets/images/logo/logo.png')}}" alt="Logo"></a>
            </div>
            <h5 class="auth-title">Log in.</h5>
           
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="email" type="text" class="form-control" name="username" value="{{ old('username') }}" required placeholder="Username" autocomplete="email" autofocus>

                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
    
                      
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
            </div>
        </div>
    </div>
   
</div>
@endsection
