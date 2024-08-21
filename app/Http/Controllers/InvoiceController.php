<?php


namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice()
    {
        return view('auth.invoice');
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

        return "success";
    }
}
