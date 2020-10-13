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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `StudentLogin`
--
ALTER TABLE `StudentLogin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `StudentLogin`
--
ALTER TABLE `StudentLogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
