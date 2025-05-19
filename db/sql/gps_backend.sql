-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 05:04 PM
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
-- Database: `gps_backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('gps_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1747666376),
('gps_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1747666376;', 1747666376);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api-token', '38afe1d17156149bdcdfcba48d1b5c4b86a19822a0e045aa66e5416783ca1b06', '[\"*\"]', '2025-05-19 08:32:17', NULL, '2025-05-19 08:31:37', '2025-05-19 08:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('58uEJkFcXhUyE0k6N1Nmffm2eeTbO9YPIxWZxzNN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEliN1F3TlkzV0lRRVJXWmtSaUpJVm5wZGJNWjRSRkJ6ZEppM1d4VSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fX0=', 1747666438);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` varchar(255) DEFAULT NULL COMMENT 'ID Suscripción',
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `registration_date` date DEFAULT NULL COMMENT 'Fecha de alta',
  `termination_date` date DEFAULT NULL COMMENT 'Fecha de bajo',
  `role` varchar(255) DEFAULT NULL COMMENT 'Tipo usuario',
  `apple_id` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL COMMENT 'Último login',
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'Status',
  `profile_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `subscription_id`, `name`, `last_name`, `email`, `email_verified_at`, `registration_date`, `termination_date`, `role`, `apple_id`, `last_login`, `status`, `profile_image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SUB-ADM001', 'Admin', NULL, 'admin@gmail.com', '2025-05-19 08:31:18', '2024-05-19', NULL, 'admin', NULL, NULL, 'active', NULL, '$2y$12$SQ3HZD.saxhF/wM7ZMRKWecUoEfri14KQgHTUn59WGGALuKCPqTmC', NULL, '2025-05-19 08:31:18', '2025-05-19 08:31:18'),
