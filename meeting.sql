-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 05:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `room_id`, `user_id`, `date`, `time_from`, `time_to`) VALUES
(1, 1, 1, '2020-08-09', '16:40:00', '10:00:00'),
(2, 1, 1, '2020-09-20', '00:00:00', '00:00:00'),
(3, 4, 4, '2020-09-08', '10:17:31', '13:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `job`, `created_at`) VALUES
(1, 'steve', 'steve123', 'steve@gmail.com', 'stuff', '2020-06-10 20:38:10'),
(2, 'kane', '123456', 'kane@gmail.com', 'student', '2020-08-09 17:11:48'),
(3, 'dev', '123456', 'dev@ict.com', 'stuff', '2020-08-14 15:35:36'),
(4, 'youssef1', 'youssef12', 'youssef.lakhlaifi18@gmail.com', 'staff', '2020-08-20 19:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` int(11) NOT NULL,
  `department` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `number`, `department`, `address`) VALUES
(1, 'Room1', 1, 'Basement', ''),
(2, 'Room2', 2, 'Basement', ''),
(3, 'Room3', 3, 'North Entrance', ''),
(4, 'Room4', 4, 'Main Entrance', ''),
(5, 'Room5', 5, 'East Entrance', ''),
(6, 'Room6', 6, 'West Entrance', ''),
(7, 'Mechanical&Storage', 33, 'Basement', ''),
(8, 'Jr. High', 35, 'Basement', ''),
(9, 'High school', 37, 'Basement', ''),
(10, '4th grade', 103, 'North Entrance', '661296'),
(11, '5th Grade', 104, 'North Entrance', '662366'),
(12, '2 yrs', 106, 'North Entrance', '926593'),
(13, '3-4 yr', 107, 'North Entrance', ''),
(14, '4-5 yr', 107, 'North Entrance', ''),
(15, 'Library', 113, 'North Entrance', '920338'),
(16, '6th Grade', 124, 'West Entrance', 'Next to Sanctuary'),
(17, '6th Grade', 126, 'West Entrance', 'Next to Sanctuary'),
(18, '6th Grade', 128, 'West Entrance', 'Next to Sanctuary'),
(19, 'Conf room', 101, 'East Entrance', ''),
(20, 'Conf room', 102, 'West Entrance', ''),
(21, 'Res Room 1', 118, 'Main Entrance', ''),
(22, 'Res Room 2', 120, 'Main Entrance', ''),
(23, 'Res Room 3', 122, 'Main Entrance', '');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `subject`, `meeting_id`, `created_at`) VALUES
(1, 'Math', 3, '2020-08-20 18:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `username`, `email`) VALUES
(1, 'elena', 'elena@gmail.com'),
(2, 'youssef', 'youssef.lakhlaifi18@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_id` (`meeting_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `meeting_id` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
