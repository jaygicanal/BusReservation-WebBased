@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsscheduling-style.css')}}"> 
@endpush

@section('content')
<section class="scheduling">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="scheduling-header d-flex justify-content-end align-items-center">
                    <div class="add">
                        <button id="btn_add_sched" class= "btn-add" data-bs-toggle="modal" data-bs-target="#brs-add-schedule">Add Schedule</button>
                        <button  class= "add-routes">Add Route</button>
                    </div>
                    @include('schedule_views.add_schedule')
                </div>
                
                <div class="scheduling-content d-flex justify-content-center py-3">
                    <div class="inner-content col-md-11">
                        <div class="row py-3">
                            <div class="col-3 d-flex align-items-center justify-content-center">Route</div>
                            <div class="col-2 d-flex align-items-center justify-content-center">Departure Time</div>
                            <div class="col-2 d-flex align-items-center justify-content-center">Bus Class</div>
                            <div class="col-2 d-flex align-items-center justify-content-center">Features</div>
                            <div class="col-2 d-flex align-items-center justify-content-center">Seat Status</div>
                            <div class="col-1 d-flex align-items-center justify-content-center">Actions </div>
                        </div>
                        
                        @if($scheds)
                        @foreach($scheds as $scheduleList)
                        <div class="row sched_content my-2">
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <div class="bus-route">
                                    <div class="route">{{$scheduleList->origin}} - {{$scheduleList->destination}}</div>
                                    @if($scheduleList->via != "-")
                                    <div class="via">via {{$scheduleList->via}}</div>
                                    @endif
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
                            <div class="col-2 d-flex align-items-center justify-content-center">20 Left</div>
                            <div class="col-1 d-flex align-items-center justify-content-center"><button>View Details</button></div>
                        </div>
                        @endforeach
                        @endif
                        <!-- <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Route</th>
                                <th scope="col">Departure Time</th>
                                <th scope="col">Bus Class</th>
                                <th scope="col">Seat Status</th>
                                <th scope="col">Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="row_sched">
                                    <td>Bulan - Sorsogon</td>
                                    <td>10:00 AM</td>
                                    <td>Ordinary</td>
                                    <td>20 Left</td>
                                    <td><button>View Details</button></td>
                                </tr>
                            </tbody>
                        </table>  -->
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
    $('#add_sched').on('click', function(){
        if($('#via').val() == ""){
            $('#via').val("-");
        }
    });
</script>

<script>
    $('#btn_add_sched').on('click', functions(){
        $('#brs-add-schedule form')[0].reset();
    });
</script>

@endsection