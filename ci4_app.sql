-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 08:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` enum('selesai','ongoing','segera hadir','pendaftaran dibuka') DEFAULT 'segera hadir',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tech Innovation Summit', 'Join us for an exciting day of technological innovations and networking.', 'img/java_jazz.jpg', 'ongoing', '2024-11-01 08:37:33', '2024-11-01 02:43:17'),
(2, 'Cultural Festival', 'Experience diverse cultures through art, music, and traditional performances.', 'img/synchronize.jpg', 'segera hadir', '2024-11-01 08:37:33', '2024-11-01 08:37:33'),
(3, 'Career Fair 2024', 'Connect with leading companies and explore career opportunities.', 'img/dream.jpg', 'pendaftaran dibuka', '2024-11-01 08:37:33', '2024-11-01 08:37:33'),
(4, 'FUSE', 'Event Automation Engineering tahunan', 'img/synchronize.jpg', 'segera hadir', '2024-11-01 02:43:56', '2024-11-01 02:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-10-16-085853', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1730390164, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_event`
--

CREATE TABLE `pendaftaran_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran_event`
--

INSERT INTO `pendaftaran_event` (`id`, `event_id`, `username`, `email`, `nim`, `telpon`, `created_at`, `updated_at`) VALUES
(1, 1, 'mirae', 'reddraxragerone@gmail.com', '22344016', '98348114241804', '2024-10-31 23:19:20', '2024-10-31 23:19:20'),
(2, 4, 'asep', 'user@gnail.com', '223443015', '1234567890', '2024-11-01 10:50:51', '2024-11-01 10:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, '22344016', '$2y$10$v9aE88OmOxKMR80MgmrY2ed8A4A2NjbQnIgQ7t3Z.nGOCV/QZKu7i', NULL, NULL, 'user'),
(2, '223443016', '$2y$10$3K75016pSg4WjKgBp5JRleRBbdSVn3V2aihJZCnJzjk6x6U5rHpmu', '2024-11-01 02:13:26', '2024-11-01 02:15:20', 'admin'),
(3, '223443015', '$2y$10$GsTkrYYbi6rN2LSQi3WnceWBp6zs9/q90rVmOEpfR5ozvjWdaQF4a', '2024-11-01 10:00:52', '2024-11-01 10:00:52', 'user'),
(4, '22344017', '$2y$10$Y8/V4DcMMK0oIkuwfYo8Q./ybjOZYzyCjushieJH1FVoDiLIo3Lay', '2024-11-01 11:15:54', '2024-11-01 11:15:54', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_event`
--
ALTER TABLE `pendaftaran_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `nim_2` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran_event`
--
ALTER TABLE `pendaftaran_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
