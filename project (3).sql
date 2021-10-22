-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 09:50 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_customers`
--

CREATE TABLE `daily_customers` (
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_customers`
--

INSERT INTO `daily_customers` (`customer_id`, `customer_name`) VALUES
(0, '0000'),
(2001, 'customer1'),
(2002, 'customer2'),
(2003, 'customer3'),
(2004, 'customer4');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `bill_no` int(11) NOT NULL,
  `day` date NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `discount_given` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`bill_no`, `day`, `discount`, `discount_given`) VALUES
(56, '2019-10-02', 54, 100),
(57, '2019-10-02', 52, 5),
(58, '2019-10-02', 51, 0),
(59, '2019-11-20', 0, 0),
(60, '2019-11-20', 51, 0),
(61, '2019-11-20', 51, 0),
(62, '2019-11-20', 149, 0),
(63, '2019-11-20', 51, 0),
(64, '2019-11-20', 0, 0),
(65, '2019-11-20', 118, 0),
(66, '2019-11-25', 51, 0),
(67, '2019-11-25', 0, 0),
(68, '2019-11-25', 51, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `item_code` int(10) NOT NULL,
  `day` date NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expired`
--

INSERT INTO `expired` (`item_code`, `day`, `quantity`) VALUES
(11, '2020-09-13', 10),
(29, '2019-12-18', 90);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `p_id` int(33) NOT NULL,
  `supplier_name` varchar(22) NOT NULL,
  `date` date NOT NULL,
  `item_code` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_discription` varchar(255) NOT NULL,
  `GST` int(10) NOT NULL DEFAULT 0,
  `mrp` float NOT NULL,
  `rate` float NOT NULL,
  `unit` varchar(5) NOT NULL,
  `stock` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`p_id`, `supplier_name`, `date`, `item_code`, `item_name`, `item_category`, `item_discription`, `GST`, `mrp`, `rate`, `unit`, `stock`) VALUES
