@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
<link rel="stylesheet" href="{{asset('css/brspayment-style.css')}}"> 
@endpush

@section('content')

    <section class="payment">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 payment-content">
                    <div class="payment-head">
                        <h2>Payment</h2>
                    </div>
                    <nav>
                        <div class="payment-inner">
                            <div class="nav nav-tabs col-12-md" id="nav-tab" role="tablist">
                                    <button class="nav-link active col-4" id="nav-Gcash-tab" data-bs-toggle="tab" data-bs-target="#nav-Gcash" type="button" role="tab" aria-controls="nav-Gcash" aria-selected="false"> <img src="{{ asset('images/gcash.png') }}" alt=""></button>
                                    <button class="nav-link col-4" id="nav-Palawan-Express-tab" data-bs-toggle="tab" data-bs-target="#nav-Palawan-Express" type="button" role="tab" aria-controls="nav-Palawan-Express" aria-selected="false"><img src="{{ asset('images/palawan.jpg') }}" alt=""></button>
                                    <button class="nav-link col-4" id="nav-Paymaya-tab" data-bs-toggle="tab" data-bs-target="#nav-Paymaya" type="button" role="tab" aria-controls="nav-Paymaya" aria-selected="true"> <img src="{{ asset('images/paymaya.png') }}" alt=""> </button>
                            </div>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-Gcash" aria-labelledby="nav-Gcash-tab">
                            <div class="Gcash-content">
                                <h4><p>Payment for Gcash</p></h4>
                                <p>Name:<b>Dondon linis</b></p>
                                <p>Mobile Number:<b>09090502132</b></p>
                            </div>
                            <div class="gcash-img ">
                                <center>
                                    <i>Please attach proof of payment here:</i>
                                    <div class="payment-img">
                                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                        <input type="file" id="img-gcash" class="img-gcash" name="img-gcash" accept="image/png,image/jpeg" required></input>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-Palawan-Express" aria-labelledby="nav-Palawan-Express-tab">
                            <div class="Palawan-content">
                                <h4><p>Payment for Palawan Express</p></h4>
                                <p>Name:<b>Dondon linis</b></p>
                                <p>Mobile Number:<b>09090502132</b></p>
                            </div>
                            <div class="palawan-img ">
                                <center>
                                    <i>Please attach proof of payment here:</i>
                                    <div class="payment-img">
                                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                        <input type="file" id="img-palawan" class="img-palawan"  name="img-palawan" accept="image/png,image/jpeg" required></input>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-Paymaya" aria-labelledby="nav-Paymaya-tab">
                            <div class="paymaya-content">
                                <h4><p>Payment for Paymaya</p></h4>
                                <p>Name:<b>Dondon linis</b></p>
                                <p>Mobile Number:<b>09090502132</b></p>
                            </div>
                            <div class="paymaya-img d-flex justify-content-center">
                                <center>
                                    <i>Please attach proof of payment here:</i>
                                    <div class="payment-img">
                                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                        <input type="file" id="img-paymaya" class="img-paymaya" name="img-paymaya" accept="image/png,image/jpeg" required></input>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5  payment-side">
                    <!-- Modal  -->
                    <div class="confirmstion-col row d-flex justify-content-center">
                        <div class="standard-bus d-flex justify-content-start">
                            <div class="confimation-header">
                                <h5>Standard Bus</h5>
                                <h6>Company Name</h6>
                                <div class="ratings">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star-half-o "></span>
                                    <span class="fa fa-star-o"></span>
                                    <span class="fa fa-star-o"></span>
                                </div> 
                                <img src="{{ asset('images/confirmation-image.jpg') }}" alt="">
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
                            </div>
                        </div>
                        <div class="ticket-option d-flex justify-content-start">
                            <div class="ticket-row">
                                <div class="ticket-header">
                                    <h5>Ticket Option</h5>
                                </div>
                                <div class="ticket-content">
                                    <div class="input-form d-flex">
                                        <div class="icon">
                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        </div>
                                            <input type="text " value="Bulan" readonly>
                                    </div>
                                    <div class="input-form d-flex">
                                        <div class="icon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" value="Sorsogon" readonly>
                                    </div>
                                    <div class="input-group">
                                        <div class="col-8 input-form d-flex justify-content-center">
                                            <div class="icon">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>    
                                            <input type="date" readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-4 input-form d-flex">
                                            <div class="icon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>    
                                            <input type="number" value="1" readonly>
                                        </div>
                                    </div>
                                    <div class="button-sec d-flex justify-content-center">
                                        <div class="submit">
                                            <button type="button" data-bs-dismiss="modal">SUBMIT</button>
                                        </div>
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
