-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2019 at 06:13 PM
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
(18, 4, '890', '2019-06-01', 'CASH'),
(21, 3, '1000', '2019-06-09', 'CASH'),
(37, 2, '990', '2019-07-26', 'CASH'),
(38, 3, '9', '2019-07-07', 'CASH');

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
(4, '2019-07-02', 3, 'Speed Dribbling', 'Timed Through Pass', 'Long Shot Practice', 'Defending Scenarios', 'Pinpoint Crossing', '1-on-1 Against Striker');

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
(0, 20, 10, 10, 20, 15, 25, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `trainerSalary`
--

CREATE TABLE `trainerSalary` (
  `salaryId` bigint(20) NOT NULL,
  `trainerId` bigint(20) NOT NULL,
  `ammount` decimal(10,0) NOT NULL,
  `paymentType` varchar(4) NOT NULL,
  `paymentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainerSalary`
--

INSERT INTO `trainerSalary` (`salaryId`, `trainerId`, `ammount`, `paymentType`, `paymentDate`) VALUES
(2, 5, '780', 'CASH', '0000-00-00'),
(4, 1, '30000', 'BANK', '2019-06-07'),
(6, 13, '800000', 'CASH', '2019-07-28'),
(7, 13, '890', 'CASH', '2019-07-11'),
(8, 13, '780', 'CASH', '2019-07-25'),
(9, 13, '789', 'CASH', '2019-07-25'),
(12, 31, '9799', 'CASH', '2019-07-12'),
(14, 6, '9896', 'CASH', '2019-07-13'),
(15, 7, '907', 'CASH', '2019-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` bigint(20) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userRole` varchar(10) NOT NULL,
  `accountStatus` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(30) NOT NULL,
  `hometown` varchar(30) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='userTable';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `userRole`, `accountStatus`, `name`, `hometown`, `age`) VALUES
(1, 'sabthar', '1234567', 'player', 1, '', '', 0),
(2, 'punsara', '1234567', 'player', 0, '', '', 0),
(3, 'piyumal', '1234', 'player', 1, '', '', 0),
(4, 'tharushi', '45678', 'player', 1, '', '', 0),
(5, 'anjula', '67890', 'player', 1, '', '', 0),
(6, 'krr-0', 'kddp2', 'trainer', 1, 'KRR', 'Waththala', 23),
(7, 'krr-0', 'werpoo', 'trainer', 1, 'KRR', 'waththala', 23),
(8, 'krr-0', 'wwknr', 'plater', 1, 'powr', 'nagoda', 23),
(9, 'krr-0', 'q123', 'player', 1, 'KRR', 'ganegoda', 23),
(10, 'sandun00', 'sandun1233', 'player', 1, 'Sandun', 'kandy', 23),
(11, 'sandun00', 'asdlkkj', 'trainer', 1, 'Sandun', 'kandy', 23),
(12, 'sandun00', 'sdflkj', 'player', 1, 'Sandun', 'kandy', 23),
(13, 'kasun-p', 'dkdkdj', 'trainer', 1, 'Kasun', 'qq', 23),
(14, 'fine.lk', 'qqppaall', 'trainer', 1, 'fine', 'kandy', 90),
(15, 'krr-0', 'krr--p', 'player', 1, 'KRR', 'Jaffna', 23),
(16, 'krr-0', 'krr--p', 'player', 1, 'KRR', 'Jaffna', 23),
(17, 'krr-0', 'krr--p', 'player', 1, 'KRR', 'Jaffna', 23),
(18, 'krr-0', 'krr--p', 'player', 1, 'KRR', 'Jaffna', 23),
(19, 'krr-0', 'krr--p', 'trainer', 1, 'KRR', 'Jaffna', 23),
(20, 'krr-0', 'krr--p', 'player', 1, 'KRR', 'Jaffna', 23),
(21, 'punsara', '44456', 'player', 1, 'Punsara', 'colombo', 23),
(22, 'PPPPPP', 'eewr', 'trainer', 1, 'GGG', 'jjj', 23),
(23, 'ABCD', 'uur v', 'player', 1, 'ABCD', 'ABCD', 23),
(24, 'PQRS', 'oowwkkss', 'player', 1, 'PQRS', 'kkk', 23),
(25, 'PQRS', 'oowwkkss', 'player', 1, 'PQRS', 'kkk', 23),
(26, 'sabthar', 'wlkflk', 'jsdn', 1, 'sabthar', 'kdsk', 23),
(27, 'muthumala', 'kdsksjd', 'lklkj', 1, 'muthumala', 'djsk', 23),
(28, 'ooooookkkkkkk', 'okokpoko', 'okok', 1, 'aqaqo', 'okokqoqop', 0),
(29, 'XXXXXXX', '7987', '789', 1, 'xxxxxx', '789', 78),
(30, 'XOXOXOXOXOXOXOXOX', '56546', '566', 1, 'xoxooxxox', '454', 45),
(31, 'bimal123', 'aabbcc', 'trainer', 1, 'Bimal', 'moratuwa', 23),
(32, 'tharu', '1234567', 'accountant', 1, 'tharu', 'kasdjf;lk', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playerPayment`
--
ALTER TABLE `playerPayment`
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
-- Indexes for table `trainerSalary`
--
ALTER TABLE `trainerSalary`
  ADD PRIMARY KEY (`salaryId`);

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
  MODIFY `paymentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `practice_sessions`
--
ALTER TABLE `practice_sessions`
  MODIFY `ps_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `t_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainerSalary`
--
ALTER TABLE `trainerSalary`
  MODIFY `salaryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
