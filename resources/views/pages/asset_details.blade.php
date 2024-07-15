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
                        <h3>{{ $asset->description }}</h3>
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
                        <div style="border: 1px solid #ddd; padding: 10px; display: flex; justify-content: center; align-items: center; width: fit-content; margin: auto;">
                            @if(Storage::disk('public')->exists($asset->asset_photo_file))
                                    <img src="{{ asset('storage/' . $asset->asset_photo_file) }}" alt="{{ $asset->description }}" style="width: 100%; height: auto;">
                            @else
                                No Image
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    Asset Tag ID
                                </td>
                                <td>{{ $asset->assets_tag_id }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Purchase Date
                                </td>
                                <td>{{ $asset->purchase_date }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Cost
                                </td>
                                <td>${{ $asset->cost }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Brand
                                </td>
                                <td>${{ $asset->brand }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Model
                                </td>
                                <td>{{ $asset->model }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    Site
                                </td>
                                <td>{{ $asset->site->site_name }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Location
                                </td>
                                <td>{{ $asset->location->location_name }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Category
                                </td>
                                <td>{{ $asset->category->category_name }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Department
                                </td>
                                <td>{{ $asset->department->department_name }}</td>
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
                                <td>{{ $asset->status->status_name }}</td>
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
    </script>

@endsection