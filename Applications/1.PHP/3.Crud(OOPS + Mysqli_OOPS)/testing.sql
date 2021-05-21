-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 06:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `citytable`
--

CREATE TABLE `citytable` (
  `id` int(11) NOT NULL,
  `cityName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citytable`
--

INSERT INTO `citytable` (`id`, `cityName`) VALUES
(1, 'patiala'),
(2, 'punjab');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `age`, `city`) VALUES
(1, 'Deepinder Singh', 27, 'a'),
(15, 'Inderdeep Singh', 20, 'Patiala'),
(3, 'Noni', 21, 'b'),
(14, 'Inderdeep Singh', 20, 'Patiala'),
(13, 'Inderdeep Singh', 20, 'Patiala'),
(12, 'Inderdeep Singh', 20, 'Patiala'),
(7, 'Bhasin', 21, 'c'),
(11, 'Inderdeep Singh', 20, 'Patiala'),
(9, 'ok', 21, 'punjab'),
(16, 'Inderdeep Singh', 20, 'Patiala'),
(17, 'Inderdeep Singh', 20, 'Patiala'),
(18, 'Inderdeep Singh', 20, 'Patiala'),
(19, 'Inderdeep Singh', 20, 'Patiala'),
(20, 'Inderdeep Singh', 20, 'Patiala'),
(21, 'Inderdeep Singh', 20, 'Patiala'),
(22, 'Inderdeep Singh', 20, 'Patiala'),
(23, 'Inderdeep Singh', 20, 'Patiala'),
(24, 'Inderdeep Singh', 20, 'Patiala'),
(25, 'Inderdeep Singh', 20, 'Patiala'),
(26, 'Inderdeep Singh', 20, 'Patiala'),
(27, 'Inderdeep Singh', 20, 'Patiala'),
(28, 'Inderdeep Singh', 20, 'Patiala'),
(29, 'Inderdeep Singh', 20, 'Patiala'),
(30, 'Inderdeep Singh', 20, 'Patiala'),
(31, 'Inderdeep Singh', 20, 'Patiala'),
(32, 'Inderdeep Singh', 20, 'Patiala'),
(33, 'Inderdeep Singh', 20, 'Patiala'),
(34, 'Inderdeep Singh', 20, 'Patiala'),
(35, 'Inderdeep Singh', 20, 'Patiala'),
(36, 'Inderdeep Singh', 20, 'Patiala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citytable`
--
ALTER TABLE `citytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citytable`
--
ALTER TABLE `citytable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
