@extends('layouts.master')

@section('title', 'Add Asset')
@section('active-add-assets', 'active')
@section('page-title', 'Add Asset')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Asset Details</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('data_assets.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label" for="description">Description*</label>
                        <input class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" type="text" value="{{ old('description') }}" required>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="assets_tag_id">Asset Tag ID*</label>
                        <input class="form-control @error('assets_tag_id') is-invalid @enderror" id="assets_tag_id"
                            name="assets_tag_id" type="text" value="{{ old('assets_tag_id') }}" required>
                        @error('assets_tag_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="purchase_from">Purchased from</label>
                        <input class="form-control @error('purchase_from') is-invalid @enderror" id="purchase_from"
                            name="purchase_from" type="text" value="{{ old('purchase_from') }}">
                        @error('purchase_from')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="purchase_date">Purchased Date</label>
                        <input class="form-control @error('purchase_date') is-invalid @enderror" id="purchase_date"
                            name="purchase_date" type="date" value="{{ old('purchase_date') }}" required>
                        @error('purchase_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="brand">Brand</label>
                        <input class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                            type="text" value="{{ old('brand') }}" required>
                        @error('brand')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="cost">Cost</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">₱</span>
                            <input class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost"
                                type="number" step="0.01" value="{{ old('cost') }}" required>
                            @error('cost')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="model">Model</label>
                        <input class="form-control @error('model') is-invalid @enderror" id="model" name="model"
                            type="text" value="{{ old('model') }}" required>
                        @error('model')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="serial_no">Serial No</label>
                        <input class="form-control @error('serial_no') is-invalid @enderror" id="serial_no"
                            name="serial_no" type="text" value="{{ old('serial_no') }}" required>
                        @error('serial_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <hr />
                        <h5>Site, Location, Category and Department</h5>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="site_id">Site</label>
                        <div class="d-flex">
                            <select class="form-select @error('site_id') is-invalid @enderror" id="siteSelect"
                                name="site_id" required>
                            </select>
                            @error('site_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#SitesModal" data-bs-original-title="" title="">Add</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="location_id">Location</label>
                        <div class="d-flex">
                            <select class="form-select @error('location_id') is-invalid @enderror" id="locationSelect"
                                name="location_id" required>
                            </select>
                            @error('location_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#LocationModal" data-bs-original-title="" title="">Add</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="category_id">Category</label>
                        <div class="d-flex">
                            <select class="form-select @error('category_id') is-invalid @enderror" id="categorySelect"
                                name="category_id" required>
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#CategoryModal" data-bs-original-title="" title="">Add</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="department_id">Department</label>
                        <div class="d-flex">
                            <select class="form-select @error('department_id') is-invalid @enderror" id="departmentSelect"
                                name="department_id" required>
                            </select>
                            @error('department_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#DepartmentModal" data-bs-original-title="" title="">Add</button>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <hr />
                        <h5>Asset Photo</h5>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control @error('asset_photo_file') is-invalid @enderror" type="file"
                            name="asset_photo_file" aria-label="file example">
                        @error('asset_photo_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <hr />
                        <h5>Depreciation</h5>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="depreciable_asset">Depreciable Asset</label>
                        <div class="d-flex">
                            <label class="d-block" for="depreciable_asset_yes">
                                <input class="radio_animated" id="depreciable_asset_yes" name="depreciable_asset"
                                    type="radio" value="1">Yes
                            </label>
                            <label class="d-block ms-2" for="depreciable_asset_no">
                                <input class="radio_animated" id="depreciable_asset_no" name="depreciable_asset"
                                    type="radio" value="0">No
                            </label>
                        </div>
                        @error('depreciable_asset')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="depreciable_cost">Depreciable Cost</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">₱</span>
                            <input class="form-control @error('depreciable_cost') is-invalid @enderror"
                                id="depreciable_cost" name="depreciable_cost" type="number" step="0.01"
                                value="{{ old('depreciable_cost') }}" required>
                            @error('depreciable_cost')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="salvage_value">Salvage Value</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">₱</span>
                            <input class="form-control @error('salvage_value') is-invalid @enderror" id="salvage_value"
                                name="salvage_value" type="number" step="0.01" value="{{ old('salvage_value') }}"
                                required>
                            @error('salvage_value')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="assets_life">Assets Life</label>
                        <input class="form-control @error('assets_life') is-invalid @enderror" id="assets_life"
                            name="assets_life" type="text" value="{{ old('assets_life') }}" required>
                        @error('assets_life')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="depreciation_method">Depreciation Method</label>
                        <input class="form-control @error('depreciation_method') is-invalid @enderror"
                            id="depreciation_method" name="depreciation_method" type="text"
                            value="{{ old('depreciation_method') }}" required>
                        @error('depreciation_method')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label" for="date_acquired">Date Acquired</label>
                        <input class="form-control @error('date_acquired') is-invalid @enderror" id="date_acquired"
                            name="date_acquired" type="date" value="{{ old('date_acquired') }}" required>
                        @error('date_acquired')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <hr />
                        <h5>Accounting</h5>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="funding_source">Funding Source</label>
                        <div class="d-flex">
                            <select class="form-select @error('funding_source') is-invalid @enderror"
                            id="fundingSelect" name="funding_id" required>
                            </select>
                            @error('funding_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#FundingsModal" data-bs-original-title="" title="">Add</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="amount_debited">Amount Debited</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">₱</span>
                            <input class="form-control @error('amount_debited') is-invalid @enderror"
                                id="amount_debited" name="amount_debited" type="number" step="0.01"
                                value="{{ old('amount_debited') }}" required>
                            @error('amount_debited')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="funding_source">Payment Mode</label>
                        <div class="d-flex">
                            <select class="form-select"
                            id="paymentModeSelect" name="payment_mode_id" required onchange="check_payment_mode(this.value)">
                            </select>
                            @error('payment_mode_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!-- <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#PaymentModeModal" data-bs-original-title="" title="">Add</button> -->
                        </div>
                    </div>
                    <div class="col-md-12" id="div_check" style="display: none;">
                        <button type="button" class="btn btn-primary" onclick="addPaymentRow()">+</button>
                        <div id="paymentRowsContainer" class="mt-3"></div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-12">
                        <hr />
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@include('partials.add_asset_modal')

@include('partials.add_asset_lastid')


@section('scripts')
<script>
    document.getElementById('add_assets-navbar').classList.add('active');
    
    document.addEventListener('DOMContentLoaded', function(event) {
        // Example fetch request to replace fetchSites functionality
        loadData();
        $('.hiddenpreload').css('display', 'block');//pra dli una mo display ang other html ayha ang actual 
    });


    function loadData()
    {
        fetch('/api/sites')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var select = document.getElementById('siteSelect');

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

            
            fetch('/api/sites')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var select = document.getElementById('siteSelect2');

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


            fetch('/api/locations')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var select = document.getElementById('locationSelect');

                // Clear existing options (if any)
                select.innerHTML = '';

                // Create and append new options based on fetched data
                data.forEach(function(location) {
                    var option = document.createElement('option');
                    option.value = location.id;
                    option.textContent = location.name;
                    select.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });

            fetch('/api/categories')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var select = document.getElementById('categorySelect');

                // Clear existing options (if any)
                select.innerHTML = '';

                // Create and append new options based on fetched data
                data.forEach(function(category) {
                    var option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    select.appendChild(option);
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
                // Assuming data is an array of objects with id and site_name properties
                var select = document.getElementById('departmentSelect');

                // Clear existing options (if any)
                select.innerHTML = '';

                // Create and append new options based on fetched data
                data.forEach(function(department) {
                    var option = document.createElement('option');
                    option.value = department.id;
                    option.textContent = department.name;
                    select.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });

            fetch('/api/fundings')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var select = document.getElementById('fundingSelect');

                // Clear existing options (if any)
                select.innerHTML = '';

                // Create and append new options based on fetched data
                data.forEach(function(funding) {
                    var option = document.createElement('option');
                    option.value = funding.id;
                    option.textContent = funding.name;
                    select.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });

            fetch('/payment-modes')
                .then(response => response.json())
                .then(data => {
                    const paymentModeSelect = document.getElementById('paymentModeSelect');
                    
                    // Clear any existing options
                    paymentModeSelect.innerHTML = '';

                    // Populate the select options with payment modes
                    data.forEach(paymentMode => {
                        const option = document.createElement('option');
                        option.value = paymentMode.id;
                        option.textContent = paymentMode.payment_name;
                        paymentModeSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching payment modes:', error);
                });
    }
    
    function check_payment_mode(value) {
        if (value == 2) {
            // Show the div containing the input rows
            $('#div_check').show();
            addPaymentRow(); // Optionally add the first row when Payment Mode is 2
        } else {
            // Hide the div and clear the previously added rows
            $('#div_check').hide();
            resetPaymentRows(); // Clear all rows if a different mode is selected
        }
    }

    function addPaymentRow() {
        // Create a new div to hold the row inputs
        const paymentRow = document.createElement('div');
        paymentRow.className = 'row mb-3 payment-row'; // Add a class to identify each row

        // Create the inner HTML for each input and a remove button
        paymentRow.innerHTML = `
            <div class="col-md-1">
                <label for="date">Date</label>
                <input type="date" name="date_check[]" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="check_no">Check #</label>
                <input type="text" name="check_no[]" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="description">Description</label>
                <textarea name="description_check[]" class="form-control" rows="2"></textarea>
            </div>
            <div class="col-md-2">
                <label for="amount">Amount</label>
                <input type="text" name="amount[]" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date[]" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="bank">Bank</label>
                <select name="bank[]" class="form-select">
                    <option value="">Select Bank</option>
                    <option value="BDO">BDO (Banco de Oro)</option>
                    <option value="BPI">BPI (Bank of the Philippine Islands)</option>
                    <option value="Metrobank">Metrobank</option>
                    <option value="Landbank">Landbank of the Philippines</option>
                    <option value="PNB">Philippine National Bank (PNB)</option>
                    <option value="RCBC">RCBC (Rizal Commercial Banking Corporation)</option>
                    <option value="Security Bank">Security Bank</option>
                    <option value="UnionBank">UnionBank of the Philippines</option>
                    <option value="China Bank">China Bank</option>
                    <option value="EastWest Bank">EastWest Bank</option>
                    <option value="UCPB">United Coconut Planters Bank (UCPB)</option>
                </select>
            </div>
            <div class="col-md-1 mt-4">
                <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
            </div>
        `;

        // Append the new row to the container
        document.getElementById('paymentRowsContainer').appendChild(paymentRow);

        // Attach the remove button functionality
        paymentRow.querySelector('.remove-row').addEventListener('click', function() {
            removePaymentRow(paymentRow);
        });
    }

    function resetPaymentRows() {
        // Clear all the content inside the paymentRowsContainer div
        document.getElementById('paymentRowsContainer').innerHTML = '';
    }

    function removePaymentRow(rowElement) {
        // Remove the selected row element
        rowElement.remove();
    }
</script>
@endsection