    <!-- Checkout Modal -->
<div class="hiddenpreload" style="display:none">
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="checkoutModal">
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
                                <div class="col-sm-6" >
                                    <select class="form-control" id="person_id" name="person_id_person">
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#PersonModal" data-bs-original-title="" title="">Add</button>
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

</div>
<script>
document.querySelector('.form-checkout').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the default way

            // Collect form data
            var formData = new FormData(event.target);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            fetch('/checkout/store', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);

                var modalElement = document.getElementById('checkoutModal');
                var modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                } else {
                    // If no instance exists, initialize and hide it
                    modalInstance = new bootstrap.Modal(modalElement);
                    modalInstance.hide();
                }
                fetchAssetDetails(assetId);
                swal(
                    "Success!", "Check out Sucessfully Saved!", "success"           
                )
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
</script>
<!-- End Checkout Modal -->

<!-- Assign to modal-->
 <div class="modal fade" id="PersonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="person-form" class="person-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Add an Person/Employee</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     @csrf
                     <div class="col-md-12">
                        <label class="form-label">Full Name</label>
                        <input class="form-control"  type="text" placeholder="" type="text" name="full_name" id="full_name" value="" required="" >
                        <label class="form-label">Employee ID</label>
                        <input type="text" class="form-control" name="emp_id" id="emp_id">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                        <label class="form-label">Site</label>
                        <select class="form-select" id="site_id" name="site_id"></select>
                        <label class="form-label">Location</label>
                        <select class="form-select" id="location_id" name="location_id"></select>
                        <label class="form-label">Department</label>
                        <select class="form-control" id="department_id" name="department_id"></select>
                        <label class="form-label">Notes</label>
                        <textarea name="notes" id="notes" class="form-control"></textarea>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="submit">Add</button>
                 </div>
             </div>
         </form>
         <script>
         </script>
     </div>
 </div>
 <script>
    document.querySelector('.person-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the default way

            // Collect form data
            var formData = new FormData(event.target);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            fetch('/person/store', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                populatePersonSelect(data.person_id);

                var modalElement = document.getElementById('PersonModal');
                var modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                } else {
                    // If no instance exists, initialize and hide it
                    modalInstance = new bootstrap.Modal(modalElement);
                    modalInstance.hide();
                }

                swal(
                    "Success!", "Person Sucessfully Saved!", "success"           
                )

                document.getElementById('person-form').reset();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
</script>
<!-- END Assign to modal-->

<!-- Check in to modal-->
 <div class="modal fade check-in-modal" id="CheckinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="checkin-form" class="checkin-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Check in</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     @csrf
                     <div class="col-md-12">
                        <input class="form-control" type="hidden" id="asset_id" name="asset_id" value="{{ $encrypt_asset_id }}">
                        <label class="form-label">Site *</label>
                        <select class="form-select" id="site_id" name="site_id"></select>
                        <label class="form-label">Location</label>
                        <select class="form-select" id="location_id" name="location_id"></select>
                        <label class="form-label">Return Date *</label>
                        <input type="date" name="return_date" id="return_date" class="form-control">
                        <label class="form-label">Department</label>
                        <select class="form-control" id="department_id" name="department_id"></select>
                        <label class="form-label">Checkin Notes</label>
                        <textarea name="checkin_notes" id="checkin_notes" class="form-control"></textarea>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-success" type="submit">Check-In</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                 </div>
             </div>
         </form>
         <script>
         </script>
     </div>
 </div>
 <script>
    document.querySelector('.checkin-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the default way

            // Collect form data
            var formData = new FormData(event.target);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            fetch('/checkin/store', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {

                var modalElement = document.getElementById('CheckinModal');
                var modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                } else {
                    // If no instance exists, initialize and hide it
                    modalInstance = new bootstrap.Modal(modalElement);
                    modalInstance.hide();
                }
                fetchAssetDetails(assetId);
                swal(
                    "Success!", "Check In Sucessfully Saved!", "success"           
                )

                document.getElementById('checkin-form').reset();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
</script>
<!-- END Assign to modal-->

<!---------------repair----------------------->
<div class="hiddenpreload" style="display:none">
<div class="modal fade modalRepair" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Repair</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-repair theme-form">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Schedule Date</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="date" id="r_schedule_date" name="r_schedule_date">
                              <input class="form-control" type="hidden" id="asset_id" name="asset_id" value="{{ $encrypt_asset_id }}">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Assigned to</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="r_assigned_to" name="r_assigned_to">
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Date Completed</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="date" id="r_date_completed" name="r_date_completed">
                            </div>
                          </div>

                        


                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Repair Cost</label>
                            <div class="col-sm-9">
                            <div>
                            <div class="input-group mb-3"><span class="input-group-text">₱  </span>
                              <input class="form-control" type="text" aria-label="Amount (to the nearest dollar)" id="r_cost" name="r_cost">
                            </div>
                          </div>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Notes</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" type="date" id="r_notes" name="r_notes"></textarea>
                            </div> 
                          </div>
                          

                          

                        </div>
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Update</button>
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
    </div>
<script>
document.querySelector('.form-repair').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the default way

            // Collect form data
            var formData = new FormData(event.target);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            
            fetch('/repair/store', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                alert('Repair event updated successfully!');
                location.reload();
                fetchAssetDetails();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
</script>


<!------ DISPOSE ------------->
<!------ DISPOSE ------------->
<!------ DISPOSE ------------->
<!------ DISPOSE ------------->
<!------ DISPOSE ------------->

<!---------------dispose----------------------->
<div class="hiddenpreload" style="display:none">
<div class="modal fade modalDispose" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Dispose</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-dispose theme-form">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Date Disposed</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="date" id="r_schedule_date" name="d_date_disposed">
                              <input class="form-control" type="hidden" id="asset_id" name="asset_id" value="{{ $encrypt_asset_id }}">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Dispose to</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="d_dispose_to" name="d_dispose_to">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Notes</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" type="date" id="d_notes" name="d_notes"></textarea>
                            </div> 
                          </div>
                          
                        </div>
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Update</button>
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
    </div>
<script>
document.querySelector('.form-dispose').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the default way

            // Collect form data
            var formData = new FormData(event.target);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            
            fetch('/dispose/store', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                alert('Dispose event updated successfully!');
                location.reload();
                fetchAssetDetails();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
</script>