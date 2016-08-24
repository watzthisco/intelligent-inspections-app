-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2016 at 06:27 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intelligentinspections`
--
CREATE DATABASE IF NOT EXISTS `intelligentinspections` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `intelligentinspections`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` text NOT NULL,
  `customer_phone` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_phone`) VALUES
(1, 'Chris Minnick', 'chris@watzthis.com', '555-555-5555');

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `interior_walls` text NOT NULL,
  `interior_walls_notes` text NOT NULL,
  `interior_ceilings` text NOT NULL,
  `interior_ceilings_notes` text NOT NULL,
  `interior_flooring` text NOT NULL,
  `interior_flooring_notes` text NOT NULL,
  `interior_lighting` text NOT NULL,
  `interior_lighting_notes` text NOT NULL,
  `windows_screens_shutters` text NOT NULL,
  `windows_screens_shutters_notes` text NOT NULL,
  `doors_knobs_locks` text NOT NULL,
  `doors_knobs_locks_notes` text NOT NULL,
  `ceiling_fans` text NOT NULL,
  `ceiling_fans_notes` text NOT NULL,
  `stairs_handrails` text NOT NULL,
  `stairs_handrails_notes` text NOT NULL,
  `smoke_alarms` text NOT NULL,
  `smoke_alarms_notes` text NOT NULL,
  `fireplaces` text NOT NULL,
  `fireplaces_notes` text NOT NULL,
  `inspection_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`id`, `prop_id`, `interior_walls`, `interior_walls_notes`, `interior_ceilings`, `interior_ceilings_notes`, `interior_flooring`, `interior_flooring_notes`, `interior_lighting`, `interior_lighting_notes`, `windows_screens_shutters`, `windows_screens_shutters_notes`, `doors_knobs_locks`, `doors_knobs_locks_notes`, `ceiling_fans`, `ceiling_fans_notes`, `stairs_handrails`, `stairs_handrails_notes`, `smoke_alarms`, `smoke_alarms_notes`, `fireplaces`, `fireplaces_notes`, `inspection_date`) VALUES
(35, 1, '1', 'test', '2', 'test2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2016-01-24 22:07:34'),
(36, 0, '2', 'great walls', '1', 'these ceilings are the best', '4', 'fancy floors', '2', 'super lights', '0', 'no windows', '2', 'love these doors', '0', 'none', '0', 'none', '0', 'none', '0', '0', '2016-01-25 17:19:34'),
(37, 35, '1', 'falling down', '2', 'there are some', '3', 'looks pretty okay', '4', 'fantastic lighting!', '3', 'some broken, most ok', '2', 'knobs don''t work', '1', 'bad condition', '0', 'broken and missing', '1', 'No smoke alarm', '2', 'falling apart', '2016-01-30 17:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `prop_id`, `file_url`, `description`) VALUES
(13, 1, 'pics/figure1.png', ''),
(14, 1, 'pics/freestuff.png', ''),
(15, 0, 'pics/1947-Vannevar-Bush-LIFE.jpg', ''),
(16, 0, 'pics/planning-12.jpg', ''),
(17, 0, 'pics/Hypnosis.jpg', ''),
(18, 0, 'pics/cropped-chrisminnick_1427475714_5.jpg', ''),
(19, 0, 'pics/maxresdefault.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `cust_id`, `address`, `city`, `state`, `zip`) VALUES
(1, 1, '555 Test Street', 'Test Town', 'MN', '55555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
