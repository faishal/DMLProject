-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2012 at 05:27 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.6-13ubuntu3.8

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
  `loading_date` date DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `transporter_id` int(11) NOT NULL,
  `truck_no` varchar(20) DEFAULT NULL,
  `bales` int(11) DEFAULT NULL,
  `lot_no` varchar(10) DEFAULT NULL,
  `pr_no` varchar(20) DEFAULT NULL,
  `gross_wt` double NOT NULL,
  `tare` double NOT NULL,
  `net_wt` double NOT NULL,
  `container_wt` double DEFAULT NULL,
  `fright` double DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `balesstatus_id` int(11) NOT NULL,
  `passing_date` date DEFAULT NULL,
  `sample_deduct` varchar(100) DEFAULT NULL,
  `rate_kg` double NOT NULL,
  `bill_amt` double NOT NULL,
  `bill_date` date DEFAULT NULL,
  `party_wt1` double DEFAULT NULL,
  `party_wt2` double DEFAULT NULL,
  `weighmentslip_wt` double DEFAULT NULL,
  `shortage` double NOT NULL,
  `lr_no` varchar(20) DEFAULT NULL,
  `lr_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `balesdatas`
--

INSERT INTO `balesdatas` (`id`, `contract_id`, `do_no`, `do_date`, `invoice_no`, `loading_date`, `arrival_date`, `transporter_id`, `truck_no`, `bales`, `lot_no`, `pr_no`, `gross_wt`, `tare`, `net_wt`, `container_wt`, `fright`, `warehouse_id`, `balesstatus_id`, `passing_date`, `sample_deduct`, `rate_kg`, `bill_amt`, `bill_date`, `party_wt1`, `party_wt2`, `weighmentslip_wt`, `shortage`, `lr_no`, `lr_date`) VALUES
(1, 1, '2', '2012-09-06', '', '2012-09-04', '2012-09-05', 1, 'GJ1000', 100, '59', '5801-5900 ', 15890, 35, 15855, NULL, 120, 1, 7, '2012-09-04', '', 117.09723987206, 1856576.73817151, '2012-09-04', 15890, 15900, 15840, -50, '', '1970-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `balesstatus`
--

CREATE TABLE IF NOT EXISTS `balesstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `balesstatus`
--

INSERT INTO `balesstatus` (`id`, `value`) VALUES
(1, 'pass'),
(2, 'passing pending'),
(3, 'reject'),
(4, 'return back'),
(5, 'loading pending'),
(6, 'loading done'),
(7, 'Report pending'),
(8, 'Pass but remaining to give DO'),
(9, 'Purchase contract remains to generate'),
(10, 'All Done');

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE IF NOT EXISTS `brokers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `ref_no` varchar(20) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `brokers`
--

INSERT INTO `brokers` (`id`, `name`, `address`, `city`, `state`, `ref_no`, `contact_person`) VALUES
(1, 'Jalaram Brokers', '48, Parijaat reci., sadhuwaswani road., RAJKOT-360005', 'Rajkot', 'Gujarat', '', 'Rajeshbhai'),
(2, 'Tirupati Trading Company', 'OPP . PROFECCER SOCIETY, THOL ROAD KADI â€“ 382715', 'Kadi', 'Gujarat', '', ''),
(3, 'MOHANLAL MAVJIBHAI ', '', '', '', '', 'Mohan bhai');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE IF NOT EXISTS `contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `broker_id` int(11) NOT NULL,
  `contract_date` date NOT NULL,
  `sellerparty_id` int(11) NOT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `rtgs_no` int(11) DEFAULT NULL,
  `dmlcompany_id` int(11) NOT NULL,
  `crop_variety` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `salesagainst_id` int(11) NOT NULL,
  `passingtype_id` int(11) NOT NULL,
  `payment_condition` varchar(500) DEFAULT NULL,
  `billing_name` varchar(500) DEFAULT NULL,
  `delivery_condition` varchar(500) DEFAULT NULL,
  `deliveryfrom_id` int(11) NOT NULL,
  `commission` varchar(100) DEFAULT NULL,
  `contracttype_id` int(11) NOT NULL,
  `packing_type` varchar(100) DEFAULT NULL,
  `remarks` text,
  `q_mic` float NOT NULL,
  `q_length` float NOT NULL,
  `q_strength` float NOT NULL,
  `q_remarks` text,
  `note` text,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `broker_id`, `contract_date`, `sellerparty_id`, `bank`, `account_no`, `rtgs_no`, `dmlcompany_id`, `crop_variety`, `quantity`, `rate`, `salesagainst_id`, `passingtype_id`, `payment_condition`, `billing_name`, `delivery_condition`, `deliveryfrom_id`, `commission`, `contracttype_id`, `packing_type`, `remarks`, `q_mic`, `q_length`, `q_strength`, `q_remarks`, `note`, `status_id`) VALUES
