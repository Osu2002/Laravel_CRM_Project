<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Illuminate\Support\Facades\Session;


class InvoiceController extends Controller
{
    public function invoiceindex()
    {
        // Retrieve all invoices from the database
        $invoices = Invoice::all();
        // Pass the invoices to the view 'invoiceindex'
        return view('auth.Invoice.invoiceindex', compact('invoices'));
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
        // Create a new instance of the Invoice model
        $invoice = new Invoice();
        // Assign the request data to the invoice attributes
        $invoice->name = $request->name;
        $invoice->items = $request->items;
        $invoice->total = $request->total;
        $invoice->due_date = $request->due_date;
        $invoice->status = $request->status;

        $invoice->save();

        $transaction = new Transaction();

        $transaction->name = $invoice->id;
        $transaction->items = $request->items;
        $transaction->total = $request->total;
        $transaction->due_date = $request->due_date;
        $transaction->status = $request->status;
        // Save the invoice to the database

        $transaction->save();


        // Find the customer associated with the invoice
        $cus = Customer::find($request->name);

        // Send an invoice email to the customer
        Mail::to($cus->email)->send(new InvoiceMail($invoice));

        // Redirect to the invoice index page
        return redirect()->route('invoice.index');
    }


    public function edit($invoice_id)
    {
        // Retrieve the invoice by its ID
        $invoice = Invoice::where('id', $invoice_id)->first();
        // Pass the invoice to the view 'edit'
        return view('auth.Invoice.edit', compact('invoice'));
    }


    public function delete($invoice_id)
    {
        // Delete the invoice with the given ID
        Invoice::where('id', $invoice_id)->delete();
        // Redirect to the invoice index page
        return redirect()->route('invoice.index');
    }
    public function stripe($id)

    {
        $invoice = Invoice::find($id);
        return view('auth.stripe', compact('invoice'));
    }
    public function stripePost(Request $request, $id)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $invoice = Invoice::find($id);
        // dd($invoice);

        $response = Stripe\Charge::create([

            "amount" => $invoice->total * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

        ]);

        // dd($response);
        if ($response->status = "succeeded") {

            $transaction = Transaction::where('name', $id)->first();
            $transaction->status = 'paid';

            $transaction->save();
        }


        Session::flash('success', 'Payment successful!');



        return back();
    }
}
