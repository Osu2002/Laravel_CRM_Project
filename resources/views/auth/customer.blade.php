<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{ url('css/customer.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
</head>

<body>
    <h2>Customer</h2>
    <form method="POST" action="{{ route('customer.customerstore') }}" method ="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Email"required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter Phone Number"><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" placeholder="Enter Invoice Number"></textarea><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br><br>

        <button type="submit">Save</button>
    </form>

</body>

</html>
