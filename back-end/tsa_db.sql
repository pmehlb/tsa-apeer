-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 04:18 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `2/11/2019`
--

CREATE TABLE `2/11/2019` (
  `id` int(11) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `seats_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `2/11/2019`
--

INSERT INTO `2/11/2019` (`id`, `teacher`, `location`, `session`, `seats_available`, `seats_left`) VALUES
(1, 'Muth, Stephen', '102', 'AP Physics C, questions and help!', 20, 20),
(2, 'Kehs, Eric', '118', 'Physics Open Lab', 25, 25),
(3, 'Kehs, Ian', '310', 'Pre-algebra, Algebra I/II, Pre-calculus help!', 14, 14),
(4, 'Labowski, Grant', 'Auditorium', 'Course Selection Presentation', 75, 75),
(5, 'Ortez, Jacob', '244', 'Movie Club!', 25, 25),
(6, 'Langley, Ashley', '368', 'History/World Culture Club', 35, 35),
(7, 'Ramer, Kim', '139', 'Volleyball Club', 17, 17),
(8, 'Welt, Kevin', 'Gym A', 'Archery Club! Bring your friends and learn to be the next sharp-shooter!', 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `2/21/2019`
--

CREATE TABLE `2/21/2019` (
  `id` int(11) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `seats_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `2/21/2019`
--

INSERT INTO `2/21/2019` (`id`, `teacher`, `location`, `session`, `seats_available`, `seats_left`) VALUES
(1, 'Muth, Stephen', '102', 'AP Physics C, questions and help!', 20, 20),
(2, 'Kehs, Eric', '118', 'Physics Open Lab', 25, 25),
(3, 'Kehs, Ian', '310', 'Pre-algebra, Algebra I/II, Pre-calculus help!', 14, 14),
(4, 'Labowski, Grant', 'Auditorium', 'Course Selection Presentation', 75, 75),
(5, 'Ortez, Jacob', '244', 'Movie Club!', 25, 25),
(6, 'Langley, Ashley', '368', 'History/World Culture Club', 35, 35),
(7, 'Ramer, Kim', '139', 'Volleyball Club', 17, 17),
(8, 'Welt, Kevin', 'Gym A', 'Archery Club! Bring your friends and learn to be the next sharp-shooter!', 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `3/1/2019`
--

CREATE TABLE `3/1/2019` (
  `id` int(11) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `seats_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `3/1/2019`
--

INSERT INTO `3/1/2019` (`id`, `teacher`, `location`, `session`, `seats_available`, `seats_left`) VALUES
(1, 'Muth, Stephen', '102', 'AP Physics C, questions and help!', 20, 20),
(2, 'Kehs, Eric', '118', 'Physics Open Lab', 25, 25),
(3, 'Kehs, Ian', '310', 'Pre-algebra, Algebra I/II, Pre-calculus help!', 14, 14),
(4, 'Labowski, Grant', 'Auditorium', 'Course Selection Presentation', 75, 75),
(5, 'Ortez, Jacob', '244', 'Movie Club!', 25, 25),
(6, 'Langley, Ashley', '368', 'History/World Culture Club', 35, 35),
(7, 'Ramer, Kim', '139', 'Volleyball Club', 17, 17),
(8, 'Welt, Kevin', 'Gym A', 'Archery Club! Bring your friends and learn to be the next sharp-shooter!', 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `dates_log`
--

CREATE TABLE `dates_log` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dates_log`
--

INSERT INTO `dates_log` (`id`, `date`) VALUES
(0, '2/11/2019');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `admin`) VALUES
(1, 'admin', '$2y$10$DFrbWuENQH/9xx7LaiM.Pu/omWCoF1nnSe0lNNeZz/aXkg5pUDcoG', 'Patrick Mehlbaum', 'pmehlb@gmail.com', 1),
(2, 'chris', '$2y$10$ySrkZPOnZQ9yTp/A09ANiuMAsa6GJfP36uAv1n0.4K7GLmJRA0EBe', 'Christopher McKinney', 'chris@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_location`
--

CREATE TABLE `users_location` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_location`
--

INSERT INTO `users_location` (`id`, `username`, `teacher`, `location`, `session`, `priority`, `date`) VALUES
(1, 'admin', 'Muth, Stephen', '102', '', 0, '2/11/2019'),
(2, 'chris', 'Ortez, Jacob', '244', 'Movie Club!', 0, '2/11/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2/11/2019`
--
ALTER TABLE `2/11/2019`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2/21/2019`
--
ALTER TABLE `2/21/2019`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `3/1/2019`
--
ALTER TABLE `3/1/2019`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dates_log`
--
ALTER TABLE `dates_log`
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_location`
--
ALTER TABLE `users_location`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `2/11/2019`
--
ALTER TABLE `2/11/2019`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `2/21/2019`
--
ALTER TABLE `2/21/2019`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `3/1/2019`
--
ALTER TABLE `3/1/2019`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_location`
--
ALTER TABLE `users_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