(1, 3, '2012-09-04', 7, 'Bank Of India', 123456789, 1010, 1, 'Cotton', 300, 39300, 1, 1, '15 Days 7 Days After Passing ', '', '', 7, '', 1, '', 'This is a test', 3.6, 29, 28, 'this is also demo data', 'TESTING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contractstatus`
--

CREATE TABLE IF NOT EXISTS `contractstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contractstatus`
--

INSERT INTO `contractstatus` (`id`, `value`) VALUES
(1, 'passing pending'),
(2, 'contract done'),
(3, 'contract cancel');

-- --------------------------------------------------------

--
-- Table structure for table `contracttypes`
--

CREATE TABLE IF NOT EXISTS `contracttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contracttypes`
--

INSERT INTO `contracttypes` (`id`, `value`) VALUES
(1, 'Pakka soda (confirm)'),
(2, 'Subject to passing');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `dblogs`
--

INSERT INTO `dblogs` (`id`, `cdata`, `enttime`, `username`, `tablename`) VALUES
(14, '{"Keyvalue":[{"id":null,"refid":"1","type":"t","key":"m","username":"bhoomi","value":""},{"id":null,"refid":"1","username":"bhoomi","type":"t","key":"l","value":""},{"id":null,"username":"bhoomi","refid":"1","type":"t","key":"f","value":""},{"id":null,"refid":"1","username":"bhoomi","type":"t","key":"e","value":""}]}', '2012-09-04 15:02:30', 'bhoomi', 'Keyvalue'),
(15, '{"Keyvalue":[{"id":null,"refid":"2","type":"t","key":"m","username":"bhoomi","value":""},{"id":null,"refid":"2","username":"bhoomi","type":"t","key":"l","value":""},{"id":null,"username":"bhoomi","refid":"2","type":"t","key":"f","value":""},{"id":null,"refid":"2","username":"bhoomi","type":"t","key":"e","value":""}]}', '2012-09-04 15:02:41', 'bhoomi', 'Keyvalue'),
(16, '{"Keyvalue":[{"id":null,"refid":"3","type":"t","key":"m","username":"bhoomi","value":""},{"id":null,"refid":"3","username":"bhoomi","type":"t","key":"l","value":""},{"id":null,"username":"bhoomi","refid":"3","type":"t","key":"f","value":""},{"id":null,"refid":"3","username":"bhoomi","type":"t","key":"e","value":""}]}', '2012-09-04 15:03:12', 'bhoomi', 'Keyvalue'),
(17, '{"Keyvalue":[{"id":null,"refid":"6","type":"s","key":"m","value":"","username":"bhoomi"},{"id":null,"refid":"6","username":"bhoomi","type":"s","key":"l","value":""},{"id":null,"username":"bhoomi","refid":"6","type":"s","key":"f","value":""},{"id":null,"refid":"6","username":"bhoomi","type":"s","key":"e","value":""}]}', '2012-09-04 15:09:37', 'bhoomi', 'Keyvalue'),
(18, '{"Keyvalue":[{"id":null,"refid":"7","type":"s","key":"m","value":"","username":"bhoomi"},{"id":null,"refid":"7","username":"bhoomi","type":"s","key":"l","value":""},{"id":null,"username":"bhoomi","refid":"7","type":"s","key":"f","value":""},{"id":null,"refid":"7","username":"bhoomi","type":"s","key":"e","value":""}]}', '2012-09-04 15:10:53', 'bhoomi', 'Keyvalue'),
(19, '{"Keyvalue":[{"id":null,"refid":"3","type":"b","key":"m","value":"","username":"bhoomi"},{"id":null,"refid":"3","type":"b","key":"l","value":"","username":"bhoomi"},{"username":"bhoomi","id":null,"refid":"3","type":"b","key":"f","value":""},{"username":"bhoomi","id":null,"refid":"3","type":"b","key":"e","value":""}]}', '2012-09-04 15:11:12', 'bhoomi', 'Keyvalue'),
(20, '{"Contract":{"broker_id":"3","contract_date":"2012-09-04","sellerparty_id":"7","bank":"Bank Of India","account_no":"123456789","rtgs_no":"1010","dmlcompany_id":"1","crop_variety":"Cotton","quantity":"300","rate":"39300","salesagainst_id":"1","passingtype_id":" 1","payment_condition":"15 Days 7 Days After Passing ","billing_name":"","delivery_condition":"","deliveryfrom_id":"7","commission":"","contracttype_id":" 1","packing_type":"","remarks":"This is a test","q_mic":"3.6","q_length":"29","q_strength":"28","q_remarks":"this is also demo data","note":"TESTING","status_id":" 1 ","username":"bhoomi"}}', '2012-09-04 15:23:15', 'bhoomi', 'Contract'),
(21, '{"Balesdata":{"contract_id":"1","do_no":"1001","do_date":"2012-09-04","invoice_no":"","loading_date":"2012-9-4","arrival_date":"2012-09-05","transporter_id":"1","truck_no":"GJ1000","bales":"100","lot_no":"59","pr_no":"5801-5900 ","gross_wt":"15890 ","tare":"35","net_wt":"15855","container_wt":"","fright":"120 ","warehouse_id":"1","balesstatus_id":"7","passing_date":"2012-9-4","sample_deduct":"","rate_kg":"117.09723987206","bill_amt":"1856576.7381715113","bill_date":"2012-9-4","party_wt1":"15890 ","party_wt2":"15900 ","weighmentslip_wt":"15840 ","shortage":"-50","lr_no":"","lr_date":"1970-02-01","username":"bhoomi"}}', '2012-09-04 15:36:12', 'bhoomi', 'Balesdata'),
(22, '{"Exportcontract":{"sellerparty_id":"5","broker_id":"2","ratepercandy":"35500","transporter_id":"3","username":"bhoomi"}}', '2012-09-06 05:46:18', 'bhoomi', 'Exportcontract'),
(23, '{"Exportcontract":{"sellerparty_id":"5","broker_id":"2","ratepercandy":"35500","transporter_id":"3","username":"bhoomi"}}', '2012-09-06 06:04:51', 'bhoomi', 'Exportcontract'),
(24, '{"Labreport":{"bales_id":"1","mic":"3.55","length":"25","strength":"80","cg":"","testreport_no":"A\\/85\\/10","testreport_date":"2012-09-06","note":"This is a test","username":"bhoomi"}}', '2012-09-06 11:29:10', 'bhoomi', 'Labreport'),
(25, '{"Labreport":{"bales_id":"1","mic":"3.56","length":"25","strength":"82","cg":"","testreport_no":"A\\/85\\/101","testreport_date":"2012-09-06","note":"This is test 2","username":"bhoomi"}}', '2012-09-06 11:39:17', 'bhoomi', 'Labreport'),
(26, '{"Dmlcompanie":{"id":"1","name":"D.M.L. Exim Private Limited - Rajkot (Gujarat)","address":"405, Embassy Tower, Opp. Jubilee Garden, Jawahar Road, Rajkot 360001","city":"Rajkot","state":"Gujarat","cst_tin_no":"24591400532","cst_date":"2003-08-01","st_tin_no":"24091400532","st_date":"2003-07-23","contact_person":"Nileshbhai","username":"bhoomi"}}', '2012-09-06 15:20:46', 'bhoomi', 'Dmlcompanie'),
(27, '{"Broker":{"id":"3","ref_no":"","name":"MOHANLAL MAVJIBHAI ","address":"","city":"","state":"","contact_person":"Mohan bhai","username":"bhoomi"}}', '2012-09-06 15:34:58', 'bhoomi', 'Broker'),
(28, '{"Exportcontract":{"id":"1","sellerparty_id":"1","broker_id":"2","ratepercandy":"35500","transporter_id":"1","username":"bhoomi"}}', '2012-09-07 12:38:15', 'bhoomi', 'Exportcontract'),
(29, '{"Exportbale":{"exportcontract_id":"2","invoice_no":"9898","lorry_no":"123","lr_no":"5","fright":"500","amount":"8000","weight":"450","username":"bhoomi"}}', '2012-09-07 12:42:14', 'bhoomi', 'Exportbale'),
(30, '{"Exportbale":{"exportcontract_id":"2","invoice_no":"9898","lorry_no":"123","lr_no":"6","fright":"500","amount":"520","weight":"140","username":"bhoomi"}}', '2012-09-07 12:42:42', 'bhoomi', 'Exportbale'),
(31, '{"Exportbale":{"exportcontract_id":"2","invoice_no":"11","lorry_no":"1","lr_no":"2","fright":"","amount":"200","weight":"12","username":"bhoomi"}}', '2012-09-07 12:52:05', 'bhoomi', 'Exportbale'),
(32, '{"Exportbale":{"id":"1","exportcontract_id":"2","invoice_no":"9898","lorry_no":"123","lr_no":"5","fright":"500","amount":"8000","weight":"45","username":"bhoomi"}}', '2012-09-07 12:52:17', 'bhoomi', 'Exportbale');

-- --------------------------------------------------------

--
-- Table structure for table `dmlcompanies`
--

CREATE TABLE IF NOT EXISTS `dmlcompanies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `st_tin_no` varchar(100) DEFAULT NULL,
  `st_date` date DEFAULT NULL,
  `cst_tin_no` varchar(100) DEFAULT NULL,
  `cst_date` date DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dmlcompanies`
--

INSERT INTO `dmlcompanies` (`id`, `name`, `address`, `city`, `state`, `st_tin_no`, `st_date`, `cst_tin_no`, `cst_date`, `contact_person`) VALUES
(1, 'D.M.L. Exim Private Limited - Rajkot (Gujarat)', '405, Embassy Tower, Opp. Jubilee Garden, Jawahar Road, Rajkot 360001', 'Rajkot', 'Gujarat', '24091400532', '2003-07-23', '24591400532', '2003-08-01', 'Nileshbhai'),
(2, 'D.M.L. Exim Private Limited - Mumbai (Maharashtra)', '707, Dattani Plaza, Safed Pool, Sakinaka Junction, Andheri (East) 400072', 'Mumbai', 'Maharashtra', '27280251024V', '2005-09-16', '27280251024C', '2005-09-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `exportbales`
--

CREATE TABLE IF NOT EXISTS `exportbales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exportcontract_id` int(11) NOT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `lorry_no` varchar(50) DEFAULT NULL,
  `lr_no` varchar(50) DEFAULT NULL,
  `fright` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exportbales`
--

INSERT INTO `exportbales` (`id`, `exportcontract_id`, `invoice_no`, `lorry_no`, `lr_no`, `fright`, `amount`, `weight`) VALUES
(1, 2, '9898', '123', '5', 500, 8000, 45),
(2, 2, '11', '1', '2', NULL, 200, 12);

-- --------------------------------------------------------

--
-- Table structure for table `exportcontracts`
--

CREATE TABLE IF NOT EXISTS `exportcontracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sellerparty_id` int(11) NOT NULL,
  `broker_id` int(11) NOT NULL,
  `ratepercandy` float NOT NULL,
  `transporter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exportcontracts`
--

INSERT INTO `exportcontracts` (`id`, `sellerparty_id`, `broker_id`, `ratepercandy`, `transporter_id`) VALUES
(1, 1, 2, 35500, 1),
(2, 5, 2, 35500, 3);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `keyvalues`
--

INSERT INTO `keyvalues` (`id`, `refid`, `type`, `key`, `value`, `flag`) VALUES
(1, 1, 't', 'm', '', ''),
(2, 1, 't', 'l', '', ''),
(3, 1, 't', 'f', '', ''),
(4, 1, 't', 'e', '', ''),
(5, 2, 't', 'm', '', ''),
(6, 2, 't', 'l', '', ''),
(7, 2, 't', 'f', '', ''),
(8, 2, 't', 'e', '', ''),
(9, 3, 't', 'm', '', ''),
(10, 3, 't', 'l', '', ''),
(11, 3, 't', 'f', '', ''),
(12, 3, 't', 'e', '', ''),
(13, 6, 's', 'm', '', ''),
(14, 6, 's', 'l', '', ''),
(15, 6, 's', 'f', '', ''),
(16, 6, 's', 'e', '', ''),
(17, 7, 's', 'm', '', ''),
(18, 7, 's', 'l', '', ''),
(19, 7, 's', 'f', '', ''),
(20, 7, 's', 'e', '', ''),
(21, 3, 'b', 'm', '', ''),
(22, 3, 'b', 'l', '', ''),
(23, 3, 'b', 'f', '', ''),
(24, 3, 'b', 'e', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `labreports`
--

CREATE TABLE IF NOT EXISTS `labreports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bales_id` int(11) NOT NULL,
  `mic` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  `strength` float DEFAULT NULL,
  `cg` float DEFAULT NULL,
  `testreport_no` varchar(20) DEFAULT NULL,
  `testreport_date` date DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `labreports`
--

INSERT INTO `labreports` (`id`, `bales_id`, `mic`, `length`, `strength`, `cg`, `testreport_no`, `testreport_date`, `note`) VALUES
(1, 1, 3.55, 25, 80, NULL, 'A/85/10', '2012-09-06', 'This is a test'),
(2, 1, 3.56, 25, 82, NULL, 'A/85/101', '2012-09-06', 'This is test 2');

-- --------------------------------------------------------

--
-- Table structure for table `passingtypes`
--

CREATE TABLE IF NOT EXISTS `passingtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `passingtypes`
--

INSERT INTO `passingtypes` (`id`, `value`) VALUES
(1, 'Lab passing'),
(2, 'Spot passing');

-- --------------------------------------------------------

--
-- Table structure for table `salesagainsts`
--

CREATE TABLE IF NOT EXISTS `salesagainsts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salesagainsts`
--

INSERT INTO `salesagainsts` (`id`, `value`) VALUES
(1, 'VAT'),
(2, 'Form H');

-- --------------------------------------------------------

--
-- Table structure for table `sellerparties`
--

CREATE TABLE IF NOT EXISTS `sellerparties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sellerparties`
--

INSERT INTO `sellerparties` (`id`, `name`, `address`, `city`, `state`, `type`, `contact_person`) VALUES
(1, 'Raghav Cotton ind.', '', 'Manavadar', 'Gujarat', NULL, ''),
(2, 'Kumkum Cotton Indu', '', 'Kadi', 'Gujarat', NULL, ''),
(3, 'Laxmi Ginning Factory', '', 'Kadi', 'Gujarat', NULL, ''),
(4, 'ABC COTSPIN PVT LTD ', '', 'Ahmedabad', 'Gujarat', NULL, ''),
(5, 'M/s. Divya Spinning Mills', 'Sathy Taluk, Erode', 'Erode', 'Tamil Nadu', NULL, ''),
(6, 'AVADH COTTON INDUSTRIES ', '', 'Jasdan', 'Gujarat', NULL, ''),
(7, 'SIPPAI INDUSTRIES ', '', 'Wankaner', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `statustypes`
--

CREATE TABLE IF NOT EXISTS `statustypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `statustypes`
--

INSERT INTO `statustypes` (`id`, `value`) VALUES
(1, 'passing pending'),
(2, 'contract done'),
(3, 'contract cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `transporters`
--

CREATE TABLE IF NOT EXISTS `transporters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transporters`
--

INSERT INTO `transporters` (`id`, `name`, `address`, `city`, `state`) VALUES
(1, 'Niti Roadways ', '', '', ''),
(2, 'Chamunda Roadlines ', '', '', ''),
(3, 'SARDA TRANSPORT ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `uniqueids`
--

CREATE TABLE IF NOT EXISTS `uniqueids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `uniqueids`
--

INSERT INTO `uniqueids` (`id`, `type`, `value`) VALUES
(1, 'do', 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'abc', 'abc', 'admin', '2012-08-20 00:00:00', '2012-08-20 00:00:00'),
(2, 'bhoomi', '4aad843f70d9e72d43178f4cc3c5419636ca9954', 'admin', '2012-08-20 11:08:15', '2012-08-20 11:08:15'),
(3, 'bhoomi', '4aad843f70d9e72d43178f4cc3c5419636ca9954', 'admin', '2012-08-20 11:09:16', '2012-08-20 11:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `address` text,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`, `city`, `state`) VALUES
(1, 'Excel 12', ' ', 'Gandhidham', 'Gujarat'),
(2, 'Excel 3', ' ', 'Gandhidham', 'Gujarat'),
(3, 'Almet 14', ' ', 'Gandhidham', 'Gujarat'),
(4, 'Almet 22', ' ', 'Gandhidham', 'Gujarat'),
(5, 'SRS', ' ', 'Gandhidham', 'Gujarat'),
(6, 'Port', ' ', 'Pipavav', 'Gujarat'),
(7, 'CFS', ' ', 'Pipavav', 'Gujarat'),
(8, 'CFS', ' ', 'Mundra', ''),
(9, 'Vera Warehouse 1', ' ', 'Mumbai', 'Maharashtra'),
(10, 'Vera Warehouse 3', ' ', 'Mumbai', 'Maharashtra'),
(11, 'Vera Warehouse 5', ' ', 'Mumbai', 'Maharashtra'),
(12, 'Vera Warehouse 6', ' ', 'Mumbai', 'Maharashtra'),
(13, 'Vera Container', ' ', 'Mumbai', 'Maharashtra'),
(14, 'Ekdas', ' ', 'Mumbai', 'Maharashtra'),
(15, 'Suri', ' ', 'Mumbai', 'Maharashtra'),
(16, 'Jiya', ' ', 'Mumbai', 'Maharashtra'),
(17, 'Anandi', ' ', 'Mumbai', 'Maharashtra'),
(18, 'Virgo', ' ', 'Mumbai', 'Maharashtra'),
(19, 'RK', ' ', 'Mumbai', 'Maharashtra'),
(20, 'Karnavati', ' ', 'Mumbai', 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `warehousestocks`
--

CREATE TABLE IF NOT EXISTS `warehousestocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `bales_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `type` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
