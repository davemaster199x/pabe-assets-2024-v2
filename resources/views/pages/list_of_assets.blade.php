@extends('layouts.master')

@section('title', 'List of Assets')
@section('page-title', 'List of Assets')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="display" id="list_assets_table" class="display">
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
                        @foreach($assets as $asset)
                        <tr>
                            <td></td>
                            <td>{{ $asset->assets_tag_id }}</td>
                            <td>{{ $asset->description }}</td>
                            <td>{{ $asset->brand }}</td>
                            <td>{{ $asset->purchase_date }}</td>
                            <td>{{ $asset->cost }}</td>
                            <td>{{ $asset->status_name }}</td>
                            <td></td>
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

@section('scripts')
    <script>
        document.getElementById('list_of_assets-navbar').classList.add('active');

        if (!$.fn.dataTable.isDataTable('#list_assets_table')) {
            $('#list_assets_table').DataTable({
                paging: false, // Disable pagination
                info: false, // Disable information display
            });
        }
    </script>
@endsection
