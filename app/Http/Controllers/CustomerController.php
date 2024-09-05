<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function customer()
    {

        return view('auth.customer.customer');
    }

    public function customerindex()
    {


        $customers = Customer::all();
        return view('auth.customer.customerindex', compact('customers'));
    }



    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->status = $request->status;

        $customer->save();

        return redirect()->route('customer.index');
    }

    public function edit($customer_id)
    {
        $customer = Customer::where('id', $customer_id)->first();
        return view('auth.customer.edit', compact('customer'));
    }



    public function update(Request $request, $customer_id)
    {
        $customer = Customer::where('id', $customer_id)->first();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->save();
        return redirect()->route('customer.index');
    }

    public function delete($customer_id)
    {
        Customer::where('id', $customer_id)->delete();
        return redirect()->route('customer.index');
    }
}
