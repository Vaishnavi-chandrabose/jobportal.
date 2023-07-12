-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 10, 2023 at 08:19 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `submit`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `candidate`
-- 

CREATE TABLE `candidate` (
  `cid` int(11) NOT NULL auto_increment,
  `id` int(11) default NULL,
  `title` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `gender` varchar(10) default NULL,
  `qualification` varchar(255) default NULL,
  `dob` date default NULL,
  `mobile` varchar(10) default NULL,
  `resume` varchar(255) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

-- 
-- Dumping data for table `candidate`
-- 

INSERT INTO `candidate` (`cid`, `id`, `title`, `name`, `gender`, `qualification`, `dob`, `mobile`, `resume`) VALUES 
(75, 0, 'HCL', 'Vaishnavi Chandrabose', 'Female', 'MCA', '2001-04-05', '9655201022', 'English Assessment.docx'),
(76, 0, 'HCL', 'Vaishnavi Chandrabose', 'Female', 'MCA', '2001-04-05', '9655201022', 'English Assessment.docx'),
(77, 0, 'CTS', 'Vaishnavi Chandrabose', 'Female', 'BE', '2001-04-05', '9655201022', 'English Assessment.docx'),
(78, 0, 'CTS', 'Vaishnavi Chandrabose', '', 'MCA', '2001-02-01', '9655201023', 'English Assessment.docx');

-- --------------------------------------------------------

-- 
-- Table structure for table `submit`
-- 

CREATE TABLE `submit` (
  `id` int(11) NOT NULL auto_increment,
  `company` varchar(20) NOT NULL,
  `job` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `submit`
-- 

INSERT INTO `submit` (`id`, `company`, `job`, `salary`, `number`, `location`) VALUES 
(1, 'HCL', 'Software Tester', '20000', '5', 'Madurai'),
(2, 'CTS', 'Software Tester', '10000', '5', 'Chennai'),
(3, 'CTS', 'Software Tester', '35000', '2', 'Madurai'),
(4, 'HCL', 'Software Tester', '14', '1', 'Madurai'),
(10, 'ZOHO', 'Software Tester', '40000', '5', 'Tirunelveli'),
(11, 'INFOSYS', 'Software Tester', '20000', '3', 'Chennai');
