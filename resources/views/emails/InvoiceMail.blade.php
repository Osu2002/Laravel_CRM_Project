<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Company</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            line-height: 1.6;
            font-size: 14px;
            margin: 10px 0;
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        ul li {
            background-color: #f9f9f9;
            padding: 10px;
            margin: 5px 0;
            border-left: 4px solid #27ae60;
            border-radius: 4px;
            color: #333;
            font-size: 14px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #218c53;
        }

        .footer {
            margin-top: 15px;
            font-size: 12px;
            color: #777;
        }

        .footer a {
            color: #27ae60;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome {{ $name }}!</h1>
        <p>We're excited to have you on board. Here are your details:</p>
        <ul>
            <li><strong>Items/Services:</strong> {{ $items }}</li>
            <li><strong>Total Amount:</strong> ${{ $total }}</li>
            <li><strong>Due Date:</strong> {{ $due_date }}</li>
            <li><strong>Status:</strong> {{ $status }}</li>
        </ul>
        <p>You need to pay ${{ $total }}</p>
        <a class="button" href="{{ url('stripe', $id) }}">Pay Now:${{ $total }}</a>
        <p>We look forward to working with you!</p>
        <div class="footer">
            <p>Questions? <a href="mailto:osura@eweblook.com">Contact us</a>.</p>
        </div>
    </div>
</body>

</html>
