-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2019 at 07:10 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sequencebuilder`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseName` varchar(25) NOT NULL,
  `CourseReq` varchar(100) DEFAULT NULL,
  `CourseCoreq` varchar(100) DEFAULT NULL,
  `CourseCredits` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseName`, `CourseReq`, `CourseCoreq`, `CourseCredits`) VALUES
('COMP232', NULL, 'MATH203, MATH204', '3.0'),
('COMP248', NULL, 'MATH204', '3.5'),
('COMP249', 'COMP248, MATH203', 'MATH205', '3.5');

-- --------------------------------------------------------

--
-- Table structure for table `flab`
--

CREATE TABLE `flab` (
  `LabId` int(11) NOT NULL,
  `CourseName` varchar(25) NOT NULL,
  `LecId` int(11) NOT NULL,
  `LabSection` varchar(25) NOT NULL,
  `StartLabTime` int(11) NOT NULL,
  `EndLabTime` int(11) NOT NULL,
  `LabDays` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flec`
--

CREATE TABLE `flec` (
  `LecId` int(11) NOT NULL,
  `LecInfo` varchar(25) NOT NULL,
  `LecDays` varchar(5) NOT NULL,
  `StartLecTime` int(11) NOT NULL,
  `EndLecTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ftut`
--

CREATE TABLE `ftut` (
  `TutId` int(11) NOT NULL,
  `CourseName` varchar(25) NOT NULL,
  `LecId` int(11) NOT NULL,
  `TutSection` varchar(25) NOT NULL,
  `StartTutTime` int(11) NOT NULL,
  `EndTutTime` int(11) NOT NULL,
  `TutDays` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseName`);

--
-- Indexes for table `flab`
--
ALTER TABLE `flab`
  ADD PRIMARY KEY (`LabId`),
  ADD KEY `CourseName` (`CourseName`),
  ADD KEY `LecId` (`LecId`);

--
-- Indexes for table `flec`
--
ALTER TABLE `flec`
  ADD PRIMARY KEY (`LecId`);

--
-- Indexes for table `ftut`
--
ALTER TABLE `ftut`
  ADD PRIMARY KEY (`TutId`),
  ADD KEY `CourseName` (`CourseName`),
  ADD KEY `LecId` (`LecId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flec`
--
ALTER TABLE `flec`
  MODIFY `LecId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ftut`
--
ALTER TABLE `ftut`
  MODIFY `TutId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `flab`
--
ALTER TABLE `flab`
  ADD CONSTRAINT `flab_ibfk_1` FOREIGN KEY (`CourseName`) REFERENCES `course` (`CourseName`),
  ADD CONSTRAINT `flab_ibfk_2` FOREIGN KEY (`LecId`) REFERENCES `flec` (`LecId`);

--
-- Constraints for table `ftut`
--
ALTER TABLE `ftut`
  ADD CONSTRAINT `ftut_ibfk_1` FOREIGN KEY (`CourseName`) REFERENCES `course` (`CourseName`),
  ADD CONSTRAINT `ftut_ibfk_2` FOREIGN KEY (`LecId`) REFERENCES `flec` (`LecId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
