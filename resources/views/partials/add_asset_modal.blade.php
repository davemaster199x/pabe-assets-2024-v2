 <!-- Vertically centered Site modal-->
  <div class="hiddenpreload" style="display:none">
 <div class="modal fade" id="SitesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="site-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Add a Site</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors" style="display:none;">
                         <ul id="error-list"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="site_name">Site Name</label>
                         <input class="form-control" type="text" placeholder="Site Name"
                             type="text" name="site_name" id="site_name" value="{{ old('site_name') }}" required=""
                             data-bs-original-title="" title="">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="submitFormSite()">Add</button>
                 </div>
             </div>
         </form>
         <script> 
         function submitFormSite() {
             var siteName = $('#site_name').val();

             $.ajax({
                 url: '{{ route('sites.store') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     site_name: siteName
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     var siteModal = new bootstrap.Modal(document.getElementById('SitesModal'));
                    siteModal.hide();

                    // Optionally, you can clear the form fields
                    $('#site_name').val('');
                    $('#errors').hide();
                    loadData();
                 },
                 error: function(xhr) {
                     var errors = xhr.responseJSON.errors;
                     $('#error-list').empty();
                     $.each(errors, function(key, value) {
                         $('#error-list').append('<li>' + value + '</li>');
                     });
                     $('#errors').show();
                 }
             });
         }
         </script>
     </div>
 </div>

 <!-- Vertically centered Location modal-->
 <div class="modal fade" id="LocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="location-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Add a Location</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors2" style="display:none;">
                         <ul id="error-list2"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="location_name">Location Name</label>
                         <input class="form-control"  type="text" placeholder="Location Name"
                             type="text" name="location_name" id="location_name" value="{{ old('location_name') }}" required=""
                             data-bs-original-title="" title="">
                             <label class="form-label" for="site_location_id">Site</label>
                          <select class="form-select @error('site_id') is-invalid @enderror" id="siteSelect2"
                                name="site_location_id" required>
                          </select>  
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="submitFormLocation()">Add</button>
                 </div>
             </div>
         </form>
         <script>
         function submitFormLocation() {
             var locationName = $('#location_name').val();
             var siteID = $('#siteSelect2').val();

             $.ajax({
                 url: '{{ route('locations.store') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     location_name: locationName,
                     site_id: siteID,
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     var locationModal = new bootstrap.Modal(document.getElementById('LocationModal'));
                    locationModal.hide();

                    // Optionally, you can clear the form fields
                    $('#location_name').val('');
                    $('#errors2').hide();
                    loadData();
                 },
                 error: function(xhr) {
                     var errors = xhr.responseJSON.errors;
                     $('#error-list2').empty();
                     $.each(errors, function(key, value) {
                         $('#error-list2').append('<li>' + value + '</li>');
                     });
                     $('#errors2').show();
                 }
             });
         }
         </script>
     </div>
 </div>

 <!-- Vertically centered Category modal-->
 <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="category-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Add a Category</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors3" style="display:none;">
                         <ul id="error-list3"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="category_name">Category Name</label>
                         <input class="form-control" type="text" placeholder="Category Name"
                             type="text" name="category_name" id="category_name" value="{{ old('category_name') }}" required=""
                             data-bs-original-title="" title="">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="submitFormCategory()">Add</button>
                 </div>
             </div>
         </form>
         <script>
         function submitFormCategory() {
             var categoryName = $('#category_name').val();

             $.ajax({
                 url: '{{ route('categories.store') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     category_name: categoryName
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     var categoryModal = new bootstrap.Modal(document.getElementById('CategoryModal'));
                    categoryModal.hide();

                    // Optionally, you can clear the form fields
                    $('#category_name').val('');
                    $('#errors3').hide();
                    loadData();
                 },
                 error: function(xhr) {
                     var errors = xhr.responseJSON.errors;
                     $('#error-list3').empty();
                     $.each(errors, function(key, value) {
                         $('#error-list3').append('<li>' + value + '</li>');
                     });
                     $('#errors3').show();
                 }
             });
         }
         </script>
     </div>
 </div>

 <!-- Vertically centered Site modal-->
 <div class="modal fade" id="DepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="department-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Add a Department</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors4" style="display:none;">
                         <ul id="error-list4"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="department_name">Department Name</label>
                         <input class="form-control" type="text" placeholder="Department Name"
                             type="text" name="department_name" id="department_name" value="{{ old('department_name') }}" required=""
                             data-bs-original-title="" title="">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="submitFormDepartment()">Add</button>
                 </div>
             </div>
         </form>
         <script>
         function submitFormDepartment() {
             var departmentName = $('#department_name').val();

             $.ajax({
                 url: '{{ route('departments.store') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     department_name: departmentName
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     // Hide the modal
                    var departmentModal = new bootstrap.Modal(document.getElementById('DepartmentModal'));
                    departmentModal.hide();

                    // Optionally, you can clear the form fields
                    $('#department_name').val('');
                    $('#errors4').hide();
                    loadData();
                 },
                 error: function(xhr) {
                     var errors = xhr.responseJSON.errors;
                     $('#error-list4').empty();
                     $.each(errors, function(key, value) {
                         $('#error-list4').append('<li>' + value + '</li>');
                     });
                     $('#errors4').show();
                 }
             });
         }
         </script>
     </div>
 </div>

