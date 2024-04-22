<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Car;
use App\Models\Driver;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $cars = Car::all();
        $drivers = Driver::all();
        return view('rentals.create', compact('cars', 'drivers'));
    }

    public function store(Request $request)
{
    $request->validate([
        'Rdate' => 'required|date',
        'Amount' => 'required|numeric',
        'Dno' => 'required|exists:drivers,Dno',
        'Vehicle_id' => 'required|exists:cars,Vehicle_id',
    ]);

    // Check if there's already a rental for the selected vehicle and date
    $existingRental = Rental::where('Vehicle_id', $request->Vehicle_id)
        ->where('Rdate', $request->Rdate)
        ->first();

    if ($existingRental) {
        return redirect()->back()->withErrors(['msg' => 'There is already a rental for this vehicle on the selected date.']);
    }

    Rental::create($request->all());

    return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
}


    public function show(Rental $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    public function edit(Rental $rental)
    {
        $cars = Car::all();
        $drivers = Driver::all();
        return view('rentals.edit', compact('rental', 'cars', 'drivers'));
    }

    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'Rdate' => 'required|date',
            'Amount' => 'required|numeric',
            'Dno' => 'required|exists:drivers,Dno',
            'Vehicle_id' => 'required|exists:cars,Vehicle_id',
        ]);

        // Provjeri postoji li već rezervacija za odabrani automobil
        $existingRental = Rental::where('Vehicle_id', $request->Vehicle_id)
            ->where('Rdate', $request->Rdate)
            ->where('id', '!=', $rental->id) // Isključi trenutnu rezervaciju iz provjere
            ->first();

        if ($existingRental) {
            return redirect()->back()->withErrors(['msg' => 'There is already a rental for this vehicle on the selected date.']);
        }

        $rental->update($request->all());

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
