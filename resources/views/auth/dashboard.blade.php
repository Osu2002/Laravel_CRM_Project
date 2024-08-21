<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }

        .navbar {
            background-color: #34495e;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h2 {
            margin: 0;
        }

        .nav-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links li a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-links li a:hover {
            background-color: #3b5998;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile div {
            margin-right: 20px;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .main-content {
            padding: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Dashboard</h2>
        <ul class="nav-links">
            <li><a href="{{ url('auth/dashboard') }}">Home</a></li>
            <li><a href="{{ url('auth/customerindex') }}">Customers</a></li>
            <li><a href="{{ url('auth/proposalindex') }}">Proposals</a></li>
            <li><a href="{{ url('auth/invoiceindex') }}">Invoices</a></li>
        </ul>
        <div class="profile">
            <img src="https://via.placeholder.com/40" alt="Profile Picture">
            <div>
                <strong>John Doe</strong><br>
                <span>johndoe@example.com</span>
            </div>
            <a href="#" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <h2>Welcome to the Dashboard</h2>
            <p>This section provides a general overview of your account and activities.</p>
        </div>

        <div class="card">
            <h2>Recent Activities</h2>
            <p>Check out the latest activities and updates.</p>
        </div>
    </div>

</body>

</html>
