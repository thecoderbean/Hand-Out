-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 05:23 PM
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
-- Database: `handout`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'bestin_s_jorly', '$2y$10$GUd.6Cz1mN93Zep.fxiKHuiaZu4eMxJgHQbefU4BI6zlVQT3REGIy', '2023-07-08 12:46:24.026687');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(200) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `from_id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `to_id` int(200) NOT NULL DEFAULT 0,
  `thump` varchar(2000) NOT NULL,
  `status` varchar(2000) NOT NULL DEFAULT 'NA',
  `d_id` int(100) NOT NULL DEFAULT 0,
  `address` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `name`, `description`, `from_id`, `email`, `phone`, `to_id`, `thump`, `status`, `d_id`, `address`) VALUES
(14, 'Backpack 22L', 'Bag is at good condition and they are from american one year use onlytouster and it was my favorite', 1, 'bestin.s.jorly@gmail.com', 2147483647, 0, '../donate/bag.jpg', 'NOT ASSIGNED', 1, ''),
(16, 'Feemale Dress', 'Dress is at good condition and they contain imprint from the movie iron man and it was my favorite', 1, 'bestin.s.jorly@gmail.com', 2147483647, 0, '../donate/cloth1.jpeg', 'NOT ASSIGNED', 1, ''),
(17, 'toy for girls', 'toy is at good condition and they contain imprint from the movie barbie and it was my favorite', 1, 'smeone@gmail.com', 2147483647, 0, '../donate/barbie.jpeg', 'NOT ASSIGNED', 1, ''),
(18, 'toy for boys', 'toy is at good condition and they contain imprint from the movie minion and it was my favorite', 1, 'bestin.s.jorly@gmail.com', 2147483647, 0, '../donate/minion.jpeg', 'NOT ASSIGNED', 1, ''),
(19, 'books new', 'book is new and they contain a pack of 10 books which are fresh and not used', 1, 'bestin.s.jorly@gmail.com', 2147483647, 0, '../donate/book.jpg', 'Delivered', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `d_id` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`id`, `r_id`, `d_id`, `timestamp`) VALUES
(6, 1, '14', '2023-07-10 09:46:43'),
(7, 1, '16', '2023-07-12 08:58:25'),
(8, 3, '16', '2023-07-12 08:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) NOT NULL,
  `use_by` datetime(6) NOT NULL,
  `from_username` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_discription` varchar(1000) NOT NULL,
  `pick_up` varchar(100) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `use_by`, `from_username`, `item_name`, `item_discription`, `pick_up`, `Status`, `timestamp`) VALUES
(1, '2023-07-12 00:00:00.000000', 'ANONYMOUS', 'Biriyani', 'Biriyani left over about 100 plates available from my sisters wedding', 'Selex land palayamkunnu po varkala', '', '2023-07-12 09:09:22.902448'),
(2, '2023-07-20 00:00:00.000000', 'ANONYMOUS', 'porotta available', '1200 poratta left of from my shop is avilable to pick up', 'Selex land palayamkunnu po varkala', '', '2023-07-12 09:09:47.646484');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'bestin_s_jorly', '$2y$10$533I9f3kbXgy0yukR.uIiu9lIhQ1CTOS1zGyevvZitx1zq5AaZEdm', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `r_id` int(10) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`id`, `name`, `description`, `phone`, `r_id`, `timestamp`) VALUES
(1, 'in need of a whelchair', 'im am handicaped and i need a wheel chair', '735135610', 1, '2023-07-10 07:38:40.026197'),
(3, 'in need of a whelchair', 'im am handicaped and i need a wheel chair', '735135610', 1, '2023-07-10 07:39:28.557488'),
(5, 'in need of a whelchair', 'im am handicaped and i need a wheel chair', '735135610', 1, '2023-07-10 07:40:03.373432');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `approve` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `username`, `password`, `pin`, `address`, `phone`, `email`, `time`, `approve`) VALUES
(1, 'the_coder_bean', '$2y$10$U0kRVouNpQ6Bw1XkVEYET.jnddgAmi/E7mxCHBXAH7.kjOOl2BMQW', '695146', 'Selex land palayamkunnu po varkala', '7356135610', 'bestin.s.jorly@gmail.com', '2023-07-12 15:22:15.375042', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'bestin_s_jorly', '$2y$10$533I9f3kbXgy0yukR.uIiu9lIhQ1CTOS1zGyevvZitx1zq5AaZEdm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
