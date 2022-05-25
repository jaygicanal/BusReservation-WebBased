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