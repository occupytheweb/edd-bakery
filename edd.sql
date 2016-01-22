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
-- `users` table Data data for table `users`
--

INSERT INTO `users_tbl` (`UserID`, `FirstName`, `LastName`, `Username`, `Password`) VALUES
(1, 'admin', '-', 'eddadmin', 'root@eddadmin_0x');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users_tbl`
  MODIFY `UserID` int(255) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Set server root password
UPDATE mysql.user SET Password=PASSWORD('superuser') WHERE User='root';