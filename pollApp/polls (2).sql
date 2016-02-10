-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2012 at 06:13 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polls`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(0, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE IF NOT EXISTS `tbl_option` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1) NOT NULL,
  `value` text NOT NULL,
  `poll_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`id`, `name`, `value`, `poll_id`) VALUES
(1, 'A', 'a:3:{i:0;s:4:"asha";i:1;s:6:"meanns";i:2;s:6:"loginn";}', 565816811301233),
(2, 'A', 'a:3:{i:0;s:5:"adasd";i:1;s:5:"dadas";i:2;s:4:"dada";}', 111117811301244),
(3, 'A', 'a:3:{i:0;s:9:"chocolate";i:1;s:5:"games";i:2;s:5:"polls";}', 61617811301248),
(4, 'A', 'a:3:{i:0;s:4:"name";i:1;s:5:"share";i:2;s:4:"like";}', 81717811301227),
(5, 'A', 'a:3:{i:0;s:5:"sadsa";i:1;s:5:"dasda";i:2;s:5:"dasda";}', 285791211301249),
(6, 'A', 'a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";}', 559101211301290),
(7, 'A', 'N;', 4859121211301214),
(8, 'A', 'a:2:{i:0;s:4:"fsfs";i:1;s:0:"";}', 4117131211301266),
(9, 'A', 'a:2:{i:0;s:4:"fsfs";i:1;s:0:"";}', 3418131211301266),
(10, 'A', 'a:2:{i:0;s:4:"fafa";i:1;s:4:"fafa";}', 520131211301226),
(11, 'A', 'a:2:{i:0;s:13:"other gadgets";i:1;s:0:"";}', 723131211301296),
(12, 'A', 'a:2:{i:0;s:3:"dog";i:1;s:0:"";}', 5854171211301299);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll`
--

CREATE TABLE IF NOT EXISTS `tbl_poll` (
  `id` bigint(20) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `private` enum('y','n') NOT NULL DEFAULT 'n',
  `created_date` datetime NOT NULL,
  `published_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `is_archive` enum('y','n') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_poll`
--

INSERT INTO `tbl_poll` (`id`, `keyword`, `question`, `private`, `created_date`, `published_date`, `expiry_date`, `user_id`, `is_archive`) VALUES
(61617811301248, 'shree', 'what do i like', '', '2012-11-08 00:00:00', NULL, '2012-11-02 00:00:00', 1537994726, 'n'),
(81717811301227, '123', 'what do I want to play', '', '2012-11-08 00:00:00', NULL, '2012-11-02 00:00:00', 1537994726, 'n'),
(111117811301244, 'mine', 'what do i like', '', '2012-11-08 00:00:00', NULL, '2012-11-02 00:00:00', 1537994726, 'n'),
(285791211301249, 'sds', 'dassda', '', '2012-11-12 00:00:00', NULL, '0000-00-00 00:00:00', 1581372423, 'n'),
(520131211301226, 'badar', 'dada', '', '2012-11-12 00:00:00', NULL, '2012-11-01 00:00:00', 1581372423, 'n'),
(559101211301290, 'asdas', 'dasdas', '', '2012-11-12 00:00:00', NULL, '2012-11-02 00:00:00', 1581372423, 'n'),
(565816811301233, 'name', 'what is your favourte name', '', '2012-11-08 00:00:00', NULL, '2012-11-03 00:00:00', 1537994726, 'n'),
(723131211301296, 'shreejana', 'what do you like', '', '2012-11-12 00:00:00', NULL, '2012-11-01 00:00:00', 1581372423, 'n'),
(3418131211301266, 'fsfs', 'fsfs', '', '2012-11-12 00:00:00', NULL, '2012-11-08 00:00:00', 1581372423, 'n'),
(4117131211301266, 'dfsdf', 'fsfs', '', '2012-11-12 00:00:00', NULL, '2012-11-01 00:00:00', 1581372423, 'n'),
(4859121211301214, '', '', '', '2012-11-12 00:00:00', NULL, '0000-00-00 00:00:00', 1581372423, 'n'),
(5854171211301299, 'her', 'wat is ur fav pet', '', '2012-11-12 00:00:00', NULL, '2012-11-01 00:00:00', 1581372423, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `active` enum('y','n') NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `fullname`, `image`, `active`) VALUES
(1537994726, 'bnaee', 'binay47@hotmail.com', 'Bnaee Shrestha', 'http://profile.ak.fbcdn.net/hprofile-ak-ash4/372314_1537994726_1188270288_q.jpg', 'y'),
(1581372423, 'chukyzquak', 'shreejana_dangol@hotmail.com', 'Shreez Dangol', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash4/211280_1581372423_1230528991_q.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vote`
--

CREATE TABLE IF NOT EXISTS `tbl_vote` (
  `date` datetime NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `option_name` varchar(1) NOT NULL,
  `telco` varchar(10) NOT NULL,
  `poll_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vote`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_option`
--
ALTER TABLE `tbl_option`
  ADD CONSTRAINT `tbl_option_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `tbl_poll` (`id`);

--
-- Constraints for table `tbl_poll`
--
ALTER TABLE `tbl_poll`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
