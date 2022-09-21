-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 08:06 AM
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
-- Database: `buss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(5, 'Ashfaq', 'xyz'),
(6, 'ghj', '852963'),
(7, 'Ashfaq', 'asdc');

-- --------------------------------------------------------

--
-- Table structure for table `buss`
--

CREATE TABLE `buss` (
  `name` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buss`
--

INSERT INTO `buss` (`name`, `id`, `type`, `capacity`) VALUES
('Ksrtc', 1, 'no', 22),
('Hdjbsbsh', 2, 'non govt', 52),
('xyz', 3, 'abc', 22),
('hi', 4, 'abc', 66);

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_num` bigint(20) DEFAULT NULL,
  `c_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`c_id`, `c_name`, `c_num`, `c_age`) VALUES
(1, 'abc', 9740051741, 33);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `did` int(11) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `dnum` bigint(20) DEFAULT NULL,
  `dage` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `dname`, `dnum`, `dage`) VALUES
(1, 'abc', 1234567890, 32),
(2, 'abc', 1234567890, 32),
(3, 'abc', 1234567890, 32),
(4, 'abc', 1234567890, 22),
(5, 'abc', 1234567890, 22),
(6, 'nill', 1234567890, 55);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `rid` int(11) NOT NULL,
  `src` varchar(30) NOT NULL,
  `dest` varchar(30) NOT NULL,
  `bid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`rid`, `src`, `dest`, `bid`, `cid`, `did`) VALUES
(1, 'bengluru', 'mudhol', 851, 22, 22),
(2, 'bengluru', 'jkd', 1, 1, 1),
(3, 'jkd', 'mudhol', 2, 1, 4),
(4, 'jkd', 'bjp', 3, 1, 5),
(5, 'bgm1', 'jkd', 4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `tno` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `rid` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`tno`, `uid`, `date`, `rid`) VALUES
(1, 1, '2022-01-02', 1),
(2, 1, '2022-01-26', 1),
(3, 1, '2022-01-26', 1),
(4, 1, '2022-01-12', 1),
(5, 3, '2022-01-13', 2),
(6, 3, '2022-01-06', 1),
(7, 3, '2022-01-09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uname` varchar(30) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `unum` bigint(20) DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `ugen` char(1) DEFAULT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `uid`, `unum`, `mail`, `ugen`, `pass`) VALUES
('Ashfaq', 1, 7894561230, 'ashfaqsasalatti123@g', 'm', '0'),
('Ashfaq', 2, 7975101583, 'ashfaqsasalatti123@g', 'm', '0'),
('Ashfaq', 3, 797510153, 'ashfaqsasalatti123@g', 'm', '123456'),
('ashfaq', 5, 7975101583, 'ashfaqsasalatti123@g', 'm', '789456'),
('ghj', 6, 7894561230, 'ashfaqsasalatti123@g', 'm', '852963'),
('Ashfaq', 7, 797510150, 'ashfaqsasalatti123@g', 'm', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buss`
--
ALTER TABLE `buss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`tno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buss`
--
ALTER TABLE `buss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6327;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `tno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
