@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brslandingpage-style.css')}}">   
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script> 
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
                    <form action="searchBusSched" method="get">
                        @csrf
                        <div class="row form-reserve">
                            <div class="input-form col-6">
                                    <div class="from">
                                        <div class="text d-flex">
                                            <!-- <i class="fa fa-dot-circle-o" aria-hidden="true"></i> -->
                                            <div class="cmb-ttl">O R I G I N</div>
                                        </div>
                                        <div class="cmb-group">
                                            <select class="from-city from-city-sm " onblur="this.size=1;"  aria-label=".form-select-lg example" id="origin">
                                                <option selected>Pick-Up Location</option>
                                                <optgroup label="Terminal">
                                                @if($routes)
                                                @foreach($routes as $routesList)
                                                    @if($routesList->route_category == "Terminal")
                                                        <option value="{{$routesList->place}}">{{$routesList->place}}</option>
                                                    @endif
                                                @endforeach
                                                @endif
                                                </optgroup>
                                                <optgroup label="Along The Road">
                                                @if($routes)
                                                @foreach($routes as $routesList)
                                                    @if($routesList->route_category == "Along The Road")
                                                        <option value="{{$routesList->place}}">{{$routesList->place}}</option>
                                                    @endif
                                                @endforeach
                                                @endif
                                                </optgroup>
                                            </select>
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
                                        <select class="to-city to-city-sm " onblur="this.size=1;"  aria-label=".form-select-lg example" id="destination">
                                            <option selected>Landingan Location</option>
                                            <optgroup label="Terminal">
                                            @if($routes)
                                            @foreach($routes as $routesList)
                                                @if($routesList->route_category == "Terminal")
                                                    <option value="{{$routesList->place}}">{{$routesList->place}}</option>
                                                @endif
                                            @endforeach
                                            @endif
                                            </optgroup>
                                            <optgroup label="Along The Road">
                                            @if($routes)
                                            @foreach($routes as $routesList)
                                                @if($routesList->route_category == "Along The Road")
                                                    <option value="{{$routesList->place}}">{{$routesList->place}}</option>
                                                @endif
                                            @endforeach
                                            @endif
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group d-flex justify-content-center">
                                <div class="col-9 input-form d-flex justify-content-center">
                                    <div class="icon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>    
                                    <input type="date" id="date" name="date" placeholder="Date" required/>
                                    <input type="text" id="dayWeek" name="dayWeek" placeholder="Day of the Week" required/>
                                </div>
                            </div>
                            <div class="form-nav d-flex justify-content-center">
                                <button type="button" id="findBus" name="findBus">Find A Bus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sched-bus">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 sched-content justify-content-center">  
                <table class="table" id="scheduledBus">
                    <thead>
                        <tr>
                        <th scope="col">Route</th>  
                        <th scope="col">Time</th>
                        <th scope="col">Class</th>
                        <th scope="col">View Seats</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- @if($bus_scheds)
                        @foreach($bus_scheds as $busSchedules)
                        <tr>
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
                                    <a data-bs-toggle="modal" type="button" data-trans_id="{{$busSchedules->trans_id}}" data-depart_time="{{$busSchedules->departure_time}}" data-bus_class="{{$busSchedules->bus_class}}" data-with_wifi="{{$busSchedules->with_wifi}}" data-with_tv="{{$busSchedules->with_tv}}" data-bs-target="#bus_details" class="text-nav btn-view-details d-flex align-items-center justify-content-center" id="btn_viewSeats">
                                        <em class="fa fa-eye" aria-hidden="true"></em>View
                                    </a>
                                    @include('brsBusSeat')
                                </div>
                            </td> 
                        </tr>
                        @endforeach
                        @endif -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

    <script type="text/javascript">
        $('#findBus').click(function(){
            var origin = $('#origin :selected').val();
            var destination = $('#destination :selected').val();
            var dayWeek = $('#dayWeek').val();
            $.ajax({
                type : 'get',
                url : '{{route('search.busschedule')}}',
                data:{'origin':origin, 'destination':destination, 'date':dayWeek},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        })
    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

    <!-- <script>
        $(document).ready(function(){
            searchData();

            $('#findBus').click(function(){
                var origin = $('#origin :selected').val();
                var destination = $('#destination :selected').val();
                var dayWeek = $('#dayWeek').val();

                if(origin != "Pick-Up Location" && destination != "Landingan Location" && dayWeek != ''){
                    $('#scheduledBus').DataTable().destroy();
                    searchData(origin, destination, dayWeek)
                }else{
                    Swal.fire({
                        title: "Cannot Find Anything!",
                        text: "Please check if you select an option",
                        icon: "warning",
                        showCloseButton: true,
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            });

            function searchData(filterOrigin, filterDestination, filterDate){
                var dataTable = $('#scheduledBus').DataTable({
                    processing: true,
                    serverSide: true, 
                    ajax:{
                        url:"route('dashboard')",
                        data: {filterOrigin:filterOrigin, filterDestination:filterDestination, filterDate:filterDate},
                    },
                    columns: [
                        {
                            data:'origin',
                            name:'origin'
                        },
                        {
                            data:'destination',
                            name:'destination'
                        },
                        {
                            data:'via',
                            name:'via'
                        },
                        {
                            data:'departure_time',
                            name:'departure_time'
                        },
                        {
                            data:'bus_class',
                            name:'bus_class'
                        },
                    ]
                });
            }
        });
    </script> -->

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
            $('#origin_confirmation').val($('#origin').val());
            $('#destination_confirmation').val($('#destination').val());
            $('#date_confirmation').val($('#date').val());
        })
    </script>

    
    <script>
        $(document).ready(function(){
            var seat_selected = false;
            $('.grp-inner').click(function(){
                var seat_number = $(this).find('.seat-nbr').text();

                /* if(!$(this).hasClass("selected") && seat_selected == true){
                    $(this).removeClass('selected');
                }else */ if($(this).hasClass("selected")  && seat_selected == true){
                    $(this).removeClass('selected');
                    seat_selected = false;

                    $('#seat_no').val('');
                }else if(!$(this).hasClass("selected")  && seat_selected == false){
                    $(this).addClass('selected');
                    seat_selected = true;
                    
                    $('#seat_no').val(seat_number);
                }
            });

            /* $('#btn_viewSeats').click(function(){
                $( '.grp-inner' ).each(function() {
                    if($(this).hasClass("selected")){
                        $(this).removeClass('selected');
                        var seat_selected = true;
                        $('#seat_no').val("");
                    }
                });
            }); */
        })
    </script>
    
    <script>
        var date = new Date().toISOString().slice(0,10);
        $('#date').attr('min', date);  //To restrict past date
        
        $('#date').change(function(){
            var intDate = new Date($('#date').val());
            dayIndex = intDate.getDay();
            // alert(dayIndex);

            if(dayIndex == 0 || dayIndex == 6){
                $('#dayWeek').val("Weekend");
            }else if(dayIndex == 1 || dayIndex == 2 || dayIndex == 3 || dayIndex == 4 || dayIndex == 5){
                $('#dayWeek').val("Weekdays");
            }
            /* if(dayIndex == 0){
                $('#dayWeek').val("Sunday");
            }else if(dayIndex == 1){
                $('#dayWeek').val("Monday");
            }else if(dayIndex == 2){
                $('#dayWeek').val("Tuesday");
            }else if(dayIndex == 3){
                $('#dayWeek').val("Wednesday");
            }else if(dayIndex == 4){
                $('#dayWeek').val("Thursday");
            }else if(dayIndex == 5){
                $('#dayWeek').val("Friday");
            }else if(dayIndex == 6){
                $('#dayWeek').val("Saturday");
            } */
        })
    </script>
@endsection



