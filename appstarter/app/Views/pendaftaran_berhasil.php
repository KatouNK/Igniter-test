<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .success-message {
            text-align: center;
            max-width: 500px;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="success-message">
        <h2>Pendaftaran Berhasil!</h2>
        <p>Terima kasih sudah mendaftar. Anda akan diarahkan ke halaman login dalam beberapa detik.</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "<?= base_url('login') ?>";
        }, 5000);
    </script>
</body>
</html>
