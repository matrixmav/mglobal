-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2015 at 08:43 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mglobal`
--

-- --------------------------------------------------------

--
-- Table structure for table `binary_commission_test`
--

CREATE TABLE IF NOT EXISTS `binary_commission_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `position` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `order_amount` float NOT NULL,
  `total_purchase_amount` float NOT NULL,
  `commission_amount` float NOT NULL,
  `left_purchase` float DEFAULT NULL,
  `right_purchase` float DEFAULT NULL,
  `right_carry` float DEFAULT NULL,
  `left_carry` float NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `binary_commission_test`
--

INSERT INTO `binary_commission_test` (`id`, `user_id`, `parent`, `position`, `date`, `order_amount`, `total_purchase_amount`, `commission_amount`, `left_purchase`, `right_purchase`, `right_carry`, `left_carry`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, '1', 'left', '2015-06-23', 100, 800, 3.5, 350, 350, 0, 0, 1, '2015-06-23', '2015-06-29 13:13:10'),
(2, 8, '1', 'right', '2015-06-23', 100, 905, 3.55, 450, 355, 0, 95, 1, '2015-06-23', '2015-06-29 13:13:13'),
(3, 1, '0', 'right', '2015-06-23', 100, 1805, 8, 800, 905, 105, 0, 1, '2015-06-23', '2015-06-29 13:13:15'),
(4, 3, '8', 'right', '2015-06-26', 355, 355, 0, NULL, NULL, 0, 0, 1, '2015-06-26', '2015-06-29 13:13:18'),
(5, 4, '8', 'left', '2015-06-26', 450, 450, 0, NULL, NULL, 0, 0, 1, '2015-06-26', '2015-06-29 13:13:21'),
(6, 5, '7', 'right', '2015-06-26', 350, 350, 0, NULL, NULL, 0, 0, 1, '2015-06-26', '2015-06-29 13:13:24'),
(7, 6, '7', 'left', '0000-00-00', 350, 350, 0, NULL, NULL, 0, 0, 0, '0000-00-00', '2015-06-29 13:13:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



/* alerted geneology table */


ALTER TABLE `genealogy` 
ADD (`order_amount` float NOT NULL,
 `total_purchase_amount` float NOT NULL,
 `commission_amount` float NOT NULL,
 `left_purchase` float NOT NULL,
  `right_purchase` float NOT NULL,
  `right_carry` float NOT NULL,
  `left_carry` float NOT NULL );
