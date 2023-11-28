-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 07:49 PM
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
-- Database: `grocee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `Admin_Id` int(11) NOT NULL,
  `Admin_Name` varchar(100) DEFAULT NULL,
  `Admin_Email` varchar(100) DEFAULT NULL,
  `Admin_Password` varchar(100) DEFAULT NULL,
  `Admin_Image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`Admin_Id`, `Admin_Name`, `Admin_Email`, `Admin_Password`, `Admin_Image`) VALUES
(1, 'Ismail', 'Ismail@123', 'ismail123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(100) DEFAULT NULL,
  `Category_Img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Category_Name`, `Category_Img`) VALUES
(10, 'Mobile1', 'admin/Image_Categories/Jellyfish.jpg'),
(11, 'Leptop123', 'admin/Image_Categories/Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `discount_product`
--

CREATE TABLE `discount_product` (
  `Discount_Product_Id` int(11) NOT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `Selling_Price` int(11) DEFAULT NULL,
  `Product_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount_product`
--

INSERT INTO `discount_product` (`Discount_Product_Id`, `Start_Date`, `End_Date`, `Selling_Price`, `Product_Id`) VALUES
(4, '2022-09-13', '2022-09-14', 50009, 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `Order_Codes` int(11) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Total_Amount` int(11) DEFAULT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Payment_Method` varchar(100) DEFAULT NULL,
  `Order_Status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_Codes` int(11) NOT NULL,
  `Order_Id` int(11) DEFAULT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `simple_products`
--

CREATE TABLE `simple_products` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(200) DEFAULT NULL,
  `Product_Price` int(11) DEFAULT NULL,
  `Product_Main_Picture` varchar(200) DEFAULT NULL,
  `Product_sub_img_1` varchar(200) DEFAULT NULL,
  `Product_sub_img_2` varchar(200) DEFAULT NULL,
  `Product_sub_img_3` varchar(200) DEFAULT NULL,
  `Product_sub_img_4` varchar(200) DEFAULT NULL,
  `Product_sub_img_5` varchar(200) DEFAULT NULL,
  `Product_Des` varchar(500) DEFAULT NULL,
  `Available_Stock` int(11) DEFAULT NULL,
  `Category_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `simple_products`
--

INSERT INTO `simple_products` (`Product_Id`, `Product_Name`, `Product_Price`, `Product_Main_Picture`, `Product_sub_img_1`, `Product_sub_img_2`, `Product_sub_img_3`, `Product_sub_img_4`, `Product_sub_img_5`, `Product_Des`, `Available_Stock`, `Category_Id`) VALUES
(11, 'nerwer', 454563, 'admin/Main_Image/Hydrangeas.jpg', NULL, NULL, NULL, NULL, NULL, 'werwerwerwe r', 5666, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `discount_product`
--
ALTER TABLE `discount_product`
  ADD PRIMARY KEY (`Discount_Product_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_Codes`);

--
-- Indexes for table `simple_products`
--
ALTER TABLE `simple_products`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `discount_product`
--
ALTER TABLE `discount_product`
  MODIFY `Discount_Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_Codes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simple_products`
--
ALTER TABLE `simple_products`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discount_product`
--
ALTER TABLE `discount_product`
  ADD CONSTRAINT `discount_product_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `simple_products` (`Product_Id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `simple_products`
--
ALTER TABLE `simple_products`
  ADD CONSTRAINT `simple_products_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `categories` (`Category_Id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
