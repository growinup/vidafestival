<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // cargamos el dashbosard inicial
    public function mainDashboard() {
        return view('layouts.dashboard');
    }
}
