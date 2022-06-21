@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsscheduling-style.css')}}"> 
@endpush

@section('content')
<section class="scheduling">
    <div class="">
        <div class="row">
            <div class="col-md-12 scheduling-header d-flex justify-content-between" style="padding:0;">
                <nav class="btn-tabs d-flex">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a href="#nav-schedule" class="nav-link active" id="nav-schedule-tab" data-bs-toggle="tab" data-bs-target="#nav-schedule" type="button" role="tab" aria-controls="nav-schedule" aria-selected="false">SCHEDULES</a>
                        <a href="#nav-route" class="nav-link" id="nav-route-tab" data-bs-toggle="tab" data-bs-target="#nav-route" type="button" role="tab" aria-controls="nav-route" aria-selected="false">ROUTES</a>
                    </div>
                </nav>
                <div class="add d-flex d-flex justify-content-center align-items-center">
                    <button id="btn_add_sched" class= "btn-add" data-bs-toggle="modal" data-bs-target="#brs-add-schedule">Add Schedule</button>
                    <button  id="btn_add_route" class= "add-routes" data-bs-toggle="modal" data-bs-target="#add-route-modal">Add Route</button>
                </div>
                    @include('schedule_views.add_schedule')
                    @include('schedule_views.brsRoute')
            </div>  
            <div class="tab-content d-flex justify-content-center" id="nav-tabContent">
                <div class="col-11 tab-pane fade show active" id="nav-schedule" aria-labelledby="nav-schedule-tab">
                    <div class="scheduling-content d-flex justify-content-center py-3">
                        <div class="inner-content col-md-11">
                            <div class="row title py-3">
                                <div class="col-4 d-flex align-items-center justify-content-center">Route</div>
                                <div class="col-2 d-flex align-items-center justify-content-center">Departure Time</div>
                                <div class="col-2 d-flex align-items-center justify-content-center">Bus Class</div>
                                <div class="col-2 d-flex align-items-center justify-content-center">Features</div>
                                <!-- <div class="col-2 d-flex align-items-center justify-content-center">Seat Status</div> -->
                                <div class="col-2 d-flex align-items-center justify-content-center">Actions </div>
                            </div>
                            @if($scheds)
                            @foreach($scheds as $scheduleList)
                            <div class="row sched_content my-2">
                                <div class="col-4 d-flex align-items-center justify-content-center">
                                    <div class="bus-route">
                                        <div class="route">{{$scheduleList->origin}} - {{$scheduleList->destination}}</div>
                                    </div>
                                    
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center">{{$scheduleList->departure_time}}</div>
                                <div class="col-2 d-flex align-items-center justify-content-center">{{$scheduleList->bus_class}}</div>
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <div class="features">
                                        <p>{{$scheduleList->with_wifi}}</p>
                                        <p>{{$scheduleList->with_tv}}</p>
                                    </div>
                                </div>
                                <!-- <div class="col-2 d-flex align-items-center justify-content-center">20 Left</div> -->
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <button  id="view" class= "views" data-bs-toggle="modal" data-bs-target="#view-details">View Details
                                    </button>
                                        @include('schedule_views.brsViewDetails')
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 tab-pane" id="nav-route" aria-labelledby="nav-route-tab">
                    <div class="row d-flex justify-content-center">
                        <div class="division col-11 d-flex justify-content-center">
                            <div class="terminal col-5 ">
                                <h6>Terminal</h6>
                                <div class="content">
                                    @if($routes)
                                    @foreach($routes as $routeList)
                                        @if($routeList->route_category == "Terminal")
                                            <div class="listofterminals">{{$routeList->place}}</div>
                                        @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="space col-1 ">
                            </div>
                            <div class="alongtheroad col-5 ">
                                <h6>Along The Road</h6>
                                <div class="content">
                                    @if($routes)
                                    @foreach($routes as $routeList)
                                        @if($routeList->route_category == "Along The Road")
                                            <div class="listofroads">{{$routeList->place}}</div>
                                        @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function(){
        var dep_time;
        var acro_sched;
        /* $('#bus_schedule').on('change', function(){
        }); */
        $('#departure_time').on('change', function(){
            if($('#bus_schedule :selected').val() == "Daily"){
                acro_sched = "DLY";
            } else if($('#bus_schedule :selected').val() == "Weekdays"){
                acro_sched = "WKDS";
            } else if($('#bus_schedule :selected').val() == "Weekends"){
                acro_sched = "WKES";
            }
            dep_time = $('#departure_time').val().slice(0, 2) + $('#departure_time').val().slice(3);
            
            var transID = acro_sched + "-" + dep_time + "-" + Math.floor((Math.random() * 99999) + 1);

            $('#trans_id').val(transID);
            /* alert(transID); */
        });
    });
</script>

<script>
    $('#fare').on('change', function(){
        $('#fare').val($('#fare').val() + ".00")
    });
</script>

<script>
    $('#btn_add_sched').on('click', function(){
        $('#brs-add-schedule form')[0].reset();
    });
</script>

<script>
    onChangeOption();

    $(document).ready(function(){
        $('#add_routeCol').click(function(){
            var newElem = "";
            newElem += '<tr>';
            newElem += '<td><div class="form-group">';
            newElem += '<select name="route_category[]" class="form-select route_bus" required>';
            newElem += '<option selected>Choose Option</option>';
            newElem += '<option value="Terminal">Terminal</option>';
            newElem += '<option value="Along The Road">Along The Road</option>';
            newElem += '</select>';
            newElem += '</div></td>';
            newElem += '<td><div class="form-group">';
            newElem += '<input type="text" name="place[]" class="form-control inputted_place"  placeholder="" required/>';
            newElem += '</div></td>';
            newElem += '<td><button type="button" id="remove_routeCol" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
            newElem += '</tr>';

            $('#route_tbl').append(newElem);

            

            onChangeOption();
            
        });
        
    });

    $(document).on('click', '#remove_routeCol', function(){
        $(this).closest('tr').remove();
    })

    $(document).on('hidden.bs.modal', function(){
        $('#add-route-modal #route_tbl').find("tr:gt(0)").remove();
        $('#add-route-modal form')[0].reset();
    })

    function onChangeOption(){
        $('.route_bus').change(function(){
            var parentTR = $(this).closest('tr');
            if($(this).val() == 'Terminal'){
                parentTR.find('.inputted_place').attr("placeholder","Add Terminal");
            }else if($(this).val() == 'Along The Road'){
                parentTR.find('.inputted_place').attr("placeholder","Add Along The Road");
            }else{
                parentTR.find('.inputted_place').attr("placeholder","");
            }
        });
    }
</script>

<script> 
        $("#btn_add_route").hide();
        $("#btn_add_sched").show();
        $("#nav-schedule-tab").click(function(){
            $("#btn_add_route").hide();
            $("#btn_add_sched").show();
        });
        $("#nav-route-tab").click(function(){
            $("#btn_add_sched").hide();
            $("#btn_add_route").show();
        });
        
</script>

<script>
    $(".nav-tabs").find("button a").last().click();

    var url = document.URL;
    var hash = url.substring(url.indexOf('#'));

    $(".nav-tabs").find("button a").each(function(key, val) {

        if (hash == $(val).attr('href')) {

            $(val).click();

        }
        $(val).click(function(ky, vl) {

            console.log($(this).attr('href'));
            location.hash = $(this).attr('href');
        });

    });
</script>

@endsection