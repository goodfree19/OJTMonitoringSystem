-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 12:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_ojt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(12) NOT NULL,
  `name` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `user_name`, `password`) VALUES
(2, 'Jay Cantonjos', 'jay@gmail.com', 'jay');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `message`, `date`) VALUES
(24, 'Announcement for this morning \r\n \r\nwe need to meet up in this morning we need to know  to knwo', '2023-12-18'),
(25, 'wdarsdf sa sa asdfsafasdf asdf asdf', '2023-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `company_name`
--

CREATE TABLE `company_name` (
  `id` int(11) NOT NULL,
  `supervisor_name` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `password` varchar(121) NOT NULL,
  `company_name` varchar(121) NOT NULL,
  `address` varchar(121) NOT NULL,
  `phone_number` varchar(121) NOT NULL,
  `filename_valid_id` varchar(212) NOT NULL,
  `filename_business_permit` varchar(212) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `verify_token` text NOT NULL,
  `archive` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_name`
--

INSERT INTO `company_name` (`id`, `supervisor_name`, `email`, `password`, `company_name`, `address`, `phone_number`, `filename_valid_id`, `filename_business_permit`, `role`, `verify_token`, `archive`) VALUES
(29, 'Mico Carilla', 'mico@gmail.com', 'mico', 'PureGold', 'Mapaso, Irosin, Sorsogon', '09239475839', '6597e37959a1c_download (2).jpg', '6597e37959a1e_1701347372.webp', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daily_narative_report`
--

CREATE TABLE `daily_narative_report` (
  `id` int(123) NOT NULL,
  `user_id` int(123) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `date` date NOT NULL,
  `narative_report` text NOT NULL,
  `total_hours` decimal(65,0) NOT NULL,
  `time_in_noon` time NOT NULL,
  `time_out_noon` time NOT NULL,
  `morning_hours` int(255) NOT NULL,
  `afternoon_hours` int(255) NOT NULL,
  `pic_stud` varchar(121) NOT NULL,
  `pic_stud2` varchar(121) NOT NULL,
  `pic_stud3` varchar(121) NOT NULL,
  `pic_stud4` varchar(121) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade_student`
--

CREATE TABLE `grade_student` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `crertificate` text NOT NULL,
  `comment` text NOT NULL,
  `ratedby` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_requirments`
--

CREATE TABLE `paper_requirments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `type_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suoervisor_dtr`
--

CREATE TABLE `suoervisor_dtr` (
  `id` int(11) NOT NULL,
  `date_submited` date NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `week` int(11) NOT NULL,
  `suoervisor_id` int(212) NOT NULL,
  `dtr_file` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_student` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(212) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 = approve\r\n0=peding\r\n2=reject',
  `selected_company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=graded\r\n0=not graded ',
  `verify_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `archive` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `address`, `phone_number`, `image_id`, `ID_student`, `email`, `email_verified_at`, `password`, `role`, `selected_company`, `created_at`, `updated_at`, `company_id`, `status`, `verify_token`, `archive`) VALUES
(18, 'Jessica', 'Lozada', 'Patag, Irosin, Sorsogon', '09495739471', '6597e3e2a1292.postal-id.png', '2020-0926', 'jessica@gmail.com', NULL, 'jessica', '1', '29', NULL, NULL, 0, 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_name`
--
ALTER TABLE `company_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_narative_report`
--
ALTER TABLE `daily_narative_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_student`
--
ALTER TABLE `grade_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_requirments`
--
ALTER TABLE `paper_requirments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suoervisor_dtr`
--
ALTER TABLE `suoervisor_dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`ID_student`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `company_name`
--
ALTER TABLE `company_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `daily_narative_report`
--
ALTER TABLE `daily_narative_report`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `grade_student`
--
ALTER TABLE `grade_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paper_requirments`
--
ALTER TABLE `paper_requirments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `suoervisor_dtr`
--
ALTER TABLE `suoervisor_dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
