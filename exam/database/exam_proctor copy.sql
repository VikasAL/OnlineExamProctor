-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 07:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tbl`
--

-- INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `cou_created`) VALUES
-- (1, 'DBMS', '2021-06-27 09:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `exmne_fullname` varchar(1000) NOT NULL,
  `exmne_course` varchar(1000) NOT NULL,
  `exmne_gender` varchar(1000) NOT NULL,
  `exmne_birthdate` varchar(1000) NOT NULL,
  `exmne_year_level` varchar(1000) NOT NULL,
  `exmne_email` varchar(1000) NOT NULL,
  `exmne_password` varchar(1000) NOT NULL,
  `exmne_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examinee_tbl`
--

-- INSERT INTO `examinee_tbl` (`exmne_id`, `exmne_fullname`, `exmne_course`, `exmne_gender`, `exmne_birthdate`, `exmne_year_level`, `exmne_email`, `exmne_password`, `exmne_status`) VALUES
-- (1, 'Viaks A L', '1', 'male', '2021-06-27', 'third year', 'vikas@gmail.com', 'vikas', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answers`
--

-- INSERT INTO `exam_answers` (`exans_id`, `exmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
-- (295, 4, 12, 25, 'Diode, inverted, pointer', 'old', '2019-12-07 02:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_attempt`
--

-- INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
-- (51, 6, 12, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question_tbl`
--

-- INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
-- (9, 12, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', '1850s', '1880s', '1930s', '1950s', '1880s', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_tbl`
--

-- INSERT INTO `exam_tbl` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
-- (11, 26, 'Duerms', '1', 2, 'qwe', '2019-12-05 12:03:21'),
-- (12, 26, 'Another Exam', '1', 5, 'Mabilisang Exam', '2019-12-04 15:19:18'),
-- (13, 26, 'Exam Again', '5', 0, 'again and again\r\n', '2019-11-30 08:24:54'),
-- (24, 65, 'math', '10', 5, 'basic math', '2020-01-12 05:04:45'),
-- (25, 65, 'math 2', '10', 3, 'basic math 2', '2020-01-12 05:08:44'),
-- (26, 65, 'math3', '10', 3, 'basic math3', '2020-01-12 05:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks_tbl`
--

-- INSERT INTO `feedbacks_tbl` (`fb_id`, `exmne_id`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
-- (4, 6, 'Glenn Duerme', 'Gwapa kay Miss Pam', 'December 05, 2019'),
-- (5, 6, 'Anonymous', 'Lageh, idol na nako!', 'December 05, 2019'),
-- (6, 4, 'Rogz Nunezsss', 'Yes', 'December 08, 2019'),
-- (7, 4, '', '', 'December 08, 2019'),
-- (8, 4, '', '', 'December 08, 2019'),
-- (9, 8, 'Anonymous', 'dfsdf', 'January 05, 2020'),
-- (10, 9, 'warren dalaoyan', 'haah', 'January 12, 2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
-- ALTER TABLE `admin_acc`
--   ADD PRIMARY KEY (`admin_id`);

-- --
-- -- Indexes for table `course_tbl`
-- --
-- ALTER TABLE `course_tbl`
--   ADD PRIMARY KEY (`cou_id`);

-- --
-- -- Indexes for table `examinee_tbl`
-- --
-- ALTER TABLE `examinee_tbl`
--   ADD PRIMARY KEY (`exmne_id`);

-- --
-- -- Indexes for table `exam_answers`
-- --
-- ALTER TABLE `exam_answers`
--   ADD PRIMARY KEY (`exans_id`);

-- --
-- -- Indexes for table `exam_attempt`
-- --
-- ALTER TABLE `exam_attempt`
--   ADD PRIMARY KEY (`examat_id`);

-- --
-- -- Indexes for table `exam_question_tbl`
-- --
-- ALTER TABLE `exam_question_tbl`
--   ADD PRIMARY KEY (`eqt_id`);

-- --
-- -- Indexes for table `exam_tbl`
-- --
-- ALTER TABLE `exam_tbl`
--   ADD PRIMARY KEY (`ex_id`);

-- --
-- -- Indexes for table `feedbacks_tbl`
-- --
-- ALTER TABLE `feedbacks_tbl`
--   ADD PRIMARY KEY (`fb_id`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `admin_acc`
-- --
-- ALTER TABLE `admin_acc`
--   MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --
-- -- AUTO_INCREMENT for table `course_tbl`
-- --
-- ALTER TABLE `course_tbl`
--   MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

-- --
-- -- AUTO_INCREMENT for table `examinee_tbl`
-- --
-- ALTER TABLE `examinee_tbl`
--   MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- --
-- -- AUTO_INCREMENT for table `exam_answers`
-- --
-- ALTER TABLE `exam_answers`
--   MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

-- --
-- -- AUTO_INCREMENT for table `exam_attempt`
-- --
-- ALTER TABLE `exam_attempt`
--   MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

-- --
-- -- AUTO_INCREMENT for table `exam_question_tbl`
-- --
-- ALTER TABLE `exam_question_tbl`
--   MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

-- --
-- -- AUTO_INCREMENT for table `exam_tbl`
-- --
-- ALTER TABLE `exam_tbl`
--   MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

-- --
-- -- AUTO_INCREMENT for table `feedbacks_tbl`
-- --
-- ALTER TABLE `feedbacks_tbl`
--   MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
