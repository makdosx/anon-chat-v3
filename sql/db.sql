-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2019 at 01:34 AM
-- Server version: 10.1.38-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anon-chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_chat`
--

CREATE TABLE `backup_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `id2` int(10) NOT NULL,
  `_from` varchar(32) NOT NULL,
  `ip_from` varchar(32) NOT NULL,
  `_to` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request` varchar(16) NOT NULL,
  `request_both` varchar(64) NOT NULL,
  `request_time` varchar(16) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `multimedia_name` varchar(256) NOT NULL,
  `multimedia_type` varchar(32) NOT NULL DEFAULT 'text/plain',
  `multimedia_size` bigint(20) NOT NULL,
  `multimedia_data` longblob NOT NULL,
  `fingerprint` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `backup_forum`
--

CREATE TABLE `backup_forum` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator` varchar(16) NOT NULL,
  `avatar` longblob NOT NULL,
  `theme` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_from` varchar(32) NOT NULL,
  `ip_from` varchar(32) NOT NULL,
  `_to` varchar(32) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `backup_login`
--

CREATE TABLE `backup_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_inside` varchar(4) NOT NULL,
  `fingerprint` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `id2` int(10) NOT NULL,
  `_from` varchar(32) NOT NULL,
  `avatar` longblob NOT NULL,
  `ip_from` varchar(32) NOT NULL,
  `_to` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request` varchar(16) NOT NULL,
  `request_both` varchar(64) NOT NULL,
  `request_time` varchar(16) NOT NULL,
  `message` varchar(4096) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `multimedia_name` varchar(256) NOT NULL,
  `multimedia_type` varchar(32) NOT NULL DEFAULT 'text/plain',
  `multimedia_size` bigint(20) NOT NULL,
  `multimedia_data` longblob NOT NULL,
  `fingerprint` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator` varchar(16) NOT NULL,
  `avatar` longblob NOT NULL,
  `theme` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_from` varchar(32) NOT NULL,
  `ip_from` varchar(32) NOT NULL,
  `_to` varchar(32) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_inside` varchar(4) NOT NULL,
  `fingerprint` varchar(32) NOT NULL,
  `verification_code` varchar(5) NOT NULL,
  `verified` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `log_file`
--

CREATE TABLE `log_file` (
  `id` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `ip_addr` varchar(32) NOT NULL,
  `path` varchar(32) NOT NULL,
  `connect` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `ip_addr` varchar(64) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `log_in_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `fingerprint` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_activities`
--



--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(10) NOT NULL,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(16) NOT NULL,
  `is_inside` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup_chat`
--
ALTER TABLE `backup_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_forum`
--
ALTER TABLE `backup_forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_login`
--
ALTER TABLE `backup_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `log_file`
--
ALTER TABLE `log_file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup_forum`
--
ALTER TABLE `backup_forum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
--
-- AUTO_INCREMENT for table `backup_login`
--
ALTER TABLE `backup_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1627;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `log_file`
--
ALTER TABLE `log_file`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14236;
--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
