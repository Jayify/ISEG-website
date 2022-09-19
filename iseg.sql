-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 05:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iseg`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `members_number` int(20) NOT NULL,
  `organiser` int(30) DEFAULT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `date`, `location`, `members_number`, `organiser`, `notes`) VALUES
(1, 'McFormal', '2021-05-12', 'McDonald\'s Nelson', 13, 1, 'Formal stuff'),
(2, 'MuftiFormal', '2021-09-20', 'Nelson College', 7, 1, ''),
(3, 'HutFormal', '2029-03-20', 'Roding Hut', 3, 3, 'Venturer camp'),
(4, 'MuftiFormal', '2021-09-09', 'Nelson College', 7, 3, 'Was fun'),
(6, 'Stefano\'s Formal', '2021-08-18', 'Stefano\'s Pizza', 10, 2, 'Caleb\'s birthday.'),
(7, 'Stefano\'s Formal', '2021-06-23', 'Stefano\'s Pizza', 11, 2, 'Nice lunch.');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `title` varchar(20) DEFAULT 'Unnamed',
  `sector` varchar(20) DEFAULT 'Unaligned',
  `rank` varchar(20) DEFAULT 'Member',
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` longblob DEFAULT NULL,
  `account_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `last_name`, `title`, `sector`, `rank`, `email`, `password`, `avatar`, `account_created`) VALUES
(1, 'Jayden', 'Houghton', 'The Duke', 'Esteemed Gentlemen', 'Admin', 'jayden.houghton@nc.school.nz', 'cdtiscool', 0x3239696b6f6e372d7468756d622e6a7067, '2021-10-15 22:44:09'),
(2, 'Caleb', 'Eason', 'The Lord', 'Esteemed Gentlemen', 'Admin', 'caleb.eason@nc.school.nz', 'jazz123', 0x333273746f6e65776f6c665f61762d7468756d622e6a7067, '2021-10-15 22:40:27'),
(3, 'Theo', 'Wheatley', 'The Baron', 'Esteemed Gentlemen', 'Admin', 'theo.wheatley@nc.school.nz', 'photography4life', 0x343133332d7468756d622e6a7067, '2021-10-15 22:41:08'),
(4, 'Ricky', 'Meffan', 'Fat Tony', 'Mafia', 'Member', 'ricky.meffan@nc.school.nz', 'mafiagang', 0x3239696b6f6e2e6a7067, '2021-10-15 22:41:54'),
(5, 'Tim', 'Douglas', 'Tony', 'Mafia', 'Member', 'tim.douglas@nc.school.nz', 'mafiaiscool', 0x3334356e65777175617973756e73657441412d7468756d622e6a7067, '2021-10-15 22:42:29'),
(6, 'Sam', 'Foley', 'The CEO', 'Business Person', 'Member', 'sam.foley@nc.school.nz', 'stonks123', 0x313233626f795f6c6f6f6b696e672d7468756d622e6a7067, '2021-10-15 22:43:19'),
(7, 'Zoltan', 'McComb', 'The Chancellor', 'Political Figure', 'Member', 'zoltan.mccomb@nc.school.nz', 'superiority', 0x343331416c69656e506f7274726169745f6b746b2d7468756d622e6a7067, '2021-10-15 22:43:48'),
(8, 'Louis', 'Rowell-Williams', 'Unnamed', 'Unaligned', 'Member', 'louis.rowellwilliams@nc.school.nz', 'pianotime', 0x36656e6c69676874656e65645f43472d7468756d622e6a7067, '2021-10-15 22:44:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
