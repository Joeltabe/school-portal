-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 08:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
('BcjKNX58e4x7bIqIvxG7', 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_code`) VALUES
(1, 'Computer Science', 'CS'),
(2, 'Electrical Engineering', 'EE'),
(3, 'Mechanical Engineering', 'ME'),
(4, 'Civil Engineering', 'CE'),
(5, 'Chemical Engineering', 'ChE'),
(6, 'Biomedical Engineering', 'BME'),
(7, 'Environmental Engineering', 'EnvE'),
(8, 'Industrial Engineering', 'IE'),
(9, 'Aerospace Engineering', 'AE'),
(10, 'Materials Science', 'MatSci'),
(11, 'Architectural Engineering', 'ArchE'),
(21, 'software', '');

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE `specialty` (
  `id` int(11) NOT NULL,
  `specialty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`id`, `specialty_name`) VALUES
(1, 'HND'),
(2, 'straight bsc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `specialty` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  `other_level` varchar(50) DEFAULT NULL,
  `award` varchar(11) NOT NULL,
  `other_award` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `language` varchar(30) NOT NULL,
  `academic_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `matricule`, `name`, `gender`, `dob`, `pob`, `department`, `specialty`, `level`, `other_level`, `award`, `other_award`, `email`, `number`, `language`, `academic_year`) VALUES
(3, 'swe123', 'Tabe Joel', 'male', '2008-02-08', 'mamfe', '2', '2', 300, '', '0', '', 'joeltabe3@gmail.com', '650665871', 'English Language', '2022/2023'),
(4, 'swe124', 'Tabe Joel', 'male', '2014-02-08', 'mamfe', '2', '1', 500, '', '0', '', 'joeltabe3@gmail.com', '650665871', 'English Language', '2022/2023'),
(5, 'swe125', 'Tabe Joel', 'male', '2016-02-17', 'mamfe', '11', '2', 400, '', '3', NULL, 'joeltabe3@gmail.com', '650665871', 'English Language', '2022/2023'),
(6, 'nwe126', 'Tabe Joel', 'female', '2006-02-08', 'mamfe', '10', '2', 400, '', '4', NULL, 'joeltabe3@gmail.com', '757484590', 'English Language', '2022/2023'),
(7, 'swe126', 'Tabe Joel', 'female', '2006-02-08', 'mamfe', '10', '2', 400, '', '4', NULL, 'joeltabe3@gmail.com', '757484590', 'English Language', '2022/2023'),
(8, 'swe127', 'Jeff', 'male', '2006-07-08', 'buea', '0', '0', 400, '', '2', NULL, 'joeltabe3@gmail.com', '650440494', 'English Language', '2022/2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `specialty`
--
ALTER TABLE `specialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
