-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 11:17 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `cccse6th`
--

CREATE TABLE `cccse6th` (
  `enroll_no` bigint(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cccse6th`
--

INSERT INTO `cccse6th` (`enroll_no`, `name`) VALUES
(116403215, 'Aakash Madan'),
(216403215, 'Akash Prajapati'),
(10116403215, 'Rajat Maheshwari\r\n'),
(10216403215, 'Abhishek Malik'),
(10316403215, 'Divyansh Singhal'),
(60016403215, 'Aayush Chaudhary'),
(60116403215, 'Pranav Malik'),
(60216403215, 'Manish Yadav'),
(60316403215, 'Deepanshu Malhotra'),
(60416403215, 'Naman Chabra');

-- --------------------------------------------------------

--
-- Table structure for table `compiler_design`
--

CREATE TABLE `compiler_design` (
  `date` date NOT NULL,
  `month` text NOT NULL,
  `enrollment_no` varchar(11) NOT NULL,
  `attendance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compiler_design`
--

INSERT INTO `compiler_design` (`date`, `month`, `enrollment_no`, `attendance`) VALUES
('2017-12-18', 'Dec', '10116403215', 'Present'),
('2017-12-18', 'Dec', '10216403215', 'Present'),
('2017-12-18', 'Dec', '10316403215', 'Absent'),
('2017-12-18', 'Dec', '116403215', 'Present'),
('2017-12-18', 'Dec', '216403215', 'Present'),
('2017-12-18', 'Dec', '60016403215', 'Present'),
('2017-12-18', 'Dec', '60116403215', 'Present'),
('2017-12-18', 'Dec', '60216403215', 'Present'),
('2017-12-18', 'Dec', '60316403215', 'Present'),
('2017-12-18', 'Dec', '60416403215', 'Present'),
('2017-12-19', 'Dec', '10116403215', 'Absent'),
('2017-12-19', 'Dec', '10216403215', 'Absent'),
('2017-12-19', 'Dec', '10316403215', 'Present'),
('2017-12-19', 'Dec', '116403215', 'Absent'),
('2017-12-19', 'Dec', '216403215', 'Absent'),
('2017-12-19', 'Dec', '60016403215', 'Present'),
('2017-12-19', 'Dec', '60116403215', 'Present'),
('2017-12-19', 'Dec', '60216403215', 'Present'),
('2017-12-19', 'Dec', '60316403215', 'Present'),
('2017-12-19', 'Dec', '60416403215', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `computer_networks`
--

CREATE TABLE `computer_networks` (
  `date` date NOT NULL,
  `month` text NOT NULL,
  `enrollment_no` varchar(11) NOT NULL,
  `attendance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computer_networks`
--

INSERT INTO `computer_networks` (`date`, `month`, `enrollment_no`, `attendance`) VALUES
('2017-10-02', 'Dec', '10116403215', 'Present'),
('2017-10-02', 'Dec', '10216403215', 'Present'),
('2017-10-02', 'Dec', '10316403215', 'Present'),
('2017-10-02', 'Dec', '60016403215', 'Present'),
('2017-10-02', 'Dec', '60116403215', 'Present'),
('2017-10-02', 'Dec', '60216403215', 'Present'),
('2017-10-02', 'Dec', '60316403215', 'Present'),
('2017-10-02', 'Dec', '60416403215', 'Absent'),
('2017-12-04', 'Dec', '10116403215', 'Present'),
('2017-12-04', 'Dec', '10216403215', 'Present'),
('2017-12-04', 'Dec', '10316403215', 'Present'),
('2017-12-04', 'Dec', '116403215', 'Present'),
('2017-12-04', 'Dec', '216403215', 'Present'),
('2017-12-04', 'Dec', '60016403215', 'Present'),
('2017-12-04', 'Dec', '60116403215', 'Present'),
('2017-12-04', 'Dec', '60216403215', 'Present'),
('2017-12-04', 'Dec', '60316403215', 'Present'),
('2017-12-04', 'Dec', '60416403215', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `contact_admin`
--

CREATE TABLE `contact_admin` (
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_admin`
--

INSERT INTO `contact_admin` (`date`, `name`, `email`, `subject`, `message`) VALUES
('2017-12-20', 'Deepanshu Malhotra', 'deepanshu96@gmail.com', 'Heelo', 'admin'),
('2017-12-18', 'Divyansh Singhal', 'divyansh1802@gmail.com', 'now done', 'done!!!!'),
('2017-12-20', 'Rinkaj Goyal', 'rinkaj123@gmail.com', 'THings going wonderfully', '!!!');

-- --------------------------------------------------------

--
-- Table structure for table `rinkaj_goyal`
--

CREATE TABLE `rinkaj_goyal` (
  `date` text NOT NULL,
  `enrollment_no` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rinkaj_goyal`
--

INSERT INTO `rinkaj_goyal` (`date`, `enrollment_no`, `name`, `message`) VALUES
('2017/12/19', '10316403215', 'Divyansh Singhal', 'Hello Sir'),
('2017/12/19', '10316403215', 'Divyansh Singhal', 'Welcome Sir'),
('2017/12/19', '10316403215', 'Divyansh Singhal', 'You explained TOC beautifully SIR!!!!'),
('2017/12/20', '60316403215', 'Deepanshu Malhotra', 'Hello sir');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `enrollment_no` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `branch` text NOT NULL,
  `semester` int(11) NOT NULL,
  `class` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`enrollment_no`, `name`, `branch`, `semester`, `class`) VALUES
('10116403215', 'Rajat Maheshwari', 'CSE', 6, 'cse6th'),
('10216403215', 'Abhishek malik', 'CSE', 6, 'cse6th'),
('10316403215', 'Divyansh Singhal', 'CSE', 6, 'cse6th'),
('60016403215', 'Aayush Chaudhary', 'CSE', 6, 'cse6th'),
('60116403215', 'Pranav Malik', 'CSE', 6, 'cse6th'),
('60216403215', 'Manish Yadav', 'CSE', 6, 'cse6th'),
('60316403215', 'Deepanshu Malhotra', 'CSE', 6, 'cse6th'),
('60416403215', 'Naman Chabra', 'CSE', 6, 'cse6th');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_name` text NOT NULL,
  `code` int(11) NOT NULL,
  `class` text NOT NULL,
  `teacher` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_name`, `code`, `class`, `teacher`) VALUES
('Database Managment Systems', 15211, 'cse3rd', 'Khyati Ahlawat'),
('Software Engineering', 15212, 'cse4th', 'Khyati Ahlawat'),
('Theory Of Computation', 15301, 'cse6th', 'Rinkaj Goyal'),
('Microprocessor', 15302, 'cse6th', 'Shweta Dabas'),
('Computer Networks', 15304, 'cse6th', 'Rinkaj Goyal'),
('Algorithm Analysis And Design', 15306, 'cse6th', 'Rinkaj Goyal'),
('Compiler Design', 15308, 'cse6th', 'Khyati Ahlawat'),
('Operating System', 15310, 'cse6th', 'Parijat Mathur');

-- --------------------------------------------------------

--
-- Table structure for table `theory_of_computation`
--

CREATE TABLE `theory_of_computation` (
  `date` date NOT NULL,
  `month` text NOT NULL,
  `enrollment_no` varchar(11) NOT NULL,
  `attendance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theory_of_computation`
--

INSERT INTO `theory_of_computation` (`date`, `month`, `enrollment_no`, `attendance`) VALUES
('2017-11-24', 'November', '10116403215', 'Present'),
('2017-11-24', 'November', '10216403215', 'Present'),
('2017-11-24', 'November', '10316403215', 'Present'),
('2017-11-24', 'November', '60016403215', 'Present'),
('2017-11-24', 'November', '60116403215', 'Present'),
('2017-11-24', 'November', '60216403215', 'Present'),
('2017-11-24', 'November', '60316403215', 'Present'),
('2017-11-24', 'November', '60416403215', 'Present'),
('2017-12-22', 'December', '10116403215', 'Present'),
('2017-12-22', 'December', '10216403215', 'Present'),
('2017-12-22', 'December', '10316403215', 'Absent'),
('2017-12-22', 'December', '60016403215', 'Absent'),
('2017-12-22', 'December', '60116403215', 'Absent'),
('2017-12-22', 'December', '60216403215', 'Present'),
('2017-12-22', 'December', '60316403215', 'Present'),
('2017-12-22', 'December', '60416403215', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `college` text NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `name`, `email`, `username`, `password`, `role`, `college`, `photo`) VALUES
(203, 'Rinkaj Goyal', 'rinkaj123@gmail.com', 'rinkaj', 'goyal', 'Faculty', 'UNIVERSITY SCHOOL OF INFORMATION, COMMUNICATION & TECHNOLOGY', 0x31643166346439383938353034343235613038666534376432643135633839622e6a70672e323030783230305f7139355f63726f705f64657461696c5f75707363616c652e6a7067),
(10216403215, 'Abhishek Malik', 'malikabhiskhek273@gmail.com', 'amalik123', 'malik273', 'Student', 'UNIVERSITY SCHOOL OF INFORMATION, COMMUNICATION & TECHNOLOGY', ''),
(10316403200, 'Shweta Dabas', 'shweta000@gmail.com', 'shweta', 'dabas', 'Faculty', 'UNIVERSITY SCHOOL OF INFORMATION, COMMUNICATION & TECHNOLOGY', ''),
(10316403215, 'Divyansh Singhal', 'divyansh1802@gmail.com', 'divyansh1802', 'div', 'Student', 'UNIVERSITY SCHOOL OF INFORMATION, COMMUNICATION & TECHNOLOGY', 0x57494e5f32303136313130395f31325f35315f32325f50726f2e6a7067),
(12456789145, 'Rahul Gujjar', 'rahulgujjar128@gmail.com', 'lefti', 'cricket', 'Student', 'UNIVERSITY SCHOOL OF LAW AND LEGAL STUDIES', ''),
(60316403215, 'Deepanshu Malhotra', 'deepanshu96@gmail.com', 'deepu', 'dove', 'Student', 'UNIVERSITY SCHOOL OF INFORMATION, COMMUNICATION & TECHNOLOGY', ''),
(78945612378, 'Khyati Ahlawat', 'khyati12@gmail.com', 'khyati', 'Ahlawat', 'Faculty', 'UNIVERSITY SCHOOL OF INFORMATION, COMMUNICATION & TECHNOLOGY', 0x6b68796174692e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cccse6th`
--
ALTER TABLE `cccse6th`
  ADD PRIMARY KEY (`enroll_no`);

--
-- Indexes for table `compiler_design`
--
ALTER TABLE `compiler_design`
  ADD PRIMARY KEY (`date`,`enrollment_no`);

--
-- Indexes for table `computer_networks`
--
ALTER TABLE `computer_networks`
  ADD PRIMARY KEY (`date`,`enrollment_no`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`name`,`subject`);

--
-- Indexes for table `rinkaj_goyal`
--
ALTER TABLE `rinkaj_goyal`
  ADD PRIMARY KEY (`enrollment_no`,`message`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`enrollment_no`,`class`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `theory_of_computation`
--
ALTER TABLE `theory_of_computation`
  ADD PRIMARY KEY (`date`,`enrollment_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
