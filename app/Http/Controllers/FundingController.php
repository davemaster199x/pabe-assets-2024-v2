<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundingModel;

class FundingController extends Controller
{
    public function create()
    {
        return view('fundings.create');
    }

    // Store a new site
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'funding_name' => 'required|string|max:100|unique:tbl_fundings,funding_name',
        ]);

        // Create a new funding
        FundingModel::create([
            'funding_name' => $request->input('funding_name'),
            'delete' => '0',
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Funding created successfully.']);
    }

    // Example in Laravel controller
    public function getFundings() {
        //using this custom field name to prevent giving idea to the hackers like me XD
        $fundings = FundingModel::selectRaw('funding_id as id, funding_name as name')->get();
        return response()->json($fundings);
    }
}
