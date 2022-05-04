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
                        <button  class= "add-sched">Add Schedule</button>
                        <button  class= "add-routes">Add Route</button>
                    </div>
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
@endsection