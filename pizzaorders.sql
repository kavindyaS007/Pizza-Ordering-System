-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 03:02 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaorders`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Username`, `Password`) VALUES
('admin', 'Admin@');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `Cus_name` varchar(50) NOT NULL,
  `Phone_no` varchar(10) NOT NULL,
  `NIC_no` varchar(20) NOT NULL,
  `Delivery_date` varchar(10) NOT NULL,
  `Pizza_type` varchar(10) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Status` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Cus_name`, `Phone_no`, `NIC_no`, `Delivery_date`, `Pizza_type`, `Size`, `Quantity`, `Status`) VALUES
(60, 'kavinndya', '', '', '2020-07-02', 'Veg', 'large', 1, 'New_Order'),
(61, 'niranga', '23555', '', '2020-07-02', 'Veg', 'large', 2, 'New_Order'),
(62, 'pubudu', '', '3434854v', '2020-07-02', 'nonVeg', 'small', 3, 'Delivered'),
(63, 'nishanthi', '', '334546565v', '2020-06-30', 'nonVeg', 'medium', 3, 'Delivered'),
(64, 'chandrasen', '34546546', '', '2020-07-16', 'Veg', 'small', 5, 'New_Order'),
(65, 'agnas', '', '38839583', '2020-07-16', 'Veg', 'small', 1, 'New_Order'),
(66, '', '2345678910', '1212123v', '2020-07-05', 'Veg', 'large', 2, 'New_Order'),
(67, 'qwertasdfghh', '123456123', '12123434567v', '2020-07-08', 'nonVeg', 'small', 5, 'New_Order');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
