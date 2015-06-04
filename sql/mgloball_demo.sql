-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2015 at 04:41 AM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mgloball_demo`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`category_id`,`temp_header_id`,`temp_body_id`,`temp_footer_id`),
  KEY `category_id` (`category_id`),
  KEY `temp_header_id` (`temp_header_id`),
  KEY `temp_body_id` (`temp_body_id`),
  KEY `temp_footer_id` (`temp_footer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `build_temp`
--

INSERT INTO `build_temp` (`id`, `template_id`, `category_id`, `temp_header_id`, `temp_body_id`, `temp_footer_id`, `status`, `created_at`, `updated_at`, `folderpath`, `screenshot`) VALUES
(13, 50, 1, 50, 22, 22, 0, '2015-05-30', '2015-05-29 18:30:00', '14329997691427690748hardware2', '1432999769cont3.jpg');

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

--
-- Dumping data for table `build_temp_body`
--

INSERT INTO `build_temp_body` (`id`, `body_content`, `status`, `created_at`, `updated_at`) VALUES
(22, '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', 0, '2015-05-30', '2015-05-30 15:29:29');

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

--
-- Dumping data for table `build_temp_footer`
--

INSERT INTO `build_temp_footer` (`id`, `footer_content`, `created_at`, `updated_at`) VALUES
(22, '<div class="footer-bg">\r\n<div class="wrap">\r\n	<div class="footer-grid">\r\n		<h3>About Us</h3>\r\n		<ul>\r\n			<li><a href="#">Online Shopping</a></li>\r\n			<li><a href="#">Finnace Service</a></li>\r\n			<li><a href="#">Marketing</a></li>\r\n			<li><a href="#">Econamic News</a></li>\r\n			<li><a href="#">Business Help</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="footer-grid">\r\n		<h3>Pages</h3>\r\n		<ul>\r\n			<li><a href="#">Home</a></li>\r\n			<li><a href="#">About Us</a></li>\r\n			<li><a href="#">Our Services</a></li>\r\n			<li><a href="#">Contact Our Team</a></li>\r\n			<li><a href="#">Short Code</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="f-box">\r\n		<h3>Recent Post</h3>\r\n		<ul>\r\n		<li class="active1"><a href="">Join Our Facebook Page</a></li>\r\n		<li><a href="">Join Our Twitter</a></li>\r\n		<li><a href="">Rss Feed</a></li>\r\n		<li><a href="">Follow Us Google+</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="footer-grid1">\r\n		<h3>News-Letters</h3>\r\n		<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque nulla ipsum, pretium ac ultrices non, tincidunt id quam. Mauris dignissim dolor quis risus molestie et ,</p>\r\n	</div>\r\n	<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>', '2015-05-30', '2015-05-30 15:29:29');

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
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `build_temp_header`
--

