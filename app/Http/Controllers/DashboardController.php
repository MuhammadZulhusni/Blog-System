<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Ni sementara je
    public function index()
    {
        return view('dashboard.index');
    }
}
