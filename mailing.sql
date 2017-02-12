-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 11:47 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mailing`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail_queue`
--

CREATE TABLE `mail_queue` (
  `id` int(10) NOT NULL,
  `id_session` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_template` int(2) NOT NULL,
  `sending` tinyint(1) NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail_queue`
--

INSERT INTO `mail_queue` (`id`, `id_session`, `id_user`, `id_template`, `sending`, `date_add`) VALUES
(29, 12, 4, 2, 0, '2017-02-13 00:47:37'),
(28, 12, 3, 2, 0, '2017-02-13 00:47:37'),
(27, 12, 2, 2, 0, '2017-02-13 00:47:37'),
(26, 12, 1, 2, 0, '2017-02-13 00:47:37'),
(24, 11, 4, 2, 0, '2017-02-13 00:47:22'),
(23, 11, 3, 2, 0, '2017-02-13 00:47:22'),
(22, 11, 2, 2, 0, '2017-02-13 00:47:22'),
(17, 10, 2, 2, 0, '2017-02-13 00:20:30'),
(21, 11, 1, 2, 0, '2017-02-13 00:47:22'),
(25, 11, 5, 2, 0, '2017-02-13 00:47:22'),
(30, 12, 5, 2, 0, '2017-02-13 00:47:37'),
(31, 13, 1, 2, 0, '2017-02-13 00:48:16'),
(32, 13, 2, 2, 0, '2017-02-13 00:48:16'),
(33, 13, 3, 2, 0, '2017-02-13 00:48:16'),
(34, 13, 4, 2, 0, '2017-02-13 00:48:16'),
(35, 13, 5, 2, 0, '2017-02-13 00:48:16'),
(36, 14, 1, 1, 0, '2017-02-13 00:49:27'),
(37, 14, 2, 1, 0, '2017-02-13 00:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `mail_sent`
--

CREATE TABLE `mail_sent` (
  `id` int(10) NOT NULL,
  `id_session` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_template` int(11) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail_sent`
--

INSERT INTO `mail_sent` (`id`, `id_session`, `id_user`, `id_template`, `date_sent`) VALUES
(1, 1, 1, 2, '2017-02-12 22:11:53'),
(2, 1, 2, 2, '2017-02-12 22:16:33'),
(3, 1, 3, 2, '2017-02-12 22:16:33'),
(4, 1, 4, 2, '2017-02-12 22:16:33'),
(5, 1, 5, 2, '2017-02-12 23:16:22'),
(6, 2, 5, 3, '2017-02-12 23:16:22'),
(7, 2, 4, 3, '2017-02-12 23:16:22'),
(8, 2, 3, 3, '2017-02-12 23:55:26'),
(9, 2, 2, 3, '2017-02-12 23:55:26'),
(10, 2, 1, 3, '2017-02-12 23:55:26'),
(11, 10, 5, 2, '2017-02-13 00:20:46'),
(12, 10, 4, 2, '2017-02-13 00:20:46'),
(13, 10, 3, 2, '2017-02-13 00:20:46'),
(14, 10, 1, 2, '2017-02-13 00:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(10) NOT NULL,
  `id_template` int(2) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `id_template`, `date_add`) VALUES
(1, 2, '2017-02-12 21:17:02'),
(2, 3, '2017-02-12 23:15:53'),
(14, 1, '2017-02-13 00:49:27'),
(13, 2, '2017-02-13 00:48:16'),
(12, 2, '2017-02-13 00:47:37'),
(11, 2, '2017-02-13 00:47:22'),
(10, 2, '2017-02-13 00:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `title`, `content`) VALUES
(1, 'Default', 'Just simple template 1'),
(2, 'Success', 'Just simple template 2'),
(3, 'Reject', 'Just simple template 3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1, 'Garegin', 'garegin.davtian@gmail.com'),
(2, 'Tiran', 'tiran.davtyan@gmail.com'),
(3, 'Sose', 'karnosose@gmail.com'),
(4, 'Ada', 'ada.antonyan@gmail.com'),
(5, 'Joomag', 'jobs@joomag.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail_queue`
--
ALTER TABLE `mail_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_template` (`id_template`),
  ADD KEY `id_session` (`id_session`);

--
-- Indexes for table `mail_sent`
--
ALTER TABLE `mail_sent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_session` (`id_session`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_template` (`id_template`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail_queue`
--
ALTER TABLE `mail_queue`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `mail_sent`
--
ALTER TABLE `mail_sent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
