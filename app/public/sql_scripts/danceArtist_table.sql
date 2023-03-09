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
-- Table structure for table `danceArtist`
--

CREATE TABLE `danceArtist` (
  `id` int(11) NOT NULL,
  `danceId` int(11) NOT NULL,
  `artistId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danceArtist`
--

INSERT INTO `danceArtist` (`id`, `danceId`, `artistId`) VALUES
(1, 1, 5),
(2, 1, 6),
(3, 2, 4),
(4, 3, 1),
(5, 4, 2),
(6, 4, 2),
(7, 5, 3),
(8, 6, 1),
(9, 6, 3),
(10, 6, 2),
(11, 7, 6),
(12, 8, 4),
(13, 9, 5),
(14, 10, 6),
(15, 10, 4),
(16, 10, 5),
(17, 11, 2),
(18, 12, 1),
(19, 13, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danceArtist`
--
ALTER TABLE `danceArtist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_da_danceId` (`danceId`),
  ADD KEY `fk_da_artistId` (`artistId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danceArtist`
--
ALTER TABLE `danceArtist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danceArtist`
--
ALTER TABLE `danceArtist`
  ADD CONSTRAINT `fk_da_artistId` FOREIGN KEY (`artistId`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `fk_da_danceId` FOREIGN KEY (`danceId`) REFERENCES `dance` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
