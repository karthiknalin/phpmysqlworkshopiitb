-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2020 at 01:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdminLogin`
--

CREATE TABLE `AdminLogin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `PassHash` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `AdminLogin`
--

INSERT INTO `AdminLogin` (`ID`, `Username`, `PassHash`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `StudentLogin`
--

CREATE TABLE `StudentLogin` (
  `ID` int(11) NOT NULL,
  `_Name` varchar(40) NOT NULL,
  `Roll_Number` varchar(10) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `Password_` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentLogin`
--

INSERT INTO `StudentLogin` (`ID`, `_Name`, `Roll_Number`, `Username`, `EmailID`, `Password_`) VALUES
(1, 'James', 'A001', 'jameson@123', 'jameson123@email.com', '5e9d11a14ad1c8dd77e98ef9b53fd1ba');

-- --------------------------------------------------------

--
-- Table structure for table `StudentRecord`
--

CREATE TABLE `StudentRecord` (
  `ID` int(11) NOT NULL,
  `Name_` varchar(40) NOT NULL,
  `Roll_Number` varchar(20) DEFAULT NULL,
  `PHP` int(11) NOT NULL,
  `MySQL` int(11) NOT NULL,
  `HTML` int(11) NOT NULL,
  `TotalMarks` int(11) NOT NULL,
  `Aggregate_Percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentRecord`
--

INSERT INTO `StudentRecord` (`ID`, `Name_`, `Roll_Number`, `PHP`, `MySQL`, `HTML`, `TotalMarks`, `Aggregate_Percentage`) VALUES
(1, 'James', 'A001', 78, 87, 90, 255, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdminLogin`
--
ALTER TABLE `AdminLogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `StudentLogin`
--
ALTER TABLE `StudentLogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `StudentRecord`
--
ALTER TABLE `StudentRecord`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AdminLogin`
--
ALTER TABLE `AdminLogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `StudentLogin`
--
ALTER TABLE `StudentLogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `StudentRecord`
--
ALTER TABLE `StudentRecord`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
