-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2018 at 12:38 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrwhyte`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `confirm_password`, `fullname`) VALUES
(1, 'info@livinganeffectivelifestyle.com', '#aniekanjoshua2018=+', '#aniekanjoshua2018=+', 'Aniekan Whyte'),
(2, 'dianadeewhyte@gmail.com', '#dianawhyte2018=+', '#dianawhyte2018=+', 'Diana Whyte');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `skype` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `biggest_challenge` varchar(200) NOT NULL,
  `present_challenge` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `email`, `phone`, `skype`, `country`, `city`, `biggest_challenge`, `present_challenge`) VALUES
(4, 'Chibuzor', 'James', 'victorblaze2010@yahoo.com', '0906355442442', '@garryjames', 'China', 'Beijing', 'Getting A Job', 'I Am Not Getting Enough Results'),
(5, 'Chibuzor', 'James', 'victorblaze2010@yahoo.com', '0906355442442', '@garryjames', 'China', 'Beijing', 'Getting A Job', 'I Am Not Getting Enough Results');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(200) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`) VALUES
(1, 'newsletter'),
(2, 'words_in_season');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(250) NOT NULL,
  `content` varchar(40000) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `page_id`, `title`, `subtitle`, `content`, `image`, `date`) VALUES
(1, 1, 'How to read', 'fifty reading habits', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '1871923585Abeokuta Olumo rock 078_JPG.jpg', ''),
(2, 2, 'help from above', 'God helps', 'hello', '1871923585Abeokuta Olumo rock 078_JPG.jpg', ''),
(3, 2, 'Bible Study tips', 'How to become sound in the word', 'read your biblr', '1527444966austin.jpg', 'Thursday 12th of April 2018 01:31:05 PM'),
(4, 2, 'being spiritual is lovely', 'so what', 'pray to God', '2146245825', 'Thursday 12th of April 2018'),
(5, 1, 'gggg', 'hhh', 'hhh', '542040041', 'Thursday 12th of April 2018'),
(6, 2, 'Killing giants is very good', 'agu the giant slayer is dead', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '2027232548aniekan.jpg', 'Thursday 12th of April 2018'),
(8, 1, 'Fitting in', 'five tips to success', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '1653941343claassss.jpg', 'Monday 16th of April 2018'),
(9, 1, 'How to maximize your potentials', '', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '1511865698', 'Monday 16th of April 2018'),
(10, 1, 'How to be yourself', 'learn to be yourself', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '1450091842class.jpg', 'Monday 16th of April 2018'),
(11, 1, 'Raising disciples', 'coaching redefined', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '6658544coach1.jpg', 'Monday 16th of April 2018'),
(12, 1, 'Fear is a disease', 'dangers of fear', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '1365560712fear1.jpg', 'Monday 16th of April 2018'),
(13, 1, 'Mentoring', 'How to be a good mentor', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '298295485classroom.jpg', 'Monday 16th of April 2018'),
(14, 1, 'Life coaching', 'live your life', 'We refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.\r\n\r\nWe refer to your application for employment and subsequent interviews and are pleased to advise that you have being offered employment as a SECRETARY with Xthaffers Outsourcing Limited on the following terms and conditions.', '360612402life2.jpg', 'Monday 16th of April 2018');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
