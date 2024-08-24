<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WarrantyModel;

class WarrantyController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'asset_id' => 'required|exists:tbl_assets,asset_id',
            'length' => 'nullable|integer',
            'expiration_date' => 'nullable|date',
            'warranty_notes' => 'nullable|string',
        ]);

        // Create a new warranty record
        $warranty = WarrantyModel::create([
            'asset_id' => $request->asset_id,
            'length' => $request->length,
            'expiration_date' => $request->expiration_date,
            'warranty_notes' => $request->warranty_notes,
        ]);

        // Return a success response
        return response()->json(['message' => 'Warranty added successfully!', 'warranty' => $warranty], 201);
    }

    public function getWarrantiesByAsset($asset_id)
    {
        // Fetch warranties related to the asset_id
        $warranties = WarrantyModel::where('asset_id', $asset_id)
                                ->where('delete', '0')
                                ->orderBy('warranty_id', 'desc')
                                ->get();
                                    
        return response()->json($warranties);
    }

    public function getWarranty($id)
    {
        // Fetch a single warranty by its ID
        $warranty = WarrantyModel::findOrFail($id);
        return response()->json($warranty);
    }

    public function updateWarranty(Request $request, $id)
    {
        // Validate and update the warranty
        $request->validate([
            'length' => 'required|integer',
            'expiration_date' => 'required|date',
            'warranty_notes' => 'nullable|string',
        ]);

        $warranty = WarrantyModel::findOrFail($id);
        $warranty->update([
            'length' => $request->length,
            'expiration_date' => $request->expiration_date,
            'warranty_notes' => $request->warranty_notes,
        ]);

        return response()->json(['message' => 'Warranty updated successfully']);
    }

    public function deleteWarranty($id)
    {
        $warranty = WarrantyModel::findOrFail($id);
        $warranty->update(['delete' => '1']);

        return response()->json(['message' => 'Warranty deleted successfully.']);
    }
}
