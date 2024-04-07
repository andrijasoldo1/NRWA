<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Owner;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('banks.index', compact('banks'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('banks.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bname' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        Bank::create($request->all());
        return redirect()->route('banks.index')->with('success', 'Bank added successfully.');
    }

    public function show($id)
    {
        $bank = Bank::findOrFail($id);
        return view('banks.show', compact('bank'));
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        $owners = Owner::all();
        return view('banks.edit', compact('bank', 'owners'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bname' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $bank = Bank::findOrFail($id);
        $bank->update($request->all());
        return redirect()->route('banks.index')->with('success', 'Bank updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();
        return redirect()->route('banks.index')->with('success', 'Bank deleted successfully.');
    }
}
