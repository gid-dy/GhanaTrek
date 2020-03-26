-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 12:01 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghanatrek`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `AccommodationName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `AccommodationName`, `Package_id`, `created_at`, `updated_at`) VALUES
(1, 'Miland hotel', 1, '2020-03-25 04:12:11', '2020-03-25 04:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$JUlrA5.3Hc/o8P4FQw.haesNfpkRHtyX8fzeFdHDFV/W0mtpDjsCq', 1, '2020-03-25 20:53:27', '2020-03-26 00:41:00'),
(2, 'admin', '12345678', 1, '2020-03-26 00:00:00', '2020-03-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `BannerMedia` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MediaType` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Title` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BannerStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `Coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TourInclude_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Cart_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Package_id` bigint(20) UNSIGNED NOT NULL,
  `PackageName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PackageCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourTypeName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Travellers` int(11) NOT NULL,
  `PackagePrice` decimal(20,2) NOT NULL,
  `TransportName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `Package_id`, `PackageName`, `PackageCode`, `TourTypeName`, `Travellers`, `PackagePrice`, `TransportName`, `UserEmail`, `Session_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kakum Park', 'KP001-I', 'Individual', 1, '20.00', 'Bus', '', 'zI1TxWcdlCzE6ku9X7PHPoGZGLvVLGE12PYEyNKS', NULL, NULL),
(2, 1, 'Kakum Park', 'KP001-I', 'Individual', 1, '20.00', 'Bus', '', 'H7TNUmKMl0C9GQgPZoVZnnm8Xj8EpJA5LwZ3cM5o', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(2, 'AL', 'Albania', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(3, 'DZ', 'Algeria', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(4, 'DS', 'American Samoa', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(5, 'AD', 'Andorra', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(6, 'AO', 'Angola', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(7, 'AI', 'Anguilla', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(8, 'AQ', 'Antarctica', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(9, 'AG', 'Antigua and Barbuda', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(10, 'AR', 'Argentina', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(11, 'AM', 'Armenia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(12, 'AW', 'Aruba', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(13, 'AU', 'Australia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(14, 'AT', 'Austria', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(15, 'AZ', 'Azerbaijan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(16, 'BS', 'Bahamas', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(17, 'BH', 'Bahrain', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(18, 'BD', 'Bangladesh', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(19, 'BB', 'Barbados', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(20, 'BY', 'Belarus', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(21, 'BE', 'Belgium', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(22, 'BZ', 'Belize', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(23, 'BJ', 'Benin', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(24, 'BM', 'Bermuda', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(25, 'BT', 'Bhutan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(26, 'BO', 'Bolivia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(27, 'BA', 'Bosnia and Herzegovina', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(28, 'BW', 'Botswana', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(29, 'BV', 'Bouvet Island', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(30, 'BR', 'Brazil', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(31, 'IO', 'British Indian Ocean Territory', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(32, 'BN', 'Brunei Darussalam', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(33, 'BG', 'Bulgaria', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(34, 'BF', 'Burkina Faso', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(35, 'BI', 'Burundi', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(36, 'KH', 'Cambodia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(37, 'CM', 'Cameroon', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(38, 'CA', 'Canada', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(39, 'CV', 'Cape Verde', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(40, 'KY', 'Cayman Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(41, 'CF', 'Central African Republic', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(42, 'TD', 'Chad', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(43, 'CL', 'Chile', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(44, 'CN', 'China', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(45, 'CX', 'Christmas Island', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(46, 'CC', 'Cocos (Keeling) Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(47, 'CO', 'Colombia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(48, 'KM', 'Comoros', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(49, 'CD', 'Democratic Republic of the Congo', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(50, 'CG', 'Republic of Congo', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(51, 'CK', 'Cook Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(52, 'CR', 'Costa Rica', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(53, 'HR', 'Croatia (Hrvatska)', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(54, 'CU', 'Cuba', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(55, 'CY', 'Cyprus', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(56, 'CZ', 'Czech Republic', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(57, 'DK', 'Denmark', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(58, 'DJ', 'Djibouti', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(59, 'DM', 'Dominica', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(60, 'DO', 'Dominican Republic', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(61, 'TP', 'East Timor', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(62, 'EC', 'Ecuador', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(63, 'EG', 'Egypt', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(64, 'SV', 'El Salvador', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(65, 'GQ', 'Equatorial Guinea', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(66, 'ER', 'Eritrea', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(67, 'EE', 'Estonia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(68, 'ET', 'Ethiopia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(69, 'FK', 'Falkland Islands (Malvinas)', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(70, 'FO', 'Faroe Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(71, 'FJ', 'Fiji', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(72, 'FI', 'Finland', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(73, 'FR', 'France', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(74, 'FX', 'France, Metropolitan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(75, 'GF', 'French Guiana', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(76, 'PF', 'French Polynesia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(77, 'TF', 'French Southern Territories', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(78, 'GA', 'Gabon', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(79, 'GM', 'Gambia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(80, 'GE', 'Georgia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(81, 'DE', 'Germany', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(82, 'GH', 'Ghana', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(83, 'GI', 'Gibraltar', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(84, 'GK', 'Guernsey', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(85, 'GR', 'Greece', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(86, 'GL', 'Greenland', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(87, 'GD', 'Grenada', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(88, 'GP', 'Guadeloupe', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(89, 'GU', 'Guam', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(90, 'GT', 'Guatemala', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(91, 'GN', 'Guinea', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(92, 'GW', 'Guinea-Bissau', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(93, 'GY', 'Guyana', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(94, 'HT', 'Haiti', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(95, 'HM', 'Heard and Mc Donald Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(96, 'HN', 'Honduras', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(97, 'HK', 'Hong Kong', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(98, 'HU', 'Hungary', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(99, 'IS', 'Iceland', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(100, 'IN', 'India', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(101, 'IM', 'Isle of Man', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(102, 'ID', 'Indonesia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(103, 'IR', 'Iran (Islamic Republic of)', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(104, 'IQ', 'Iraq', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(105, 'IE', 'Ireland', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(106, 'IL', 'Israel', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(107, 'IT', 'Italy', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(108, 'CI', 'Ivory Coast', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(109, 'JE', 'Jersey', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(110, 'JM', 'Jamaica', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(111, 'JP', 'Japan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(112, 'JO', 'Jordan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(113, 'KZ', 'Kazakhstan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(114, 'KE', 'Kenya', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(115, 'KI', 'Kiribati', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(117, 'KR', 'Korea, Republic of', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(118, 'XK', 'Kosovo', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(119, 'KW', 'Kuwait', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(120, 'KG', 'Kyrgyzstan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(121, 'LA', 'Lao People\'s Democratic Republic', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(122, 'LV', 'Latvia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(123, 'LB', 'Lebanon', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(124, 'LS', 'Lesotho', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(125, 'LR', 'Liberia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(126, 'LY', 'Libyan Arab Jamahiriya', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(127, 'LI', 'Liechtenstein', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(128, 'LT', 'Lithuania', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(129, 'LU', 'Luxembourg', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(130, 'MO', 'Macau', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(131, 'MK', 'North Macedonia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(132, 'MG', 'Madagascar', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(133, 'MW', 'Malawi', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(134, 'MY', 'Malaysia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(135, 'MV', 'Maldives', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(136, 'ML', 'Mali', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(137, 'MT', 'Malta', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(138, 'MH', 'Marshall Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(139, 'MQ', 'Martinique', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(140, 'MR', 'Mauritania', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(141, 'MU', 'Mauritius', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(142, 'TY', 'Mayotte', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(143, 'MX', 'Mexico', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(144, 'FM', 'Micronesia, Federated States of', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(145, 'MD', 'Moldova, Republic of', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(146, 'MC', 'Monaco', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(147, 'MN', 'Mongolia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(148, 'ME', 'Montenegro', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(149, 'MS', 'Montserrat', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(150, 'MA', 'Morocco', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(151, 'MZ', 'Mozambique', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(152, 'MM', 'Myanmar', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(153, 'NA', 'Namibia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(154, 'NR', 'Nauru', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(155, 'NP', 'Nepal', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(156, 'NL', 'Netherlands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(157, 'AN', 'Netherlands Antilles', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(158, 'NC', 'New Caledonia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(159, 'NZ', 'New Zealand', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(160, 'NI', 'Nicaragua', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(161, 'NE', 'Niger', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(162, 'NG', 'Nigeria', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(163, 'NU', 'Niue', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(164, 'NF', 'Norfolk Island', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(165, 'MP', 'Northern Mariana Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(166, 'NO', 'Norway', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(167, 'OM', 'Oman', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(168, 'PK', 'Pakistan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(169, 'PW', 'Palau', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(170, 'PS', 'Palestine', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(171, 'PA', 'Panama', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(172, 'PG', 'Papua New Guinea', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(173, 'PY', 'Paraguay', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(174, 'PE', 'Peru', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(175, 'PH', 'Philippines', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(176, 'PN', 'Pitcairn', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(177, 'PL', 'Poland', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(178, 'PT', 'Portugal', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(179, 'PR', 'Puerto Rico', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(180, 'QA', 'Qatar', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(181, 'RE', 'Reunion', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(182, 'RO', 'Romania', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(183, 'RU', 'Russian Federation', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(184, 'RW', 'Rwanda', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(185, 'KN', 'Saint Kitts and Nevis', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(186, 'LC', 'Saint Lucia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(187, 'VC', 'Saint Vincent and the Grenadines', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(188, 'WS', 'Samoa', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(189, 'SM', 'San Marino', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(190, 'ST', 'Sao Tome and Principe', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(191, 'SA', 'Saudi Arabia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(192, 'SN', 'Senegal', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(193, 'RS', 'Serbia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(194, 'SC', 'Seychelles', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(195, 'SL', 'Sierra Leone', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(196, 'SG', 'Singapore', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(197, 'SK', 'Slovakia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(198, 'SI', 'Slovenia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(199, 'SB', 'Solomon Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(200, 'SO', 'Somalia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(201, 'ZA', 'South Africa', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(202, 'GS', 'South Georgia South Sandwich Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(203, 'SS', 'South Sudan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(204, 'ES', 'Spain', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(205, 'LK', 'Sri Lanka', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(206, 'SH', 'St. Helena', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(207, 'PM', 'St. Pierre and Miquelon', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(208, 'SD', 'Sudan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(209, 'SR', 'Suriname', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(211, 'SZ', 'Swaziland', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(212, 'SE', 'Sweden', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(213, 'CH', 'Switzerland', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(214, 'SY', 'Syrian Arab Republic', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(215, 'TW', 'Taiwan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(216, 'TJ', 'Tajikistan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(217, 'TZ', 'Tanzania, United Republic of', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(218, 'TH', 'Thailand', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(219, 'TG', 'Togo', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(220, 'TK', 'Tokelau', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(221, 'TO', 'Tonga', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(222, 'TT', 'Trinidad and Tobago', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(223, 'TN', 'Tunisia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(224, 'TR', 'Turkey', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(225, 'TM', 'Turkmenistan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(226, 'TC', 'Turks and Caicos Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(227, 'TV', 'Tuvalu', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(228, 'UG', 'Uganda', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(229, 'UA', 'Ukraine', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(230, 'AE', 'United Arab Emirates', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(231, 'GB', 'United Kingdom', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(232, 'US', 'United States', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(233, 'UM', 'United States minor outlying islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(234, 'UY', 'Uruguay', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(235, 'UZ', 'Uzbekistan', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(236, 'VU', 'Vanuatu', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(237, 'VA', 'Vatican City State', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(238, 'VE', 'Venezuela', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(239, 'VN', 'Vietnam', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(240, 'VG', 'Virgin Islands (British)', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(241, 'VI', 'Virgin Islands (U.S.)', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(242, 'WF', 'Wallis and Futuna Islands', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(243, 'EH', 'Western Sahara', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(244, 'YE', 'Yemen', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(245, 'ZM', 'Zambia', '2020-03-26 02:27:21', '2020-03-26 02:28:16'),
(246, 'ZW', 'Zimbabwe', '2020-03-26 02:27:21', '2020-03-26 02:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CouponCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(20,2) DEFAULT NULL,
  `AmountType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExpiryDate` date NOT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `CouponCode`, `Amount`, `AmountType`, `ExpiryDate`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'test1', '10.00', 'Percentage', '2020-03-25', '1', '2020-03-25 04:56:13', '2020-03-25 04:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CurrencyCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExchangeRate` double DEFAULT NULL,
  `CurrencyPreviousExchangeRate` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EnquiryEmail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Message` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Message` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(1) NOT NULL,
  `Booking_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_02_10_144626_create_refundpenalties_table', 1),
(4, '2020_02_10_144626_create_tourincludes_table', 1),
(5, '2020_02_10_144626_create_tourlocations_table', 1),
(6, '2020_02_10_144626_create_tourpackagecategories_table', 1),
(7, '2020_02_10_144626_create_tourpackageincludes_table', 1),
(8, '2020_02_10_144626_create_tourpackages_table', 1),
(9, '2020_02_10_144626_create_toursites_table', 1),
(10, '2020_02_10_144626_create_tourtransportations_table', 1),
(11, '2020_02_10_144626_create_tourtypes_table', 1),
(12, '2020_02_10_144626_create_transactioninfos_table', 1),
(13, '2020_02_10_144626_create_userpaymentcards_table', 1),
(14, '2020_02_14_142446_create_users_table', 1),
(15, '2020_02_14_142951_create_userroles_table', 1),
(16, '2020_02_15_185120_create_accommodations_table', 1),
(17, '2020_02_15_185544_create_banners_table', 1),
(18, '2020_02_15_185738_create_bookings_table', 1),
(20, '2020_02_15_190237_create_coupons_table', 1),
(21, '2020_02_15_190358_create_enquiries_table', 1),
(22, '2020_02_15_190507_create_feedbacks_table', 1),
(23, '2020_02_15_190642_create_mobilemoneys_table', 1),
(24, '2020_02_15_190851_create_newslettersubscribers_table', 1),
(25, '2020_02_15_191014_create_packageimages_table', 1),
(26, '2020_02_15_191129_create_payinginfos_table', 1),
(27, '2020_02_15_191324_create_paymentapiinfos_table', 1),
(28, '2020_02_15_191441_create_paymentdeliverycosts_table', 1),
(29, '2020_02_15_191610_create_paymentinfos_table', 1),
(30, '2020_02_15_191830_create_paymentproviders_table', 1),
(31, '2020_02_15_192103_create_paymenttypes_table', 1),
(32, '2020_02_15_192242_create_refundinfos_table', 1),
(33, '2020_02_15_192523_create_refundpayings_table', 1),
(34, '2020_02_15_203022_create_currencies_table', 1),
(35, '2020_02_15_212908_create_paymenttaxations_table', 1),
(36, '2020_02_19_150748_create_countries_table', 1),
(37, '2020_03_19_011613_add__address_to_users', 1),
(38, '2020_03_19_012322_add__city_to_users', 1),
(39, '2020_03_19_012408_add__state_to_users', 1),
(40, '2020_03_19_012454_add__other_contact_to_users', 1),
(41, '2020_03_20_105233_add__country_users', 1),
(42, '2020_03_22_222119_create_travel_addresses_table', 1),
(43, '2020_02_10_144633_add_foreign_keys_to_feedbacks_table', 2),
(44, '2020_02_10_144633_add_foreign_keys_to_mobilemoneys_table', 2),
(45, '2020_02_10_144633_add_foreign_keys_to_packageimages_table', 2),
(46, '2020_02_10_144633_add_foreign_keys_to_payinginfos_table', 2),
(47, '2020_02_10_144633_add_foreign_keys_to_paymentdeliverycosts_table', 2),
(48, '2020_02_10_144633_add_foreign_keys_to_paymentinfos_table', 2),
(49, '2020_02_10_144633_add_foreign_keys_to_paymenttypes_table', 2),
(50, '2020_02_10_144633_add_foreign_keys_to_refundinfos_table', 2),
(51, '2020_02_10_144633_add_foreign_keys_to_refundpayings_table', 2),
(52, '2020_02_10_144633_add_foreign_keys_to_tourpackageincludes_table', 2),
(53, '2020_02_10_144633_add_foreign_keys_to_toursites_table', 2),
(54, '2020_02_10_144633_add_foreign_keys_to_transactioninfos_table', 2),
(55, '2020_02_10_144633_add_foreign_keys_to_userpaymentcards_table', 2),
(56, '2020_02_10_144633_add_foreign_keys_to_users_table', 2),
(57, '2020_02_15_190020_create_carts_table', 3),
(61, '2020_03_25_204828_create_admins_table', 4),
(63, '2020_03_26_003933_add__status_to_admins', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mobilemoneys`
--

CREATE TABLE `mobilemoneys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Currency` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExternalID` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `AccNumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newslettersubscribers`
--

CREATE TABLE `newslettersubscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packageimages`
--

CREATE TABLE `packageimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Image` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PackageImageName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packageimages`
--

INSERT INTO `packageimages` (`id`, `Image`, `PackageImageName`, `Package_id`, `created_at`, `updated_at`) VALUES
(1, '440982.jpg', NULL, 1, '2020-03-25 04:26:32', '2020-03-25 04:26:32'),
(2, '769749.jpg', NULL, 1, '2020-03-25 04:26:32', '2020-03-25 04:26:32'),
(3, '49736.jpg', NULL, 1, '2020-03-25 04:26:32', '2020-03-25 04:26:32');

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
-- Table structure for table `payinginfos`
--

CREATE TABLE `payinginfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PaymentToken` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PayemntOrderCode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentQRCode` blob DEFAULT NULL,
  `TransactionCode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TotalCost` decimal(20,2) DEFAULT NULL,
  `PaymentStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentInfo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentapiinfos`
--

CREATE TABLE `paymentapiinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `APIVersion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `APIName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntegrationMode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MerchantEMail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MerchantAPIKey` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `APIServiceType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentdeliverycosts`
--

CREATE TABLE `paymentdeliverycosts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `DeliveryCostName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeliveryCost` decimal(20,2) NOT NULL,
  `PaymentProvider_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfos`
--

CREATE TABLE `paymentinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UPIUserPaymentDetails_id` bigint(20) UNSIGNED NOT NULL,
  `UPIUserPaymentMethod` bigint(20) UNSIGNED NOT NULL,
  `Booking_id` bigint(20) UNSIGNED NOT NULL,
  `Tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `PTy_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentproviders`
--

CREATE TABLE `paymentproviders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PaymentType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentTypeProvider` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymenttaxations`
--

CREATE TABLE `paymenttaxations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TaxName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TaxAmount` decimal(20,2) NOT NULL,
  `TaxAmountType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymenttypes`
--

CREATE TABLE `paymenttypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PTyPaymentTypeName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentProvider_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refundinfos`
--

CREATE TABLE `refundinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RefundAmount` decimal(20,2) DEFAULT NULL,
  `Booking_id` bigint(20) UNSIGNED NOT NULL,
  `RefundPenalty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `RefundCreated` bigint(20) UNSIGNED NOT NULL,
  `RefundModifed` bigint(20) UNSIGNED DEFAULT NULL,
  `PaymentDeliveryCost_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refundpayings`
--

CREATE TABLE `refundpayings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PayingInfo_id` bigint(20) UNSIGNED NOT NULL,
  `RefundInfo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refundpenalties`
--

CREATE TABLE `refundpenalties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PenaltyName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenaltyCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenaltyDesc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PenaltyAmount` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_admins`
--

CREATE TABLE `table_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourincludes`
--

CREATE TABLE `tourincludes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `IncludeName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourIncludeInfo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TourExcludeName` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourincludes`
--

INSERT INTO `tourincludes` (`id`, `IncludeName`, `TourIncludeInfo`, `TourExcludeName`, `Package_id`, `created_at`, `updated_at`) VALUES
(1, 'Hotel availability', NULL, NULL, 1, '2020-03-25 04:11:38', '2020-03-25 04:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `tourlocations`
--

CREATE TABLE `tourlocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LocationName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Weather` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GhanaPostAddress` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherAddress` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourpackagecategories`
--

CREATE TABLE `tourpackagecategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CategoryName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CategoryDescription` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CategoryStatus` tinyint(1) DEFAULT NULL,
  `Imageaddress` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourpackagecategories`
--

INSERT INTO `tourpackagecategories` (`id`, `CategoryName`, `CategoryDescription`, `CategoryStatus`, `Imageaddress`, `created_at`, `updated_at`) VALUES
(1, 'Ecotourism', 'All wildlife', 1, '728455.jpg', '2020-03-25 03:50:34', '2020-03-25 03:50:34'),
(2, 'Castle and Forts', 'Ancient castles', 1, '276910.jpg', '2020-03-25 03:51:25', '2020-03-25 03:51:25'),
(3, 'Traditional tour', 'traditional tour', 1, '378065.jpg', '2020-03-25 03:56:34', '2020-03-25 03:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `tourpackageincludes`
--

CREATE TABLE `tourpackageincludes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TourInclude_id` bigint(20) UNSIGNED NOT NULL,
  `Package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourpackages`
--

CREATE TABLE `tourpackages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PackageName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PackageCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackagePrice` decimal(20,2) NOT NULL,
  `Imageaddress` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourpackages`
--

INSERT INTO `tourpackages` (`id`, `PackageName`, `PackageCode`, `Description`, `PackagePrice`, `Imageaddress`, `Status`, `Category_id`, `created_at`, `updated_at`) VALUES
(1, 'Kakum Park', 'KP001', 'Canopy walkway', '20.00', '31292.jpg', 1, 1, '2020-03-25 03:57:40', '2020-03-25 04:29:34'),
(2, 'Fiema Monkey Sanctuary', 'FMS001', 'Lively monkey', '20.00', '889753.jpg', 1, 1, '2020-03-25 03:58:50', '2020-03-25 03:58:50'),
(3, 'Tafi Monkey Sanctuary', 'TMS001', 'sensitive monkeys', '20.00', '139975.jpg', 1, 1, '2020-03-25 04:00:02', '2020-03-25 04:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `toursites`
--

CREATE TABLE `toursites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TourSiteName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourSiteDesc` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Location_id` bigint(20) UNSIGNED NOT NULL,
  `Package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourtransportations`
--

CREATE TABLE `tourtransportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TransportName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransportCost` decimal(20,2) NOT NULL,
  `Package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourtransportations`
--

INSERT INTO `tourtransportations` (`id`, `TransportName`, `TransportCost`, `Package_id`, `created_at`, `updated_at`) VALUES
(1, 'Bus', '20.00', 1, '2020-03-25 04:10:58', '2020-03-25 04:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `tourtypes`
--

CREATE TABLE `tourtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TourTypeName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourTypeSize` bigint(20) NOT NULL,
  `SKU` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackagePrice` decimal(20,2) NOT NULL,
  `Package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourtypes`
--

INSERT INTO `tourtypes` (`id`, `TourTypeName`, `TourTypeSize`, `SKU`, `PackagePrice`, `Package_id`, `created_at`, `updated_at`) VALUES
(1, 'Individual', 1, 'KP001-I', '20.00', 1, '2020-03-25 04:09:49', '2020-03-25 04:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `transactioninfos`
--

CREATE TABLE `transactioninfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TransactionCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransactionStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PayingInfo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_addresses`
--

CREATE TABLE `travel_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `SurName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherNames` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherContact` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `State` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userpaymentcards`
--

CREATE TABLE `userpaymentcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NameOnCard` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CardNumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `CVV` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UserRoleName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserRoleLevel` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `UserRoleName`, `UserRoleLevel`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1', '2020-03-24 07:00:00', '2020-03-24 07:00:00'),
(2, 'user', '2', '2020-03-24 07:00:00', '2020-03-24 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `SurName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherNames` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `State` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherContact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserRole_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `SurName`, `UserEmail`, `OtherNames`, `Mobile`, `Country`, `Address`, `City`, `State`, `OtherContact`, `UserRole_id`, `Password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '0000000000', NULL, NULL, NULL, NULL, NULL, 1, '$2y$10$CxfpceUXwosPozTHnuWhVOqI3xddaIvwaVx7BcOSY7atIwj.59eBG', NULL, '2020-03-25 03:18:17', '2020-03-25 03:18:17'),
(2, 'user', 'test@mail.com', 'test', '0000000000', NULL, NULL, NULL, NULL, NULL, 2, '$2y$10$dJCZE6Zx8WiZ207Q5j8hAu99QhsPbmkIPxeUam/P1aPCPpak2nlxu', NULL, '2020-03-25 03:19:20', '2020-03-25 03:19:20'),
(3, 'test', 'm@gmail.com', 'testss', '0000000000', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$6KIDJ9j2D0/uUEK31S7UoO2Wv1FCUL.h2/ODOPnD8DuWYzf2s3t5u', NULL, '2020-03-25 21:40:03', '2020-03-25 21:40:03'),
(4, 'testament', 'man@gmail.com', 'testy', '0000000000', NULL, NULL, NULL, NULL, NULL, 2, '$2y$10$NfqjuiV3YLc80BheRbBvY.Vm0Fv7NbiVJyr2HqfbJpiZrFgh5.uXi', NULL, '2020-03-26 01:49:15', '2020-03-26 01:49:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourPackages54` (`Package_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourPackages5` (`Package_id`),
  ADD KEY `RefTourPackages51` (`PackageName`),
  ADD KEY `RefTourPackages21` (`PackageCode`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CouponCode` (`CouponCode`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CurrencyCode` (`CurrencyCode`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefBookings36` (`Booking_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobilemoneys`
--
ALTER TABLE `mobilemoneys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefUsers55` (`User_id`);

--
-- Indexes for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packageimages`
--
ALTER TABLE `packageimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourPackages3` (`Package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payinginfos`
--
ALTER TABLE `payinginfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefPaymentInfo44` (`PaymentInfo_id`);

--
-- Indexes for table `paymentapiinfos`
--
ALTER TABLE `paymentapiinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentdeliverycosts`
--
ALTER TABLE `paymentdeliverycosts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefPaymentProvider41` (`PaymentProvider_id`);

--
-- Indexes for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefBookings38` (`Booking_id`),
  ADD KEY `RefPaymentTaxation42` (`Tax_id`),
  ADD KEY `RefPaymentType63` (`PTy_id`);

--
-- Indexes for table `paymentproviders`
--
ALTER TABLE `paymentproviders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenttaxations`
--
ALTER TABLE `paymenttaxations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `TaxName` (`TaxName`);

--
-- Indexes for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefPaymentProvider61` (`PaymentProvider_id`);

--
-- Indexes for table `refundinfos`
--
ALTER TABLE `refundinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefBookings24` (`Booking_id`),
  ADD KEY `RefRefundPenalty25` (`RefundPenalty_id`),
  ADD KEY `RefundCreated` (`RefundCreated`),
  ADD KEY `RefundModified` (`RefundModifed`),
  ADD KEY `RefPaymentDeliveryCost62` (`PaymentDeliveryCost_id`);

--
-- Indexes for table `refundpayings`
--
ALTER TABLE `refundpayings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefPayingInfo64` (`PayingInfo_id`),
  ADD KEY `RefRefundInfo65` (`RefundInfo_id`);

--
-- Indexes for table `refundpenalties`
--
ALTER TABLE `refundpenalties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PenaltyCode` (`PenaltyCode`);

--
-- Indexes for table `table_admins`
--
ALTER TABLE `table_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourincludes`
--
ALTER TABLE `tourincludes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourPackages4` (`Package_id`);

--
-- Indexes for table `tourlocations`
--
ALTER TABLE `tourlocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourPackages11` (`Package_id`);

--
-- Indexes for table `tourpackagecategories`
--
ALTER TABLE `tourpackagecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourpackageincludes`
--
ALTER TABLE `tourpackageincludes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourIncludes28` (`TourInclude_id`),
  ADD KEY `RefTourPackages29` (`Package_id`);

--
-- Indexes for table `tourpackages`
--
ALTER TABLE `tourpackages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PackageCode` (`PackageCode`),
  ADD KEY `RefTourPackageCategories4` (`Category_id`);

--
-- Indexes for table `toursites`
--
ALTER TABLE `toursites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourLocation18` (`Location_id`),
  ADD KEY `RefTourPackages37` (`Package_id`);

--
-- Indexes for table `tourtransportations`
--
ALTER TABLE `tourtransportations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourPackages20` (`Package_id`);

--
-- Indexes for table `tourtypes`
--
ALTER TABLE `tourtypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefTourPackages28` (`Package_id`);

--
-- Indexes for table `transactioninfos`
--
ALTER TABLE `transactioninfos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `TransactionCode` (`TransactionCode`),
  ADD KEY `RefPayingInfo49` (`PayingInfo_id`);

--
-- Indexes for table `travel_addresses`
--
ALTER TABLE `travel_addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`);

--
-- Indexes for table `userpaymentcards`
--
ALTER TABLE `userpaymentcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RefUsers56` (`User_id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserRoleName` (`UserRoleName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`),
  ADD KEY `RefUserRole47` (`UserRole_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `mobilemoneys`
--
ALTER TABLE `mobilemoneys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packageimages`
--
ALTER TABLE `packageimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payinginfos`
--
ALTER TABLE `payinginfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentapiinfos`
--
ALTER TABLE `paymentapiinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentdeliverycosts`
--
ALTER TABLE `paymentdeliverycosts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentproviders`
--
ALTER TABLE `paymentproviders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenttaxations`
--
ALTER TABLE `paymenttaxations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refundinfos`
--
ALTER TABLE `refundinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refundpayings`
--
ALTER TABLE `refundpayings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refundpenalties`
--
ALTER TABLE `refundpenalties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_admins`
--
ALTER TABLE `table_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourincludes`
--
ALTER TABLE `tourincludes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tourlocations`
--
ALTER TABLE `tourlocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourpackagecategories`
--
ALTER TABLE `tourpackagecategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourpackageincludes`
--
ALTER TABLE `tourpackageincludes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourpackages`
--
ALTER TABLE `tourpackages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toursites`
--
ALTER TABLE `toursites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourtransportations`
--
ALTER TABLE `tourtransportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tourtypes`
--
ALTER TABLE `tourtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactioninfos`
--
ALTER TABLE `transactioninfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel_addresses`
--
ALTER TABLE `travel_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userpaymentcards`
--
ALTER TABLE `userpaymentcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `RefBookings36` FOREIGN KEY (`Booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `mobilemoneys`
--
ALTER TABLE `mobilemoneys`
  ADD CONSTRAINT `RefUsers55` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `packageimages`
--
ALTER TABLE `packageimages`
  ADD CONSTRAINT `RefTourPackages3` FOREIGN KEY (`Package_id`) REFERENCES `tourpackages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payinginfos`
--
ALTER TABLE `payinginfos`
  ADD CONSTRAINT `RefPaymentInfo44` FOREIGN KEY (`PaymentInfo_id`) REFERENCES `paymentinfos` (`id`);

--
-- Constraints for table `paymentdeliverycosts`
--
ALTER TABLE `paymentdeliverycosts`
  ADD CONSTRAINT `RefPaymentProvider41` FOREIGN KEY (`PaymentProvider_id`) REFERENCES `paymentproviders` (`id`);

--
-- Constraints for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  ADD CONSTRAINT `RefBookings38` FOREIGN KEY (`Booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `RefPaymentTaxation42` FOREIGN KEY (`Tax_id`) REFERENCES `paymenttaxations` (`id`),
  ADD CONSTRAINT `RefPaymentType63` FOREIGN KEY (`PTy_id`) REFERENCES `paymenttypes` (`id`);

--
-- Constraints for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD CONSTRAINT `RefPaymentProvider61` FOREIGN KEY (`PaymentProvider_id`) REFERENCES `paymentproviders` (`id`);

--
-- Constraints for table `refundinfos`
--
ALTER TABLE `refundinfos`
  ADD CONSTRAINT `RefBookings24` FOREIGN KEY (`Booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `RefPaymentDeliveryCost62` FOREIGN KEY (`PaymentDeliveryCost_id`) REFERENCES `paymentdeliverycosts` (`id`),
  ADD CONSTRAINT `RefRefundPenalty25` FOREIGN KEY (`RefundPenalty_id`) REFERENCES `refundpenalties` (`id`),
  ADD CONSTRAINT `RefundCreated` FOREIGN KEY (`RefundCreated`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `RefundModified` FOREIGN KEY (`RefundModifed`) REFERENCES `users` (`id`);

--
-- Constraints for table `refundpayings`
--
ALTER TABLE `refundpayings`
  ADD CONSTRAINT `RefPayingInfo64` FOREIGN KEY (`PayingInfo_id`) REFERENCES `payinginfos` (`id`),
  ADD CONSTRAINT `RefRefundInfo65` FOREIGN KEY (`RefundInfo_id`) REFERENCES `refundinfos` (`id`);

--
-- Constraints for table `tourpackageincludes`
--
ALTER TABLE `tourpackageincludes`
  ADD CONSTRAINT `RefTourIncludes28` FOREIGN KEY (`TourInclude_id`) REFERENCES `tourincludes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefTourPackages29` FOREIGN KEY (`Package_id`) REFERENCES `tourpackages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toursites`
--
ALTER TABLE `toursites`
  ADD CONSTRAINT `RefTourLocation18` FOREIGN KEY (`Location_id`) REFERENCES `tourlocations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefTourPackages37` FOREIGN KEY (`Package_id`) REFERENCES `tourpackages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transactioninfos`
--
ALTER TABLE `transactioninfos`
  ADD CONSTRAINT `RefPayingInfo49` FOREIGN KEY (`PayingInfo_id`) REFERENCES `payinginfos` (`id`);

--
-- Constraints for table `userpaymentcards`
--
ALTER TABLE `userpaymentcards`
  ADD CONSTRAINT `RefUsers56` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `RefUserRole47` FOREIGN KEY (`UserRole_id`) REFERENCES `userroles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
