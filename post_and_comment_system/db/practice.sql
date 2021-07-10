-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2015 at 12:43 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `content`, `date_posted`) VALUES
(0, 2, 1, 'adsadads\r\n', '1437384369'),
(0, 4, 2, 'cristy po to', '1437384585'),
(0, 4, 2, 'lkjlklkqew', '1437385594'),
(0, 4, 2, 'qewlkqewlk', '1437385807'),
(0, 4, 2, 'hahahaha', '1437385812'),
(0, 3, 2, 'wee', '1437386186'),
(0, 3, 2, ';qlt;lqlwer', '1437386275'),
(0, 3, 2, 'qewqew;lqewl;qwktqew', '1437386294'),
(0, 6, 2, 'xcv,kcv', '1437386543'),
(0, 6, 2, 'qewqewlk', '1437386662'),
(0, 6, 1, 'hahhaahhahhaa', '1437386842'),
(0, 7, 1, 'Bwahahahhaha', '1437386876'),
(0, 7, 1, 'hahahahahahahhah', '1437387027'),
(0, 7, 1, 'weherer and whwene', '1437387035'),
(0, 9, 1, 'test', '1437389776'),
(0, 9, 2, 'Yeah! This is a test!', '1437389808'),
(0, 10, 2, 'test?', '1437389870'),
(0, 10, 1, 'Yeah! A TEST!', '1437389885'),
(0, 10, 5, 'OK. LE ME TEST', '1437389918'),
(0, 12, 2, 'Test?', '1437390434'),
(0, 12, 1, 'YEAH! A Test!', '1437390560'),
(0, 12, 5, 'HHHhhmmm?', '1437390794');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `content`, `date_created`) VALUES
(12, 1, 'THIS IS A TEST!', '1437390045');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'cris', 'cris', 'cris', 'cris'),
(3, 'whik', 'whik', 'kalifha', 'kalifha'),
(4, 'kali', 'kali', 'kali', 'king'),
(5, '123', '123', 'terry', 'merry');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
