-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 07:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(100) NOT NULL,
  `COMP232` int(11) NOT NULL,
  `COMP248` int(11) NOT NULL,
  `ENGR201` int(11) NOT NULL,
  `ENGR213` int(11) NOT NULL,
  `COMP249` int(11) NOT NULL,
  `ENGR233` int(11) NOT NULL,
  `SOEN228` int(11) NOT NULL,
  `SOEN287` int(11) NOT NULL,
  `COMP348` int(11) NOT NULL,
  `COMP352` int(11) NOT NULL,
  `ENCS282` int(11) NOT NULL,
  `ENGR202` int(11) NOT NULL,
  `COMP346` int(11) NOT NULL,
  `ELEC275` int(11) NOT NULL,
  `ENGR371` int(11) NOT NULL,
  `SOEN331` int(11) NOT NULL,
  `SOEN341` int(11) NOT NULL,
  `COMP335` int(11) NOT NULL,
  `ENGR391` int(11) NOT NULL,
  `SOEN342` int(11) NOT NULL,
  `SOEN343` int(11) NOT NULL,
  `SOEN384` int(11) NOT NULL,
  `SOEN344` int(11) NOT NULL,
  `SOEN345` int(11) NOT NULL,
  `SOEN357` int(11) NOT NULL,
  `SOEN390` int(11) NOT NULL,
  `ENGR301` int(11) NOT NULL,
  `SOEN321` int(11) NOT NULL,
  `SOEN490_1` int(11) NOT NULL,
  `SOEN490_2` int(11) NOT NULL,
  `ENGR392` int(11) NOT NULL,
  `SOEN385` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `COMP232`, `COMP248`, `ENGR201`, `ENGR213`, `COMP249`, `ENGR233`, `SOEN228`, `SOEN287`, `COMP348`, `COMP352`, `ENCS282`, `ENGR202`, `COMP346`, `ELEC275`, `ENGR371`, `SOEN331`, `SOEN341`, `COMP335`, `ENGR391`, `SOEN342`, `SOEN343`, `SOEN384`, `SOEN344`, `SOEN345`, `SOEN357`, `SOEN390`, `ENGR301`, `SOEN321`, `SOEN490_1`, `SOEN490_2`, `ENGR392`, `SOEN385`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `courseid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `email`, `courseid`) VALUES
(1, 'minhao', '43434TTT', 'sdhjh@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `courseid` (`courseid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
