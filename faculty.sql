-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2015 at 04:29 PM
-- Server version: 10.0.21-MariaDB-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleagues`
--

CREATE TABLE IF NOT EXISTS `colleagues` (
  `id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `sponsors` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colleagues`
--

INSERT INTO `colleagues` (`id`, `fac_id`, `c_name`, `position`, `sponsors`, `school_id`, `department_id`) VALUES
(1, 5, 'oo', 'oo', 'oo', 2, 2),
(2, 5, 'p', '', '', -1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_projects`
--

CREATE TABLE IF NOT EXISTS `consultancy_projects` (
  `id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `area` varchar(150) NOT NULL,
  `year` varchar(20) NOT NULL COMMENT 'eg 2014-15',
  `name_of_firm` varchar(100) NOT NULL,
  `revenue` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consultancy_projects`
--

INSERT INTO `consultancy_projects` (`id`, `fac_id`, `area`, `year`, `name_of_firm`, `revenue`) VALUES
(1, 5, 'xyz', '1234', 'abcd', 'hello'),
(2, 5, 'p', 'p', 'p', 'p'),
(3, 5, 'p', 'p', 'p', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(45) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `school_id`) VALUES
(2, 'Department of Mathamatics', 2),
(3, 'Central Computer Center', 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `other_details` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `fac_id`, `name`, `other_details`) VALUES
(1, 5, 'hello World', 'hello World<br>');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fac_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login_link` varchar(36) NOT NULL,
  `monographs` float NOT NULL,
  `chapters_in_books` float NOT NULL,
  `books_with_isbn` float NOT NULL,
  `national_db` float NOT NULL,
  `international_db` float NOT NULL,
  `citation_min` float NOT NULL,
  `citation_max` float NOT NULL,
  `citation_avg` float NOT NULL,
  `snip` float NOT NULL,
  `sjr` float NOT NULL,
  `impact_min` float NOT NULL,
  `impact_max` float NOT NULL,
  `impact_avg` float NOT NULL,
  `h_index` float NOT NULL,
  `school_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `name`, `email`, `login_link`, `monographs`, `chapters_in_books`, `books_with_isbn`, `national_db`, `international_db`, `citation_min`, `citation_max`, `citation_avg`, `snip`, `sjr`, `impact_min`, `impact_max`, `impact_avg`, `h_index`, `school_id`, `department_id`) VALUES
(1, 'pp', '', '75e70683f76a021fda72ab5d58404bd69377', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3),
(2, 'hh', '', '3b65b3224435c20f0016fce8c40e8b2b01c1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3),
(3, 'oo', 'oo', '2c51ca0b3ccec7a49159e5902c6dbbd6afe8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3),
(4, 'oo', 'oo', '396f7c7e885e3ecbcd67f2dc47301d031e45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3),
(5, 'Varun Garg', 'varun.10@live.com', '8b8a63425a20be2239f8e3ef57846350d0db', 6, 0, 0, 0, 0, 8, 6, 4, 0, 0, 22, 2, 90, 0, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `research_conferences`
--

CREATE TABLE IF NOT EXISTS `research_conferences` (
  `id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `school_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `funding_agency` varchar(150) NOT NULL,
  `other_details` text NOT NULL,
  `participants` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research_conferences`
--

INSERT INTO `research_conferences` (`id`, `fac_id`, `title`, `school_id`, `department_id`, `funding_agency`, `other_details`, `participants`) VALUES
(1, 5, 'title', 1, 3, 'gen', 'gen', 'pp'),
(2, 5, 'a', -1, -1, 'x', 'y', 'zz'),
(3, 5, 'h', -1, -1, 'h', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`) VALUES
(1, 'School Of Information and Communication  Technology'),
(2, 'School Of Vocational Studies And Applied Sciences'),
(3, 'School of Management');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleagues`
--
ALTER TABLE `colleagues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancy_projects`
--
ALTER TABLE `consultancy_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `research_conferences`
--
ALTER TABLE `research_conferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleagues`
--
ALTER TABLE `colleagues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `consultancy_projects`
--
ALTER TABLE `consultancy_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `research_conferences`
--
ALTER TABLE `research_conferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
