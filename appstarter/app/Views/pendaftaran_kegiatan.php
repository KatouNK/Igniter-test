<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kegiatan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .pendaftaran-kegiatan-card {
            max-width: 400px;
            width: 100%;
            margin: auto;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="pendaftaran-kegiatan-card">
            <div class="text-center mb-4">
                <h2 class="mb-2">Pendaftaran Kegiatan</h2>
            </div>
            
            <form action="<?= base_url('event/store') ?>" method="POST" class="card shadow">
                <div class="card-body p-4">
                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger">
                            <?php foreach (session('errors') as $error): ?>
                                <p><?= $error ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->has('success')): ?>
                        <div class="alert alert-success">
                            <?= session('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- Username Input -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama Mahasiswa" required>
                    </div>

                    <!-- Event Dropdown -->
                    <div class="mb-3">
                        <label for="event" class="form-label">Event</label>
                        <select class="form-select" id="event" name="event" required>
                            <option value="">Pilih Event</option>
                            <?php foreach ($events as $event): ?>
                                <option value="<?= $event['id'] ?>"><?= esc($event['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>

                    <!-- NIM Input -->
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                    </div>

                    <!-- Telpon Input -->
                    <div class="mb-3">
                        <label for="telpon" class="form-label">Nomor Telpon</label>
                        <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Masukkan Nomor Telpon" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-create w-100 rounded-3">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
