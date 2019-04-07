-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 04:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `coursesmain`
--

CREATE TABLE `coursesmain` (
  `CourseName` varchar(225) NOT NULL,
  `Credit` decimal(2,1) NOT NULL,
  `Prerequisite` varchar(225) DEFAULT NULL,
  `Corerequisite` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursesmain`
--

INSERT INTO `coursesmain` (`CourseName`, `Credit`, `Prerequisite`, `Corerequisite`) VALUES
('COMP232', '3.0', NULL, NULL),
('COMP248', '3.5', NULL, NULL),
('COMP249', '3.5', 'COMP248', NULL),
('COMP335', '3.0', 'COMP232,COMP249', NULL),
('COMP346', '4.0', 'SOEN228,COMP352', NULL),
('COMP348', '3.0', 'COMP249', NULL),
('COMP352', '3.0', 'COMP249', 'COMP232'),
('ELEC275', '3.5', NULL, 'ENGR213'),
('ENCS282', '3.0', NULL, NULL),
('ENGR201', '1.5', NULL, NULL),
('ENGR202', '1.5', NULL, NULL),
('ENGR213', '3.0', NULL, NULL),
('ENGR233', '3.0', NULL, NULL),
('ENGR301', '3.0', NULL, NULL),
('ENGR371', '3.0', 'ENGR213,ENGR233', NULL),
('ENGR391', '3.0', 'ENGR213,ENGR233,COMP248', NULL),
('ENGR392', '3.0', 'ENCS282,ENGR201,ENGR202', NULL),
('SOEN228', '4.0', NULL, NULL),
('SOEN287', '3.0', 'COMP248', NULL),
('SOEN321', '3.0', 'COMP346', NULL),
('SOEN331', '3.0', 'COMP232,COMP249', NULL),
('SOEN341', '3.0', 'COMP352', 'ENCS282'),
('SOEN342', '3.0', 'SOEN341', NULL),
('SOEN343', '3.0', 'SOEN341', 'SOEN342'),
('SOEN344', '3.0', 'SOEN343', NULL),
('SOEN345', '3.0', NULL, 'SOEN343'),
('SOEN357', '3.0', 'SOEN342', NULL),
('SOEN384', '3.0', 'ENCS282,SOEN341', NULL),
('SOEN385', '3.0', 'ENGR213,ENGR233', NULL),
('SOEN390', '3.5', NULL, 'SOEN344,SOEN357'),
('SOEN490_1', '2.0', 'SOEN390', NULL),
('SOEN490_2', '2.0', 'SOEN490_1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flab`
--

CREATE TABLE `flab` (
  `LabID` int(11) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LabSection` varchar(225) NOT NULL,
  `LabDay` varchar(10) NOT NULL,
  `StartLabTime` varchar(225) NOT NULL,
  `EndLabTime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flab`
--

INSERT INTO `flab` (`LabID`, `CourseName`, `LabSection`, `LabDay`, `StartLabTime`, `EndLabTime`) VALUES
(1, 'COMP248', 'A-X', 'M', '194500', '204500'),
(2, 'COMP248', 'B-X', 'T', '101500', '111500'),
(3, 'COMP248', 'C-X', 'J', '203000', '213000'),
(4, 'COMP248', 'D-X', 'M', '194500', '204500'),
(5, 'COMP248', 'E-X', 'F', '101500', '111500'),
(6, 'COMP248', 'F-X', 'F', '203000', '213000'),
(7, 'COMP248', 'G-X', 'F', '104000', '114000'),
(8, 'COMP248', 'H-X', 'M', '121000', '131000'),
(9, 'COMP248', 'I-X', 'M', '121000', '131000'),
(10, 'COMP248', 'J-X', 'W', '121000', '131000'),
(11, 'COMP248', 'K-X', 'W', '121000', '131000'),
(12, 'COMP248', 'L-X', 'M', '121000', '131000'),
(13, 'COMP248', 'M-X', 'F', '104000', '114000'),
(14, 'COMP248', 'N-X', 'F', '104000', '114000'),
(15, 'COMP248', 'O-X', 'W', '121000', '131000'),
(16, 'COMP249', 'I-X', 'M', '181500', '191500'),
(17, 'COMP249', 'J-X', 'W', '181500', '191500'),
(18, 'COMP249', 'K-X', 'W', '193000', '203000'),
(19, 'COMP249', 'L-X', 'M', '181500', '191500'),
(20, 'COMP249', 'M-X', 'W', '181500', '191500'),
(21, 'COMP249', 'N-X', 'W', '193000', '203000'),
(22, 'COMP346', 'DI-X', 'J', '174500', '193500'),
(23, 'COMP346', 'DJ-X', 'J', '194500', '213500'),
(24, 'ELEC275', 'TI-X', 'T', '114500', '143000'),
(25, 'ELEC275', 'TJ-X', 'T', '114500', '143000'),
(26, 'ELEC275', 'TK-X', 'J', '114500', '143000'),
(27, 'ELEC275', 'TL-X', 'J', '114500', '143000'),
(28, 'ELEC275', 'TM-X', 'F', '084500', '113000'),
(29, 'ELEC275', 'VI-X', 'F', '084500', '113000'),
(30, 'ELEC275', 'VJ-X', 'M', '084500', '113000'),
(31, 'ELEC275', 'VK-X', 'M', '084500', '113000'),
(32, 'ELEC275', 'VL-X', 'M', '144500', '173000'),
(33, 'ELEC275', 'VM-X', 'M', '144500', '173000'),
(34, 'SOEN490_1', 'SS-SI', 'T,J', '083000', '103000'),
(35, 'SOEN490_1', 'SS-SJ', 'T,J', '083000', '103000'),
(36, 'SOEN490_1', 'SS-SK', 'T,J', '083000', '103000'),
(37, 'SOEN490_1', 'SS-SL', 'T,J', '083000', '103000'),
(38, 'SOEN490_1', 'SS-SM', 'T,J', '083000', '103000'),
(39, 'SOEN490_1', 'SS-SN', 'T,J', '083000', '103000');

-- --------------------------------------------------------

--
-- Table structure for table `flec`
--

CREATE TABLE `flec` (
  `LecInfo` varchar(225) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LecDay` varchar(10) DEFAULT NULL,
  `StartLecTime` varchar(225) DEFAULT NULL,
  `EndLecTime` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flec`
--

INSERT INTO `flec` (`LecInfo`, `CourseName`, `LecDay`, `StartLecTime`, `EndLecTime`) VALUES
('COMP232-DD', 'COMP232', 'W', '174500', '201500'),
('COMP232-PP', 'COMP232', 'J', '174500', '201500'),
('COMP232-Q', 'COMP232', 'T,J', '131500', '143000'),
('COMP232-R', 'COMP232', 'T,J', '131500', '143000'),
('COMP232-S', 'COMP232', 'T,J', '131500', '143000'),
('COMP248-EE', 'COMP248', 'J', '174500', '201500'),
('COMP248-FF', 'COMP248', 'F', '174500', '201500'),
('COMP248-P', 'COMP248', 'M,W', '131500', '143000'),
('COMP248-Q', 'COMP248', 'M,W', '131500', '143000'),
('COMP248-R', 'COMP248', 'M,W', '084500', '100000'),
('COMP249-D', 'COMP249', 'M,W', '144500', '160000'),
('COMP249-E', 'COMP249', 'M,W', '144500', '160000'),
('COMP335-E', 'COMP335', 'M,W', '161500', '173000'),
('COMP335-G', 'COMP335', 'T,J', '131500', '143000'),
('COMP335-H', 'COMP335', 'M,W', '161500', '173000'),
('COMP346-DD', 'COMP346', 'T', '174500', '201500'),
('COMP348-DD', 'COMP348', 'W', '174500', '201500'),
('COMP348-U', 'COMP348', 'M,W', '084500', '100000'),
('COMP348-W', 'COMP348', 'M,W', '084500', '100000'),
('COMP352-D', 'COMP352', 'W,F', '131500', '143000'),
('COMP352-FF', 'COMP352', 'T', '174500', '201500'),
('COMP352-G', 'COMP352', 'W,F', '131500', '143000'),
('COMP352-H', 'COMP352', 'W,F', '131500', '143000'),
('ELEC275-T', 'ELEC275', 'W,F', '114500', '130000'),
('ELEC275-V', 'ELEC275', 'T,J', '084500', '100000'),
('ENCS282-A', 'ENCS282', 'M,W', '161500', '173000'),
('ENCS282-B', 'ENCS282', 'M,W', '144500', '160000'),
('ENCS282-BB', 'ENCS282', 'T', '174500', '201500'),
('ENGR201-BL', 'ENGR201', 'ONLINE', NULL, NULL),
('ENGR202-G', 'ENGR202', 'F', '161500', '173000'),
('ENGR202-H', 'ENGR202', 'J', '161500', '173000'),
('ENGR213-P', 'ENGR213', 'M,W', '114500', '130000'),
('ENGR213-R', 'ENGR213', 'W,F', '084500', '100000'),
('ENGR213-T', 'ENGR213', 'T,J', '101500', '113000'),
('ENGR213-U', 'ENGR213', 'W,F', '114500', '130000'),
('ENGR213-V', 'ENGR213', 'W,F', '084500', '100000'),
('ENGR213-X', 'ENGR213', 'T,J', '101500', '113000'),
('ENGR213-XX', 'ENGR213', 'F', '174500', '201500'),
('ENGR233-P', 'ENGR233', 'T,J', '131500', '143000'),
('ENGR233-Q', 'ENGR233', 'T,J', '131500', '143000'),
('ENGR301-FF', 'ENGR301', 'F', '174500', '201500'),
('ENGR301-G', 'ENGR301', 'T,J', '161500', '173000'),
('ENGR301-H', 'ENGR301', 'T,J', '161500', '173000'),
('ENGR301-II', 'ENGR301', 'F', '174500', '201500'),
('ENGR371-FF', 'ENGR371', 'M', '174500', '201500'),
('ENGR371-R', 'ENGR371', 'T,J', '131500', '143000'),
('ENGR371-S', 'ENGR371', 'M,W', '131500', '143000'),
('ENGR391-F', 'ENGR391', 'T,J', '161500', '173000'),
('ENGR391-M', 'ENGR391', 'T,J', '084500', '100000'),
('ENGR391-S', 'ENGR391', 'T,J', '161500', '173000'),
('ENGR392-D', 'ENGR392', 'F', '084500', '113000'),
('ENGR392-EE', 'ENGR392', 'T', '174500', '201500'),
('ENGR392-F', 'ENGR392', 'M', '144500', '173000'),
('ENGR392-G', 'ENGR392', 'W', '144500', '173000'),
('SOEN287-Q', 'SOEN287', 'T,J', '101500', '113000'),
('SOEN321-GG', 'SOEN321', 'M', '174500', '201500'),
('SOEN341-F', 'SOEN341', 'W,F', '101500', '113000'),
('SOEN341-H', 'SOEN341', 'W,F', '101500', '113000'),
('SOEN342-H', 'SOEN342', 'W,F', '114500', '130000'),
('SOEN342-I', 'SOEN342', 'W,F', '114500', '130000'),
('SOEN343-H', 'SOEN343', 'W,F', '131500', '143000'),
('SOEN384-F', 'SOEN384', 'W,F', '101500', '113000'),
('SOEN384-G', 'SOEN384', 'W,F', '101500', '113000'),
('SOEN490-SS', 'SOEN490_1', 'F', '182500', '192500');

-- --------------------------------------------------------

--
-- Table structure for table `ftut`
--

CREATE TABLE `ftut` (
  `TutID` int(11) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LecInfo` varchar(225) NOT NULL,
  `TutSection` varchar(10) NOT NULL,
  `TutDay` varchar(10) NOT NULL,
  `StartTutTime` varchar(225) NOT NULL,
  `EndTutTime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ftut`
--

INSERT INTO `ftut` (`TutID`, `CourseName`, `LecInfo`, `TutSection`, `TutDay`, `StartTutTime`, `EndTutTime`) VALUES
(1, 'COMP232', 'COMP232-DD', 'DA', 'W', '203000', '221000'),
(2, 'COMP232', 'COMP232-DD', 'DB', 'W', '203000', '221000'),
(3, 'COMP232', 'COMP232-DD', 'DC', 'W', '203000', '175500'),
(4, 'COMP232', 'COMP232-DD', 'DD', 'J', '161500', '221000'),
(5, 'COMP232', 'COMP232-PP', 'PA', 'J', '203000', '221000'),
(6, 'COMP232', 'COMP232-PP', 'PB', 'J', '203000', '221000'),
(7, 'COMP232', 'COMP232-PP', 'PC', 'J', '203000', '175500'),
(8, 'COMP232', 'COMP232-Q', 'QA', 'T', '161500', '162500'),
(9, 'COMP232', 'COMP232-Q', 'QB', 'J', '144500', '162500'),
(10, 'COMP232', 'COMP232-Q', 'QC', 'J', '144500', '175500'),
(11, 'COMP232', 'COMP232-R', 'RA', 'T', '161500', '175500'),
(12, 'COMP232', 'COMP232-R', 'RB', 'T', '161500', '175500'),
(13, 'COMP232', 'COMP232-R', 'RC', 'T', '161500', '175500'),
(14, 'COMP232', 'COMP232-S', 'SA', 'J', '161500', '175500'),
(15, 'COMP232', 'COMP232-S', 'SB', 'J', '161500', '175500'),
(16, 'COMP232', 'COMP232-S', 'SC', 'J', '161500', '175500'),
(17, 'COMP248', 'COMP248-EE', 'EA', 'T', '114500', '132500'),
(18, 'COMP248', 'COMP248-EE', 'EB', 'J', '114500', '132500'),
(19, 'COMP248', 'COMP248-FF', 'FA', 'M', '174500', '192500'),
(20, 'COMP248', 'COMP248-FF', 'FB', 'F', '114500', '132500'),
(21, 'COMP248', 'COMP248-P', 'PA', 'F', '084500', '102500'),
(22, 'COMP248', 'COMP248-P', 'PB', 'M', '101500', '115500'),
(23, 'COMP248', 'COMP248-Q', 'QA', 'M', '101500', '115500'),
(24, 'COMP248', 'COMP248-Q', 'QB', 'W', '101500', '115500'),
(25, 'COMP248', 'COMP248-Q', 'QC', 'W', '101500', '115500'),
(26, 'COMP248', 'COMP248-R', 'RA', 'M', '101500', '115500'),
(27, 'COMP248', 'COMP248-R', 'RB', 'W', '101500', '115500'),
(28, 'COMP248', 'COMP248-R', 'RC', 'F', '084500', '102500'),
(29, 'ENGR201', 'ENGR201-BL', 'A', 'W', '084500', '093500'),
(30, 'ENGR201', 'ENGR201-BL', 'B', 'W', '084500', '093500'),
(31, 'ENGR201', 'ENGR201-BL', 'C', 'J', '161500', '170500'),
(32, 'ENGR201', 'ENGR201-BL', 'D', 'J', '161500', '170500'),
(33, 'ENGR201', 'ENGR201-BL', 'E', 'J', '174500', '183500'),
(34, 'ENGR201', 'ENGR201-BL', 'F', 'J', '174500', '183500'),
(35, 'ENGR201', 'ENGR201-BL', 'G', 'T', '161500', '170500'),
(36, 'ENGR201', 'ENGR201-BL', 'H', 'T', '161500', '170500'),
(37, 'ENGR201', 'ENGR201-BL', 'I', 'J', '184500', '193500'),
(38, 'ENGR201', 'ENGR201-BL', 'J', 'J', '184500', '193500'),
(39, 'ENGR201', 'ENGR201-BL', 'K', 'M', '084500', '093500'),
(40, 'ENGR213', 'ENGR213-U', 'A', 'F', '141500', '155500'),
(41, 'ENGR213', 'ENGR213-U', 'B', 'M', '141500', '155500'),
(42, 'ENGR213', 'ENGR213-P', 'A', 'F', '131500', '145500'),
(43, 'ENGR213', 'ENGR213-P', 'B', 'F', '131500', '145500'),
(44, 'ENGR213', 'ENGR213-R', 'A', 'M', '082000', '100000'),
(45, 'ENGR213', 'ENGR213-R', 'B', 'M', '082000', '100000'),
(46, 'ENGR213', 'ENGR213-T', 'A', 'M', '131500', '145500'),
(47, 'ENGR213', 'ENGR213-T', 'B', 'M', '131500', '145500'),
(48, 'ENGR213', 'ENGR213-V', 'A', 'J', '134500', '152500'),
(49, 'ENGR213', 'ENGR213-V', 'B', 'M', '082000', '100000'),
(50, 'ENGR213', 'ENGR213-X', 'A', 'M', '131500', '145500'),
(51, 'ENGR213', 'ENGR213-X', 'B', 'M', '131500', '145500'),
(52, 'ENGR213', 'ENGR213-XX', 'E', 'F', '154500', '172500'),
(53, 'ENGR213', 'ENGR213-XX', 'F', 'F', '154500', '172500'),
(54, 'COMP249', 'COMP249-D', 'DA', 'M', '124500', '143500'),
(55, 'COMP249', 'COMP249-D', 'DB', 'W', '161500', '175500'),
(56, 'COMP249', 'COMP249-E', 'EA', 'M', '124500', '143500'),
(57, 'COMP249', 'COMP249-E', 'EB', 'M', '161500', '175500'),
(58, 'ENGR233', 'ENGR233-Q', 'QA', 'M', '104500', '122500'),
(59, 'ENGR233', 'ENGR233-Q', 'QB', 'F', '084500', '102500'),
(60, 'ENGR233', 'ENGR233-P', 'PA', 'M', '104500', '122500'),
(61, 'ENGR233', 'ENGR233-P', 'PB', 'M', '104500', '122500'),
(62, 'SOEN287', 'SOEN233-Q', 'QA', 'T', '114500', '132500'),
(63, 'SOEN287', 'SOEN233-Q', 'QB', 'J', '181500', '195500'),
(64, 'SOEN287', 'SOEN233-Q', 'QC', 'T', '181500', '195500'),
(65, 'COMP348', 'COMP348-DD', 'DA', 'T', '144500', '153500'),
(66, 'COMP348', 'COMP348-DD', 'DB', 'J', '144500', '153500'),
(67, 'COMP348', 'COMP348-DD', 'DC', 'T', '144500', '153500'),
(68, 'COMP348', 'COMP348-DD', 'DD', 'J', '154500', '163500'),
(69, 'COMP348', 'COMP348-U', 'UA', 'M', '101500', '110500'),
(70, 'COMP348', 'COMP348-U', 'UB', 'M', '101500', '110500'),
(71, 'COMP348', 'COMP348-U', 'UC', 'W', '101500', '110500'),
(72, 'COMP348', 'COMP348-U', 'UD', 'F', '084500', '093500'),
(73, 'COMP348', 'COMP348-W', 'WA', 'M', '101500', '110500'),
(74, 'COMP348', 'COMP348-W', 'WB', 'W', '101500', '110500'),
(75, 'COMP348', 'COMP348-W', 'WC', 'F', '101500', '110500'),
(76, 'COMP348', 'COMP348-W', 'WD', 'F', '084500', '093500'),
(77, 'COMP352', 'COMP352-D', 'DA', 'F', '144500', '153500'),
(78, 'COMP352', 'COMP352-D', 'DB', 'M', '114500', '123500'),
(79, 'COMP352', 'COMP352-FF', 'FA', 'F', '144500', '153500'),
(80, 'COMP352', 'COMP352-FF', 'FB', 'M', '114500', '123500'),
(81, 'COMP352', 'COMP352-G', 'GA', 'F', '144500', '153500'),
(82, 'COMP352', 'COMP352-G', 'GB', 'M', '114500', '123500'),
(83, 'COMP352', 'COMP352-H', 'HA', 'W', '144500', '153500'),
(84, 'COMP352', 'COMP352-H', 'HB', 'F', '144500', '153500'),
(85, 'ENCS282', 'ENCS282-A', 'AL', 'M', '082000', '100000'),
(86, 'ENCS282', 'ENCS282-A', 'AM', 'M', '174500', '192500'),
(87, 'ENCS282', 'ENCS282-A', 'AN', 'M', '174500', '192500'),
(88, 'ENCS282', 'ENCS282-A', 'AO', 'M', '174500', '192500'),
(89, 'ENCS282', 'ENCS282-B', 'BA', 'W', '160500', '174500'),
(90, 'ENCS282', 'ENCS282-B', 'BB', 'W', '174500', '192500'),
(91, 'ENCS282', 'ENCS282-BB', 'BN', 'T', '203000', '221000'),
(92, 'ENCS282', 'ENCS282-BB', 'BO', 'F', '180000', '194000'),
(93, 'ENCS282', 'ENCS282-BB', 'BP', 'F', '160500', '174500'),
(94, 'ENCS282', 'ENCS282-BB', 'BQ', 'J', '174500', '192500'),
(95, 'ENCS282', 'ENCS282-B', 'BC', 'W', '160500', '174500'),
(96, 'ENCS282', 'ENCS282-B', 'BD', 'W', '174500', '192500'),
(97, 'COMP346', 'COMP282-DD', 'DA', 'T', '203000', '212000'),
(98, 'COMP346', 'COMP282-DD', 'DB', 'T', '203000', '212000'),
(99, 'ELEC275', 'ELEC275-T', 'TA', 'F', '131500', '145500'),
(100, 'ELEC275', 'ELEC275-T', 'TB', 'F', '131500', '145500'),
(101, 'ELEC275', 'ELEC275-V', 'VA', 'W', '144500', '162500'),
(102, 'ELEC275', 'ELEC275-V', 'VB', 'W', '144500', '162500'),
(103, 'ENGR371', 'ENGR371-FF', 'FA', 'T', '174500', '183500'),
(104, 'ENGR371', 'ENGR371-FF', 'FB', 'W', '174500', '183500'),
(105, 'ENGR371', 'ENGR371-FF', 'FC', 'T', '191500', '200500'),
(106, 'ENGR371', 'ENGR371-R', 'RA', 'M', '114500', '123500'),
(107, 'ENGR371', 'ENGR371-R', 'RB', 'M', '101500', '110500'),
(108, 'ENGR371', 'ENGR371-R', 'RC', 'M', '101500', '110500'),
(109, 'ENGR371', 'ENGR371-S', 'SA', 'T', '131500', '140500'),
(110, 'ENGR371', 'ENGR371-S', 'SB', 'J', '131500', '140500'),
(111, 'ENGR371', 'ENGR371-S', 'SC', 'T', '131500', '140500'),
(112, 'SOEN341', 'SOEN341-F', 'FA', 'F', '144500', '153500'),
(113, 'SOEN341', 'SOEN341-F', 'FB', 'F', '124500', '133500'),
(114, 'SOEN341', 'SOEN341-H', 'HA', 'F', '114500', '123500'),
(115, 'SOEN341', 'SOEN341-H', 'HB', 'F', '124500', '133500'),
(116, 'SOEN341', 'SOEN341-H', 'HC', 'F', '114500', '123500'),
(117, 'SOEN341', 'SOEN341-H', 'HD', 'F', '144500', '153500'),
(118, 'COMP335', 'COMP335-E', 'EA', 'J', '114500', '123500'),
(119, 'COMP335', 'COMP335-E', 'EB', 'T', '114500', '123500'),
(120, 'COMP335', 'COMP335-E', 'EC', 'J', '114500', '123500'),
(121, 'COMP335', 'COMP335-E', 'ED', 'T', '114500', '123500'),
(122, 'COMP335', 'COMP335-G', 'GA', 'T', '144500', '153500'),
(123, 'COMP335', 'COMP335-G', 'GB', 'T', '144500', '153500'),
(124, 'COMP335', 'COMP335-H', 'HA', 'T', '114500', '123500'),
(125, 'COMP335', 'COMP335-H', 'HB', 'J', '114500', '123500'),
(126, 'ENGR391', 'ENGR391-F', 'FA', 'F', '141500', '150500'),
(127, 'ENGR391', 'ENGR391-F', 'FB', 'F', '161500', '170500'),
(128, 'ENGR391', 'ENGR391-F', 'FC', 'F', '174500', '183500'),
(129, 'ENGR391', 'ENGR391-F', 'FD', 'M', '174500', '183500'),
(130, 'ENGR391', 'ENGR391-M', 'MA', 'F', '151500', '160500'),
(131, 'ENGR391', 'ENGR391-M', 'MB', 'F', '151500', '160500'),
(132, 'ENGR391', 'ENGR391-M', 'MC', 'M', '151500', '160500'),
(133, 'ENGR391', 'ENGR391-M', 'MD', 'M', '141500', '150500'),
(134, 'ENGR391', 'ENGR391-S', 'SA', 'F', '141500', '150500'),
(135, 'ENGR391', 'ENGR391-S', 'SB', 'F', '161500', '170500'),
(136, 'ENGR391', 'ENGR391-S', 'SC', 'F', '174500', '183500'),
(137, 'ENGR391', 'ENGR391-S', 'SD', 'M', '161500', '170500'),
(138, 'SOEN342', 'SOEN342-H', 'HA', 'F', '154500', '163500'),
(139, 'SOEN342', 'SOEN342-H', 'HB', 'W', '144500', '153500'),
(140, 'SOEN342', 'SOEN342-I', 'IA', 'F', '154500', '163500'),
(141, 'SOEN342', 'SOEN342-I', 'IB', 'W', '144500', '153500'),
(142, 'SOEN343', 'SOEN343-H', 'HA', 'F', '164500', '173500'),
(143, 'SOEN343', 'SOEN343-H', 'HB', 'F', '174500', '183500'),
(144, 'SOEN343', 'SOEN343-H', 'HC', 'F', '164500', '173500'),
(145, 'SOEN343', 'SOEN343-H', 'HD', 'F', '174500', '183500'),
(146, 'SOEN343', 'SOEN343-H', 'HE', 'F', '164500', '173500'),
(147, 'SOEN384', 'SOEN384-F', 'FA', 'F', '091500', '100500'),
(148, 'SOEN384', 'SOEN384-F', 'FB', 'T', '090000', '100000'),
(149, 'SOEN384', 'SOEN384-F', 'FC', 'F', '091500', '100500'),
(150, 'SOEN384', 'SOEN384-F', 'FD', 'T', '090000', '100000'),
(151, 'SOEN384', 'SOEN384-G', 'GA', 'W', '090000', '100000'),
(152, 'ENGR301', 'ENGR301-G', 'GA', 'T', '174500', '183500'),
(153, 'ENGR301', 'ENGR301-G', 'GB', 'T', '184500', '193500'),
(154, 'ENGR301', 'ENGR301-G', 'GC', 'T', '174500', '183500'),
(155, 'ENGR301', 'ENGR301-FF', 'FA', 'M', '174500', '183500'),
(156, 'ENGR301', 'ENGR301-FF', 'FB', 'M', '184500', '193500'),
(157, 'ENGR301', 'ENGR301-FF', 'FC', 'M', '174500', '183500'),
(158, 'ENGR301', 'ENGR301-H', 'HA', 'J', '174500', '183500'),
(159, 'ENGR301', 'ENGR301-H', 'HB', 'M', '184500', '193500'),
(160, 'ENGR301', 'ENGR301-H', 'HC', 'J', '174500', '183500'),
(161, 'ENGR301', 'ENGR301-II', 'IA', 'W', '174500', '183500'),
(162, 'ENGR301', 'ENGR301-II', 'IB', 'W', '184500', '193500'),
(163, 'ENGR301', 'ENGR301-II', 'IC', 'W', '174500', '183500'),
(164, 'SOEN321', 'SOEN321-GG', 'GA', 'M', '203000', '212000'),
(165, 'SOEN321', 'SOEN321-GG', 'GB', 'M', '203000', '212000');

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `PassedCourseId` int(24) NOT NULL,
  `UserId` int(24) NOT NULL,
  `CourseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`PassedCourseId`, `UserId`, `CourseName`) VALUES
(4, 2, 'ENGR213'),
(5, 2, 'COMP248'),
(603, 1, 'COMP352'),
(604, 1, 'ENCS282'),
(605, 1, 'ENGR202'),
(606, 1, 'COMP248'),
(607, 1, 'COMP249'),
(608, 1, 'ENGR201'),
(609, 3, 'COMP249'),
(610, 3, 'ENGR201'),
(611, 1, 'SOEN341');

-- --------------------------------------------------------

--
-- Table structure for table `slab`
--

CREATE TABLE `slab` (
  `LabID` int(11) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LabSection` varchar(225) NOT NULL,
  `LabDay` varchar(10) NOT NULL,
  `StartLabTime` varchar(225) NOT NULL,
  `EndLabTime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slab`
--

INSERT INTO `slab` (`LabID`, `CourseName`, `LabSection`, `LabDay`, `StartLabTime`, `EndLabTime`) VALUES
(1, 'COMP248', 'AI-X', 'M,W', '183000', '193000'),
(2, 'COMP248', 'AJ-X', 'M,W', '183000', '193000'),
(3, 'COMP248', 'AK-X', 'M,W', '183000', '193000'),
(4, 'COMP249', 'CI-X', 'T,J', '201500', '211500'),
(5, 'COMP249', 'CJ-X', 'M,W', '201500', '211500'),
(6, 'COMP249', 'CK-X', 'M,W', '201500', '211500'),
(7, 'SOEN228', 'AI-X', 'M,W', '123000', '142000'),
(8, 'SOEN228', 'AJ-X', 'M,W', '143000', '162000'),
(9, 'SOEN228', 'AK-X', 'T,J', '144000', '163000'),
(10, 'COMP346', 'CI-X', 'T,J', '211000', '230000'),
(11, 'COMP346', 'CJ-X', 'T,J', '211000', '230000'),
(12, 'ELEC275', 'CI-X', 'W', '084500', '113000'),
(13, 'ELEC275', 'CJ-X', 'T', '084500', '113000'),
(14, 'ELEC275', 'CK-X', 'J', '084500', '113000'),
(15, 'ELEC275', 'CL-X', 'W', '123000', '151500'),
(16, 'ELEC275', 'CM-X', 'W', '160000', '184500'),
(17, 'ELEC275', 'CN-X', 'T', '174500', '203000');

-- --------------------------------------------------------

--
-- Table structure for table `slec`
--

CREATE TABLE `slec` (
  `LecInfo` varchar(225) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LecDay` varchar(10) DEFAULT NULL,
  `StartLecTime` varchar(225) DEFAULT NULL,
  `EndLecTime` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slec`
--

INSERT INTO `slec` (`LecInfo`, `CourseName`, `LecDay`, `StartLecTime`, `EndLecTime`) VALUES
('COMP232-AA', 'COMP232', 'T,J', '104500', '131500'),
('COMP248-AA', 'COMP248', 'M,W', '133000', '160000'),
('COMP249-CC', 'COMP249', 'M,W', '153000', '180000'),
('COMP335-AA', 'COMP335', 'M,W', '183000', '210000'),
('COMP346-CC', 'COMP346', 'T,J', '183000', '210000'),
('COMP348-AA', 'COMP348', 'M,W', '144500', '171500'),
('COMP352-AA', 'COMP352', 'T,J', '183000', '210000'),
('ELEC275-CC', 'ELEC275', 'T,J', '114500', '141500'),
('ENCS282-AA', 'ENCS282', 'T,J', '084500', '113000'),
('ENCS282-AB', 'ENCS282', 'T,J', '104500', '131500'),
('ENCS282-CC', 'ENCS282', 'T,J', '101500', '124500'),
('ENCS282-CD', 'ENCS282', 'T,J', '101500', '124500'),
('ENGE301-AA', 'ENGE301', 'T,J', '183000', '210000'),
('ENGE301-AB', 'ENGE301', 'T,J', '183000', '210000'),
('ENGE301-CC', 'ENGE301', 'M,W', '144500', '173000'),
('ENGR201-BL', 'ENGR201', 'ONLINE', NULL, NULL),
('ENGR202-AA', 'ENGR202', 'M,W', '114500', '130000'),
('ENGR213-AA', 'ENGR213', 'T,J', '101500', '124500'),
('ENGR233-AA', 'ENGR233', 'T,J', '104500', '131500'),
('ENGR233-AB', 'ENGR233', 'T,J', '104500', '131500'),
('ENGR371-CC', 'ENGR371', 'M,W', '183000', '210000'),
('ENGR371-CD', 'ENGR371', 'M,W', '183000', '210000'),
('ENGR391-AA', 'ENGR391', 'T,J', '183000', '210000'),
('ENGR391-AB', 'ENGR391', 'T,J', '183000', '210000'),
('ENGR391-CC', 'ENGR391', 'T,J', '183000', '210000'),
('ENGR392-AA', 'ENGR392', 'T,J', '084500', '113000'),
('ENGR392-AB', 'ENGR392', 'T,J', '114500', '143000'),
('ENGR392-CC', 'ENGR392', 'T,J', '084500', '113000'),
('ENGR392-CD', 'ENGR392', 'T,J', '084500', '113000'),
('SOEN228-AA', 'SOEN228', 'M,W', '183000', '210000'),
('SOEN287-CC', 'SOEN287', 'M,W', '104500', '131500');

-- --------------------------------------------------------

--
-- Table structure for table `stut`
--

CREATE TABLE `stut` (
  `TutID` int(11) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LecInfo` varchar(225) NOT NULL,
  `TutSection` varchar(10) NOT NULL,
  `TutDay` varchar(10) NOT NULL,
  `StartTutTime` varchar(225) NOT NULL,
  `EndTutTime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stut`
--

INSERT INTO `stut` (`TutID`, `CourseName`, `LecInfo`, `TutSection`, `TutDay`, `StartTutTime`, `EndTutTime`) VALUES
(1, 'COMP232', 'COMP232-AA', 'AE', 'T,J', '134500', '152500'),
(2, 'COMP232', 'COMP232-AA', 'AF', 'T,J', '134500', '152500'),
(3, 'COMP248', 'COMP248-AA', 'AE', 'M,W', '164000', '182000'),
(4, 'COMP248', 'COMP248-AA', 'AF', 'M,W', '164000', '182000'),
(5, 'COMP248', 'COMP248-AA', 'AG', 'M,W', '164000', '182000'),
(6, 'COMP249', 'COMP249-CC', 'CE', 'T,J', '182000', '200000'),
(7, 'COMP249', 'COMP249-CC', 'CF', 'M,W', '182000', '200000'),
(8, 'COMP249', 'COMP249-CC', 'CG', 'M,W', '182000', '200000'),
(9, 'ENGR201', 'ENGR201-BL', 'B', 'W', '092000', '101000'),
(10, 'ENGR201', 'ENGR201-BL', 'C', 'W', '110000', '115000'),
(11, 'ENGR201', 'ENGR201-BL', 'D', 'W', '130000', '135000'),
(12, 'ENGR201', 'ENGR201-BL', 'E', 'W', '140000', '145000'),
(13, 'ENGR201', 'ENGR201-BL', 'F', 'M', '110000', '115000'),
(14, 'ENGR201', 'ENGR201-BL', 'G', 'M', '130000', '135000'),
(15, 'ENGR213', 'ENGR213-AA', 'AE', 'T,J', '083000', '101000'),
(16, 'ENGR213', 'ENGR213-AA', 'AF', 'T,J', '083000', '101000'),
(17, 'ENGR213', 'ENGR213-AA', 'AG', 'T,J', '083000', '101000'),
(18, 'ENGR213', 'ENGR213-AA', 'AH', 'T,J', '083000', '101000'),
(19, 'ENGR233', 'ENGR233-AA', 'AD', 'T,J', '084500', '102500'),
(20, 'ENGR233', 'ENGR233-AA', 'AE', 'T,J', '084500', '102500'),
(21, 'ENGR233', 'ENGR233-AA', 'AF', 'T,J', '084500', '102500'),
(22, 'ENGR233', 'ENGR233-AB', 'AD', 'T,J', '084500', '102500'),
(23, 'ENGR233', 'ENGR233-AB', 'AE', 'T,J', '084500', '102500'),
(24, 'ENGR233', 'ENGR233-AB', 'AM', 'T,J', '084500', '102500'),
(25, 'SOEN228', 'SOEN228-AA', 'AE', 'M,W', '164000', '182000'),
(26, 'SOEN228', 'SOEN228-AA', 'AF', 'M,W', '164000', '182000'),
(27, 'SOEN228', 'SOEN228-AA', 'AG', 'M,W', '164000', '182000'),
(28, 'SOEN287', 'SOEN287-CC', 'CE', 'M,W', '084500', '102500'),
(29, 'SOEN287', 'SOEN287-CC', 'CF', 'M,W', '084500', '102500'),
(30, 'COM348', 'COM348-AA', 'AE', 'M,W', '131500', '140500'),
(31, 'COM348', 'COM348-AA', 'AF', 'M,W', '131500', '140500'),
(32, 'COM348', 'COM348-AA', 'AG', 'M,W', '131500', '140500'),
(33, 'COMP352', 'COMP352-AA', 'AE', 'T,J', '173000', '182000'),
(34, 'COMP352', 'COMP352-AA', 'AF', 'T,J', '163000', '172000'),
(35, 'COMP352', 'COMP352-AA', 'AG', 'T,J', '173000', '182000'),
(36, 'ENCS282', 'ENCS282-AA', 'AD', 'T,J', '140000', '154000'),
(37, 'ENCS282', 'ENCS282-AA', 'AE', 'T,J', '114500', '132500'),
(38, 'ENCS282', 'ENCS282-AA', 'AF', 'T,J', '140000', '154000'),
(39, 'ENCS282', 'ENCS282-AA', 'AG', 'M,W', '084500', '102500'),
(40, 'ENCS282', 'ENCS282-AB', 'AI', 'T,J', '084500', '102500'),
(41, 'ENCS282', 'ENCS282-AB', 'AJ', 'T,J', '140000', '154000'),
(42, 'ENCS282', 'ENCS282-AB', 'AK', 'T,J', '140000', '154000'),
(43, 'ENCS282', 'ENCS282-AB', 'AL', 'T,J', '083000', '101000'),
(44, 'ENCS282', 'ENCS282-CC', 'CE', 'T,J', '083000', '101000'),
(45, 'ENCS282', 'ENCS282-CC', 'CF', 'T,J', '140000', '154000'),
(46, 'ENCS282', 'ENCS282-CC', 'CG', 'M,W', '084500', '102500'),
(47, 'ENCS282', 'ENCS282-CC', 'CH', 'T,J', '160000', '174000'),
(48, 'ENCS282', 'ENCS282-CD', 'CI', 'T,J', '083000', '101000'),
(49, 'ENCS282', 'ENCS282-CD', 'CJ', 'T,J', '140000', '154000'),
(50, 'ENCS282', 'ENCS282-CD', 'CK', 'T,J', '083000', '101000'),
(51, 'ENCS282', 'ENCS282-CD', 'CL', 'T,J', '140000', '154000'),
(52, 'COMP346', 'COMP346-CC', 'CA', 'T,J', '173000', '182000'),
(53, 'COMP346', 'COMP346-CC', 'CB', 'T,J', '173000', '182000'),
(54, 'ELEC275', 'ELEC275-CC', 'CE', 'T,J', '150000', '164000'),
(55, 'ELEC275', 'ELEC275-CC', 'CF', 'T,J', '150000', '164000'),
(56, 'ENGR371', 'ENGR371-CC', 'CE', 'M,W', '211500', '220500'),
(57, 'ENGR371', 'ENGR371-CC', 'CF', 'M,W', '211500', '220500'),
(58, 'ENGR371', 'ENGR371-CC', 'CG', 'M,W', '211500', '220500'),
(59, 'ENGR371', 'ENGR371-CD', 'CE', 'M,W', '211500', '220500'),
(60, 'ENGR371', 'ENGR371-CD', 'CF', 'M,W', '211500', '220500'),
(61, 'ENGR371', 'ENGR371-CD', 'CG', 'M,W', '211500', '220500'),
(62, 'COMP335', 'COMP335-AA', 'AE', 'M,W', '173000', '182000'),
(63, 'COMP335', 'COMP335-AA', 'AF', 'M,W', '173000', '182000'),
(64, 'ENGR391', 'ENGR391-AA', 'AE', 'T,J', '211000', '220000'),
(65, 'ENGR391', 'ENGR391-AA', 'AF', 'T,J', '173000', '182000'),
(66, 'ENGR391', 'ENGR391-AA', 'AG', 'T,J', '163000', '172000'),
(67, 'ENGR391', 'ENGR391-AA', 'AH', 'T,J', '153000', '162000'),
(68, 'ENGR391', 'ENGR391-AB', 'AH', 'T,J', '211000', '220000'),
(69, 'ENGR391', 'ENGR391-AB', 'AI', 'T,J', '173500', '182500'),
(70, 'ENGR391', 'ENGR391-CC', 'CF', 'T,J', '211000', '220000'),
(71, 'ENGR391', 'ENGR391-CC', 'CG', 'T,J', '211000', '220000'),
(72, 'ENGR391', 'ENGR391-CC', 'CH', 'T,J', '211000', '220000'),
(73, 'ENGR391', 'ENGR391-CC', 'CI', 'T,J', '100000', '115000'),
(74, 'ENGR391', 'ENGR391-CC', 'CE', 'T,J', '211000', '220000'),
(75, 'ENGE301', 'ENGE301-AA', 'AE', 'J', '161500', '180500'),
(76, 'ENGE301', 'ENGE301-AA', 'AF', 'T', '161500', '180500'),
(77, 'ENGE301', 'ENGE301-AA', 'AG', 'J', '161500', '180500'),
(78, 'ENGE301', 'ENGE301-AA', 'AG', 'T', '161500', '180500'),
(79, 'ENGE301', 'ENGE301-AB', 'AI', 'M', '183000', '202000'),
(80, 'ENGE301', 'ENGE301-AB', 'AJ', 'W', '183000', '202000'),
(81, 'ENGE301', 'ENGE301-AB', 'AK', 'M', '161500', '180500'),
(82, 'ENGE301', 'ENGE301-AB', 'AL', 'W', '161500', '180500'),
(83, 'ENGE301', 'ENGE301-CC', 'CE', 'M', '174500', '193500'),
(84, 'ENGE301', 'ENGE301-CC', 'CF', 'W', '174500', '193500'),
(85, 'ENGE301', 'ENGE301-CC', 'CG', 'M', '114500', '133500'),
(86, 'ENGE301', 'ENGE301-CC', 'CH', 'W', '114500', '133500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Activated` int(1) NOT NULL,
  `InputtedPassed` tinyint(1) DEFAULT NULL,
  `FirstSemester` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Password`, `Email`, `Activated`, `InputtedPassed`, `FirstSemester`) VALUES
(1, 'Hani Sabsoob', 'HaniSX100234', 'sebhani98@gmail.com', 1, 1, 'Fall'),
(2, 'John Malik', '123456789', 'JohnMalik@hotmail.com', 0, 0, 'Winter'),
(3, 'Obama', '123123123', 'test@t.com', 1, 1, 'Fall'),
(4, 'hdhsfc', '123123123', 'htest@hh.com', 1, 0, 'Summer'),
(5, 'Obama', '12345678', 'jatan@h.com', 1, 0, 'Fall'),
(6, 'Hani Sabsoob', 'hani100234', 'hani-111-222@hotmail.com', 1, 0, 'Winter');

-- --------------------------------------------------------

--
-- Table structure for table `wlab`
--

CREATE TABLE `wlab` (
  `LabID` int(11) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LabSection` varchar(225) NOT NULL,
  `LabDay` varchar(10) NOT NULL,
  `StartLabTime` varchar(225) NOT NULL,
  `EndLabTime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wlab`
--

INSERT INTO `wlab` (`LabID`, `CourseName`, `LabSection`, `LabDay`, `StartLabTime`, `EndLabTime`) VALUES
(1, 'COMP248', 'A-X', 'F', '200000', '210000'),
(2, 'COMP248', 'B-X', 'M', '200000', '210000'),
(3, 'COMP248', 'C-X', 'F', '200000', '210000'),
(4, 'COMP248', 'D-X', 'F', '133500', '143500'),
(5, 'COMP248', 'E-X', 'W', '133500', '143500'),
(6, 'COMP248', 'F-X', 'W', '133500', '143500'),
(7, 'COMP248', 'G-X', 'F', '163500', '173500'),
(8, 'COMP248', 'H-X', 'F', '163500', '173500'),
(9, 'COMP248', 'I-X', 'M', '163500', '173500'),
(10, 'COMP249', 'A-X', 'J', '163000', '173000'),
(11, 'COMP249', 'B-X', 'F', '193500', '203500'),
(12, 'COMP249', 'C-X', 'T', '203500', '213500'),
(13, 'COMP249', 'D-X', 'M', '174500', '184500'),
(14, 'COMP249', 'E-X', 'J', '163000', '173000'),
(15, 'COMP249', 'F', 'J', '163000', '173000'),
(16, 'COMP249', 'G-X', 'M', '121000', '131000'),
(17, 'COMP249', 'H-X', 'F', '121000', '131000'),
(18, 'COMP249', 'I-X', 'F', '121000', '131000'),
(19, 'COMP249', 'J-X', 'M', '121000', '131000'),
(20, 'COMP249', 'K-X', 'M', '121000', '131000'),
(21, 'COMP249', 'L-X', 'W', '133500', '143500'),
(22, 'COMP249', 'M-X', 'W', '133500', '143500'),
(23, 'COMP249', 'N-X', 'M', '213000', '223000'),
(24, 'COMP249', 'O-X', 'T', '180000', '190000'),
(25, 'COMP249', 'P-X', 'T', '193000', '203000'),
(26, 'COMP249', 'S-X', 'J', '163000', '173000'),
(27, 'SOEN228', 'A-X', 'M', '100000', '120000'),
(28, 'SOEN228', 'B-X', 'M', '100000', '120000'),
(29, 'SOEN228', 'C-X', 'T', '100000', '120000'),
(30, 'SOEN228', 'D-X', 'T', '100000', '120000'),
(31, 'SOEN228', 'E-X', 'W', '100000', '120000'),
(32, 'SOEN228', 'F-X', 'W', '100000', '120000'),
(33, 'SOEN228', 'G-X', 'J', '100000', '120000'),
(34, 'SOEN228', 'H-X', 'J', '100000', '120000'),
(35, 'SOEN228', 'I-X', 'F', '100000', '120000'),
(36, 'SOEN228', 'J-X', 'F', '100000', '120000'),
(37, 'COMP346', 'A-X', 'W', '213000', '232000'),
(38, 'COMP346', 'B-X', 'M', '141500', '160500'),
(39, 'COMP346', 'C-X', 'F', '174500', '193500'),
(40, 'COMP346', 'D-X', 'F', '194500', '213500'),
(41, 'COMP346', 'E-X', 'T', '213000', '232000'),
(42, 'COMP346', 'F-X', 'F', '141500', '160500'),
(43, 'COMP346', 'G-X', 'M', '213000', '232000'),
(44, 'COMP346', 'H-X', 'F', '141500', '160500'),
(45, 'COMP346', 'I-X', 'J', '194500', '213500'),
(46, 'COMP346', 'J-X', 'F', '174500', '193500'),
(47, 'ELEC275', 'JK-X', 'J', '174500', '203000'),
(48, 'ELEC275', 'JL-X', 'J', '174500', '203000'),
(49, 'ELEC275', 'JM-X', 'W', '114500', '143000'),
(50, 'ELEC275', 'JN-X', 'W', '114500', '143000'),
(51, 'ELEC275', 'SI-X', 'M', '084500', '113000'),
(52, 'ELEC275', 'SJ-X', 'M', '084500', '113000'),
(53, 'ELEC275', 'SK-X', 'M', '174500', '203000'),
(54, 'ELEC275', 'SL-X', 'M', '174500', '203000'),
(55, 'SOEN390', 'SI-X', 'J', '154500', '182500'),
(56, 'SOEN390', 'SJ-X', 'J', '184500', '212500'),
(57, 'SOEN390', 'SK-X', 'T', '154500', '182500'),
(58, 'SOEN390', 'SL-X', 'T', '184500', '212500'),
(59, 'SOEN390', 'SM-X', 'J', '154500', '182500'),
(60, 'SOEN390', 'SN-X', 'T', '150000', '174000'),
(61, 'SOEN490_2', 'SSSI', 'T,J', '083000', '103000'),
(62, 'SOEN490_2', 'SSSJ', 'T,J', '083000', '103000'),
(63, 'SOEN490_2', 'SSSK', 'T,J', '083000', '103000'),
(64, 'SOEN490_2', 'SSSL', 'T,J', '083000', '103000'),
(65, 'SOEN490_2', 'SSSM', 'T,J', '083000', '103000'),
(66, 'SOEN490_2', 'SSSN', 'T,J', '083000', '103000');

-- --------------------------------------------------------

--
-- Table structure for table `wlec`
--

CREATE TABLE `wlec` (
  `LecInfo` varchar(225) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LecDay` varchar(10) DEFAULT NULL,
  `StartLecTime` varchar(225) DEFAULT NULL,
  `EndLecTime` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wlec`
--

INSERT INTO `wlec` (`LecInfo`, `CourseName`, `LecDay`, `StartLecTime`, `EndLecTime`) VALUES
('COMP232-NN', 'COMP232', 'J', '174500', '201500'),
('COMP232-U', 'COMP232', 'T,J', '131500', '143000'),
('COMP248-S', 'COMP248', 'W', '174500', '201500'),
('COMP248-U', 'COMP248', 'W,F', '101500', '113000'),
('COMP248-W', 'COMP248', 'W,F', '114500', '130000'),
('COMP249-PP', 'COMP249', 'J', '174500', '201500'),
('COMP249-QQ', 'COMP249', 'J', '174500', '201500'),
('COMP249-S', 'COMP249', 'M,W', '084500', '100000'),
('COMP249-U', 'COMP249', 'W,F', '101500', '113000'),
('COMP249-WW', 'COMP249', 'F', '174500', '201500'),
('COMP335-N', 'COMP335', 'T,J', '114500', '130000'),
('COMP346-NN', 'COMP346', 'W', '174500', '201500'),
('COMP346-UU', 'COMP346', 'M', '174500', '201500'),
('COMP346-WW', 'COMP346', 'T', '174500', '201500'),
('COMP346-YY', 'COMP346', 'M', '174500', '201500'),
('COMP348-E', 'COMP348', 'M,W', '144500', '160000'),
('COMP352-S', 'COMP352', 'M,W', '131500', '143000'),
('COMP352-X', 'COMP352', 'M,W', '131500', '143000'),
('ELEC275-JJ', 'ELEC275', 'T', '174500', '201500'),
('ELEC275-SS', 'ELEC275', 'J', '174500', '201500'),
('ENCS282-EE', 'ENCS282', 'T', '174500', '201500'),
('ENCS282-WW', 'ENCS282', 'T', '174500', '201500'),
('ENCS282-Y', 'ENCS282', 'T,J', '144500', '160000'),
('ENGR201-BL', 'ENGR201', 'ONLINE', NULL, NULL),
('ENGR202-R', 'ENGR202', 'J', '161500', '173000'),
('ENGR202-SS', 'ENGR202', 'W', '174500', '190000'),
('ENGR213-F', 'ENGR213', 'T,J', '144500', '160000'),
('ENGR213-G', 'ENGR213', 'T,J', '144500', '160000'),
('ENGR213-J', 'ENGR213', 'T,J', '144500', '160000'),
('ENGR213-W', 'ENGR213', 'W,F', '144500', '160000'),
('ENGR233-J', 'ENGR233', 'M,W', '161500', '173000'),
('ENGR233-R', 'ENGR233', 'T,J', '114500', '130000'),
('ENGR233-S', 'ENGR233', 'W,F', '084500', '100000'),
('ENGR233-T', 'ENGR233', 'W,F', '101500', '113000'),
('ENGR233-U', 'ENGR233', 'T,J', '084500', '100000'),
('ENGR233-V', 'ENGR233', 'T,J', '084500', '100000'),
('ENGR233-X', 'ENGR233', 'W,F', '101500', '113000'),
('ENGR301-R', 'ENGR301', 'T,J', '161500', '173000'),
('ENGR301-SS', 'ENGR301', 'M', '180000', '203000'),
('ENGR371-T', 'ENGR371', 'T,J', '144500', '160000'),
('ENGR371-UU', 'ENGR371', 'F', '174500', '201500'),
('ENGR371-W', 'ENGR371', 'W,F', '101500', '113000'),
('ENGR391-UU', 'ENGR391', 'J', '174500', '201500'),
('ENGR391-V', 'ENGR391', 'T,J', '131500', '143000'),
('ENGR391-X', 'ENGR391', 'W,F', '084500', '100000'),
('ENGR392-P', 'ENGR392', 'F', '084500', '113000'),
('ENGR392-Q', 'ENGR392', 'M', '144500', '173000'),
('ENGR392-RR', 'ENGR392', 'T', '174500', '201500'),
('ENGR392-S', 'ENGR392', 'W', '144500', '173000'),
('SOEN228-SS', 'SOEN228', 'T', '174500', '201500'),
('SOEN228-U', 'SOEN228', 'M,W', '144500', '160000'),
('SOEN287-S', 'SOEN287', 'T,J', '084500', '100000'),
('SOEN287-U', 'SOEN287', 'T,J', '144500', '160000'),
('SOEN287-W', 'SOEN287', 'T,J', '144500', '160000'),
('SOEN321-U', 'SOEN321', 'F', '144500', '173000'),
('SOEN331-W', 'SOEN331', 'T,J', '161500', '173000'),
('SOEN341-S', 'SOEN341', 'W,F', '084500', '100000'),
('SOEN341-U', 'SOEN341', 'W,F', '084500', '100000'),
('SOEN344-S', 'SOEN344', 'T,J', '131500', '143000'),
('SOEN345-S', 'SOEN345', 'M,W', '144500', '160000'),
('SOEN357-S', 'SOEN357', 'W,F', '101500', '113000'),
('SOEN385-S', 'SOEN385', 'T,J', '114500', '130000'),
('SOEN390-S', 'SOEN390', 'M', '161500', '175500'),
('SOEN490-SS', 'SOEN490_2', 'F', '182500', '192500');

-- --------------------------------------------------------

--
-- Table structure for table `wtut`
--

CREATE TABLE `wtut` (
  `TutID` int(11) NOT NULL,
  `CourseName` varchar(225) NOT NULL,
  `LecInfo` varchar(225) NOT NULL,
  `TutSection` varchar(10) NOT NULL,
  `TutDay` varchar(10) NOT NULL,
  `StartTutTime` varchar(225) NOT NULL,
  `EndTutTime` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wtut`
--

INSERT INTO `wtut` (`TutID`, `CourseName`, `LecInfo`, `TutSection`, `TutDay`, `StartTutTime`, `EndTutTime`) VALUES
(1, 'COMP232', 'COMP232-NN', 'NA', 'J', '203000', '221000'),
(2, 'COMP232', 'COMP232-NN', 'NB', 'T', '203000', '221000'),
(3, 'COMP232', 'COMP232-U', 'UA', 'T', '144500', '162500'),
(4, 'COMP232', 'COMP232-U', 'UB', 'T', '144500', '162500'),
(5, 'COMP248', 'COMP248-S', 'SA', 'W', '203000', '221000'),
(6, 'COMP248', 'COMP248-S', 'SB', 'W', '203000', '221000'),
(7, 'COMP248', 'COMP248-U', 'UA', 'F', '114500', '132500'),
(8, 'COMP248', 'COMP248-U', 'UB', 'W', '114500', '132500'),
(9, 'COMP248', 'COMP248-W', 'WA', 'M', '101500', '115000'),
(10, 'COMP248', 'COMP248-W', 'WB', 'W', '144500', '162500'),
(11, 'ENGR201', 'ENGR201-BL', 'A', 'F', '084500', '093500'),
(12, 'ENGR201', 'ENGR201-BL', 'B', 'F', '084500', '093500'),
(13, 'ENGR201', 'ENGR201-BL', 'C', 'T', '161500', '170500'),
(14, 'ENGR201', 'ENGR201-BL', 'D', 'T', '161500', '170500'),
(15, 'ENGR201', 'ENGR201-BL', 'E', 'W', '084500', '093500'),
(16, 'ENGR201', 'ENGR201-BL', 'F', 'W', '084500', '093500'),
(17, 'ENGR201', 'ENGR201-BL', 'G', 'J', '161500', '170500'),
(18, 'ENGR201', 'ENGR201-BL', 'H', 'J', '161500', '170500'),
(19, 'ENGR201', 'ENGR201-BL', 'I', 'T', '161500', '170500'),
(20, 'ENGR201', 'ENGR201-BL', 'J', 'J', '161500', '170500'),
(21, 'ENGR213', 'ENGR213-G', 'GA', 'M', '161000', '175000'),
(22, 'ENGR213', 'ENGR213-G', 'GB', 'F', '174500', '192500'),
(23, 'ENGR213', 'ENGR213-F', 'FA', 'M', '180000', '194000'),
(24, 'ENGR213', 'ENGR213-F', 'FB', 'F', '174500', '192500'),
(25, 'ENGR213', 'ENGR213-J', 'JA', 'F', '154500', '172500'),
(26, 'ENGR213', 'ENGR213-J', 'JB', 'F', '154500', '172500'),
(27, 'ENGR213', 'ENGR213-W', 'WA', 'F', '161000', '175000'),
(28, 'ENGR213', 'ENGR213-W', 'WB', 'M', '180000', '194000'),
(29, 'COMP249', 'COMP249-PP', 'PA', 'J', '203000', '221000'),
(30, 'COMP249', 'COMP249-PP', 'PB', 'F', '174500', '192500'),
(31, 'COMP249', 'COMP249-QQ', 'QA', 'J', '203000', '221000'),
(32, 'COMP249', 'COMP249-QQ', 'QB', 'M', '194500', '212500'),
(33, 'COMP249', 'COMP249-S', 'SA', 'W', '101500', '115500'),
(34, 'COMP249', 'COMP249-S', 'SB', 'M', '101500', '115500'),
(35, 'COMP249', 'COMP249-S', 'SC', 'M', '101500', '115500'),
(36, 'COMP249', 'COMP249-U', 'UA', 'M', '101500', '115500'),
(37, 'COMP249', 'COMP249-U', 'UB', 'W', '114500', '132500'),
(38, 'COMP249', 'COMP249-WW', 'WA', 'F', '203000', '221000'),
(39, 'COMP249', 'COMP249-WW', 'WB', 'M', '190000', '205000'),
(40, 'ENGR233', 'ENGR233-R', 'RA', 'F', '141500', '155500'),
(41, 'ENGR233', 'ENGR233-R', 'RB', 'F', '141500', '155500'),
(42, 'ENGR233', 'ENGR233-R', 'RC', 'F', '141500', '155500'),
(43, 'ENGR233', 'ENGR233-T', 'TA', 'J', '094500', '112500'),
(44, 'ENGR233', 'ENGR233-T', 'TB', 'J', '094500', '112500'),
(45, 'ENGR233', 'ENGR233-T', 'TC', 'J', '094500', '112500'),
(46, 'ENGR233', 'ENGR233-U', 'UA', 'M', '094500', '112500'),
(47, 'ENGR233', 'ENGR233-U', 'UB', 'M', '131500', '145500'),
(48, 'ENGR233', 'ENGR233-U', 'UC', 'M', '094500', '112500'),
(49, 'ENGR233', 'ENGR233-J', 'JA', 'M', '174500', '192500'),
(50, 'ENGR233', 'ENGR233-J', 'JB', 'M', '194000', '212000'),
(51, 'ENGR233', 'ENGR233-J', 'JC', 'M', '131500', '150500'),
(52, 'ENGR233', 'ENGR233-X', 'XA', 'F', '141500', '155500'),
(53, 'ENGR233', 'ENGR233-X', 'XB', 'F', '141500', '155500'),
(54, 'ENGR233', 'ENGR233-X', 'XC', 'F', '141500', '155500'),
(55, 'ENGR233', 'ENGR233-S', 'SA', 'M', '082000', '100000'),
(56, 'ENGR233', 'ENGR233-S', 'SB', 'W', '131500', '145500'),
(57, 'ENGR233', 'ENGR233-S', 'SC', 'M', '082000', '100000'),
(58, 'ENGR233', 'ENGR233-V', 'VA', 'M', '082000', '100000'),
(59, 'ENGR233', 'ENGR233-V', 'VB', 'M', '082000', '100000'),
(60, 'ENGR233', 'ENGR233-V', 'VC', 'M', '082000', '100000'),
(61, 'SOEN228', 'SOEN228-SS', 'SA', 'T', '203000', '221000'),
(62, 'SOEN228', 'SOEN228-SS', 'SB', 'T', '203000', '221000'),
(63, 'SOEN228', 'SOEN228-U', 'UA', 'W', '161500', '175500'),
(64, 'SOEN228', 'SOEN228-U', 'UB', 'W', '161500', '175500'),
(65, 'SOEN228', 'SOEN228-U', 'UC', 'W', '161500', '175500'),
(66, 'SOEN287', 'SOEN287-S', 'SA', 'T', '101500', '115500'),
(67, 'SOEN287', 'SOEN287-S', 'SB', 'J', '101500', '115500'),
(68, 'SOEN287', 'SOEN287-S', 'SC', 'W', '101500', '115500'),
(69, 'SOEN287', 'SOEN287-S', 'SD', 'W', '083000', '101000'),
(70, 'SOEN287', 'SOEN287-U', 'UA', 'T', '161500', '175500'),
(71, 'SOEN287', 'SOEN287-U', 'UB', 'J', '161500', '175500'),
(72, 'SOEN287', 'SOEN287-U', 'UC', 'T', '180000', '194000'),
(73, 'SOEN287', 'SOEN287-U', 'UD', 'J', '180000', '194000'),
(74, 'SOEN287', 'SOEN287-W', 'WA', 'F', '151500', '165500'),
(75, 'SOEN287', 'SOEN287-W', 'WB', 'T', '161500', '175500'),
(76, 'SOEN287', 'SOEN287-W', 'WC', 'F', '151500', '165500'),
(77, 'SOEN287', 'SOEN287-W', 'WD', 'F', '173000', '191000'),
(78, 'COMP348', 'COMP348-E', 'EI', 'M', '161500', '170500'),
(79, 'COMP348', 'COMP348-E', 'EJ', 'W', '161500', '170500'),
(80, 'COMP348', 'COMP348-E', 'EK', 'M', '172000', '181000'),
(81, 'COMP352', 'COMP352-S', 'SA', 'W', '144500', '153500'),
(82, 'COMP352', 'COMP352-S', 'SB', 'M', '144500', '153500'),
(83, 'COMP352', 'COMP352-X', 'XA', 'M', '161500', '170500'),
(84, 'COMP352', 'COMP352-X', 'XB', 'W', '161500', '170500'),
(85, 'COMP352', 'COMP352-X', 'XC', 'M', '174500', '183500'),
(86, 'ENCS282', 'ENCS282-EE', 'EN', 'M', '161500', '175500'),
(87, 'ENCS282', 'ENCS282-EE', 'EO', 'J', '161500', '175500'),
(88, 'ENCS282', 'ENCS282-EE', 'EP', 'F', '161500', '175500'),
(89, 'ENCS282', 'ENCS282-EE', 'EQ', 'T', '203000', '221000'),
(90, 'ENCS282', 'ENCS282-WW', 'WA', 'T', '203000', '221000'),
(91, 'ENCS282', 'ENCS282-WW', 'WB', 'F', '175500', '193500'),
(92, 'ENCS282', 'ENCS282-WW', 'WC', 'J', '175500', '193500'),
(93, 'ENCS282', 'ENCS282-WW', 'WD', 'T', '203000', '221000'),
(94, 'ENCS282', 'ENCS282-Y', 'YA', 'F', '161500', '175500'),
(95, 'ENCS282', 'ENCS282-Y', 'YB', 'T', '161500', '175500'),
(96, 'ENCS282', 'ENCS282-Y', 'YC', 'M', '161500', '175500'),
(97, 'ENCS282', 'ENCS282-Y', 'YD', 'F', '161500', '175500'),
(98, 'COMP346', 'COMP346-NN', 'NA', 'W', '203000', '212000'),
(99, 'COMP346', 'COMP346-NN', 'NB', 'M', '131500', '140500'),
(100, 'COMP346', 'COMP346-UU', 'UA', 'M', '163500', '172500'),
(101, 'COMP346', 'COMP346-UU', 'UB', 'W', '153500', '162500'),
(102, 'COMP346', 'COMP346-WW', 'WA', 'T', '203000', '212000'),
(103, 'COMP346', 'COMP346-WW', 'WB', 'F', '131500', '140500'),
(104, 'COMP346', 'COMP346-YY', 'YA', 'M', '203000', '212000'),
(105, 'COMP346', 'COMP346-YY', 'YB', 'F', '131500', '140500'),
(106, 'ELEC275', 'ELEC275-JJ', 'JA', 'W', '094500', '112500'),
(107, 'ELEC275', 'ELEC275-JJ', 'JB', 'M', '114500', '132500'),
(108, 'ELEC275', 'ELEC275-SS', 'SA', 'W', '084500', '103500'),
(109, 'ELEC275', 'ELEC275-SS', 'SB', 'M', '084500', '103500'),
(110, 'ENGR371', 'ENGR371-T', 'TA', 'F', '101500', '110500'),
(111, 'ENGR371', 'ENGR371-T', 'TB', 'F', '101500', '110500'),
(112, 'ENGR371', 'ENGR371-T', 'TC', 'F', '101500', '110500'),
(113, 'ENGR371', 'ENGR371-UU', 'UA', 'F', '144500', '153500'),
(114, 'ENGR371', 'ENGR371-UU', 'UB', 'M', '144500', '153500'),
(115, 'ENGR371', 'ENGR371-UU', 'UC', 'M', '144500', '153500'),
(116, 'ENGR371', 'ENGR371-W', 'WA', 'W', '084500', '093500'),
(117, 'ENGR371', 'ENGR371-W', 'WB', 'F', '084500', '093500'),
(118, 'ENGR371', 'ENGR371-W', 'WC', 'F', '084500', '093500'),
(119, 'SOEN331', 'SOEN331-U', 'UA', 'F', '141500', '160500'),
(120, 'SOEN331', 'SOEN331-U', 'UB', 'F', '121500', '140500'),
(121, 'SOEN331', 'SOEN331-U', 'UC', 'F', '141500', '160500'),
(122, 'SOEN331', 'SOEN331-W', 'WA', 'F', '141500', '160500'),
(123, 'SOEN331', 'SOEN331-W', 'WB', 'F', '141500', '160500'),
(124, 'SOEN331', 'SOEN331-W', 'WC', 'F', '121500', '140500'),
(125, 'SOEN331', 'SOEN331-W', 'WD', 'F', '141500', '160500'),
(126, 'SOEN331', 'SOEN331-W', 'WE', 'F', '121500', '140500'),
(127, 'SOEN331', 'SOEN331-W', 'WF', 'F', '141500', '160500'),
(128, 'SOEN331', 'SOEN331-W', 'WG', 'F', '141500', '160500'),
(129, 'SOEN341', 'SOEN341-S', 'SA', 'F', '121500', '130500'),
(130, 'SOEN341', 'SOEN341-S', 'SB', 'F', '131500', '140500'),
(131, 'SOEN341', 'SOEN341-S', 'SC', 'F', '121500', '130500'),
(132, 'SOEN341', 'SOEN341-U', 'UA', 'F', '121500', '130500'),
(133, 'SOEN341', 'SOEN341-U', 'UB', 'F', '131500', '140500'),
(134, 'SOEN341', 'SOEN341-U', 'UC', 'F', '131500', '140500'),
(135, 'COMP335', 'COMP335-N', 'NA', 'T', '131500', '140500'),
(136, 'COMP335', 'COMP335-N', 'NB', 'J', '131500', '140500'),
(137, 'COMP335', 'COMP335-N', 'NC', 'T', '131500', '140500'),
(138, 'ENGR391', 'ENGR391-UU', 'UA', 'J', '203000', '212000'),
(139, 'ENGR391', 'ENGR391-UU', 'UB', 'J', '203000', '212000'),
(140, 'ENGR391', 'ENGR391-UU', 'UC', 'J', '203000', '212000'),
(141, 'ENGR391', 'ENGR391-V', 'VA', 'F', '114500', '123500'),
(142, 'ENGR391', 'ENGR391-V', 'VB', 'F', '131500', '140500'),
(143, 'ENGR391', 'ENGR391-V', 'VC', 'F', '114500', '123500'),
(144, 'ENGR391', 'ENGR391-X', 'XA', 'F', '131500', '140500'),
(145, 'ENGR391', 'ENGR391-X', 'XB', 'F', '151500', '160500'),
(146, 'ENGR391', 'ENGR391-X', 'XD', 'F', '163000', '172000'),
(147, 'SOEN344', 'SOEN344-S', 'SA', 'J', '144500', '153500'),
(148, 'SOEN344', 'SOEN344-S', 'SB', 'J', '144500', '153500'),
(149, 'SOEN344', 'SOEN344-S', 'SC', 'J', '144500', '153500'),
(150, 'SOEN344', 'SOEN344-S', 'SD', 'J', '144500', '153500'),
(151, 'SOEN345', 'SOEN345-S', 'SA', 'W', '161500', '170500'),
(152, 'SOEN345', 'SOEN345-S', 'SB', 'W', '174500', '183500'),
(153, 'SOEN345', 'SOEN345-S', 'SC', 'F', '084500', '093500'),
(154, 'SOEN357', 'SOEN357-S', 'SA', 'F', '114500', '123500'),
(155, 'SOEN357', 'SOEN357-S', 'SB', 'W', '114500', '123500'),
(156, 'SOEN357', 'SOEN357-S', 'SC', 'F', '114500', '123500'),
(157, 'SOEN357', 'SOEN357-S', 'SD', 'W', '114500', '123500'),
(158, 'SOEN390', 'SOEN390-S', 'SA', 'M', '181500', '190500'),
(159, 'SOEN390', 'SOEN390-S', 'SB', 'M', '181500', '190500'),
(160, 'SOEN390', 'SOEN390-S', 'SC', 'M', '191500', '200500'),
(161, 'SOEN390', 'SOEN390-S', 'SD', 'M', '191500', '200500'),
(162, 'SOEN390', 'SOEN390-S', 'SE', 'M', '181500', '190500'),
(163, 'SOEN390', 'SOEN390-S', 'SF', 'M', '191500', '200500'),
(164, 'ENGR301', 'ENGR301-SS', 'SA', 'J', '174500', '183500'),
(165, 'ENGR301', 'ENGR301-SS', 'SB', 'J', '174500', '183500'),
(166, 'ENGR301', 'ENGR301-SS', 'SC', 'T', '184500', '193500'),
(167, 'ENGR301', 'ENGR301-SS', 'SD', 'T', '184500', '193500'),
(168, 'ENGR301', 'ENGR301-R', 'RA', 'T', '174500', '183500'),
(169, 'ENGR301', 'ENGR301-R', 'RB', 'T', '174500', '183500'),
(170, 'ENGR301', 'ENGR301-R', 'RC', 'J', '184500', '193500'),
(171, 'ENGR301', 'ENGR301-R', 'RD', 'J', '184500', '193500'),
(172, 'SOEN321', 'SOEN321-U', 'UA', 'W', '114500', '123500'),
(173, 'SOEN321', 'SOEN321-U', 'UB', 'W', '114500', '123500'),
(174, 'SOEN321', 'SOEN321-U', 'UC', 'W', '114500', '123500'),
(175, 'SOEN385', 'SOEN385-S', 'SA', 'T', '104500', '113500'),
(176, 'SOEN385', 'SOEN385-S', 'SB', 'J', '104500', '113500'),
(177, 'SOEN385', 'SOEN385-S', 'SC', 'M', '104500', '113500'),
(178, 'SOEN385', 'SOEN385-S', 'SD', 'W', '104500', '113500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursesmain`
--
ALTER TABLE `coursesmain`
  ADD PRIMARY KEY (`CourseName`);

--
-- Indexes for table `flab`
--
ALTER TABLE `flab`
  ADD PRIMARY KEY (`LabID`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `flec`
--
ALTER TABLE `flec`
  ADD PRIMARY KEY (`LecInfo`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `ftut`
--
ALTER TABLE `ftut`
  ADD PRIMARY KEY (`TutID`),
  ADD KEY `CourseName` (`CourseName`),
  ADD KEY `LecInfo` (`LecInfo`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`PassedCourseId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `slab`
--
ALTER TABLE `slab`
  ADD PRIMARY KEY (`LabID`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `slec`
--
ALTER TABLE `slec`
  ADD PRIMARY KEY (`LecInfo`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `stut`
--
ALTER TABLE `stut`
  ADD PRIMARY KEY (`TutID`),
  ADD KEY `CourseName` (`CourseName`),
  ADD KEY `LecInfo` (`LecInfo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `wlab`
--
ALTER TABLE `wlab`
  ADD PRIMARY KEY (`LabID`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `wlec`
--
ALTER TABLE `wlec`
  ADD PRIMARY KEY (`LecInfo`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `wtut`
--
ALTER TABLE `wtut`
  ADD PRIMARY KEY (`TutID`),
  ADD KEY `CourseName` (`CourseName`),
  ADD KEY `LecInfo` (`LecInfo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flab`
--
ALTER TABLE `flab`
  MODIFY `LabID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ftut`
--
ALTER TABLE `ftut`
  MODIFY `TutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `PassedCourseId` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT for table `slab`
--
ALTER TABLE `slab`
  MODIFY `LabID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stut`
--
ALTER TABLE `stut`
  MODIFY `TutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `wlab`
--
ALTER TABLE `wlab`
  MODIFY `LabID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `wtut`
--
ALTER TABLE `wtut`
  MODIFY `TutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flab`
--
ALTER TABLE `flab`
  ADD CONSTRAINT `flab_ibfk_1` FOREIGN KEY (`CourseName`) REFERENCES `coursesmain` (`CourseName`);

--
-- Constraints for table `flec`
--
ALTER TABLE `flec`
  ADD CONSTRAINT `flec_ibfk_1` FOREIGN KEY (`CourseName`) REFERENCES `coursesmain` (`CourseName`);

--
-- Constraints for table `pass`
--
ALTER TABLE `pass`
  ADD CONSTRAINT `pass_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `pass_ibfk_2` FOREIGN KEY (`CourseName`) REFERENCES `coursesmain` (`CourseName`);

--
-- Constraints for table `slab`
--
ALTER TABLE `slab`
  ADD CONSTRAINT `slab_ibfk_1` FOREIGN KEY (`CourseName`) REFERENCES `coursesmain` (`CourseName`);

--
-- Constraints for table `wlab`
--
ALTER TABLE `wlab`
  ADD CONSTRAINT `wlab_ibfk_1` FOREIGN KEY (`CourseName`) REFERENCES `coursesmain` (`CourseName`);

--
-- Constraints for table `wlec`
--
ALTER TABLE `wlec`
  ADD CONSTRAINT `wlec_ibfk_1` FOREIGN KEY (`CourseName`) REFERENCES `coursesmain` (`CourseName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
