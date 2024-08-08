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

            $checkout = EventDispose::create([
                'event_id' => $events->id,
                'asset_id' => $request->input('asset_id'),
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
        $dispose = EventRepair::findOrFail($disposeId);
        $dispose->sched_date = $request->input('de_date_disposed');
        $dispose->assigned_to = $request->input('de_dispose_to');
        $dispose->repair_notes = $request->input('de_notes');
        $dispose->save();

        return response()->json(['message' => 'Dispose event updated successfully!']);
    }

}
