-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 04:16 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jupebhtmldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `exam_time_minutes` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `exam_time_minutes`) VALUES
('acct', 'Accounts', 15),
('agric', 'Agriculture', 25),
('biol', 'Biology', 5),
('buss', 'Business', 35),
('chem', 'Chemistry', 0),
('crs', 'CRS', 0),
('econs', 'Economics', 0),
('engl', 'English', 0),
('fren', 'French', 0),
('geog', 'Geography', 0),
('govt', 'Government', 0),
('hist', 'History', 0),
('irs', 'IRS', 0),
('litr', 'Literature', 0),
('math', 'Maths', 0),
('musc', 'Music', 0),
('phys', 'Physics', 0),
('visu', 'Visual Arts', 0),
('yoru', 'Yoruba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questions_id` int(11) NOT NULL,
  `question_fk` varchar(10) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='question foreign key (fk) links to courses table';

-- --------------------------------------------------------

--
-- Table structure for table `question_choices`
--

CREATE TABLE `question_choices` (
  `question_choices_id` int(11) NOT NULL,
  `question_choices_fk` int(11) NOT NULL,
  `choice_text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`duration`) VALUES
(35);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `first_choice` varchar(50) NOT NULL,
  `second_choice` varchar(50) NOT NULL,
  `polytechnic_college` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `e_mail`, `first_choice`, `second_choice`, `polytechnic_college`, `password`, `confirm_password`, `date_created`) VALUES
(1, 'Testing, Test', 'Testing@gmail.com', 'Testing 1', 'Testing 2', 'Testing 3', 'Testing123', 'Testing123', '0000-00-00'),
(2, '12345, 1234567', '12345@yahoo.com', '12345', '67890', '', '123qwerty', '123qwerty', '0000-00-00'),
(3, '123, 123', '123', '123', '123', NULL, '123', '123', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questions_id`),
  ADD KEY `question_fk` (`question_fk`);

--
-- Indexes for table `question_choices`
--
ALTER TABLE `question_choices`
  ADD PRIMARY KEY (`question_choices_id`),
  ADD KEY `question_choices_fk` (`question_choices_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questions_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_choices`
--
ALTER TABLE `question_choices`
  MODIFY `question_choices_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`question_fk`) REFERENCES `courses` (`course_id`) ON UPDATE CASCADE;

--
-- Constraints for table `question_choices`
--
ALTER TABLE `question_choices`
  ADD CONSTRAINT `question_choices_ibfk_1` FOREIGN KEY (`question_choices_fk`) REFERENCES `questions` (`questions_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
