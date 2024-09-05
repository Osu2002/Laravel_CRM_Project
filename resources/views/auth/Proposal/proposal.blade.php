<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{ url('css/invoice.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
</head>

<body>
    <h2>Proposal</h2>
    <form method="POST" action="{{ route('proposal.proposalstore') }}" method ="POST">
        @csrf

        <label for="id">Customer ID:</label>
        <select name="name" required>
            <option value="">Select ID</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('name') == $customer->id ? 'selected' : '' }}>
                    {{ $customer->id }}
                </option>
            @endforeach
        </select>

        <label for="title">Proposal Title:</label>
        <input type="text" id="title" name="title"placeholder="Enter the title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" placeholder="Enter the description"required></textarea><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="pending">Pending</option>
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
        </select><br><br>

        <button type="submit">Save</button>
    </form>

</body>

</html>
