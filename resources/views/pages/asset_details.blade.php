@extends('layouts.master')

@section('title', 'Asset Details')
@section('active-home', 'active')
@section('page-title', 'Asset View')

@section('header')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* .dropdown-content{
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 175px;
            -webkit-box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            left: 0;
            top: 45px;
        } */
         .btn-group .dropdown-menu {
            min-width: 200px; /* Set minimum width */
        }

        .btn-group .dropdown-item:hover {
            background-color: #f0f0f0; /* Change hover color */
        }

        .btn-group .dropdown-item {
            padding: 10px 20px; /* Adjust padding */
        }

    </style>
@endsection


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
                            <a href="{{ url('assets/edit/' . $encrypt_asset_id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Asset</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    More Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><span><i class="icofont icofont-user"></i></span> Check Out</a></li>
                                    <li><a class="dropdown-item" href="#"><span><i class="icofont icofont-ui-check"></i></span> Check In</a></li>
                                    <li><a class="dropdown-item" href="#"><span><i class="icofont icofont-trash"></i></span> Dispose</a></li>
                                    <!-- Add more actions as needed -->
                                </ul>
                            </div>
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
                                    QR Code
                                </td>
                                <td id="qr_code">

                                </td>
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

        // Get the current URL path
        const currentPath = window.location.pathname;

        // Split the URL path by '/'
        const parts = currentPath.split('/');

        // Find the index of 'detail' in the path
        const detailIndex = parts.indexOf('detail');
        let assetId = '';

        // Extract the asset_id which is next to 'detail'
        if (detailIndex !== -1 && detailIndex < parts.length - 1) {
            assetId = parts[detailIndex + 1];
            console.log('Extracted Asset ID:', assetId);
        } else {
            console.error('Asset ID not found in the URL path');
        }

        async function fetchAssetDetails(assetId) {
            try {
                const response = await fetch(`/api/asset_details/${assetId}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                updateAssetDetails(data);
                await fetchQRCode(data.assets_tag_id);
            } catch (error) {
                console.error('Error fetching asset details:', error);
            }
        }

        function updateAssetDetails(data) {
            $('#asset_description').html(data.description);

            const assetPhotoUrl = `{{ asset('storage') }}/${data.asset_photo_file}`;
            const defaultPhotoUrl = `{{ asset('images/No_Image_Available.jpg') }}`;

            checkImageExists(assetPhotoUrl, function(exists) {
                const imgUrl = exists ? assetPhotoUrl : defaultPhotoUrl;
                $('#asset_photo').html(
                    `<img src="${imgUrl}" alt="${data.description || 'No Image Available'}" style="width: 100%; height: auto;">`
                );
            });

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
        }

        function checkImageExists(url, callback) {
            const img = new Image();
            img.onload = () => callback(true);
            img.onerror = () => callback(false);
            img.src = url;
        }

        async function fetchQRCode(assetsTagId) {
            try {
                const response = await fetch(`/qrcode/${assetsTagId}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const html = await response.text();
                $('#qr_code').html(html);
                console.log('Fetched HTML:', html);
            } catch (error) {
                console.error('Error fetching QR code:', error);
            }
        }

        // Initiate the fetch process if assetId is valid
        if (assetId) {
            fetchAssetDetails(assetId);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const dropdownToggle = document.querySelector('.dropdown-toggle');

            dropdownToggle.addEventListener('click', function () {
                const dropdownMenu = this.nextElementSibling;

                // Toggle dropdown visibility
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                } else {
                    dropdownMenu.classList.add('show');
                }
            });
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

@endsection