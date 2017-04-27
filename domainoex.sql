-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 05:12 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `domainoex`
--

-- --------------------------------------------------------

--
-- Table structure for table `pieces`
--

CREATE TABLE IF NOT EXISTS `pieces` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NUM1` int(11) NOT NULL,
  `NUM2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `pieces`
--

INSERT INTO `pieces` (`ID`, `NUM1`, `NUM2`) VALUES
(1, 0, 0),
(2, 1, 0),
(3, 2, 0),
(4, 3, 0),
(5, 4, 0),
(6, 5, 0),
(7, 6, 0),
(8, 1, 1),
(9, 1, 2),
(10, 1, 3),
(11, 1, 4),
(12, 1, 5),
(13, 1, 6),
(14, 2, 2),
(15, 2, 3),
(16, 2, 4),
(17, 2, 5),
(18, 2, 6),
(19, 3, 3),
(20, 3, 4),
(21, 3, 5),
(22, 3, 6),
(23, 4, 4),
(24, 4, 5),
(25, 4, 6),
(26, 5, 5),
(27, 5, 6),
(28, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `play_piece`
--

CREATE TABLE IF NOT EXISTS `play_piece` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_PIECE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_PIECE_ID` (`USER_PIECE_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `play_piece`
--

INSERT INTO `play_piece` (`ID`, `USER_PIECE_ID`, `USER_ID`) VALUES
(4, 4, 1),
(5, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FLAG` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NAME`, `EMAIL`, `PASSWORD`, `ID`, `FLAG`) VALUES
('MohmedFarid', 'MohamedFarid@yahoo.com', '123', 1, 0),
('MohmedFarid2', 'MohamedFarid2@yahoo.com', '123', 2, 0),
('MohmedFarid3', 'MohamedFarid3@yahoo.com', '123', 3, 1),
('MohmedFarid4', 'MohamedFarid4@yahoo.com', '123', 4, 0),
('MohmedFarid10', 'MohamedFarid10@yahoo.com', '123', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_pieces`
--

CREATE TABLE IF NOT EXISTS `user_pieces` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PIECES_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `un1` (`USER_ID`,`PIECES_ID`),
  KEY `USER_ID` (`USER_ID`,`PIECES_ID`),
  KEY `PIECES_ID` (`PIECES_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `user_pieces`
--

INSERT INTO `user_pieces` (`ID`, `USER_ID`, `PIECES_ID`) VALUES
(5, 1, 6),
(6, 1, 10),
(2, 1, 17),
(3, 1, 20),
(1, 1, 27),
(7, 1, 28),
(13, 2, 14),
(9, 2, 15),
(15, 2, 16),
(12, 2, 23),
(11, 2, 26),
(16, 3, 6),
(21, 3, 7),
(17, 3, 11),
(31, 3, 20),
(20, 3, 25),
(18, 3, 28),
(27, 4, 4),
(32, 4, 6),
(28, 4, 8),
(22, 4, 12),
(24, 4, 15),
(30, 4, 25),
(33, 4, 26);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_pieces`
--
ALTER TABLE `user_pieces`
  ADD CONSTRAINT `user_pieces_ibfk_2` FOREIGN KEY (`PIECES_ID`) REFERENCES `pieces` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pieces_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
