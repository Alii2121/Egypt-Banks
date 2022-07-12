-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 08:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egypt_banks_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `benefit` int(11) NOT NULL,
  `min_amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `bank_name`, `name`, `type`, `benefit`, `min_amount`, `date`) VALUES
(1, 'CIB', 'Main Saving CIB', 'Savings account', 4, 1000, '2022-04-13 21:17:12'),
(2, 'BDC', 'Wafar', 'Savings account', 3, 0, '2022-06-27 11:33:02'),
(3, 'CIB', 'Smart Saving', 'Savings account', 4, 1, '2022-06-27 11:33:38'),
(5, 'CIB', 'Smart Saving 5 Years', 'Savings account', 6, 100, '2022-06-27 11:35:24'),
(6, 'NBE', 'Benefit Plus', 'Recurring deposit account', 0, 500, '2022-06-27 11:36:10'),
(7, 'NBE', 'Recurring', 'Recurring deposit account', 0, 500, '2022-06-27 11:37:43'),
(8, 'NBE', 'Normal Saving Quarterly ', 'Savings account', 5, 100, '2022-06-27 11:38:50'),
(9, 'CIB', 'Youth', 'Savings account', 1, 5000, '2022-06-27 11:40:58'),
(10, 'CIB', 'Easy Current', 'Recurring deposit account', 0, 0, '2022-06-27 11:41:31'),
(11, 'CIB', 'Premium Savers', 'Savings account', 6, 20000, '2022-06-27 11:42:59'),
(12, 'QNB', 'Youth Savings', 'Savings account', 2, 1000, '2022-06-27 11:43:43'),
(13, 'QNB', 'Current', 'Recurring deposit account', 0, 2500, '2022-06-27 11:44:14'),
(14, 'Alex Bank', 'Micro Savings', 'Savings account', 5, 500, '2022-06-27 11:46:23'),
(15, 'Alex Bank', 'Youth', 'Savings account', 5, 50, '2022-06-27 11:46:40'),
(16, 'Alex Bank', 'Alex GO', 'Recurring deposit account', 0, 500, '2022-06-27 11:47:08'),
(17, 'BDC', 'Current Plus', 'Recurring deposit account', 3, 5000, '2022-06-27 11:48:10'),
(18, 'BDC', 'Current', 'Recurring deposit account', 0, 1000, '2022-06-27 11:48:34'),
(19, 'BDC', 'Savings Monthly', 'Savings account', 3, 1000, '2022-06-27 11:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `bank_visits`
--

CREATE TABLE `bank_visits` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visit_time` varchar(100) NOT NULL,
  `visit_details` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_visits`
--

INSERT INTO `bank_visits` (`id`, `user_id`, `bank_name`, `client_phone`, `visit_date`, `visit_time`, `visit_details`, `date`) VALUES
(1, 1, 'NBE', '01002365212', '2022-04-12 01:28:50', '10 AM - 11 AM', 'visiting the customer service for some info', '2022-03-26 18:13:23'),
(5, 6, 'BDC', '01515151', '2022-05-07 22:00:00', '09 AM - 10 AM', 'dsfgas', '2022-06-27 16:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `grace_period` varchar(100) NOT NULL,
  `expenses` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `bank_name`, `name`, `type`, `grace_period`, `expenses`, `date`) VALUES
(1, 'QNB', 'Golden Card', 'Credit Card', '2 Weeks', 55, '2022-04-13 21:11:55'),
(3, 'NBE', 'Platinium', 'Credit Card', '2 Weeks', 250, '2022-06-26 19:27:23'),
(4, 'NBE', 'Master Card World', 'Credit Card', '2 Weeks', 1000, '2022-06-26 19:28:13'),
(5, 'CIB', 'Platinium', 'Credit Card', '2 Weeks', 150, '2022-06-26 19:29:08'),
(6, 'BDC', 'Titanium', 'Credit Card', '2 Weeks', 200, '2022-06-26 19:42:45'),
(7, 'Alex Bank', 'Platinium', 'Credit Card', '2 Months', 250, '2022-06-26 19:45:52'),
(8, 'Alex Bank', 'Platinium', 'Credit Card', '2 Months', 250, '2022-06-27 00:18:36'),
(9, 'BDC', 'Master Card Gold', 'Credit Card', '2 Months', 55, '2022-06-27 11:54:32'),
(10, 'BDC', 'Master Card Standard', 'Credit Card', '2 Months', 25, '2022-06-27 11:56:26'),
(11, 'NBE', 'Infinite', 'Credit Card', '2 Months', 100, '2022-06-27 11:57:42'),
(12, 'NBE', 'Prepaid Standard', 'Charge Card', '1 Week', 25, '2022-06-27 11:58:35'),
(13, 'QNB', 'Infinite', 'Credit Card', '2 Months', 50, '2022-06-27 12:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `annual_revenue` int(11) NOT NULL,
  `revenue_frequency` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `min_amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `bank_name`, `name`, `annual_revenue`, `revenue_frequency`, `period`, `min_amount`, `date`) VALUES
