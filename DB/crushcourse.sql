-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2021 at 01:42 PM
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
(11, 'Pre-rolled - brown', '2021-05-10 11:34:57', '2021-05-10 11:34:57'),
(12, 'Booklet - White', '2021-05-10 11:35:04', '2021-05-10 11:35:04'),
(13, 'Raw materials - paper', '2021-05-10 12:26:50', '2021-05-10 12:26:50'),
(14, 'Raw materials - polymer', '2021-05-10 12:26:57', '2021-05-10 12:26:57'),
(15, 'Stationary', '2021-05-10 12:27:14', '2021-05-10 12:27:14');

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
(13, 11, 'Bob Cones', 'Pcs', '2021-05-10 11:35:50', '2021-05-10 11:35:50'),
(15, 15, 'Fevi-Gum', 'Ml', '2021-05-10 12:27:45', '2021-05-10 12:36:00'),
(16, 14, 'Stopper', 'Pack', '2021-05-10 12:28:18', '2021-05-10 12:32:41'),
(17, 14, 'Packet', 'Gram', '2021-05-10 12:28:35', '2021-05-10 12:43:08'),
(18, 14, 'Straw', 'Pack', '2021-05-10 12:28:45', '2021-05-10 12:31:54'),
(19, 13, 'A4 Paper - whilte', 'Rims', '2021-05-10 12:29:13', '2021-05-10 12:29:13'),
(20, 13, 'A4 Paper - yellow', 'Pcs', '2021-05-10 12:29:26', '2021-05-10 12:29:26'),
(21, 13, 'Brown Paper - Ajanta', 'Kgram', '2021-05-10 12:29:45', '2021-05-10 12:47:30'),
(22, 12, '3 Patti', 'Pcs', '2021-05-15 00:58:12', '2021-05-15 00:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `stk_in` int(11) NOT NULL,
  `stk_out` int(11) NOT NULL,
  `reorder` int(11) DEFAULT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `pro_id`, `stk_in`, `stk_out`, `reorder`, `added`, `updated`) VALUES
(8, 14, 200, 102, 50, '2021-05-10 12:21:32', '2021-05-14 00:29:13'),
(9, 13, 12000, 872, 1000, '2021-05-10 12:21:55', '2021-05-15 22:43:02'),
(10, 15, 1000, 200, 200, '2021-05-10 12:35:49', '2021-05-10 12:36:15'),
(11, 16, 50, 0, 10, '2021-05-10 12:42:05', '2021-05-10 12:42:05'),
(12, 17, 1400, 0, 250, '2021-05-10 12:43:32', '2021-05-10 12:43:32'),
(13, 18, 10, 0, 5, '2021-05-10 12:44:08', '2021-05-10 12:44:08'),
(14, 19, 1, 0, 1, '2021-05-10 12:44:38', '2021-05-10 12:44:38'),
(15, 21, 10, 0, 2, '2021-05-10 12:45:16', '2021-05-10 12:45:16'),
(16, 20, 500, 0, 100, '2021-05-10 12:46:07', '2021-05-10 12:46:07'),
(17, 22, 2940, 18, 600, '2021-05-15 00:58:36', '2021-05-15 22:43:45');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
