<div class="hiddenpreload" style="display:none">
 <!-- Sites -->
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

<!-- Edit Sites -->
<div class="modal fade" id="EditSitesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="site-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Edit Site</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors" style="display:none;">
                         <ul id="error-list"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="e_site_name">Site Name</label>
                         <input class="form-control" type="text" placeholder="Site Name"
                             type="text" name="e_site_name" id="e_site_name" value="{{ old('e_site_name') }}" required=""
                             data-bs-original-title="" title="">
                            <input type="hidden" name="e_site_id" id="e_site_id" />
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="esubmitFormSite()">Update</button>
                 </div>
             </div>
         </form>
         <script> 
         function esubmitFormSite() {
             var siteName = $('#e_site_name').val();
             var siteId = $('#e_site_id').val();

             $.ajax({
                 url: '{{ route('sites.update') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     site_name: siteName,
                     site_id:siteId
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     var siteModal = new bootstrap.Modal(document.getElementById('EditSitesModal'));
                    siteModal.hide();

                    // Optionally, you can clear the form fields
                    $('#e_site_name').val('');
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

         
         function openEditSitesModal() {
            var selectedOption = $('#siteSelect').find('option:selected'); 
            var siteName = selectedOption.text();
            var siteId = selectedOption.val();

            $('#e_site_name').val(siteName);
            $('#e_site_id').val(siteId);

            var editSitesModal = new bootstrap.Modal(document.getElementById('EditSitesModal'));
            editSitesModal.show();
        }

        function closeEditSitesModal() {
            var editSitesModal = new bootstrap.Modal.getInstance(document.getElementById('EditSitesModal'));
            editSitesModal.hide();
        }
         </script>
     </div>
 </div>

 <!-- Location -->
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

<!-- Edit Location -->
<div class="modal fade" id="EditLocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="location-form">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Location</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="errors2" style="display:none;">
                    <ul id="error-list2"></ul>
                </div>
                @csrf
                <div class="col-md-12">
                    <label class="form-label" for="e_location_name">Location Name</label>
                    <input class="form-control" type="text" placeholder="Location Name"
                        name="e_location_name" id="e_location_name" value="{{ old('e_location_name') }}" required=""
                        data-bs-original-title="" title="">
                    
                    <label class="form-label" for="e_siteSelect2">Site</label>
                    <select class="form-select @error('e_site_id') is-invalid @enderror" id="e_siteSelect2"
                        name="e_site_location_id" required>
                        <!-- Options will be populated dynamically -->
                    </select> 

                    <!-- Ensure this hidden input is included to store site ID -->
                    <input type="hidden" name="e_site_id" id="e_site_id" />

                    <input type="hidden" name="e_location_id" id="e_location_id" /> 
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="button" onclick="esubmitFormLocation()">Update</button>
            </div>
        </div>

         </form>
         <script>
         function esubmitFormLocation() {
             var locationId = $('#e_location_id').val();
             var locationName = $('#e_location_name').val();
             var siteID = $('#e_siteSelect2').val();

             $.ajax({
                 url: '{{ route('locations.update') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     location_name: locationName,
                     site_id: siteID,
                     location_id:locationId
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     var locationModal = new bootstrap.Modal(document.getElementById('EditLocationModal'));
                    locationModal.hide();

                    // Optionally, you can clear the form fields
                    $('#e_location_name').val('');
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

         function openEditLocationModal() {
    var selectedOption = $('#locationSelect').find('option:selected');
    var locationName = selectedOption.text();
    var locationId = selectedOption.val();
    var siteId = $('#e_siteSelect').val();
    var siteName = $('#e_siteSelect').find('option:selected').text(); // Get selected site's name
    
    $('#e_location_name').val(locationName);
    $('#e_site_id').val(siteId);  // Make sure the hidden input or another field for siteId exists.
    $('#e_location_id').val(locationId);

    // Update the select box or another element with the site name
    //$('#e_siteSelect2').val(siteName);  // If you want to update the value of the select box.
    // Or, if you want to display the site name in another element:
    // $('#someElement').text(siteName);

    var editLocationModal = new bootstrap.Modal(document.getElementById('EditLocationModal'));
    editLocationModal.show();
}



        function closeEditLocationModal() {
            var editLocationModal = new bootstrap.Modal.getInstance(document.getElementById('EditLocationModal'));
            editLocationModal.hide();
        }
         </script>
         <script>
            fetch('/api/sites')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var select = document.getElementById('e_siteSelect2');

                // Clear existing options (if any)
                select.innerHTML = '';

                // Create and append new options based on fetched data
                data.forEach(function(site) {
                    var option = document.createElement('option');
                    option.value = site.id;
                    option.textContent = site.name;
                    select.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });
        </script>
     </div>
 </div>


 <!-- Category -->
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

 <!-- Edit Category -->
 <div class="modal fade" id="EditCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="category-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Edit Category</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors3" style="display:none;">
                         <ul id="error-list3"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="e_category_name">Category Name</label>
                         <input class="form-control" type="text" placeholder="Category Name"
                             type="text" name="e_category_name" id="e_category_name" value="{{ old('e_category_name') }}" required=""
                             data-bs-original-title="" title="">
                         <input type="hidden" id="e_category_id" name="e_category_id" />
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="esubmitFormCategory()">Update</button>
                 </div>
             </div>
         </form>
         <script>
         function esubmitFormCategory() {
             var categoryName = $('#e_category_name').val();
             var categoryId = $('#e_category_id').val();

             $.ajax({
                 url: '{{ route('categories.update') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     category_name: categoryName,
                     category_id: categoryId
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     var categoryModal = new bootstrap.Modal(document.getElementById('EditCategoryModal'));
                    categoryModal.hide();

                    // Optionally, you can clear the form fields
                    $('#e_category_name').val('');
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

         function openEditCategoryModal() {
            var selectedOption = $('#categorySelect').find('option:selected');
            var categoryName = selectedOption.text();
            var categoryId = selectedOption.val();

            $('#e_category_name').val(categoryName);
            $('#e_category_id').val(categoryId);

            var editCategoryModal = new bootstrap.Modal(document.getElementById('EditCategoryModal'));
            editCategoryModal.show();
        }

        function closeEditCategoryModal() {
            var editCategoryModal = new bootstrap.Modal.getInstance(document.getElementById('EditCategoryModal'));
            editCategoryModal.hide();
        }
         </script>
     </div>
 </div>

 <!-- Department -->
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

 <!-- Edit Department -->
 <div class="modal fade" id="EditDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog" role="document">
         <form id="department-form">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Edit Department</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div id="errors4" style="display:none;">
                         <ul id="error-list4"></ul>
                     </div>
                     @csrf
                     <div class="col-md-12">
                         <label class="form-label" for="e_department_name">Department Name</label>
                         <input class="form-control" type="text" placeholder="Department Name"
                             type="text" name="e_department_name" id="e_department_name" value="{{ old('e_department_name') }}" required=""
                             data-bs-original-title="" title="">
                            <input type="hidden" id="e_department_id" name="e_department_id" />
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" type="button" onclick="esubmitFormDepartment()">Update</button>
                 </div>
             </div>
         </form>
         <script>
         function esubmitFormDepartment() {
             var departmentName = $('#e_department_name').val();
             var departmentId = $('#e_department_id').val();

             $.ajax({
                 url: '{{ route('departments.update') }}',
                 type: 'POST',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                     department_name: departmentName,
                     department_id: departmentId
                 },
                 success: function(response) {
                     swal("Success!", response.message, "success");
                     // Hide the modal
                    var departmentModal = new bootstrap.Modal(document.getElementById('EditDepartmentModal'));
                    departmentModal.hide();

                    // Optionally, you can clear the form fields
                    $('#e_department_name').val('');
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

         function openEditDepartmentModal() {
            var selectedOption = $('#departmentSelect').find('option:selected');
            var departmentName = selectedOption.text();
            var departmentId = selectedOption.val();

            $('#e_department_name').val(departmentName);
            $('#e_department_id').val(departmentId);

            var editDepartmentModal = new bootstrap.Modal(document.getElementById('EditDepartmentModal'));
            editDepartmentModal.show();
        }

        function closeEditFundingModal() {
            var editDepartmentModal = new bootstrap.Modal.getInstance(document.getElementById('EditDepartmentModal'));
            editDepartmentModal.hide();
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
    

<!-- Edit Fundings Modal -->
<div class="modal fade" id="EditFundingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <form id="site-form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Funding</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errors5" style="display:none;">
                        <ul id="error-list5"></ul>
                    </div>
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="e_funding_name">Funding Name</label>
                        <input class="form-control" placeholder="Funding Name" type="text" name="e_funding_name" id="e_funding_name" value="{{ old('e_funding_name') }}" required="" data-bs-original-title="" title="">
                        <input class="form-control" placeholder="Funding ID" type="hidden" name="e_funding_id" id="e_funding_id" value="{{ old('e_funding_id') }}" required="" data-bs-original-title="" title="">
                    </div>
                </div>
                <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="esubmitFormFunding()">Update</button>
           
                </div>
            </div>
        </form>
        <script>
        function esubmitFormFunding() {
            var fundingName = $('#e_funding_name').val();
            var fundingId = $('#e_funding_id').val();
            $.ajax({
                url: '{{ route('fundings.update') }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    funding_name: fundingName,
                    funding_id: fundingId
                },
                success: function(response) {
                    swal("Success!", response.message, "success");
                    var fundingModal = new bootstrap.Modal(document.getElementById('EditFundingsModal'));
                    fundingModal.hide();

                    // Optionally, you can clear the form fields
                    $('#e_funding_name').val('');
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

        function openEditFundingModal() {
            var selectedOption = $('#fundingSelect').find('option:selected');
            var fundingName = selectedOption.text();
            var fundingId = selectedOption.val();

            $('#e_funding_name').val(fundingName);
            $('#e_funding_id').val(fundingId);

            var editFundingModal = new bootstrap.Modal(document.getElementById('EditFundingsModal'));
            editFundingModal.show();
        }

        function closeEditFundingModal() {
            var editFundingModal = bootstrap.Modal.getInstance(document.getElementById('EditFundingsModal'));
            editFundingModal.hide();
        }
        </script>
    </div>
</div>

        </div>