-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 04:50 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `match_id` int(10) UNSIGNED NOT NULL,
  `bet_choice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `profit` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rate` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`id`, `user_id`, `match_id`, `bet_choice`, `quantity`, `profit`, `created_at`, `updated_at`, `rate`) VALUES
(1, 2, 10, 1, 360, 1260.00, '2017-07-10 03:52:17', '2017-07-10 16:02:40', 3.50),
(2, 2, 10, 0, 150, -150.00, '2017-07-10 03:52:17', '2017-07-10 16:02:40', 1.60),
(3, 2, 10, -1, 140, -140.00, '2017-07-10 03:52:17', '2017-07-10 16:02:40', 1.50),
(4, 2, 16, 1, 250, -250.00, '2017-07-10 03:52:37', '2017-07-10 16:02:51', 1.50),
(5, 2, 16, -1, 360, -360.00, '2017-07-10 03:52:37', '2017-07-10 16:02:51', 0.70),
(6, 2, 4, 0, 100, -100.00, '2017-07-10 03:52:55', '2017-07-12 08:21:09', 2.90),
(7, 2, 2, 0, 140, -140.00, '2017-07-10 03:53:15', '2017-07-11 03:15:18', 0.70),
(8, 2, 2, -1, 250, -250.00, '2017-07-10 03:53:15', '2017-07-11 03:15:18', 3.10),
(9, 2, 1, -1, 360, 1116.00, '2017-07-10 03:54:07', '2017-07-10 16:03:01', 3.10),
(10, 3, 3, 1, 250, -250.00, '2017-07-10 03:54:50', '2017-07-12 08:17:32', 1.70),
(11, 3, 3, 0, 150, -150.00, '2017-07-10 03:54:50', '2017-07-12 08:17:32', 3.60),
(12, 3, 3, 0, 150, -150.00, '2017-07-10 03:55:09', '2017-07-12 08:17:33', 3.60),
(13, 3, 3, -1, 250, 700.00, '2017-07-10 03:55:26', '2017-07-12 08:17:33', 2.80),
(14, 3, 4, 0, 150, -150.00, '2017-07-10 04:04:18', '2017-07-12 08:21:09', 2.90),
(15, 3, 1, -1, 300, 930.00, '2017-07-10 04:04:34', '2017-07-10 16:03:01', 3.10),
(16, 3, 3, 1, 200, -200.00, '2017-07-10 04:04:45', '2017-07-12 08:17:33', 1.70),
(17, 4, 10, 1, 100, 350.00, '2017-07-10 04:13:26', '2017-07-10 16:02:41', 3.50),
(18, 4, 10, -1, 360, -360.00, '2017-07-10 04:13:26', '2017-07-10 16:02:41', 1.50),
(19, 4, 1, 1, 360, -360.00, '2017-07-10 04:14:30', '2017-07-10 16:03:01', 0.30),
(20, 4, 3, 0, 250, -250.00, '2017-07-10 04:14:45', '2017-07-12 08:17:33', 3.60),
(21, 4, 2, 1, 100, 350.00, '2017-07-10 04:15:31', '2017-07-11 03:15:19', 3.50),
(22, 4, 3, 0, 100, -100.00, '2017-07-10 04:16:14', '2017-07-12 08:17:33', 3.60),
(23, 4, 4, -1, 500, 800.00, '2017-07-10 04:16:46', '2017-07-12 08:21:09', 1.60),
(24, 5, 2, 0, 100, -100.00, '2017-07-10 04:18:41', '2017-07-11 03:15:19', 0.70),
(25, 5, 2, -1, 350, -350.00, '2017-07-10 04:18:42', '2017-07-11 03:15:19', 3.10),
(26, 5, 4, 1, 360, -360.00, '2017-07-10 04:18:58', '2017-07-12 08:21:10', 0.80),
(27, 5, 4, 0, 150, -150.00, '2017-07-10 04:18:58', '2017-07-12 08:21:10', 2.90),
(28, 5, 4, -1, 200, 320.00, '2017-07-10 04:18:58', '2017-07-12 08:21:11', 1.60),
(29, 5, 16, 1, 250, -250.00, '2017-07-10 04:19:20', '2017-07-10 16:02:51', 1.50),
(30, 5, 16, 0, 360, 1368.00, '2017-07-10 04:19:21', '2017-07-10 16:02:52', 3.80),
(31, 5, 10, 0, 250, -250.00, '2017-07-10 04:34:35', '2017-07-10 16:02:41', 1.60),
(32, 3, 10, 0, 250, -250.00, '2017-07-10 04:42:33', '2017-07-10 16:02:41', 1.60),
(33, 3, 4, 1, 350, -350.00, '2017-07-11 02:20:59', '2017-07-12 08:21:11', 2.90),
(34, 3, 4, 0, 100, -100.00, '2017-07-11 02:22:35', '2017-07-12 08:21:11', 2.90),
(35, 3, 4, -1, 100, 160.00, '2017-07-11 02:22:48', '2017-07-12 08:21:11', 1.60),
(36, 3, 4, 1, 100, -100.00, '2017-07-11 02:23:34', '2017-07-12 08:21:12', 0.80),
(37, 3, 4, 1, 100, -100.00, '2017-07-11 02:24:30', '2017-07-12 08:21:12', 0.80),
(38, 3, 4, 1, 360, -360.00, '2017-07-11 04:11:04', '2017-07-12 08:21:12', 0.80),
(39, 3, 4, 1, 0, 0.00, '2017-07-11 07:35:07', '2017-07-11 07:35:07', 0.80),
(40, 3, 21, 1, 200, 0.00, '2017-07-12 01:05:37', '2017-07-12 01:05:37', 3.50),
(41, 3, 21, 1, 200, 0.00, '2017-07-12 01:06:15', '2017-07-12 01:06:15', 3.50),
(42, 2, 21, 1, 300, 0.00, '2017-07-12 01:08:08', '2017-07-12 01:08:08', 3.50),
(43, 2, 21, -1, 200, 0.00, '2017-07-12 01:10:52', '2017-07-12 01:10:52', 2.20),
(44, 2, 21, 0, 300, 0.00, '2017-07-12 01:46:55', '2017-07-12 01:46:55', 1.40),
(45, 2, 21, 0, 300, 0.00, '2017-07-12 01:47:59', '2017-07-12 01:47:59', 1.40),
(46, 6, 21, 1, 200, 0.00, '2017-07-12 01:52:47', '2017-07-12 01:52:47', 3.50),
(47, 6, 21, 0, 360, 0.00, '2017-07-12 01:53:29', '2017-07-12 01:53:29', 1.40),
(48, 6, 21, 1, 140, 0.00, '2017-07-12 01:53:37', '2017-07-12 01:53:37', 3.50),
(49, 6, 21, -1, 200, 0.00, '2017-07-12 01:53:48', '2017-07-12 01:53:48', 2.20),
(50, 2, 21, 1, 250, 0.00, '2017-07-12 06:26:31', '2017-07-12 06:26:31', 3.50),
(51, 2, 21, -1, 500, 0.00, '2017-07-12 08:10:50', '2017-07-12 08:10:50', 2.20);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `away_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_rate` double(5,2) NOT NULL,
  `draw_rate` double(5,2) NOT NULL,
  `away_rate` double(5,2) NOT NULL,
  `home_score` int(11) DEFAULT NULL,
  `away_score` int(11) DEFAULT NULL,
  `time_close_bet` datetime NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `public` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `done` int(11) NOT NULL DEFAULT '0',
  `result` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_name`, `away_name`, `home_rate`, `draw_rate`, `away_rate`, `home_score`, `away_score`, `time_close_bet`, `time_start`, `time_end`, `public`, `created_at`, `updated_at`, `done`, `result`) VALUES
(1, 'Germany', 'Spain', 0.30, 0.90, 3.10, 0, 2, '2017-07-10 15:00:00', '2017-07-10 15:30:00', '2017-07-10 17:30:00', 1, '2017-07-10 01:43:25', '2017-07-10 16:03:01', 1, -1),
(2, 'France', 'USA', 3.50, 0.70, 3.10, 3, 2, '2017-07-10 18:30:00', '2017-07-10 19:00:00', '2017-07-10 21:00:00', 1, '2017-07-10 01:44:34', '2017-07-11 03:15:19', 1, 1),
(3, 'Chile', 'Uruguay', 1.70, 3.60, 2.80, 0, 3, '2017-07-11 08:00:00', '2017-07-11 08:30:00', '2017-07-11 10:30:00', 1, '2017-07-10 01:45:30', '2017-07-12 08:17:33', 1, -1),
(4, 'Everton', 'Arsenal', 0.80, 2.90, 1.60, 0, 2, '2017-07-11 15:30:00', '2017-07-11 16:00:00', '2017-07-11 18:00:00', 1, '2017-07-10 01:46:31', '2017-07-12 08:21:12', 1, -1),
(8, 'Bayern Munich', 'Barcelona', 1.20, 3.60, 2.50, 0, 0, '2017-07-10 10:00:00', '2017-07-10 10:30:00', '2017-07-10 12:30:00', 1, '2017-07-10 01:52:08', '2017-07-11 03:12:37', 1, 0),
(10, 'Netherlands', 'Belgium', 3.50, 1.60, 1.50, 3, 0, '2017-07-10 09:00:00', '2017-07-10 09:30:00', '2017-07-10 11:30:00', 1, '2017-07-10 01:55:17', '2017-07-10 16:02:41', 1, 1),
(12, 'China', 'Korea', 3.60, 1.70, 2.60, NULL, NULL, '2017-07-12 11:00:00', '2017-07-12 11:30:00', '2017-07-12 13:30:00', 0, '2017-07-10 02:02:12', '2017-07-10 02:02:12', 0, NULL),
(15, 'Tottenham', 'Leicester', 1.50, 3.60, 0.90, NULL, NULL, '2017-07-11 16:30:00', '2017-07-11 17:00:00', '2017-07-11 19:00:00', 0, '2017-07-10 03:49:03', '2017-07-11 06:37:23', 0, NULL),
(16, 'Chelsea', 'Man City', 1.50, 3.80, 0.70, 1, 1, '2017-07-10 11:00:00', '2017-07-10 11:30:00', '2017-07-10 13:30:00', 1, '2017-07-10 03:50:05', '2017-07-10 16:02:52', 1, 0),
(17, 'Atletico', 'Dortmund', 2.50, 3.20, 0.50, NULL, NULL, '2017-07-12 11:00:00', '2017-07-12 11:30:00', '2017-07-12 13:30:00', 1, '2017-07-11 03:41:04', '2017-07-12 08:20:28', 0, NULL),
(21, 'Newcastle', 'West Ham', 3.50, 1.40, 2.20, NULL, NULL, '2017-07-12 19:30:00', '2017-07-12 20:00:00', '2017-07-12 22:00:00', 1, '2017-07-11 04:15:51', '2017-07-11 04:15:56', 0, NULL),
(22, 'Swansea', 'Burnley', 1.70, 0.80, 2.10, NULL, NULL, '2017-07-12 08:30:00', '2017-07-12 09:00:00', '2017-07-12 11:00:00', 1, '2017-07-12 01:16:43', '2017-07-12 01:16:54', 0, NULL),
(23, 'Stoke City', 'Crystal Palace', 2.50, 3.60, 0.70, NULL, NULL, '2017-07-13 15:00:00', '2017-07-13 15:30:00', '2017-07-13 17:30:00', 1, '2017-07-12 01:17:52', '2017-07-12 01:17:58', 0, NULL),
(24, 'Watford', 'Huddersfield', 2.50, 1.70, 0.80, NULL, NULL, '2017-07-13 19:30:00', '2017-07-13 20:00:00', '2017-07-13 22:00:00', 1, '2017-07-12 01:27:22', '2017-07-12 01:27:28', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_03_091114_create_matches_table', 1),
(4, '2017_07_03_091131_create_bets_table', 1),
(5, '2017_07_05_085132_add_done_to_matches_table', 1),
(6, '2017_07_06_152418_add_result_to_matches_table', 1),
(7, '2017_07_07_021922_add_rate_to_bets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_money` int(10) UNSIGNED NOT NULL DEFAULT '5000',
  `role` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `acc_money`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'altplus@gmail.com', '$2y$10$UPQfo1hwWFJkjoN3X/B6cOPgv/s2MNVGHNoeVc0LEjs9rxvHFB3Ye', 0, 1, 'B5UXNZMH9HtE895NIib6h3zyhyJwmmWO7j73wCGX8zGPv3Wjgcy7TVJ9sNtg', '2017-07-10 01:41:13', '2017-07-10 01:41:13'),
