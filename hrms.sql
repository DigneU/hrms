-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 10:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_request`
--

CREATE TABLE IF NOT EXISTS `account_request` (
  `USER_ID` int(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `NATIONAL_ID` varchar(255) NOT NULL,
  `PHONE_NUMBER` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `DISTRICT` varchar(255) NOT NULL,
  `POSITION` varchar(255) NOT NULL,
  `DEPARTMENT` varchar(255) NOT NULL,
  `PROFILE_PICTURE` longblob NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `USER_TYPE` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `POSTING_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_leave`
--

CREATE TABLE IF NOT EXISTS `cancelled_leave` (
  `C_ID` int(255) NOT NULL AUTO_INCREMENT,
  `LEAVE_ID` int(255) NOT NULL,
  `USER_ID` int(255) NOT NULL,
  `LEAVE_TYPE` varchar(255) NOT NULL,
  `REASON` text NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `USER_TYPE` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cancelled_leave`
--

INSERT INTO `cancelled_leave` (`C_ID`, `LEAVE_ID`, `USER_ID`, `LEAVE_TYPE`, `REASON`, `TITLE`, `DESCRIPTION`, `USER_TYPE`, `STATUS`) VALUES
(31, 43, 17, 'Sick', 'I am sick', 'Cancelling leave request', 'I have recovered', 'User', 'CANCELLED'),
(32, 44, 17, 'Vacation', 'I want to travel abroad', 'Cancelling leave ', 'I changed my mind', 'User', 'CANCELLED'),
(33, 46, 17, 'Vacation', 'I want to take a rest', 'sORRY', 'bUT i HAVE', 'Admin', ''),
(34, 43, 17, 'Sick', 'I am sick', 'OK', 'RECEIVED', 'Admin', 'CANCELLED'),
(35, 48, 17, 'Sick', 'UHUYY', 'sORRY', 'VVVGV', 'User', 'CANCELLED'),
(36, 45, 17, 'Maternity', 'I am soon giving birth', 'Well Received', 'VGVVG', 'User', 'PENDING'),
(37, 45, 17, 'Maternity', 'I am soon giving birth', 'KKKK', 'jbbbjbj', 'User', 'PENDING'),
(38, 49, 17, 'Vacation', 'I just want to relax', 'Sorry', 'I am no longer want this vacation', 'User', 'CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE IF NOT EXISTS `create_account` (
  `USER_ID` int(255) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `POSTING_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `USERNAME`, `PASSWORD`, `POSTING_DATE`) VALUES
(35, 'Clovis', 'Wanziguya', 'Clovis@gmail.com', 'Clovis', '*BFD0F3345979BD88FC216DE1A01D74D6C1C263B7', '2019-10-04 20:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `DID` int(255) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(255) NOT NULL,
  `DEDUCTION_TYPE` varchar(255) NOT NULL,
  `DEDUCTION_AMOUNT` varchar(255) NOT NULL,
  PRIMARY KEY (`DID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`DID`, `USER_ID`, `DEDUCTION_TYPE`, `DEDUCTION_AMOUNT`) VALUES
