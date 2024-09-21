-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 01:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heatmap_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password_hash`, `email`, `last_login`, `created_at`) VALUES
(2, 'admin', 'dc3565645d8002becb5fd7977aeef3e1', 'admin@gmail.com', '2024-09-21 06:57:37', '2024-09-21 06:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `alert_id` int(11) NOT NULL,
  `sensor_id` int(11) NOT NULL,
  `alert_type` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `resolved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`alert_id`, `sensor_id`, `alert_type`, `message`, `timestamp`, `resolved`) VALUES
(2, 3, '', 'High Heat index!', '2024-09-21 09:39:05', 1),
(3, 3, 'High Heat Index', 'Heat index exceeded threshold: 52.53Â°C', '2024-09-21 09:53:13', 0),
(4, 3, 'High Heat Index', 'Heat index exceeded threshold: 52.13Â°C', '2024-09-21 09:53:13', 0),
(5, 3, 'High Heat Index', 'Heat index exceeded threshold: 38.26Â°C', '2024-09-21 09:53:13', 0),
(6, 3, 'High Heat Index', 'Heat index exceeded threshold: 47.65Â°C', '2024-09-21 09:53:13', 0),
(7, 3, 'High Heat Index', 'Heat index exceeded threshold: 57.38Â°C', '2024-09-21 09:53:13', 0),
(8, 3, 'High Heat Index', 'Heat index exceeded threshold: 51.87Â°C', '2024-09-21 09:53:13', 0),
(9, 3, 'High Heat Index', 'Heat index exceeded threshold: 58.36Â°C', '2024-09-21 09:53:13', 0),
(10, 3, 'High Heat Index', 'Heat index exceeded threshold: 48.53Â°C', '2024-09-21 09:53:15', 0),
(11, 3, 'High Heat Index', 'Heat index exceeded threshold: 40.54Â°C', '2024-09-21 09:53:15', 0),
(12, 3, 'High Heat Index', 'Heat index exceeded threshold: 57.13Â°C', '2024-09-21 09:53:15', 0),
(13, 3, 'High Heat Index', 'Heat index exceeded threshold: 55.16Â°C', '2024-09-21 09:53:15', 0),
(14, 3, 'High Heat Index', 'Heat index exceeded threshold: 40.96Â°C', '2024-09-21 09:53:15', 0),
(15, 3, 'High Heat Index', 'Heat index exceeded threshold: 38.99Â°C', '2024-09-21 09:53:15', 0),
(16, 3, 'High Heat Index', 'Heat index exceeded threshold: 44.66Â°C', '2024-09-21 09:53:16', 0),
(17, 3, 'High Heat Index', 'Heat index exceeded threshold: 55.05Â°C', '2024-09-21 09:53:16', 0),
(18, 3, 'High Heat Index', 'Heat index exceeded threshold: 43.55Â°C', '2024-09-21 09:53:16', 0),
(19, 3, 'High Heat Index', 'Heat index exceeded threshold: 48.04Â°C', '2024-09-21 09:53:16', 0),
(20, 3, 'High Heat Index', 'Heat index exceeded threshold: 50.05Â°C', '2024-09-21 09:53:16', 0),
(21, 3, 'High Heat Index', 'Heat index exceeded threshold: 48.93Â°C', '2024-09-21 09:53:16', 0),
(22, 3, 'High Heat Index', 'Heat index exceeded threshold: 55.05Â°C', '2024-09-21 09:53:16', 0),
(23, 3, 'High Heat Index', 'Heat index exceeded threshold: 58.11Â°C', '2024-09-21 09:53:16', 0),
(24, 3, 'High Heat Index', 'Heat index exceeded threshold: 42.25Â°C', '2024-09-21 09:53:16', 0),
(25, 3, 'High Heat Index', 'Heat index exceeded threshold: 51.18Â°C', '2024-09-21 09:53:16', 0),
(26, 3, 'High Heat Index', 'Heat index exceeded threshold: 45.9Â°C', '2024-09-21 09:53:16', 0),
(27, 3, 'High Heat Index', 'Heat index exceeded threshold: 58.87Â°C', '2024-09-21 09:53:16', 0),
(28, 3, 'High Heat Index', 'Heat index exceeded threshold: 43.9Â°C', '2024-09-21 09:53:16', 0),
(29, 3, 'High Heat Index', 'Heat index exceeded threshold: 42.72Â°C', '2024-09-21 09:53:16', 0),
(30, 3, 'High Heat Index', 'Heat index exceeded threshold: 46.97Â°C', '2024-09-21 09:53:16', 0),
(31, 3, 'High Heat Index', 'Heat index exceeded threshold: 53.26Â°C', '2024-09-21 09:53:16', 0),
(32, 3, 'High Heat Index', 'Heat index exceeded threshold: 45.25Â°C', '2024-09-21 09:53:16', 0),
(33, 3, 'High Heat Index', 'Heat index exceeded threshold: 54.69Â°C', '2024-09-21 09:53:16', 0),
(34, 3, 'High Heat Index', 'Heat index exceeded threshold: 38.06Â°C', '2024-09-21 09:53:16', 0),
(35, 3, 'High Heat Index', 'Heat index exceeded threshold: 38.84Â°C', '2024-09-21 09:53:16', 0),
(36, 3, 'High Heat Index', 'Heat index exceeded threshold: 60.15Â°C', '2024-09-21 09:53:16', 0),
(37, 3, 'High Heat Index', 'Heat index exceeded threshold: 51.48Â°C', '2024-09-21 09:53:16', 0),
(38, 3, 'High Heat Index', 'Heat index exceeded threshold: 50.58Â°C', '2024-09-21 09:53:16', 0),
(39, 3, 'High Heat Index', 'Heat index exceeded threshold: 47.26Â°C', '2024-09-21 09:53:16', 0),
(40, 3, 'High Heat Index', 'Heat index exceeded threshold: 46.69Â°C', '2024-09-21 09:53:16', 0),
(41, 3, 'High Heat Index', 'Heat index exceeded threshold: 54.78Â°C', '2024-09-21 09:53:16', 0),
(42, 3, 'High Heat Index', 'Heat index exceeded threshold: 45.65Â°C', '2024-09-21 09:53:16', 0),
(43, 3, 'High Heat Index', 'Heat index exceeded threshold: 46Â°C', '2024-09-21 09:53:16', 0),
(44, 3, 'High Heat Index', 'Heat index exceeded threshold: 58.36Â°C', '2024-09-21 09:53:16', 0),
(45, 3, 'High Heat Index', 'Heat index exceeded threshold: 51.7Â°C', '2024-09-21 09:53:16', 0),
(46, 3, 'High Heat Index', 'Heat index exceeded threshold: 49.29Â°C', '2024-09-21 09:53:16', 0),
(47, 3, 'High Heat Index', 'Heat index exceeded threshold: 45.89Â°C', '2024-09-21 09:53:16', 0),
(48, 3, 'High Heat Index', 'Heat index exceeded threshold: 42.4Â°C', '2024-09-21 09:56:05', 1),
(49, 3, 'High Heat Index', 'Heat index exceeded threshold: 44.43Â°C', '2024-09-21 09:56:05', 1),
(50, 3, 'High Heat Index', 'Heat index exceeded threshold: 39.73Â°C', '2024-09-21 09:56:05', 0),
(51, 3, 'High Heat Index', 'Heat index exceeded threshold: 47.26Â°C', '2024-09-21 09:56:05', 0),
(52, 3, 'High Heat Index', 'Heat index exceeded threshold: 54.55Â°C', '2024-09-21 09:56:05', 0),
(53, 3, 'High Heat Index', 'Heat index exceeded threshold: 58.87Â°C', '2024-09-21 09:56:05', 0),
(54, 3, 'High Heat Index', 'Heat index exceeded threshold: 39.25Â°C', '2024-09-21 09:56:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `heatindexdata`
--

CREATE TABLE `heatindexdata` (
  `data_id` int(11) NOT NULL,
  `sensor_id` int(11) DEFAULT NULL,
  `temperature` decimal(5,2) NOT NULL,
  `humidity` decimal(5,2) NOT NULL,
  `heat_index` decimal(5,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `heatindexdata`
--

INSERT INTO `heatindexdata` (`data_id`, `sensor_id`, `temperature`, `humidity`, `heat_index`, `timestamp`) VALUES
(1, 3, 30.00, 60.00, 34.00, '2024-09-21 07:50:14'),
(2, 3, 31.50, 65.00, 36.50, '2024-09-21 06:50:14'),
(3, 3, 32.00, 70.00, 37.00, '2024-09-21 05:50:14'),
(4, 3, 29.00, 55.00, 32.00, '2024-09-21 04:50:14'),
(5, 3, 28.50, 50.00, 30.00, '2024-09-21 03:50:14'),
(6, 3, 33.00, 75.00, 40.00, '2024-09-21 02:50:14'),
(7, 3, 30.50, 68.00, 36.00, '2024-09-21 01:50:14'),
(8, 3, 37.00, 69.00, 52.53, '2024-09-21 09:53:13'),
(9, 3, 26.00, 44.00, 31.06, '2024-09-21 09:53:13'),
(10, 3, 29.00, 57.00, 37.27, '2024-09-21 09:53:13'),
(11, 3, 36.00, 75.00, 52.13, '2024-09-21 09:53:13'),
(12, 3, 28.00, 76.00, 38.26, '2024-09-21 09:53:13'),
(13, 3, 34.00, 70.00, 47.65, '2024-09-21 09:53:13'),
(14, 3, 39.00, 75.00, 57.38, '2024-09-21 09:53:13'),
(15, 3, 38.00, 59.00, 51.87, '2024-09-21 09:53:13'),
(16, 3, 26.00, 77.00, 34.86, '2024-09-21 09:53:13'),
(17, 3, 40.00, 72.00, 58.36, '2024-09-21 09:53:13'),
(18, 3, 35.00, 66.00, 48.53, '2024-09-21 09:53:15'),
(19, 3, 30.00, 68.00, 40.54, '2024-09-21 09:53:15'),
(20, 3, 27.00, 79.00, 36.88, '2024-09-21 09:53:15'),
(21, 3, 26.00, 42.00, 30.83, '2024-09-21 09:53:15'),
(22, 3, 39.00, 74.00, 57.13, '2024-09-21 09:53:15'),
(23, 3, 26.00, 44.00, 31.06, '2024-09-21 09:53:15'),
(24, 3, 38.00, 73.00, 55.16, '2024-09-21 09:53:15'),
(25, 3, 25.00, 55.00, 30.78, '2024-09-21 09:53:15'),
(26, 3, 33.00, 43.00, 40.96, '2024-09-21 09:53:15'),
(27, 3, 30.00, 58.00, 38.99, '2024-09-21 09:53:15'),
(28, 3, 33.00, 63.00, 44.66, '2024-09-21 09:53:16'),
(29, 3, 40.00, 59.00, 55.05, '2024-09-21 09:53:16'),
(30, 3, 32.00, 66.00, 43.55, '2024-09-21 09:53:16'),
(31, 3, 36.00, 56.00, 48.04, '2024-09-21 09:53:16'),
(32, 3, 37.00, 58.00, 50.05, '2024-09-21 09:53:16'),
(33, 3, 28.00, 57.00, 35.70, '2024-09-21 09:53:16'),
(34, 3, 37.00, 53.00, 48.93, '2024-09-21 09:53:16'),
(35, 3, 40.00, 59.00, 55.05, '2024-09-21 09:53:16'),
(36, 3, 27.00, 74.00, 36.25, '2024-09-21 09:53:16'),
(37, 3, 39.00, 78.00, 58.11, '2024-09-21 09:53:16'),
(38, 3, 33.00, 50.00, 42.25, '2024-09-21 09:53:16'),
(39, 3, 37.00, 63.00, 51.18, '2024-09-21 09:53:16'),
(40, 3, 34.00, 61.00, 45.90, '2024-09-21 09:53:16'),
(41, 3, 40.00, 74.00, 58.87, '2024-09-21 09:53:16'),
(42, 3, 32.00, 68.00, 43.90, '2024-09-21 09:53:16'),
(43, 3, 31.00, 71.00, 42.72, '2024-09-21 09:53:16'),
(44, 3, 36.00, 51.00, 46.97, '2024-09-21 09:53:16'),
(45, 3, 40.00, 52.00, 53.26, '2024-09-21 09:53:16'),
(46, 3, 35.00, 50.00, 45.25, '2024-09-21 09:53:16'),
(47, 3, 26.00, 64.00, 33.36, '2024-09-21 09:53:16'),
(48, 3, 38.00, 71.00, 54.69, '2024-09-21 09:53:16'),
(49, 3, 30.00, 52.00, 38.06, '2024-09-21 09:53:16'),
(50, 3, 30.00, 57.00, 38.84, '2024-09-21 09:53:16'),
(51, 3, 25.00, 64.00, 31.72, '2024-09-21 09:53:16'),
(52, 3, 40.00, 79.00, 60.15, '2024-09-21 09:53:16'),
(53, 3, 40.00, 45.00, 51.48, '2024-09-21 09:53:16'),
(54, 3, 25.00, 48.00, 30.04, '2024-09-21 09:53:16'),
(55, 3, 26.00, 80.00, 35.20, '2024-09-21 09:53:16'),
(56, 3, 35.00, 76.00, 50.58, '2024-09-21 09:53:16'),
(57, 3, 34.00, 68.00, 47.26, '2024-09-21 09:53:16'),
(58, 3, 35.00, 57.00, 46.69, '2024-09-21 09:53:16'),
(59, 3, 28.00, 64.00, 36.64, '2024-09-21 09:53:16'),
(60, 3, 37.00, 79.00, 54.78, '2024-09-21 09:53:16'),
(61, 3, 32.00, 78.00, 45.65, '2024-09-21 09:53:16'),
(62, 3, 37.00, 40.00, 46.00, '2024-09-21 09:53:16'),
(63, 3, 40.00, 72.00, 58.36, '2024-09-21 09:53:16'),
(64, 3, 36.00, 73.00, 51.70, '2024-09-21 09:53:16'),
(65, 3, 39.00, 42.00, 49.29, '2024-09-21 09:53:16'),
(66, 3, 36.00, 46.00, 45.89, '2024-09-21 09:53:16'),
(67, 3, 25.00, 62.00, 31.51, '2024-09-21 09:53:16'),
(68, 3, 30.00, 80.00, 42.40, '2024-09-21 09:56:05'),
(69, 3, 35.00, 46.00, 44.43, '2024-09-21 09:56:05'),
(70, 3, 27.00, 72.00, 36.00, '2024-09-21 09:56:05'),
(71, 3, 29.00, 74.00, 39.73, '2024-09-21 09:56:05'),
(72, 3, 34.00, 68.00, 47.26, '2024-09-21 09:56:05'),
(73, 3, 27.00, 75.00, 36.38, '2024-09-21 09:56:05'),
(74, 3, 37.00, 78.00, 54.55, '2024-09-21 09:56:05'),
(75, 3, 40.00, 74.00, 58.87, '2024-09-21 09:56:05'),
(76, 3, 31.00, 50.00, 39.25, '2024-09-21 09:56:05'),
(77, 3, 29.00, 59.00, 37.56, '2024-09-21 09:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_username` varchar(100) NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `action`, `timestamp`, `admin_username`, `details`) VALUES
(1, 'Added Sensor', '2024-09-21 07:35:41', 'admin', 'Sensor Name: BSCRIM sensor, Location: norths, Latitude: 18.632, Longitude: 23.13311'),
(2, 'Added Sensor', '2024-09-21 07:35:41', 'admin', 'Sensor Name: BSCRIM sensor, Location: norths, Latitude: 18.632, Longitude: 23.13311'),
(3, 'Added Sensor', '2024-09-21 07:39:46', 'admin', 'Sensor Name: BSBIO, Location: west, Latitude: 18.63422, Longitude: 23.133111'),
(4, 'Deleted Sensor', '2024-09-21 07:41:59', 'admin', 'Sensor ID: 2, Sensor Name: BSIS sensor, Location: south, Latitude: 18.63400000, Longitude: 23.13300000'),
(5, 'Added Sensor', '2024-09-21 08:15:37', 'admin', 'Sensor Name: BSIS sensor, Location: northwest, Latitude: 18.63421, Longitude: 23.133124'),
(8, 'Updated Sensor', '2024-09-21 08:57:23', 'admin', 'Sensor ID: 3, New Sensor Name: BSBIO, New Location: west4, New Latitude: 18.63422000, New Longitude: 23.13311100'),
(9, 'Added Sensor', '2024-09-21 09:14:46', 'admin', 'Sensor Name: BSIT sensor, Location: north, Latitude: 18.63423, Longitude: 23.1332'),
(10, 'Deleted Sensor', '2024-09-21 11:05:44', 'admin', 'Sensor ID: 5, Sensor Name: BSIT sensor, Location: north, Latitude: 18.63423000, Longitude: 23.13320000');

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `sensor_id` int(11) NOT NULL,
  `sensor_name` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `installation_date` date NOT NULL,
  `last_maintenance` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`sensor_id`, `sensor_name`, `location`, `installation_date`, `last_maintenance`, `status`, `created_at`, `latitude`, `longitude`) VALUES
(3, 'BSBIO', 'west4', '0000-00-00', NULL, 'active', '2024-09-21 07:39:46', 18.63422000, 23.13311100),
(4, 'BSIS sensor', 'northwest', '0000-00-00', NULL, 'active', '2024-09-21 08:15:37', 18.63421000, 23.13312400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`alert_id`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Indexes for table `heatindexdata`
--
ALTER TABLE `heatindexdata`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`sensor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `heatindexdata`
--
ALTER TABLE `heatindexdata`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `sensor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`sensor_id`) ON DELETE CASCADE;

--
-- Constraints for table `heatindexdata`
--
ALTER TABLE `heatindexdata`
  ADD CONSTRAINT `heatindexdata_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`sensor_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
