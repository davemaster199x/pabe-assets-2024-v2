<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetEvent;
use App\Models\EventCheckout;
use App\Models\Asset;


class CheckoutController extends Controller
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

        if ($request->input('radio_checkout') == 'Person') {
            $checkout = EventCheckout::create([
                'event_id' => $events->id,
                'checkout_date' => $request->input('checkout_date'),
                'person_id' => $request->input('person_id_person'),
                'due_date' => $request->input('due_date_person'),
                'site_id' => $request->input('site_id_person'),
                'location_id' => $request->input('location_id_person'),
                'department_id' => $request->input('department_id_person'),
                'checkout_notes' => $request->input('checkout_notes_person'),
            ]);
        } else {
            $checkout = EventCheckout::create([
                'event_id' => $events->id,
                'checkout_date' => $request->input('checkout_date'),
                'site_id' => $request->input('site_id_site'),
                'location_id' => $request->input('location_id_site'),
                'due_date' => $request->input('due_date_site'),
                'department_id' => $request->input('department_id_site'),
                'checkout_notes' => $request->input('checkout_notes_site'),
            ]);
        }

        $asset = Asset::find($request->input('asset_id'));

        if ($asset) {
            $asset->status_id = 2; // Checkout
            if ($request->input('radio_checkout') == 'Person') {
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
            return response()->json(['error' => 'Asset not found'], 404);
        }

        // Return a response
        return response()->json(['message' => 'Checkout saved successfully!', 'Events' => $events->id], 201);
    }
}
