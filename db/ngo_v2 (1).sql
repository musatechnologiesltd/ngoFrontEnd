-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 12:21 PM
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
-- Database: `ngo_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_name_ban` varchar(255) NOT NULL,
  `admin_mobile` varchar(255) NOT NULL,
  `designation_list_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `admin_sign` varchar(255) DEFAULT NULL,
  `admin_job_start_date` varchar(255) DEFAULT NULL,
  `admin_job_end_date` varchar(255) DEFAULT NULL,
  `admin_image` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `admin_email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_name_ban`, `admin_mobile`, `designation_list_id`, `branch_id`, `admin_sign`, `admin_job_start_date`, `admin_job_end_date`, `admin_image`, `email`, `admin_email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'super admin', 'super admin ban', '123456789', 1, 1, NULL, NULL, NULL, NULL, 'superadmin@gmail.com', NULL, '$2y$10$1XhX.6fAN5R6qbYDX2yOWOn3mr0ljag1YM/hPupP9hUvL898JnTMG', NULL, '2023-07-15 02:30:29', '2023-07-15 02:30:29'),
(3, 'test_name', 'tb', '01646735100', 2, 3, 'public/uploads/adminImage/userOne.png', '2023-07-27', '2023-07-31', 'public/uploads/adminImage/user4.png', 'ttt@gmail.com', NULL, '$2y$10$Mvfmrs.mUpdonm5yxncuLOoiKt34ihXwvC//z1hbWLmFrjRY3R8ce', NULL, '2023-07-18 00:33:53', '2023-07-18 00:33:53'),
(4, 'Kamruzzaman kajol', 'Kamruzzaman kajol', '01646735100', 4, 5, 'public/uploads/adminImage/demo.jpg', '2023-07-30', NULL, 'public/uploads/adminImage/6y.png', 'kkajol428@gmail.com', NULL, '$2y$10$7ULk6S4azzFNkXi.HgjSee24VWC9cfd2W.qz1WDIu.988y/YR9zwG', NULL, '2023-07-19 03:09:07', '2023-07-19 03:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_code`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'super admin', '2023-07-15 02:30:29', '2023-07-15 02:30:29'),
(3, 'Test', 'Test-123', '2023-07-17 22:01:20', '2023-07-17 22:01:20'),
(4, 'branchOne', 'branchOne - 234', '2023-07-17 23:23:32', '2023-07-17 23:23:32'),
(5, 'Computer', '101', '2023-07-19 00:12:19', '2023-07-19 00:12:19'),
(6, 'Computer', '101', '2023-07-21 23:25:19', '2023-07-21 23:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_iso_code` varchar(255) DEFAULT NULL,
  `country_name_english` varchar(255) DEFAULT NULL,
  `country_name_bangla` varchar(255) DEFAULT NULL,
  `country_people_english` varchar(255) DEFAULT NULL,
  `country_people_bangla` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_iso_code`, `country_name_english`, `country_name_bangla`, `country_people_english`, `country_people_bangla`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'আফগানিস্তান', 'Afghanistan', 'আফগান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(2, 'AL', 'Albania', 'আলবেনিয়া', 'Albanian', 'আলবেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(3, 'DZ', 'Algeria', 'আলজেরিয়া', 'Algerian', 'আলজেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(4, 'AD', 'Andorra', 'অ্যান্ডোরা', 'Andorran', 'অ্যান্ডোরান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(5, 'AO', 'Angola', 'অ্যাঙ্গোলা', 'Angolan', 'অ্যাঙ্গোলান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(6, 'AG', 'Antigua and Barbuda', 'অ্যান্টিগুয়া ও বার্বুডা', 'Antiguan and Barbudan', 'অ্যান্টিগুয়ান এবং বারবুডান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(7, 'AR', 'Argentina', 'আর্জেন্টিনা', 'Argentinian', 'আর্জেন্টিনীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(8, 'AM', 'Armenia', 'আর্মেনিয়া', 'Armenian', 'আর্মেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(9, 'AW', 'Aruba', 'আরুবা', 'Aruban', 'আরুবান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(10, 'AU', 'Australia', 'অস্ট্রেলিয়া', 'Australian', 'অস্ট্রেলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(11, 'AT', 'Austria', 'অস্ট্রিয়া', 'Austrian', 'অস্ট্রিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(12, 'AZ', 'Azerbaijan', 'আজারবাইজান', 'Azerbaijani', 'আজারবাইজানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(13, 'BS', 'Bahamas', 'বাহামাস', 'Bahamian', 'বাহামিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(14, 'BH', 'Bahrain', 'বাহরাইন', 'Bahraini', 'বাহরাইনি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(15, 'BD', 'Bangladesh', 'বাংলাদেশ', 'Bangladeshi', 'বাংলাদেশী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(16, 'BB', 'Barbados', 'বার্বাডোস', 'Barbadian', 'বার্বাডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(17, 'BY', 'Belarus', 'বেলারুস', 'Belarusian', 'বেলারুশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(18, 'BE', 'Belgium', 'বেলজিয়াম', 'Belgian', 'বেলজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(19, 'BZ', 'Belize', 'বেলিজ', 'Belizean', 'বেলিজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(20, 'BJ', 'Benin', 'বেনিন', 'Beninese', 'বেনিনীজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(21, 'BT', 'Bhutan', 'ভুটান', 'Bhutanese', 'ভুটানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(22, 'BO', 'Bolivia', 'বলিভিয়া', 'Bolivian', 'বলিভিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(23, 'BW', 'Botswana', 'বতসোয়ানা', 'Batswana', 'বাতসোয়ানা', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(24, 'BR', 'Brazil', 'ব্রাজিল', 'Brazilian', 'ব্রাজিলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(25, 'BG', 'Bulgaria', 'বুলগেরিয়া', 'Bulgarian', 'বুলগেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(26, 'BI', 'Burundi', 'বুরুন্ডি', 'Umurundi', 'উমুরুন্ডি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(27, 'KH', 'Cambodia', 'কাম্বোডিয়া', 'Cambodian', 'কম্বোডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(28, 'CM', 'Cameroon', 'ক্যামেরুন', 'Cameroonian', 'ক্যামেরুনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(29, 'CA', 'Canada', 'কানাডা', 'Canadian', 'কানাডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(30, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'মধ্য আফ্রিকান প্রজাতন্ত্র', '', '', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(31, 'TD', 'Chad', 'চাদ', 'Chadian', 'চাদিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(32, 'CL', 'Chile', 'চিলি', 'Chilean', 'চিলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(33, 'CN', 'China', 'চীন', 'Chinese', 'চাইনিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(34, 'CO', 'Colombia', 'কলম্বিয়া', 'Colombian', 'কলম্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(35, 'CG', 'CONGO', 'কঙ্গো', 'Congolese', 'কঙ্গোলিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(36, 'CR', 'Costa Rica', 'কোস্টারিকা', 'Costa Rican', 'কোস্টারিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(37, 'HR', 'Croatia', 'ক্রোয়েশিয়া', 'Croatian', 'ক্রোয়েশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(38, 'CU', 'Cuba', 'কিউবা', 'Cuban', 'কিউবান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(39, 'CY', 'CYPRUS', 'সাইপ্রাস', '', '', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(40, 'CZ', 'Czech Republic', 'চেক প্রজাতন্ত্র', 'Czech', 'চেক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(41, 'DK', 'Denmark', 'ডেনমার্ক', 'Danish', 'ড্যানিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(42, 'DJ', 'Djibouti', 'জিবুতি', 'Djiboutian', 'জিবুতিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(43, 'DM', 'Dominica', 'ডোমিনিকা', 'Dominican', 'ডোমিনিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(44, 'DO', 'Dominican Republic', 'ডোমিনিকান রিপাবলিক', 'Dominican', 'ডোমিনিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(45, 'EC', 'Ecuador', 'ইকুয়েডর', 'Ecuadorian', 'ইকুয়েডরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(46, 'EG', 'Egypt', 'মিশর', 'Egyptian', 'মিশরীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(47, 'SV', 'El Salvador', 'এল সালভাদর', 'সালভাডোরিয়ান', 'Salvadorian', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(48, 'GQ', 'Equatorial Guinea', 'বিষুবীয় গিনি', 'Equatoguinean', 'বিষুবীযয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(49, 'ER', 'Eritrea', 'ইরিত্রিয়া', 'Eritrean', 'ইরিত্রিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(50, 'EE', 'Estonia', 'এস্তোনিয়া', 'Estonian', 'এস্তোনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(51, 'ET', 'Ethiopia', 'ইথিওপিয়া', 'Ethiopian', 'ইথিওপিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(52, 'FJ', 'Fiji', 'ফিজি', 'Fijian', 'ফিজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(53, 'FI', 'Finland', 'ফিনল্যান্ড', 'Finnish', 'ফিনিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(54, 'FR', 'France', 'ফ্রান্স', 'French', 'ফরাসি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(55, 'GA', 'Gabon', 'গ্যাবন', 'Gabonese', 'গ্যাবোনিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(56, 'GM', 'Gambia', 'গাম্বিয়া', 'Gambian', 'গাম্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(57, 'GE', 'Georgia', 'জর্জিয়া', 'Georgian', 'জর্জিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(58, 'DE', 'Germany', 'জার্মানি', 'German', 'জার্মান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(59, 'GH', 'Ghana', 'ঘানা', 'Ghanaian', 'ঘানাইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(60, 'GR', 'Greece', 'গ্রীস', 'Greek', 'গ্রীক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(61, 'GL', 'Greenland', 'গ্রীনল্যান্ড', 'Greenlander', 'গ্রীনল্যান্ডার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(62, 'GD', 'Grenada', 'গ্রেনাডা', 'Grenadian', 'গ্রেনাডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(63, 'GT', 'Guatemala', 'গুয়াতেমালা', 'Guatemalan', 'গুয়াতেমালান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(64, 'GN', 'Guinea', 'গিনি', 'Guinean', 'গিনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(65, 'GW', 'Guinea-Bissau', 'গিনি-বিসাউ', 'Bissau-Guinean', 'বিসাউ-গুইনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(66, 'GY', 'Guyana', 'গায়ানা', 'Guyanese', 'গায়ানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(67, 'HT', 'Haiti', 'হাইতি', 'Haitian', 'হাইতিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(68, 'VA', 'Vatican City', 'ভ্যাটিকান সিটি', 'Vaticanian', 'ভ্যাটিকানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(69, 'HN', 'Honduras', 'হন্ডুরাস', 'Honduran', 'হন্ডুরান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(70, 'HK', 'Hong Kong', 'হংকং', 'Hongkonger', 'হংকংগার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(71, 'HU', 'Hungary', 'হাঙ্গেরি', 'Hungarian', 'হাঙ্গেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(72, 'IS', 'Iceland', 'আইসল্যান্ড', 'Icelandic', 'আইসল্যান্ডিক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(73, 'IN', 'India', 'ভারত', 'Indian', 'ভারতীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(74, 'ID', 'Indonesia', 'ইন্দোনেশিয়া', 'Indonesian', 'ইন্দোনেশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(75, 'IR', 'Iran', 'ইরান (ইসলামি প্রজাতন্ত্র)', 'Iranian', 'ইরানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(76, 'IQ', 'Iraq', 'ইরাক', 'Iraqi', 'ইরাকি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(77, 'IE', 'Ireland', 'আয়ারল্যান্ড', 'Irish', 'আইরিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(78, 'IT', 'Italy', 'ইতালি', 'Italian', 'ইতালীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(79, 'JM', 'Jamaica', 'জামাইকা', 'Jamaican', 'জ্যামাইকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(80, 'JP', 'Japan', 'জাপান', 'Japanese', 'জাপানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(81, 'JO', 'Jordan', 'জর্ডান', 'Jordanian', 'জর্ডানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(82, 'KZ', 'Kazakhstan', 'কাজাখস্তান', 'Kazakhstani', 'কাজাখস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(83, 'KE', 'Kenya', 'কেনিয়া', 'Kenyan', 'কেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(84, 'KI', 'Kiribati', 'কিরিবাতি', 'I-Kiribati', 'আই-কিরিবাতি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(85, 'KP', 'South Korea', 'দক্ষিণ কোরিয়া', 'Korean', 'কোরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(86, 'NK', 'North Korea', 'উত্তর কোরিয়া', 'Korean', 'কোরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(87, 'KR', 'South Korea', 'দক্ষিণ কোরিয়া', 'South Korean', 'দক্ষিণ কোরীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(88, 'KW', 'Kuwait', 'কুয়েত', 'Kuwaiti', 'কুয়েতি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(89, 'KG', 'Kyrgyzstan', 'কিরগিজস্তান', 'Kyrgyz', 'কিরগিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(90, 'LV', 'Latvia', 'লাটভিয়া', 'Latvian', 'লাটভিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(91, 'LB', 'Lebanon', 'লেবানন', 'Lebanese', 'লেবানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(92, 'LS', 'Lesotho', 'লেসোথো', 'Basotho', 'বাসোথো', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(93, 'LR', 'Liberia', 'লাইবেরিয়া', 'Liberian', 'লাইবেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(94, 'LY', 'Libya', 'লিবিয়া', 'Libyan', 'লিবিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(95, 'LI', 'Liechtenstein', 'লিচেনস্টেইন', 'Liechtensteiner', 'লিচেনস্টাইনার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(96, 'LT', 'Lithuania', 'লিথুয়ানিয়া', 'Lithuanian', 'লিথুয়ানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(97, 'LU', 'Luxembourg', 'লুক্সেমবার্গ', 'Luxembourger', 'লুক্সেমবার্গার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(98, 'MK', 'North Macedonia', 'উত্তর মেসিডোনিয়া', 'Macedonian', 'ম্যাসেডোনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(99, 'MG', 'Madagascar', 'মাদাগাস্কার', 'Malagasy', 'মালাগাসি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(100, 'MW', 'Malawi', 'মালাউই', 'Malawian', 'মালাউইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(101, 'MY', 'Malaysia', 'মালয়েশিয়া', 'Malaysian', 'মালয়েশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(102, 'MV', 'Maldives', 'মালদ্বীপ', 'Maldivian', 'মালদ্বীপীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(103, 'ML', 'Mali', 'মালি', 'Malian', 'মালিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(104, 'MT', 'Malta', 'মাল্টা', 'Maltese', 'মাল্টিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(105, 'MH', 'Marshall Islands', 'মার্শাল দ্বীপপুঞ্জ', 'Marshallese', 'মার্শালিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(106, 'MR', 'Mauritania', 'মৌরিতানিয়া', 'Mauritanian', 'মৌরিতানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(107, 'MU', 'Mauritian', 'মরিশাস', 'Mauritian', 'মৌরিশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(108, 'MX', 'Mexico', 'মেক্সিকো', 'Mexican', 'মেক্সিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(109, 'MD', 'Moldova', 'মলডোভা', 'Moldovan', 'মলডোভান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(110, 'MC', 'Monaco', 'মোনাকো', 'Monacan', 'মোনাকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(111, 'MN', 'Mongolia', 'মঙ্গোলিয়া', 'Mongolian', 'মঙ্গোলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(112, 'MA', 'Morocco', 'মরক্কো', 'Moroccan', 'মরক্কান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(113, 'MZ', 'Mozambique', 'মোজাম্বিক', 'Mozambican', 'মোজাম্বিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(114, 'MM', 'Myanmar', 'মায়ানমার', 'Myanma', 'মায়ানমা', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(115, 'NA', 'Namibia', 'নামিবিয়া', 'Namibian', 'নামিবিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(116, 'NR', 'Nauru', 'নাউরু', 'Nauruan', 'নাউরুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(117, 'NP', 'Nepal', 'নেপাল', 'Nepalese', 'নেপালি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(118, 'NL', 'Netherlands', 'নেদারল্যান্ডস', 'Dutch', 'ডাচ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(119, 'AN', 'Netherlands Antilles', 'নেদারল্যান্ডস এন্টিলস', 'Netherlands Antillean', 'নেদারল্যান্ডস এন্টিলয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(120, 'NZ', 'New Zealand', 'নিউজিল্যান্ড', 'New Zealander', 'নিউজিল্যান্ডীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(121, 'NI', 'Nicaragua', 'নিকারাগুয়া', 'Nicaraguan', 'নিকারাগুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(122, 'NE', 'Niger', 'নাইগার', 'Nigerien', 'নাইগেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(123, 'NG', 'Nigeria', 'নাইজেরিয়া', 'Nigerian', 'নাইজেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(124, 'NU', 'Niue', 'নিউই', 'Niuean', 'নিউইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(125, 'NO', 'Norway', 'নরওয়ে', 'Norwegian', 'নরওয়েজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(126, 'OM', 'Oman', 'ওমান', 'Omani', 'ওমানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(127, 'PK', 'Pakistan', 'পাকিস্তান', 'Pakistani', 'পাকিস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(128, 'PW', 'Palau', 'পালাউ', 'Palauan', 'পালাউয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(129, 'PS', 'State of Palestine', 'ফিলিস্তিন', 'Palestinian', 'ফিলিস্তিনি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(130, 'PA', 'Panama', 'পানামা', 'Panamanian', 'পানামানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(131, 'PG', 'Papua New Guinea', 'পাপুয়া নিউ গিনি', 'Papua New Guinean', 'পাপুয়া নিউ গিনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(132, 'PY', 'Paraguay', 'প্যারাগুয়ে', 'Paraguayan', 'প্যারাগুইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(133, 'PE', 'Peru', 'পেরু', 'Peruvian', 'পেরুভিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(134, 'PH', 'Philippines', 'ফিলিপাইনস', 'Philippine', 'ফিলিপিনো', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(135, 'PL', 'Poland', 'পোল্যান্ড', 'Polish', 'পোলিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(136, 'PT', 'Portugal', 'পর্তুগাল', 'Portuguese', 'পর্তুগীজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(137, 'QA', 'Qatar', 'কাতার', 'Qatari', 'কাতারি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(138, 'RO', 'Romania', 'রোমানিয়া', 'Romanian', 'রোমানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(139, 'RU', 'Russia', 'রাশিয়ান', 'Russian', 'রাশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(140, 'RW', 'Rwanda', 'রুয়ান্ডা', 'Rwandan', 'রুয়ান্ডান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(141, 'KN', 'Saint Kitts and Nevis', 'সেন্ট কিটস ও নেভিস', 'Nevisian', 'নেভিসিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(142, 'LC', 'Saint Lucia', 'সেন্ট লুসিয়া', 'Saint Lucian', 'সেন্ট লুসিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(143, 'VC', 'Saint Vincent and the Grenadines', 'ভিনসেন্ট এবং গ্রেনাডাইনস', 'Vincentian and Grenadinian', 'ভিনসেন্টিয়ান এবং গ্রেনাডিনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(144, 'WS', 'Samoa', 'সামোয়া', 'Samoan', 'সামোয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(145, 'SM', 'San Marino', 'সান মারিনো', 'Sammarinese', 'সামারিনিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(146, 'ST', 'Sao Tome & Principe', 'সাও টোমে এবং প্রিনসিপে', 'Santomean', 'সান্টোমিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(147, 'SA', 'Saudi Arabia', 'সৌদি আরব', 'Saudi', 'সৌদি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(148, 'SN', 'Senegal', 'সেনেগাল', 'Senegalese', 'সেনেগালিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(149, 'CS', 'Serbia', 'সার্বিয়া', 'Serbian', 'সার্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(150, 'SC', 'Seychelles', 'সেচেলস', 'Seychellois', 'সেচেলোইস', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(151, 'SL', 'Sierra Leone', 'সিয়েরা লিওন', 'Sierra Leonean', 'সিয়েরা লিওনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(152, 'SG', 'Singapore', 'সিঙ্গাপুর', 'Singaporean', 'সিঙ্গাপুরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(153, 'SK', 'Slovakia', 'স্লোভাকিয়া', 'Slovak', 'স্লোভাক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(154, 'SI', 'Slovenia', 'স্লোভেনিয়া', 'Slovenian', 'স্লোভেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(155, 'SB', 'SOLOMON ISLANDS', 'সলোমান দ্বীপপুঞ্জ', 'Solomon Islander', 'সলোমন দ্বীপবাসী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(156, 'SO', 'SOMALIA', 'সোমালিয়া', 'Somali', 'সোমালি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(157, 'ZA', 'South Africa', 'দক্ষিন আফ্রিকা', 'South African', 'দক্ষিণ আফ্রিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(158, 'ES', 'Spain', 'স্পেন', 'Spanish', 'স্প্যানিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(159, 'LK', 'Sri Lanka', 'শ্রীলংকা', 'Sri Lankan', 'শ্রীলঙ্কান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(160, 'SD', 'Sudan', 'সুদান', 'Sudanese', 'সুদানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(161, 'SR', 'Suriname', 'সুরিনাম', 'Surinamese', 'সুরিনামিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(162, 'SZ', 'Eswatini', 'এস্বাতিনী', 'Emaswati', 'এমস্বতী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(163, 'SE', 'Sweden', 'সুইডেন', 'Swedish', 'সুইডিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(164, 'CH', 'Switzerland', 'সুইজারল্যান্ড', 'Swiss', 'সুইস', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(165, 'SY', 'Syria', 'সিরিয়া', 'Syrian', 'সিরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(166, 'TW', 'TAIWAN', 'তাইওয়ান', 'Taiwanese', 'তাইওয়ানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(167, 'TJ', 'Tajikistan', 'তাজিকিস্তান', 'Tajikistani', 'তাজিকিস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(168, 'TZ', 'Tanzania', 'তানজানিয়া', 'Tanzanian', 'তানজানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(169, 'TH', 'Thailand', 'থাইল্যান্ড', 'Thai', 'থাই', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(170, 'TL', 'TIMOR-LESTE', 'টিমোর-লেস্টে', 'Timorese', 'তিমোরিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(171, 'TG', 'Togo', 'টোগো', 'Togolese', 'টোগোলিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(172, 'TO', 'Tonga', 'টোঙ্গা', 'Tongan', 'টোঙ্গান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(173, 'TT', 'TRINIDAD AND TOBAGO', 'ত্রিনিদাদ ও টোবাগো', 'Trinidadian and Tobagonian', 'ত্রিনিদাদীয় এবং টোবাগোনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(174, 'TN', 'Tunisia', 'তিউনিসিয়া', 'Tunisian', 'তিউনিসিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(175, 'TR', 'Turkey', 'তুরস্ক', 'Turkish', 'তুর্কি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(176, 'TM', 'Turkmenistan', 'তুর্কমেনিস্তান', 'Turkmenistani', 'তুর্কমেনিস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(177, 'TV', 'Tuvalu', 'টুভালু', 'Tuvaluan', 'টুভালুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(178, 'UG', 'Uganda', 'উগান্ডা', 'Ugandan', 'উগান্ডান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(179, 'UA', 'Ukraine', 'ইউক্রেন', 'Ukrainian', 'ইউক্রেনীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(180, 'AE', 'United Arab Emirates', 'সংযুক্ত আরব আমিরাত', 'Emirati', 'আমিরাতি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(181, 'GB', 'United Kingdom', 'যুক্তরাজ্য', 'British', 'ব্রিটিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(182, 'US', 'United States', 'যুক্তরাষ্ট্র', 'American', 'আমেরিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(183, 'Vi', 'Vietnam', 'ভিয়েতনাম', 'Vietnamese', 'ভিয়েতনামী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(184, 'UY', 'Uruguay', 'উরুগুয়ে', 'Uruguayan', 'উরুগুইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(185, 'UZ', 'Uzbekistan', 'উজবেকিস্তান', 'Uzbekistani', 'উজবেকিস্তানী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(186, 'VU', 'Vanuatu', 'ভানুয়াটু', 'Vanuatuan', 'ভানুয়াটুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(187, 'VE', 'Venezuela', 'ভেনেজুয়েলা', 'Venezuelan', 'ভেনেজুয়েলান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(188, 'YE', 'Yemen', 'ইয়েমেন', 'Yemeni', 'ইয়েমেনি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(189, 'ZM', 'Zambia', 'জাম্বিয়া', 'Zambian', 'জাম্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(190, 'ZW', 'Zimbabwe', 'জিম্বাবুয়ে', 'Zimbabwean', 'জিম্বাবুইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(191, 'La', 'Laos', 'লাওস', 'Lao', 'লাও', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(192, 'Sc', 'Scotland', 'স্কটল্যান্ড', 'Scottish', 'স্কটিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(193, 'Wa', 'Wales', 'ওয়েলস', 'Welsh', 'ওয়েলশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `designation_lists`
--

CREATE TABLE `designation_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_lists`
--

INSERT INTO `designation_lists` (`id`, `branch_id`, `designation_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'super admin', '2023-07-15 02:30:29', '2023-07-15 02:30:29'),
(2, 3, 'test desi', '2023-07-17 22:37:30', '2023-07-17 22:37:30'),
(3, 4, 'desi_two', '2023-07-17 23:24:03', '2023-07-17 23:24:03'),
(4, 5, 'Programmer', '2023-07-19 00:13:19', '2023-07-19 00:13:19'),
(5, 4, 'Programmer', '2023-07-21 23:25:38', '2023-07-21 23:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `designation_steps`
--

CREATE TABLE `designation_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_list_id` bigint(20) UNSIGNED NOT NULL,
  `designation_step` varchar(255) NOT NULL,
  `designation_serial` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_steps`
--

INSERT INTO `designation_steps` (`id`, `designation_list_id`, `designation_step`, `designation_serial`, `created_at`, `updated_at`) VALUES
(1, 1, 'super admin', 'super admin', '2023-07-15 02:30:29', '2023-07-15 02:30:29'),
(2, 2, '1', '1', '2023-07-17 23:22:54', '2023-07-17 23:22:54'),
(3, 3, '22', '22', '2023-07-17 23:24:21', '2023-07-17 23:24:44'),
(4, 5, '11', '111', '2023-07-21 23:26:06', '2023-07-21 23:26:06');

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
-- Table structure for table `fd9_foreigner_employee_family_member_lists`
--

CREATE TABLE `fd9_foreigner_employee_family_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd9_form_id` bigint(20) UNSIGNED NOT NULL,
  `family_member_name` varchar(255) DEFAULT NULL,
  `family_member_age` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_foreigner_employee_family_member_lists`
--

INSERT INTO `fd9_foreigner_employee_family_member_lists` (`id`, `fd9_form_id`, `family_member_name`, `family_member_age`, `created_at`, `updated_at`) VALUES
(1, 1, '6qrtwdbAPC', '222', '2023-07-15 03:31:04', '2023-07-15 03:31:04'),
(2, 1, '2ewe', '33', '2023-07-15 03:31:05', '2023-07-15 03:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `fd9_forms`
--

CREATE TABLE `fd9_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `fd9_foreigner_name` varchar(255) DEFAULT NULL,
  `fd9_father_name` varchar(255) DEFAULT NULL,
  `fd9_husband_or_wife_name` varchar(255) DEFAULT NULL,
  `fd9_mother_name` varchar(255) DEFAULT NULL,
  `fd9_birth_place` varchar(255) DEFAULT NULL,
  `fd9_dob` varchar(255) DEFAULT NULL,
  `fd9_passport_number` varchar(255) DEFAULT NULL,
  `fd9_passport_issue_date` varchar(255) DEFAULT NULL,
  `fd9_passport_expiration_date` varchar(255) DEFAULT NULL,
  `fd9_identification_mark_given_in_passport` varchar(255) DEFAULT NULL,
  `fd9_male_or_female` varchar(255) DEFAULT NULL,
  `fd9_marital_status` varchar(255) DEFAULT NULL,
  `fd9_nationality_or_citizenship` varchar(255) DEFAULT NULL,
  `fd9_details_if_multiple_citizenships` varchar(255) DEFAULT NULL,
  `fd9_previous_citizenship_is_grounds_for_non_retention` varchar(255) DEFAULT NULL,
  `fd9_current_address` varchar(255) DEFAULT NULL,
  `fd9_number_of_family_members` varchar(255) DEFAULT NULL,
  `fd9_academic_qualification` varchar(255) DEFAULT NULL,
  `fd9_technical_and_other_qualifications_if_any` varchar(255) DEFAULT NULL,
  `fd9_past_experience` varchar(255) DEFAULT NULL,
  `fd9_countries_that_have_traveled` varchar(255) DEFAULT NULL,
  `fd9_offered_post` varchar(255) DEFAULT NULL,
  `fd9_name_of_proposed_project` varchar(255) DEFAULT NULL,
  `fd9_date_of_appointment` varchar(255) DEFAULT NULL,
  `fd9_extension_date` varchar(255) DEFAULT NULL,
  `fd9_post_available_for_foreigner_and_working` varchar(255) DEFAULT NULL,
  `fd9_previous_work_experience_in_bangladesh` varchar(255) DEFAULT NULL,
  `fd9_total_foreigner_working` varchar(255) DEFAULT NULL,
  `fd9_other_information` varchar(255) DEFAULT NULL,
  `fd9_foreigner_passport_size_photo` varchar(255) DEFAULT NULL,
  `fd9_copy_of_passport` varchar(255) DEFAULT NULL,
  `verified_fd_nine_form` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_forms`
--

INSERT INTO `fd9_forms` (`id`, `n_visa_id`, `fd9_foreigner_name`, `fd9_father_name`, `fd9_husband_or_wife_name`, `fd9_mother_name`, `fd9_birth_place`, `fd9_dob`, `fd9_passport_number`, `fd9_passport_issue_date`, `fd9_passport_expiration_date`, `fd9_identification_mark_given_in_passport`, `fd9_male_or_female`, `fd9_marital_status`, `fd9_nationality_or_citizenship`, `fd9_details_if_multiple_citizenships`, `fd9_previous_citizenship_is_grounds_for_non_retention`, `fd9_current_address`, `fd9_number_of_family_members`, `fd9_academic_qualification`, `fd9_technical_and_other_qualifications_if_any`, `fd9_past_experience`, `fd9_countries_that_have_traveled`, `fd9_offered_post`, `fd9_name_of_proposed_project`, `fd9_date_of_appointment`, `fd9_extension_date`, `fd9_post_available_for_foreigner_and_working`, `fd9_previous_work_experience_in_bangladesh`, `fd9_total_foreigner_working`, `fd9_other_information`, `fd9_foreigner_passport_size_photo`, `fd9_copy_of_passport`, `verified_fd_nine_form`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'hzXbOzzTqe', 'DsFxasfA1I', 'L2u1MizIez', 'ZYoo97UJRQ', 'Ie6M2jD9jH', '2023-07-20', 'hoLWLhJCk6', '2023-07-19', '2023-07-20', 'jVtwRGMNBn', 'পুরুষ', 'বিবাহিত', 'আফগান', 'cvbnvcn', 'bnbv', '222', '2222', 'uploads/fd9FormInfo/16894134643065801513sample.pdf', 'uploads/fd9FormInfo/16894134646353926049sample.pdf', 'uploads/fd9FormInfo/16894134646420319001sample.pdf', '23232', 'uploads/fd9FormInfo/16894134641737308924dummy.pdf', 'uploads/fd9FormInfo/16894134643375249030dummy.pdf', 'নতুন', '2023-07-19', '33', '333', '333', '2324', 'public/uploads/fd9FormInfo/16894134645794631996userFive.png', 'uploads/fd9FormInfo/16894134645008868735dummy.pdf', 'uploads/fd9FormInfo/16894291986674284410dummy.pdf', NULL, '2023-07-15 03:31:04', '2023-07-15 07:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `fd9_one_forms`
--

CREATE TABLE `fd9_one_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `foreigner_name_for_subject` varchar(255) DEFAULT NULL,
  `sarok_number` varchar(255) DEFAULT NULL,
  `application_date` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `prokolpo_name` varchar(255) DEFAULT NULL,
  `designation_name` varchar(255) DEFAULT NULL,
  `foreigner_name_for_body` varchar(255) DEFAULT NULL,
  `expire_from_date` varchar(255) DEFAULT NULL,
  `expire_to_date` varchar(255) DEFAULT NULL,
  `attestation_of_appointment_letter` varchar(255) DEFAULT NULL,
  `copy_of_form_nine` varchar(255) DEFAULT NULL,
  `foreigner_image` varchar(255) DEFAULT NULL,
  `arrival_date_in_nvisa` varchar(255) DEFAULT NULL,
  `copy_of_nvisa` varchar(255) DEFAULT NULL,
  `proposed_from_date` varchar(255) DEFAULT NULL,
  `proposed_to_date` varchar(255) DEFAULT NULL,
  `verified_fd_nine_one_form` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_one_forms`
--

INSERT INTO `fd9_one_forms` (`id`, `fd_one_form_id`, `foreigner_name_for_subject`, `sarok_number`, `application_date`, `institute_name`, `prokolpo_name`, `designation_name`, `foreigner_name_for_body`, `expire_from_date`, `expire_to_date`, `attestation_of_appointment_letter`, `copy_of_form_nine`, `foreigner_image`, `arrival_date_in_nvisa`, `copy_of_nvisa`, `proposed_from_date`, `proposed_to_date`, `verified_fd_nine_one_form`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'dewqd', 'qweqw', '2023-07-18', 'qweqw', 'qwewq', 'test_designation34', 'weqwe', '2023-07-26', '2023-07-29', 'uploads/fd9OneFormInfo/16894136419136769940sample.pdf', 'uploads/fd9OneFormInfo/16894136416777325866sample.pdf', 'public/uploads/fd9OneFormInfo/16894136417447573605user4.png', '2023-07-18', 'uploads/fd9OneFormInfo/16894136411204062608dummy.pdf', '2023-07-24', '2023-07-31', 'uploads/fd9OneFormInfo/16894292131352867555dummy.pdf', NULL, '2023-07-15 03:34:01', '2023-07-15 07:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_adviser_lists`
--

CREATE TABLE `fd_one_adviser_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_adviser_lists`
--

INSERT INTO `fd_one_adviser_lists` (`id`, `fd_one_form_id`, `name`, `information`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'unit_add', 'fdfds', '14:46:00 pm', '2023-07-15 02:46:00', '2023-07-15 02:46:00'),
(5, 5, '555', '555', '14:57:26 pm', '2023-07-24 02:57:26', '2023-07-24 02:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_bank_accounts`
--

CREATE TABLE `fd_one_bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `name_of_bank` varchar(255) DEFAULT NULL,
  `branch_name_of_bank` varchar(255) DEFAULT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_bank_accounts`
--

INSERT INTO `fd_one_bank_accounts` (`id`, `fd_one_form_id`, `account_number`, `account_type`, `name_of_bank`, `branch_name_of_bank`, `bank_address`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'fdsfds', 'fsdfdsf', 'sdfd', 'sdfs', 'sdfds', '14:46:00 pm', '2023-07-15 02:46:00', '2023-07-15 02:46:00'),
(5, 5, 'tryrty', '33', '33', '33', 'qweqw', '14:57:26 pm', '2023-07-24 02:57:26', '2023-07-24 02:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_forms`
--

CREATE TABLE `fd_one_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `registration_number_given_by_admin` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `organization_name_ban` varchar(255) DEFAULT NULL,
  `organization_address` varchar(255) DEFAULT NULL,
  `address_of_head_office` varchar(255) DEFAULT NULL,
  `address_of_head_office_eng` varchar(255) DEFAULT NULL,
  `country_of_origin` varchar(255) DEFAULT NULL,
  `name_of_head_in_bd` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `plan_of_operation` text DEFAULT NULL,
  `local_address` varchar(255) DEFAULT NULL,
  `annual_budget` varchar(255) DEFAULT NULL,
  `treasury_number` text DEFAULT NULL,
  `attach_the__supporting_paper` text DEFAULT NULL,
  `vat_invoice_number` text DEFAULT NULL,
  `board_of_revenue_on_fees` text DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `complete_status` text DEFAULT NULL,
  `verified_fd_one_form` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_forms`
--

INSERT INTO `fd_one_forms` (`id`, `user_id`, `registration_number`, `registration_number_given_by_admin`, `organization_name`, `organization_name_ban`, `organization_address`, `address_of_head_office`, `address_of_head_office_eng`, `country_of_origin`, `name_of_head_in_bd`, `job_type`, `address`, `district`, `phone`, `email`, `citizenship`, `profession`, `plan_of_operation`, `local_address`, `annual_budget`, `treasury_number`, `attach_the__supporting_paper`, `vat_invoice_number`, `board_of_revenue_on_fees`, `time_for_api`, `complete_status`, `verified_fd_one_form`, `created_at`, `updated_at`) VALUES
(1, 1, '1863', '7493951141738010', 'Padma Hut', 'Padma Hut', 'Padma Hut', 'বাড্ডা ,ঢাকা', 'Badda,Dhaka', 'বাংলাদেশ', 'Kamruzzaman kajol', 'Full-Time', 'Rajshahi', 'gaibandha', '01646735100', 'kkajol428@gmail.com', 'Bangladeshi', 'পেশা নাই', 'uploads/FdOneForm/16894106878599065505sample.pdf', '0', '4534', '23343', 'uploads/attach_the_supporting_papers/16894107608924705009dummy.pdf', '4545', 'uploads/board_of_revenue_on_fees/16894107607178925569dummy.pdf', '14:43:24', 'save_and_exit_from_three', 'uploads/verifiedFdOneForm/16894109483189589021dummy.pdf', '2023-07-15 02:43:24', '2023-07-15 02:49:08'),
(5, 3, '1122', '2253700566853007', 'RdLRVPrcQO', 'RLWsojyR48', 'DfXLhdJBA1', 'r8gO4bawNh', 'K7SazO4EJ4', 'বাংলাদেশ', 'lPge51yXCX', 'Full-Time', 'hPIhbkAm6X', '55', '06201155555', 'q5pwh@o40t.com', 'Afghanistan,Andorran', '8ESEQh9JiW', 'uploads/FdOneForm/16901889867766333050sample.pdf', '0', '5555', '23343', 'uploads/attach_the_supporting_papers/16901890464446001616sample.pdf', '4545', 'uploads/board_of_revenue_on_fees/16901890461406498510sample.pdf', '14:56:06', 'save_and_exit_from_three', 'uploads/verifiedFdOneForm/16901910971093956611sample.pdf', '2023-07-24 02:56:06', '2023-07-24 03:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_member_lists`
--

CREATE TABLE `fd_one_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_join` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `salary_statement` text DEFAULT NULL,
  `other_occupation` text DEFAULT NULL,
  `now_working_at` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_member_lists`
--

INSERT INTO `fd_one_member_lists` (`id`, `fd_one_form_id`, `name`, `position`, `address`, `date_of_join`, `citizenship`, `salary_statement`, `other_occupation`, `now_working_at`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'zbw5o2w7C7', 'SHFbevtVgc', '6F4RLS7c2Z', 'PrhpBF2ffG', 'Welsh,Vietnamese', 'mseszLiVcn', 'wrAdMKM4tK', NULL, '14:45:24', '2023-07-15 02:45:24', '2023-07-15 02:45:24'),
(2, 1, 'NDadGCrgHd', 'yZedMn0MFr', '6IAfocKnW9', '6tIdil2EdT', 'Welsh,Zimbabwean', 'GXN3zTr3sV', '1nQtFmh65j', NULL, '14:45:24', '2023-07-15 02:45:24', '2023-07-15 02:45:24'),
(3, 1, '2Np3H6VKzr', 'ofcId97gh4', 'pbuQ3hbWwm', 'udNSIv3iER', 'Welsh,Zambian', 'v9jGPBJHsD', 'TKBN38ou7q', NULL, '14:45:24', '2023-07-15 02:45:25', '2023-07-15 02:45:25'),
(4, 1, 'urrWxW6eVa', 'QnTGTMzOVa', 'j4amfedels', 'aYJtNqoFVP', 'Welsh,Uzbekistani', 'r0Ppka1CH3', 'IhoF4kBZG4', NULL, '14:45:24', '2023-07-15 02:45:25', '2023-07-15 02:45:25'),
(5, 1, 'wwHoHXE0I5', 'LUSb9dyqv0', 'CjoNaO7OvI', 'tOk4AII7HG', 'Welsh,Zambian', 'JlGoBWhCkx', '8WpJHrfaoN', NULL, '14:45:24', '2023-07-15 02:45:25', '2023-07-15 02:45:25'),
(31, 5, 'BoZpxGIgjr', 'AMnoDsX9Te', 'VDchPRvkPc', '2023-07-24', 'Welsh,Lao', '3ywxycstGa', '54TtVmqTAI', NULL, '14:56:57', '2023-07-24 02:56:57', '2023-07-24 02:56:57'),
(32, 5, 'dS9PGe0B4F', 'BMshrdxggO', 'SkGsQqwVHY', '2023-07-18', 'Welsh,Zambian', 'EPZN09FWee', 'wm3FgmQBdk', NULL, '14:56:57', '2023-07-24 02:56:57', '2023-07-24 02:56:57'),
(33, 5, 'EkrBtqWnCr', 'BnjSabr2EC', 'T03gnku24v', '2023-07-12', 'Welsh,Zambian', 'zHG4xMBkcm', 't6AQtXSJU8', NULL, '14:56:57', '2023-07-24 02:56:57', '2023-07-24 02:56:57'),
(34, 5, 'dG4x0Q4EPy', 'shk7ShOupg', 'YdOgdKt1Df', '2023-07-19', 'Welsh,Zimbabwean', 'qHG9c6cBCV', '1alTIgNwXo', NULL, '14:56:57', '2023-07-24 02:56:57', '2023-07-24 02:56:57'),
(35, 5, 'jbk5hHkzeH', 'ft1nQ7Hnmv', 'oA2Mt4Vutp', '2023-07-14', 'Welsh,Zambian', 'XBzAkNLABU', '8mghTUrRVG', NULL, '14:56:57', '2023-07-24 02:56:57', '2023-07-24 02:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_other_pdf_lists`
--

CREATE TABLE `fd_one_other_pdf_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `information_pdf` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_other_pdf_lists`
--

INSERT INTO `fd_one_other_pdf_lists` (`id`, `fd_one_form_id`, `information_pdf`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/FdOneOtherPdfList/16894107605694228606dummy.pdf', '14:46:00 pm', '2023-07-15 02:46:00', '2023-07-15 02:46:00'),
(5, 5, 'uploads/FdOneOtherPdfList/16901890461963535597sample.pdf', '14:57:26 pm', '2023-07-24 02:57:26', '2023-07-24 02:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_source_of_funds`
--

CREATE TABLE `fd_one_source_of_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `letter_file` text DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_source_of_funds`
--

INSERT INTO `fd_one_source_of_funds` (`id`, `fd_one_form_id`, `name`, `address`, `letter_file`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'ff', 'ff', 'uploads/FdOneSourceOfFund/16894106871487242294dummy.pdf', '14:44:47', '2023-07-15 02:44:47', '2023-07-15 02:44:47'),
(2, 1, 'ffr', 'ffr5', 'uploads/FdOneSourceOfFund/16894106875117131939dummy.pdf', '14:44:47', '2023-07-15 02:44:47', '2023-07-15 02:44:47'),
(7, 5, '55', '555', 'uploads/FdOneSourceOfFund/16901889868838024391sample.pdf', '14:56:26', '2023-07-24 02:56:26', '2023-07-24 02:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `form_complete_statuses`
--

CREATE TABLE `form_complete_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_step_one_status` tinyint(4) NOT NULL,
  `fd_one_form_step_two_status` tinyint(4) NOT NULL,
  `fd_one_form_step_three_status` tinyint(4) NOT NULL,
  `fd_one_form_step_four_status` tinyint(4) NOT NULL,
  `form_eight_status` tinyint(4) NOT NULL,
  `ngo_member_status` tinyint(4) NOT NULL,
  `ngo_member_nid_photo_status` tinyint(4) NOT NULL,
  `ngo_other_document_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_complete_statuses`
--

INSERT INTO `form_complete_statuses` (`id`, `user_id`, `fd_one_form_step_one_status`, `fd_one_form_step_two_status`, `fd_one_form_step_three_status`, `fd_one_form_step_four_status`, `form_eight_status`, `ngo_member_status`, `ngo_member_nid_photo_status`, `ngo_other_document_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-15 02:43:25', '2023-07-15 03:10:44'),
(5, 3, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-24 02:56:06', '2023-07-24 03:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `form_eights`
--

CREATE TABLE `form_eights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_slug` varchar(255) DEFAULT NULL,
  `desi` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `nid_no` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `name_supouse` varchar(255) DEFAULT NULL,
  `edu_quali` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `job_des` varchar(255) DEFAULT NULL,
  `service_status` varchar(255) DEFAULT NULL,
  `form_date` varchar(255) DEFAULT NULL,
  `to_date` varchar(255) DEFAULT NULL,
  `total_year` varchar(255) DEFAULT NULL,
  `time_for_api` text DEFAULT NULL,
  `complete_status` varchar(255) DEFAULT NULL,
  `verified_form_eight` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_eights`
--

INSERT INTO `form_eights` (`id`, `fd_one_form_id`, `name`, `name_slug`, `desi`, `dob`, `nid_no`, `phone`, `father_name`, `present_address`, `permanent_address`, `name_supouse`, `edu_quali`, `profession`, `job_des`, `service_status`, `form_date`, `to_date`, `total_year`, `time_for_api`, `complete_status`, `verified_form_eight`, `created_at`, `updated_at`) VALUES
(1, 1, '7accs3uQKY', '7accs3uqky', 'xO3ZTvwh0S', '22-07-2023', 'EnV47isMUf', '595579', 'DHBl4h83UZ', 'KYut69CSPn', 'LCoAzQmLwA', 'dTvyc8SfTl', 'fxX2Onhh5z', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'ueozhjsPR1', 'হ্যাঁ', '15/07/2023', '15/07/2023', '1 years, 1 months', '14:46:24', 'complete', 'uploads/FdOneOtherPdfList/16894122693324283522dummy.pdf', '2023-07-15 02:46:24', '2023-07-15 03:11:09'),
(7, 5, 'cmEw3qTLo0', 'cmew3qtlo0', 'EuX1hCs4xo', '24-07-2023', 'z4z4nLdtBp', '96870466666', 'Zmb739gWVj', '0odmAB2Gdn', 'dYqGmYfUU5', '52S9HjHBwZ', 'iKwqu2MIRd', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'SBFbVCFukd', 'হ্যাঁ', '2023-07-24', '2023-07-29', '0 বছর 1 মাস', '14:57:46', 'complete', 'uploads/FdOneOtherPdfList/16901911109357474090sample.pdf', '2023-07-24 02:57:46', '2023-07-24 03:31:50'),
(8, 5, 'xBOUArbi4w', 'xbouarbi4w', 'rbnnYHQlHo', '31-07-2023', 'F33aBLMytC', '65492166666', 'ZTJWssWSH2', 'IMOkbIuyH8', 'EuPmobW5C5', 'Aww3nRMA8g', 'CbwlxxyP2H', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', '84zndstuq5', 'হ্যাঁ', '2023-07-24', '2023-07-29', '0 বছর 1 মাস', '14:58:04', 'complete', NULL, '2023-07-24 02:58:04', '2023-07-24 03:27:32'),
(9, 5, 'R7Ykl7BhNo', 'r7ykl7bhno', 'eFQcfUHGVY', '25-07-2023', 'K5M2BLcleH', '132976', 'M9HMIkIUv0', 'FXbWDMQ4En', 'JkjQVOcfs5', 'ObkbCeTaae', 'boL8DcAnSe', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত<', '6uxOUU7t8O', 'হ্যাঁ', NULL, NULL, NULL, '15:35:31', NULL, NULL, '2023-07-24 03:35:31', '2023-07-24 03:35:31'),
(10, 5, 'NFEnJAYQbr', 'nfenjayqbr', 'D2KIXW80Pz', '24-07-2023', '9fiDtuwZAp', '635280', 'wc0U18NIxU', 's0hUtfD30d', 'MMcAX9wBoM', 'Iq90m1leUf', '7xo25nsWuG', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত<', 'jE3EFblmkD', 'হ্যাঁ', NULL, NULL, NULL, '15:41:17', NULL, NULL, '2023-07-24 03:41:17', '2023-07-24 03:41:17'),
(11, 5, '1oXDpzcbku', '1oxdpzcbku', '42Dmo6spwh', '31-07-2023', '2cnTYGu6bW', '44669755555', '0bl0FPbvIU', 'iS48FzQ7jn', '4OryBeMHI0', 'TU82fknUvK', 'xJ8vlC59C1', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত<', 'NaVjvN4JDu', 'হ্যাঁ', NULL, NULL, NULL, '15:48:47', NULL, NULL, '2023-07-24 03:48:47', '2023-07-24 03:48:47'),
(14, 5, '7mTOirK2y9', '7mtoirk2y9', '1hiD8iR7l6', '25-07-2023', '1IGaTDupoV', '05203977777', '8MZ2D1Qr6x', 'hlX9Lu9BHi', 'LmLmrU2Xkh', 'LmJghdUifI', 'v1t54I5nkh', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত<', 'SxJpSN2MFP', 'হ্যাঁ', NULL, NULL, NULL, '15:57:39', NULL, NULL, '2023-07-24 03:57:39', '2023-07-24 03:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `forwarding_letters`
--

CREATE TABLE `forwarding_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `fd9_form_id` varchar(200) DEFAULT NULL,
  `apply_date` varchar(255) NOT NULL,
  `apply_month_name` varchar(255) NOT NULL,
  `apply_year_name` varchar(255) NOT NULL,
  `sarok_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forwarding_letters`
--

INSERT INTO `forwarding_letters` (`id`, `admin_id`, `fd9_form_id`, `apply_date`, `apply_month_name`, `apply_year_name`, `sarok_number`, `created_at`, `updated_at`) VALUES
(2, 2, '1', '15', 'July', '2023', '2312323', '2023-07-15 11:36:01', '2023-07-15 11:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `forwarding_letter_onulipis`
--

CREATE TABLE `forwarding_letter_onulipis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forwarding_letter_id` bigint(20) UNSIGNED NOT NULL,
  `onulipi_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forwarding_letter_onulipis`
--

INSERT INTO `forwarding_letter_onulipis` (`id`, `forwarding_letter_id`, `onulipi_name`, `created_at`, `updated_at`) VALUES
(3, 2, '33', '2023-07-15 11:36:01', '2023-07-15 11:36:01'),
(4, 2, '3333', '2023-07-15 11:36:02', '2023-07-15 11:36:02');

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
(5, '2023_02_19_141335_create_users_verify_table', 1),
(6, '2023_04_29_050937_create_ngo_type_and_languages_table', 1),
(7, '2023_04_29_051221_create_fd_one_forms_table', 1),
(8, '2023_04_29_062111_create_form_eights_table', 1),
(9, '2023_04_29_064036_create_ngo_member_nid_photos_table', 1),
(10, '2023_04_29_064124_create_ngo_other_docs_table', 1),
(11, '2023_04_29_073920_create_ngo_renew_infos_table', 1),
(12, '2023_04_29_075709_create_ngo_statuses_table', 1),
(13, '2023_04_29_080557_create_countries_table', 1),
(14, '2023_05_02_055346_create_ngo_member_lists_table', 1),
(15, '2023_06_03_053430_create_ngo_durations_table', 1),
(16, '2023_06_04_064656_create_fd_one_adviser_lists_table', 1),
(17, '2023_06_04_064838_create_fd_one_bank_accounts_table', 1),
(18, '2023_06_04_065340_create_fd_one_member_lists_table', 1),
(19, '2023_06_04_065416_create_fd_one_other_pdf_lists_table', 1),
(20, '2023_06_04_065630_create_fd_one_source_of_funds_table', 1),
(21, '2023_06_04_070023_create_ngo_name_changes_table', 1),
(22, '2023_06_04_074058_create_ngo_renews_table', 1),
(23, '2023_06_17_070207_create_form_complete_statuses_table', 1),
(24, '2023_06_24_064127_create_n_visas_table', 1),
(25, '2023_07_04_050859_create_n_visa_particular_of_sponsor_or_employers_table', 1),
(26, '2023_07_04_051156_create_n_visa_particulars_of_foreign_incumbnets_table', 1),
(27, '2023_07_04_051404_create_n_visa_employment_information_table', 1),
(28, '2023_07_04_051509_create_n_visa_work_place_addresses_table', 1),
(29, '2023_07_04_051617_create_n_visa_compensation_and_benifits_table', 1),
(30, '2023_07_04_051708_create_n_visa_manpower_of_the_offices_table', 1),
(31, '2023_07_04_051821_create_n_visa_necessary_document_for_work_permits_table', 1),
(32, '2023_07_04_061019_create_n_visa_authorized_personal_of_the_orgs_table', 1),
(33, '2023_07_08_074843_create_fd9_forms_table', 1),
(34, '2023_07_08_075015_create_fd9_foreigner_employee_family_member_lists_table', 1),
(35, '2023_07_09_063215_create_fd9_one_forms_table', 1),
(36, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(37, '2023_05_05_080336_create_permission_tables', 2),
(38, '2023_05_06_060503_create_system_information_table', 2),
(39, '2023_07_15_072135_create_branches_table', 2),
(40, '2023_07_15_072327_create_designation_lists_table', 2),
(41, '2023_07_15_073752_create_designation_steps_table', 2),
(42, '2023_07_15_074320_create_admins_table', 2),
(43, '2023_07_15_075924_create_forwarding_letters_table', 2),
(44, '2023_07_15_075949_create_forwarding_letter_onulipis_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 4),
(3, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_durations`
--

CREATE TABLE `ngo_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `ngo_duration_start_date` varchar(255) DEFAULT NULL,
  `ngo_duration_end_date` varchar(255) DEFAULT NULL,
  `ngo_status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_durations`
--

INSERT INTO `ngo_durations` (`id`, `fd_one_form_id`, `ngo_duration_start_date`, `ngo_duration_end_date`, `ngo_status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-07-15', '2033-07-15', 'Accepted', NULL, '2023-07-15 03:12:27', '2023-07-15 03:12:27'),
(2, 1, '2023-07-15', '2033-07-15', 'Accepted', NULL, '2023-07-15 03:14:18', '2023-07-15 03:14:18'),
(3, 5, '2023-07-24', '2033-07-24', 'Accepted', NULL, '2023-07-24 03:32:53', '2023-07-24 03:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_member_lists`
--

CREATE TABLE `ngo_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_name_slug` varchar(255) DEFAULT NULL,
  `member_designation` varchar(255) DEFAULT NULL,
  `member_dob` varchar(255) DEFAULT NULL,
  `member_nid_no` varchar(255) DEFAULT NULL,
  `member_mobile` varchar(255) DEFAULT NULL,
  `member_father_name` varchar(255) DEFAULT NULL,
  `member_present_address` text DEFAULT NULL,
  `member_permanent_address` text DEFAULT NULL,
  `member_name_supouse` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `verified_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_member_lists`
--

INSERT INTO `ngo_member_lists` (`id`, `fd_one_form_id`, `member_name`, `member_name_slug`, `member_designation`, `member_dob`, `member_nid_no`, `member_mobile`, `member_father_name`, `member_present_address`, `member_permanent_address`, `member_name_supouse`, `time_for_api`, `verified_file`, `created_at`, `updated_at`) VALUES
(1, 1, 'eUlzAjSw8j', 'eulzajsw8j', 'CrxKN5ayre', '30-07-2023', 'GulqzIENHn', '98007833333', 'VICtfdehwX', 'DhKIluPsIp', 'd2JMDQ0Fgx', 'lq4leAqSFC', '14:47:04', '0', '2023-07-15 02:47:04', '2023-07-15 02:47:04'),
(8, 5, 'rIJGIUmfwI', 'rijgiumfwi', 'wBEgabBSOF', '31-07-2023', 'CEJ4dUAPtr', '86203733333', 'tBcFNAakqK', 'vqsf3bUSf4', '7M3FTl1J3v', '45oTYe1YNZ', '15:29:52', '0', '2023-07-24 03:29:52', '2023-07-24 03:29:52'),
(9, 5, 'avbXWamT6k', 'avbxwamt6k', 'a47FZsX2hN', '31-07-2023', 's36HtdBSWb', '94087000000', 'dT94Z8mtJS', 'Y9EnC4SyPI', 'H6Kz4brINK', 'P9Ws2wzWX4', '15:30:15', '0', '2023-07-24 03:30:15', '2023-07-24 03:30:15'),
(10, 5, '6zC19ngS0f', '6zc19ngs0f', '1G4lFWXfP8', '17-07-2023', '083NrSm7tG', '28705155555', 'L1Xc36BiJn', 'v8WZunT9x2', '6E2XYDVEyi', 'VorbNyIOLJ', '15:41:44', NULL, '2023-07-24 03:41:44', '2023-07-24 03:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_member_nid_photos`
--

CREATE TABLE `ngo_member_nid_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_image` varchar(255) DEFAULT NULL,
  `member_nid_copy` varchar(255) DEFAULT NULL,
  `member_nid_copy_size` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_member_nid_photos`
--

INSERT INTO `ngo_member_nid_photos` (`id`, `fd_one_form_id`, `member_name`, `member_image`, `member_nid_copy`, `member_nid_copy_size`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'dd', 'public/uploads/NgoMemberNidPhoto/16894108799676342335userFive.png', 'uploads/NgoMemberNidPhoto/16894108796075442757dummy.pdf', '0.01', '14:47:59', '2023-07-15 02:47:59', '2023-07-15 02:47:59'),
(2, 1, 'ddddd', 'public/uploads/NgoMemberNidPhoto/16894108799651551206userTwo.png', 'uploads/NgoMemberNidPhoto/16894108791493239851sample.pdf', '0.00', '14:47:59', '2023-07-15 02:47:59', '2023-07-15 02:47:59'),
(7, 5, '44', 'public/uploads/NgoMemberNidPhoto/16901910442773483219user3.png', 'uploads/NgoMemberNidPhoto/16901910441164131790sample.pdf', '0.00', '15:30:44', '2023-07-24 03:30:44', '2023-07-24 03:30:44'),
(8, 5, '000', 'public/uploads/NgoMemberNidPhoto/16901910441203159804user2.jpg', 'uploads/NgoMemberNidPhoto/16901910448330784311sample.pdf', '0.00', '15:30:44', '2023-07-24 03:30:44', '2023-07-24 03:30:44'),
(9, 5, 'p', 'public/uploads/NgoMemberNidPhoto/16901916248575263649user3.png', 'uploads/NgoMemberNidPhoto/16901916245313545458sample.pdf', '0.00', '15:40:24', '2023-07-24 03:40:24', '2023-07-24 03:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_name_changes`
--

CREATE TABLE `ngo_name_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `previous_name_eng` varchar(255) DEFAULT NULL,
  `previous_name_ban` varchar(255) DEFAULT NULL,
  `present_name_eng` varchar(255) DEFAULT NULL,
  `present_name_ban` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_name_changes`
--

INSERT INTO `ngo_name_changes` (`id`, `fd_one_form_id`, `previous_name_eng`, `previous_name_ban`, `present_name_eng`, `present_name_ban`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(5, 5, 'RdLRVPrcQO', 'RLWsojyR48', 'Test Ngo1', 'টেস্ট এনজিও1', 'Ongoing', '16:01:14 pm', '2023-07-24 04:01:14', '2023-07-24 04:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_other_docs`
--

CREATE TABLE `ngo_other_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_file_list` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_other_docs`
--

INSERT INTO `ngo_other_docs` (`id`, `fd_one_form_id`, `pdf_file_list`, `time_for_api`, `file_size`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/NgoOtherDoc/16894109164748810209dummy.pdf', '14:48:36 pm', '0.01', '2023-07-15 02:48:36', '2023-07-15 02:48:36'),
(2, 1, 'uploads/NgoOtherDoc/16894109176827265398dummy.pdf', '14:48:36 pm', '0.01', '2023-07-15 02:48:37', '2023-07-15 02:48:37'),
(3, 1, 'uploads/NgoOtherDoc/16894109175890679226dummy.pdf', '14:48:36 pm', '0.01', '2023-07-15 02:48:37', '2023-07-15 02:48:37'),
(4, 1, 'uploads/NgoOtherDoc/16894109178561127198dummy.pdf', '14:48:36 pm', '0.01', '2023-07-15 02:48:37', '2023-07-15 02:48:37'),
(5, 1, 'uploads/NgoOtherDoc/16894109176075273135dummy.pdf', '14:48:36 pm', '0.01', '2023-07-15 02:48:37', '2023-07-15 02:48:37'),
(6, 1, 'uploads/NgoOtherDoc/16894109173813912644dummy.pdf', '14:48:36 pm', '0.01', '2023-07-15 02:48:37', '2023-07-15 02:48:37'),
(13, 5, 'uploads/NgoOtherDoc/16901910772646172696sample.pdf', '15:31:17 pm', '0.00', '2023-07-24 03:31:17', '2023-07-24 03:31:17'),
(14, 5, 'uploads/NgoOtherDoc/16901910779163345607sample.pdf', '15:31:17 pm', '0.00', '2023-07-24 03:31:17', '2023-07-24 03:31:17'),
(15, 5, 'uploads/NgoOtherDoc/16901910777632614185sample.pdf', '15:31:17 pm', '0.00', '2023-07-24 03:31:17', '2023-07-24 03:31:17'),
(16, 5, 'uploads/NgoOtherDoc/16901910775343792046sample.pdf', '15:31:17 pm', '0.00', '2023-07-24 03:31:17', '2023-07-24 03:31:17'),
(17, 5, 'uploads/NgoOtherDoc/16901910775398263564sample.pdf', '15:31:17 pm', '0.00', '2023-07-24 03:31:17', '2023-07-24 03:31:17'),
(18, 5, 'uploads/NgoOtherDoc/16901910778357187864sample.pdf', '15:31:17 pm', '0.00', '2023-07-24 03:31:17', '2023-07-24 03:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_renews`
--

CREATE TABLE `ngo_renews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_renews`
--

INSERT INTO `ngo_renews` (`id`, `fd_one_form_id`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(2, 5, 'Ongoing', '16:07:00 pm', '2023-07-24 04:07:00', '2023-07-24 04:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_renew_infos`
--

CREATE TABLE `ngo_renew_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `organization_address` varchar(255) DEFAULT NULL,
  `address_of_head_office` varchar(255) DEFAULT NULL,
  `country_of_origin` varchar(255) DEFAULT NULL,
  `name_of_head_in_bd` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_new` varchar(255) DEFAULT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_new` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `telephone_number_new` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `plan_of_operation` text DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `fee_paid_status` varchar(255) DEFAULT NULL,
  `supporting_paper` text DEFAULT NULL,
  `foregin_pdf` varchar(255) DEFAULT NULL,
  `yearly_budget` varchar(255) DEFAULT NULL,
  `copy_of_chalan` varchar(255) DEFAULT NULL,
  `due_vat_pdf` varchar(255) DEFAULT NULL,
  `change_ac_number` varchar(255) DEFAULT NULL,
  `main_account_number` varchar(255) DEFAULT NULL,
  `main_account_type` varchar(255) DEFAULT NULL,
  `main_account_name_of_branch` varchar(255) DEFAULT NULL,
  `name_of_bank` varchar(255) DEFAULT NULL,
  `bank_address_main` varchar(255) DEFAULT NULL,
  `web_site_name` varchar(255) DEFAULT NULL,
  `mobile_new` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_renew_infos`
--

INSERT INTO `ngo_renew_infos` (`id`, `user_id`, `registration_number`, `organization_name`, `organization_address`, `address_of_head_office`, `country_of_origin`, `name_of_head_in_bd`, `job_type`, `address`, `phone`, `phone_new`, `fd_one_form_id`, `email`, `email_new`, `telephone_number`, `telephone_number_new`, `citizenship`, `profession`, `plan_of_operation`, `district`, `sub_district`, `fee_paid_status`, `supporting_paper`, `foregin_pdf`, `yearly_budget`, `copy_of_chalan`, `due_vat_pdf`, `change_ac_number`, `main_account_number`, `main_account_type`, `main_account_name_of_branch`, `name_of_bank`, `bank_address_main`, `web_site_name`, `mobile_new`, `mobile`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 3, '1122', 'RdLRVPrcQO', 'DfXLhdJBA1', 'r8gO4bawNh', NULL, 'lPge51yXCX', 'পূর্ণকালীন', 'hPIhbkAm6X', '06201155555', '55555555555', 5, 'q5pwh@o40t.com', 'kkajol55428@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/NgoRenewInfo/16901929596470801795sample.pdf', 'uploads/NgoRenewInfo/16901929591932717697sample.pdf', 'uploads/NgoRenewInfo/16901932208939456477sample.pdf', 'uploads/NgoRenewInfo/16901932201612304546sample.pdf', 'uploads/NgoRenewInfo/16901932205065923953sample.pdf', '55', '34534', 'bbb', '33', 'bbb', 'ww.ggg.com', '55555555555', '5555555555', NULL, '2023-07-24 04:02:39', '2023-07-24 04:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_statuses`
--

CREATE TABLE `ngo_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reg_type` varchar(255) DEFAULT NULL,
  `reg_id` varchar(255) DEFAULT NULL,
  `print_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_statuses`
--

INSERT INTO `ngo_statuses` (`id`, `fd_one_form_id`, `email`, `reg_type`, `reg_id`, `print_date`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'kkajol428@gmail.com', 'NGO Registration', '0', NULL, 'Accepted', NULL, '2023-07-15 03:11:20', '2023-07-15 03:11:20'),
(2, 5, 'kajol1122018@gmail.com', 'NGO Registration', '0', NULL, 'Accepted', NULL, '2023-07-24 03:32:00', '2023-07-24 03:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_type_and_languages`
--

CREATE TABLE `ngo_type_and_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ngo_type` varchar(255) NOT NULL,
  `ngo_language` varchar(255) NOT NULL,
  `first_one_form_check_status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_type_and_languages`
--

INSERT INTO `ngo_type_and_languages` (`id`, `user_id`, `ngo_type`, `ngo_language`, `first_one_form_check_status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 1, 'দেশিও', 'en', '1', '14:42:40', '2023-07-15 02:42:41', '2023-07-15 02:42:41'),
(6, 3, 'দেশিও', 'en', '1', '14:55:41', '2023-07-24 02:55:41', '2023-07-24 02:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `n_visas`
--

CREATE TABLE `n_visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `period_validity` varchar(255) DEFAULT NULL,
  `permit_efct_date` varchar(255) DEFAULT NULL,
  `visa_ref_no` varchar(255) DEFAULT NULL,
  `visa_recomendation_letter_received_way` varchar(255) DEFAULT NULL,
  `visa_recomendation_letter_ref_no` varchar(255) DEFAULT NULL,
  `department_in` varchar(255) DEFAULT NULL,
  `visa_category` varchar(255) DEFAULT NULL,
  `applicant_photo` varchar(255) DEFAULT NULL,
  `forwarding_letter` varchar(255) DEFAULT NULL,
  `salary_remarks` varchar(255) DEFAULT NULL,
  `other_benefit` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visas`
--

INSERT INTO `n_visas` (`id`, `fd_one_form_id`, `period_validity`, `permit_efct_date`, `visa_ref_no`, `visa_recomendation_letter_received_way`, `visa_recomendation_letter_ref_no`, `department_in`, `visa_category`, `applicant_photo`, `forwarding_letter`, `salary_remarks`, `other_benefit`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2023-07-21', '111', 'Online', '11111', 'no', 'New Industrial', 'public/uploads/applicant_photo/16894133751497482252user4.png', NULL, 'rr', 'rr', NULL, '2023-07-15 03:29:35', '2023-07-15 03:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_authorized_personal_of_the_orgs`
--

CREATE TABLE `n_visa_authorized_personal_of_the_orgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `auth_person_org_name` varchar(255) DEFAULT NULL,
  `auth_person_org_house_no` varchar(255) DEFAULT NULL,
  `auth_person_org_flat_no` varchar(255) DEFAULT NULL,
  `auth_person_org_road_no` varchar(255) DEFAULT NULL,
  `auth_person_org_post_office` varchar(255) DEFAULT NULL,
  `auth_person_org_mobile` varchar(255) DEFAULT NULL,
  `auth_person_org_district` varchar(255) DEFAULT NULL,
  `auth_person_org_thana` varchar(255) DEFAULT NULL,
  `submission_date` varchar(255) DEFAULT NULL,
  `expatriate_name` varchar(255) DEFAULT NULL,
  `expatriate_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_authorized_personal_of_the_orgs`
--

INSERT INTO `n_visa_authorized_personal_of_the_orgs` (`id`, `n_visa_id`, `auth_person_org_name`, `auth_person_org_house_no`, `auth_person_org_flat_no`, `auth_person_org_road_no`, `auth_person_org_post_office`, `auth_person_org_mobile`, `auth_person_org_district`, `auth_person_org_thana`, `submission_date`, `expatriate_name`, `expatriate_email`, `created_at`, `updated_at`) VALUES
(1, 1, 'trtre', 'ertret', 'rtret', 'retret', 'retret', '01646735100', 'tretre', 'rtret', '2023-07-16', 'fM9oHuIQit', 'kkajol428@gmail.com', '2023-07-15 03:29:36', '2023-07-15 03:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_compensation_and_benifits`
--

CREATE TABLE `n_visa_compensation_and_benifits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `salary_category` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_compensation_and_benifits`
--

INSERT INTO `n_visa_compensation_and_benifits` (`id`, `n_visa_id`, `salary_category`, `payment_type`, `amount`, `currency`, `created_at`, `updated_at`) VALUES
(1, 1, 'Annual Bonus', 'Not Applicable', '44', 'ytuyt', '2023-07-15 03:29:37', '2023-07-15 03:29:37'),
(2, 1, 'Medical Allowance', 'Monthly', '444', 'yuyt', '2023-07-15 03:29:37', '2023-07-15 03:29:37'),
(3, 1, 'Entertainment Allowance', 'Monthly', '44', 'rtyur', '2023-07-15 03:29:37', '2023-07-15 03:29:37'),
(4, 1, 'Conveyance', 'Monthly', '44', 'tytry', '2023-07-15 03:29:37', '2023-07-15 03:29:37'),
(5, 1, 'House Rent', 'Monthly', '44', 'reyte', '2023-07-15 03:29:37', '2023-07-15 03:29:37'),
(6, 1, 'Overseas Allowance', 'Monthly', '44', 'erewrtr', '2023-07-15 03:29:37', '2023-07-15 03:29:37'),
(7, 1, 'Basic Salary', 'Monthly', '44', 'rere', '2023-07-15 03:29:37', '2023-07-15 03:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_employment_information`
--

CREATE TABLE `n_visa_employment_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `employed_designation` varchar(255) DEFAULT NULL,
  `date_of_arrival_in_bangladesh` varchar(255) DEFAULT NULL,
  `visa_type` varchar(255) DEFAULT NULL,
  `first_appoinment_date` varchar(255) DEFAULT NULL,
  `desired_effective_date` varchar(255) DEFAULT NULL,
  `travel_visa_cate` varchar(255) DEFAULT NULL,
  `visa_validity` varchar(255) DEFAULT NULL,
  `brief_job_description` varchar(255) DEFAULT NULL,
  `employee_justification` varchar(255) DEFAULT NULL,
  `desired_end_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_employment_information`
--

INSERT INTO `n_visa_employment_information` (`id`, `n_visa_id`, `employed_designation`, `date_of_arrival_in_bangladesh`, `visa_type`, `first_appoinment_date`, `desired_effective_date`, `travel_visa_cate`, `visa_validity`, `brief_job_description`, `employee_justification`, `desired_end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hm1Mf7H6uC', '2023-07-07', 'N-Visa', '2023-07-13', '2023-07-19', '2', '1', 'yhgfh', 'ghghvc', '2023-07-10', '2023-07-15 03:29:36', '2023-07-15 03:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_manpower_of_the_offices`
--

CREATE TABLE `n_visa_manpower_of_the_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `local_executive` varchar(255) DEFAULT NULL,
  `local_supporting_staff` varchar(255) DEFAULT NULL,
  `local_total` varchar(255) DEFAULT NULL,
  `foreign_executive` varchar(255) DEFAULT NULL,
  `foreign_supporting_staff` varchar(255) DEFAULT NULL,
  `foreign_total` varchar(255) DEFAULT NULL,
  `gand_total` varchar(255) DEFAULT NULL,
  `local_ratio` varchar(255) DEFAULT NULL,
  `foreign_ratio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_manpower_of_the_offices`
--

INSERT INTO `n_visa_manpower_of_the_offices` (`id`, `n_visa_id`, `local_executive`, `local_supporting_staff`, `local_total`, `foreign_executive`, `foreign_supporting_staff`, `foreign_total`, `gand_total`, `local_ratio`, `foreign_ratio`, `created_at`, `updated_at`) VALUES
(1, 1, '22', '22', '22', '2222', '22', '2222', '2222', '22', '22', '2023-07-15 03:29:36', '2023-07-15 03:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_necessary_document_for_work_permits`
--

CREATE TABLE `n_visa_necessary_document_for_work_permits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `nomination_letter_of_buyer` varchar(255) DEFAULT NULL,
  `registration_letter_of_board_of_investment` varchar(255) DEFAULT NULL,
  `employee_contract_copy` varchar(255) DEFAULT NULL,
  `board_of_the_directors_sign_letter` varchar(255) DEFAULT NULL,
  `share_holder_copy` varchar(255) DEFAULT NULL,
  `passport_photocopy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_necessary_document_for_work_permits`
--

INSERT INTO `n_visa_necessary_document_for_work_permits` (`id`, `n_visa_id`, `nomination_letter_of_buyer`, `registration_letter_of_board_of_investment`, `employee_contract_copy`, `board_of_the_directors_sign_letter`, `share_holder_copy`, `passport_photocopy`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/necessaryDocument/16894133766854219990sample.pdf', NULL, NULL, NULL, NULL, NULL, '2023-07-15 03:29:36', '2023-07-15 03:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_particulars_of_foreign_incumbnets`
--

CREATE TABLE `n_visa_particulars_of_foreign_incumbnets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_the_foreign_national` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `passport_issue_date` varchar(255) DEFAULT NULL,
  `passport_issue_place` varchar(255) DEFAULT NULL,
  `passport_expiry_date` varchar(255) DEFAULT NULL,
  `home_country` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `flat_no` varchar(255) DEFAULT NULL,
  `road_no` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `fax_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `martial_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_particulars_of_foreign_incumbnets`
--

INSERT INTO `n_visa_particulars_of_foreign_incumbnets` (`id`, `n_visa_id`, `name_of_the_foreign_national`, `nationality`, `passport_no`, `passport_issue_date`, `passport_issue_place`, `passport_expiry_date`, `home_country`, `house_no`, `flat_no`, `road_no`, `post_code`, `state`, `phone`, `city`, `fax_no`, `email`, `date_of_birth`, `martial_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kamruzzaman kajol', 'আফগান', 'eee', '2023-07-26', 'eeee', '2023-07-08', 'Bangladesh', 'ee', 'Ch56RnsJDJ', 'TNKYbdPc94', '6203', 'Rajshahi', '01646735100', 'Rajshahi', '444', 'kkajol428@gmail.com', '2023-07-23', 'Married', '2023-07-15 03:29:35', '2023-07-15 03:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_particular_of_sponsor_or_employers`
--

CREATE TABLE `n_visa_particular_of_sponsor_or_employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `org_house_no` varchar(255) DEFAULT NULL,
  `org_flat_no` varchar(255) DEFAULT NULL,
  `org_road_no` varchar(255) DEFAULT NULL,
  `org_post_code` varchar(255) DEFAULT NULL,
  `org_post_office` varchar(255) DEFAULT NULL,
  `org_phone` varchar(255) DEFAULT NULL,
  `org_district` varchar(255) DEFAULT NULL,
  `org_thana` varchar(255) DEFAULT NULL,
  `org_fax_no` varchar(255) DEFAULT NULL,
  `org_email` varchar(255) DEFAULT NULL,
  `org_type` varchar(255) DEFAULT NULL,
  `nature_of_business` varchar(255) DEFAULT NULL,
  `authorized_capital` varchar(255) DEFAULT NULL,
  `paid_up_capital` varchar(255) DEFAULT NULL,
  `remittance_received` varchar(255) DEFAULT NULL,
  `industry_type` varchar(255) DEFAULT NULL,
  `recommendation_of_company_board` varchar(255) DEFAULT NULL,
  `company_share` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_particular_of_sponsor_or_employers`
--

INSERT INTO `n_visa_particular_of_sponsor_or_employers` (`id`, `n_visa_id`, `org_name`, `org_house_no`, `org_flat_no`, `org_road_no`, `org_post_code`, `org_post_office`, `org_phone`, `org_district`, `org_thana`, `org_fax_no`, `org_email`, `org_type`, `nature_of_business`, `authorized_capital`, `paid_up_capital`, `remittance_received`, `industry_type`, `recommendation_of_company_board`, `company_share`, `created_at`, `updated_at`) VALUES
(1, 1, 'fddsf', 'ee', 'ee', 'ee', '6203', 'eee', '01646735100', 'ee', 'ckApHlEIlk', 'eee', 'kkajol428@gmail.com', 'NGO', 'Padma Hut', 'ee', 'ee', 'eee', 'NGO', 'Padma Hut', 'Padma Hut', '2023-07-15 03:29:35', '2023-07-15 03:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_work_place_addresses`
--

CREATE TABLE `n_visa_work_place_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `work_house_no` varchar(255) DEFAULT NULL,
  `work_flat_no` varchar(255) DEFAULT NULL,
  `work_road_no` varchar(255) DEFAULT NULL,
  `work_org_type` varchar(255) DEFAULT NULL,
  `contact_person_mobile_number` varchar(255) DEFAULT NULL,
  `work_district` varchar(255) DEFAULT NULL,
  `work_thana` varchar(255) DEFAULT NULL,
  `work_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_work_place_addresses`
--

INSERT INTO `n_visa_work_place_addresses` (`id`, `n_visa_id`, `work_house_no`, `work_flat_no`, `work_road_no`, `work_org_type`, `contact_person_mobile_number`, `work_district`, `work_thana`, `work_email`, `created_at`, `updated_at`) VALUES
(1, 1, 'jK3cuXDgRD', 'Tt8DcSOCbo', '22', 'NGO', '01646735100', 'Dx8tJDJobe', 'ohTQX6Mg8P', 'kkajol428@gmail.com', '2023-07-15 03:29:36', '2023-07-15 03:29:36');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'dashboard', 'admin', '2023-07-15 02:11:34', '2023-07-15 02:11:34'),
(2, 'dashboard.edit', 'dashboard', 'admin', '2023-07-15 02:11:34', '2023-07-15 02:11:34'),
(3, 'systemInformationAdd', 'systemInformation', 'admin', '2023-07-15 02:11:35', '2023-07-15 02:11:35'),
(4, 'systemInformationView', 'systemInformation', 'admin', '2023-07-15 02:11:35', '2023-07-15 02:11:35'),
(5, 'systemInformationDelete', 'systemInformation', 'admin', '2023-07-15 02:11:35', '2023-07-15 02:11:35'),
(6, 'systemInformationUpdate', 'systemInformation', 'admin', '2023-07-15 02:11:35', '2023-07-15 02:11:35'),
(7, 'countryAdd', 'country', 'admin', '2023-07-15 02:11:35', '2023-07-15 02:11:35'),
(8, 'countryView', 'country', 'admin', '2023-07-15 02:11:36', '2023-07-15 02:11:36'),
(9, 'countryDelete', 'country', 'admin', '2023-07-15 02:11:36', '2023-07-15 02:11:36'),
(10, 'countryUpdate', 'country', 'admin', '2023-07-15 02:11:36', '2023-07-15 02:11:36'),
(11, 'fd9FormAdd', 'fd9Form', 'admin', '2023-07-15 02:11:37', '2023-07-15 02:11:37'),
(12, 'fd9FormView', 'fd9Form', 'admin', '2023-07-15 02:11:37', '2023-07-15 02:11:37'),
(13, 'fd9FormDelete', 'fd9Form', 'admin', '2023-07-15 02:11:37', '2023-07-15 02:11:37'),
(14, 'fd9FormUpdate', 'fd9Form', 'admin', '2023-07-15 02:11:38', '2023-07-15 02:11:38'),
(15, 'fd9OneFormAdd', 'fd9OneForm', 'admin', '2023-07-15 02:11:38', '2023-07-15 02:11:38'),
(16, 'fd9OneFormView', 'fd9OneForm', 'admin', '2023-07-15 02:11:38', '2023-07-15 02:11:38'),
(17, 'fd9OneFormDelete', 'fd9OneForm', 'admin', '2023-07-15 02:11:38', '2023-07-15 02:11:38'),
(18, 'fd9OneFormUpdate', 'fd9OneForm', 'admin', '2023-07-15 02:11:39', '2023-07-15 02:11:39'),
(19, 'name_change_add', 'nameChange', 'admin', '2023-07-15 02:11:39', '2023-07-15 02:11:39'),
(20, 'name_change_view', 'nameChange', 'admin', '2023-07-15 02:11:39', '2023-07-15 02:11:39'),
(21, 'name_change_delete', 'nameChange', 'admin', '2023-07-15 02:11:40', '2023-07-15 02:11:40'),
(22, 'name_change_update', 'nameChange', 'admin', '2023-07-15 02:11:40', '2023-07-15 02:11:40'),
(23, 'register_list_add', 'registrationList', 'admin', '2023-07-15 02:11:41', '2023-07-15 02:11:41'),
(24, 'register_list_view', 'registrationList', 'admin', '2023-07-15 02:11:41', '2023-07-15 02:11:41'),
(25, 'register_list_delete', 'registrationList', 'admin', '2023-07-15 02:11:42', '2023-07-15 02:11:42'),
(26, 'register_list_update', 'registrationList', 'admin', '2023-07-15 02:11:42', '2023-07-15 02:11:42'),
(27, 'renew_add', 'renew', 'admin', '2023-07-15 02:11:43', '2023-07-15 02:11:43'),
(28, 'renew_view', 'renew', 'admin', '2023-07-15 02:11:43', '2023-07-15 02:11:43'),
(29, 'renew_delete', 'renew', 'admin', '2023-07-15 02:11:43', '2023-07-15 02:11:43'),
(30, 'renew_update', 'renew', 'admin', '2023-07-15 02:11:44', '2023-07-15 02:11:44'),
(31, 'userAdd', 'user', 'admin', '2023-07-15 02:11:44', '2023-07-15 02:11:44'),
(32, 'userView', 'user', 'admin', '2023-07-15 02:11:44', '2023-07-15 02:11:44'),
(33, 'userDelete', 'user', 'admin', '2023-07-15 02:11:44', '2023-07-15 02:11:44'),
(34, 'userUpdate', 'user', 'admin', '2023-07-15 02:11:45', '2023-07-15 02:11:45'),
(35, 'roleAdd', 'role', 'admin', '2023-07-15 02:11:45', '2023-07-15 02:11:45'),
(36, 'roleView', 'role', 'admin', '2023-07-15 02:11:46', '2023-07-15 02:11:46'),
(37, 'roleDelete', 'role', 'admin', '2023-07-15 02:11:46', '2023-07-15 02:11:46'),
(38, 'roleUpdate', 'role', 'admin', '2023-07-15 02:11:47', '2023-07-15 02:11:47'),
(39, 'permissionAdd', 'permission', 'admin', '2023-07-15 02:11:47', '2023-07-15 02:11:47'),
(40, 'permissionView', 'permission', 'admin', '2023-07-15 02:11:47', '2023-07-15 02:11:47'),
(41, 'permissionDelete', 'permission', 'admin', '2023-07-15 02:11:47', '2023-07-15 02:11:47'),
(42, 'permissionUpdate', 'permission', 'admin', '2023-07-15 02:11:48', '2023-07-15 02:11:48'),
(43, 'profile.view', 'profile', 'admin', '2023-07-15 02:11:48', '2023-07-15 02:11:48'),
(44, 'profile.edit', 'profile', 'admin', '2023-07-15 02:11:48', '2023-07-15 02:11:48'),
(45, 'branchAdd', 'branch', 'admin', NULL, NULL),
(46, 'branchView', 'branch', 'admin', NULL, NULL),
(47, 'branchDelete', 'branch', 'admin', NULL, NULL),
(48, 'branchUpdate', 'branch', 'admin', NULL, NULL),
(49, 'designationAdd', 'Designation', 'admin', NULL, NULL),
(50, 'designationView', 'Designation', 'admin', NULL, NULL),
(51, 'designationDelete', 'Designation', 'admin', NULL, NULL),
(52, 'designationUpdate', 'Designation', 'admin', NULL, NULL),
(53, 'designationStepAdd', 'designationStep', 'admin', NULL, NULL),
(54, 'designationStepView', 'designationStep', 'admin', NULL, NULL),
(55, 'designationStepDelete', 'designationStep', 'admin', NULL, NULL),
(56, 'designationStepUpdate', 'designationStep', 'admin', NULL, NULL),
(57, 'employeeEndDate.view', 'employeeEndDate', 'admin', NULL, NULL),
(58, 'employeeEndDate.edit', 'employeeEndDate', 'admin', NULL, NULL);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-07-15 02:11:33', '2023-07-15 02:11:33'),
(2, 'admin', 'admin', '2023-07-15 02:11:33', '2023-07-15 02:11:33'),
(3, 'editor', 'admin', '2023-07-15 02:11:34', '2023-07-15 02:11:34'),
(4, 'user', 'admin', '2023-07-15 02:11:34', '2023-07-15 02:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_information`
--

CREATE TABLE `system_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_name` varchar(255) NOT NULL,
  `system_phone` varchar(255) NOT NULL,
  `system_email` varchar(255) NOT NULL,
  `system_address` text NOT NULL,
  `system_url` text NOT NULL,
  `system_logo` varchar(255) NOT NULL,
  `system_icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `system_name`, `system_phone`, `system_email`, `system_address`, `system_url`, `system_logo`, `system_icon`, `created_at`, `updated_at`) VALUES
(1, 'NGO AB', '1111', 'm@gmail.com', 'Rajshahi', 'http://ngo.musatech.net/', 'public/uploads/168941030320230715govt-bangladesh-logo-D1143C363F-seeklogo.com.png', 'public/uploads/168941030320230715govt-bangladesh-logo-D1143C363F-seeklogo.com.png', '2023-07-15 02:38:24', '2023-07-18 05:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` text DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user_email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_phone`, `user_address`, `user_image`, `email`, `user_email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(1, 'Kamruzzaman kajol', '01646735100', NULL, NULL, 'kkajol428@gmail.com', NULL, '$2y$10$pKAanCjBhcNK5qFYm/V84u9uqqxGzWHOIPwbkTJg7hSQ.7FSJtyTW', NULL, '2023-07-15 02:40:28', '2023-07-15 02:41:34', 1),
(2, 'Md. Rony Hossain', '01738300022', NULL, NULL, 'ronyhossain1920@gmail.com', NULL, '$2y$10$KFsK7dWkcSYYWEEu3n040.NckEqPvcAYi40SCPaf.zoZqPIUk1e6u', NULL, '2023-07-21 08:56:43', '2023-07-21 08:57:23', 1),
(3, 'Kamruzzaman kajol', '01646735100', NULL, NULL, 'kajol1122018@gmail.com', NULL, '$2y$10$VCAx4k5CBmTtmf2VETw2xeUab8RmWRbj318FeSIMGKdIPbmvBI5Km', NULL, '2023-07-22 03:14:02', '2023-07-22 03:14:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_verify`
--

INSERT INTO `users_verify` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 'FQzJaK0i8S', '2023-07-15 02:40:28', '2023-07-15 02:40:28'),
(2, 'hIWWVerozj', '2023-07-21 08:56:43', '2023-07-21 08:56:43'),
(3, 'kewQtJqjmw', '2023-07-22 03:14:02', '2023-07-22 03:14:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_designation_list_id_foreign` (`designation_list_id`),
  ADD KEY `admins_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_lists`
--
ALTER TABLE `designation_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_lists_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `designation_steps`
--
ALTER TABLE `designation_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_steps_designation_list_id_foreign` (`designation_list_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fd9_foreigner_employee_family_member_lists`
--
ALTER TABLE `fd9_foreigner_employee_family_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_foreigner_employee_family_member_lists_fd9_form_id_foreign` (`fd9_form_id`);

--
-- Indexes for table `fd9_forms`
--
ALTER TABLE `fd9_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_forms_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `fd9_one_forms`
--
ALTER TABLE `fd9_one_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_one_forms_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_adviser_lists`
--
ALTER TABLE `fd_one_adviser_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_adviser_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_bank_accounts`
--
ALTER TABLE `fd_one_bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_bank_accounts_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_forms_user_id_foreign` (`user_id`);

--
-- Indexes for table `fd_one_member_lists`
--
ALTER TABLE `fd_one_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_member_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_other_pdf_lists`
--
ALTER TABLE `fd_one_other_pdf_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_other_pdf_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_source_of_funds`
--
ALTER TABLE `fd_one_source_of_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_source_of_funds_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `form_complete_statuses`
--
ALTER TABLE `form_complete_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_complete_statuses_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_eights`
--
ALTER TABLE `form_eights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_eights_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `forwarding_letters`
--
ALTER TABLE `forwarding_letters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forwarding_letters_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `forwarding_letter_onulipis`
--
ALTER TABLE `forwarding_letter_onulipis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forwarding_letter_onulipis_forwarding_letter_id_foreign` (`forwarding_letter_id`);

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
-- Indexes for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_durations_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_member_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_member_nid_photos_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_name_changes`
--
ALTER TABLE `ngo_name_changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_name_changes_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_other_docs_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_renews_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_renew_infos_user_id_foreign` (`user_id`),
  ADD KEY `ngo_renew_infos_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_statuses_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_type_and_languages_user_id_foreign` (`user_id`);

--
-- Indexes for table `n_visas`
--
ALTER TABLE `n_visas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visas_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `n_visa_authorized_personal_of_the_orgs`
--
ALTER TABLE `n_visa_authorized_personal_of_the_orgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_authorized_personal_of_the_orgs_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_compensation_and_benifits`
--
ALTER TABLE `n_visa_compensation_and_benifits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_compensation_and_benifits_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_employment_information`
--
ALTER TABLE `n_visa_employment_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_employment_information_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_manpower_of_the_offices`
--
ALTER TABLE `n_visa_manpower_of_the_offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_manpower_of_the_offices_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_necessary_document_for_work_permits`
--
ALTER TABLE `n_visa_necessary_document_for_work_permits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_necessary_document_for_work_permits_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_particulars_of_foreign_incumbnets`
--
ALTER TABLE `n_visa_particulars_of_foreign_incumbnets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_particulars_of_foreign_incumbnets_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_particular_of_sponsor_or_employers`
--
ALTER TABLE `n_visa_particular_of_sponsor_or_employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_particular_of_sponsor_or_employers_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_work_place_addresses`
--
ALTER TABLE `n_visa_work_place_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_work_place_addresses_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `system_information`
--
ALTER TABLE `system_information`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `designation_lists`
--
ALTER TABLE `designation_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designation_steps`
--
ALTER TABLE `designation_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fd9_foreigner_employee_family_member_lists`
--
ALTER TABLE `fd9_foreigner_employee_family_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fd9_forms`
--
ALTER TABLE `fd9_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fd9_one_forms`
--
ALTER TABLE `fd9_one_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fd_one_adviser_lists`
--
ALTER TABLE `fd_one_adviser_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fd_one_bank_accounts`
--
ALTER TABLE `fd_one_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fd_one_member_lists`
--
ALTER TABLE `fd_one_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `fd_one_other_pdf_lists`
--
ALTER TABLE `fd_one_other_pdf_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fd_one_source_of_funds`
--
ALTER TABLE `fd_one_source_of_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form_complete_statuses`
--
ALTER TABLE `form_complete_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form_eights`
--
ALTER TABLE `form_eights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forwarding_letters`
--
ALTER TABLE `forwarding_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forwarding_letter_onulipis`
--
ALTER TABLE `forwarding_letter_onulipis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ngo_name_changes`
--
ALTER TABLE `ngo_name_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `n_visas`
--
ALTER TABLE `n_visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_authorized_personal_of_the_orgs`
--
ALTER TABLE `n_visa_authorized_personal_of_the_orgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_compensation_and_benifits`
--
ALTER TABLE `n_visa_compensation_and_benifits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `n_visa_employment_information`
--
ALTER TABLE `n_visa_employment_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_manpower_of_the_offices`
--
ALTER TABLE `n_visa_manpower_of_the_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_necessary_document_for_work_permits`
--
ALTER TABLE `n_visa_necessary_document_for_work_permits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_particulars_of_foreign_incumbnets`
--
ALTER TABLE `n_visa_particulars_of_foreign_incumbnets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_particular_of_sponsor_or_employers`
--
ALTER TABLE `n_visa_particular_of_sponsor_or_employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_work_place_addresses`
--
ALTER TABLE `n_visa_work_place_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_designation_list_id_foreign` FOREIGN KEY (`designation_list_id`) REFERENCES `designation_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designation_lists`
--
ALTER TABLE `designation_lists`
  ADD CONSTRAINT `designation_lists_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designation_steps`
--
ALTER TABLE `designation_steps`
  ADD CONSTRAINT `designation_steps_designation_list_id_foreign` FOREIGN KEY (`designation_list_id`) REFERENCES `designation_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_foreigner_employee_family_member_lists`
--
ALTER TABLE `fd9_foreigner_employee_family_member_lists`
  ADD CONSTRAINT `fd9_foreigner_employee_family_member_lists_fd9_form_id_foreign` FOREIGN KEY (`fd9_form_id`) REFERENCES `fd9_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_forms`
--
ALTER TABLE `fd9_forms`
  ADD CONSTRAINT `fd9_forms_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_one_forms`
--
ALTER TABLE `fd9_one_forms`
  ADD CONSTRAINT `fd9_one_forms_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_adviser_lists`
--
ALTER TABLE `fd_one_adviser_lists`
  ADD CONSTRAINT `fd_one_adviser_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_bank_accounts`
--
ALTER TABLE `fd_one_bank_accounts`
  ADD CONSTRAINT `fd_one_bank_accounts_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  ADD CONSTRAINT `fd_one_forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_member_lists`
--
ALTER TABLE `fd_one_member_lists`
  ADD CONSTRAINT `fd_one_member_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_other_pdf_lists`
--
ALTER TABLE `fd_one_other_pdf_lists`
  ADD CONSTRAINT `fd_one_other_pdf_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_source_of_funds`
--
ALTER TABLE `fd_one_source_of_funds`
  ADD CONSTRAINT `fd_one_source_of_funds_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_complete_statuses`
--
ALTER TABLE `form_complete_statuses`
  ADD CONSTRAINT `form_complete_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_eights`
--
ALTER TABLE `form_eights`
  ADD CONSTRAINT `form_eights_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forwarding_letters`
--
ALTER TABLE `forwarding_letters`
  ADD CONSTRAINT `forwarding_letters_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forwarding_letter_onulipis`
--
ALTER TABLE `forwarding_letter_onulipis`
  ADD CONSTRAINT `forwarding_letter_onulipis_forwarding_letter_id_foreign` FOREIGN KEY (`forwarding_letter_id`) REFERENCES `forwarding_letters` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  ADD CONSTRAINT `ngo_durations_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  ADD CONSTRAINT `ngo_member_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  ADD CONSTRAINT `ngo_member_nid_photos_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_name_changes`
--
ALTER TABLE `ngo_name_changes`
  ADD CONSTRAINT `ngo_name_changes_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  ADD CONSTRAINT `ngo_other_docs_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  ADD CONSTRAINT `ngo_renews_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  ADD CONSTRAINT `ngo_renew_infos_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ngo_renew_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  ADD CONSTRAINT `ngo_statuses_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  ADD CONSTRAINT `ngo_type_and_languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visas`
--
ALTER TABLE `n_visas`
  ADD CONSTRAINT `n_visas_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_authorized_personal_of_the_orgs`
--
ALTER TABLE `n_visa_authorized_personal_of_the_orgs`
  ADD CONSTRAINT `n_visa_authorized_personal_of_the_orgs_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_compensation_and_benifits`
--
ALTER TABLE `n_visa_compensation_and_benifits`
  ADD CONSTRAINT `n_visa_compensation_and_benifits_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_employment_information`
--
ALTER TABLE `n_visa_employment_information`
  ADD CONSTRAINT `n_visa_employment_information_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_manpower_of_the_offices`
--
ALTER TABLE `n_visa_manpower_of_the_offices`
  ADD CONSTRAINT `n_visa_manpower_of_the_offices_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_necessary_document_for_work_permits`
--
ALTER TABLE `n_visa_necessary_document_for_work_permits`
  ADD CONSTRAINT `n_visa_necessary_document_for_work_permits_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_particulars_of_foreign_incumbnets`
--
ALTER TABLE `n_visa_particulars_of_foreign_incumbnets`
  ADD CONSTRAINT `n_visa_particulars_of_foreign_incumbnets_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_particular_of_sponsor_or_employers`
--
ALTER TABLE `n_visa_particular_of_sponsor_or_employers`
  ADD CONSTRAINT `n_visa_particular_of_sponsor_or_employers_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_work_place_addresses`
--
ALTER TABLE `n_visa_work_place_addresses`
  ADD CONSTRAINT `n_visa_work_place_addresses_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

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
