-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 04:07 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crimerecordsystem`
--
CREATE DATABASE IF NOT EXISTS `crimerecordsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crimerecordsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `userid` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `password_status` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `username`, `password`, `role`, `status`, `password_status`) VALUES
('001', 'kebadu', '3ak+1iRRUC0atJloR35fTrcGweXqfPaO8BcTXXOWw7g=', 'Adminstrator', 'Active', 'changed'),
('002', 'melkamu', '3ak+1iRRUC0atJloR35fTrcGweXqfPaO8BcTXXOWw7g=', 'PreventivePolice', 'Active', 'changed'),
('003', 'lakachew', '3ak+1iRRUC0atJloR35fTrcGweXqfPaO8BcTXXOWw7g=', 'DetectiveOfficer', 'Active', 'changed'),
('004', 'yassab', '3ak+1iRRUC0atJloR35fTrcGweXqfPaO8BcTXXOWw7g=', 'PoliceHead', 'Active', 'changed'),
('005', 'azimeraw', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'HRManager', 'Active', 'changed'),
('006', 'tesfaye', '3ak+1iRRUC0atJloR35fTrcGweXqfPaO8BcTXXOWw7g=', 'Complaint', 'Active', 'changed');

-- --------------------------------------------------------

--
-- Table structure for table `accountrequest`
--

