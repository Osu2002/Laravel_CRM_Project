<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::all();
        return view('auth.customer', compact('customers'));
    }

    public function customerindex()
    {
        $customers = Customer::all();
        return view('auth.customerindex', compact('customers'));
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

        return "success";
    }
}
