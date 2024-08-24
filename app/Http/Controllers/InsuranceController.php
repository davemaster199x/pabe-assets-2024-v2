<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceModel;
use App\Models\Asset;

class InsuranceController extends Controller
{
    public function getInsuranceData()
    {
        $insurances = InsuranceModel::where('active', 1)
                                ->where('delete', 0)
                                ->get();
        return response()->json($insurances);
    }

    public function getInsurancesByAsset($asset_id)
    {
        // Fetch the asset by ID and include the associated insurance
        $asset = Asset::with(['insurance' => function($query) {
            $query->where('active', 1)
                ->where('delete', 0);
        }])->findOrFail($asset_id);

        // Check if the asset has an insurance linked to it
        if ($asset->insurance) {
            $insurance = $asset->insurance;
            return response()->json($insurance);
        }

        // Return an empty response if no insurance is linked
        return response()->json([]);
    }

    public function linkInsurance(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'asset_id' => 'required|integer|exists:tbl_assets,asset_id',
            'insurance_id' => 'required|integer|exists:tbl_insurances,insurance_id',
        ]);

        // Find the asset and update its insurance_id
        $asset = Asset::findOrFail($request->asset_id);
        $asset->insurance_id = $request->insurance_id;
        $asset->save();

        return response()->json(['message' => 'Insurance linked successfully!']);
    }

    public function detachInsurance($id)
    {
        // Find the insurance by ID
        $insurance = InsuranceModel::findOrFail($id);

        // Find the asset that is linked to this insurance
        $asset = Asset::where('insurance_id', $insurance->insurance_id)->first();

        // If an asset is found, remove the insurance_id
        if ($asset) {
            $asset->insurance_id = null;
            $asset->save();
        }

        return response()->json(['message' => 'Insurance detached from the asset successfully.']);
    }
}
