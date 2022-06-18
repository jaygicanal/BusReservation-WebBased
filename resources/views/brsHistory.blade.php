@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
<link rel="stylesheet" href="{{asset('css/brshistory-style.css')}}"> 
@endpush
@section('content')
<div class="history">
    <div class="container">
        @if($reservedData)
        @foreach($reservedData as $reservationlist)
        <div class="row history_inner d-flex justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="h4">
                    <span  class="origin">{{$reservationlist->origin}}</span> -
                    <span class="destination">{{$reservationlist->destination}}</span>
                </div>
            </div>
            <div class="col-4">
                <div class="seat_no text-center">Seat No. {{$reservationlist->seat_no}}</div>
                <div class="class text-center">{{$reservationlist->bus_class}}</div>
                <div class="grp text-center">
                    <span class="departure_date">{{$reservationlist->departure_date}}</span> | <span class="departure_time">{{$reservationlist->departure_time}}</span>
                </div>
            </div>
            <div class="col-3">
                <div class="h4 total_fare text-center">Php {{$reservationlist->total_fare}}</div>
                <div class="payment_type text-center">{{$reservationlist->payment_type}}</div>
                
            </div>
            <div class="col-3 text-center">
                <div class="h4 status {{$reservationlist->status}}">
                    @if($reservationlist->status == "Booked")
                        --Pending--
                    @else
                        --{{$reservationlist->status}}--
                    @endif
                </div>
            </div>
            <div class="col-2 text-center">
            <button  id="cancel" class= "views" data-bs-toggle="modal" data-bs-target="#cancel-button">Cancel</button>
            </div>
            @include('brsCancelButton');
        </div>
        @endforeach
        @endif
    </div>
</div>

    <script>
        $(document).ready(function(){
            findChecked();

            $('.history .btn-check').click(function() { 
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

@endsection

