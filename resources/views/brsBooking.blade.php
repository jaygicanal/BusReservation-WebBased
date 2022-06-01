@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsbooking-style.css')}}"> 

@endpush
@section('content')

<section class="booking">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="booking-head d-flex">                    
                    <nav class="booking-inner col-12 d-flex">
                        <div class="nav nav-tabs col-5" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-book-tab" data-bs-toggle="tab" data-bs-target="#nav-book" type="button" role="tab" aria-controls="nav-book" aria-selected="false">BOOKED</button>
                            <button class="nav-link " id="nav-confirm-tab" data-bs-toggle="tab" data-bs-target="#nav-confirm" type="button" role="tab" aria-controls="nav-confirm" aria-selected="true">CONFIRMED</button>
                            <button class="nav-link " id="nav-cancel-tab" data-bs-toggle="tab" data-bs-target="#nav-cancel" type="button" role="tab" aria-controls="nav-cancel" aria-selected="true">CANCELED </button>
                        </div>
                        <div class="search d-flex col-7 justify-content-end align-items-center">
                            <div class="book-search" id="book-id">
                                <div class="search-box d-flex">
                                    <span class="input-group-text ">Search</span><input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="confirm-search" id="confirm-id">
                                <div class="search-box d-flex">
                                    <span class="input-group-text ">Search</span><input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="cancel-search" id="cancel-id">
                                <div class="search-box d-flex">
                                    <span class="input-group-text ">Search</span><input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="tab-content d-flex justify-content-center" id="nav-tabContent">
                    <div class="col-11 tab-pane fade show active" id="nav-book" aria-labelledby="nav-book-tab">
                        <div class="book-content">
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Route</th>
                                    <th scope="col">View Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($booked)
                                    @foreach($booked as $bookedList)
                                    <tr>
                                        <th scope="row">{{$bookedList->id}}</th>
                                        <td>{{$bookedList->lname}}, {{$bookedList->fname}} {{$bookedList->mname}}</td>
                                        <td>{{$bookedList->departure_date}}</td>
                                        <td>{{$bookedList->departure_time}}</td>
                                        <td>{{$bookedList->origin}} - {{$bookedList->destination}}</td>
                                        <td>
                                            <div type="button" class="btn-inner">
                                                <a type="button" data-bs-toggle="modal" data-id="{{$bookedList->id}}" data-fname="{{$bookedList->fname}}" data-mname="{{$bookedList->mname}}" data-lname="{{$bookedList->lname}}" data-origin="{{$bookedList->origin}}" data-destination="{{$bookedList->destination}}" data-departure_date="{{$bookedList->departure_date}}" data-departure_time="{{$bookedList->departure_time}}" data-seat_no="{{$bookedList->seat_no}}" data-totalFare="{{$bookedList->total_fare}}" data-payment_type="{{$bookedList->payment_type}}" data-payment_ss="{{$bookedList->payment_ss}}" data-status="{{$bookedList->status}}" data-trans_id="{{$bookedList->trans_id}}" data-bus_class="{{$bookedList->bus_class}}" data-with_wifi="{{$bookedList->with_wifi}}" data-with_tv="{{$bookedList->with_tv}}" data-bs-target="#confirm_view"><em class="fa fa-eye" aria-hidden="true"></em>View</a>
                                            </div>
                                            @include('booking_views.brsBook_Confirm')
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-11 tab-pane fade" id="nav-confirm" aria-labelledby="nav-confirm-tab">
                        <div class="confirm-content">
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Origin</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Bus Seat</th>
                                    <th scope="col">Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mauro Laudit</td>
                                    <td>10/10/22</td>
                                    <td>9:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>1</td>
                                    <td>Gcash</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Kenneth Casim</td>
                                    <td>11/11/22</td>
                                    <td>6:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>2</td>
                                    <td>Paymaya</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane col-11 fade" id="nav-cancel" aria-labelledby="nav-cancel-tab">
                        <div class="cancel-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Origin</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Bus Seat</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Refund</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mauro Laudit</td>
                                    <td>10/10/22</td>
                                    <td>9:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>1</td>
                                    <td>Gcash</td>
                                    <td><button class="refund">Refund</button></td> 
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Kenneth Casim</td>
                                    <td>11/11/22</td>
                                    <td>6:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>2</td>
                                    <td>Paymaya</td>
                                    <td><button class="refund">Refund</button></td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script> 
        $("#book-id").show();
        $("#confirm-id").hide();
        $("#cancel-id").hide();
        $("#nav-book-tab").click(function(){
            $("#book-id").show();
            $("#confirm-id").hide();
            $("#cancel-id").hide();
        });
        $("#nav-confirm-tab").click(function(){
            $("#book-id").hide();
            $("#confirm-id").show();
            $("#cancel-id").hide();
        });
        $("#nav-cancel-tab").click(function(){
            $("#book-id").hide();
            $("#confirm-id").hide();
            $("#cancel-id").show();
        });
        
</script>

    <!-- Fetch Bus Data -->
    <script>    
        $('#confirm_view').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var fname = button.data('fname')
            var mname = button.data('mname')
            var lname = button.data('lname')
            var origin = button.data('origin')
            var destination = button.data('destination')
            var date = button.data('departure_date')
            var time = button.data('departure_time')
            var seat_no = button.data('seat_no')
            var totalFare = button.data('fare')
            var payment_type = button.data('payment_type')
            var payment_ss = button.data('payment_ss')
            var transitID = button.data('trans_id')
            var busClass = button.data('bus_class')
            var wifi = button.data('with_wifi')
            var tv = button.data('with_tv')

            var modal = $(this);
            /* modal.find('.modal-title').text('View Resident Profile'); */
            var source = "{!! asset('images/Payment/"+ payment_ss + "') !!}";
            $('#imgUploaded').attr('src', source);
            /* modal.find('#confirm_view .screenshot').html(imageURL); */
            // modal.find('.bus-detail #bus_class').val(bus_class);
            // modal.find('.bus-detail #departure_time').val(departure);
            // modal.find('.bus-detail #wifi').val(wifi);
            // modal.find('.bus-detail #tv').val(tv);
            // modal.find('.bus-detail .price #fare').val(fare);
            // $('#origin_confirmation').val($('#origin').val());
            // $('#destination_confirmation').val($('#destination').val());
            // $('#date_confirmation').val($('#date').val());

            
        })
    </script>
@endsection