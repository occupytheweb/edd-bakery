-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 07:59 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edd`
--
CREATE DATABASE IF NOT EXISTS `edd` DEFAULT CHARACTER SET utf16 COLLATE utf16_unicode_520_ci;
USE `edd`;

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE IF NOT EXISTS `orders_tbl` (
  `ID` int(255) NOT NULL,
  `OrderID` int(255) NOT NULL,
  `ProductID` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `ProductName` text COLLATE utf16_unicode_520_ci NOT NULL,
  `Username` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Price` decimal(65,0) NOT NULL,
  `SubTotal` decimal(65,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `orders_tbl`
--

INSERT INTO `orders_tbl` (`ID`, `OrderID`, `ProductID`, `ProductName`, `Username`, `Quantity`, `Price`, `SubTotal`) VALUES
(1, 1, 'cakes-2', 'Chocolate Lover''s Cookie Assortment', 'eddadmin', 2, '450', '900');

-- --------------------------------------------------------

--
-- Table structure for table `store_birthdaycakes_tbl`
--

CREATE TABLE IF NOT EXISTS `store_birthdaycakes_tbl` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `ImageBasePath` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` text COLLATE utf16_unicode_520_ci NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL DEFAULT '1',
  `Stock` int(255) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_bread_tbl`
--

CREATE TABLE IF NOT EXISTS `store_bread_tbl` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `ImageBasePath` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` text COLLATE utf16_unicode_520_ci NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL DEFAULT '1',
  `Stock` int(255) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_cakes_tbl`
--

CREATE TABLE IF NOT EXISTS `store_cakes_tbl` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `ImageBasePath` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` text COLLATE utf16_unicode_520_ci NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL DEFAULT '1',
  `Stock` int(255) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `store_cakes_tbl`
--

INSERT INTO `store_cakes_tbl` (`ID`, `Name`, `Price`, `ImageBasePath`, `Details`, `ActiveStatus`, `Stock`) VALUES
(1, 'Baker''s Choice Bars Assortment', 300, 'bars_assortment', 'A beautiful and delicious assortment of our bakery’s double fudge brownies, chocolate chunk blondies and magic cookie bars.', 1, 10),
(2, 'Chocolate Lover''s Cookie Assortment', 450, 'choc-cookies_assortment', 'Enjoy each of our six extra-large cranberry white-chocolate chunk cookies made with tart dried cranberries and toasted pecans, chocolate dipped coconut flavored macaroons with crisp exterior and a soft, chewy interior and a dozen chocolate chunk cookies.', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `store_cupcakes_tbl`
--

CREATE TABLE IF NOT EXISTS `store_cupcakes_tbl` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `ImageBasePath` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` text COLLATE utf16_unicode_520_ci NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL DEFAULT '1',
  `Stock` int(255) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_pastries_tbl`
--

CREATE TABLE IF NOT EXISTS `store_pastries_tbl` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `ImageBasePath` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` text COLLATE utf16_unicode_520_ci NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL DEFAULT '1',
  `Stock` int(255) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_weddingcakes_tbl`
--

CREATE TABLE IF NOT EXISTS `store_weddingcakes_tbl` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `ImageBasePath` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` text COLLATE utf16_unicode_520_ci NOT NULL,
  `ActiveStatus` tinyint(1) NOT NULL DEFAULT '1',
  `Stock` int(255) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `UserID` int(255) unsigned NOT NULL,
  `FirstName` varchar(25) CHARACTER SET latin1 NOT NULL,
  `LastName` varchar(25) CHARACTER SET latin1 NOT NULL,
  `Username` varchar(25) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(25) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL,
  `Gender` varchar(255) COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`UserID`, `FirstName`, `LastName`, `Username`, `Password`, `Email`, `Gender`) VALUES
(1, 'dont', 'fail', 'this', '$2y$10$otAIs/X9S02USCtad/', 'unit', 'test'),
(2, 'dont', 'fail', 'eddadmin', '$2y$10$xJziGRGXTO7alGBmzP', 'unit', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store_birthdaycakes_tbl`
--
ALTER TABLE `store_birthdaycakes_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store_bread_tbl`
--
ALTER TABLE `store_bread_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store_cakes_tbl`
--
ALTER TABLE `store_cakes_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store_cupcakes_tbl`
--
ALTER TABLE `store_cupcakes_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store_pastries_tbl`
--
ALTER TABLE `store_pastries_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store_weddingcakes_tbl`
--
ALTER TABLE `store_weddingcakes_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `UserID` int(255) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
