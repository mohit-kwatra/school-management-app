-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_school`
--
CREATE DATABASE IF NOT EXISTS `my_school` DEFAULT CHARACTER SET utf8mb4;
USE `my_school`;

-- --------------------------------------------------------

--
-- Table structure for table `fee_status`
--

CREATE TABLE `fee_status` (
  `student_roll_no` int NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Not Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_status`
--

INSERT INTO `fee_status` (`student_roll_no`, `status`) VALUES
(12001, 'Paid'),
(11001, 'Paid'),
(12002, 'Not Paid'),
(12003, 'Paid'),
(12004, 'Not Paid'),
(12005, 'Not Paid');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `student_roll_no` int NOT NULL,
  `term_1_english` int NOT NULL DEFAULT '0',
  `term_1_hindi` int NOT NULL DEFAULT '0',
  `term_1_accountancy` int NOT NULL DEFAULT '0',
  `term_1_business_studies` int NOT NULL DEFAULT '0',
  `term_1_mathematics` int NOT NULL DEFAULT '0',
  `term_2_english` int NOT NULL DEFAULT '0',
  `term_2_hindi` int NOT NULL DEFAULT '0',
  `term_2_accountancy` int NOT NULL DEFAULT '0',
  `term_2_business_studies` int NOT NULL DEFAULT '0',
  `term_2_mathematics` int NOT NULL DEFAULT '0',
  `half_yearly_english` int NOT NULL DEFAULT '0',
  `half_yearly_hindi` int NOT NULL DEFAULT '0',
  `half_yearly_accountancy` int NOT NULL DEFAULT '0',
  `half_yearly_business_studies` int NOT NULL DEFAULT '0',
  `half_yearly_mathematics` int NOT NULL DEFAULT '0',
  `term_3_english` int NOT NULL DEFAULT '0',
  `term_3_hindi` int NOT NULL DEFAULT '0',
  `term_3_accountancy` int NOT NULL DEFAULT '0',
  `term_3_business_studies` int NOT NULL DEFAULT '0',
  `term_3_mathematics` int NOT NULL DEFAULT '0',
  `finals_english` int NOT NULL DEFAULT '0',
  `finals_hindi` int NOT NULL DEFAULT '0',
  `finals_accountancy` int NOT NULL DEFAULT '0',
  `finals_business_studies` int NOT NULL DEFAULT '0',
  `finals_mathematics` int NOT NULL DEFAULT '0'
) ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`student_roll_no`, `term_1_english`, `term_1_hindi`, `term_1_accountancy`, `term_1_business_studies`, `term_1_mathematics`, `term_2_english`, `term_2_hindi`, `term_2_accountancy`, `term_2_business_studies`, `term_2_mathematics`, `half_yearly_english`, `half_yearly_hindi`, `half_yearly_accountancy`, `half_yearly_business_studies`, `half_yearly_mathematics`, `term_3_english`, `term_3_hindi`, `term_3_accountancy`, `term_3_business_studies`, `term_3_mathematics`, `finals_english`, `finals_hindi`, `finals_accountancy`, `finals_business_studies`, `finals_mathematics`) VALUES
(12001, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 70, 70, 70, 70, 70, 10, 10, 10, 10, 10, 100, 100, 100, 100, 100),
(11001, 10, 4, 8, 8, 10, 10, 6, 10, 8, 10, 63, 44, 66, 61, 55, 10, 6, 9, 7, 8, 91, 72, 89, 91, 85);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `roll_no` int NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(1) NOT NULL,
  `category` varchar(5) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `grade` int NOT NULL,
  `status` int NOT NULL,
  `address` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`roll_no`, `fname`, `lname`, `mother_name`, `father_name`, `dob`, `gender`, `category`, `mobile`, `grade`, `status`, `address`, `date_created`) VALUES
(11001, 'Rohanpreet', 'Singh', 'Rajdeep Singh', 'Kuldev Singh', '2000-01-01', 'M', 'GEN', '0154-12345', 11, 1, 'India', '2022-04-18 20:48:29'),
(12001, 'Anmol', 'Khunger', 'Miss Khunger', 'Rajendra Khunger', '2001-01-06', 'M', 'GEN', '0154-123456', 12, 1, 'Sri Ganganagar, Rajasthan, India', '2022-04-18 17:48:34'),
(12002, 'Ahalad', 'Sharma', 'Miss Sharma', 'Mr. Sharma', '2004-01-01', 'M', 'GEN', '0154-12345', 12, 0, 'Canada', '2022-04-18 20:53:02'),
(12003, 'Harsh', 'Modi', 'Mrs. Modi', 'Mr. Modi', '2000-02-02', 'M', 'GEN', '+919680854556', 12, 0, 'Sri Ganganagar, Rajasthan, India', '2022-04-20 11:56:17'),
(12004, 'Navjot', 'Singh', 'Mrs. Singh', 'Mr. Singh', '2001-03-07', 'M', 'GEN', '+919413345678', 12, 1, 'Ganganagar, Rajasthan, India', '2022-04-20 11:58:05'),
(12005, 'Harsh', 'Bansal', 'Mrs. Bansal', 'Mr. Bansal', '2000-01-01', 'M', 'GEN', '+919828543566', 12, 1, 'SGNR, Rajasthan, India', '2022-04-20 11:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(1) NOT NULL,
  `category` varchar(5) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `subjects` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `address` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fname`, `lname`, `father_name`, `email`, `dob`, `gender`, `category`, `mobile`, `subjects`, `status`, `address`, `date_created`) VALUES
(101, 'Pooja', 'Wasan', 'Mr. Wasan', 'something@gmail.com', '1997-04-04', 'F', 'GEN', '+911234567890', 'Accountancy', 1, 'Sri Ganganagar, Rajasthan, India', '2022-04-20 09:53:12'),
(102, 'Bhupendra', 'Nagar', 'Mr. Nagar', 'someone@gmail.com', '1979-02-02', 'M', 'GEN', '+919445634566', 'Hindi', 1, 'SGNR, India', '2022-04-20 12:02:12'),
(103, 'Pawan', 'Sharma', 'Mr. Sharma', 'pawan@yahoo.co', '1980-01-01', 'M', 'GEN', '+919345565432', 'Mathematics', 1, 'Sri Ganganagar, India', '2022-04-20 12:06:41'),
(104, 'Ajay', 'Jandhu', 'Mr. Jandhu', 'another@gmail.com', '1976-05-06', 'M', 'GEN', '+919413312345', 'Geography', 1, 'SGNR, India', '2022-04-20 12:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(512) NOT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `date_created`, `email`) VALUES
(1, 'admin', '$2y$10$PTP/fw.D56RBG40VCb7xrOYdyu.qsHvlyKzOib0JtTHt.s29QNXcW', 1, '2022-04-17 21:30:48', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fee_status`
--
ALTER TABLE `fee_status`
  ADD KEY `student_roll_no` (`student_roll_no`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD KEY `student_roll_no` (`student_roll_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee_status`
--
ALTER TABLE `fee_status`
  ADD CONSTRAINT `fee_status_ibfk_1` FOREIGN KEY (`student_roll_no`) REFERENCES `students` (`roll_no`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`student_roll_no`) REFERENCES `students` (`roll_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
