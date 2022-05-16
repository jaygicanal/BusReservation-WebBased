<style>
/* Navigation */
.navbar{
    box-shadow: 0px 3px 6px 4px rgb(0, 0, 0, 0.5);
    background-color: #e5e5e5;
    position: relative;
    z-index: 9;
}
.navbar .logo-icon{
    font-size: 35px;
    /* padding: 20px 30px; */
    width: 165px;
    height: 55px;
    margin-right: 5px;
    border-radius: 50%;
    color: #e5e5e5;
    border: 2px solid  #ff3200;
    background-color: #ff3200;
    display: flex;
    justify-content: center;
    align-items: center;
}
.navbar .logo-text{
    color: #ff6400;
    font-size: 35px;
    font-weight: 900;
    display: flex;
    align-items: center;
}
.navbar .nav .sign-out{
    border-radius: 90px;
    font-size: 20px;
    padding: 5px 30px;
    outline: none;
    border: 2px solid #ff6400;
    margin: 0 10px;
}
.navbar .sign-out a{
    color: #ff6400;
    text-decoration:none;
}
.navbar .nav .sign-out:hover{
    transform: scale(1.1);
}
.navbar .dropdown-toggle::after{
    color: #ffffff;
    border-top: .3em solid;
    border-right: .3em solid transparent;
    border-left: .3em solid transparent;
} 
</style>
<nav class="navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a class="navbar-brand d-flex justify-content-center" href="#">
                    <div class="logo-icon"><i class="fa fa-bus" aria-hidden="true"></i></div>
                    <div class="logo-text fw-bold h1">Bus Reservation System</div>
                </a>
            </div>
            <div class="col-md-3 d-flex flex-sm-column flex-row flex-nowrap">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    @unless (Auth::check())    
                    <img class="image rounded-circle" src="images/landing-background.png" alt="profile_image" style="width: 55px;height: 55px; padding: 5px; margin: 0px; ">
                    @endunless
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser" style="">
                        <li><span class="text-nowrap ps-3 fw-bold">{{Auth::User()->fname ?? 'None'}}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('signout') }}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
