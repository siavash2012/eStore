-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: sdb-t.hosting.stackcp.net
-- Generation Time: Mar 25, 2022 at 02:38 PM
-- Server version: 10.4.22-MariaDB-log
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore-3230388f1d`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE `customer_accounts` (
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `street_number` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(10) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`first_name`, `last_name`, `street_number`, `address`, `email`, `city`, `postal_code`, `country`, `password`) VALUES
('Siavash', 'Khalaj', '1234', 'Example Street West', 'example@example.com', 'Ottawa', 'K2B567', 'Canada', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `email` varchar(20) NOT NULL,
  `order_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`email`, `order_number`) VALUES
('example@example.com', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `item_name` varchar(20) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `order_currency` varchar(3) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`item_name`, `order_date`, `item_quantity`, `order_total`, `order_currency`, `id`, `order_number`) VALUES
('Lego', '2022-02-05', 1, 100, 'USD', 1, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_name` varchar(20) NOT NULL,
  `product_price` double DEFAULT NULL,
  `product_image_url` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_name`, `product_price`, `product_image_url`, `category`, `keywords`) VALUES
('car', 25, 'productImages/toycar.jpg', 'toys', 'car toys kids entertainment play hobby child'),
('chair', 300, 'productImages/chair.png', 'household', 'chair furniture household office home'),
('java', 130, 'productImages/java.png', 'books', 'java book programming learn educational college university computer'),
('laptop', 3500, 'productImages/laptop.png', 'electronics', 'laptop electronics office computer pc computing windows'),
('lego', 100, 'productImages/lego-time100-companies.jpg', 'toys', 'lego toys kid fun game entertainment child creativity'),
('microwave', 550, 'productImages/microwave.png', 'electronics', 'electronics microwave kitchen appliance oven food electric'),
('puzzle', 35, 'productImages/puzzle.png', 'toys', 'puzzle toys kids entertainment deal off sale children hobby'),
('python', 85, 'productImages/python.png', 'books', 'python books programming learning computer college pc'),
('table', 150, 'productImages/table.png', 'household', 'table furniture household dining home'),
('toaster', 175, 'productImages/toaster.png', 'household', 'toaster sale household kitchen bread dining deal off');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12418;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_number`) REFERENCES `customer_orders` (`order_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
