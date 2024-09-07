<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #800080;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar .project-name {
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        .navbar .nav-links {
            display: flex;
        }

        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 10px 15px;
            border-radius: 4px;
            background-color: #ff6600;
        }

        .navbar .nav-links a:hover {
            background-color: #e65c00;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        h2 {
            color: #800080;
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        button {
            width: 100%;
            /* Set consistent width for inputs and buttons */
            padding: 12px;
            /* Consistent padding */
            margin: 10px 0;
            /* Consistent margin for spacing */
            border-radius: 4px;
            /* Rounded corners */
            box-sizing: border-box;
            /* Ensure padding doesn't affect width */
        }

        input[type="text"],
        input[type="password"] {
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        button {
            background-color: #ff6600;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #ff8533;
        }

        .signup-link {
            margin-top: 15px;
            text-align: center;
        }

        .signup-link a {
            color: #800080;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }

        .footer p {
            margin: 0;
        }

        .footer a {
            color: #ffcc66;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="project-name">Book Information Storage System</div>
        <div class="nav-links">
            <a href="/login">Login</a>
            <a href="/">Signup</a>
        </div>
    </div>

    <!-- Login Form Container -->
    <div class="container">
        <h2>Login</h2>
        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error messages -->
        @if ($errors->any())
            <div class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login_process">
            @csrf
            <input type="text" name="email" placeholder="Email Address">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <div class="signup-link">
            Don't have an account? <a href="/">Sign Up</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Book Information Storage System. All rights reserved.</p>
        <p><a href="/about">About</a> | <a href="/contact">Contact</a> | <a href="/privacy">Privacy Policy</a></p>
    </div>
</body>

</html>
