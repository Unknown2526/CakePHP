-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2018 at 05:05 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HotelReservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_codepostal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays_code` int(11) NOT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `listHotels_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_nom`, `hotel_adresse`, `hotel_codepostal`, `hotel_url`, `pays_code`, `ville_id`, `user_id`, `listHotels_id`, `created`, `modified`) VALUES
(1, 'Best Western', '3407 Rue Peel', 'H3A 1W7', 'www.bestwestern.com', 2, 2, 5, NULL, '2018-09-21 03:20:37', '2018-09-22 15:45:24'),
(2, 'Courtyard by Marriott', '177 Hurricane Ln', 'VT 05495', 'www.marriott.com', 2, 2, 11, NULL, '2018-10-09 21:28:40', '2018-11-06 03:01:56'),
(3, 'Le Centre Sheraton', '1201 René-Lévesque Blvd W', 'H3B 2L7', 'https://sheraton.marriott.com/', 2, 6, 11, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `pays_code` (`pays_code`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ville_id` (`ville_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_3` FOREIGN KEY (`pays_code`) REFERENCES `pays` (`pays_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_5` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
