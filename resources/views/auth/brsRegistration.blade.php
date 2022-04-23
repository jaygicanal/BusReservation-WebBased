<!-- Modal -->
<div class="modal fade brs-register-modal" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content d-flex justify-content-center">
            <form action="register" method="POST">
                @csrf
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
                                <div class="combine d-flex justify-content-between align-items-center">
                                    <div class="form-group col-4">
                                        <input type="number" id="age" name="age" class="form-control"  placeholder="Age">
                                    </div>
                                    <div class="form-group col-7">
                                        <select name="gender" id="gender" class="form-option">
                                            <option selected>Your Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- <div class="ps-2"></div> -->
                            <div class="form-content col-6 p-2">
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Confirm Password" required/>
                                </div>
                            </div>
                            <div class="form-content col-12">
                                <div class="button-sec col-12 d-flex justify-content-center">
                                    <button type="submit" data-bs-dismiss="modal">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>