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
                            <select class="form-select @error('site_id') is-invalid @enderror" id="site_id"
                                name="site_id" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Site 1</option>
                                <option value="2">Site 2</option>
                            </select>
                            @error('site_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button">Add</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="location_id">Location</label>
                        <div class="d-flex">
                            <select class="form-select @error('location_id') is-invalid @enderror" id="location_id"
                                name="location_id" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                            </select>
                            @error('location_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button">Add</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="category_id">Category</label>
                        <div class="d-flex">
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button">Add</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="department_id">Department</label>
                        <div class="d-flex">
                            <select class="form-select @error('department_id') is-invalid @enderror" id="department_id"
                                name="department_id" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Department 1</option>
                                <option value="2">Department 2</option>
                            </select>
                            @error('department_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button">Add</button>
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
                                    type="radio" value="1" >Yes
                            </label>
                            <label class="d-block ms-2" for="depreciable_asset_no">
                                <input class="radio_animated" id="depreciable_asset_no" name="depreciable_asset"
                                    type="radio" value="0" >No
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
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <hr />
                        <h5>Accounting</h5>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="date_acquired">Date Acquired</label>
                        <input class="form-control @error('date_acquired') is-invalid @enderror" id="date_acquired"
                            name="date_acquired" type="date" value="{{ old('date_acquired') }}" required>
                        @error('date_acquired')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="funding_source">Funding Source</label>
                        <div class="d-flex">
                            <select class="form-select @error('funding_source') is-invalid @enderror"
                                id="funding_source" name="funding_source" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Funding Source 1</option>
                                <option value="2">Funding Source 2</option>
                            </select>
                            @error('funding_source')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button">Add</button>
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
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <hr />
                        <h5>Status</h5>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="status_id">Status</label>
                        <div class="d-flex">
                            <select class="form-select @error('status_id') is-invalid @enderror" id="status_id"
                                name="status_id" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Status 1</option>
                                <option value="2">Status 2</option>
                            </select>
                            @error('status_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary ms-2" type="button">Add</button>
                        </div>
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