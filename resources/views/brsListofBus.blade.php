@extends('layouts.brsApp')
@include('brsHeader')

@push('styles')
<link rel="stylesheet" href="{{asset('css/brslistofbus-style.css')}}"> 
@endpush

@section('content')
    <section class="listofbus">
        <div class="container-xl">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center">
                    <!-- Box Section -->
                    <div class="bus-box col-6 d-flex justify-content-start">
                        <div class="box-inner">
                            <div class="box-header d-flex">
                                <div class="bus-img">
                                    <img src="{{ asset('images/landing-background.jpg') }}" alt="">
                                </div>
                                <div class="bus-info">
                                    <div class="bus-category d-flex justify-content-center">VIP</div>
                                    <div class="bus-name">QUEENS</div>
                                    <div class="bus-features row">
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-wifi" aria-hidden="true"></i></div>
                                            <div class="feat-name">Wifi</div>
                                        </div>
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-television" aria-hidden="true"></i></div>
                                            <div class="feat-name">Television</div>
                                        </div>
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-wheelchair" aria-hidden="true"></i></div>
                                            <div class="feat-name">PWD Seat</div>
                                        </div>
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></div>
                                            <div class="feat-name">Air-Con</div>
                                        </div>
                                    </div>
                                    <div class="ratings">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star-half-o "></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer d-flex justify-content-between align-items-center">
                                <div class="dep-time">
                                    <p>Departure: <strong>09:30 AM</strong></p>
                                </div>
                                <div class="bus-price d-flex justify-content-end">
                                    <div class="price-inner">
                                        <div class="price">P100.00/<span><i class="fa fa-user" aria-hidden="true"></i></span></div>
                                        <button type="button">Get Ticket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- End Box Section -->
                    <!-- Box Section -->
                    <div class="bus-box col-6 d-flex justify-content-start">
                        <div class="box-inner">
                            <div class="box-header d-flex">
                                <div class="bus-img">
                                    <img src="{{ asset('images/landing-background.jpg') }}" alt="">
                                </div>
                                <div class="bus-info">
                                    <div class="bus-category d-flex justify-content-center">VIP</div>
                                    <div class="bus-name">QUEENS</div>
                                    <div class="bus-features row">
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-wifi" aria-hidden="true"></i></div>
                                            <div class="feat-name">Wifi</div>
                                        </div>
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-television" aria-hidden="true"></i></div>
                                            <div class="feat-name">Television</div>
                                        </div>
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-wheelchair" aria-hidden="true"></i></div>
                                            <div class="feat-name">PWD Seat</div>
                                        </div>
                                        <div class="li-feat col-6 d-flex align-items-center">
                                            <div class="icon"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></div>
                                            <div class="feat-name">Air-Con</div>
                                        </div>
                                    </div>
                                    <div class="ratings">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star-half-o "></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer d-flex justify-content-between align-items-center">
                                <div class="dep-time">
                                    <p>Departure: <strong>09:30 AM</strong></p>
                                </div>
                                <div class="bus-price d-flex justify-content-end">
                                    <div class="price-inner">
                                        <div class="price">P100.00/<span><i class="fa fa-user" aria-hidden="true"></i></span></div>
                                        <button type="button">Get Ticket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- End Box Section -->
                </div>
                <!-- <div class="col-md-3">
                    <div class="top-filter">
                        <h5>Filter:</h5>
                    </div>
                    <div class="p-range">
                        <p>Price Range</p>

                    </div>

                </div> -->
            </div>
        </div>
    </section>
@endsection