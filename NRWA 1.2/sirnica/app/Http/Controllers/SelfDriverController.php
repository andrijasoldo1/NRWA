<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelfDriver;
use App\Models\Driver;

class SelfDriverController extends Controller
{
    public function index()
    {
        $selfDrivers = SelfDriver::all();
        return view('self_drivers.index', compact('selfDrivers'));
    }

    public function create()
    {
        $drivers = Driver::all();
        return view('self_drivers.create', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dlno' => 'required|integer',
            'name' => 'required|string|max:20',
            'insurance_no' => 'required|string|max:12',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        SelfDriver::create($request->all());
        return redirect()->route('self_drivers.index')->with('success', 'Self driver added successfully.');
    }

    public function show($id)
    {
        $selfDriver = SelfDriver::findOrFail($id);
        return view('self_drivers.show', compact('selfDriver'));
    }

    public function edit($id)
    {
        $selfDriver = SelfDriver::findOrFail($id);
        $drivers = Driver::all();
        return view('self_drivers.edit', compact('selfDriver', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dlno' => 'required|integer',
            'name' => 'required|string|max:20',
            'insurance_no' => 'required|string|max:12',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        $selfDriver = SelfDriver::findOrFail($id);
        $selfDriver->update($request->all());
        return redirect()->route('self_drivers.index')->with('success', 'Self driver updated successfully.');
    }

    public function destroy($id)
    {
        $selfDriver = SelfDriver::findOrFail($id);
        $selfDriver->delete();
        return redirect()->route('self_drivers.index')->with('success', 'Self driver deleted successfully.');
    }
}
