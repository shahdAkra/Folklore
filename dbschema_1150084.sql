-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2020 at 04:45 PM
-- Server version: 5.5.64-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c81_1150084_19`
--

-- --------------------------------------------------------



--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `list_price` decimal(10,0) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checkOuts`
--

CREATE TABLE IF NOT EXISTS `checkOuts` (
  `id` int(11) NOT NULL,
  `billingAddress` varchar(255) NOT NULL,
  `shippingAddress` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dueDate` date NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `cardNumber` int(255) NOT NULL,
  `expirationDate` varchar(255) NOT NULL,
  `ccv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('A','U') NOT NULL DEFAULT 'U'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `date_of_birth`, `id_number`, `email`, `phone`, `fax`, `password`, `role`) VALUES
(1, 'shahd', 'ramallah', '2019-04-14', 1150084, 'shahd-144@gmail.com', 598560335, 14587, '1234', 'U'),
(2, 'rania', 'palestine', '2013-05-02', 14852, 'rania@gmail.com', 5975145, 74582, '1111', 'U'),
(11, 'Ahmed', 'betunia', '2015-12-18', 55454, 'ahmed@gmail.com', 5464144, 5484888, '1358', 'U'),
(12, 'sami', 'palestine', '1992-04-18', 48722, 'sami@gmail.com', 67844874, 5487, '97854', 'U'),
(13, 'reem', 'betunia', '1999-03-03', 54498979, 'reem@gmail.com', 5482333, 10112, '4444', 'U'),
(14, 'lana', 'gaza', '1995-12-04', 4156987, 'lana@gmail.com', 258741, 14589, '12365', 'U'),
(16, 'mohammad', 'betunia', '1992-06-16', 14852, 'mohammad@gmail.com', 5975145, 74582, '1235', 'U'),
(17, 'abu-maher', 'maldiv', '2020-01-22', 45446546, 'abumaher@abc.com', 598560335, 14587, 'abumaher', 'U'),
(18, '', '', '0000-00-00', 0, 'admin@store.ps', 0, 0, 'hello', 'A');

-- --------------------------------------------------------



--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `order_date` date NOT NULL,
  `required_date` date NOT NULL,
  `shipped_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `list_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `list_price`, `image`, `description`) VALUES
(0, 'square soap', 3, '10.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/1.jpg', 'a very useful soap was made with love by  Palestenian hands from original olives oil and a beautiful perfumes were added so it gave the soap a very good smell it''s know as a good skin care soap, square shaped and that''s why it''s called square soap'),
(1, 'square soap', 3, '11.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/3.jpg', 'this soap with mint benefits in addition to it''s original special made with love by  Palestenian hands from original olives oil and a beautiful perfumes were added so it gave the soap a very good smell it''s know as a good skin care soap, square shaped and'),
(2, 'square soap', 3, '13.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/6.jpg', 'a very useful soap was made with love by  Palestenian hands from original olives oil and a beautiful perfumes were added so it gave the soap a very good smell it''s know as a good skin care soap, square shaped and that''s why it''s called square soap'),
(3, 'square soap', 3, '15.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/8.jpg', 'this soap with mint benefits in addition to it''s original special made with love by Palestenian hands from original olives oil and a beautiful perfumes were added so it gave the soap a very good smell it''s know as a good skin care soap, square shaped'),
(4, 'donat soap', 3, '15.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/4.jpg', 'be careful this lovely good smell donat soap is not for eat it''s made just with high quality from olives oil and other plants and flowers '),
(5, 'donat soap', 3, '15.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/10.jpg', 'the donat soap has a lot of benifits to your skin in addition to it''s shpae as it''s lovely good smell donat soap it''s made just with high quality from olives oil and other plants and flowers'),
(6, 'donat soap', 3, '13.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/11.jpg', 'a new donat soap palestenian high quality soap it''s exclusively colored in addition to make your skin smooth good smelled and happy skin'),
(7, 'embroiderd bag', 0, '17.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/emp/10.jpg', 'the beautiful shape of this embroideries dosen''t need a lot of explainations as it is made with palestenian hand an springs shaped togather to give it it''s palestenian shape'),
(8, 'embroidered bag', 0, '15.00', 'http://web1152896.studentswebprojects.ritaj.ps/webProject/images/emp/4.jpg', 'the beautiful shape of this embroideries dosen''t need a lot of explainations as it is made with palestenian hand an springs shaped togather to give it it''s palestenian shape');

-- --------------------------------------------------------


--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkOuts`
--
ALTER TABLE `checkOuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);




--
-- AUTO_INCREMENT for table `checkOuts`
--
ALTER TABLE `checkOuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
