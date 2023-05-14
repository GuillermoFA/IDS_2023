<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function userDashboard()
    {
        // Retornar al dashboard
        return view('layouts.dashboard');
    }

    public function adminDashboard()
    {
        // Retornar al dashboard
        return view('layouts.dashboard');
    }
}
