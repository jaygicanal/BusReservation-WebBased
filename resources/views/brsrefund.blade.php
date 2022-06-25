<!-- Modal -->
<div class="modal fade" id="refund" tabindex="-1" role="dialog" aria-labelledby="create" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 payment-content pt-3" >
                    <div class="row">
                        <div class="cnt-details col-7 d-flex justify-content-center align-items-center">
                            <div class="cnt-infobox">
                                <input type="text" name="reservation_id" id="reservation_id" style="border:1px solid #000000" required>
                                <h4 class="text-center py-3" id="cnt_header"></h4>
                                <p>Payment for : <input type="text" id="pyment" name="payment" required></p>
                                <p>Account Name: <input type="text" id="name" name="name" required></p>
                                <p>Mobile Number: <input type="number" id="mobile" name="mobile_number" required></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                                    <div class="payment-ss">
                                        <center>
                                            <i>Please attach proof of payment here:</i>
                                            <div class="payment-img">
                                                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                                <input type="file" id="imgUpload" class="img-upload" name="imgUpload" accept="image/png,image/jpeg" required>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                    <div class="row pt-2">
                        <div class="button-button d-flex justify-content-between">
                            <div type="button" data-bs-dismiss="modal">Cancel</div>
                            <button type="submit" class="btn btn-success px-4">Refund</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






            