<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset; // Make sure to import the Asset model

class AssetController extends Controller
{

    public function add_asset()
    {
        return view('pages.add_asset');
    }

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

         // Call the getLastAssetId method
         $response = $this->getLastAssetId();

         // Extract the data from the response
         $lastIdData = $response->getData();
 
         // Access the formatted ID
         $formattedId = $lastIdData->last_id;
        
        // Assign values from request to the model instance
        $asset->description = $request->description;
        $asset->assets_tag_id = $formattedId; //useless ang modification sa frontend kung ma retrive ra sa backend inig add sa assets
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
            $asset->asset_photo_file = $request->file('asset_photo_file')->store('assets_photos', 'public');
        }

        $asset->depreciable_asset = $request->depreciable_asset;
        $asset->depreciable_cost = $request->depreciable_cost;
        $asset->salvage_value = $request->salvage_value;
        $asset->assets_life = $request->assets_life;
        $asset->depreciation_method = $request->depreciation_method;
        $asset->date_acquired = $request->date_acquired;
        $asset->funding_source = $request->funding_source;
        $asset->amount_debited = $request->amount_debited;
        $asset->status_id = 1;//$request->status_id;
        $asset->delete = $request->delete ?? '0';

        // Save the asset to the database
        $asset->save();

        return redirect()->route('add_assets')->with('success', 'Asset created successfully.');
    }

    public function list_of_assets()
    {
        $assets = DB::table('tbl_assets')
            ->join('tbl_status', 'tbl_assets.status_id', '=', 'tbl_status.status_id')
            ->where('tbl_assets.delete', 0)
            ->where('tbl_status.delete', 0)
            ->select('tbl_assets.*', 'tbl_status.status_name')
            ->orderBy('tbl_assets.asset_id', 'desc')
            ->paginate(10);

        return view('pages.list_of_assets', compact('assets'));
    }

    public function asset_details($asset_id)
    {
        $asset = Asset::findOrFail($asset_id);

        return view('pages.asset_details', compact('asset'));
    }

    public function getLastAssetId()
    {
        // Get the last asset_id
        $lastAsset = Asset::latest('asset_id')->first();

        // Format the asset_id
        $lastId = $lastAsset ? $lastAsset->asset_id : 0;
        $formattedId = 'PABE-'.date('Y').'-' . ($lastId+1);

        // Return the formatted ID
        return response()->json(['last_id' => $formattedId]);
    }

    public function getAssets() {
            $assets = Asset::selectRaw('assets_tag_id, description, brand, purchase_date, cost, status_id ')->get();
    
            $response = [
                "recordsTotal" => $assets->count(), // Total records without filtering
                "recordsFiltered" => $assets->count(), // Total records after filtering, if any
                "data" => []
            ];
            
            foreach ($assets as $asset) {
                $response['data'][] = [
                    "assets_tag_id" => $asset->assets_tag_id,
                    "description" => $asset->description,
                    "brand" => $asset->brand,
                    "purchase_date" => $asset->purchase_date,
                    "cost" => $asset->cost,
                    "status_id" => $asset->status_id,
                    "view_button" => '<a href="/assets/'.$asset->assets_id.'" class="btn btn-outline-light" style="border-color: black; color: black;" title="View" data-bs-original-title="View" data-original-title="View"><i class="icofont icofont-eye-alt"></i> View</a>'
                ];
            }
            
            return response()->json($response);
    
    }
    
}
