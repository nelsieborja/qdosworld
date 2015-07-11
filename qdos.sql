-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2015 at 03:56 PM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `updated`) VALUES
(1, 'computer hardware/software', '2015-07-07 13:30:45'),
(2, 'fashion, cosmetics & apparels', '2015-07-09 08:35:08'),
(3, 'furniture & home decor', '2015-07-09 08:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcategory_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `specs` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `discount` varchar(4) NOT NULL,
  `isoffer` enum('1','0') NOT NULL DEFAULT '0',
  `images` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `subcategory_id`, `name`, `description`, `specs`, `price`, `discount`, `isoffer`, `images`, `updated`, `created`) VALUES
(1, 1, 0, 'brand new sealed FUJITSU hard drive', 'lorem ipsum', 'lorem ipsum dolor set amet', '100.40', '', '0', '1234567890.jpg,1234567891.jpg', '2015-07-09 07:54:00', '0000-00-00 00:00:00'),
(2, 1, 0, 'USB gaming keyboard', 'Brand VP-X9 105 Keys USB Wired Fashion 7 Color LED Backlight Gaming Keyboard Professional Computer Gamer Keyboard For Dota 2 LOL', '', '200', '20', '0', '', '2015-07-09 09:05:22', '0000-00-00 00:00:00'),
(3, 1, 0, 'Brand New 79Keys Mini Ultra Slim Portable USB Wired Keyboard', 'Features:\r\n- Features 79 keys\r\n- USB connection (120 cm-length)\r\n- Compatible with all the UMPC/MID/PPC/laptop and PC', '', '90.99', '', '0', 'keyboard.jpg', '2015-07-09 08:40:41', '0000-00-00 00:00:00'),
(4, 1, 0, 'CPU cooler', 'CPU cooler,2pcs 8025 fan, 2 heatpipe, tower side-blown, Intel LGA 775/1155/1156, AMD 754/940/AM2+/AM3/FM1/FM2,CPU radiator', '', '89', '40', '0', 'cooler1.jpg,cooler2.jpg', '2015-07-09 08:56:53', '0000-00-00 00:00:00'),
(5, 1, 0, 'Lightweight Ultra Thin Portable USB Flexible Foldable Silent Silicon Keyboard', 'This Silicone Flexible Keyboard is highly portable and can be rolled up for Storage or Transportation.The soft silicone allows for silent typing, making it ideal for travel and many work environments.', '', '50.99', '', '0', 'sony-keyboard.jpg', '2015-07-09 08:46:48', '0000-00-00 00:00:00'),
(6, 3, 2, 'test', 'test', '', '1', '', '0', '', '2015-07-11 13:51:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
`id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `name`, `updated`) VALUES
(2, 3, 'kitchen ware', '2015-07-09 10:00:23');

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
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
