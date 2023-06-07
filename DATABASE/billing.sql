-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 12:09 PM
-- Server version: 5.5.40
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billing`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`'root'`@`'localhost'` PROCEDURE `proc1`(IN `name` VARCHAR(50), OUT `pass` VARCHAR(60))
    SQL SECURITY INVOKER
begin
  set pass = (select user.password from user where username = name);
              
 end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
`id` int(10) NOT NULL,
  `owners_id` int(10) NOT NULL,
  `prev` varchar(20) NOT NULL,
  `pres` varchar(20) NOT NULL,
  `price` int(20) NOT NULL DEFAULT '10',
  `date` varchar(20) NOT NULL,
  `Total` int(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `owners_id`, `prev`, `pres`, `price`, `date`, `Total`) VALUES
(69, 23, '10', '15', 10, '19/12/02 12:Europe/B', 150),
(68, 23, '12', '10', 10, '19/12/02 11:Europe/B', 100),
(67, 24, '9', '6', 10, '19/12/02 11:Europe/B', 60),
(66, 24, '10', '9', 10, '19/12/02 11:Europe/B', 90),
(65, 24, '8', '10', 10, '19/12/02 11:Europe/B', 100),
(64, 25, '3', '4', 10, '19/12/02 11:Europe/B', 40),
(63, 25, '5', '3', 10, '19/12/02 11:Europe/B', 30),
(62, 26, '6', '4', 10, '19/12/02 11:Europe/B', 40),
(61, 26, '2', '6', 10, '19/12/02 11:Europe/B', 60),
(60, 27, '5', '6', 10, '19/12/02 11:Europe/B', 60),
(59, 27, '1', '5', 10, '19/12/02 11:Europe/B', 50),
(58, 28, '11', '5', 10, '19/12/02 11:Europe/B', 50),
(55, 28, '4', '5', 10, '19/12/02 10:Europe/B', 50),
(56, 24, '7', '8', 10, '19/12/02 10:Europe/B', 80),
(57, 28, '5', '11', 10, '19/12/02 10:Europe/B', 110),
(70, 22, '6', '7', 10, '19/12/02 12:Europe/B', 70),
(71, 22, '7', '8', 10, '19/12/02 12:Europe/B', 80),
(72, 22, '8', '6', 10, '19/12/02 12:Europe/B', 60),
(73, 19, '6', '11', 10, '19/12/02 12:Europe/B', 110),
(74, 19, '11', '6', 10, '19/12/02 12:Europe/B', 60),
(75, 19, '6', '9', 10, '19/12/02 12:Europe/B', 90),
(76, 20, '4', '20', 10, '19/12/02 12:Europe/B', 200),
(77, 20, '20', '18', 10, '19/12/02 12:Europe/B', 180),
(78, 20, '18', '15', 10, '19/12/02 12:Europe/B', 150);

--
-- Triggers `bill`
--
DELIMITER //
CREATE TRIGGER `trigger1` BEFORE INSERT ON `bill`
 FOR EACH ROW begin
declare pre,tot int;

set @pre = new.pres;
set @tot = (@pre * 10);

set new.Total = @tot;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
`id` int(10) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `lname`, `fname`, `address`, `contact`) VALUES
(28, 'Pun', 'Bishal', 'Saptagiri', '7349585246'),
(27, 'Sahani', 'Sanjay', 'Bangalore', '6985742130'),
(26, 'Thapa', 'Bibek', 'Kolkata', '6571596284'),
(25, 'Nayak', 'Rakesh', 'New Delhi', '7894561230'),
(24, 'Kumar', 'Sajan', 'Patna', '9980146870'),
(23, 'Shah', 'Birendra', 'Mysore', '8974556838'),
(22, 'Shah', 'Roshan', 'Bangalore', '8473623210'),
(19, 'Kc', 'Anmol', 'Mumbai', '9513576842'),
(20, 'Kamat', 'Kuldip', 'Bangalore', '8956200314');

-- --------------------------------------------------------

--
-- Table structure for table `tempo_bill`
--

CREATE TABLE IF NOT EXISTS `tempo_bill` (
`id` int(11) NOT NULL,
  `Prev` varchar(40) NOT NULL,
  `Client` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempo_bill`
--

INSERT INTO `tempo_bill` (`id`, `Prev`, `Client`) VALUES
(18, '6', 'Susan'),
(19, '9', 'Anmol'),
(20, '15', 'Kuldip'),
(21, '0', 'Kuldip'),
(22, '6', 'Roshan'),
(23, '15', 'Birendra'),
(24, '6', 'Sajan'),
(25, '4', 'Rakesh'),
(26, '4', 'Bibek'),
(27, '6', 'Sanjay'),
(28, '5', 'Bishal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(19, 'abishek', '12345', 'Abishek'),
(18, 'admin', 'admin', 'Administrator'),
(15, 'bishal', '12345', 'Bishal');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE IF NOT EXISTS `user_levels` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userlevel` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
