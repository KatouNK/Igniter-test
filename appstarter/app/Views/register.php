<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .signup-card {
            max-width: 400px;
            width: 100%;
            margin: auto;
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .password-container {
            position: relative;
        }

        .form-control {
            padding: 0.75rem 1rem;
        }

        .btn-create {
            background-color: #999;
            border: none;
            padding: 0.75rem;
            color: white;
        }

        .btn-create:hover {
            background-color: #888;
            color: white;
        }

        .password-hint {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="signup-card">
            <div class="card shadow">
            <div class="card-body p-4">
            <div class="text-center mb-4">
                <h2 class="mb-2">Create an account</h2>
                <p class="text-muted">Already have an account? <a href="#" onclick="handleLogin()" class="text-decoration-none">Log in</a></p>
            </div>
            
            <form id="signupForm" action="<?= base_url('/auth/storeUser') ?>" method="post">
                <!-- NIM Input -->
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter your NIM" required>
                </div>

                <!-- Password Input -->
                <div class="mb-2">
                    <label for="password" class="form-label">Create a password</label>
                    <div class="password-container">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required minlength="8">
                        <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                    </div>
                </div>

                <!-- Password Hint -->
                <div class="mb-4">
                    <small class="password-hint">
                        Use 8 or more characters with a mix of letters, numbers & symbols
                    </small>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-create w-100 rounded-3">Create an account</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = this;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        });

        // Handle login
        function handleLogin() {
            window.location.href = '<?= base_url('/login') ?>';
        }
    </script>
</body>
</html>