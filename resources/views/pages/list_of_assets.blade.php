@extends('layouts.master')

@section('title', 'List of Assets')
@section('page-title', 'List of Assets')

@section('header')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>



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
                            <th>Depriciable Value</th>
                            <th>Salvage Value</th>
                            <th>Department</th>
                            <th>Assigned To</th>
                            <th>Site</th>
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

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

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

                { "data": "depreciable_cost" },
                { "data": "salvage_value" },

                { "data": "department_name" },
                { "data": "assigned_to" },
                { "data": "site" },

                { "data": "view_button" }
            ],
            "dom": 'Bfrtip',
            "buttons": [
                {
    text: 'Export Excel',
    action: function (e, dt, node, config) {
        var data = dt.buttons.exportData();
        var ws_data = [];
        ws_data.push(["Asset Photo", "Asset Tag ID", "Description", "Brand", "Purchase Date", "Cost", "Status", "Depriciable Value", "Salvage Value" , "Department" , "Assigned Person", "Action"]);

        data.body.forEach(function(row) {
            ws_data.push(row);
        });

        // Create a worksheet and a workbook
        var ws = XLSX.utils.aoa_to_sheet(ws_data);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Assets");

        // Generate Excel file
        var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
        var blob = new Blob([wbout], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });

        // Use FileSaver.js to prompt Save As dialog
        saveAs(blob, 'assets_list.xlsx');
    }
},
{
    text: 'Export PDF',
    action: function (e, dt, node, config) {
        var { jsPDF } = window.jspdf;
        var doc = new jsPDF();

        var data = dt.buttons.exportData();
        var columns = ["Asset Photo", "Asset Tag ID", "Description", "Brand", "Purchase Date", "Cost", "Status", "Depriciable Value", "Salvage Value", "Department" , "Assigned Person", "Action"];
        var rows = data.body;

        doc.autoTable({
            head: [columns],
            body: rows
        });

        // Generate PDF and prompt Save As dialog
        doc.save('assets_list.pdf');
    }
},
{
    text: 'Download QR ZIP',
    action: function () {
        downloadAllQrCodes(); // ✅ Call the JS-based ZIP function
    }
}





            ]
        });
    });
</script>
<script>
async function downloadAllQrCodes() {
    const assets = await fetch('/api/assets').then(res => res.json());
    const data = assets.data || assets; // Depending on your API response format

    const zip = new JSZip();

    for (let asset of data) {
        const tagId = asset.assets_tag_id;

        // ✅ Generate PNG QR as base64
        const dataUrl = await QRCode.toDataURL(tagId, {
            errorCorrectionLevel: 'H',
            width: 300
        });

        // ✅ Convert base64 to binary Uint8Array
        const base64 = dataUrl.split(',')[1];
        const binary = atob(base64);
        const array = new Uint8Array(binary.length);
        for (let i = 0; i < binary.length; i++) {
            array[i] = binary.charCodeAt(i);
        }

        // ✅ Add PNG to zip
        zip.file(`${tagId}.png`, array);
    }

    // ✅ Generate zip & trigger download
    zip.generateAsync({ type: 'blob' }).then(function(content) {
        saveAs(content, 'qrcodes.zip');
    });
}
</script>


@endsection
