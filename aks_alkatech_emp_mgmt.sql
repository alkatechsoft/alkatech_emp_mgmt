-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 02:42 PM
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
(1, 'admin', '$2y$10$9lNaa3VEnBIYJgKRzYkRRucdrdLi1xyDf85o2qbuTyC6FGfM/ZcmK', NULL, '2021-07-31 03:21:53');

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
(2, '2021_07_31_083052_create_admins_table', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empdatas`
--
ALTER TABLE `empdatas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `empdatas`
--
ALTER TABLE `empdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
