-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2019 at 11:22 AM
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
-- Database: `GoldenArrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `playerPayment`
--

CREATE TABLE `playerPayment` (
  `paymentId` bigint(20) NOT NULL,
  `playerId` bigint(20) NOT NULL,
  `ammount` decimal(10,0) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentType` varchar(6) NOT NULL DEFAULT 'CASH'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerPayment`
--

INSERT INTO `playerPayment` (`paymentId`, `playerId`, `ammount`, `paymentDate`, `paymentType`) VALUES
(1, 1, '2000', '2019-06-12', 'CASH'),
(2, 1, '700', '2019-06-03', 'CASH'),
(5, 1, '4567890', '2019-06-11', 'CASH'),
(6, 2, '2424', '2019-06-30', 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` bigint(20) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userRole` varchar(6) NOT NULL,
  `accountStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='userTable';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `userRole`, `accountStatus`) VALUES
(1, 'sabthar', '1234567', 'player', 1),
(2, 'punsara', '1234567', 'player', 1),
(3, 'piyumal', '1234', 'player', 1),
(4, 'tharushi', '45678', 'player', 1),
(5, 'anjula', '67890', 'player', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playerPayment`
--
ALTER TABLE `playerPayment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playerPayment`
--
ALTER TABLE `playerPayment`
  MODIFY `paymentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
