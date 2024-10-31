<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <br>
  <div class="container">
  <a class="btn btn-primary" href="<? base_url('/feedback');?>" role="button">kembali</a>
  </div>
    <div class="grid text-center">
        <br>
        <br>
        <h1>Feedback Peserta</h1>
    </div>

<table class="table">
    <div class="container mt-5">
        <table class="table table-striped container mt-5">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Respon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feedbacks as $index => $feedback): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= esc($feedback['email']); ?></td>
                        <td><?= esc($feedback['comment']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>