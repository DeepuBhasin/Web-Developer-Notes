-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 08:59 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `firstName` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `firstName`, `lastName`, `city`, `age`) VALUES
(1, 'Simranjeet', 'kaur', 'patiala', 45),
(2, 'Avtar', 'Singh', 'pataiala', 55),
(32, 'deepi', 'bhasin', 'patiala', 45),
(5, 'Monika', 'Chohan', NULL, NULL),
(31, 'dee', 'x', 'e', 1),
(13, 'gg', 'gg', NULL, NULL),
(14, 'hh', 'hh', NULL, NULL),
(15, 'ii', 'ii', NULL, NULL),
(16, 'jj', 'jj', NULL, NULL),
(17, 'kk', 'kk', NULL, NULL),
(18, 'll', 'll', NULL, NULL),
(19, 'mm', 'mm', NULL, NULL),
(33, 'xxx', 'xxx', 'xx', 45),
(34, '', '', 'ok', 45),
(35, '', '', 'ok', 78),
(36, '', '', 'ok', 78),
(37, '', '', 'ok', 78),
(38, '', '', 'ok', 78),
(39, '', '', 'ok', 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