(1, 'Keram', '2019-08-14', 11, 'coconut_oil', 'food', 'none', 5, 190, 190, 'Kg', '190'),
(2, 'Kannandevan', '2019-08-14', 12, 'Teadust', 'food', 'none', 5, 10, 10, 'Kg', '290'),
(3, '333', '2019-08-14', 13, 'rice', 'food', 'none', 0, 34, 32, 'Kg', '790'),
(4, 'none', '2019-08-14', 14, 'sugar', 'food', 'none', 5, 33, 30, 'Kg', '287'),
(5, 'none', '2019-08-14', 15, 'soap', 'beauty', 'none', 18, 10, 10, 'Nos', '119'),
(6, 'colgate', '2019-08-14', 16, 'toothpaste', 'beauty', 'none', 18, 40, 40, 'Nos', '210'),
(7, 'cello', '0000-00-00', 17, 'pen', 'stationery', 'none', 0, 10, 8, 'Nos', '343'),
(8, 'cello', '2019-08-14', 18, 'scale', 'stationery', 'none', 0, 4, 3, 'Nos', '365'),
(9, 'netsle', '2019-08-14', 19, 'munch', 'food', 'none', 0, 10, 8, 'Nos', '337'),
(10, 'tata', '2019-08-16', 20, 'salt', 'food', 'none', 0, 10, 7, 'Kg', '390'),
(11, 'good day', '2019-08-16', 21, 'biscut', 'food', 'none', 0, 35, 30, 'Nos', '119'),
(12, 'Indulekha', '2019-08-18', 22, 'hair oil', 'beauty', 'none', 0, 245, 230, 'Nos', '135'),
(13, 'eastern', '2019-08-18', 23, 'coffee powder', 'food', 'none', 0, 200, 180, 'Kg', '100'),
(14, 'bingo', '2019-08-21', 24, 'bingo', 'food', 'none', 0, 10, 8, 'Nos', '100'),
(15, 'cadberry', '2019-08-25', 25, 'Dairymilk', 'food', '', 0, 10, 9, 'Nos', '170'),
(16, 'bright', '2019-09-08', 26, 'candle', 'stationery', 'none', 5, 10, 8, 'Nos', '100'),
(17, 'Indulekha', '2019-09-08', 27, 'Indulekha', 'beauty', 'hair oil 100ml', 18, 350, 330, 'Nos', '99'),
(18, 'Nalanda', '2019-09-10', 28, 'book', 'stationery', '200page', 5, 40, 35, 'Nos', '82'),
(19, 'Kannandevan', '2019-12-18', 29, 'jkjaf', 'food', 'fdsjkf', 5, 44, 40, 'Kgç¢‚', '-3580'),
(20, 'noneëŒŠ', '2019-12-18', 30, 'Drinking water', 'foodÃ«', 'Drinking water', 5, 20, 18, 'Nos', '100');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `Purchase_Id` int(255) NOT NULL,
  `Date` date NOT NULL,
  `expiry` date NOT NULL,
  `Item_Code` int(22) NOT NULL,
  `Supplier_Name` varchar(22) NOT NULL,
  `Item_Name` varchar(22) NOT NULL,
  `Item_Description` varchar(22) NOT NULL,
  `Item_category` varchar(22) NOT NULL,
  `Item_Unit` varchar(22) NOT NULL,
  `Item_Quantity` varchar(22) NOT NULL,
  `MRP` varchar(22) NOT NULL,
  `Purchase_Rate` varchar(22) NOT NULL,
  `Amount` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Purchase_Id`, `Date`, `expiry`, `Item_Code`, `Supplier_Name`, `Item_Name`, `Item_Description`, `Item_category`, `Item_Unit`, `Item_Quantity`, `MRP`, `Purchase_Rate`, `Amount`) VALUES
(1, '2019-08-18', '0000-00-00', 12, 'Kannandevan', 'Teadust', 'none', 'food', 'Kg', '100', '10', '10', '1000'),
(2, '2019-08-18', '0000-00-00', 17, 'cello', 'pen', 'none', 'stationery', 'Nos', '100', '10', '8', '800'),
(3, '2019-08-18', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '200', '34', '31', '6200'),
(4, '2019-08-18', '0000-00-00', 23, 'eastern', 'coffee powder', 'none', 'food', 'Kg', '100', '200', '180', '18000'),
(5, '2019-08-17', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '100', '190', '185', '18500'),
(6, '2019-08-18', '0000-00-00', 19, 'netsle', 'munch', 'none', 'food', 'Nos', '100', '10', '8', '800'),
(7, '2019-08-18', '0000-00-00', 19, 'netsle', 'munch', 'none', 'food', 'Nos', '100', '10', '8', '800'),
(8, '2019-08-21', '0000-00-00', 24, 'bingo', 'bingo', 'none', 'food', 'Nos', '100', '10', '8', '800'),
(9, '2019-08-21', '0000-00-00', 18, 'cello', 'scale', 'none', 'stationery', 'Nos', '100', '4', '3', '300'),
(10, '2019-08-21', '0000-00-00', 18, 'cello', 'scale', 'none', 'stationery', 'Nos', '100', '4', '3', '300'),
(11, '2019-08-21', '0000-00-00', 18, 'cello', 'scale', 'none', 'stationery', 'Nos', '100', '4', '3', '300'),
(12, '2019-08-25', '0000-00-00', 25, 'cadberry', 'Dairymilk', '', 'food', 'Kg', '100', '10', '9', '900'),
(13, '2019-08-30', '0000-00-00', 15, 'none', 'soap', 'none', 'beauty', 'Nos', '100', '10', '9', '900'),
(14, '2019-08-30', '0000-00-00', 15, 'none', 'soap', 'none', 'beauty', 'Nos', '100', '10', '9', '900'),
(15, '2019-09-08', '0000-00-00', 26, 'bright', 'candle', 'none', 'stationery', 'Nos', '100', '10', '8', '800'),
(16, '2019-09-08', '0000-00-00', 27, 'Indulekha', 'Indulekha', 'hair oil 100ml', 'beauty', 'Nos', '100', '350', '330', '33000'),
(17, '2019-09-10', '0000-00-00', 28, 'Nalanda', 'book', '200page', 'stationery', 'Nos', '100', '40', '35', '3500'),
(18, '2019-09-12', '0000-00-00', 23, 'eastern', 'coffee', 'none', 'food', 'Kg', '100', '200', '190', '19000'),
(19, '2019-09-12', '0000-00-00', 21, 'good', 'biscut', 'none', 'food', 'Nos', '100', '35', '30', '3000'),
(20, '2019-09-12', '0000-00-00', 22, 'Indulekha', 'hair', 'none', 'beauty', 'Nos', '100', '245', '240', '24000'),
(21, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '186', '1860'),
(22, '0000-00-00', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '10', '34', '32', '320'),
(23, '0000-00-00', '0000-00-00', 20, 'tata', 'salt', 'none', 'food', 'Kg', '16', '10', '8', '128'),
(24, '2019-09-13', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '100', '34', '31', '3100'),
(25, '2019-09-13', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '100', '34', '31', '3100'),
(26, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(27, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(28, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(29, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(30, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(31, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(32, '2019-09-13', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(33, '2019-09-13', '0000-00-00', 12, 'Kannandevan', 'Teadust', 'none', 'food', 'Kg', '10', '10', '8', '80'),
(34, '2019-09-13', '0000-00-00', 25, 'cadberry', 'Dairymilk', '/', 'food', 'Nos', '100', '10', '8', '800'),
(35, '2019-09-13', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '10', '34', '32', '320'),
(36, '2019-09-13', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '10', '34', '32', '320'),
(37, '2019-09-13', '2020-09-13', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '10', '190', '180', '1800'),
(38, '2019-09-13', '2020-09-13', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '100', '190', '180', '18000'),
(39, '2019-11-20', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '100', '190', '186', '18600'),
(40, '2019-11-20', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '500', '34', '32', '16000'),
(41, '2019-11-20', '0000-00-00', 13, '333', 'rice', 'none', 'food', 'Kg', '500', '34', '32', '16000'),
(42, '2019-11-20', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '100', '190', '185', '18500'),
(43, '2019-11-20', '0000-00-00', 11, 'Keram', 'coconut_oil', 'none', 'food', 'Kg', '100', '190', '185', '18500'),
(44, '2019-11-20', '0000-00-00', 14, 'none', 'sugar', 'none', 'food', 'Kg', '50', '33', '30', '1500'),
(45, '2019-11-20', '0000-00-00', 14, 'none', 'sugar', 'none', 'food', 'Kg', '50', '33', '30', '1500'),
(46, '2019-11-20', '0000-00-00', 14, 'none', 'sugar', 'none', 'food', 'Kg', '50', '33', '30', '1500'),
(47, '2019-11-20', '0000-00-00', 14, 'none', 'sugar', 'none', 'food', 'Kg', '50', '33', '30', '1500'),
(48, '2019-11-20', '0000-00-00', 23, 'eastern', 'coffee', 'none', 'food', 'Kg', '5', '200', '190', '950'),
(49, '2019-11-20', '0000-00-00', 12, 'Kannandevan', 'Teadust', 'none', 'food', 'Kg', '100', '10', '8', '800'),
(50, '2019-12-18', '0000-00-00', 29, 'Kannandevan', 'jfkdjldsa', 'dfsdf', 'foodëŒŠ', 'Kgo', '6', '99', '110', '660'),
(51, '2019-12-18', '0000-00-00', 29, 'Kannandevan', 'jfkdjldsa', 'dfsdf', 'foodëŒŠ', 'Kgo', '6', '99', '110', '660'),
(52, '2019-12-18', '2019-12-18', 29, 'Kannandevan', 'jsdfdsa', 'fdsfsd', 'food', 'Kg%', '90', '89', '100', '9000'),
(53, '2019-12-18', '2019-12-18', 29, 'Kannandevan', 'jkjaf', 'fdsjkf', 'food', 'Kgç¢‚', '20', '44', '40', '800'),
(54, '2019-12-18', '2019-12-18', 29, 'Kannandevan', 'jkjaf', 'fdsjkf', 'food', 'Kgç¢‚', '20', '44', '40', '800'),
(55, '2019-12-18', '2019-12-18', 29, 'Kannandevan', 'jkjaf', 'fdsjkf', 'food', 'Kgç¢‚', '20', '44', '40', '800'),
(56, '2019-12-18', '2019-04-18', 30, 'noneëŒŠ', 'Drinking water', 'Drinking water', 'foodÃ«', 'Nos', '100', '20', '18', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `sales_and_bill`
--

CREATE TABLE `sales_and_bill` (
  `temp` int(255) NOT NULL,
  `bill_no` int(20) NOT NULL,
  `item_code` int(20) NOT NULL,
  `day` date NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_quantity` int(50) NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `taxpercentage` float NOT NULL,
  `taxamount` float NOT NULL,
  `mrp` decimal(10,0) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `customer_id` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_and_bill`
--

INSERT INTO `sales_and_bill` (`temp`, `bill_no`, `item_code`, `day`, `item_name`, `item_quantity`, `discount`, `taxpercentage`, `taxamount`, `mrp`, `rate`, `amount`, `unit`, `customer_id`) VALUES
(274, 1, 11, '2019-08-30', 'coconut_oil', 10, 0, 0, 0, '190', '0', '1900', 'Kg', 0),
(275, 1, 12, '2019-08-30', 'Teadust', 10, 0, 0, 0, '10', '0', '100', 'Kg', 0),
(278, 1, 15, '2019-08-30', 'soap', 10, 0, 0, 0, '10', '0', '20', 'Nos', 0),
(281, 1, 18, '2019-08-30', 'scale', 3, 0, 0, 0, '4', '0', '12', 'Nos', 0),
(285, 3, 11, '2019-08-30', 'coconut_oil', 3, 0, 0, 0, '190', '0', '570', 'Kg', 0),
(306, 5, 15, '2019-08-30', 'soap', 3, 0, 0, 0, '10', '0', '30', 'Nos', 0),
(309, 6, 12, '2019-08-30', 'Teadust', 15, 15, 0, 0, '10', '0', '150', 'Kg', 0),
(313, 7, 15, '2019-08-31', 'soap', 15, 0, 0, 0, '10', '0', '150', 'Nos', 0),
(317, 7, 12, '2019-09-08', 'Teadust', 10, 0, 0, 5, '10', '0', '100', 'Kg', 0),
(322, 7, 15, '2019-09-08', 'soap', 3, 0, 0, 5.4, '10', '0', '30', 'Nos', 0),
(324, 8, 11, '2019-09-08', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(326, 9, 28, '2019-09-10', 'book', 3, 5, 0, 6, '40', '0', '120', 'Nos', 0),
(328, 9, 14, '2019-09-10', 'sugar', 10, 16.5, 0, 16.5, '33', '0', '330', 'Kg', 0),
(336, 10, 15, '2019-09-10', 'soap', 15, 7.5, 0, 27, '10', '0', '150', 'Nos', 0),
(337, 10, 14, '2019-09-11', 'sugar', 10, 16.5, 0, 16.5, '33', '0', '330', 'Kg', 0),
(339, 11, 11, '2019-09-11', 'coconut_oil', 10, 95, 0, 95, '190', '0', '1900', 'Kg', 0),
(340, 11, 11, '2019-09-11', 'coconut_oil', 10, 95, 0, 95, '190', '0', '1900', 'Kg', 0),
(341, 11, 22, '2019-09-11', 'hair', 10, 122.5, 0, 0, '245', '0', '2450', 'Nos', 0),
(342, 11, 28, '2019-09-11', 'book', 3, 6, 0, 6, '40', '0', '120', 'Nos', 0),
(344, 12, 12, '2019-09-11', 'Teadust', 4, 2, 0, 2, '10', '0', '40', 'Kg', 0),
(345, 12, 19, '2019-09-12', 'munch', 13, 6.5, 0, 0, '10', '0', '130', 'Nos', 0),
(346, 12, 15, '2019-09-12', 'soap', 11, 0, 0, 19.8, '10', '0', '110', 'Nos', 0),
(350, 14, 12, '2019-09-12', 'Teadust', 13, 0, 0, 6.5, '10', '0', '130', 'Kg', 0),
(354, 16, 12, '2019-09-12', 'Teadust', 5, 0, 0, 2.5, '10', '0', '50', 'Kg', 0),
(364, 17, 14, '2019-09-12', 'sugar', 10, 9.9, 0, 16.5, '33', '0', '330', 'Kg', 0),
(367, 18, 11, '2019-09-12', 'coconut_oil', 5, 47.5, 0, 47.5, '190', '0', '950', 'Kg', 0),
(371, 20, 22, '2019-09-12', 'hair', 10, 73.5, 0, 0, '245', '0', '2450', 'Nos', 2002),
(373, 21, 11, '2019-09-12', 'coconut_oil', 12, 114, 0, 114, '190', '0', '2280', 'Kg', 2001),
(375, 22, 12, '2019-09-12', 'Teadust', 12, 6, 0, 6, '10', '0', '120', 'Kg', 2001),
(379, 24, 11, '2019-09-12', 'coconut_oil', 13, 0, 0, 123.5, '190', '0', '2470', 'Kg', 0),
(385, 27, 21, '2019-09-12', 'biscut', 6, 6.3, 0, 0, '35', '0', '210', 'Nos', 2002),
(387, 28, 11, '2019-09-12', 'coconut_oil', 5, 0, 0, 47.5, '190', '0', '950', 'Kg', 0),
(389, 29, 14, '2019-09-12', 'sugar', 5, 4.95, 0, 8.25, '33', '0', '165', 'Kg', 2002),
(391, 30, 15, '2019-09-12', 'soap', 10, 0, 0, 18, '10', '0', '100', 'Nos', 0),
(394, 31, 12, '2019-09-12', 'Teadust', 18, 5.4, 0, 9, '10', '0', '180', 'Kg', 2002),
(402, 32, 22, '2019-09-12', 'hair', 12, 147, 0, 0, '245', '0', '2940', 'Nos', 2001),
(406, 33, 12, '2019-09-12', 'Teadust', 10, 3, 0, 5, '10', '0', '100', 'Kg', 2002),
(407, 33, 14, '2019-09-12', 'sugar', 10, 9.9, 0, 16.5, '33', '0', '330', 'Kg', 2002),
(409, 34, 15, '2019-09-12', 'soap', 12, 3.6, 0, 21.6, '10', '0', '120', 'Nos', 2002),
(411, 35, 12, '2019-09-19', 'Teadust', 10, 0, 0, 5, '10', '0', '100', 'Kg', 0),
(412, 35, 18, '2019-09-19', 'scale', 12, 0, 0, 0, '4', '0', '48', 'Nos', 0),
(414, 36, 21, '2019-09-19', 'biscut', 5, 0, 0, 0, '35', '0', '175', 'Nos', 0),
(415, 36, 21, '2019-09-19', 'biscut', 5, 0, 0, 0, '35', '0', '175', 'Nos', 0),
(416, 36, 21, '2019-09-19', 'biscut', 5, 0, 0, 0, '35', '0', '175', 'Nos', 0),
(419, 37, 27, '2019-09-20', 'Indulekha', 1, 0, 0, 63, '350', '0', '350', 'Nos', 0),
(421, 38, 11, '2019-09-22', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(422, 38, 12, '2019-09-22', 'Teadust', 6, 0, 0, 3, '10', '0', '60', 'Kg', 0),
(423, 38, 12, '2019-09-22', 'Teadust', 6, 0, 0, 3, '10', '0', '60', 'Kg', 0),
(425, 39, 11, '2019-09-22', 'coconut_oil', 10, 57, 0, 95, '190', '0', '1900', 'Kg', 2002),
(427, 40, 11, '2019-09-25', 'coconut_oil', 10, 10, 0, 95, '190', '0', '1900', 'Kg', 0),
(428, 40, 11, '2019-09-25', 'coconut_oil', 10, 10, 0, 95, '190', '0', '1900', 'Kg', 0),
(429, 40, 11, '2019-09-25', 'coconut_oil', 10, 10, 0, 95, '190', '0', '1900', 'Kg', 0),
(436, 43, 12, '2019-09-25', 'Teadust', 10, 0, 0, 5, '10', '0', '100', 'Kg', 0),
(441, 45, 11, '2019-09-28', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(443, 46, 11, '2019-09-28', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(444, 46, 12, '2019-09-28', 'Teadust', 10, 0, 0, 5, '10', '0', '100', 'Kg', 0),
(445, 46, 15, '2019-09-28', 'soap', 5, 0, 0, 9, '10', '0', '50', 'Nos', 0),
(447, 47, 11, '2019-09-28', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(450, 47, 22, '2019-09-28', 'hair', 5, 0, 0, 0, '245', '0', '1225', 'Nos', 0),
(452, 48, 11, '2019-09-28', 'coconut_oil', 10, 57, 0, 95, '190', '0', '1900', 'Kg', 2002),
(454, 49, 11, '2019-09-28', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(456, 50, 11, '2019-09-28', 'coconut_oil', 10, 57, 0, 95, '190', '0', '1900', 'Kg', 2002),
(457, 50, 22, '2019-09-28', 'hair', 20, 147, 0, 0, '245', '0', '4900', 'Nos', 2002),
(458, 50, 22, '2019-09-28', 'hair', 1, 100, 0, 0, '245', '0', '245', 'Nos', 2002),
(460, 51, 11, '2019-09-28', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(461, 51, 22, '2019-09-28', 'hair', 1, 100, 0, 0, '245', '0', '245', 'Nos', 0),
(463, 52, 11, '2019-10-02', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 2002),
(464, 52, 11, '2019-10-02', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 2002),
(466, 53, 11, '2019-10-02', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 0),
(467, 53, 12, '2019-10-02', 'Teadust', 10, 100, 0, 5, '10', '0', '100', 'Kg', 0),
(468, 53, 15, '2019-10-02', 'soap', 10, 0, 0, 18, '10', '0', '100', 'Nos', 0),
(476, 54, 11, '2019-10-02', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 2001),
(478, 55, 11, '2019-10-02', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 2001),
(479, 55, 11, '2019-10-02', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 2001),
(480, 55, 23, '2019-10-02', 'coffee', 10, 100, 0, 0, '200', '0', '2000', 'Kg', 2001),
(481, 55, 25, '2019-10-02', 'Dairymilk', 10, 10, 0, 0, '10', '0', '100', 'Nos', 2001),
(483, 56, 20, '2019-10-02', 'salt', 10, 10, 0, 0, '10', '0', '100', 'Kg', 2002),
(484, 56, 13, '2019-10-02', 'rice', 50, 100, 0, 0, '34', '0', '1700', 'Kg', 2002),
(486, 57, 13, '2019-10-02', 'rice', 50, 100, 0, 0, '34', '0', '1700', 'Kg', 0),
(487, 57, 18, '2019-10-02', 'scale', 10, 5, 0, 0, '4', '0', '40', 'Nos', 0),
(489, 58, 13, '2019-10-02', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 2002),
(491, 59, 13, '2019-11-20', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 0),
(493, 60, 13, '2019-11-20', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 0),
(495, 61, 13, '2019-11-20', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 2005),
(497, 62, 14, '2019-11-20', 'sugar', 50, 0, 0, 82.5, '33', '0', '1650', 'Kg', 0),
(498, 62, 14, '2019-11-20', 'sugar', 50, 0, 0, 82.5, '33', '0', '1650', 'Kg', 0),
(499, 62, 14, '2019-11-20', 'sugar', 50, 0, 0, 82.5, '33', '0', '1650', 'Kg', 0),
(500, 62, 13, '2019-11-20', 'rice', 10, 0, 0, 0, '34', '0', '340', 'Kg', 0),
(502, 63, 13, '2019-11-20', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 0),
(503, 63, 13, '2019-11-20', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 0),
(505, 64, 14, '2019-11-20', 'sugar', 10, 0, 0, 16.5, '33', '0', '330', 'Kg', 0),
(506, 64, 13, '2019-11-20', 'rice', 20, 0, 0, 0, '34', '0', '680', 'Kg', 0),
(507, 64, 11, '2019-11-20', 'coconut_oil', 2, 0, 0, 19, '190', '0', '380', 'Kg', 0),
(509, 65, 13, '2019-11-20', 'rice', 10, 0, 0, 0, '34', '0', '340', 'Kg', 2003),
(510, 65, 13, '2019-11-20', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 2003),
(511, 65, 11, '2019-11-20', 'coconut_oil', 10, 0, 0, 95, '190', '0', '1900', 'Kg', 2003),
(512, 65, 12, '2019-11-25', 'Teadust', 10, 0, 0, 5, '10', '0', '100', 'Kg', 0),
(514, 66, 13, '2019-11-25', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 2002),
(516, 67, 13, '2019-11-25', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 0),
(518, 68, 13, '2019-11-25', 'rice', 50, 0, 0, 0, '34', '0', '1700', 'Kg', 2002);

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `staff_id` int(10) NOT NULL,
  `staff_first` varchar(20) NOT NULL,
  `staff_last` varchar(20) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `staff_dob` date NOT NULL,
  `join_date` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `house_name` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `ph_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`staff_id`, `staff_first`, `staff_last`, `staff_gender`, `staff_dob`, `join_date`, `category`, `house_no`, `house_name`, `street`, `district`, `pincode`, `salary`, `ph_no`) VALUES
