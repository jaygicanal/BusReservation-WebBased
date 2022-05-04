@extends('layouts.brsApp')
@include('brsHeader')

@push('styles')
<link rel="stylesheet" href="{{asset('css/brslistofbus-style.css')}}"> 
@endpush

@section('content')
    <section class="listofbus">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <!-- Box Section -->
                <div class="bus-box col-md-10 d-flex justify-content-start">
                    <div class="bus-img">
                        <img src="{{ asset('images/landing-background.jpg') }}" alt="">
                    </div>
                    <div class="bus-info">
                        <div class="bus-category d-flex justify-content-center">CLASS</div>
                        <div class="bus-name">Dondon linis</div>
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
                        <div class="box-footer d-flex justify-content-between align-items-center">
                            <div class="dep-time">
                                <p>Departure: <strong>09:30 AM</strong></p>
                            </div>
                            <div class="bus-price d-flex justify-content-end">
                                <div class="price-inner">
                                    <div class="price">P100.00/<span><i class="fa fa-user" aria-hidden="true"></i></span></div>
                                    <!-- modal -->
                                    <button type="button" data-bs-toggle="modal" data-bs-target=".brs-getticket"> Get Ticket</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Box Section -->
            </div>
            <!-- Modal  -->
            <div class="modal fade brs-getticket" role="dialog" aria-labelledby="ConfirmationModal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="confirmstion-col row d-flex justify-content-center">
                            <div class="standard-bus col-md-7 d-flex justify-content-center">
                                <div class="confimation-header">
                                    <h1>Standard Bus</h1>
                                    <h3>Dondon Linis</h3>
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
                            <div class="ticket-option col-md-5 d-flex justify-content-center">
                                <div class="ticket-row">
                                    <div class="ticket-header">
                                        <h1>Ticket Option</h1>
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
                                                <input type="date" value="01/10/22"readonly>
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
                                            <div class="cancel">
                                                <button type="button" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="pads ps-2 "></div>
                                            <div class="continue">
                                                <button type="button"><a href="{{ url('payment') }}">Continue</a></button>
                                            </div>
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