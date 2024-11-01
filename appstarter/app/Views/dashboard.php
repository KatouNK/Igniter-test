<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
        }
        .sidebar {
            background-color: #003300;
            color: #ffffff;
            min-height: 100vh;
            padding: 20px;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .event-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-logout {
            background-color: #003300;
            color: #ffffff;
            border: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Welcome, <?= esc(session()->get('user')['nim']) ?></h4>
        <ul class="nav flex-column mt-3">
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="#events">My Events</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="<?= base_url('/logout') ?>">Logout</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <h2>My Registered Events</h2>
        <div id="events">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="event-card">
                        <div>
                            <h5><?= esc($event['title']) ?></h5>
                            <p><?= esc($event['description']) ?></p>
                            <p><strong>Status:</strong> <?= esc($event['status']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>You haven't registered for any events yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
