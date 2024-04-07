<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;
use App\Models\Driver;

class ChauffeurController extends Controller
{
    public function index()
    {
        $chauffeurs = Chauffeur::all();
        return view('chauffeurs.index', compact('chauffeurs'));
    }

    public function create()
    {
        $drivers = Driver::all();
        return view('chauffeurs.create', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'status' => 'required|string|max:20',
            'mobile' => 'required|string|max:12',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        Chauffeur::create($request->all());
        return redirect()->route('chauffeurs.index')->with('success', 'Chauffeur added successfully.');
    }

    public function show($id)
    {
        $chauffeur = Chauffeur::findOrFail($id);
        return view('chauffeurs.show', compact('chauffeur'));
    }

    public function edit($id)
    {
        $chauffeur = Chauffeur::findOrFail($id);
        $drivers = Driver::all();
        return view('chauffeurs.edit', compact('chauffeur', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'status' => 'required|string|max:20',
            'mobile' => 'required|string|max:12',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        $chauffeur = Chauffeur::findOrFail($id);
        $chauffeur->update($request->all());
        return redirect()->route('chauffeurs.index')->with('success', 'Chauffeur updated successfully.');
    }

    public function destroy($id)
    {
        $chauffeur = Chauffeur::findOrFail($id);
        $chauffeur->delete();
        return redirect()->route('chauffeurs.index')->with('success', 'Chauffeur deleted successfully.');
    }
}
