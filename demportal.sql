-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 05:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `actID` int(11) NOT NULL,
  `actName` varchar(225) NOT NULL,
  `actVenue` varchar(225) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endDate` date NOT NULL,
  `endTime` time NOT NULL,
  `clubID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `clubID` int(11) NOT NULL,
  `clubLogo` varchar(225) DEFAULT NULL,
  `clubName` varchar(225) NOT NULL,
  `clubPwd` varchar(225) NOT NULL,
  `clubStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` varchar(5) NOT NULL,
  `departmentDesc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `departmentDesc`) VALUES
('00001', 'ADMINISTRATION STAFF'),
('00002', 'LECTURER OF FACULTY OF COMPUTER AND MATHEMATICAL SCIENCES'),
('00003', 'LECTURER OF FACULTY OF BUSINESS AND MANAGEMENT'),
('00004', 'LECTURER OF FACULTY OF ADMINISTRATIVE SCIENCE AND POLICY STUDIES'),
('AM110', 'STUDENT OF DIPLOMA IN PUBLIC ADMINISTRATION'),
('BA111', 'STUDENT OF DIPLOMA IN BUSINESS STUDIES'),
('BA119', 'STUDENT OF DIPLOMA IN BANKING STUDIES'),
('CS110', 'STUDENT OF DIPLOMA IN COMPUTER SCIENCE'),
('CS111', 'STUDENT OF DIPLOMA IN STATISTIC');

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `feedID` int(11) NOT NULL,
  `feedPic` varchar(225) DEFAULT NULL,
  `feedDesc` longtext DEFAULT NULL,
  `actID` int(11) DEFAULT NULL,
  `clubID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userID` int(11) NOT NULL,
  `userPwd` varchar(225) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `deptID` varchar(5) NOT NULL,
  `userType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `userType` int(11) NOT NULL,
  `userDesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`userType`, `userDesc`) VALUES
(100, 'Super Admin'),
(200, 'Admin'),
(300, 'Lecturer'),
(400, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`actID`),
  ADD KEY `clubID` (`clubID`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`clubID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`feedID`),
  ADD KEY `actID` (`actID`),
  ADD KEY `clubID` (`clubID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `deptID` (`deptID`),
  ADD KEY `userType` (`userType`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`userType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `feedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`clubID`) REFERENCES `club` (`clubID`);

--
-- Constraints for table `feed`
--
ALTER TABLE `feed`
  ADD CONSTRAINT `feed_ibfk_1` FOREIGN KEY (`actID`) REFERENCES `activity` (`actID`),
  ADD CONSTRAINT `feed_ibfk_2` FOREIGN KEY (`clubID`) REFERENCES `club` (`clubID`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`deptID`) REFERENCES `department` (`departmentID`),
  ADD CONSTRAINT `userinfo_ibfk_2` FOREIGN KEY (`userType`) REFERENCES `usertype` (`userType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
