-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 05:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atomic_project_b35`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE IF NOT EXISTS `birthday` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Table for Birthday ';

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `birthdate`) VALUES
(101, 'Sultan Mohammed Arman', '1992-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `book_title`
--

CREATE TABLE IF NOT EXISTS `book_title` (
`id` int(11) NOT NULL,
  `bookname` varchar(40) NOT NULL,
  `authorname` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Book Tittle Table For Atomic Project';

--
-- Dumping data for table `book_title`
--

INSERT INTO `book_title` (`id`, `bookname`, `authorname`) VALUES
(101, 'Teach Yourself PHP in 30days', 'Sam');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL COMMENT 'City Name of User'
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Table for storing City data';

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `city`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'Kabul');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `emailaddress` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Table for Email Address Atomic Project';

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `name`, `emailaddress`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'ikudmdbkk@history.co');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL COMMENT 'Gender info'
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Table for storing gender data';

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `gender`) VALUES
(101, 'Ibn e Sina', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE IF NOT EXISTS `hobbies` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `hobbies` varchar(200) NOT NULL COMMENT 'Storing hobbies Data'
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Table for storing hobbies information';

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `hobbies`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'War, Fight, Ridding horse');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE IF NOT EXISTS `profilepic` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `profile_image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Table for storing Profile Picture information';

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`id`, `name`, `profile_image`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'img/user/propic/');

-- --------------------------------------------------------

--
-- Table structure for table `summaryoforg`
--

CREATE TABLE IF NOT EXISTS `summaryoforg` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='Table for Summary of Organization';

--
-- Dumping data for table `summaryoforg`
--

INSERT INTO `summaryoforg` (`id`, `name`, `summary`) VALUES
(101, 'BMW', 'Bayerische Motoren Werke AG (German pronunciation: [?ba?????? m??t???n? ?v???k?] ( listen); German for Bavarian Motor Works), usually known under its abbreviation BMW (German pronunciation: [?be????m?ve?] ( listen)), is a German luxury vehicles, motorcycle, and engine manufacturing company founded in 1916.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_title`
--
ALTER TABLE `book_title`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepic`
--
ALTER TABLE `profilepic`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summaryoforg`
--
ALTER TABLE `summaryoforg`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `book_title`
--
ALTER TABLE `book_title`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `summaryoforg`
--
ALTER TABLE `summaryoforg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
