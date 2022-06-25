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
                                            <select class="from-city from-city-sm" onblur="this.size=1;" aria-label=".form-select-lg example" id="origin" name="origin">
                                                <option selected>Origin</option>
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
                                        <select class="to-city to-city-sm " onblur="this.size=1;"  aria-label=".form-select-lg example" id="destination" name="destination">
                                            <option selected>Destination</option>
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
<section class="sched-bus pt-5">
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
                    <tbody id="schedule_tbl">
                    
                    </tbody>
                    @include('brsBusSeat')
                </table>
            </div>
        </div>
    </div>
</section>

    <script type="text/javascript">
        $(document).ready(function(){
            /* $('#findBus').click(function(){
                searchSeats();
            }) */
            $('#bus_details').on('show.bs.modal', function(event){
                
            })
            
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            searchBus();
            $('#findBus').click(function(){
                $("#scheduledBus").find("tr:gt(0)").remove();
                searchBus();
            })
            function searchBus(){
                $.ajax({
                    url: '{{ route('searchBusSchedule') }}',
                    type: 'GET',
                    data:{origin:$('#origin').val(), destination:$('#destination').val(), schedule:$('#dayWeek').val()},
                    success: function(response){ // What to do if we succeed
                        if (response == "") {
                            var noData = '';
                            noData+='<tr><td colspan="4">';
                            noData+='--No Schedule Found--</td></tr>';
                            $('#schedule_tbl').append(noData);
                        }else{
                            $.each(response, function(index, item) {
                                var newRow='';
                                newRow+='<tr><td>';
                                newRow+='<span data-label="origin">'+item.origin+'</span> - <span data-label="destination">'+item.destination+'</span></td>';
                                newRow+='<td data-label="departure_time">'+item.departure_time+'</td>';
                                newRow+='<td data-label="bus_class">'+item.bus_class+'</td>';
                                newRow+='<td><div type="button" class="btn-inner">';
                                newRow+='<a data-bs-toggle="modal" type="button" data-trans_id="'+item.trans_id+'" data-depart_time="'+item.departure_time+'" data-bus_class="'+item.bus_class+'" data-with_wifi="'+item.with_wifi+'" data-with_tv="'+item.with_tv+'" data-fare="'+item.fare+'" data-bs-target="#bus_details" class="text-nav btn-view-details d-flex align-items-center justify-content-center" id="btn_viewSeats">';
                                newRow+='<em class="fa fa-eye" aria-hidden="true"></em>View</a>';
                                newRow+='</div></td></tr>';

                                $('#schedule_tbl').append(newRow);
                            });
                        }
                    }
                });
            }
        })
    </script>

    <!-- Fetch Bus Data -->
    <script>    
        $('#bus_details').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var trans_id = button.data('trans_id')
            var departure = button.data('depart_time')
            var bus_class = button.data('bus_class')
            var wifi = button.data('with_wifi')
            var tv = button.data('with_tv')
            var fare = button.data('fare')
            
            $('.seats-list .grp-inner').each(function(){
                if($(this).hasClass("reserved")){
                    $(this).removeClass('reserved');
                }
            })
            searchSeats(trans_id);

            var modal = $(this);
            /* modal.find('.modal-title').text('View Resident Profile'); */
            modal.find('.bus-detail #transit_id').val(trans_id);
            modal.find('.bus-detail #bus_class').val(bus_class);
            modal.find('.bus-detail #departure_time').val(departure);
            modal.find('.bus-detail #wifi').val(wifi);
            modal.find('.bus-detail #tv').val(tv);
            modal.find('.bus-detail .price #fare').val(fare);
            $('#origin_confirmation').val($('#origin').val());
            $('#destination_confirmation').val($('#destination').val());
            $('#date_confirmation').val($('#date').val());

            var discount = 0.00;
            var totFare = 0.00;
            if($('#chk_discount').val() == "None"){
                discount = $('#fare').val() * .00;
                totFare = $('#fare').val() - discount;
                $('#discount').val(-discount);
                $('#totalFare').val(totFare);
            }else if($('#chk_discount').val() == "Student" || $('#chk_discount').val() == "Senior Citizen" || $('#chk_discount').val() == "PWD"){
                discount = $('#fare').val() * .20;
                totFare = $('#fare').val() - discount;
                $('#discount').val(-discount);
                $('#totalFare').val(totFare);
            }
        })

        function searchSeats(id){
            $.ajax({
                url: '{{ route('searchSeats') }}',
                type: 'GET',
                data:{id:id, date:$('#date').val()},
                success: function(response){ // What to do if we succeed
                    console.log(response);
                    $.each(response, function(index, item) {
                        var parentGrp = $('.grp-seats');
                        $('.seat-nbr:contains('+item.seat_no+'):first').closest('.grp-inner').addClass('reserved');
                    });
                    
                }
            });
        }
    </script>

    
    <script>
        $(document).ready(function(){
            var seat_selected = false;
            $('.grp-inner').click(function(){
                var seat_number = $(this).find('.seat-nbr').text();

                if($(this).hasClass("selected")  && seat_selected == true){
                    $(this).removeClass('selected');
                    seat_selected = false;

                    $('#seat_no').val('');
                }else if($(this).hasClass("reserved")){
                    seat_selected = false;
                }else if(!$(this).hasClass("selected")  && seat_selected == false){
                    $(this).addClass('selected');
                    seat_selected = true;
                    
                    $('#seat_no').val(seat_number);
                }

                var name = $('#user_name').val();
                var acronym = name.match(/\b(\w)/g).join('');

                var date_departure = $('#date_confirmation').val();
                var replaced = date_departure.replace(/-/g, '');
                
                $('#reservation_id').val(acronym + "-" + replaced + "-" + seat_number + "-" +  Math.floor((Math.random() * 99999) + 1));

                
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



