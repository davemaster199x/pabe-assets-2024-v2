@extends('layouts.master')

@section('title', 'Edit Asset')
@section('active-edit-assets', 'active')
@section('page-title', 'Edit Asset')

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
            <form method="POST" action="{{ route('data_assets.update', $asset_id) }}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT') <!-- Assuming you're using PUT for update -->
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label" for="description">Description*</label>
                        <input class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" type="text" value="{{ old('description', $data->description) }}" required>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="assets_tag_id">Asset Tag ID*</label>
                        <input class="form-control @error('assets_tag_id') is-invalid @enderror" id="assets_tag_id"
                            name="assets_tag_id" type="text" value="{{ old('assets_tag_id', $data->assets_tag_id) }}" required>
                        @error('assets_tag_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="purchase_from">Purchased from</label>
                        <input class="form-control @error('purchase_from') is-invalid @enderror" id="purchase_from"
                            name="purchase_from" type="text" value="{{ old('purchase_from', $data->purchase_from) }}">
                        @error('purchase_from')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="purchase_date">Purchased Date</label>
                        <input class="form-control @error('purchase_date') is-invalid @enderror" id="purchase_date"
                            name="purchase_date" type="date" value="{{ old('purchase_date', $data->purchase_date) }}" required>
                        @error('purchase_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="brand">Brand</label>
                        <input class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                            type="text" value="{{ old('brand', $data->brand) }}" required>
                        @error('brand')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="cost">Cost</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">₱</span>
                            <input class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost"
                                type="number" step="0.01" value="{{ old('cost', $data->cost) }}" required>
                            @error('cost')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="model">Model</label>
                        <input class="form-control @error('model') is-invalid @enderror" id="model" name="model"
                            type="text" value="{{ old('model', $data->model) }}" required>
                        @error('model')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="serial_no">Serial No</label>
                        <input class="form-control @error('serial_no') is-invalid @enderror" id="serial_no"
                            name="serial_no" type="text" value="{{ old('serial_no', $data->serial_no) }}" required>
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
                                <!-- Populate with options -->
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
                                <!-- Populate with options -->
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
                                <!-- Populate with options -->
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
                                <!-- Populate with options -->
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
                    <div class="col-md-6">
                        <label class="form-label" for="asset_life">Life</label>
                        <input class="form-control @error('asset_life') is-invalid @enderror" id="asset_life"
                            name="asset_life" type="number" value="{{ old('asset_life', $data->asset_life) }}">
                        @error('asset_life')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="salvage_value">Salvage Value</label>
                        <input class="form-control @error('salvage_value') is-invalid @enderror" id="salvage_value"
                            name="salvage_value" type="number" value="{{ old('salvage_value', $data->salvage_value) }}">
                        @error('salvage_value')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="depreciation_type">Depreciation Type</label>
                        <input class="form-control @error('depreciation_type') is-invalid @enderror" id="depreciation_type"
                            name="depreciation_type" type="text" value="{{ old('depreciation_type', $data->depreciation_type) }}">
                        @error('depreciation_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="depreciation_rate">Depreciation Rate</label>
                        <input class="form-control @error('depreciation_rate') is-invalid @enderror" id="depreciation_rate"
                            name="depreciation_rate" type="number" step="0.01" value="{{ old('depreciation_rate', $data->depreciation_rate) }}">
                        @error('depreciation_rate')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-secondary" href="{{ route('data_assets.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
