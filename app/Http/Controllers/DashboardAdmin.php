<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function page_dashboard(Request $request)
    {
        return view('new.dashboard');
    }
}
