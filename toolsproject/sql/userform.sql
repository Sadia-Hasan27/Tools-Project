-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userform`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
  `isAdmin` int(11) NOT NULL DEFAULT 0,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `usertable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `bookings` (
  
  `booking_id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
   `address` varchar(255) NOT NULL,
    `daddress` varchar(255) NOT NULL,
  `items` varchar(50) NOT NULL,
  `check_in` varchar(50) NOT NULL,
   `quantity` int(10) NOT NULL,
  `qty_type` varchar(70) NOT NULL
  `payment_method` text NOT NULL,
  `pay_status` varchar(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `user_id`
  ADD  KEY (`user_id`);


CREATE TABLE `admin` (
  
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
('EQYJaB96HcaTtxag6J7d', 'admin@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


CREATE TABLE `messages` (
  
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(1000) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `product` (
   `category_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  
  `price` int(11) NOT NULL,
  
  `total` int(11) NOT NULL,

   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `product`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
  ALTER TABLE `product`
  ADD PRIMARY KEY (`category_id`);


CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
 `number` varchar(10) NOT NULL,
 `user_address` varchar(255) NOT NULL,
  `deliver_address` varchar(255) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `qty_type` varchar(50) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;



CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);


CREATE TABLE `branches` (
   `id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
   `street` text NOT NULL,
    `city` text NOT NULL,
    `number` varchar(100) NOT NULL,
   `country` text NOT NULL,
   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `user_order` (
 `order_id` int(100) NOT NULL,
  `item_name` varchar(105) NOT NULL,
   `price` int(100) NOT NULL,
    `quantity` int(100) NOT NULL,
    


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `order_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


 CREATE TABLE `order_manager` (
 `order_id` int(100) NOT NULL,
  `name` varchar(105) NOT NULL,
   `phone` int(100) NOT NULL,
    `address` int(100) NOT NULL,
    `daddress` int(100) NOT NULL,
    `pay_mode` int(100) NOT NULL,

    


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
ALTER TABLE `order_manager`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

COMMIT;



