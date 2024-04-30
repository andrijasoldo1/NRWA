<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Customer;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('members.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mtype' => 'required',
            'discount' => 'required|numeric',
            'duration' => 'required',
            'customer_id' => 'required|exists:customers,id'
        ]);

        Member::create($validatedData);
        return redirect()->route('members.index')->with('success', 'Member created successfully');
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $customers = Customer::all();
        return view('members.edit', compact('member', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mtype' => 'required',
            'discount' => 'required|numeric',
            'duration' => 'required',
            'customer_id' => 'required|exists:customers,id'
        ]);

        $member = Member::findOrFail($id);
        $member->update($validatedData);
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
