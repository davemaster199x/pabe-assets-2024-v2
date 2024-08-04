<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetEvent;
use App\Models\EventCheckout;


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
        // $request->validate([
        //     'checkout_date' => 'required|date',
        //     'checkout_to' => 'required|string',
        //     'person_id' => 'nullable|exists:people,id',
        //     'site_id' => 'nullable|exists:sites,id',
        //     'location_id' => 'nullable|exists:locations,id',
        //     'department_id' => 'nullable|exists:departments,id',
        //     'due_date' => 'nullable|date',
        //     'checkout_notes' => 'nullable|string',
        // ]);

        // Create a new Checkout record
        // $checkout = Checkout::create([
        //     'checkout_date' => $request->input('checkout_date'),
        //     'checkout_to' => $request->input('checkout_to'),
        //     'person_id' => $request->input('person_id'),
        //     'site_id' => $request->input('site_id'),
        //     'location_id' => $request->input('location_id'),
        //     'department_id' => $request->input('department_id'),
        //     'due_date' => $request->input('due_date'),
        //     'checkout_notes' => $request->input('checkout_notes'),
        // ]);

        // Return a response
        return response()->json(['message' => 'Checkout saved successfully!', 'Events' => $events->id], 201);
    }
}
