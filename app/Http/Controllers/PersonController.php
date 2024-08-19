<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'full_name' => 'required|string|max:50',
                'emp_id' => 'nullable|string|max:50',
                'title' => 'nullable|string|max:50',
                'phone' => 'nullable|string|max:50',
                'email' => 'nullable|email|max:50',
                'site_id' => 'nullable|exists:tbl_sites,site_id',
                'location_id' => 'nullable|exists:tbl_location,location_id',
                'department_id' => 'nullable|exists:tbl_department,department_id',
                'notes' => 'nullable|string',
            ]);

            // Create a new person record
            $person = Person::create([
                'full_name' => $request->input('full_name'),
                'emp_id' => $request->input('emp_id'),
                'title' => $request->input('title'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'site_id' => $request->input('site_id'),
                'location_id' => $request->input('location_id'),
                'department_id' => $request->input('department_id'),
                'notes' => $request->input('notes'),
            ]);

            // Return a success response
            return response()->json(['message' => 'Person saved successfully!', 'person_id' => $person->person_id], 201);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error saving person: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while saving the person. Please try again later.'], 500);
        }
    }

    public function getPersons() {
        $persons = Person::all();
        return response()->json($persons );
    }
}
