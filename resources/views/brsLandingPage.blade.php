@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brslandingpage-style.css')}}">   
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script> 

    <script>
        $(document).ready(function(){
            var seat_selected = false;
            $('.grp-inner').click(function(){
                var seat_number = $(this).find('.seat-nbr').text();

                if(!$(this).hasClass("selected") && seat_selected == true){
                    $(this).removeClass('selected');
                }else if($(this).hasClass("selected")  && seat_selected == true){
                    $(this).removeClass('selected');
                    seat_selected = false;

                    $('#seat_no').val('');
                }else if(!$(this).hasClass("selected")  && seat_selected == false){
                    $(this).addClass('selected');
                    seat_selected = true;
                    
                    $('#seat_no').val(seat_number);
                }
            })
        })
    </script>

@endpush

@section('content')
<section class="find-bus-section">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-7 inner-content">
                <div class="head-content">
                    <div class="h3">Book a Ride Now!</div>
                </div>
                <div class="form-content d-flex justify-content-center ">
                    <div class="row form-reserve">
                        <div class="input-form col-6">
                            
                            <div class="from">
                                <div class="text d-flex">
                                    <!-- <i class="fa fa-dot-circle-o" aria-hidden="true"></i> -->
                                    <div class="cmb-ttl">O R I G I N</div>
                                </div>
                                <div class="cmb-group">
                                    <select class="from-city from-city-sm " onblur="this.size=1;"  aria-label=".form-select-lg example" id="frm-city-dd">
                                        <option selected>Pick-Up Location</option>
                                        <optgroup label="Terminal">
                                            <option value="Bulan Terminal">Bulan Terminal</option>
                                            <option value="Sorsogon Terminal">Sorsogon Terminal</option>
                                        </optgroup>
                                        <optgroup label="Along The Road">
                                            <option value="Bulan Terminal">Trese</option>
                                            <option value="Bulan Terminal">Irosin</option>
                                            <option value="Bulan Terminal">Bulan</option>
                                            <option value="Bulan Terminal">Casiguran</option>
                                            <option value="Bulan Terminal">Abuyog</option>
                                        </optgroup>
                                    <select class="from-option from-option-sm " onblur="this.size=1;" aria-label=".form-select-lg example" id="frm-opt-dd" hidden></select>
                                    <select class="from-barangay from-barangay-sm " onblur="this.size=1;" aria-label=".form-select-lg example" id="frm-brgy-dd" hidden></select>
                                </div>
                            </div>
                        </div>
                        <div class="input-form col-6 ">
                            <div class="to ">
                                <div class="text">
                                    <!-- <i class="fa fa-map-marker" aria-hidden="true"></i> -->
                                    <div class="cmb-ttl">D E S T I N A T I O N </div>
                                </div>
                                <div class="cmb-group">
                                    <select class="to-city to-city-sm " onblur="this.size=1;"  aria-label=".form-select-lg example" id="to-city-dd">
                                        <option selected>Landingan Location</option>
                                        <option value="Male">Terminal</option>
                                        <option value="Female">Along The Road</option>
                                    </select>
                                    <select class="to-option to-option-sm " onblur="this.size=1;" aria-label=".form-select-lg example" id="to-opt-dd" hidden></select>
                                    <select class="to-barangay to-barangay-sm" onblur="this.size=1;" id="to-brgy-dd" hidden></select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group d-flex justify-content-center">
                            <div class="col-5 input-form d-flex justify-content-center">
                                <div class="icon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>    
                                <input type="date" id="date" name="date" placeholder="Date" required/>
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
<section class="sched-bus">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 sched-content justify-content-center">  
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Route</th>  
                        <th scope="col">Time</th>
                        <th scope="col">Class</th>
                        <th scope="col">View Seats</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($bus_scheds)
                        @foreach($bus_scheds as $busSchedules)
                        <tr>
                            <!-- <div class="hidden_contents d-none">
                                {{$busSchedules->id}} - {{$busSchedules->trans_id}}
                            </div> -->
                            <td>
                                <span data-label="origin">{{$busSchedules->origin}}</span> - <span data-label="destination">{{$busSchedules->destination}}</span>
                                @if($busSchedules->via != "-")
                                <div class="via" data-label="via">via {{$busSchedules->via}}</div>
                                @endif
                            </td>
                            <td data-label="departure_time">{{$busSchedules->departure_time}}</td>
                            <td data-label="bus_class">{{$busSchedules->bus_class}}</td>
                            <td>
                                <div type="button" class="btn-inner">
                                    <!-- <a href="#" class="text-nav btn-update d-flex align-items-center justify-content-center"><em class="fa fa-pencil" aria-hidden="true"></em>Edit</a> -->
                                    <a data-bs-toggle="modal" type="button" data-trans_id="{{$busSchedules->trans_id}}" data-depart_time="{{$busSchedules->departure_time}}" data-bus_class="{{$busSchedules->bus_class}}" data-with_wifi="{{$busSchedules->with_wifi}}" data-with_tv="{{$busSchedules->with_tv}}" data-bs-target="#bus_details" class="text-nav btn-view-details d-flex align-items-center justify-content-center">
                                        <em class="fa fa-eye" aria-hidden="true"></em>View
                                    </a>
                                    @include('brsBusSeat')
                                </div>
                            </td> 
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script></script>

<!-- Fetch Bus Data -->
<script>    
        $('#bus_details').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var trans_id = button.data('trans_id')
            var departure = button.data('depart_time')
            var bus_class = button.data('bus_class')
            var wifi = button.data('with_wifi')
            var tv = button.data('with_tv')
            

            var modal = $(this);
            /* modal.find('.modal-title').text('View Resident Profile'); */
            modal.find('.bus-detail #transit_id').val(trans_id);
            modal.find('.bus-detail #bus_class').val(bus_class);
            modal.find('.bus-detail #departure').val(departure);
            modal.find('.bus-detail #wifi').val(wifi);
            modal.find('.bus-detail #tv').val(tv);
        })
    </script>
@endsection



