<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Owner;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('companies.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Company added successfully.');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $owners = Owner::all();
        return view('companies.edit', compact('company', 'owners'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cname' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
