<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentModel;

class DepartmentController extends Controller
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
            'department_name' => 'required|string|max:100|unique:tbl_department,department_name',
        ]);

        // Create a new site
        DepartmentModel::create([
            'department_name' => $request->input('department_name'),
            'delete' => '0',
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Department created successfully.']);
    }

    public function update(Request $request)
    {
        $id = $request->input('department_id');

        // Validate the request data
        $request->validate([
            'department_name' => 'required|string|max:100|unique:tbl_department,department_name',
        ]);

        // Find the funding by ID
        $department = DepartmentModel::findOrFail($id);

        // Update the funding
        $department->update([
            'department_name' => $request->input('department_name')
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Department updated successfully.']);
    }

    // Example in Laravel controller
    public function getDepartments() {
        //using this custom field name to prevent giving idea to the hackers like me XD
        $departments = DepartmentModel::selectRaw('department_id as id, department_name as name')->get();
        return response()->json($departments);
    }
}
