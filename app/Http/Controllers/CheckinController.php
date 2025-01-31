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
            $asset->person_id = NULL; // Empty
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

    public function store_multiple(Request $request)
    {

        $eventIds = []; // Array to store event IDs for the response

        $selectedAssets = json_decode($request->input('selectedAssets'), true);

        // dd($request->input('selectedAssets'));

        if (!is_array($selectedAssets)) {
            return response()->json(['error' => 'Invalid data format for selected assets.'], 400);
        }

        foreach ($selectedAssets as $assetId) {
            // Create an event for each asset
            $events = AssetEvent::create([
                'asset_id' => $assetId,
            ]);

            // Save the event ID for response
            $eventIds[] = $events->id;

            $checkout = EventCheckin::create([
                'event_id' => $events->id,
                'return_date' => $request->input('return_date'),
                'site_id' => $request->input('site_id'),
                'location_id' => $request->input('location_id'),
                'department_id' => $request->input('department_id'),
                'checkin_notes' => $request->input('checkin_notes'),
            ]);

            $asset = Asset::find($assetId);

            if ($asset) {
                $asset->status_id = 1; // Available
                $asset->person_id = NULL; // Empty
                $asset->site_id = $request->input('site_id') ?? $asset->site_id;
                $asset->location_id = $request->input('location_id') ?? $asset->location_id;
                $asset->department_id = $request->input('department_id') ?? $asset->department_id;
                $asset->save();
            } else {
                // Handle the case where the asset is not found
                return response()->json(['error' => 'Asset not found'], 404);
            }
        }

        // Return a response with all event IDs
        return response()->json(['message' => 'Checkout saved successfully!', 'Events' => $eventIds], 201);
    }
}
