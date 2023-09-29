-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 11:49 AM
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
-- Database: `restorant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varbinary(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Kaleb', 0x6636643463333638326237356662303631623432633135343731323331393065),
(10, 'Abeselom', 0x3933323739653333303862646262656564393436666339363530313766363761),
(11, 'Ayele', 0x3933323739653333303862646262656564393436666339363530313766363761),
(16, 'Kala', 0x3933323739653333303862646262656564393436666339363530313766363761);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` int(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagorylist`
--

CREATE TABLE `catagorylist` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagorylist`
--

INSERT INTO `catagorylist` (`id`, `name`, `image_name`) VALUES
(10, 'food', '../img/category/gallery-1.jpg'),
(12, 'drink', '../img/category/gallery-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `phone`, `address`) VALUES
(37, 'he', 'he', '9331624434', 'bole'),
(38, 'abi', 'abi', '9133863922', 'bole'),
(39, 'abb', 'fff', '9163760666', 'bole'),
(40, 'abb', 'ayele', '9133863922', 'bole'),
(41, 'am', 'am', '9163760666', 'bole'),
(42, 'abeselom', 'Dejene', '9420747788', 'bole'),
(43, 'kalid', 'kalid', '0933162443', 'bole'),
(44, 'abbb', 'abbb', '0933162443', 'bole'),
(45, 'kebede', 'ayele', '0933162443', 'bole'),
(46, 'kkk', 'kkkk', '0933162443', 'bole'),
(47, 'kaleb', 'wondimu', '0933162443', 'bole'),
(48, 'llll', 'llll', '0933162443', 'bole'),
(49, 'alex', 'alex', '0933162443', 'bole');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `price`, `category_id`, `image`) VALUES
(2, 'pizza', 'special pizza', 400, 10, '../img/foodgallery-10.jpg'),
(5, 'burger', 'special burger', 300, 10, '../img/food/gallery-11.jpg'),
(6, 'fried chiken', 'fried chiken with best test', 500, 10, '../img/food/fried.jpg'),
(7, 'choko', 'choko shake with delicious test', 150, 12, '../img/food/juice-cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `item_image` varchar(25) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_total` int(11) NOT NULL,
  `grant_total` int(11) NOT NULL,
  `order_status` varchar(25) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date_and_time`, `item_name`, `item_image`, `item_price`, `item_quantity`, `item_total`, `grant_total`, `order_status`) VALUES
(24, 37, '0000-00-00 00:00:00', 'pizza', '../img/foodgallery-10.jpg', 400, 1, 400, 400, 'pending'),
(25, 37, '0000-00-00 00:00:00', 'burger', '../img/food/gallery-11.jp', 300, 15, 4500, 4900, 'pending'),
(26, 37, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 2, 1000, 5900, 'pending'),
(27, 38, '0000-00-00 00:00:00', 'pizza', '../img/foodgallery-10.jpg', 400, 1, 400, 400, 'pending'),
(28, 38, '0000-00-00 00:00:00', 'burger', '../img/food/gallery-11.jp', 300, 16, 4800, 4800, 'pending'),
(29, 38, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 2, 1000, 1000, 'pending'),
(30, 39, '0000-00-00 00:00:00', 'pizza', '../img/foodgallery-10.jpg', 400, 1, 400, 400, 'pending'),
(31, 39, '0000-00-00 00:00:00', 'burger', '../img/food/gallery-11.jp', 300, 18, 5400, 5400, 'pending'),
(32, 39, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 2, 1000, 1000, 'pending'),
(33, 40, '0000-00-00 00:00:00', 'pizza', '../img/foodgallery-10.jpg', 400, 1, 400, 400, 'pending'),
(34, 40, '0000-00-00 00:00:00', 'burger', '../img/food/gallery-11.jp', 300, 19, 5700, 5700, 'pending'),
(35, 40, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 2, 1000, 1000, 'pending'),
(36, 41, '0000-00-00 00:00:00', 'pizza', '../img/foodgallery-10.jpg', 400, 1, 400, 400, 'pending'),
(37, 41, '0000-00-00 00:00:00', 'burger', '../img/food/gallery-11.jp', 300, 21, 6300, 6700, 'accepted'),
(38, 41, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 2, 1000, 7700, 'pending'),
(39, 42, '0000-00-00 00:00:00', 'burger', '../img/food/gallery-11.jp', 300, 1, 300, 300, 'pending'),
(40, 43, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 1, 500, 500, 'pending'),
(41, 44, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 1, 500, 500, 'pending'),
(42, 44, '0000-00-00 00:00:00', 'pizza', '../img/foodgallery-10.jpg', 400, 2, 800, 1300, 'pending'),
(43, 45, '0000-00-00 00:00:00', 'choko', '../img/food/juice-cover.j', 150, 1, 150, 150, 'pending'),
(44, 46, '0000-00-00 00:00:00', 'choko', '../img/food/juice-cover.j', 150, 1, 150, 150, 'pending'),
(45, 47, '0000-00-00 00:00:00', 'choko', '../img/food/juice-cover.j', 150, 1, 150, 150, 'pending'),
(46, 48, '0000-00-00 00:00:00', 'choko', '../img/food/juice-cover.j', 150, 1, 150, 150, 'pending'),
(47, 49, '0000-00-00 00:00:00', 'fried chiken', '../img/food/fried.jpg', 500, 1, 500, 500, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_cart_fk` (`customer_id`),
  ADD KEY `menu_cart_fk` (`menu_id`);

--
-- Indexes for table `catagorylist`
--
ALTER TABLE `catagorylist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk_order` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagorylist`
--
ALTER TABLE `catagorylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer_cart_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_cart_fk` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `catagorylist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_fk_order` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
