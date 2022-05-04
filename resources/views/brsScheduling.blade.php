@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsscheduling-style.css')}}"> 
@endpush

@section('content')
<section class="scheduling">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="scheduling-header d-flex justify-content-end align-items-center">
                    <div class="add">
                        <button id="btn_add_sched" class= "btn-add" data-bs-toggle="modal" data-bs-target="#brs-add-schedule">Add Schedule</button>
                        <button  class= "add-routes">Add Route</button>
                    </div>
                    @include('schedule_views.add_schedule')
                </div>
                
                <div class="scheduling-content d-flex justify-content-center">
                    <div class="table-content col-md-11">
                        <table class="table">
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
                                <tr>
                                    <td>Bulan - Sorsogon</td>
                                    <td>10:00 AM</td>
                                    <td>Ordinary</td>
                                    <td>20 Left</td>
                                    <td><button>View Details</button></td>
                                </tr>
                            </tbody>
                        </table> 
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