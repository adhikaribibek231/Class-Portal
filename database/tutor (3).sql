-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 03:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--
CREATE DATABASE IF NOT EXISTS `tutor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tutor`;
-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(100) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(30000) NOT NULL,
  `duedate` varchar(100) NOT NULL,
  `user_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `Semester`, `Subject`, `title`, `description`, `duedate`, `user_role`) VALUES
(2, 1, 'DBMS', 'Database Revision Questions', '<p><strong>Answer the following questions. </strong></p><ol>\r\n<li>Difference between conceptual,logical and Physical model.</li>\r\n<li>Draw a Er diagram model for student management system.</li>\r\n<li>Explain Relational database with example.</li>\r\n<li>Explain Relational Algebra and calculus with example.</li>\r\n<li>Create a database and required tables for student management system and implement the DDL and DML.</li>\r\n<li>Explain TCL and DCL and also explain in which scenario it is used.</li>\r\n<li>Explain Integrity constraints and functional dependency.</li>\r\n<li>Explain Normalization. Explain 1NF,2NF,3NF normalization with example.</li>\r\n<li>Why Database Security is needed?</li>\r\n<li>Explain access control,Encryption and Decryption</li>\r\n<li>Explain Query processing,Query cost and Query using query tree.</li>\r\n<li>Explain query Optimization and Query Decomposition.</li>\r\n<li>Explain File organization and hash collision with example.</li>\r\n<li>Why concurrency control is needed?</li>\r\n<li>Explain Concurrency control Techniques with examples.</li>\r\n<li>Why Database Recovery is needed? Explain Log based recovery.</li>\r\n<li>Explain distributed model, multimedia model and ordbms WITH</li>\r\n</ol>', '2024-03-10', 1),
(5, 2, 'Computer Graphics', 'Assignment 3', '<ol>\r\n<li>Explain the Phong method in detail.</li>\r\n<li>Explain the scan-line method of visible surface detection method in detail.</li>\r\n<li>What is 3D transformation? Explain 3D rotation with examples and necessary derivatives.</li>\r\n<li>Why hidden lines and hidden surface removal techniques are needed? Explain them.</li>\r\n<li>Explain the Gouraud method in detail.</li>\r\n<li>What do you mean by illumination models? Why Phong Method is better than Gouraud Method?</li>\r\n<li>Explain the terms: -</li>\r\n<li><ul>\r\n<li>Ambient Light </li>\r\n<li>Bezier Curve</li>\r\n<li>Cubic-spline method of generating non-planar surface.</li>\r\n<li>Diffuse Reflection</li>\r\n<li>Specular Reflection</li>\r\n<li>\r\n</ul>\r\n</ol>', '2024-03-15', 1),
(11, 3, 'Physical Training', 'Workout', 'Do 200 pushup', '2024-03-20', 1),
(13, 4, 'Computer Graphics', 'Assignment 5', 'Do chapter 5', '2024-03-21', 1),
(14, 5, 'Operating System', 'Chapter 6', 'Do chapter 7 exercise', '2024-03-27', 1),
(17, 6, 'Operating System', 'fdrghhfdgh', 'sdfdrghfghfdh', '2024-03-27', 1),
(19, 7, 'Operating System', 'fdgfghfghg', 'fdggfhsgghjjgfdfghfdghfgdh', '2024-03-21', 1),
(20, 8, 'Drawing', 'Assignment 5', 'Practice Drawing', '2024-03-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `text_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`user_id`, `name`, `phone_number`, `email`, `text_message`) VALUES
(4, 'bibekbibek', '38479723', 'bsdfjk@jhdshfj', 'dsfhkfdsfh'),
(6, 'Suyog Dahal', '98621112', 'suyog@gmail.com', 'this is suyog checking. How do you do?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` int(10) NOT NULL,
  `Semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_role`, `Semester`) VALUES
(1, 'Admin', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 0),
(2, 'Ramesh Teacher(1)', 'teacher1@gmail.com', '9067bdcd809648626457fc7cc40825bbbf210e9d', 2, 0),
(3, 'Mahesh Teacher(2)', 'teacher2@gmail.com', '444874d5690e41b38be872676c1aa3b7493bf4e7', 2, 0),
(4, 'Merry Teacher(3)', 'teacher3@gmail.com', 'c26c57711b28ba6dcaf17b7beeb2a7cb0fa3d064', 2, 0),
(5, 'Rahul Teacher(4)', 'teacher4@gmail.com', 'feef6b9e56603dd6cc27b841e73bd1d3bbeca8f6', 2, 0),
(6, 'Aadarsh Teacher(5)', 'teacher5@gmail.com', '12622d8e8fcffb8b8342d485395d08d411ece138', 2, 0),
(12, 'Aswina Wagle', 'aswina@gmail.com', 'af06dbb2bf6687d56f3b6eed4e8a220536984540', 0, 2),
(13, 'Bibek Adhikari', 'bibek@gmail.com', '7529ac3778b6cc759557b11c43b014b419012f4b', 0, 2),
(14, 'Bishow Raj Thapa', 'bishow@gmail.com', '741ebd8ca05ce723582bfdfec6a25f3ba3b9573f', 0, 1),
(15, 'Jyoti Dangal', 'jyoti@gmail.com', '1878b2cf4b530e45bcef6e1451c6e52cceaecaf8', 0, 1),
(16, 'Suyog Dahal', 'suyog@gmail.com', 'fe2dc03aec45d29a8a55dab3e335264450b7352e', 0, 2),
(17, 'Rayu Byanju Shrestha', 'rayu@gmail.com', 'b666023f15137d86f9e7e68805425a52b2ee3a08', 0, 2),
(20, 'Renu Singh', 'renu@gmail.com', '68504b791e518a44a7cba7072612c38a4126c838', 0, 3),
(21, 'Rahul Soni', 'rahul@gmail.com', 'e53fcde5b60889071303ed98dca4d80523824dde', 0, 2),
(22, 'Siddhant Khatiwada', 'siddhant@gmail.com', '5af171cf8b365c360d188292c5bea96ea00d4424', 0, 2),
(23, 'Raj Rajesh', 'raj@gmail.com', '2e8460f4b941efacdc6949646516b4f288b5b423', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
