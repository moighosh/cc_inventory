-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2021 at 06:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crushcourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `added`, `updated`) VALUES
(2, 'Pre-rolled - brown', '2021-05-10 03:02:53', '2021-05-10 03:02:53'),
(3, 'Pre-rolled - white', '2021-05-10 03:03:07', '2021-05-10 03:03:07'),
(4, 'Non-rolled - white', '2021-05-10 03:03:22', '2021-05-10 07:21:08'),
(5, 'Non-rolled - brown', '2021-05-10 03:03:30', '2021-05-10 07:21:01'),
(8, 'Stationary', '2021-05-10 07:22:16', '2021-05-10 07:22:16'),
(9, 'Raw materials - paper', '2021-05-10 07:22:39', '2021-05-10 07:22:39'),
(10, 'Raw materials - polymer', '2021-05-10 07:22:49', '2021-05-10 07:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `product`, `unit`, `added`, `updated`) VALUES
(11, 2, 'Bob Cones', 'Pcs', '2021-05-10 08:39:40', '2021-05-10 08:43:58'),
(12, 4, 'Booklet - 3 Patti', 'Bndl', '2021-05-10 08:44:22', '2021-05-10 08:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `stk_in` int(11) NOT NULL,
  `stk_out` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `pro_id`, `stk_in`, `stk_out`, `reorder`, `added`, `updated`) VALUES
(1, 12, 850, 650, 25, '2021-05-10 09:15:43', '2021-05-10 09:38:06'),
(2, 11, 15000, 0, 1000, '2021-05-10 09:16:34', '2021-05-10 09:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `body`, `status`, `added`, `updated`) VALUES
(3, 'Test', 'This is a test.', 'OPEN', '2021-05-10 10:09:14', '2021-05-10 10:09:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
