-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2015 at 09:52 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mglobal_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `get_code` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `banner`, `description`, `status`, `get_code`, `created_at`, `updated_at`) VALUES
(1, 'testing', '1433432465temp39.jpg', 'testing', 1, '<p><img src=/home/mglobally/public_html/staging/upload/banner/1433432465temp39.jpg height=100 width=100></p>', '2015-06-04', '2015-06-04 15:37:30'),
(2, 'testing', '1434082228icon.png', 'testing', 1, '<p><img src=http://www.mglobally.maverickinfosoft.com/upload/banner/1434082228icon.png height=100 width=100></p>', '2015-06-11', '2015-06-12 04:10:29'),
(3, 'testing one', '1434082266yii_structure.png', 'teating one', 1, '<p><img src=http://www.mglobally.maverickinfosoft.com/upload/banner/1434082266yii_structure.png height=100 width=100></p>', '2015-06-11', '2015-06-12 04:11:06'),
(4, 'test png', '1434108622bg.png', 'png', 1, '<p><img src=http://www.mglobally.maverickinfosoft.com/upload/banner/1434108622bg.png height=100 width=100></p>', '2015-06-12', '2015-06-12 11:30:22'),
(5, 'test jpg', '1434108669Royal_blue-4.jpg', 'test jpg', 1, '<p><img src=http://www.mglobally.maverickinfosoft.com/upload/banner/1434108669Royal_blue-4.jpg height=100 width=100></p>', '2015-06-12', '2015-06-12 11:31:09'),
(6, 'fasdf', '1434115538map.png', '', 1, '<p><img src=http://www.mglobally.maverickinfosoft.com/upload/banner/1434115538map.png height=100 width=100></p>', '2015-06-12', '2015-06-12 13:25:38'),
(7, 'aaaaaaaaa', '1434115562Royal_blue-4.jpg', '', 1, '<p><img src=http://www.mglobally.maverickinfosoft.com/upload/banner/1434115562Royal_blue-4.jpg height=100 width=100></p>', '2015-06-12', '2015-06-12 13:26:02'),
(8, 'aaaaaaaaa', '1434116474map.png', '', 1, '<p><img src=http://www.mglobally.maverickinfosoft.com/upload/banner/1434116474map.png height=100 width=100></p>', '2015-06-12', '2015-06-12 13:41:14');

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
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `build_category`
--

CREATE TABLE IF NOT EXISTS `build_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `build_category`
--

INSERT INTO `build_category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 1, '2015-05-26', '2015-05-26 06:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `build_temp`
--

