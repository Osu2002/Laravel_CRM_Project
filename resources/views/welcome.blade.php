<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #ece9e6 0%, #ffffff 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #ff6363;
        }

        p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
            color: #666;
        }

        .auth-links {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .auth-links a {
            text-decoration: none;
            color: #fff;
            background-color: #ff6363;
            font-weight: 600;
            border: 2px solid #ff6363;
            padding: 0.75rem 1rem;
            border-radius: 5px;
            transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .auth-links a:hover {
            background: #fff;
            color: #ff6363;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 2rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our CRM</h1>
        <p>Our CRM simplifies customer management, proposal tracking, and invoicing with integrated payments, enhancing your business efficiency. Log in or register to continue.</p>
        <div class="auth-links">
            <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