<!-- Fundings -->
 <div class="modal fade" id="FundingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="site-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Add a Funding</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors5" style="display:none;">
                         <ul id="error-list5"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="funding_name">Funding Name</label>
                         <input class="form-control" type="text" placeholder="Funding Name"
                             type="text" name="funding_name" id="funding_name" value="{{ old('funding_name') }}" required=""
                             data-bs-original-title="" title="">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="submitFormFunding()">Add</button>
                 </div>
             </div>
         </form>
         <script> 
         function submitFormFunding() {
             var fundingName = $('#funding_name').val();

             $.ajax({
                 url: '{{ route('fundings.store') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     funding_name: fundingName
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     var fundingModal = new bootstrap.Modal(document.getElementById('FundingsModal'));
                     fundingModal.hide();

                    // Optionally, you can clear the form fields
                    $('#funding_name').val('');
                    $('#errors5').hide();
                    loadData();
                 },
                 error: function(xhr) {
                     var errors = xhr.responseJSON.errors;
                     $('#error-list5').empty();
                     $.each(errors, function(key, value) {
                         $('#error-list5').append('<li>' + value + '</li>');
                     });
                     $('#errors5').show();
                 }
             });
         }
         </script>
     </div>
 </div>
        </div>

<!-- Payment Mode -->
 <div class="modal fade" id="PaymentModeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="site-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Add a Payment</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors5" style="display:none;">
                         <ul id="error-list5"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="payment_name">Payment Name</label>
                         <input class="form-control" type="text" placeholder="Payment Name"
                             type="text" name="payment_name" id="payment_name" value="{{ old('payment_name') }}" required=""
                             data-bs-original-title="" title="">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="submitFormPayment()">Add</button>
                 </div>
             </div>
         </form>
         <script> 
         function submitFormPayment() {
            var payment_name = $('#payment_name').val(); // Get the payment name input value

            $.ajax({
                url: '/payment-modes', // Adjust the route to the correct one for storing payment modes
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token for security
                    payment_name: payment_name // Send the payment name
                },
                success: function(response) {
                    swal("Success!", response.message, "success"); // Show success message

                    // Hide the PaymentModeModal
                    var paymentModal = new bootstrap.Modal(document.getElementById('PaymentModeModal'));
                    paymentModal.hide();

                    // Clear the form field
                    $('#payment_name').val('');
                    $('#errors5').hide();

                    // Optionally, reload the payment modes list in the dropdown or wherever needed
                    loadData();
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors; // Get the error response
                    $('#error-list5').empty();

                    // Display each validation error
                    $.each(errors, function(key, value) {
                        $('#error-list5').append('<li>' + value + '</li>');
                    });

                    // Show the error container
                    $('#errors5').show();
                }
            });
        }
         </script>
     </div>
 </div>
        </div>