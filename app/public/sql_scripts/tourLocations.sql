-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 20, 2023 at 10:20 AM
-- Server version: 10.9.4-MariaDB-1:10.9.4+maria~ubu2204
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `tourLocations`
--

CREATE TABLE `tourLocations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourLocations`
--

INSERT INTO `tourLocations` (`id`, `name`, `location`, `description`, `picture`) VALUES
(1, 'Bavo Church', 'Grote Markt 22, 2011 RD Haarlem', 'description 1', ''),
(2, 'Grote Markt', 'Grote Markt, 2011 RD Haarlem', 'description 2', ''),
(3, 'De Hallen', 'Grote Markt 16, 2011 RD Haarlem', 'description 3', ''),
(4, 'Proveniershof', 'Grote Houtstraat 142D, 2011 SV Haarlem', 'description 4', ''),
(5, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 'description 5', ''),
(6, 'Waalse Kerk', 'Begijnhof 28, 2011 HE Haarlem', 'Description 6', ''),
(7, 'Molen de Adriaan', 'Papentorenvest 1A, 2011 AV Haarlem', 'description 7', ''),
(8, 'Amsterdamse Poort', '2011 BZ Haarlem', 'description 8', ''),
(9, 'Hofje van Bakenes', 'Wijde Appelaarsteeg 11F, 2011 HB Haarlem', 'description 9', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tourLocations`
--
ALTER TABLE `tourLocations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tourLocations`
--
ALTER TABLE `tourLocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
