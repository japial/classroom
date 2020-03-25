-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 12:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'teacher', 'General User'),
(3, 'student', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(2, '127.0.0.1', 'administrator', 1585110512),
(3, '127.0.0.1', 'admin@admin.com', 1585130084),
(4, '127.0.0.1', 'admin@admin.com', 1585130097);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `active`, `created_at`) VALUES
(1, 'BN College, Dhaka', 1, '2020-03-25 05:28:11'),
(2, 'SAGC, Dhaka', 1, '2020-03-25 05:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `company`, `phone`, `active`, `ip_address`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`) VALUES
(1, 'administrator', '$2y$12$swxM6DnAb/50pr1VFXOoDetBbeTgZ8SulVN12xDbQMjRK/7N8HzyO', 'admin@classtune.com', 'Admin', 'istrator', 'ClassTune', '0234234', 1, '127.0.0.1', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1585134333),
(2, 'pial', '$2y$10$jlhHEBdJfrZMu.nKlV0bUupwfYjmRFbyLKGENHGO/HAdekVsm/NtC', 'pialneel@gmail.com', 'Jahangir', 'Pial', 'Six', '07173201230', 1, '127.0.0.1', NULL, NULL, '57f03482753b339a60cb', '$2y$10$wvI18ABLS8A363EPhp4UveOJrU.N0JhF.6qLpxQQekgQlqGvW8gnC', 1585134050, NULL, NULL, 1585114717, 1585130522),
(3, 'huffas', '$2y$10$/L4PHgPzFELmqoSBZ/9jGOAKXTdk97GDrDrEXbCmoEgQIzntVynpG', 'huffas@gmail.com', 'Huffas', 'Abdullah', 'Ten', '0173201230', 1, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1585115703, 1585115704),
(4, 'tapu@ga.com', '$2y$10$F6fgI9AeZTvVPACDEnIQD.tbAxF/MM1cbaoK0kaS.aqQgO.ywpNT6', 'tapu@ga.com', 'Rasedul Tapu', 'Hossain', 'Seven', '9817439812', 1, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1585115992, 1585115992),
(5, 'selim@cr.com', '$2y$10$LfeXhfB3TLSCtxqo/ZNbReNdUmbpg9/kEciy7lIQPCDZmTEfpITDe', 'selim@cr.com', 'Selim', 'Reza', 'Eight', '0183029312', 1, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1585116350, 1585116583),
(6, 'fahim@gmail.com', '$2y$10$AJXJesdF4xYmcO0z3B9qiOS0L6/IZbUl215r74GOhd//v6qRBtY3e', 'fahim@gmail.com', 'Fahim', 'Mohammad', 'Science', '13412312312', 1, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1585126325, NULL),
(7, 'shawon@gmail.com', '$2y$10$TMDhIxisy6QAPhTfWaHUsuSXWH441Aem2TG3T8TCuuk9XOU41JsQ.', 'shawon@gmail.com', 'Shawon', 'Kumar', 'Five', '0184301283', 1, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '17e3cb75a4523dc89c6c5d1ccfa03966e895d3ec', '$2y$10$wGpg.2gr2wKgjfXoURXEheOye3TSg0q1sDPYgzaRfiyDN1XtGcS7y', 1585134256, 1585134278);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(13, 1, 1),
(3, 2, 2),
(2, 3, 2),
(12, 4, 3),
(5, 5, 3),
(6, 6, 2),
(14, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_school`
--

CREATE TABLE `user_school` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_school`
--

INSERT INTO `user_school` (`id`, `user_id`, `school_id`, `created_at`) VALUES
(1, 3, 2, '2020-03-25 05:55:04'),
(2, 4, 2, '2020-03-25 05:59:52'),
(3, 5, 1, '2020-03-25 06:05:50'),
(4, 6, 2, '2020-03-25 08:52:05'),
(6, 2, 2, '2020-03-25 08:52:05'),
(7, 7, 1, '2020-03-25 11:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_school`
--
ALTER TABLE `user_school`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_school`
--
ALTER TABLE `user_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
