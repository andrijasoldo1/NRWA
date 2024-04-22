<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Car;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
{
    $drivers = Driver::all();
    $cars = Car::all();
    return view('customers.create', compact('drivers', 'cars'));
}



    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Kupac je uspješno dodan.');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
{
    $customer = Customer::findOrFail($id);
    $drivers = Driver::all();
    $cars = Car::all();
    return view('customers.edit', compact('customer', 'drivers', 'cars'));
}

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Podaci o kupcu su uspješno ažurirani.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Kupac je uspješno obrisan.');
    }
}
