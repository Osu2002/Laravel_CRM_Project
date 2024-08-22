<?php


namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{


    public function invoiceindex()
    {
        $invoices = Invoice::all();
        return view('auth.Invoice.invoiceindex', compact('invoices'));
    }
    public function invoice()
    {

        return view('auth.Invoice.invoice');
    }

    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->invoice_number = $request->invoice_number;
        $invoice->items = $request->items;
        $invoice->total = $request->total;
        $invoice->due_date = $request->due_date;
        $invoice->status = $request->status;

        $invoice->save();
        return redirect()->route('invoice.index');
    }

    public function edit($invoice_id)
    {
        $invoice = Invoice::where('id', $invoice_id)->first();
        return view('auth.Invoice.edit', compact('invoice'));
    }
    public function delete($invoice_id){
        Invoice::where('id',$invoice_id)->delete();
        return redirect()->route('invoice.index');
    }
}
