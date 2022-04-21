@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
<link rel="stylesheet" href="{{asset('css/brspayment-style.css')}}"> 
@endpush

@section('content')

    <section class="payment">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-7 payment-content">
                    <div class="payment-head">
                        <h2>Payment</h2>
                    </div>
                    <nav>
                        <div class="payment-inner">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-Paymaya-tab" data-bs-toggle="tab" data-bs-target="#nav-Paymaya" type="button" role="tab" aria-controls="nav-Paymaya" aria-selected="true">Paymaya</button>
                                <button class="nav-link" id="nav-Palawan-Express-tab" data-bs-toggle="tab" data-bs-target="#nav-Palawan-Express" type="button" role="tab" aria-controls="nav-Palawan-Express" aria-selected="false">Palawan Express</button>
                                <button class="nav-link" id="nav-Gcash-tab" data-bs-toggle="tab" data-bs-target="#nav-Gcash" type="button" role="tab" aria-controls="nav-Gcash" aria-selected="false">Gcash</button>
                            </div>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-Paymaya" aria-labelledby="nav-Paymaya-tab">Paymaya</div>
                        <div class="tab-pane fade" id="nav-Palawan-Express" aria-labelledby="nav-Palawan-Express-tab">Palawan Express</div>
                        <div class="tab-pane fade" id="nav-Gcash" aria-labelledby="nav-Gcash-tab">Gcash</div>
                    </div>
                </div>
                <div class="col-md-5  payment-content">
                   
                </div>
            </div>
        </div>
    </section>
    
@endsection
