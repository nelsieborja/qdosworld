-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2015 at 05:13 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qdos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(10) NOT NULL,
  `signup_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(3) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(10) NOT NULL,
  `parent_category` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_category`, `name`, `url`, `updated`) VALUES
(1, NULL, 'dresses', 'dresses', '2015-07-27 07:46:25'),
(2, NULL, 'tops', 'tops', '2015-07-27 07:46:31'),
(3, NULL, 'bottoms', 'bottoms', '2015-07-27 07:46:37'),
(4, NULL, 'outwears', 'outwears', '2015-07-27 07:46:44'),
(5, NULL, 'watches & jewellery', 'watches-and-jewellery', '2015-07-27 07:47:02'),
(6, NULL, 'bags', 'bags', '2015-07-27 07:47:14'),
(7, NULL, 'sale', 'sale', '2015-07-27 07:47:20'),
(8, NULL, 'collection', 'collection', '2015-07-27 07:47:28'),
(9, 1, 'office dresses', 'office-dresses', '2015-07-27 07:47:49'),
(10, 1, 'party dresses', 'party-dresses', '2015-07-27 07:47:59'),
(11, 1, 'casual dresses', 'casual-dresses', '2015-07-27 07:48:10'),
(12, 1, 'maxi dresses', 'maxi-dresses', '2015-07-27 07:48:19'),
(13, 1, 'longer dresses', 'longer-dresses', '2015-07-27 07:48:27'),
(14, 1, 'play suits', 'play-suits', '2015-07-27 07:48:35'),
(15, 2, 'short sleeves', 'short-sleeves', '2015-07-27 07:48:42'),
(16, 2, 'long sleeves', 'long-sleeves', '2015-07-27 07:48:51'),
(17, 2, 'sleeveless', 'sleeveless', '2015-07-27 07:48:58'),
(18, 3, 'short', 'short', '2015-07-27 07:49:03'),
(19, 3, 'skirt', 'skirt', '2015-07-27 07:49:09'),
(20, 3, 'pants & legging', 'pants-and-legging', '2015-07-27 07:49:19'),
(21, 3, 'jeans', 'jeans', '2015-07-27 07:49:24'),
(22, 4, 'cardigans', 'cardigans', '2015-07-27 07:49:37'),
(23, 4, 'jackets', 'jackets', '2015-07-27 07:49:43'),
(24, 4, 'coats', 'coats', '2015-07-27 07:49:48'),
(25, 5, 'woman''s watches', 'woman-watches', '2015-07-27 07:50:01'),
(26, 5, 'man''s watches', 'man-watches', '2015-07-27 07:50:37'),
(27, 5, 'jewellery', 'jewellery', '2015-07-27 07:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `specs` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `discount` varchar(4) NOT NULL,
  `isoffer` enum('1','0') NOT NULL DEFAULT '0',
  `images` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `specs`, `price`, `discount`, `isoffer`, `images`, `updated`, `created`) VALUES
(1, 11, 'Hot Sell Casual Flower Printed Dress for Young Ladies', '1) Various material, colors and sizes can be customized.\r\n\r\nColors:  according to you request.\r\n2) Your logo or brand can be put on, suitable for advertising and promotion.\r\n3) Factory sales directly!\r\n\r\nCompetitive price! Top quality!\r\n4) Welcome of your design for making samples.\r\n5) Pls feel free to contact us for further details.\r\n6) Packing: According to you request.', '', '138', '', '0', 'Hot-Sell-Casual-Flower-Printed-Dress-for-Young-Ladies1.jpg,Hot-Sell-Casual-Flower-Printed-Dress-for-Young-Ladies2.jpg,Hot-Sell-Casual-Flower-Printed-Dress-for-Young-Ladies3.jpg,Hot-Sell-Casual-Flower-Printed-Dress-for-Young-Ladies4.jpg', '2015-07-27 11:11:55', '2015-07-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
`id` int(10) NOT NULL,
  `password` varchar(300) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `password`, `username`, `name`, `mobile`, `created`) VALUES
(1, '3rdSlkpzDuhN+UZ9/nBEmTTmboSCJQVkDs45NQo/VFvHm1+JMggP7Q+6rex69yHKV7x8p1li/UxyOXpUgSPsXQ==', 'nelsieborja@gmail.com', 'nelsie', '', '2015-07-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