(9, 0, 'Allowance', '4000'),
(7, 0, 'Retirement', '2000'),
(10, 0, 'RSSB', '4000'),
(8, 0, 'Total', '13000'),
(11, 0, 'Pay As You Earn', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE IF NOT EXISTS `leave_application` (
  `LEAVE_ID` int(255) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(255) NOT NULL,
  `LEAVE_TYPE` varchar(255) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `REASON` text NOT NULL,
  `LEAVE_DATE` date NOT NULL,
  `REQUESTED_DAYS` int(255) NOT NULL,
  `RLEAVE_DAYS` int(255) NOT NULL,
  `TOTAL_DAYS` int(255) NOT NULL,
  `REMAINING_DAYS` int(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  PRIMARY KEY (`LEAVE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`LEAVE_ID`, `USER_ID`, `LEAVE_TYPE`, `DATE`, `REASON`, `LEAVE_DATE`, `REQUESTED_DAYS`, `RLEAVE_DAYS`, `TOTAL_DAYS`, `REMAINING_DAYS`, `STATUS`) VALUES
(44, 17, 'Vacation', '2019-09-19 09:16:00', 'I want to travel abroad', '2019-09-27', 5, 15, 30, 25, 'CANCELLED'),
(45, 17, 'Maternity', '2019-09-19 09:21:05', 'I am soon giving birth', '2019-09-30', 20, 10, 25, 5, 'CONFIRMED'),
(47, 17, 'Vacation', '2019-10-07 20:33:00', 'asdfg', '2019-10-08', 4, 16, 5, 1, 'CONFIRMED');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE IF NOT EXISTS `leave_types` (
  `TYPE_ID` int(255) NOT NULL AUTO_INCREMENT,
  `LEAVE_TYPE` varchar(255) NOT NULL,
  `LEAVE_DAYS` int(255) NOT NULL,
  PRIMARY KEY (`TYPE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`TYPE_ID`, `LEAVE_TYPE`, `LEAVE_DAYS`) VALUES
(1, 'Maternity', 30),
(2, 'Sick', 20),
(3, 'Vacation', 20),
(4, 'Normal/Annual', 70);

-- --------------------------------------------------------

--
-- Table structure for table `paid_users`
--

CREATE TABLE IF NOT EXISTS `paid_users` (
  `PAID_ID` int(255) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(255) NOT NULL,
  `DATE_PAID` date NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `AMOUNT` float NOT NULL,
  PRIMARY KEY (`PAID_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `paid_users`
--

INSERT INTO `paid_users` (`PAID_ID`, `USER_ID`, `DATE_PAID`, `TYPE`, `AMOUNT`) VALUES
(11, 3, '2019-10-08', 'Monthly salary', 500000),
(4, 1, '2019-10-08', 'Monthly salary', 150000),
(5, 1, '2019-10-08', 'Salary in Advance', 10000),
(6, 6, '2019-10-08', 'Monthly salary', 150000),
(9, 3, '2019-10-08', 'Salary in Advance', 10000),
(12, 17, '2019-10-08', 'Monthly salary', 500000),
(13, 17, '2019-10-07', 'Salary in Advance', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `PAYROLL_ID` int(255) NOT NULL AUTO_INCREMENT,
  `POSITION` varchar(255) NOT NULL,
  `GROSS_SALARY` float NOT NULL,
  `TOTAL_SUPPLEMENTS` int(255) NOT NULL,
  `TOTAL_DEDUCTIONS` int(255) NOT NULL,
  `NET_SALARY` int(255) NOT NULL,
  PRIMARY KEY (`PAYROLL_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`PAYROLL_ID`, `POSITION`, `GROSS_SALARY`, `TOTAL_SUPPLEMENTS`, `TOTAL_DEDUCTIONS`, `NET_SALARY`) VALUES
(1, 'Techinical Support', 200000, 8000, 13000, 187000),
(2, 'Software Developers', 500000, 8000, 13000, 487000),
(3, 'Chief Finance Manager', 150000, 8000, 13000, 137000),
(4, 'Chief Executive Officer', 200000, 8000, 13000, 187000),
(5, 'Chief Operation Manager', 600000, 8000, 13000, 587000);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `POST_ID` int(255) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(255) NOT NULL,
  `CONTENT` text NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `PICTURE` varchar(255) NOT NULL,
  `DATE` date NOT NULL,
  `POST_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`POST_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`POST_ID`, `TITLE`, `CONTENT`, `CATEGORY`, `PICTURE`, `DATE`, `POST_DATE`) VALUES
(1, 'COMPETITION', '\r\nWe are having a competition this week, where every employee will get a chance with an idea of implementing new technology in our organization. Don''t hesitate to compete because you might worn 50000$. You are all welcomed.', 'Funny', 'upload/COMP_1567106255.jpg', '2019-09-10', '2019-08-29 10:17:35'),
(2, 'WELCOMING NEW EMPLOYEES EVENT', 'This week, we are excited to welcome the new employees into the bright Mvend community. Congratulations for those who have becomed part of our team! In this upcoming event our whole team will welcome new employees such as them. W e look forward to enjoy with in that upcoming event. Welcome aboard.', 'News', 'upload/EMPLOYEES_1567106312.jpg', '2019-08-31', '2019-08-29 10:18:32'),
(10, 'COMMUNITY WORK', 'At the of the month, we have a community work in our organization', 'General', 'upload/image2_1570488559.jpg', '2019-10-17', '2019-10-07 23:00:29'),
(14, 'TRAININGS', 'UMUGANDA', 'General', 'upload/8_1570527683.png', '2019-10-10', '2019-10-08 09:41:32'),
(13, 'Well Received', 'HGFGHFH', 'General', 'upload/7_1570527273.png', '2019-10-17', '2019-10-08 09:37:39'),
(15, 'viviame', 'fvhud', 'General', 'upload/grid-img1_1570527806.png', '2019-10-12', '2019-10-08 09:43:30'),
(16, 'MUNGU', 'GUHIMBAZA', 'General', 'upload/6_1570529094.png', '2019-10-11', '2019-10-08 10:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `post_draft`
--

CREATE TABLE IF NOT EXISTS `post_draft` (
  `POST_ID` int(255) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(255) NOT NULL,
  `CONTENT` text NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `PICTURE` varchar(255) NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`POST_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplements`
--

CREATE TABLE IF NOT EXISTS `supplements` (
  `SUPPLEMENTS_ID` int(255) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(255) NOT NULL,
  `SUPPLEMENTS_NAME` varchar(255) NOT NULL,
  `SUPPLEMENTS_AMOUNT` int(255) NOT NULL,
  PRIMARY KEY (`SUPPLEMENTS_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `supplements`
--

INSERT INTO `supplements` (`SUPPLEMENTS_ID`, `USER_ID`, `SUPPLEMENTS_NAME`, `SUPPLEMENTS_AMOUNT`) VALUES
(13, 0, 'Transport', 3000),
(10, 0, 'PerDiem', 5000),
(12, 0, 'Total', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `total_days`
--

CREATE TABLE IF NOT EXISTS `total_days` (
  `DAYS_ID` int(2) NOT NULL AUTO_INCREMENT,
  `DAYS` int(255) NOT NULL,
  PRIMARY KEY (`DAYS_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `total_days`
--

INSERT INTO `total_days` (`DAYS_ID`, `DAYS`) VALUES
(1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `user_deduction`
--

CREATE TABLE IF NOT EXISTS `user_deduction` (
  `DID` int(255) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(255) NOT NULL,
  `DEDUCTION_TYPE` varchar(255) NOT NULL,
  `DEDUCTION_AMOUNT` float NOT NULL,
  `TOTAL` float NOT NULL,
  PRIMARY KEY (`DID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_deduction`
--

INSERT INTO `user_deduction` (`DID`, `USER_ID`, `DEDUCTION_TYPE`, `DEDUCTION_AMOUNT`, `TOTAL`) VALUES
(5, 1, 'RSSB', 18, 18),
(6, 17, 'RSSB', 18, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE IF NOT EXISTS `user_logs` (
  `LOG_ID` int(255) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) NOT NULL,
  `LOGIN_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LOGOUT_TIME` varchar(255) NOT NULL,
  PRIMARY KEY (`LOG_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=350 ;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`LOG_ID`, `USERNAME`, `LOGIN_TIME`, `LOGOUT_TIME`) VALUES
(1, 'estella', '2019-08-23 15:54:15', '09-10-2019 01:38:03 AM'),
(2, 'amata', '2019-08-23 15:54:33', '19-09-2019 01:47:12 AM'),
(3, 'estella', '2019-08-23 15:54:48', '09-10-2019 01:38:03 AM'),
(4, 'amata', '2019-08-23 15:58:53', '19-09-2019 01:47:12 AM'),
(5, 'estella', '2019-08-23 16:00:28', '09-10-2019 01:38:03 AM'),
(6, 'estella', '2019-08-24 08:42:06', '09-10-2019 01:38:03 AM'),
(7, 'estella', '2019-08-25 08:54:56', '09-10-2019 01:38:03 AM'),
(8, 'estella', '2019-08-25 08:59:13', '09-10-2019 01:38:03 AM'),
(9, 'niyo', '2019-08-25 08:59:54', '08-10-2019 10:16:06 AM'),
(10, 'amata', '2019-08-27 07:34:50', '19-09-2019 01:47:12 AM'),
(11, 'amata', '2019-08-27 07:51:19', '19-09-2019 01:47:12 AM'),
(12, 'amata', '2019-08-27 07:54:21', '19-09-2019 01:47:12 AM'),
(13, 'estella', '2019-08-27 08:13:38', '09-10-2019 01:38:03 AM'),
(14, 'amata', '2019-08-27 08:16:05', '19-09-2019 01:47:12 AM'),
(15, 'estella', '2019-08-27 09:20:09', '09-10-2019 01:38:03 AM'),
(16, 'estella', '2019-08-27 09:31:31', '09-10-2019 01:38:03 AM'),
(17, 'estella', '2019-08-27 10:10:10', '09-10-2019 01:38:03 AM'),
(18, 'estella', '2019-08-27 10:22:04', '09-10-2019 01:38:03 AM'),
(19, 'amata', '2019-08-27 10:35:30', '19-09-2019 01:47:12 AM'),
(20, 'niyo', '2019-08-27 10:45:13', '08-10-2019 10:16:06 AM'),
(21, 'amata', '2019-08-27 10:45:39', '19-09-2019 01:47:12 AM'),
(22, 'estella', '2019-08-27 10:48:13', '09-10-2019 01:38:03 AM'),
(23, 'amata', '2019-08-27 10:52:03', '19-09-2019 01:47:12 AM'),
(24, 'estella', '2019-08-28 06:59:01', '09-10-2019 01:38:03 AM'),
(25, 'niyo', '2019-08-28 07:01:25', '08-10-2019 10:16:06 AM'),
(26, 'estella', '2019-08-28 07:02:08', '09-10-2019 01:38:03 AM'),
(27, 'niyo', '2019-08-28 07:02:49', '08-10-2019 10:16:06 AM'),
(28, 'estella', '2019-08-28 07:03:53', '09-10-2019 01:38:03 AM'),
(29, 'amata', '2019-08-28 07:43:51', '19-09-2019 01:47:12 AM'),
(30, 'amata', '2019-08-28 07:48:10', '19-09-2019 01:47:12 AM'),
(31, 'niyo', '2019-08-28 07:54:43', '08-10-2019 10:16:06 AM'),
(32, 'estella', '2019-08-28 08:19:07', '09-10-2019 01:38:03 AM'),
(33, 'niyo', '2019-08-28 08:19:58', '08-10-2019 10:16:06 AM'),
(34, 'estella', '2019-08-28 08:26:42', '09-10-2019 01:38:03 AM'),
(35, 'amata', '2019-08-28 09:16:36', '19-09-2019 01:47:12 AM'),
(36, 'estella', '2019-08-28 09:19:04', '09-10-2019 01:38:03 AM'),
(37, 'estella', '2019-08-28 09:34:28', '09-10-2019 01:38:03 AM'),
(38, 'amata', '2019-08-28 09:37:58', '19-09-2019 01:47:12 AM'),
(39, 'estella', '2019-08-28 09:38:41', '09-10-2019 01:38:03 AM'),
(40, 'amata', '2019-08-28 09:43:22', '19-09-2019 01:47:12 AM'),
(41, 'amata', '2019-08-28 09:43:44', '19-09-2019 01:47:12 AM'),
(42, 'estella', '2019-08-28 09:43:57', '09-10-2019 01:38:03 AM'),
(43, 'amata', '2019-08-28 10:36:22', '19-09-2019 01:47:12 AM'),
(44, 'estella', '2019-08-28 10:43:26', '09-10-2019 01:38:03 AM'),
(45, 'amata', '2019-08-28 10:47:22', '19-09-2019 01:47:12 AM'),
(46, 'estella', '2019-08-28 10:50:29', '09-10-2019 01:38:03 AM'),
(47, 'amata', '2019-08-28 11:08:36', '19-09-2019 01:47:12 AM'),
(48, 'estella', '2019-08-28 11:09:10', '09-10-2019 01:38:03 AM'),
(49, 'amata', '2019-08-28 11:17:44', '19-09-2019 01:47:12 AM'),
(50, 'estella', '2019-08-28 12:11:34', '09-10-2019 01:38:03 AM'),
(51, 'estella', '2019-08-29 06:54:08', '09-10-2019 01:38:03 AM'),
(52, 'amata', '2019-08-29 06:56:30', '19-09-2019 01:47:12 AM'),
(53, 'estella', '2019-08-29 06:57:13', '09-10-2019 01:38:03 AM'),
(54, 'amata', '2019-08-29 07:29:44', '19-09-2019 01:47:12 AM'),
(55, 'amata', '2019-08-29 07:40:20', '19-09-2019 01:47:12 AM'),
(56, 'estella', '2019-08-29 08:25:56', '09-10-2019 01:38:03 AM'),
(57, 'amata', '2019-08-29 08:48:13', '19-09-2019 01:47:12 AM'),
(58, 'estella', '2019-08-29 08:56:41', '09-10-2019 01:38:03 AM'),
(59, 'amata', '2019-08-29 09:02:31', '19-09-2019 01:47:12 AM'),
(60, 'estella', '2019-08-29 09:23:12', '09-10-2019 01:38:03 AM'),
(61, 'amata', '2019-08-29 09:29:00', '19-09-2019 01:47:12 AM'),
(62, 'estella', '2019-08-29 09:47:28', '09-10-2019 01:38:03 AM'),
(63, 'amata', '2019-08-29 10:07:24', '19-09-2019 01:47:12 AM'),
(64, 'estella', '2019-08-29 10:08:06', '09-10-2019 01:38:03 AM'),
(65, 'amata', '2019-08-29 10:09:01', '19-09-2019 01:47:12 AM'),
(66, 'estella', '2019-08-29 10:16:09', '09-10-2019 01:38:03 AM'),
(67, 'amata', '2019-08-29 10:18:48', '19-09-2019 01:47:12 AM'),
(68, 'estella', '2019-08-29 10:20:38', '09-10-2019 01:38:03 AM'),
(69, 'estella', '2019-08-29 11:37:12', '09-10-2019 01:38:03 AM'),
(70, 'estella', '2019-08-29 11:38:23', '09-10-2019 01:38:03 AM'),
(71, 'estella', '2019-08-29 11:38:36', '09-10-2019 01:38:03 AM'),
(72, 'estella', '2019-08-29 11:42:18', '09-10-2019 01:38:03 AM'),
(73, 'amata', '2019-08-29 11:50:13', '19-09-2019 01:47:12 AM'),
(74, 'amata', '2019-08-29 11:51:30', '19-09-2019 01:47:12 AM'),
(75, 'estella', '2019-08-29 11:58:25', '09-10-2019 01:38:03 AM'),
(76, 'amata', '2019-08-29 11:58:56', '19-09-2019 01:47:12 AM'),
(77, 'estella', '2019-08-29 11:59:12', '09-10-2019 01:38:03 AM'),
(78, 'esther', '2019-08-29 12:12:34', '29-08-2019 02:14:03 PM'),
(79, 'estella', '2019-08-29 12:14:11', '09-10-2019 01:38:03 AM'),
(80, 'amata', '2019-08-29 12:24:18', '19-09-2019 01:47:12 AM'),
(81, 'estella', '2019-08-29 12:29:53', '09-10-2019 01:38:03 AM'),
(82, 'amata', '2019-08-31 11:56:32', '19-09-2019 01:47:12 AM'),
(83, 'amata', '2019-08-31 11:58:51', '19-09-2019 01:47:12 AM'),
(84, 'amata', '2019-08-31 12:03:08', '19-09-2019 01:47:12 AM'),
(85, 'estella', '2019-08-31 12:06:07', '09-10-2019 01:38:03 AM'),
(86, 'amata', '2019-08-31 12:08:01', '19-09-2019 01:47:12 AM'),
(87, 'amata', '2019-08-31 12:23:55', '19-09-2019 01:47:12 AM'),
(88, 'estella', '2019-08-31 12:40:39', '09-10-2019 01:38:03 AM'),
(89, 'amata', '2019-08-31 13:05:08', '19-09-2019 01:47:12 AM'),
(90, 'estella', '2019-08-31 13:40:03', '09-10-2019 01:38:03 AM'),
(91, 'amata', '2019-08-31 13:40:47', '19-09-2019 01:47:12 AM'),
(92, 'estella', '2019-08-31 13:44:47', '09-10-2019 01:38:03 AM'),
(93, 'amata', '2019-08-31 13:46:28', '19-09-2019 01:47:12 AM'),
(94, 'estella', '2019-08-31 13:47:53', '09-10-2019 01:38:03 AM'),
(95, 'amata', '2019-08-31 13:48:25', '19-09-2019 01:47:12 AM'),
(96, 'estella', '2019-08-31 13:49:00', '09-10-2019 01:38:03 AM'),
(97, 'estella', '2019-09-02 07:18:45', '09-10-2019 01:38:03 AM'),
(98, 'amata', '2019-09-02 07:21:01', '19-09-2019 01:47:12 AM'),
(99, 'estella', '2019-09-02 07:22:07', '09-10-2019 01:38:03 AM'),
(100, 'amata', '2019-09-02 07:23:55', '19-09-2019 01:47:12 AM'),
(101, 'estella', '2019-09-02 07:24:44', '09-10-2019 01:38:03 AM'),
(102, 'amata', '2019-09-02 07:48:54', '19-09-2019 01:47:12 AM'),
(103, 'estella', '2019-09-02 07:50:03', '09-10-2019 01:38:03 AM'),
(104, 'amata', '2019-09-03 07:52:08', '19-09-2019 01:47:12 AM'),
(105, 'estella', '2019-09-03 07:59:39', '09-10-2019 01:38:03 AM'),
(106, 'estella', '2019-09-03 08:23:29', '09-10-2019 01:38:03 AM'),
(107, 'amata', '2019-09-03 08:55:11', '19-09-2019 01:47:12 AM'),
(108, 'estella', '2019-09-03 09:03:24', '09-10-2019 01:38:03 AM'),
(109, 'amata', '2019-09-03 09:06:04', '19-09-2019 01:47:12 AM'),
(110, 'estella', '2019-09-03 09:07:02', '09-10-2019 01:38:03 AM'),
(111, 'amata', '2019-09-03 09:08:01', '19-09-2019 01:47:12 AM'),
(112, 'niyo', '2019-09-03 09:33:32', '08-10-2019 10:16:06 AM'),
(113, 'amata', '2019-09-03 09:40:43', '19-09-2019 01:47:12 AM'),
(114, 'niyo', '2019-09-03 09:45:23', '08-10-2019 10:16:06 AM'),
(115, 'estella', '2019-09-03 09:45:48', '09-10-2019 01:38:03 AM'),
(116, 'niyo', '2019-09-03 09:48:02', '08-10-2019 10:16:06 AM'),
(117, 'estella', '2019-09-03 09:56:16', '09-10-2019 01:38:03 AM'),
(118, 'amata', '2019-09-03 10:11:38', '19-09-2019 01:47:12 AM'),
(119, 'estella', '2019-09-03 10:12:44', '09-10-2019 01:38:03 AM'),
(120, 'amata', '2019-09-03 11:48:35', '19-09-2019 01:47:12 AM'),
(121, 'estella', '2019-09-03 12:16:01', '09-10-2019 01:38:03 AM'),
(122, 'amata', '2019-09-03 12:17:27', '19-09-2019 01:47:12 AM'),
(123, 'estella', '2019-09-03 12:21:28', '09-10-2019 01:38:03 AM'),
(124, 'amata', '2019-09-03 12:22:10', '19-09-2019 01:47:12 AM'),
(125, 'amata', '2019-09-03 12:31:19', '19-09-2019 01:47:12 AM'),
(126, 'amata', '2019-09-03 12:32:54', '19-09-2019 01:47:12 AM'),
(127, 'niyo', '2019-09-03 12:35:00', '08-10-2019 10:16:06 AM'),
(128, 'estella', '2019-09-03 12:51:46', '09-10-2019 01:38:03 AM'),
(129, 'amata', '2019-09-03 12:55:23', '19-09-2019 01:47:12 AM'),
(130, 'niyo', '2019-09-03 12:57:15', '08-10-2019 10:16:06 AM'),
(131, 'amata', '2019-09-03 13:41:39', '19-09-2019 01:47:12 AM'),
(132, 'estella', '2019-09-03 13:42:07', '09-10-2019 01:38:03 AM'),
(133, 'niyo', '2019-09-03 13:42:36', '08-10-2019 10:16:06 AM'),
(134, 'estella', '2019-09-03 13:45:30', '09-10-2019 01:38:03 AM'),
(135, 'niyo', '2019-09-03 13:46:02', '08-10-2019 10:16:06 AM'),
(136, 'estella', '2019-09-04 08:07:48', '09-10-2019 01:38:03 AM'),
(137, 'amata', '2019-09-04 08:57:55', '19-09-2019 01:47:12 AM'),
(138, 'amata', '2019-09-04 09:07:49', '19-09-2019 01:47:12 AM'),
(139, 'amata', '2019-09-05 08:21:07', '19-09-2019 01:47:12 AM'),
(140, 'amata', '2019-09-05 10:33:04', '19-09-2019 01:47:12 AM'),
(141, 'estella', '2019-09-05 11:03:54', '09-10-2019 01:38:03 AM'),
(142, 'amata', '2019-09-05 11:04:23', '19-09-2019 01:47:12 AM'),
(143, 'estella', '2019-09-05 11:34:49', '09-10-2019 01:38:03 AM'),
(144, 'amata', '2019-09-05 11:41:29', '19-09-2019 01:47:12 AM'),
(145, 'amata', '2019-09-05 11:42:34', '19-09-2019 01:47:12 AM'),
(146, 'estella', '2019-09-05 11:43:16', '09-10-2019 01:38:03 AM'),
(147, 'amata', '2019-09-05 11:43:47', '19-09-2019 01:47:12 AM'),
(148, 'estella', '2019-09-05 11:45:33', '09-10-2019 01:38:03 AM'),
(149, 'amata', '2019-09-05 11:46:08', '19-09-2019 01:47:12 AM'),
(150, 'estella', '2019-09-05 15:58:24', '09-10-2019 01:38:03 AM'),
(151, 'amata', '2019-09-05 15:59:02', '19-09-2019 01:47:12 AM'),
(152, 'niyo', '2019-09-05 16:10:41', '08-10-2019 10:16:06 AM'),
(153, 'amata', '2019-09-06 08:53:07', '19-09-2019 01:47:12 AM'),
(154, 'estella', '2019-09-06 09:00:12', '09-10-2019 01:38:03 AM'),
(155, 'amata', '2019-09-06 09:12:41', '19-09-2019 01:47:12 AM'),
(156, 'estella', '2019-09-06 09:45:36', '09-10-2019 01:38:03 AM'),
(157, 'amata', '2019-09-06 09:47:03', '19-09-2019 01:47:12 AM'),
(158, 'niyo', '2019-09-06 10:47:31', '08-10-2019 10:16:06 AM'),
(159, 'amata', '2019-09-06 10:48:03', '19-09-2019 01:47:12 AM'),
(160, 'estella', '2019-09-06 10:58:38', '09-10-2019 01:38:03 AM'),
(161, 'amata', '2019-09-06 11:00:17', '19-09-2019 01:47:12 AM'),
(162, 'amata', '2019-09-06 11:17:12', '19-09-2019 01:47:12 AM'),
(163, 'amata', '2019-09-06 11:44:57', '19-09-2019 01:47:12 AM'),
(164, 'estella', '2019-09-06 11:52:30', '09-10-2019 01:38:03 AM'),
(165, 'amata', '2019-09-06 11:53:20', '19-09-2019 01:47:12 AM'),
(166, 'estella', '2019-09-06 11:54:30', '09-10-2019 01:38:03 AM'),
(167, 'amata', '2019-09-06 12:14:23', '19-09-2019 01:47:12 AM'),
(168, 'estella', '2019-09-06 12:15:21', '09-10-2019 01:38:03 AM'),
(169, 'amata', '2019-09-06 12:23:46', '19-09-2019 01:47:12 AM'),
(170, 'estella', '2019-09-06 12:25:08', '09-10-2019 01:38:03 AM'),
(171, 'amata', '2019-09-06 12:26:15', '19-09-2019 01:47:12 AM'),
(172, 'amata', '2019-09-06 12:44:09', '19-09-2019 01:47:12 AM'),
(173, 'estella', '2019-09-06 12:44:43', '09-10-2019 01:38:03 AM'),
(174, 'amata', '2019-09-06 12:46:38', '19-09-2019 01:47:12 AM'),
(175, 'estella', '2019-09-06 12:52:06', '09-10-2019 01:38:03 AM'),
(176, 'amata', '2019-09-06 12:57:16', '19-09-2019 01:47:12 AM'),
(177, 'estella', '2019-09-06 12:59:12', '09-10-2019 01:38:03 AM'),
(178, 'amata', '2019-09-06 13:13:22', '19-09-2019 01:47:12 AM'),
(179, 'estella', '2019-09-06 13:17:49', '09-10-2019 01:38:03 AM'),
(180, 'amata', '2019-09-06 13:33:48', '19-09-2019 01:47:12 AM'),
(181, 'estella', '2019-09-06 13:40:00', '09-10-2019 01:38:03 AM'),
(182, 'estella', '2019-09-08 08:06:10', '09-10-2019 01:38:03 AM'),
(183, 'amata', '2019-09-08 08:39:57', '19-09-2019 01:47:12 AM'),
(184, 'estella', '2019-09-08 08:48:13', '09-10-2019 01:38:03 AM'),
(185, 'estella', '2019-09-09 18:38:55', '09-10-2019 01:38:03 AM'),
(186, 'amata', '2019-09-09 18:43:28', '19-09-2019 01:47:12 AM'),
(187, 'estella', '2019-09-10 09:50:30', '09-10-2019 01:38:03 AM'),
(188, 'amata', '2019-09-10 11:56:14', '19-09-2019 01:47:12 AM'),
(189, 'estella', '2019-09-10 12:00:02', '09-10-2019 01:38:03 AM'),
(190, 'amata', '2019-09-10 12:30:42', '19-09-2019 01:47:12 AM'),
(191, 'estella', '2019-09-10 12:43:03', '09-10-2019 01:38:03 AM'),
(192, 'amata', '2019-09-10 12:46:45', '19-09-2019 01:47:12 AM'),
(193, 'estella', '2019-09-10 12:50:54', '09-10-2019 01:38:03 AM'),
(194, 'amata', '2019-09-10 12:51:45', '19-09-2019 01:47:12 AM'),
(195, 'estella', '2019-09-11 07:34:20', '09-10-2019 01:38:03 AM'),
(196, 'amata', '2019-09-11 07:40:35', '19-09-2019 01:47:12 AM'),
(197, 'estella', '2019-09-11 08:14:50', '09-10-2019 01:38:03 AM'),
(198, 'amata', '2019-09-11 08:19:40', '19-09-2019 01:47:12 AM'),
(199, 'niyo', '2019-09-11 08:21:19', '08-10-2019 10:16:06 AM'),
(200, 'niyo', '2019-09-11 08:55:15', '08-10-2019 10:16:06 AM'),
(201, 'amata', '2019-09-11 08:57:17', '19-09-2019 01:47:12 AM'),
(202, 'niyo', '2019-09-11 09:13:43', '08-10-2019 10:16:06 AM'),
(203, 'amata', '2019-09-11 09:20:25', '19-09-2019 01:47:12 AM'),
(204, 'estella', '2019-09-11 09:24:35', '09-10-2019 01:38:03 AM'),
(205, 'amata', '2019-09-11 09:42:15', '19-09-2019 01:47:12 AM'),
(206, 'niyo', '2019-09-11 09:47:22', '08-10-2019 10:16:06 AM'),
(207, 'estella', '2019-09-11 09:53:29', '09-10-2019 01:38:03 AM'),
(208, 'estella', '2019-09-11 10:07:19', '09-10-2019 01:38:03 AM'),
(209, 'estella', '2019-09-11 10:08:41', '09-10-2019 01:38:03 AM'),
(210, 'estella', '2019-09-11 14:55:08', '09-10-2019 01:38:03 AM'),
(211, 'estella', '2019-09-12 08:54:50', '09-10-2019 01:38:03 AM'),
(212, 'estella', '2019-09-13 09:46:19', '09-10-2019 01:38:03 AM'),
(213, 'amata', '2019-09-13 11:44:25', '19-09-2019 01:47:12 AM'),
(214, 'estella', '2019-09-13 14:22:06', '09-10-2019 01:38:03 AM'),
(215, 'estella', '2019-09-15 10:53:06', '09-10-2019 01:38:03 AM'),
(216, 'estella', '2019-09-17 07:36:05', '09-10-2019 01:38:03 AM'),
(217, 'estella', '2019-09-17 09:14:36', '09-10-2019 01:38:03 AM'),
(218, 'amata', '2019-09-17 09:21:25', '19-09-2019 01:47:12 AM'),
(219, 'estella', '2019-09-17 09:30:34', '09-10-2019 01:38:03 AM'),
(220, 'niyo', '2019-09-17 09:45:47', '08-10-2019 10:16:06 AM'),
(221, 'estella', '2019-09-17 10:31:16', '09-10-2019 01:38:03 AM'),
(222, 'niyo', '2019-09-17 10:42:58', '08-10-2019 10:16:06 AM'),
(223, 'amata', '2019-09-17 10:43:39', '19-09-2019 01:47:12 AM'),
(224, 'niyo', '2019-09-17 10:59:43', '08-10-2019 10:16:06 AM'),
(225, 'niyo', '2019-09-17 11:01:37', '08-10-2019 10:16:06 AM'),
(226, 'estella', '2019-09-17 11:02:51', '09-10-2019 01:38:03 AM'),
(227, 'niyo', '2019-09-17 11:04:45', '08-10-2019 10:16:06 AM'),
(228, 'estella', '2019-09-17 11:12:04', '09-10-2019 01:38:03 AM'),
(229, 'niyo', '2019-09-17 12:16:13', '08-10-2019 10:16:06 AM'),
(230, 'niyo', '2019-09-17 13:33:34', '08-10-2019 10:16:06 AM'),
(231, 'niyo', '2019-09-18 08:51:04', '08-10-2019 10:16:06 AM'),
(232, 'estella', '2019-09-18 09:10:35', '09-10-2019 01:38:03 AM'),
(233, 'niyo', '2019-09-18 09:26:01', '08-10-2019 10:16:06 AM'),
(234, 'estella', '2019-09-18 09:27:41', '09-10-2019 01:38:03 AM'),
(235, 'niyo', '2019-09-18 10:33:32', '08-10-2019 10:16:06 AM'),
(236, 'estella', '2019-09-18 11:39:12', '09-10-2019 01:38:03 AM'),
(237, 'niyo', '2019-09-18 11:40:45', '08-10-2019 10:16:06 AM'),
(238, 'estella', '2019-09-18 11:43:44', '09-10-2019 01:38:03 AM'),
(239, 'estella', '2019-09-18 11:48:28', '09-10-2019 01:38:03 AM'),
(240, 'niyo', '2019-09-18 11:48:41', '08-10-2019 10:16:06 AM'),
(241, 'amata', '2019-09-19 05:35:05', '19-09-2019 01:47:12 AM'),
(242, 'estella', '2019-09-19 05:37:51', '09-10-2019 01:38:03 AM'),
(243, 'amata', '2019-09-19 05:40:53', '19-09-2019 01:47:12 AM'),
(244, 'amata', '2019-09-19 05:44:56', '19-09-2019 01:47:12 AM'),
(245, 'estella', '2019-09-19 05:51:55', '09-10-2019 01:38:03 AM'),
(246, 'amata', '2019-09-19 05:53:07', '19-09-2019 01:47:12 AM'),
(247, 'estella', '2019-09-19 05:54:28', '09-10-2019 01:38:03 AM'),
(248, 'amata', '2019-09-19 05:55:23', '19-09-2019 01:47:12 AM'),
(249, 'estella', '2019-09-19 05:58:16', '09-10-2019 01:38:03 AM'),
(250, 'amata', '2019-09-19 05:58:57', '19-09-2019 01:47:12 AM'),
(251, 'estella', '2019-09-19 06:01:06', '09-10-2019 01:38:03 AM'),
(252, 'amata', '2019-09-19 06:37:02', '19-09-2019 01:47:12 AM'),
(253, 'estella', '2019-09-19 06:38:18', '09-10-2019 01:38:03 AM'),
(254, 'amata', '2019-09-19 06:38:44', '19-09-2019 01:47:12 AM'),
(255, 'estella', '2019-09-19 06:39:57', '09-10-2019 01:38:03 AM'),
(256, 'amata', '2019-09-19 06:55:38', '19-09-2019 01:47:12 AM'),
(257, 'estella', '2019-09-19 06:57:26', '09-10-2019 01:38:03 AM'),
(258, 'amata', '2019-09-19 06:57:51', '19-09-2019 01:47:12 AM'),
(259, 'estella', '2019-09-19 06:58:37', '09-10-2019 01:38:03 AM'),
(260, 'amata', '2019-09-19 07:01:11', '19-09-2019 01:47:12 AM'),
(261, 'amata', '2019-09-19 07:08:03', '19-09-2019 01:47:12 AM'),
(262, 'estella', '2019-09-19 07:12:11', '09-10-2019 01:38:03 AM'),
(263, 'amata', '2019-09-19 07:12:52', '19-09-2019 01:47:12 AM'),
(264, 'estella', '2019-09-19 07:29:22', '09-10-2019 01:38:03 AM'),
(265, 'amata', '2019-09-19 07:30:03', '19-09-2019 01:47:12 AM'),
(266, 'niyo', '2019-09-19 07:33:25', '08-10-2019 10:16:06 AM'),
(267, 'estella', '2019-09-19 07:34:19', '09-10-2019 01:38:03 AM'),
(268, 'niyo', '2019-09-19 07:34:40', '08-10-2019 10:16:06 AM'),
(269, 'amata', '2019-09-19 07:48:22', '19-09-2019 01:47:12 AM'),
(270, 'amata', '2019-09-19 08:02:33', '19-09-2019 01:47:12 AM'),
(271, 'estella', '2019-09-19 08:03:30', '09-10-2019 01:38:03 AM'),
(272, 'amata', '2019-09-19 08:03:45', '19-09-2019 01:47:12 AM'),
(273, 'estella', '2019-09-19 08:33:21', '09-10-2019 01:38:03 AM'),
(274, 'amata', '2019-09-19 08:35:27', '19-09-2019 01:47:12 AM'),
(275, 'estella', '2019-09-19 08:36:21', '09-10-2019 01:38:03 AM'),
(276, 'amata', '2019-09-19 08:36:40', '19-09-2019 01:47:12 AM'),
(277, 'estella', '2019-09-19 08:37:33', '09-10-2019 01:38:03 AM'),
(278, 'amata', '2019-09-19 08:37:48', '19-09-2019 01:47:12 AM'),
(279, 'amata', '2019-09-19 08:41:00', '19-09-2019 01:47:12 AM'),
(280, 'amata', '2019-09-19 08:45:21', '19-09-2019 01:47:12 AM'),
(281, 'amata', '2019-09-19 08:46:25', '19-09-2019 01:47:12 AM'),
(282, 'niyo', '2019-09-19 08:47:18', '08-10-2019 10:16:06 AM'),
(283, 'estella', '2019-09-19 08:48:12', '09-10-2019 01:38:03 AM'),
(284, 'niyo', '2019-09-19 08:48:37', '08-10-2019 10:16:06 AM'),
(285, 'estella', '2019-09-19 08:58:55', '09-10-2019 01:38:03 AM'),
(286, 'niyo', '2019-09-19 08:59:13', '08-10-2019 10:16:06 AM'),
(287, 'estella', '2019-09-19 09:02:48', '09-10-2019 01:38:03 AM'),
(288, 'niyo', '2019-09-19 09:03:25', '08-10-2019 10:16:06 AM'),
(289, 'niyo', '2019-09-19 09:04:24', '08-10-2019 10:16:06 AM'),
(290, 'niyo', '2019-09-19 09:08:56', '08-10-2019 10:16:06 AM'),
(291, 'estella', '2019-09-19 09:09:35', '09-10-2019 01:38:03 AM'),
(292, 'niyo', '2019-09-19 09:10:02', '08-10-2019 10:16:06 AM'),
(293, 'estella', '2019-09-19 09:12:22', '09-10-2019 01:38:03 AM'),
(294, 'niyo', '2019-09-19 09:13:31', '08-10-2019 10:16:06 AM'),
(295, 'estella', '2019-09-19 09:16:37', '09-10-2019 01:38:03 AM'),
(296, 'niyo', '2019-09-19 09:17:02', '08-10-2019 10:16:06 AM'),
(297, 'estella', '2019-09-19 09:18:58', '09-10-2019 01:38:03 AM'),
(298, 'niyo', '2019-09-19 09:19:48', '08-10-2019 10:16:06 AM'),
(299, 'estella', '2019-09-19 09:21:28', '09-10-2019 01:38:03 AM'),
(300, 'niyo', '2019-09-19 09:21:42', '08-10-2019 10:16:06 AM'),
(301, 'estella', '2019-10-04 12:53:01', '09-10-2019 01:38:03 AM'),
(302, 'niyo', '2019-10-04 12:54:59', '08-10-2019 10:16:06 AM'),
(303, 'estella', '2019-10-04 18:40:39', '09-10-2019 01:38:03 AM'),
(304, 'vivi', '2019-10-04 20:49:25', '08-10-2019 09:57:02 AM'),
(305, 'niyo', '2019-10-04 20:51:49', '08-10-2019 10:16:06 AM'),
(306, 'estella', '2019-10-04 20:56:45', '09-10-2019 01:38:03 AM'),
(307, 'niyo', '2019-10-04 21:01:24', '08-10-2019 10:16:06 AM'),
(308, 'niyo', '2019-10-04 21:03:09', '08-10-2019 10:16:06 AM'),
(309, 'estella', '2019-10-04 21:07:10', '09-10-2019 01:38:03 AM'),
(310, 'niyo', '2019-10-04 21:08:45', '08-10-2019 10:16:06 AM'),
(311, 'niyo', '2019-10-04 21:22:36', '08-10-2019 10:16:06 AM'),
(312, 'estella', '2019-10-04 21:29:39', '09-10-2019 01:38:03 AM'),
(313, 'estella', '2019-10-04 21:46:57', '09-10-2019 01:38:03 AM'),
(314, 'estella', '2019-10-04 22:04:15', '09-10-2019 01:38:03 AM'),
(315, 'niyo', '2019-10-04 22:15:15', '08-10-2019 10:16:06 AM'),
(316, 'estella', '2019-10-04 22:32:39', '09-10-2019 01:38:03 AM'),
(317, 'niyo', '2019-10-04 23:01:41', '08-10-2019 10:16:06 AM'),
(318, 'estella', '2019-10-04 23:05:54', '09-10-2019 01:38:03 AM'),
(319, 'estella', '2019-10-04 23:22:21', '09-10-2019 01:38:03 AM'),
(320, 'niyo', '2019-10-04 23:23:17', '08-10-2019 10:16:06 AM'),
(321, 'estella', '2019-10-04 23:24:59', '09-10-2019 01:38:03 AM'),
(322, 'estella', '2019-10-05 13:13:37', '09-10-2019 01:38:03 AM'),
(323, 'niyo', '2019-10-05 13:14:47', '08-10-2019 10:16:06 AM'),
(324, 'estella', '2019-10-05 13:20:50', '09-10-2019 01:38:03 AM'),
(325, 'niyo', '2019-10-05 17:02:37', '08-10-2019 10:16:06 AM'),
(326, 'estella', '2019-10-05 17:06:59', '09-10-2019 01:38:03 AM'),
(327, 'estella', '2019-10-07 19:21:02', '09-10-2019 01:38:03 AM'),
(328, 'niyo', '2019-10-07 20:10:17', '08-10-2019 10:16:06 AM'),
(329, 'estella', '2019-10-07 21:00:05', '09-10-2019 01:38:03 AM'),
(330, 'niyo', '2019-10-07 21:01:32', '08-10-2019 10:16:06 AM'),
(331, 'vivi', '2019-10-07 21:48:27', '08-10-2019 09:57:02 AM'),
(332, 'niyo', '2019-10-07 21:50:05', '08-10-2019 10:16:06 AM'),
(333, 'niyo', '2019-10-07 22:14:48', '08-10-2019 10:16:06 AM'),
(334, 'estella', '2019-10-07 22:23:27', '09-10-2019 01:38:03 AM'),
(335, 'niyo', '2019-10-07 23:24:46', '08-10-2019 10:16:06 AM'),
(336, 'estella', '2019-10-08 09:24:05', '09-10-2019 01:38:03 AM'),
(337, 'vivi', '2019-10-08 13:11:01', '08-10-2019 09:57:02 AM'),
(338, 'estella', '2019-10-08 13:18:51', '09-10-2019 01:38:03 AM'),
(339, 'niyo', '2019-10-08 13:22:30', '08-10-2019 10:16:06 AM'),
(340, 'estella', '2019-10-08 13:25:53', '09-10-2019 01:38:03 AM'),
(341, 'niyo', '2019-10-08 16:53:42', '08-10-2019 10:16:06 AM'),
(342, 'vivi', '2019-10-08 16:54:18', '08-10-2019 09:57:02 AM'),
(343, 'niyo', '2019-10-08 16:57:11', '08-10-2019 10:16:06 AM'),
(344, 'niyo', '2019-10-08 17:05:51', '08-10-2019 10:16:06 AM'),
(345, 'estella', '2019-10-08 17:16:19', '09-10-2019 01:38:03 AM'),
(346, 'estella', '2019-10-09 07:26:43', '09-10-2019 01:38:03 AM'),
(347, 'niyo', '2019-10-09 07:31:36', ''),
(348, 'estella', '2019-10-09 08:06:58', '09-10-2019 01:38:03 AM'),
(349, 'niyo', '2019-10-09 08:38:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
  `USER_ID` int(255) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `NATIONAL_ID` varchar(255) NOT NULL,
  `PHONE_NUMBER` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `DISTRICT` varchar(255) NOT NULL,
  `POSITION` varchar(255) NOT NULL,
  `DEPARTMENT` varchar(255) NOT NULL,
  `PROFILE_PICTURE` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `USER_TYPE` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `POSTING_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `NATIONAL_ID`, `PHONE_NUMBER`, `EMAIL`, `DISTRICT`, `POSITION`, `DEPARTMENT`, `PROFILE_PICTURE`, `USERNAME`, `USER_TYPE`, `PASSWORD`, `POSTING_DATE`) VALUES
(1, 'Kanyange', 'Claudia', 'Female', '1234567890', '0789563421', '', 'Gatsibo', 'Chief Finance Manager', 'Finance Department', '', 'claudia', 'Admin', '*D2757F592F75F56A5B5FAA2FE99D350154374276', '2019-08-12 21:22:25'),
(16, 'CLAIRE', 'NIYONSHUTI', 'Female', '1234567890', '0789234567', '', 'Bugesera', 'Software Developers', 'IT Department', '', 'NIY12341', 'User', '*2997B2C9937288F200C9E6EB410827ECAAAC75D1', '2019-08-25 08:56:05'),
(3, 'Digne', 'Umwaliwase', 'Female', '1256789023456789', '0789563421', '', 'Nyamasheke', 'Software Developers', 'IT Department', 'upload/money_1570226486.png', 'digney', 'Admin', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2019-08-12 21:58:56'),
(4, 'Migno', 'Unguyeneza', 'Female', '4567890', '0987564321', '', 'Gicumbi', 'Chief Technology Officer', 'IT Department', 'upload/avatar-mini3_1570226241.jpg', 'mingoO', 'User', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2019-08-12 22:01:29'),
(17, 'Claire', 'NIYONSHUTI', 'Male', '12345', '2345', 'Claire@gmail.com', 'Gicumbi', 'Software Developers', 'IT Department', 'upload/staff1_1570554796.jpg', 'niyo', 'User', '*D2757F592F75F56A5B5FAA2FE99D350154374276', '2019-08-25 08:59:33'),
(6, 'Amatae', 'Uwimpuhwe', 'Female', '34567', '45678', '', 'Nyamasheke', 'Chief Finance Manager', 'Operational Department', '', 'amata', 'User', '*CCE6947E10F5365930F79546217E288917310C3C', '2019-08-12 22:25:32'),
(19, 'Annete', 'TUMUKUNDE', 'Female', '123456', '098765', '', 'Musanze', 'Chief Technology Officer', 'IT Department', '', 'annette', 'User', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2019-08-29 10:56:18'),
(21, 'Esther', 'TUYIZERE', 'Female', '123456789', '0789563421', 'Esther@gmail.com', 'Kayonza', 'Chief Operation Manager', 'Operational Department', 'upload/staff2_1570555005.jpg', 'estella', 'Admin', '*7F583B4365FEBD65805B3338BE7968A050C47103', '2019-10-04 20:07:04'),
(22, 'Viviane', 'Ashimwe', 'Female', '45789', '234567', '', 'Rubavu', 'Software Developers', 'IT Department', 'upload/profile_1570226339.png', 'vivi', 'Admin', '*A78329957C6B04B9DD8F7127E53FCE2AA8483FC8', '2019-10-04 20:42:05'),
(23, 'Betty', 'Ishimwe', '', '', '', '', '', '', '', '', 'berthe', 'User', '*AF48569EFE39E33A9B8347871FE433B2359F232C', '2019-10-08 10:59:47'),
(24, 'Afisa', 'INEZA', 'Female', '6789', '0789564321', 'Afisa@gmail.com', 'Rubavu', 'Techinical Support', 'Finance Department', '', 'afisa', 'User', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '2019-10-08 11:00:18'),
(25, 'Remy', 'Muhire', '', '', '', '', '', '', '', '', 'remy', 'Admin', '*BB3A0CCAB6D423278B85905523C5AC251C0641E6', '2019-10-08 17:30:39'),
(26, 'Vanessa', 'Mdee', '', '', '', '', '', '', '', '', 'vanessa', 'Admin', '*0FC960F9EC90C8C238E1EE23105A12C6C8CF74E5', '2019-10-08 17:36:48'),
(27, 'Kayetano', 'Kagwa', '', '', '', '', '', '', '', '', 'kagwa', 'Admin', '*529BAAA1401965B6B94B34427D27F4DC3EBEDD64', '2019-10-08 17:41:17'),
(28, 'Pierre', 'Ishimwe', '', '', '', 'Pierre@gmail.com', '', '', '', '', 'Pierre', 'User', '*AF48569EFE39E33A9B8347871FE433B2359F232C', '2019-10-09 08:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_supplement`
--

CREATE TABLE IF NOT EXISTS `user_supplement` (
  `SID` int(255) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(255) NOT NULL,
  `SUPPLEMENT_TYPE` varchar(255) NOT NULL,
  `SUPPLEMENT_AMOUNT` float NOT NULL,
  `TOTAL` float NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_supplement`
--

INSERT INTO `user_supplement` (`SID`, `USER_ID`, `SUPPLEMENT_TYPE`, `SUPPLEMENT_AMOUNT`, `TOTAL`) VALUES
(3, 1, 'PerDiem', 15, 15),
(4, 17, 'PerDiem', 10, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
