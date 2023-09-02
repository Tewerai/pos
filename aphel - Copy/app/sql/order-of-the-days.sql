-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 03:47 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blueicho_try`
--

-- --------------------------------------------------------

--
-- Table structure for table `order-of-the-days`
--

CREATE TABLE `order-of-the-days` (
  `id` int NOT NULL,
  `order` varchar(255) NOT NULL,
  `shopid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order-of-the-days`
--

INSERT INTO `order-of-the-days` (`id`, `order`, `shopid`, `date`) VALUES
(1, '1', 'rest@me.com', 'Saturday 10th of September 2022'),
(2, '1', 'rest@me.com', 'Tuesday 13th of September 2022'),
(3, '1', 'rest@me.com', 'Monday 3rd of October 2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order-of-the-days`
--
ALTER TABLE `order-of-the-days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order-of-the-days`
--
ALTER TABLE `order-of-the-days`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
