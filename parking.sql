-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 08:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `clientName` varchar(255) NOT NULL,
  `clientEmail` varchar(255) NOT NULL,
  `clientMobile` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientName`, `clientEmail`, `clientMobile`, `password`) VALUES
(1, 'Raghvendra Awasthi', 'ra@email.com', '8502960231', '3d3d286a8d153a4a58156d0e02d8570c');

-- --------------------------------------------------------

--
-- Table structure for table `parked_vehicles`
--

CREATE TABLE `parked_vehicles` (
  `id` int(11) NOT NULL,
  `vehicleNumber` varchar(255) NOT NULL,
  `vehicleType` varchar(255) NOT NULL,
  `allotedTokenNumber` varchar(50) NOT NULL,
  `inTime` date NOT NULL DEFAULT current_timestamp(),
  `outTime` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserved_lots`
--

CREATE TABLE `reserved_lots` (
  `id` int(11) NOT NULL,
  `tokenNumber` varchar(50) NOT NULL,
  `vehicleType` varchar(50) NOT NULL,
  `vehicleNumber` varchar(50) DEFAULT NULL,
  `clientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserved_lots`
--

INSERT INTO `reserved_lots` (`id`, `tokenNumber`, `vehicleType`, `vehicleNumber`, `clientId`) VALUES
(30, 'BK01', 'Bike', 'RJ34SJ5446', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `tokenNumber` varchar(255) NOT NULL,
  `typeId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `tokenNumber`, `typeId`, `status`, `category`, `remarks`) VALUES
(1, 'BK01', 1, 'free', 'reserved', 'operational'),
(2, 'BK02', 1, 'free', 'general', 'operational'),
(3, 'BK03', 1, 'free', 'general', 'operational'),
(4, 'BK04', 1, 'free', 'general', 'operational'),
(5, 'BK05', 1, 'free', 'general', 'operational'),
(6, 'BK06', 1, 'free', 'general', 'Out of order'),
(7, 'BK07', 1, 'free', 'general', 'operational'),
(8, 'BK08', 1, 'free', 'general', 'operational'),
(9, 'BK09', 1, 'free', 'general', 'operational'),
(10, 'BK10', 1, 'In Use', 'general', 'operational'),
(11, 'BK11', 1, 'free', 'general', 'operational'),
(12, 'BK12', 1, 'free', 'general', 'operational'),
(13, 'BK13', 1, 'free', 'general', 'operational'),
(14, 'BK14', 1, 'free', 'general', 'operational'),
(15, 'BK15', 1, 'free', 'general', 'operational'),
(16, 'BK16', 1, 'free', 'general', 'operational'),
(17, 'BK17', 1, 'free', 'general', 'operational'),
(18, 'BK18', 1, 'free', 'general', 'operational'),
(19, 'BK19', 1, 'free', 'general', 'operational'),
(20, 'BK20', 1, 'free', 'general', 'operational'),
(21, 'HB01', 2, 'free', 'general', 'operational'),
(22, 'HB02', 2, 'free', 'general', 'operational'),
(23, 'HB03', 2, 'free', 'general', 'operational'),
(24, 'HB04', 2, 'free', 'general', 'operational'),
(25, 'HB05', 2, 'free', 'general', 'operational'),
(26, 'HB06', 2, 'free', 'general', 'operational'),
(27, 'HB07', 2, 'free', 'general', 'operational'),
(28, 'HB08', 2, 'free', 'general', 'operational'),
(29, 'HB09', 2, 'free', 'general', 'operational'),
(30, 'HB10', 2, 'free', 'general', 'operational'),
(31, 'HB11', 2, 'free', 'general', 'operational'),
(32, 'HB12', 2, 'free', 'general', 'operational'),
(33, 'HB13', 2, 'free', 'general', 'operational'),
(34, 'HB14', 2, 'free', 'general', 'operational'),
(35, 'HB15', 2, 'free', 'general', 'operational'),
(36, 'HB16', 2, 'free', 'general', 'operational'),
(37, 'HB17', 2, 'free', 'general', 'operational'),
(38, 'HB18', 2, 'free', 'general', 'operational'),
(39, 'HB19', 2, 'free', 'general', 'operational'),
(40, 'HB20', 2, 'free', 'general', 'operational'),
(41, 'SE01', 3, 'free', 'general', 'operational'),
(42, 'SE02', 3, 'free', 'general', 'operational'),
(43, 'SE03', 3, 'free', 'general', 'operational'),
(44, 'SE04', 3, 'free', 'general', 'operational'),
(45, 'SE05', 3, 'free', 'general', 'operational'),
(46, 'SE06', 3, 'free', 'general', 'operational'),
(47, 'SE07', 3, 'free', 'general', 'operational'),
(48, 'SE08', 3, 'free', 'general', 'operational'),
(49, 'SE09', 3, 'free', 'general', 'operational'),
(50, 'SE10', 3, 'free', 'general', 'operational'),
(51, 'SE11', 3, 'free', 'general', 'operational'),
(52, 'SE12', 3, 'free', 'general', 'operational'),
(53, 'SE13', 3, 'free', 'general', 'operational'),
(54, 'SE14', 3, 'free', 'general', 'operational'),
(55, 'SE15', 3, 'free', 'general', 'operational'),
(56, 'SE16', 3, 'free', 'general', 'operational'),
(57, 'SE17', 3, 'free', 'general', 'operational'),
(58, 'SE18', 3, 'free', 'general', 'operational'),
(59, 'SE19', 3, 'free', 'general', 'operational'),
(60, 'SE20', 3, 'free', 'general', 'operational');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `userEmail`, `Password`) VALUES
(1, 'Raghav Awasthi', 'ra@email.com', '3d3d286a8d153a4a58156d0e02d8570c');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(11) NOT NULL,
  `typeTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `typeTitle`) VALUES
(5, 'Auto_Rikshaw'),
(1, 'Bike'),
(6, 'E_Rikshaw'),
(2, 'Hatchback Car'),
(8, 'Mini_Bus'),
(7, 'PickUp'),
(3, 'Sedan Car'),
(4, 'SUV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `parked_vehicles`
--
ALTER TABLE `parked_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicleNumber` (`vehicleNumber`);

--
-- Indexes for table `reserved_lots`
--
ALTER TABLE `reserved_lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tokenNumber` (`tokenNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeTitle` (`typeTitle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parked_vehicles`
--
ALTER TABLE `parked_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserved_lots`
--
ALTER TABLE `reserved_lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
