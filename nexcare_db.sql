-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 07:58 AM
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
-- Database: `nexcare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `project1_contribution` varchar(255) NOT NULL,
  `project2_contribution` varchar(255) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `quote_translation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`member_id`, `name`, `project1_contribution`, `project2_contribution`, `quote`, `quote_translation`) VALUES
(1, 'Sinan', 'Designed and developed the user interface of the about page', 'Developed the about.php dynamic page and about table', 'zinky zoogle zeep vorp beep beep', 'Be sure to take every risk. Embrace your inner alien.'),
(2, 'Sophia', 'Designed and developed the user interface of the jobs page', 'Developed the jobs.php dynamic page and jobs table', 'Fais de ta vie un rêve et d un rêve une réalité.', 'Make of your life a dream and of a dream a reality.'),
(3, 'Aadi', 'Designed and developed the user interface of the application page', 'Developed the login page and users table', 'Wort Wort Wort.', 'Go! Go! Go!'),
(4, 'Sarvesh', 'Designed and developed the user interface of the index page', 'Developed the index.php and header/footer includes', 'zip zorp zep zarp zip zurp.', 'Only through hard work can many things be accomplished.');

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `jobRef` varchar(5) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `streetAddress` varchar(40) DEFAULT NULL,
  `suburb` varchar(40) DEFAULT NULL,
  `state` varchar(3) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `otherSkills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `requirements` text NOT NULL,
  `reporting_line` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `ref_number`, `title`, `summary`, `work_type`, `location`, `salary_range`, `salary_note`, `responsibilities`, `requirements`, `reporting_line`) VALUES
(1, 'HT001', 'System Analyst', 'Improve and monitor our system activities. Work with users to improve features and test new software.', 'Full Time', 'Remote-Friendly or Office work options', '$100,000 to $110,000 per annum', 'Superannuation added', '[\"Creating and Building up a secure portal for users to use\",\"Researching and Collaborating with other Species when creating secure web applications\",\"Integrating and Complying with National Health Data Standards, including peer code review for all pull requests\",\"Monitoring our systems and responding immediately to any errors\"]', '[\"Minimum 2 years of professional developer experience\",\"Fluent in any spoken language from an Alien Species\",\"Proficiency in React, JavaScript and Node.js\",\"Written and Communication Skills\"]', 'Head of Digital Systems'),
(2, 'HT002', 'Intergalactic Software Engineer', 'Use your computer science skills in building our major applications while venturing out in space.', 'Full Time', 'Space-Station', '$150,000 to $170,000 per annum', 'Superannuation and Health Bonus added', '[\"Creating Major Application projects\",\"Collaborating with other species at Space Station to research and create new application technologies\",\"Integrating and Complying with National Health Data Standards, including peer code review for all pull requests\",\"Improving user experience and testing applications\"]', '[\"Minimum 2 years of professional developer experience\",\"Meeting ISS requirements set by NASA\",\"Fluent in any spoken language from an Alien Species\",\"Proficiency in React, JavaScript and Node.js\",\"Written and Communication Skills\"]', 'Chief Technology Officer (CTO) and Chief Astrology Engineer'),
(3, 'HT005', 'Space Software Developer ', 'Configure and Build our systems while out in space ', 'casual', 'Space', '$50,000 to $100,000 per annum', 'Superannuation added', '[\"Be responsible for our systems, including maintaining it, updating to our client needs and monitoring crucial elements\"]', '[\"10 years of comp sci\"]', 'Covenant Expert');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
