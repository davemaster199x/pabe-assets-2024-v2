<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetEvent;
use App\Models\EventDispose;
use App\Models\Asset;

class DisposeController extends Controller
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

            $dispose = EventDispose::create([
                'event_id' => $events->id,
                //'asset_id' => $request->input('asset_id'),
                'date_disposed' => $request->input('d_date_disposed'),
                'dispose_to' => $request->input('d_dispose_to'),
                'dispose_notes' => $request->input('d_notes')
            ]);

        $assetstatus = Asset::where('asset_id',$request->input('asset_id'))->first();
        $assetstatus->status_id = '5'; //Status to Disposed
        // $asset->status_id = $request->input('status_id');
        $assetstatus->save();
        // Return a response
        return response()->json(['message' => 'Dispose saved successfully!', 'Events' => $events->id], 201);
    }

    public function updateDispose(Request $request, $disposeId)
    {
        $dispose = EventDispose::findOrFail($disposeId);
        $dispose->sched_date = $request->input('de_date_disposed');
        $dispose->assigned_to = $request->input('de_dispose_to');
        $dispose->repair_notes = $request->input('de_notes');
        $dispose->save();

        return response()->json(['message' => 'Dispose event updated successfully!']);
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

            $dispose = EventDispose::create([
                'event_id' => $events->id,
                'asset_id' => $request->input('asset_id'),
                'date_disposed' => $request->input('d_date_disposed'),
                'dispose_to' => $request->input('d_dispose_to'),
                'dispose_notes' => $request->input('d_notes')
            ]);

            $asset = Asset::find($assetId);

            if ($asset) {
                $asset->status_id = 2; // Checkout
                if ($request->input('radio_checkout') == 'Person') {
                    $asset->person_id = $request->input('person_id_person') ?? $asset->person_id;
                    $asset->site_id = $request->input('site_id_person') ?? $asset->site_id;
                    $asset->location_id = $request->input('location_id_person') ?? $asset->location_id;
                    $asset->department_id = $request->input('department_id_person') ?? $asset->department_id;
                } else {
                    $asset->site_id = $request->input('site_id_site') ?? $asset->site_id;
                    $asset->location_id = $request->input('location_id_site') ?? $asset->location_id;
                    $asset->department_id = $request->input('department_id_site') ?? $asset->department_id;
                }
                $asset->save();
            } else {
                // Handle the case where the asset is not found
                return response()->json(['error' => 'Asset not found: ' . $assetId], 404);
            }
        }

        // Return a response with all event IDs
        return response()->json(['message' => 'Checkout saved successfully!', 'Events' => $eventIds], 201);
    }

}
