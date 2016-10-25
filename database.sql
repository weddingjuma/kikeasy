-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 05:51 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `n_id` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

CREATE TABLE IF NOT EXISTS `deliver` (
`id` int(11) NOT NULL,
  `deliver_id` varchar(10) NOT NULL,
  `vehicle_num` varchar(8) NOT NULL,
  `vo_name` varchar(55) NOT NULL,
  `p_number` int(10) NOT NULL,
  `v_route` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deliver_product`
--

CREATE TABLE IF NOT EXISTS `deliver_product` (
`id` int(11) NOT NULL,
  `deliver_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `d_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `warranty` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
`id` int(11) NOT NULL,
  `card_id` varchar(10) NOT NULL,
  `n_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_id` varchar(55) NOT NULL,
  `r_total` decimal(10,2) NOT NULL,
  `advance` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL,
  `rent_date` date NOT NULL,
  `route` varchar(100) NOT NULL,
  `referee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
`id` int(11) NOT NULL,
  `return_id` int(6) NOT NULL,
  `sale_type` varchar(10) NOT NULL,
  `cusnid` varchar(55) NOT NULL,
  `rent_sale_id` varchar(10) NOT NULL,
  `rproductid` varchar(10) NOT NULL,
  `route` varchar(100) NOT NULL,
  `contact_num` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `note` varchar(255) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
`id` int(11) NOT NULL,
  `sale_id` int(8) NOT NULL,
  `n_id` varchar(10) NOT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_number` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `bill_total` decimal(10,2) NOT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_more`
--

CREATE TABLE IF NOT EXISTS `sale_more` (
`id` int(11) NOT NULL,
  `sale_id` int(8) NOT NULL,
  `productId` varchar(10) NOT NULL,
  `salepname` varchar(255) NOT NULL,
  `salepprice` decimal(10,2) NOT NULL,
  `qty` int(10) NOT NULL,
  `tot_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`id` int(11) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `stock_price` decimal(10,2) NOT NULL,
  `whole_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(11) NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_address` varchar(100) NOT NULL,
  `sup_number` varchar(50) NOT NULL,
  `sup_email` varchar(50) NOT NULL,
  `sup_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `updaterent`
--

CREATE TABLE IF NOT EXISTS `updaterent` (
`id` int(11) NOT NULL,
  `card_id` varchar(10) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `up_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver`
--
ALTER TABLE `deliver`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver_product`
--
ALTER TABLE `deliver_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_more`
--
ALTER TABLE `sale_more`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updaterent`
--
ALTER TABLE `updaterent`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deliver`
--
ALTER TABLE `deliver`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deliver_product`
--
ALTER TABLE `deliver_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `return`
--
ALTER TABLE `return`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_more`
--
ALTER TABLE `sale_more`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `updaterent`
--
ALTER TABLE `updaterent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
