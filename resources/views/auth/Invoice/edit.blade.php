<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{ url('css/invoice.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Invoice</title>
</head>

<body>
    <h2>Edit Invoice</h2>
    <form method="POST" action="{{ route('invoice.invoicestore') }}" method ="POST">
        @csrf

        <label for="invoice_number">Invoice Number:</label>
        <input type="text" id="invoice_number" name="invoice_number"
            value ="{{ $invoice->invoice_number }}"placeholder="Enter Invoice Number" required><br><br>

        <label for="items">Items/Services:</label>
        <textarea id="items" name="items" placeholder="Describe the items/services" required>{{ $invoice->items }}</textarea><br><br>

        <label for="total">Total Amount:</label>
        <input type="text" id="total" name="total" value ="{{ $invoice->total }}"
            placeholder="Enter Total Amount" required><br><br>

        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" value ="{{ $invoice->due_date }}" name="due_date" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="unpaid"{{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
            <option value="paid"{{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="overdue"{{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
        </select><br><br>

        <button type="submit">Save</button>
    </form>

</body>

</html>
