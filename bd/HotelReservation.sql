-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2018 at 12:17 AM
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
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL,
  `client_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_nom`, `client_adresse`, `client_ville`, `client_phone`, `email`, `user_id`, `created`, `modified`) VALUES
(1, 'Anthony', '123 rue allo', 'Montréal', '514-111-1111', 'anthony@gmail.com', 5, '2018-09-20 08:23:09', '2018-09-20 12:34:31'),
(2, 'anthony', '123 allo', 'montreal', '111-111-1111', 'a@gmail.com', 5, '2018-10-08 02:13:50', '2018-10-09 02:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `file_path`, `created`, `modified`, `status`) VALUES
(1, 'bestwestern.jpg', 'Files/', '2018-09-24 07:00:00', '2018-09-24 07:10:00', 1),
(13, 'mariott.jpg', 'Files/', '2018-10-08 21:47:15', '2018-10-08 21:47:15', 1),
(14, 'sheraton.jpg', 'Files/', NULL, NULL, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_nom`, `hotel_adresse`, `hotel_codepostal`, `hotel_url`, `pays_code`, `ville_id`, `user_id`, `listHotels_id`, `created`, `modified`) VALUES
(1, 'Best Western', '3407 Rue Peel', 'H3A 1W7', 'www.bestwestern.com', 2, 2, 5, NULL, '2018-09-21 03:20:37', '2018-11-10 03:49:59'),
(2, 'Courtyard by Marriott', '177 Hurricane Ln', 'VT 05495', 'www.marriott.com', 2, 2, 11, NULL, '2018-10-09 21:28:40', '2018-11-06 03:01:56'),
(3, 'Le Centre Sheraton', '1201 René-Lévesque Blvd W', 'H3B 2L7', 'https://sheraton.marriott.com/', 2, 6, 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotels_clients`
--

CREATE TABLE IF NOT EXISTS `hotels_clients` (
  `hotel_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nb_chambre` int(11) NOT NULL,
  `date_de` date NOT NULL,
  `date_a` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels_clients`
--

INSERT INTO `hotels_clients` (`hotel_id`, `client_id`, `nb_chambre`, `date_de`, `date_a`) VALUES
(1, 2, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hotels_files`
--

CREATE TABLE IF NOT EXISTS `hotels_files` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels_files`
--

INSERT INTO `hotels_files` (`id`, `hotel_id`, `file_id`) VALUES
(1, 1, 1),
(5, 2, 13),
(6, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Pays', 1, 'pays_nom', 'États-Unis'),
(2, 'ch_HK', 'Pays', 2, 'pays_nom', '加拿大'),
(3, 'fr_CA', 'Hotels', 1, 'hotel_ville', 'Montréal'),
(5, 'ch_HK', 'Pays', 1, 'pays_nom', '美國'),
(6, 'ch_HK', 'Hotels', 1, 'hotel_ville', '滿地可'),
(8, 'ch_HK', 'Hotels', 3, 'hotel_ville', '威利斯頓');

-- --------------------------------------------------------

--
-- Table structure for table `list_hotels`
--

CREATE TABLE IF NOT EXISTS `list_hotels` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_hotels`
--

INSERT INTO `list_hotels` (`id`, `nom`) VALUES
(1, 'First World Hotel'),
(2, 'Quality Inn & Suites Brossard'),
(3, 'Holiday Inn Express St. Jean Sur Richelieu'),
(4, 'Comfort Inn Boucherville'),
(5, 'Best Western'),
(6, 'Courtyard by Marriott'),
(7, 'Le Centre Sheraton'),
(8, 'Circus Circus'),
(9, 'Holiday Inn Resort Orlando Suites'),
(10, 'Seaside All Suites');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `pays_code` int(11) NOT NULL,
  `pays_devise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`pays_code`, `pays_devise`, `pays_nom`) VALUES
(1, 'USD', 'États-Unis'),
(2, 'CAD', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`) VALUES
('admin'),
('client'),
('proprietaire');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `role_id`, `created`, `modified`) VALUES
(5, 'admin@gmail.com', '$2y$10$pTN9w5oNfFMVLsRSDH2wNeLCch6hleYUcpZj9aO19/Trb2Hxmj6fy', 'admin', '2018-10-01 01:53:33', '2018-10-01 01:53:33'),
(8, 'anthonychow000@gmail.com', '$2y$10$hW.Nv2Jm2WLpJRMny2/HP.9jvcKwimn33mx8p6bErgWqCBxIg8IqG', 'client', '2018-10-07 20:50:11', '2018-10-07 20:50:11'),
(11, 'anthonychow8@gmail.com', '$2y$10$dn9/HiQdKDKMhDuiVRSXfu1kmbiirjvZAV1tewM6Jeje780kUTk36', 'proprietaire', '2018-10-09 21:28:14', '2018-10-09 21:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays_code` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `pays_code`) VALUES
(1, 'Toronto', 2),
(2, 'Montreal', 2),
(3, 'Ottawa', 2),
(4, 'Vancouver', 2),
(5, 'Quebec', 2),
(6, 'New York', 1),
(7, 'Chicago', 1),
(8, 'San Diego', 1),
(9, 'San Francisco', 1),
(10, 'Buffalo', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `pays_code` (`pays_code`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ville_id` (`ville_id`),
  ADD KEY `listHotels_id` (`listHotels_id`);

--
-- Indexes for table `hotels_clients`
--
ALTER TABLE `hotels_clients`
  ADD PRIMARY KEY (`hotel_id`,`client_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `hotels_files`
--
ALTER TABLE `hotels_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_hotels`
--
ALTER TABLE `list_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`pays_code`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pays_code` (`pays_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hotels_files`
--
ALTER TABLE `hotels_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `list_hotels`
--
ALTER TABLE `list_hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `pays_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_3` FOREIGN KEY (`pays_code`) REFERENCES `pays` (`pays_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_5` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_6` FOREIGN KEY (`listHotels_id`) REFERENCES `list_hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotels_clients`
--
ALTER TABLE `hotels_clients`
  ADD CONSTRAINT `hotels_clients_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_clients_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotels_files`
--
ALTER TABLE `hotels_files`
  ADD CONSTRAINT `hotels_files_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_files_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_ibfk_1` FOREIGN KEY (`pays_code`) REFERENCES `pays` (`pays_code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
