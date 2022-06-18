@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
<link rel="stylesheet" href="{{asset('css/brspayment-style.css')}}"> 
@endpush

@section('content')

    <section class="payment">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class=" d-flex  justify-content-center align-items-center col-md-6">
                    <div class="qoute">Understand there is a price to be paid for achieving anything of significant. You must be willing to pay the price.</div>
                </div>
                <div class="col-md-6 payment-content">
                    <div class="payment-head">
                        <h2>Payment</h2>
                    </div>
                    <!-- <nav>
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
                    </div> -->

                    <div class="payment-content">
                        <form enctype="multipart/form-data" action="{{ route('booking.update', 'reservation_id') }}" method="POST" class="payment-inner">
                            @csrf
                            @method('PUT')
                            <input type="text" id="reservation_id" name="reservation_id" value="{{ old('reservation_id') }}" hidden>
                            <div class="row">
                                <div class="payment-type col-6">
                                    <div class="opt col-12">
                                        <input type="radio" class="btn-check" name="payment_options" id="opt-payment1" value="GCash" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="opt-payment1">
                                            <img src="{{ asset('images/brs-gcash-logo.png') }}" alt="">
                                            <span class="icon-txt primary">GCash</span>
                                        </label>
                                    </div>

                                    <div class="opt">
                                        <input type="radio" class="btn-check" name="payment_options" id="opt-payment2" value="PayMaya" autocomplete="off">
                                        <label class="btn btn-outline-success" for="opt-payment2">
                                            <img src="{{ asset('images/brs-paymaya-logo.png') }}" alt="">
                                            <span class="icon-txt success">PayMaya</span>
                                        </label>
                                    </div>

                                    <div class="opt">
                                        <input type="radio" class="btn-check" name="payment_options" id="opt-payment3" value="Palawan Express" autocomplete="off">
                                        <label class="btn btn-outline-warning" for="opt-payment3">
                                            <img src="{{ asset('images/brs-palawan-express-logo.jpg') }}" alt="">
                                            <span class="icon-txt warning">Palawan Express</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="cnt-details col-6 d-flex justify-content-center align-items-center">
                                    <div class="cnt-infobox">
                                        <h4 class="text-center py-3" id="cnt_header"></h4>
                                        <p>Account Name: <span class="fw-bold" id="cnt_accountName">Dondon linis</span></p>
                                        <p>Mobile Number: <span class="fw-bold" id="cnt_phonNo">09090502132</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="payment-ss">
                                        <center>
                                            <i>Please attach proof of payment here:</i>
                                            <div class="payment-img">
                                                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                                <input type="file" id="imgUpload" class="img-upload" name="imgUpload" accept="image/png,image/jpeg" required>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="button-sec d-flex justify-content-center mt-3">
                                    <div class="submit">
                                        <button type="submit" class="btn btn-success px-4">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            findChecked();

            $('.payment .btn-check').click(function() { 
                $(this).attr('checked', 'checked');
                findChecked();
            });

            function findChecked(){
                if($('#opt-payment1').is(':checked')){
                    $('#cnt_header').text("Payment for GCash");
                    $('#cnt_accountName').text("Dondon Liner");
                    $('#cnt_phonNo').text("09090502132");
                }else if($('#opt-payment2').is(':checked')){
                    $('#cnt_header').html("Payment for" + '<br>' + "PayMaya");
                    $('#cnt_accountName').text("Dondon Liner");
                    $('#cnt_phonNo').text("09090502132");
                }else if($('#opt-payment3').is(':checked')){
                    $('#cnt_header').html("Payment for" + '<br>' + "Palawan Express");
                    $('#cnt_accountName').text("Dondon Liner");
                    $('#cnt_phonNo').text("09090502132");
                }
            }
        })
    </script>

    <!-- <script>
        $("#btn_upload").on("click",function (e){
            var fileDialog = $('<input type="file">');
            fileDialog.click();
            fileDialog.on("change", onFileSelected);
                return false;
        });

        var onFileSelected = function(e){
            console.log($(this).val());
            $('#imgupload').val($(this).val())
        }

        function preview() {
            var frame = $('#frame');
            frame.src=URL.createObjectURL(event.target.files[0]);
        }
        
    </script> -->
    
@endsection
