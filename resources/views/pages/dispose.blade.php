@extends('layouts.master')

@section('title', 'Dispose')
@section('active-home', 'active')
@section('page-title', 'Dispose')


@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        /* Adjust pagination font size */
        .dataTables_paginate .paginate_button {
            font-size: 18px!important; /* Adjust as needed */
        }
    </style>
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
        <label class="form-label" for="funding_source">Follow your assets every step of the way until they’re gone. Rather than deleting an asset from your database, you can dispose of it and have documentation of its entire life.</label>
            <div class="input-group">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Select Assets</button>
            </div><br>

            <div id="div-dispose" style="display: none;">
                <div class="col-sm-12">
                    <h6>Assets Pending Dispose</h6>
                    <div class="table-responsive">
                        <table class="table table-border-horizontal" id="listdispose">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                   <th>Asset Tag ID</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Site</th>
                                    <th>Location</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-sm-12">
                    <form class="form-checkout theme-form">
                        <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Date Dispose</label>
                                <div class="col-sm-9">
                                <input class="form-control" type="date" id="checkout_date" name="checkout_date">
                                <input class="form-control" type="hidden" id="asset_id" name="asset_id" value="{{ $encrypt_asset_id ?? '' }}">
                                </div>
                            </div>
                            
                            <div class="row">
                                    <label class="col-sm-3 col-form-label">Dispose Notes</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" cols="5" id="checkout_notes" name="checkout_notes_site"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button class="btn btn-success" type="submit">Dispose</button>
                                <button class="btn btn-primary" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Select Assets</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="dt-ext table-responsive">
                        <table class="display" id="listassets">
                        <thead>
                            <tr>
                                <th> </th>
                                   <th>Asset Tag ID</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Site</th>
                                    <th>Location</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data rows will be populated by DataTables -->
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary Add-List" type="button">Add to List</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<!-- End Modal -->

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

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    document.getElementById('dispose-navbar').classList.add('active');

    $(document).ready(function() {
        const table = $('#listassets').DataTable({
            "ajax": {
                "url": "/api/assets_dispose",
                "type": "GET"
            },
            "columns": [
                {
                    "data": "asset_id",
                    "render": function (data, type, row) {
                        return `
                        <input type="checkbox" style="width: 20px; height: 20px;" class="form-check-input asset-checkbox" value="${data}">`;
                    },
                    "orderable": false // Disable ordering on this column
                },
                { "data": "assets_tag_id"    },
                { "data": "description" },
                { "data": "status_id" },
                { "data": "site_id" },
                { "data": "location_id" },
                { "data": "lease_to" },
            ]
        });

        // Initialize DataTable for checkout list
        const disposeTable = $('#listdispose').DataTable({
            "paging": false, // Disable paging for the checkout table
            "info": false, // Disable table info display
            "columns": [
                { "data": "asset_id"    },
                { "data": "assets_tag_id"    },
                { "data": "description" },
                { "data": "status_id" },
                { "data": "assigned_to" },
                { "data": "site_id" },
                { "data": "location_id" },
                { "data": "lease_to" },
            ]
        });

        // Add event listener to the "Add to List" button
        $('.Add-List').on('click', function() {
            const selectedAssets = [];

            // Iterate over each checked checkbox
            $('#listassets tbody .asset-checkbox:checked').each(function() {
                const row = $(this).closest('tr');
                const rowData = table.row(row).data();
                
                // Add the row data to the selectedAssets array
                selectedAssets.push(rowData);
            });

            // Clear and populate the checkout table
            disposeTable.clear().rows.add(selectedAssets).draw();

            // Show the checkout section
            $('#div-dispose').show();
            const modalElement = document.querySelector('.bd-example-modal-lg');
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.hide();

            // Log the selectedAssets array to the console
            console.log(selectedAssets);
        });
    });

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

    fetch('/api/sites')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var selects = document.querySelectorAll('select[id="site_id"]');

                // Iterate over each select element
                selects.forEach(function(select) {
                    // Clear existing options (if any)
                    select.innerHTML = '';

                    // Create and append the "Select Site" placeholder option
                    var placeholderOption = document.createElement('option');
                    placeholderOption.value = '';
                    placeholderOption.textContent = 'Select Site';
                    placeholderOption.disabled = true;
                    placeholderOption.selected = true;
                    select.appendChild(placeholderOption);

                    // Create and append new options based on fetched data
                    data.forEach(function(site) {
                        var option = document.createElement('option');
                        option.value = site.id;
                        option.textContent = site.name;
                        select.appendChild(option);
                    });
                });
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });

        fetch('/api/locations')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and name properties
                var selects = document.querySelectorAll('select[id="location_id"]');

                // Iterate over each select element
                selects.forEach(function(select) {
                    // Clear existing options (if any)
                    select.innerHTML = '';

                    // Create and append the "Select Location" placeholder option
                    var placeholderOption = document.createElement('option');
                    placeholderOption.value = '';
                    placeholderOption.textContent = 'Select Location';
                    placeholderOption.disabled = true;
                    placeholderOption.selected = true;
                    select.appendChild(placeholderOption);

                    // Create and append new options based on fetched data
                    data.forEach(function(location) {
                        var option = document.createElement('option');
                        option.value = location.id;
                        option.textContent = location.name;
                        select.appendChild(option);
                    });
                });
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });

        fetch('/api/departments')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and name properties
                var selects = document.querySelectorAll('select[id="department_id"]');

                // Iterate over each select element
                selects.forEach(function(select) {
                    // Clear existing options (if any)
                    select.innerHTML = '';

                    // Create and append the "Select Department" placeholder option
                    var placeholderOption = document.createElement('option');
                    placeholderOption.value = '';
                    placeholderOption.textContent = 'Select Department';
                    placeholderOption.disabled = true;
                    placeholderOption.selected = true;
                    select.appendChild(placeholderOption);

                    // Create and append new options based on fetched data
                    data.forEach(function(department) {
                        var option = document.createElement('option');
                        option.value = department.id;
                        option.textContent = department.name;
                        select.appendChild(option);
                    });
                });
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });

        function populatePersonSelect(selectedPersonId = null) {
            fetch('/api/getPerson')
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(function(data) {
                    console.log(data);
                    // Assuming data is an array of objects with person_id and full_name properties
                    var selects = document.querySelectorAll('select[id="person_id"]');

                    // Iterate over each select element
                    selects.forEach(function(select) {
                        // Clear existing options (if any)
                        select.innerHTML = '';

                        // Create and append the "Select Person" placeholder option
                        var placeholderOption = document.createElement('option');
                        placeholderOption.value = '';
                        placeholderOption.textContent = 'Select Person';
                        placeholderOption.disabled = true;
                        placeholderOption.selected = true;
                        select.appendChild(placeholderOption);

                        // Create and append new options based on fetched data
                        data.forEach(function(person) {
                            var option = document.createElement('option');
                            option.value = person.person_id;
                            option.textContent = person.full_name;
                            select.appendChild(option);
                        });

                        // Set the selected option if a personId is provided
                        if (selectedPersonId) {
                            select.value = selectedPersonId;
                        }
                    });
                })
                .catch(function(error) {
                    console.error('Error fetching data:', error);
                });
        }

        // Example usage: Populate select elements and pre-select the option with ID 123
        populatePersonSelect();

        function checkout_to(value) {
            var divSite = document.getElementById('div_site');
            var divPerson = document.getElementById('div_person');

            if (value === 'Site') {
                divSite.style.display = 'block';  // Show the site div
                divPerson.style.display = 'none'; // Hide the person div
            } else {
                divSite.style.display = 'none';   // Hide the site div
                divPerson.style.display = 'block'; // Show the person div
            }
        }
</script>

@endsection