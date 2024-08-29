<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationModel;

class LocationController extends Controller
{
    // Show form to create a new location
    public function create()
    {
        return view('location.create');
    }

    // Store a new site
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'location_name' => 'required|string|max:100|unique:tbl_location,location_name',
            'site_id' => 'required',
        ]);

        // Create a new site
        LocationModel::create([
            'location_name' => $request->input('location_name'),
            'site_id' => $request->input('site_id'),
            'delete' => '0',
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Location created successfully.']);
    }

    public function update(Request $request)
    {
        $locationid = $request->input('location_id');
        $locationname = $request->input('location_name');
        $siteid = $request->input('site_id');
        // Validate the request data
        $request->validate([
            'location_name' => 'required|string|max:100|unique:tbl_location,location_name',
        ]);

        // Find the funding by ID
        $location = LocationModel::findOrFail($locationid);

        // Update the funding
        $location->update([
            'location_name' => $locationname,
            'site_id' => $siteid
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Location updated successfully.']);
    }

    // Example in Laravel controller
    public function getLocations() {
        $locations = LocationModel::selectRaw('location_id as id, location_name as name')->get();
        return response()->json($locations);
    }
}
