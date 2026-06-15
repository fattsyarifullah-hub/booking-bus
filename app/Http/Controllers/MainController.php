<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class MainController extends Controller
{
    public function index() {
        $allBus = Bus::all();
        return view('main.index', compact('allBus'));
    }

    public function showBooking(string $id) {
        $Bus = Bus::findOrFail($id);
        return view('main.booking', compact('Bus'));
    }

    public function Booking() {

    }
}
