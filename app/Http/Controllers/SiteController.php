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

    // Example in Laravel controller
    public function getSites() {
        $sites = SiteModel::select('site_id', 'site_name')->get();// Adjust columns as per your table structure
        return response()->json($sites);
    }

}
