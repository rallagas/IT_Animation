-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2023 at 09:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample1`
--

-- --------------------------------------------------------

--
-- Table structure for table `multi_order`
--

CREATE TABLE `multi_order` (
  `order_step_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multi_order`
--

INSERT INTO `multi_order` (`order_step_id`, `step_id`, `ingredient_id`, `user_id`, `order_qty`, `date_ordered`) VALUES
(4, 5, 1, 3, 100, '2023-11-15 06:34:47'),
(5, 5, 2, 3, 100, '2023-11-15 06:34:47'),
(6, 5, 1, 3, 1000, '2023-11-15 06:37:56'),
(7, 5, 1, 3, 2, '2023-11-15 07:46:20'),
(8, 5, 2, 3, 2, '2023-11-15 07:46:20'),
(9, 5, 3, 3, 2, '2023-11-15 07:46:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multi_order`
--
ALTER TABLE `multi_order`
  ADD PRIMARY KEY (`order_step_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multi_order`
--
ALTER TABLE `multi_order`
  MODIFY `order_step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
