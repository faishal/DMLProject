-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2012 at 08:12 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dml`
--

-- --------------------------------------------------------

--
-- Table structure for table `balesdatas`
--

CREATE TABLE IF NOT EXISTS `balesdatas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `do_no` varchar(20) NOT NULL,
  `do_date` date NOT NULL,
  `invoice_no` varchar(20) DEFAULT NULL,
  `loading_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `transporter_id` int(11) NOT NULL,
  `truck_no` varchar(20) NOT NULL,
  `bales` int(11) NOT NULL,
  `lot_no` varchar(10) NOT NULL,
  `pr_no` varchar(20) NOT NULL,
  `gross_wt` double NOT NULL,
  `tare` double NOT NULL,
  `net_wt` double NOT NULL,
  `container_wt` double NOT NULL,
  `fright` double DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `balesstatus_id` int(11) NOT NULL,
  `passing_date` date DEFAULT NULL,
  `sample_deduct` varchar(100) NOT NULL,
  `rate_kg` double NOT NULL,
  `bill_amt` double NOT NULL,
  `bill_date` date NOT NULL,
  `party_wt1` double NOT NULL,
  `party_wt2` double NOT NULL,
  `weighmentslip_wt` double NOT NULL,
  `shortage` double NOT NULL,
  `lr_no` int(11) NOT NULL,
  `lr_date` date NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `balesstatus`
--

CREATE TABLE IF NOT EXISTS `balesstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE IF NOT EXISTS `brokers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `ref_no` varchar(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE IF NOT EXISTS `contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `broker_id` int(11) NOT NULL,
  `sellerparty_id` int(11) NOT NULL,
  `contract_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bank` varchar(100) NOT NULL,
  `account_no` int(11) NOT NULL,
  `rtgs_no` int(11) NOT NULL,
  `dmlcompany_id` int(11) NOT NULL,
  `crop_variety` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` float NOT NULL,
  `salesagainst_id` int(11) NOT NULL,
  `passingtype_id` int(11) NOT NULL,
  `payment_condition` varchar(500) NOT NULL,
  `billing_name` varchar(500) NOT NULL,
  `delivery_condition` varchar(500) NOT NULL,
  `deliveryfrom_id` int(11) NOT NULL,
  `commission` varchar(100) NOT NULL,
  `contracttype_id` int(11) NOT NULL,
  `packing_type` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `q_mic` float NOT NULL,
  `q_length` float NOT NULL,
  `q_strength` float NOT NULL,
  `q_remarks` text NOT NULL,
  `note` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `contractstatus`
--

CREATE TABLE IF NOT EXISTS `contractstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `contracttypes`
--

CREATE TABLE IF NOT EXISTS `contracttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `dblogs`
--

CREATE TABLE IF NOT EXISTS `dblogs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cdata` text NOT NULL,
  `enttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(500) NOT NULL,
  `tablename` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `dmlcompanies`
--

CREATE TABLE IF NOT EXISTS `dmlcompanies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `st_tin_no` varchar(100) NOT NULL,
  `st_date` date NOT NULL,
  `cst_tin_no` varchar(100) NOT NULL,
  `cst_date` date NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `keyvalues`
--

CREATE TABLE IF NOT EXISTS `keyvalues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `key` varchar(500) NOT NULL,
  `value` varchar(500) NOT NULL,
  `flag` varchar(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `labreports`
--

CREATE TABLE IF NOT EXISTS `labreports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bales_id` int(11) NOT NULL,
  `mic` float NOT NULL,
  `length` float NOT NULL,
  `strength` float NOT NULL,
  `cg` float NOT NULL,
  `testreport_no` varchar(20) NOT NULL,
  `testreport_date` date NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `passingtypes`
--

CREATE TABLE IF NOT EXISTS `passingtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `salesagainsts`
--

CREATE TABLE IF NOT EXISTS `salesagainsts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `sellerparties`
--

CREATE TABLE IF NOT EXISTS `sellerparties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `statustypes`
--

CREATE TABLE IF NOT EXISTS `statustypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `transporters`
--

CREATE TABLE IF NOT EXISTS `transporters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
