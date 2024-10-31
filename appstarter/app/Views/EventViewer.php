<!-- app/Views/events/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Daftar Event</h1>
        <br>
        <br>
        <div class="row">
            <?php foreach ($events as $event) : ?>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $event['name']; ?></h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal<?= $event['id']; ?>">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk Detail Event -->
                <div class="modal fade" id="eventModal<?= $event['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $event['name']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Status: <?= $event['status']; ?></p>
                                <p>Tanggal: <?= date('d M Y', strtotime($event['date'])); ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
