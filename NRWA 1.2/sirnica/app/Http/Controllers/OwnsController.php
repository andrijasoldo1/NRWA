<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owns;
use App\Models\Owner;
use App\Models\Car;

class OwnsController extends Controller
{
    public function index()
    {
        $owns = Owns::all();
        return view('owns.index', compact('owns'));
    }

    public function create()
    {
        $owners = Owner::all();
        $vehicles = Car::all();
        return view('owns.create', compact('owners', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'vehicle_id' => 'required|exists:cars,id',
        ]);

        Owns::create($request->all());
        return redirect()->route('owns.index')->with('success', 'Ownership added successfully.');
    }

    public function show($id)
    {
        $owns = Owns::findOrFail($id);
        return view('owns.show', compact('owns'));
    }

    public function edit($id)
    {
        $owns = Owns::findOrFail($id);
        $owners = Owner::all();
        $vehicles = Car::all();
        return view('owns.edit', compact('owns', 'owners', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'vehicle_id' => 'required|exists:cars,id',
        ]);

        $owns = Owns::findOrFail($id);
        $owns->update($request->all());
        return redirect()->route('owns.index')->with('success', 'Ownership updated successfully.');
    }

    public function destroy($id)
    {
        $owns = Owns::findOrFail($id);
        $owns->delete();
        return redirect()->route('owns.index')->with('success', 'Ownership deleted successfully.');
    }
}
