-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 08:12 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `firstname`, `lastname`, `email_address`, `gender`, `picture`, `password`) VALUES
(1838211715, 'mahtab', 'uddin', 'mahtab.u5494@gmail.com', 'male', 'saimon.jpg', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `a_id` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8_bin NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`a_id`, `answer`, `ans_id`) VALUES
(1, 'An algorithm is a series of instructions, often referred to as a “process,” which is to be followed when solving a particular problem. ', 1),
(2, 'From Small Tasks to Big Data', 1),
(3, 'Conceptual Design', 1),
(4, 'Algorithm Engineering', 1),
(5, 'tt', 2),
(6, 'ttt', 2),
(7, 'ttt', 2),
(8, 'ttt', 2),
(9, ' Storage mechanism.', 3),
(10, '\r\n    MySQL is open source software which is available at any time and has no cost involved.\r\n    \r\n   \r\n', 3),
(11, '    MySQL is portable\r\n', 3),
(12, 'GUI with command prompt.', 3),
(13, ' Administration is supported using MySQL Query Browser', 4),
(14, ' Storage mechanism.', 4),
(15, 'Locking levels', 4),
(16, ' Indexing.', 4),
(17, ' Capabilities and functions.', 5),
(18, 'Locking levels', 5),
(19, ' Indexing.', 5),
(20, ' Capabilities and functions.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `last_naem` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `email_address` varchar(225) COLLATE utf8_bin NOT NULL,
  `gender` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `first_name`, `last_naem`, `email_address`, `gender`, `picture`, `password`) VALUES
(245, 'Abed', 'Emon', 'abed@gmil.com', 'Male', NULL, 12345),
(233, 'mahtab', 'uddin', 'mahtab.u@gmail.com', 'Male', 'DSC_4286.JPG', 12345),
(236, 'Mahtab', 'Saimon', 'mahtab@gmail.com', 'Male', 'mahtab.jpg', 12345),
(232, 'Resh', 'ma', 'resh@gmail.com', 'Female', 'give.jpg', 12345),
(234, 'Sayeed', 'Hossain', 'sayeed1476@gmail.com', 'Male', 'islam.jpg', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `email_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `total_question` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `email_address`, `total_question`, `total`) VALUES
(7, 'sayeed1476@gmail.com', '5', '5'),
(8, 'mahtab.u@gmail.com', '5', '5'),
(9, 'resh@gmail.com', '5', '5'),
(10, 'abed@gmil.com', '5', '5'),
(11, 'abed@gmil.com', '5', '1'),
(12, 'abed@gmil.com', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `picture`, `description`, `product_type`) VALUES
(0, 'Product', 'neww.jpg', 'This is nice', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_bin NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question`, `ans_id`) VALUES
(1, 'What is Algorithms?', 1),
(2, 'What is tt?', 5),
(3, 'What is the syntax for concatenating tables in MySQL?', 9),
(4, 'What are the advantages of MySQL when compared with Oracle?', 13),
(5, '2. What are the technical features of MySQL? ', 17);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(22) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`) VALUES
(1, 'Algorithm'),
(2, 'Data structure'),
(3, 'Object Orient program');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`email_address`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email_address` (`email_address`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1838211716;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_email_address` FOREIGN KEY (`email_address`) REFERENCES `applicant` (`email_address`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
