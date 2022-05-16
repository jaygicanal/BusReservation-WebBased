<!-- Modal -->
<div class="modal fade" id="add-route-modal" tabindex="-1" role="dialog" aria-labelledby="create" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content d-flex justify-content-center">
            <form action="schedule" method="POST">
                @csrf
                <div class="row ">  
                    <div class="add-route-col ">
                        <div class="col d-flex justify-content-between">
                            <h1 class="add-sched-heading d-flex p-3">Add Route</h1>
                            <div type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></div>
                        </div>
                        <div class="row add-route-form  d-flex justify-content-center">
                            <div class="form-content col-9 p-2">
                                <table class="table">
                                    <!-- <thead>
                                        <tr>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead> -->
                                    <tbody id="route_tbl">
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <select name="bus_route" id="bus_route" class="form-select route_bus" required>
                                                        <option selected>Choose Option</option>
                                                        <option value="Terminal">Terminal</option>
                                                        <option value="Along The Road">Along The Road</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" id="place" name="place" class="form-control inputted_place"  placeholder="" required/>
                                                </div>
                                            </td>
                                            <td><button type="button" id="add_routeCol" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                
                                
                                <div class="form-content col-12 ">
                                    <div class="button-sec col-12 d-flex justify-content-center">
                                        <button type="submit" id="add_route" class="btn btn-primary">A D D</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>