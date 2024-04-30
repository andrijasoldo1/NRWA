<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Driver;
use App\Models\Car;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $drivers = Driver::all();
        $vehicles = Car::all();
        return view('rentals.create', compact('drivers', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rdate' => 'required|date',
            'amount' => 'required|integer',
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:cars,id',
        ]);

        Rental::create($request->all());
        return redirect()->route('rentals.index')->with('success', 'Rental added successfully.');
    }

    public function show($id)
    {
        $rental = Rental::findOrFail($id);
        return view('rentals.show', compact('rental'));
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $drivers = Driver::all();
        $vehicles = Car::all();
        return view('rentals.edit', compact('rental', 'drivers', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rdate' => 'required|date',
            'amount' => 'required|integer',
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:cars,id',
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update($request->all());
        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
