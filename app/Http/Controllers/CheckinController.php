<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetEvent;
use App\Models\EventCheckin;
use App\Models\Asset;

class CheckinController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'asset_id' => 'required|exists:tbl_assets,asset_id'
        ]);

        $events = AssetEvent::create([
            'asset_id' => $request->input('asset_id'),
        ]);

        $checkout = EventCheckin::create([
            'event_id' => $events->id,
            'return_date' => $request->input('return_date'),
            'site_id' => $request->input('site_id'),
            'location_id' => $request->input('location_id'),
            'department_id' => $request->input('department_id'),
            'checkin_notes' => $request->input('checkin_notes'),
        ]);

        $asset = Asset::find($request->input('asset_id'));

        if ($asset) {
            $asset->status_id = 1; // Available
            $asset->site_id = $request->input('site_id') ?? $asset->site_id;
            $asset->location_id = $request->input('location_id') ?? $asset->location_id;
            $asset->department_id = $request->input('department_id') ?? $asset->department_id;
            $asset->save();
        } else {
            // Handle the case where the asset is not found
            return response()->json(['error' => 'Asset not found'], 404);
        }

        // Return a response
        return response()->json(['message' => 'Checkin saved successfully!', 'Events' => $events->id], 201);
    }
}
