<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function add_asset()
    {
        return view('pages.add_asset');
    }
}
