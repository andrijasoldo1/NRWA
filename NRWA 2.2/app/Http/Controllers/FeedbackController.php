<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\CustomerService;
use App\Models\Customer;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        $services = CustomerService::all();
        $customers = Customer::all();
        return view('feedbacks.create', compact('services', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:140',
            'email' => 'required|string|email|max:50',
            'customer_service_id' => 'required|exists:customer_services,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        Feedback::create($request->all());
        return redirect()->route('feedbacks.index')->with('success', 'Feedback added successfully.');
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedbacks.show', compact('feedback'));
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        $services = CustomerService::all();
        $customers = Customer::all();
        return view('feedbacks.edit', compact('feedback', 'services', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:140',
            'email' => 'required|string|email|max:50',
            'customer_service_id' => 'required|exists:customer_services,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update($request->all());
        return redirect()->route('feedbacks.index')->with('success', 'Feedback updated successfully.');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('feedbacks.index')->with('success', 'Feedback deleted successfully.');
    }
}
