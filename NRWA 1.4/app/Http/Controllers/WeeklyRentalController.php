<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyRental;
use App\Models\Rental;
use App\Models\Car;
use App\Models\Driver;

class WeeklyRentalController extends Controller
{
    public function index()
    {
        $weeklyRentals = WeeklyRental::all();
        return view('weekly_rentals.index', compact('weeklyRentals'));
    }

    public function create()
    {
        $rentals = Rental::all();
        $vehicles = Car::all();
        $drivers = Driver::all();
        return view('weekly_rentals.create', compact('rentals', 'vehicles', 'drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rid' => 'required|exists:rentals,id',
            'sdate' => 'required|date',
            'amount' => 'required|integer',
            'noweeks' => 'required|integer',
            'vehicle_id' => 'required|exists:cars,id',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        WeeklyRental::create($request->all());
        return redirect()->route('weekly_rentals.index')->with('success', 'Weekly Rental added successfully.');
    }

    public function show($id)
    {
        $weeklyRental = WeeklyRental::findOrFail($id);
        return view('weekly_rentals.show', compact('weeklyRental'));
    }

    public function edit($id)
    {
        $weeklyRental = WeeklyRental::findOrFail($id);
        $rentals = Rental::all();
        $vehicles = Car::all();
        $drivers = Driver::all();
        return view('weekly_rentals.edit', compact('weeklyRental', 'rentals', 'vehicles', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rid' => 'required|exists:rentals,id',
            'sdate' => 'required|date',
            'amount' => 'required|integer',
            'noweeks' => 'required|integer',
            'vehicle_id' => 'required|exists:cars,id',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        $weeklyRental = WeeklyRental::findOrFail($id);
        $weeklyRental->update($request->all());
        return redirect()->route('weekly_rentals.index')->with('success', 'Weekly Rental updated successfully.');
    }

    public function destroy($id)
    {
        $weeklyRental = WeeklyRental::findOrFail($id);
        $weeklyRental->delete();
        return redirect()->route('weekly_rentals.index')->with('success', 'Weekly Rental deleted successfully.');
    }
}
