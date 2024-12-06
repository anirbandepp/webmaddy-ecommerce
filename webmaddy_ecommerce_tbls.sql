-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 02:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmaddy_ecommerce_tbls`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_action` enum('employee','admin','superAdmin') NOT NULL DEFAULT 'superAdmin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_action`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-01-11 01:30:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'superAdmin', '8YpllSdrhV', '2023-01-11 01:30:43', '2023-01-11 01:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `path` text NOT NULL,
  `offer_percentage` double(8,2) DEFAULT NULL,
  `tax_percent` double(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `path`, `offer_percentage`, `tax_percent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cat 1', 'cat_1', 0, '20230111070519.jpg', 96.00, 71.00, '2023-01-11 01:35:19', '2023-01-11 01:35:19', NULL),
(2, 'sub cat 1', 'sub_cat_1', 3, '20230111071259.png', 5.00, 5.00, '2023-01-11 01:42:59', '2023-01-11 08:16:49', NULL),
(3, 'cat 2', 'cat_2', 0, '20230111073601.png', 23.00, 72.00, '2023-01-11 02:06:01', '2023-01-11 08:10:27', NULL),
(4, 'cat 3', 'cat_3', 0, '20230111134014.jpg', 2.00, 2.00, '2023-01-11 08:10:14', '2023-01-11 08:10:14', NULL),
(5, 'sub cat 3', 'sub_cat_3', 4, '20230111134711.jpg', 20.00, 30.00, '2023-01-11 08:17:11', '2023-01-11 08:17:11', NULL),
(6, 'Electronics', 'Electronics', 0, '20230112130202.jpg', 56.00, 27.00, '2023-01-12 07:32:02', '2023-01-12 07:32:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-01-11 05:10:19', '2023-01-11 05:10:19'),
(2, 2, 1, '2023-01-11 05:10:19', '2023-01-11 05:10:19'),
(3, 3, 1, '2023-01-11 05:10:19', '2023-01-11 05:10:19'),
(4, 1, 2, '2023-01-11 08:09:44', '2023-01-11 08:09:44'),
(7, 4, 2, '2023-01-12 05:11:49', '2023-01-12 05:11:49'),
(8, 5, 2, '2023-01-12 05:11:49', '2023-01-12 05:11:49'),
(9, 4, 3, '2023-01-12 05:16:12', '2023-01-12 05:16:12'),
(10, 5, 3, '2023-01-12 05:16:12', '2023-01-12 05:16:12'),
(11, 3, 4, '2023-01-12 05:24:33', '2023-01-12 05:24:33'),
(12, 2, 4, '2023-01-12 05:24:33', '2023-01-12 05:24:33'),
(13, 3, 5, '2023-01-12 05:27:08', '2023-01-12 05:27:08'),
(14, 2, 5, '2023-01-12 05:27:08', '2023-01-12 05:27:08'),
(15, 4, 5, '2023-01-12 05:27:08', '2023-01-12 05:27:08'),
(16, 1, 6, '2023-01-12 05:28:32', '2023-01-12 05:28:32'),
(17, 3, 6, '2023-01-12 05:28:32', '2023-01-12 05:28:32'),
(18, 4, 6, '2023-01-12 05:28:32', '2023-01-12 05:28:32'),
(19, 2, 7, '2023-01-12 05:30:22', '2023-01-12 05:30:22'),
(20, 4, 7, '2023-01-12 05:30:22', '2023-01-12 05:30:22'),
(21, 5, 7, '2023-01-12 05:30:22', '2023-01-12 05:30:22'),
(22, 3, 8, '2023-01-12 05:34:37', '2023-01-12 05:34:37'),
(23, 2, 8, '2023-01-12 05:34:37', '2023-01-12 05:34:37'),
(24, 5, 8, '2023-01-12 05:34:37', '2023-01-12 05:34:37'),
(25, 1, 9, '2023-01-12 07:33:52', '2023-01-12 07:33:52'),
(26, 5, 9, '2023-01-12 07:33:52', '2023-01-12 07:33:52'),
(27, 6, 9, '2023-01-12 07:33:52', '2023-01-12 07:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_value` varchar(255) NOT NULL,
  `coupon_type` enum('percentage','flat_value') NOT NULL DEFAULT 'percentage',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `expiry_at` date NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(100) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `status`, `expiry_at`, `is_used`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Kraig Ferry IV', 'elena33@example.net', 'flat_value', 'active', '2023-01-13', 1, 'LTpOKVKQ9j', NULL, '2023-01-13 07:31:33', '2023-01-13 07:31:33'),
(2, 'cAKOyB21E4', '100', 'flat_value', 'active', '2023-01-14', 1, 'dQEgKyd3pj', NULL, '2023-01-13 07:31:33', '2023-01-13 09:53:59'),
(3, 'Ms. Mozelle Walker I', 'estella.gorczany@example.net', 'percentage', 'active', '2023-01-13', 0, 'lL90reBujA', NULL, '2023-01-13 07:31:33', '2023-01-13 07:31:33'),
(4, 'Prof. Clifford Steuber IV', 'homenick.alene@example.net', 'percentage', 'inactive', '2023-01-13', 0, '1UqSEMWVNs', NULL, '2023-01-13 07:31:33', '2023-01-13 07:31:33'),
(5, 'Toy Nolan Sr.', 'florida.reynolds@example.org', 'percentage', 'active', '2023-01-13', 0, 'ybQPDGgk77', NULL, '2023-01-13 07:31:33', '2023-01-13 07:31:33'),
(6, 'Terrell Schulist', 'vivian.koss@example.org', 'percentage', 'inactive', '2023-01-13', 0, 'JSDt9Ke2nn', NULL, '2023-01-13 07:31:33', '2023-01-13 07:31:33'),
(7, 'Fleta Hahn', 'iquitzon@example.com', 'percentage', 'active', '2023-01-13', 1, 'bc8Qx6HN0a', NULL, '2023-01-13 07:31:33', '2023-01-13 07:31:33'),
(8, 'Flo Towne IV', 'welch.estefania@example.net', 'percentage', 'active', '2023-01-13', 0, '0O954PmIij', NULL, '2023-01-13 07:31:33', '2023-01-13 07:31:33'),
(9, 'Kellie Gerlach', 'mayer.maye@example.com', 'percentage', 'active', '2023-01-13', 0, 'QVnRE60i2v', '2023-01-13 09:26:02', '2023-01-13 07:31:33', '2023-01-13 09:26:02'),
(10, 'Mrs. Kelli Powlowski V', 'lester.bode@example.net', 'percentage', 'active', '2023-01-13', 1, 'yq81yFgEW2', '2023-01-13 09:25:54', '2023-01-13 07:31:33', '2023-01-13 09:25:54'),
(11, 'QaBHs0lnFyupd200', '5', 'percentage', 'active', '2023-01-14', 0, '63c16d908fccf', NULL, '2023-01-13 09:11:20', '2023-01-13 09:43:08'),
(12, 'p1pruNwGXN', '5', 'flat_value', 'active', '2023-01-15', 0, '63c16e3610298', NULL, '2023-01-13 09:14:06', '2023-01-13 09:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `customer_activities`
--

CREATE TABLE `customer_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logged_in` datetime DEFAULT NULL,
  `order_count` int(11) DEFAULT NULL,
  `total_spend` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discountedCode` varchar(30) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `expire_from` date NOT NULL,
  `expire_to` date NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `parent_image` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `parent_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1591320230111071817.png', 0, NULL, '2023-01-11 01:48:17', '2023-01-11 01:48:17'),
(2, '7648620230111071817.png', 0, NULL, '2023-01-11 01:48:17', '2023-01-11 01:48:17'),
(3, '7806720230111073409.png', 0, NULL, '2023-01-11 02:04:09', '2023-01-11 02:04:09'),
(4, '8744220230111073409.jpg', 0, NULL, '2023-01-11 02:04:09', '2023-01-11 02:04:09'),
(5, '2953420230111073409.webp', 0, NULL, '2023-01-11 02:04:09', '2023-01-11 02:04:09'),
(6, '1595720230111083727.png', 0, NULL, '2023-01-11 03:07:27', '2023-01-11 03:07:27'),
(7, '2674320230111083727.png', 0, NULL, '2023-01-11 03:07:27', '2023-01-11 03:07:27'),
(8, '5123220230111083727.jpg', 0, NULL, '2023-01-11 03:07:27', '2023-01-11 03:07:27'),
(9, '7225120230111101438.png', 0, NULL, '2023-01-11 04:44:38', '2023-01-11 04:44:38'),
(10, '5544820230111101438.png', 0, NULL, '2023-01-11 04:44:38', '2023-01-11 04:44:38'),
(11, '1408220230111101438.jpg', 0, NULL, '2023-01-11 04:44:38', '2023-01-11 04:44:38'),
(12, '3401120230111101811.png', 0, NULL, '2023-01-11 04:48:11', '2023-01-11 04:48:11'),
(13, '4475020230111101811.png', 0, NULL, '2023-01-11 04:48:11', '2023-01-11 04:48:11'),
(14, '6855120230111101811.jpg', 0, NULL, '2023-01-11 04:48:11', '2023-01-11 04:48:11'),
(15, '4212820230111104019.png', 1, NULL, '2023-01-11 05:10:19', '2023-01-11 07:05:37'),
(16, '9007220230111104019.jpg', 1, NULL, '2023-01-11 05:10:19', '2023-01-11 07:20:32'),
(17, '6335020230111104020.jpg', 1, NULL, '2023-01-11 05:10:20', '2023-01-12 11:23:03'),
(18, '9299120230111133944.png', 1, NULL, '2023-01-11 08:09:44', '2023-01-12 05:32:07'),
(19, '5893520230111133944.jpg', 0, NULL, '2023-01-11 08:09:44', '2023-01-11 08:09:44'),
(20, '4578820230111133944.png', 0, NULL, '2023-01-11 08:09:44', '2023-01-11 08:09:44'),
(21, '5124320230112104612.png', 1, NULL, '2023-01-12 05:16:12', '2023-01-12 05:31:48'),
(22, '3038720230112105433.jpg', 1, NULL, '2023-01-12 05:24:33', '2023-01-12 05:31:29'),
(23, '1411520230112105433.jpg', 0, NULL, '2023-01-12 05:24:33', '2023-01-12 05:24:33'),
(24, '7423220230112105708.jpg', 0, NULL, '2023-01-12 05:27:08', '2023-01-12 05:27:08'),
(25, '1470820230112105708.jpg', 1, NULL, '2023-01-12 05:27:08', '2023-01-12 05:31:25'),
(26, '1980820230112105832.jpg', 1, NULL, '2023-01-12 05:28:32', '2023-01-12 05:31:21'),
(27, '5510620230112105832.jpg', 0, NULL, '2023-01-12 05:28:32', '2023-01-12 05:28:32'),
(28, '3352420230112110022.jpg', 1, NULL, '2023-01-12 05:30:22', '2023-01-12 05:31:16'),
(29, '5212920230112110022.jpeg', 0, NULL, '2023-01-12 05:30:22', '2023-01-12 05:30:22'),
(30, '3639620230112110437.jpg', 0, NULL, '2023-01-12 05:34:37', '2023-01-12 05:34:37'),
(31, '2569520230112110437.jpg', 1, NULL, '2023-01-12 05:34:37', '2023-01-12 08:13:43'),
(32, '9654620230112130352.jpg', 1, NULL, '2023-01-12 07:33:52', '2023-01-12 08:13:36'),
(33, '3789220230112130352.jpg', 0, NULL, '2023-01-12 07:33:52', '2023-01-12 07:33:52');

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
(5, '2023_01_03_000000_create_administrators_table', 1),
(6, '2023_01_04_114242_create-category-tbls', 1),
(7, '2023_01_04_115935_create-product-tbls', 1),
(8, '2023_01_04_124422_create-promocode-tbls', 1),
(9, '2023_01_04_132141_create-user-address-tbls', 1),
(10, '2023_01_04_132939_create-order-tbls', 1),
(11, '2023_01_04_134727_create-order-details-tbls', 1),
(12, '2023_01_05_061520_create-prod-cates-tbls', 1),
(13, '2023_01_05_070747_create-vendor-tbls', 1),
(14, '2023_01_05_073041_create-order-vendor-tbls', 1),
(15, '2023_01_05_073829_create-discount-tbls', 1),
(16, '2023_01_10_191903_create_category_products_table', 1),
(17, '2023_01_11_043753_create_images_table', 1),
(18, '2023_01_11_043850_create_products_images_table', 1),
(22, '2023_01_11_140144_create_social_links_table', 2),
(25, '2023_01_13_085254_create_customer_activities_table', 3),
(26, '2023_01_13_091253_create_users_activities_table', 3),
(27, '2023_01_13_122128_create_coupons_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `type` enum('home','office','others') NOT NULL DEFAULT 'home',
  `payment_remarks` text NOT NULL,
  `order_status` enum('active','pending','cancelled','processing','shipped','complete','review') NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `total_price`, `discount`, `address1`, `address2`, `note`, `landmark`, `city`, `state`, `country_id`, `zipcode`, `type`, `payment_remarks`, `order_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '10022', 1, 500.00, 20.00, 'Kolkata Chetla', 'Kolkata New Town', 'order note', 'Chetla boys high school', 'Kolkata', 'West Bengal', 1, 700027, 'home', 'Done', 'pending', NULL, '2023-01-14 07:01:29', '2023-01-14 03:42:34'),
(2, '10024', 3, 5500.00, 200.00, 'Kolkata Behala', 'Kolkata New Town', 'order note', 'Behala', 'Kolkata', 'West Bengal', 1, 700051, 'home', 'Done', 'processing', NULL, '2023-01-14 07:01:29', '2023-01-14 07:01:29'),
(3, '10044', 4, 5500.00, 200.00, 'Kolkata Behala', 'Kolkata New Town', 'order note', 'Behala', 'Kolkata', 'West Bengal', 1, 700051, 'home', 'Done', 'shipped', NULL, '2023-01-14 07:01:29', '2023-01-14 07:01:29'),
(4, '10020', 1, 5500.00, 200.00, 'Kolkata Behala', 'Kolkata New Town', 'order note', 'Behala', 'Kolkata', 'West Bengal', 1, 700051, 'home', 'Done', 'complete', NULL, '2023-01-14 07:01:29', '2023-01-14 07:01:29'),
(5, '10029', 3, 5500.00, 200.00, 'Kolkata Behala', 'Kolkata New Town', 'order note', 'Behala', 'Kolkata', 'West Bengal', 1, 700051, 'home', 'Done', 'review', NULL, '2023-01-14 07:01:29', '2023-01-14 07:01:29'),
(6, '10040', 4, 5500.00, 200.00, 'Kolkata Behala', 'Kolkata New Town', 'order note', 'Behala', 'Kolkata', 'West Bengal', 1, 700051, 'home', 'Done', 'cancelled', NULL, '2023-01-14 07:01:29', '2023-01-14 07:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `ordervendors`
--

CREATE TABLE `ordervendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(12,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 285.00, 5, '2023-01-14 07:08:53', '2023-01-14 07:08:53'),
(2, 1, 2, 122.00, 2, '2023-01-14 07:08:53', '2023-01-14 07:08:53'),
(3, 1, 3, 340.00, 5, '2023-01-14 07:08:53', '2023-01-14 07:08:53'),
(4, 2, 1, 258.00, 5, '2023-01-14 07:08:53', '2023-01-14 07:08:53'),
(5, 2, 1, 155.00, 1, '2023-01-14 07:08:53', '2023-01-14 07:08:53');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodcates`
--

CREATE TABLE `prodcates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `active` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text NOT NULL,
  `price` double(12,2) NOT NULL,
  `sell_price` double(12,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `stocks` int(11) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `published_date` date NOT NULL,
  `offer_percentage` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `short_description`, `description`, `price`, `sell_price`, `availability`, `stocks`, `image`, `published_date`, `offer_percentage`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Amery Hampton-123', 'amery-hampton-123', '<h5 class=\"panel-title\" style=\"font-family: Inter, sans-serif; font-weight: 600; line-height: 1.53846; color: rgb(51, 51, 51); margin-top: 2px; margin-bottom: 2px; font-size: 14px;\">Short Description</h5>', '<h5 class=\"panel-title\" style=\"font-family: Inter, sans-serif; font-weight: 600; line-height: 1.53846; color: rgb(51, 51, 51); margin-top: 2px; margin-bottom: 2px; font-size: 14px;\">Long Description</h5>', 799.00, 285.00, 1, 21, '6335020230111104020.jpg', '1989-02-06', 85.00, '2023-01-11 05:10:19', '2023-01-12 11:23:04', NULL),
(2, 'Finn Griffin', 'Finn_Griffin', '<span style=\"font-family: arial, sans-serif; font-size: 14px;\"><font color=\"#000000\" style=\"\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</font></span>', '<span style=\"font-family: arial, sans-serif; font-size: 14px;\"><font color=\"#000000\" style=\"\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</font></span>', 586.00, 122.00, 1, 95, '9299120230111133944.png', '2023-01-12', 62.00, '2023-01-11 08:09:44', '2023-01-12 05:32:07', NULL),
(3, 'Charity Kelley', 'charity-kelley', 'Expedita doloremque .dad', 'Consectetur deserunt. sdsd', 942.00, 340.00, 1, 11, '5124320230112104612.png', '2020-07-10', 76.00, '2023-01-12 05:16:12', '2023-01-12 05:31:48', NULL),
(4, 'fridge new', 'fridge-new', 'fridge', 'fridge', 688.00, 155.00, 1, 75, '3038720230112105433.jpg', '2022-08-27', 11.00, '2023-01-12 05:24:33', '2023-01-12 05:31:29', NULL),
(5, 'grocery', 'grocery', 'grocery', 'grocery', 388.00, 509.00, 1, 60, '1470820230112105708.jpg', '1971-04-07', 35.00, '2023-01-12 05:27:08', '2023-01-12 05:31:25', NULL),
(6, 'headphone', 'headphone', 'Sit cumque ducimus, .headphone', 'Voluptatem. Dignissi.&nbsp;headphone', 285.00, 320.00, 0, 22, '1980820230112105832.jpg', '2021-03-02', 77.00, '2023-01-12 05:28:32', '2023-01-12 05:31:21', NULL),
(7, 'camera', 'camera', 'Dolore reprehenderit.camera', 'Ipsum eos, cillum co.&nbsp;camera', 302.00, 965.00, 1, 99, '3352420230112110022.jpg', '2015-10-13', 10.00, '2023-01-12 05:30:22', '2023-01-12 05:31:16', NULL),
(8, 'mobile', 'mobile', 'Consequatur excepteu.&nbsp;mobile', 'Quod enim vero sint .&nbsp;mobile', 142.00, 240.00, 0, 65, '2569520230112110437.jpg', '1995-10-09', 44.00, '2023-01-12 05:34:37', '2023-01-12 08:13:43', NULL),
(9, 'Asus 104 8 gb ram', 'asus-104-8-gb-ram', '<span style=\"font-family: arial, sans-serif; font-size: 14px;\"><font color=\"#000000\" style=\"\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</font></span>', '<span style=\"font-family: arial, sans-serif; font-size: 14px;\"><font color=\"#000000\"><b>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</b></font></span>', 584.00, 430.00, 0, 75, '9654620230112130352.jpg', '2007-07-19', 9.00, '2023-01-12 07:33:52', '2023-01-12 08:13:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `image_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2023-01-11 05:10:19', '2023-01-11 05:10:19'),
(2, 16, 1, '2023-01-11 05:10:20', '2023-01-11 05:10:20'),
(3, 17, 1, '2023-01-11 05:10:20', '2023-01-11 05:10:20'),
(4, 18, 2, '2023-01-11 08:09:44', '2023-01-11 08:09:44'),
(5, 19, 2, '2023-01-11 08:09:44', '2023-01-11 08:09:44'),
(6, 20, 2, '2023-01-11 08:09:44', '2023-01-11 08:09:44'),
(7, 21, 3, '2023-01-12 05:16:12', '2023-01-12 05:16:12'),
(8, 22, 4, '2023-01-12 05:24:33', '2023-01-12 05:24:33'),
(9, 23, 4, '2023-01-12 05:24:33', '2023-01-12 05:24:33'),
(10, 24, 5, '2023-01-12 05:27:08', '2023-01-12 05:27:08'),
(11, 25, 5, '2023-01-12 05:27:08', '2023-01-12 05:27:08'),
(12, 26, 6, '2023-01-12 05:28:32', '2023-01-12 05:28:32'),
(13, 27, 6, '2023-01-12 05:28:32', '2023-01-12 05:28:32'),
(14, 28, 7, '2023-01-12 05:30:22', '2023-01-12 05:30:22'),
(15, 29, 7, '2023-01-12 05:30:22', '2023-01-12 05:30:22'),
(16, 30, 8, '2023-01-12 05:34:37', '2023-01-12 05:34:37'),
(17, 31, 8, '2023-01-12 05:34:37', '2023-01-12 05:34:37'),
(18, 32, 9, '2023-01-12 07:33:52', '2023-01-12 07:33:52'),
(19, 33, 9, '2023-01-12 07:33:52', '2023-01-12 07:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promocode` varchar(30) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `expire_from` date NOT NULL,
  `expire_to` date NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` longtext DEFAULT NULL,
  `twitter` longtext DEFAULT NULL,
  `linkedin` longtext DEFAULT NULL,
  `instagram` longtext DEFAULT NULL,
  `youtube` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'https://www.cyxocabaxu.tv', 'https://www.fojinij.com', 'https://www.koqyrutoxot.cm', 'https://www.lyqydaf.cm', 'https://www.fatu.co', '2023-01-13 00:54:58', '2023-01-13 00:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` bigint(20) NOT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone_number`, `phone_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user 1', 'user1@gmail.com', '2023-01-13 07:29:23', 1234567891, '2023-01-13 07:27:14', NULL, NULL, '2023-01-13 07:27:14', '2023-01-13 07:27:14'),
(3, 'user 2', 'user2@gmail.com', '2023-01-12 18:30:00', 1234567892, '2023-01-13 07:27:14', NULL, NULL, '2023-01-12 07:27:14', '2023-01-12 07:27:14'),
(4, 'user 3', 'user3@gmail.com', '2023-01-10 18:30:00', 1234567893, '2023-01-13 07:27:14', NULL, NULL, '2023-01-11 07:27:14', '2023-01-11 07:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `type` enum('home','office','others') NOT NULL DEFAULT 'home',
  `default_address` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_email` varchar(255) DEFAULT NULL,
  `vendor_phone` bigint(20) DEFAULT NULL,
  `address_line1` text DEFAULT NULL,
  `address_line2` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `admin_action` enum('0','1') NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `vendor_email`, `vendor_phone`, `address_line1`, `address_line2`, `city`, `state`, `country`, `admin_action`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Vendor 1', 'vendor1@gmail.com', 98088138899, 'Kolkata Newtown', 'Kolkata Newtown', 'Kolkata', 'West Bengal', 'India', '1', NULL, '2023-01-14 10:51:49', '2023-01-14 07:25:28'),
(2, 'Vendor 2', 'vendor2@gmail.com', 98088138890, 'Kolkata Newtown', 'Kolkata Newtown', 'Kolkata', 'West Bengal', 'India', '0', NULL, '2023-01-14 10:51:49', '2023-01-14 10:51:49'),
(3, 'Colton Davenport', 'hijymaxid@mailinator.com', 1234567890, 'Vendor address line 1', 'Vendor address line 2', 'Maiores odit neque f', 'In voluptate ut quos', 'Molestiae voluptatum', '0', NULL, '2023-01-14 06:30:42', '2023-01-14 07:28:11'),
(4, 'Farrah Hood', 'gyjolacyse@mailinator.com', 9804805599, 'Est, explicabo. Veni.xcx', 'Ut sint enim sint re.czcxz', 'Deserunt vitae ipsa', 'Quam repellendus Re', 'Voluptas incidunt i', '1', NULL, '2023-01-14 06:32:13', '2023-01-14 06:32:13'),
(5, 'Cynthia Velazquez', 'kacuwiwy@mailinator.com', 123456789, 'Et ad maxime rem qui.45', 'Distinctio. Officia .454', 'Deleniti nihil dolor', 'Voluptas eius volupt', 'Totam et debitis quo', '1', '2023-01-14 06:41:46', '2023-01-14 06:36:48', '2023-01-14 06:41:46'),
(6, 'Sasha Clements', 'city@mailinator.com', 1234567890, 'Bootstrap Form Inputs', 'Bootstrap Form Inputs', 'Tenetur ipsum quis f', 'Itaque officia fugia', 'Non exercitation et', '1', NULL, '2023-01-14 07:27:23', '2023-01-14 07:27:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrators_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `customer_activities`
--
ALTER TABLE `customer_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordervendors`
--
ALTER TABLE `ordervendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

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
-- Indexes for table `prodcates`
--
ALTER TABLE `prodcates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_activities_user_id_foreign` (`user_id`),
  ADD KEY `users_activities_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_vendor_email_unique` (`vendor_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_activities`
--
ALTER TABLE `customer_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordervendors`
--
ALTER TABLE `ordervendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodcates`
--
ALTER TABLE `prodcates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD CONSTRAINT `users_activities_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `customer_activities` (`id`),
  ADD CONSTRAINT `users_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
