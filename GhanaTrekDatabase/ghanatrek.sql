-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 11:48 PM
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
  `AccommodationID` bigint(20) UNSIGNED NOT NULL,
  `AccommodationName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AccommodationType` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackageId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`AccommodationID`, `AccommodationName`, `AccommodationType`, `PackageId`, `created_at`, `updated_at`) VALUES
(1, 'Elmina hotel', 'Exclusive', 1, '2020-02-26 12:32:09', '2020-02-26 12:32:09'),
(3, 'Golden Tulip', '5 star', 1, '2020-02-28 21:54:03', '2020-02-28 21:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherNames` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `FirstName`, `OtherNames`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'gideon@gmail.com', '$2y$10$mDrXnImd3JUqt2NjjGQ9F.dYwrtHoRp84w/LoyJYPwmLqZQRnpvMq', NULL, '2020-02-19 15:14:43', '2020-02-19 15:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `BannerId` bigint(20) UNSIGNED NOT NULL,
  `BannerMedia` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MediaType` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Title` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BannerStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BannerDesc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `BookingId` bigint(20) UNSIGNED NOT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BookingDateTimeCreated` datetime DEFAULT NULL,
  `BookingDateTimeModified` datetime DEFAULT NULL,
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `CouponId` bigint(20) UNSIGNED DEFAULT NULL,
  `TourIncludeID` bigint(20) UNSIGNED DEFAULT NULL,
  `CartId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartId` bigint(20) UNSIGNED NOT NULL,
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `PackageName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PackageCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourTypeName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Travellers` int(11) NOT NULL,
  `PackagePrice` decimal(20,2) NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sessionId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CartId`, `PackageId`, `PackageName`, `PackageCode`, `TourTypeName`, `Travellers`, `PackagePrice`, `UserEmail`, `sessionId`, `created_at`, `updated_at`) VALUES
