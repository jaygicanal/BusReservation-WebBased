<div class="col-11 tab-pane fade show active" id="nav-schedule" aria-labelledby="nav-schedule-tab">
    <div class="scheduling-content d-flex justify-content-center py-3">
        <div class="inner-content col-md-11">
            <div class="row title py-3">
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
        </div>
    </div>
</div>