<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .no-data { text-align: center; padding: 20px; font-style: italic; color: #666; }
    </style>
</head>
<body>
    <h1>Asset Report</h1>
    <p>Date Range: {{ $from }} to {{ $to }}</p>
    
    @if($assets->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Asset Tag</th>
                    <th>Description</th>
                    <th>Purchase Date</th>
                    <th>Cost</th>
                    <th>Site</th>
                    <th>Location</th>
                    <th>Category</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                <tr>
                    <td>{{ $asset->assets_tag_id }}</td>
                    <td>{{ $asset->description }}</td>
                    <td>{{ $asset->purchase_date }}</td>
                    <td>{{ $asset->cost }}</td>
                    <td>{{ $asset->site->site_name ?? 'N/A' }}</td>
                    <td>{{ $asset->location->location_name ?? 'N/A' }}</td>
                    <td>{{ $asset->category->category_name ?? 'N/A' }}</td>
                    <td>{{ $asset->department->department_name ?? 'N/A' }}</td>
                    <td>{{ $asset->status->status_name ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            <p>No asset data available for the selected date range.</p>
        </div>
    @endif
</body>
</html>