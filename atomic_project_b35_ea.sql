-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 03:10 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atomic_project_b35_ea`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for Birthday ';

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `birthdate`) VALUES
(101, 'Sultan Mohammed Arman', '1992-01-01'),
(103, 'Farzana Hafsa', '0000-00-00'),
(104, 'Farzana Hafsa', '0000-00-00'),
(105, 'Farzana Hafsa', '2017-01-01'),
(108, 'Esteak Alam Este', '2008-08-03'),
(109, 'Md. Eftequarul Alam', '1992-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `book_title`
--

CREATE TABLE `book_title` (
  `id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `book_isbn` varchar(50) NOT NULL,
  `book_info` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table for Book title';

--
-- Dumping data for table `book_title`
--

INSERT INTO `book_title` (`id`, `book_name`, `author_name`, `book_isbn`, `book_info`) VALUES
(1, 'Object-Oriented Programming with PHP5', 'Hasin Hyder', '978-1-847192-56-1', 'Learn to leverage PHP5''s OOP features to write man'),
(2, 'APACHE-MYSQL-PHP', 'Sureed Sarkar', '984-70277-00084', 'à¦ªà¦¿à¦à¦‡à¦›à¦ªà¦¿à¦° à¦‰à¦ªà¦°à§‡ à¦²à§‡à¦–à¦¾ à¦¸à§à¦¹à§ƒà¦¦ à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦¬à¦‡, à¦ªà§à¦°à¦¥à¦® à¦ªà§à¦°à¦•à¦¾à¦¶à¦¿à¦¤ à¦¹à§Ÿà§‡à¦›à¦¿à¦² à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦° à§¨à§¦à§¦à§« à¦¸à¦¾à¦²à§‡ '),
(3, 'à¦¸à¦¬à¦¾à¦° à¦œà¦¨à§à¦¯ C', 'à¦®à§‹à¦ƒ à¦•à¦¾à¦®à¦°à§à¦œà§à¦œà¦¾à¦®à¦¾à¦¨ à¦¨', '984-8485-29-5', 'Programming C book by Kamruzzaman Niton un Bangla'),
(4, 'Conquer Grammer', 'Saifur Rahman Khan', 'No ISBN', 'Book for grammar practice by S@ifur''s'),
(5, 'VocaBuilder', 'Farhad Hossain Masum ', '978-984-8875-87-2', 'Vocabulary Builder for GRE, GMAT, SAT, TOEFL, IELTS, BBA/MBA test takers'),
(6, '', '', '', ''),
(7, 'Programming in ANSI C', 'E Balagurusamy', '139780070648227', 'Best book for learning Programming C'),
(8, 'Advanced Joomla!', 'Mohammad Mizanur Rahman', '9789848933480', 'Joomla Book by Mizanur Rahman'),
(9, 'à¦¨à¦¬à§€à¦¨à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦œà§à¦®à¦²à¦¾', 'à¦ªà¦¾à¦°à§à¦¥ à¦¸à¦¾à¦°à¦¥à¦¿ à¦•à§Ÿà¦°', 'No ISBN', 'Book by Partha sarthi Kar'),
(10, 'dgjdykh', 'hdjhddkjh', 'hdkjhfh fkjehfuiu', 'jf  hfkhf h hkjhfhfkjff rhfk vnvnkjfiwioi ru'),
(11, 'fhkjh hkjch hdfh', 'hddhdjdhd c mnh jjc hd', ' hd  hdjdhdjdhs  dhh', 'hdhuychuihdcjccskdjsdfh dfh'),
(12, 'fvh fvh hfdvf', ' fhhjkf hgrieuj hviu', 'jvjfhvbvlj hjk hhfffh', 'dhfhfhhdcyechrjhhvcredhczhcjhhj'),
(13, 'dcdcjkjchjjcd ', 'jdjjdcdjc', 'jjfjfjhfjhjk fhfhdfhfhsyrfeir yeuy qwiwwo', 'shd dgweyey  fyeiuydewy y fyyfeyiuy fwefy7r4r'),
(14, 'fhhfhdjksdjdj', 'edy gdhhgd yeryweddc hheydsh', '343474747237219', 'ffh hcjhf yfe dsaduijaxcnbm<Zxns'),
(15, 'gvfvjvjkrjfjf', 'hdfjhdjkfh fhkjsjf jfjkl', 'jhduheiu3y28734e', 'sdhrfjrefrjffkvj gkv;l '),
(16, 'dhd fhuif yhfjkdh', 'hdfhdjfchudhcfjhjksdhdf', 'hfduhfherfhkjh', 'hdjhrfk jvkvf'),
(17, 'vc hcjkjj', 'jfkjhrfjhrjfhefuyf4y', 'hfytghfgre8f fh ', 'hfuyg gtgurtgtrhgiuyg grjhgi'),
(18, 'v v hvj gj ', 'jf gh jg7yg giu756578', 'tg jbhfbjfi u bgfbi ojhth', 'fhghgh g jj g '),
(19, 'bd f hc hcyh', 'hddghjheegfjhgc cdcjhwg', 'hjhcg dgcjh dchfrhfyuycsd', 'hufhbdfgvuyfrehcgc'),
(20, 'ccg fc hfkjvy iuvhj', 'jkjhd hfkjuf89rufi4utti5y', 'yd7436r74r8775759834', 'ufyeyf rfy y fkjhv  fhdfg'),
(21, '6e864878687`', 'dydiuyf784r4r487', 'yfyf7r7547t', 'tyygiuryghvyg87t5rterfr'),
(22, 'hdkjhfkjv irf ij', 'jfhfjhrfhjwdejeri fyr45875', 'whdiufuify784578458657', 'rtrg tgu ggg ghg t  b vbnbj vn,vlhjkpo8 ojl;l');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL COMMENT 'City Name of User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for storing City data';

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `city`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'Kabul');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `emailaddress` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for Email Address Atomic Project';

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `name`, `emailaddress`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'ikudmdbkk@history.co');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL COMMENT 'Gender info'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for storing gender data';

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `gender`) VALUES
(101, 'Ibn e Sina', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `hobbies` varchar(200) NOT NULL COMMENT 'Storing hobbies Data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for storing hobbies information';

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `hobbies`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'War, Fight, Ridding horse');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE `profilepic` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `profile_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for storing Profile Picture information';

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`id`, `name`, `profile_image`) VALUES
(101, 'Iktiar Uddin Mohammad Baktiar Khilji', 'img/user/propic/');

-- --------------------------------------------------------

--
-- Table structure for table `summaryoforg`
--

CREATE TABLE `summaryoforg` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for Summary of Organization';

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `book_title`
--
ALTER TABLE `book_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `summaryoforg`
--
ALTER TABLE `summaryoforg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
