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
        <div class="card-body">
            <div class="dt-ext table-responsive">
                <table class="display" id="listassets">
                <thead>
                    <tr>
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
                    <!-- Data rows will be populated by DataTables -->
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

        document.getElementById('list_of_assets-navbar').classList.add('active');

        $(document).ready(function() {
            $('#listassets').DataTable({
                "ajax": {
                    "url": "/api/assets",
                    "type": "GET"
                },
                "columns": [
                    { "data": "asset_photo" },
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