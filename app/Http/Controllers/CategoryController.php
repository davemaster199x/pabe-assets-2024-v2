<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
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
            'category_name' => 'required|string|max:100|unique:tbl_category,category_name',
        ]);

        // Create a new site
        CategoryModel::create([
            'category_name' => $request->input('category_name'),
            'delete' => '0',
        ]);

        // Redirect or return a response
        return response()->json(['message' => 'Category created successfully.']);
    }

    // Example in Laravel controller
    public function getCategories() {
        //using this custom field name to prevent giving idea to the hackers like me XD
        $categories = CategoryModel::selectRaw('category_id as id, category_name as name')->get();
        return response()->json($categories);
    }

}
