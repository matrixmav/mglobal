-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2015 at 09:28 AM
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
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`,`state_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `slug`, `name`, `country_id`, `state_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangalore', 'Bangalore', 1, 1, 1, '2015-05-13', '2015-05-13 12:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1:Direct 2: Binary,',
  `rp` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `country_id_2` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `country_id`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Surya', 'surya@gmail.com', 1, 2147483647, 1, '2015-05-14', '2015-05-19 09:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `phone_code` varchar(5) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `slug`, `name`, `code`, `phone_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'india', 'India', 'IND', '91', 1, '2015-05-13', '2015-05-13 12:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `coupon_description` text,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_code`, `amount`, `start_date`, `end_date`, `coupon_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VISA10', 10, '2015-05-19', '2015-05-31', 'VISA10', 1, '2015-05-19', '2015-05-19 11:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `dummydata`
--

CREATE TABLE IF NOT EXISTS `dummydata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dummydata`
--

INSERT INTO `dummydata` (`id`, `parent_id`, `user_id`, `position`) VALUES
(1, 999, 1000, 'left'),
(2, 1000, 1001, 'right'),
(3, 1000, 1002, 'left'),
(4, 1001, 1003, 'right'),
(6, 1001, 1004, 'left'),
(7, 1002, 1234, 'left'),
(8, 1002, 3698, 'right'),
(9, 1004, 1006, 'right');

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE IF NOT EXISTS `gateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `request_url` varchar(255) NOT NULL,
  `response_url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gateway`
--

INSERT INTO `gateway` (`id`, `code`, `name`, `request_url`, `response_url`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'RP', 'test', 'cool', 1, '0000-00-00', '2015-05-18 12:08:36'),
(2, '23', 'PayPal', 'paypal.com', 'paypal.com', 1, '0000-00-00', '2015-05-18 12:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `genealogy`
--

CREATE TABLE IF NOT EXISTS `genealogy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor_user_id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`sponsor_user_id`),
  KEY `sponsor_user_id` (`sponsor_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `genealogy`
--

INSERT INTO `genealogy` (`id`, `parent`, `user_id`, `sponsor_user_id`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 3, 1, 'left', 0, '0000-00-00', '2015-05-14 12:38:51'),
(3, '4', 5, 1, 'right', 0, '0000-00-00', '2015-05-19 09:39:20'),
(4, '5', 6, 1, 'right', 0, '0000-00-00', '2015-05-19 10:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1: Inbox, 2: compose,3: sent,4:trash',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `to_user_id` (`to_user_id`,`from_user_id`),
  KEY `from_user_id` (`from_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `to_user_id`, `from_user_id`, `subject`, `message`, `attachment`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Testing', '            \r\n            Test', '', 2, 1, '2015-05-14', '2015-05-14 11:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `money_transfer`
--

CREATE TABLE IF NOT EXISTS `money_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `fund_type` tinyint(4) NOT NULL COMMENT '1:RP,2:Amount',
  `comment` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `to_user_id` (`to_user_id`,`from_user_id`),
  KEY `to_user_id_2` (`to_user_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `tranaction_id` (`transaction_id`),
  KEY `wallet_id` (`wallet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `money_transfer`
--

INSERT INTO `money_transfer` (`id`, `to_user_id`, `from_user_id`, `transaction_id`, `wallet_id`, `fund_type`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1, 1, 'Testing', 1, '0000-00-00', '2015-05-18 12:09:17'),
(3, 1, 3, 4, 1, 1, '0.001 commission to admin', 1, '2015-05-19', '2015-05-19 04:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `web_builder_url` varchar(255) NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `domain_price` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`package_id`,`transaction_id`),
  KEY `transaction_id` (`transaction_id`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `package_id`, `transaction_id`, `web_builder_url`, `domain`, `domain_price`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '', 'dsdsdsd.com', 0, '2015-05-19', '2015-05-19', 1, '2015-05-19', '2015-05-19 09:53:12'),
(2, 6, 1, 5, '', 'fjjfjnfpn.com', 5, '2015-05-19', '2015-05-19', 0, '2015-05-19', '2015-05-19 12:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `coupon_code` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `Description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `start_date`, `end_date`, `coupon_code`, `amount`, `Description`, `status`, `created_at`, `update_at`) VALUES
(1, 'Gold', '2015-05-08', '2015-05-25', 0, 234, 'Domain\r\n250 Bandwidth\r\n4 Static pages\r\ncontact form\r\ngallery', 1, '2015-05-08', '2015-05-13 14:31:56'),
(2, 'Silver', '2015-05-08', '2015-05-08', 23423423, 350, 'Domain\r\n550 Bandwidth\r\n6 Static pages\r\n1 contact form\r\n2 gallery', 2, '2015-05-08', '2015-05-19 09:24:56'),
(3, 'Basic', '2015-05-08', '2015-06-18', 12345, 450, 'Domain\r\n650 Bandwidth\r\n8 Static pages\r\n2 contact form\r\n2 gallery', 1, '2015-05-19', '2015-05-19 09:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `referral_banner`
--

CREATE TABLE IF NOT EXISTS `referral_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `referral_banner`
--

INSERT INTO `referral_banner` (`id`, `name`, `url`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dsdafsdaf', 'sdafsdf', '343', 1, '2015-05-09', '2015-05-07 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `slug`, `name`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Karnataka', 'Karnataka', 1, 1, '2015-05-13', '2015-05-13 12:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE IF NOT EXISTS `summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `wallet_type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`transaction_id`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mode` varchar(30) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `actual_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `total_rp` float DEFAULT NULL,
  `used_rp` float NOT NULL,
  `coupon_discount` float NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `gateway_id` (`gateway_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `mode`, `gateway_id`, `actual_amount`, `paid_amount`, `total_rp`, `used_rp`, `coupon_discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'paypal', 1, 355, 355, 0, 0, 0, 0, '0000-00-00', '2015-05-19 09:53:12'),
(2, 3, '12', 1, 434, 444, 0, 434, 0, 1, '0000-00-00', '2015-05-18 12:08:51'),
(4, 1, '1', 1, 0.001, 0.001, 0, 0, 0, 1, '2015-05-19', '2015-05-19 04:47:42'),
(5, 6, 'paypal', 1, 239, 239, 0, 0, 0, 0, '2015-05-19', '2015-05-19 12:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsor_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `position` varchar(30) DEFAULT NULL,
  `user_sponsor_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `country_code` tinyint(4) NOT NULL,
  `phone` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `skype_id` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `master_pin` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `activation_key` varchar(100) DEFAULT NULL,
  `forget_key` varchar(100) DEFAULT NULL,
  `forget_status` varchar(100) DEFAULT NULL,
  `role_id` tinyint(4) NOT NULL COMMENT '1:User,2:Admin',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `sponsor_id`, `name`, `password`, `position`, `user_sponsor_id`, `full_name`, `email`, `country_id`, `country_code`, `phone`, `date_of_birth`, `skype_id`, `facebook_id`, `twitter_id`, `master_pin`, `status`, `activation_key`, `forget_key`, `forget_status`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '12345', 'admin', '734379e382de4feb0dce07cb1061ef48', 'left', 0, 'Ram Hemareddy', 'ramhemareddy@gmail.com', 1, 1, 1234567890, '2015-05-15', 'sdfasdf', 'dsafsd', 'fdsaf', 'e10adc3949ba59abbe56e057f20f883e', 1, '0', '', '', 2, '2015-05-14', '2015-05-18 07:13:43'),
(3, 'sury631016', 'hemareddy', '734379e382de4feb0dce07cb1061ef48', 'left', 12345, 'surya', 'surya@malinator.com', 1, 91, 2147483647, '1963-10-16', NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 1, '1013629720195', NULL, NULL, 1, '2015-05-14', '2015-05-19 09:03:10'),
(5, 'nidh510306', 'nidhi', 'e10adc3949ba59abbe56e057f20f883e', 'right', 0, 'nidhi sati', 'nidhi@malinator.com', 1, 91, 1234567890, '1951-03-06', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '40ebe644746748a71c22fa32ed263ebe', NULL, NULL, 1, '2015-05-19', '2015-05-19 09:52:41'),
(6, 'qwey681019', 'qweyt', '827ccb0eea8a706c4c34a16891f84e7b', 'right', 0, 'yugiojsdnkfvk', 'cfkuyhvjbbk@vgyigv.com', 1, 91, 2147483647, '1968-10-19', 'vgiudjvdjk', 'dvhuhckbsdkjv', 'hvbhvhufn', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'fc0a91efdbfdcd668908e48de047472c', NULL, NULL, 1, '2015-05-19', '2015-05-19 10:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `id_proof` varchar(100) NOT NULL,
  `address_proff` varchar(100) NOT NULL,
  `referral_banner_id` int(11) NOT NULL,
  `testimonials` text NOT NULL,
  `testimonial_status` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`city_name`,`state_name`,`country_id`),
  KEY `referral_banner_id` (`referral_banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `address`, `street`, `city_name`, `state_name`, `country_id`, `zip_code`, `id_proof`, `address_proff`, `referral_banner_id`, `testimonials`, `testimonial_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 'test', '111', '111', 1, '12313', 'survey-Testing.png', 'penclchk.gif', 1, '13123123', 0, 1, '2015-05-14', '2015-05-19 09:12:15'),
(2, 3, NULL, '', 'Bangalore', 'Karnataka', 1, '', 'penclchk.gif', 'survey-Testing.png', 1, '', 0, 1, '2015-05-14', '2015-05-19 10:55:30'),
(3, 5, NULL, '', '', '', 0, '', '1432033241bigstock-Test-word-on-white-keyboard-27134336.jpg', '1432033241survey-Testing.png', 1, 'testtttttttttt', 1, 0, '2015-05-19', '2015-05-19 12:35:58'),
(4, 6, 'xchovdsnj  jvjxnfon', 'hufjvodbcvoci', 'fjfvouhednvoiuo', 'andhra', 1, '85201', '1432032164IMG-20150504-WA0009.jpg', '1432032164IMG-20150404-WA0018.jpg', 1, 'wrsedipo[l', 0, 1, '2015-05-19', '2015-05-19 12:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fund` float NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:cash,2:RP Wallet,3:Commission',
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `fund`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 1, 1, '2015-05-18', '2015-05-18 17:47:19'),
(2, 3, 322.899, 1, 1, '0000-00-00', '2015-05-18 12:02:53'),
(10, 1, 12345, 2, 1, '2015-05-19', '2015-05-18 18:31:11'),
(12, 6, 100, 2, 1, '2015-05-19', '2015-05-19 13:23:03'),
(13, 6, 0, 3, 1, '2015-05-19', '2015-05-19 13:17:29'),
(14, 6, 0, 1, 1, '2015-05-19', '2015-05-19 13:17:03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `city_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commission`
--
ALTER TABLE `commission`
  ADD CONSTRAINT `commission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genealogy`
--
ALTER TABLE `genealogy`
  ADD CONSTRAINT `genealogy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genealogy_ibfk_2` FOREIGN KEY (`sponsor_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `money_transfer`
--
ALTER TABLE `money_transfer`
  ADD CONSTRAINT `money_transfer_ibfk_1` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `money_transfer_ibfk_2` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `money_transfer_ibfk_3` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `money_transfer_ibfk_4` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `summary`
--
ALTER TABLE `summary`
  ADD CONSTRAINT `summary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `summary_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`gateway_id`) REFERENCES `gateway` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`referral_banner_id`) REFERENCES `referral_banner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
