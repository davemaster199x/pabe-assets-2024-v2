<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetEvent;
use App\Models\EventSell;
use App\Models\Asset;

class SellController extends Controller
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

            $sell = SellDispose::create([
                'event_id' => $events->id,
                'asset_id' => $request->input('asset_id'),
                'sale_date' => $request->input('s_sale_date'),
                'sale_amount' => $request->input('s_sale_amount'),
                'sold_to' => $request->input('s_sold_to'),
                'sell_notes' => $request->input('s_notes')
            ]);

        $assetstatus = Asset::where('asset_id',$request->input('asset_id'))->first();
        $assetstatus->status_id = '6'; //Status to Sold
        // $asset->status_id = $request->input('status_id');
        $assetstatus->save();
        // Return a response
        return response()->json(['message' => 'Sell saved successfully!', 'Events' => $events->id], 201);
    }

    public function updateDispose(Request $request, $disposeId)
    {
        $dispose = EventDispose::findOrFail($disposeId);
        $dispose->sale_date = $request->input('se_sale_date');
        $dispose->sold_to = $request->input('se_sold_to');
        $dispose->sale_amount = $request->input('se_sale_amount');
        $dispose->sale_notes = $request->input('se_notes');
        $dispose->save();

        return response()->json(['message' => 'Sale event updated successfully!']);
    }

    public function store_multiple(Request $request)
    {

       }

}
