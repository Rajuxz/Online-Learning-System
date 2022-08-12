-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 07:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinelearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `email`, `password`) VALUES
(1, 'Raju', 'Admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_details` text NOT NULL,
  `c_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name`, `c_details`, `c_category`) VALUES
(1, 'Javascript', 'Hello world.', 'Web developments.'),
(2, 'Php', 'This is php course', 'Web Deveplopment'),
(5, 'Angular JS', 'JS for backend.', 'Web Apps and devs.'),
(6, 'C', 'C for beginner.', 'Programming'),
(7, 'React', 'Learn React JS easily.', 'Frontend Development'),
(8, 'SEO', 'This course is  for student who want to study Search Engine Optimization.', 'SEO'),
(9, 'C++', 'C++ course in details with arduino.', 'Hardware programming.');

-- --------------------------------------------------------

--
-- Table structure for table `lession`
--

CREATE TABLE `lession` (
  `lession_id` int(11) NOT NULL,
  `lession_name` varchar(255) NOT NULL,
  `lession_desc` text NOT NULL,
  `lession_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lession`
--

INSERT INTO `lession` (`lession_id`, `lession_name`, `lession_desc`, `lession_link`, `course_id`, `course_name`) VALUES
(3, 'Introduction to php', 'Php course for beginners. we will learn how to query and manipulate data using php.Hello world.', './Videos/php.mp4', 2, 'Php'),
(4, 'Introduction to javascript.', 'Getting started with JS.', './Videos/js.mp4', 1, 'Javascript'),
(5, 'Isset Function in php', 'How to use Isset Function in Php.', './Videos/videoplayback.mp4', 2, 'Php'),
(6, 'Javascript Variables. ', 'In this lesson we are going to learn about variables in JS.', './Videos/variables.mp4', 1, 'Javascript'),
(7, 'C Introduction', 'Introduction to c.', './Videos/variables.mp4', 6, 'C'),
(9, 'Introduction to javascript.', 'aewawre', './Videos/cpp.mp4', 1, 'Javascript');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sphone` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `spassword` varchar(255) NOT NULL,
  `e_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sname`, `sphone`, `semail`, `spassword`, `e_date`) VALUES
(6, 'Utsav', '9814587651', 'utsav@gmail.com', '1234rty', '2022-06-22'),
(7, 'Uttam', '9876567541', 'k@k.com', '12345', '2022-06-04'),
(8, 'Pawan', '9824908765', 'pawan@gmail.com', '12345', '2022-06-16'),
(9, 'Ramesh', '9840326051', 'Ramesh@gmail.com', '12345', '2022-06-04'),
(10, 'Prijam', '1234143123', 'prijam@gmail.com', '12345', '2022-06-28'),
(14, 'Bhupin Poudel', '9807985302', 'bhupin.poudel@gmail.com', '12345', NULL),
(15, 'Rajan', '12312313', '2a@g.com', '12345', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `lession`
--
ALTER TABLE `lession`
  ADD PRIMARY KEY (`lession_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lession`
--
ALTER TABLE `lession`
  MODIFY `lession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
