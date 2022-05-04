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

.nav-item {
    position: relative;
    display: inline-block;
    z-index: 3;
    padding: 10px 0;
}

.nav-item .link-label{
    position: absolute;

    top: 0px;
    left: 80px;

    width: 120px;
    height: 100%;
    padding: 0 10px;
    border-radius: 0 8px 8px 0;
    background: #ff6400;
    color: #fff;
    text-align: center;
    font-size: 18px !important;
    white-space: nowrap;
    transition: 1s ease-in;
    
    display: none;
}

.nav-item:hover{
    background: #ff6400;
}

.nav-item.active {
    cursor: default;
    pointer-events: none;
    background: #ff6400;
}

.nav-item:hover em,
.nav-item.active em{
    font-size: 35px;
}

.nav-item:hover .link-label{
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
                    <li class="nav-item orm-tooltip {{Request::is('admin') ? 'active':''}}" data-text="Dashboard">
                        <a href="{{ url('/admin') }}" class=" nav-link py-3 ">
                            <em class="fa fa-home"></em>
                        </a>
                        <div class="link-label">Dashboard</div>
                    </li>
                    <li class="nav-item {{Request::is('booking') ? 'active':'' }} " data-text="Booking">
                        <a href="{{ url('booking') }}" class="nav-link py-3 ">
                        <em class="fa fa-calendar-check-o" aria-hidden="true"></em>
                        </a>
                        <div class="link-label">Booking</div>
                    </li>
                    <li class="nav-item {{Request::is('forecasting') ? 'active':'' }}" data-text="Forecasting">
                        <a href="{{ url('forecasting') }}" class="nav-link py-3 " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <em class="fa fa-line-chart" aria-hidden="true"></em>
                        </a>
                        <div class="link-label">Forecasting</div>
                    </li>
                    <li class="nav-item {{Request::is('scheduling') ? 'active':'' }}" data-text="Scheduling">
                        <a href="{{ url('scheduling') }}" class="nav-link py-3 " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <em class="fa fa-bus" aria-hidden="true"></em>
                        </a>
                        <div class="link-label">Scheduling</div>
                    </li>
                    
                </ul>
            <!-- </div> -->
        </div>
    </div>
</div>