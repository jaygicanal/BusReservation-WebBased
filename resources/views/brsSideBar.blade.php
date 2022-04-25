<style>
/* SIDE NAVIGATION */
.side-nav{
    width: 80px;
    position: fixed;
}
.side-nav .col-sm-auto{
    padding: 0;
    background: #ff3200;
}

.side-nav .side-col {
    min-height: 550px;
    height: 100vh !important;
    
}

.orm-tooltip {
    position: relative;
    display: inline-block;
}

.orm-tooltip::before {
    content: attr(data-text);
    /* here's the magic */
    position: absolute;

    left: 100%;
    margin-left: 0px;
    /* and add a small left margin */

    /* basic styles */
    width: 120px;
    height: 100%;
    padding: 8px;
    border-radius: 0 8px 8px 0;
    background: #ff6400;
    color: #fff;
    text-align: center;
    font-size: 15px !important;
    white-space: nowrap;
    transform: scale(1.2);
    transition: 1s ease-in;
    
    display: none;
    /* hide by default */
}

.orm-tooltip:hover:before {
    display:flex;
    justify-content: center;
    align-items: center;
}
.side-nav .head-logo{
    height: 100px;
    padding: 15px;
}

.side-nav .nav-link {
    border-radius: 0px;
}

.side-nav .nav-link:hover,
.side-nav .nav-link.active {
    background: #ff6400;
    transform: scale(1.2);
}


.side-nav .nav-link.active {
    cursor: default;
    pointer-events: none;
}

.side-nav .dropdown-toggle::after{
    color: #ffffff;
    border-top: .3em solid;
    border-right: .3em solid transparent;
    border-left: .3em solid transparent;
}

.side-nav em {
    color: white;
    font-size: 30px
}
</style>

<div class="row">
    <div class="col-sm-auto h-100 sticky-top ">
        <div class="side-col d-flex flex-sm-column flex-row flex-nowrap align-items-between sticky-top justify-content-center">
            <!-- <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;"> -->
                <div class="head-logo d-flex justify-content-center align-items-start">
                    <a href="/" class="py-3 text-decoration-none d-flex justify-content-center align-items-center" style="height:50px;width:50px;border-radius:25px;background:#ffffff;">
                        <img src="{{ asset('images/confirmation-image.jpg') }}" width="45px" alt="">
                    </a>
                </div>
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                    <li class="nav-item orm-tooltip" data-text="Dashboard">
                        <a href="{{ url('/') }}" class=" nav-link py-3 {{Request::is('/') ? 'active':''}}">
                            <em class="fa fa-home"></em>
                        </a>
                    </li>
                    <li class="nav-item orm-tooltip" data-text="Inventory">
                        <a href="{{ url('inventory') }}" class="nav-link py-3 {{Request::is('inventory') ? 'active':'' }}">
                        <em class="fa fa-calendar-check-o" aria-hidden="true"></em>
                        </a>
                    </li>
                    <li class="nav-item orm-tooltip" data-text="Transaction">
                        <a href="{{ url('transaction') }}" class="nav-link py-3 {{Request::is('transaction') ? 'active':'' }}" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <em class="fa fa-calendar-plus-o" aria-hidden="true"></em>
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">  
                        <img class="image rounded-circle" src="images/user.png" alt="profile_image" style="width: 55px;height: 55px; padding: 5px; margin: 0px; ">
                    </a>
                    
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser" style="">
                        <li><span class="text-nowrap ps-3 fw-bold">{{Auth::User()->fname ?? 'None'}}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('signout') }}">Sign out</a></li>
                    </ul>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>