 <!-- Vertically centered Site modal-->
 <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#SitesModal">Vertically
     centered</button>
 <div class="modal fade" id="SitesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
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
                 <label for="site_name">Site Name:</label>
                <input type="text" name="site_name" id="site_name" value="{{ old('site_name') }}">
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
 <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#LocationModal">Vertically
     centered</button>
 <div class="modal fade" id="LocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add a Location</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p>Modal</p>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary" type="button">Add</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Vertically centered Category modal-->
 <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#CategoryModal">Vertically
     centered</button>
 <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add a Category</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p>Modal</p>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary" type="button">Add</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Vertically centered Site modal-->
 <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#DepartmentModal">Vertically
     centered</button>
 <div class="modal fade" id="DepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add a Department</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p>Modal</p>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary" type="button">Add</button>
             </div>
         </div>
     </div>
 </div>
 