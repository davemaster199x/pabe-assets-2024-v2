@extends('layouts.master')

@section('title', 'Add Asset')
@section('page-title', 'Add Asset')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Asset Details</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="validationCustom01">Description*</label>
                    <input class="form-control" id="validationCustom01" type="text" value="" required=""
                        data-bs-original-title="" title="">
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom02">Asset Tag ID*</label>
                    <input class="form-control" id="validationCustom02" type="text" value="" required=""
                        data-bs-original-title="" title="">
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Purchased from</label>
                    <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                        aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                    <div class="invalid-feedback">Required</div>

                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Purchased Date</label>
                    <div class="input-group"><span class="input-group-text" id="inputGroupPrepend"><i
                                data-feather="calendar"> </i></span>
                        <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Brand</label>
                    <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                        aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                    <div class="invalid-feedback">Required</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Cost</label>
                    <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">₱</span>
                        <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Model</label>
                    <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                        aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                    <div class="invalid-feedback">Required</div>

                </div>
                <div class="col-md-6 ">
                    <label class="form-label" for="validationCustomUsername">Serial No</label>
                    <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                        aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                    <div class="invalid-feedback">Required</div>

                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-12">
                    <hr />
                    <h5>Site, Location, Category and Department</h5>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom04">Site</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add</button>
                    </div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="validationCustom04">Location</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add</button>
                    </div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="validationCustom04">Category</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add</button>
                    </div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="validationCustom04">Department</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add</button>
                    </div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-12">
                    <hr />
                    <h5>Asset Photo</h5>
                </div>
                <div>
                    <input class="form-control" type="file" aria-label="file example" required=""
                        data-bs-original-title="" title="">
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-12">
                    <hr />
                    <h5>Depreciation</h5>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="validationCustom04">Depreciable Asset</label>
                    <div class="d-flex">
                        <label class="d-block" for="edo-ani">
                            <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked=""
                                data-bs-original-title="" title="">Yes
                        </label>
                        <label class="d-block" for="edo-ani1">
                            <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani"
                                data-bs-original-title="" title="">No
                        </label>
                    </div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Depreciable Cost</label>
                    <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">₱</span>
                        <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                    </div>
                    <div class="">Including sales tax, freight and Installation</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Asset Life (months)</label>
                    <div class="input-group">
                        <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Salvage Value</label>
                    <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">₱</span>
                        <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom04">Site</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add</button>
                    </div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Date Acquired</label>
                    <div class="input-group"><span class="input-group-text" id="inputGroupPrepend"><i
                                data-feather="calendar"> </i></span>
                        <input class="form-control" id="validationCustomUsername" type="date" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-12">
                    <hr />
                    <h5>Funding</h5>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom04">Site</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add</button>
                    </div>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Salvage Value</label>
                    <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">₱</span>
                        <input class="form-control" id="validationCustomUsername" type="text" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection