<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteModel;

class SiteController extends Controller
{
    // Show form to create a new site
    public function create()
    {
        return view('sites.create');
    }

    // Store a new site
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'site_name' => 'required|string|max:100|unique:tbl_sites,site_name',
        ]);

        // Create a new site
        SiteModel::create([
            'site_name' => $request->input('site_name'),
            'delete' => '0',
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Site created successfully.']);
    }

    public function update(Request $request)
    {
        $id = $request->input('site_id');
        // Validate the request data
        $request->validate([
            'site_name' => 'required|string|max:100|unique:tbl_sites,site_name',
        ]);

        // Find the funding by ID
        $sites = SiteModel::findOrFail($id);

        // Update the funding
        $sites->update([
            'site_name' => $request->input('site_name')
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Sites updated successfully.']);
    }

    // Example in Laravel controller
    public function getSites() {
        //using this custom field name to prevent giving idea to the hackers like me XD
        $sites = SiteModel::selectRaw('site_id as id, site_name as name')->get();
        return response()->json($sites);
    }

    public function show($id)
    {
        $site = SiteModel::find($id);
        
        return response()->json($site);
    }

}
