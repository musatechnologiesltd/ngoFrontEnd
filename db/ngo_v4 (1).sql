-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 01:43 PM
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
-- Database: `ngo_v4`
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
  `designation_list_id` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `admin_sign` varchar(255) DEFAULT NULL,
  `admin_job_start_date` varchar(255) DEFAULT NULL,
  `admin_job_end_date` varchar(255) DEFAULT NULL,
  `admin_job_end_start_date` varchar(255) DEFAULT NULL,
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

INSERT INTO `admins` (`id`, `admin_name`, `admin_name_ban`, `admin_mobile`, `designation_list_id`, `branch_id`, `admin_sign`, `admin_job_start_date`, `admin_job_end_date`, `admin_job_end_start_date`, `admin_image`, `email`, `admin_email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'super admin ban', '123456789', '1', '1', NULL, NULL, NULL, NULL, NULL, 'superadmin@gmail.com', NULL, '$2y$10$edCA6a5zA4PmXvG.BeauZOZZFDEy4IZAGFnVJISqanGDmOvp89BCK', NULL, '2023-08-22 02:06:19', '2023-08-22 02:06:19'),
(2, 'Sheikh Md. Moniruzzaman', 'শেখ মোঃ মনিরুজ্জামান', '11111111111', '2', '2', 'public/uploads/adminImage/16926951171417581643bs-signature-demo_4_300x80.png', '2023-08-22', NULL, NULL, 'public/uploads/adminImage/16926951172436322600user.jpg', 'dg@gmail.com', NULL, '$2y$10$zpNHoYmbKBdrvyq8IltFveY.KK2zGuEvSYN8ZkBl4ztgBia4HaeDi', NULL, '2023-08-22 03:05:17', '2023-08-22 05:41:16'),
(3, 'Md. Anwar Hossain', 'মোঃ আনোয়ার হোসেন', '22222222222', '7', '4', 'public/uploads/adminImage/16926953614664500008bs-signature-demo_4_300x80.png', NULL, '2023-08-08', '2023-08-22', 'public/uploads/adminImage/169269536157710384236y.png', 'director1@gmail.com', NULL, '$2y$10$hnirzKU1K7h9LIS.rxkXweyAvc24GY.Yrl8xYSNSL5D27fVgQI/o.', NULL, '2023-08-22 03:09:21', '2023-08-22 06:07:15'),
(4, 'Tapan Kumar Biswas', 'তপন কুমার বিশ্বাস', '22222222222', '1', '1', 'public/uploads/adminImage/16926955485469691715bs-signature-demo_4_300x80.png', '2023-08-22', NULL, NULL, 'public/uploads/adminImage/16926955485199022640mainu.jpg', 'director2@gmail.com', NULL, '$2y$10$uMDJi10.5CIDj/SZYJmJ7.d2VScypgO4CVmRE7Vq7nT860jDPHRnu', NULL, '2023-08-22 03:12:28', '2023-08-22 03:17:12'),
(5, 'Md Mokhleshur Rahman', 'মোঃ মোখলেছুর রহমান', '33333333333', '3', '2', 'public/uploads/adminImage/16926956431290171163bs-signature-demo_4_300x80.png', '2023-08-28', NULL, NULL, 'public/uploads/adminImage/16926956439547936262demo.jpg', 'director3@gmail.com', NULL, '$2y$10$lz6FU1Tfqr38VNpSs/bug.7fjgu3X4v0moUxzPm3vNjS/zBLH/tHS', NULL, '2023-08-22 03:14:03', '2023-08-24 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_designation_histories`
--

CREATE TABLE `admin_designation_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `designation_list_id` varchar(255) DEFAULT NULL,
  `admin_job_start_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_designation_histories`
--

INSERT INTO `admin_designation_histories` (`id`, `admin_id`, `designation_list_id`, `admin_job_start_date`, `created_at`, `updated_at`) VALUES
(4, '2', '2', '2023-08-22', '2023-08-22 05:41:17', '2023-08-22 05:41:17'),
(6, '3', '7', '2023-08-22', '2023-08-22 05:41:44', '2023-08-22 05:41:44'),
(7, '5', '3', '2023-08-28', '2023-08-24 00:27:45', '2023-08-24 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `branch_step` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_code`, `branch_step`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'super admin', NULL, '2023-08-22 02:02:56', '2023-08-22 02:02:56'),
(2, 'মহাপরিচালক মহোদয়ের শাখা (২)', 'শাখা (২)', 1, '2023-08-22 02:24:21', '2023-08-22 02:24:21'),
(3, 'পরিচালক (নিবন্ধন) শাখা (২)', 'শাখা (২)', 2, '2023-08-22 02:24:41', '2023-08-22 02:24:41'),
(4, 'পরিচালক (প্রকল্প-১) শাখা (২)', 'শাখা (২)', 3, '2023-08-22 02:25:09', '2023-08-22 02:25:09'),
(5, 'পরিচালক (প্রকল্প-২) শাখা (২)', 'শাখা (২)', 4, '2023-08-22 02:25:26', '2023-08-22 02:25:26'),
(6, 'প্রশাসন  শাখা (২)', 'শাখা (২)', 5, '2023-08-22 02:25:40', '2023-08-22 02:25:40'),
(7, 'প্রকল্প-১ শাখা (১)', 'শাখা (১)', 6, '2023-08-22 02:25:57', '2023-08-22 02:25:57'),
(8, 'সহকারী পরিচালক-১ (নিবন্ধন ও নবায়ন) শাখা (১)', 'শাখা (১)', 7, '2023-08-22 02:26:17', '2023-08-22 02:26:17'),
(9, 'সহকারী পরিচালক-১ (সমন্বয়) শাখা (১)', 'শাখা (১)', 8, '2023-08-22 02:26:38', '2023-08-22 02:26:38'),
(10, 'পরিচালক (প্রকল্প-৩) শাখা (১)', 'শাখা (১)', 9, '2023-08-22 02:26:56', '2023-08-22 02:26:56'),
(11, 'পরিচালক (প্রকল্প-৪) শাখা (১)', 'শাখা (১)', 10, '2023-08-22 02:27:10', '2023-08-22 02:27:10'),
(12, 'পরিচালক (প্রকল্প-৫) শাখা (১)', 'শাখা (১)', 11, '2023-08-22 02:28:49', '2023-08-22 02:28:49');

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
(31, 'TD', 'Chad', 'চাদ', 'Chadian', 'চাদিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(32, 'CL', 'Chile', 'চিলি', 'Chilean', 'চিলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(33, 'CN', 'China', 'চীন', 'Chinese', 'চাইনিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(34, 'CO', 'Colombia', 'কলম্বিয়া', 'Colombian', 'কলম্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(35, 'CG', 'CONGO', 'কঙ্গো', 'Congolese', 'কঙ্গোলিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(36, 'CR', 'Costa Rica', 'কোস্টারিকা', 'Costa Rican', 'কোস্টারিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(37, 'HR', 'Croatia', 'ক্রোয়েশিয়া', 'Croatian', 'ক্রোয়েশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(38, 'CU', 'Cuba', 'কিউবা', 'Cuban', 'কিউবান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(39, 'CY', 'CYPRUS', 'সাইপ্রাস', 'Cyprus', 'সাইপ্রাস', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(40, 'CZ', 'Czech Republic', 'চেক প্রজাতন্ত্র', 'Czech', 'চেক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(41, 'DK', 'Denmark', 'ডেনমার্ক', 'Danish', 'ড্যানিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(42, 'DJ', 'Djibouti', 'জিবুতি', 'Djiboutian', 'জিবুতিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(43, 'DM', 'Dominica', 'ডোমিনিকা', 'Dominican', 'ডোমিনিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(44, 'DO', 'Dominican Republic', 'ডোমিনিকান রিপাবলিক', 'Dominican', 'ডোমিনিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(45, 'EC', 'Ecuador', 'ইকুয়েডর', 'Ecuadorian', 'ইকুয়েডরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(46, 'EG', 'Egypt', 'মিশর', 'Egyptian', 'মিশরীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(47, 'SV', 'El Salvador', 'এল সালভাদর', 'Salvadorian', 'সালভাডোরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
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
-- Table structure for table `dak_details`
--

CREATE TABLE `dak_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` varchar(255) DEFAULT NULL,
  `decision_list` varchar(255) DEFAULT NULL,
  `decision_list_detail` varchar(255) DEFAULT NULL,
  `priority_list` varchar(255) DEFAULT NULL,
  `secret_list` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dak_details`
--

INSERT INTO `dak_details` (`id`, `sender_id`, `decision_list`, `decision_list_detail`, `priority_list`, `secret_list`, `status`, `created_at`, `updated_at`) VALUES
(2, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'registration', '2023-08-26 03:44:52', '2023-08-26 03:44:52'),
(5, '2', 'বিধি মোতাবেক বাবস্থা নিন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'বিশেষ গোপনীয়', 'renew', '2023-08-27 00:31:41', '2023-08-27 00:31:41'),
(6, '1', 'সিধান্ত নিজে নিন', 'পেশ করুন', 'অবিলম্বে', 'বিশেষ গোপনীয়', 'registration', '2023-08-29 01:28:21', '2023-08-29 01:28:21'),
(7, '2', 'নথিজাত করুন', NULL, 'অবিলম্বে', 'গোপনীয়', 'nameChange', '2023-08-31 01:49:53', '2023-08-31 01:49:53'),
(8, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:51:58', '2023-08-31 01:51:58'),
(9, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:52:57', '2023-08-31 01:52:57'),
(10, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:53:37', '2023-08-31 01:53:37'),
(11, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:54:56', '2023-08-31 01:54:56'),
(12, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:55:30', '2023-08-31 01:55:30'),
(13, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 02:02:49', '2023-08-31 02:02:49'),
(14, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 02:03:32', '2023-08-31 02:03:32'),
(15, '2', 'নথিতে উপস্থাপন করুন', NULL, 'অবিলম্বে', 'বিশেষ গোপনীয়', 'nameChange', '2023-08-31 02:08:28', '2023-08-31 02:08:28'),
(16, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'বিশেষ গোপনীয়', 'nameChange', '2023-08-31 02:10:15', '2023-08-31 02:10:15'),
(17, '2', 'বিধি মোতাবেক বাবস্থা নিন', NULL, 'অবিলম্বে', 'বিশেষ গোপনীয়', 'nameChange', '2023-08-31 02:15:27', '2023-08-31 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `designation_lists`
--

CREATE TABLE `designation_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `designation_serial` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_lists`
--

INSERT INTO `designation_lists` (`id`, `branch_id`, `designation_name`, `designation_serial`, `created_at`, `updated_at`) VALUES
(1, 1, 'super admin', '1', '2023-08-22 02:06:19', '2023-08-22 02:06:19'),
(2, 2, 'মহাপরিচালক', '1.1', '2023-08-22 02:32:01', '2023-08-22 02:32:01'),
(3, 2, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '1.2', '2023-08-22 02:32:23', '2023-08-22 02:32:23'),
(4, 3, 'পরিচালক', '2.1', '2023-08-22 02:33:00', '2023-08-22 02:33:00'),
(5, 3, 'সার্টলিপিকার কম কম্পিউটার অপারেটর', '2.2', '2023-08-22 02:33:21', '2023-08-22 02:33:21'),
(6, 3, 'উচ্চমান সহকারী', '2.3', '2023-08-22 02:33:45', '2023-08-22 02:33:45'),
(7, 4, 'পরিচালক', '3.1', '2023-08-22 02:34:22', '2023-08-22 02:34:22'),
(8, 4, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '3.2', '2023-08-22 02:34:46', '2023-08-22 02:34:46'),
(9, 5, 'এনডিসি (পরিচালক)', '4.1', '2023-08-22 02:35:10', '2023-08-22 03:14:58'),
(10, 5, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '4.2', '2023-08-22 02:35:29', '2023-08-22 02:35:29'),
(11, 6, 'উপপরিচালক (সার্বিক))', '5.1', '2023-08-22 02:35:56', '2023-08-22 02:35:56'),
(12, 6, 'অফিস সহকারী-কাম-কম্পিউটার অপারেটর', '5.2', '2023-08-22 02:36:17', '2023-08-22 02:36:17'),
(13, 6, 'ডাটা এন্ট্রি কন্ট্রোল অপারেটর', '5.3', '2023-08-22 02:36:41', '2023-08-22 02:36:41'),
(14, 6, 'হিসাবরক্ষক (ক্যাশ))', '5.4', '2023-08-22 02:38:47', '2023-08-22 02:38:47'),
(15, 6, 'হিসাবরক্ষক', '5.5', '2023-08-22 02:39:30', '2023-08-22 02:39:30'),
(16, 6, 'ব্যাক্তিগত কর্মকর্তা', '5.6', '2023-08-22 02:39:59', '2023-08-22 02:39:59'),
(17, 6, 'উচ্চমান সহকারী', '5.7', '2023-08-22 02:40:17', '2023-08-22 02:40:17'),
(18, 6, 'এসাইনমেন্ট অফিসার', '5.8', '2023-08-22 02:40:49', '2023-08-22 02:40:49'),
(19, 6, 'ব্যাক্তিগত কর্মকর্তা', '5.9', '2023-08-22 02:41:17', '2023-08-22 02:41:17'),
(20, 7, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '6.1', '2023-08-22 02:41:57', '2023-08-22 02:41:57'),
(21, 7, 'উচ্চমান সহকারী', '6.2', '2023-08-22 02:42:17', '2023-08-22 02:42:17'),
(22, 7, 'ব্যাক্তিগত কর্মকর্তা', '6.3', '2023-08-22 02:43:36', '2023-08-22 02:43:36'),
(23, 7, 'উচ্চমান সহকারী', '6.4', '2023-08-22 02:44:10', '2023-08-22 02:44:10'),
(24, 7, 'এসাইনমেন্ট অফিসার', '6.5', '2023-08-22 02:44:47', '2023-08-22 02:44:47'),
(25, 8, 'সহকারী পরিচালক', '7.1', '2023-08-22 02:45:22', '2023-08-22 02:45:22'),
(26, 8, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '7.2', '2023-08-22 02:45:39', '2023-08-22 02:45:39'),
(27, 8, 'হিসাবরক্ষক (অতিরিক্ত দায়িত্ব))', '7.3', '2023-08-22 02:46:02', '2023-08-22 02:46:02'),
(28, 8, 'উচ্চমান সহকারী', '7.4', '2023-08-22 02:46:23', '2023-08-22 02:46:23'),
(29, 8, 'অফিস সহকারী-কাম-কম্পিউটার মুদ্রাক্ষরিক', '7.5', '2023-08-22 02:46:55', '2023-08-22 02:46:55'),
(30, 9, 'ব্যাক্তিগত কর্মকর্তা', '8.1', '2023-08-22 02:48:04', '2023-08-22 02:48:04'),
(31, 9, 'অফিস সহকারী-কাম-কম্পিউটার মুদ্রাক্ষরিক', '8.2', '2023-08-22 02:48:29', '2023-08-22 02:48:29'),
(32, 9, 'অফিস সহকারী-কাম-কম্পিউটার মুদ্রাক্ষরিক', '8.3', '2023-08-22 02:49:20', '2023-08-22 02:49:20'),
(33, 9, 'সহকারী পরিচালক', '8.4', '2023-08-22 02:49:53', '2023-08-22 02:49:53'),
(34, 9, 'উচ্চমান সহকারী', '8.5', '2023-08-22 02:50:21', '2023-08-22 02:50:21'),
(35, 9, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '8.6', '2023-08-22 02:50:46', '2023-08-22 02:50:46'),
(36, 10, 'পরিচালক', '9.1', '2023-08-22 02:54:42', '2023-08-22 02:54:42'),
(37, 10, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '9.2', '2023-08-22 02:54:56', '2023-08-22 02:54:56'),
(38, 11, 'পরিচালক', '10.1', '2023-08-22 02:55:14', '2023-08-22 02:55:14'),
(39, 11, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '10.2', '2023-08-22 02:55:33', '2023-08-22 02:55:33'),
(40, 12, 'পরিচালক', '11.1', '2023-08-22 02:55:55', '2023-08-22 02:55:55'),
(41, 12, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '11.2', '2023-08-22 02:56:06', '2023-08-22 02:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `designation_steps`
--

CREATE TABLE `designation_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_list_id` bigint(20) UNSIGNED NOT NULL,
  `designation_step` varchar(255) DEFAULT NULL,
  `designation_serial` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_steps`
--

INSERT INTO `designation_steps` (`id`, `designation_list_id`, `designation_step`, `designation_serial`, `created_at`, `updated_at`) VALUES
(1, 1, 'super admin', 'super admin', '2023-08-22 02:06:19', '2023-08-22 02:06:19');

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

-- --------------------------------------------------------

--
-- Table structure for table `fd9_forms`
--

CREATE TABLE `fd9_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
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
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
  `digital_signature` varchar(255) DEFAULT NULL,
  `digital_seal` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_forms`
--

INSERT INTO `fd9_forms` (`id`, `fd_one_form_id`, `fd9_foreigner_name`, `fd9_father_name`, `fd9_husband_or_wife_name`, `fd9_mother_name`, `fd9_birth_place`, `fd9_dob`, `fd9_passport_number`, `fd9_passport_issue_date`, `fd9_passport_expiration_date`, `fd9_identification_mark_given_in_passport`, `fd9_male_or_female`, `fd9_marital_status`, `fd9_nationality_or_citizenship`, `fd9_details_if_multiple_citizenships`, `fd9_previous_citizenship_is_grounds_for_non_retention`, `fd9_current_address`, `fd9_number_of_family_members`, `fd9_academic_qualification`, `fd9_technical_and_other_qualifications_if_any`, `fd9_past_experience`, `fd9_countries_that_have_traveled`, `fd9_offered_post`, `fd9_name_of_proposed_project`, `fd9_date_of_appointment`, `fd9_extension_date`, `fd9_post_available_for_foreigner_and_working`, `fd9_previous_work_experience_in_bangladesh`, `fd9_total_foreigner_working`, `fd9_other_information`, `fd9_foreigner_passport_size_photo`, `fd9_copy_of_passport`, `verified_fd_nine_form`, `chief_name`, `chief_desi`, `digital_signature`, `digital_seal`, `status`, `created_at`, `updated_at`) VALUES
(2, 20, '7UwjtXoIUc', 'm3TjNzsxaH', '8hVrvqi12f', '2HToyGPnjA', 'hRPU66MJro', '12-09-2023', 'ghJOSiKFaQ', 'Gpov9BCET6', '13-09-2023', 'PM0bEEMRoZ', 'পুরুষ', 'fRaI1pSLmY', 'L956tIGWKH', 'cwfiKxLVJk', 'iL6j3qOaae', '2jJTMWDLxn', '33jvMScni1', 'uploads/fd9FormInfo/2023-17-0916949501537893120909.pdf', 'uploads/fd9FormInfo/2023-17-0916949501535618777424.pdf', 'uploads/fd9FormInfo/2023-17-0916949501532340411516.pdf', 'dqv33erTCF', 'uploads/fd9FormInfo/2023-17-0916949501535228755641.pdf', 'uploads/fd9FormInfo/2023-17-0916949501537939578689.pdf', 'নতুন', 'BZ3X9xhm8T', 'Q2IxuFvg6H', 'HuzcJpiEb5', 'JTh59dYw9M', 'b0eotHrEMr', 'public/uploads/fd9FormInfo/2023-17-0916949501538648077747.jpg', 'uploads/fd9FormInfo/2023-17-0916949501532166284763.pdf', NULL, 'jNkVd3U0Nk', 'U8WHpyazA8', 'public/uploads/ngoHead/2023-17-0916949501535936563123.jpg', 'public/uploads/ngoHead/2023-17-0916949501539697706888.jpg', 'Ongoing', '2023-09-17 05:29:13', '2023-09-17 05:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `fd9_forwarding_letter_edits`
--

CREATE TABLE `fd9_forwarding_letter_edits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forwarding_letter_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_part_one` text NOT NULL,
  `pdf_part_two` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT '0',
  `digital_signature` varchar(255) DEFAULT NULL,
  `digital_seal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_one_forms`
--

INSERT INTO `fd9_one_forms` (`id`, `fd_one_form_id`, `foreigner_name_for_subject`, `sarok_number`, `application_date`, `institute_name`, `prokolpo_name`, `designation_name`, `foreigner_name_for_body`, `expire_from_date`, `expire_to_date`, `attestation_of_appointment_letter`, `copy_of_form_nine`, `foreigner_image`, `arrival_date_in_nvisa`, `copy_of_nvisa`, `proposed_from_date`, `proposed_to_date`, `verified_fd_nine_one_form`, `status`, `chief_name`, `chief_desi`, `place`, `digital_signature`, `digital_seal`, `created_at`, `updated_at`) VALUES
(2, 20, 'dewqd', '2312323', '20-09-2023', 'kYxQOTpqLn', '1pc1it1t3H', 'পরিচালক', 'uEYlywR9sN', '19-09-2023', '2023-08-17', 'uploads/fd9OneFormInfo/2023-17-0916949507043724836406.pdf', 'uploads/fd9OneFormInfo/2023-17-0916949507048978990830.pdf', 'public/uploads/fd9OneFormInfo/2023-17-0916949507048145303093.jpg', '18-09-2023', 'uploads/fd9OneFormInfo/2023-17-0916949507046696793319.pdf', '19-09-2023', '25-09-2023', NULL, NULL, 'Kamruzzaman kajol', 'erwerwerewr', '0', 'public/uploads/ngoHead/2023-17-0916949507041302700057.jpg', 'public/uploads/ngoHead/2023-17-0916949507043022913263.jpg', '2023-09-17 05:38:24', '2023-09-17 05:38:24');

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
(19, 20, '33', '33', '33', 'qwe', 'rtyrty', '10:53:34 am', '2023-09-16 22:53:34', '2023-09-16 22:53:34'),
(20, 21, '33', 'wqeqwe', 'wqewq', 'yrtyrt', 'fdgfdg', '12:08:18 pm', '2023-09-17 00:08:18', '2023-09-17 00:08:18'),
(21, 22, '3356', 'rr', '33', 'qweqw', 'qweqw', '13:36:14 pm', '2023-09-17 01:24:35', '2023-09-17 01:36:14'),
(22, 23, '3356', '33', '33', 'yrtyrt', 'rtyrty', '14:11:04 pm', '2023-09-17 02:11:04', '2023-09-17 02:11:04');

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
  `tele_phone_number` varchar(255) DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `plan_of_operation` text DEFAULT NULL,
  `foregin_pdf` varchar(255) DEFAULT NULL,
  `copy_of_chalan` varchar(255) DEFAULT '0',
  `due_vat_pdf` varchar(255) DEFAULT '0',
  `change_ac_number` varchar(255) DEFAULT '0',
  `local_address` varchar(255) DEFAULT NULL,
  `annual_budget` varchar(255) DEFAULT NULL,
  `annual_budget_file` varchar(255) DEFAULT NULL,
  `treasury_number` text DEFAULT NULL,
  `attach_the__supporting_paper` text DEFAULT NULL,
  `vat_invoice_number` text DEFAULT NULL,
  `board_of_revenue_on_fees` text DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `org_phone` varchar(255) DEFAULT '0',
  `org_mobile` varchar(255) DEFAULT '0',
  `org_email` varchar(255) DEFAULT '0',
  `web_site_name` varchar(255) DEFAULT '0',
  `nationality` varchar(255) DEFAULT '0',
  `complete_status` text DEFAULT NULL,
  `verified_fd_one_form` text DEFAULT NULL,
  `verified_fd_eight_form_old` varchar(255) DEFAULT '0',
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
  `digital_signature` varchar(190) DEFAULT NULL,
  `digital_seal` varchar(200) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_forms`
--

INSERT INTO `fd_one_forms` (`id`, `user_id`, `registration_number`, `registration_number_given_by_admin`, `organization_name`, `organization_name_ban`, `organization_address`, `address_of_head_office`, `address_of_head_office_eng`, `country_of_origin`, `name_of_head_in_bd`, `job_type`, `address`, `district`, `phone`, `tele_phone_number`, `email`, `citizenship`, `profession`, `plan_of_operation`, `foregin_pdf`, `copy_of_chalan`, `due_vat_pdf`, `change_ac_number`, `local_address`, `annual_budget`, `annual_budget_file`, `treasury_number`, `attach_the__supporting_paper`, `vat_invoice_number`, `board_of_revenue_on_fees`, `time_for_api`, `org_phone`, `org_mobile`, `org_email`, `web_site_name`, `nationality`, `complete_status`, `verified_fd_one_form`, `verified_fd_eight_form_old`, `chief_name`, `chief_desi`, `digital_signature`, `digital_seal`, `place`, `created_at`, `updated_at`) VALUES
(20, 26, '0', '8678540551977542', 'GhLCR8ICSX', 'kYxQOTpqLn', 'm2mcRXPGiY', 'OBKtF0nWew', 'XQeVt4slyC', 'বাংলাদেশ', '1Qy5ctkvrX', 'পূর্ণকালীন', 'jlqTW49Qdk', NULL, '84037711111', 'XNhwOMVtFM', 'tqqpd@0b90.com', 'আলজেরিয়ান', '16MNpZiJNp', NULL, 'uploads/FdOneForm/2023-17-0916949263462286518370.pdf', 'uploads/copy_of_chalan/2023-17-0916949264144390637939.pdf', 'uploads/due_vat_pdf/2023-17-0916949264141877553594.pdf', 'uploads/change_ac_number/2023-17-0916949264144498852870.pdf', '0', '7777777', 'uploads/FdOneForm/2023-17-0916949263468733836363.pdf', NULL, NULL, NULL, NULL, '10:51:56', 'OkeTXOO53I', '11111111111', 'uxnmk@yuvn.com', 'MffD5utFyb', 'QjkEXxjODr', 'save_and_exit_from_three', NULL, '0', 'jNkVd3U0Nk', 'SYun8uqKix', 'public/uploads/ngoHead/2023-17-0916949263189394851879.jpg', 'public/uploads/ngoHead/2023-17-0916949263188164111113.jpg', NULL, '2023-09-16 22:51:58', '2023-09-16 22:53:34'),
(21, 30, '0', '1687755450075654', 'Lm7cvyaH0g', 'Ai0FdCZVvr', '12BLLKJEYu', 'KYIvQzFlOg', 'm1rWtPBYZW', 'Albania', 'Xy77a9A5lE', 'Full Time', 'CP7zdkQZja', NULL, '60609911111', 'NozZDQBv5z', '558vc@7md4.com', 'Algerian', 'G58UFZodu2', NULL, 'uploads/FdOneForm/2023-17-0916949308451179921559.pdf', 'uploads/copy_of_chalan/2023-17-0916949308985523134295.pdf', 'uploads/due_vat_pdf/2023-17-0916949308988274510116.pdf', 'uploads/change_ac_number/2023-17-0916949308983945322588.pdf', '0', '7777777', 'uploads/FdOneForm/2023-17-0916949308455576717422.pdf', NULL, NULL, NULL, NULL, '12:07:05', 'vBm5U0ULuw', '11111111111', 'kmxrd@xr6e.com', '7idPkoCZha', 'zSzcaKE4sX', 'save_and_exit_from_three', NULL, '0', 'wFKDXflD4O', 'U8WHpyazA8', 'public/uploads/ngoHead/2023-17-0916949308258067361168.jpg', 'public/uploads/ngoHead/2023-17-0916949308255174126654.jpg', NULL, '2023-09-17 00:07:05', '2023-09-17 00:08:18'),
(22, 31, '55565656', '1199383531233589', 'Padma Hut', 'Padma Hut', 'Rajshahi', 'werwerwe', 'Dhaka', 'Bangladesh', 'Kamruzzaman kajol', 'Part Time', 'erwer', 'tryrty,fghfghfg', '01646735100', '01646735100', 'kkajol428@gmail.com', 'Andorran', 'পেশা নাই', 'uploads/FdOneForm/2023-17-0916949345721471682222.pdf', NULL, '0', '0', '0', '0', '7567567', NULL, '23343', 'uploads/attach_the_supporting_papers/2023-17-0916949349634455761573.pdf', '4545', 'uploads/board_of_revenue_on_fees/2023-17-0916949349638185705402.pdf', '13:02:00', NULL, NULL, NULL, NULL, NULL, 'save_and_exit_from_three', NULL, '0', 'Kamruzzaman kajol', 'SYun8uqKix', 'public/uploads/ngoHead/2023-17-0916949341202616338537.jpg', 'public/uploads/ngoHead/2023-17-0916949341205204597497.jpg', 'erwerwe66', '2023-09-17 01:02:00', '2023-09-17 01:36:14'),
(23, 32, '456', '2625510548158096', 'eerIKXaf1a', 'LrYlEdSrRd', '4flfAqMZvM', 'O6nKOigYap', 'yBjatkwbc0', 'বাংলাদেশ', 'yABkSr58aH', 'পূর্ণকালীন', 'dsDh5M0auL', 'tryrty,ooo', '63718322222', 'awl3RRCded', 'o9atv@4jot.com', 'অ্যান্ডোরান', 'areVrzuw6g', 'uploads/FdOneForm/2023-17-0916949379075086306877.pdf', NULL, '0', '0', '0', '0', '7777777', NULL, '23343', 'uploads/attach_the_supporting_papers/2023-17-0916949382641817714233.pdf', '4545', 'uploads/board_of_revenue_on_fees/2023-17-0916949382641033416999.pdf', '14:03:38', NULL, NULL, NULL, NULL, NULL, 'save_and_exit_from_three', NULL, '0', 'ksMkiGmvI9', 'dhZhLAr7Oz', 'public/uploads/ngoHead/2023-17-0916949378182872929904.jpg', 'public/uploads/ngoHead/2023-17-0916949378181155136282.jpg', NULL, '2023-09-17 02:03:38', '2023-09-17 02:11:04');

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
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
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

INSERT INTO `fd_one_member_lists` (`id`, `fd_one_form_id`, `name`, `position`, `address`, `date_of_join`, `mobile`, `email`, `citizenship`, `salary_statement`, `other_occupation`, `now_working_at`, `time_for_api`, `created_at`, `updated_at`) VALUES
(98, 20, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-08', '01646735100', 'kkajol428@gmail.com', 'আফগান', 'Rajshahi', 'rger', NULL, '10:53:05', '2023-09-16 22:53:05', '2023-09-16 22:53:05'),
(99, 20, 'Kamruzzaman kajol', 'NqUyYp2zac', 'iHjXIG7FRm', '2023-09-12', '01646735100', 'kkajol428@gmail.com', 'আলবেনিয়ান', 'Rajshahi', 'dFt4pIFaqz', NULL, '10:53:05', '2023-09-16 22:53:05', '2023-09-16 22:53:05'),
(100, 21, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-19', '01646735100', 'kkajol428@gmail.com', 'Andorran', 'Rajshahi', 'Padma Hut', 'fIPdZwUyU5', '12:07:51', '2023-09-17 00:07:51', '2023-09-17 00:07:51'),
(101, 21, 'Kamruzzaman kajol', 'NqUyYp2zac', 'Rajshahi', '2023-09-19', '01646735100', 'kkajol428@gmail.com', 'Andorran', 'Rajshahi', 'Padma Hut', 'FlMstlU87w', '12:07:51', '2023-09-17 00:07:51', '2023-09-17 00:07:51'),
(110, 22, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-12', '01646735100', 'kkajol428@gmail.com', 'Andorran', 'Rajshahi', 'Padma Hut', 'fIPdZwUyU5', '13:36:11', '2023-09-17 01:36:11', '2023-09-17 01:36:11'),
(111, 22, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-18', '01646735100', 'kkajol428@gmail.com', 'Andorran', 'Rajshahi', 'Padma Hut', 'fIPdZwUyU5', '13:36:11', '2023-09-17 01:36:11', '2023-09-17 01:36:11'),
(114, 23, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-18', '01646735100', 'kkajol428@gmail.com', 'আলজেরিয়ান', 'Rajshahi', 'dFt4pIFaqz', NULL, '14:09:23', '2023-09-17 02:09:23', '2023-09-17 02:09:23'),
(115, 23, 'Kamruzzaman kajol', 'NqUyYp2zac', 'iHjXIG7FRm', '2023-07-24', '01646735100', 'kkajol428@gmail.com', 'আলজেরিয়ান', 'Rajshahi', '8uJ5a0k8iX', NULL, '14:09:23', '2023-09-17 02:09:23', '2023-09-17 02:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_other_pdf_lists`
--

CREATE TABLE `fd_one_other_pdf_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `information_title` varchar(255) DEFAULT NULL,
  `information_pdf` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, 26, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-16 22:51:58', '2023-09-16 22:57:22'),
(21, 30, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-17 00:07:05', '2023-09-17 00:09:06'),
(22, 31, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-17 01:02:00', '2023-09-17 01:36:14'),
(23, 32, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-17 02:03:38', '2023-09-17 03:21:47');

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
  `job_picture` varchar(255) DEFAULT NULL,
  `job_sign` varchar(255) DEFAULT NULL,
  `name_one` varchar(255) DEFAULT '0',
  `name_two` varchar(255) DEFAULT '0',
  `designation_one` varchar(255) DEFAULT '0',
  `designation_two` varchar(255) DEFAULT '0',
  `signature_one` varchar(255) DEFAULT '0',
  `signature_two` varchar(255) DEFAULT '0',
  `seal_one` varchar(255) DEFAULT '0',
  `seal_two` varchar(255) DEFAULT '0',
  `employee_add_status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_eights`
--

INSERT INTO `form_eights` (`id`, `fd_one_form_id`, `name`, `name_slug`, `desi`, `dob`, `nid_no`, `phone`, `father_name`, `present_address`, `permanent_address`, `name_supouse`, `edu_quali`, `profession`, `job_des`, `service_status`, `form_date`, `to_date`, `total_year`, `time_for_api`, `complete_status`, `verified_form_eight`, `job_picture`, `job_sign`, `name_one`, `name_two`, `designation_one`, `designation_two`, `signature_one`, `signature_two`, `seal_one`, `seal_two`, `employee_add_status`, `created_at`, `updated_at`) VALUES
(25, 20, 'VJmqnLCrVg', 'vjmqnlcrvg', 'WcY0zDSX5f', '29-09-2023', 'zStmqisCIN', '41160644444', 'TFXm9j2pi6', 'xfdSTvXtVC', 'zmLoUAdnDr', 'qcaoEXViFm', 'CbZqIbmHHT', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'D0rpjHEJo0', 'হ্যাঁ', '2023-09-17', '2023-09-30', '0 বছর 1 মাস', '10:54:04', 'complete', NULL, 'public/uploads/FormEight/2023-17-0916949264449953036091.jpg', 'public/uploads/FormEight/2023-17-0916949264448350603420.jpg', 'Kamruzzaman kajol', 'Kamruzzaman kajol', 'পদবি', 'পদবি', 'public/uploads/FormEight/2023-17-0916949264975477213375.jpg', 'public/uploads/FormEight/2023-17-0916949265253187504320.jpg', 'public/uploads/seal_one/2023-17-0916949264972238182291.jpg', 'public/uploads/seal_one/2023-17-0916949265257924134769.jpg', 'yes', '2023-09-16 22:54:04', '2023-09-16 22:55:58'),
(26, 20, 'fVoX7tYVjC', 'fvox7tyvjc', 'kT8Fn1VQiT', '21-09-2023', 'WElH6DyZ6y', '96390144444', 'cZaX0MsYu4', 'qRtg2PWZMd', 'u0FgAfAjkJ', 'cprQCQlAE5', 'ZlgM4WohF1', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', '5Gu4gXpk17', 'হ্যাঁ', '2023-09-17', '2023-09-30', '0 বছর 1 মাস', '10:54:36', 'complete', NULL, 'public/uploads/FormEight/2023-17-0916949264764583294571.jpg', 'public/uploads/FormEight/2023-17-0916949264763113978444.jpg', 'Kamruzzaman kajol', 'Kamruzzaman kajol', 'পদবি', 'পদবি', 'public/uploads/FormEight/2023-17-0916949264975477213375.jpg', 'public/uploads/FormEight/2023-17-0916949265253187504320.jpg', 'public/uploads/seal_one/2023-17-0916949264972238182291.jpg', 'public/uploads/seal_one/2023-17-0916949265257924134769.jpg', 'yes', '2023-09-16 22:54:36', '2023-09-16 22:55:58'),
(27, 23, 'F4ZPIt3N98', 'f4zpit3n98', 'F14MJgfiBq', '29-09-2023', 'quAKkQ4V9D', '52425144444', 'ReoBYi3GQK', 'ImcOavT09P', 'JYyknfTg6b', 'tdBd2nBLqc', 'M2ggUQgI4A', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'MICIJptOtE', 'হ্যাঁ', '2023-09-17', '2023-09-30', '0 বছর 1 মাস', '14:11:38', 'complete', NULL, 'public/uploads/FormEight/2023-17-0916949382985470609655.jpg', 'public/uploads/FormEight/2023-17-0916949382982470347201.jpg', 'Kamruzzaman kajol', 'Kamruzzaman kajol', 'পদবি', 'পদবি', 'public/uploads/FormEight/2023-17-0916949383602300780783.jpg', 'public/uploads/FormEight/2023-17-0916949383751195390283.jpg', 'public/uploads/seal_one/2023-17-0916949383608553569202.jpg', 'public/uploads/seal_one/2023-17-0916949383756329272787.jpg', 'yes', '2023-09-17 02:11:38', '2023-09-17 03:20:34'),
(28, 23, 'QQs5pQmfc1', 'qqs5pqmfc1', 'FmXXqg0HvE', '13-09-2023', '2zMeUtSIoU', '68531133333', 'M1ep5x7jIt', 'tZKEV7bhsC', 'Ms0WD2kSUE', 'cYTQKxGUei', 'n3MWdRYemI', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'WXT0kQSMO8', 'হ্যাঁ', '2023-09-17', '2023-09-30', '0 বছর 1 মাস', '14:12:23', 'complete', NULL, 'public/uploads/FormEight/2023-17-0916949383433975497974.jpg', 'public/uploads/FormEight/2023-17-0916949383435066565254.jpg', 'Kamruzzaman kajol', 'Kamruzzaman kajol', 'পদবি', 'পদবি', 'public/uploads/FormEight/2023-17-0916949383602300780783.jpg', 'public/uploads/FormEight/2023-17-0916949383751195390283.jpg', 'public/uploads/seal_one/2023-17-0916949383608553569202.jpg', 'public/uploads/seal_one/2023-17-0916949383756329272787.jpg', 'yes', '2023-09-17 02:12:23', '2023-09-17 03:20:34'),
(29, 23, '555', '555', '555', '15-09-2023', '555555555', '12345678111', '2', '554', '43534', '5654654', '4564565', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'yuyuy', 'হ্যাঁ', '2023-09-17', '2023-09-30', '0 বছর 1 মাস', '15:20:27', 'complete', NULL, 'public/uploads/FormEight/2023-17-0916949424279855755919.jpg', 'public/uploads/FormEight/2023-17-0916949424276200181484.jpg', '0', 'Kamruzzaman kajol', '0', 'পদবি', '0', 'public/uploads/FormEight/2023-17-0916949383751195390283.jpg', '0', 'public/uploads/seal_one/2023-17-0916949383756329272787.jpg', 'yes', '2023-09-17 03:20:27', '2023-09-17 03:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `forwarding_letters`
--

CREATE TABLE `forwarding_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `apply_date` varchar(255) NOT NULL,
  `apply_month_name` varchar(255) NOT NULL,
  `apply_year_name` varchar(255) NOT NULL,
  `sarok_number` varchar(255) NOT NULL,
  `fd9_form_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `job_histories`
--

CREATE TABLE `job_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `designation_list_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(36, '2023_08_07_084905_create_name_change_docs_table', 1),
(37, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(38, '2023_05_05_080336_create_permission_tables', 2),
(39, '2023_05_06_060503_create_system_information_table', 2),
(40, '2023_07_15_072135_create_branches_table', 2),
(41, '2023_07_15_072327_create_designation_lists_table', 2),
(42, '2023_07_15_073752_create_designation_steps_table', 2),
(43, '2023_07_15_074320_create_admins_table', 2),
(44, '2023_07_15_075924_create_forwarding_letters_table', 2),
(45, '2023_07_15_075949_create_forwarding_letter_onulipis_table', 2),
(46, '2023_07_26_111721_create_secruity_checks_table', 2),
(47, '2023_08_01_054043_create_job_histories_table', 2),
(48, '2023_08_12_062314_create_notices_table', 2),
(49, '2023_08_20_092827_create_fd9_forwarding_letter_edits_table', 2),
(50, '2023_08_22_112242_create_admin_designation_histories_table', 3),
(51, '2023_08_24_101740_create_ngo_registration_daks_table', 4),
(52, '2023_08_26_065846_create_dak_details_table', 5),
(53, '2023_08_26_095546_create_ngo_renew_daks_table', 6),
(54, '2023_08_26_095622_create_ngo_name_change_daks_table', 6),
(55, '2023_08_26_095725_create_ngo_f_d_nine_daks_table', 6),
(56, '2023_08_26_095822_create_ngo_f_d_nine_one_daks_table', 6),
(57, '2023_09_04_105726_create_renewal_files_table', 7);

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
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 3),
(2, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `name_change_docs`
--

CREATE TABLE `name_change_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngo_name_change_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_file_list` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, 22, '2023-09-17', '2033-09-17', 'Accepted', NULL, '2023-09-17 04:38:56', '2023-09-17 04:38:56'),
(12, 22, '2023-09-17', '2033-09-17', 'Accepted', NULL, '2023-09-17 04:38:58', '2023-09-17 04:38:58'),
(13, 22, '2023-09-17', '2033-09-17', 'Accepted', NULL, '2023-09-17 04:39:06', '2023-09-17 04:39:06'),
(14, 23, '2023-09-17', '2033-09-17', 'Accepted', NULL, '2023-09-17 04:40:07', '2023-09-17 04:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_f_d_nine_daks`
--

CREATE TABLE `ngo_f_d_nine_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `f_d_nine_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_f_d_nine_one_daks`
--

CREATE TABLE `ngo_f_d_nine_one_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `f_d_nine_one_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `ngo_name_change_daks`
--

CREATE TABLE `ngo_name_change_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `name_change_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_name_change_daks`
--

INSERT INTO `ngo_name_change_daks` (`id`, `sender_admin_id`, `receiver_admin_id`, `name_change_status_id`, `original_recipient`, `copy_of_work`, `informational_purposes`, `attraction_attention`, `dak_detail_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '5', '1', '1', '', '', '', '7', '1', '2023-08-31 00:12:29', '2023-08-31 01:49:53'),
(2, '2', '3', '1', '', '1', '', '', '7', '1', '2023-08-31 00:12:29', '2023-08-31 01:49:53'),
(3, '2', '5', '4', '1', '', '', '', '14', '1', '2023-08-31 01:51:29', '2023-08-31 02:03:32'),
(4, '2', '3', '4', '', '1', '', '', '14', '1', '2023-08-31 01:51:29', '2023-08-31 02:03:32'),
(5, '2', '5', '5', NULL, NULL, NULL, NULL, NULL, '0', '2023-08-31 02:08:10', '2023-08-31 02:08:10'),
(6, '2', '3', '5', NULL, NULL, NULL, NULL, NULL, '0', '2023-08-31 02:08:10', '2023-08-31 02:08:10');

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
(62, 22, 'uploads/NgoOtherDoc/2023-17-0916949356674749520922.pdf', '13:27:47 pm', '0.02', '2023-09-17 01:27:47', '2023-09-17 01:27:47'),
(63, 22, 'uploads/NgoOtherDoc/2023-17-0916949356674501963472.pdf', '13:27:47 pm', '0.02', '2023-09-17 01:27:47', '2023-09-17 01:27:47'),
(64, 22, 'uploads/NgoOtherDoc/2023-17-0916949356672028717215.pdf', '13:27:47 pm', '0.02', '2023-09-17 01:27:47', '2023-09-17 01:27:47'),
(65, 22, 'uploads/NgoOtherDoc/2023-17-0916949356675683579569.pdf', '13:27:47 pm', '0.02', '2023-09-17 01:27:47', '2023-09-17 01:27:47'),
(66, 22, 'uploads/NgoOtherDoc/2023-17-0916949356671183431360.pdf', '13:27:47 pm', '0.02', '2023-09-17 01:27:47', '2023-09-17 01:27:47'),
(67, 22, 'uploads/NgoOtherDoc/2023-17-0916949356675158269250.pdf', '13:27:47 pm', '0.02', '2023-09-17 01:27:47', '2023-09-17 01:27:47'),
(68, 22, 'uploads/NgoOtherDoc/2023-17-0916949356677366773073.pdf', '13:27:47 pm', '0.02', '2023-09-17 01:27:47', '2023-09-17 01:27:47'),
(69, 23, 'uploads/NgoOtherDoc/2023-17-0916949384259989972726.pdf', '14:13:45 pm', '0.02', '2023-09-17 02:13:45', '2023-09-17 02:13:45'),
(70, 23, 'uploads/NgoOtherDoc/2023-17-0916949384255064953998.pdf', '14:13:45 pm', '0.02', '2023-09-17 02:13:45', '2023-09-17 02:13:45'),
(71, 23, 'uploads/NgoOtherDoc/2023-17-0916949384255217093036.pdf', '14:13:45 pm', '0.02', '2023-09-17 02:13:45', '2023-09-17 02:13:45'),
(72, 23, 'uploads/NgoOtherDoc/2023-17-0916949384258915884965.pdf', '14:13:45 pm', '0.02', '2023-09-17 02:13:45', '2023-09-17 02:13:45'),
(73, 23, 'uploads/NgoOtherDoc/2023-17-0916949384254146049806.pdf', '14:13:45 pm', '0.12', '2023-09-17 02:13:45', '2023-09-17 02:13:45'),
(74, 23, 'uploads/NgoOtherDoc/2023-17-0916949384252980749877.pdf', '14:13:45 pm', '0.02', '2023-09-17 02:13:45', '2023-09-17 02:13:45'),
(75, 23, 'uploads/NgoOtherDoc/2023-17-0916949384255097927051.pdf', '14:13:45 pm', '0.02', '2023-09-17 02:13:45', '2023-09-17 02:13:45'),
(76, 23, 'uploads/NgoOtherDoc/2023-17-0916949384268919681157.pdf', '14:13:45 pm', '0.02', '2023-09-17 02:13:46', '2023-09-17 02:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_registration_daks`
--

CREATE TABLE `ngo_registration_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `registration_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(110) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_registration_daks`
--

INSERT INTO `ngo_registration_daks` (`id`, `sender_admin_id`, `receiver_admin_id`, `registration_status_id`, `original_recipient`, `copy_of_work`, `informational_purposes`, `attraction_attention`, `status`, `dak_detail_id`, `created_at`, `updated_at`) VALUES
(14, '2', '5', '1', '1', '', '', '', '1', '2', '2023-08-26 02:44:06', '2023-08-26 03:44:52'),
(15, '2', '3', '1', '', '1', '', '', '1', '2', '2023-08-26 02:44:06', '2023-08-26 03:44:52'),
(16, '1', '2', '2', '', '', '', '', '1', '6', '2023-08-29 01:27:11', '2023-08-29 01:28:21'),
(17, '1', '5', '2', '', '', '', '', '1', '6', '2023-08-29 01:27:11', '2023-08-29 01:28:21'),
(18, '1', '3', '2', '', '', '', '', '1', '6', '2023-08-29 01:27:11', '2023-08-29 01:28:21'),
(19, '1', '2', '2', NULL, NULL, NULL, NULL, '0', NULL, '2023-08-29 01:28:41', '2023-08-29 01:28:41'),
(20, '1', '5', '2', NULL, NULL, NULL, NULL, '0', NULL, '2023-08-29 01:28:41', '2023-08-29 01:28:41');

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

-- --------------------------------------------------------

--
-- Table structure for table `ngo_renew_daks`
--

CREATE TABLE `ngo_renew_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `renew_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_renew_daks`
--

INSERT INTO `ngo_renew_daks` (`id`, `sender_admin_id`, `receiver_admin_id`, `renew_status_id`, `original_recipient`, `copy_of_work`, `informational_purposes`, `attraction_attention`, `dak_detail_id`, `status`, `created_at`, `updated_at`) VALUES
(3, '2', '5', '1', '1', '', '', '', '5', '1', '2023-08-27 00:31:27', '2023-08-27 00:31:41');

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
  `nationality` varchar(255) DEFAULT NULL,
  `verified_form` varchar(255) DEFAULT NULL,
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
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
  `digital_signature` varchar(255) DEFAULT NULL,
  `digital_seal` varchar(255) DEFAULT NULL,
  `yearly_budget_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(16, 20, 'kkajol428@gmail.com', NULL, NULL, NULL, 'Accepted', NULL, '2023-09-16 23:27:51', '2023-09-16 23:27:51'),
(17, 21, 'kamruzzamankajol.cse@gmail.com', NULL, NULL, NULL, 'Accepted', NULL, '2023-09-17 00:25:53', '2023-09-17 00:25:53'),
(18, 22, 'kajol1122018@gmail.com', 'NGO Registration', '1199383531233589', NULL, 'Accepted', NULL, '2023-09-17 01:52:27', '2023-09-17 01:52:27'),
(19, 23, 'kajolkamruzzaman.cse@gmail.com', 'NGO Registration', '2625510548158096', NULL, 'Accepted', NULL, '2023-09-17 03:35:28', '2023-09-17 03:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_type_and_languages`
--

CREATE TABLE `ngo_type_and_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ngo_type` varchar(255) NOT NULL,
  `ngo_type_new_old` varchar(255) NOT NULL,
  `registration` varchar(255) DEFAULT '0',
  `last_renew_date` varchar(255) DEFAULT '0',
  `ngo_language` varchar(255) NOT NULL,
  `first_one_form_check_status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_type_and_languages`
--

INSERT INTO `ngo_type_and_languages` (`id`, `user_id`, `ngo_type`, `ngo_type_new_old`, `registration`, `last_renew_date`, `ngo_language`, `first_one_form_check_status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(27, 26, 'দেশিও', 'Old', '4534', '25-09-2023', 'en', '1', '17:23:53', '2023-09-16 05:23:53', '2023-09-16 05:23:53'),
(28, 30, 'Foreign', 'Old', '321', '25-09-2023', 'sp', '1', '12:03:44', '2023-09-17 00:03:44', '2023-09-17 00:03:44'),
(29, 31, 'Foreign', 'New', '0', '0', 'sp', '1', '12:50:44', '2023-09-17 00:50:44', '2023-09-17 00:50:44'),
(30, 32, 'দেশিও', 'New', '0', '0', 'en', '1', '13:58:52', '2023-09-17 01:58:52', '2023-09-17 01:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headline` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_visas`
--

CREATE TABLE `n_visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `fd9_one_form_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `n_visas` (`id`, `fd_one_form_id`, `fd9_one_form_id`, `period_validity`, `permit_efct_date`, `visa_ref_no`, `visa_recomendation_letter_received_way`, `visa_recomendation_letter_ref_no`, `department_in`, `visa_category`, `applicant_photo`, `forwarding_letter`, `salary_remarks`, `other_benefit`, `status`, `created_at`, `updated_at`) VALUES
(2, 20, 2, 'QTmemJ6FVa', '22-09-2023', 'fayvUj31sd', 'Online', 'DDGjIofGAB', 'NGO', 'N-Visa', 'public/uploads/applicant_photo/2023-17-0916949507991761291216.jpg', NULL, 'SOCBm4B2fa', 'WDB9Cgo17i', NULL, '2023-09-17 05:39:59', '2023-09-17 05:39:59');

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
(2, 2, 'vKBzRymbQ7', '8ERpFxv9Yv', 'fIbxqC6Vwb', '0IiOMp7eby', 'AyZumQuDlh', '37218333333', 'C6wPFgWGj7', 'DQh5BjV89m', '20-09-2023', '4QWCoH3EHn', 'gx39m@mv6o.com', '2023-09-17 05:39:59', '2023-09-17 05:39:59');

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
(8, 2, 'Annual Bonus', 'Monthly', 'RTqmwRRAwX', 'dple7J6DPm', '2023-09-17 05:39:59', '2023-09-17 05:41:23'),
(9, 2, 'Medical Allowance', 'Monthly', 'yO4v4KYKfF', 'BeVIjHia8Y', '2023-09-17 05:39:59', '2023-09-17 05:39:59'),
(10, 2, 'Entertainment Allowance', 'Yearly', '2VEltXgWFK', 'ZxuVfNaXvY', '2023-09-17 05:39:59', '2023-09-17 05:39:59'),
(11, 2, 'Conveyance', 'Monthly', 'BsqySUZsgE', 'vXKl72GxwS', '2023-09-17 05:40:00', '2023-09-17 05:40:00'),
(12, 2, 'House Rent', 'Monthly', '0wQlqsvuoN', 'OJZ9m5pk2H', '2023-09-17 05:40:00', '2023-09-17 05:40:00'),
(13, 2, 'Overseas Allowance', 'Monthly', 'h54J6rNHqQ', 'FR6af8tJKq', '2023-09-17 05:40:00', '2023-09-17 05:40:00'),
(14, 2, 'Basic Salary', 'Yearly', 'B4hi44iXP7', 'njy4gR0b3x', '2023-09-17 05:40:00', '2023-09-17 05:40:00');

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
(2, 2, 'dAQbAutQto', 'ialfrMWTA1', 'N-Visa', '21-09-2023', '13-09-2023', '2', '0ISpDwrRTP', 'aTxJwvqDUb', 'CIMf6suMET', '14-09-2023', '2023-09-17 05:39:59', '2023-09-17 05:39:59');

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
(2, 2, 'zENKgSunTU', 'ni3uN1uOlo', 'vTS1sMcNzD', '4CUbZEwrx1', '1lQoJcSpFK', 'fOgPHB2OTr', 'kuWWBv7dcr', 'JAACqSHXN5', 'PYjQqNRqXL', '2023-09-17 05:39:59', '2023-09-17 05:39:59');

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
(2, 2, 'r7D4xTzXPS', 'Albanian', 'w0kIpBesAD', '21-09-2023', 'alcuX1seoe', '27-09-2023', 'Algeria', 'LvOC1oDdk5', 'r2a38hX3RW', 'K2a86lPheO', '1z8sAlk8Dk', 'I6XufFb4Oe', '346897', 'j26m2z0OlE', 'hGCLxFxsHb', 'arlyy@vr8p.com', '2hIVQvNTeZ', 'Married', '2023-09-17 05:39:59', '2023-09-17 05:39:59');

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
(2, 2, '36gHh4hb3t', 'F9ROUfU0tP', 'VjeBJS78EM', 'llL1MtXYdU', '2Rf0ehWph0', 'voKLMaVOjQ', '5924771507', 'txYZK4PakM', '6Y8BsGEyU0', 'HbR55REUJb', 'rcqcy@yw2l.com', 'NGO', 'heU0jUa1Kn', 'mAH4AkXj61', 'AGEzKMpnu5', '8TYawrKUde', 'NGO', 'zYl1aSl62p', 'qsMWm2PyfL', '2023-09-17 05:39:59', '2023-09-17 05:39:59');

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
(2, 2, 'LbcGeLbPq8', 'Yl6EZMj7CS', '0jbqdPZ0Pj', 'NGO', '99338733333', 'pWaC9TnCLw', 'RsP2odib82', 'xVmQysql9f', '2023-09-17 05:39:59', '2023-09-17 05:39:59');

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
(1, 'dashboard.view', 'dashboard', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(2, 'dashboard.edit', 'dashboard', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(3, 'employeeEndDate.view', 'employeeEndDate', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(4, 'employeeEndDate.edit', 'employeeEndDate', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(5, 'assignedEmployee.view', 'assignedEmployee', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(6, 'assignedEmployee.edit', 'assignedEmployee', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(7, 'systemInformationAdd', 'systemInformation', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(8, 'systemInformationView', 'systemInformation', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(9, 'systemInformationDelete', 'systemInformation', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(10, 'systemInformationUpdate', 'systemInformation', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(11, 'countryAdd', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(12, 'countryView', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(13, 'countryDelete', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(14, 'countryUpdate', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(15, 'noticeAdd', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(16, 'noticeView', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(17, 'noticeDelete', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(18, 'noticeUpdate', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(19, 'postAdd', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(20, 'postView', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(21, 'postDelete', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(22, 'postUpdate', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(23, 'fd9FormAdd', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(24, 'fd9FormView', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(25, 'fd9FormDelete', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(26, 'fd9FormUpdate', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(27, 'branchAdd', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(28, 'branchView', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(29, 'branchDelete', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(30, 'branchUpdate', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(31, 'designationAdd', 'designation', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(32, 'designationView', 'designation', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(33, 'designationDelete', 'designation', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(34, 'designationUpdate', 'designation', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(35, 'designationStepAdd', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(36, 'designationStepView', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(37, 'designationStepDelete', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(38, 'designationStepUpdate', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(39, 'fd9OneFormAdd', 'fd9OneForm', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(40, 'fd9OneFormView', 'fd9OneForm', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(41, 'fd9OneFormDelete', 'fd9OneForm', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(42, 'fd9OneFormUpdate', 'fd9OneForm', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(43, 'name_change_add', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(44, 'name_change_view', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(45, 'name_change_delete', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(46, 'name_change_update', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(47, 'register_list_add', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(48, 'register_list_view', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(49, 'register_list_delete', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(50, 'register_list_update', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(51, 'renew_add', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(52, 'renew_view', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(53, 'renew_delete', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(54, 'renew_update', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(55, 'userAdd', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(56, 'userView', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(57, 'userDelete', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(58, 'userUpdate', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(59, 'roleAdd', 'role', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(60, 'roleView', 'role', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(61, 'roleDelete', 'role', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(62, 'roleUpdate', 'role', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(63, 'permissionAdd', 'permission', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(64, 'permissionView', 'permission', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(65, 'permissionDelete', 'permission', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(66, 'permissionUpdate', 'permission', 'admin', '2023-08-22 02:02:56', '2023-08-22 02:02:56'),
(67, 'profile.view', 'profile', 'admin', '2023-08-22 02:02:56', '2023-08-22 02:02:56'),
(68, 'profile.edit', 'profile', 'admin', '2023-08-22 02:02:56', '2023-08-22 02:02:56');

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
-- Table structure for table `renewal_files`
--

CREATE TABLE `renewal_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `constitution_of_the_organization_has_changed` varchar(255) DEFAULT NULL,
  `list_of_board_of_directors_or_board_of_trustees` varchar(255) DEFAULT NULL,
  `organization_by_laws_or_constitution` varchar(255) DEFAULT NULL,
  `work_procedure_of_organization` varchar(255) DEFAULT NULL,
  `last_ten_years_audit_report_and_annual_report_of_the_company` varchar(255) DEFAULT NULL,
  `registration_certificate` varchar(255) DEFAULT NULL,
  `attested_copy_of_latest_registration_or_renewal_certificate` varchar(255) DEFAULT NULL,
  `right_to_information_act` varchar(255) DEFAULT NULL,
  `the_constitution_of_the_company_along_with_fee_if_changed` varchar(255) DEFAULT NULL,
  `constitution_approved_by_primary_registering_authority` varchar(255) DEFAULT NULL,
  `clean_copy_of_the_constitution` varchar(255) DEFAULT NULL,
  `payment_of_change_fee` varchar(255) DEFAULT NULL,
  `section_sub_section_of_the_constitution` varchar(255) DEFAULT NULL,
  `previous_constitution_and_current_constitution_compare` varchar(255) DEFAULT NULL,
  `constitution_of_the_organization_if_unchanged` varchar(255) DEFAULT NULL,
  `nid_and_image_of_executive_committee_members` varchar(255) DEFAULT NULL,
  `approval_of_executive_committee` varchar(255) DEFAULT NULL,
  `committee_members_list` varchar(255) DEFAULT NULL,
  `registration_renewal_fee` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renewal_files`
--

INSERT INTO `renewal_files` (`id`, `fd_one_form_id`, `constitution_of_the_organization_has_changed`, `list_of_board_of_directors_or_board_of_trustees`, `organization_by_laws_or_constitution`, `work_procedure_of_organization`, `last_ten_years_audit_report_and_annual_report_of_the_company`, `registration_certificate`, `attested_copy_of_latest_registration_or_renewal_certificate`, `right_to_information_act`, `the_constitution_of_the_company_along_with_fee_if_changed`, `constitution_approved_by_primary_registering_authority`, `clean_copy_of_the_constitution`, `payment_of_change_fee`, `section_sub_section_of_the_constitution`, `previous_constitution_and_current_constitution_compare`, `constitution_of_the_organization_if_unchanged`, `nid_and_image_of_executive_committee_members`, `approval_of_executive_committee`, `committee_members_list`, `registration_renewal_fee`, `time_for_api`, `created_at`, `updated_at`) VALUES
(11, 20, 'No', NULL, 'uploads/RenewalFile/2023-17-0916949266329408518207.pdf', 'uploads/RenewalFile/2023-17-0916949266324952691328.pdf', 'uploads/RenewalFile/2023-17-0916949266322445526588.pdf', NULL, 'uploads/RenewalFile/2023-17-0916949266329848726926.pdf', 'uploads/RenewalFile/2023-17-0916949266322644968465.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/RenewalFile/2023-17-0916949266324496788420.pdf', 'uploads/RenewalFile/2023-17-0916949266327767402186.pdf', 'uploads/RenewalFile/2023-17-0916949266323336345360.pdf', 'uploads/RenewalFile/2023-17-0916949266324215554506.pdf', 'uploads/RenewalFile/2023-17-0916949266329552054810.pdf', NULL, '2023-09-16 22:57:12', '2023-09-16 22:57:12'),
(12, 21, 'No', 'uploads/RenewalFile/2023-17-0916949309389431876593.pdf', 'uploads/RenewalFile/2023-17-0916949309384511393403.pdf', 'uploads/RenewalFile/2023-17-0916949309381497340922.pdf', 'uploads/RenewalFile/2023-17-0916949309389196872746.pdf', 'uploads/RenewalFile/2023-17-0916949309382353271909.pdf', 'uploads/RenewalFile/2023-17-0916949309389791271716.pdf', 'uploads/RenewalFile/2023-17-0916949309386608071794.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/RenewalFile/2023-17-0916949309386117486449.pdf', NULL, NULL, NULL, NULL, NULL, '2023-09-17 00:08:58', '2023-09-17 00:08:58');

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
(1, 'superadmin', 'admin', '2023-08-22 02:02:48', '2023-08-22 02:02:48'),
(2, 'admin', 'admin', '2023-08-22 02:02:48', '2023-08-22 02:02:48'),
(3, 'editor', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(4, 'user', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49');

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
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2);

-- --------------------------------------------------------

--
-- Table structure for table `secruity_checks`
--

CREATE TABLE `secruity_checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` varchar(255) NOT NULL,
  `request_id` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `statusName` varchar(255) DEFAULT NULL,
  `statusId` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `secruity_checks`
--

INSERT INTO `secruity_checks` (`id`, `n_visa_id`, `request_id`, `tracking_no`, `statusName`, `statusId`, `created_at`, `updated_at`) VALUES
(2, '1', 'BjrHYrfIvT', 'WPN-14September2023-1694685490Xy5Z7p', 'Submitted', '1', '2023-09-14 03:58:17', '2023-09-14 03:58:17');

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
  `system_admin_url` text DEFAULT NULL,
  `system_logo` varchar(255) NOT NULL,
  `system_icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `system_name`, `system_phone`, `system_email`, `system_address`, `system_url`, `system_admin_url`, `system_logo`, `system_icon`, `created_at`, `updated_at`) VALUES
(1, 'NGO AB', '454543', 'm@gmail.com', 'NGO Affairs Bureau. Prime Minister\'s Office. Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207.', 'http://localhost/databaseUpdate/front/', 'http://localhost/databaseUpdate/admin/', 'public/uploads/169269169920230822logo.png', 'public/uploads/169269169920230822logo.png', '2023-08-22 02:08:20', '2023-08-22 02:08:20');

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
  `ngo_type` varchar(255) DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL,
  `last_renew_date` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `non_verified_email` varchar(255) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `user_name`, `user_phone`, `user_address`, `user_image`, `ngo_type`, `registration`, `last_renew_date`, `email`, `non_verified_email`, `user_email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(26, 'main Ngo', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kkajol428@gmail.com', NULL, NULL, '$2y$10$akeWXLExQsxz1xFzkLdF9ufSsQDudw3MUAymCX/sYWQ/RmHyeEWeC', NULL, '2023-09-16 05:21:37', '2023-09-16 05:22:59', 1),
(30, 'Kamruzzaman kajol', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kamruzzamankajol.cse@gmail.com', 'kamruzzamankajol.cse@gmail.com', NULL, '$2y$10$iTtOjdKz7K0XW5qjOAax8.KBNblVPqhg.hEETX3kQwAEd3EfEamS6', NULL, '2023-09-16 23:58:43', '2023-09-17 00:02:01', 1),
(31, 'Kamruzzaman kajol', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kajol1122018@gmail.com', 'kajol1122018@gmail.com', NULL, '$2y$10$iTtOjdKz7K0XW5qjOAax8.KBNblVPqhg.hEETX3kQwAEd3EfEamS6', NULL, '2023-09-17 00:45:15', '2023-09-17 00:45:42', 1),
(32, 'Kamruzzaman kajol', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kajolkamruzzaman.cse@gmail.com', 'kajolkamruzzaman.cse@gmail.com', NULL, '$2y$10$jEnKmUsXWo9b8sf25eUIK.Glj2cevRwFBTPH/9.4wB0b8ZPYUEiWe', NULL, '2023-09-17 01:57:36', '2023-09-17 01:58:08', 1);

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
(1, 'L2NCkBzG2c', '2023-08-22 03:30:36', '2023-08-22 03:30:36'),
(2, 'BHJphfKcmh', '2023-08-28 03:45:41', '2023-08-28 03:45:41'),
(3, 'gPXKyUE0lk', '2023-08-29 05:43:30', '2023-08-29 05:43:30'),
(4, '4rVxGwBzXb', '2023-08-29 09:07:32', '2023-08-29 09:07:32'),
(5, 'fi3zjDkCKt', '2023-08-30 00:40:49', '2023-08-30 00:40:49'),
(6, '5h2PXxoUMs', '2023-08-30 00:41:00', '2023-08-30 00:41:00'),
(7, 'KU8PWzlh4J', '2023-08-30 00:41:42', '2023-08-30 00:41:42'),
(8, '1XMPKTNCNN', '2023-08-30 00:41:49', '2023-08-30 00:41:49'),
(9, 'tw8gCBSMqG', '2023-08-30 00:42:04', '2023-08-30 00:42:04'),
(10, 'UhRkyjHSZ3', '2023-08-30 00:42:44', '2023-08-30 00:42:44'),
(11, '54eQaonnxT', '2023-08-30 00:46:49', '2023-08-30 00:46:49'),
(12, '0LTkUMTkqL', '2023-08-30 00:47:02', '2023-08-30 00:47:02'),
(13, 'SVLKsnXhe3', '2023-08-30 00:52:22', '2023-08-30 00:52:22'),
(14, '4VTSqV8meH', '2023-08-30 00:57:55', '2023-08-30 00:57:55'),
(15, 'aAGWWHLOqg', '2023-08-30 04:18:08', '2023-08-30 04:18:08'),
(16, '9x7U3dU7hd', '2023-08-30 04:38:40', '2023-08-30 04:38:40'),
(17, '5fohU9Igg7', '2023-09-06 01:15:52', '2023-09-06 01:15:52'),
(18, 'B5OYT0TKCL', '2023-09-08 22:43:15', '2023-09-08 22:43:15'),
(19, 'cD7zWf84gl', '2023-09-10 02:38:21', '2023-09-10 02:38:21'),
(20, 'bQguZC8MVl', '2023-09-10 04:34:20', '2023-09-10 04:34:20'),
(21, 'Qed2yLLvzX', '2023-09-10 04:55:29', '2023-09-10 04:55:29'),
(22, 'FfgZ9Dzxhr', '2023-09-10 05:08:33', '2023-09-10 05:08:33'),
(23, 'btnfGTvcbN', '2023-09-10 05:19:36', '2023-09-10 05:19:36'),
(24, 'NW6MDEhjAh', '2023-09-15 23:33:13', '2023-09-15 23:33:13'),
(25, 'gSnummbPh1', '2023-09-16 00:54:09', '2023-09-16 00:54:09'),
(26, 'BdZNc0fSOT', '2023-09-16 05:21:37', '2023-09-16 05:21:37'),
(27, 'Bt40M94bKS', '2023-09-16 23:52:24', '2023-09-16 23:52:24'),
(28, 'OoeZ3oGWjk', '2023-09-16 23:54:46', '2023-09-16 23:54:46'),
(29, 'rkvSrTFG5M', '2023-09-16 23:57:34', '2023-09-16 23:57:34'),
(30, 'oo63CGibjG', '2023-09-16 23:58:44', '2023-09-16 23:58:44'),
(31, 'amnPmp5r9H', '2023-09-17 00:45:15', '2023-09-17 00:45:15'),
(32, 'J1rgNf7z6R', '2023-09-17 01:57:36', '2023-09-17 01:57:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_designation_histories`
--
ALTER TABLE `admin_designation_histories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `dak_details`
--
ALTER TABLE `dak_details`
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
  ADD KEY `fd9_forms_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd9_forwarding_letter_edits`
--
ALTER TABLE `fd9_forwarding_letter_edits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_forwarding_letter_edits_forwarding_letter_id_foreign` (`forwarding_letter_id`);

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
-- Indexes for table `job_histories`
--
ALTER TABLE `job_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_histories_admin_id_foreign` (`admin_id`),
  ADD KEY `job_histories_designation_list_id_foreign` (`designation_list_id`);

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
-- Indexes for table `name_change_docs`
--
ALTER TABLE `name_change_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_change_docs_ngo_name_change_id_foreign` (`ngo_name_change_id`);

--
-- Indexes for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_durations_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_f_d_nine_daks`
--
ALTER TABLE `ngo_f_d_nine_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_f_d_nine_one_daks`
--
ALTER TABLE `ngo_f_d_nine_one_daks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ngo_name_change_daks`
--
ALTER TABLE `ngo_name_change_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_other_docs_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_registration_daks`
--
ALTER TABLE `ngo_registration_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_renews_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_renew_daks`
--
ALTER TABLE `ngo_renew_daks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `n_visas`
--
ALTER TABLE `n_visas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visas_fd_one_form_id_foreign` (`fd_one_form_id`),
  ADD KEY `n_visas_fd9_one_form_id_foreign` (`fd9_one_form_id`);

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
-- Indexes for table `renewal_files`
--
ALTER TABLE `renewal_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renewal_files_fd_one_form_id_foreign` (`fd_one_form_id`);

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
-- Indexes for table `secruity_checks`
--
ALTER TABLE `secruity_checks`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_designation_histories`
--
ALTER TABLE `admin_designation_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `dak_details`
--
ALTER TABLE `dak_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `designation_lists`
--
ALTER TABLE `designation_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `designation_steps`
--
ALTER TABLE `designation_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fd9_foreigner_employee_family_member_lists`
--
ALTER TABLE `fd9_foreigner_employee_family_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fd9_forms`
--
ALTER TABLE `fd9_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fd9_forwarding_letter_edits`
--
ALTER TABLE `fd9_forwarding_letter_edits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fd9_one_forms`
--
ALTER TABLE `fd9_one_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fd_one_adviser_lists`
--
ALTER TABLE `fd_one_adviser_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fd_one_bank_accounts`
--
ALTER TABLE `fd_one_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fd_one_member_lists`
--
ALTER TABLE `fd_one_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `fd_one_other_pdf_lists`
--
ALTER TABLE `fd_one_other_pdf_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fd_one_source_of_funds`
--
ALTER TABLE `fd_one_source_of_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_complete_statuses`
--
ALTER TABLE `form_complete_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `form_eights`
--
ALTER TABLE `form_eights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `forwarding_letters`
--
ALTER TABLE `forwarding_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forwarding_letter_onulipis`
--
ALTER TABLE `forwarding_letter_onulipis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_histories`
--
ALTER TABLE `job_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `name_change_docs`
--
ALTER TABLE `name_change_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ngo_f_d_nine_daks`
--
ALTER TABLE `ngo_f_d_nine_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ngo_f_d_nine_one_daks`
--
ALTER TABLE `ngo_f_d_nine_one_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ngo_name_changes`
--
ALTER TABLE `ngo_name_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ngo_name_change_daks`
--
ALTER TABLE `ngo_name_change_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `ngo_registration_daks`
--
ALTER TABLE `ngo_registration_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ngo_renew_daks`
--
ALTER TABLE `ngo_renew_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_visas`
--
ALTER TABLE `n_visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_visa_authorized_personal_of_the_orgs`
--
ALTER TABLE `n_visa_authorized_personal_of_the_orgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_visa_compensation_and_benifits`
--
ALTER TABLE `n_visa_compensation_and_benifits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `n_visa_employment_information`
--
ALTER TABLE `n_visa_employment_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_visa_manpower_of_the_offices`
--
ALTER TABLE `n_visa_manpower_of_the_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_visa_necessary_document_for_work_permits`
--
ALTER TABLE `n_visa_necessary_document_for_work_permits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_visa_particulars_of_foreign_incumbnets`
--
ALTER TABLE `n_visa_particulars_of_foreign_incumbnets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_visa_particular_of_sponsor_or_employers`
--
ALTER TABLE `n_visa_particular_of_sponsor_or_employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_visa_work_place_addresses`
--
ALTER TABLE `n_visa_work_place_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renewal_files`
--
ALTER TABLE `renewal_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `secruity_checks`
--
ALTER TABLE `secruity_checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `fd9_forms_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_forwarding_letter_edits`
--
ALTER TABLE `fd9_forwarding_letter_edits`
  ADD CONSTRAINT `fd9_forwarding_letter_edits_forwarding_letter_id_foreign` FOREIGN KEY (`forwarding_letter_id`) REFERENCES `forwarding_letters` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `job_histories`
--
ALTER TABLE `job_histories`
  ADD CONSTRAINT `job_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_histories_designation_list_id_foreign` FOREIGN KEY (`designation_list_id`) REFERENCES `designation_lists` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `name_change_docs`
--
ALTER TABLE `name_change_docs`
  ADD CONSTRAINT `name_change_docs_ngo_name_change_id_foreign` FOREIGN KEY (`ngo_name_change_id`) REFERENCES `ngo_name_changes` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `n_visas_fd9_one_form_id_foreign` FOREIGN KEY (`fd9_one_form_id`) REFERENCES `fd9_one_forms` (`id`) ON DELETE CASCADE,
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
-- Constraints for table `renewal_files`
--
ALTER TABLE `renewal_files`
  ADD CONSTRAINT `renewal_files_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

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
