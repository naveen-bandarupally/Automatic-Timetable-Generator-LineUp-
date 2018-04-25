-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 04:03 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lineup`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `mid` int(11) NOT NULL,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `stime` time NOT NULL,
  `sdate` date NOT NULL,
  `msg` text NOT NULL,
  `status` int(11) NOT NULL,
  `isload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `cno` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counttable`
--

CREATE TABLE `counttable` (
  `sid` varchar(11) DEFAULT NULL,
  `section` varchar(11) DEFAULT NULL,
  `lhc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counttable`
--

INSERT INTO `counttable` (`sid`, `section`, `lhc`) VALUES
('16CS205', '2a', 0),
('16CS205', '2b', 0),
('16CS205', '2c', 0),
('16CS205', '2d', 0),
('16CS205', '2e', 0),
('16CS205', '2f', 0),
('16CS205', '2g', 0),
('elc102', '2a', 2),
('elc102', '2b', 2),
('elc102', '2c', 2),
('elc102', '2d', 2),
('elc102', '2e', 2),
('elc102', '2f', 2),
('elc102', '2g', 2),
('elc101', '2a', 0),
('elc101', '2b', 0),
('elc101', '2c', 0),
('elc101', '2d', 0),
('elc101', '2e', 0),
('elc101', '2f', 0),
('elc101', '2g', 0),
('elc102L', '2a', 2),
('elc102L', '2b', 2),
('elc102L', '2c', 2),
('elc102L', '2d', 2),
('elc102L', '2e', 2),
('elc102L', '2f', 2),
('elc102L', '2g', 2),
('MS101', '2a', 4),
('MS101', '2b', 4),
('MS101', '2c', 4),
('MS101', '2d', 4),
('MS101', '2e', 4),
('MS101', '2f', 4),
('MS101', '2g', 4),
('16EL103', '2a', 2),
('16EL103', '2b', 2),
('16EL103', '2c', 2),
('16EL103', '2d', 2),
('16EL103', '2e', 2),
('16EL103', '2f', 2),
('16EL103', '2g', 2),
('16CS208L', '2a', 0),
('16CS208L', '2b', 0),
('16CS208L', '2c', 0),
('16CS208L', '2d', 0),
('16CS208L', '2e', 0),
('16CS208L', '2f', 0),
('16CS208L', '2g', 0),
('16CS208', '2a', 0),
('16CS208', '2b', 0),
('16CS208', '2c', 0),
('16CS208', '2d', 0),
('16CS208', '2e', 0),
('16CS208', '2f', 0),
('16CS208', '2g', 0),
('16CS206L', '2a', 0),
('16CS206L', '2b', 0),
('16CS206L', '2c', 0),
('16CS206L', '2d', 0),
('16CS206L', '2e', 0),
('16CS206L', '2f', 0),
('16CS206L', '2g', 0),
('16CS206', '2a', 0),
('16CS206', '2b', 0),
('16CS206', '2c', 0),
('16CS206', '2d', 0),
('16CS206', '2e', 0),
('16CS206', '2f', 0),
('16CS206', '2g', 0),
('CS447', '3a', 0),
('CS447', '3b', 0),
('CS447', '3c', 0),
('CS447', '3d', 0),
('CS447', '3e', 0),
('CS425', '3a', 0),
('CS425', '3b', 0),
('CS425', '3c', 0),
('CS425', '3d', 0),
('CS425', '3e', 0),
('CS342', '3a', 0),
('CS342', '3b', 0),
('CS342', '3c', 0),
('CS342', '3d', 0),
('CS342', '3e', 0),
('CS338', '3a', 0),
('CS338', '3b', 0),
('CS338', '3c', 0),
('CS338', '3d', 0),
('CS338', '3e', 0),
('CS332', '3a', 0),
('CS332', '3b', 0),
('CS332', '3c', 0),
('CS332', '3d', 0),
('CS332', '3e', 0),
('CS326', '3a', 5),
('CS326', '3b', 5),
('CS326', '3c', 5),
('CS326', '3d', 5),
('CS326', '3e', 5),
('CS324', '3a', 0),
('CS324', '3b', 0),
('CS324', '3c', 0),
('CS324', '3d', 0),
('CS324', '3e', 0),
('CS322', '3a', 0),
('CS322', '3b', 0),
('CS322', '3c', 0),
('CS322', '3d', 0),
('CS322', '3e', 0),
('SR005', '3a', 0),
('SR005', '3b', 0),
('SR005', '3c', 0),
('SR005', '3d', 0),
('SR005', '3e', 0),
('MNR101', '3a', 4),
('MNR101', '3b', 4),
('MNR101', '3c', 4),
('MNR101', '3d', 4),
('MNR101', '3e', 4),
('MP01', '2a', 0),
('MP01', '2b', 0),
('MP01', '2c', 0),
('MP01', '2d', 0),
('MP01', '2e', 0),
('MP01', '2f', 0),
('MP01', '2g', 0),
('MP02', '2a', 0),
('MP02', '2b', 0),
('MP02', '2c', 0),
('MP02', '2d', 0),
('MP02', '2e', 0),
('MP02', '2f', 0),
('MP02', '2g', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f101`
--

