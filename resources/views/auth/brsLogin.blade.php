@extends('layouts.brsApp')
@push('styles')
<link rel="stylesheet" href="{{asset('css/brslogin-style.css')}}">    
@endpush

@section('content')
<section class="login">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 d-flex justify-content-center align-items-center content-1">
                <div class="text-content">
                    <div class="logo d-flex justify-content-center align-items-center">LOGO</div>
                    <div class="statement text-center">Make sure you log in to book your next reservation with ease!</div>
                    <div class="button"><button type="submit" class="create">CREATE ACCOUNT</button></div>
                </div>
            </div>
            <div class="col-md-5 login-inner d-flex justify-content-center align-items-center content-2">
                <form method="POST" action="">    
                    <div class="header"> 
                        <div class="line-top"></div>
                        <h3 class="text-center">Log In Now!</h3>
                    </div>
                    <div class="form-group d-flex">
                        <span class="d-flex align-items-center justify-content-center"><em class="fa fa-envelope-o"></em></span>
                        <input type="email" class="form-input" id="siEmail" name="email" aria-describedby="emailSignUp" placeholder="Email">
                    </div>
                    <div class="form-group d-flex">
                        <span class="d-flex align-items-center justify-content-center"><em class="fa fa-lock"></em></span>
                        <input type="password" class="form-input" id="siPassword" name="password" placeholder="Password">
                    </div>
                    <div class="fp"><a href="/forgot-password">Forgot Password?</a></div>
                    <div class="button"><button type="submit" class="btn">SIGN IN</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection