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
(7, 'ankith', 45, 1);
 
/*----*/


CREATE TABLE IF NOT EXISTS `chat` (
`id` int(10) unsigned NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sent` date NOT NULL DEFAULT '0000-00-00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


