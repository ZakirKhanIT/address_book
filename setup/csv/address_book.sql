-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 03:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_date`, `updated_date`) VALUES
(2, 'Delhi', '2022-02-08 13:07:11', '2022-02-08 13:07:11'),
(3, 'Bengluru', '2022-02-08 13:07:11', '2022-02-08 13:07:11'),
(4, 'Chennai', '2022-02-08 13:07:11', '2022-02-08 13:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `zip_code` varchar(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `zip_code`, `street`, `city_id`, `email_address`, `created_date`, `updated_date`) VALUES
(84, 'CA1', '', 'ghdg', 'ghgfh', 0, 'ghgfdh@gmail.com', '2022-02-10 13:23:14', '2022-02-10 13:23:14'),
(85, 'CA2', '', 'ghdg', 'ghgfh', 1, 'ghgfdh@gmail.com', '2022-02-10 13:23:34', '2022-02-10 13:23:34'),
(86, 'CB1', '', 'ghdg', 'ghgfh', 0, 'ghgfdh@gmail.com', '2022-02-10 13:23:55', '2022-02-10 13:23:55'),
(87, 'CB2', '', 'ghdg', 'ghgfh', 1, 'ghgfdh@gmail.com', '2022-02-10 13:24:05', '2022-02-10 13:24:05'),
(88, 'CC1', '', 'ghdg', 'ghgfh', 3, 'ghgfdh@gmail.com', '2022-02-10 13:24:20', '2022-02-10 13:24:20'),
(89, 'CC2', '', 'ghdg', 'ghgfh', 2, 'ghgfdh@gmail.com', '2022-02-10 13:24:32', '2022-02-10 13:24:32'),
(90, 'DD1', '', 'ghdg', 'ghgfh', 1, 'ghgfdh@gmail.com', '2022-02-10 13:24:45', '2022-02-10 13:24:45'),
(91, 'DD2', '', 'ghdg', 'ghgfh', 2, 'ghgfdh@gmail.com', '2022-02-10 13:24:57', '2022-02-10 13:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `contact_in_group`
--

CREATE TABLE `contact_in_group` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_in_tag`
--

CREATE TABLE `contact_in_tag` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `created_date`, `updated_date`) VALUES
(58, 'Group A', '2022-02-10 13:25:25', '2022-02-10 13:25:25'),
(59, 'Group AA', '2022-02-10 13:25:30', '2022-02-10 13:25:30'),
(60, 'Group B', '2022-02-10 13:25:34', '2022-02-10 13:25:34'),
(61, 'Group C', '2022-02-10 13:25:39', '2022-02-10 13:25:39'),
(62, 'Group D', '2022-02-10 13:25:46', '2022-02-10 13:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `group_in_group`
--

CREATE TABLE `group_in_group` (
  `id` int(11) NOT NULL,
  `group_parent_id` int(11) NOT NULL,
  `group_child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_date`, `updated_date`) VALUES
(6, 'happy', '2022-02-10 14:04:43', '2022-02-10 14:04:43'),
(7, 'hour', '2022-02-10 14:04:48', '2022-02-10 14:04:48'),
(8, 'get', '2022-02-10 14:04:51', '2022-02-10 14:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_in_group`
--
ALTER TABLE `contact_in_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `contact_in_tag`
--
ALTER TABLE `contact_in_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_in_group`
--
ALTER TABLE `group_in_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_parent_id` (`group_parent_id`),
  ADD KEY `group_child_id` (`group_child_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `contact_in_group`
--
ALTER TABLE `contact_in_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `contact_in_tag`
--
ALTER TABLE `contact_in_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `group_in_group`
--
ALTER TABLE `group_in_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_in_group`
--
ALTER TABLE `contact_in_group`
  ADD CONSTRAINT `contact_in_group_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_in_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_in_tag`
--
ALTER TABLE `contact_in_tag`
  ADD CONSTRAINT `contact_in_tag_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_in_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_in_group`
--
ALTER TABLE `group_in_group`
  ADD CONSTRAINT `group_in_group_ibfk_1` FOREIGN KEY (`group_parent_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_in_group_ibfk_2` FOREIGN KEY (`group_child_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