INSERT INTO `build_temp_header` (`id`, `template_title`, `meta_title`, `meta_keywords`, `meta_description`, `header_content`, `created_at`, `updated_at`, `order_id`, `user_id`) VALUES
(50, 'Test13123', NULL, NULL, NULL, '<div class="header">\n		<div class="wrap">\n					<div class="logo">\n			<a href="index.html"><img alt="" src="images/logo.png"></a>\n			</div>\n		<ul class="menu">\n				 <li class="active"><a href="index.html">HOME</a> </li>\n					 <li class="arrow"><a href="about.html">ABOUT</a> </li>\n					 <li><a href="services.html">SERVICES</a>  </li>\n					 <li><a href="products.html">PRODUCTS</a> </li>\n					  <li><a href="contact.html">CONTACT</a> </li>\n					    <div id="lavalamp"> </div>\n					  <div class="clear"> </div>\n				</ul>\n				   <div class="clear"> </div>\n		</div>\n		<div class="clear"> </div>\n		</div>', '2015-05-30', '2015-05-30 15:41:51', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `genealogy`
--

INSERT INTO `genealogy` (`id`, `parent`, `user_id`, `sponsor_user_id`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 3, 1, 'left', 0, '0000-00-00', '2015-05-14 12:38:51'),
(3, '4', 5, 1, 'right', 0, '0000-00-00', '2015-05-19 09:39:20'),
(4, '5', 6, 1, 'right', 0, '0000-00-00', '2015-05-19 10:16:01'),
(5, '3', 7, 1, 'left', 0, '0000-00-00', '2015-05-20 11:52:12'),
(6, '7', 8, 1, 'left', 0, '0000-00-00', '2015-05-20 11:53:39'),
(7, '1', 9, 9, 'right', 0, '0000-00-00', '2015-06-01 11:54:02'),
(8, '9', 10, 9, 'right', 0, '0000-00-00', '2015-06-01 13:32:00'),
(14, '10', 16, 16, 'left', 0, '0000-00-00', '2015-06-02 15:16:14'),
(15, '16', 17, 16, 'left', 0, '0000-00-00', '2015-06-02 15:22:00'),
(16, '10', 18, 9, 'right', 0, '0000-00-00', '2015-06-03 12:23:41'),
(17, '8', 19, 9, 'left', 0, '0000-00-00', '2015-06-03 12:25:30');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `to_user_id`, `from_user_id`, `subject`, `message`, `attachment`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Testing', '            \r\n            Test', '', 2, 1, '2015-05-14', '2015-05-14 11:54:08'),
(2, 3, 1, 'surya@malinator.com', '            \r\n            surya@malinator.com', '', 2, 1, '2015-05-20', '2015-05-20 12:27:50'),
(3, 3, 1, 'surya@malinator.com', '            \r\n            surya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.com', '', 2, 1, '2015-05-20', '2015-05-20 12:28:47'),
(4, 3, 1, 'surya@malinator.com', '            \r\n            surya@malinator.com surya@malinator.comvsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.comsurya@malinator.com', '', 2, 1, '2015-05-20', '2015-05-20 12:29:27'),
(5, 5, 1, ' 	nidhi@malinator.com', '            \r\n             	nidhi@malinator.com', '', 2, 1, '2015-05-20', '2015-05-20 12:29:58'),
(6, 1, 3, 'testq', 'test            \r\n            ', '', 2, 1, '2015-06-01', '2015-06-01 14:29:16'),
(7, 10, 1, 'test', 'test            \r\n            ', '', 2, 1, '2015-06-01', '2015-06-01 14:30:55'),
(8, 1, 3, 'test', '            \r\n       hello admin     ', '', 2, 1, '2015-06-02', '2015-06-02 15:07:00'),
(9, 1, 3, 'testqqqqqqqqqq', '            \r\n            hihhhhhhhhhhhhhhhhhhhh', '', 2, 1, '2015-06-02', '2015-06-02 15:10:19'),
(10, 1, 3, 'testqqqqqqqqq', 'hello', '', 2, 1, '2015-06-02', '2015-06-02 15:15:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `money_transfer`
--

INSERT INTO `money_transfer` (`id`, `to_user_id`, `from_user_id`, `transaction_id`, `wallet_id`, `fund_type`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1, 1, 'Testing', 1, '2015-05-19', '2015-05-20 11:05:57'),
(3, 1, 3, 4, 1, 1, '0.001 commission to admin', 1, '2015-05-19', '2015-05-19 04:47:45'),
(4, 3, 3, 7, 1, 1, ' send to hemareddy', 1, '2015-06-01', '2015-06-01 12:57:28'),
(5, 1, 3, 8, 15, 1, '10 commission to admin', 1, '2015-06-01', '2015-06-01 12:58:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `package_id`, `transaction_id`, `web_builder_url`, `domain`, `domain_price`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '', 'chandrashekar.com', 5, '2015-06-01', '2015-06-01', 0, '2015-05-19', '2015-06-01 14:10:20'),
(2, 3, 1, 5, '', 'r.com', 5, '2015-05-19', '2015-05-19', 1, '2015-05-19', '2015-05-29 17:44:53'),
(3, 3, 2, 6, '', 's.com', 5, '2015-05-20', '2015-05-20', 1, '2015-05-20', '2015-05-29 17:44:58');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `start_date`, `end_date`, `coupon_code`, `amount`, `Description`, `no_of_pages`, `no_of_images`, `no_of_forms`, `status`, `created_at`, `update_at`) VALUES
(1, 'Basic', '2015-05-08', '2015-05-25', 0, 234, 'Domain\r\n250 Bandwidth\r\n4 Static pages\r\ncontact form\r\ngallery', 2, 3, 4, 1, '2015-05-26', '2015-05-26 06:28:46'),
(2, 'Advance', '2015-05-08', '2015-05-08', 23423423, 350, 'Domain\r\n550 Bandwidth\r\n6 Static pages\r\n1 contact form\r\n2 gallery', 0, 0, 0, 0, '2015-05-08', '2015-05-26 06:29:12'),
(3, 'Advance PRO', '2015-05-08', '2015-06-18', 12345, 450, 'Domain\r\n650 Bandwidth\r\n8 Static pages\r\n2 contact form\r\n2 gallery', 0, 0, 0, 1, '2015-05-19', '2015-05-26 06:28:30');

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
  `transaction_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_id`, `user_id`, `mode`, `gateway_id`, `actual_amount`, `paid_amount`, `total_rp`, `used_rp`, `coupon_discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 123456789, 3, 'paypal', 1, 239, 239, 0, 0, 0, 0, '0000-00-00', '2015-06-01 14:10:20'),
(2, 98765432, 3, '12', 1, 434, 444, 0, 434, 0, 1, '0000-00-00', '2015-05-20 11:15:35'),
(4, 456787654, 1, '1', 1, 0.001, 0.001, 0, 0, 0, 1, '2015-05-19', '2015-05-20 11:15:38'),
(5, 23459875, 6, 'paypal', 1, 239, 239, 0, 0, 0, 1, '2015-05-19', '2015-05-20 11:15:42'),
(6, 0, 7, 'paypal', 1, 355, 355, 0, 0, 0, 1, '2015-05-20', '2015-05-20 12:38:38'),
(7, 0, 3, 'transfer', 1, 110, 100, NULL, 0, 0, 1, '2015-06-01', '2015-06-01 12:57:28'),
(8, 0, 1, 'transfer', 1, 10, 10, 0, 0, 0, 1, '2015-06-01', '2015-06-01 12:58:00');

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
  `unique_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `activation_key` varchar(100) DEFAULT NULL,
  `forget_key` varchar(100) DEFAULT NULL,
  `forget_status` varchar(100) DEFAULT NULL,
  `role_id` tinyint(4) NOT NULL COMMENT '1:User,2:Admin',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `sponsor_id`, `name`, `password`, `position`, `user_sponsor_id`, `full_name`, `email`, `country_id`, `country_code`, `phone`, `date_of_birth`, `skype_id`, `facebook_id`, `twitter_id`, `master_pin`, `unique_id`, `status`, `activation_key`, `forget_key`, `forget_status`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '12345', 'admin', 'aa85654b4f9f352f2d8d2ba921d46ffe', 'left', 0, 'Ram Hemareddy', 'ramhemareddy@gmail.com', 1, 1, 1234567890, '2015-05-15', 'sdfasdf', 'dsafsd', 'fdsaf', 'e10adc3949ba59abbe56e057f20f883e', '', 1, '0', '', '', 2, '2015-05-14', '2015-06-02 06:01:51'),
(3, 'sury631016', 'hemareddy', 'f6096a961f8774f218a0f3b0a8217854', 'left', 0, 'Amogh', 'surya@malinator.com', 1, 91, 2147483647, '1963-10-16', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '1013629720195', NULL, NULL, 1, '2015-05-14', '2015-06-02 06:04:24'),
(5, 'nidh510306', 'nidhi', '827ccb0eea8a706c4c34a16891f84e7b', 'right', 0, 'nidhi sati', 'nidhi@malinator.com', 1, 91, 1234567890, '1951-03-06', NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '40ebe644746748a71c22fa32ed263ebe', NULL, NULL, 1, '2015-05-19', '2015-05-29 05:02:49'),
(6, 'qwey681019', 'qweyt', '827ccb0eea8a706c4c34a16891f84e7b', 'right', 0, 'yugiojsdnkfvk', 'cfkuyhvjbbk@vgyigv.com', 1, 91, 2147483647, '1968-10-19', 'vgiudjvdjk', 'dvhuhckbsdkjv', 'hvbhvhufn', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 'fc0a91efdbfdcd668908e48de047472c', NULL, NULL, 1, '2015-05-19', '2015-05-19 10:18:09'),
(7, 'nidh510304', 'nidhi86', 'e10adc3949ba59abbe56e057f20f883e', 'left', 0, 'nidhi mishra', 'nidhisati86@gmail.com', 1, 91, 2147483647, '1951-03-04', '', '', 'hemareddy', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 'e84f12b390f8a5edbea6e9fe1f39e440', NULL, NULL, 1, '2015-05-20', '2015-05-26 12:15:41'),
(8, 'nidh510304', 'nidhi89', 'e10adc3949ba59abbe56e057f20f883e', 'left', 0, 'nidhi mishra', 'nidhisati86@gmail.com', 1, 91, 2147483647, '1951-03-04', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '', 1, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1, '2015-05-20', '2015-05-26 12:13:43'),
(9, 'admin', 'Ram', 'cd54dcc3bfd0a46070d85f99e5880342', 'right', 0, 'Ram Hemareddy', 'ramhemareddy@gmail.com', 0, 0, 0, '2011-05-04', NULL, NULL, NULL, 'cd54dcc3bfd0a46070d85f99e5880342', '631935326943404', 1, NULL, NULL, NULL, 1, '2015-06-01', '2015-06-01 11:54:02'),
(10, 'admin', 'swathi', '46eafc3f1b688c52837ef0c7fa2018f9', 'right', 0, 'swathi.rl', 'swathi.rl@maverickinfosoft.com', 1, 91, 2147483647, '1989-04-03', '', '', '', 'd8ecd4e7a1dba725d1179c30cb2531c5', '', 1, 'cf02834b6264a20c8463b660828d8b05', NULL, NULL, 2, '2015-06-01', '2015-06-02 12:43:26'),
(16, 'swathi', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'left', 0, 'test1', 'test1@gmail.com', 1, 91, 2147483647, '1965-09-16', NULL, NULL, NULL, '2c7d9f739097070092b133dd4c0adbf9', '', 2, '5b6457316519660ce7cea90eb1d4b708', NULL, NULL, 2, '2015-06-02', '2015-06-02 15:16:14'),
(17, 'swathi', 'test2', 'ad0234829205b9033196ba818f7a872b', 'left', 0, 'test2', 'test2@gmail.com', 1, 91, 2147483647, '1983-08-14', NULL, NULL, NULL, '568af46841d68b1650b45cef8e95e8d2', '', 2, '86df15d104154e78ca9c410f233131d7', NULL, NULL, 2, '2015-06-02', '2015-06-02 15:22:00'),
(18, 'admin', 'Suraj', '33681279c167c7fcd2997ed72cfb4c4a', 'right', 0, 'Suraj Asati', 'suraj.asati111@gmail.com', 0, 0, 0, '2011-05-04', NULL, NULL, NULL, '33681279c167c7fcd2997ed72cfb4c4a', '1151285834897384', 1, NULL, NULL, NULL, 1, '2015-06-03', '2015-06-03 12:23:41'),
(19, 'admin', 'surajasati111', '245f51ac69a8f9b4e2b16052b832a1f6', 'left', 0, 'Suraj Asati', '', 0, 0, 0, '0000-00-00', NULL, NULL, NULL, '245f51ac69a8f9b4e2b16052b832a1f6', '287596310', 1, NULL, NULL, NULL, 1, '2015-06-03', '2015-06-03 12:25:30');

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
  `temp_header` text NOT NULL,
  `temp_body` text NOT NULL,
  `temp_footer` text NOT NULL,
  `template_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `order_id` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `user_has_template`
--

INSERT INTO `user_has_template` (`id`, `category_id`, `publish`, `user_id`, `temp_header`, `temp_body`, `temp_footer`, `template_id`, `created_at`, `order_id`, `logo`, `contact_email`) VALUES
(45, 1, 0, 3, '<div class="header">\n		<div class="wrap">\n					<div class="logo">\n			<a href="index.html"><img alt="" src="images/logo.png"></a>\n			</div>\n		<ul class="menu">\n				 <li class="active"><a href="index.html">HOME</a> </li>\n					 <li class="arrow"><a href="about.html">ABOUT</a> </li>\n					 <li><a href="services.html">SERVICES</a>  </li>\n					 <li><a href="products.html">PRODUCTS</a> </li>\n					  <li><a href="contact.html">CONTACT</a> </li>\n					    <div id="lavalamp"> </div>\n					  <div class="clear"> </div>\n				</ul>\n				   <div class="clear"> </div>\n		</div>\n		<div class="clear"> </div>\n		</div>', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '<div class="footer-bg">\r\n<div class="wrap">\r\n	<div class="footer-grid">\r\n		<h3>About Us</h3>\r\n		<ul>\r\n			<li><a href="#">Online Shopping</a></li>\r\n			<li><a href="#">Finnace Service</a></li>\r\n			<li><a href="#">Marketing</a></li>\r\n			<li><a href="#">Econamic News</a></li>\r\n			<li><a href="#">Business Help</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="footer-grid">\r\n		<h3>Pages</h3>\r\n		<ul>\r\n			<li><a href="#">Home</a></li>\r\n			<li><a href="#">About Us</a></li>\r\n			<li><a href="#">Our Services</a></li>\r\n			<li><a href="#">Contact Our Team</a></li>\r\n			<li><a href="#">Short Code</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="f-box">\r\n		<h3>Recent Post</h3>\r\n		<ul>\r\n		<li class="active1"><a href="">Join Our Facebook Page</a></li>\r\n		<li><a href="">Join Our Twitter</a></li>\r\n		<li><a href="">Rss Feed</a></li>\r\n		<li><a href="">Follow Us Google+</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="footer-grid1">\r\n		<h3>News-Letters</h3>\r\n		<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque nulla ipsum, pretium ac ultrices non, tincidunt id quam. Mauris dignissim dolor quis risus molestie et ,</p>\r\n	</div>\r\n	<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>', 50, '2015-06-02', 1, '', ''),
(46, 1, 0, 3, '<div class="header">\n		<div class="wrap">\n					<div class="logo">\n			<a href="index.html"><img alt="" src="images/logo.png"></a>\n			</div>\n		<ul class="menu">\n				 <li class="active"><a href="index.html">HOME</a> </li>\n					 <li class="arrow"><a href="about.html">ABOUT</a> </li>\n					 <li><a href="services.html">SERVICES</a>  </li>\n					 <li><a href="products.html">PRODUCTS</a> </li>\n					  <li><a href="contact.html">CONTACT</a> </li>\n					    <div id="lavalamp"> </div>\n					  <div class="clear"> </div>\n				</ul>\n				   <div class="clear"> </div>\n		</div>\n		<div class="clear"> </div>\n		</div>', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '<div class="footer-bg">\r\n<div class="wrap">\r\n	<div class="footer-grid">\r\n		<h3>About Us</h3>\r\n		<ul>\r\n			<li><a href="#">Online Shopping</a></li>\r\n			<li><a href="#">Finnace Service</a></li>\r\n			<li><a href="#">Marketing</a></li>\r\n			<li><a href="#">Econamic News</a></li>\r\n			<li><a href="#">Business Help</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="footer-grid">\r\n		<h3>Pages</h3>\r\n		<ul>\r\n			<li><a href="#">Home</a></li>\r\n			<li><a href="#">About Us</a></li>\r\n			<li><a href="#">Our Services</a></li>\r\n			<li><a href="#">Contact Our Team</a></li>\r\n			<li><a href="#">Short Code</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="f-box">\r\n		<h3>Recent Post</h3>\r\n		<ul>\r\n		<li class="active1"><a href="">Join Our Facebook Page</a></li>\r\n		<li><a href="">Join Our Twitter</a></li>\r\n		<li><a href="">Rss Feed</a></li>\r\n		<li><a href="">Follow Us Google+</a></li>\r\n		</ul>\r\n	</div>\r\n	<div class="footer-grid1">\r\n		<h3>News-Letters</h3>\r\n		<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque nulla ipsum, pretium ac ultrices non, tincidunt id quam. Mauris dignissim dolor quis risus molestie et ,</p>\r\n	</div>\r\n	<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>', 50, '2015-06-02', 3, '', '');

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

--
-- Dumping data for table `user_pages`
--

INSERT INTO `user_pages` (`id`, `user_id`, `order_id`, `page_name`, `page_content`, `created_at`, `page_form`) VALUES
(80, 3, 1, 'Home', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-05-30', ''),
(81, 3, 1, 'Page2', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-05-30', ''),
(82, 3, 1, 'Page3', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-05-30', ''),
(83, 3, 1, 'Page4', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-05-30', ''),
(84, 3, 1, 'Page5', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-05-30', ''),
(85, 3, 1, 'test', '<p>testtsgdertiurety</p>\r\n', '2015-06-02', '');
INSERT INTO `user_pages` (`id`, `user_id`, `order_id`, `page_name`, `page_content`, `created_at`, `page_form`) VALUES
(86, 3, 3, 'Home', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-06-02', ''),
(87, 3, 3, 'Page2', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-06-02', ''),
(88, 3, 3, 'Page3', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-06-02', ''),
(89, 3, 3, 'Page4', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-06-02', ''),
(90, 3, 3, 'Page5', '<div class="image-slider">\r\n						<!-- Slideshow 1 -->\r\n					    <ul id="slider1" class="rslides rslides1" style="max-width: 1600px;">\r\n					      <li id="rslides1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider2.jpg"></li>\r\n					      <li id="rslides1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="rslides1_on"><img alt="" src="images/slider3.jpg"></li>\r\n					      <li id="rslides1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class=""><img alt="" src="images/slider1.jpg"></li>\r\n					    </ul>\r\n						 <!-- Slideshow 2 -->\r\n					<div class="clear"> </div>\r\n					<!--End-image-slider---->\r\n		</div>\r\n<div class="main">	\r\n			<div class="wrap">\r\n	\r\n<div class="content">\r\n	<div class="content-grids">\r\n      		<div class="content-grid first-grid">\r\n      			<ul>\r\n      		\r\n      				<li><h4><img alt="" title="pic1" src="images/a.png">readable</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      			\r\n      			</ul>\r\n      		</div>\r\n      		<div class="content-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/b.png">incididunt</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>	\r\n      		</div>\r\n      		<div class="content-grid last-grid">\r\n      			<ul>\r\n      				\r\n      				<li><h4><img alt="" title="pic1" src="images/c.png">eiusmod</h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				\r\n      			</ul>\r\n      		</div>\r\n      <div class="clear"></div>\r\n      </div>\r\n<div class="content-bottom-grids">\r\n			<h3>About our Company</h3>\r\n      		<div class="content-bottom-grid">\r\n      			<div class="content-bottom-grid1">\r\n      				<a href="#"></a><img alt="" title="pic1" src="images/cont1.jpg">\r\n      			</div>\r\n      			<div class="content-bottom-grid2">\r\n      				\r\n      			<ul>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p></li>\r\n      				<li><a href="about.html">read more</a></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n</div>\r\n<div class="sidebar">\r\n	<div class="sidebar-grids">\r\n			<h3>Latest News</h3>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top1.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top2.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		<div class="sidebar-grid">\r\n      			<div class="sidebar-grid3">\r\n      				<a href="#"><img alt="" title="pic1" src="images/top3.jpg"></a>\r\n      			</div>\r\n      			<div class="sidebar-grid4">\r\n      				\r\n      			<ul>\r\n      				<li><h4><a href="#">this is a sample post1</a></h4></li>\r\n      				<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p></li>\r\n      			</ul>\r\n      			</div>\r\n      			  <div class="clear"> </div>\r\n      		</div>\r\n      		  <div class="clear"> </div>\r\n      		\r\n</div>\r\n <div class="clear"> </div>\r\n</div>	\r\n <div class="clear"> </div>\r\n<div class="tsc_carousel_hor products-list">\r\n	<h1>our products</h1>\r\n          <div class="l-carousel">\r\n            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal"><div style="overflow: hidden; position: relative;" class="jcarousel-clip jcarousel-clip-horizontal"><ul style="overflow: hidden; position: relative; top: 0px; left: 0px; margin: 0px; padding: 0px; width: 1552px;" class="carousel jcarousel-list jcarousel-list-horizontal">\r\n              <li style="float: left; list-style: none;" jcarouselindex="1" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="2" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="3" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="4" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="5" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont1.jpg"></a>\r\n              \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="6" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont2.jpg"></a>\r\n                \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="7" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont3.jpg"></a>\r\n               \r\n              </li>\r\n              <li style="float: left; list-style: none;" jcarouselindex="8" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal"> <a href="#"><img width="175" height="115" border="0" src="images/cont4.jpg"></a>\r\n               \r\n              </li>\r\n            </ul></div><div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div><div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div></div>\r\n          </div>\r\n          <div class="clear"> </div>\r\n			<script src="js/tsc_jqcarousel.js" type="text/javascript"></script>\r\n			<script type="text/javascript">\r\n			  $(function() {jQuery(''.tsc_carousel_hor .carousel'').jcarousel({scroll:1});});\r\n			</script>\r\n		<!-- DC Horizontal Carousel:Light End -->\r\n		</div>	\r\n <div class="clear"> </div>\r\n \r\n</div>\r\n</div>', '2015-06-02', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `address`, `street`, `city_name`, `state_name`, `country_id`, `zip_code`, `id_proof`, `address_proff`, `referral_banner_id`, `testimonials`, `testimonial_status`, `document_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 'test', '111', '111', 1, '12313', 'survey-Testing.png', 'penclchk.gif', 1, '13123123', 1, 0, 1, '2015-05-14', '2015-05-19 09:12:15'),
(2, 3, 'Unchahar', 'Unchahar', 'Bangalore', 'Karnataka', 1, '229406', 'penclchk.gif', 'survey-Testing.png', 1, 'hello admin', 0, 1, 1, '2015-05-14', '2015-06-02 14:58:43'),
(3, 5, NULL, '', '', '', 0, '', '1433257333images.jpg', '1433257333images1.jpg', 1, 'testtttttttttt', 0, 0, 0, '2015-05-19', '2015-05-19 12:35:58'),
(4, 6, 'xchovdsnj  jvjxnfon', 'hufjvodbcvoci', 'fjfvouhednvoiuo', 'andhra', 1, '85201', '1432032164IMG-20150504-WA0009.jpg', '1432032164IMG-20150404-WA0018.jpg', 1, 'tesssssssssssssssssss', 1, 1, 1, '2015-05-19', '2015-05-26 06:26:15'),
(5, 7, 'fsdafds', 'sdafsdfa', 'sdafsda', 'sdfadsf', 1, 'hemareddy', '', '', 1, '', 0, 0, 0, '2015-05-20', '2015-05-20 12:06:08'),
(6, 8, NULL, '', '', '', 0, '', '', '', 1, '', 0, 0, 0, '2015-05-20', '2015-05-20 11:53:39'),
(7, 9, NULL, '', '', '', 0, '', '', '', 1, '', 0, 0, 0, '2015-06-01', '2015-06-01 11:54:02'),
(8, 10, 'bangalore', 'bangalore', 'bangalore', 'karnataka', 1, '560061', '', '', 1, '', 0, 0, 0, '2015-06-01', '2015-06-02 12:43:26'),
(14, 16, NULL, '', '', '', 0, '', '', '', 1, '', 0, 0, 0, '2015-06-02', '2015-06-02 15:16:14'),
(15, 17, NULL, '', '', '', 0, '', '', '', 1, '', 0, 0, 0, '2015-06-02', '2015-06-02 15:22:00'),
(16, 18, NULL, '', '', '', 0, '', '', '', 1, '', 0, 0, 0, '2015-06-03', '2015-06-03 12:23:41'),
(17, 19, NULL, '', 'indore', '', 0, '', '', '', 1, '', 0, 0, 0, '2015-06-03', '2015-06-03 12:25:30');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `fund`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1170, 1, 1, '2015-06-02', '2015-06-02 15:08:39'),
(2, 3, 322.899, 1, 1, '0000-00-00', '2015-05-18 12:02:53'),
(10, 1, 12370, 2, 1, '2015-06-01', '2015-06-01 14:18:49'),
(12, 6, 100, 2, 1, '2015-05-19', '2015-05-19 13:23:03'),
(13, 6, 0, 3, 1, '2015-05-19', '2015-05-19 13:17:29'),
(14, 6, 0, 1, 1, '2015-05-19', '2015-05-19 13:17:03'),
(15, 1, 10, 1, 1, '2015-06-01', '2015-06-01 12:58:00');

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