CREATE TABLE `f101` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f101`
--

INSERT INTO `f101` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f102`
--

CREATE TABLE `f102` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f102`
--

INSERT INTO `f102` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f103`
--

CREATE TABLE `f103` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f103`
--

INSERT INTO `f103` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f104`
--

CREATE TABLE `f104` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f104`
--

INSERT INTO `f104` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f105`
--

CREATE TABLE `f105` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f105`
--

INSERT INTO `f105` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f106`
--

CREATE TABLE `f106` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f106`
--

INSERT INTO `f106` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f107`
--

CREATE TABLE `f107` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f107`
--

INSERT INTO `f107` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f108`
--

CREATE TABLE `f108` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f108`
--

INSERT INTO `f108` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f109`
--

CREATE TABLE `f109` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f109`
--

INSERT INTO `f109` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f110`
--

CREATE TABLE `f110` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f110`
--

INSERT INTO `f110` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f111`
--

CREATE TABLE `f111` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f111`
--

INSERT INTO `f111` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f112`
--

CREATE TABLE `f112` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f112`
--

INSERT INTO `f112` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f113`
--

CREATE TABLE `f113` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f113`
--

INSERT INTO `f113` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f114`
--

CREATE TABLE `f114` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f114`
--

INSERT INTO `f114` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f115`
--

CREATE TABLE `f115` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f115`
--

INSERT INTO `f115` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f116`
--

CREATE TABLE `f116` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f116`
--

INSERT INTO `f116` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f117`
--

CREATE TABLE `f117` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f117`
--

INSERT INTO `f117` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f118`
--

CREATE TABLE `f118` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f118`
--

INSERT INTO `f118` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);
-- --------------------------------------------------------

--
-- Table structure for table `f119`
--

CREATE TABLE `f119` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f119`
--

INSERT INTO `f119` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f120`
--

CREATE TABLE `f120` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f120`
--

INSERT INTO `f120` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f121`
--

CREATE TABLE `f121` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f121`
--

INSERT INTO `f121` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f122`
--

CREATE TABLE `f122` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f122`
--

INSERT INTO `f122` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f123`
--

CREATE TABLE `f123` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f123`
--

INSERT INTO `f123` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f124`
--

CREATE TABLE `f124` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f124`
--

INSERT INTO `f124` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f125`
--

CREATE TABLE `f125` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f125`
--

INSERT INTO `f125` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f126`
--

CREATE TABLE `f126` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f126`
--

INSERT INTO `f126` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f127`
--

CREATE TABLE `f127` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f127`
--

INSERT INTO `f127` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f128`
--

CREATE TABLE `f128` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f128`
--

INSERT INTO `f128` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f129`
--

CREATE TABLE `f129` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f129`
--
INSERT INTO `f129` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f130`
--

CREATE TABLE `f130` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f130`
--

INSERT INTO `f130` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f131`
--

CREATE TABLE `f131` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f131`
--

INSERT INTO `f131` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f132`
--

CREATE TABLE `f132` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f132`
--

INSERT INTO `f132` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f133`
--

CREATE TABLE `f133` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f133`
--

INSERT INTO `f133` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f134`
--

CREATE TABLE `f134` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f134`
--

INSERT INTO `f134` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f135`
--

CREATE TABLE `f135` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f135`
--

INSERT INTO `f135` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f136`
--

CREATE TABLE `f136` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f136`
--