(1, 3, 'Cape Coast Castle', 'CCC001', 'Organisation', 20, '700.00', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryId` bigint(20) UNSIGNED NOT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_decimals` bigint(20) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_3166_2` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `iso_3166_3` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sub_region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `eea` tinyint(1) NOT NULL DEFAULT 0,
  `calling_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryId`, `capital`, `citizenship`, `country_code`, `currency`, `currency_code`, `currency_sub_unit`, `currency_symbol`, `currency_decimals`, `full_name`, `iso_3166_2`, `iso_3166_3`, `name`, `region_code`, `sub_region_code`, `eea`, `calling_code`, `flag`) VALUES
(4, 'Kabul', 'Afghan', '004', 'afghani', 'AFN', 'pul', '؋', 2, 'Islamic Republic of Afghanistan', 'AF', 'AFG', 'Afghanistan', '142', '034', 0, '93', 'AF.png'),
(8, 'Tirana', 'Albanian', '008', 'lek', 'ALL', '(qindar (pl. qindarka))', 'Lek', 2, 'Republic of Albania', 'AL', 'ALB', 'Albania', '150', '039', 0, '355', 'AL.png'),
(10, 'Antartica', 'of Antartica', '010', '', '', '', '', 2, 'Antarctica', 'AQ', 'ATA', 'Antarctica', '', '', 0, '672', 'AQ.png'),
(12, 'Algiers', 'Algerian', '012', 'Algerian dinar', 'DZD', 'centime', 'DZD', 2, 'People’s Democratic Republic of Algeria', 'DZ', 'DZA', 'Algeria', '002', '015', 0, '213', 'DZ.png'),
(16, 'Pago Pago', 'American Samoan', '016', 'US dollar', 'USD', 'cent', '$', 2, 'Territory of American', 'AS', 'ASM', 'American Samoa', '009', '061', 0, '1', 'AS.png'),
(20, 'Andorra la Vella', 'Andorran', '020', 'euro', 'EUR', 'cent', '€', 2, 'Principality of Andorra', 'AD', 'AND', 'Andorra', '150', '039', 0, '376', 'AD.png'),
(24, 'Luanda', 'Angolan', '024', 'kwanza', 'AOA', 'cêntimo', 'Kz', 2, 'Republic of Angola', 'AO', 'AGO', 'Angola', '002', '017', 0, '244', 'AO.png'),
(28, 'St John’s', 'of Antigua and Barbuda', '028', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Antigua and Barbuda', 'AG', 'ATG', 'Antigua and Barbuda', '019', '029', 0, '1', 'AG.png'),
(31, 'Baku', 'Azerbaijani', '031', 'Azerbaijani manat', 'AZN', 'kepik (inv.)', 'ман', 2, 'Republic of Azerbaijan', 'AZ', 'AZE', 'Azerbaijan', '142', '145', 0, '994', 'AZ.png'),
(32, 'Buenos Aires', 'Argentinian', '032', 'Argentine peso', 'ARS', 'centavo', '$', 2, 'Argentine Republic', 'AR', 'ARG', 'Argentina', '019', '005', 0, '54', 'AR.png'),
(36, 'Canberra', 'Australian', '036', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Commonwealth of Australia', 'AU', 'AUS', 'Australia', '009', '053', 0, '61', 'AU.png'),
(40, 'Vienna', 'Austrian', '040', 'euro', 'EUR', 'cent', '€', 2, 'Republic of Austria', 'AT', 'AUT', 'Austria', '150', '155', 1, '43', 'AT.png'),
(44, 'Nassau', 'Bahamian', '044', 'Bahamian dollar', 'BSD', 'cent', '$', 2, 'Commonwealth of the Bahamas', 'BS', 'BHS', 'Bahamas', '019', '029', 0, '1', 'BS.png'),
(48, 'Manama', 'Bahraini', '048', 'Bahraini dinar', 'BHD', 'fils (inv.)', 'BHD', 3, 'Kingdom of Bahrain', 'BH', 'BHR', 'Bahrain', '142', '145', 0, '973', 'BH.png'),
(50, 'Dhaka', 'Bangladeshi', '050', 'taka (inv.)', 'BDT', 'poisha (inv.)', 'BDT', 2, 'People’s Republic of Bangladesh', 'BD', 'BGD', 'Bangladesh', '142', '034', 0, '880', 'BD.png'),
(51, 'Yerevan', 'Armenian', '051', 'dram (inv.)', 'AMD', 'luma', 'AMD', 2, 'Republic of Armenia', 'AM', 'ARM', 'Armenia', '142', '145', 0, '374', 'AM.png'),
(52, 'Bridgetown', 'Barbadian', '052', 'Barbados dollar', 'BBD', 'cent', '$', 2, 'Barbados', 'BB', 'BRB', 'Barbados', '019', '029', 0, '1', 'BB.png'),
(56, 'Brussels', 'Belgian', '056', 'euro', 'EUR', 'cent', '€', 2, 'Kingdom of Belgium', 'BE', 'BEL', 'Belgium', '150', '155', 1, '32', 'BE.png'),
(60, 'Hamilton', 'Bermudian', '060', 'Bermuda dollar', 'BMD', 'cent', '$', 2, 'Bermuda', 'BM', 'BMU', 'Bermuda', '019', '021', 0, '1', 'BM.png'),
(64, 'Thimphu', 'Bhutanese', '064', 'ngultrum (inv.)', 'BTN', 'chhetrum (inv.)', 'BTN', 2, 'Kingdom of Bhutan', 'BT', 'BTN', 'Bhutan', '142', '034', 0, '975', 'BT.png'),
(68, 'Sucre (BO1)', 'Bolivian', '068', 'boliviano', 'BOB', 'centavo', '$b', 2, 'Plurinational State of Bolivia', 'BO', 'BOL', 'Bolivia, Plurinational State of', '019', '005', 0, '591', 'BO.png'),
(70, 'Sarajevo', 'of Bosnia and Herzegovina', '070', 'convertible mark', 'BAM', 'fening', 'KM', 2, 'Bosnia and Herzegovina', 'BA', 'BIH', 'Bosnia and Herzegovina', '150', '039', 0, '387', 'BA.png'),
(72, 'Gaborone', 'Botswanan', '072', 'pula (inv.)', 'BWP', 'thebe (inv.)', 'P', 2, 'Republic of Botswana', 'BW', 'BWA', 'Botswana', '002', '018', 0, '267', 'BW.png'),
(74, 'Bouvet island', 'of Bouvet island', '074', '', '', '', 'kr', 2, 'Bouvet Island', 'BV', 'BVT', 'Bouvet Island', '', '', 0, '47', 'BV.png'),
(76, 'Brasilia', 'Brazilian', '076', 'real (pl. reais)', 'BRL', 'centavo', 'R$', 2, 'Federative Republic of Brazil', 'BR', 'BRA', 'Brazil', '019', '005', 0, '55', 'BR.png'),
(84, 'Belmopan', 'Belizean', '084', 'Belize dollar', 'BZD', 'cent', 'BZ$', 2, 'Belize', 'BZ', 'BLZ', 'Belize', '019', '013', 0, '501', 'BZ.png'),
(86, 'Diego Garcia', 'Changosian', '086', 'US dollar', 'USD', 'cent', '$', 2, 'British Indian Ocean Territory', 'IO', 'IOT', 'British Indian Ocean Territory', '', '', 0, '246', 'IO.png'),
(90, 'Honiara', 'Solomon Islander', '090', 'Solomon Islands dollar', 'SBD', 'cent', '$', 2, 'Solomon Islands', 'SB', 'SLB', 'Solomon Islands', '009', '054', 0, '677', 'SB.png'),
(92, 'Road Town', 'British Virgin Islander;', '092', 'US dollar', 'USD', 'cent', '$', 2, 'British Virgin Islands', 'VG', 'VGB', 'Virgin Islands, British', '019', '029', 0, '1', 'VG.png'),
(96, 'Bandar Seri Begawan', 'Bruneian', '096', 'Brunei dollar', 'BND', 'sen (inv.)', '$', 2, 'Brunei Darussalam', 'BN', 'BRN', 'Brunei Darussalam', '142', '035', 0, '673', 'BN.png'),
(100, 'Sofia', 'Bulgarian', '100', 'lev (pl. leva)', 'BGN', 'stotinka', 'лв', 2, 'Republic of Bulgaria', 'BG', 'BGR', 'Bulgaria', '150', '151', 1, '359', 'BG.png'),
(104, 'Yangon', 'Burmese', '104', 'kyat', 'MMK', 'pya', 'K', 2, 'Union of Myanmar/', 'MM', 'MMR', 'Myanmar', '142', '035', 0, '95', 'MM.png'),
(108, 'Bujumbura', 'Burundian', '108', 'Burundi franc', 'BIF', 'centime', 'BIF', 0, 'Republic of Burundi', 'BI', 'BDI', 'Burundi', '002', '014', 0, '257', 'BI.png'),
(112, 'Minsk', 'Belarusian', '112', 'Belarusian rouble', 'BYR', 'kopek', 'p.', 2, 'Republic of Belarus', 'BY', 'BLR', 'Belarus', '150', '151', 0, '375', 'BY.png'),
(116, 'Phnom Penh', 'Cambodian', '116', 'riel', 'KHR', 'sen (inv.)', '៛', 2, 'Kingdom of Cambodia', 'KH', 'KHM', 'Cambodia', '142', '035', 0, '855', 'KH.png'),
(120, 'Yaoundé', 'Cameroonian', '120', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 0, 'Republic of Cameroon', 'CM', 'CMR', 'Cameroon', '002', '017', 0, '237', 'CM.png'),
(124, 'Ottawa', 'Canadian', '124', 'Canadian dollar', 'CAD', 'cent', '$', 2, 'Canada', 'CA', 'CAN', 'Canada', '019', '021', 0, '1', 'CA.png'),
(132, 'Praia', 'Cape Verdean', '132', 'Cape Verde escudo', 'CVE', 'centavo', 'CVE', 2, 'Republic of Cape Verde', 'CV', 'CPV', 'Cape Verde', '002', '011', 0, '238', 'CV.png'),
(136, 'George Town', 'Caymanian', '136', 'Cayman Islands dollar', 'KYD', 'cent', '$', 2, 'Cayman Islands', 'KY', 'CYM', 'Cayman Islands', '019', '029', 0, '1', 'KY.png'),
(140, 'Bangui', 'Central African', '140', 'CFA franc (BEAC)', 'XAF', 'centime', 'CFA', 0, 'Central African Republic', 'CF', 'CAF', 'Central African Republic', '002', '017', 0, '236', 'CF.png'),
(144, 'Colombo', 'Sri Lankan', '144', 'Sri Lankan rupee', 'LKR', 'cent', '₨', 2, 'Democratic Socialist Republic of Sri Lanka', 'LK', 'LKA', 'Sri Lanka', '142', '034', 0, '94', 'LK.png'),
(148, 'N’Djamena', 'Chadian', '148', 'CFA franc (BEAC)', 'XAF', 'centime', 'XAF', 0, 'Republic of Chad', 'TD', 'TCD', 'Chad', '002', '017', 0, '235', 'TD.png'),
(152, 'Santiago', 'Chilean', '152', 'Chilean peso', 'CLP', 'centavo', 'CLP', 0, 'Republic of Chile', 'CL', 'CHL', 'Chile', '019', '005', 0, '56', 'CL.png'),
(156, 'Beijing', 'Chinese', '156', 'renminbi-yuan (inv.)', 'CNY', 'jiao (10)', '¥', 2, 'People’s Republic of China', 'CN', 'CHN', 'China', '142', '030', 0, '86', 'CN.png'),
(158, 'Taipei', 'Taiwanese', '158', 'new Taiwan dollar', 'TWD', 'fen (inv.)', 'NT$', 2, 'Republic of China, Taiwan (TW1)', 'TW', 'TWN', 'Taiwan, Province of China', '142', '030', 0, '886', 'TW.png'),
(162, 'Flying Fish Cove', 'Christmas Islander', '162', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Christmas Island Territory', 'CX', 'CXR', 'Christmas Island', '', '', 0, '61', 'CX.png'),
(166, 'Bantam', 'Cocos Islander', '166', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Territory of Cocos (Keeling) Islands', 'CC', 'CCK', 'Cocos (Keeling) Islands', '', '', 0, '61', 'CC.png'),
(170, 'Santa Fe de Bogotá', 'Colombian', '170', 'Colombian peso', 'COP', 'centavo', '$', 2, 'Republic of Colombia', 'CO', 'COL', 'Colombia', '019', '005', 0, '57', 'CO.png'),
(174, 'Moroni', 'Comorian', '174', 'Comorian franc', 'KMF', '', 'KMF', 0, 'Union of the Comoros', 'KM', 'COM', 'Comoros', '002', '014', 0, '269', 'KM.png'),
(175, 'Mamoudzou', 'Mahorais', '175', 'euro', 'EUR', 'cent', '€', 2, 'Departmental Collectivity of Mayotte', 'YT', 'MYT', 'Mayotte', '002', '014', 0, '262', 'YT.png'),
(178, 'Brazzaville', 'Congolese', '178', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 0, 'Republic of the Congo', 'CG', 'COG', 'Congo', '002', '017', 0, '242', 'CG.png'),
(180, 'Kinshasa', 'Congolese', '180', 'Congolese franc', 'CDF', 'centime', 'CDF', 2, 'Democratic Republic of the Congo', 'CD', 'COD', 'Congo, the Democratic Republic of the', '002', '017', 0, '243', 'CD.png'),
(184, 'Avarua', 'Cook Islander', '184', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Cook Islands', 'CK', 'COK', 'Cook Islands', '009', '061', 0, '682', 'CK.png'),
(188, 'San José', 'Costa Rican', '188', 'Costa Rican colón (pl. colones)', 'CRC', 'céntimo', '₡', 2, 'Republic of Costa Rica', 'CR', 'CRI', 'Costa Rica', '019', '013', 0, '506', 'CR.png'),
(191, 'Zagreb', 'Croatian', '191', 'kuna (inv.)', 'HRK', 'lipa (inv.)', 'kn', 2, 'Republic of Croatia', 'HR', 'HRV', 'Croatia', '150', '039', 1, '385', 'HR.png'),
(192, 'Havana', 'Cuban', '192', 'Cuban peso', 'CUP', 'centavo', '₱', 2, 'Republic of Cuba', 'CU', 'CUB', 'Cuba', '019', '029', 0, '53', 'CU.png'),
(196, 'Nicosia', 'Cypriot', '196', 'euro', 'EUR', 'cent', 'CYP', 2, 'Republic of Cyprus', 'CY', 'CYP', 'Cyprus', '142', '145', 1, '357', 'CY.png'),
(203, 'Prague', 'Czech', '203', 'Czech koruna (pl. koruny)', 'CZK', 'halér', 'Kč', 2, 'Czech Republic', 'CZ', 'CZE', 'Czech Republic', '150', '151', 1, '420', 'CZ.png'),
(204, 'Porto Novo (BJ1)', 'Beninese', '204', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Benin', 'BJ', 'BEN', 'Benin', '002', '011', 0, '229', 'BJ.png'),
(208, 'Copenhagen', 'Danish', '208', 'Danish krone', 'DKK', 'øre (inv.)', 'kr', 2, 'Kingdom of Denmark', 'DK', 'DNK', 'Denmark', '150', '154', 1, '45', 'DK.png'),
(212, 'Roseau', 'Dominican', '212', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Commonwealth of Dominica', 'DM', 'DMA', 'Dominica', '019', '029', 0, '1', 'DM.png'),
(214, 'Santo Domingo', 'Dominican', '214', 'Dominican peso', 'DOP', 'centavo', 'RD$', 2, 'Dominican Republic', 'DO', 'DOM', 'Dominican Republic', '019', '029', 0, '1', 'DO.png'),
(218, 'Quito', 'Ecuadorian', '218', 'US dollar', 'USD', 'cent', '$', 2, 'Republic of Ecuador', 'EC', 'ECU', 'Ecuador', '019', '005', 0, '593', 'EC.png'),
(222, 'San Salvador', 'Salvadoran', '222', 'Salvadorian colón (pl. colones)', 'SVC', 'centavo', '$', 2, 'Republic of El Salvador', 'SV', 'SLV', 'El Salvador', '019', '013', 0, '503', 'SV.png'),
(226, 'Malabo', 'Equatorial Guinean', '226', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 2, 'Republic of Equatorial Guinea', 'GQ', 'GNQ', 'Equatorial Guinea', '002', '017', 0, '240', 'GQ.png'),
(231, 'Addis Ababa', 'Ethiopian', '231', 'birr (inv.)', 'ETB', 'cent', 'ETB', 2, 'Federal Democratic Republic of Ethiopia', 'ET', 'ETH', 'Ethiopia', '002', '014', 0, '251', 'ET.png'),
(232, 'Asmara', 'Eritrean', '232', 'nakfa', 'ERN', 'cent', 'Nfk', 2, 'State of Eritrea', 'ER', 'ERI', 'Eritrea', '002', '014', 0, '291', 'ER.png'),
(233, 'Tallinn', 'Estonian', '233', 'euro', 'EUR', 'cent', 'kr', 2, 'Republic of Estonia', 'EE', 'EST', 'Estonia', '150', '154', 1, '372', 'EE.png'),
(234, 'Tórshavn', 'Faeroese', '234', 'Danish krone', 'DKK', 'øre (inv.)', 'kr', 2, 'Faeroe Islands', 'FO', 'FRO', 'Faroe Islands', '150', '154', 0, '298', 'FO.png'),
(238, 'Stanley', 'Falkland Islander', '238', 'Falkland Islands pound', 'FKP', 'new penny', '£', 2, 'Falkland Islands', 'FK', 'FLK', 'Falkland Islands (Malvinas)', '019', '005', 0, '500', 'FK.png'),
(239, 'King Edward Point (Grytviken)', 'of South Georgia and the South Sandwich Islands', '239', '', '', '', '£', 2, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', '', '', 0, '44', 'GS.png'),
(242, 'Suva', 'Fijian', '242', 'Fiji dollar', 'FJD', 'cent', '$', 2, 'Republic of Fiji', 'FJ', 'FJI', 'Fiji', '009', '054', 0, '679', 'FJ.png'),
(246, 'Helsinki', 'Finnish', '246', 'euro', 'EUR', 'cent', '€', 2, 'Republic of Finland', 'FI', 'FIN', 'Finland', '150', '154', 1, '358', 'FI.png'),
(248, 'Mariehamn', 'Åland Islander', '248', 'euro', 'EUR', 'cent', NULL, NULL, 'Åland Islands', 'AX', 'ALA', 'Åland Islands', '150', '154', 0, '358', NULL),
(250, 'Paris', 'French', '250', 'euro', 'EUR', 'cent', '€', 2, 'French Republic', 'FR', 'FRA', 'France', '150', '155', 1, '33', 'FR.png'),
(254, 'Cayenne', 'Guianese', '254', 'euro', 'EUR', 'cent', '€', 2, 'French Guiana', 'GF', 'GUF', 'French Guiana', '019', '005', 0, '594', 'GF.png'),
(258, 'Papeete', 'Polynesian', '258', 'CFP franc', 'XPF', 'centime', 'XPF', 0, 'French Polynesia', 'PF', 'PYF', 'French Polynesia', '009', '061', 0, '689', 'PF.png'),
(260, 'Port-aux-Francais', 'of French Southern and Antarctic Lands', '260', 'euro', 'EUR', 'cent', '€', 2, 'French Southern and Antarctic Lands', 'TF', 'ATF', 'French Southern Territories', '', '', 0, '33', 'TF.png'),
(262, 'Djibouti', 'Djiboutian', '262', 'Djibouti franc', 'DJF', '', 'DJF', 0, 'Republic of Djibouti', 'DJ', 'DJI', 'Djibouti', '002', '014', 0, '253', 'DJ.png'),
(266, 'Libreville', 'Gabonese', '266', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 0, 'Gabonese Republic', 'GA', 'GAB', 'Gabon', '002', '017', 0, '241', 'GA.png'),
(268, 'Tbilisi', 'Georgian', '268', 'lari', 'GEL', 'tetri (inv.)', 'GEL', 2, 'Georgia', 'GE', 'GEO', 'Georgia', '142', '145', 0, '995', 'GE.png'),
(270, 'Banjul', 'Gambian', '270', 'dalasi (inv.)', 'GMD', 'butut', 'D', 2, 'Republic of the Gambia', 'GM', 'GMB', 'Gambia', '002', '011', 0, '220', 'GM.png'),
(275, NULL, 'Palestinian', '275', NULL, NULL, NULL, '₪', 2, NULL, 'PS', 'PSE', 'Palestinian Territory, Occupied', '142', '145', 0, '970', 'PS.png'),
(276, 'Berlin', 'German', '276', 'euro', 'EUR', 'cent', '€', 2, 'Federal Republic of Germany', 'DE', 'DEU', 'Germany', '150', '155', 1, '49', 'DE.png'),
(288, 'Accra', 'Ghanaian', '288', 'Ghana cedi', 'GHS', 'pesewa', '¢', 2, 'Republic of Ghana', 'GH', 'GHA', 'Ghana', '002', '011', 0, '233', 'GH.png'),
(292, 'Gibraltar', 'Gibraltarian', '292', 'Gibraltar pound', 'GIP', 'penny', '£', 2, 'Gibraltar', 'GI', 'GIB', 'Gibraltar', '150', '039', 0, '350', 'GI.png'),
(296, 'Tarawa', 'Kiribatian', '296', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Republic of Kiribati', 'KI', 'KIR', 'Kiribati', '009', '057', 0, '686', 'KI.png'),
(300, 'Athens', 'Greek', '300', 'euro', 'EUR', 'cent', '€', 2, 'Hellenic Republic', 'GR', 'GRC', 'Greece', '150', '039', 1, '30', 'GR.png'),
(304, 'Nuuk', 'Greenlander', '304', 'Danish krone', 'DKK', 'øre (inv.)', 'kr', 2, 'Greenland', 'GL', 'GRL', 'Greenland', '019', '021', 0, '299', 'GL.png'),
(308, 'St George’s', 'Grenadian', '308', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Grenada', 'GD', 'GRD', 'Grenada', '019', '029', 0, '1', 'GD.png'),
(312, 'Basse Terre', 'Guadeloupean', '312', 'euro', 'EUR ', 'cent', '€', 2, 'Guadeloupe', 'GP', 'GLP', 'Guadeloupe', '019', '029', 0, '590', 'GP.png'),
(316, 'Agaña (Hagåtña)', 'Guamanian', '316', 'US dollar', 'USD', 'cent', '$', 2, 'Territory of Guam', 'GU', 'GUM', 'Guam', '009', '057', 0, '1', 'GU.png'),
(320, 'Guatemala City', 'Guatemalan', '320', 'quetzal (pl. quetzales)', 'GTQ', 'centavo', 'Q', 2, 'Republic of Guatemala', 'GT', 'GTM', 'Guatemala', '019', '013', 0, '502', 'GT.png'),
(324, 'Conakry', 'Guinean', '324', 'Guinean franc', 'GNF', '', 'GNF', 0, 'Republic of Guinea', 'GN', 'GIN', 'Guinea', '002', '011', 0, '224', 'GN.png'),
(328, 'Georgetown', 'Guyanese', '328', 'Guyana dollar', 'GYD', 'cent', '$', 2, 'Cooperative Republic of Guyana', 'GY', 'GUY', 'Guyana', '019', '005', 0, '592', 'GY.png'),
(332, 'Port-au-Prince', 'Haitian', '332', 'gourde', 'HTG', 'centime', 'G', 2, 'Republic of Haiti', 'HT', 'HTI', 'Haiti', '019', '029', 0, '509', 'HT.png'),
(334, 'Territory of Heard Island and McDonald Islands', 'of Territory of Heard Island and McDonald Islands', '334', '', '', '', '$', 2, 'Territory of Heard Island and McDonald Islands', 'HM', 'HMD', 'Heard Island and McDonald Islands', '', '', 0, '61', 'HM.png'),
(336, 'Vatican City', 'of the Holy See/of the Vatican', '336', 'euro', 'EUR', 'cent', '€', 2, 'the Holy See/ Vatican City State', 'VA', 'VAT', 'Holy See (Vatican City State)', '150', '039', 0, '39', 'VA.png'),
(340, 'Tegucigalpa', 'Honduran', '340', 'lempira', 'HNL', 'centavo', 'L', 2, 'Republic of Honduras', 'HN', 'HND', 'Honduras', '019', '013', 0, '504', 'HN.png'),
(344, '(HK3)', 'Hong Kong Chinese', '344', 'Hong Kong dollar', 'HKD', 'cent', '$', 2, 'Hong Kong Special Administrative Region of the People’s Republic of China (HK2)', 'HK', 'HKG', 'Hong Kong', '142', '030', 0, '852', 'HK.png'),
(348, 'Budapest', 'Hungarian', '348', 'forint (inv.)', 'HUF', '(fillér (inv.))', 'Ft', 2, 'Republic of Hungary', 'HU', 'HUN', 'Hungary', '150', '151', 1, '36', 'HU.png'),
(352, 'Reykjavik', 'Icelander', '352', 'króna (pl. krónur)', 'ISK', '', 'kr', 0, 'Republic of Iceland', 'IS', 'ISL', 'Iceland', '150', '154', 0, '354', 'IS.png'),
(356, 'New Delhi', 'Indian', '356', 'Indian rupee', 'INR', 'paisa', '₹', 2, 'Republic of India', 'IN', 'IND', 'India', '142', '034', 0, '91', 'IN.png'),
(360, 'Jakarta', 'Indonesian', '360', 'Indonesian rupiah (inv.)', 'IDR', 'sen (inv.)', 'Rp', 2, 'Republic of Indonesia', 'ID', 'IDN', 'Indonesia', '142', '035', 0, '62', 'ID.png'),
(364, 'Tehran', 'Iranian', '364', 'Iranian rial', 'IRR', '(dinar) (IR1)', '﷼', 2, 'Islamic Republic of Iran', 'IR', 'IRN', 'Iran, Islamic Republic of', '142', '034', 0, '98', 'IR.png'),
(368, 'Baghdad', 'Iraqi', '368', 'Iraqi dinar', 'IQD', 'fils (inv.)', 'IQD', 3, 'Republic of Iraq', 'IQ', 'IRQ', 'Iraq', '142', '145', 0, '964', 'IQ.png'),
(372, 'Dublin', 'Irish', '372', 'euro', 'EUR', 'cent', '€', 2, 'Ireland (IE1)', 'IE', 'IRL', 'Ireland', '150', '154', 1, '353', 'IE.png'),
(376, '(IL1)', 'Israeli', '376', 'shekel', 'ILS', 'agora', '₪', 2, 'State of Israel', 'IL', 'ISR', 'Israel', '142', '145', 0, '972', 'IL.png'),
(380, 'Rome', 'Italian', '380', 'euro', 'EUR', 'cent', '€', 2, 'Italian Republic', 'IT', 'ITA', 'Italy', '150', '039', 1, '39', 'IT.png'),
(384, 'Yamoussoukro (CI1)', 'Ivorian', '384', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Côte d’Ivoire', 'CI', 'CIV', 'Côte d\'Ivoire', '002', '011', 0, '225', 'CI.png'),
(388, 'Kingston', 'Jamaican', '388', 'Jamaica dollar', 'JMD', 'cent', '$', 2, 'Jamaica', 'JM', 'JAM', 'Jamaica', '019', '029', 0, '1', 'JM.png'),
(392, 'Tokyo', 'Japanese', '392', 'yen (inv.)', 'JPY', '(sen (inv.)) (JP1)', '¥', 0, 'Japan', 'JP', 'JPN', 'Japan', '142', '030', 0, '81', 'JP.png'),
(398, 'Astana', 'Kazakh', '398', 'tenge (inv.)', 'KZT', 'tiyn', 'лв', 2, 'Republic of Kazakhstan', 'KZ', 'KAZ', 'Kazakhstan', '142', '143', 0, '7', 'KZ.png'),
(400, 'Amman', 'Jordanian', '400', 'Jordanian dinar', 'JOD', '100 qirsh', 'JOD', 2, 'Hashemite Kingdom of Jordan', 'JO', 'JOR', 'Jordan', '142', '145', 0, '962', 'JO.png'),
(404, 'Nairobi', 'Kenyan', '404', 'Kenyan shilling', 'KES', 'cent', 'KES', 2, 'Republic of Kenya', 'KE', 'KEN', 'Kenya', '002', '014', 0, '254', 'KE.png'),
(408, 'Pyongyang', 'North Korean', '408', 'North Korean won (inv.)', 'KPW', 'chun (inv.)', '₩', 2, 'Democratic People’s Republic of Korea', 'KP', 'PRK', 'Korea, Democratic People\'s Republic of', '142', '030', 0, '850', 'KP.png'),
(410, 'Seoul', 'South Korean', '410', 'South Korean won (inv.)', 'KRW', '(chun (inv.))', '₩', 0, 'Republic of Korea', 'KR', 'KOR', 'Korea, Republic of', '142', '030', 0, '82', 'KR.png'),
(414, 'Kuwait City', 'Kuwaiti', '414', 'Kuwaiti dinar', 'KWD', 'fils (inv.)', 'KWD', 3, 'State of Kuwait', 'KW', 'KWT', 'Kuwait', '142', '145', 0, '965', 'KW.png'),
(417, 'Bishkek', 'Kyrgyz', '417', 'som', 'KGS', 'tyiyn', 'лв', 2, 'Kyrgyz Republic', 'KG', 'KGZ', 'Kyrgyzstan', '142', '143', 0, '996', 'KG.png'),
(418, 'Vientiane', 'Lao', '418', 'kip (inv.)', 'LAK', '(at (inv.))', '₭', 0, 'Lao People’s Democratic Republic', 'LA', 'LAO', 'Lao People\'s Democratic Republic', '142', '035', 0, '856', 'LA.png'),
(422, 'Beirut', 'Lebanese', '422', 'Lebanese pound', 'LBP', '(piastre)', '£', 2, 'Lebanese Republic', 'LB', 'LBN', 'Lebanon', '142', '145', 0, '961', 'LB.png'),
(426, 'Maseru', 'Basotho', '426', 'loti (pl. maloti)', 'LSL', 'sente', 'L', 2, 'Kingdom of Lesotho', 'LS', 'LSO', 'Lesotho', '002', '018', 0, '266', 'LS.png'),
(428, 'Riga', 'Latvian', '428', 'euro', 'EUR', 'cent', 'Ls', 2, 'Republic of Latvia', 'LV', 'LVA', 'Latvia', '150', '154', 1, '371', 'LV.png'),
(430, 'Monrovia', 'Liberian', '430', 'Liberian dollar', 'LRD', 'cent', '$', 2, 'Republic of Liberia', 'LR', 'LBR', 'Liberia', '002', '011', 0, '231', 'LR.png'),
(434, 'Tripoli', 'Libyan', '434', 'Libyan dinar', 'LYD', 'dirham', 'LYD', 3, 'Socialist People’s Libyan Arab Jamahiriya', 'LY', 'LBY', 'Libya', '002', '015', 0, '218', 'LY.png'),
(438, 'Vaduz', 'Liechtensteiner', '438', 'Swiss franc', 'CHF', 'centime', 'CHF', 2, 'Principality of Liechtenstein', 'LI', 'LIE', 'Liechtenstein', '150', '155', 0, '423', 'LI.png'),
(440, 'Vilnius', 'Lithuanian', '440', 'euro', 'EUR', 'cent', 'Lt', 2, 'Republic of Lithuania', 'LT', 'LTU', 'Lithuania', '150', '154', 1, '370', 'LT.png'),
(442, 'Luxembourg', 'Luxembourger', '442', 'euro', 'EUR', 'cent', '€', 2, 'Grand Duchy of Luxembourg', 'LU', 'LUX', 'Luxembourg', '150', '155', 1, '352', 'LU.png'),
(446, 'Macao (MO3)', 'Macanese', '446', 'pataca', 'MOP', 'avo', 'MOP', 2, 'Macao Special Administrative Region of the People’s Republic of China (MO2)', 'MO', 'MAC', 'Macao', '142', '030', 0, '853', 'MO.png'),
(450, 'Antananarivo', 'Malagasy', '450', 'ariary', 'MGA', 'iraimbilanja (inv.)', 'MGA', 2, 'Republic of Madagascar', 'MG', 'MDG', 'Madagascar', '002', '014', 0, '261', 'MG.png'),
(454, 'Lilongwe', 'Malawian', '454', 'Malawian kwacha (inv.)', 'MWK', 'tambala (inv.)', 'MK', 2, 'Republic of Malawi', 'MW', 'MWI', 'Malawi', '002', '014', 0, '265', 'MW.png'),
(458, 'Kuala Lumpur (MY1)', 'Malaysian', '458', 'ringgit (inv.)', 'MYR', 'sen (inv.)', 'RM', 2, 'Malaysia', 'MY', 'MYS', 'Malaysia', '142', '035', 0, '60', 'MY.png'),
(462, 'Malé', 'Maldivian', '462', 'rufiyaa', 'MVR', 'laari (inv.)', 'Rf', 2, 'Republic of Maldives', 'MV', 'MDV', 'Maldives', '142', '034', 0, '960', 'MV.png'),
(466, 'Bamako', 'Malian', '466', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Mali', 'ML', 'MLI', 'Mali', '002', '011', 0, '223', 'ML.png'),
(470, 'Valletta', 'Maltese', '470', 'euro', 'EUR', 'cent', 'MTL', 2, 'Republic of Malta', 'MT', 'MLT', 'Malta', '150', '039', 1, '356', 'MT.png'),
(474, 'Fort-de-France', 'Martinican', '474', 'euro', 'EUR', 'cent', '€', 2, 'Martinique', 'MQ', 'MTQ', 'Martinique', '019', '029', 0, '596', 'MQ.png'),
(478, 'Nouakchott', 'Mauritanian', '478', 'ouguiya', 'MRO', 'khoum', 'UM', 2, 'Islamic Republic of Mauritania', 'MR', 'MRT', 'Mauritania', '002', '011', 0, '222', 'MR.png'),
(480, 'Port Louis', 'Mauritian', '480', 'Mauritian rupee', 'MUR', 'cent', '₨', 2, 'Republic of Mauritius', 'MU', 'MUS', 'Mauritius', '002', '014', 0, '230', 'MU.png'),
(484, 'Mexico City', 'Mexican', '484', 'Mexican peso', 'MXN', 'centavo', '$', 2, 'United Mexican States', 'MX', 'MEX', 'Mexico', '019', '013', 0, '52', 'MX.png'),
(492, 'Monaco', 'Monegasque', '492', 'euro', 'EUR', 'cent', '€', 2, 'Principality of Monaco', 'MC', 'MCO', 'Monaco', '150', '155', 0, '377', 'MC.png'),
(496, 'Ulan Bator', 'Mongolian', '496', 'tugrik', 'MNT', 'möngö (inv.)', '₮', 2, 'Mongolia', 'MN', 'MNG', 'Mongolia', '142', '030', 0, '976', 'MN.png'),
(498, 'Chisinau', 'Moldovan', '498', 'Moldovan leu (pl. lei)', 'MDL', 'ban', 'MDL', 2, 'Republic of Moldova', 'MD', 'MDA', 'Moldova, Republic of', '150', '151', 0, '373', 'MD.png'),
(499, 'Podgorica', 'Montenegrin', '499', 'euro', 'EUR', 'cent', '€', 2, 'Montenegro', 'ME', 'MNE', 'Montenegro', '150', '039', 0, '382', 'ME.png'),
(500, 'Plymouth (MS2)', 'Montserratian', '500', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Montserrat', 'MS', 'MSR', 'Montserrat', '019', '029', 0, '1', 'MS.png'),
(504, 'Rabat', 'Moroccan', '504', 'Moroccan dirham', 'MAD', 'centime', 'MAD', 2, 'Kingdom of Morocco', 'MA', 'MAR', 'Morocco', '002', '015', 0, '212', 'MA.png'),
(508, 'Maputo', 'Mozambican', '508', 'metical', 'MZN', 'centavo', 'MT', 2, 'Republic of Mozambique', 'MZ', 'MOZ', 'Mozambique', '002', '014', 0, '258', 'MZ.png'),
(512, 'Muscat', 'Omani', '512', 'Omani rial', 'OMR', 'baiza', '﷼', 3, 'Sultanate of Oman', 'OM', 'OMN', 'Oman', '142', '145', 0, '968', 'OM.png'),
(516, 'Windhoek', 'Namibian', '516', 'Namibian dollar', 'NAD', 'cent', '$', 2, 'Republic of Namibia', 'NA', 'NAM', 'Namibia', '002', '018', 0, '264', 'NA.png'),
(520, 'Yaren', 'Nauruan', '520', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Republic of Nauru', 'NR', 'NRU', 'Nauru', '009', '057', 0, '674', 'NR.png'),
(524, 'Kathmandu', 'Nepalese', '524', 'Nepalese rupee', 'NPR', 'paisa (inv.)', '₨', 2, 'Nepal', 'NP', 'NPL', 'Nepal', '142', '034', 0, '977', 'NP.png'),
(528, 'Amsterdam (NL2)', 'Dutch', '528', 'euro', 'EUR', 'cent', '€', 2, 'Kingdom of the Netherlands', 'NL', 'NLD', 'Netherlands', '150', '155', 1, '31', 'NL.png'),
(531, 'Willemstad', 'Curaçaoan', '531', 'Netherlands Antillean guilder (CW1)', 'ANG', 'cent', NULL, NULL, 'Curaçao', 'CW', 'CUW', 'Curaçao', '019', '029', 0, '599', NULL),
(533, 'Oranjestad', 'Aruban', '533', 'Aruban guilder', 'AWG', 'cent', 'ƒ', 2, 'Aruba', 'AW', 'ABW', 'Aruba', '019', '029', 0, '297', 'AW.png'),
(534, 'Philipsburg', 'Sint Maartener', '534', 'Netherlands Antillean guilder (SX1)', 'ANG', 'cent', NULL, NULL, 'Sint Maarten', 'SX', 'SXM', 'Sint Maarten (Dutch part)', '019', '029', 0, '721', NULL),
(535, NULL, 'of Bonaire, Sint Eustatius and Saba', '535', 'US dollar', 'USD', 'cent', NULL, NULL, NULL, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', '019', '029', 0, '599', NULL),
(540, 'Nouméa', 'New Caledonian', '540', 'CFP franc', 'XPF', 'centime', 'XPF', 0, 'New Caledonia', 'NC', 'NCL', 'New Caledonia', '009', '054', 0, '687', 'NC.png'),
(548, 'Port Vila', 'Vanuatuan', '548', 'vatu (inv.)', 'VUV', '', 'Vt', 0, 'Republic of Vanuatu', 'VU', 'VUT', 'Vanuatu', '009', '054', 0, '678', 'VU.png'),
(554, 'Wellington', 'New Zealander', '554', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'New Zealand', 'NZ', 'NZL', 'New Zealand', '009', '053', 0, '64', 'NZ.png'),
(558, 'Managua', 'Nicaraguan', '558', 'córdoba oro', 'NIO', 'centavo', 'C$', 2, 'Republic of Nicaragua', 'NI', 'NIC', 'Nicaragua', '019', '013', 0, '505', 'NI.png'),
(562, 'Niamey', 'Nigerien', '562', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Niger', 'NE', 'NER', 'Niger', '002', '011', 0, '227', 'NE.png'),
(566, 'Abuja', 'Nigerian', '566', 'naira (inv.)', 'NGN', 'kobo (inv.)', '₦', 2, 'Federal Republic of Nigeria', 'NG', 'NGA', 'Nigeria', '002', '011', 0, '234', 'NG.png'),
(570, 'Alofi', 'Niuean', '570', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Niue', 'NU', 'NIU', 'Niue', '009', '061', 0, '683', 'NU.png'),
(574, 'Kingston', 'Norfolk Islander', '574', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Territory of Norfolk Island', 'NF', 'NFK', 'Norfolk Island', '009', '053', 0, '672', 'NF.png'),
(578, 'Oslo', 'Norwegian', '578', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'kr', 2, 'Kingdom of Norway', 'NO', 'NOR', 'Norway', '150', '154', 0, '47', 'NO.png'),
(580, 'Saipan', 'Northern Mariana Islander', '580', 'US dollar', 'USD', 'cent', '$', 2, 'Commonwealth of the Northern Mariana Islands', 'MP', 'MNP', 'Northern Mariana Islands', '009', '057', 0, '1', 'MP.png'),
(581, 'United States Minor Outlying Islands', 'of United States Minor Outlying Islands', '581', 'US dollar', 'USD', 'cent', '$', 2, 'United States Minor Outlying Islands', 'UM', 'UMI', 'United States Minor Outlying Islands', '', '', 0, '1', 'UM.png'),
(583, 'Palikir', 'Micronesian', '583', 'US dollar', 'USD', 'cent', '$', 2, 'Federated States of Micronesia', 'FM', 'FSM', 'Micronesia, Federated States of', '009', '057', 0, '691', 'FM.png'),
(584, 'Majuro', 'Marshallese', '584', 'US dollar', 'USD', 'cent', '$', 2, 'Republic of the Marshall Islands', 'MH', 'MHL', 'Marshall Islands', '009', '057', 0, '692', 'MH.png'),
(585, 'Melekeok', 'Palauan', '585', 'US dollar', 'USD', 'cent', '$', 2, 'Republic of Palau', 'PW', 'PLW', 'Palau', '009', '057', 0, '680', 'PW.png'),
(586, 'Islamabad', 'Pakistani', '586', 'Pakistani rupee', 'PKR', 'paisa', '₨', 2, 'Islamic Republic of Pakistan', 'PK', 'PAK', 'Pakistan', '142', '034', 0, '92', 'PK.png'),
(591, 'Panama City', 'Panamanian', '591', 'balboa', 'PAB', 'centésimo', 'B/.', 2, 'Republic of Panama', 'PA', 'PAN', 'Panama', '019', '013', 0, '507', 'PA.png'),
(598, 'Port Moresby', 'Papua New Guinean', '598', 'kina (inv.)', 'PGK', 'toea (inv.)', 'PGK', 2, 'Independent State of Papua New Guinea', 'PG', 'PNG', 'Papua New Guinea', '009', '054', 0, '675', 'PG.png'),
(600, 'Asunción', 'Paraguayan', '600', 'guaraní', 'PYG', 'céntimo', 'Gs', 0, 'Republic of Paraguay', 'PY', 'PRY', 'Paraguay', '019', '005', 0, '595', 'PY.png'),
(604, 'Lima', 'Peruvian', '604', 'new sol', 'PEN', 'céntimo', 'S/.', 2, 'Republic of Peru', 'PE', 'PER', 'Peru', '019', '005', 0, '51', 'PE.png'),
(608, 'Manila', 'Filipino', '608', 'Philippine peso', 'PHP', 'centavo', 'Php', 2, 'Republic of the Philippines', 'PH', 'PHL', 'Philippines', '142', '035', 0, '63', 'PH.png'),
(612, 'Adamstown', 'Pitcairner', '612', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Pitcairn Islands', 'PN', 'PCN', 'Pitcairn', '009', '061', 0, '649', 'PN.png'),
(616, 'Warsaw', 'Polish', '616', 'zloty', 'PLN', 'grosz (pl. groszy)', 'zł', 2, 'Republic of Poland', 'PL', 'POL', 'Poland', '150', '151', 1, '48', 'PL.png'),
(620, 'Lisbon', 'Portuguese', '620', 'euro', 'EUR', 'cent', '€', 2, 'Portuguese Republic', 'PT', 'PRT', 'Portugal', '150', '039', 1, '351', 'PT.png'),
(624, 'Bissau', 'Guinea-Bissau national', '624', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Guinea-Bissau', 'GW', 'GNB', 'Guinea-Bissau', '002', '011', 0, '245', 'GW.png'),
(626, 'Dili', 'East Timorese', '626', 'US dollar', 'USD', 'cent', '$', 2, 'Democratic Republic of East Timor', 'TL', 'TLS', 'Timor-Leste', '142', '035', 0, '670', 'TL.png'),
(630, 'San Juan', 'Puerto Rican', '630', 'US dollar', 'USD', 'cent', '$', 2, 'Commonwealth of Puerto Rico', 'PR', 'PRI', 'Puerto Rico', '019', '029', 0, '1', 'PR.png'),
(634, 'Doha', 'Qatari', '634', 'Qatari riyal', 'QAR', 'dirham', '﷼', 2, 'State of Qatar', 'QA', 'QAT', 'Qatar', '142', '145', 0, '974', 'QA.png'),
(638, 'Saint-Denis', 'Reunionese', '638', 'euro', 'EUR', 'cent', '€', 2, 'Réunion', 'RE', 'REU', 'Réunion', '002', '014', 0, '262', 'RE.png'),
(642, 'Bucharest', 'Romanian', '642', 'Romanian leu (pl. lei)', 'RON', 'ban (pl. bani)', 'lei', 2, 'Romania', 'RO', 'ROU', 'Romania', '150', '151', 1, '40', 'RO.png'),
(643, 'Moscow', 'Russian', '643', 'Russian rouble', 'RUB', 'kopek', 'руб', 2, 'Russian Federation', 'RU', 'RUS', 'Russian Federation', '150', '151', 0, '7', 'RU.png'),
(646, 'Kigali', 'Rwandan; Rwandese', '646', 'Rwandese franc', 'RWF', 'centime', 'RWF', 0, 'Republic of Rwanda', 'RW', 'RWA', 'Rwanda', '002', '014', 0, '250', 'RW.png'),
(652, 'Gustavia', 'of Saint Barthélemy', '652', 'euro', 'EUR', 'cent', NULL, NULL, 'Collectivity of Saint Barthélemy', 'BL', 'BLM', 'Saint Barthélemy', '019', '029', 0, '590', NULL),
(654, 'Jamestown', 'Saint Helenian', '654', 'Saint Helena pound', 'SHP', 'penny', '£', 2, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', '002', '011', 0, '290', 'SH.png'),
(659, 'Basseterre', 'Kittsian; Nevisian', '659', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Federation of Saint Kitts and Nevis', 'KN', 'KNA', 'Saint Kitts and Nevis', '019', '029', 0, '1', 'KN.png'),
(660, 'The Valley', 'Anguillan', '660', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Anguilla', 'AI', 'AIA', 'Anguilla', '019', '029', 0, '1', 'AI.png'),
(662, 'Castries', 'Saint Lucian', '662', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Saint Lucia', 'LC', 'LCA', 'Saint Lucia', '019', '029', 0, '1', 'LC.png'),
(663, 'Marigot', 'of Saint Martin', '663', 'euro', 'EUR', 'cent', NULL, NULL, 'Collectivity of Saint Martin', 'MF', 'MAF', 'Saint Martin (French part)', '019', '029', 0, '590', NULL),
(666, 'Saint-Pierre', 'St-Pierrais; Miquelonnais', '666', 'euro', 'EUR', 'cent', '€', 2, 'Territorial Collectivity of Saint Pierre and Miquelon', 'PM', 'SPM', 'Saint Pierre and Miquelon', '019', '021', 0, '508', 'PM.png'),
(670, 'Kingstown', 'Vincentian', '670', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'Saint Vincent and the Grenadines', '019', '029', 0, '1', 'VC.png'),
(674, 'San Marino', 'San Marinese', '674', 'euro', 'EUR ', 'cent', '€', 2, 'Republic of San Marino', 'SM', 'SMR', 'San Marino', '150', '039', 0, '378', 'SM.png'),
(678, 'São Tomé', 'São Toméan', '678', 'dobra', 'STD', 'centavo', 'Db', 2, 'Democratic Republic of São Tomé and Príncipe', 'ST', 'STP', 'Sao Tome and Principe', '002', '017', 0, '239', 'ST.png'),
(682, 'Riyadh', 'Saudi Arabian', '682', 'riyal', 'SAR', 'halala', '﷼', 2, 'Kingdom of Saudi Arabia', 'SA', 'SAU', 'Saudi Arabia', '142', '145', 0, '966', 'SA.png'),
(686, 'Dakar', 'Senegalese', '686', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Senegal', 'SN', 'SEN', 'Senegal', '002', '011', 0, '221', 'SN.png'),
(688, 'Belgrade', 'Serb', '688', 'Serbian dinar', 'RSD', 'para (inv.)', NULL, NULL, 'Republic of Serbia', 'RS', 'SRB', 'Serbia', '150', '039', 0, '381', NULL),
(690, 'Victoria', 'Seychellois', '690', 'Seychelles rupee', 'SCR', 'cent', '₨', 2, 'Republic of Seychelles', 'SC', 'SYC', 'Seychelles', '002', '014', 0, '248', 'SC.png'),
(694, 'Freetown', 'Sierra Leonean', '694', 'leone', 'SLL', 'cent', 'Le', 2, 'Republic of Sierra Leone', 'SL', 'SLE', 'Sierra Leone', '002', '011', 0, '232', 'SL.png'),
(702, 'Singapore', 'Singaporean', '702', 'Singapore dollar', 'SGD', 'cent', '$', 2, 'Republic of Singapore', 'SG', 'SGP', 'Singapore', '142', '035', 0, '65', 'SG.png'),
(703, 'Bratislava', 'Slovak', '703', 'euro', 'EUR', 'cent', 'Sk', 2, 'Slovak Republic', 'SK', 'SVK', 'Slovakia', '150', '151', 1, '421', 'SK.png'),
(704, 'Hanoi', 'Vietnamese', '704', 'dong', 'VND', '(10 hào', '₫', 2, 'Socialist Republic of Vietnam', 'VN', 'VNM', 'Viet Nam', '142', '035', 0, '84', 'VN.png'),
(705, 'Ljubljana', 'Slovene', '705', 'euro', 'EUR', 'cent', '€', 2, 'Republic of Slovenia', 'SI', 'SVN', 'Slovenia', '150', '039', 1, '386', 'SI.png'),
(706, 'Mogadishu', 'Somali', '706', 'Somali shilling', 'SOS', 'cent', 'S', 2, 'Somali Republic', 'SO', 'SOM', 'Somalia', '002', '014', 0, '252', 'SO.png'),
(710, 'Pretoria (ZA1)', 'South African', '710', 'rand', 'ZAR', 'cent', 'R', 2, 'Republic of South Africa', 'ZA', 'ZAF', 'South Africa', '002', '018', 0, '27', 'ZA.png'),
(716, 'Harare', 'Zimbabwean', '716', 'Zimbabwe dollar (ZW1)', 'ZWL', 'cent', 'Z$', 2, 'Republic of Zimbabwe', 'ZW', 'ZWE', 'Zimbabwe', '002', '014', 0, '263', 'ZW.png'),
(724, 'Madrid', 'Spaniard', '724', 'euro', 'EUR', 'cent', '€', 2, 'Kingdom of Spain', 'ES', 'ESP', 'Spain', '150', '039', 1, '34', 'ES.png'),
(728, 'Juba', 'South Sudanese', '728', 'South Sudanese pound', 'SSP', 'piaster', NULL, NULL, 'Republic of South Sudan', 'SS', 'SSD', 'South Sudan', '002', '015', 0, '211', NULL),
(729, 'Khartoum', 'Sudanese', '729', 'Sudanese pound', 'SDG', 'piastre', NULL, NULL, 'Republic of the Sudan', 'SD', 'SDN', 'Sudan', '002', '015', 0, '249', NULL),
(732, 'Al aaiun', 'Sahrawi', '732', 'Moroccan dirham', 'MAD', 'centime', 'MAD', 2, 'Western Sahara', 'EH', 'ESH', 'Western Sahara', '002', '015', 0, '212', 'EH.png'),
(740, 'Paramaribo', 'Surinamese', '740', 'Surinamese dollar', 'SRD', 'cent', '$', 2, 'Republic of Suriname', 'SR', 'SUR', 'Suriname', '019', '005', 0, '597', 'SR.png'),
(744, 'Longyearbyen', 'of Svalbard', '744', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'kr', 2, 'Svalbard and Jan Mayen', 'SJ', 'SJM', 'Svalbard and Jan Mayen', '150', '154', 0, '47', 'SJ.png'),
(748, 'Mbabane', 'Swazi', '748', 'lilangeni', 'SZL', 'cent', 'SZL', 2, 'Kingdom of Swaziland', 'SZ', 'SWZ', 'Swaziland', '002', '018', 0, '268', 'SZ.png'),
(752, 'Stockholm', 'Swedish', '752', 'krona (pl. kronor)', 'SEK', 'öre (inv.)', 'kr', 2, 'Kingdom of Sweden', 'SE', 'SWE', 'Sweden', '150', '154', 1, '46', 'SE.png'),
(756, 'Berne', 'Swiss', '756', 'Swiss franc', 'CHF', 'centime', 'CHF', 2, 'Swiss Confederation', 'CH', 'CHE', 'Switzerland', '150', '155', 0, '41', 'CH.png'),
(760, 'Damascus', 'Syrian', '760', 'Syrian pound', 'SYP', 'piastre', '£', 2, 'Syrian Arab Republic', 'SY', 'SYR', 'Syrian Arab Republic', '142', '145', 0, '963', 'SY.png'),
(762, 'Dushanbe', 'Tajik', '762', 'somoni', 'TJS', 'diram', 'TJS', 2, 'Republic of Tajikistan', 'TJ', 'TJK', 'Tajikistan', '142', '143', 0, '992', 'TJ.png'),
(764, 'Bangkok', 'Thai', '764', 'baht (inv.)', 'THB', 'satang (inv.)', '฿', 2, 'Kingdom of Thailand', 'TH', 'THA', 'Thailand', '142', '035', 0, '66', 'TH.png'),
(768, 'Lomé', 'Togolese', '768', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Togolese Republic', 'TG', 'TGO', 'Togo', '002', '011', 0, '228', 'TG.png'),
(772, '(TK2)', 'Tokelauan', '772', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Tokelau', 'TK', 'TKL', 'Tokelau', '009', '061', 0, '690', 'TK.png'),
(776, 'Nuku’alofa', 'Tongan', '776', 'pa’anga (inv.)', 'TOP', 'seniti (inv.)', 'T$', 2, 'Kingdom of Tonga', 'TO', 'TON', 'Tonga', '009', '061', 0, '676', 'TO.png'),
(780, 'Port of Spain', 'Trinidadian; Tobagonian', '780', 'Trinidad and Tobago dollar', 'TTD', 'cent', 'TT$', 2, 'Republic of Trinidad and Tobago', 'TT', 'TTO', 'Trinidad and Tobago', '019', '029', 0, '1', 'TT.png'),
(784, 'Abu Dhabi', 'Emirian', '784', 'UAE dirham', 'AED', 'fils (inv.)', 'AED', 2, 'United Arab Emirates', 'AE', 'ARE', 'United Arab Emirates', '142', '145', 0, '971', 'AE.png'),
(788, 'Tunis', 'Tunisian', '788', 'Tunisian dinar', 'TND', 'millime', 'TND', 3, 'Republic of Tunisia', 'TN', 'TUN', 'Tunisia', '002', '015', 0, '216', 'TN.png'),
(792, 'Ankara', 'Turk', '792', 'Turkish lira (inv.)', 'TRY', 'kurus (inv.)', '₺', 2, 'Republic of Turkey', 'TR', 'TUR', 'Turkey', '142', '145', 0, '90', 'TR.png'),
(795, 'Ashgabat', 'Turkmen', '795', 'Turkmen manat (inv.)', 'TMT', 'tenge (inv.)', 'm', 2, 'Turkmenistan', 'TM', 'TKM', 'Turkmenistan', '142', '143', 0, '993', 'TM.png'),
(796, 'Cockburn Town', 'Turks and Caicos Islander', '796', 'US dollar', 'USD', 'cent', '$', 2, 'Turks and Caicos Islands', 'TC', 'TCA', 'Turks and Caicos Islands', '019', '029', 0, '1', 'TC.png'),
(798, 'Funafuti', 'Tuvaluan', '798', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Tuvalu', 'TV', 'TUV', 'Tuvalu', '009', '061', 0, '688', 'TV.png'),
(800, 'Kampala', 'Ugandan', '800', 'Uganda shilling', 'UGX', 'cent', 'UGX', 0, 'Republic of Uganda', 'UG', 'UGA', 'Uganda', '002', '014', 0, '256', 'UG.png'),
(804, 'Kiev', 'Ukrainian', '804', 'hryvnia', 'UAH', 'kopiyka', '₴', 2, 'Ukraine', 'UA', 'UKR', 'Ukraine', '150', '151', 0, '380', 'UA.png'),
(807, 'Skopje', 'of the former Yugoslav Republic of Macedonia', '807', 'denar (pl. denars)', 'MKD', 'deni (inv.)', 'ден', 2, 'the former Yugoslav Republic of Macedonia', 'MK', 'MKD', 'Macedonia, the former Yugoslav Republic of', '150', '039', 0, '389', 'MK.png'),
(818, 'Cairo', 'Egyptian', '818', 'Egyptian pound', 'EGP', 'piastre', '£', 2, 'Arab Republic of Egypt', 'EG', 'EGY', 'Egypt', '002', '015', 0, '20', 'EG.png'),
(826, 'London', 'British', '826', 'pound sterling', 'GBP', 'penny (pl. pence)', '£', 2, 'United Kingdom of Great Britain and Northern Ireland', 'GB', 'GBR', 'United Kingdom', '150', '154', 1, '44', 'GB.png'),
(831, 'St Peter Port', 'of Guernsey', '831', 'Guernsey pound (GG2)', 'GGP (GG2)', 'penny (pl. pence)', NULL, NULL, 'Bailiwick of Guernsey', 'GG', 'GGY', 'Guernsey', '150', '154', 0, '44', NULL),
(832, 'St Helier', 'of Jersey', '832', 'Jersey pound (JE2)', 'JEP (JE2)', 'penny (pl. pence)', NULL, NULL, 'Bailiwick of Jersey', 'JE', 'JEY', 'Jersey', '150', '154', 0, '44', NULL),
(833, 'Douglas', 'Manxman; Manxwoman', '833', 'Manx pound (IM2)', 'IMP (IM2)', 'penny (pl. pence)', NULL, NULL, 'Isle of Man', 'IM', 'IMN', 'Isle of Man', '150', '154', 0, '44', NULL),
(834, 'Dodoma (TZ1)', 'Tanzanian', '834', 'Tanzanian shilling', 'TZS', 'cent', 'TZS', 2, 'United Republic of Tanzania', 'TZ', 'TZA', 'Tanzania, United Republic of', '002', '014', 0, '255', 'TZ.png'),
(840, 'Washington DC', 'American', '840', 'US dollar', 'USD', 'cent', '$', 2, 'United States of America', 'US', 'USA', 'United States', '019', '021', 0, '1', 'US.png'),
(850, 'Charlotte Amalie', 'US Virgin Islander', '850', 'US dollar', 'USD', 'cent', '$', 2, 'United States Virgin Islands', 'VI', 'VIR', 'Virgin Islands, U.S.', '019', '029', 0, '1', 'VI.png'),
(854, 'Ouagadougou', 'Burkinabe', '854', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Burkina Faso', 'BF', 'BFA', 'Burkina Faso', '002', '011', 0, '226', 'BF.png'),
(858, 'Montevideo', 'Uruguayan', '858', 'Uruguayan peso', 'UYU', 'centésimo', '$U', 0, 'Eastern Republic of Uruguay', 'UY', 'URY', 'Uruguay', '019', '005', 0, '598', 'UY.png'),
(860, 'Tashkent', 'Uzbek', '860', 'sum (inv.)', 'UZS', 'tiyin (inv.)', 'лв', 2, 'Republic of Uzbekistan', 'UZ', 'UZB', 'Uzbekistan', '142', '143', 0, '998', 'UZ.png'),
(862, 'Caracas', 'Venezuelan', '862', 'bolívar fuerte (pl. bolívares fuertes)', 'VEF', 'céntimo', 'Bs', 2, 'Bolivarian Republic of Venezuela', 'VE', 'VEN', 'Venezuela, Bolivarian Republic of', '019', '005', 0, '58', 'VE.png'),
(876, 'Mata-Utu', 'Wallisian; Futunan; Wallis and Futuna Islander', '876', 'CFP franc', 'XPF', 'centime', 'XPF', 0, 'Wallis and Futuna', 'WF', 'WLF', 'Wallis and Futuna', '009', '061', 0, '681', 'WF.png'),
(882, 'Apia', 'Samoan', '882', 'tala (inv.)', 'WST', 'sene (inv.)', 'WS$', 2, 'Independent State of Samoa', 'WS', 'WSM', 'Samoa', '009', '061', 0, '685', 'WS.png'),
(887, 'San’a', 'Yemenite', '887', 'Yemeni rial', 'YER', 'fils (inv.)', '﷼', 2, 'Republic of Yemen', 'YE', 'YEM', 'Yemen', '142', '145', 0, '967', 'YE.png'),
(894, 'Lusaka', 'Zambian', '894', 'Zambian kwacha (inv.)', 'ZMW', 'ngwee (inv.)', 'ZK', 2, 'Republic of Zambia', 'ZM', 'ZMB', 'Zambia', '002', '014', 0, '260', 'ZM.png');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `CouponId` bigint(20) UNSIGNED NOT NULL,
  `CouponCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(20,2) DEFAULT NULL,
  `AmountType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExpiryDate` date NOT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CouponDesc` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `CurrencyId` bigint(20) UNSIGNED NOT NULL,
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
  `EnquiryId` bigint(20) UNSIGNED NOT NULL,
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
  `FeedbackId` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Message` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(1) NOT NULL,
  `BookingId` bigint(20) UNSIGNED NOT NULL,
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
(6, '2020_02_10_144626_create_tourpackagecategories_table', 1),
(7, '2020_02_10_144626_create_tourpackageincludes_table', 1),
(9, '2020_02_10_144626_create_toursites_table', 1),
(12, '2020_02_10_144626_create_transactioninfos_table', 1),
(13, '2020_02_10_144626_create_userpaymentcards_table', 1),
(18, '2020_02_15_185544_create_banners_table', 1),
(19, '2020_02_15_185738_create_bookings_table', 1),
(22, '2020_02_15_190358_create_enquiries_table', 1),
(23, '2020_02_15_190507_create_feedbacks_table', 1),
(24, '2020_02_15_190642_create_mobilemoneys_table', 1),
(25, '2020_02_15_190851_create_newslettersubscribers_table', 1),
(26, '2020_02_15_191014_create_packageimages_table', 1),
(28, '2020_02_15_191324_create_paymentapiinfos_table', 1),
(30, '2020_02_15_191610_create_paymentinfos_table', 1),
(31, '2020_02_15_191830_create_paymentproviders_table', 1),
(33, '2020_02_15_192103_create_paymenttypes_table', 1),
(34, '2020_02_15_192242_create_refundinfos_table', 1),
(35, '2020_02_15_192523_create_refundpayings_table', 1),
(36, '2020_02_15_203022_create_currencies_table', 1),
(38, '2020_02_10_144633_add_foreign_keys_to_accomodations_table', 3),
(39, '2020_02_10_144633_add_foreign_keys_to_bookings_table', 4),
(40, '2020_02_10_144633_add_foreign_keys_to_carts_table', 4),
(41, '2020_02_10_144633_add_foreign_keys_to_feedbacks_table', 4),
(42, '2020_02_10_144633_add_foreign_keys_to_mobilemoneys_table', 4),
(43, '2020_02_10_144633_add_foreign_keys_to_packageimages_table', 4),
(44, '2020_02_10_144633_add_foreign_keys_to_payinginfos_table', 4),
(45, '2020_02_10_144633_add_foreign_keys_to_paymentdeliverycosts_table', 4),
(46, '2020_02_10_144633_add_foreign_keys_to_paymentinfos_table', 4),
(47, '2020_02_10_144633_add_foreign_keys_to_paymenttypes_table', 4),
(48, '2020_02_10_144633_add_foreign_keys_to_refundinfos_table', 4),
(49, '2020_02_10_144633_add_foreign_keys_to_refundpayings_table', 5),
(50, '2020_02_10_144633_add_foreign_keys_to_tourlocations_table', 5),
(51, '2020_02_10_144633_add_foreign_keys_to_tourpackageincludes_table', 5),
(52, '2020_02_10_144633_add_foreign_keys_to_tourpackages_table', 5),
(53, '2020_02_10_144633_add_foreign_keys_to_toursites_table', 5),
(54, '2020_02_10_144633_add_foreign_keys_to_transactioninfos_table', 5),
(55, '2020_02_10_144633_add_foreign_keys_to_userpaymentcards_table', 5),
(63, '2020_02_14_142446_create_users_table', 6),
(65, '2020_02_18_105737_setup_countries_table', 7),
(66, '2020_02_18_105739_charify_countries_table', 7),
(67, '2020_02_10_144633_add_foreign_keys_to_users_table', 8),
(68, '2020_02_14_142951_create_userroles_table', 9),
(70, '2020_02_19_150748_create_admins_table', 11),
(76, '2020_02_10_144626_create_tourlocations_table', 12),
(82, '2020_02_15_185120_create_accommodations_table', 14),
(83, '2020_02_10_144626_create_refundpenalties_table', 15),
(84, '2020_02_10_144626_create_tourpackages_table', 15),
(85, '2020_02_10_144626_create_tourtransportations_table', 15),
(86, '2020_02_10_144626_create_tourtypes_table', 15),
(87, '2020_02_15_190237_create_coupons_table', 15),
(88, '2020_02_15_191129_create_payinginfos_table', 15),
(89, '2020_02_15_191441_create_paymentdeliverycosts_table', 15),
(90, '2020_02_15_212908_create_paymenttaxations_table', 15),
(91, '2020_02_10_144626_create_tourincludes_table', 16),
(96, '2020_02_15_190020_create_carts_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `mobilemoneys`
--

CREATE TABLE `mobilemoneys` (
  `MobileMoneyID` bigint(20) UNSIGNED NOT NULL,
  `Currency` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExternalID` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `AccNumber` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newslettersubscribers`
--

CREATE TABLE `newslettersubscribers` (
  `SubscribersId` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SubscriberDateTimeCreated` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packageimages`
--

CREATE TABLE `packageimages` (
  `PackageImagesId` bigint(20) UNSIGNED NOT NULL,
  `Image` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PackageImageName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packageimages`
--

INSERT INTO `packageimages` (`PackageImagesId`, `Image`, `PackageImageName`, `PackageId`, `created_at`, `updated_at`) VALUES
(3, '371472.jpg', NULL, 1, '2020-03-02 22:06:21', '2020-03-02 22:06:21'),
(4, '745659.jpg', NULL, 1, '2020-03-02 22:06:37', '2020-03-02 22:06:37'),
(5, '76786.jpg', NULL, 1, '2020-03-02 22:06:37', '2020-03-02 22:06:37'),
(6, '365727.jpg', NULL, 1, '2020-03-02 22:06:37', '2020-03-02 22:06:37'),
(7, '163789.jpg', NULL, 3, '2020-03-03 11:42:31', '2020-03-03 11:42:31'),
(8, '982870.jpg', NULL, 3, '2020-03-03 11:42:32', '2020-03-03 11:42:32'),
(9, '347124.jpg', NULL, 3, '2020-03-03 11:42:32', '2020-03-03 11:42:32');

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
  `PayingInfoID` bigint(20) UNSIGNED NOT NULL,
  `PaymentToken` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PayemntOrderCode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentQRCode` blob DEFAULT NULL,
  `TransactionCode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PayingDateTimeMade` datetime DEFAULT NULL,
  `TotalCost` decimal(20,2) DEFAULT NULL,
  `PaymentStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentInfoID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentapiinfos`
--

CREATE TABLE `paymentapiinfos` (
  `PayAPIInfoID` bigint(20) UNSIGNED NOT NULL,
  `APIVersion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `APIName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntegrationMode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MerchantEMail` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `PaymentDeliveryCostID` bigint(20) UNSIGNED NOT NULL,
  `DeliveryCostName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeliveryCost` decimal(20,2) NOT NULL,
  `PaymentProviderID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfos`
--

CREATE TABLE `paymentinfos` (
  `PaymentInfoID` bigint(20) UNSIGNED NOT NULL,
  `UPIUserPaymentDetailsID` bigint(20) UNSIGNED NOT NULL,
  `UPIUserPaymentMethod` bigint(20) UNSIGNED NOT NULL,
  `BookingId` bigint(20) UNSIGNED NOT NULL,
  `TaxID` bigint(20) UNSIGNED DEFAULT NULL,
  `PTyID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentproviders`
--

CREATE TABLE `paymentproviders` (
  `PaymentProviderID` bigint(20) UNSIGNED NOT NULL,
  `PaymentType` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentTypeProvider` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymenttaxations`
--

CREATE TABLE `paymenttaxations` (
  `TaxID` bigint(20) UNSIGNED NOT NULL,
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
  `PTyID` bigint(20) UNSIGNED NOT NULL,
  `PTyPaymentTypeName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PTyPaymentTypeDesc` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentProviderID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refundinfos`
--

CREATE TABLE `refundinfos` (
  `RefundInfoID` bigint(20) UNSIGNED NOT NULL,
  `RefundDateTime` datetime NOT NULL,
  `RefundLastModifiedDateTime` datetime DEFAULT NULL,
  `RefundAmount` decimal(20,4) DEFAULT NULL,
  `BookingId` bigint(20) UNSIGNED NOT NULL,
  `RefundPenaltyID` bigint(20) UNSIGNED DEFAULT NULL,
  `RefundCreated` bigint(20) UNSIGNED NOT NULL,
  `RefundModifed` bigint(20) UNSIGNED DEFAULT NULL,
  `PaymentDeliveryCostID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refundpayings`
--

CREATE TABLE `refundpayings` (
  `RefundPayingID` bigint(20) UNSIGNED NOT NULL,
  `PayingInfoID` bigint(20) UNSIGNED NOT NULL,
  `RefundInfoID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refundpenalties`
--

CREATE TABLE `refundpenalties` (
  `RefundPenaltyID` bigint(20) UNSIGNED NOT NULL,
  `PenaltyName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenaltyCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenaltyDesc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PenaltyAmount` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourincludes`
--

CREATE TABLE `tourincludes` (
  `TourIncludeID` bigint(20) UNSIGNED NOT NULL,
  `IncludeName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourIncludeInfo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TourExcludeName` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourincludes`
--

INSERT INTO `tourincludes` (`TourIncludeID`, `IncludeName`, `TourIncludeInfo`, `TourExcludeName`, `PackageId`, `created_at`, `updated_at`) VALUES
(1, 'Hotel availability', '2 days 1 night', 'No tour guide', 1, '2020-03-01 19:10:49', '2020-03-01 19:10:49'),
(2, 'breakfast', '24 hour service  security', 'Short dress not allowed', 1, '2020-03-01 19:10:49', '2020-03-01 19:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `tourlocations`
--

CREATE TABLE `tourlocations` (
  `LocationID` bigint(20) UNSIGNED NOT NULL,
  `LocationName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Weather` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GhanaPostAddress` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherAddress` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourlocations`
--

INSERT INTO `tourlocations` (`LocationID`, `LocationName`, `Longitude`, `Latitude`, `Weather`, `GhanaPostAddress`, `OtherAddress`, `PackageId`, `created_at`, `updated_at`) VALUES
(1, 'dfeefgf', 'gfgfe', 'fgr', 'ffe', 'vbgffd', 'vbfdg', 1, '2020-02-26 11:48:52', '2020-02-26 11:48:52'),
(2, 'dfeefgf', 'gfgfe', 'fgr', 'ffe', 'vbgffd', 'vbfdg', 1, '2020-02-26 11:50:48', '2020-02-26 11:50:48'),
(3, 'iojkj', 'ngy', ',mhg', 'oiujk', 'iuyug', 'iuh', 1, '2020-02-26 11:53:40', '2020-02-26 11:53:40'),
(4, 'tytguihkj', 'ghjknl', 'fghjkl', 'ghjkl', 'ytyugioj', 'ytugihojk', 1, '2020-02-26 11:58:26', '2020-02-26 11:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `tourpackagecategories`
--

CREATE TABLE `tourpackagecategories` (
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CategoryDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CategoryStatus` tinyint(1) DEFAULT NULL,
  `Imageaddress` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourpackagecategories`
--

INSERT INTO `tourpackagecategories` (`categoryId`, `CategoryName`, `CategoryDescription`, `CategoryStatus`, `Imageaddress`, `created_at`, `updated_at`) VALUES
(1, 'Ecotourism', 'All wildlife and forest reserves', 1, '947573.jpg', '2020-02-28 21:45:03', '2020-02-29 21:53:05'),
(2, 'Castles & Forts', 'Ancient Castles and forts', 1, '655797.jpg', '2020-02-28 21:47:34', '2020-03-03 12:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `tourpackageincludes`
--

CREATE TABLE `tourpackageincludes` (
  `TourPackageIncludeID` bigint(20) UNSIGNED NOT NULL,
  `TourIncludeID` bigint(20) UNSIGNED NOT NULL,
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourpackages`
--

CREATE TABLE `tourpackages` (
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `PackageName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PackageCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackagePrice` decimal(20,2) NOT NULL,
  `Imageaddress` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `categoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourpackages`
--

INSERT INTO `tourpackages` (`PackageId`, `PackageName`, `PackageCode`, `Description`, `PackagePrice`, `Imageaddress`, `Status`, `categoryId`, `created_at`, `updated_at`) VALUES
(1, 'Mole Park', 'MP001', 'Wildlife', '20.00', '423315.jpg', 0, 1, '2020-02-28 21:48:58', '2020-03-03 23:40:02'),
(2, 'Elmina Castle', 'EC001', 'Castle', '35.00', '366171.jpg', 1, 2, '2020-02-28 21:55:49', '2020-03-03 12:05:08'),
(3, 'Cape Coast Castle', 'CCC001', 'Ancient forts', '30.00', '484851.jpg', 1, 2, '2020-02-28 21:57:02', '2020-03-03 12:05:28'),
(4, 'fort Sabastien', 'FS001', 'FORT', '100.00', '996835.jpg', 1, 2, '2020-03-03 12:02:51', '2020-03-03 12:02:51'),
(5, 'Fort Amsterdam', 'FA001', 'FORT', '50.00', '429394.jpg', 1, 2, '2020-03-03 12:06:26', '2020-03-03 12:07:55'),
(6, 'San Antonio', 'SA001', 'FORT', '20.00', '422860.jpg', 1, 2, '2020-03-03 16:54:09', '2020-03-03 16:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `toursites`
--

CREATE TABLE `toursites` (
  `TourSitesID` bigint(20) UNSIGNED NOT NULL,
  `TourSiteName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourSiteDesc` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LocationID` bigint(20) UNSIGNED NOT NULL,
  `PackageId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourtransportations`
--

CREATE TABLE `tourtransportations` (
  `TourTransportationID` bigint(20) UNSIGNED NOT NULL,
  `TransportName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TransportDesc` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TransportCost` decimal(20,2) DEFAULT NULL,
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourtransportations`
--

INSERT INTO `tourtransportations` (`TourTransportationID`, `TransportName`, `TransportDesc`, `TransportCost`, `PackageId`, `created_at`, `updated_at`) VALUES
(1, 'Bus', NULL, '25.00', 1, '2020-02-28 21:51:19', '2020-03-03 11:00:11'),
(3, 'salon car', NULL, '30.00', 1, '2020-02-28 21:51:19', '2020-03-03 11:00:11'),
(4, 'vip', NULL, '40.00', 1, '2020-03-01 18:48:39', '2020-03-03 11:00:12'),
(5, 'VIP', NULL, '40.00', 3, '2020-03-03 11:30:15', '2020-03-03 11:30:15'),
(7, 'Mini van', NULL, '50.00', 2, '2020-03-03 11:40:59', '2020-03-03 11:40:59'),
(8, 'Bus', NULL, '40.00', 6, '2020-03-04 01:08:15', '2020-03-04 01:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `tourtypes`
--

CREATE TABLE `tourtypes` (
  `TourTypeID` bigint(20) UNSIGNED NOT NULL,
  `TourTypeName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TourTypeSize` bigint(20) NOT NULL,
  `SKU` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PackagePrice` decimal(20,2) NOT NULL,
  `PackageId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourtypes`
--

INSERT INTO `tourtypes` (`TourTypeID`, `TourTypeName`, `TourTypeSize`, `SKU`, `PackagePrice`, `PackageId`, `created_at`, `updated_at`) VALUES
(1, 'Organization', 30, 'MP001-O', '600.00', 1, '2020-02-28 21:50:19', '2020-03-03 10:41:33'),
(2, 'Individual', 1, 'MP001-I', '25.00', 1, '2020-02-28 21:50:19', '2020-03-03 10:41:33'),
(3, 'family', 5, 'MP001-F', '150.00', 1, '2020-02-28 21:50:19', '2020-03-03 10:41:33'),
(5, 'Organisation', 30, 'CCC0001-O', '700.00', 3, '2020-03-03 11:29:47', '2020-03-03 11:29:47'),
(6, 'Individual', 1, 'CCC000-1', '300.00', 3, '2020-03-03 11:29:47', '2020-03-03 11:29:47'),
(7, 'Family', 0, 'EC001-F', '300.00', 2, '2020-03-03 11:40:30', '2020-03-04 02:52:20'),
(8, 'Individual', 10, 'EC001-I', '35.00', 2, '2020-03-03 11:40:30', '2020-03-04 02:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactioninfos`
--

CREATE TABLE `transactioninfos` (
  `TransactionID` bigint(20) UNSIGNED NOT NULL,
  `TransactionCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransactionDateTimeMade` datetime DEFAULT NULL,
  `TransactionStatus` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PayingInfoID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userpaymentcards`
--

CREATE TABLE `userpaymentcards` (
  `VMCardID` bigint(20) UNSIGNED NOT NULL,
  `NameOnCard` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CardNumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `CVV` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `UserRoleId` bigint(20) UNSIGNED NOT NULL,
  `UserRoleName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserRoleLevel` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`UserRoleId`, `UserRoleName`, `UserRoleLevel`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', '1', '2020-02-18 00:00:00', NULL),
(2, 'USER', '2', '2020-02-18 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherNames` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SurName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `State` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherPhoneContact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `UserDelete?` tinyint(1) NOT NULL DEFAULT 1,
  `CountryId` bigint(20) UNSIGNED NOT NULL,
  `UserRoleID` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserEmail`, `OtherNames`, `SurName`, `Address`, `City`, `State`, `Mobile`, `OtherPhoneContact`, `Password`, `UserDelete?`, `CountryId`, `UserRoleID`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'yaw@gmail.com', 'Mensah', 'Yaw', 'AS-566-5544', 'kumasi', 'kotei', '0501591654', '0542500499', '$2y$10$HTxdp/4zAMVX6JVkNSCrBupX6UAtFVLo39vfmz/xh5I6TmNGABg.6', 1, 4, 2, NULL, '2020-02-18 18:22:13', '2020-02-18 18:22:13'),
(3, 'giddy@gmail.com', 'ogidi', 'Giddy', '1111', 'kumasi', 'ayeduase', '0542000000', '0202000000', '$2y$10$3RCPa4vO29uaVo4Nwt4JduGiYbY83ZG8SgmPQjL8YK0BFS0Stc5vW', 1, 288, 2, NULL, '2020-02-21 09:43:34', '2020-02-21 09:43:34'),
(4, 'ama@gmail.com', 'akyei', 'ama', 'AS-566-5000', 'oeiwqoe', 'ewuwe', '738464936', '9367493473', '$2y$10$xZC2gfro9PHj7N4PnCB6sOPnbqbvDUNWarzF9.YpMV/ePe4pwI7jW', 1, 12, 2, NULL, '2020-02-21 09:56:58', '2020-02-21 09:56:58'),
(6, 'gid@gmail.com', 'gid', 'Yaw', 'AS-506-5000', 'legon', 'accra', '1234567890', '1234567890', '$2y$10$jaMsABKNNMZmREI.gXxDPuCttMxnkJMsgC.q8wPe63mNYw2R.Z06C', 1, 64, 2, NULL, '2020-02-21 10:02:12', '2020-02-21 10:02:12'),
(9, 'gideon@gmail.com', 'gid', 'Yaw', 'AS-506-5000', 'legon', 'accra', '1234567890', '1234567890', '$2y$10$Pl6WEu50kYrKdr0kRdPFAeyKjwybHdpVqNDGaZW2jX.2itMWLGf2W', 1, 64, 2, NULL, '2020-02-21 10:03:50', '2020-02-21 10:03:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`AccommodationID`),
  ADD KEY `RefTourPackages54` (`PackageId`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`BannerId`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `RefUsers6` (`UserId`),
  ADD KEY `RefCoupons14` (`CouponId`),
  ADD KEY `RefTourIncludes17` (`TourIncludeID`),
  ADD KEY `RefCarts33` (`CartId`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CartId`),
  ADD KEY `RefTourPackages5` (`PackageId`),
  ADD KEY `RefTourPackages51` (`PackageName`),
  ADD KEY `RefTourPackages21` (`PackageCode`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`CouponId`),
  ADD UNIQUE KEY `CouponCode` (`CouponCode`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`CurrencyId`),
  ADD UNIQUE KEY `CurrencyCode` (`CurrencyCode`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`EnquiryId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`FeedbackId`),
  ADD KEY `RefBookings36` (`BookingId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobilemoneys`
--
ALTER TABLE `mobilemoneys`
  ADD PRIMARY KEY (`MobileMoneyID`),
  ADD KEY `RefUsers55` (`UserId`);

--
-- Indexes for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  ADD PRIMARY KEY (`SubscribersId`);

--
-- Indexes for table `packageimages`
--
ALTER TABLE `packageimages`
  ADD PRIMARY KEY (`PackageImagesId`),
  ADD KEY `RefTourPackages3` (`PackageId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payinginfos`
--
ALTER TABLE `payinginfos`
  ADD PRIMARY KEY (`PayingInfoID`),
  ADD KEY `RefPaymentInfo44` (`PaymentInfoID`);

--
-- Indexes for table `paymentapiinfos`
--
ALTER TABLE `paymentapiinfos`
  ADD PRIMARY KEY (`PayAPIInfoID`);

--
-- Indexes for table `paymentdeliverycosts`
--
ALTER TABLE `paymentdeliverycosts`
  ADD PRIMARY KEY (`PaymentDeliveryCostID`),
  ADD KEY `RefPaymentProvider41` (`PaymentProviderID`);

--
-- Indexes for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  ADD PRIMARY KEY (`PaymentInfoID`),
  ADD KEY `RefBookings38` (`BookingId`),
  ADD KEY `RefPaymentTaxation42` (`TaxID`),
  ADD KEY `RefPaymentType63` (`PTyID`);

--
-- Indexes for table `paymentproviders`
--
ALTER TABLE `paymentproviders`
  ADD PRIMARY KEY (`PaymentProviderID`);

--
-- Indexes for table `paymenttaxations`
--
ALTER TABLE `paymenttaxations`
  ADD PRIMARY KEY (`TaxID`),
  ADD UNIQUE KEY `TaxName` (`TaxName`);

--
-- Indexes for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`PTyID`),
  ADD KEY `RefPaymentProvider61` (`PaymentProviderID`);

--
-- Indexes for table `refundinfos`
--
ALTER TABLE `refundinfos`
  ADD PRIMARY KEY (`RefundInfoID`),
  ADD KEY `RefBookings24` (`BookingId`),
  ADD KEY `RefRefundPenalty25` (`RefundPenaltyID`),
  ADD KEY `RefundCreated` (`RefundCreated`),
  ADD KEY `RefundModified` (`RefundModifed`),
  ADD KEY `RefPaymentDeliveryCost62` (`PaymentDeliveryCostID`);

--
-- Indexes for table `refundpayings`
--
ALTER TABLE `refundpayings`
  ADD PRIMARY KEY (`RefundPayingID`),
  ADD KEY `RefPayingInfo64` (`PayingInfoID`),
  ADD KEY `RefRefundInfo65` (`RefundInfoID`);

--
-- Indexes for table `refundpenalties`
--
ALTER TABLE `refundpenalties`
  ADD PRIMARY KEY (`RefundPenaltyID`),
  ADD UNIQUE KEY `PenaltyCode` (`PenaltyCode`);

--
-- Indexes for table `tourincludes`
--
ALTER TABLE `tourincludes`
  ADD PRIMARY KEY (`TourIncludeID`),
  ADD KEY `RefTourPackages4` (`PackageId`);

--
-- Indexes for table `tourlocations`
--
ALTER TABLE `tourlocations`
  ADD PRIMARY KEY (`LocationID`),
  ADD KEY `RefTourPackages11` (`PackageId`);

--
-- Indexes for table `tourpackagecategories`
--
ALTER TABLE `tourpackagecategories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `tourpackageincludes`
--
ALTER TABLE `tourpackageincludes`
  ADD PRIMARY KEY (`TourPackageIncludeID`),
  ADD KEY `RefTourIncludes28` (`TourIncludeID`),
  ADD KEY `RefTourPackages29` (`PackageId`);

--
-- Indexes for table `tourpackages`
--
ALTER TABLE `tourpackages`
  ADD PRIMARY KEY (`PackageId`),
  ADD UNIQUE KEY `PackageCode` (`PackageCode`),
  ADD KEY `RefTourPackageCategories4` (`categoryId`);

--
-- Indexes for table `toursites`
--
ALTER TABLE `toursites`
  ADD PRIMARY KEY (`TourSitesID`),
  ADD KEY `RefTourLocation18` (`LocationID`),
  ADD KEY `RefTourPackages37` (`PackageId`);

--
-- Indexes for table `tourtransportations`
--
ALTER TABLE `tourtransportations`
  ADD PRIMARY KEY (`TourTransportationID`),
  ADD KEY `RefTourPackages20` (`PackageId`);

--
-- Indexes for table `tourtypes`
--
ALTER TABLE `tourtypes`
  ADD PRIMARY KEY (`TourTypeID`),
  ADD KEY `RefTourPackages28` (`PackageId`);

--
-- Indexes for table `transactioninfos`
--
ALTER TABLE `transactioninfos`
  ADD PRIMARY KEY (`TransactionID`),
  ADD UNIQUE KEY `TransactionCode` (`TransactionCode`),
  ADD KEY `RefPayingInfo49` (`PayingInfoID`);

--
-- Indexes for table `userpaymentcards`
--
ALTER TABLE `userpaymentcards`
  ADD PRIMARY KEY (`VMCardID`),
  ADD KEY `RefUsers56` (`UserId`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`UserRoleId`),
  ADD UNIQUE KEY `UserRoleName` (`UserRoleName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`),
  ADD KEY `RefCountries34` (`CountryId`),
  ADD KEY `RefUserRole47` (`UserRoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `AccommodationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `BannerId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `BookingId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CartId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=895;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `CouponId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `CurrencyId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `EnquiryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `FeedbackId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `mobilemoneys`
--
ALTER TABLE `mobilemoneys`
  MODIFY `MobileMoneyID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  MODIFY `SubscribersId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packageimages`
--
ALTER TABLE `packageimages`
  MODIFY `PackageImagesId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payinginfos`
--
ALTER TABLE `payinginfos`
  MODIFY `PayingInfoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentapiinfos`
--
ALTER TABLE `paymentapiinfos`
  MODIFY `PayAPIInfoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentdeliverycosts`
--
ALTER TABLE `paymentdeliverycosts`
  MODIFY `PaymentDeliveryCostID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  MODIFY `PaymentInfoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentproviders`
--
ALTER TABLE `paymentproviders`
  MODIFY `PaymentProviderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenttaxations`
--
ALTER TABLE `paymenttaxations`
  MODIFY `TaxID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `PTyID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refundinfos`
--
ALTER TABLE `refundinfos`
  MODIFY `RefundInfoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refundpayings`
--
ALTER TABLE `refundpayings`
  MODIFY `RefundPayingID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refundpenalties`
--
ALTER TABLE `refundpenalties`
  MODIFY `RefundPenaltyID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourincludes`
--
ALTER TABLE `tourincludes`
  MODIFY `TourIncludeID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tourlocations`
--
ALTER TABLE `tourlocations`
  MODIFY `LocationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tourpackagecategories`
--
ALTER TABLE `tourpackagecategories`
  MODIFY `categoryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tourpackageincludes`
--
ALTER TABLE `tourpackageincludes`
  MODIFY `TourPackageIncludeID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourpackages`
--
ALTER TABLE `tourpackages`
  MODIFY `PackageId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toursites`
--
ALTER TABLE `toursites`
  MODIFY `TourSitesID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourtransportations`
--
ALTER TABLE `tourtransportations`
  MODIFY `TourTransportationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tourtypes`
--
ALTER TABLE `tourtypes`
  MODIFY `TourTypeID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactioninfos`
--
ALTER TABLE `transactioninfos`
  MODIFY `TransactionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userpaymentcards`
--
ALTER TABLE `userpaymentcards`
  MODIFY `VMCardID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `UserRoleId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `RefCarts33` FOREIGN KEY (`CartId`) REFERENCES `carts` (`CartId`),
  ADD CONSTRAINT `RefCoupons14` FOREIGN KEY (`CouponId`) REFERENCES `coupons` (`CouponId`),
  ADD CONSTRAINT `RefTourIncludes17` FOREIGN KEY (`TourIncludeID`) REFERENCES `tourincludes` (`TourIncludeID`),
  ADD CONSTRAINT `RefUsers6` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `RefBookings36` FOREIGN KEY (`BookingId`) REFERENCES `bookings` (`BookingId`);

--
-- Constraints for table `mobilemoneys`
--
ALTER TABLE `mobilemoneys`
  ADD CONSTRAINT `RefUsers55` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);

--
-- Constraints for table `packageimages`
--
ALTER TABLE `packageimages`
  ADD CONSTRAINT `RefTourPackages3` FOREIGN KEY (`PackageId`) REFERENCES `tourpackages` (`PackageId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  ADD CONSTRAINT `RefBookings38` FOREIGN KEY (`BookingId`) REFERENCES `bookings` (`BookingId`),
  ADD CONSTRAINT `RefPaymentTaxation42` FOREIGN KEY (`TaxID`) REFERENCES `paymenttaxations` (`TaxID`),
  ADD CONSTRAINT `RefPaymentType63` FOREIGN KEY (`PTyID`) REFERENCES `paymenttypes` (`PTyID`);

--
-- Constraints for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD CONSTRAINT `RefPaymentProvider61` FOREIGN KEY (`PaymentProviderID`) REFERENCES `paymentproviders` (`PaymentProviderID`);

--
-- Constraints for table `refundinfos`
--
ALTER TABLE `refundinfos`
  ADD CONSTRAINT `RefBookings24` FOREIGN KEY (`BookingId`) REFERENCES `bookings` (`BookingId`),
  ADD CONSTRAINT `RefPaymentDeliveryCost62` FOREIGN KEY (`PaymentDeliveryCostID`) REFERENCES `paymentdeliverycosts` (`PaymentDeliveryCostID`),
  ADD CONSTRAINT `RefRefundPenalty25` FOREIGN KEY (`RefundPenaltyID`) REFERENCES `refundpenalties` (`RefundPenaltyID`),
  ADD CONSTRAINT `RefundCreated` FOREIGN KEY (`RefundCreated`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `RefundModified` FOREIGN KEY (`RefundModifed`) REFERENCES `users` (`UserId`);

--
-- Constraints for table `refundpayings`
--
ALTER TABLE `refundpayings`
  ADD CONSTRAINT `RefPayingInfo64` FOREIGN KEY (`PayingInfoID`) REFERENCES `payinginfos` (`PayingInfoID`),
  ADD CONSTRAINT `RefRefundInfo65` FOREIGN KEY (`RefundInfoID`) REFERENCES `refundinfos` (`RefundInfoID`);

--
-- Constraints for table `tourpackageincludes`
--
ALTER TABLE `tourpackageincludes`
  ADD CONSTRAINT `RefTourIncludes28` FOREIGN KEY (`TourIncludeID`) REFERENCES `tourincludes` (`TourIncludeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefTourPackages29` FOREIGN KEY (`PackageId`) REFERENCES `tourpackages` (`PackageId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toursites`
--
ALTER TABLE `toursites`
  ADD CONSTRAINT `RefTourLocation18` FOREIGN KEY (`LocationID`) REFERENCES `tourlocations` (`LocationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefTourPackages37` FOREIGN KEY (`PackageId`) REFERENCES `tourpackages` (`PackageId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transactioninfos`
--
ALTER TABLE `transactioninfos`
  ADD CONSTRAINT `RefPayingInfo49` FOREIGN KEY (`PayingInfoID`) REFERENCES `payinginfos` (`PayingInfoID`);

--
-- Constraints for table `userpaymentcards`
--
ALTER TABLE `userpaymentcards`
  ADD CONSTRAINT `RefUsers56` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `1` FOREIGN KEY (`CountryId`) REFERENCES `countries` (`CountryId`) ON DELETE CASCADE,
  ADD CONSTRAINT `RefCountries34` FOREIGN KEY (`CountryId`) REFERENCES `countries` (`CountryId`) ON DELETE CASCADE,
  ADD CONSTRAINT `RefUserRole47` FOREIGN KEY (`UserRoleID`) REFERENCES `userroles` (`UserRoleId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
