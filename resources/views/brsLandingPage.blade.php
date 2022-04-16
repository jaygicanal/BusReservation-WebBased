@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
<link rel="stylesheet" href="{{asset('css/brslandingpage-style.css')}}">    
@endpush

@section('content')
<section class="find-bus-section" >
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-7 inner-content">
                <div class="head-content">
                    <div class="h3">Book a Ride Now!</div>
                </div>
                <div class="form-content d-flex justify-content-center ">
                    <div class="form-reserve">
                        <div class="input-form d-flex">
                            <div class="icon">
                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            </div>
                            <input type="text" id="from-id" name="from" placeholder="From" required>
                        </div>
                        <div class="input-form d-flex">
                            <div class="icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>    
                            <input type="text" id="to-id" name="to" placeholder="To" required>
                        </div>
                        <div class="input-group">
                            <div class="col-8 input-form d-flex justify-content-center">
                                <div class="icon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>    
                                <input type="date" id="date-id" name="date" placeholder="" required>
                            </div>
                            <!-- <div class="space-margin"></div> -->
                            <div class="col-4 input-form d-flex">
                                <div class="icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>    
                                <input type="number" id="tp-id" name="tp" placeholder="0" min="0" oninput="validity.valid||(value='');" required>
                            </div>
                        </div>
                        <div class="form-nav d-flex justify-content-center">
                            <button ><a href="{{ url('available-bus') }}">Find A Bus</a></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>
@endsection


