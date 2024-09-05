<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #74f1e1;
        }

        .navbar {
            background-color: #34495e;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgb(84, 188, 206);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar h2 {
            margin: 0;
            font-size: 1.5em;
        }

        .nav-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            align-items: center;
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
            font-size: 1em;
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
            font-size: 1em;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .main-content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: rgb(186, 240, 204);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header-content {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-content h2 {
            font-size: 2em;
            color: #2c3e50;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container a {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin: 0 10px;
        }

        .button-container a:hover {
            background-color: #34495e;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('.nav-links li a');
            links.forEach(link => {
                link.addEventListener('click', function() {
                    links.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</head>

<body>

    <div class="navbar">
        <h2>Dashboard</h2>
        <ul class="nav-links">
            <li><a href="{{ url('dashboard') }}">Home</a></li>
            <li><a href="{{ url('auth/customer/customerindex') }}">Customers</a></li>
            <li><a href="{{ url('auth/Proposal/proposalindex') }}">Proposals</a></li>
            <li><a href="{{ url('auth/Invoice/invoiceindex') }}">Invoices</a></li>
            <li><a href="{{ url('auth/transaction/transactionindex') }}">Transaction</a></li>
            <!-- Profile Dropdown -->
            <li class="profile">

                <div>{{ Auth::user()->name }}</div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-content">
            <h2>Welcome to Dashboard</h2>
            <p>Manage your customers, proposals,transactions and invoices all in one place.</p>
        </div>

        <div class="card">
            <h3>Customers</h3>
            <p>Manage your customer database with ease.</p>
            <div class="button-container">
                <a href="{{ url('auth/customer/customerindex') }}">View Customers</a>
            </div>
        </div>

        <div class="card">
            <h3>Proposals</h3>
            <p>Create and manage your proposals efficiently.</p>
            <div class="button-container">
                <a href="{{ url('auth/Proposal/proposalindex') }}">View Proposals</a>
            </div>
        </div>

        <div class="card">
            <h3>Invoices</h3>
            <p>Generate and manage invoices seamlessly.</p>
            <div class="button-container">
                <a href="{{ url('auth/Invoice/invoiceindex') }}">View Invoices</a>
            </div>
        </div>
        <div class="card">
            <h3>Transactions</h3>
            <p> manage the transactions efficiently.</p>
            <div class="button-container">
                <a href="{{ url('auth/transaction/transactionindex') }}">View Proposals</a>
            </div>
        </div>
    </div>
    <x-app-layout>
    </x-app-layout>
</body>

</html>
