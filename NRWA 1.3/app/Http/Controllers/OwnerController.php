<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner; 
class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
{
    $owner = new Owner();

    // Spremi novog vlasnika
    $owner->save();

    return redirect()->route('owners.index')->with('success', 'Vlasnik je uspješno spremljen.');
}


    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.show', compact('owner'));
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);
        $owner->fill($request->all());
        $owner->save();

        return redirect()->route('owners.index')->with('success', 'Podaci o vlasniku su uspješno ažurirani.');
    }

    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Vlasnik je uspješno obrisan.');
    }
}
