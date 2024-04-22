<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyRental;
use App\Models\Rental;
use App\Models\Car;
use App\Models\Driver;

class DailyRentalController extends Controller
{
    public function index()
    {
        $rentals = DailyRental::all();
        return view('daily_rentals.index', compact('rentals'));
    }

    public function create()
    {
        $rentals = Rental::all();
        $vehicles = Car::all();
        $drivers = Driver::all();
        return view('daily_rentals.create', compact('rentals', 'vehicles', 'drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rid' => 'required|exists:rentals,id',
            'sdate' => 'required|date',
            'amount' => 'required|numeric',
            'nodays' => 'required|numeric',
            'vehicle_id' => 'required|exists:cars,id',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        DailyRental::create($request->all());
        return redirect()->route('daily_rentals.index')->with('success', 'Daily rental added successfully.');
    }

    public function show($id)
    {
        $rental = DailyRental::findOrFail($id);
        return view('daily_rentals.show', compact('rental'));
    }

    public function edit($id)
    {
        $rental = DailyRental::findOrFail($id);
        $rentals = Rental::all();
        $vehicles = Car::all();
        $drivers = Driver::all();
        return view('daily_rentals.edit', compact('rental', 'rentals', 'vehicles', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rid' => 'required|exists:rentals,id',
            'sdate' => 'required|date',
            'amount' => 'required|numeric',
            'nodays' => 'required|numeric',
            'vehicle_id' => 'required|exists:cars,id',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        $rental = DailyRental::findOrFail($id);
        $rental->update($request->all());
        return redirect()->route('daily_rentals.index')->with('success', 'Daily rental updated successfully.');
    }

    public function destroy($id)
    {
        $rental = DailyRental::findOrFail($id);
        $rental->delete();
        return redirect()->route('daily_rentals.index')->with('success', 'Daily rental deleted successfully.');
    }
}
