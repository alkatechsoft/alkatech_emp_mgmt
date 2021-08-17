-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 17, 2021 at 02:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aks_alkatech_emp_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'eyJpdiI6IjlhRHE1NTNNSDRhY1RqR292K3NnMlE9PSIsInZhbHVlIjoiUFFVSklTMWxlOHNuSlFaVWw3V0hBZz09IiwibWFjIjoiMjk1NmFkN2VkYTRlOGYyZGRjMTk2M2NmNGMwMzFhOTJiMjNkN2NmZGI3YWY1NTY5YWIwNTk2MWM4ODlmZWNhMyJ9', NULL, '2021-07-31 03:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `emp_id`, `date`, `in_time`, `out_time`, `created_at`, `updated_at`) VALUES
(1, 2, '2018-01-23', '10:10:00', '02:29:00', '2021-08-11 12:38:03', '2021-08-11 12:38:03'),
(2, 2, '1985-07-25', '07:41:00', '00:00:00', '2021-08-11 12:38:03', '2021-08-11 12:38:03'),
(3, 2, '1978-05-10', '19:07:00', '04:55:00', '2021-08-11 12:38:03', '2021-08-11 12:38:03'),
(4, 2, '1976-04-18', '18:02:00', '13:13:00', '2021-08-11 12:38:03', '2021-08-11 12:38:03'),
(5, 4, '2010-11-24', '22:10:00', '22:15:00', '2021-08-11 12:38:44', '2021-08-11 12:38:44'),
(6, 4, '2015-08-02', '00:29:00', '06:49:00', '2021-08-11 12:38:44', '2021-08-11 12:38:44'),
(7, 4, '1994-06-18', '11:30:00', '22:48:00', '2021-08-11 12:38:44', '2021-08-11 12:38:44'),
(18, 1, '2021-08-01', '10:41:00', '12:34:00', '2021-08-12 11:27:30', '2021-08-12 11:27:30'),
(19, 1, '2021-08-02', '03:30:00', '21:06:00', '2021-08-12 11:27:30', '2021-08-12 11:27:30'),
(20, 1, '2021-08-03', '18:07:00', '03:13:00', '2021-08-12 11:27:30', '2021-08-12 11:27:30'),
(21, 1, '2021-08-04', '22:42:00', '08:00:00', '2021-08-12 11:27:30', '2021-08-12 11:27:30'),
(23, 6, '2021-08-05', '19:35:00', '18:35:00', '2021-08-12 13:06:02', '2021-08-12 13:06:02'),
(25, 1, '2021-08-05', '10:58:00', '12:55:00', '2021-08-13 05:25:51', '2021-08-13 05:25:51'),
(26, 6, '2011-05-29', '09:16:00', '18:02:00', '2021-08-13 07:03:35', '2021-08-13 07:03:35'),
(27, 6, '1992-03-02', '11:24:00', '05:33:00', '2021-08-13 07:03:35', '2021-08-13 07:03:35'),
(28, 6, '2010-03-30', '02:46:00', '08:37:00', '2021-08-13 07:03:35', '2021-08-13 07:03:35'),
(29, 6, '2003-11-14', '14:18:00', '17:43:00', '2021-08-13 07:03:35', '2021-08-13 07:03:35'),
(30, 6, '2021-07-27', '13:45:00', '14:45:00', '2021-08-13 07:15:25', '2021-08-13 07:15:25'),
(31, 3, '2021-08-07', '12:47:00', '12:47:00', '2021-08-13 07:15:58', '2021-08-13 07:15:58'),
(32, 7, '2021-08-14', '12:46:00', '12:46:00', '2021-08-13 07:16:25', '2021-08-13 07:16:25'),
(33, 1, '2021-08-11', '08:02:00', '11:04:00', '2021-07-12 10:42:36', '2021-08-13 10:42:36'),
(34, 1, '2021-08-07', '05:58:00', '01:07:00', '2021-08-13 10:42:36', '2021-08-13 10:42:36'),
(35, 1, '2021-08-10', '19:43:00', '13:10:00', '2021-08-13 10:42:36', '2021-08-13 10:42:36'),
(36, 1, '2021-08-09', '05:25:00', '15:44:00', '2021-08-14 11:18:57', '2021-08-14 11:18:57'),
(37, 1, '2021-08-08', '10:12:00', '09:18:00', '2021-08-14 11:18:57', '2021-08-14 11:18:57'),
(38, 1, '2021-08-06', '10:12:00', '09:18:00', '2021-08-14 11:18:57', '2021-08-14 11:18:57'),
(39, 1, '2021-08-12', '13:37:00', '12:41:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02'),
(40, 1, '2021-08-13', '13:37:00', '12:46:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02'),
(41, 1, '2021-08-14', '14:38:00', '12:42:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02'),
(42, 1, '2021-08-15', '12:42:00', '15:38:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02'),
(43, 1, '2021-08-16', '14:38:00', '12:40:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02'),
(44, 1, '2021-08-17', '15:38:00', '12:40:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02'),
(45, 1, '2021-08-18', '12:38:00', '13:38:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02'),
(46, 1, '2021-08-19', '13:38:00', '12:39:00', '2021-08-17 07:09:02', '2021-08-17 07:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `empdatas`
--

CREATE TABLE `empdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `higherqualification_ctft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_ctft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empdatas`
--

INSERT INTO `empdatas` (`id`, `f_name`, `l_name`, `email`, `contact`, `guardian_contact`, `last_company`, `resume`, `p_address`, `p_city`, `p_state`, `p_pincode`, `c_address`, `c_city`, `c_state`, `c_pincode`, `higherqualification_ctft`, `professional_ctft`, `exp_letter`, `salary_slip`, `created_at`, `updated_at`) VALUES
(1, 'Victoria Pena', 'Jacob Vinson', 'heholexeji@mailinator.com', '+1 (868) 705-4078', '+1 (368) 225-7945', 'Cannon Gallagher Traders', '1627717389.docx', 'Maiores dolore fugia', 'Exercitation officia', 'Dolor aut ut sed qui', 'Dolorem excepteur du', 'Et in quos nobis hic', 'Obcaecati necessitat', 'Obcaecati quo nihil', 'Eu non obcaecati est', '1627717389.jpg', '1627717389.jpg', '1627717389.jpg', '1627717389.zip', '2021-07-31 02:13:09', '2021-07-31 02:13:09'),
(2, 'Victoria Pena', 'Jacob Vinson', 'heholexeji@mailinator.com', '+1 (868) 705-4078', '+1 (368) 225-7945', 'Cannon Gallagher Traders', 'resume1627717697.jpg', 'Maiores dolore fugia', 'Exercitation officia', 'Dolor aut ut sed qui', 'Dolorem excepteur du', 'Et in quos nobis hic', 'Obcaecati necessitat', 'Obcaecati quo nihil', 'Eu non obcaecati est', 'higherqualification_ctft1627717697.jpg', 'professional_ctft1627717697.jpg', 'exp_letter1627717697.jpg', 'salary_slip1627717697.zip', '2021-07-31 02:18:17', '2021-07-31 02:18:17'),
(3, 'Urielle Rosario', 'Noble Garrett', 'cekequ@mailinator.com', '+1 (573) 616-2772', '+1 (687) 687-2081', 'Allison and Bolton Plc', 'resume1627717822.jpg', 'Aliquip odio eius lo', 'Illo itaque molestia', 'Est consequuntur se', 'Odio unde inventore', 'Nisi vel ut facere v', 'Dolor nulla doloribu', 'Aspernatur similique', 'Quia illo quisquam o', 'higherqualification_ctft1627717822.docx', 'professional_ctft1627717822.jpg', 'exp_letter1627717822.xlsx', 'salary_slip1627717822.docx', '2021-07-31 02:20:22', '2021-07-31 02:20:22'),
(4, 'Xerxes Bentley', 'Bruce Berry', 'sojywa@mailinator.com', '+1 (549) 719-1157', '+1 (102) 643-2228', 'Hahn and Shepard Inc', 'resume1627719073.jpg', 'Necessitatibus molli', 'Non cumque laborum', 'Quisquam amet aliqu', 'Ut explicabo Perspi', 'Esse sed iure venia', 'Molestias incididunt', 'Aut dolore eum duis', 'Cupiditate dolore ev', 'higherqualification_ctft1627719073.jpg', 'professional_ctft1627719073.jpg', 'exp_letter1627719073.jpg', 'salary_slip1627719073.jpg', '2021-07-31 02:41:13', '2021-07-31 02:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `emps`
--

CREATE TABLE `emps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_verify` int(11) NOT NULL DEFAULT 0,
  `is_forgot_password` int(11) NOT NULL DEFAULT 0,
  `rand_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emps`
--

INSERT INTO `emps` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `is_verify`, `is_forgot_password`, `rand_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vikas Singh', 'ethancoder@gmail.com', NULL, 'eyJpdiI6InlQNzBNNGE2TGVJbVZ0WkduUmNMR3c9PSIsInZhbHVlIjoiN1plZXh1aXh1VU9WUVlIbUt2SDVab2c5bUVJZ0lyNEpoL2I1Z0RtSlYrVT0iLCJtYWMiOiIxYWJiNDc0OGQ2OGQ5MmQ5YTQwMzQ2NmE1ZGRhYTM5ODYxY2M0M2M1ODgzOTA3ODk0M2M1MjJiYmFiYWE0YTgxIn0=', 1, 0, 0, '507446481', NULL, '2021-08-04 07:54:46', '2021-08-13 02:58:20'),
(2, 'Leroy Mosley', '2@gmail.com', NULL, 'eyJpdiI6IkhPSVJMcU5ibUh4SnMvNlk2U01tUlE9PSIsInZhbHVlIjoiYW9YeThhOS9aNmFaby9qN2lrUDRmR3FLcjhMUGZhUEp4OFI4dkNyMFQxTT0iLCJtYWMiOiI4ZGM1YmNjYWI5NzgzZDQwZGU1ZTM0NWE2NmM5YjhiMjRmNTk3N2Y1MTJjNDNiYzk3ZTQ1NTBkODAxNjNjNjA5In0=', 1, 0, 0, '376497980', NULL, '2021-08-05 00:17:05', '2021-08-13 04:29:21'),
(3, 'Kenneth Kirkland', 'z@mailinator.com', NULL, 'eyJpdiI6InBUT0g5MSs1UTBTUlJxS3M5eVBpM1E9PSIsInZhbHVlIjoialZEZGNQeERrdGRnRWd3VDFqV2pYQT09IiwibWFjIjoiMjY5OTJmNzJiYTRhZDhkMWMyZDI1NmRiYzI3M2FhMjRhYzVjZmUyNmUyOTk1ODYxNDkzOTVjYjY0ZDM4YjNkNyJ9', 1, 0, 0, '584761668', NULL, '2021-08-05 01:38:42', '2021-08-13 02:58:07'),
(4, 'test', 'alkatechsoft1@gmail.com', NULL, 'eyJpdiI6IjlhRHE1NTNNSDRhY1RqR292K3NnMlE9PSIsInZhbHVlIjoiUFFVSklTMWxlOHNuSlFaVWw3V0hBZz09IiwibWFjIjoiMjk1NmFkN2VkYTRlOGYyZGRjMTk2M2NmNGMwMzFhOTJiMjNkN2NmZGI3YWY1NTY5YWIwNTk2MWM4ODlmZWNhMyJ9', 1, 1, 0, '663783786', NULL, '2021-08-05 01:42:52', '2021-08-13 02:58:21'),
(5, 'Constance Sexton', 'ab@gmail.com', NULL, 'eyJpdiI6IjUzL3ljblU0YVFIV1JyL0l2RTNWZ1E9PSIsInZhbHVlIjoiTWhQNk1jdUFEdU1iOGpUSWxiR0N2STM5cDBjdG1hUWd0OGZCWWpGQm81VT0iLCJtYWMiOiJmZDJhN2MwYzIwZjgyYTE2MmY3OTc4MmYwYWRkMDM3OGU4ZGEzMTRhMzIwODdlYTQ0ZjljYjUyODRmMzYxMmE2In0=', 1, 0, 0, '198124720', NULL, '2021-08-05 02:28:57', '2021-08-13 04:29:28'),
(6, 'Evan Crawford', 'alkatechsoft2@gmail.com', NULL, 'eyJpdiI6ImdXR3pFL3RWTzQ1dlNqK1lJb0NrdVE9PSIsInZhbHVlIjoiMWxVVGNMd0JHTERIOGNPNlJiQjREQT09IiwibWFjIjoiNjE5Zjk2ZWY4NzUwOWU2MGM3Y2QyODZlNzAzMGM5ZjQwMzM1ODQxYTk3YTFhNjM4NmI2YWYzYmEyZmUxMTM3NSJ9', 1, 1, 0, '', NULL, '2021-08-06 00:45:42', '2021-08-14 00:07:42'),
(7, 'qwqw', 'qw@as.as', NULL, 'eyJpdiI6IjdRelVMWEhSUlhEVzQyeG5NSlpON0E9PSIsInZhbHVlIjoidjFrSngwNitUUEd5M3MrVFUxaE5KZz09IiwibWFjIjoiNWI2Y2Q5OTZjODJkMDQwNzQ0M2NjMzFjOTAyOWIyNDg2M2YzY2JjOWJmOGY3ZWNmMWIyNzRmY2I4NzM0ZjEyYSJ9', 1, 0, 0, '535689375', NULL, '2021-08-10 03:14:30', '2021-08-13 02:58:18'),
(43, 'Libby Ramos', 'sudhir@gmail.com', NULL, 'eyJpdiI6IlBGb0d0ekNiWmRpWkdoYitZTnpVTVE9PSIsInZhbHVlIjoiNjUrVWNzbnhqSStEczNSU2E3dVlOdz09IiwibWFjIjoiYTdmNmM1ZDQxNjZhZWZiMjI0NDEyYzk1ZDg1ZDk0MjMyMTQwMDUzN2E4ZjgwNzRiNTE4ZTU2YzhlYmFiYTFhMyJ9', 1, 0, 0, '575108087', NULL, '2021-08-13 04:16:04', '2021-08-13 04:16:04');

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
(1, '2021_07_30_095532_create_empdatas_table', 1),
(2, '2021_07_31_083052_create_admins_table', 2),
(3, '2021_08_03_060049_create_emps_table', 3),
(4, '2021_08_10_053902_create_attendances_table', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empdatas`
--
ALTER TABLE `empdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emps`
--
ALTER TABLE `emps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emps_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `empdatas`
--
ALTER TABLE `empdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emps`
--
ALTER TABLE `emps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
