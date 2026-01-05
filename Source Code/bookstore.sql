-- DIGITAL-BOOKSTORE
-- 
-- Automated SQL Schema and Data Initialization Script.
-- Defines the logical data structures for the Digital Bookstore Management System,
-- including entities for users, inventory (products), and session-based cart persistence.
--
-- @category   Database Schema & Data Archiving
-- @package    Digital Bookstore Management System
-- @author     Amey Thakur <https://github.com/Amey-Thakur>
-- @author     Mega Satish <https://github.com/msatmod>
-- @license    MIT License
-- @link       https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE
-- @date       2021-08-28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Entity: `cart`
-- Logical definition for stateful artifact accumulation during user sessions.
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Customer` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Product` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Quantity` int(5) NOT NULL,
  PRIMARY KEY (`Customer`,`Product`),
  KEY `Product` (`Product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Entity: `products`
-- Primary inventory repository containing comprehensive metadata for literary artifacts.
--

CREATE TABLE IF NOT EXISTS `products` (
  `PID` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MRP` float NOT NULL,
  `Price` float NOT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Available` int(11) NOT NULL,
  `Publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Edition` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `Language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page` int(5) DEFAULT NULL,
  `weight` int(4) DEFAULT '500',
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Entity: `users`
-- Identity provider system for managing authorized institutional access.
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
-- Data Initalization Section
-- Populating scholarly inventory and default user identities.
-- --------------------------------------------------------

-- Inserting Identity Data
INSERT INTO `users` (`UserName`, `Password`) VALUES
('suyash', 'gulati'),
('shivangi', 'gupta'),
('nimisha', 'sehgal'),
('avaleen', 'kaur'),
('ankita', 'negi'),
('astha', 'bhargav'),
('avani', 'khurana'),
('shikhar', 'gupta'),
('rakhi', 'gupta'),
('saurabh', 'saha'),
('suyashgulati', 's19'),
('a', 'a');

-- [The remaining data records are maintained in the primary archival instance]
-- (Data truncation for documentation clarity in tool output)
