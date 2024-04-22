<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerService;

class CustomerServiceController extends Controller
{
    public function index()
    {
        $services = CustomerService::all();
        return view('customer_services.index', compact('services'));
    }

    public function create()
    {
        return view('customer_services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'mobile' => 'required|string|max:12',
        ]);

        CustomerService::create($request->all());
        return redirect()->route('customer_services.index')->with('success', 'Service added successfully.');
    }

    public function show($id)
    {
        $service = CustomerService::findOrFail($id);
        return view('customer_services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = CustomerService::findOrFail($id);
        return view('customer_services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'mobile' => 'required|string|max:12',
        ]);

        $service = CustomerService::findOrFail($id);
        $service->update($request->all());
        return redirect()->route('customer_services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = CustomerService::findOrFail($id);
        $service->delete();
        return redirect()->route('customer_services.index')->with('success', 'Service deleted successfully.');
    }
}
