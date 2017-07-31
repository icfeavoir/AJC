-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2017 at 08:13 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a6682470_pmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `pmc`
--

CREATE TABLE `pmc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `capteur` int(11) NOT NULL,
  `state` tinyint(2) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pmc`
--

INSERT INTO `pmc` VALUES(1, 1, 0, 47.49377122728419, -0.5513521466270959, '2017-04-05 10:59:47');
INSERT INTO `pmc` VALUES(2, 2, 1, 47.494067248774336, -0.5507043931499993,'2017-04-05 10:42:50');
