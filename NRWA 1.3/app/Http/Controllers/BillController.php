<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Rental;
use App\Models\Customer;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        return view('bills.index', compact('bills'));
    }

    public function create()
    {
        $rentals = Rental::all();
        $customers = Customer::all();
        return view('bills.create', compact('rentals', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bdate' => 'required|date',
            'advance' => 'required|integer',
            'discount' => 'required|integer',
            'drivercharge' => 'required|integer',
            'famount' => 'required|integer',
            'rental_id' => 'required|exists:rentals,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        Bill::create($request->all());
        return redirect()->route('bills.index')->with('success', 'Bill added successfully.');
    }

    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        return view('bills.show', compact('bill'));
    }

    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        $rentals = Rental::all();
        $customers = Customer::all();
        return view('bills.edit', compact('bill', 'rentals', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bdate' => 'required|date',
            'advance' => 'required|integer',
            'discount' => 'required|integer',
            'drivercharge' => 'required|integer',
            'famount' => 'required|integer',
            'rental_id' => 'required|exists:rentals,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        $bill = Bill::findOrFail($id);
        $bill->update($request->all());
        return redirect()->route('bills.index')->with('success', 'Bill updated successfully.');
    }

    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();
        return redirect()->route('bills.index')->with('success', 'Bill deleted successfully.');
    }
}
