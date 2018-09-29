-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg21.eigbox.net
-- Generation Time: Aug 14, 2016 at 09:30 AM
-- Server version: 5.6.31
-- PHP Version: 4.4.9
-- 
-- Database: `creattatest`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzytimeline`
-- 

CREATE TABLE `buzzytimeline` (
  `buzzytimeline_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzytimeline_date` date NOT NULL,
  `buzzytimeline_text` varchar(255) NOT NULL,
  `buzzytimeline_img` varchar(255) NOT NULL,
  `buzzyarticle_special` int(11) NOT NULL,
  PRIMARY KEY (`buzzytimeline_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- 
-- Dumping data for table `buzzytimeline`
-- 

INSERT INTO `buzzytimeline` VALUES (1, '2003-03-13', 'We have opened our restaurant and started our bussiness', 'time1.jpg', 3);
INSERT INTO `buzzytimeline` VALUES (2, '2008-05-23', 'We have 5 restaurants with 80 employees', 'time2.jpg', 3);
INSERT INTO `buzzytimeline` VALUES (3, '2014-07-24', 'We started our delivering service with online order ', 'time3.jpg', 3);
INSERT INTO `buzzytimeline` VALUES (4, '2016-03-30', 'We started doing our bussines abroad and opened our branch in Spain', 'time4.jpg', 3);
INSERT INTO `buzzytimeline` VALUES (5, '2016-06-16', 'We created our brand Creata cake', 'time5.jpg', 3);
INSERT INTO `buzzytimeline` VALUES (10, '2001-02-01', 'Graduated at faculty of economics', 'facc1.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (11, '2004-01-14', 'Started work in "Net bussines" company', 'facc2.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (12, '2009-07-07', 'Started work in San Francisco "silicium walley"', 'facc3.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (13, '2014-07-21', 'Started work in luxyry automotive industry', 'facc4.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (14, '2014-01-13', 'Create first SEO software for e-shop', 'facc5.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (15, '2015-01-07', 'Created first sport portal ', 'facc6.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (16, '2016-01-21', '100 website created', 'facc7.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (17, '2016-07-21', 'Moved bussiness office to New York', 'facc8.jpg', 4);
INSERT INTO `buzzytimeline` VALUES (18, '2011-03-09', 'We started our work and opened our agency.', 'tl1.jpg', 1);
INSERT INTO `buzzytimeline` VALUES (19, '2012-08-18', 'We started working abroad.', 'tl2.jpg', 1);
INSERT INTO `buzzytimeline` VALUES (20, '2015-08-17', 'We are employing over 200 people', 'tl3.jpg', 1);
INSERT INTO `buzzytimeline` VALUES (21, '2016-08-03', 'We have opened our office in New York', 'tl4.jpg', 1);
