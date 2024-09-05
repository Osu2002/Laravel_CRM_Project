<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{ url('css/proposal.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <h2>Edit Proposal</h2>
    <form method="POST" action="{{ route('Proposal.update',$proposal->id) }}" method ="POST">
        @method('PUT')
        @csrf

        <label for="name">Customer ID:</label>
        <input type="text" id="name" name="name" value ="{{ $proposal->name }}"placeholder="Enter the customer ID"required>
        <!-- Populate with customer options -->
        <br><br>

        <label for="title">Proposal Title:</label>
        <input type="text" id="title" name="title" value ="{{ $proposal->title }}"placeholder="Enter the title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"  placeholder="Enter the description" required>{{ $proposal->description }}</textarea><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="pending"{{ $proposal->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="accepted"{{ $proposal->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="rejected"{{ $proposal->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select><br><br>

        <button type="submit">Update</button>
    </form>

</body>

</html>