INSERT INTO `f136` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f137`
--

CREATE TABLE `f137` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f137`
--

INSERT INTO `f137` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f138`
--

CREATE TABLE `f138` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f138`
--

INSERT INTO `f138` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f139`
--

CREATE TABLE `f139` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f139`
--

INSERT INTO `f139` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f140`
--

CREATE TABLE `f140` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f140`
--

INSERT INTO `f140` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f141`
--

CREATE TABLE `f141` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f141`
--

INSERT INTO `f141` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f142`
--

CREATE TABLE `f142` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f142`
--

INSERT INTO `f142` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f143`
--

CREATE TABLE `f143` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f143`
--

INSERT INTO `f143` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f144`
--

CREATE TABLE `f144` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f144`
--

INSERT INTO `f144` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f145`
--

CREATE TABLE `f145` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f145`
--

INSERT INTO `f145` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f146`
--

CREATE TABLE `f146` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f146`
--

INSERT INTO `f146` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f147`
--

CREATE TABLE `f147` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f147`
--

INSERT INTO `f147` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f148`
--

CREATE TABLE `f148` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f148`
--

INSERT INTO `f148` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f149`
--

CREATE TABLE `f149` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f149`
--

INSERT INTO `f149` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f150`
--

CREATE TABLE `f150` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f150`
--

INSERT INTO `f150` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f151`
--

CREATE TABLE `f151` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f151`
--

INSERT INTO `f151` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f152`
--

CREATE TABLE `f152` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f152`
--

INSERT INTO `f152` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f153`
--

CREATE TABLE `f153` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f153`
--

INSERT INTO `f153` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f4070`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` char(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `role` char(10) DEFAULT NULL,
  `department` char(10) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `phone`, `role`, `department`, `img`) VALUES
