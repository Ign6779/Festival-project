-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 18, 2023 at 12:02 PM
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
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
  `id` int(11) NOT NULL,
  `activity_title` varchar(300) NOT NULL,
  `activity_description` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`id`, `activity_title`, `activity_description`, `img`) VALUES
(1, 'Teyler’s secret', 'Participant areintroduced to the backstory of this challenge. A code has to be found to reveal the location of Prof. Teylers Notebook.', 'detective-icon.png'),
(2, 'The Egg problem', 'Participants get some egg-facts and must solve a science problem to find the two fresh eggs out of six using science.', 'egg-icon.png'),
(3, 'The Lost Calculator', 'Participant must solve a math problem finding and combing several numbers in each outcome.', 'calculator-icon.png'),
(4, 'The Broken Circuit', 'Participant must solve a science problem repairing an completing a circuit to make two lamps glow.', 'circuit-icon.png'),
(5, 'The Scale Problem', 'Participant must solve a science problem involving finding the right amount of water to tip a scale in a certain direction.', 'scale-icon.png'),
(6, 'The Final Enigma', 'Participant must answer questions on the museum to receive the final clue and solve the mystery.', 'enigma-icon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
