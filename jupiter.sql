-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 10, 2023 at 05:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jupiter`
--

-- --------------------------------------------------------

--
-- Table structure for table `barbers`
--

CREATE TABLE `barbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rate` decimal(16,2) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barbers`
--

INSERT INTO `barbers` (`id`, `email`, `name`, `phone_number`, `password`, `image`, `rate`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'dcas@gmail.com', 'dcas', '0837365454', '$2y$10$XM9cPZn6BGGm1g4gTrij4ejMldaIcF1DlQld7qENqrsMh/BW/3Gsm', 'images/profiles/2-barber-dcas@gmail.com.jpg', '15000000.00', NULL, '2023-01-04 22:53:16', '2023-01-04 22:53:16', NULL),
(3, 'dcas@mail.com', 'dcas', '0837365454', '$2y$10$/.n1lhr7NhniMYJrRD4.HuKkQnsVW9qLc1Msf1AjMUqJNCf696Mry', 'images/profiles/3-barber-dcas@mail.com.jpg', '1234567890.00', NULL, '2023-01-04 22:58:14', '2023-01-08 01:40:39', '2023-01-08 01:40:39'),
(4, 'afifahha0801@gmail.com', 'Afifah Hasna Wafiyah', '087825479000', '$2y$10$261PLCoXBppT0hM8Eo7A.epCGjF6fKpgIlS4bx1qzLEYp0MbzqC1u', 'images/profiles/4-barber-afifahha0801@gmail.com.jpeg', '150000000.00', NULL, '2023-01-08 01:33:08', '2023-01-08 01:34:30', '2023-01-08 01:34:30'),
(5, 'christ@gmail.com', 'Ignatius Christ Surya', '0823842420', '$2y$10$BSnkj99vwUFVvVeGZzYvsebj.PFltOgj9Gy6wxF1NxPO7Vx5pMXvy', 'images/profiles/5-barber-christ@gmail.com.jpeg', '15000000.00', NULL, '2023-01-08 01:39:29', '2023-01-08 01:39:29', NULL),
(6, 'afifah@gmail.com', 'Afifah Hasna Wafiyah', '0847289473', '$2y$10$r1mM59gveXCygVbqfHB6cOFIch2ySzFi5SpWNJQLpmjpnxgitP9Fy', 'images/profiles/6-barber-afifah@gmail.com.jpeg', '23000000.00', NULL, '2023-01-08 01:40:22', '2023-01-08 01:40:22', NULL),
(7, 'dilan@gmail.com', 'Rahman Dilan Syaukanie', '0934243222', '$2y$10$MTyML1FvsM8oWn5fLU1JmOFo0LikybBMnilGB010o9jN7MgEJWNhq', 'images/profiles/7-barber-dilan@gmail.com.jpeg', '1804300000.00', NULL, '2023-01-08 01:43:22', '2023-01-08 01:43:22', NULL),
(8, 'shintya@gmail.com', 'Shintya Rahma Safitri', '0887867574', '$2y$10$PtvvQwX0hXTP0TiHJzIkUuRfU3DuPbCwt2BMWkEuWyDgSd3c8Aa8q', 'images/profiles/8-barber-shintya@gmail.com.jpeg', '2543000000.00', NULL, '2023-01-08 01:54:53', '2023-01-08 01:54:53', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_26_073814_create_barbers_table', 1),
(6, '2022_12_26_073943_create_services_table', 1),
(7, '2022_12_26_074050_create_service_categories_table', 1),
(8, '2022_12_26_074141_create_service_sub_categories_table', 1),
(9, '2022_12_26_074229_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `price` decimal(16,2) DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `barber_id` bigint(20) UNSIGNED NOT NULL,
  `is_finish` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `date`, `price`, `service_id`, `service_category_id`, `service_sub_category_id`, `user_id`, `barber_id`, `is_finish`, `status`, `created_at`, `updated_at`) VALUES
(6, 'shin', 'alamat', '2023-01-06 14:00:00', '1234567890.00', 6, 6, NULL, 3, 3, 0, 1, '2023-01-04 23:57:17', '2023-01-09 11:48:22'),
(7, 'dcas', 'yyyyyyyy', '2023-01-05 18:57:00', '15000000.00', 6, 7, NULL, 2, 2, 1, 1, '2023-01-08 04:58:01', '2023-01-08 04:58:44'),
(8, 'user', 'yyyyyyyy', '2023-01-09 19:17:00', '15000000.00', 6, 7, NULL, 2, 2, 1, 2, '2023-01-08 05:17:51', '2023-01-08 05:18:56'),
(16, 'admin', 'yyyyyyyy', '2023-01-11 01:50:00', '23000000.00', 6, 7, NULL, 1, 6, 1, 1, '2023-01-09 11:50:50', '2023-01-09 12:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HAIR CUT', 'images/services/1-service-HAIR CUT.jpg', '2023-01-01 06:10:27', '2023-01-04 22:51:23', '2023-01-04 22:51:23'),
(2, 'SPA', 'images/services/2-service-SPA.png', '2023-01-01 06:13:13', '2023-01-04 22:51:26', '2023-01-04 22:51:26'),
(5, 'NAIL ART', 'images/services/nailart.jpg', '2023-01-04 22:59:01', '2023-01-04 22:59:01', NULL),
(6, 'HAIR', 'images/services/hairtest.jpg', '2023-01-04 23:04:39', '2023-01-04 23:04:39', NULL),
(7, 'MASSAGE', 'images/services/msg.jpeg', '2023-01-04 23:06:08', '2023-01-04 23:06:08', NULL),
(8, 'FACIAL', 'images/services/8-service-FACIAL.png', '2023-01-04 23:07:33', '2023-01-04 23:58:24', '2023-01-04 23:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `image`, `service_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PANJANG', 'images/service-categories/1-service-category-PANJANG.png', 1, '2023-01-04 22:51:23', '2023-01-01 06:10:53', '2023-01-04 22:51:23'),
(2, 'A', 'images/service-categories/2-service-category-A.png', 2, '2023-01-04 22:51:26', '2023-01-01 06:13:22', '2023-01-04 22:51:26'),
(3, 'MANICURE + PEDICURE', 'images/service-categories/3-service-category-MANICURE + PEDICURE.png', 5, '2023-01-04 23:03:18', '2023-01-04 23:00:26', '2023-01-04 23:03:18'),
(4, 'GEL NAIL', 'images/service-categories/4-service-category-GEL NAIL.png', 5, NULL, '2023-01-04 23:03:11', '2023-01-04 23:03:11'),
(5, 'MANICURE PEDICURE', 'images/service-categories/5-service-category-MANICURE PEDICURE.png', 5, NULL, '2023-01-04 23:03:58', '2023-01-04 23:03:58'),
(6, 'SHORT HAIR', 'images/service-categories/6-service-category-SHORT HAIR.png', 6, NULL, '2023-01-04 23:05:09', '2023-01-04 23:05:09'),
(7, 'LONG HAIR', 'images/service-categories/7-service-category-LONG HAIR.png', 6, NULL, '2023-01-04 23:05:24', '2023-01-04 23:05:24'),
(8, 'CREATIVE HAIR', 'images/service-categories/8-service-category-CREATIVE HAIR.png', 6, NULL, '2023-01-04 23:05:37', '2023-01-04 23:05:37'),
(9, 'ENERGY MASSAGE', 'images/service-categories/9-service-category-ENERGY MASSAGE.png', 7, NULL, '2023-01-04 23:06:55', '2023-01-04 23:06:55'),
(10, 'LEG MASSAGE', 'images/service-categories/10-service-category-LEG MASSAGE.png', 7, NULL, '2023-01-04 23:07:13', '2023-01-04 23:07:13'),
(11, 'SIMPLE FACIAL', 'images/service-categories/11-service-category-SIMPLE FACIAL.png', 8, '2023-01-04 23:58:24', '2023-01-04 23:07:55', '2023-01-04 23:58:24'),
(12, 'DEEP CLEAN FACIAL', 'images/service-categories/12-service-category-DEEP CLEAN FACIAL.png', 8, '2023-01-04 23:58:24', '2023-01-04 23:08:20', '2023-01-04 23:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `service_sub_categories`
--

CREATE TABLE `service_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sub_categories`
--

INSERT INTO `service_sub_categories` (`id`, `name`, `image`, `service_category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'images/service-sub-categories/1-service-sub-category-ADMIN.png', 1, NULL, '2023-01-01 06:11:06', '2023-01-01 06:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `name`, `phone_number`, `gender`, `address`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@mail.com', 'admin', 'admin', '0837365454', 2, 'yyyyyyyy', '$2y$10$mg8RKCCClFfsR957iL0fTOaSFToGacbp7x/J/uOET9nm1Svnv4tY2', NULL, NULL, '2023-01-01 04:40:46', '2023-01-01 04:40:46'),
(2, 'user@gmail.com', 'user', 'user', '0837365454', 1, 'yyyyyyyy', '$2y$10$mg8RKCCClFfsR957iL0fTOaSFToGacbp7x/J/uOET9nm1Svnv4tY2', NULL, NULL, NULL, '2023-01-03 01:18:41'),
(3, 'aku@gmail.com', 'user', 'aku', '0986756757', 2, 'hsshjshjsh', '$2y$10$mg8RKCCClFfsR957iL0fTOaSFToGacbp7x/J/uOET9nm1Svnv4tY2', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barbers`
--
ALTER TABLE `barbers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barbers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_service_id_foreign` (`service_id`),
  ADD KEY `orders_service_category_id_foreign` (`service_category_id`),
  ADD KEY `orders_service_sub_category_id_foreign` (`service_sub_category_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_barber_id_foreign` (`barber_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_categories_name_unique` (`name`),
  ADD KEY `service_categories_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_sub_categories`
--
ALTER TABLE `service_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_sub_categories_name_unique` (`name`),
  ADD KEY `service_sub_categories_service_category_id_foreign` (`service_category_id`);

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
-- AUTO_INCREMENT for table `barbers`
--
ALTER TABLE `barbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_sub_categories`
--
ALTER TABLE `service_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_barber_id_foreign` FOREIGN KEY (`barber_id`) REFERENCES `barbers` (`id`),
  ADD CONSTRAINT `orders_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`),
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `orders_service_sub_category_id_foreign` FOREIGN KEY (`service_sub_category_id`) REFERENCES `service_sub_categories` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD CONSTRAINT `service_categories_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `service_sub_categories`
--
ALTER TABLE `service_sub_categories`
  ADD CONSTRAINT `service_sub_categories_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
