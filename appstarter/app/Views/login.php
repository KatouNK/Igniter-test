<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset browser default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body styling */
        body {
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for form */
        .form-container {
            background-color: white;
            padding: 2rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }

        /* Form title styling */
        .form-container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 24px;
            color: #333;
        }

        /* Form input field styling */
        .form-container input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Submit button styling */
        .form-container button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Button hover effect */
        .form-container button:hover {
            background-color: #45a049;
        }

        /* Optional: Error message styling */
        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 1rem;
        }

        /* Optional: Link styling */
        .form-container a {
            text-decoration: none;
            color: #4CAF50;
            display: block;
            text-align: center;
            margin-top: 1rem;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <form method="post" action="/auth/loginUser">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <a href="/register">Don't have an account? Register here</a>
        </form>
        <!-- Optional error message -->
        <?php if (session()->getFlashdata('fail')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('fail') ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
