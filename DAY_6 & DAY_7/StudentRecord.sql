-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2020 at 02:05 PM
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
-- Indexes for table `StudentRecord`
--
ALTER TABLE `StudentRecord`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `StudentRecord`
--
ALTER TABLE `StudentRecord`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
