@extends('layouts.brsApp')
@push('styles')
<link rel="stylesheet" href="{{asset('css/brsadmin-style.css')}}"> 
    <script>
        $(document).ready(function(){
            $('#admin-pass-show').on('click', function() {
                event.preventDefault();
                if($('.admin-inner #li_password').attr("type") == "text"){
                    $('.admin-inner #li_password').attr('type', 'password');
                    $('#admin-pass-show i').addClass( "fa-eye-slash" );
                    $('#admin-pass-show i').removeClass( "fa-eye" );
                }else if($('.admin-inner #li_password').attr("type") == "password"){
                    $('.admin-inner #li_password').attr('type', 'text');
                    $('#admin-pass-show i').removeClass( "fa-eye-slash" );
                    $('#admin-pass-show i').addClass( "fa-eye" );
                }
            })
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#modal_reg_pass_show').on('click', function() {
                /* $('.password-rules').css('display', 'inline-block'); */
                event.preventDefault();
                if($('.confirmation-col #password').attr("type") == "text"){
                    $('.confirmation-col #password').attr('type', 'password');
                    $('#modal_reg_pass_show i').addClass( "fa-eye-slash" );
                    $('#modal_reg_pass_show i').removeClass( "fa-eye" );
                }else if($('.confirmation-col #password').attr("type") == "password"){
                    $('.confirmation-col #password').attr('type', 'text');
                    $('#modal_reg_pass_show i').removeClass( "fa-eye-slash" );
                    $('#modal_reg_pass_show i').addClass( "fa-eye" );
                }
            })
        });
    </script>
     <script>
        $(document).ready(function(){
            $('#modal_reg_repass_show').on('click', function() {
                /* $('.password-rules').css('display', 'inline-block'); */
                event.preventDefault();
                if($('.confirmation-col #reg_re_password').attr("type") == "text"){
                    $('.confirmation-col #reg_re_password').attr('type', 'password');
                    $('#modal_reg_repass_show i').addClass( "fa-eye-slash" );
                    $('#modal_reg_repass_show i').removeClass( "fa-eye" );
                }else if($('.confirmation-col #reg_re_password').attr("type") == "password"){
                    $('.confirmation-col #reg_re_password').attr('type', 'text');
                    $('#modal_reg_repass_show i').removeClass( "fa-eye-slash" );
                    $('#modal_reg_repass_show i').addClass( "fa-eye" );
                }
            })
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.brs-register-modal').on('hidden.bs.modal', function() {
                $('.brs-register-modal form')[0].reset();
                $('.password-rules').css('display', 'none');
            }); 
            $('#password').focusout(function(){
                $('.password-rules').css('display', 'none');
            }); 
        });
            
    </script>

    <script>
        var pass_contain = false;
        var uppercase = false;
        var lowercase = false;
        var digits = false;
        var characters = false;
        var length = false;
        var pass_strength = 0;

        var confirm_password = false;
        $(document).ready(function(){
           /*  $('#modal_reg_pass_show').on('click', function() {
                $('.password-rules').css('display', 'inline-block');
            }); */
            $('#password').keyup(function(){
                // check if Uppercase Letter existed in Password
                if (/[A-Z]+/.test($("#password").val())) {
                    $('#capital').css('color', '#00ff00');
                    uppercase = true;
                } else{
                    $('#capital').css('color', '#ff0000');
                    uppercase = false;
                }
                // check if Lowercase Letter existed in Password
                if (/[a-z]+/.test($("#password").val())) {
                    $('#letter').css('color', '#00ff00');
                    lowercase = true;
                } else{
                    $('#letter').css('color', '#ff0000');
                    lowercase = false;
                }
                // check if Digits existed in Password
                if (/[0-9]+/.test($("#password").val())) {
                    $('#number').css('color', '#00ff00');
                    digits = true;
                } else{
                    $('#number').css('color', '#ff0000');
                    digits = false;
                }
                // check if Character existed in Password
                if (/[^a-zA-Z0-9]+/.test($("#password").val())) {
                    $('#char').css('color', '#00ff00');
                    characters = true;
                } else{
                    $('#char').css('color', '#ff0000');
                    characters = false;
                }
                // check if Character existed in Password
                if ($('#password').val().length > 7){
                    $('#length').css('color', '#00ff00');
                    length = true;
                    
                } else{
                    $('#length').css('color', '#ff0000');
                    length = false;
                }
                if ((uppercase == true) && (lowercase == true) && (digits == true) && (characters == true) && (length == true)) {
                    $("#password").css('border-color', '#00ff00');
                    $('.password-rules').css('display', 'none');
                    pass_contain = true;
                    $("#reg_re_password").attr("disabled", false);
                    
                } else{
                    $("#password").css('border-color', '#ff0000');
                    pass_contain = false;
                    $('.password-rules').css('display', 'inline-block');
                    $("#reg_re_password").attr("disabled", true);
                }
            });
            $('#password').mouseleave(function(){ 
                //if (pass_contain == true){
                    $(this).css('border-color', '#000000')
                //}
            });

            $('#reg_re_password').keyup(function(){
                if ($('#password').val() == $('#reg_re_password').val()){
                    confirm_password = true;
                    $("#submit").attr("disabled", false);
                    $("#submit").css("border-color", '#ff6400');
                    $("#submit").css("color", '#ff6400');
                    $("#submit").hover("border-color", '#ff6400');
                    $("#submit").hover("color", '#ff6400');
                } else {
                    confirm_password = false;
                    $("button").attr("disabled", true);
                    $("#submit").css("border-color", 'black');
                    $("#submit").css("color", 'black');
                    $("#submit").hover("border-color", 'black');
                    $("#submit").hover("color", 'black');
                }
            });

        });
    </script>   
@endpush

@section('content')
<section class="admin">
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
            </div>
            <div class="col-md-5 admin-inner d-flex justify-content-center align-items-center content-2">
                <form method="POST" action="{{ route('admin.login.submit') }}">    
                    @csrf
                    <div class="header"> 
                        <div class="line-top"></div>
                        <h3 class="text-center">Log In Admin</h3>
                    </div>
                    <div class="form-group d-flex">
                        <span class=" icon-admin d-flex align-items-center justify-content-center"><em class="fa fa-envelope-o"></em></span>
                        <input type="email" class="form-input" id="li_email" name="email" aria-describedby="emailSignUp" placeholder="Email">
                    </div>
                    <div class="form-group d-flex">
                    <span class="icon-admin d-flex align-items-center justify-content-center"><em class="fa fa-lock"></em></span>
                        <input type="password" class="form-input" id="li_password" name="password" placeholder="Password">
                        <span class="show_password d-flex align-items-center justify-content-end" id="admin-pass-show">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <div class="fp"><a href="/forgot-password">Forgot Password?</a></div>
                    <div class="button"><button type="submit" class="btn">SIGN IN</button></div>
                </form>
            </div>
        </div>
        @include('auth.brsAdminRegistration');
</section>
@endsection