-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 06:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `location`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$rxjQttYpij2cc.EMLTeT6eqWq2LzVEwrW3vNMlb6ULBxjshTRjTmu', 'Admin', NULL, NULL, NULL, 'SJmA2SRtEc3TZF2gPwCjPgMBkq3JAgBuE8ES961BXMYRypR8hC0Ed4ggRmdg', '2023-08-23 09:19:21', '2023-08-23 09:19:21'),
(2, 'userr@user.com', '$2y$10$4N.3LTbYupcWTzB0HvecM.9vOEpAmZ95iS9YqI8bFNxSgV7YU77EK', 'Ogua Lamere', 'profile/ygBQnUUeoRbSUUd1SQDdOlgVrt3vX6lETkCJNLa9.jpg', 'Teshie', '02721850904', 'pKTW8JL6gmFbuCNQDVv1tzsgNOpubxy1ZSBLognsqzhxhwxQ4fuc3q73ldFX', '2023-08-23 18:54:45', '2023-08-23 18:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `uniqueid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimateddays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `uniqueid`, `user_id`, `car_id`, `driver_id`, `start`, `end`, `estimateddays`, `location`, `total`, `status`, `time`, `paid`, `created_at`, `updated_at`) VALUES
(1, '64e77735798a5', '1', '2', '1', '2023-08-04', '2023-08-24', '21', NULL, '200', '0', NULL, 'no', '2023-08-24 15:28:53', '2023-08-24 15:28:53'),
(2, '64e77f00b5386', '1', '2', '1', '2023-08-24', '2023-08-26', '3', NULL, '600', '0', NULL, 'no', '2023-08-24 16:02:08', '2023-08-24 16:02:08'),
(3, '64e77f36cd49d', '1', '2', '1', '2023-08-02', '2023-09-01', '31', NULL, '6200', '0', NULL, 'no', '2023-08-24 16:03:02', '2023-08-24 16:03:02'),
(4, '64e77f7c40ccd', '1', '2', '1', '2023-08-11', '2023-08-13', '3', NULL, '600', '5', NULL, 'no', '2023-08-24 16:04:12', '2023-08-25 12:41:02'),
(5, '64e7800006e3e', '1', '2', '1', '2023-08-16', '2023-09-09', '25', NULL, '5000', '0', NULL, 'no', '2023-08-24 16:06:24', '2023-08-24 16:06:24'),
(6, '64e8b26f63f5a', '2', '1', '1', '2023-08-28', '2023-08-31', '4', NULL, '1000', '1', NULL, 'no', '2023-08-25 13:53:51', '2023-08-25 13:53:51'),
(7, '653a8a494875c', '1', '4', '1', '2023-10-06', '2023-10-26', '21', NULL, '2100', '1', NULL, 'no', '2023-10-26 15:48:25', '2023-10-26 15:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `uniqueid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `myear` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fueltype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `uniqueid`, `avatar`, `brand`, `model`, `myear`, `color`, `platenum`, `capacity`, `fueltype`, `transmission`, `features`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, '64e5fac65e28a', 'images/carousel-1.png', 'Toyota', 'ER1334', '2023', 'black', 'GT126-33', '10', 'Gasoline', 'Automatic', 'gfy', '250', '1', '2023-08-23 12:26:39', '2023-08-24 15:59:59'),
(2, '64e749c9084da', 'images/carousel-2.png', 'Honda', 'CIVIC', '2000', 'black', 'GT126-33', '4', 'Diesel', 'Automatic', 'Gps, air conditioning, entertainment System', '200', '1', '2023-08-24 12:16:09', '2023-08-24 15:59:49'),
(3, '64ea0fb858ebd', 'images/car-rent-5.png', 'Ford', 'ER1337', '2019', 'black', 'GT126-33', '4', 'Diesel', 'Automatic', 'Gps, air conditioning, entertainment System', '300', '1', '2023-08-26 14:45:13', '2023-08-26 14:45:13'),
(4, '64ea1017170c0', 'images/car-rent-2.png', 'Toyota v4', 'ER1397', '2020', 'black', NULL, '4', 'Electric', 'Manual', 'Gps, air conditioning, entertainment System', '100', '1', '2023-08-26 14:46:23', '2023-08-26 14:46:23'),
(5, '64ea104023a51', 'images/car-rent-4.png', 'Honda', 'ER1734', '2029', 'black', 'GT126-33', '4', 'Petro', 'Automatic', 'Gps, air conditioning, entertainment System', '500', '1', '2023-08-26 14:46:57', '2023-08-26 14:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `driverreviews`
--

CREATE TABLE `driverreviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driverreviews`
--

INSERT INTO `driverreviews` (`id`, `user_id`, `driver_id`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '5', 'review review review review review review review review review review review review review review review review review review review review review review review review review review review', '2023-08-25 10:43:44', '2023-08-25 10:43:44'),
(2, '1', '1', '2', 'Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review', '2023-08-25 11:13:01', '2023-08-25 11:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `uniqueid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `uniqueid`, `avatar`, `name`, `location`, `idtype`, `idnumber`, `email`, `phone`, `license`, `experience`, `status`, `created_at`, `updated_at`) VALUES
(1, '64e635ceda812', 'images/team-1.jpg', 'Administrator', 'p  bx ts', 'Drivers License', '3434345354645', 'ogua@yahoo.com', '0222222222', NULL, '4', '1', '2023-08-23 16:38:17', '2023-08-23 16:43:16');

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
(3, '2016_01_04_173148_create_admin_tables', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_22_132104_create_cars_table', 1),
(7, '2023_08_22_133410_create_drivers_table', 1),
(8, '2023_08_22_133607_create_paystacks_table', 1),
(9, '2023_08_22_133738_create_paystacklogs_table', 1),
(10, '2023_08_22_133821_create_bookings_table', 1),
(11, '2023_08_23_024106_create_permission_tables', 1),
(12, '2023_08_25_101857_create_driverreviews_table', 2),
(13, '2023_08_25_111849_create_tripreviews_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paystacklogs`
--

CREATE TABLE `paystacklogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paystacks`
--

CREATE TABLE `paystacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `tid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tistatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uniqueid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urltype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reponse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feecharge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countrycode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerfirstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerothernames` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customeremail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logstarttime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logspenttime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logattempts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logerrors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paystacks`
--

INSERT INTO `paystacks` (`id`, `tid`, `tistatus`, `reference`, `uniqueid`, `paytype`, `urltype`, `user_id`, `driver_id`, `amount`, `message`, `reponse`, `paymentdate`, `channel`, `currency`, `ipaddress`, `feecharge`, `authcode`, `cardtype`, `bank`, `countrycode`, `brand`, `first4`, `last4`, `customerfirstname`, `customerothernames`, `customercode`, `customeremail`, `customerphone`, `logstarttime`, `logspenttime`, `logattempts`, `logerrors`, `car_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '3052247848', 'success', '0YaG7E28Sa47946682Rf', '64e7800006e3e', 'car-booking-pay', 'car-booking-pay', '1', 'Administrator', '5000', NULL, 'Approved', '2023-08-24T17:00:17.000Z', 'mobile_money', 'GHS', '41.215.169.10', '9750', 'AUTH_yvg6edp9k5', '', 'MTN', 'GH', 'Mtn', '055XXX', 'X987', 'Admin', 'Admin', 'CUS_c750842y5c91ap3', 'admin@admin.com', NULL, '', '', '', '', '2', '0', '2023-08-24 16:59:27', '2023-08-24 17:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2023-08-23 17:05:41', '2023-08-23 17:05:41'),
(2, 'User', 'admin', '2023-08-23 17:07:13', '2023-08-23 17:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tripreviews`
--

CREATE TABLE `tripreviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tripreviews`
--

INSERT INTO `tripreviews` (`id`, `user_id`, `car_id`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2', 'Rate Trip 1 - 10 Rate Trip 1 - 10 Rate Trip 1 - 10 Rate Trip 1 - 10 Rate Trip 1 - 10 Rate Trip 1 - 10Rate Trip 1 - 10', '2023-08-25 11:44:43', '2023-08-25 11:44:43'),
(2, '1', '2', '2', 'Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review', '2023-08-25 11:55:19', '2023-08-25 11:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driverreviews`
--
ALTER TABLE `driverreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `paystacklogs`
--
ALTER TABLE `paystacklogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paystacks`
--
ALTER TABLE `paystacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tripreviews`
--
ALTER TABLE `tripreviews`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `driverreviews`
--
ALTER TABLE `driverreviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `paystacklogs`
--
ALTER TABLE `paystacklogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paystacks`
--
ALTER TABLE `paystacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tripreviews`
--
ALTER TABLE `tripreviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
