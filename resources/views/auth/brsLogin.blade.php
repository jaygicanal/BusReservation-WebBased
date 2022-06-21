@extends('layouts.brsApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brslogin-style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('#login-pass-show').on('click', function() {
                event.preventDefault();
                if($('.login-inner #li_password').attr("type") == "text"){
                    $('.login-inner #li_password').attr('type', 'password');
                    $('#login-pass-show i').addClass( "fa-eye-slash" );
                    $('#login-pass-show i').removeClass( "fa-eye" );
                }else if($('.login-inner #li_password').attr("type") == "password"){
                    $('.login-inner #li_password').attr('type', 'text');
                    $('#login-pass-show i').removeClass( "fa-eye-slash" );
                    $('#login-pass-show i').addClass( "fa-eye" );
                }
            })
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#reg-pass-show').on('click', function() {
                event.preventDefault();
                if($('#password').attr("type") == "text"){
                    $('#password').attr('type', 'password');
                    $('#reg-pass-show i').addClass( "fa-eye-slash" );
                    $('#reg-pass-show i').removeClass( "fa-eye" );
                }else if($('#password').attr("type") == "password"){
                    $('#password').attr('type', 'text');
                    $('#reg-pass-show i').removeClass( "fa-eye-slash" );
                    $('#reg-pass-show i').addClass( "fa-eye" );
                }
            })
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#modal_repass_show').on('click', function() {
                /* $('.password-rules').css('display', 'inline-block'); */
                event.preventDefault();
                if($('.confirmation-col #re_password').attr("type") == "text"){
                    $('.confirmation-col #re_password').attr('type', 'password');
                    $('#modal_repass_show i').addClass( "fa-eye-slash" );
                    $('#modal_repass_show i').removeClass( "fa-eye" );
                }else if($('.confirmation-col #re_password').attr("type") == "password"){
                    $('.confirmation-col #re_password').attr('type', 'text');
                    $('#modal_repass_show i').removeClass( "fa-eye-slash" );
                    $('#modal_repass_show i').addClass( "fa-eye" );
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
            $('#password').focusout(function() {
                $('.password-rules').css('display', 'none');
            }); 
        });
    </script>

    <script>
        function autoAge(){
            var birth_date = new Date(document.getElementById("bday").value);
            var birth_date_day = birth_date.getDate();
            var birth_date_month = birth_date.getMonth()
            var birth_date_year = birth_date.getFullYear();

            var today_date = new Date();
            var today_day = today_date.getDate();
            var today_month = today_date.getMonth();
            var today_year = today_date.getFullYear();

            var calculated_age = 0;

            if (today_month > birth_date_month) {
                calculated_age = today_year - birth_date_year;
            }
            else if (today_month == birth_date_month)
            {
                if (today_day >= birth_date_day) {
                    calculated_age = today_year - birth_date_year;
                }
                else {
                    calculated_age = today_year - birth_date_year - 1;
                }
            }

            else {
                calculated_age = today_year - birth_date_year - 1;
            }

            var output_value = calculated_age;

            if(output_value <= 0){
                calculated_age = 0;
            }
            else{
                calculated_age = output_value;
            }
            document.getElementById('age').value = calculated_age;

        }
    </script>

    <script>
        $(document).ready(function(){
            $('#bday').change(function() { 
                var counter=0;
                var ctr=0; 
                if ( $('#age').val() < 60){
                        $('#discount').find("option[value='Student']").remove();
                        $('#discount').find("option[value='Senior Citizen']").remove();
                        $('#discount').append('<option value="Student">Student</option>');
                }
                if  ( $('#age').val() >= 60){
                        $('#discount').find("option[value='Senior Citizen']").remove();
                        $('#discount').find("option[value='Student']").remove();
                        $('#discount').append('<option value="Senior Citizen">Senior Citizen</option>');
                }
            });
        })
    </script>
    
    <script>
        $(document).ready(function(){
            $('#grp_id-number').hide();
            $('#discount').on('change', function(){
                var discount = $('#discount :selected').val();
                if((discount == "PWD") || (discount == "Senior Citizen") || (discount == "Student")){
                    $('#grp_id-number').show();
                }
                else{
                    $('#grp_id-number').hide();
                    $('#id_no').val('-');
                }
            })
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
            /* $('#reg-pass-show').on('click', function() {
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
                    $("#re_password").attr("disabled", false);
                    
                } else{
                    $("#password").css('border-color', '#ff0000');
                    pass_contain = false;
                    $('.password-rules').css('display', 'inline-block');
                    $("#re_password").attr("disabled", true);
                }
            });

            $('#password').mouseleave(function(){ 
                //if (pass_contain == true){
                    $(this).css('border-color', '#000000')
                //}
            });

            $('#re_password').keyup(function(){
                if ($('#password').val() == $('#re_password').val()){
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
                        <input type="email" class="form-input" id="li_email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group d-flex">
                        <span class="icon-login d-flex align-items-center justify-content-center"><em class="fa fa-lock"></em></span>
                        <input type="password" class="form-input" id="li_password" name="password" placeholder="Password">
                        <span class="show_li_password d-flex align-items-center justify-content-end" id="login-pass-show">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <div class="fp"><a href="/forgot-password">Forgot Password?</a></div>
                    <div class="button"><button type="submit" class="btn">SIGN IN</button></div>
                </form>
            </div>
        </div>
</section>
@endsection