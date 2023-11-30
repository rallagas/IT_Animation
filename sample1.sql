-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2023 at 09:42 AM
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
(1, 'Thin Crust', 1, '100.00', 'Super Thin Crispy Crust', 'thin_crust.jpeg'),
(2, 'Thick Crust', 1, '80.00', 'an Inch of Crust', 'thick_crust.jpeg'),
(3, 'Plain Pizza Dough', 1, '50.00', 'Plain only', 'plain_crust.jpeg'),
(4, 'Salsa Sauce', 2, '40.00', 'Salsa Sauce', ''),
(5, 'Cheezy Sauce', 2, '50.00', 'Sauce made of Cheese Fondue', ''),
(6, 'Pesto Sauce', 2, '70.00', 'Green Sauce', ''),
(7, 'Olives', 3, '20.00', 'Sliced Olives', ''),
(8, 'Pepperoni', 3, '30.00', 'Meaty Toppings', ''),
(9, 'Chorizo', 3, '50.00', 'Sliced Meat Sausage', ''),
(10, 'Four Cheese', 3, '100.00', 'made of Mozzarella, Parmegiano Reggiano, Eden Cheese, Blue Cheese', ''),
(11, 'Coca-Cola', 4, '30.00', 'Coca-Cola Soda', ''),
(12, 'All Purpose Dough', 1, '10.00', 'Harina', 'pesto_crust.jpeg'),
(13, 'Sprite', 4, '30.00', 'Sprite lemon Soda', ''),
(14, 'None', 4, '0.00', 'Skip Add Ons', ''),
(15, 'Royal Tru Orange', 4, '30.00', 'Orange', ''),
(16, 'Pesto Dough', 1, '200.00', 'Yucky', 'Overnight Sourdough Herb Pizza Crust.jpeg'),
(18, 'Cheezy Dough', 1, '90.00', 'madaming cheese', 'Cheezy Dough.jpeg'),
(19, 'Pineapple Dough', 1, '300.00', 'pinya yuck', 'Pineapple Dough.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `multi_order`
--

CREATE TABLE `multi_order` (
  `order_step_id` int(11) NOT NULL,
  `order_reference_number` varchar(8) DEFAULT NULL,
  `order_status` varchar(1) NOT NULL DEFAULT 'P',
  `step_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multi_order`
--

INSERT INTO `multi_order` (`order_step_id`, `order_reference_number`, `order_status`, `step_id`, `ingredient_id`, `user_id`, `order_qty`, `date_ordered`) VALUES
(1, '0M8G3X6J', 'P', 5, 4, 10, 1, '2023-11-30 08:36:09'),
(2, '0M8G3X6J', 'P', 5, 6, 10, 1, '2023-11-30 08:36:09'),
(3, '0M8G3X6J', 'P', 5, 8, 10, 1, '2023-11-30 08:36:09'),
(4, '0M8G3X6J', 'P', 5, 10, 10, 1, '2023-11-30 08:36:09'),
(5, '0M8G3X6J', 'P', 5, 13, 10, 1, '2023-11-30 08:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `step1` int(11) NOT NULL,
  `step2` int(11) NOT NULL,
  `step3` int(11) NOT NULL,
  `step4` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` varchar(1) NOT NULL DEFAULT 'P',
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `step_id` int(11) NOT NULL,
  `step_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`step_id`, `step_description`) VALUES
(1, 'Step 1: Pick your Crust'),
(2, 'Step 2: Pick your Sauce'),
(3, 'Step 3: Pick your Toppings'),
(4, 'Step 4: Add Ons');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'U' COMMENT 'U = User, A = Admin',
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A - Active\r\nI - Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `user_address`, `user_type`, `status`) VALUES
(1, 'test', '1234', 'TEST', 'Polangui Albay', 'A', 'A'),
(10, 'rllagas', '1234', 'Reymar Llagas', 'Polangui ALbay', 'U', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `multi_order`
--
ALTER TABLE `multi_order`
  ADD PRIMARY KEY (`order_step_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`step_id`);

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
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `multi_order`
--
ALTER TABLE `multi_order`
  MODIFY `order_step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
