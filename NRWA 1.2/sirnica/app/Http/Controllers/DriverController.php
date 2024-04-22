<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
{
    // Validacija ulaznih podataka ovdje, ako je potrebno

    // Stvaranje novog vozača
    $driver = new Driver();

    // Spremanje novog vozača
    $driver->save();

    // Redirekcija na index stranicu sa uspješnom porukom
    return redirect()->route('drivers.index')->with('success', 'Vozač je uspješno spremljen.');
}

    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.show', compact('driver'));
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
{
    // Validacija ulaznih podataka ovdje, ako je potrebno

    // Pronalaženje vozača po ID-u
    $driver = Driver::findOrFail($id);

    // Ažuriranje podataka o vozaču
    $driver->update($request->all());

    // Redirekcija na index stranicu sa uspješnom porukom
    return redirect()->route('drivers.index')->with('success', 'Podaci o vozaču su uspješno ažurirani.');
}

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Vozač je uspješno obrisan.');
    }
}
