-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2025 at 09:32 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addplay_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_14_232347_create_products_table', 1),
(6, '2025_03_16_210406_create_product_quantities_table', 1),
(7, '2025_05_03_024144_create_product_colors_table', 1),
(8, '2025_05_03_024220_create_product_galleries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `slug`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Embrace Sideboard', 'embrace-sideboard', 71, '<h6 class=\"fw-bold\">Product Description</h6>\n      <p>\n        Whether it be for the office or at home and wanting soft skin, you will still get to look good. Pave with regular rainfall has led to a sogged-up surface. Use our Textura Outdoor Fabric to style up your outdoor furniture while the weather remains hot. More heat resistance and increased strength mean it can’t burn or fray quickly, while the fine texture and design gives your look the edge.\n      </p>\n\n      <h6 class=\"fw-bold mt-4\">Benefits</h6>\n      <ul class=\"benefits-list\">\n        <li>Durable material is easily cleanable so you can keep your look fresh.</li>\n        <li>Water-repellent finish and internal membrane help keep your feet dry.</li>\n        <li>Spirited materials bring new layers with you.</li>\n        <li>Engineered to reduce fatigue on every move.</li>\n        <li>Outsole includes multi-directional lugs, that offer outdoors lightweight cushioning.</li>\n        <li>Rubber wraps on high abrasion zones to boost traction and grip.</li>\n        <li>Pocket upper with magnetic back keeps items such as metro cards safe.</li>\n        <li>Durable material is easily cleanable so you can keep your look fresh.</li>\n      </ul>\n\n      <h6 class=\"fw-bold mt-4\">Product Details</h6>\n      <ul>\n        <li>Not intended for use as Personal Protective Equipment (PPE)</li>\n        <li>Water-repellent finish and internal membrane help keep your feet dry.</li>\n      </ul>\n\n      <h6 class=\"fw-bold mt-4\">More Details</h6>\n      <ul>\n        <li>Lavender includes delicate ultra-plush upper materials</li>\n        <li>Responsive 3D foot sole with EVA lightweight cushioning</li>\n        <li>Style: BQ2595-200</li>\n      </ul>\n    </div>\n  </div>', 'images/products/7SC9iYKZ9zA32CMCm2yZ7887_6815c5569ee0a.jpg', '2025-05-03 07:27:18', '2025-05-03 07:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
CREATE TABLE IF NOT EXISTS `product_colors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_colors_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 1, '#a67d7d', '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(2, 1, '#5a519e', '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(3, 1, '#53c685', '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(4, 1, '#33962c', '2025-05-03 07:27:18', '2025-05-03 07:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

DROP TABLE IF EXISTS `product_galleries`;
CREATE TABLE IF NOT EXISTS `product_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `gallery_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_galleries_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/products/5nCYKRrlUiaaEaJCRQoY7661_6815c556a3bed.jpg', '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(2, 1, 'images/products/7SC9iYKZ9zA32CMCm2yZ7887_6815c556a414f.jpg', '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(3, 1, 'images/products/vn5nYs40ocu0TmcdO8tP167_6815c556a4420.jpg', '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(4, 1, 'images/products/xCirvDqtCETitfsJjiNz8023_6815c556a4745.jpg', '2025-05-03 07:27:18', '2025-05-03 07:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_quantities`
--

DROP TABLE IF EXISTS `product_quantities`;
CREATE TABLE IF NOT EXISTS `product_quantities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_quantities_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_quantities`
--

INSERT INTO `product_quantities` (`id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'XL', NULL, '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(2, 1, 'XXL', NULL, '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(3, 1, 'M', NULL, '2025-05-03 07:27:18', '2025-05-03 07:27:18'),
(4, 1, 'L', NULL, '2025-05-03 07:27:18', '2025-05-03 07:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_name_unique` (`user_name`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `slug`, `status`, `email`, `phone`, `email_verified_at`, `password`, `photo`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'Active', NULL, NULL, NULL, '$2y$10$0mN5jBCudIFl3Y/dkoeA0OT1VZ4De.SBsQoUfTQ6k6kesU7kP5kye', NULL, NULL, NULL, NULL, '2025-05-03 07:21:17', '2025-05-03 07:21:17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_quantities`
--
ALTER TABLE `product_quantities`
  ADD CONSTRAINT `product_quantities_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
