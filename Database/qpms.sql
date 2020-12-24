-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 01:48 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses1`
--

CREATE TABLE `accesses1` (
  `stu_id` int(11) NOT NULL,
  `qp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accesses2`
--

CREATE TABLE `accesses2` (
  `tea_id` int(11) NOT NULL,
  `qp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accesses3`
--

CREATE TABLE `accesses3` (
  `rls_id` int(11) NOT NULL,
  `qp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`) VALUES
(1, 'RC 2016-17'),
(2, 'RC 2007-08');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(15) NOT NULL,
  `d_hod` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `d_hod`) VALUES
(1, 'Computer', 'Laxminarayan'),
(2, 'Civil', 'Gupta'),
(3, 'ETC', 'Sham'),
(4, 'Mining', 'Clyde'),
(5, 'IT', 'Ruman'),
(6, 'Mechanical', 'Omkar'),
(7, 'Electrical', 'Ram');

-- --------------------------------------------------------

--
-- Table structure for table `qp`
--

CREATE TABLE `qp` (
  `qp_id` int(11) NOT NULL,
  `rlsa_id` int(11) NOT NULL,
  `paper_code` varchar(15) NOT NULL,
  `qp_date` date NOT NULL,
  `d_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qp`
--

INSERT INTO `qp` (`qp_id`, `rlsa_id`, `paper_code`, `qp_date`, `d_id`, `sem_id`, `sub_id`, `c_id`) VALUES
(1, 1, '123', '2017-11-07', 1, 1, 1, 1),
(2, 1, '123', '2016-11-07', 3, 1, 3, 1),
(3, 1, '333', '2015-11-07', 4, 1, 4, 1),
(4, 1, '123', '2014-11-07', 5, 1, 5, 1),
(5, 1, '333', '2013-11-07', 6, 1, 6, 1),
(6, 1, '123', '2017-11-07', 1, 4, 7, 1),
(7, 1, '333', '2017-11-07', 1, 4, 7, 1),
(8, 1, '333', '2017-11-07', 1, 1, 8, 1),
(9, 1, '333', '2017-11-07', 1, 1, 9, 1),
(10, 1, '333', '2017-11-07', 2, 1, 2, 1),
(11, 1, '4232', '2018-05-17', 6, 1, 24, 1),
(12, 1, '12312', '2018-05-18', 6, 2, 15, 1),
(13, 1, '43121', '2008-05-23', 1, 3, 4, 2),
(14, 1, '3241', '2018-10-25', 1, 3, 5, 1),
(15, 1, '6542', '2018-10-23', 1, 3, 2, 1),
(16, 1, '654', '2018-10-23', 6, 2, 17, 1),
(17, 1, '4532', '2018-10-21', 6, 2, 14, 1),
(37, 1, '385', '2018-11-04', 1, 4, 8, 2),
(38, 1, '909', '2018-11-04', 2, 2, 14, 1),
(39, 1, '567', '2018-11-04', 2, 1, 22, 1),
(40, 1, '765', '2018-11-04', 1, 3, 4, 1),
(41, 1, '3221', '2018-11-04', 2, 2, 14, 1),
(42, 1, '789', '2018-11-04', 1, 4, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rls`
--

