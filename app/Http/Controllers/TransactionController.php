<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction; // Use the new TransactionRecord model
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function invoiceindex()
    {
        // Retrieve all transactions from the database
        $invoices = Transaction::all(); // Use the correct model

        // Pass the transactions to the view 'transactionindex'
        return view('auth.transaction.transactionindex', compact('invoices'));
    }

    public function invoice()
    {
        // Retrieve all customers from the database
        $customers = Customer::all();

        // Pass the customers to the view 'invoice'
        return view('auth.Invoice.invoice', compact('customers'));
    }

    public function store(Request $request)
    {
        // Create a new instance of the TransactionRecord model
        $invoice = new Transaction();
        // Assign the request data to the invoice attributes
        $invoice->name = $request->name;
        $invoice->items = $request->items;
        $invoice->total = $request->total;
        $invoice->due_date = $request->due_date;
        $invoice->status = $request->status;

        // Save the transaction to the database
        $invoice->save();

        // Redirect to the invoice index page
        return redirect()->route('invoice.index');
    }
}
