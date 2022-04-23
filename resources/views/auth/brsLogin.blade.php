@extends('layouts.brsApp')


@push('styles')
    <link rel="stylesheet" href="{{asset('css/brslogin-style.css')}}"> 
    <script>
        $(document).ready(function(){
            $('#login-pass-show').on('click', function() {
                event.preventDefault();
                if($('.login-inner #password').attr("type") == "text"){
                    $('.login-inner #password').attr('type', 'password');
                    $('#login-pass-show i').addClass( "fa-eye-slash" );
                    $('#login-pass-show i').removeClass( "fa-eye" );
                }else if($('.login-inner #password').attr("type") == "password"){
                    $('.login-inner #password').attr('type', 'text');
                    $('#login-pass-show i').removeClass( "fa-eye-slash" );
                    $('#login-pass-show i').addClass( "fa-eye" );
                }
            })
        });
    </script>
@endpush

@section('content')
<section class="login">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 d-flex justify-content-center align-items-center content-1">
                <div class="text-content">
                    <div class="logo d-flex justify-content-center align-items-center">LOGO</div>
                    <div class="statement text-center">Make sure you log in to book your next reservation with ease!</div>
                    <div class="text-btn d-flex justify-content-center">
                        <button type="button" data-bs-toggle="modal" data-bs-target=".brs-register-modal"> CREATE ACCOUNT</button>
                    </div>
                </div>
                @include('auth.brsRegistration');
            </div>
            <div class="col-md-5 login-inner d-flex justify-content-center align-items-center content-2">
                <form method="POST" action="user-login"> 
                    @csrf  
                    <div class="header"> 
                        <div class="line-top"></div>
                        <h3 class="text-center">Log In User</h3>
                    </div>
                    <div class="form-group d-flex">
                        <span class="icon-login d-flex align-items-center justify-content-center"><em class="fa fa-envelope-o"></em></span>
                        <input type="email" class="form-input" id="email" name="email" aria-describedby="emailSignUp" placeholder="Email">
                    </div>
                    <div class="form-group d-flex">
                        <span class="icon-login d-flex align-items-center justify-content-center"><em class="fa fa-lock"></em></span>
                        <input type="password" class="form-input" id="password" name="password" placeholder="Password">
                        <span class="show_li_password d-flex align-items-center justify-content-end" id="login-pass-show"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <div class="fp"><a href="/forgot-password">Forgot Password?</a></div>
                    <div class="button"><button type="submit" class="btn">SIGN IN</button></div>
                </form>
            </div>
        </div>
</section>
@endsection