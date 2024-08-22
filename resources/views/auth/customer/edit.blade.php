<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{ url('css/customer.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Edit</title>
</head>

<body>
    <h2>Edit Customer</h2>
    <form method="POST" action="{{ route('customer.update', $customer->id) }}" method ="POST">
        @method('PUT')
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value ="{{ $customer->name }}" placeholder=" Enter Name"
            required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value ="{{ $customer->email }}"placeholder="Enter Email"
            required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone"
            value ="{{ $customer->phone }}"placeholder="Enter Phone Number"><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" placeholder="Enter Address">{{ $customer->address }}</textarea><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" value ="{{ $customer->status }}">
            <option value="active"{{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive"{{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select><br><br>

        <button type="submit">Update</button>
    </form>

</body>

</html>
