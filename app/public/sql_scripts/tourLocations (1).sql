-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 22, 2023 at 08:09 PM
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
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourLocations`
--

INSERT INTO `tourLocations` (`id`, `name`, `location`, `description`, `img`) VALUES
(1, 'Bavo Church', 'Grote Markt 22, 2011 RD Haarlem', 'The Grote Kerk or St.-Bavokerk is a Reformed Protestant church and former Catholic cathedral located on the central market square (Grote Markt) in the Dutch city of Haarlem. Another Haarlem church called the Cathedral of Saint Bavo now serves as the main cathedral for the Roman Catholic Diocese of Haarlem-Amsterdam.', 'st-bavo.jpeg'),
(2, 'Grote Markt', 'Grote Markt, 2011 RD Haarlem', 'The Grote Markt in Haarlem is a large square in the center of Haarlem, where a number of old and well-known buildings are located, such as the Grote or Sint-Bavokerk and the town hall.\r\nMany speak of the most beautiful square in the Netherlands. The appearance and character of the square are determined by the historic buildings. The market, fun fair and various events take place on the Grote Markt in Haarlem.', 'grote-markt.jpg'),
(3, 'De Hallen', 'Grote Markt 16, 2011 RD Haarlem', 'De Hallen Haarlem is the museum for modern and contemporary art in Haarlem.\r\nTwice a year, De Hallen Haarlem organizes an exhibition cluster about current developments in the visual arts. The museum thus offers a platform for artists from the Netherlands and abroad, with an emphasis on photography and video art.\r\nThe annual exhibition in the De Hallen Haarlem Summer Series highlights themes and people from the history of modern art (ca. 1850 - present) and focuses on a wide audience.', 'de-hallen.jpg'),
(4, 'Proveniershof', 'Grote Houtstraat 142D, 2011 SV Haarlem', 'The Proveniershof has a different appearance than the small courtyards in Haarlem. The houses of the Proveniershof were not a form of charity, but were intended for the well-to-do bourgeoisie, who bought in and could then live here at a later age. The Proveniershof is located on the busy shopping street Grote Houtstraat 144 and is freely accessible to visitors.', 'proveniershof.jpg'),
(5, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 'Behind the bar of the grand café of the Jopenkerk are imposing shiny brewing kettles. They form the heart of the Jopenkerk. Jopen brews both old and new classics here according to age-old recipes.\r\nGet to know the various Jopen beers in various flavors in the grand café. Order a tasting of three beers and discover your taste preferences. There is a special story behind every freshly tapped beer. Jopen also has an extensive drink menu.', 'jopenkerk.jpg'),
(6, 'Waalse Kerk', 'Begijnhof 28, 2011 HE Haarlem', 'The Waalse kerk is a Walloon church that was built in the middle of the 14th century and has an upper gallery built for the Beguines who lived there on the courtyard that still bears their name.The  sacristy dates from the 16th century, with wooden arches and a mantel from the 17th century. The organ was built in 1808 by Friederichs, and in the attic there is a mechanical clock that drives the hands on the clock of the organ. In the church tower there is a bell from 1512 with a diameter of 56.5 centimeters.', 'waalse-kerk.jpg'),
(7, 'Molen de Adriaan', 'Papentorenvest 1A, 2011 AV Haarlem', 'Molen De Adrian is a magnificent windmill, placed on the bank of Spaarne river that dates back to the year 1779. Originally, the windmill was part of a tower that defended the city center and was used to produce paint, cement and tan. Later on, it was converted into a tobacco widnmill. \r\n', 'windmill-de-adriaan1.jpg\r\n'),
(8, 'Amsterdamse Poort', '2011 BZ Haarlem', 'The Amsterdamse Poort is an old city gate of Haarlem that dates back to the XIV century. This historical landmark is the only gate that remains from the original twelve city gates. The gate is located at the end of the old route from Amsterdam to Haarlem. ', 'amsterdamse-poort1.jpg\r\n'),
(9, 'Hofje van Bakenes', 'Wijde Appelaarsteeg 11F, 2011 HB Haarlem', 'The Hofje van Bakenes or Bakenesserkamer is a Haarlem courtyard. The hofje can be found on the Bakenessergracht in the center of Haarlem. The courtyard has two entrances: one on the Bakenessergracht and one on the Wijde Appelaarsteeg. The entrance on the Wijde Appelaarsteeg is the main entrance. The Hofje van Bakenes is the oldest existing almshouse in Haarlem.', 'hof-van-bakenes.jpg');

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
