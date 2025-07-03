-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 06:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wu_gcvs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_view`
--

CREATE TABLE `check_view` (
  `ID` varchar(30) NOT NULL,
  `View` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `ID` varchar(50) NOT NULL,
  `Company_Phone` varchar(50) NOT NULL,
  `Company_Name` varchar(30) NOT NULL,
  `Company_Email` varchar(30) NOT NULL,
  `Company_country` varchar(30) NOT NULL,
  `Company_City` varchar(40) NOT NULL,
  `Date` varchar(12) NOT NULL,
  `Reason_of_Verification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `ID` varchar(20) NOT NULL,
  `Frist_Name` varchar(30) NOT NULL,
  `Midle_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Year_of_Graduation` int(5) NOT NULL,
  `Qualification` varchar(30) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Photo` longblob NOT NULL,
  `Photo_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_verification`
--

CREATE TABLE `info_verification` (
  `ID` varchar(20) NOT NULL,
  `Verification` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(20) UNSIGNED NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ID` varchar(30) NOT NULL,
  `Frist_Name` varchar(30) NOT NULL,
  `Midle_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Cumulative_Gpa` double NOT NULL,
  `Year_of_Graduation` varchar(12) NOT NULL,
  `Qualification` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_approval`
--

CREATE TABLE `request_approval` (
  `Employe_ID` varchar(50) NOT NULL,
  `Registerar_Remark` text NOT NULL,
  `Approval` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` varchar(30) NOT NULL,
  `Frist_Name` varchar(30) NOT NULL,
  `Midle_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Cumulative_Gpa` double NOT NULL,
  `Year_of_Graduation` varchar(12) NOT NULL,
  `Qualification` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Photo` longblob NOT NULL,
  `Photo_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `User_type` varchar(50) NOT NULL,
  `token_value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `username`, `password`, `email`, `User_type`, `token_value`) VALUES
(26, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Administrator', NULL),
(29, 'Registrar', 'registrar', '5940569cd1d60781f856f93235b072ee', 'registrar@gmail.com', 'Registrar', NULL),
(30, 'Finance Officer', 'finance', '57336afd1f4b40dfd9f5731e35302fe5', 'finance@gmail.com', 'Finance Officer', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
