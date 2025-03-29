<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a list of customers
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('admin.customers.create');
    }

    // Store a newly created customer in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_no1' => 'required|string|max:20',
            'phone_no2' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'date_of_register' => 'required|date',
            'media' => 'nullable|string',
            'notes' => 'nullable|string',
            'file' => 'nullable|file|max:2048'
        ]);

        $customer = Customer::create($request->except('file'));


        if ($request->hasFile('file')) 
        {
            $customer->addFile($request->file('file'));
        }

        Customer::create($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    // Display the specified customer
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    // Show the form for editing the specified customer
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    // Update the specified customer in the database
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_no1' => 'required|string|max:20',
            'phone_no2' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'date_of_register' => 'required|date',
            'media' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $customer->update($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Remove the specified customer from the database
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function showFiles($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer->getMedia('customer_files'));
    }
}