CREATE TABLE IF NOT EXISTS `accountrequest` (
  `Request_id` int(11) NOT NULL AUTO_INCREMENT,
  `police_id` varchar(50) DEFAULT NULL,
  `complaint_id` varchar(50) DEFAULT NULL,
  `description` text,
  `date` date NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `status2` varchar(50) NOT NULL,
  PRIMARY KEY (`Request_id`),
  UNIQUE KEY `complaint_id` (`complaint_id`),
  KEY `police_id` (`police_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `accountrequest`
--

INSERT INTO `accountrequest` (`Request_id`, `police_id`, `complaint_id`, `description`, `date`, `status`, `status2`) VALUES
(28, '002', '8', '	ujj				', '2020-05-18', 'seen', 'AcceptResponse'),
(29, '002', '9', 'first					', '2020-05-18', 'seen', 'AcceptResponse'),
(36, '002', '10', '	uy', '2020-05-18', 'seen', 'AcceptResponse'),
(40, '002', '14', 'hfd					', '2020-05-18', 'seen', 'AcceptResponse'),
(41, '002', '5414', '	vcxbcvb				', '2027-05-18', 'seen', 'AcceptResponse'),
(42, '002', '020', 'create user name and password 					', '2027-05-18', 'seen', 'AcceptResponse'),
(43, '001', '45854', '	rtryyyt				', '2029-05-18', 'seen', 'Responsed');

-- --------------------------------------------------------

--
-- Table structure for table `accused`
--

CREATE TABLE IF NOT EXISTS `accused` (
  `accused_id` varchar(50) NOT NULL,
  `accuser_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `educationlevel` text,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `photo` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`accused_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accused`
--

INSERT INTO `accused` (`accused_id`, `accuser_id`, `firstname`, `fathername`, `gfathername`, `sex`, `age`, `phoneno`, `educationlevel`, `email`, `status`, `kebele`, `village`, `date`, `photo`, `description`) VALUES
('01', '', 'filfilu', 'rtyui', 'fdgrthju', 'Female', 23, 96233520, 'frgtjhu', '', '', '01', 'abima', '0000-00-00', 'photo/leba sedbdeb.jpg', 'tetertiro'),
('021', '12', 'gnhj', 'fghgh', 'fghj', 'Male', 45, 2147483647, 'fghjk', 'frgthyuj', 'Active', 'rftghyui', 'frgtyhui', '2018-05-02', 'photo/adanech.jpg', 'rft5yr6u7i8'),
('103', '321', 'fdghgj', 'ghjk', 'hjkl', 'Male', 12, 934680282, 'vbnm', 'vbnm@gbh', 'Active', '03', 'bnm', '2018-05-14', 'photo/12003381_490455184457571_3755968647631163598', 'bnmhgjhgj'),
('12', '45', 'ghjyuk', 'ghyuji', 'frgtyu', 'Male', 78, 2147483647, 'gdhftgj', 'dfgthyuj', 'Active', 'rftyu', 'rtyu', '2018-05-02', 'photo/adanech.jpg', 'tyujoghyuj');

-- --------------------------------------------------------

--
-- Table structure for table `accuser`
--

CREATE TABLE IF NOT EXISTS `accuser` (
  `accuser_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `educationlevel` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`accuser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accuser`
--

INSERT INTO `accuser` (`accuser_id`, `firstname`, `fathername`, `gfathername`, `sex`, `age`, `phoneno`, `educationlevel`, `email`, `status`, `kebele`, `village`, `date`, `photo`, `description`) VALUES
('021', 'fghghjk', 'fghjk', 'fvgbhjk', 'Male', 12, 934680282, 'fghjkghj', 'vfgbhjk@df', 'Active', '02', 'vfgbhj', '2018-05-17', 'photo/12003381_490455184457571_3755968647631163598', 'xcvgbhnjmk'),
('100', 'melkamu', 'chemere', 'assefa', 'Male', 25, 3459657, 'student', 'sdfg@bkj', 'Active', '05', 'bole', '2018-05-06', 'photo/police1.jpg', 'qwaefrgth'),
('101', 'adamu', 'yigrem', 'fasil', 'Female', 12, 1025654, 'degree', 'ssdgv@sdfg', 'Active', '05', 'bole', '2018-05-09', 'photo/police1.jpg', 'fgfdg'),
('124', 'sdfgh', 'fghj', 'dfgh', 'Male', 65, 0, 'ghjdvfb', 'fgh@dcvgh', 'Active', 'gbhj', 'fvgbh', '2018-05-02', 'photo/12003381_490455184457571_3755968647631163598', 'frgthjkhjkgh'),
('65', 'rwe', 'gsdf', 'grrd', 'Male', 21, 15641, 'fdfbv', 'ffg@sdf', 'Active', 'hghgn=', 'bhg', '2018-05-29', 'photo/m.jpg', 'fdffdfd'),
('accuser_01', 'azz', 'chanie', 'mengesha', 'Male', 20, 92466545, 'debre markos', '', '', '07', 'bolie', '0000-00-00', 'photo/melkamu.jpg', 'ghjodfghj ,kjcfghj nhjgvnbnhvkh'),
('accuser_02', 'yirga', 'tesafa', 'damitew', 'Male', 34, 2147483647, 'debre markos', '', '', '02', 'kidane mihiret', '0000-00-00', 'photo/leba sedebedeb.jpg', 'ssdfghjklnm bbvvcfbh gchhcgbh vcfbhmcg gvfccfbfc vgfcvn cfcgbcgbb'),
('accuser_03', 'weyinshet ', 'amare', 'estifanos', 'Female', 27, 2147483647, 'debre markos', '', '', '04', 'silasie sefer', '2018-04-26', 'photo/sagin ayalnesh.jpg', 'retyui\r\nfghjkl\r\nghhjkl'),
('accuser_04', 'sagin mersha ', 'jemberu', 'damitew', 'Male', 21, 2147483647, 'debre markos', '', '', '03', 'bolie', '0000-00-00', 'photo/melkamu.jpg', 'fdghjergwdefrgthyjefgrhtjyfghjhkfghfjgkhjfghjjfghygjthjkkl');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`Comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `complainaccount`
--

CREATE TABLE IF NOT EXISTS `complainaccount` (
  `complain_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `edu_status` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `workplace` varchar(50) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complainrequest`
--

CREATE TABLE IF NOT EXISTS `complainrequest` (
  `complaint_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `complaintype` varchar(50) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `apointmentdate` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complainrequest`
--

INSERT INTO `complainrequest` (`complaint_id`, `firstname`, `fathername`, `gfathername`, `complaintype`, `date`, `apointmentdate`, `status`, `description`) VALUES
('8', 'asinaku', 'kebede', 'girma', 'dfghd', '30/05/2018', '2018-05-15', 'Responsed', '	fegrth					');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE IF NOT EXISTS `criminal` (
  `criminal_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `educationlevel` varchar(50) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`criminal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`criminal_id`, `firstname`, `fathername`, `gfathername`, `sex`, `age`, `phoneno`, `village`, `kebele`, `educationlevel`, `job`, `date`, `month`, `year`, `photo`) VALUES
('001', 'melkamu', 'chemere', 'assefa', 'Male', 24, 2147483647, 'dembeza', '04', 'IT 4th year', 'student', '2018-05-02', 0, 0, 'photo/m.jpg'),
('002', 'aster', 'adugnaw', 'yurga', 'Female', 32, 13651363, 'dibiza', '02', 'grade 9', 'trader', '2018-05-02', 0, 0, 'photo/police1.jpg'),
('12', 'yutyu', 'tyuu', 'tyuyuyyi', 'Male', 13, 2147483647, 'fghjk', 'fdghyuu', 'dfghgy', '', '2018-05-25', 5, 2018, 'photo/adanech.jpg'),
('121', 'ui', 'tyuu', 'tyuyuyyi', 'Male', 13, 2147483647, 'rtryu', 'rtyri', 'dfghgy', '', '2018-05-25', 5, 2018, 'photo/admin.jpg'),
('13', 'hjk', 'vbnm', 'girma', 'Male', 78, 2147483647, 'dfvbgnhjk', 'gdhtfjkl', 'erftyu6', '', '2018-05-30', 5, 2018, 'photo/adanech.jpg'),
('30', 'adamu', 'yigrem', 'fasil', 'Male', 64, 2147483647, 'fd', 'dffd', 'gdf', 'dhff', '2018-05-03', 0, 0, 'photo/adanech.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `criminalcase`
--

CREATE TABLE IF NOT EXISTS `criminalcase` (
  `criminalcase_id` int(11) NOT NULL AUTO_INCREMENT,
  `criminal_id` varchar(50) DEFAULT NULL,
  `crimetype` varchar(50) DEFAULT NULL,
  `crimelevel` varchar(50) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `RecordedDate` varchar(50) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `description` text,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`criminalcase_id`),
  KEY `criminal_id` (`criminal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `criminalcase`
--

INSERT INTO `criminalcase` (`criminalcase_id`, `criminal_id`, `crimetype`, `crimelevel`, `kebele`, `village`, `RecordedDate`, `date`, `month`, `year`, `description`, `photo`) VALUES
(22, '001', 'ghj', 'Felony', 'gfhj', 'fddhjg', '25-05-2018', '12', '12', '2018', 'xklcvbnklghj', 'photo/adanech.jpg'),
(23, '30', 'hgjkl', 'simplecrime', 'gfhj', 'hklgh', '25-05-2018', '25', '02', '2018', 'cghfghfhghfgh', 'photo/leba sedbdeb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `educationlevel` varchar(50) DEFAULT NULL,
  `officeno` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `status2` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `firstname`, `fathername`, `gfathername`, `sex`, `age`, `phoneno`, `educationlevel`, `officeno`, `email`, `status`, `photo`, `status2`) VALUES
('001', 'melkamu', 'dsfd', 'sdf', 'Female', 15, 45, 'dgtds', 0, 'gdg@gh', 'Active', '', 'hasaccount'),
('002', 'inspecter kedimu', 'fisiha', 'geremew', 'Male', 29, 955244234, 'degree', 2, 'kedimu@gmail.com', 'Active', 'photo/m.jpg', 'hasaccount'),
('003', 'sagin mersha ', 'alemayehu', 'mebratu', 'Male', 30, 955785242, 'degree', 3, 'mersha@gmail.com', 'Active', 'photo/downloadf.jpg', 'hasaccount'),
('004', 'comander selamawit', 'birhanu', 'gedamu', 'Female', 24, 945244234, 'deploma', 4, 'selam@gmail.com', 'Active', 'photo/adanech.jpg', 'hasaccount'),
('005', 'simegnish', 'mengistu', 'yaregal', 'Female', 28, 96214234, 'degree', 5, 'simegnish@gmail.com', 'Active', 'photo/sagin ayalnesh.jpg', 'hasaccount'),
('006', 'melkamu', 'kebadu', 'muluye', 'Male', 22, 976214234, 'degree', 6, 'melkamu123@gmail.com', 'Active', 'photo/police adane.jpg', 'hasaccount'),
('007', 'amanuel', 'fanueal', 'kindu', 'Male', 25, 945244234, 'deploma', 7, 'amanuel@gmail.com', 'Active', 'photo/m.jpg', 'new'),
('008', 'girma', 'agegnehu', 'yilma', 'Male', 21, 35463868, 'deploma', 6, 'sdff@cfsd', 'Active', 'photo/m.jpg', 'new'),
('009', 'aster', 'lema', 'kibrum', 'Female', 25, 6544656, 'diploma', 15, 'sdf@fghhj', 'Active', 'photo/m.jpg', 'new'),
('01', 'belay', 'kebadu', 'gada', '--Select', 42, 5475, 'dgtds', 0, 'gdg@gh', '--SelectStatus--', '', ''),
('010', 'yassab', 'tegegn', 'belay', 'Male', 51, 544545665, 'student at university', 0, 'yassab@aziz', 'Active', '', 'hasaccount'),
('020', 'alemu', 'tadess', 'kindu', 'Male', 21, 0, 'deplloma', 0, 'alemu@gmail.com', 'Active', 'photo/admin.jpg', 'new'),
('021', 'gnhj', 'fghgh', 'fghj', 'Male', 45, 2147483647, 'fghjk', 0, 'frgthyuj', 'Active', 'photo/adanech.jpg', 'new'),
('10', 'abebe', 'sd', 'tyu', 'Male', 54, 5454, 'sdgfhf', 0, 'as@xsd', 'Active', 'photo/police1.jpg', 'new'),
('100', 'melkamu', 'chemere', 'assefa', 'Male', 25, 3459657, 'student', 0, 'sdfg@bkj', 'Active', 'photo/police1.jpg', ''),
('101', 'adamu', 'yigrem', 'fasil', 'Female', 12, 1025654, 'degree', 0, 'ssdgv@sdfg', 'Active', 'photo/police1.jpg', ''),
('1010', 'hiruy', 'kebadu', 'gada', '--Select', 12, 45343545, 'gvdee', 0, 'sadf@dr', '--SelectStatus--', '', 'new'),
('11', 'dg', 'tyu', 'tyu', 'Male', 12, 1256, 'fgh', 0, 'as@xsd', 'Active', 'photo/speking.jpg', 'new'),
('12', 'ghjyuk', 'ghyuji', 'frgtyu', 'Male', 78, 2147483647, 'gdhftgj', 0, 'dfgthyuj', 'Active', 'photo/adanech.jpg', 'new'),
('121', 'nmj', 'vbnm', 'cvbghnjmk', 'Male', 21, 4556427, 'erftyu6', 0, 'gh@gbhmj', 'Active', 'photo/adanech.jpg', 'new'),
('124', 'sdfgh', 'fghj', 'dfgh', 'Male', 65, 0, 'ghjdvfb', 0, 'fgh@dcvgh', 'Active', 'photo/12003381_490455184457571_3755968647631163598', 'new'),
('14', 'dg', 'ergt', 'gfj', 'Male', 56, 454685, 'jhl', 0, 'fg@sws', 'Active', 'photo/m.jpg', 'new'),
('21', 'alene', 'bokie', 'girmaw', 'Male', 21, 5542424, 'grade12', 0, 'asd@sdsd', 'Active', 'photo/speking.jpg', 'new'),
('213', 'yassab', 'tegegn', 'belay', 'Male', 41, 45875785, 'student at university', 0, 'yassab@aziz', 'Active', 'photo/police1.jpg', 'new'),
('25', 'alene', 'dfds', 'girmaw', 'Male', 12, 155653, 'grade12', 0, 'asd@sdsd', 'Active', 'photo/speking.jpg', 'new'),
('41', 'hiruy', 'dsfd', 'gada', '--Select', 41, 415252, 'dgtds', 0, 'gdg@gh', '--SelectStatus--', '', 'new'),
('45854', 'hnmj', 'fvgbj', 'dfgh', 'Male', 44, 52745, 'hh', 0, 'hn@fvfgg', 'Active', 'photo/adanech.jpg', 'new'),
('54', 'wert5y6u7i', 'ertuy7iu', 'gtuyi', 'Female', 45, 4546565, 'gfhj', 45, 'ghhh@fd', 'Active', 'photo/adanech.jpg', 'new'),
('5414', 'melkie', 'kebie', 'siraw', 'Male', 54, 54656565, 'student', 0, 'fds@dg.com', 'Active', 'photo/adanech.jpg', 'new'),
('65', 'rwe', 'gsdf', 'grrd', 'Male', 21, 15641, 'fdfbv', 0, 'ffg@sdf', 'Active', 'photo/m.jpg', ''),
('656', 'adamu', 'tyu', 'fasil', 'Male', 21, 2147483647, 'sfdgbnh', 12, 'fgh@ncx', 'Active', 'photo/admin.jpg', 'new'),
('7', 'yassab', 'tegegn', 'belay', 'Female', 56, 42565, 'student at university', 0, 'yassab@aziz', 'Active', 'photo/police1.jpg', 'new'),
('8', 'dg', 'fgf', 'belay', 'Male', 12, 54656, 'fgh', 0, 'df@sf', 'Active', 'photo/police1.jpg', 'new'),
('9', 'zdgfvd', 'fdg', 'fdg', 'Male', 45, 46546, 'rtrdf', 0, 'dg@dsg', 'Active', 'photo/police1.jpg', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `firstinformationreport`
--

CREATE TABLE IF NOT EXISTS `firstinformationreport` (
  `FIR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `accuser_id` varchar(50) DEFAULT NULL,
  `accused_id` varchar(50) DEFAULT NULL,
  `witness_id` varchar(50) DEFAULT NULL,
  `crimetype` varchar(50) NOT NULL,
  `crimelevel` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`FIR_ID`),
  KEY `accuser_id` (`accuser_id`),
  KEY `accused_id` (`accused_id`),
  KEY `witness_id` (`witness_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `firstinformationreport`
--

INSERT INTO `firstinformationreport` (`FIR_ID`, `accuser_id`, `accused_id`, `witness_id`, `crimetype`, `crimelevel`, `description`) VALUES
(1, '100', '01', '01', 'fghj', 'Felony', '	szdxfghj				'),
(2, '100', '01', '01', 'fghj', 'Felony', '	szdxfghj				');

-- --------------------------------------------------------

--
-- Table structure for table `logfiletable`
--

CREATE TABLE IF NOT EXISTS `logfiletable` (
  `lig_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `login_time` varchar(50) DEFAULT NULL,
  `logout_time` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_performed` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`lig_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=661 ;

--
-- Dumping data for table `logfiletable`
--

INSERT INTO `logfiletable` (`lig_id`, `userid`, `username`, `role`, `login_time`, `logout_time`, `start_time`, `activity_type`, `activity_performed`, `ip_address`, `date`) VALUES
(10, '002', 'melkamu', 'PreventivePolice', '11:01:01', 'still at work', '25 May 2018 @ 11:31:48', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '25-05-2018'),
(11, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '25 May 2018 @ 11:57:07', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '25-05-2018'),
(12, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '25 May 2018 @ 11:57:15', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '25-05-2018'),
(13, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '25 May 2018 @ 11:57:17', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '25-05-2018'),
(14, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '25 May 2018 @ 11:57:18', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '25-05-2018'),
(15, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '25 May 2018 @ 11:58:02', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '25-05-2018'),
(16, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:02:31', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(17, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:02:54', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(18, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:03:10', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(19, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:04:54', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(20, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:06:44', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(21, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:06:48', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(22, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:06:50', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(23, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:06:53', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(24, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:08:04', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(25, '003', 'yassab', 'PoliceHead', '11:40:15', 'still at work', '26 May 2018 @ 12:08:06', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(26, '002', 'melkamu', 'PreventivePolice', '12:09:37', 'still at work', '26 May 2018 @ 12:09:43', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(27, '002', 'melkamu', 'PreventivePolice', '12:09:37', 'still at work', '26 May 2018 @ 12:10:09', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(28, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(29, '003', 'yassab', 'PoliceHead', '08:12:27', 'still at work', '26 May 2018 @ 08:19:54', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(30, '003', 'yassab', 'PoliceHead', '08:12:27', 'still at work', '26 May 2018 @ 08:20:03', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(31, '003', 'yassab', 'PoliceHead', '08:12:27', 'still at work', '26 May 2018 @ 08:20:08', 'police head view crime report', 'police head view crime report[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(32, '003', 'yassab', 'PoliceHead', '08:12:27', 'still at work', '26 May 2018 @ 08:21:36', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(33, '003', 'yassab', 'PoliceHead', '08:12:27', 'still at work', '26 May 2018 @ 08:26:12', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(34, '003', 'yassab', 'PoliceHead', '08:12:27', 'still at work', '26 May 2018 @ 08:30:03', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(35, '003', 'yassab', 'PoliceHead', '08:34:18', 'still at work', '26 May 2018 @ 08:35:17', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(36, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:35:57', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(37, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:38:31', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(38, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:38:33', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(39, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:38:37', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(40, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:38:43', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(41, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:38:51', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(42, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:39:05', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(43, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:39:18', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(44, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:39:24', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(45, '003', 'yassab', 'PoliceHead', '08:35:45', 'still at work', '26 May 2018 @ 08:39:38', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(46, '002', 'melkamu', 'PreventivePolice', '03:58:19', 'still at work', '26 May 2018 @ 04:00:33', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(47, '002', 'melkamu', 'PreventivePolice', '03:58:19', 'still at work', '26 May 2018 @ 04:01:02', 'View criminal', 'Preventive police View criminal recoreds[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(48, '002', 'melkamu', 'PreventivePolice', '03:58:19', 'still at work', '26 May 2018 @ 04:01:35', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(49, '002', 'melkamu', 'PreventivePolice', '03:58:19', 'still at work', '26 May 2018 @ 04:02:02', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(50, '002', 'melkamu', 'PreventivePolice', '04:04:21', 'still at work', '26 May 2018 @ 04:07:17', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(51, '003', 'yassab', 'PoliceHead', '04:10:08', 'still at work', '26 May 2018 @ 04:12:52', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(52, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:51:54', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(53, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:52:05', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(54, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:52:27', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(55, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:52:38', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(56, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:55:41', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(57, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:55:44', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(58, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:55:50', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(59, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:55:51', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(60, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 07:55:52', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(61, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 08:07:31', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(62, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 08:34:32', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(63, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 08:42:22', 'View criminal', 'Preventive police View criminal recoreds[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(64, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 08:49:40', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(65, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 08:49:41', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(66, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:01:22', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(67, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:01:27', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(68, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:01:31', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(69, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:04:12', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(70, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:06:58', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(71, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:07:02', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(72, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:09:33', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(73, '002', 'melkamu', 'PreventivePolice', '07:51:47', 'still at work', '26 May 2018 @ 09:09:39', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(74, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:12:03', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(75, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:12:50', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(76, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:12:50', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(77, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:12:56', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(78, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:13:06', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(79, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:13:09', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(80, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:13:10', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(81, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:16:25', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(82, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:16:27', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(83, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:16:32', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(84, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:20:50', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(85, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:22:19', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(86, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:22:24', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(87, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:23:41', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(88, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:24:32', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(89, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:28:03', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(90, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:29:15', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(91, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:30:20', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(92, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:32:17', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(93, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:32:27', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(94, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:32:33', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(95, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:32:41', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(96, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:34:14', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(97, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:34:15', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(98, '002', 'melkamu', 'PreventivePolice', '09:11:59', 'still at work', '26 May 2018 @ 09:34:31', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(99, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 09:52:52', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(100, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 09:52:54', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(101, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 09:52:55', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(102, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 09:52:58', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(103, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(104, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 09:53:12', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(105, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 09:53:23', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(106, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(107, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(108, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(109, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 10:07:09', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(110, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 11:07:18', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(111, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 11:08:29', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(112, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 11:16:05', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(113, '003', 'yassab', 'PoliceHead', '09:51:19', 'still at work', '26 May 2018 @ 11:18:29', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '26-05-2018'),
(114, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:38:36', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(115, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:44:14', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(116, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:44:20', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(117, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:44:33', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(118, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:45:51', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(119, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:45:52', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(120, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:45:54', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(121, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:46:26', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(122, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:46:28', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(123, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:46:30', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(124, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:46:31', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(125, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:46:33', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(126, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:46:36', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(127, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '26 May 2018 @ 11:46:39', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '26-05-2018'),
(128, '002', 'melkamu', 'PreventivePolice', '11:25:44', 'still at work', '27 May 2018 @ 12:12:18', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(129, '002', 'melkamu', 'PreventivePolice', '05:24:18', 'still at work', '27 May 2018 @ 05:38:26', 'Register Complaint', 'Preventive police Register Complaint[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(130, '002', 'melkamu', 'PreventivePolice', '05:24:18', 'still at work', '27 May 2018 @ 05:51:47', 'Register Complaint', 'Preventive police Register Complaint[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(131, '002', 'melkamu', 'PreventivePolice', '05:24:18', 'still at work', '27 May 2018 @ 05:52:52', 'Register Complaint', 'Preventive police Register Complaint[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(132, '002', 'melkamu', 'PreventivePolice', '05:24:18', 'still at work', '27 May 2018 @ 05:54:57', 'Register Complaint', 'Preventive police Register Complaint[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(133, '002', 'melkamu', 'PreventivePolice', '05:24:18', 'still at work', '27 May 2018 @ 05:56:26', 'Register Complaint', 'Preventive police Register Complaint[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(134, '002', 'melkamu', 'PreventivePolice', '05:24:18', 'still at work', '27 May 2018 @ 06:01:46', 'Send Request', 'Preventive police Request account[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(135, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:28:04', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(136, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:28:58', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(137, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:31:58', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(138, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:32:12', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(139, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:32:23', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(140, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:32:25', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(141, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:35:17', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(142, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:35:19', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(143, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:35:20', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(144, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:35:26', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(145, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:40:21', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(146, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:43:51', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(147, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:45:29', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(148, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:45:31', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(149, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:45:43', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(150, '002', 'melkamu', 'PreventivePolice', '06:27:59', 'still at work', '27 May 2018 @ 06:47:50', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(151, '002', 'melkamu', 'PreventivePolice', '06:51:24', 'still at work', '27 May 2018 @ 06:51:29', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(152, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 06:59:35', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(153, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:01:21', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(154, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:01:25', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(155, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:02:56', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(156, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:03:11', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(157, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:03:31', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(158, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:03:32', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(159, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:05:03', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(160, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:05:10', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(161, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:05:36', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(162, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:06:48', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(163, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:06:49', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(164, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:06:49', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(165, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:06:53', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(166, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:08:58', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(167, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:08:59', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(168, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:09:00', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(169, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:09:03', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(170, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:09:08', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(171, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:09:13', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(172, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:09:32', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(173, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:12:02', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(174, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:12:03', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(175, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:12:04', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(176, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:12:17', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(177, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:12:48', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(178, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:12:53', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(179, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:12:57', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(180, '002', 'melkamu', 'PreventivePolice', '06:59:29', 'still at work', '27 May 2018 @ 07:15:00', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(181, '002', 'melkamu', 'PreventivePolice', '07:15:07', 'still at work', '27 May 2018 @ 07:15:09', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(182, '002', 'melkamu', 'PreventivePolice', '07:15:07', 'still at work', '27 May 2018 @ 07:18:30', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(183, '002', 'melkamu', 'PreventivePolice', '07:15:07', 'still at work', '27 May 2018 @ 07:18:31', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(184, '002', 'melkamu', 'PreventivePolice', '07:15:07', 'still at work', '27 May 2018 @ 12:15:25', 'Register Complaint', 'Preventive police Register Complaint[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(185, '002', 'melkamu', 'PreventivePolice', '07:15:07', 'still at work', '27 May 2018 @ 12:16:05', 'Send Request', 'Preventive police Request account[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(186, '002', 'melkamu', 'PreventivePolice', '12:18:05', 'still at work', '27 May 2018 @ 12:18:14', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(187, '002', 'melkamu', 'PreventivePolice', '12:18:05', 'still at work', '27 May 2018 @ 12:18:22', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(188, '002', 'melkamu', 'PreventivePolice', '12:19:44', 'still at work', '27 May 2018 @ 12:19:56', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(189, '002', 'melkamu', 'PreventivePolice', '12:19:44', 'still at work', '27 May 2018 @ 12:20:03', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(190, '002', 'melkamu', 'PreventivePolice', '12:19:44', 'still at work', '27 May 2018 @ 12:20:04', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(191, '002', 'melkamu', 'PreventivePolice', '12:19:44', 'still at work', '27 May 2018 @ 12:20:09', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(192, '002', 'melkamu', 'PreventivePolice', '12:19:44', 'still at work', '27 May 2018 @ 12:20:10', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(193, '003', 'yassab', 'PoliceHead', '04:17:13', 'still at work', '27 May 2018 @ 04:17:25', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(194, '003', 'yassab', 'PoliceHead', '04:17:13', 'still at work', '27 May 2018 @ 04:18:43', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(195, '003', 'yassab', 'PoliceHead', '04:17:13', 'still at work', '27 May 2018 @ 04:18:49', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(196, '003', 'yassab', 'PoliceHead', '04:17:13', 'still at work', '27 May 2018 @ 04:18:53', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(197, '003', 'yassab', 'PoliceHead', '04:17:13', 'still at work', '27 May 2018 @ 04:19:02', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(198, '003', 'yassab', 'PoliceHead', '04:21:59', 'still at work', '27 May 2018 @ 04:22:01', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(199, '003', 'yassab', 'PoliceHead', '04:23:26', 'still at work', '27 May 2018 @ 04:23:28', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(200, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:24:57', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(201, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:25:22', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(202, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:25:23', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(203, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:25:29', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(204, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(205, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:27:26', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(206, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:27:29', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(207, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:27:31', 'view notification', 'Preventive police view notification[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(208, '003', 'yassab', 'PoliceHead', '04:24:56', 'still at work', '27 May 2018 @ 04:27:32', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(209, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(210, '', '', '', '', '', '', '', 'Preventive police View nomination[Police ID:,Name:]', '', ''),
(211, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:16', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(212, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:19', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(213, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:28', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(214, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:33', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(215, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:35', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(216, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:37', 'view notification', 'Preventive police view notification[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(217, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:47', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(218, '003', 'yassab', 'PoliceHead', '04:30:14', 'still at work', '27 May 2018 @ 04:30:52', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(219, '003', 'yassab', 'PoliceHead', '04:31:47', 'still at work', '27 May 2018 @ 04:31:48', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(220, '003', 'yassab', 'PoliceHead', '04:31:47', 'still at work', '27 May 2018 @ 04:31:58', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(221, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:07:18', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(222, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:08:07', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(223, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:08:31', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(224, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:08:35', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(225, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:08:39', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(226, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:08:42', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(227, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:09:06', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(228, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:09:09', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(229, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:20:13', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(230, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:20:29', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(231, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:20:42', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018');
INSERT INTO `logfiletable` (`lig_id`, `userid`, `username`, `role`, `login_time`, `logout_time`, `start_time`, `activity_type`, `activity_performed`, `ip_address`, `date`) VALUES
(232, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:21:29', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(233, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:21:52', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(234, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:22:04', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(235, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:22:06', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(236, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:22:08', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(237, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:22:21', 'police head view crime report', 'police head view crime report[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(238, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:22:29', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(239, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:22:31', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(240, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:23:32', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(241, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:24:11', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(242, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:24:27', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(243, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:24:30', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(244, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:24:41', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(245, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:24:54', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(246, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:25:05', 'police head view crime report', 'police head view crime report[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(247, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:25:18', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(248, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:25:22', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(249, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:25:59', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(250, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:26:01', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(251, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:30:09', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(252, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:39:07', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(253, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:42:59', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(254, '003', 'yassab', 'PoliceHead', '05:07:13', 'still at work', '27 May 2018 @ 05:45:47', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(255, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 05:48:40', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(256, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 05:49:46', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(257, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 05:52:52', 'police head post missing criminal', 'police head post missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(258, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 05:55:30', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(259, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:00:36', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(260, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:03:37', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(261, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:03:39', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(262, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:03:58', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(263, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:04:55', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(264, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:04:58', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(265, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:07:43', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(266, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:10:12', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(267, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:11:49', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(268, '003', 'yassab', 'PoliceHead', '05:48:03', 'still at work', '27 May 2018 @ 06:12:45', 'police head assign placement', 'police head assign placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(269, '002', 'melkamu', 'PreventivePolice', '06:23:03', 'still at work', '27 May 2018 @ 06:23:10', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(270, '002', 'melkamu', 'PreventivePolice', '06:23:03', 'still at work', '27 May 2018 @ 06:23:28', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(271, '002', 'melkamu', 'PreventivePolice', '06:23:03', 'still at work', '27 May 2018 @ 06:24:13', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(272, '003', 'yassab', 'PoliceHead', '06:25:31', 'still at work', '27 May 2018 @ 06:25:37', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(273, '003', 'yassab', 'PoliceHead', '06:25:31', 'still at work', '27 May 2018 @ 06:26:24', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(274, '002', 'melkamu', 'PreventivePolice', '06:26:36', 'still at work', '27 May 2018 @ 06:26:39', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(275, '002', 'melkamu', 'PreventivePolice', '06:26:36', 'still at work', '27 May 2018 @ 06:26:53', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(276, '003', 'yassab', 'PoliceHead', '06:27:11', 'still at work', '27 May 2018 @ 06:27:19', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(277, '003', 'yassab', 'PoliceHead', '06:27:11', 'still at work', '27 May 2018 @ 06:27:40', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(278, '002', 'melkamu', 'PreventivePolice', '06:27:51', 'still at work', '27 May 2018 @ 06:27:53', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(279, '002', 'melkamu', 'PreventivePolice', '06:27:51', 'still at work', '27 May 2018 @ 06:27:56', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '27-05-2018'),
(280, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:28:50', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(281, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:28:53', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(282, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:29:40', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(283, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:29:49', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(284, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:29:53', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(285, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:29:59', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(286, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:30:47', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(287, '003', 'yassab', 'PoliceHead', '06:28:45', 'still at work', '27 May 2018 @ 06:30:49', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '27-05-2018'),
(288, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 08:56:36', 'Register employee', 'HR manager Register employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(289, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 08:59:08', 'Register employee', 'HR manager Register employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(290, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:35', 'Register employee', 'HR manager Register employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(291, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:44', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(292, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:46', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(293, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:48', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(294, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:49', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(295, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:51', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(296, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:53', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(297, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:55', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(298, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:01:59', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(299, '007', 'azimeraw', 'HRManager', '08:13:52', 'empty', '27 May 2018 @ 09:02:01', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(300, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:02:18', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(301, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:02:25', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(302, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:02:28', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(303, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:07:43', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(304, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:10:44', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(305, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:11:29', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(306, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:12:03', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(307, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:12:14', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(308, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:12:17', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(309, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:12:32', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(310, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:12:35', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(311, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:12:36', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(312, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:12:37', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(313, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 09:21:35', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(314, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 10:23:10', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(315, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 10:23:34', 'view employee', 'HR manager view employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(316, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 10:23:36', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(317, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 10:25:28', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(318, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 10:26:21', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(319, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 10:26:48', 'update employee', 'HR manager update employee[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(320, '007', 'azimeraw', 'HRManager', '09:02:11', 'empty', '27 May 2018 @ 10:26:50', 'update employee', 'HR manager update[HRmanager:007,Name:amanuel fanueal]', '127.0.0.1', '27-05-2018'),
(321, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:22:40', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(322, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:22:43', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(323, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:22:46', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(324, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:22:48', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(325, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:22:53', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(326, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:23:45', 'police head view crime report', 'police head view crime report[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(327, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:24:41', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(328, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:24:47', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(329, '003', 'yassab', 'PoliceHead', '03:22:37', 'still at work', '28 May 2018 @ 03:25:04', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(330, '003', 'yassab', 'PoliceHead', '03:29:43', 'still at work', '28 May 2018 @ 03:30:14', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(331, '003', 'yassab', 'PoliceHead', '03:29:43', 'still at work', '28 May 2018 @ 03:31:57', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(332, '003', 'yassab', 'PoliceHead', '03:29:43', 'still at work', '28 May 2018 @ 03:33:11', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(333, '002', 'melkamu', 'PreventivePolice', '03:33:21', 'still at work', '28 May 2018 @ 03:39:25', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(334, '003', 'yassab', 'PoliceHead', '04:26:31', 'still at work', '28 May 2018 @ 04:27:09', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(335, '003', 'yassab', 'PoliceHead', '04:26:31', 'still at work', '28 May 2018 @ 04:29:30', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(336, '003', 'yassab', 'PoliceHead', '04:26:31', 'still at work', '28 May 2018 @ 04:31:24', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(337, '003', 'yassab', 'PoliceHead', '04:26:31', 'still at work', '28 May 2018 @ 04:33:39', 'Post notice', 'police head post notice[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(338, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:38:35', 'Post notice', 'police head post notice[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(339, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:50:56', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(340, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:50:58', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(341, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:51:04', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(342, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:51:08', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(343, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:51:50', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(344, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:53:43', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(345, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:54:49', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(346, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:55:07', 'View criminal', 'Preventive police View criminal recoreds[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(347, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:55:53', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(348, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:55:54', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(349, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:55:55', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(350, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:56:06', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(351, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:56:07', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(352, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:56:08', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(353, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:56:12', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(354, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 04:58:27', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(355, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:00:00', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(356, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:11:23', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(357, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:12:45', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(358, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:19:44', 'View Complaints', 'Preventive police view complaints[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(359, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:19:45', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(360, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:19:47', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(361, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:20:36', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(362, '002', 'melkamu', 'PreventivePolice', '04:35:20', 'still at work', '28 May 2018 @ 05:20:37', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(363, '002', 'melkamu', 'PreventivePolice', '05:34:43', 'still at work', '28 May 2018 @ 05:44:40', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(364, '002', 'melkamu', 'PreventivePolice', '05:34:43', 'still at work', '28 May 2018 @ 05:45:04', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(365, '002', 'melkamu', 'PreventivePolice', '05:34:43', 'still at work', '28 May 2018 @ 05:46:20', 'View Report', 'Preventive police View report[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(366, '004', 'lakachew', 'DetectiveOfficer', '05:47:00', 'still at work', '28 May 2018 @ 05:47:14', 'police head view police placement', 'police head view police placement[police head ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '28-05-2018'),
(367, '004', 'lakachew', 'DetectiveOfficer', '05:47:00', 'still at work', '28 May 2018 @ 05:50:26', 'police head view missing person', 'police head view missing person[police head ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '28-05-2018'),
(368, '004', 'lakachew', 'DetectiveOfficer', '05:47:00', 'still at work', '28 May 2018 @ 05:50:27', 'police head view missing person', 'police head view missing person[police head ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '28-05-2018'),
(369, '004', 'lakachew', 'DetectiveOfficer', '05:47:00', 'still at work', '28 May 2018 @ 05:51:52', 'police head view missing person', 'police head view missing person[police head ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '28-05-2018'),
(370, '004', 'lakachew', 'DetectiveOfficer', '05:47:00', 'still at work', '28 May 2018 @ 05:52:03', 'police head view missing person', 'police head view missing person[police head ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '28-05-2018'),
(371, '004', 'lakachew', 'DetectiveOfficer', '05:47:00', 'still at work', '28 May 2018 @ 05:52:15', 'police head view missing person', 'police head view missing person[police head ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '28-05-2018'),
(372, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 05:59:19', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(373, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 05:59:20', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(374, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 05:59:22', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(375, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 05:59:24', 'police head view police placement', 'police head view police placement[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(376, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 05:59:25', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(377, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 05:59:28', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(378, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:04:36', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(379, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:04:40', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(380, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:05:52', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(381, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:06:26', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(382, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:06:41', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(383, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:07:46', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(384, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:09:21', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(385, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:11:16', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(386, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:12:58', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(387, '', '', '', '', '', '', '', 'police head view missing person[police head ID:,Name:]', '', ''),
(388, '', '', '', '', '', '', '', 'police head view missing person[police head ID:,Name:]', '', ''),
(389, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:14:24', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(390, '', '', '', '', '', '', '', 'police head view missing person[police head ID:,Name:]', '', ''),
(391, '', '', '', '', '', '', '', 'police head view missing person[police head ID:,Name:]', '', ''),
(392, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:20:10', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(393, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:21:26', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(394, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:21:58', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(395, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:22:09', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(396, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:22:28', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(397, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:23:04', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(398, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:23:16', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(399, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:23:20', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(400, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:24:42', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(401, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:24:45', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(402, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:27:01', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(403, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:30:45', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(404, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:30:49', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(405, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:32:43', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(406, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:40:11', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(407, '003', 'yassab', 'PoliceHead', '05:59:12', 'still at work', '28 May 2018 @ 06:50:40', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(408, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:08:49', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(409, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:11:15', 'View placement', 'Preventive police View thier placement[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(410, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:12:58', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(411, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:28:25', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(412, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:31:06', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(413, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:37:42', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(414, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:47:36', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(415, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:52:06', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(416, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:52:08', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(417, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:52:56', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(418, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:52:58', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(419, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:57:18', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(420, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 07:59:03', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(421, '002', 'melkamu', 'PreventivePolice', '07:08:00', 'still at work', '28 May 2018 @ 08:02:48', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(422, '002', 'melkamu', 'PreventivePolice', '08:03:27', 'still at work', '28 May 2018 @ 08:03:34', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(423, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:05:25', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(424, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:05:26', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(425, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:05:27', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(426, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:10:00', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(427, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:11:22', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(428, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:11:25', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(429, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:11:28', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(430, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:11:43', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(431, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:14:26', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(432, '002', 'melkamu', 'PreventivePolice', '08:05:23', 'still at work', '28 May 2018 @ 08:14:27', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(433, '003', 'yassab', 'PoliceHead', '08:24:36', 'still at work', '28 May 2018 @ 08:24:50', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(434, '003', 'yassab', 'PoliceHead', '08:24:36', 'still at work', '28 May 2018 @ 08:25:05', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(435, '003', 'yassab', 'PoliceHead', '08:24:36', 'still at work', '28 May 2018 @ 08:25:18', 'view notification', 'Preventive police view notification[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(436, '003', 'yassab', 'PoliceHead', '08:24:36', 'still at work', '28 May 2018 @ 08:25:20', 'view notification', 'Preventive police view notification[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(437, '002', 'melkamu', 'PreventivePolice', '08:26:13', 'still at work', '28 May 2018 @ 08:26:16', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(438, '002', 'melkamu', 'PreventivePolice', '08:26:13', 'still at work', '28 May 2018 @ 08:26:19', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(439, '002', 'melkamu', 'PreventivePolice', '08:26:13', 'still at work', '28 May 2018 @ 08:30:56', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(440, '002', 'melkamu', 'PreventivePolice', '08:26:13', 'still at work', '28 May 2018 @ 08:31:44', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(441, '002', 'melkamu', 'PreventivePolice', '08:26:13', 'still at work', '28 May 2018 @ 08:32:01', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(442, '002', 'melkamu', 'PreventivePolice', '08:26:13', 'still at work', '28 May 2018 @ 08:35:05', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(443, '', '', '', '', '', '', '', 'police head view missing person[police head ID:,Name:inspecter kedimu fisiha]', '', ''),
(444, '', '', '', '', '', '', '', 'police head view missing person[police head ID:,Name:inspecter kedimu fisiha]', '', ''),
(445, '', '', '', '', '', '', '', 'police head view missing person[police head ID:,Name:inspecter kedimu fisiha]', '', ''),
(446, '002', 'melkamu', 'PreventivePolice', '08:26:13', 'still at work', '28 May 2018 @ 08:51:10', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(447, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:19:44', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(448, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:23:22', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(449, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:26:36', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(450, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:27:14', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(451, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:27:21', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(452, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:27:41', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(453, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:27:48', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(454, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:28:02', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018');
INSERT INTO `logfiletable` (`lig_id`, `userid`, `username`, `role`, `login_time`, `logout_time`, `start_time`, `activity_type`, `activity_performed`, `ip_address`, `date`) VALUES
(455, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:28:16', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(456, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:28:23', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(457, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:28:29', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(458, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:28:31', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(459, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:30:25', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(460, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:31:50', 'Register Criminal', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(461, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:33:26', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(462, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:33:35', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(463, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 09:48:44', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(464, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:02:40', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(465, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:03:12', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(466, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:03:15', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(467, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:03:20', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(468, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:03:36', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(469, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:06:21', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(470, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:08:10', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(471, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:08:12', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(472, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:08:34', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(473, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:08:45', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(474, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:08:48', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(475, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:08:54', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(476, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:08:56', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(477, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:21:18', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(478, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:21:26', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(479, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:22:39', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(480, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:22:46', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(481, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:22:48', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(482, '002', 'melkamu', 'PreventivePolice', '09:18:43', 'still at work', '28 May 2018 @ 10:23:01', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(483, '003', 'yassab', 'PoliceHead', '10:24:10', 'still at work', '28 May 2018 @ 10:24:49', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(484, '003', 'yassab', 'PoliceHead', '10:24:10', 'still at work', '28 May 2018 @ 10:24:54', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(485, '003', 'yassab', 'PoliceHead', '10:24:10', 'still at work', '28 May 2018 @ 10:25:03', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(486, '003', 'yassab', 'PoliceHead', '10:24:10', 'still at work', '28 May 2018 @ 10:25:49', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(487, '002', 'melkamu', 'PreventivePolice', '10:26:02', 'still at work', '28 May 2018 @ 10:27:45', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(488, '002', 'melkamu', 'PreventivePolice', '10:26:02', 'still at work', '28 May 2018 @ 10:29:21', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(489, '002', 'melkamu', 'PreventivePolice', '10:26:02', 'still at work', '28 May 2018 @ 10:36:45', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(490, '002', 'melkamu', 'PreventivePolice', '10:26:02', 'still at work', '28 May 2018 @ 10:37:04', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(491, '003', 'yassab', 'PoliceHead', '10:43:19', 'still at work', '28 May 2018 @ 10:43:33', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(492, '003', 'yassab', 'PoliceHead', '10:43:19', 'still at work', '28 May 2018 @ 10:43:38', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(493, '003', 'yassab', 'PoliceHead', '10:43:19', 'still at work', '28 May 2018 @ 10:51:00', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(494, '003', 'yassab', 'PoliceHead', '10:43:19', 'still at work', '28 May 2018 @ 10:56:10', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(495, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:01:23', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(496, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:02:02', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(497, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:05:20', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(498, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:05:43', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(499, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:05:45', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(500, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:05:47', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(501, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:06:53', 'police head view crime report', 'police head view crime report[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(502, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:07:20', 'police head view police placement', 'police head view police placement[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(503, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:07:34', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(504, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:07:53', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(505, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:08:03', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(506, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:08:05', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(507, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:08:58', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(508, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:09:00', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(509, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:09:01', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(510, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:09:03', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(511, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:09:04', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(512, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:09:50', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(513, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:10:15', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(514, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:10:50', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(515, '002', 'melkamu', 'PreventivePolice', '10:56:24', 'still at work', '28 May 2018 @ 11:11:44', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(516, '002', 'melkamu', 'PreventivePolice', '11:12:13', 'still at work', '28 May 2018 @ 11:15:47', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(517, '003', 'yassab', 'PoliceHead', '11:19:02', 'still at work', '28 May 2018 @ 11:19:07', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '28-05-2018'),
(518, '002', 'melkamu', 'PreventivePolice', '11:19:22', 'still at work', '28 May 2018 @ 11:20:44', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(519, '002', 'melkamu', 'PreventivePolice', '11:19:22', 'still at work', '28 May 2018 @ 11:22:22', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(520, '002', 'melkamu', 'PreventivePolice', '11:19:22', 'still at work', '28 May 2018 @ 11:22:43', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(521, '002', 'melkamu', 'PreventivePolice', '11:19:22', 'still at work', '28 May 2018 @ 11:23:13', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(522, '002', 'melkamu', 'PreventivePolice', '11:19:22', 'still at work', '28 May 2018 @ 11:26:59', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '28-05-2018'),
(523, '003', 'yassab', 'PoliceHead', '09:45:47', 'still at work', '29 May 2018 @ 10:00:25', 'View placement', 'Preventive police View thier placement[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(524, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:01:05', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(525, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:01:16', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(526, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:01:18', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(527, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:02:32', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(528, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:02:50', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(529, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:03:15', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(530, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:04:13', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(531, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:04:16', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(532, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:04:32', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(533, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:04:35', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(534, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:04:55', 'police head view crime report', 'police head view crime report[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(535, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:05:09', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(536, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:05:31', 'view notification', 'Preventive police view notification[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(537, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:05:35', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(538, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:05:37', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(539, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 03:11:17', 'View order', 'Preventive police view ordered by detective officer[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(540, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 04:32:41', 'View Report', 'Preventive police View report[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(541, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 04:32:47', 'View Report', 'Preventive police View report[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(542, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 04:33:01', 'View Report', 'Preventive police View report[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(543, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 04:33:30', 'View Report', 'Preventive police View report[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(544, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 04:34:08', 'view nomination', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(545, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 04:34:31', 'View Report', 'Preventive police View report[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(546, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 05:05:53', 'View order', 'Preventive police view ordered by detective officer[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(547, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 05:14:56', 'View order', 'Preventive police view ordered by detective officer[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(548, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 05:17:28', 'View order', 'Preventive police view ordered by detective officer[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(549, '003', 'yassab', 'PoliceHead', '12:36:20', 'still at work', '29 May 2018 @ 05:17:35', 'View order', 'Preventive police view ordered by detective officer[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(550, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:23:03', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(551, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:24:24', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(552, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:38:52', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(553, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:41:38', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(554, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:41:40', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(555, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:42:56', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(556, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:42:57', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(557, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:44:03', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(558, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:44:04', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(559, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 05:49:47', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(560, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 06:01:01', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(561, '002', 'melkamu', 'PreventivePolice', '05:23:00', 'still at work', '29 May 2018 @ 06:02:31', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(562, '002', 'melkamu', 'PreventivePolice', '06:02:46', 'still at work', '29 May 2018 @ 06:02:52', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(563, '002', 'melkamu', 'PreventivePolice', '06:02:46', 'still at work', '29 May 2018 @ 06:04:00', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(564, '002', 'melkamu', 'PreventivePolice', '06:02:46', 'still at work', '29 May 2018 @ 06:04:25', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(565, '001', 'kebadu', 'Adminstrator', '06:05:00', 'still at work', '29 May 2018 @ 06:05:47', 'Register Complaint', 'Preventive police Register Complaint[Police ID:001,Name:melkamu dsfd]', '127.0.0.1', '29-05-2018'),
(566, '001', 'kebadu', 'Adminstrator', '06:05:00', 'still at work', '29 May 2018 @ 06:05:54', 'Send Request', 'Preventive police Request account[Police ID:001,Name:melkamu dsfd]', '127.0.0.1', '29-05-2018'),
(567, '001', 'kebadu', 'Adminstrator', '06:05:00', 'still at work', '29 May 2018 @ 06:09:00', 'View order', 'Preventive police view ordered by detective officer[Police ID:001,Name:melkamu dsfd]', '127.0.0.1', '29-05-2018'),
(568, '002', 'melkamu', 'PreventivePolice', '06:12:30', 'still at work', '29 May 2018 @ 06:12:32', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(569, '002', 'melkamu', 'PreventivePolice', '06:12:30', 'still at work', '29 May 2018 @ 06:12:46', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(570, '002', 'melkamu', 'PreventivePolice', '06:22:20', 'still at work', '29 May 2018 @ 06:22:22', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(571, '002', 'melkamu', 'PreventivePolice', '06:22:20', 'still at work', '29 May 2018 @ 06:36:49', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(572, '002', 'melkamu', 'PreventivePolice', '06:22:20', 'still at work', '29 May 2018 @ 06:37:02', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(573, '002', 'melkamu', 'PreventivePolice', '06:22:20', 'still at work', '29 May 2018 @ 06:37:11', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(574, '003', 'yassab', 'PoliceHead', '07:09:32', 'still at work', '29 May 2018 @ 07:40:04', 'View order', 'Preventive police view ordered by detective officer[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(575, '003', 'yassab', 'PoliceHead', '07:46:08', 'still at work', '29 May 2018 @ 07:46:12', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(576, '003', 'yassab', 'PoliceHead', '07:46:08', 'still at work', '29 May 2018 @ 07:47:12', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(577, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 07:48:57', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(578, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 07:56:01', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(579, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 07:56:07', 'police head view police placement', 'police head view police placement[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(580, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 07:57:38', 'View order', 'Preventive police view ordered by detective officer[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(581, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 07:58:54', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(582, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 07:59:03', 'Register Criminal', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(583, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 07:59:21', 'Register Criminal', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(584, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 08:00:55', 'view notification', 'Preventive police view notification[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(585, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 08:01:17', 'Register Criminal', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(586, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 10:40:01', 'police head view missing person', 'police head view missing person[police head ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(587, '002', 'melkamu', 'PreventivePolice', '07:47:57', 'still at work', '29 May 2018 @ 10:40:03', 'Register Criminal', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '29-05-2018'),
(588, '003', 'yassab', 'PoliceHead', '10:44:22', 'still at work', '29 May 2018 @ 10:44:32', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(589, '003', 'yassab', 'PoliceHead', '10:44:22', 'still at work', '29 May 2018 @ 10:44:34', 'police head view employee', 'police head view employee of the station[Police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(590, '003', 'yassab', 'PoliceHead', '10:44:22', 'still at work', '29 May 2018 @ 10:44:38', 'police head view comment', 'police head view comment[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(591, '003', 'yassab', 'PoliceHead', '10:44:22', 'still at work', '29 May 2018 @ 10:44:39', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(592, '003', 'yassab', 'PoliceHead', '10:44:22', 'still at work', '29 May 2018 @ 10:51:23', 'police head view missing person', 'police head view missing person[police head ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(593, '003', 'yassab', 'PoliceHead', '10:44:22', 'still at work', '29 May 2018 @ 10:51:28', 'Register Criminal', 'Preventive police View nomination[Police ID:003,Name:sagin mersha  alemayehu]', '127.0.0.1', '29-05-2018'),
(594, '', 'melkamu', 'PreventivePolice', '09:54:27', 'still at work', '30 May 2018 @ 09:54:57', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(595, '', 'melkamu', 'PreventivePolice', '09:54:27', 'still at work', '30 May 2018 @ 09:55:01', 'View placement', 'Preventive police View thier placement[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(596, '', 'melkamu', 'PreventivePolice', '09:54:27', 'still at work', '30 May 2018 @ 09:55:12', 'View placement', 'Preventive police View thier placement[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(597, '', 'yassab', 'PoliceHead', '09:56:11', 'still at work', '30 May 2018 @ 09:56:30', 'police head view police placement', 'police head view police placement[police head ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(598, '', 'melkamu', 'PreventivePolice', '10:15:41', 'still at work', '30 May 2018 @ 10:17:13', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(599, '', 'melkamu', 'PreventivePolice', '10:15:41', 'still at work', '30 May 2018 @ 10:17:50', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(600, '', 'melkamu', 'PreventivePolice', '10:15:41', 'still at work', '30 May 2018 @ 10:17:54', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(601, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 11:50:06', 'Register Complaint', 'Preventive police Register Complaint[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(602, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 11:50:40', 'Register Criminal', 'Preventive police Register Criminal[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(603, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 12:06:13', 'View order', 'Preventive police view ordered by detective officer[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(604, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 12:32:00', 'view notification', 'Preventive police view notification[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(605, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 12:32:03', 'View placement', 'Preventive police View thier placement[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(606, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 12:32:12', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(607, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 12:32:20', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(608, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 12:32:32', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(609, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 02:28:29', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(610, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 02:29:16', 'View Report', 'Preventive police View report[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(611, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 02:29:37', 'view notification', 'Preventive police view notification[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(612, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 03:23:16', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(613, '', 'tesfaye', 'Complaint', '10:18:56', 'still at work', '30 May 2018 @ 03:23:17', 'view notification', 'Preventive police view notification[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(614, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:32:35', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(615, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:36:16', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(616, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:36:36', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(617, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:36:47', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(618, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:37:08', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(619, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:38:18', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(620, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:39:06', 'View Report', 'Preventive police View report[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(621, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:39:53', 'View placement', 'Preventive police View thier placement[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(622, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:40:37', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(623, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:41:00', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(624, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:41:08', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(625, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:43:49', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(626, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:45:59', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(627, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:48:03', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(628, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:49:06', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(629, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:54:56', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(630, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:57:45', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(631, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:57:53', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(632, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:57:54', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(633, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:58:04', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(634, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:58:08', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(635, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 03:58:25', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(636, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 04:00:31', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(637, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 04:00:32', 'view notification', 'Preventive police view notification[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(638, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 04:01:32', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(639, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 04:02:02', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(640, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 04:02:05', 'view notification', 'Preventive police view notification[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(641, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 04:02:10', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(642, '', 'melkamu', 'PreventivePolice', '03:23:28', 'still at work', '30 May 2018 @ 04:02:11', 'view notification', 'Preventive police view notification[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(643, '', 'lakachew', 'DetectiveOfficer', '04:04:08', 'still at work', '30 May 2018 @ 04:23:28', 'View criminal', 'Preventive police View criminal recoreds[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(644, '', 'lakachew', 'DetectiveOfficer', '04:04:08', 'still at work', '30 May 2018 @ 04:26:18', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(645, '', 'lakachew', 'DetectiveOfficer', '04:04:08', 'still at work', '30 May 2018 @ 04:29:03', 'View Complaints', 'Preventive police view complaints[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(646, '', 'lakachew', 'DetectiveOfficer', '04:04:08', 'still at work', '30 May 2018 @ 04:40:20', 'Register Criminal', 'Preventive police Register Criminal[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(647, '', 'lakachew', 'DetectiveOfficer', '04:04:08', 'still at work', '30 May 2018 @ 04:46:36', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(648, '', 'lakachew', 'DetectiveOfficer', '04:04:08', 'still at work', '30 May 2018 @ 05:08:47', 'View order', 'Preventive police view ordered by detective officer[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(649, '', 'lakachew', 'DetectiveOfficer', '04:04:08', 'still at work', '30 May 2018 @ 06:56:20', 'view nomination', 'Preventive police View nomination[Police ID:,Name: ]', '127.0.0.1', '30-05-2018'),
(650, '002', 'melkamu', 'PreventivePolice', '09:11:28', 'still at work', '31 May 2018 @ 09:15:16', 'Register Criminal', 'Preventive police Register Criminal[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '31-05-2018'),
(651, '002', 'melkamu', 'PreventivePolice', '09:11:28', 'still at work', '31 May 2018 @ 09:24:06', 'Register Criminal', 'Preventive police Register Criminal[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '31-05-2018'),
(652, '005', 'azimeraw', 'HRManager', '09:35:37', 'empty', '31 May 2018 @ 10:00:06', 'update employee', 'HR manager update[HRmanager:005,Name:simegnish mengistu]', '127.0.0.1', '31-05-2018'),
(653, '005', 'azimeraw', 'HRManager', '09:35:37', 'empty', '31 May 2018 @ 10:00:22', 'view employee', 'HR manager view employee[HRmanager:005,Name:simegnish mengistu]', '127.0.0.1', '31-05-2018'),
(654, '005', 'azimeraw', 'HRManager', '09:35:37', 'empty', '31 May 2018 @ 10:00:24', 'update employee', 'HR manager update[HRmanager:005,Name:simegnish mengistu]', '127.0.0.1', '31-05-2018'),
(655, '004', 'yassab', 'PoliceHead', '03:18:46', 'still at work', '01 Jun 2018 @ 03:19:22', 'Register Criminal', 'Preventive police View nomination[Police ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '01-06-2018'),
(656, '004', 'yassab', 'PoliceHead', '03:18:46', 'still at work', '01 Jun 2018 @ 03:23:31', 'police head view employee', 'police head view employee of the station[Police head ID:004,Name:comander selamawit birhanu]', '127.0.0.1', '01-06-2018'),
(657, '002', 'melkamu', 'PreventivePolice', '03:33:11', 'still at work', '01 Jun 2018 @ 03:33:13', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '01-06-2018'),
(658, '002', 'melkamu', 'PreventivePolice', '03:33:11', 'still at work', '01 Jun 2018 @ 03:35:02', 'Register Criminal', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '01-06-2018'),
(659, '002', 'melkamu', 'PreventivePolice', '03:33:11', 'still at work', '01 Jun 2018 @ 03:37:50', 'Register Criminal', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '01-06-2018'),
(660, '002', 'melkamu', 'PreventivePolice', '04:06:39', 'still at work', '01 Jun 2018 @ 04:06:41', 'view nomination', 'Preventive police View nomination[Police ID:002,Name:inspecter kedimu fisiha]', '127.0.0.1', '01-06-2018');

-- --------------------------------------------------------

--
-- Table structure for table `misssingperson`
--

CREATE TABLE IF NOT EXISTS `misssingperson` (
  `MP_Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `posting_type` varchar(50) DEFAULT NULL,
  `wereda` varchar(50) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `lostdate` datetime DEFAULT NULL,
  `postdate` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `photopath` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`MP_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `misssingperson`
--

INSERT INTO `misssingperson` (`MP_Id`, `firstname`, `fathername`, `sex`, `age`, `posting_type`, `wereda`, `kebele`, `lostdate`, `postdate`, `status`, `photopath`, `description`) VALUES
(12, 'nani', 'chemere', 'Female', 54, 'fgvfd', 'dsgvsd', 'fdgvs', '2018-05-10 01:00:00', '27-05-2018 05:45:48', 'lost', 'photo/adanech.jpg', 'dsfdsfdsf'),
(13, 'melkamu', 'goch', 'Male', 12, 'vbnm', 'vcbxcvbfhnj', 'cxvbj', '2018-05-09 01:00:00', '27-05-2018 05:48:40', 'lost', 'photo/leba sedbdeb.jpg', 'xczvcfgbnjhm'),
(14, 'nsdhdf', 'gh', 'Male', 14, 'dfhhg', 'hh', 'yyt', '2018-05-10 01:00:00', '27-05-2018 05:49:46', 'lost', 'photo/downloadf.jpg', 'teyr5tuy7iui');

-- --------------------------------------------------------

--
-- Table structure for table `nomination`
--

CREATE TABLE IF NOT EXISTS `nomination` (
  `No_Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `types` varchar(50) NOT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `village` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `description` text,
  `status` varchar(50) NOT NULL,
  `status2` varchar(50) NOT NULL,
  PRIMARY KEY (`No_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `nomination`
--

INSERT INTO `nomination` (`No_Id`, `firstname`, `fathername`, `types`, `kebele`, `village`, `date`, `description`, `status`, `status2`) VALUES
(6, 'rfwes', 'serf', 'serf', 'fr', 'rf', '2018-05-16', '		rfgsdsefr			', 'seen', ''),
(9, 'asaws', 'ee', 'ee', 'ee', 'we', '2018-05-15', '	erqrfrfef				', 'seen', ''),
(10, 'e2q3', '2344', 'sdf', 'dfgf', 'fgfg', '2018-05-09', '	gfgf				', 'seen', ''),
(13, 'gr', 'rtrt', 'wret', 'wet', 'ewtr', '2018-05-03', '	erwtw				', 'seen', ''),
(14, 'rwet', 'wert', 'wert', 'wert', 'wer', '2018-05-16', '		wert			', 'seen', ''),
(21, 'gbv', 'dfvg', 'dgv', 'dfvg', 'fdgbv', '2018-05-16', '	dfgv				', 'seen', ''),
(26, 'sadf', 'ddd', 'sdadsa', 'tu', 'sasda', '2018-05-18', '		uioyp', 'seen', ''),
(28, 'fghgh', 'fdgd', 'dfg', 'gfd', 'fdg', '2018-05-14', 'fdgdfg					', 'seen', ''),
(29, 'hfg', 'fgf', 'gfj', 'fg', 'gfjh', '2018-05-10', 'dhd', 'seen', ''),
(30, 'abebe', 'kebede', 'astaeer', 'rty', 'yhju', '2018-05-11', 'rthtrtr', 'seen', ''),
(31, 'fdtgyu', 'dfgh', 'fgh', 'fgfh', 'sfdgh', '2018-05-10', 'dfsdgjui', 'seen', ''),
(32, 'fdtgyu', 'dfgh', 'fgh', 'fgfh', 'sfdgh', '2018-05-10', 'dfsdgjui', 'seen', ''),
(33, 'fdghgj', 'fghj', 'murder', 'gbhj', 'bnm', '2018-05-09', 'dfghj', 'seen', ''),
(34, 'hh', 'ghjk', 'murder', '01', 'dfghj', '2018-05-02', 'dfghj', 'unseen', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `nominationmissingperson`
--

CREATE TABLE IF NOT EXISTS `nominationmissingperson` (
  `NMP` int(11) NOT NULL AUTO_INCREMENT,
  `MP_ID` varchar(50) NOT NULL,
  `zone` varchar(50) DEFAULT NULL,
  `woreda` varchar(50) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `status2` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`NMP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `nominationmissingperson`
--

INSERT INTO `nominationmissingperson` (`NMP`, `MP_ID`, `zone`, `woreda`, `kebele`, `village`, `date`, `status`, `status2`, `description`) VALUES
(13, '12', 'svfgbhj', 'cdfvgbhj', 'xcdfvgbh', 'dfghj', '29/05/2018', 'acceptresponced', '002', '67899768o');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `Notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `Sender` varchar(50) DEFAULT NULL,
  `post_date` varchar(50) DEFAULT NULL,
  `Exp_date` varchar(50) DEFAULT NULL,
  `file` longtext,
  PRIMARY KEY (`Notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`Notice_id`, `title`, `Sender`, `post_date`, `Exp_date`, `file`) VALUES
(11, 'meeting', 'sagin mersha  alemayehu', '05-28-2018', '2018-05-29', '       yrr6yrt5'),
(12, 'jgg', 'sagin mersha  alemayehu', '2018-05-28', '2018-05-28', '      rytrt  '),
(13, 'meeting', 'sagin mersha  alemayehu', '2018-05-28', '', '      uykfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffu  ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(50) NOT NULL,
  `accuser_id` varchar(50) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `accused_firstname` varchar(50) DEFAULT NULL,
  `accused_fathername` varchar(50) DEFAULT NULL,
  `accused_gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) NOT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `Crime_commited_dates` varchar(50) DEFAULT NULL,
  `appointment_dates` varchar(50) NOT NULL,
  `crimetype` varchar(50) NOT NULL,
  `crimelevel` varchar(50) NOT NULL,
  `description` text,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE IF NOT EXISTS `placement` (
  `placement_No` varchar(50) NOT NULL,
  `Police_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`placement_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`placement_No`, `Police_id`, `firstname`, `fathername`, `gfathername`, `sex`, `phoneno`, `kebele`, `date`, `status`) VALUES
('65', '002', 'melkamu', 'chemere', 'fasil', 'Male', 124546, 'xcdfvgbh', '2018-05-03', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `registercomplaint`
--

CREATE TABLE IF NOT EXISTS `registercomplaint` (
  `complaint_id` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `educationlevel` varchar(50) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `workplace` varchar(50) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `description` text,
  `status2` varchar(50) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registercomplaint`
--

INSERT INTO `registercomplaint` (`complaint_id`, `firstname`, `fathername`, `gfathername`, `sex`, `age`, `phoneno`, `educationlevel`, `job`, `workplace`, `kebele`, `status`, `email`, `photo`, `description`, `status2`) VALUES
('020', 'alemu', 'tadess', 'kindu', 'Male', 21, 0, 'deplloma', 'trader', 'dm', '12', 'Active', 'alemu@gmail.com', 'photo/admin.jpg', '	sdgdgdrdfgergerdffgg						', 'requested'),
('121', 'nmj', 'vbnm', 'cvbghnjmk', 'Male', 21, 4556427, 'erftyu6', 'yhu', 'dghtjykul', 'gdhtfjkl', 'Active', 'gh@gbhmj', 'photo/adanech.jpg', 'gvbjyuhk							', 'new'),
('14', 'dg', 'ergt', 'gfj', 'Male', 56, 454685, 'jhl', 'ghj', 'jh', 'fghju', 'Active', 'fg@sws', 'photo/m.jpg', '	ghj						', 'responsed'),
('45854', 'hnmj', 'fvgbj', 'dfgh', 'Male', 44, 52745, 'hh', 'ghh', 'ghh', 'hjjhj', 'Active', 'hn@fvfgg', 'photo/adanech.jpg', '	gh						', 'requested'),
('5414', 'melkie', 'kebie', 'siraw', 'Male', 54, 54656565, 'student', 'student', 'dmu', '02', 'Active', 'fds@dg.com', 'photo/adanech.jpg', 'fgffhtyyt						', 'requested'),
('8', 'dg', 'fgf', 'belay', 'Male', 12, 54656, 'fgh', 'fhfd', 'ghf', 'ghg', 'Active', 'df@sf', 'photo/police1.jpg', '	fhgfj						', 'requested'),
('9', 'zdgfvd', 'fdg', 'fdg', 'Male', 45, 46546, 'rtrdf', 'fg', 'fg', 'fg', 'Active', 'dg@dsg', 'photo/police1.jpg', 'dfdsf							', 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `responsecomplaintaccount`
--

CREATE TABLE IF NOT EXISTS `responsecomplaintaccount` (
  `Response_id` int(11) NOT NULL AUTO_INCREMENT,
  `adminstrator_id` varchar(50) DEFAULT NULL,
  `police_id` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Response_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `responsecomplaintaccount`
--

INSERT INTO `responsecomplaintaccount` (`Response_id`, `adminstrator_id`, `police_id`, `username`, `password`, `date`, `status`) VALUES
(22, '001', '002', 'username', 'password', '2027-05-18', 'acceptresponse'),
(23, '001', '002', 'alemu', '123456789', '2027-05-18', 'acceptresponse'),
(24, '001', '001', 'yu', 'ui', '2029-05-18', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

CREATE TABLE IF NOT EXISTS `witness` (
  `witness_id` varchar(50) NOT NULL,
  `accuser_id` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `gfathername` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `educationlevel` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `kebele` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`witness_id`),
  KEY `accuser_id` (`accuser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `witness`
--

INSERT INTO `witness` (`witness_id`, `accuser_id`, `firstname`, `fathername`, `gfathername`, `sex`, `age`, `phoneno`, `educationlevel`, `email`, `status`, `kebele`, `village`, `date`, `photo`, `description`) VALUES
('01', '100', 'we', 'waed', 'wda', 'Female', 21, 1453665, 'ddff', 'sdgd@wsad', 'Active', 'sdfg', 'dfg', '2018-05-01', 'photo/police1.jpg', 'frgeszatfg'),
('12', '100', 'wede', 'sad', 'asd', 'Female', 21, 21345656, 'sdaf', 'dsf@dd', 'Active', 'vgfx', 'vgdf', '2018-05-08', 'photo/speking.jpg', 'fgdgdg'),
('22', 'accuser_01', 'sdsfsd', 'dfds', 'df', 'Male', 32, 1568645, 'fdh', 'dfg@sf', 'Active', 'fg', 'dgffbvg', '2018-05-07', 'photo/police1.jpg', 'dgdsg'),
('25', '100', 'alene', 'dfds', 'girmaw', 'Male', 12, 155653, 'grade12', 'asd@sdsd', 'Active', '06', 'bole', '2018-05-02', 'photo/speking.jpg', 'vdgnb');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `accountrequest`
--
ALTER TABLE `accountrequest`
  ADD CONSTRAINT `accountrequest_ibfk_1` FOREIGN KEY (`police_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `complainrequest`
--
ALTER TABLE `complainrequest`
  ADD CONSTRAINT `complainrequest_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `registercomplaint` (`complaint_id`);

--
-- Constraints for table `criminalcase`
--
ALTER TABLE `criminalcase`
  ADD CONSTRAINT `criminalcase_ibfk_1` FOREIGN KEY (`criminal_id`) REFERENCES `criminal` (`criminal_id`);

--
-- Constraints for table `firstinformationreport`
--
ALTER TABLE `firstinformationreport`
  ADD CONSTRAINT `firstinformationreport_ibfk_1` FOREIGN KEY (`accuser_id`) REFERENCES `accuser` (`accuser_id`),
  ADD CONSTRAINT `firstinformationreport_ibfk_2` FOREIGN KEY (`accused_id`) REFERENCES `accused` (`accused_id`),
  ADD CONSTRAINT `firstinformationreport_ibfk_3` FOREIGN KEY (`witness_id`) REFERENCES `witness` (`witness_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `account` (`userid`);

--
-- Constraints for table `witness`
--
ALTER TABLE `witness`
  ADD CONSTRAINT `witness_ibfk_1` FOREIGN KEY (`accuser_id`) REFERENCES `accuser` (`accuser_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
