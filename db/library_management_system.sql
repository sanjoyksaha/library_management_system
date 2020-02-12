-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2020 at 04:05 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_image` varchar(255) DEFAULT NULL,
  `book_author_name` varchar(255) DEFAULT NULL,
  `book_publication_name` varchar(255) DEFAULT NULL,
  `book_purchase_date` varchar(255) DEFAULT NULL,
  `book_price` varchar(255) DEFAULT NULL,
  `book_quantity` int(6) DEFAULT NULL,
  `available_quantity` int(6) DEFAULT NULL,
  `librarian_username` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_quantity`, `available_quantity`, `librarian_username`, `datetime`) VALUES
(11, 'Introductory Nuclear Physics', '15e731227b602ac6e0f46c652fc76edf.jpg', 'Kenneth S. Krane', 'Publisher', '08-05-2011 ', '880', 7, 5, 'admin', '2020-01-29 15:52:15'),
(12, 'C, the complete reference', '59fc1b02f1733b771749234b066253ec.jpg', 'Herbert Schildt', 'publisher', '01-08-2018 ', '1200', 10, 10, 'admin', '2020-01-29 15:54:04'),
(13, 'A Brief History of Time', '514dc4cdc26f60d6241ba2d9b9fafb59.jpg', 'Stephen Hawking', 'Bantam Books', '08-11-2011 ', '1500', 14, 13, 'admin', '2020-01-29 15:55:26'),
(14, 'Heart of Darkness', 'd714163f2530b29839652a59703e0462.jpg', 'Joseph Conrad', 'Publisher', '01-08-2016 ', '1800', 9, 9, 'admin', '2020-01-29 15:58:16'),
(15, 'Dracula', '9df10ae6d545a4b1b5e576a3ee569ea8.jpg', 'Bram Stoker', 'Publisher', '08-08-2013 ', '1800', 11, 10, 'admin', '2020-01-29 15:59:40'),
(16, 'Essential Calculus: Early Transcendentals', '78ebabb6d09adeee60c664d49ce57796.jpg', 'James Stewart', 'Publisher', '12-11-2015 ', '900', 15, 12, 'admin', '2020-01-30 07:09:10'),
(17, 'Calculus: An Intuitive and Physical Approach (Second Edition)', 'e1ace6c3d10defb1216e9888004e41a3.jpg', 'Morris Kline', 'Publisher', '03-01-2016 ', '850', 20, 17, 'admin', '2020-01-30 07:12:24'),
(18, 'Modern Quantum Mechanics', 'f6c3b1e4496616ae90b894e6f0633306.jpg', 'J. J. Sakurai', 'Publisher', '13-01-2016 ', '1750', 10, 9, 'admin', '2020-01-30 07:17:18'),
(20, 'Basic Electronics: Solid State', '28a13851f3b73ebd9a6920b884e750ba.jpg', 'B.L. Theraja', 'publisher', '22-09-2012 ', '1050', 15, 13, 'admin', '2020-01-30 07:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(6) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`) VALUES
(1, 'Physcis'),
(3, 'Chemistry'),
(4, 'Mathematics'),
(5, 'Statistics'),
(6, 'Botany'),
(7, 'Zoology'),
(8, 'Social Science'),
(9, 'CSE'),
(10, 'EEE'),
(11, 'ECE'),
(12, 'English'),
(14, 'Economics'),
(16, 'Management'),
(17, 'Finance'),
(18, 'Marketing'),
(19, 'Human Resource'),
(20, 'Bangla'),
(21, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `student_id`, `book_id`, `issue_date`, `return_date`, `datetime`) VALUES
(1, 5, 11, '26-01-2020', '01-02-2020', '2020-01-31 18:29:18'),
(2, 6, 12, '28-01-2020', '01-02-2020', '2020-01-31 18:29:25'),
(3, 10, 20, '01-02-2020', '', '2020-01-31 18:29:34'),
(4, 9, 16, '01-02-2020', '', '2020-01-31 18:29:41'),
(5, 7, 13, '01-02-2020', '', '2020-01-31 18:29:51'),
(6, 5, 18, '01-02-2020', '', '2020-01-31 18:30:11'),
(7, 5, 20, '01-02-2020', '', '2020-01-31 18:30:21'),
(8, 7, 15, '01-02-2020', '', '2020-01-31 18:30:30'),
(9, 6, 15, '01-02-2020', '03-02-2020', '2020-01-31 18:30:37'),
(10, 9, 11, '01-02-2020', '', '2020-01-31 18:30:47'),
(11, 10, 11, '01-02-2020', '', '2020-01-31 18:30:57'),
(12, 5, 16, '01-02-2020', '', '2020-01-31 18:31:34'),
(13, 6, 16, '01-02-2020', '', '2020-01-31 18:31:42'),
(14, 6, 17, '01-02-2020', '', '2020-01-31 18:32:03'),
(15, 5, 17, '01-02-2020', '', '2020-01-31 18:32:11'),
(16, 10, 17, '01-02-2020', '', '2020-01-31 18:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `name`, `email`, `user_name`, `password`, `phone_no`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', 'admin', '01762190173');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'image.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `address`, `phone`, `image`) VALUES
(1, 'Library Management', 'sanjoyksaha92@gmail.com', 'Cumilla', '01762190173', '0131308a37872780d2bb0d756d49fc04.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL DEFAULT '0',
  `l_name` varchar(255) NOT NULL DEFAULT '0',
  `department_id` varchar(255) DEFAULT NULL,
  `roll` int(20) NOT NULL,
  `reg_no` int(20) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `user_name` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `phone_no` varchar(255) NOT NULL DEFAULT '0',
  `img` varchar(255) DEFAULT 'image.png',
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `f_name`, `l_name`, `department_id`, `roll`, `reg_no`, `email`, `user_name`, `password`, `phone_no`, `img`, `status`, `datetime`) VALUES
(5, 'Sanjoy', 'Saha', '1', 123456, 123456789, 'sanjoy@mail.com', 'sanjoy123', '$2y$10$dR21KCHHiG3TzsvkkuJKxOTR9U.Lc800x9SxMDd/sfVIJ0uhGPTL2', '1456313232', 'c22645738cb14593bb044e98afa39e89.png', 1, '2020-01-15 18:43:47'),
(6, 'Rupan', 'Saha', '21', 123457, 1234567942, 'rupan@mail.com', 'rupan123', '$2y$10$2aINtihACHZwtruoymCv/O0.YAUpW7lu8zDuD1oLvZoyxjeyFetT2', '856156156', '530df3b6af2b9ff251f781844e4c5cd8.png', 1, '2020-01-15 20:18:11'),
(7, 'Shuvo', 'Ghosh', '18', 1234568, 416313, 'shuvo@mail.com', 'shuvo123', '$2y$10$c/KGIdzprtazhjv4hR9SHOUdvDBiDeekdVLeeuJewBCfKlhj96pBe', '9623003', '56287d3811c8fbd044eadf8cb7ed39fc.png', 1, '2020-01-16 05:49:56'),
(9, 'Dipu', 'Akhter', '4', 123456, 123547992, 'dipu@mail.com', 'dipu123', '$2y$10$8uEYn5nC0IpyJqZGNGoZpe3QP5hUttdrs7SL1BoHMcSJP/xss/MzS', '89561231', NULL, 1, '2020-01-19 19:14:10'),
(10, 'Maliha', 'Begum', '1', 1000052, 100065263, 'maliha@mail.com', 'maliha123', '$2y$10$wud9FGfCFCANQaBxlOtUqed6MRa1WIXpo38RyoSN2dlj26NuecLXK', '48511232', NULL, 1, '2020-01-19 19:15:27'),
(11, 'Jhon', 'Doe', '7', 1234567, 10001500, 'jhon@mail.com', 'jhon123', '$2y$10$5yuCTjZC14V2EvmJuNqryu.eobJv6YStzgf5USS36uX/FmFLeki1G', '96156132', NULL, 0, '2020-02-01 04:50:19'),
(12, 'Melisa', 'Brown', '3', 1234568, 10001501, 'melisa@mail.com', 'melisa123', '$2y$10$ctAZuiAL5tgCLJiIdSZmBeVO7PpuIn3kuONAryhnKD5UH6e4lWuh6', '9461133154851', NULL, 0, '2020-02-01 04:51:23'),
(13, 'Robert', 'Carlos', '6', 1234569, 10001502, 'robert@mail.com', 'robert123', '$2y$10$S3GQWp9VVseDnh2dn8iYhe7hTi5Y6qJxQOVtsiZEznspQyGMcYjTe', '478456123', NULL, 0, '2020-02-01 04:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `designation`, `salary`) VALUES
(1, 'Abdul Mia', 'Senior Teacher', '10000'),
(3, 'Momen Mia', 'Senior Teacher', '12000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
