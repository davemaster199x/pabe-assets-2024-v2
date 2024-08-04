<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Check out</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-checkout theme-form">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Check-out Date</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="date" id="checkout_date" name="checkout_date">
                              <input class="form-control" type="hidden" id="asset_id" name="asset_id" value="{{ $encrypt_asset_id }}">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Check-out to</label>
                            <div class="col-sm-9">
                                <div style="display: flex">
                                    <div class="form-check radio radio-primary" style="margin-right: 10px;">
                                        <input class="form-check-input" id="radio1" type="radio" name="radio_checkout" value="Person" onchange="checkout_to(this.value)">
                                        <label class="form-check-label" for="radio1">Person</label>
                                    </div>
                                    <div class="form-check radio radio-primary">
                                        <input class="form-check-input" id="radio4" type="radio" name="radio_checkout" value="Site" onchange="checkout_to(this.value)">
                                        <label class="form-check-label" for="radio4">Site / Location</label>
                                    </div>
                                </div>
                            </div>
                          </div>
                          
                          <div id="div_person" style="display: none;">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Assign to *</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="person_id" name="person_id_person">
                                        <option value="">-- Select --</option>
                                        <option value="1">First</option>
                                        <option value="3">Third</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Due date</label>
                                <div class="col-sm-9">
                                <input class="form-control" type="date" id="due_date" name="due_date_person">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                Optionally change site, location and department of assets to:
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Site</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="site_id" name="site_id_person">
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="location_id" name="location_id_person">
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="department_id" name="department_id_person">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Check-out Notes</label>
                                <div class="col-sm-9">
                                <textarea class="form-control" rows="5" cols="5" id="checkout_notes" name="checkout_notes_person"></textarea>
                                </div>
                            </div>
                          </div>

                          <div id="div_site" style="display: none;">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Site *</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="site_id" name="site_id_site">
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="location_id" name="location_id_site">
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Due date</label>
                                <div class="col-sm-9">
                                <input class="form-control" type="date" id="due_date" name="due_date_site">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                Optionally change department of assets to:
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="department_id" name="department_id_site">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Check-out Notes</label>
                                <div class="col-sm-9">
                                <textarea class="form-control" rows="5" cols="5" id="checkout_notes" name="checkout_notes_site"></textarea>
                                </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Check-out</button>
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>