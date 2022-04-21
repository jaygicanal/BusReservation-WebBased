@extends('layouts.brsApp')
@push('styles')
<link rel="stylesheet" href="{{asset('css/brsadmin-style.css')}}">    
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
                <form method="POST" action="">    
                    <div class="header"> 
                        <div class="line-top"></div>
                        <h3 class="text-center">Log In Admin</h3>
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
        <!-- Modal -->
        <div class="modal fade brs-register-modal" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content d-flex justify-content-center">
                    <div class="row ">
                        <div class="logo-img col-md-4 d-flex justify-content-center align-items-center">
                            <div class="logo">
                                <div class="icon d-flex justify-content-center">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </div>
                                <input type="file" id="avatar" name="avatar" accept="image/png,image/jpeg"></input>
                            </div>
                        </div>
                        <div class="confirmation-col col-md-8 ">
                            <h1 class="register-heading ">Create Account</h1>
                            <div class="row register-form  d-flex justify-content-start">
                                <div class="form-content col-6 p-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Middle Name" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Last Name" value="" required/>
                                    </div>
                                    <div class="combine d-flex justify-content-evenly align-items-center">
                                        <div class="form-group col-4">
                                            <input type="number" class="form-control"  placeholder="Age" min="1" oninput="validity.valid||(value='');" required />
                                        </div>
                                        <div class="form-group col-5">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- <div class="ps-2"></div> -->
                                <div class="form-content col-6 p-2">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" value="" required/>
                                    </div>
                                </div>
                                <div class="form-content col-12">
                                    <div class="button-sec col-12 d-flex justify-content-center">
                                        <button type="button" data-bs-dismiss="modal">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection