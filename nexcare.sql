-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 03:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `ref_number` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `work_type` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `salary_range` varchar(100) NOT NULL,
  `salary_note` varchar(255) NOT NULL,
  `responsibilities` text NOT NULL,
  `requirements` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `ref_number`, `title`, `summary`, `work_type`, `location`, `salary_range`, `salary_note`, `responsibilities`, `requirements`) VALUES
(1, 'HT001', 'System Analyst', 'Improve and monitor our system activities. Work with users to improve features and test new software.', 'Full Time', 'Remote-Friendly or Office work options', '$100,000 to $110,000 per annum', 'Superannuation added', '[\"Creating and Building up a secure portal for users to use\",\"Researching and Collaborating with other Species when creating secure web applications\",\"Integrating and Complying with National Health Data Standards, including peer code review for all pull requests\",\"Monitoring our systems and responding immediately to any errors\"]', '[\"Minimum 2 years of professional developer experience\",\"Fluent in any spoken language from an Alien Species\",\"Proficiency in React, JavaScript and Node.js\",\"Written and Communication Skills\"]'),
(2, 'HT002', 'Intergalactic Software Engineer', 'Use your computer science skills in building our major applications while venturing out in space.', 'Full Time', 'Space-Station', '$150,000 to $160,000 per annum', 'Superannuation and Health Bonus added', '[\"Creating Major Application projects\",\"Collaborating with other species at Space Station to research and create new application technologies\",\"Integrating and Complying with National Health Data Standards, including peer code review for all pull requests\",\"Improving user experience and testing applications\"]', '[\"Minimum 2 years of professional developer experience\",\"Meeting ISS requirements set by NASA\",\"Fluent in any spoken language from an Alien Species\",\"Proficiency in React, JavaScript and Node.js\",\"Written and Communication Skills\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
