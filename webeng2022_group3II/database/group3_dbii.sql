-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 02:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group3_dbii`
--

-- --------------------------------------------------------

--
-- Table structure for table `adlogin`
--

CREATE TABLE `adlogin` (
  `adLoginID` int(11) NOT NULL,
  `adEmail` varchar(80) NOT NULL,
  `adPassword` varchar(50) NOT NULL,
  `adID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adlogin`
--

INSERT INTO `adlogin` (`adLoginID`, `adEmail`, `adPassword`, `adID`) VALUES
(1, 'adminadmin@gmail.com', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'ad001');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adID` varchar(10) NOT NULL,
  `adName` varchar(80) NOT NULL,
  `adPhoneNo` varchar(80) NOT NULL,
  `adGender` varchar(20) NOT NULL,
  `adIC` varchar(12) NOT NULL,
  `adPosition` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adID`, `adName`, `adPhoneNo`, `adGender`, `adIC`, `adPosition`) VALUES
('ad001', 'Admin One', '0111234123', '1', '990508124124', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studMatricNo` varchar(10) NOT NULL,
  `studName` varchar(200) NOT NULL,
  `studIC` varchar(12) NOT NULL,
  `studGender` varchar(20) NOT NULL,
  `studPhoneNo` varchar(80) NOT NULL,
  `studRegisterSession` varchar(20) NOT NULL,
  `studProgramme` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studMatricNo`, `studName`, `studIC`, `studGender`, `studPhoneNo`, `studRegisterSession`, `studProgramme`) VALUES
('BI2000000', 'XYZ', '011130120777', '1', '01126696255', '1-2020/2021', '3'),
('BI20110000', 'Zero Zero', '011130120404', '1', '0110000000', '1-2020/2021', '1'),
('BI20110193', 'Stefanie Ng', '011130120000', '2', '01126696268', '1-2020/2022', '1');

-- --------------------------------------------------------

--
-- Table structure for table `studlogin`
--

CREATE TABLE `studlogin` (
  `studLoginID` int(11) NOT NULL,
  `studEmail` varchar(80) NOT NULL,
  `studPassword` varchar(50) NOT NULL,
  `studMatricNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studlogin`
--

INSERT INTO `studlogin` (`studLoginID`, `studEmail`, `studPassword`, `studMatricNo`) VALUES
(1, 'stefanie_ng_bi20@iluv.ums.edu.my', 'f90ecb2cdd602cfe77ff30f39182a9fbebbd61b4', 'BI20110193'),
(2, 'YequalMXplusC@gmail.com', 'd9a83615250dde07c8204e17c01783c7e096d6b7', 'BI2000000'),
(3, 'zerozero@error.com', '70f7e347000d9f8a614d4f826da5715b6bdbc40c', 'BI20110000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adlogin`
--
ALTER TABLE `adlogin`
  ADD PRIMARY KEY (`adLoginID`),
  ADD KEY `studID` (`adID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studMatricNo`);

--
-- Indexes for table `studlogin`
--
ALTER TABLE `studlogin`
  ADD PRIMARY KEY (`studLoginID`),
  ADD KEY `studMatricNo` (`studMatricNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adlogin`
--
ALTER TABLE `adlogin`
  MODIFY `adLoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studlogin`
--
ALTER TABLE `studlogin`
  MODIFY `studLoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adlogin`
--
ALTER TABLE `adlogin`
  ADD CONSTRAINT `adlogin_ibfk_1` FOREIGN KEY (`adID`) REFERENCES `admins` (`adID`);

--
-- Constraints for table `studlogin`
--
ALTER TABLE `studlogin`
  ADD CONSTRAINT `studlogin_ibfk_1` FOREIGN KEY (`studMatricNo`) REFERENCES `students` (`studMatricNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
