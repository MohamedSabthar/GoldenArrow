-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 06:58 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldenarrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `playerpayment`
--

CREATE TABLE `playerpayment` (
  `paymentId` bigint(20) NOT NULL,
  `playerId` bigint(20) NOT NULL,
  `ammount` decimal(10,0) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentType` varchar(6) NOT NULL DEFAULT 'CASH'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerpayment`
--

INSERT INTO `playerpayment` (`paymentId`, `playerId`, `ammount`, `paymentDate`, `paymentType`) VALUES
(1, 1, '2000', '2019-06-12', 'CASH'),
(2, 1, '700', '2019-06-03', 'CASH'),
(5, 1, '4567890', '2019-06-11', 'CASH'),
(6, 2, '2424', '2019-06-30', 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `practice_sessions`
--

CREATE TABLE `practice_sessions` (
  `ps_id` int(15) NOT NULL,
  `date` date NOT NULL,
  `duration` int(15) NOT NULL,
  `dribbling` varchar(50) NOT NULL,
  `passing` varchar(50) NOT NULL,
  `shooting` varchar(50) NOT NULL,
  `defending` varchar(50) NOT NULL,
  `set_pieces` varchar(50) NOT NULL,
  `goal_keeper` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice_sessions`
--

INSERT INTO `practice_sessions` (`ps_id`, `date`, `duration`, `dribbling`, `passing`, `shooting`, `defending`, `set_pieces`, `goal_keeper`) VALUES
(2, '2019-06-17', 3, 'Precision Dribbling', 'Timed Through Pass', 'First Touch Volley', 'Tackle Practice', 'Precision Penalty', '1-on-1 Against Striker'),
(4, '2019-06-21', 4, 'Speed Dribbling', '1-2 Passing', 'Speed Shooting', 'seleTackle Practicect', 'Direct Free Kick', 'Keeper Throws');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `t_id` int(15) NOT NULL,
  `att_goals` int(15) NOT NULL,
  `att_assists` int(15) NOT NULL,
  `mid_assists` int(15) NOT NULL,
  `mid_chances` int(15) NOT NULL,
  `def_balls_won` int(15) NOT NULL,
  `def_tackles` int(15) NOT NULL,
  `clean_sheets` int(15) NOT NULL,
  `saves` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`t_id`, `att_goals`, `att_assists`, `mid_assists`, `mid_chances`, `def_balls_won`, `def_tackles`, `clean_sheets`, `saves`) VALUES
(0, 15, 9, 10, 20, 15, 25, 5, 9);

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
-- Indexes for table `playerpayment`
--
ALTER TABLE `playerpayment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `practice_sessions`
--
ALTER TABLE `practice_sessions`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playerpayment`
--
ALTER TABLE `playerpayment`
  MODIFY `paymentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `practice_sessions`
--
ALTER TABLE `practice_sessions`
  MODIFY `ps_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `t_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
