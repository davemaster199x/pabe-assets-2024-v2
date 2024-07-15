@extends('layouts.master')

@section('title', 'List of Assets')
@section('page-title', 'List of Assets')

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
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Autofill</h5><span>AutoFill gives an Excel like option to a DataTable to click and drag over multiple
                cells, filling in information over the selected cells and incrementing numbers as needed.</span>
        </div>
        <div class="card-body">
            <div class="dt-ext table-responsive">
                <table class="display" id="listassets">
                <thead>
        <tr>
            <th>Asset Tag ID</th>
            <th>Description</th>
            <th>Brand</th>
            <th>Purchase Date</th>
            <th>Cost</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data rows will be populated by DataTables -->
    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<?php /*
@section('old_content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive" style="overflow-x: hidden;">
                <table class="display" id="list_assets_table" class="display">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all"></th>
                            <th></th>
                            <th>Asset Tag ID</th>
                            <th>Description</th>
                            <th>Brand</th>
                            <th>Purchase Date</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assets as $asset)
                        <tr>
                            <td>
                                <input type="checkbox" class="asset_checkbox" data-id="{{ $asset->asset_id }}">
                            </td>
                            <td>
                                @if(Storage::disk('public')->exists($asset->asset_photo_file))
                                <img src="{{ asset('storage/' . $asset->asset_photo_file) }}"
                                    alt="{{ $asset->description }}" style="width: 100px; height: auto;">
                                @else
                                No Image
                                @endif
                            </td>
                            <td>{{ $asset->assets_tag_id }}</td>
                            <td>{{ $asset->description }}</td>
                            <td>{{ $asset->brand }}</td>
                            <td>{{ $asset->purchase_date }}</td>
                            <td>{{ $asset->cost }}</td>
                            <td>{{ $asset->status_name }}</td>
                            <td><a href="{{ route('asset_details', ['asset' => $asset->asset_id]) }}"
                                    class="btn btn-outline-light" style="border-color: black; color: black;"
                                    title="btn btn-outline-light" data-bs-original-title="btn btn-outline-light"
                                    data-original-title="btn btn-outline-light txt-dark">
                                    <i class="icofont icofont-eye-alt"></i>View
                                </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <p>
                    Showing {{ $assets->firstItem() }} to {{ $assets->lastItem() }} of {{ $assets->total() }} entries
                </p>
            </div>
            <!-- Pagination links -->
            <div class="d-flex justify-content-center">
                {{ $assets->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
*/ ?>


@section('scripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#listassets').DataTable({
        "ajax": {
            "url": "/api/assets",
            "type": "GET"
        },
        "columns": [
            { "data": "assets_tag_id" },
            { "data": "description" },
            { "data": "brand" },
            { "data": "purchase_date" },
            { "data": "cost" },
            { "data": "status_id" },
            { "data": "view_button" }
        ]
    });
});

</script>


<script>
document.getElementById('list_of_assets-navbar').classList.add('active');
/*
if (!$.fn.dataTable.isDataTable('#list_assets_table')) {
    $('#list_assets_table').DataTable({
        paging: false, // Disable pagination
        info: false, // Disable information display
        columnDefs: [{
                orderable: false,
                targets: 0
            } // Disable sorting on the first column
        ]
    });
}

document.getElementById('select_all').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.asset_checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateCheckedItems();
});

document.querySelectorAll('.asset_checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        updateCheckedItems();
    });
});

function updateCheckedItems() {
    const checkedItems = [];
    document.querySelectorAll('.asset_checkbox:checked').forEach(checkbox => {
        checkedItems.push(checkbox.getAttribute('data-id'));
    });
    console.log('Checked items:', checkedItems);
    // You can perform further actions with the checked items here
}*/
</script>
@endsection