<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.management.index');
    }

    public function buses() 
    {
        $allBus = Bus::all();
        return view('dashboard.management.bus.index', compact('allBus'));
    }
}
