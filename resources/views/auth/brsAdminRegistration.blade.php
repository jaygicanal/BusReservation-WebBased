<!-- Modal -->
<div class="modal fade brs-register-modal" tabindex="-1" role="dialog" 
data-bs-backdrop="static" data-bs-keyboard="false"  aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content d-flex justify-content-center">
            <form action="{{ route('admin.register.submit') }}" method="POST">
                @csrf
                <div class="row ">   
                    <div class="profile-img col-md-4 d-flex justify-content-center align-items-center">
                        <div class="profile">
                            <div class="icon d-flex justify-content-center">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </div>
                            <input type="file" id="avatar" name="avatar" accept="image/png,image/jpeg" required></input>
                        </div>
                    </div>
                    <div class="confirmation-col col-md-8 ">
                        <div class="col d-flex justify-content-between">
                            <h1 class="register-heading d-flex justify-content-start">Create Account</h1>
                            <div type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></div>
                        </div>
                        <div class="row register-form  d-flex justify-content-start">
                            <div class="form-content col-6 p-2">
                                <div class="form-group">
                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="mname" name="mname" class="form-control"  placeholder="Middle Name" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="lname" name="lname" class="form-control"  placeholder="Last Name" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="address" name="address" class="form-control"  placeholder="Address" required/>
                                </div>
                                <div class="form-group">
                                    <input type="number" id="contact" name="contact" class="form-control"  placeholder="Contact Number" required>
                                </div>
                            </div>
                            <!-- <div class="ps-2"></div> -->
                            <div class="form-content col-6 p-2">
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
                                </div>
                                <div class="form-group grp-password">
                                    <div class="inner d-flex">
                                    <input type="password" class="form-input" id="password" name="password" placeholder="Password">
                                    <span class="show_reg_password d-flex align-items-center justify-content-end" id="modal_reg_pass_show">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                    </div>
                                    <span class="password-viewer">
                                        <div class="password-rules">
                                            <h6 style="font-weight:400;">Password must contain the following:</h6>
                                            <ul>
                                                <li><p id="capital" class="su_invalid">A <b>capital (uppercase)</b> letter</p></li>
                                                <li><p id="letter" class="su_invalid">A <b>lowercase</b> letter</p></li>
                                                <li><p id="char" class="su_invalid">A <b>Character(?,/,-,etc.)</b></p></li>
                                                <li><p id="number" class="su_invalid">A <b>number</b></p></li>
                                                <li><p id="length" class="su_invalid">atleast <b>8 characters</b></p></li>
                                            </ul>
                                        </div>
                                    </span>
                                </div>
                                <div class="form-group">
                                <div class="inner d-flex">
                                    <input type="password" id="reg_re_password" name="reg_re_password" class="form-control" disabled  placeholder="Confirm Password" required/>  
                                    <span class="show_reg_re_password d-flex align-items-center justify-content-end" id="modal_reg_repass_show" >
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-content col-12">
                                <div class="button-sec col-12 d-flex justify-content-center">
                                    <button type="submit" hover="false "id="submit" disabled>Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>