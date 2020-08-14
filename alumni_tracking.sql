-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2020 at 07:01 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` text NOT NULL,
  `clg_name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `enr_id` int(11) NOT NULL,
  `adm_year` int(11) NOT NULL,
  `pas_year` int(11) NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(255) NOT NULL,
  `cur_status` varchar(255) NOT NULL,
  `hig_studies` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `bus` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof` varchar(1) NOT NULL,
  `validation_key` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_validated` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `firstname`, `lastname`, `clg_name`, `contact`, `email`, `photo`, `enr_id`, `adm_year`, `pas_year`, `dob`, `course`, `cur_status`, `hig_studies`, `org`, `bus`, `city`, `state`, `country`, `password`, `prof`, `validation_key`, `registration_date`, `is_active`, `is_validated`) VALUES
(3, 'Amol', 'Bandal', 'United States', '841938885', 'mahavirc07@gmail.com', NULL, 7841, 2014, 2014, '2022-02-12', 'Computer', 'Higher Studies', 'sbdjkn', '', '', 'snbjnkj', 'knkjfnk', 'nvfkn', '$2y$10$eN6RdL3G3OxdLU6UWkTEQev86GbyRDCUWBK9Ncm2GFxEBctGVn7hO', 'A', 'ZGFhODFhODkxMmY5NGYwMjRjZjM4ZWQ4', '2020-01-23', 1, 1),
(5, 'Amo', 'Ambkar', 'United States', '1234567890', 'chordiyamahavir98@gmail.com', NULL, 1234567, 2018, 2022, '2015-03-23', 'United States', 'Working in Organization', '', 'working', '', 'Lonere', 'Maharashtra', 'India', '$2y$10$0luoUTHGNFkyCHdDWciJKu9CUMDhklkIcMTZrI.ykmdsi4N5vXcBi', 'A', 'YWFkZDI4N2IzNjAwNDJkMTFiZThmZTMw', '2020-01-24', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `clg_name` varchar(255) NOT NULL,
  `est_year` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `clg_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `taluka` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `clg_status` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof` varchar(1) NOT NULL DEFAULT 'p',
  `validation_key` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_validated` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `clg_name`, `est_year`, `email`, `contact`, `reg_no`, `clg_code`, `city`, `taluka`, `district`, `pincode`, `clg_status`, `password`, `prof`, `validation_key`, `registration_date`, `is_active`, `is_validated`) VALUES
(1, 'DBATU', 1800, 'rajp8340@gmail.com', 123456789, 1234567890, '23434', 'Mangaon', 'Bardez', 'North Goa', 402103, '2', '$2y$10$JztFKiDrmUs6m9DRjFf17.vbx2hukJpPCBTFw9fbX4EbQfw8IvLr.', 'C', 'YWY1NDU4Yzc3MGJlMTIyN2NmNDcwMGM0', '2020-01-23', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comm`
--

CREATE TABLE `comm` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `com` varchar(500) NOT NULL,
  `time1` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `clg_name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `directorate`
--

CREATE TABLE `directorate` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directorate`
--

INSERT INTO `directorate` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sta_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sta_time` time NOT NULL,
  `end_time` time NOT NULL,
  `moto` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `img`, `sta_date`, `end_date`, `sta_time`, `end_time`, `moto`, `venue`, `college`, `description`, `organizer`, `email`) VALUES
(6, 'ads', NULL, '0024-04-23', '0023-02-02', '05:11:00', '05:11:00', 'cyno', 'ad', 'das', '            ', 'C', 'rajp8340@gmail.com'),
(7, 'cyno', NULL, '2017-11-22', '2021-03-22', '07:38:00', '05:37:00', 'cyno', 'amhhn', 'xcv', '            ', 'A', 'mahavirc07@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `sno` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `stime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sno`, `msg`, `room`, `ip`, `stime`) VALUES
(1, 'hi', 'rm', '', '2020-01-23 23:28:55'),
(2, '', 'rm', '', '2020-01-23 23:28:57'),
(3, '', 'rm', '', '2020-01-23 23:28:59'),
(4, '', 'rm', '', '2020-01-23 23:29:00'),
(5, 'hey', 'rm', '', '2020-01-23 23:29:47'),
(6, '', '', '', '2020-01-23 23:30:09'),
(7, 'hey', 'rm', '', '2020-01-23 23:30:34'),
(8, 'hi', 'rm', '', '2020-01-23 23:31:26'),
(9, 'hey', 'rm', '', '2020-01-23 23:32:31'),
(10, '', '', '', '2020-01-23 23:57:38'),
(11, '', '', '', '2020-01-23 23:57:49'),
(12, '', '', '', '2020-01-23 23:58:04'),
(13, 'dfghj', 'rm', 'db', '2020-01-23 23:58:40'),
(14, '', '', '', '2020-01-24 00:00:34'),
(15, 'hey', 'room', '', '2020-01-24 00:03:21'),
(16, 'cvbnm', 'room', 'DBATU', '2020-01-24 00:05:10'),
(17, 'cvbnm', 'room', 'DBATU', '2020-01-24 00:05:57'),
(18, 'hey', 'room', 'DBATU', '2020-01-24 00:06:01'),
(19, 'hi', 'room', 'Amol Bandal', '2020-01-24 00:06:50'),
(20, 'hi', 'room1', 'DBATU', '2020-01-24 04:59:05'),
(21, 'hu', 'room4', 'DBATU', '2020-01-24 08:30:25'),
(22, 'no', 'room4', 'Amol Bandal', '2020-01-24 08:32:36'),
(23, 'hsfsa', 'room4', 'Amol Bandal', '2020-01-24 09:05:40'),
(24, 'hii', 'room4', 'DBATU', '2020-01-24 10:16:14'),
(25, 'hii everyone', 'room4', 'DBATU', '2020-01-24 11:33:09'),
(26, 'hello', 'room4', 'Amol Bandal', '2020-01-24 11:40:52'),
(27, 'Good Morning', 'room', 'DBATU', '2020-01-24 11:54:15'),
(28, 'Hekoo', 'room4', 'DBATU', '2020-01-24 12:08:06'),
(29, 'hgh', 'room4', 'Amol Bandal', '2020-01-24 12:14:36'),
(30, 'how are you amol', 'room4', 'Amol Bandal', '2020-01-24 12:20:00'),
(31, 'fine thank you', 'room4', 'Amol Bandal', '2020-01-24 12:20:15'),
(32, 'Welcome', 'room4', 'DBATU', '2020-01-24 12:50:50'),
(33, 'thank you', 'room4', 'Amol Bandal', '2020-01-24 12:53:00'),
(34, 'Hello everyone', 'room4', 'DBATU', '2020-01-24 14:20:38'),
(35, 'Good Morning', 'room4', 'DBATU', '2020-01-24 14:46:52'),
(36, 'show me', 'room4', 'Amol Bandal', '2020-01-24 14:52:58'),
(37, 'How are you?', 'room4', 'DBATU', '2020-01-24 15:03:02'),
(38, 'fine', 'room4', 'Amol Bandal', '2020-01-24 15:05:43'),
(39, 'whats up?', 'room4', 'DBATU', '2020-01-24 15:52:19'),
(40, 'what else?', 'room4', 'Amol Bandal', '2020-01-24 15:55:34'),
(41, 'Hey', 'omkar group', 'DBATU', '2020-01-24 18:49:08'),
(42, 'hii', 'room4', 'DBATU', '2020-01-24 19:53:19'),
(43, 'hi', 'omkar group', 'DBATU', '2020-01-25 23:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `sno` int(11) NOT NULL,
  `roomname` text NOT NULL,
  `stime` datetime NOT NULL DEFAULT current_timestamp(),
  `creater` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`sno`, `roomname`, `stime`, `creater`) VALUES
(8, 'room3', '2020-01-24 08:14:00', ''),
(9, 'room4', '2020-01-24 08:14:43', 'DBATU'),
(10, 'omkar group', '2020-01-24 18:49:01', 'DBATU');

-- --------------------------------------------------------

--
-- Table structure for table `setupdate`
--

CREATE TABLE `setupdate` (
  `id` int(11) NOT NULL,
  `setupdate` varchar(255) NOT NULL,
  `college_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setupdate`
--

INSERT INTO `setupdate` (`id`, `setupdate`, `college_name`) VALUES
(1, 'hello', 'DBATU'),
(2, 'Wel come to SIH', 'DBATU'),
(3, 'new notice', 'DBATU'),
(4, 'Subit', 'DBATU'),
(5, 'Good Morning', 'DBATU'),
(6, 'Hii', 'DBATU'),
(7, 'This is a notice by omkar raut', 'DBATU'),
(8, 'new notice\r\n', 'DBATU');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `department` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof` varchar(1) NOT NULL DEFAULT 't'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comm`
--
ALTER TABLE `comm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`clg_name`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `directorate`
--
ALTER TABLE `directorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `setupdate`
--
ALTER TABLE `setupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comm`
--
ALTER TABLE `comm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `directorate`
--
ALTER TABLE `directorate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setupdate`
--
ALTER TABLE `setupdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id`) REFERENCES `college` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