(3, 'john', 'staff4', 'on', '2019-08-18', '2019-08-18', 'Packing', '433', 'dsfasf', 'asfasfds', 'Alapuzha', 45465, '200100', '43423423'),
(4, 'staff4fdsfsda', 'staff4', 'on', '2019-08-18', '2019-08-18', 'Billing', '433', 'dsfasf', 'dsasfsdaf', 'Vayanadu', 343432, '200003', '43423423');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(20) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `ph_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `ph_no`) VALUES
(0, 'Kannandevan', 2255),
(1005, '333', 4353453),
(1006, 'cadberry', 434),
(1007, 'cello11', 10055666),
(1009, 'none', 343432);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
('Admin', 'admin', 'admin'),
('Staff', 'staff', 'ssss');

-- --------------------------------------------------------

--
-- Table structure for table `working_section`
--

CREATE TABLE `working_section` (
  `sec_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_section`
--

INSERT INTO `working_section` (`sec_name`) VALUES
('Billing'),
('Cleaning'),
('Packing'),
('Salesman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_customers`
--
ALTER TABLE `daily_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_code`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`Purchase_Id`);

--
-- Indexes for table `sales_and_bill`
--
ALTER TABLE `sales_and_bill`
  ADD PRIMARY KEY (`temp`),
  ADD UNIQUE KEY `temp` (`temp`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `working_section`
--
ALTER TABLE `working_section`
  ADD PRIMARY KEY (`sec_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `Purchase_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `sales_and_bill`
--
ALTER TABLE `sales_and_bill`
  MODIFY `temp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
