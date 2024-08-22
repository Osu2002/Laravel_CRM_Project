<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('css/customer.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer List</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
            color: #495057;
        }

        h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 1.1em;
        }

        .add-customer {
            display: block;
            width: fit-content;
            margin: 0 auto 20px auto;
            padding: 12px 24px;
            background-color: #007bff9f;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .add-customer:hover {
            background-color: #2d7204;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #495057;
        }

        th {
            background-color: #5695d8;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .action-buttons a {
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            background-color: #28a745;
            border-radius: 25px;
            transition: background-color 0.3s ease;
            font-size: 14px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .action-buttons a:hover {
            background-color: #218838;
        }

        .action-buttons a.delete {
            background-color: #dc3545;
        }

        .action-buttons a.delete:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {

            table,
            th,
            td {
                font-size: 12px;
                padding: 10px;
            }

            .add-customer {
                width: 100%;
                padding: 10px;
                font-size: 14px;
            }

            .action-buttons a {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <h2>Customer List</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('auth/customer/customer') }}" class="add-customer">Add Customer</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->status }}</td>
                    <td><a class="edit-button" href="{{ route('customer.edit', $customer->id) }}"> EDIT</a></td>
                    <td><a class="delete-button" href="{{ route('customer.delete', $customer->id) }}"> DELETE</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
