<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Polman</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4F46E5;
            --secondary-color: #818CF8;
            --accent-color: #C7D2FE;
            --text-color: #1F2937;
            --light-bg: #F3F4F6;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Navbar Styles */
        .custom-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-color);
            margin: 0 1rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        /* Hero Section */
        .hero-section {
            min-height: 90vh;
            background: linear-gradient(135deg, #4F46E5 0%, #818CF8 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            padding: 8rem 0;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 600px;
            margin-bottom: 2rem;
        }

        .hero-button {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            background: white;
            color: var(--primary-color);
            border: none;
            border-radius: 50px;
            transition: transform 0.3s ease;
            text-decoration: none;
        }

        .hero-button:hover {
            transform: translateY(-3px);
        }

        /* Featured Events Section */
        .featured-events {
            padding: 5rem 0;
            background: var(--light-bg);
        }

        .event-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .event-card:hover {
            transform: translateY(-10px);
        }

        .event-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .event-content {
            padding: 1.5rem;
        }

        /* Footer */
        .footer {
            background: var(--text-color);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        .social-icons {
            font-size: 1.5rem;
        }

        .social-icons a {
            color: white;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: var(--secondary-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-content {
                padding: 4rem 0;
            }

            .custom-navbar {
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
        <div class="container"> 
            <a class="navbar-brand" href="#">POLMAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/Views/dashboard') ?>">Dashboard</a>
                    </li>

                    <?php if (session()->has('user')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h1 class="hero-title">Discover Amazing Events at Polman</h1>
                    <p class="hero-subtitle">Join our vibrant community and experience unforgettable moments through our carefully curated events.</p>
                    <button class="hero-button" onclick="handlePendaftaran_Kegiatan()">Daftar Event</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Events Section -->
    <section class="featured-events" id="events">
        <div class="container">
            <h2 class="text-center mb-5">Featured Events</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="event-image">
                            <img src="<?= base_url('img/java_jazz.jpg') ?>" alt="">
                        </div>
                        <div class="event-content">
                            <h3>Tech Innovation Summit</h3>
                            <p>Join us for an exciting day of technological innovations and networking.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="event-image">
                        <img src="<?= base_url('img/synchronize.jpg') ?>" alt="">
                        </div>
                        <div class="event-content">
                            <h3>Cultural Festival</h3>
                            <p>Experience diverse cultures through art, music, and traditional performances.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="event-image">
                        <img src="<?= base_url('img/dream.jpg') ?>" alt="">
                        </div>
                        <div class="event-content">
                            <h3>Career Fair 2024</h3>
                            <p>Connect with leading companies and explore career opportunities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="footer-title">POLMAN</h4>
                    <p>Creating memorable experiences through exceptional events.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#events">Events</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5 class="footer-title">Contact Info</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-geo-alt"></i> Bandung, Indonesia</li>
                        <li><i class="bi bi-envelope"></i> info@polman.ac.id</li>
                        <li><i class="bi bi-phone"></i> +62 xxx-xxx-xxx</li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="mb-0">© 2024 POLMAN. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function handlePendaftaran_Kegiatan() {
            window.location.href = '/pendaftaran_kegiatan';
        }
    </script>
</body>
</html>