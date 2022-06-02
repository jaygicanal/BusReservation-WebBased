<!-- Modal -->
<div class="modal fade" id="confirm_view" tabindex="-1" role="dialog" aria-labelledby="create" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content d-flex justify-content-center">
        <div class="container">
                <form action="{{ route('manage-booked.update', 'id') }}" method="post">
                    <div class="row">
                        <h2 class="d-flex justify-content-center ">Reserved Details</h2>
                        <div class="passenger-details1 col-5 ">
                            <!-- <h4>STANDARD BUS</h1> -->
                            <div class="bus-detail">
                                @csrf
                                @method('PUT')
                                <input type="text" id="id" name="id" readonly>
                                <p class="content d-flex justify-content-between">Name:<input type="text" id="name" name="name"  class="col-10" readonly></p>
                                <p class="content d-flex justify-content-between">Transit ID:<input type="text" id="transit_id" name="transit_id" readonly></p>
                                <p class="content d-flex justify-content-between">Class:<input type="text" id="bus_class" name="bus_class" readonly></p>
                                <p class="content d-flex justify-content-between">Wifi:<input type="text" id="wifi" name="wifi" readonly></p>
                                <p class="content d-flex justify-content-between">TV:<input type="text" id="tv" name="tv" readonly></p>
                                <p class="content d-flex justify-content-between">Seat No.:<input type="text" id="seat_no" name="seat_no" readonly></p>
                                <p class="content d-flex justify-content-between">Origin:<input type="text" id="origin" name="origin" readonly></p>
                                <p class="content d-flex justify-content-between">Destination:<input type="text" id="destination" name="destination"readonly></p>
                                <p class="content d-flex justify-content-between">Time:<input type="text" id="departure_time" name="departure_time" readonly></p>
                                <p class="content d-flex justify-content-between">Date:<input type="text" id="departure_date" name="departure_date" readonly></p>
                                <p class="content d-flex justify-content-between">Fare:<input type="text" class="col-5" id="fare" name="fare" readonly></p>
                                <p class="content d-flex justify-content-between">20% Discount:<input type="text" class="col-5" id="discount" name="discount" readonly></p>                                    
                            </div>
                        </div>
                        <div class="passenger-details2 col-7">
                            <div class="grp-frm d-flex justify-content-between">
                                <p class="content d-flex justify-content-between  col-8">Payment:<input type="text" id="payment_type" name="payment_type"  class="col-8" readonly></p>
                                <p class="content d-flex justify-content-between">Total:<input type="text" class="col-5" id="totalFare" name="totalFare" readonly></p>
                            </div>
                            <div class="screenshot d-flex justify-content-center"> 
                                <img id="imgUploaded" src="" alt="Screenshot Payment">
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="grp-button d-flex justify-content-between col-9">
                                    <a href="" type="button" class="btn-cancel p-2" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                                    <button type="submit" class="btn-confirm p-2">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
