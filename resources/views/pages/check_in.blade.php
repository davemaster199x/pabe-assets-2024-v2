@extends('layouts.master')

@section('title', 'Check In')
@section('active-home', 'active')
@section('page-title', 'Check In')

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
        <label class="form-label" for="funding_source">Track the journey of each asset as it moves through your organization.</label>
            <div class="input-group">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Select Assets</button>
            </div><br>

            <div id="div-checkout" style="display: none;">
                <div class="col-sm-12">
                    <h6>Assets Pending Check-In</h6>
                    <div class="table-responsive">
                        <table class="table table-border-horizontal" id="listcheckin">
                            <thead>
                                <tr>
                                    <th>Asset ID</th>
                                    <th>Asset Tag ID</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Sites</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-sm-12">
                    <form id="checkin-form" class="checkin-form">
                        <div class="card-body">
                            <div>
                                @csrf
                                <div class="col-md-12">
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
                            <hr>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button class="btn btn-success" type="submit">Check-In</button>
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                </div>
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
                                <th></th>
                                <th>Asset Tag ID</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Assigned to</th>
                                <th>Sites</th>
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

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    document.getElementById('check_in-navbar').classList.add('active');

    let selectedAssets = [];

    $(document).ready(function() {
        const table = $('#listassets').DataTable({
            "ajax": {
                "url": `/api/assets/${'checkin'}`,
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
                { "data": "assets_tag_id" },
                { "data": "description" },
                { "data": "status_id" },
                { "data": "assigned_to" },
                { "data": "site_name" },
                { "data": "location_name" },
            ]
        });

        // Initialize DataTable for checkout list
        const checkoutTable = $('#listcheckin').DataTable({
            "paging": false, // Disable paging for the checkout table
            "info": false, // Disable table info display
            "columns": [
                {
                    "data": "asset_id"
                },
                { "data": "assets_tag_id" },
                { "data": "description" },
                { "data": "status_id" },
                { "data": "assigned_to" },
                { "data": "site_name" },
                { "data": "location_name" },
            ]
        });

        // Add event listener to the "Add to List" button
        $('.Add-List').on('click', function() {
            selectedAssets = [];
            // Iterate over each checked checkbox
            $('#listassets tbody .asset-checkbox:checked').each(function() {
                const row = $(this).closest('tr');
                const rowData = table.row(row).data();
                
                // Add the row data to the selectedAssets array
                selectedAssets.push(rowData);
            });

            // Clear and populate the checkout table
            checkoutTable.clear().rows.add(selectedAssets).draw();

            // Show the checkout section
            $('#div-checkout').show();
            const modalElement = document.querySelector('.bd-example-modal-lg');
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.hide();

            // Log the selectedAssets array to the console
            console.log(selectedAssets);
        });
        
    });

    document.querySelector('.checkin-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting the default way

        // Collect form data
        var formData = new FormData(event.target);

        // Map the selectedAssets array to get only the asset_id values
        const assetIds = selectedAssets.map(asset => asset.asset_id);

        // Append the assetIds array to formData as a JSON string
        formData.append('selectedAssets', JSON.stringify(assetIds));

        for (var pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        fetch('/checkin/multiple-store', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            swal(
                "Success!", "Check In Sucessfully Saved!", "success"           
            )

            location.reload();
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
</script>


@endsection