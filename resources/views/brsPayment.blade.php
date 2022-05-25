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
                        <div class="button-sec d-flex justify-content-center mt-3">
                            <div class="submit">
                                <button type="button" data-bs-dismiss="modal">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
