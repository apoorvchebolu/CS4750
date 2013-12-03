-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2013 at 02:20 AM
-- Server version: 5.5.34-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs4750apc5fr`
--

-- --------------------------------------------------------

--
-- Table structure for table `asks`
--

CREATE TABLE IF NOT EXISTS `asks` (
  `question_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  KEY `question_id` (`question_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asks`
--

INSERT INTO `asks` (`question_id`, `session_id`) VALUES
(56, 79),
(57, 81),
(61, 80),
(62, 79),
(63, 85),
(64, 81),
(65, 86);

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE IF NOT EXISTS `attends` (
  `user_id` varchar(10) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  UNIQUE KEY `attends_unique` (`user_id`,`session_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attends`
--

INSERT INTO `attends` (`user_id`, `session_id`) VALUES
('apc5fr', 80),
('apc5fr', 81),
('jsd2ej', 80),
('jsd2ej', 81),
('kkk3ab', 81),
('kkk3ab', 83),
('kkk3ab', 85),
('ssp5en', 81),
('ssp5en', 86);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) DEFAULT NULL,
  `department_id` varchar(10) DEFAULT NULL,
  `course_number` varchar(10) DEFAULT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `class_id` (`class_id`),
  UNIQUE KEY `class_unique` (`department_id`,`course_number`,`semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `department_name`, `department_id`, `course_number`, `class_name`, `semester`) VALUES
(35, 'Computer Science ', 'CS', '4750', 'Database Systems', 'Fall 2013'),
(36, 'Computer Science', 'CS', '3330', 'Computer Architecture', 'Fall 2013'),
(38, 'Computer Science ', 'CS', '2150', 'Data Represent ', 'Fall 2013'),
(39, 'Applied Math', 'APMA', '3080', 'Linear Algebra', 'Spring 2013');

-- --------------------------------------------------------

--
-- Table structure for table `hostedAt`
--

CREATE TABLE IF NOT EXISTS `hostedAt` (
  `session_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  KEY `location_id` (`location_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostedAt`
--

INSERT INTO `hostedAt` (`session_id`, `location_id`) VALUES
(79, 15),
(80, 15),
(81, 16),
(83, 18),
(85, 19),
(86, 15);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` text,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`) VALUES
(15, 'Stacks'),
(16, 'Wilson 314'),
(18, 'Rice 514'),
(19, 'Rice 425');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` varchar(10) NOT NULL DEFAULT '',
  `password` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`) VALUES
('aaron', '5f4dcc3b5aa765d61d8327deb882cf99'),
('apc5fr', '5f4dcc3b5aa765d61d8327deb882cf99'),
('basit', '5f4dcc3b5aa765d61d8327deb882cf99'),
('jsd2ej', '5f4dcc3b5aa765d61d8327deb882cf99'),
('kkk3ab', '5f4dcc3b5aa765d61d8327deb882cf99'),
('March', '5f4dcc3b5aa765d61d8327deb882cf99'),
('ssp5en', '5f4dcc3b5aa765d61d8327deb882cf99'),
('stankovic', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Triggers `login`
--
DROP TRIGGER IF EXISTS `sync_loginandusers`;
DELIMITER //
CREATE TRIGGER `sync_loginandusers` AFTER DELETE ON `login`
 FOR EACH ROW DELETE FROM users WHERE users.user_id=OLD.user_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `myClassView`
--
CREATE TABLE IF NOT EXISTS `myClassView` (
`user_id` varchar(10)
,`class_id` int(11)
,`department_name` varchar(50)
,`department_id` varchar(10)
,`course_number` varchar(10)
,`class_name` varchar(50)
,`semester` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `mySessions`
--
CREATE TABLE IF NOT EXISTS `mySessions` (
`name_last` varchar(20)
,`class_id` int(11)
,`session_id` int(11)
,`start_time` text
,`end_time` text
,`date` text
,`location_name` text
);
-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `subject` text NOT NULL,
  `question_text` text NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `user_id`, `subject`, `question_text`) VALUES
(56, 'jsd2ej', 'Big Data', 'What is big data?'),
(57, 'jsd2ej', 'Pipe Lining', 'What is the 2nd step of pipe lining?'),
(58, 'jsd2ej', 'Test 2 ', 'What was the average of test 2?'),
(61, 'apc5fr', 'Raid', 'What is raid 1?'),
(62, 'kkk3ab', 'Raid', 'What is raid 10?'),
(63, 'kkk3ab', 'Hash Table', 'How do you make a hash table?'),
(64, 'apc5fr', 'What is an ALU?', 'Please help me'),
(65, 'ssp5en', 'Span', 'What is the span in R4?');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `start_time` text,
  `end_time` text,
  `date` text,
  PRIMARY KEY (`session_id`),
  KEY `sessions_user` (`user_id`),
  KEY `sessions_class` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `class_id`, `start_time`, `end_time`, `date`) VALUES
(79, 'Basit', 35, '9:00am', '11:30am', 'TF'),
(80, 'Basit', 35, '10:30am', '1:00am', 'MW'),
(81, 'stankovic', 36, '12:00am', '12:30am', 'MWF'),
(83, 'basit', 35, '10:00am', '12:00pm', 'F'),
(85, 'aaron', 38, '11:30am', '12:30pm', 'MWF'),
(86, 'march', 39, '11:30am', '2:30pm', 'MF');

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE IF NOT EXISTS `takes` (
  `user_id` varchar(10) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  UNIQUE KEY `takes_unique` (`user_id`,`class_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`user_id`, `class_id`) VALUES
('aaron', 38),
('apc5fr', 35),
('apc5fr', 36),
('Basit', 35),
('jsd2ej', 35),
('jsd2ej', 36),
('kkk3ab', 35),
('kkk3ab', 36),
('kkk3ab', 38),
('march', 39),
('ssp5en', 35),
('ssp5en', 36),
('ssp5en', 39),
('stankovic', 36);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(10) NOT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `name_last` varchar(20) DEFAULT NULL,
  `name_first` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name_last`, `name_first`, `email`) VALUES
('aaron', 'Professor', 'Bloomfield', 'Aaron', 'aaron@virginia.edu'),
('apc5fr', 'Student', 'Chebolu', 'Apoorv', 'apc5fr@virginia.edu'),
('basit', 'Professor', ' basit', 'Nada', 'basit@virginia.edu'),
('jsd2ej', 'Student', 'Demarchi', 'Joseph', 'jsd2ej@virginia.edu'),
('kkk3ab', 'Student', 'Kilin', 'Kevin', 'kkk3ab@virginia.edu'),
('March', 'Professor', 'March', 'June', 'march@virginia.edu'),
('ssp5en', 'Student', 'Pedy', 'Sid', 'ssp5en@virginia.edu'),
('stankovic', 'Professor', 'Stankovic', 'John', 'stankovic@virginia.edu');

-- --------------------------------------------------------

--
-- Structure for view `myClassView`
--
DROP TABLE IF EXISTS `myClassView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cs4750apc5fra`@`%` SQL SECURITY DEFINER VIEW `myClassView` AS select `takes`.`user_id` AS `user_id`,`classes`.`class_id` AS `class_id`,`classes`.`department_name` AS `department_name`,`classes`.`department_id` AS `department_id`,`classes`.`course_number` AS `course_number`,`classes`.`class_name` AS `class_name`,`classes`.`semester` AS `semester` from (`classes` join `takes` on((`takes`.`class_id` = `classes`.`class_id`))) where (`takes`.`user_id` = 'jsd2ej');

-- --------------------------------------------------------

--
-- Structure for view `mySessions`
--
DROP TABLE IF EXISTS `mySessions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cs4750apc5frb`@`%` SQL SECURITY DEFINER VIEW `mySessions` AS select `users`.`name_last` AS `name_last`,`myClassView`.`class_id` AS `class_id`,`sessions`.`session_id` AS `session_id`,`sessions`.`start_time` AS `start_time`,`sessions`.`end_time` AS `end_time`,`sessions`.`date` AS `date`,`locations`.`location_name` AS `location_name` from ((((`myClassView` join `sessions` on((`myClassView`.`class_id` = `sessions`.`class_id`))) join `users` on((`sessions`.`user_id` = `users`.`user_id`))) join `hostedAt` on((`sessions`.`session_id` = `hostedAt`.`session_id`))) join `locations` on((`hostedAt`.`location_id` = `locations`.`location_id`))) order by `myClassView`.`class_id`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asks`
--
ALTER TABLE `asks`
  ADD CONSTRAINT `asks_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asks_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attends`
--
ALTER TABLE `attends`
  ADD CONSTRAINT `attends_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostedAt`
--
ALTER TABLE `hostedAt`
  ADD CONSTRAINT `hostedAt_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostedAt_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sessions_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
