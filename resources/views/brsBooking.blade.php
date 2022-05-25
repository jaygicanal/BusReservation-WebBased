@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsbooking-style.css')}}"> 
@endpush

@section('content')

<section class="booking">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="booking-head d-flex">                    
                    <nav class="booking-inner col-12">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-book-tab" data-bs-toggle="tab" data-bs-target="#nav-book" type="button" role="tab" aria-controls="nav-book" aria-selected="false">BOOKED</button>
                            <button class="nav-link " id="nav-confirm-tab" data-bs-toggle="tab" data-bs-target="#nav-confirm" type="button" role="tab" aria-controls="nav-confirm" aria-selected="true">CONFIRMED</button>
                            <button class="nav-link " id="nav-cancel-tab" data-bs-toggle="tab" data-bs-target="#nav-cancel" type="button" role="tab" aria-controls="nav-cancel" aria-selected="true">CANCELED </button>
                        </div>
                    </nav>
                </div>
                <div class="tab-content d-flex justify-content-center" id="nav-tabContent">
                    <div class="col-11 tab-pane fade show active" id="nav-book" aria-labelledby="nav-book-tab">
                        <div class="book-content">
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Origin</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Bus Seat</th>
                                    <th scope="col">View Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mauro Laudit</td>
                                    <td>10/10/22</td>
                                    <td>9:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>1</td>
                                    <td><button>View</button></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Kenneth Casim</td>
                                    <td>11/11/22</td>
                                    <td>6:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>2</td>
                                    <td><button>View</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-11 tab-pane fade" id="nav-confirm" aria-labelledby="nav-confirm-tab">
                        <div class="confirm-content">
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Origin</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Bus Seat</th>
                                    <th scope="col">Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mauro Laudit</td>
                                    <td>10/10/22</td>
                                    <td>9:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>1</td>
                                    <td>Gcash</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Kenneth Casim</td>
                                    <td>11/11/22</td>
                                    <td>6:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>2</td>
                                    <td>Paymaya</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane col-11 fade" id="nav-cancel" aria-labelledby="nav-cancel-tab">
                        <div class="cancel-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Origin</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Bus Seat</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Refund</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mauro Laudit</td>
                                    <td>10/10/22</td>
                                    <td>9:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>1</td>
                                    <td>Gcash</td>
                                    <td><button class="refund">Refund</button></td> 
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Kenneth Casim</td>
                                    <td>11/11/22</td>
                                    <td>6:00 Am</td>
                                    <td>Bulan</td>
                                    <td>Sorsogon</td>
                                    <td>2</td>
                                    <td>Paymaya</td>
                                    <td><button class="refund">Refund</button></td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection