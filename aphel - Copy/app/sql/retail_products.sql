-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 03:49 AM
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
-- Table structure for table `retail products`
--

CREATE TABLE `retail products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `shopid` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `serial id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `amount sold` varchar(255) NOT NULL DEFAULT '0',
  `amount spent` varchar(255) NOT NULL,
  `stock price` varchar(255) NOT NULL,
  `product revenue` varchar(255) NOT NULL,
  `losses` varchar(255) NOT NULL DEFAULT '0',
  `rights` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retail products`
--

-- Indexes for dumped tables
--

--
-- Indexes for table `retail products`
--
ALTER TABLE `retail products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `retail products`
--
ALTER TABLE `retail products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4449;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
