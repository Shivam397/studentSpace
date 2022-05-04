-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 01:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db123`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isVerified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `isVerified`) VALUES
(0, 'srinidhi', 'shrinidhipainuly@gmail.com', 'srinidhi', 1),
(1, 'shivam', 'shivamsawarni554@gmail.com', 'admin', 1),
(2, 'shambhavi', 'shambhavi7653@gmail.com', 'shambhavi', 1),
(3, 'sejal ', 'sejalsrivastava949@gmail.com', 'sejal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bt`
--

CREATE TABLE `bt` (
  `bt_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` varchar(100) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'java', 'what is JSP?', '2022-04-28'),
(2, 'python', 'db', '2022-04-28'),
(3, 'python', 'hello python', '2022-04-30'),
(4, 'dbms', 'database', '2022-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `chem`
--

CREATE TABLE `chem` (
  `chem_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `pdf` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chem`
--

INSERT INTO `chem` (`chem_id`, `username`, `subject`, `pdf`) VALUES
(1, 'shilu', 'CPC', '1913103_CS317.pdf'),
(2, 'shilu', 'FPE', 'BTech(CSIT).pdf'),
(3, 'shilu', 'NST', '1913103_VOC015_Assg1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'bss karo', '2022-04-24 15:24:36', '2022-04-24 17:24:17'),
(1, 2, 2, 'bss karo', '2022-04-24 15:24:40', '2022-04-24 17:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `cs_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`cs_id`, `username`, `subject`, `pdf`) VALUES
(3, 'shilu', 'DCN', '13. IPv6.pdf'),
(4, 'shilu', 'DAA', '7. Lecture 22.pdf'),
(5, 'shilu', 'SP', 'elitmus_elitmus_admit_card_24apr2022.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ece`
--

CREATE TABLE `ece` (
  `ece_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ee`
--

CREATE TABLE `ee` (
  `ee_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ei`
--

CREATE TABLE `ei` (
  `ei_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mt`
--

CREATE TABLE `mt` (
  `mt_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `doe` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `doe`, `description`, `pdf`) VALUES
(1, '2-02-2022', 'Team Meraki Recruitments', 'Team Meraki.pdf'),
(2, '5-03-2022', 'Semester results are out', 'Semester results 2021.pdf'),
(3, '23-03-2022', 'LeanIn Banasthali', 'LeanIn Banasthali.pdf'),
(4, '1-02-2022', 'Admission Info', 'Admission Advt 2022-2023.pdf'),
(10, '2022-04-21', 'Hello world', '6. Lecture 14.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `others_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_file`
--

CREATE TABLE `pdf_file` (
  `id` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `pdf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf_file`
--

INSERT INTO `pdf_file` (`id`, `branch`, `pdf`) VALUES
(1, 'EE', 'BTech 3rd year EE.pdf'),
(2, 'BT', 'BTech 3rd year BT.pdf'),
(3, 'ECE', 'BTech 3rd year ECE.pdf'),
(7, 'EI', 'BTech 3rd year EI.pdf'),
(8, 'MT', 'BTech 3rd year MT.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `created_at`, `updated_at`) VALUES
(1, 'hello', 'bss kro yaar', 'hadd ho gyi', '2022-04-24 15:17:57', '2022-04-24 17:17:27'),
(1, 'hello', 'bss kro yaar', 'hadd ho gyi', '2022-04-24 15:18:03', '2022-04-24 17:17:27'),
(2, 'hadd hoti hai', 'bss', 'main preshan ho gyi', '2022-04-24 15:21:17', '2022-04-24 17:20:47'),
(2, 'hadd hoti hai', 'bss', 'main preshan ho gyi', '2022-04-24 15:21:21', '2022-04-24 17:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `email`, `mobile`) VALUES
(1, 'Vice-Chancellor', 'vc@banasthali.in', '01438-228787'),
(2, 'Dean Administration', 'deanadmin@banasthali.ac.in', '01438-228456'),
(3, 'Examination Section', 'exam@banasthali.in', '01438-228787'),
(4, 'Finance & Accounts', 'lekhavibhag@banasthali.in', '0143-228546 228644'),
(5, 'Examination Section', 'exam@banasthali.in', '01438-228787'),
(9, 'Results Section', 'results@banasthali.in', '01438-228950');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_desc` varchar(300) NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_name` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_desc`, `thread_cat_id`, `thread_user_name`, `timestamp`) VALUES
(6, 'amdnds', 2, 'shivam', '2022-04-30 12:12:47'),
(7, 'dmfd', 3, 'shivam', '2022-04-30 12:14:13'),
(8, 'sjbcsa', 3, 'shilu', '2022-04-30 12:14:44'),
(9, 'dbms', 4, 'shilu', '2022-04-30 19:03:27'),
(10, 'nwbde', 4, 'shivam', '2022-04-30 19:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `vCode` varchar(300) NOT NULL,
  `isVerified` int(11) NOT NULL DEFAULT 0,
  `reset_link_token` varchar(255) NOT NULL,
  `exp_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `vCode`, `isVerified`, `reset_link_token`, `exp_date`) VALUES
(0, 'sejalsrivastava949@gmail.com', 'sejal', '202cb962ac59075b964b07152d234b70', '696a57816524ff66b4697ffe17a3bcb0', 1, '', NULL),
(1, 'shambhavi7653@gmail.com', 'shambhavi', 'c6f057b86584942e415435ffb1fa93d4', '241a365ebd7540e1c458509402625384', 1, '', NULL),
(2, 'shivamsawarni554@gmail.com', 'shilu', 'ec5262dae5afea520bb76bbf93b62642', '4039f345e14e1d2849fc5190c7bccecd', 1, '', '0000-00-00 00:00:00'),
(3, 'btbtc19094_shivam@banasthali.in', 'shivam', '3ae9d8799d1bb5e201e5704293bb54ef', '65bf0e06e9582803ff7c91e95c46eb0f', 1, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bt`
--
ALTER TABLE `bt`
  ADD PRIMARY KEY (`bt_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chem`
--
ALTER TABLE `chem`
  ADD PRIMARY KEY (`chem_id`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `ece`
--
ALTER TABLE `ece`
  ADD PRIMARY KEY (`ece_id`);

--
-- Indexes for table `ee`
--
ALTER TABLE `ee`
  ADD PRIMARY KEY (`ee_id`);

--
-- Indexes for table `ei`
--
ALTER TABLE `ei`
  ADD PRIMARY KEY (`ei_id`);

--
-- Indexes for table `mt`
--
ALTER TABLE `mt`
  ADD PRIMARY KEY (`mt_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`others_id`);

--
-- Indexes for table `pdf_file`
--
ALTER TABLE `pdf_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bt`
--
ALTER TABLE `bt`
  MODIFY `bt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chem`
--
ALTER TABLE `chem`
  MODIFY `chem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cs`
--
ALTER TABLE `cs`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ece`
--
ALTER TABLE `ece`
  MODIFY `ece_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ee`
--
ALTER TABLE `ee`
  MODIFY `ee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ei`
--
ALTER TABLE `ei`
  MODIFY `ei_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt`
--
ALTER TABLE `mt`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `others_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdf_file`
--
ALTER TABLE `pdf_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
