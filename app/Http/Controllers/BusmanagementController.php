<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BusmanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    // === FITUR ROUTING KE HALAMAN CREATE BUS  ===
    public function create()
    {
        return view('dashboard.management.bus.create');
    }

    // === FITUR MENAMBAH BUS BARU ===
    public function store(Request $request)
    {
        $request->validate([
            'bus_name' => 'required|max:2048|string',
            'image' => 'required|mimes:png,jpg',
            'rute_from' => 'required|max:2048|string',
            'rute_to' => 'required|max:2048|string',
            'price' => 'required|integer',
            'total_seat' => 'required|integer',
            'available_seat' => 'required|integer',
            'departure_time' => 'required|date',
        ]);

        $departure = Carbon::parse($request->input('departure_time'));

        $formatteddate = $departure->format('Y-m-d H:i:s');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $hashImage = $image->hashName();
            $image->storeAs('image', $hashImage, 'public');
        

        Bus::create([
            'bus_name' => $request->bus_name,
            'image' => $hashImage,
            'rute_from' => $request->rute_from,
            'rute_to' => $request->rute_to,
            'price' => $request->price,
            'total_seat' => $request->total_seat,
            'available_seat' => $request->available_seat,
            'departure_time' => $formatteddate,
        ]);

        }

        return redirect()->route('dashboard.management.bus.index');
    }

    // === FITUR MELIHAT 1 BUS
    public function show(string $id)
    {
        $showBus = Bus::with('users')->findOrFail($id);
        return view('dashboard.management.bus.show', compact('showBus'));
    }

    // === FITUR ROUTING KE HALAMAN EDIT BUS ===
    public function edit(string $id)
    {
        $editBus = Bus::findOrFail($id);
        return view('dashboard.management.bus.edit', compact('editBus'));
    }

    // === FITUR UPDATE DATA BUS ===
    public function update(Request $request, string $id)
    {
        $editBus = Bus::findOrFail($id);
        
        $request->validate([
            'bus_name' => 'max:2048|string',
            'image' => 'mimes:png,jpg',
            'rute_from' => 'max:2048|string',
            'rute_to' => 'max:2048|string',
            'price' => 'integer',
            'total_seat' => 'integer',
            'available_seat' => 'integer',
            'departure_time' => 'date',
        ]);

        if ($request->hasFile('image')) {
            if ($editBus->image) {
                Storage::delete('public/image/' . $editBus->image);
            }

            $image = $request->file('image');
            $hashImage = $image->hashName();
            $image->storeAs('image', $hashImage, 'public');

            $editBus->update([
                'bus_name' => $request->bus_name,
                'image' => $hashImage,
                'rute_from' => $request->rute_from,
                'rute_to' => $request->rute_to,
                'price' => $request->price,
                'total_seat' => $request->total_seat,
                'available_seat' => $request->available_seat,
                'departure_time' => $request->departure_time,
            ]); 
        } else {
            $editBus->update([
                'bus_name' => $request->bus_name,
                'rute_from' => $request->rute_from,
                'rute_to' => $request->rute_to,
                'price' => $request->price,
                'total_seat' => $request->total_seat,
                'available_seat' => $request->available_seat,
                'departure_time' => $request->departure_time,
            ]); 
        }

        return redirect()->route('dashboard.management.bus.index');
        
    }

    // === FITUR UNTUK MENGHAPUS BUS ===
    public function destroy($id)
    {
        $deleteBus = Bus::findOrFail($id);
        $deleteBus->delete();

        return redirect()->route('dashboard.management.bus.index');
    }
}
