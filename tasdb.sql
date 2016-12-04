-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 06:33 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendanceinfo`
--

CREATE TABLE IF NOT EXISTS `attendanceinfo` (
  `slNo` int(11) NOT NULL,
  `userID` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `entryTime` datetime DEFAULT NULL,
  `leaveTime` datetime DEFAULT NULL,
  `dates` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `years` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `months` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `times` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendanceinfo`
--

INSERT INTO `attendanceinfo` (`slNo`, `userID`, `status`, `entryTime`, `leaveTime`, `dates`, `years`, `months`, `days`, `times`) VALUES
(1, 'cseeng1', 'Present', '2016-04-06 16:23:20', '2016-04-08 17:04:40', '2016-04-06', '2016', 'Apr', 'Wed', NULL),
(2, 'cseeng1', 'Late', '2016-04-07 00:13:55', '2016-04-08 17:04:40', '2016-04-07', '2016', 'Apr', 'Thu', NULL),
(3, 'cselec2', 'Late', '2016-04-07 02:45:48', NULL, '2016-04-07', '2016', 'Apr', 'Thu', NULL),
(4, 'cseeng1', 'Late', '2016-04-08 13:09:58', '2016-04-08 17:04:40', '2016-04-08', '2016', 'Apr', 'Fri', NULL),
(5, 'cseeng1', 'Present', '2016-04-01 07:42:00', '2016-04-08 17:04:40', '2016-04-01', '2016', 'Apr', 'Sat', NULL),
(6, 'cselec2', 'Late', '2016-04-01 08:20:00', '2016-04-01 17:03:00', '2016-04-01', '2016', 'Apr', 'Sat', NULL),
(7, 'cseeng1', 'Present', '2015-04-01 07:46:00', '2016-04-08 17:04:40', '2015-04-01', '2015', 'Apr', 'Wed', NULL),
(8, 'cseeng1', 'Late', '2015-03-01 08:30:00', '2016-04-08 17:04:40', '2015-03-01', '2015', 'Mar', 'Sun', NULL),
(9, 'cseeng1', 'Present', '2014-06-02 08:30:00', '2016-04-08 17:04:40', '2014-06-02', '2014', 'Jun', 'Mon', NULL),
(10, 'cseeng1', 'Present', '2013-07-01 07:50:00', '2016-04-08 17:04:40', '2013-07-01', '2013', 'Jul', 'Mon', NULL),
(11, 'cselec2', 'Late', '2016-04-08 22:11:25', NULL, '2016-04-08', '2016', 'Apr', 'Fri', NULL),
(13, 'cselec2', 'Late', '2016-04-09 02:42:40', NULL, '2016-04-09', '2016', 'Apr', 'Sat', NULL),
(19, 'cselec2', 'Late', '2016-04-11 10:43:06', NULL, '2016-04-11', '2016', 'April', 'Monday', NULL),
(20, 'cseeng1', 'Late', '2016-04-11 23:07:47', NULL, '2016-04-11', '2016', 'April', 'Monday', NULL),
(22, 'cseeng1', 'Late', '2016-04-12 20:21:22', NULL, '2016-04-12', '2016', 'April', 'Tuesday', NULL),
(23, 'cseeng1', 'Late', '2016-04-13 01:52:36', NULL, '2016-04-13', '2016', 'April', 'Wednesday', NULL),
(27, 'cseeng1', 'Late', '2016-04-14 15:53:01', NULL, '2016-04-14', '2016', 'April', 'Thursday', NULL),
(28, 'cseeng1', 'Absent', NULL, NULL, '2016-03-19', '2016', 'March', 'Saturday', NULL),
(29, 'cseeng1', 'Late', '2016-04-17 09:51:44', NULL, '2016-04-17', '2016', 'April', 'Sunday', NULL),
(30, 'cselec2', 'Late', '2016-05-10 17:44:43', NULL, '2016-05-10', '2016', 'May', 'Tuesday', NULL),
(31, 'cseeng1', 'Late', '2016-05-10 17:45:31', NULL, '2016-05-10', '2016', 'May', 'Tuesday', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacherinfo`
--

CREATE TABLE IF NOT EXISTS `teacherinfo` (
  `userID` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fathersName` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mothersName` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthDay` datetime DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `presentAddress` text COLLATE utf8_unicode_ci,
  `permanentAddress` text COLLATE utf8_unicode_ci,
  `nationality` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identityType` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `identityNumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `departments` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `securityQuestion` varchar(51) COLLATE utf8_unicode_ci NOT NULL,
  `securityAnswer` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `overview` text COLLATE utf8_unicode_ci,
  `higherDegree` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userCreationTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherinfo`
--

INSERT INTO `teacherinfo` (`userID`, `passwd`, `email`, `phoneNumber`, `fullName`, `fathersName`, `mothersName`, `birthDay`, `gender`, `religion`, `presentAddress`, `permanentAddress`, `nationality`, `identityType`, `identityNumber`, `designation`, `departments`, `securityQuestion`, `securityAnswer`, `overview`, `higherDegree`, `imageName`, `userCreationTime`) VALUES
('cseeng1', 'nokia523324', 'arifjmamun24@gmail.com', '01832264272', 'MD. ARIFUL ISLAM', NULL, NULL, NULL, 'male', 'islam', NULL, NULL, NULL, 'National ID', '546456456657657', 'Engineer', 'cse', 'What was your childhood nickname?', 'KaornikfA', NULL, NULL, 'cse_md. ariful islam_154.jpg', '2016-04-03 10:53:36'),
('cseeng3', 'Nokia523324', 'razuahmedcse@gmail.com', '01832264272', 'RAZU AHMED', NULL, NULL, NULL, 'male', 'islam', NULL, NULL, NULL, 'National ID', '0582575875755758', 'Engineer', 'cse', 'What is the name of your favorite childhood friend?', 'Razu', NULL, NULL, 'cse_razu ahmed_116.jpg', '2016-04-12 16:41:14'),
('cseeng7', 'Nokia523324', 'arifjmamun24@gmail.com', '01832264272', 'MD. ARIFUL ISLAM', NULL, NULL, NULL, 'male', 'islam', NULL, NULL, NULL, 'National ID', '546456456657657', 'Engineer', 'cse', 'What was your childhood nickname?', 'Mamun', NULL, NULL, 'cse_md. ariful islam_125.jpg', '2016-04-23 23:07:38'),
('cselec2', 'Nokia523324', 'arifjmamun24@gmail.com', '01793574440', 'MD. ARIFUL ISLAM', NULL, NULL, NULL, 'male', 'islam', NULL, NULL, NULL, 'National ID', '546456456657657', 'Lecturer', 'cse', 'What is your high school''s principle''s name?', 'Shahjahan', NULL, NULL, 'cse_md. ariful islam_112.jpg', '2016-04-03 18:15:12'),
('cselec4', 'mist1234', 'sirwarcse@gmail.com', '01911936214', 'Golam Sirwar Bhuyan', NULL, NULL, NULL, 'male', 'islam', NULL, NULL, NULL, 'National ID', '1980546447656874695', 'Lecturer', 'cse', 'What is your favorite color?', 'green', NULL, NULL, 'cse_golam sirwar bhuyan_147.jpg', '2016-04-14 15:05:05'),
('cselec5', 'mist1234', 'lubna@ymail.com', '01777777777', 'Lubna Yasmin', NULL, NULL, NULL, 'female', 'islam', NULL, NULL, NULL, 'National ID', '169897456456879', 'Lecturer', 'cse', 'What is your favorite color?', 'Green', NULL, NULL, 'cse_lubna yasmin_145.jpg', '2016-04-17 10:09:40'),
('csestu6', 'Sohel1234', 'sohelrana@gmail.com', '01913783543', 'Sohel Rana', NULL, NULL, NULL, 'male', 'islam', NULL, NULL, NULL, 'National ID', '489898746465', 'Student', 'cse', 'What was your childhood nickname?', 'sohel', NULL, NULL, 'cse_sohel rana_117.jpg', '2016-04-17 16:52:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendanceinfo`
--
ALTER TABLE `attendanceinfo`
  ADD PRIMARY KEY (`slNo`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendanceinfo`
--
ALTER TABLE `attendanceinfo`
  MODIFY `slNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendanceinfo`
--
ALTER TABLE `attendanceinfo`
  ADD CONSTRAINT `attendanceinfo_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `teacherinfo` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