(2, 'huy', 'huy@gmail.com', '$2y$10$cl/.9PYMG2ICCcxNushF8.pQ1W8w.Iw1dI5QkfLQ5qSpn5RBIVQgK', 4806, 0, 'VVktEIPUNlbWdjNXPq5NtIPBY9gPrEKRYuQJ21IdjnPIuSqJ4bB4tXAar6fl', '2017-07-10 03:51:32', '2017-07-12 08:21:09'),
(3, 'quang', 'quang@gmail.com', '$2y$10$.A1ogI2zWhG4STmu5ve85OZbnf3FEwD.Eo3Gig6/Mo5iG.MaINYLK', 5490, 0, 'qvYCf96UiE1eZPHJYXzD2xp1oKrnHkiOqb9UoTfF43jgIoLhVj9uUs0HQ6bc', '2017-07-10 03:54:32', '2017-07-12 08:21:12'),
(4, 'khanh', 'khanh@gmail.com', '$2y$10$6WJWhCjjMDGBKvk6.EQsdOZHHPvrCbu2L/aOL096RclWKn2ljeIKi', 5800, 0, '47jlq5NTbkYeJfzZwxmoLEGZME8uEz9vIxN7MAVYPxfdtKq7JYp7z0DqqddU', '2017-07-10 04:05:32', '2017-07-12 08:21:09'),
(5, 'son', 'son@gmail.com', '$2y$10$4Uyhfl1Nd6373pcOdvpTpOL0OX3EPAjDdhvM.DhxiFSyT1ZM5XVbm', 6128, 0, 'SwpygmRCgRy6y8wRJczmZui7C6qM2RhDv07rF2A0fXX1bmIMP1djmKfwpFW2', '2017-07-10 04:18:26', '2017-07-12 08:21:10'),
(6, 'hoa', 'hoa@gmail.com', '$2y$10$BinqDFiufroWYmFoPWDdReoA3OWnYzlcT/Hu.nY5cxbWzisZDBMlq', 4100, 0, 'vrs0CGq887thboPyr8hg6rJlECjO4X2nI2heRq9abFk9a1y9snrvtT8dd0e3', '2017-07-12 01:52:35', '2017-07-12 01:53:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