(2, 'SUB-9WPxAH', 'Alva', 'Shanahan', 'dayana.yundt@example.com', '2025-05-19 08:31:18', '2023-12-22', NULL, 'technician', NULL, '2025-04-23 18:43:09', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'QD5zkJfG1v', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(3, 'SUB-y7M5oy', 'Sarina', 'Macejkovic', 'molly00@example.com', '2025-05-19 08:31:19', '2024-03-30', NULL, 'technician', NULL, '2025-05-16 05:37:28', 'suspended', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'Arx68fb8fj', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(4, 'SUB-UYJknC', 'Hellen', 'Grant', 'katherine68@example.org', '2025-05-19 08:31:19', '2024-01-29', NULL, 'admin', NULL, '2025-05-10 14:31:44', 'active', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'k2tqfX85sJ', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(5, 'SUB-A6zkJl', 'Orpha', 'Hane', 'morris82@example.org', '2025-05-19 08:31:19', '2023-06-10', NULL, 'admin', NULL, '2025-05-16 09:38:43', 'active', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', '9yHnVWR7Pl', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(6, 'SUB-XdBxWS', 'Kyleigh', 'Bartell', 'harvey.juston@example.com', '2025-05-19 08:31:19', '2024-12-19', NULL, 'manager', NULL, '2025-05-07 01:41:32', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'zfr4NoZQSD', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(7, 'SUB-pBwHEG', 'Frieda', 'Conn', 'lavina.schmidt@example.net', '2025-05-19 08:31:19', '2024-12-26', '2025-03-11', 'admin', NULL, '2025-05-12 14:12:58', 'suspended', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'hljBpEw6SP', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(8, 'SUB-4BlTZ5', 'Lance', 'Greenfelder', 'rosalind73@example.org', '2025-05-19 08:31:19', '2024-08-10', NULL, 'manager', NULL, '2025-05-01 09:12:23', 'active', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', '2Arew8iRqc', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(9, 'SUB-9amD1w', 'Michele', 'Gusikowski', 'earnestine97@example.net', '2025-05-19 08:31:19', '2024-12-01', NULL, 'admin', NULL, '2025-05-10 09:43:11', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', '11JC0H5A1h', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(10, 'SUB-TZdDfi', 'Daphney', 'Reichel', 'faustino82@example.net', '2025-05-19 08:31:19', '2024-08-19', NULL, 'manager', NULL, '2025-05-04 01:21:32', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'yYbjnodZfI', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(11, 'SUB-LyFZye', 'Bernita', 'Torphy', 'altenwerth.genoveva@example.net', '2025-05-19 08:31:19', '2023-06-17', NULL, 'user', NULL, '2025-05-16 15:16:10', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'hxGl8lVitv', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(12, 'SUB-ayT5M9', 'Sibyl', 'Bauch', 'lauretta.cummerata@example.org', '2025-05-19 08:31:19', '2025-02-24', NULL, 'technician', 'deed9431-0aa5-3cee-8ac3-f6b1611cf308', '2025-05-04 13:43:40', 'active', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', '5gyXtvCWNm', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(13, 'SUB-bTDIT8', 'Golden', 'Jast', 'wsporer@example.net', '2025-05-19 08:31:19', '2023-10-29', NULL, 'user', 'a2c09285-cc37-3441-ab87-288b5a4ca362', '2025-04-21 13:40:48', 'active', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'pQLzcUEpZI', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(14, 'SUB-N86BqR', 'Garret', 'Beer', 'ima.haag@example.com', '2025-05-19 08:31:19', '2023-06-25', NULL, 'admin', NULL, '2025-05-09 12:53:40', 'suspended', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'u4K2ACDPvX', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(15, 'SUB-N40sI1', 'Cordia', 'Effertz', 'lillie63@example.org', '2025-05-19 08:31:19', '2023-11-01', NULL, 'technician', 'c844a25e-e866-3cbb-a2d2-5918fc0dc191', '2025-04-21 11:51:07', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'oDHr7Bd7WP', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(16, 'SUB-HdyhXV', 'Scottie', 'Kiehn', 'torp.julianne@example.net', '2025-05-19 08:31:19', '2024-03-17', NULL, 'technician', 'aac42391-4713-3459-87b4-b0587e84ed7e', '2025-04-26 13:58:06', 'suspended', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'l19D0UYWBi', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(17, 'SUB-Gv1B1w', 'Zella', 'Tremblay', 'ivory.toy@example.org', '2025-05-19 08:31:19', '2023-09-29', NULL, 'technician', 'beed4ae5-2e2b-3e72-a5ec-438dd2c18148', '2025-05-04 00:23:54', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'UgLaUh4RIV', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(18, 'SUB-annKrw', 'Prudence', 'Funk', 'nicholas28@example.net', '2025-05-19 08:31:19', '2024-09-29', NULL, 'manager', 'b698c990-c696-3d16-85d6-07b160b5336e', '2025-05-01 22:31:27', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'ZCbuqtwj9y', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(19, 'SUB-ryLDKk', 'Kristin', 'Rath', 'ian99@example.org', '2025-05-19 08:31:19', '2023-12-26', NULL, 'admin', '16daba70-475e-3c18-a15d-9351de50e0f9', '2025-04-21 21:01:17', 'inactive', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'CEh2KnW2aU', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(20, 'SUB-cBpPWY', 'Reva', 'Goyette', 'ebert.patricia@example.org', '2025-05-19 08:31:19', '2024-03-24', NULL, 'user', NULL, '2025-04-28 11:34:53', 'active', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'XyA3A3klxb', '2025-05-19 08:31:19', '2025-05-19 08:31:19'),
(21, 'SUB-FM7FuU', 'Cynthia', 'Watsica', 'clementine.hills@example.net', '2025-05-19 08:31:19', '2023-10-27', NULL, 'user', NULL, '2025-05-06 15:21:25', 'suspended', NULL, '$2y$12$rjM/XnS4.YcXDsrNTzo/auDE8KvjK9SS6I/8c9LvjwJqhPJDGzBPK', 'LFqhZyZTA5', '2025-05-19 08:31:19', '2025-05-19 08:31:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
