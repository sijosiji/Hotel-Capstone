-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 11:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstones`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `AgencyId` int(11) NOT NULL,
  `AgncyAddress` varchar(50) DEFAULT NULL,
  `AgncyCity` varchar(50) DEFAULT NULL,
  `AgncyProv` varchar(50) DEFAULT NULL,
  `AgncyPostal` varchar(50) DEFAULT NULL,
  `AgncyCountry` varchar(50) DEFAULT NULL,
  `AgncyPhone` varchar(50) DEFAULT NULL,
  `AgncyFax` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`AgencyId`, `AgncyAddress`, `AgncyCity`, `AgncyProv`, `AgncyPostal`, `AgncyCountry`, `AgncyPhone`, `AgncyFax`) VALUES
(1, '1155 8th Ave SW', 'Calgary', 'AB', 'T2P1N3', 'Canada', '1234567890', '1234567891'),
(2, '110 Main Street', 'Edmonton', 'AB', 'T7R3J5', 'Canada', '9876543210', '9876543211');

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `CustFirstName` varchar(25) NOT NULL,
  `CustLastName` varchar(25) NOT NULL,
  `CustAddress` varchar(75) NOT NULL,
  `CustCity` varchar(50) NOT NULL,
  `CustProv` varchar(2) NOT NULL,
  `CustPostal` varchar(7) NOT NULL,
  `CustCountry` varchar(25) DEFAULT NULL,
  `CustHomePhone` varchar(20) DEFAULT NULL,
  `CustBusPhone` varchar(20) NOT NULL,
  `CustEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`Username`, `Password`, `CustomerId`, `CustFirstName`, `CustLastName`, `CustAddress`, `CustCity`, `CustProv`, `CustPostal`, `CustCountry`, `CustHomePhone`, `CustBusPhone`, `CustEmail`) VALUES
('sijosiji', 'sijosiji', 104, 'Sijo', 'Jacob', '144-61 87th Ave, NE', 'Edmonton', 'AB', 'T2J 6B6', 'Canada', '9875432190', '4032557865', '                                                  '),
('warren', 'warren', 142, 'Warren', 'Warren', '257 Depot Rd., NE', 'Calgary', 'AB', 'T2J 6P3', 'Canada', '4032255629', '4032844566', 'mwaldman@aol.com                                  ');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `PackageId` int(11) NOT NULL,
  `PkgName` varchar(50) NOT NULL,
  `PkgStartDate` datetime DEFAULT NULL,
  `PkgEndDate` datetime DEFAULT NULL,
  `PkgDesc` varchar(50) DEFAULT NULL,
  `PkgBasePrice` decimal(19,4) NOT NULL,
  `PkgAgencyCommission` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PackageId`, `PkgName`, `PkgStartDate`, `PkgEndDate`, `PkgDesc`, `PkgBasePrice`, `PkgAgencyCommission`) VALUES
(1, 'Maldives New Year', '2020-10-25 00:00:00', '2020-12-04 00:00:00', 'Cruise the Maldives & Celebrate the New Year.', '4800.0000', '400.0000'),
(2, 'Thailand Paradise', '2020-12-12 00:00:00', '2021-02-20 00:00:00', '8 Day All Inclusive Thailand Vacation', '3000.0000', '310.0000'),
(3, 'Dubai Festival Vacation', '2021-11-01 00:00:00', '2021-11-14 00:00:00', 'Dubai Tour with Metro Pass', '3000.0000', '280.0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`AgencyId`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`PackageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `AgencyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
