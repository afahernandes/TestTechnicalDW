-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 03:48 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumb_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Joker'),
(2, 'Batman'),
(3, 'Haris A'),
(4, 'Anto'),
(5, 'Tretan'),
(6, 'Cho'),
(7, 'Rahma');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `video_link` text NOT NULL,
  `type` varchar(15) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `video_link`, `type`, `id_course`) VALUES
(1, 'Java Fundamental 1', 'https://youtube.com', 'video', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `thumbnail` text NOT NULL,
  `id_author` varchar(15) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `thumbnail`, `id_author`, `duration`, `description`) VALUES
(1, 'PHP', 'php.png', '1', '3 Bulan', 'Berisi materi pembelajaran tentang bahasa pemrograman PHP'),
(2, 'HTML', 'html.png', '2', '3 Bulan', 'Berisi materi pembelajaran tentang bahasa pemrograman HTML'),
(3, 'SASS', 'sass.jpg', '3', '3 Bulan', 'Berisi materi pembelajaran tentang bahasa pemrograman SASS'),
(4, 'CSS', 'css.png', '2', '3 Bulan', 'Berisi materi pembelajaran tentang Materi belajar CSS'),
(5, 'React Native', 'reaact.png', '4', '3 Bulan', 'Berisi materi pembelajaran tentang Pemrograman react native'),
(6, 'Javascript', 'javascript.jpg', '5', '3 Bulan', 'Berisi materi pembelajaran tentang Pemrograman Javascript'),
(7, 'Node JS', 'nodejs-part2.png', '6', '3 Bulan', 'Berisi materi pembelajaran tentang Pemrograman Node JS'),
(8, 'Laravel', 'laravel.jpg', '2', '3 Bulan', 'Berisi materi pembelajaran tentang Pemrograman Laravel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
