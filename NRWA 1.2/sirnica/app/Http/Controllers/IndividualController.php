<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;
use App\Models\Owner;

class IndividualController extends Controller
{
    public function index()
    {
        $individuals = Individual::all();
        return view('individuals.index', compact('individuals'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('individuals.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ssn' => 'required|numeric',
            'name' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        Individual::create($request->all());
        return redirect()->route('individuals.index')->with('success', 'Individual added successfully.');
    }

    public function show($id)
    {
        $individual = Individual::findOrFail($id);
        return view('individuals.show', compact('individual'));
    }

    public function edit($id)
    {
        $individual = Individual::findOrFail($id);
        $owners = Owner::all();
        return view('individuals.edit', compact('individual', 'owners'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ssn' => 'required|numeric',
            'name' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $individual = Individual::findOrFail($id);
        $individual->update($request->all());
        return redirect()->route('individuals.index')->with('success', 'Individual updated successfully.');
    }

    public function destroy($id)
    {
        $individual = Individual::findOrFail($id);
        $individual->delete();
        return redirect()->route('individuals.index')->with('success', 'Individual deleted successfully.');
    }
}
