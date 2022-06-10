<!-- Modal -->
<div id="brs-add-schedule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" data-bs-backdrop="static" data-bs-keyboard="false"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content d-flex justify-content-center">
            <div class="modal-body">
                <form action="schedule" method="POST">
                    @csrf
                    <div class="row ">  
                        <div class="add-sched-col ">
                            <div class="col d-flex justify-content-between">
                                <h1 class="add-sched-heading d-flex">Add Schedule</h1>
                                <div type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></div>
                            </div>
                            <div class="row add-schedule-form  d-flex justify-content-center">
                                <form action="searchBusSched" method="get">
                                    @csrf
                                    <div class="form-content col-9 p-2">
                                        <div class="form-group">
                                            <label for="trans_id"></label>
                                            <input type="text" id="trans_id" name="trans_id" class="form-control"  placeholder="0000" required readonly/>
                                        </div>
                                        <div class="grp-route">
                                            <div class="ipt-label">Route</div>
                                            <div class="form-group d-flex align-items-center">
                                                <select class="form-control form-control-sm" id="origin" name="origin" onblur="this.size=1;"  aria-label=".form-select-lg example" >
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
                                                <div class="separator px-2"><i class="fa fa-minus" aria-hidden="true"></i></div>
                                                <select class="form-control form-control-sm"  id="destination" name="destination" onblur="this.size=1;"  aria-label=".form-select-lg example">
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
                                        <div class="form-group">
                                            <label for="bus_schedule">Bus Routine</label>
                                            <select name="bus_schedule" id="bus_schedule" class="form-select" required>
                                                <option selected>Choose Bus Routine</option>
                                                <option value="Daily">Daily</option>
                                                <option value="Weekdays">Weekdays</option>
                                                <option value="Weekends">Weekends</option>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="schedule_date">Date</label>
                                            <input type="date" id="schedule_date" name="schedule_date" class="form-control">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="departure_time">Depature Time</label>
                                            <input type="time" id="departure_time" name="departure_time" class="form-control"  placeholder="Last Name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="bus_class">Bus Class</label>
                                            <select name="bus_class" id="bus_class" class="form-select" required>
                                                <option selected>Choose Bus Class</option>
                                                <option value="Ordinary">Ordinary</option>
                                                <option value="Air-Condition">Air-Condition</option>
                                            </select>
                                        </div>
                                        <div class="bus-features d-flex justify-content-evenly">
                                            <div class="grp-features">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="wifi1" name="with_wifi" value="with Wifi">
                                                    <label class="form-check-label" for="wifi1">
                                                        with Wifi
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="wifi2" name="with_wifi" value="without Wifi">
                                                    <label class="form-check-label" for="wifi2">
                                                        without Wifi
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="grp-features">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="with TV" id="tv1" name="with_tv">
                                                    <label class="form-check-label" for="tv1">
                                                        with Television
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="without TV" id="tv2" name="with_tv">
                                                    <label class="form-check-label" for="tv2">
                                                        without Television
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="fare" name="fare" class="form-control"  placeholder="Fare" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-content col-12">
                                    <div class="button-sec col-12 d-flex justify-content-center">
                                        <button type="submit" id="add_sched" class="btn btn-primary">Schedule</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>