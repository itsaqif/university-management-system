-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 09:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `subtitle` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `links` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `subtitle`, `description`, `links`) VALUES
(3, 'About', 'subtitle', 'crops are the architecture of fields for farmers', 'https://www.abubakr.com.pk');

-- --------------------------------------------------------

--
-- Table structure for table `dept_category`
--

CREATE TABLE `dept_category` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_category`
--

INSERT INTO `dept_category` (`id`, `name`, `description`, `image`) VALUES
(7, 'Computer Science', 'Department of Computer Science', 'grid3.png'),
(8, 'Electrical Engineering', 'Department of Electrical Engineering', 'grid2.png'),
(9, 'Mechanical Engineering', 'Department of Mechanical Engineering', 'grid1.png'),
(11, 'Civil Engineering', 'Department of Civil Engineering', 'grid4.png');

-- --------------------------------------------------------

--
-- Table structure for table `dept_category_list`
--

CREATE TABLE `dept_category_list` (
  `id` int(11) NOT NULL,
  `dept_cate_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `descrip` varchar(200) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_category_list`
--

INSERT INTO `dept_category_list` (`id`, `dept_cate_id`, `name`, `descrip`, `section`) VALUES
(2, 7, 'Science', 'This is Computer Science Department.', 'C'),
(3, 11, 'Civil Department', 'Department of Civil Engineering', 'D'),
(4, 9, 'Department of Mechanical', 'Mechanical engineering department', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `design` varchar(10) NOT NULL,
  `descrip` varchar(30) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `design`, `descrip`, `images`) VALUES
(29, 'sohiab', 'rdcfvgbhnj', 'fgvhjhnmk,l', 'Untitled design (70).png');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(3, 'zain', 'zain@gmail.com', 'zain12', 'admin'),
(4, 'saad', 'saad@gmail.com', 'saad12', 'admin'),
(5, 'aqif', 'thisisaqif@gmail.com', 'aqif123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_category`
--
ALTER TABLE `dept_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_category_list`
--
ALTER TABLE `dept_category_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_cate_id` (`dept_cate_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dept_category`
--
ALTER TABLE `dept_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dept_category_list`
--
ALTER TABLE `dept_category_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dept_category_list`
--
ALTER TABLE `dept_category_list`
  ADD CONSTRAINT `dept_category_list_ibfk_1` FOREIGN KEY (`dept_cate_id`) REFERENCES `dept_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
