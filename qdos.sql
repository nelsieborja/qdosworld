-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2015 at 11:25 AM
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
  `parent_category` int(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_category`, `name`, `updated`) VALUES
(1, NULL, 'computer hardware/software', '2015-07-07 13:30:45'),
(2, NULL, 'fashion, cosmetics & apparels', '2015-07-09 08:35:08'),
(3, NULL, 'furniture & home decor', '2015-07-09 08:35:33'),
(4, 3, 'kitchen ware', '2015-07-13 08:54:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `specs`, `price`, `discount`, `isoffer`, `images`, `updated`, `created`) VALUES
(2, 1, '3-Color Switch Backlight USB Wired Feel Gaming PC/Laptop Keyboard Teclado Gamer Computer Peripherals', '<b>Features:</b>\r\nCondition: New with tags\r\nConnect with computer:wired\r\nMaterial: silica gel\r\nThe interface type:USB\r\nWhether the mechanical keyboard:yes\r\nPresence of hand:yes\r\nWhether to support plug and play:support\r\nWhether to support the human body engineering:support\r\nWeight:200g\r\n\r\n<b>Package included:</b>\r\n1 x wired keyboard', 'Products Status: <b>Stock</b>\r\nStyle: <b>Gaming</b>\r\nType: <b>Wired</b>\r\nFull Size keyboard: <b>Yes</b>\r\nWrist Support: <b>No</b>\r\nPackage: <b>Yes</b>\r\nInterface Type: <b>USB</b>\r\nApplication: <b>Desktop,Laptop</b>\r\nModel Number: <b>12000070</b>\r\nis_customized: <b>Yes</b>', '200', '20', '0', '', '2015-07-12 13:16:21', '0000-00-00 00:00:00'),
(3, 1, 'Brand New 79Keys Mini Ultra Slim Portable USB Wired Keyboard for PC Computer Laptop Keyboard USB German', 'Features:\r\n- Stylish silver keyboard\r\n- Compact and ultra-slim designed\r\n- Features 79 keys\r\n- USB connection (120 cm-length)\r\n- Plug and play\r\n- Compatible with all the UMPC/MID/PPC/laptop and PC', 'is_customized: <b>Yes</b>\r\nProducts Status: <b>Stock</b>\r\nStyle: <b>Standard,Slim,German</b>\r\nType: <b>Wired</b>\r\nBrand Name: <b>other</b>\r\nPackage: <b>Yes</b>\r\nInterface Type: <b>USB</b>\r\nApplication: <b>Desktop,Laptop,Number,Tablet</b>\r\nModel Number: <b>10040-de</b>\r\nColor: <b>Same As picture show</b>\r\nBrand New: <b>100%</b>\r\nPlace of Origin: <b>China(Mainland)</b>\r\nFeatures: <b>79 keys</b>\r\nUSB connection: <b>120 cm-length</b>\r\nCompatible with: <b>all the UMPC/MID/PPC/laptop and PC</b>', '90.99', '', '0', 'keyboard.jpg,keyboard1.jpg', '2015-07-12 13:13:11', '0000-00-00 00:00:00'),
(4, 1, 'CPU cooler,2pcs 8025 fan, 2 heatpipe, tower side-blown, Intel LGA 775/1155/1156, AMD 754/940/AM2+/AM3/FM1/FM2,CPU radiator', '', '', '89', '40', '0', 'cooler1.jpg,cooler2.jpg', '2015-07-12 13:17:49', '0000-00-00 00:00:00'),
(5, 1, 'Lightweight Ultra Thin Portable USB Flexible Foldable Silent Silicon Keyboard', 'This Silicone Flexible Keyboard is highly portable and can be rolled up for Storage or Transportation.The soft silicone allows for silent typing, making it ideal for travel and many work environments.', '', '50.99', '', '0', 'sony-keyboard.jpg', '2015-07-09 08:46:48', '0000-00-00 00:00:00'),
(6, 3, 'test', 'test', '', '1', '', '0', '', '2015-07-11 13:51:27', '0000-00-00 00:00:00');

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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