CREATE TABLE IF NOT EXISTS `build_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `temp_header_id` int(11) NOT NULL,
  `temp_body_id` int(11) NOT NULL,
  `temp_footer_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `folderpath` varchar(100) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `custom_css` text NOT NULL,
  `custom_js` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`category_id`,`temp_header_id`,`temp_body_id`,`temp_footer_id`),
  KEY `category_id` (`category_id`),
  KEY `temp_header_id` (`temp_header_id`),
  KEY `temp_body_id` (`temp_body_id`),
  KEY `temp_footer_id` (`temp_footer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `build_temp_body`
--

CREATE TABLE IF NOT EXISTS `build_temp_body` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body_content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `build_temp_footer`
--

CREATE TABLE IF NOT EXISTS `build_temp_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `footer_content` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `build_temp_header`
--

CREATE TABLE IF NOT EXISTS `build_temp_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_title` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `header_content` text,
  `menu` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sent` date NOT NULL DEFAULT '0000-00-00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

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
  `iso2` char(2) DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `code` varchar(5) DEFAULT NULL,
  `phone_code` varchar(8) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso2`, `name`, `code`, `phone_code`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', '93', '0000-00-00', '0000-00-00'),
(2, 'AX', 'Aland Islands', 'ALA', '358', '0000-00-00', '0000-00-00'),
(3, 'AL', 'Albania', 'ALB', '355', '0000-00-00', '0000-00-00'),
(4, 'DZ', 'Algeria', 'DZA', '213', '0000-00-00', '0000-00-00'),
(5, 'AS', 'American Samoa', 'ASM', '1+684', '0000-00-00', '0000-00-00'),
(6, 'AD', 'Andorra', 'AND', '376', '0000-00-00', '0000-00-00'),
(7, 'AO', 'Angola', 'AGO', '244', '0000-00-00', '0000-00-00'),
(8, 'AI', 'Anguilla', 'AIA', '1+264', '0000-00-00', '0000-00-00'),
(9, 'AQ', 'Antarctica', 'ATA', '672', '0000-00-00', '0000-00-00'),
(10, 'AG', 'Antigua and Barbuda', 'ATG', '1+268', '0000-00-00', '0000-00-00'),
(11, 'AR', 'Argentina', 'ARG', '54', '0000-00-00', '0000-00-00'),
(12, 'AM', 'Armenia', 'ARM', '374', '0000-00-00', '0000-00-00'),
(13, 'AW', 'Aruba', 'ABW', '297', '0000-00-00', '0000-00-00'),
(14, 'AU', 'Australia', 'AUS', '61', '0000-00-00', '0000-00-00'),
(15, 'AT', 'Austria', 'AUT', '43', '0000-00-00', '0000-00-00'),
(16, 'AZ', 'Azerbaijan', 'AZE', '994', '0000-00-00', '0000-00-00'),
(17, 'BS', 'Bahamas', 'BHS', '1+242', '0000-00-00', '0000-00-00'),
(18, 'BH', 'Bahrain', 'BHR', '973', '0000-00-00', '0000-00-00'),
(19, 'BD', 'Bangladesh', 'BGD', '880', '0000-00-00', '0000-00-00'),
(20, 'BB', 'Barbados', 'BRB', '1+246', '0000-00-00', '0000-00-00'),
(21, 'BY', 'Belarus', 'BLR', '375', '0000-00-00', '0000-00-00'),
(22, 'BE', 'Belgium', 'BEL', '32', '0000-00-00', '0000-00-00'),
(23, 'BZ', 'Belize', 'BLZ', '501', '0000-00-00', '0000-00-00'),
(24, 'BJ', 'Benin', 'BEN', '229', '0000-00-00', '0000-00-00'),
(25, 'BM', 'Bermuda', 'BMU', '1+441', '0000-00-00', '0000-00-00'),
(26, 'BT', 'Bhutan', 'BTN', '975', '0000-00-00', '0000-00-00'),
(27, 'BO', 'Bolivia', 'BOL', '591', '0000-00-00', '0000-00-00'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'BES', '599', '0000-00-00', '0000-00-00'),
(29, 'BA', 'Bosnia and Herzegovina', 'BIH', '387', '0000-00-00', '0000-00-00'),
(30, 'BW', 'Botswana', 'BWA', '267', '0000-00-00', '0000-00-00'),
(31, 'BV', 'Bouvet Island', 'BVT', '0', '0000-00-00', '0000-00-00'),
(32, 'BR', 'Brazil', 'BRA', '55', '0000-00-00', '0000-00-00'),
(33, 'IO', 'British Indian Ocean Territory', 'IOT', '246', '0000-00-00', '0000-00-00'),
(34, 'BN', 'Brunei', 'BRN', '673', '0000-00-00', '0000-00-00'),
(35, 'BG', 'Bulgaria', 'BGR', '359', '0000-00-00', '0000-00-00'),
(36, 'BF', 'Burkina Faso', 'BFA', '226', '0000-00-00', '0000-00-00'),
(37, 'BI', 'Burundi', 'BDI', '257', '0000-00-00', '0000-00-00'),
(38, 'KH', 'Cambodia', 'KHM', '855', '0000-00-00', '0000-00-00'),
(39, 'CM', 'Cameroon', 'CMR', '237', '0000-00-00', '0000-00-00'),
(40, 'CA', 'Canada', 'CAN', '1', '0000-00-00', '0000-00-00'),
(41, 'CV', 'Cape Verde', 'CPV', '238', '0000-00-00', '0000-00-00'),
(42, 'KY', 'Cayman Islands', 'CYM', '1+345', '0000-00-00', '0000-00-00'),
(43, 'CF', 'Central African Republic', 'CAF', '236', '0000-00-00', '0000-00-00'),
(44, 'TD', 'Chad', 'TCD', '235', '0000-00-00', '0000-00-00'),
(45, 'CL', 'Chile', 'CHL', '56', '0000-00-00', '0000-00-00'),
(46, 'CN', 'China', 'CHN', '86', '0000-00-00', '0000-00-00'),
(47, 'CX', 'Christmas Island', 'CXR', '61', '0000-00-00', '0000-00-00'),
(48, 'CC', 'Cocos (Keeling) Islands', 'CCK', '61', '0000-00-00', '0000-00-00'),
(49, 'CO', 'Colombia', 'COL', '57', '0000-00-00', '0000-00-00'),
(50, 'KM', 'Comoros', 'COM', '269', '0000-00-00', '0000-00-00'),
(51, 'CG', 'Congo', 'COG', '242', '0000-00-00', '0000-00-00'),
(52, 'CK', 'Cook Islands', 'COK', '682', '0000-00-00', '0000-00-00'),
(53, 'CR', 'Costa Rica', 'CRI', '506', '0000-00-00', '0000-00-00'),
(54, 'CI', 'Cote d''ivoire (Ivory Coast)', 'CIV', '225', '0000-00-00', '0000-00-00'),
(55, 'HR', 'Croatia', 'HRV', '385', '0000-00-00', '0000-00-00'),
(56, 'CU', 'Cuba', 'CUB', '53', '0000-00-00', '0000-00-00'),
(57, 'CW', 'Curacao', 'CUW', '599', '0000-00-00', '0000-00-00'),
(58, 'CY', 'Cyprus', 'CYP', '357', '0000-00-00', '0000-00-00'),
(59, 'CZ', 'Czech Republic', 'CZE', '420', '0000-00-00', '0000-00-00'),
(60, 'CD', 'Democratic Republic of the Congo', 'COD', '243', '0000-00-00', '0000-00-00'),
(61, 'DK', 'Denmark', 'DNK', '45', '0000-00-00', '0000-00-00'),
(62, 'DJ', 'Djibouti', 'DJI', '253', '0000-00-00', '0000-00-00'),
(63, 'DM', 'Dominica', 'DMA', '1+767', '0000-00-00', '0000-00-00'),
(64, 'DO', 'Dominican Republic', 'DOM', '1+809, 8', '0000-00-00', '0000-00-00'),
(65, 'EC', 'Ecuador', 'ECU', '593', '0000-00-00', '0000-00-00'),
(66, 'EG', 'Egypt', 'EGY', '20', '0000-00-00', '0000-00-00'),
(67, 'SV', 'El Salvador', 'SLV', '503', '0000-00-00', '0000-00-00'),
(68, 'GQ', 'Equatorial Guinea', 'GNQ', '240', '0000-00-00', '0000-00-00'),
(69, 'ER', 'Eritrea', 'ERI', '291', '0000-00-00', '0000-00-00'),
(70, 'EE', 'Estonia', 'EST', '372', '0000-00-00', '0000-00-00'),
(71, 'ET', 'Ethiopia', 'ETH', '251', '0000-00-00', '0000-00-00'),
(72, 'FK', 'Falkland Islands (Malvinas)', 'FLK', '500', '0000-00-00', '0000-00-00'),
(73, 'FO', 'Faroe Islands', 'FRO', '298', '0000-00-00', '0000-00-00'),
(74, 'FJ', 'Fiji', 'FJI', '679', '0000-00-00', '0000-00-00'),
(75, 'FI', 'Finland', 'FIN', '358', '0000-00-00', '0000-00-00'),
(76, 'FR', 'France', 'FRA', '33', '0000-00-00', '0000-00-00'),
(77, 'GF', 'French Guiana', 'GUF', '594', '0000-00-00', '0000-00-00'),
(78, 'PF', 'French Polynesia', 'PYF', '689', '0000-00-00', '0000-00-00'),
(79, 'TF', 'French Southern Territories', 'ATF', '0', '0000-00-00', '0000-00-00'),
(80, 'GA', 'Gabon', 'GAB', '241', '0000-00-00', '0000-00-00'),
(81, 'GM', 'Gambia', 'GMB', '220', '0000-00-00', '0000-00-00'),
(82, 'GE', 'Georgia', 'GEO', '995', '0000-00-00', '0000-00-00'),
(83, 'DE', 'Germany', 'DEU', '49', '0000-00-00', '0000-00-00'),
(84, 'GH', 'Ghana', 'GHA', '233', '0000-00-00', '0000-00-00'),
(85, 'GI', 'Gibraltar', 'GIB', '350', '0000-00-00', '0000-00-00'),
(86, 'GR', 'Greece', 'GRC', '30', '0000-00-00', '0000-00-00'),
(87, 'GL', 'Greenland', 'GRL', '299', '0000-00-00', '0000-00-00'),
(88, 'GD', 'Grenada', 'GRD', '1+473', '0000-00-00', '0000-00-00'),
(89, 'GP', 'Guadaloupe', 'GLP', '590', '0000-00-00', '0000-00-00'),
(90, 'GU', 'Guam', 'GUM', '1+671', '0000-00-00', '0000-00-00'),
(91, 'GT', 'Guatemala', 'GTM', '502', '0000-00-00', '0000-00-00'),
(92, 'GG', 'Guernsey', 'GGY', '44', '0000-00-00', '0000-00-00'),
(93, 'GN', 'Guinea', 'GIN', '224', '0000-00-00', '0000-00-00'),
(94, 'GW', 'Guinea-Bissau', 'GNB', '245', '0000-00-00', '0000-00-00'),
(95, 'GY', 'Guyana', 'GUY', '592', '0000-00-00', '0000-00-00'),
(96, 'HT', 'Haiti', 'HTI', '509', '0000-00-00', '0000-00-00'),
(97, 'HM', 'Heard Island and McDonald Islands', 'HMD', '0', '0000-00-00', '0000-00-00'),
(98, 'HN', 'Honduras', 'HND', '504', '0000-00-00', '0000-00-00'),
(99, 'HK', 'Hong Kong', 'HKG', '852', '0000-00-00', '0000-00-00'),
(100, 'HU', 'Hungary', 'HUN', '36', '0000-00-00', '0000-00-00'),
(101, 'IS', 'Iceland', 'ISL', '354', '0000-00-00', '0000-00-00'),
(102, 'IN', 'India', 'IND', '91', '0000-00-00', '0000-00-00'),
(103, 'ID', 'Indonesia', 'IDN', '62', '0000-00-00', '0000-00-00'),
(104, 'IR', 'Iran', 'IRN', '98', '0000-00-00', '0000-00-00'),
(105, 'IQ', 'Iraq', 'IRQ', '964', '0000-00-00', '0000-00-00'),
(106, 'IE', 'Ireland', 'IRL', '353', '0000-00-00', '0000-00-00'),
(107, 'IM', 'Isle of Man', 'IMN', '44', '0000-00-00', '0000-00-00'),
(108, 'IL', 'Israel', 'ISR', '972', '0000-00-00', '0000-00-00'),
(109, 'IT', 'Italy', 'ITA', '39', '0000-00-00', '0000-00-00'),
(110, 'JM', 'Jamaica', 'JAM', '1+876', '0000-00-00', '0000-00-00'),
(111, 'JP', 'Japan', 'JPN', '81', '0000-00-00', '0000-00-00'),
(112, 'JE', 'Jersey', 'JEY', '44', '0000-00-00', '0000-00-00'),
(113, 'JO', 'Jordan', 'JOR', '962', '0000-00-00', '0000-00-00'),
(114, 'KZ', 'Kazakhstan', 'KAZ', '7', '0000-00-00', '0000-00-00'),
(115, 'KE', 'Kenya', 'KEN', '254', '0000-00-00', '0000-00-00'),
(116, 'KI', 'Kiribati', 'KIR', '686', '0000-00-00', '0000-00-00'),
(117, 'XK', 'Kosovo', '---', '381', '0000-00-00', '0000-00-00'),
(118, 'KW', 'Kuwait', 'KWT', '965', '0000-00-00', '0000-00-00'),
(119, 'KG', 'Kyrgyzstan', 'KGZ', '996', '0000-00-00', '0000-00-00'),
(120, 'LA', 'Laos', 'LAO', '856', '0000-00-00', '0000-00-00'),
(121, 'LV', 'Latvia', 'LVA', '371', '0000-00-00', '0000-00-00'),
(122, 'LB', 'Lebanon', 'LBN', '961', '0000-00-00', '0000-00-00'),
(123, 'LS', 'Lesotho', 'LSO', '266', '0000-00-00', '0000-00-00'),
(124, 'LR', 'Liberia', 'LBR', '231', '0000-00-00', '0000-00-00'),
(125, 'LY', 'Libya', 'LBY', '218', '0000-00-00', '0000-00-00'),
(126, 'LI', 'Liechtenstein', 'LIE', '423', '0000-00-00', '0000-00-00'),
(127, 'LT', 'Lithuania', 'LTU', '370', '0000-00-00', '0000-00-00'),
(128, 'LU', 'Luxembourg', 'LUX', '352', '0000-00-00', '0000-00-00'),
(129, 'MO', 'Macao', 'MAC', '853', '0000-00-00', '0000-00-00'),
(130, 'MK', 'Macedonia', 'MKD', '389', '0000-00-00', '0000-00-00'),
(131, 'MG', 'Madagascar', 'MDG', '261', '0000-00-00', '0000-00-00'),
(132, 'MW', 'Malawi', 'MWI', '265', '0000-00-00', '0000-00-00'),
(133, 'MY', 'Malaysia', 'MYS', '60', '0000-00-00', '0000-00-00'),
(134, 'MV', 'Maldives', 'MDV', '960', '0000-00-00', '0000-00-00'),
(135, 'ML', 'Mali', 'MLI', '223', '0000-00-00', '0000-00-00'),
(136, 'MT', 'Malta', 'MLT', '356', '0000-00-00', '0000-00-00'),
(137, 'MH', 'Marshall Islands', 'MHL', '692', '0000-00-00', '0000-00-00'),
(138, 'MQ', 'Martinique', 'MTQ', '596', '0000-00-00', '0000-00-00'),
(139, 'MR', 'Mauritania', 'MRT', '222', '0000-00-00', '0000-00-00'),
(140, 'MU', 'Mauritius', 'MUS', '230', '0000-00-00', '0000-00-00'),
(141, 'YT', 'Mayotte', 'MYT', '262', '0000-00-00', '0000-00-00'),
(142, 'MX', 'Mexico', 'MEX', '52', '0000-00-00', '0000-00-00'),
(143, 'FM', 'Micronesia', 'FSM', '691', '0000-00-00', '0000-00-00'),
(144, 'MD', 'Moldava', 'MDA', '373', '0000-00-00', '0000-00-00'),
(145, 'MC', 'Monaco', 'MCO', '377', '0000-00-00', '0000-00-00'),
(146, 'MN', 'Mongolia', 'MNG', '976', '0000-00-00', '0000-00-00'),
(147, 'ME', 'Montenegro', 'MNE', '382', '0000-00-00', '0000-00-00'),
(148, 'MS', 'Montserrat', 'MSR', '1+664', '0000-00-00', '0000-00-00'),
(149, 'MA', 'Morocco', 'MAR', '212', '0000-00-00', '0000-00-00'),
(150, 'MZ', 'Mozambique', 'MOZ', '258', '0000-00-00', '0000-00-00'),
(151, 'MM', 'Myanmar (Burma)', 'MMR', '95', '0000-00-00', '0000-00-00'),
(152, 'NA', 'Namibia', 'NAM', '264', '0000-00-00', '0000-00-00'),
(153, 'NR', 'Nauru', 'NRU', '674', '0000-00-00', '0000-00-00'),
(154, 'NP', 'Nepal', 'NPL', '977', '0000-00-00', '0000-00-00'),
(155, 'NL', 'Netherlands', 'NLD', '31', '0000-00-00', '0000-00-00'),
(156, 'NC', 'New Caledonia', 'NCL', '687', '0000-00-00', '0000-00-00'),
(157, 'NZ', 'New Zealand', 'NZL', '64', '0000-00-00', '0000-00-00'),
(158, 'NI', 'Nicaragua', 'NIC', '505', '0000-00-00', '0000-00-00'),
(159, 'NE', 'Niger', 'NER', '227', '0000-00-00', '0000-00-00'),
(160, 'NG', 'Nigeria', 'NGA', '234', '0000-00-00', '0000-00-00'),
(161, 'NU', 'Niue', 'NIU', '683', '0000-00-00', '0000-00-00'),
(162, 'NF', 'Norfolk Island', 'NFK', '672', '0000-00-00', '0000-00-00'),
(163, 'KP', 'North Korea', 'PRK', '850', '0000-00-00', '0000-00-00'),
(164, 'MP', 'Northern Mariana Islands', 'MNP', '1+670', '0000-00-00', '0000-00-00'),
(165, 'NO', 'Norway', 'NOR', '47', '0000-00-00', '0000-00-00'),
(166, 'OM', 'Oman', 'OMN', '968', '0000-00-00', '0000-00-00'),
(167, 'PK', 'Pakistan', 'PAK', '92', '0000-00-00', '0000-00-00'),
(168, 'PW', 'Palau', 'PLW', '680', '0000-00-00', '0000-00-00'),
(169, 'PS', 'Palestine', 'PSE', '970', '0000-00-00', '0000-00-00'),
(170, 'PA', 'Panama', 'PAN', '507', '0000-00-00', '0000-00-00'),
(171, 'PG', 'Papua New Guinea', 'PNG', '675', '0000-00-00', '0000-00-00'),
(172, 'PY', 'Paraguay', 'PRY', '595', '0000-00-00', '0000-00-00'),
(173, 'PE', 'Peru', 'PER', '51', '0000-00-00', '0000-00-00'),
(174, 'PH', 'Phillipines', 'PHL', '63', '0000-00-00', '0000-00-00'),
(175, 'PN', 'Pitcairn', 'PCN', 'NONE', '0000-00-00', '0000-00-00'),
(176, 'PL', 'Poland', 'POL', '48', '0000-00-00', '0000-00-00'),
(177, 'PT', 'Portugal', 'PRT', '351', '0000-00-00', '0000-00-00'),
(178, 'PR', 'Puerto Rico', 'PRI', '1+939', '0000-00-00', '0000-00-00'),
(179, 'QA', 'Qatar', 'QAT', '974', '0000-00-00', '0000-00-00'),
(180, 'RE', 'Reunion', 'REU', '262', '0000-00-00', '0000-00-00'),
(181, 'RO', 'Romania', 'ROU', '40', '0000-00-00', '0000-00-00'),
(182, 'RU', 'Russia', 'RUS', '7', '0000-00-00', '0000-00-00'),
(183, 'RW', 'Rwanda', 'RWA', '250', '0000-00-00', '0000-00-00'),
(184, 'BL', 'Saint Barthelemy', 'BLM', '590', '0000-00-00', '0000-00-00'),
(185, 'SH', 'Saint Helena', 'SHN', '290', '0000-00-00', '0000-00-00'),
(186, 'KN', 'Saint Kitts and Nevis', 'KNA', '1+869', '0000-00-00', '0000-00-00'),
(187, 'LC', 'Saint Lucia', 'LCA', '1+758', '0000-00-00', '0000-00-00'),
(188, 'MF', 'Saint Martin', 'MAF', '590', '0000-00-00', '0000-00-00'),
(189, 'PM', 'Saint Pierre and Miquelon', 'SPM', '508', '0000-00-00', '0000-00-00'),
(190, 'VC', 'Saint Vincent and the Grenadines', 'VCT', '1+784', '0000-00-00', '0000-00-00'),
(191, 'WS', 'Samoa', 'WSM', '685', '0000-00-00', '0000-00-00'),
(192, 'SM', 'San Marino', 'SMR', '378', '0000-00-00', '0000-00-00'),
(193, 'ST', 'Sao Tome and Principe', 'STP', '239', '0000-00-00', '0000-00-00'),
(194, 'SA', 'Saudi Arabia', 'SAU', '966', '0000-00-00', '0000-00-00'),
(195, 'SN', 'Senegal', 'SEN', '221', '0000-00-00', '0000-00-00'),
(196, 'RS', 'Serbia', 'SRB', '381', '0000-00-00', '0000-00-00'),
(197, 'SC', 'Seychelles', 'SYC', '248', '0000-00-00', '0000-00-00'),
(198, 'SL', 'Sierra Leone', 'SLE', '232', '0000-00-00', '0000-00-00'),
(199, 'SG', 'Singapore', 'SGP', '65', '0000-00-00', '0000-00-00'),
(200, 'SX', 'Sint Maarten', 'SXM', '1+721', '0000-00-00', '0000-00-00'),
(201, 'SK', 'Slovakia', 'SVK', '421', '0000-00-00', '0000-00-00'),
(202, 'SI', 'Slovenia', 'SVN', '386', '0000-00-00', '0000-00-00'),
(203, 'SB', 'Solomon Islands', 'SLB', '677', '0000-00-00', '0000-00-00'),
(204, 'SO', 'Somalia', 'SOM', '252', '0000-00-00', '0000-00-00'),
(205, 'ZA', 'South Africa', 'ZAF', '27', '0000-00-00', '0000-00-00'),
(206, 'GS', 'South Georgia and the South Sandwich Islands', 'SGS', '500', '0000-00-00', '0000-00-00'),
(207, 'KR', 'South Korea', 'KOR', '82', '0000-00-00', '0000-00-00'),
(208, 'SS', 'South Sudan', 'SSD', '211', '0000-00-00', '0000-00-00'),
(209, 'ES', 'Spain', 'ESP', '34', '0000-00-00', '0000-00-00'),
(210, 'LK', 'Sri Lanka', 'LKA', '94', '0000-00-00', '0000-00-00'),
(211, 'SD', 'Sudan', 'SDN', '249', '0000-00-00', '0000-00-00'),
(212, 'SR', 'Suriname', 'SUR', '597', '0000-00-00', '0000-00-00'),
(213, 'SJ', 'Svalbard and Jan Mayen', 'SJM', '47', '0000-00-00', '0000-00-00'),
(214, 'SZ', 'Swaziland', 'SWZ', '268', '0000-00-00', '0000-00-00'),
(215, 'SE', 'Sweden', 'SWE', '46', '0000-00-00', '0000-00-00'),
(216, 'CH', 'Switzerland', 'CHE', '41', '0000-00-00', '0000-00-00'),
(217, 'SY', 'Syria', 'SYR', '963', '0000-00-00', '0000-00-00'),
(218, 'TW', 'Taiwan', 'TWN', '886', '0000-00-00', '0000-00-00'),
(219, 'TJ', 'Tajikistan', 'TJK', '992', '0000-00-00', '0000-00-00'),
(220, 'TZ', 'Tanzania', 'TZA', '255', '0000-00-00', '0000-00-00'),
(221, 'TH', 'Thailand', 'THA', '66', '0000-00-00', '0000-00-00'),
(222, 'TL', 'Timor-Leste (East Timor)', 'TLS', '670', '0000-00-00', '0000-00-00'),
(223, 'TG', 'Togo', 'TGO', '228', '0000-00-00', '0000-00-00'),
(224, 'TK', 'Tokelau', 'TKL', '690', '0000-00-00', '0000-00-00'),
(225, 'TO', 'Tonga', 'TON', '676', '0000-00-00', '0000-00-00'),
(226, 'TT', 'Trinidad and Tobago', 'TTO', '1+868', '0000-00-00', '0000-00-00'),
(227, 'TN', 'Tunisia', 'TUN', '216', '0000-00-00', '0000-00-00'),
(228, 'TR', 'Turkey', 'TUR', '90', '0000-00-00', '0000-00-00'),
(229, 'TM', 'Turkmenistan', 'TKM', '993', '0000-00-00', '0000-00-00'),
(230, 'TC', 'Turks and Caicos Islands', 'TCA', '1+649', '0000-00-00', '0000-00-00'),
(231, 'TV', 'Tuvalu', 'TUV', '688', '0000-00-00', '0000-00-00'),
(232, 'UG', 'Uganda', 'UGA', '256', '0000-00-00', '0000-00-00'),
(233, 'UA', 'Ukraine', 'UKR', '380', '0000-00-00', '0000-00-00'),
(234, 'AE', 'United Arab Emirates', 'ARE', '971', '0000-00-00', '0000-00-00'),
(235, 'GB', 'United Kingdom', 'GBR', '44', '0000-00-00', '0000-00-00'),
(236, 'US', 'United States', 'USA', '1', '0000-00-00', '0000-00-00'),
(237, 'UM', 'United States Minor Outlying Islands', 'UMI', '0', '0000-00-00', '0000-00-00'),
(238, 'UY', 'Uruguay', 'URY', '598', '0000-00-00', '0000-00-00'),
(239, 'UZ', 'Uzbekistan', 'UZB', '998', '0000-00-00', '0000-00-00'),
(240, 'VU', 'Vanuatu', 'VUT', '678', '0000-00-00', '0000-00-00'),
(241, 'VA', 'Vatican City', 'VAT', '39', '0000-00-00', '0000-00-00'),
(242, 'VE', 'Venezuela', 'VEN', '58', '0000-00-00', '0000-00-00'),
(243, 'VN', 'Vietnam', 'VNM', '84', '0000-00-00', '0000-00-00'),
(244, 'VG', 'Virgin Islands, British', 'VGB', '1+284', '0000-00-00', '0000-00-00'),
(245, 'VI', 'Virgin Islands, US', 'VIR', '1+340', '0000-00-00', '0000-00-00'),
(246, 'WF', 'Wallis and Futuna', 'WLF', '681', '0000-00-00', '0000-00-00'),
(247, 'EH', 'Western Sahara', 'ESH', '212', '0000-00-00', '0000-00-00'),
(248, 'YE', 'Yemen', 'YEM', '967', '0000-00-00', '0000-00-00'),
(249, 'ZM', 'Zambia', 'ZMB', '260', '0000-00-00', '0000-00-00'),
(250, 'ZW', 'Zimbabwe', 'ZWE', '263', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `country-old`
--

CREATE TABLE IF NOT EXISTS `country-old` (
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
-- Dumping data for table `country-old`
--

INSERT INTO `country-old` (`id`, `slug`, `name`, `code`, `phone_code`, `status`, `created_at`, `updated_at`) VALUES
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
-- Table structure for table `domain_temp`
--

CREATE TABLE IF NOT EXISTS `domain_temp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain_temp`
--

INSERT INTO `domain_temp` (`id`, `name`, `price`, `status`) VALUES
(1, 'nidhi', 23, 1),
(2, 'surya', 23, 1),
(3, 'nikita', 34, 1),
(4, 'suman', 23, 1),
(5, 'ankita', 34, 1),
(6, 'anu', 34, 1),
(7, 'ankith', 45, 1),
(1, 'nidhi', 23, 1),
(2, 'surya', 23, 1),
(3, 'nikita', 34, 1),
(4, 'suman', 23, 1),
(5, 'ankita', 34, 1),
(6, 'anu', 34, 1),
(7, 'ankith', 45, 1),
(8, 'ram', 45, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

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
  `fund` float DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=318 ;

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
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`package_id`,`transaction_id`),
  KEY `transaction_id` (`transaction_id`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

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
  `no_of_pages` int(11) NOT NULL,
  `no_of_images` int(11) NOT NULL,
  `no_of_forms` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `start_date`, `end_date`, `coupon_code`, `amount`, `Description`, `no_of_pages`, `no_of_images`, `no_of_forms`, `status`, `created_at`, `update_at`) VALUES
(1, 'Basic', '2015-05-08', '2015-05-25', 0, 234, 'Domain\r\n250 Bandwidth\r\n4 Static pages\r\ncontact form\r\ngallery', 2, 3, 4, 1, '2015-06-05', '2015-06-05 06:52:26'),
(2, 'Advance', '2015-05-08', '2015-05-08', 23423423, 350, 'Domain\r\n550 Bandwidth\r\n6 Static pages\r\n1 contact form\r\n2 gallery', 0, 0, 0, 1, '2015-05-08', '2015-06-05 06:52:30'),
(4, 'Advance PRO', '0000-00-00', '0000-00-00', 0, 355, 'Domain 550 Bandwidth 6 Static pages 1 contact form 2 gallery   ', 2, 4, 1, 1, '2015-06-04', '2015-06-05 06:52:35'),
(5, 'level', '0000-00-00', '0000-00-00', 0, 1500, 'jajjajajjaja', 20, 100, 11, 1, '2015-06-04', '2015-06-05 06:52:40'),
(8, 'test', '0000-00-00', '0000-00-00', 0, 123, 'test', 5, 5, 5, 1, '2015-06-09', '2015-06-09 08:52:21'),
(9, 'testdemo', '0000-00-00', '0000-00-00', 0, 345, 'testdemo1234', 3, 4, 5, 0, '2015-06-12', '2015-06-12 05:54:14');

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
  `transaction_id` varchar(100) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

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
  `phone` varchar(100) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `skype_id` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `master_pin` varchar(100) NOT NULL DEFAULT '12345',
  `unique_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `activation_key` varchar(100) DEFAULT NULL,
  `forget_key` varchar(100) DEFAULT NULL,
  `forget_status` varchar(100) DEFAULT NULL,
  `role_id` tinyint(4) NOT NULL COMMENT '1:User,2:Admin',
  `social` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `sponsor_id`, `name`, `password`, `position`, `user_sponsor_id`, `full_name`, `email`, `country_id`, `country_code`, `phone`, `date_of_birth`, `skype_id`, `facebook_id`, `twitter_id`, `master_pin`, `unique_id`, `status`, `activation_key`, `forget_key`, `forget_status`, `role_id`, `social`, `created_at`, `updated_at`) VALUES
(1, '12345', 'admin', 'b3cea7bc884f358b2e1d59ca3f584949', 'left', 0, 'Ram Hemareddy', 'kushwantbhansali001@gmail.com', 1, 1, '1234567890', '2015-05-15', 'sdfasdf', 'dsafsd', 'fdsaf', 'ce92828355e8df5f2c0118789c65847f', '', 1, '0', '', '', 2, '', '2015-05-14', '2015-06-09 10:04:49'),
(3, 'sury631016', 'hemareddy', '25b8a852f79a0c62e9e4c3db2108bf45', 'left', 0, 'Amogh', 'nidhi.sati@maverickinfosoft.com', 1, 91, '9986575577', '2015-10-30', 'nidhi86', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '1013629720195', 'aGVtYXJlZGR5LS0yMDE1LTEwLTMw', '1', 1, '', '2015-05-14', '2015-06-10 04:52:20'),
(5, 'nidh510306', 'nidhi', '827ccb0eea8a706c4c34a16891f84e7b', 'right', 0, 'nidhi sati', 'nehanidhi.20081@gmail.com', 1, 91, '1234567890', '1951-03-06', NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '40ebe644746748a71c22fa32ed263ebe', NULL, NULL, 1, '', '2015-05-19', '2015-06-08 08:44:51'),
(7, 'nidh510304', 'nidhi86', '827ccb0eea8a706c4c34a16891f84e7b', 'left', 0, 'nidhi mishra', 'nidhi.sati@maverickinfosoft.com', 1, 91, '2147483647', '1951-03-04', '', '', 'hemareddy', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, 1, '', '2015-05-20', '2015-06-09 12:44:26'),
(8, 'nidh510304', 'nidhi89', 'e10adc3949ba59abbe56e057f20f883e', 'left', 0, 'nidhi mishra', 'nidhisati86@gmail.com', 1, 91, '2147483647', '1951-03-04', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '', 1, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1, '', '2015-05-20', '2015-05-26 12:13:43'),
(9, 'admin', 'Ram', 'cd54dcc3bfd0a46070d85f99e5880342', 'right', 0, 'Ram Hemareddy', 'ram@gmail.com', 0, 0, '0', '2011-05-04', NULL, NULL, NULL, 'cd54dcc3bfd0a46070d85f99e5880342', '631935326943404', 1, NULL, NULL, NULL, 1, '', '2015-06-01', '2015-06-04 14:32:48'),
(10, 'admin', 'swathi', '46eafc3f1b688c52837ef0c7fa2018f9', 'right', 0, 'swathi.rl', 'swathi.rl@maverickinfosoft.com', 1, 91, '2147483647', '1989-04-03', '', '', '', 'd8ecd4e7a1dba725d1179c30cb2531c5', '', 1, 'cf02834b6264a20c8463b660828d8b05', NULL, NULL, 1, '', '2015-06-01', '2015-06-08 15:38:25'),
(16, 'swathi', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'left', 0, 'test1', 'test1@gmail.com', 1, 91, '2147483647', '1965-09-16', NULL, NULL, NULL, '2c7d9f739097070092b133dd4c0adbf9', '', 2, '5b6457316519660ce7cea90eb1d4b708', NULL, NULL, 1, '', '2015-06-02', '2015-06-08 15:33:05'),
(18, 'admin', 'Suraj', '33681279c167c7fcd2997ed72cfb4c4a', 'right', 0, 'Suraj Asati', 'suraj.1312311@gmail.com', 0, 0, '0', '2011-05-04', NULL, NULL, NULL, '33681279c167c7fcd2997ed72cfb4c4a', '1151285834897384', 1, NULL, NULL, NULL, 1, '', '2015-06-03', '2015-06-04 14:25:27'),
(19, 'admin', 'surajasati111', '245f51ac69a8f9b4e2b16052b832a1f6', 'left', 0, 'Suraj Asati', '', 0, 0, '0', '0000-00-00', NULL, NULL, NULL, '245f51ac69a8f9b4e2b16052b832a1f6', '287596310', 1, NULL, NULL, NULL, 1, '', '2015-06-03', '2015-06-03 12:25:30'),
(20, 'swathi', 'NehaS', 'e8fb4fea246e4e7941f23efcc2442bfc', 'right', 0, 'Neha Srivastava', 'neha.sritava@gmail.com', 1, 91, '1234567891', '0000-00-00', NULL, NULL, NULL, '5dc2596e6bd8d9a511a4af7e6d1fef81', '', 1, '4bc058e2e43593993134102a1927093c', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:16'),
(21, 'admin', 'master', '7f0b7ad9228d90b5b5304c4e74617dd4', 'right', 0, 'Master Ram', 'ramhemareddy12@gmail.com', 1, 91, '2147483647', '0000-00-00', NULL, NULL, NULL, '8b1fb3312b74d8dd159e15fc6c2b9a23', '', 0, '70aaceccb9ee9075a8b0e5f33c830f12', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:21'),
(22, 'surajasati111', 'test111', 'a6c28e91e9c720902e2ac2337cdae9a4', 'right', 0, 'test111', 'test111@gmail.com', 1, 91, '2147483647', '0000-00-00', NULL, NULL, NULL, '55c6017b10a9755ef3681b09ccb01e94', '', 0, '95b023002fe152e07fa2faf1548af2bd', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:41'),
(24, 'admin', 'mastermind', '65aa56e45e0bfb0a103498f5c6a14973', 'right', 0, 'Master', 'ramhemareddy22@gmail.com', 1, 91, '1987654323', '0000-00-00', NULL, NULL, NULL, '70933ed510f3c50e1ebf98ef8c6625c2', '', 0, '74d2306cc2db3362e5505044687ef4bf', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:44'),
(26, 'admin', 'testing13123', '2676d2fd81f1789fd9ebc8fcdc592339', 'right', 0, 'Testing', 'ramhemareddy23423@gmail.com', 1, 91, '1234535345', '0000-00-00', NULL, NULL, NULL, '2c65c703e76038d3dee71ea44a8aad74', '', 1, 'f492ff4d4a785f3ca658ec49628addaf', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:47'),
(27, 'admin', 'suraj123', '6f94c06177ffbc6817b0cdc56dec9c01', 'right', 0, 'Suraj Asati', 'suraj.asati11133@gmail.com', 1, 91, '2147483647', '0000-00-00', NULL, NULL, NULL, '0a187866618ca3049030ec5014860ae8', '', 1, '5906c69ed5a4b16d4890e16de54f4a3a', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:50'),
(28, 'admin', 'testingfdagd', 'd5ed1c2b144bafdfb33926eb36da9db1', 'right', 0, 'Cool Testing', 'ramhemareddy222@gmail.com', 1, 91, '1321321312', '0000-00-00', NULL, NULL, NULL, 'd5cc7743b1af1094b27afd0cccd8faee', '', 1, '6f931a8a0286d69462b4714dada8648f', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:53'),
(29, 'admin', 'testing123', 'fde1ff9e29268d78600752e7c1002581', 'right', 0, 'Testing 123', 'ramhemareddy122@gmail.com', 1, 91, '1212323123', '0000-00-00', NULL, NULL, NULL, '94f2997c96b61f9f3cd816418d376ff9', '', 0, '4a343fd43796ce45d093151a23196b04', NULL, NULL, 1, '', '2015-06-04', '2015-06-08 15:32:56'),
(30, 'admin', 'ram1234', '42e65f27cb05373f8f6e3e121f9cc7f8', 'right', 0, 'Ram 1234', 'ramhemareddy12345@gmail.com', 1, 91, '1323123123', '0000-00-00', NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '26b79ce11e89ba1f366fbcb9f901a866', 'cmFtMTIzNC0tMDAwMC0wMC0wMA==', '1', 1, '', '2015-06-04', '2015-06-11 10:21:57'),
(31, 'admin', 'testtest', '03b9ed14fd02834a098334de98e8f684', 'right', 0, 'testtest', 'suraj.asati111@gmail.com', 1, 91, '2147483647', '0000-00-00', NULL, NULL, NULL, 'e17d574a9ac6743fda8847722a2ce8c3', '', 0, '14b1e40630f937dd3f925751d7fad010', NULL, NULL, 1, '', '2015-06-04', '2015-06-04 16:08:30'),
(32, 'admin', 'qweytv', '160011602eab39ce63ce8817aa3cc189', 'right', 0, 'kush jain', 'kushwant001@gmail.com', 1, 91, '9874563210', '1993-11-20', 'fsfsfsf', 'fsffsfs', 'fsfsfsf', '3d2172418ce305c7d16d4b05597c6a59', '', 1, '22b48f09bb837ff6d1ef07cde7657a20', 'cXdleXR2LS0wMDAwLTAwLTAw', '1', 1, '', '2015-06-04', '2015-06-08 18:15:32'),
(33, 'admin', 'robin carter', 'e10adc3949ba59abbe56e057f20f883e', 'right', 0, 'robin carter', 'robin.santiago010@gmail.com', 1, 91, '2147483647', '0000-00-00', NULL, NULL, NULL, '7d5a3c270200daf0475c1f217910f982', '', 1, '0de99c3b8e31c31e39aa7c46416dd732', NULL, NULL, 1, '', '2015-06-05', '2015-06-05 06:22:16'),
(34, 'nehas', 'mona s', '774e0ecb6ecff417c44413c290255a20', 'left', 0, 'mona Sri', 'neha.moni91@gmail.com', 1, 91, '1234567897', '0000-00-00', '', '', '', '836082d549f4deda76377758afa279f6', '', 1, 'adb87078db5116f7716474b74dbfe115', 'bW9uYSBzLS0wMDAwLTAwLTAw', '1', 1, '', '2015-06-05', '2015-06-05 14:09:18'),
(35, 'swathi', 'sneha', 'a1ef4e6dee15728a4137686c98494d86', 'right', 0, 'sneharao', 'sneharao138@gmail.com', 1, 91, '2147483647', '0000-00-00', '', 'sneharao/facebook', '', 'd3b0ccb6a1a32b2594084f0da668615d', '', 0, '1eff1af576e6452d8c126a410ce58520', 'c25laGEtLTAwMDAtMDAtMDA=', '1', 1, '', '2015-06-05', '2015-06-05 14:45:15'),
(36, 'mona s', 'RL Swathi', 'c4f8e9ce8757738a55b40ba846d273da', 'right', 0, 'Swathi Maverick', 'nehasai28@gmail.com', 1, 91, '2147483647', '0000-00-00', NULL, NULL, NULL, 'b0199c060aaef7f56d1995e3e4bf8f8e', '', 1, '1dac1516539536dbe1486bc7393be68f', 'UkwgU3dhdGhpLS0wMDAwLTAwLTAw', '1', 1, '', '2015-06-05', '2015-06-05 15:13:39'),
(39, 'hemareddy', 'nidsati', '72f12916c40675532163fa9680962543', 'right', 0, 'nidhimish', 'nidhi.sati@maverickinfosoft.com', 1, 91, '1234567890', '0000-00-00', NULL, NULL, NULL, '9ff3e121444c4d8c0efd009c98147f72', '', 1, 'bc03f81167c3cf5e4c7a6b0e6b5f73a7', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 09:18:48'),
(40, '', 'support@mglobally.com', '', NULL, 0, 'support', '', 0, 0, '0', '', NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, 2, '', '2015-06-05', '2015-06-08 15:33:23'),
(41, '', 'info@mglobally.com', '', NULL, 0, 'info', '', 0, 0, '0', '', NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, 2, '', '2015-06-05', '2015-06-08 15:33:28'),
(42, '', 'sales', '', NULL, 0, 'sales', 'sales@mglobally.com', 0, 0, '0', '', NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, 2, '', '2015-06-05', '2015-06-08 15:33:33'),
(43, '', 'marketing@mglobally.com', '', NULL, 0, 'marketing', '', 0, 0, '0', '', NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, 2, '', '2015-06-01', '2015-06-08 15:33:39'),
(44, 'admin', 'Sadanand111', '3d4ec193bfe8c6545d53b0d894fd669d', 'left', 0, 'Sadanand Kenganal', 'sadananda.kenganal111@gmail.com', 0, 0, '0', '2011-05-04', NULL, NULL, NULL, '6aeb3208dc5a2684a711578fbfdc3121', '1139370569422011', 1, NULL, 'U2FkYW5hbmQtLTIwMTEtMDUtMDQ=', '1', 1, '', '2015-06-08', '2015-06-08 15:46:14'),
(45, 'admin', 'hreeee', '98c1bcf998cefb32977372fdad1d9a9d', 'right', 0, 'asasasasasas', 'n@gmail.com', 1, 91, '1234567890', '', NULL, NULL, NULL, '90bc540ea6ddce2fa70fa73dcffaba29', '', 0, '4a810e7f18b489331398c13193e89e44', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 15:08:13'),
(46, 'admin', 'hemmmm', '8f0a90a63733ffad02b53889e21b29bf', 'right', 0, 'ankith pant', 'nehanidhi.2008@gmail.com', 1, 91, '1234567890', '', NULL, NULL, NULL, '95d8f6ff68222377d570a652eb96f082', '', 0, 'daac77bc00d5306ae79d891720c132bc', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 15:11:24'),
(47, 'admin', 'Swati', 'f8655fa468c33097d8b0840a0bf65793', 'left', 0, 'Swati Rl', 'swathilalitharam@gmail.com', 0, 0, '0', '2011-05-04', NULL, NULL, NULL, 'f8655fa468c33097d8b0840a0bf65793', '471387353029651', 1, NULL, NULL, NULL, 1, '', '2015-06-08', '2015-06-08 15:15:18'),
(48, 'Sadanand', 'Sadanand12345', '54ac54bf92cc2877b34b9fd4ca1f8a81', 'right', 0, 'sadananda', 'sadanandkenganal@gmail.com', 1, 91, '2147483647', '', NULL, NULL, NULL, '401fd95bf6799fe9dad285c30f898cac', '', 0, '090160e2973d6610158e85ec0ee23439', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 15:16:29'),
(50, 'admin', 'swathhi', 'acbca22477bc4578788795eefdccdc89', 'right', 0, 'swathi', 'swathi4321567@gmail.com', 1, 91, '1234567876', '', NULL, NULL, NULL, '22f4700139f7afad5efdce094bb9a8a5', '', 0, '0fe9d70cb1411b9cdaeee1c5bf6e33a6', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 15:36:57'),
(51, 'nidhi89', 'hillo', '4363137f5f83eadeb986fd500bd1fdec', 'right', 0, 'hillos', 'nehasrivastava0533@gmail.com', 1, 91, '2147483647', '1969-12-31', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '955996ef554706b9b449566a2172a3a4', 'aGlsbG8tLQ==', '1', 1, '', '2015-06-08', '2015-06-08 15:41:41'),
(52, 'admin', 'swati98765', '37e2197bed150d0953399dd7cf3e62a0', 'right', 0, 'swathi98', 'rlswati98765@gmail.com', 1, 91, '2147483647', '', NULL, NULL, NULL, 'ae56929f9bc01b3f029f11ce9b3eba43', '', 1, '86c1be965aa17925c117dca7206fd52f', 'c3dhdGk5ODc2NS0t', '1', 1, '', '2015-06-08', '2015-06-08 15:44:09'),
(53, 'admin', 'sadanand', '885f1a07fc055138da288cbb877a25ef', 'right', 0, 'sadanand', 'sadananda.kenganal@gmail.com', 1, 91, '2147483647', '', NULL, NULL, NULL, '763ffa900ad58c49d9b5f089f4ec3b2a', '', 1, 'b536f7e41a8465ff6f363abfd3a20a0e', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 15:46:50'),
(54, 'nidsati', 'sandeepb', '00dcf16d903e5890aaba465b0b1ba51f', 'right', 0, 'Sandeep Babu', 'sandeepweb7@gmail.com', 1, 91, '1234567891', '', NULL, NULL, NULL, 'd964173dc44da83eeafa3aebbee9a1a0', '', 1, '92818115113ff81aeff12940df17e10a', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 16:02:39'),
(55, 'admin', 'sandeep', '5e649b9cc286aca90a8d91846304c8ff', 'right', 0, 'sandeep kumar', 'sandeep.kumar@maverickinfosoft.com', 1, 91, '8888888888', '', NULL, NULL, NULL, 'a19599d637c08bdc0e3bfbc20aaf20ea', '', 1, '8bec5f99b86d5f31ad1bf053d6ba9998', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 16:21:50'),
(56, 'nidsati', 'sandu', 'e2d63e37ac8b2e58a20bfe1e22e51cd6', 'right', 0, 'sandu', 'sandeepmca4@gmail.com', 1, 91, '2587413698', '', NULL, NULL, NULL, 'c28a9ff5d5fe67e0993b9204c6a7a81e', '', 1, '12de7e7b666699eb2fcf1527fe29e74a', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 16:22:14'),
(57, 'admin', 'qweyt', '7e6e72a8958728a4853bc31345f2355f', 'right', 0, 'kush jain', 'mglobal09@gmail.com', 1, 91, '9876654123', '', NULL, NULL, NULL, 'b55d83ccddafa95f0dddb6e63d593cc9', '', 1, '4288c3c7908207dc3c258ddc759019e6', NULL, NULL, 1, '', '2015-06-08', '2015-06-08 17:41:38'),
(58, 'admin', 'riteshdobhal', '93e445038df28121cac52586cfb9eaef', 'right', 0, 'ritesh', 'riteshdobhal111@gmail.com', 1, 91, '8179350914', '2007-04-13', '', '', '', '6cc5a3e8b68a97ca3cea363febf87151', '', 1, '2fe3a3b7d436011b2cb9102f613bcd57', 'cml0ZXNoZG9iaGFsLS0yMDA3LTA0LTEz', '1', 1, '', '2015-06-08', '2015-06-08 20:09:09'),
(59, 'admin', 'swetha', 'bb3f3c7665f0cefa184804c4a239e1b0', 'right', 0, 'swetha', 'swetha.pg@maverickinfosoft.com', 1, 91, '8095548004', '', NULL, NULL, NULL, '6e7222ccc5a07f592132ef871b58e08d', '', 1, 'a69836dea7565fffc7e1267375c8caa7', 'c3dldGhhLS0=', '1', 1, '', '2015-06-09', '2015-06-09 05:41:38'),
(60, 'admin', 'mmmmaaaamm', 'df16c10b7db5aeeb2e13fd66140bc268', 'right', 0, 'sbudh', 'dvldn@mailinator.com', 1, 91, '9876654123', '', NULL, NULL, NULL, '62ad044325613ca7658d8feded658584', '', 0, 'c34e0a78ab594902dc184cb78e93098f', NULL, NULL, 1, '', '2015-06-09', '2015-06-09 06:08:25'),
(61, 'admin', 'kumar', '827ccb0eea8a706c4c34a16891f84e7b', 'right', 0, 'Kumar', 'Sadananda.kenganal@maverickinfosoft.com', 1, 91, '8095548004', '1969-12-03', 'skype@123.com', 'facebook@123.com', 'twitter@123.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '9bb464d42e0b6d05f3da0ad58a6a3a72', 'a3VtYXItLQ==', '1', 1, '', '2015-06-09', '2015-06-09 06:17:02'),
(62, 'kumar', 'Sahil', '4824c3e1b8f0e3ca4df7f2702eea2344', 'right', 0, 'Sahil', 'sahil.gupta@maverickinfosoft.com', 1, 91, '8095548004', '', NULL, NULL, NULL, '8dc2521a115a3f54b5fbba604c679590', '', 1, 'ae3dfdb8d0d424c38d4f7f63135465e6', NULL, NULL, 1, '', '2015-06-09', '2015-06-09 06:27:32'),
(63, 'Sadanand', 'test123', 'a62aa6bc380cac35db2224b0ef5c7258', 'right', 0, 'test123', 'tesasdat@gmail.com', 1, 91, '8095548004', '', NULL, NULL, NULL, '307f9eb8397a08703db9f7f66fcaf8c3', '', 0, '86f92d3651fa0b421cf4454c5dab85c5', NULL, NULL, 1, '', '2015-06-09', '2015-06-09 08:47:29'),
(64, 'admin', 'test567', 'd2d7445e784f88ce159e708029859938', 'right', 0, 'test567', 'test567@gmail.com', 1, 91, '8095548004', '', '', '', '', 'a1c62fbf4642034e14471693862c7434', '', 1, '30b9856b09c4e925bc5ab387830c4bfb', NULL, NULL, 1, '', '2015-06-09', '2015-06-12 05:32:16'),
(65, 'hemareddy', 'nidsah', '4c34485ea33f91a637fcc45803bb4b04', 'right', 0, 'nidhi321321', 'nids@gmail.com', 1, 91, '9986575577', '', NULL, NULL, NULL, '54492a88083312aefd7646573eecfc9e', '', 0, '9f2af7b17507b0b86c3bfc6e84c2ffad', NULL, NULL, 1, '', '2015-06-09', '2015-06-09 09:49:48'),
(66, 'hemareddy', 'sandeeps', '6d108e4ef79b565c61072e8d3a1b5a78', 'right', 0, 'sandeep babu', 'sandy@gmail.com', 1, 91, '4343434343', '', NULL, NULL, NULL, '53e4591566c13f591466bb26220116dc', '', 1, '6debc1f9dbac47b19208f92988a55efa', NULL, NULL, 1, 'fb', '2015-06-09', '2015-06-09 10:00:21'),
(68, 'swathi', 'sneharao', '72a0b776e2530f8b05d4a7a04a161ca9', 'right', 0, 'sneharao', 'sneharao.276@rediffmail.com', 1, 91, '9638527412', '', NULL, NULL, NULL, '3632435cf99eec2a53ee7e4d8eeab451', '', 0, '04928d201df49b739fcfcc28b0844928', 'c25laGFyYW8tLQ==', '1', 1, '', '2015-06-10', '2015-06-10 14:20:22'),
(69, 'admin', 'sneharao99', '62bd2cd1802cf60f7d0cd68bb0effbe6', 'right', 0, 'sneharao', 'sneharao99@yahoo.in', 1, 91, '9986532147', '', NULL, NULL, NULL, '80e3536ee193b1519fdbf2da3ff5f84f', '', 1, '20e6e02c57ffc90d1a43ac1fc125e365', NULL, NULL, 1, '', '2015-06-10', '2015-06-10 14:25:16'),
(70, 'admin', 'Swathitest', '610af0b375c2965ea234d660bece6b53', 'right', 0, 'swathitest', 'rlsahana27@gmail.com', 1, 91, '7894561236', '', NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '11ff98b0c1e15c8c290a20f186d3dd7a', 'U3dhdGhpdGVzdC0t', '1', 1, '', '2015-06-10', '2015-06-10 14:32:02'),
(71, 'admin', 'arpithama', 'e0f8839a2e50e429f3bcf85b65cc8765', 'right', 0, 'arpitha', 'arpithama123@gmail.com', 1, 91, '7896541236', '', NULL, NULL, NULL, '35dcd930df68a3b6194ad8764644721d', '', 1, 'c680ca9777d2f8d768bdfcb23d56f685', 'YXJwaXRoYW1hLS0=', '1', 1, '', '2015-06-10', '2015-06-10 15:03:19'),
(72, 'admin', 'swethapg', '1213481ddbcb545b06daf56d92db7571', 'right', 0, 'swethapg', 'pg.swetha20@yahoo.in', 1, 91, '8095548004', '', NULL, NULL, NULL, '087bc7552322045ad94868390dce5b37', '', 1, 'a9e433288f34240be67f3d4ce2cd0f05', NULL, NULL, 1, '', '2015-06-11', '2015-06-11 05:15:17'),
(73, 'admin', 'sadaradif', 'b8010147f145f7077aa0d1246d127fb2', 'right', 0, 'sadaradif', 'sadanandkenganal@rediffmail.com', 1, 91, '8095548004', '', NULL, NULL, NULL, 'c34a21126c8d41640188993dd093d25e', '', 0, '473a4179f3cebcfd4c2ebfec20ff66f5', NULL, NULL, 1, '', '2015-06-11', '2015-06-11 06:06:30'),
(75, 'admin', 'anushreema', '9ea76093136396663edcb53edd9645ff', 'right', 0, 'anushreema', 'anushreema@gmail.com', 102, 91, '7538529512', '', NULL, NULL, NULL, '59bf3958a6ff253e596c3a9bb9ecd1f2', '', 0, 'c738ef06f9cd01beed8910263e5c37fc', NULL, NULL, 1, '', '2015-06-11', '2015-06-11 14:27:37'),
(76, 'admin', 'masterman', 'fed43ab5379ee36458593489c691f367', 'right', 0, 'Master Man', 'ramhemareddy@gmail.com', 102, 91, '1234567896', '', NULL, NULL, NULL, '9dd16e049becf4d5087c90a83fea403b', '', 1, 'a6e78b109456731a39348c513e40c5cc', NULL, NULL, 1, '', '2015-06-11', '2015-06-11 14:50:17'),
(77, 'admin', 'mailinator', '6fce8d906c8c5f74324babd7c0631036', 'right', 0, 'mailinator', 'mailinator@mailinator.com', 102, 91, '9632658965', '', NULL, NULL, NULL, 'a5e48462a4b1598a5ad81fbdac50ed23', '', 1, '0aca8e48d503748c9348143bb616168c', 'bWFpbGluYXRvci0t', '1', 1, '', '2015-06-11', '2015-06-11 14:52:25'),
(78, 'admin', 'anushree', '4303105e920af9205d0307f2a2fe13b4', 'right', 0, 'anushree', 'anushreema3@gmail.com', 102, 91, '7485963212', '', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '0b18743a1ab3e985dc2c6672da7bc626', 'YW51c2hyZWUtLQ==', '1', 1, '', '2015-06-11', '2015-06-12 05:30:50'),
(79, 'Sahil', 'sahilleft', 'f251ceb2c45f0b27d2ddbfcd90a57742', 'left', 0, 'sahilleft', 'sahilleft@gmail.com', 102, 91, '8095548004', '', NULL, NULL, NULL, 'c927f855791073cb9fa5b8264453fa21', '', 0, 'd2ff52d3045b633c73293dc6b41f6a68', NULL, NULL, 1, '', '2015-06-12', '2015-06-12 09:40:04'),
(80, 'kumar', 'leftchecked', '9b92d24862374df282b0310f5dff6d07', 'left', 0, 'leftchecked', 'leftchecked@gmail.com', 102, 91, '8095548004', '', NULL, NULL, NULL, 'e5c69c0e3063671d1cd77ef51c041b83', '', 0, '88080b1bc1d4d87c420551346bf04140', NULL, NULL, 1, '', '2015-06-12', '2015-06-12 09:42:27'),
(81, 'leftchecked', 'leftchil1', '7ff218a55b344ced0ca19fbaa06d1481', 'left', 0, 'leftchil1', 'leftchil1@gmail.com', 102, 91, '8095548004', '', NULL, NULL, NULL, '98395fdd0314b312d24c9594e0c4ad72', '', 0, '23c751176956b69ad808762dba8d1cdb', NULL, NULL, 1, '', '2015-06-12', '2015-06-12 09:43:44'),
(82, 'leftchecked', 'rightchil1', 'd5c5fdea58373a2733facd9dc9560127', 'right', 0, 'rightchil1', 'rightchil1@gmail.com', 102, 44, '8095548004', '', NULL, NULL, NULL, '2c19c8daab0288cfce5172b551ff6d00', '', 0, '6ef97c7568347beaae8abd2f672104f5', NULL, NULL, 1, '', '2015-06-12', '2015-06-12 09:44:43'),
(83, 'admin', 'riteshdobhal', 'edc7e37871ae92b11022debc642c97a4', 'right', 0, 'ritesh dobhal', 'riteshdobhal001@gmail.com', 102, 91, '7896541230', '', NULL, NULL, NULL, '592d39205bdaa0ea4ae83e7397ec9416', '', 1, '61b046dda8e439dac2750de833db0475', NULL, NULL, 1, '', '2015-06-13', '2015-06-13 05:50:49'),
(84, 'admin', 'robin', '510e2cd7246a5e2fd3a034be2500d923', 'right', 0, 'robin carter', 'prathik.khadgi001@gmail.com', 13, 127, '7845163789', '', NULL, NULL, NULL, '256d3a396dad94e7317a4531489a2a3b', '', 1, '54ed965b8b34e602c4bf822661c2b70f', NULL, NULL, 1, '', '2015-06-13', '2015-06-13 06:02:10'),
(85, 'admin', 'qweytnnn', '7072a64b574480401299b2d234d1a782', 'right', 0, 'kush jain', 'sdfghjkl@mailinator.com', 16, 127, '0784520215', '', NULL, NULL, NULL, 'b3482fa2cd8ff1be16d33b6446129b2b', '', 1, '191c0c1e8e62a948e6363e515f082f1f', NULL, NULL, 1, '', '2015-06-13', '2015-06-13 09:39:13'),
(86, 'admin', 'mastermoon', '44cad62a75c168b28ef1504f5a509036', 'right', 0, 'Master moon', 'mastermoon@mailinator.com', 10, 1, '1312312312', '', NULL, NULL, NULL, '94bc2d7bde46c9df3a2647a6c78144c0', '', 1, 'c952d2743046b013e60297af4f053b9c', NULL, NULL, 1, '', '2015-06-13', '2015-06-13 10:04:20'),
(87, 'admin', 'goodgood', 'a8b20bd9fa68419c689de3c0ded02971', 'right', 0, 'Good Man', 'goodgood@mailinator.com', 2, 127, '1111111111', '1969-12-31', '', '', '', '86f98d464995ea1c70b48f60e4366a09', '', 1, '5b9588ef876a61ba93fcf42ddfaba6d6', NULL, NULL, 1, '', '2015-06-13', '2015-06-13 10:09:39'),
(88, 'admin', 'Abcd1', '80f02cd83010ef050adbd61028d27927', 'right', 0, 'kush jain', 'Abcd1@mailinator.com', 16, 127, '9876654123', '', NULL, NULL, NULL, 'a23f9327866d3bafd064964c9f0fcb6f', '', 1, '8898de02fe9f93f5c0200a11a52f19ba', NULL, NULL, 1, '', '2015-06-13', '2015-06-13 10:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_social_account`
--

CREATE TABLE IF NOT EXISTS `user_has_social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:facebook,2:twitter',
  `auth_id` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_template`
--

CREATE TABLE IF NOT EXISTS `user_has_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `publish` int(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `user_menu` text NOT NULL,
  `temp_header` text NOT NULL,
  `temp_body` text NOT NULL,
  `temp_footer` text NOT NULL,
  `template_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `order_id` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `custom_css` text NOT NULL,
  `custom_js` text NOT NULL,
  `logo_height` varchar(11) NOT NULL,
  `logo_width` varchar(11) NOT NULL,
  `contact_form` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_pages`
--

CREATE TABLE IF NOT EXISTS `user_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `created_at` date NOT NULL,
  `page_form` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

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
  `document_status` int(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`city_name`,`state_name`,`country_id`),
  KEY `referral_banner_id` (`referral_banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_shared_ad`
--

CREATE TABLE IF NOT EXISTS `user_shared_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `social_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`user_id`),
  KEY `social_id` (`social_id`),
  KEY `ad_id` (`ad_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `build_temp`
--
ALTER TABLE `build_temp`
  ADD CONSTRAINT `build_temp_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `build_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `build_temp_ibfk_2` FOREIGN KEY (`temp_header_id`) REFERENCES `build_temp_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `build_temp_ibfk_4` FOREIGN KEY (`temp_footer_id`) REFERENCES `build_temp_footer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country-old` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country-old` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `user_has_social_account`
--
ALTER TABLE `user_has_social_account`
  ADD CONSTRAINT `user_has_social_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`referral_banner_id`) REFERENCES `referral_banner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_shared_ad`
--
ALTER TABLE `user_shared_ad`
  ADD CONSTRAINT `user_shared_ad_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_shared_ad_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_shared_ad_ibfk_3` FOREIGN KEY (`social_id`) REFERENCES `user_has_social_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
