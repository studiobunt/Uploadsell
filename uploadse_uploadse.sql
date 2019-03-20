-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2012 at 12:29 AM
-- Server version: 5.1.56
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uploadse_uploadse`
--

-- --------------------------------------------------------

--
-- Table structure for table `1korisnik1`
--

CREATE TABLE IF NOT EXISTS `1korisnik1` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `product_name` text NOT NULL,
  `product_price` text NOT NULL,
  `product_currency` char(4) NOT NULL,
  `contact_person` text NOT NULL,
  `company_name` text NOT NULL,
  `paypal_addres` text NOT NULL,
  `email_address` text NOT NULL,
  `del_password` text NOT NULL,
  `product_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `1korisnik1`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
