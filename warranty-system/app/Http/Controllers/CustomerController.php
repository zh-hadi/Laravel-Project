<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        
        return view('customers.index', ['customers' => Customer::latest()->get()]);
    }
    public function create()
    {
        return view('customers.create');
    }

    public function store()
    {
        
        $attribute = request()->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        // store
        Customer::create($attribute);

        // redirect
        return redirect()->route('customers.index');
    }


    public function show(Customer $customer)
    {
        return view('customers.show', ['customer' => $customer]);
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Customer $customer)
    {
        // validation
        $attribute = request()->validate([
            'name' => ['required'],
            'address' => ['required']
        ]);
        
        $updateCustomer = $customer->update($attribute);
        // update
        if(!$updateCustomer){
            return "customer dose not update ";
        }
        // redirect
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        // delete
        $customer->delete();
        // redirect
        return  redirect()->route('customers.index');
    }
}
