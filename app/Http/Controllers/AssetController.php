<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset; // Make sure to import the Asset model

class AssetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'assets_tag_id' => 'required|string|max:150',
            'purchase_date' => 'nullable|date',
            'cost' => 'nullable|numeric',
            'purchase_from' => 'nullable|string|max:150',
            'brand' => 'nullable|string|max:150',
            'model' => 'nullable|string|max:150',
            'serial_no' => 'nullable|string|max:150',
            'site_id' => 'nullable|integer',
            'location_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'department_id' => 'nullable|integer',
            'asset_photo_file' => 'nullable|file|mimes:jpg,png,jpeg',
            'depreciable_asset' => 'nullable|integer',
            'depreciable_cost' => 'nullable|numeric',
            'salvage_value' => 'nullable|numeric',
            'assets_life' => 'nullable|string|max:50',
            'depreciation_method' => 'nullable|string|max:100',
            'date_acquired' => 'nullable|date',
            'funding_source' => 'nullable|string|max:100',
            'amount_debited' => 'nullable|numeric',
            'status_id' => 'nullable|integer',
            'delete' => 'nullable|string|max:1',
        ]);

        // Create a new instance of the Asset model
        $asset = new Asset();
        
        // Assign values from request to the model instance
        $asset->description = $request->description;
        $asset->assets_tag_id = $request->assets_tag_id;
        $asset->purchase_date = $request->purchase_date;
        $asset->cost = $request->cost;
        $asset->purchase_from = $request->purchase_from;
        $asset->brand = $request->brand;
        $asset->model = $request->model;
        $asset->serial_no = $request->serial_no;
        $asset->site_id = $request->site_id;
        $asset->location_id = $request->location_id;
        $asset->category_id = $request->category_id;
        $asset->department_id = $request->department_id;

        // Handle file upload if asset_photo_file is present
        if ($request->hasFile('asset_photo_file')) {
            $asset->asset_photo_file = $request->file('asset_photo_file')->store('assets_photos');
        }

        $asset->depreciable_asset = $request->depreciable_asset;
        $asset->depreciable_cost = $request->depreciable_cost;
        $asset->salvage_value = $request->salvage_value;
        $asset->assets_life = $request->assets_life;
        $asset->depreciation_method = $request->depreciation_method;
        $asset->date_acquired = $request->date_acquired;
        $asset->funding_source = $request->funding_source;
        $asset->amount_debited = $request->amount_debited;
        $asset->status_id = $request->status_id;
        $asset->delete = $request->delete ?? '0';

        // Save the asset to the database
        $asset->save();

        return redirect()->route('add_assets')->with('success', 'Asset created successfully.');
    }
}
