@extends('layouts.master')

@section('title', 'Asset Details')
@section('active-home', 'active')
@section('page-title', 'Asset View')

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h3 id="asset_description"></h3>
                    </div>
                    <div class="col-6">
                        <div style="float: right;">
                            <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Asset</button>
                            <button type="button" class="btn btn-success">More Actions</button>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-4">
                        <div style="border: 1px solid #ddd; padding: 10px; display: flex; justify-content: center; align-items: center; width: fit-content; margin: auto;" id="asset_photo">
                        </div>
                    </div>
                    <div class="col-4">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    Asset Tag ID
                                </td>
                                <td id="asset_tag_id"></td>
                            </tr>
                            <tr>
                                <td>
                                    Purchase Date
                                </td>
                                <td id="asset_purchase_date"></td>
                            </tr>
                            <tr>
                                <td>
                                    Cost
                                </td>
                                <td id="asset_cost"></td>
                            </tr>
                            <tr>
                                <td>
                                    Brand
                                </td>
                                <td id="asset_brand"></td>
                            </tr>
                            <tr>
                                <td>
                                    Model
                                </td>
                                <td id="asset_model"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    Site
                                </td>
                                <td id="asset_site_name"></td>
                            </tr>
                            <tr>
                                <td>
                                    Location
                                </td>
                                <td id="asset_location_name"></td>
                            </tr>
                            <tr>
                                <td>
                                    Category
                                </td>
                                <td id="asset_category_name"></td>
                            </tr>
                            <tr>
                                <td>
                                    Department
                                </td>
                                <td id="asset_department_name"></td>
                            </tr>
                            <tr>
                                <td>
                                    Assigned to
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    Status
                                </td>
                                <td id="asset_status_name"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="info-details-tab" data-bs-toggle="tab" href="#info-details" role="tab" aria-controls="info-details" aria-selected="true">Details</a></li>
                    <li class="nav-item"><a class="nav-link" id="events-info-tab" data-bs-toggle="tab" href="#info-events" role="tab" aria-controls="info-events" aria-selected="false">Events</a></li>
                    <li class="nav-item"><a class="nav-link" id="docs-info-tab" data-bs-toggle="tab" href="#info-docs" role="tab" aria-controls="info-docs" aria-selected="false">Docs.</a></li>
                    <li class="nav-item"><a class="nav-link" id="warranty-info-tab" data-bs-toggle="tab" href="#info-warranty" role="tab" aria-controls="info-warranty" aria-selected="false">Warranty</a></li>
                    <li class="nav-item"><a class="nav-link" id="linking-info-tab" data-bs-toggle="tab" href="#info-linking" role="tab" aria-controls="info-linking" aria-selected="false">Linking</a></li>
                </ul>
                <div class="tab-content" id="info-tabContent">
                    <div class="tab-pane fade show active" id="info-details" role="tabpanel" aria-labelledby="info-details-tab">
                    Details
                    </div>
                    <div class="tab-pane fade" id="info-events" role="tabpanel" aria-labelledby="events-info-tab">
                    Events
                    </div>
                    <div class="tab-pane fade" id="info-docs" role="tabpanel" aria-labelledby="docs-info-tab">
                    Docs
                    </div>
                    <div class="tab-pane fade" id="info-warranty" role="tabpanel" aria-labelledby="warranty-info-tab">
                    warranty
                    </div>
                    <div class="tab-pane fade" id="info-linking" role="tabpanel" aria-labelledby="linking-info-tab">
                    linking
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('list_of_assets-navbar').classList.add('active');

        var asset_id = {{ $asset_id }};
        fetch(`/api/asset_details/${asset_id}`)
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                $('#asset_description').html(data.description);
                if (data.asset_photo_file != '') {
                    $('#asset_photo').html(
                        `<img src="{{ asset('storage') }}/${data.asset_photo_file}" alt="${data.description}" style="width: 100%; height: auto;">`
                    );
                } else {
                    $('#asset_photo').html(
                        `<img src="{{ asset('images/No_Image_Available.jpg') }}" alt="No Image Available" style="width: 100%; height: auto;">`
                    );
                }
                $('#asset_tag_id').html(data.assets_tag_id);
                $('#asset_purchase_date').html(data.purchase_date);
                $('#asset_cost').html(data.cost);
                $('#asset_brand').html(data.brand);
                $('#asset_model').html(data.model);
                $('#asset_site_name').html(data.site.site_name);
                $('#asset_location_name').html(data.location.location_name);
                $('#asset_category_name').html(data.category.category_name);
                $('#asset_department_name').html(data.department.department_name);
                $('#asset_status_name').html(data.status.status_name);
            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });
    </script>

@endsection