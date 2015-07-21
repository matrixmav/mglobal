CREATE TABLE IF NOT EXISTS `domain_temp` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(8, 'ram', 45, 1);
 
/*----*/


CREATE TABLE IF NOT EXISTS `chat` (
`id` int(10) unsigned NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sent` date NOT NULL DEFAULT '0000-00-00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


ALTER TABLE `build_temp` ADD `custom_css` TEXT NOT NULL AFTER `screenshot`, ADD `custom_js` TEXT NOT NULL AFTER `custom_css`;

ALTER TABLE `user_has_template` ADD `copyright` VARCHAR(255) NOT NULL AFTER `contact_email`;

ALTER TABLE `user_has_template` ADD `custom_css` TEXT NOT NULL AFTER `copyright`, ADD `custom_js` TEXT NOT NULL AFTER `custom_css`;

ALTER TABLE `user_has_template` ADD `site_title` VARCHAR(255) NOT NULL AFTER `logo`;


ALTER TABLE `build_temp_header` ADD `menu` TEXT NOT NULL AFTER `header_content`;

ALTER TABLE `user_has_template` ADD `user_menu` TEXT NOT NULL AFTER `user_id`;


ALTER TABLE `user_has_template` ADD `logo_height` VARCHAR(11) NOT NULL AFTER `custom_js`, ADD `logo_width` VARCHAR(11) NOT NULL AFTER `logo_height`, ADD `contact_form` TEXT NOT NULL AFTER `logo_width`;

ALTER TABLE `build_temp` ADD `contact_form` TEXT NOT NULL AFTER `custom_js`;

ALTER TABLE `money_transfer` ADD `fund` FLOAT NULL AFTER `fund_type` ;

ALTER TABLE `transaction` CHANGE `transaction_id` `transaction_id` VARCHAR( 50 ) NOT NULL ;

/*---*/

ALTER TABLE `user` CHANGE `date_of_birth` `date_of_birth` VARCHAR(100) NOT NULL;

ALTER TABLE `order` CHANGE `created_at` `created_at` DATETIME NOT NULL;

INSERT INTO `mglobal`.`user` (`id`, `sponsor_id`, `name`, `password`, `position`, `user_sponsor_id`, `full_name`, `email`, `country_id`, `country_code`, `phone`, `date_of_birth`, `skype_id`, `facebook_id`, `twitter_id`, `master_pin`, `unique_id`, `status`, `activation_key`, `forget_key`, `forget_status`, `role_id`, `created_at`, `updated_at`) VALUES (NULL, '', 'support@mglobally.com', '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '1', NULL, NULL, NULL, '2', '2015-06-05', CURRENT_TIMESTAMP), (NULL, '', 'info@mglobally.com', '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '1', NULL, NULL, NULL, '2', '2015-06-05', CURRENT_TIMESTAMP);

INSERT INTO `mglobal`.`user` (`id`, `sponsor_id`, `name`, `password`, `position`, `user_sponsor_id`, `full_name`, `email`, `country_id`, `country_code`, `phone`, `date_of_birth`, `skype_id`, `facebook_id`, `twitter_id`, `master_pin`, `unique_id`, `status`, `activation_key`, `forget_key`, `forget_status`, `role_id`, `created_at`, `updated_at`) VALUES (NULL, '', 'sales', '', NULL, '', '', 'sales@mglobally.com', '', '', '', '', NULL, NULL, NULL, '', '', '1', NULL, NULL, NULL, '2', '2015-06-05', CURRENT_TIMESTAMP), (NULL, '', 'marketing@mglobally.com', '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '1', NULL, NULL, NULL, '2', '2015-06-01', CURRENT_TIMESTAMP);


ALTER TABLE `user_pages` ADD `status` INT(11) NOT NULL DEFAULT '1' AFTER `page_form`;



/*12-06-2015*/

--
-- Table structure for table `user_has_access`
--

CREATE TABLE IF NOT EXISTS `user_has_access` (
`id` int(11) NOT NULL  AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `access` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_has_access`
--

INSERT INTO `user_has_access` (`id`, `user_id`, `access`, `created_at`) VALUES
(1, 22, 'ads,package,reports,user', '2015-06-12'),
(2, 23, 'builder,ads,package,reports', '2015-06-12'),
(3, 21, 'ads_list,package_list,reports,userreport,reportaddress,reportcontact,mail,user,wallet', '2015-06-12'),
(4, 1, 'reports,user,mail,memberaccess,package,ads,builder,ads_add,ads_list,package_list,package_add,userreport,reportaddress,reportsponsor,reportpackage,reporttransaction,reportsocial,reportcontact,usermg,wallet,geneology,document,testimonial', '2015-06-12');

--
-- Indexes for dumped tables
--
INSERT INTO `user_has_access` (`id`, `user_id`, `access`, `created_at`) VALUES
(1, 1, 'reports,user,mail,memberaccess,package,ads,builder,ads_add,ads_list,package_list,package_add,userreport,reportaddress,reportsponsor,reportpackage,reporttransaction,reportsocial,reportcontact,usermg,wallet,geneology,document,testimonial', '2015-06-12');
--
-- Indexes for table `user_has_access`
--
ALTER TABLE `user_has_access`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_has_access`
--
ALTER TABLE `user_has_access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `user_pages` ADD `status` INT(11) NOT NULL DEFAULT '1' AFTER `page_form`;


/*12/6/2015*/

ALTER TABLE `build_temp` ADD `main_div` VARCHAR(255) NOT NULL AFTER `contact_form`;

INSERT INTO `mglobal`.`user_profile` (`id`, `user_id`, `address`, `street`, `city_name`, `state_name`, `country_id`, `zip_code`, `id_proof`, `address_proff`, `referral_banner_id`, `testimonials`, `testimonial_status`, `document_status`, `status`, `created_at`, `updated_at`) VALUES (NULL, '21', NULL, '', '', '', '', '', '', '', '1', '', '0', '', '', '', CURRENT_TIMESTAMP), (NULL, '22', NULL, '', '', '', '', '', '', '', '1', '', '0', '', '', '', CURRENT_TIMESTAMP);

INSERT INTO `mglobal`.`user_profile` (`id`, `user_id`, `address`, `street`, `city_name`, `state_name`, `country_id`, `zip_code`, `id_proof`, `address_proff`, `referral_banner_id`, `testimonials`, `testimonial_status`, `document_status`, `status`, `created_at`, `updated_at`) VALUES (NULL, '23', NULL, '', '', '', '', '', '', '', '1', '', '0', '', '', '', CURRENT_TIMESTAMP), (NULL, '24', NULL, '', '', '', '', '', '', '', '1', '', '0', '', '', '', CURRENT_TIMESTAMP);


ALTER TABLE `package` ADD `type` TINYINT NOT NULL COMMENT '1:1basic,2:2basic,3:3basec,4:1advance,5:2advance.6:3advance,7:1pro,8:2pro,9:3pro' AFTER `no_of_forms`;

 
/*1/7/2015*/
ALTER TABLE `package` ADD `image` VARCHAR(255) NOT NULL AFTER `type`;


ALTER TABLE `package` ADD `reward_points` FLOAT NOT NULL AFTER `image`;

ALTER TABLE `user` ADD `membership_type` INT(11) NOT NULL AFTER `social`;

ALTER TABLE `user_shared_ad` ADD `date` DATE NOT NULL AFTER `user_id`;

INSERT INTO `package` (`id`, `name`, `start_date`, `end_date`, `coupon_code`, `amount`, `Description`, `no_of_pages`, `no_of_images`, `no_of_forms`, `status`, `created_at`, `update_at`, `type`, `image`, `reward_points`) VALUES
(1, 'Basic3', '2015-05-08', '2015-05-25', 0, 499, 'Domain\r\n250 Bandwidth\r\n4 Static pages\r\ncontact form\r\ngallery', 2, 3, 4, 1, '2015-07-01', '2015-06-29 11:52:45', '1', '1435741702Basic-package-3.png', 2.5),
(3, 'Basic2', '2015-05-08', '2015-06-18', 12345, 99, 'Domain\r\n650 Bandwidth\r\n8 Static pages\r\n2 contact form\r\n2 gallery', 0, 0, 0, 1, '2015-07-01', '2015-06-29 11:52:56', '1', '1435741688Basic-package-2.png', 0.4),
(4, 'Basic1', '0000-00-00', '0000-00-00', 0, 49, 'Basic1', 12, 12, 4, 1, '2015-07-01', '2015-06-25 10:48:15', '1', '1435741676Basic-package 1.png', 0.3),
(5, 'Advance1', '0000-00-00', '0000-00-00', 0, 999, 'Advance1', 0, 0, 0, 1, '2015-07-01', '2015-07-01 08:58:15', '2', '1435741659Advance-package-1.png', 6),
(6, 'Advance2', '0000-00-00', '0000-00-00', 0, 2999, 'Advance2', 0, 0, 0, 1, '2015-07-01', '2015-07-01 08:58:50', '2', '1435741644Advance-package-2.png', 21),
(7, 'Advance3', '0000-00-00', '0000-00-00', 0, 4999, 'Advance3', 0, 0, 0, 1, '2015-07-01', '2015-07-01 08:59:14', '2', '1435741632Advance-package-3.png', 40),
(8, 'Advance PRO1', '0000-00-00', '0000-00-00', 0, 9999, 'Advance PRO1', 0, 0, 0, 1, '2015-07-01', '2015-07-01 08:59:45', '3', '1435741611Pro-package-1.png', 90),
(9, 'Advance PRO2', '0000-00-00', '0000-00-00', 0, 14999, 'Advance PRO2', 0, 0, 0, 1, '2015-07-01', '2015-07-01 09:00:17', '3', '1435741600Pro-package-2.png', 150),
(10, 'Advance PRO3', '0000-00-00', '0000-00-00', 0, 24999, 'Advance PRO3', 0, 0, 0, 1, '2015-07-01', '2015-07-01 09:00:50', '3', '1435741524Pro-package-3.png', 275);


/*generatebinary*/


ALTER TABLE `genealogy` ADD `order_date` DATE NOT NULL AFTER `updated_at`;

UPDATE `mglobal`.`user_has_access` SET `access` = 'reports,user,mail,memberaccess,package,ads,builder,ads_add,ads_list,package_list,package_add,userreport,reportaddress,reportsponsor,reportpackage,reporttransaction,reportsocial,reportcontact,usermg,wallet,geneology,document,testimonial,reportverification,generatebinary,reportrefferal,reportdeposit,summary,cashwallet,rpwallet,commissionwallet' WHERE `user_has_access`.`id` = 4;

/*3-7-2015*/
CREATE TABLE IF NOT EXISTS `user_has_coupon` (
`id` int(11) NOT NULL,
  `coupon_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



ALTER TABLE `transaction` ADD `coupon_code` VARCHAR(100) NOT NULL AFTER `coupon_discount`;

ALTER TABLE `user_has_coupon` CHANGE `coupon_code` `coupon_id` INT(11) NOT NULL;


ALTER TABLE `user_has_coupon`
 ADD PRIMARY KEY (`id`);

/* 06/07/2015 */
ALTER TABLE `build_temp_header` ADD `head_content` TEXT NOT NULL AFTER `meta_description`;

ALTER TABLE `user_has_template` ADD `head_content` TEXT NOT NULL AFTER `user_id`;

ALTER TABLE `user_pages` ADD `parent` INT(11) NULL AFTER `page_content`;
    
/* 07/07/2015 */
ALTER TABLE `build_temp` ADD `package` INT(11) NOT NULL AFTER `category_id`;

ALTER TABLE `user_pages` ADD `page_slug` VARCHAR(255) NOT NULL AFTER `page_name`;

ALTER TABLE `user_shared_ad` ADD `order_id` INT( 11 ) NOT NULL AFTER `user_id` ;