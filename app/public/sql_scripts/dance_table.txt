-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 09, 2023 at 03:15 PM
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
-- Table structure for table `dance`
--

CREATE TABLE `dance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `venueId` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `availableTickets` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dance`
--

INSERT INTO `dance` (`id`, `date`, `startTime`, `endTime`, `venueId`, `session`, `availableTickets`, `price`) VALUES
(1, '2023-07-27', '20:00:00', '02:00:00', 1, 'Back2Back', 1500, 75),
(2, '2023-02-27', '22:00:00', '23:30:00', 2, 'Club', 200, 60),
(3, '2023-07-26', '23:00:00', '00:30:00', 3, 'Club', 300, 60),
(4, '2023-07-27', '22:00:00', '23:00:00', 4, 'Club', 200, 60),
(5, '2023-07-27', '22:00:00', '23:30:00', 5, 'Club', 200, 60),
(6, '2023-07-28', '14:00:00', '23:00:00', 6, 'Back2Back', 2000, 110),
(7, '2023-07-28', '22:00:00', '23:30:00', 3, 'Club', 300, 60),
(8, '2023-07-28', '21:00:00', '01:00:00', 1, 'TiestoWorld', 1500, 75),
(9, '2023-07-28', '23:00:00', '00:30:00', 2, 'Club', 200, 60),
(10, '2023-07-29', '14:00:00', '23:00:00', 6, 'Back2Back', 2000, 110),
(11, '2023-07-29', '19:00:00', '20:30:00', 3, 'Club', 300, 60),
(12, '2023-07-29', '21:00:00', '22:30:00', 4, 'Club', 1500, 90),
(13, '2023-07-29', '18:00:00', '19:30:00', 2, 'Club', 200, 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dance`
--
ALTER TABLE `dance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dance_venueId` (`venueId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dance`
--
ALTER TABLE `dance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dance`
--
ALTER TABLE `dance`
  ADD CONSTRAINT `fk_dance_venueId` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
