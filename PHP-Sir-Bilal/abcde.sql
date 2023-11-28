-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 07:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcde`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `c_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `u_id`, `p_qty`, `c_total`) VALUES
(1, 1, 1, 3, 0),
(2, 1, 1, 2, 30000),
(3, 1, 1, 5, 75000),
(4, 1, 1, 5, 75000),
(5, 2, 1, 4, 4800),
(6, 1, 1, 6, 90000),
(7, 1, 1, 2, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `l_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `l_name`, `l_pass`) VALUES
(1, 'bilal', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`) VALUES
(1, 'nokia', 15000),
(2, 'audionic earbuds', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `vvv`
--

CREATE TABLE `vvv` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(150) NOT NULL,
  `u_email` varchar(150) NOT NULL,
  `u_dob` date NOT NULL,
  `p_img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vvv`
--

INSERT INTO `vvv` (`u_id`, `u_name`, `u_email`, `u_dob`, `p_img`) VALUES
(1, 'talha', 'talha@gmailyahoo.com', '2023-06-06', ''),
(2, 'talhabinghous', 'talhabinghous@gmailyahoo.com', '2023-06-04', '70ecdbf7e9219a149c94e27bf59a5c5b.jpg'),
(3, 'talhabinmaaz', 'talha@gmailyahoo.com', '2023-06-06', 'backblue.gif'),
(4, 'bilal ki wife', 'talha@gmailyahoo.com', '2023-06-30', '70ecdbf7e9219a149c94e27bf59a5c5b.jpg'),
(5, 'talha', 'talha@gmailyahoo.com', '2023-06-29', 'C:xampp	mpphpE15D.tmp'),
(6, 'talhabinmaaz', 'talha@gmailyahoo.com', '2023-01-18', 'C:xampp	mpphp4DB1.tmp'),
(7, 'talhabinmaaz', 'talhabinghous@gmailyahoo.com', '2023-01-11', 'C:xampp	mpphp1C96.tmp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `vvv`
--
ALTER TABLE `vvv`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vvv`
--
ALTER TABLE `vvv`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `login` (`l_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