(1, 'NBE', 'Platinum 1 Year', 18, 'Every Month', '1 Year', 1000, '2022-04-12 22:20:05'),
(5, 'NBE', 'Certificate B', 8, 'Every 6 Months', '3 Years', 500, '2022-06-27 10:59:26'),
(7, 'BDC', 'Primo Extra', 14, 'Every 6 Months', '3 Years', 10000, '2022-06-27 11:09:25'),
(8, 'Alex Bank', 'Alex Star Plus', 14, 'Every Month', '3 Years', 1000, '2022-06-27 11:10:44'),
(9, 'Alex Bank', 'Alex Prime Gold', 7, 'Every Month', '3 Years', 500, '2022-06-27 11:13:25'),
(10, 'QNB', 'Quatro Certificate', 8, 'Every 3 Months', '5 Years', 1000, '2022-06-27 11:20:42'),
(11, 'QNB', '10 years monthly', 7, 'Every Month', '10 Years', 1000, '2022-06-27 11:23:04'),
(12, 'BDC', 'Primo Half Year', 11, 'Every 6 Months', '3 Years', 1000, '2022-06-27 11:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `treasuries`
--

CREATE TABLE `treasuries` (
  `id` bigint(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `treasury_num` int(11) NOT NULL,
  `treasury_price` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `treasury_details` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treasuries`
--

INSERT INTO `treasuries` (`id`, `bank_name`, `treasury_num`, `treasury_price`, `type`, `treasury_details`, `image`, `user_id`, `date`) VALUES
(1, 'NBE', 122, 200, 'For Rent', 'can fit multiple small things into in in the national bank of egypt', '16484926553.jpg', 1, '2022-03-28 18:37:52'),
(6, 'QNB', 61, 1400, 'For Rent', 'a large treasury that can fit a lot of things', '16484926553.jpg', 6, '2022-06-27 13:51:44'),
(8, 'BDC', 16, 600, 'For Sale', 'big safe', '16484917512.jpg', 0, '2022-03-28 18:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `phone`, `user_role`, `date`) VALUES
(1, 'John Hany', 'john.hany@test.com', '123', '01062315412', 'client', '2022-04-12 00:52:33'),
(2, 'admin', 'admin@banks.com', '1', '01225412300', 'admin', '2022-06-26 18:41:30'),
(5, 'ali', 'alimarawan2121@hotmail.com', '123', '54454584', 'admin', '2022-06-26 19:21:27'),
(6, 'AliMarwan', 'lito201056@hotmail.com', '123', '01144431681', 'client', '2022-06-27 13:48:34'),
(9, 'ahmed', 'ahmed144@yahoo.com', '123', '123456', 'client', '2022-06-27 16:48:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_visits`
--
ALTER TABLE `bank_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treasuries`
--
ALTER TABLE `treasuries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bank_visits`
--
ALTER TABLE `bank_visits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `treasuries`
--
ALTER TABLE `treasuries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
