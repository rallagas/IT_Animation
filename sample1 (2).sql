-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2023 at 10:17 AM
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
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(100) NOT NULL,
  `step_id` int(11) NOT NULL,
  `price_amt` decimal(6,2) NOT NULL,
  `ingredient_description` text NOT NULL,
  `ingredient_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `ingredient_name`, `step_id`, `price_amt`, `ingredient_description`, `ingredient_img`) VALUES
(1, 'Thin Crust', 1, '100.00', 'Super Thin Crispy Crust', ''),
(2, 'Thick Crust', 1, '80.00', 'an Inch of Crust', ''),
(3, 'Plain Pizza Dough', 1, '50.00', 'Plain only', ''),
(4, 'Salsa Sauce', 2, '40.00', 'Salsa Sauce', ''),
(5, 'Cheezy Sauce', 2, '50.00', 'Sauce made of Cheese Fondue', ''),
(6, 'Pesto Sauce', 2, '70.00', 'Green Sauce', ''),
(7, 'Olives', 3, '20.00', 'Sliced Olives', ''),
(8, 'Pepperoni', 3, '30.00', 'Meaty Toppings', ''),
(9, 'Chorizo', 3, '50.00', 'Sliced Meat Sausage', ''),
(10, 'Four Cheese', 3, '100.00', 'made of Mozzarella, Parmegiano Reggiano, Eden Cheese, Blue Cheese', ''),
(11, 'Coca-Cola', 4, '30.00', 'Coca-Cola Soda', ''),
(12, 'All Purpose Dough', 1, '10.00', 'Harina', ''),
(13, 'Sprite', 4, '30.00', 'Sprite lemon Soda', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `step1` int(11) NOT NULL,
  `step2` int(11) NOT NULL,
  `step3` int(11) NOT NULL,
  `step4` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` varchar(1) NOT NULL DEFAULT 'P',
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `step1`, `step2`, `step3`, `step4`, `user_id`, `quantity`, `order_status`, `date_ordered`) VALUES
(1, 1, 4, 9, 11, 3, 10, 'P', '2023-11-13 07:44:42'),
(2, 1, 6, 7, 11, 9, 1, 'D', '2023-11-13 07:46:38'),
(3, 2, 4, 7, 11, 9, 30, 'P', '2023-11-13 08:24:04'),
(4, 1, 6, 7, 11, 9, 1, 'C', '2023-11-13 08:25:03'),
(5, 2, 4, 7, 11, 9, 1, 'P', '2023-11-13 14:35:07'),
(6, 1, 4, 7, 11, 9, 1, 'X', '2023-11-13 14:38:55'),
(7, 2, 6, 7, 11, 9, 1, 'P', '2023-11-13 14:49:04'),
(8, 1, 5, 10, 11, 9, 3, 'P', '2023-11-13 19:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'U' COMMENT 'U = User, A = Admin',
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A - Active\r\nI - Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `user_type`, `status`) VALUES
(1, 'test', '1234', 'TEST', 'A', 'A'),
(2, 'Luffy', '12345', 'MONKEY D LUFFY', 'U', 'A'),
(3, 'rallagas', '1234', 'Reymar Llagas', 'U', 'A'),
(4, 'test_2', '1234', 'madlang tuta', 'U', 'A'),
(5, 'aklsjdlkasjdkl', '12345', 'jasdkjalksdj', 'U', 'A'),
(6, 'test123123', '1234', 'test123', 'U', 'A'),
(7, 'lawcutie123', '12345', 'Trafalgar Law', 'U', 'A'),
(8, 'croco', '1234', 'Croco Dile', 'U', 'A'),
(9, 'aqua', '1234', 'Aquaflask', 'U', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