CREATE TABLE `rls` (
  `rls_id` int(11) NOT NULL,
  `rls_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rls`
--

INSERT INTO `rls` (`rls_id`, `rls_name`) VALUES
(1, 'shane'),
(2, 'ronaldo'),
(3, 'messi'),
(4, 'saurez'),
(5, 'bale');

-- --------------------------------------------------------

--
-- Table structure for table `rlsa`
--

CREATE TABLE `rlsa` (
  `rlsa_id` int(11) NOT NULL,
  `password` varchar(15) NOT NULL,
  `rls_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rlsa`
--

INSERT INTO `rlsa` (`rlsa_id`, `password`, `rls_id`) VALUES
(1, 'dbmsiscool', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `c_id`, `s_date`, `e_date`) VALUES
(1, 1, '2018-07-04', '2018-11-05'),
(2, 1, '2018-01-04', '2018-05-05'),
(3, 1, '2018-07-04', '2018-11-05'),
(4, 1, '2018-01-04', '2018-05-05'),
(5, 1, '2018-07-04', '2018-11-05'),
(6, 1, '2018-01-04', '2018-05-05'),
(7, 1, '2018-07-04', '2018-11-05'),
(8, 1, '2018-01-04', '2018-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `mname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `fname`, `mname`, `lname`, `sem_id`, `c_id`, `d_id`) VALUES
(1, 'shane', 'p', 'gracias', 1, 1, 1),
(2, 'ronaldo', 'f', 'dessai', 2, 1, 2),
(3, 'bale', 'd', 'chang', 3, 1, 3),
(4, 'benzema', 'j', 'lee', 4, 1, 4),
(5, 'isco', 'j', 'kumar', 5, 1, 5),
(6, 'modrich', 'j', 'gupta', 6, 1, 6),
(7, 'luka', 'a', 'copak', 7, 1, 7),
(8, 'kane', 's', 'rodriguez', 8, 1, 5),
(9, 'hazard', 'd', 'gomez', 1, 1, 4),
(10, 'kevin', 'r', 'coro', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_contact`
--

CREATE TABLE `student_contact` (
  `stu_id` int(11) NOT NULL,
  `s_contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_contact`
--

INSERT INTO `student_contact` (`stu_id`, `s_contact`) VALUES
(1, '9765236716'),
(2, '9765236736'),
(3, '9265236736'),
(4, '9765236756'),
(5, '9865236766'),
(6, '8765236776'),
(7, '9765236226'),
(8, '8765233716'),
(8, '9876552367'),
(9, '7765236716'),
(10, '7755236716');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(15) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `de_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sem_id`, `de_id`) VALUES
(1, 'Maths III', 3, 1),
(2, 'DSA-1', 3, 1),
(3, 'Economics', 3, 1),
(4, 'OOPD', 3, 1),
(5, 'LD', 3, 1),
(6, 'SE', 3, 1),
(7, 'Discrete Maths', 4, 1),
(8, 'MI', 4, 1),
(9, 'DSA-2', 4, 1),
(10, 'SS', 4, 1),
(11, 'CO', 4, 1),
(12, 'Java', 4, 1),
(13, 'Maths II', 2, 2),
(14, 'Chemistry', 2, 2),
(15, 'ETC', 2, 2),
(16, 'Social Science', 2, 2),
(17, 'Graphics', 2, 2),
(18, 'Workshop', 2, 2),
(19, 'Maths I', 1, 2),
(20, 'Physics', 1, 2),
(21, 'Mechanics', 1, 2),
(22, 'Electrical', 1, 2),
(23, 'Computer', 1, 2),
(24, 'English', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `mname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `fname`, `mname`, `lname`, `d_id`) VALUES
(1, 'ronaldo', 'f', 'fernandes', 1),
(2, 'anna', 'f', 'jenner', 4),
(3, 'skyle', 'f', 'rodriguez', 3),
(4, 'kim', 'f', 'cota', 2),
(5, 'marry', 'f', 'costa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_email`
--

CREATE TABLE `teacher_email` (
  `tea_id` int(11) NOT NULL,
  `t_email` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_email`
--

INSERT INTO `teacher_email` (`tea_id`, `t_email`) VALUES
(1, 'ma12@gmail.com'),
(2, 'aak12@gmail.com'),
(3, 'hell90@gmail.co'),
(4, 'fb8@gmail.com'),
(5, '666e@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`t_id`, `sub_id`) VALUES
(1, 1),
(2, 4),
(3, 3),
(4, 2),
(5, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `qp`
--
ALTER TABLE `qp`
  ADD PRIMARY KEY (`qp_id`),
  ADD KEY `rlsa_id` (`rlsa_id`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `rls`
--
ALTER TABLE `rls`
  ADD PRIMARY KEY (`rls_id`);

--
-- Indexes for table `rlsa`
--
ALTER TABLE `rlsa`
  ADD PRIMARY KEY (`rlsa_id`),
  ADD KEY `rls_id` (`rls_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD PRIMARY KEY (`stu_id`,`s_contact`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `de_id` (`de_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `teacher_email`
--
ALTER TABLE `teacher_email`
  ADD PRIMARY KEY (`tea_id`,`t_email`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`t_id`,`sub_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qp`
--
ALTER TABLE `qp`
  MODIFY `qp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `qp`
--
ALTER TABLE `qp`
  ADD CONSTRAINT `qp_ibfk_1` FOREIGN KEY (`rlsa_id`) REFERENCES `rlsa` (`rlsa_id`),
  ADD CONSTRAINT `qp_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `qp_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`),
  ADD CONSTRAINT `qp_ibfk_4` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `rlsa`
--
ALTER TABLE `rlsa`
  ADD CONSTRAINT `rlsa_ibfk_1` FOREIGN KEY (`rls_id`) REFERENCES `rls` (`rls_id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD CONSTRAINT `student_contact_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`de_id`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `teacher_email`
--
ALTER TABLE `teacher_email`
  ADD CONSTRAINT `teacher_email_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
