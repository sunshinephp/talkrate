SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database structure for `talks`
--

--
-- Table structure for table `talk_ratings`
--

DROP TABLE IF EXISTS `talk_ratings`;
CREATE TABLE IF NOT EXISTS `talk_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `talk_id` int(11) NOT NULL,
  `rating` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_ratings` (`user_id`,`talk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Table structure for table `talks`
--

DROP TABLE IF EXISTS `talks`;
CREATE TABLE IF NOT EXISTS `talks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bio` text CHARACTER SET utf8,
  `location` text CHARACTER SET utf8,
  `talk_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `talk_level` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `talk_category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `abstract` text CHARACTER SET utf8,
  `is_most_desired` tinyint(1) NOT NULL DEFAULT '0',
  `other_info` text CHARACTER SET utf8,
  `slides` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_sponsor` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `users`
--