(101, 'Dr. Venkatesulu Dondeti', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(102, 'Dr. K. V. Krishna Kishore', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(103, 'Dr. N. Gnaneswara Rao', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(104, 'Dr. K. Hemantha Kumar', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(105, 'Dr. M. Nirupama Bhat', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(106, 'Dr. M. Shanmugam', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(107, 'Dr. P. Victer Paul', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(108, 'Dr. S. V. Phani Kumar', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(109, 'Mr. S. V. Rama Krishna', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(110, 'Mr. D. S. Bhupal Naik', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(111, 'Mrs. B Jyostna Devi', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(112, 'Mrs. I. Leela Priya', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(113, 'Mrs. D. Radha Rani', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(114, 'Mrs. G. Parimala', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(115, 'Mrs. Suvarna', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(116, 'Mr. K. V. Ranga Rao', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(117, 'Mr. Ch. V. Rami Reddy', '0', 'FACULTY', 'CSE', '117.jpg'),
(118, 'Mr. D. Yakobu', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(119, 'Mr. D. Veeraiah', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(120, 'Mr. S. Siva Prasad', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(121, 'Mr. Ch. Prasad', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(122, 'Mr. S. Radha Rani', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(123, 'Mrs. M. Bhargavi', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(124, 'Mr. P. Amarnath Reddy', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(125, 'Mr. J. Amar', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(126, 'Ms. SD Shareefunnisa', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(127, 'Mr. Ch. Madhu Babu', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(128, 'Ms. Sk. Sameera', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(129, 'Mr. J Ebenezer', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(130, 'Mr. K. Pavan Kumar', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(131, 'Mr. L. Jaya Kumar', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(132, 'Mr. T. Anand', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(133, 'Mrs. U Sri Lakshmi', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(134, 'Mrs. T P Lakshmi', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(135, 'Mr. N Kishore Babu', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(136, 'Mrs. Sk. Fatimabi', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(137, 'Ms. K Ananya', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(138, 'Ms. K. Hema Bhargavi', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(139, 'Ms. G. Hima Sai Sri', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(140, 'Ms. A. Saranya', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(141, 'Mr. A. Gopi Krishna', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(142, 'Ms. V. Sanghamitra', '0', 'FACULTY', 'CSE', '142.jpg'),
(143, 'Ms. B. Santhoshini', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(144, 'Mrs. P. Jhansi Lakshmi', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(145, 'R Komala', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(146, 'S Tulasi Krishna', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(147, 'N Marline J Kumari', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(148, 'Poojitha', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(149, 'Praneetha', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(150, 'Anusha', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(151, 'R Raja Kumar', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(152, 'P Hima', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(153, 'S Ranjith', '0', 'FACULTY', 'CSE', 'img_icon.jpg'),
(4070, 'Naveen', '7799201931', 'ADMIN', 'CSE', 'img_icon.jpg'),
(4170, 'Yaswanth', '7013327884', 'ADMIN', 'CSE', 'img_icon.jpg')
;

-- --------------------------------------------------------

--
-- Table structure for table `lab1`
--

CREATE TABLE `lab1` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab1`
--

INSERT INTO `lab1` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lab2`
--

CREATE TABLE `lab2` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab2`
--

INSERT INTO `lab2` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lab3`
--

CREATE TABLE `lab3` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab3`
--

INSERT INTO `lab3` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lab4`
--

CREATE TABLE `lab4` (
  `day` int(11) DEFAULT NULL,
  `h1` int(11) DEFAULT NULL,
  `h2` int(11) DEFAULT NULL,
  `h3` int(11) DEFAULT NULL,
  `h4` int(11) DEFAULT NULL,
  `h5` int(11) DEFAULT NULL,
  `h6` int(11) DEFAULT NULL,
  `h7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab4`
--

INSERT INTO `lab4` (`day`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `nid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `msg` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `year` int(11) NOT NULL,
  `sec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`year`, `sec`) VALUES
(2, 7),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sid` varchar(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `stype` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `lhpw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sid`, `sname`, `stype`, `year`, `sem`, `lhpw`) VALUES
('16CS205', 'CO', 'THEORY', 2, 2, 5),
('16CS206', 'DAA', 'THEORY', 2, 2, 5),
('16CS206L', 'DAA LAB', 'LAB', 2, 2, 3),
('16CS208', 'OOPS', 'THEORY', 2, 2, 5),
('16CS208L', 'OOPS LAB', 'LAB', 2, 2, 3),
('16EL103', 'PC LAB', 'LAB', 2, 2, 2),
('CS322', 'OOAD', 'THEORY', 3, 2, 5),
('CS324', 'MWT', 'THEORY', 3, 2, 5),
('CS326', 'MPI', 'THEORY', 3, 2, 5),
('CS332', 'AI', 'THEORY', 3, 2, 4),
('CS338', 'OOAD LAB', 'LAB', 3, 2, 3),
('CS342', 'Mini Project', 'LAB', 3, 2, 3),
('CS425', 'DWDM', 'THEORY', 3, 2, 5),
('CS447', 'DWDM LAB', 'LAB', 3, 2, 3),
('elc101', 'D ELECTIVE', 'ELECTIVE', 2, 2, 5),
('elc102', 'OPEN ELECTIVE', 'TLAB', 2, 2, 2),
('elc102L', 'OPEN ELECTIVE LAB', 'TLAB', 2, 2, 2),
('MNR101', 'Minor', 'MINOR', 3, 2, 4),
('MP01', 'MINOR PROJECT - 01', 'THEORY', 2, 2, 1),
('MP02', 'MINOR PROJECT - 02', 'THEORY', 2, 2, 1),
('MS101', 'MS', 'THEORY', 2, 2, 4),
('SR005', 'Seminar', 'SEMINAR', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `sno` int(11) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `sid` varchar(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `section` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`sno`, `fid`, `sid`, `year`, `section`) VALUES
(1, 103, 'CS425', 3, 'E'),
(2, 103, 'CS447', 3, 'E'),
(3, 104, 'CS425', 3, 'A'),
(4, 104, 'CS447', 3, 'A'),
(5, 106, 'CS338', 3, 'A'),
(6, 106, 'CS338', 3, 'C'),
(7, 106, 'CS338', 3, 'D'),
(8, 107, 'CS322', 3, 'B'),
(9, 107, 'CS322', 3, 'D'),
(10, 107, 'CS338', 3, 'B'),
(11, 107, 'CS338', 3, 'D'),
(12, 108, 'CS425', 3, 'D'),
(13, 108, 'CS447', 3, 'D'),
(14, 108, 'CS447', 3, 'A'),
(15, 109, 'CS425', 3, 'C'),
(16, 109, 'CS322', 3, 'A'),
(17, 109, 'CS447', 3, 'C'),
(18, 109, 'CS338', 3, 'A'),
(19, 109, 'CS447', 3, 'E'),
(20, 109, 'CS447', 3, 'B'),
(21, 110, 'CS425', 3, 'B'),
(22, 110, 'CS447', 3, 'B'),
(23, 110, 'CS447', 3, 'C'),
(24, 110, 'CS447', 3, 'D'),
(25, 110, 'CS447', 3, 'E'),
(26, 101, '16CS205', 2, 'C'),
(27, 101, '16CS205', 2, 'E'),
(28, 111, '16CS206', 2, 'B'),
(29, 111, '16CS206', 2, 'E'),
(30, 108, 'elc101', 2, 'ANY'),
(31, 110, 'elc101', 2, 'ANY'),
(32, 111, '16CS206L', 2, 'B'),
(33, 111, '16CS206L', 2, 'E'),
(34, 112, '16CS208', 2, 'E'),
(35, 112, '16CS208', 2, 'F'),
(36, 112, '16CS208L', 2, 'E'),
(37, 112, '16CS208L', 2, 'F'),
(39, 113, '16CS208', 2, 'A'),
(40, 113, '16CS208', 2, 'B'),
(41, 113, '16CS208L', 2, 'A'),
(42, 113, '16CS208L', 2, 'B'),
(44, 115, '16CS206', 2, 'G'),
(45, 115, '16CS206', 2, 'F'),
(46, 115, '16CS206L', 2, 'G'),
(47, 117, '16CS208', 2, 'C'),
(48, 117, '16CS208', 2, 'G'),
(49, 117, '16CS208L', 2, 'G'),
(50, 117, 'CS342', 3, 'A'),
(51, 117, 'CS342', 3, 'E'),
(52, 118, 'CS322', 3, 'C'),
(53, 118, 'CS322', 3, 'E'),
(54, 118, 'CS338', 3, 'E'),
(55, 118, 'CS338', 3, 'C'),
(56, 119, '16CS205', 2, 'D'),
(57, 119, '16CS205', 2, 'F'),
(58, 119, '16CS208L', 2, 'A'),
(59, 119, '16CS208L', 2, 'E'),
(60, 119, 'SR005', 3, 'E'),
(61, 120, '16CS206', 2, 'A'),
(62, 120, '16CS206', 2, 'C'),
(63, 120, 'elc101', 2, 'ANY'),
(64, 120, '16CS206L', 2, 'A'),
(65, 120, '16CS206L', 2, 'C'),
(67, 121, '16CS205', 2, 'B'),
(68, 121, '16CS205', 2, 'A'),
(69, 121, '16CS205', 2, 'G'),
(70, 122, '16CS208', 2, 'D'),
(71, 122, '16CS208L', 2, 'D'),
(72, 122, '16CS208L', 2, 'B'),
(73, 122, '16CS208L', 2, 'F'),
(74, 125, 'CS332', 3, 'B'),
(75, 125, 'CS332', 3, 'D'),
(76, 125, 'CS332', 3, 'E'),
(77, 125, 'CS342', 3, 'B'),
(78, 125, 'CS342', 3, 'C'),
(79, 125, 'CS342', 3, 'D'),
(80, 129, '16CS206L', 2, 'G'),
(81, 131, 'CS342', 3, 'A'),
(82, 133, 'CS324', 3, 'A'),
(83, 133, 'CS324', 3, 'B'),
(84, 133, 'CS324', 3, 'E'),
(85, 133, '16CS208L', 2, 'D'),
(86, 133, '16CS208L', 2, 'G'),
(87, 135, 'elc101', 2, 'ANY'),
(88, 135, '16CS208L', 2, 'B'),
(89, 135, '16CS208L', 2, 'D'),
(90, 135, '16CS208L', 2, 'F'),
(91, 136, 'elc101', 2, 'ANY'),
(92, 136, 'CS324', 3, 'D'),
(93, 136, 'CS447', 3, 'A'),
(94, 140, 'CS332', 3, 'A'),
(95, 140, 'CS332', 3, 'C'),
(96, 141, 'elc101', 2, 'ANY'),
(97, 141, '16CS208L', 2, 'A'),
(98, 141, '16CS208L', 2, 'C'),
(99, 141, '16CS208L', 2, 'E'),
(100, 142, 'CS342', 3, 'B'),
(101, 142, 'CS342', 3, 'C'),
(102, 142, 'CS342', 3, 'D'),
(103, 142, 'SR005', 3, 'C'),
(104, 142, 'CS338', 3, 'A'),
(105, 143, 'CS338', 3, 'B'),
(106, 143, 'CS338', 3, 'C'),
(107, 143, 'CS338', 3, 'E'),
(108, 105, '16CS206L', 2, 'A'),
(109, 105, '16CS206L', 2, 'C'),
(111, 115, 'CS447', 3, 'C'),
(112, 117, '16CS208L', 2, 'C'),
(113, 121, '16CS206L', 2, 'B'),
(114, 121, 'CS447', 3, 'B'),
(115, 121, 'SR005', 3, 'D'),
(117, 131, 'CS324', 3, 'C'),
(118, 131, '16CS206L', 2, 'D'),
(119, 132, '16CS206L', 2, 'D'),
(120, 132, '16CS206L', 2, 'E'),
(121, 133, 'SR005', 3, 'A'),
(122, 135, '16CS206L', 2, 'C'),
(123, 136, '16CS206L', 2, 'A'),
(125, 140, 'SR005', 3, 'D'),
(126, 151, 'CS338', 3, 'D'),
(127, 151, 'CS338', 3, 'E'),
(128, 151, '16CS206', 2, 'D'),
(130, 152, 'CS447', 3, 'D'),
(131, 124, 'CS338', 3, 'B'),
(132, 143, 'CS342', 3, 'E'),
(134, 136, '16CS206L', 2, 'E'),
(137, 151, '16CS206L', 2, 'D'),
(138, 131, '16CS206L', 2, 'F'),
(139, 111, '16CS206L', 2, 'F'),
(140, 115, '16CS206L', 2, 'F'),
(141, 152, '16CS208L', 2, 'C'),
(142, 112, '16CS208L', 2, 'G'),
(143, 132, 'elc101', 2, 'ANY'),
(144, 130, 'elc101', 2, 'ANY'),
(145, 152, 'elc101', 2, 'ANY'),
(146, 153, '16CS206L', 2, 'B'),
(147, 149, '16CS206L', 2, 'G'),
(148, 120, 'MP01', 2, 'A'),
(149, 121, 'MP01', 2, 'A'),
(150, 113, 'MP02', 2, 'A'),
(151, 136, 'MP02', 2, 'A'),
(152, 113, 'MP01', 2, 'B'),
(153, 135, 'MP01', 2, 'B'),
(154, 111, 'MP02', 2, 'B'),
(155, 121, 'MP02', 2, 'B'),
(156, 133, 'MP01', 2, 'D'),
(157, 132, 'MP01', 2, 'D'),
(158, 119, 'MP02', 2, 'D'),
(159, 122, 'MP02', 2, 'D'),
(160, 111, 'MP01', 2, 'E'),
(161, 112, 'MP01', 2, 'E'),
(162, 101, 'MP02', 2, 'E'),
(163, 102, 'MP02', 2, 'E'),
(164, 115, 'MP01', 2, 'F'),
(165, 135, 'MP01', 2, 'F'),
(166, 129, 'MP02', 2, 'F'),
(167, 119, 'MP02', 2, 'F'),
(168, 136, 'MP01', 2, 'C'),
(169, 129, 'MP01', 2, 'C'),
(170, 132, 'MP02', 2, 'C'),
(171, 120, 'MP02', 2, 'C'),
(172, 124, 'MP01', 2, 'G'),
(173, 115, 'MP01', 2, 'G'),
(174, 112, 'MP02', 2, 'G'),
(175, 129, 'MP02', 2, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `sec` varchar(20) DEFAULT NULL,
  `h1` varchar(20) DEFAULT NULL,
  `h2` varchar(20) DEFAULT NULL,
  `h3` varchar(20) DEFAULT NULL,
  `h4` varchar(20) DEFAULT NULL,
  `h5` varchar(20) DEFAULT NULL,
  `h6` varchar(20) DEFAULT NULL,
  `h7` varchar(20) DEFAULT NULL,
  `lc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`sec`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`, `lc`) VALUES
('2a1', 'WEEKLY TEST', 'WEEKLY TEST', 'PC LAB', 'PC LAB', '', 'OPEN ELECTIVE', 'OPEN ELECTIVE', 1),
('2a2', '', '', '', '', '', '', '', 0),
('2a3', '', '', '', 'MS', '', 'OPEN ELECTIVE LAB', 'OPEN ELECTIVE LAB', 0),
('2a4', '', '', '', '', '', 'MS', '', 0),
('2a5', '', '', '', 'MS', '', '', '', 0),
('2a6', 'ACTIVITIES', 'ACTIVITIES', 'MS', '', '', '', '', 0),
('2b1', 'WEEKLY TEST', 'WEEKLY TEST', '', '', '', 'OPEN ELECTIVE', 'OPEN ELECTIVE', 0),
('2b2', '', '', 'PC LAB', 'PC LAB', '', '', '', 1),
('2b3', 'MS', '', '', '', '', 'OPEN ELECTIVE LAB', 'OPEN ELECTIVE LAB', 0),
('2b4', '', '', '', '', '', 'MS', '', 0),
('2b5', '', '', '', '', 'MS', '', '', 0),
('2b6', 'ACTIVITIES', 'ACTIVITIES', 'MS', '', '', '', '', 0),
('2c1', 'WEEKLY TEST', 'WEEKLY TEST', '', 'MS', '', 'OPEN ELECTIVE', 'OPEN ELECTIVE', 0),
('2c2', '', '', '', '', '', '', 'MS', 0),
('2c3', '', '', 'PC LAB', 'PC LAB', '', 'OPEN ELECTIVE LAB', 'OPEN ELECTIVE LAB', 1),
('2c4', '', '', '', '', '', '', 'MS', 0),
('2c5', '', '', '', '', '', '', '', 0),
('2c6', 'ACTIVITIES', 'ACTIVITIES', '', '', 'MS', '', '', 0),
('2d1', 'WEEKLY TEST', 'WEEKLY TEST', '', '', '', 'OPEN ELECTIVE', 'OPEN ELECTIVE', 0),
('2d2', '', '', '', '', 'MS', '', '', 0),
('2d3', '', '', 'MS', '', '', 'OPEN ELECTIVE LAB', 'OPEN ELECTIVE LAB', 0),
('2d4', '', '', 'PC LAB', 'PC LAB', 'MS', '', '', 1),
('2d5', '', '', '', '', '', 'MS', '', 0),
('2d6', 'ACTIVITIES', 'ACTIVITIES', '', '', '', '', '', 0),
('2e1', 'WEEKLY TEST', 'WEEKLY TEST', '', 'MS', '', 'OPEN ELECTIVE', 'OPEN ELECTIVE', 0),
('2e2', '', '', '', '', 'MS', '', '', 0),
('2e3', '', '', '', '', 'MS', 'OPEN ELECTIVE LAB', 'OPEN ELECTIVE LAB', 0),
('2e4', '', '', '', '', '', '', 'MS', 0),
('2e5', '', '', 'PC LAB', 'PC LAB', '', '', '', 1),
('2e6', 'ACTIVITIES', 'ACTIVITIES', '', '', '', '', '', 0),
('2f1', 'WEEKLY TEST', 'WEEKLY TEST', 'MS', '', '', 'OPEN ELECTIVE', 'OPEN ELECTIVE', 0),
('2f2', '', '', '', 'MS', '', '', '', 0),
('2f3', '', '', '', '', '', 'OPEN ELECTIVE LAB', 'OPEN ELECTIVE LAB', 0),
('2f4', '', '', '', '', '', '', '', 0),
('2f5', '', '', '', 'MS', '', 'PC LAB', 'PC LAB', 1),
('2f6', 'ACTIVITIES', 'ACTIVITIES', '', 'MS', '', '', '', 0),
('2g1', 'WEEKLY TEST', 'WEEKLY TEST', 'MS', '', '', 'OPEN ELECTIVE', 'OPEN ELECTIVE', 0),
('2g2', '', '', 'MS', '', '', 'PC LAB', 'PC LAB', 1),
('2g3', 'MS', '', '', '', '', 'OPEN ELECTIVE LAB', 'OPEN ELECTIVE LAB', 0),
('2g4', '', '', '', '', '', '', '', 0),
('2g5', '', '', '', '', 'MS', '', '', 0),
('2g6', 'ACTIVITIES', 'ACTIVITIES', '', '', '', '', '', 0),
('3a1', 'WEEKLY TEST', 'WEEKLY TEST', 'MPI', '', '', '', '', 0),
('3a2', '', '', 'Minor', '', '', '', '', 0),
('3a3', '', '', 'Minor', '', 'MPI', 'MPI', '', 0),
('3a4', '', 'MPI', 'Minor', '', '', '', '', 0),
('3a5', '', 'MPI', 'Minor', '', '', '', '', 0),
('3a6', '', '', '', 'ACTIVITIES', 'ACTIVITIES', '', '', 0),
('3b1', 'WEEKLY TEST', 'WEEKLY TEST', '', '', '', 'MPI', '', 0),
('3b2', '', '', 'Minor', 'MPI', '', '', '', 0),
('3b3', '', '', 'Minor', 'MPI', '', '', '', 0),
('3b4', '', '', 'Minor', 'MPI', '', '', '', 0),
('3b5', 'MPI', '', 'Minor', '', '', '', '', 0),
('3b6', '', '', '', 'ACTIVITIES', 'ACTIVITIES', '', '', 0),
('3c1', 'WEEKLY TEST', 'WEEKLY TEST', '', '', 'MPI', '', '', 0),
('3c2', '', 'MPI', 'Minor', '', 'MPI', '', '', 0),
('3c3', '', '', 'Minor', '', '', '', '', 0),
('3c4', '', '', 'Minor', '', '', '', '', 0),
('3c5', '', '', 'Minor', 'MPI', '', '', '', 0),
('3c6', '', '', 'MPI', 'ACTIVITIES', 'ACTIVITIES', '', '', 0),
('3d1', 'WEEKLY TEST', 'WEEKLY TEST', '', 'MPI', '', '', '', 0),
('3d2', 'MPI', '', 'Minor', '', '', '', '', 0),
('3d3', '', '', 'Minor', '', '', '', 'MPI', 0),
('3d4', 'MPI', '', 'Minor', '', '', 'MPI', '', 0),
('3d5', '', '', 'Minor', '', '', '', '', 0),
('3d6', '', '', '', 'ACTIVITIES', 'ACTIVITIES', '', '', 0),
('3e1', 'WEEKLY TEST', 'WEEKLY TEST', '', 'MPI', '', '', '', 0),
('3e2', '', '', 'Minor', '', '', '', '', 0),
('3e3', '', '', 'Minor', '', '', '', '', 0),
('3e4', 'MPI', '', 'Minor', '', '', '', '', 0),
('3e5', '', '', 'Minor', '', 'MPI', 'MPI', '', 0),
('3e6', '', '', '', 'ACTIVITIES', 'ACTIVITIES', 'MPI', '', 0);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) DEFAULT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`) VALUES
(4070, 'Naveen#97'),
(4170, 'lineup170'),
(101, '101'),
(102, '102'),
(103, '103'),
(104, '104'),
(105, '105'),
(106, '106'),
(107, '107'),
(108, '108'),
(109, '109'),
(110, '110'),
(111, '111'),
(112, '112'),
(113, '113'),
(114, '114'),
(115, '115'),
(116, '116'),
(117, '117'),
(118, '118'),
(119, '119'),
(120, '120'),
(121, '121'),
(122, '122'),
(123, '123'),
(124, '124'),
(125, '125'),
(126, '126'),
(127, '127'),
(128, '128'),
(129, '129'),
(130, '130'),
(131, '131'),
(132, '132'),
(133, '133'),
(134, '134'),
(135, '135'),
(136, '136'),
(137, '137'),
(138, '138'),
(139, '139'),
(140, '140'),
(141, '141'),
(142, '142'),
(143, '143'),
(144, '144'),
(145, '145'),
(146, '146'),
(147, '147'),
(148, '148'),
(149, '149'),
(150, '150'),
(151, '151'),
(152, '152'),
(153, '153');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`cno`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `counttable`
--
ALTER TABLE `counttable`
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `fid` (`fid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `cno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `teaches`
--
ALTER TABLE `teaches`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `counttable`
--
ALTER TABLE `counttable`
  ADD CONSTRAINT `counttable_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `subject` (`sid`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `subject` (`sid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty` (`fid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
