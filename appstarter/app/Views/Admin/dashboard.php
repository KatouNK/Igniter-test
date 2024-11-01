<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #003300;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar a {
            color: #ffffff;
            font-weight: bold;
        }
        .logout-btn {
            background-color: #d9534f;
            color: #ffffff;
            border: none;
            width: 100%;
            text-align: left;
            padding: 0.75rem 1rem;
            font-weight: bold;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #c9302c;
            color: #ffffff;
        }
        .content {
            padding: 20px;
            flex-grow: 1;
        }
        .event-card {
            background-color: #f1f1f1;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 180px;
        }
        .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #004d00;
            font-size: 1.2rem;
            cursor: pointer;
        }
        .btn-custom {
            background-color: #003300;
            color: #ffffff;
            border: none;
            margin-top: 10px;
        }
        .btn-custom:hover {
            background-color: #004d00;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <div>
            <h5 class="text-center mb-4">WebName</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link active" href="#">Event Schedule</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#">Users List</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#">Messages</a>
                </li>
            </ul>
        </div>
        <!-- Logout Button -->
        <button onclick="window.location.href='<?= base_url('logout') ?>'" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </div>

    <!-- Main Content -->
    <div class="content flex-fill">
        <h2>Selamat datang di Dashboard Admin</h2>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Event Schedule</h4>
            <input type="month" class="form-control" style="width: 200px;">
        </div>

        <!-- Event List -->
        <div class="row">
            <?php foreach ($events as $event): ?>
                <div class="col-md-4">
                    <div class="event-card">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editEventModal<?= $event['id'] ?>" class="edit-icon">
                            <i class="bi bi-pencil-square" title="Edit Event"></i>
                        </a>
                        <div>
                            <h5><?= esc($event['title']) ?></h5>
                            <p><?= esc($event['description']) ?></p>
                        </div>
                        <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#editEventModal<?= $event['id'] ?>">Edit Event</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Action Button -->
        <div class="mt-3">
            <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addEventModal">Create Event</button>
        </div>
    </div>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/store_event" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventLabel">Add New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Image Path</label>
                        <input type="text" class="form-control" id="image_path" name="image_path">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="selesai">Selesai</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="segera hadir">Segera Hadir</option>
                            <option value="pendaftaran dibuka">Pendaftaran Dibuka</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-custom">Save Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Event Modals -->
<?php foreach ($events as $event): ?>
    <div class="modal fade" id="editEventModal<?= $event['id'] ?>" tabindex="-1" aria-labelledby="editEventLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/admin/event/update/<?= $event['id'] ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventLabel">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= esc($event['title']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required><?= esc($event['description']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image_path" class="form-label">Image Path</label>
                            <input type="text" class="form-control" id="image_path" name="image_path" value="<?= esc($event['image_path']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="selesai" <?= $event['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                <option value="ongoing" <?= $event['status'] === 'ongoing' ? 'selected' : '' ?>>Ongoing</option>
                                <option value="segera hadir" <?= $event['status'] === 'segera hadir' ? 'selected' : '' ?>>Segera Hadir</option>
                                <option value="pendaftaran dibuka" <?= $event['status'] === 'pendaftaran dibuka' ? 'selected' : '' ?>>Pendaftaran Dibuka</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-custom">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
