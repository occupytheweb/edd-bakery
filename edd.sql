-- MySQL Database setup
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2016 at 09:08 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+04:00";


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
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users_tbl`;
CREATE TABLE `users_tbl` (
  `UserID` int(255) unsigned NOT NULL,
  `FirstName` varchar(25) CHARACTER SET latin1 NOT NULL,
  `LastName` varchar(25) CHARACTER SET latin1 NOT NULL,
  `Username` varchar(25) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;

--
-- Table structure for table `store_cakes`
--
DROP TABLE IF EXISTS `store_cakes_tbl`;
CREATE TABLE `store_cakes_tbl` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `ImageBasePath` varchar(75) COLLATE utf16_unicode_520_ci NOT NULL,
  `Details` text COLLATE utf16_unicode_520_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_520_ci;


-- Test Data

--
-- `users` data dump
--
INSERT INTO `users_tbl` (`UserID`, `FirstName`, `LastName`, `Username`, `Password`) VALUES
(1, 'admin', '-', 'eddadmin', 'root@eddadmin_0x');

--
-- `store_cakes` data dump
--
INSERT INTO `store_cakes_tbl` (`ID`, `Name`, `Price`, `ImageBasePath`, `Details`) VALUES
(1, 'Baker''s Choice Bars Assortment', 300, 'bars_assortment', 'A beautiful and delicious assortment of our bakery’s double fudge brownies, chocolate chunk blondies and magic cookie bars.'),
(2, 'Chocolate Lover''s Cookie Assortment', 450, 'choc-cookies_assortment', 'Enjoy each of our six extra-large cranberry white-chocolate chunk cookies made with tart dried cranberries and toasted pecans, chocolate dipped coconut flavored macaroons with crisp exterior and a soft, chewy interior and a dozen chocolate chunk cookies.');


--
-- Indexes for table `users`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `store-cakes`
--
ALTER TABLE `store_cakes_tbl`
  ADD PRIMARY KEY (`ID`);


-- AUTO_INCREMENT for dumped tables

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users_tbl`
  MODIFY `UserID` int(255) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store-cakes`
--
ALTER TABLE `store_cakes_tbl`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Set server root password
UPDATE mysql.user SET Password=PASSWORD('superuser') WHERE User='root';