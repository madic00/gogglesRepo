-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 11:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naocare`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(20) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_active`, `created_at`, `updated_at`) VALUES
(1, 'Ray-Ban', 1, NULL, NULL),
(2, 'Oakley', 1, NULL, NULL),
(3, 'Mario Rossi', 1, NULL, NULL),
(4, 'Gucci', 1, NULL, NULL),
(5, 'Mont Blanc', 1, NULL, NULL),
(6, 'O. Carrera', 0, NULL, '2021-03-13 20:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Eyeglasses', NULL, NULL),
(2, 'Sunglasses', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `alt`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'abazam2.jpg', NULL, 1, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(2, 'abazam3.jpg', NULL, 1, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(3, 'aidan2.jpg', NULL, 2, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(4, 'aidan3.jpg', NULL, 2, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(5, 'alloy2.jpg', NULL, 3, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(6, 'alloy3.jpg', NULL, 3, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(7, 'altar2.jpg', NULL, 4, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(8, 'altar3.jpg', NULL, 4, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(9, 'aron2.jpg', NULL, 5, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(10, 'aron3.jpg', NULL, 5, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(11, 'chenon2.jpg', NULL, 6, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(12, 'chenon3.jpg', NULL, 6, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(13, 'daydream2.jpg', NULL, 7, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(14, 'daydream3.jpg', NULL, 7, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(15, 'ethan2.jpg', NULL, 8, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(16, 'ethan3.jpg', NULL, 8, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(17, 'film2.jpg', NULL, 9, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(18, 'film3.jpg', NULL, 9, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(19, 'finn2.jpg', NULL, 10, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(20, 'finn3.jpg', NULL, 10, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(21, 'interception2.jpg', NULL, 11, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(22, 'interception3.jpg', NULL, 11, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(23, 'lisbon2.jpg', NULL, 12, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(24, 'lisbon3.jpg', NULL, 12, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(25, 'metaphor2.jpg', NULL, 13, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(26, 'metaphor3.jpg', NULL, 13, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(27, 'morrison2.jpg', NULL, 14, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(28, 'morrison3.jpg', NULL, 14, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(29, 'pacific2.jpg', NULL, 15, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(30, 'pacific3.jpg', NULL, 15, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(31, 'prism2.jpg', NULL, 16, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(32, 'prism3.jpg', NULL, 16, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(33, 'sebastian2.jpg', NULL, 17, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(34, 'sebastian3.jpg', NULL, 17, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(35, 'stmichel2.jpg', NULL, 18, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(36, 'stmichel3.jpg', NULL, 18, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(37, 'vinyl2.jpg', NULL, 19, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(38, 'vinyl3.jpg', NULL, 19, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(39, 'why2.jpg', NULL, 20, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(40, 'why3.jpg', NULL, 20, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(41, 'azur2.jpg', NULL, 21, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(42, 'azur3.jpg', NULL, 21, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(43, 'base2.jpg', NULL, 22, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(44, 'base3.jpg', NULL, 22, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(45, 'bloom2.jpg', NULL, 23, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(46, 'bloom3.jpg', NULL, 23, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(47, 'clematis2.jpg', NULL, 24, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(48, 'clematis3.jpg', NULL, 24, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(49, 'jasmine2.jpg', NULL, 25, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(50, 'jasmine3.jpg', NULL, 25, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(51, 'maggie2.jpg', NULL, 26, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(52, 'maggie3.jpg', NULL, 26, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(53, 'momentous2.jpg', NULL, 27, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(54, 'momentous3.jpg', NULL, 27, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(55, 'natural2.jpg', NULL, 28, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(56, 'natural3.jpg', NULL, 28, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(57, 'solace2.jpg', NULL, 29, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(58, 'solace3.jpg', NULL, 29, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(59, 'spark2.jpg', NULL, 30, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(60, 'spark3.jpg', NULL, 30, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(61, 'tongass2.jpg', NULL, 31, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(62, 'tongass3.jpg', NULL, 31, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(63, 'wilderness2.jpg', NULL, 32, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(64, 'wilderness3.jpg', NULL, 32, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(65, 'wonder2.jpg', NULL, 33, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(66, 'wonder3.jpg', NULL, 33, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(67, 'bauhaus2.jpg', NULL, 34, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(68, 'bauhaus3.jpg', NULL, 34, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(69, 'disclosure2.jpg', NULL, 35, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(70, 'disclosure3.jpg', NULL, 35, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(71, 'edge2.jpg', NULL, 36, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(72, 'edge3.jpg', NULL, 36, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(73, 'hanoi2.jpg', NULL, 37, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(74, 'hanoi3.jpg', NULL, 37, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(75, 'malibu2.jpg', NULL, 38, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(76, 'malibu3.jpg', NULL, 38, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(77, 'nevada2.jpg', NULL, 39, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(78, 'nevada3.jpg', NULL, 39, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(79, 'safari2.jpg', NULL, 40, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(80, 'safari3.jpg', NULL, 40, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(81, 'yard2.jpg', NULL, 41, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(82, 'yard3.jpg', NULL, 41, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(83, 'amore2.jpg', NULL, 42, '2021-03-12 05:49:41', '2021-03-12 05:49:41'),
(84, 'amore3.jpg', NULL, 42, '2021-03-12 05:49:41', '2021-03-12 05:49:41'),
(85, 'elle2.jpg', NULL, 43, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(86, 'elle3.jpg', NULL, 43, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(87, 'kiri2.jpg', NULL, 44, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(88, 'kiri3.jpg', NULL, 44, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(89, 'lauren2.jpg', NULL, 45, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(90, 'lauren3.jpg', NULL, 45, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(91, 'linger2.jpg', NULL, 46, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(92, 'linger3.jpg', NULL, 46, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(93, 'lulu2.jpg', NULL, 47, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(94, 'lulu3.jpg', NULL, 47, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(95, 'nostalgia2.jpg', NULL, 48, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(96, 'nostalgia3.jpg', NULL, 48, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(97, 'rollin2.jpg', NULL, 49, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(98, 'rollin3.jpg', NULL, 49, '2021-03-12 05:49:42', '2021-03-12 05:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `route`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 0, '2021-03-01 06:54:37', '2021-03-01 06:54:37'),
(2, 'About', 'about', 1, '2021-03-01 06:54:38', '2021-03-01 06:54:38'),
(3, 'Products', 'home.products', 2, '2021-03-01 06:54:38', '2021-03-01 06:54:38'),
(4, 'Contact', 'contact', 3, '2021-03-01 06:54:38', '2021-03-01 06:54:38'),
(5, 'Author', 'author', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_01_070413_create_products_table', 1),
(5, '2021_03_01_070623_create_prices_table', 1),
(7, '2021_03_01_073103_create_slider_images_table', 2),
(8, '2021_03_01_073715_create_menus_table', 3),
(9, '2021_03_01_091956_create_slider_images_table', 4),
(10, '2021_03_02_063105_create_roles_table', 5),
(11, '2021_03_03_055200_create_categories_table', 6),
(12, '2021_03_03_055400_create_brands_table', 6),
(13, '2021_03_03_072157_create_reviews_table', 7),
(14, '2021_03_03_173941_create_carts_table', 7),
(15, '2021_03_06_072425_create_orders_table', 8),
(16, '2021_03_06_074802_create_countries_table', 8),
(17, '2021_03_06_085949_create_order_infos_table', 9),
(19, '2021_03_08_104453_create_images_table', 10),
(20, '2021_03_11_061350_create_user_actions_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` int(11) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `is_paid` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `country`, `city`, `address`, `card_number`, `cvv`, `total_price`, `is_paid`, `created_at`, `updated_at`) VALUES
(3, 7, 'Mike Amiri', '+38251234567', 'Serbia', 'Belgrade', 'Carlija Caplina 12', '5678567856785678', 123, '386', 1, '2021-03-12 16:44:38', '2021-03-12 16:44:38'),
(4, 7, 'Mike Amiri', '+3816412345678', 'Serbia', 'Novi Sad', 'Kneza Milosa 324', '1890189018901890', 564, '275', 1, '2021-03-12 16:50:10', '2021-03-12 16:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_infos`
--

CREATE TABLE `order_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_infos`
--

INSERT INTO `order_infos` (`id`, `product_id`, `product_name`, `price`, `quantity`, `order_id`, `created_at`, `updated_at`) VALUES
(6, 1, 'Abazam', '268.00', 1, 3, '2021-03-12 16:44:38', '2021-03-12 16:44:38'),
(7, 10, 'Finn', '118.00', 1, 3, '2021-03-12 16:44:38', '2021-03-12 16:44:38'),
(8, 25, 'Jasmine', '210.00', 1, 4, '2021-03-12 16:50:10', '2021-03-12 16:50:10'),
(9, 36, 'Edge', '65.00', 1, 4, '2021-03-12 16:50:10', '2021-03-12 16:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires`) VALUES
(3, 'alemadic@gmail.com', '$2y$10$ZMsdJxxwPmHG3K7/Ob0B9OYhhmfG9OP/MlDKXU5PcYzpvaVeQhVbG', '1615641715'),
(4, 'elon@gmail.com', '$2y$10$yEpAXqJ6Xu8ro9RkFOH9ceju9qvo3D47KZGewefD8cI6Zjthr4VE6', '1615709979');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '268.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(2, 2, '198.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(3, 3, '525.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(4, 4, '215.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(5, 5, '370.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(6, 6, '535.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(7, 7, '406.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(8, 8, '91.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(9, 9, '75.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(10, 10, '118.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(11, 11, '336.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(12, 12, '403.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(13, 13, '575.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(14, 14, '592.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(15, 15, '453.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(16, 16, '463.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(17, 17, '181.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(18, 18, '554.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(19, 19, '87.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(20, 20, '128.00', '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(21, 21, '139.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(22, 22, '559.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(23, 23, '180.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(24, 24, '88.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(25, 25, '210.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(26, 26, '145.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(27, 27, '68.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(28, 28, '160.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(29, 29, '70.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(30, 30, '301.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(31, 31, '558.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(32, 32, '437.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(33, 33, '164.00', '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(34, 34, '118.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(35, 35, '417.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(36, 36, '65.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(37, 37, '354.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(38, 38, '265.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(39, 39, '107.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(40, 40, '170.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(41, 41, '508.00', '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(42, 42, '270.00', '2021-03-12 05:49:41', '2021-03-12 05:49:41'),
(43, 43, '286.00', '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(44, 44, '468.00', '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(45, 45, '521.00', '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(46, 46, '406.00', '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(47, 47, '544.00', '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(48, 48, '546.00', '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(49, 49, '97.00', '2021-03-12 05:49:42', '2021-03-12 05:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `category_id`, `featured`, `gender_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Abazam', 'abazam1.jpg', 'These wire framed, Gold finished eyeglasses simply ooze retro style. Its classic round lensed look will never go out of vogue, and its lightweight frame also comes with spring hinges for extra comfort. Get hold of these frames for a vintage look that will last the ages.', 1, 0, 1, 1, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(2, 'Aidan', 'aidan1.jpg', 'This understated, timeless design is perfect for any occasion. The acetate frame is comfortable and durable while the glossy black finish keeps them sleek and stylish. The rectangular lens shape adds a subtle touch of class to this popular design.', 1, 1, 1, 5, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(3, 'Alloy', 'alloy1.jpg', 'Alloy’s eye-catching eyewire surrounds geometric lenses for an unexpected edge. Vintage-inspired, yet distinctly modern, this striking two-tone frame features a gold face front and black arms — and an aluminum alloy construction for an easy-to-wear look. Complete with contrasting tortoise temple tips, and adjustable nose pads for a secure and custom fit', 1, 1, 1, 2, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(4, 'Altar', 'altar1.jpg', 'Perfectly octagonal, and perfectly on trend — Altar makes looking good look so easy. This geometric frame features gold eyewire and vibrant yellow temple tips for a bright and sunny style. Minimal details make for a streamlined frame, and adjustable nose pads allow you to customize the fit for all day wearability.Perfectly octagonal, and perfectly on trend — Altar makes looking good look so easy. This geometric frame features gold eyewire and vibrant yellow temple tips for a bright and sunny style. Minimal details make for a streamlined frame, and adjustable nose pads allow you to customize the fit for all day wearability.', 1, 0, 1, 3, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(5, 'Aron', 'aron1.jpg', 'These Black eyeglasses effortlessly intertwine utility and fashion. This titanium semi-rimless frame has a glossy Black finish throughout and exaggerated rectangular lenses. The temples feature an etched White geometric design and end in arms featuring stylish silver accents.', 1, 0, 1, 6, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(6, 'Chenon', 'chenon1.jpg', 'Expressive without making a scene, these black and gold contemporary frames raise the bar on everyday style. Delicate eyewire, a punctuated browline, and standout arms inlaid with onyx details make Phantos a memorable must-have. Adjustable nose pads and matching rubber temple tips add extra comfort (and style) for all-day wearability.', 1, 1, 1, 2, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(7, 'Day Dream', 'daydream1.jpg', 'Stand out from the crowd with Daydream. With a stylish full-rim frame and modern Yellow and Brown finish, these metal eyeglasses simply ooze sophistication. The delicate construction of this frame looks great and ensures that they are comfortable throughout the day.', 1, 0, 1, 5, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(8, 'Ethan', 'ethan1.jpg', 'You don’t have to be good at math to love these geometric frames. Ethan’s classic gold eyewire and slim arms stand out against the dark green details, featuring subtly painted rims with matching covered temple tips for a pop of color, and even more personality. Plus adjustable nose pads for a custom fit.', 1, 1, 1, 2, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(9, 'Film', 'film1.jpg', 'Streamline your look with Film, a minimally designed metal frame with a metallic silver finish. The oval lenses add to it’s classic charm, while the subtly embossed eyewire adds a little something extra to this simple style. Complete with tortoiseshell temple tips and adjustable nose pads for a secure and custom fit.', 1, 0, 1, 5, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(10, 'Finn', 'finn1.jpg', 'Looking for a classic frame with a little bit of flair? Finn brings the best of both worlds with always-on-trend square lenses, surrounded by boldly colored green acetate. You’ll be sure to make a statement wherever you go with these stand out specs, made with spring hinges for enhanced comfort and wearability.', 1, 0, 1, 1, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(11, 'Interception', 'interception1.jpg', 'Interception is a technical looking style with modern design elements. The semi-rimless face front shows off sleek rectangular lenses and a brown metal browline, while the acetate temples add intrigue as they fade from black to translucent blue. This style is complete with spring hinges for an extra comfortable fit.', 1, 0, 1, 3, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(12, 'Lisbon', 'lisbon1.jpg', 'Add some Iberian passion to your style with these trendy Lisbon eyeglasses. A bold design featuring broad, square, full-rim lenses will frame your face perfectly, Lisbon is made even more smolderingly stylish by its dark Tortoiseshell color, with its flecks of yellow and deep orange.', 1, 0, 1, 5, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(13, 'Metaphor', 'metaphor1.jpg', 'Square frames go with just about any style, but if you’re looking for something with an extra pop of color, opt for Metaphor in teal. This minimal frame boasts a bold face front with a deep jewel tone, with multi-dimensional details for a sculptural look. Complete with slim metal arms in with a silver finish.', 1, 0, 1, 5, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(14, 'Morrison', 'morrison1.jpg', 'Make room for Morrison, a slim aviator frame with big style. Featuring geometric eyewire with subtle angles, and a flat double brow for a decidedly retro vibe. The lustrous gold metal adds even more of a classic touch, while the tortoiseshell temple tips complete the look. With adjustable nose pads for a custom fit.', 1, 0, 1, 6, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(15, 'Pacific', 'pacific1.jpg', 'Dive right into this dark and mysterious frame, featuring stripes of blue throughout. The flecks of color are reminiscent of sun rays shining through ocean waves — a cool and eye catching element of this striking style. Pacific is a look made to last, complete with timeless rectangular lenses and double stud accents.', 1, 0, 1, 3, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(16, 'Prism', 'prism1.jpg', 'Refract your style with these prismatic charred tortoise eyeglasses. This contemporary frame is skillfully hand created from premium Italian acetate in a sumptuously sandy and earth toned tortoiseshell with high-end Italian hinges. A keyhole nose bridge and double stud accents add a classic touch to this seamlessly urban and streamlined design.', 1, 1, 1, 4, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(17, 'Sebastian', 'sebastian1.jpg', 'Say hello to Sebastian, a masculine style of frame cloaked in Tortoiseshell acetate. This classic style\'s unique gold temple arms are a testament to European men\'s fashion.', 1, 1, 1, 3, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(18, 'St Michel', 'stmichel1.jpg', 'These full-rim metal frames are currently hot fashion for women and men. The on-trend frame-shape of St. Michael S brings extra elegance with the tasteful Rose Gold finish. The lightweight materials give you extra comfort with adjustable nose pads, for an easy-to-wear comfortable fit.', 1, 1, 1, 6, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(19, 'Vinyl', 'vinyl1.jpg', 'Show off your unique style with Vinyl, a mixed material frame with a straightforward look. Featuring a full-rim face front constructed of translucent acetate, with textured metal arms in rose gold. These modern specs will make sure you’re looking your best, no matter what you decide to pair them with.', 1, 1, 1, 2, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(20, 'Why', 'why1.jpg', 'Upgrade your usual eyewear with Why, an angular pair of specs with classic rectangular lenses and a flat browline. Made from plastic with a technical aesthetic, this modern frame features a smoky gray hue and bright green temple details — perfect for adding an athletic look to your everyday wear.', 1, 0, 1, 3, '2021-03-10 06:40:05', '2021-03-10 06:40:05'),
(21, 'Azur', 'azur1.jpg', 'Add a pop of color to your look with Azur. These bright specs feature a mixed material construction of engraved acetate and metal, with a bold aqua face front and slim silver details throughout. Pair this multi-dimensional style with your everyday wear for a fun and playful addition to your wardrobe.', 1, 0, 0, 4, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(22, 'Base', 'base1.jpg', 'Don\'t be fooled by the serious look of these solid and sophisticated black frames. They boast playful lines and a classic Ray-Ban profile, resulting in glasses that are fresh but welcomingly familiar. This expertly-designed eyewear works hard, plays hard, and adds a solid dose of style to your everyday look.', 1, 1, 0, 5, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(23, 'Bloom', 'bloom1.jpg', 'Love the look of vintage frames, but prefer an eco-friendly option? Bloom features that retro square shape, but is crafted with modern bio-acetate — a biodegradable material made from a renewable source. These frames are part of our premium in-house eyewear brand, RFLKT, and are made complete with their spunky shade of translucent purple.', 1, 1, 0, 4, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(24, 'Clematis', 'clematis1.jpg', 'Clematis is a bold square frame with a retro flair, featuring a mixed material construction of acetate and metal. The ombre face front fades from black to clear, with temple tips to match and metal arms for contrast. Plus spring hinges for comfort, and a low bridge fit with larger nose pads to minimize sliding.', 1, 1, 0, 2, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(25, 'Jasmine', 'jasmine1.jpg', 'Translucent frames are a trend that’s here to stay, and Jasmine makes that clear. Featuring a modern metal accent for a truly unique look — the horn face front is met with gold cylinders at the hinges, adding just the right amount of flair to these minimalist specs. With spring hinges for a comfortable fit.', 1, 0, 0, 6, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(26, 'Maggie', 'maggie1.jpg', 'Slim rectangular frames are the name of the style game, but we call this pair Maggie. The delicate metal eyewire is contrasted by it’s bold burgundy color, and made even more intriguing by the intricate temple details for a distinct look. Designed with adjustable nose pads for a custom fit.', 1, 1, 0, 3, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(27, 'Momentous', 'momentous1.jpg', 'Momentous is a style that was made to make a statement — featuring a classic horn shape and a mixed material construction of acetate and metal. The translucent face front boasts a bold pink finish with carved details, while the slim silver accents on the nose bridge, eyewire, and arms complete the look.', 1, 0, 0, 4, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(28, 'Natural', 'natural1.jpg', 'Natural is an all-new square frame made with a modern construction of bio-acetate — a biodegradable material made from a renewable source — so you can feel as good as you look when wearing your specs! Shown in translucent blue for a style as clear as the sky on a cloudless day.', 1, 0, 0, 5, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(29, 'Solace', 'solace1.jpg', 'Solace features classic oval lenses surrounded by a plastic face front. The deep red finish adds a bold touch, but the slim silhouette adds balance and makes for a mostly subtle look. This style is designed with slightly curved temples for comfort, and adjustable nose pads for a secure and custom fit.', 1, 1, 0, 5, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(30, 'Spark', 'spark1.jpg', 'Add a little love to your look with Spark, a rimless heart-shaped frame with slim metal details. If you look closely, you’ll notice the glittery red accents in the hinges, temples, and nose bridge. This style is complete with adjustable nose pads for a customized fit that’s true to you.', 1, 0, 0, 4, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(31, 'Tongass', 'tongass1.jpg', 'Go for a natural look with Tongass. This mixed material frame features a recycled acetate face front with rectangular lenses, complete with wooden arms — a striking duo, especially in the monochromatic combination of red and red wood. With a keyhole nose bridge and molded nose pads for a comfortable fit.', 1, 1, 0, 1, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(32, 'Wilderness', 'wilderness1.jpg', 'Wilderness pairs a bookish look with the great outdoors, featuring a wooden browline atop classic round lenses surrounded by gold eyewire. This unique face front is met with recycled acetate in black for a sleek and studious style. Complete with spring hinges for comfort and adjustable nose pads for a custom fit.', 1, 0, 0, 3, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(33, 'Wonder', 'wonder1.jpg', 'Feast your eyes on the spectacles we call Wonder. This lovely frame features a two-tone acetate construction and a classic horn shape. The clear purple face front shows off a cat-eye flair with engraved details, and is made complete by the translucent pink arms. Designed with spring hinges for an extra comfortable fit.', 1, 0, 0, 1, '2021-03-12 05:37:53', '2021-03-12 05:37:53'),
(34, 'Bauhaus', 'bauhaus1.jpg', 'Bauhaus in black has never been bolder. This aviator-inspired frame is made from sturdy acetate, featuring a shape that shows off strong angles and a double brow bar worthy of a double take. The sturdy arms support these stately shades for a look that’s ready to be in the spotlight.', 2, 1, 1, 3, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(35, 'Disclosure', 'disclosure1.jpg', 'Classic, glamorous, and everything in between — disclosure is a vintage-inspired metal frame, with round lenses surrounded by lustrous gold eyewire for a timeless look. This retro frame is complete with distinct details like a subtly engraved nose bridge and temples. Designed adjustable nose for a secure and custom fit.', 2, 0, 1, 6, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(36, 'Edge', 'edge1.jpg', 'Ultra light, yet extremely masculine, these rectangular shades are just the Edge you\'ve been looking for, and some. Featuring a lightweight bronze-colored frame, slim metal nose bridge, sleek metal arms, and adjustable nose pads that add all-day comfort to this already exceedingly wearable look. See the tortoiseshell temple tips for extra style points.', 2, 0, 1, 6, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(37, 'Hanoi', 'hanoi1.jpg', 'These black sunglasses are atmospheric and vibrant. This classic trapezoid frame comes in a glossy black acetate finish for that signature look. Single stud accents and bold temples create a stylish sturdy fashion accessory that complements any and all adventures.', 2, 1, 1, 6, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(38, 'Malibu', 'malibu1.jpg', 'Transcend all-American cool with these black sunglasses. This classic trapezoid-shaped frame comes in a matte black acetate finish throughout with bold lines. A keyhole nose bridge adds a distinguishing detail to this monochromatic look, making this ultimate accessory versatile for the beach and beyond', 2, 1, 1, 1, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(39, 'Nevada', 'nevada1.jpg', 'These timeless square sunglasses are the perfect accessory to bring along on all of your adventures — featuring a full-rim acetate construction and a full-coverage design. Nevada’s translucent gray face front makes for a versatile style that will pair well with any wardrobe. Complete with double stud rivets for a classic look.', 2, 1, 1, 3, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(40, 'Safari', 'safari1.jpg', 'Safari embodies the spirit of discovery. This Tortoiseshell frame\'s unique keyhole nosebridge and bold square lenses break the status-quo of modern sunwear trends.', 2, 0, 1, 5, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(41, 'Yard', 'yard1.jpg', 'If you’re looking for a frame that keeps up, Yard is your look. These functional sunglasses feature a sturdy plastic construction and a semi-rimless design for an active lifestyle. With a matte black finish, bright green details, and adjustable nose pads for a secure and custom fit. Shown with blue mirrored lenses.', 2, 1, 1, 4, '2021-03-12 05:45:01', '2021-03-12 05:45:01'),
(42, 'Amore', 'amore1.jpg', 'You’ll be ready for fun in the sun with stunning Sun Amore in Black. With heart-shaped rimless lenses, these sunnies give you maximum visibility and maximum cool. With adjustable nose pads for the perfect fit, what’s not to love?', 2, 1, 0, 1, '2021-03-12 05:49:41', '2021-03-12 05:49:41'),
(43, 'Elle', 'elle1.jpg', 'If glamorous had a picture in the dictionary, it would show Elle. Perfectly oversized, but never over-the-top, these timeless tortoiseshell sunnies make you wanna say “ooo-la-la.” Oval in shape, and slightly elongated in the top corners for an almost cat-eye style that’s full of charm and always ready for the camera.', 2, 0, 0, 5, '2021-03-12 05:49:41', '2021-03-12 05:49:41'),
(44, 'Kiri', 'kiri1.jpg', 'Face the world with eyes wide-open. Kiri\'s round lenses, metal nose bridge, and classic Black finish make it an urban hit you don\'t want to miss.', 2, 1, 0, 5, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(45, 'Lauren', 'lauren1.jpg', 'Add some vintage flair to your style with these tortoise sunglasses. This oval shaped frame features a glossy semi-transparent tortoiseshell frame front reminiscent of old Hollywood glamour. Gold metal temples add a modern twist to a classic that channels Audrey and Jackie O, while acetate arm tips means you won.', 2, 1, 0, 6, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(46, 'Linger', 'linger1.jpg', 'With a feline look that will leave you feeling fine, Linger??s jet black rimless cat eye sunglasses are the perfect fit for ladies with an eye for style. Upscale and luxe, with spring hinges, adjustable nose pads, and tortoise temple tips, you??ll be wanting to wear these beauties into the night.', 2, 0, 0, 1, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(47, 'Lulu', 'lulu1.jpg', 'Show off your retro style with these black eyeglasses. The perfect combination of metal and plastic, this frame features a glossy black plastic frame front and arm tips paired with silver metal temples and nose bridge. Oval shaped lenses complete the look.', 2, 1, 0, 2, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(48, 'Nostalgia', 'nostalgia1.jpg', 'The future is bright for these nostalgic caramel eyeglasses. This preppy frame is hand made from premium acetate in a glamorous semi-transparent marbled honey finish and fused with high-end Italian hinges. A detailed metal nose bridge and double stud accents add a preppy panache to this dazzling Tokyo-inspired look that glorifies your fusing passions for traditional culture and everything new.', 2, 1, 0, 4, '2021-03-12 05:49:42', '2021-03-12 05:49:42'),
(49, 'Rollin', 'rollin1.jpg', 'Aspiring rock stars and accomplished beach bums alike will find themselves rockin\' and Rollin\' in these iconic round sunglasses. The fun, funky tortoise rims dish up a little unexpected flavor, while the slick metal hardware keep things classic.', 2, 0, 0, 3, '2021-03-12 05:49:42', '2021-03-12 05:49:42');

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_view`
-- (See below for the actual view)
--
-- CREATE TABLE `products_view` (
-- `id` int(20)
-- ,`name` varchar(255)
-- ,`image` varchar(255)
-- ,`description` text
-- ,`category_id` int(11)
-- ,`featured` tinyint(4)
-- ,`gender_id` int(11)
-- ,`brand_id` int(11)
-- ,`created_at` timestamp
-- ,`updated_at` timestamp
-- ,`brand_name` varchar(255)
-- ,`brand_active` tinyint(4)
-- ,`category_name` varchar(255)
-- ,`price` decimal(10,2)
-- );

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(20) NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subheading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image`, `alt`, `heading`, `subheading`, `gender_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'banner1.jpg', NULL, 'Men\'s eyewear', 'Cool summer sale 50% off', '1', 1, '2021-03-01 08:30:16', '2021-03-01 08:30:16'),
(2, 'banner2.jpg', NULL, 'Women\'s eyewear', 'Want to Look Your Best?', '0', 1, '2021-03-01 08:30:16', '2021-03-01 08:30:16'),
(3, 'banner3.jpg', NULL, 'Men\'s eyewear', 'Cool summer sale 50% off', '1', 1, '2021-03-01 08:30:16', '2021-03-01 08:30:16'),
(4, 'banner4.jpg', NULL, 'Women\'s eyewear', 'Want to Look Your Best?', '0', 1, '2021-03-01 08:30:16', '2021-03-01 08:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ale', 'Madic', 'alemadic@gmail.com', NULL, '32250170a0dca92d53ec9624f336ca24', 2, NULL, '2021-03-11 07:01:03', '2021-03-13 11:28:17'),
(3, 'Adm', 'Admin', 'admin@goggles.com', NULL, '32250170a0dca92d53ec9624f336ca24', 1, NULL, '2021-03-11 21:38:52', '2021-03-11 21:38:52'),
(4, 'Blake', 'Smith', 'blake@gmail.com', NULL, '32250170a0dca92d53ec9624f336ca24', 2, NULL, '2021-03-12 05:58:32', '2021-03-12 05:58:32'),
(5, 'James', 'Dean', 'james@gmail.com', NULL, '32250170a0dca92d53ec9624f336ca24', 2, NULL, '2021-03-12 05:59:03', '2021-03-12 05:59:03'),
(6, 'John', 'Sendler', 'john@gmail.com', NULL, '32250170a0dca92d53ec9624f336ca24', 2, NULL, '2021-03-12 05:59:24', '2021-03-12 05:59:24'),
(7, 'Mike', 'Amiri', 'mike@gmail.com', NULL, '32250170a0dca92d53ec9624f336ca24', 2, NULL, '2021-03-12 05:59:54', '2021-03-12 05:59:54'),
(8, 'Elon', 'Musk', 'elon@gmail.com', NULL, '1dc0aff5d289a77f78b2b9e68352948b', 2, NULL, '2021-03-12 06:00:20', '2021-03-14 06:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_actions`
--

CREATE TABLE `user_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`id`, `action`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Log out', 3, '2021-03-12 06:59:29', '2021-03-12 06:59:29'),
(2, 'Login', 3, '2021-03-12 07:00:01', '2021-03-12 07:00:01'),
(3, 'Log out', 3, '2021-03-12 09:02:14', '2021-03-12 09:02:14'),
(4, 'Login', 5, '2021-03-12 09:03:33', '2021-03-12 09:03:33'),
(5, 'Added to cart', 5, '2021-03-12 09:11:12', '2021-03-12 09:11:12'),
(6, 'Added to cart', 5, '2021-03-12 09:12:07', '2021-03-12 09:12:07'),
(7, 'Added to cart', 5, '2021-03-12 09:12:20', '2021-03-12 09:12:20'),
(8, 'Added to cart', 5, '2021-03-12 09:13:16', '2021-03-12 09:13:16'),
(9, 'Added to cart', 5, '2021-03-12 09:24:31', '2021-03-12 09:24:31'),
(10, 'Changed quantity', 5, '2021-03-12 10:38:28', '2021-03-12 10:38:28'),
(11, 'Changed quantity', 5, '2021-03-12 10:41:15', '2021-03-12 10:41:15'),
(12, 'Changed quantity', 5, '2021-03-12 12:16:39', '2021-03-12 12:16:39'),
(13, 'Changed quantity', 5, '2021-03-12 12:16:53', '2021-03-12 12:16:53'),
(14, 'Changed quantity', 5, '2021-03-12 12:23:03', '2021-03-12 12:23:03'),
(15, 'Changed quantity', 5, '2021-03-12 12:25:51', '2021-03-12 12:25:51'),
(16, 'Changed quantity', 5, '2021-03-12 12:27:15', '2021-03-12 12:27:15'),
(17, 'Changed quantity', 5, '2021-03-12 12:27:18', '2021-03-12 12:27:18'),
(18, 'Order completed!', 5, '2021-03-12 14:28:24', '2021-03-12 14:28:24'),
(19, 'Log out', 5, '2021-03-12 14:30:13', '2021-03-12 14:30:13'),
(20, 'Login', 6, '2021-03-12 14:32:39', '2021-03-12 14:32:39'),
(21, 'Added to cart', 6, '2021-03-12 14:32:49', '2021-03-12 14:32:49'),
(22, 'Added to cart', 6, '2021-03-12 14:32:55', '2021-03-12 14:32:55'),
(23, 'Changed quantity', 6, '2021-03-12 14:35:42', '2021-03-12 14:35:42'),
(24, 'Removed to cart', 6, '2021-03-12 14:41:16', '2021-03-12 14:41:16'),
(25, 'Removed to cart', 6, '2021-03-12 14:41:20', '2021-03-12 14:41:20'),
(26, 'Added to cart', 6, '2021-03-12 14:49:44', '2021-03-12 14:49:44'),
(27, 'Added to cart', 6, '2021-03-12 14:49:52', '2021-03-12 14:49:52'),
(28, 'Removed to cart', 6, '2021-03-12 14:50:20', '2021-03-12 14:50:20'),
(29, 'Changed quantity', 6, '2021-03-12 14:50:27', '2021-03-12 14:50:27'),
(30, 'Changed quantity', 6, '2021-03-12 14:51:04', '2021-03-12 14:51:04'),
(31, 'Changed quantity', 6, '2021-03-12 14:52:55', '2021-03-12 14:52:55'),
(34, 'Removed to cart', 6, '2021-03-12 15:14:18', '2021-03-12 15:14:18'),
(35, 'Log out', 6, '2021-03-12 15:33:40', '2021-03-12 15:33:40'),
(36, 'Login', 3, '2021-03-12 16:11:55', '2021-03-12 16:11:55'),
(37, 'Login', 7, '2021-03-12 16:41:26', '2021-03-12 16:41:26'),
(38, 'Added to cart', 7, '2021-03-12 16:41:37', '2021-03-12 16:41:37'),
(39, 'Added to cart', 7, '2021-03-12 16:41:43', '2021-03-12 16:41:43'),
(40, 'Order completed!', 7, '2021-03-12 16:44:38', '2021-03-12 16:44:38'),
(41, 'Added to cart', 7, '2021-03-12 16:49:17', '2021-03-12 16:49:17'),
(42, 'Added to cart', 7, '2021-03-12 16:49:22', '2021-03-12 16:49:22'),
(43, 'Order completed!', 7, '2021-03-12 16:50:10', '2021-03-12 16:50:10'),
(44, 'Login', 3, '2021-03-13 06:13:10', '2021-03-13 06:13:10'),
(45, 'Log out', 3, '2021-03-13 07:01:24', '2021-03-13 07:01:24'),
(46, 'Login', 2, '2021-03-13 09:18:04', '2021-03-13 09:18:04'),
(47, 'Log out', 2, '2021-03-13 09:18:14', '2021-03-13 09:18:14'),
(48, 'Login', 2, '2021-03-13 09:19:03', '2021-03-13 09:19:03'),
(49, 'Log out', 2, '2021-03-13 10:40:15', '2021-03-13 10:40:15'),
(50, 'Login', 2, '2021-03-13 11:59:41', '2021-03-13 11:59:41'),
(51, 'Log out', 2, '2021-03-13 12:25:00', '2021-03-13 12:25:00'),
(52, 'Login', 3, '2021-03-13 14:26:39', '2021-03-13 14:26:39'),
(53, 'Log out', 3, '2021-03-13 14:34:26', '2021-03-13 14:34:26'),
(54, 'Login', 3, '2021-03-13 19:14:43', '2021-03-13 19:14:43'),
(55, 'Log out', 3, '2021-03-13 19:24:39', '2021-03-13 19:24:39'),
(56, 'Login', 2, '2021-03-13 19:25:15', '2021-03-13 19:25:15'),
(57, 'Log out', 2, '2021-03-13 19:26:09', '2021-03-13 19:26:09'),
(58, 'Login', 3, '2021-03-13 19:26:31', '2021-03-13 19:26:31'),
(59, 'Login', 3, '2021-03-14 05:09:30', '2021-03-14 05:09:30'),
(60, 'Log out', 3, '2021-03-14 05:53:06', '2021-03-14 05:53:06'),
(61, 'Login', 3, '2021-03-14 06:21:16', '2021-03-14 06:21:16');

-- --------------------------------------------------------

--
-- Structure for view `products_view`
--
-- DROP TABLE IF EXISTS `products_view`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_view`  AS SELECT `p`.`id` AS `id`, `p`.`name` AS `name`, `p`.`image` AS `image`, `p`.`description` AS `description`, `p`.`category_id` AS `category_id`, `p`.`featured` AS `featured`, `p`.`gender_id` AS `gender_id`, `p`.`brand_id` AS `brand_id`, `p`.`created_at` AS `created_at`, `p`.`updated_at` AS `updated_at`, `b`.`brand_name` AS `brand_name`, `b`.`brand_active` AS `brand_active`, `c`.`category_name` AS `category_name`, (select `prices`.`price` from `prices` where `prices`.`product_id` = `p`.`id` order by `prices`.`created_at` desc limit 1) AS `price` FROM ((`products` `p` join `brands` `b` on(`p`.`brand_id` = `b`.`id`)) join `categories` `c` on(`p`.`category_id` = `c`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_infos`
--
ALTER TABLE `order_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_infos`
--
ALTER TABLE `order_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_actions`
--
ALTER TABLE `user_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_infos`
--
ALTER TABLE `order_infos`
  ADD CONSTRAINT `order_infos_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_infos_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD CONSTRAINT `user_actions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
