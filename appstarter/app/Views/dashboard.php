<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            text-align: center;
            padding-top: 50px;
        }

        .dashboard-container {
            background-color: white;
            padding: 2rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: inline-block;
            margin-top: 100px;
        }

        .dashboard-container h1 {
            font-size: 24px;
            margin-bottom: 1.5rem;
        }

        .dashboard-container button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .dashboard-container button:hover {
            background-color: #45a049;
        }

        .dashboard-container a {
            text-decoration: none;
            display: block;
            margin-top: 1.5rem;
            font-size: 16px;
            color: #4CAF50;
        }

        .dashboard-container form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to the Dashboard</h1>

        <!-- Button to go to the About page -->
        <form action="/about" method="get">
            <button type="submit">Go to About Page</button>
        </form>

        <br><br>

        <!-- Conditional rendering for login/register or logout -->
        <?php if (!session()->has('loggedUser')): ?>
            <!-- If not logged in, show Login and Register links -->
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        <?php else: ?>
            <!-- If logged in, show Logout link -->
            <a href="/logout">Logout</a>
        <?php endif; ?>
    </div>
</body>
</html>
