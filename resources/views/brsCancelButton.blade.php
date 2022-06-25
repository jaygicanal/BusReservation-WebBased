<!-- Modal -->
<div class="modal fade" id="mdlCancel" tabindex="-1" role="dialog" aria-labelledby="create" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 payment-content pt-3" >
                    <div class="payment-head d-flex justify-content-between">
                        <h3>Choice Refund Process:</h3>
                        <div type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></div>
                    </div>
                    <div class="payment-content">
                        <form action="{{ route('bookCancel', 'reservation_id') }}" method="POST" class="payment-inner">
                            @csrf
                            <input type="text" id="reservation_id" name="reservation_id" value="{{ old('reservation_id') }}" hidden>
                            <div class="row">
                                <div class="payment-type col-5">
                                    <div class="opt col-12">
                                        <input type="radio" class="btn-check" name="payment_options" id="opt-payment1" value="GCash" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="opt-payment1">
                                            <img src="{{ asset('images/brs-gcash-logo.png') }}" alt="">
                                            <span class="icon-txt primary">GCash</span>
                                        </label>
                                    </div>

                                    <div class="opt col-12">
                                        <input type="radio" class="btn-check" name="payment_options" id="opt-payment2" value="PayMaya" autocomplete="off">
                                        <label class="btn btn-outline-success" for="opt-payment2">
                                            <img src="{{ asset('images/brs-paymaya-logo.png') }}" alt="">
                                            <span class="icon-txt success">PayMaya</span>
                                        </label>
                                    </div>

                                    <div class="opt col-12">
                                        <input type="radio" class="btn-check" name="payment_options" id="opt-payment3" value="Palawan Express" autocomplete="off">
                                        <label class="btn btn-outline-warning" for="opt-payment3">
                                            <img src="{{ asset('images/brs-palawan-express-logo.jpg') }}" alt="">
                                            <span class="icon-txt warning">Palawan Express</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="cnt-details col-7 d-flex justify-content-center align-items-center">
                                    <div class="cnt-infobox">
                                        <input type="text" name="reservation_id" id="reservation_id" style="border:1px solid #000000" required>
                                        <h4 class="text-center py-3" id="cnt_header"></h4>
                                        <p>Account Name: <input type="text" id="name" name="name" required></p>
                                        <p>Mobile Number: <input type="number" id="mobile" name="mobile_number" required></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="button-sec d-flex justify-content-center mt-3">
                                    <div class="submit">
                                        <button type="submit" class="btn btn-success px-4">Refund</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






            