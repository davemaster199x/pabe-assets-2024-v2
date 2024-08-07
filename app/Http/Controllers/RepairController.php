<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetEvent;
use App\Models\EventRepair;
use App\Models\Asset;

class RepairController extends Controller
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

            $checkout = EventRepair::create([
                'event_id' => $events->id,
                'sched_date' => $request->input('r_schedule_date'),
                'assigned_to' => $request->input('r_assigned_to'),
                'date_completed' => $request->input('r_date_completed'),
                'repair_cost' => $request->input('r_cost'),
                'repair_notes' => $request->input('r_notes')
            ]);

        $assetstatus = Asset::where('asset_id',$request->input('asset_id'))->first();
        $assetstatus->status_id = '4';
        // $asset->status_id = $request->input('status_id');
        $assetstatus->save();
        // Return a response
        return response()->json(['message' => 'Repair saved successfully!', 'Events' => $events->id], 201);
    }

    public function getAssetEvents($assetId)
    {
        $assetEvents = AssetEvent::where('asset_id', $assetId)->get();
        $result = [];

        foreach ($assetEvents as $event) {
            $repairEvents = EventRepair::where('event_id', $event->event_id)->get();
            $result[] = [
                'assetevent' => $event,
                'repairevents' => $repairEvents
            ];
        }

        return response()->json($result);
    }

    public function updateRepair(Request $request, $repairId)
    {
        $repair = EventRepair::findOrFail($repairId);
        $repair->sched_date = $request->input('re_schedule_date');
        $repair->assigned_to = $request->input('re_assigned_to');
        $repair->date_completed = $request->input('re_date_completed');
        $repair->repair_cost = $request->input('re_cost');
        $repair->repair_notes = $request->input('re_notes');
        $repair->save();

        return response()->json(['message' => 'Repair event updated successfully!']);
    }

}
