-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 05:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `email`, `pass`) VALUES
(1, 'mehedi', 'mehedi@gmail.com', '2011');

-- --------------------------------------------------------

--
-- Table structure for table `donor_registration`
--

CREATE TABLE `donor_registration` (
  `id` int(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` varchar(25) DEFAULT NULL,
  `bgroup` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mno` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_registration`
--

INSERT INTO `donor_registration` (`id`, `name`, `fname`, `address`, `city`, `age`, `bgroup`, `email`, `mno`) VALUES
(5, 'Asif', 'Basir', 'Dhaka', 'Noakhali', '24', 'AB+', 'asif@gmail.com', '564646464646'),
(8, 'Jihad', 'Noor Karim', 'chowrasta', 'Noakhali', '16', 'O+', 'jihad@gmail.com', '1458796321');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `pname` varchar(30) DEFAULT NULL,
  `disease` varchar(200) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `bgroup` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mno` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `pname`, `disease`, `city`, `age`, `bgroup`, `email`, `mno`, `status`) VALUES
(3, 'mehedi', 'Rashed', 'Dengue', 'Cumilla', '24', 'O+', 'rashed@gmail.com', '12345678', 'Accepted'),
(4, 'Saiful', 'abdul', 'Cancer', 'noakhali', '24', 'AB+', 'sjgsg@gmail.com', '4667894', 'Accepted'),
(7, 'Prema', 'Prity', 'Fever', 'Noakhali', '24', 'A-', 'prity@gmail.com', '0123457896', 'Accepted'),
(8, 'Saiful', 'Raju', 'Back Pain', 'Cumilla', '22', 'A-', 'saiful@gmail.com', '1456789', 'Accepted'),
(10, 'X', 'Y', 'aaaa', 'noa', '24', 'AB+', 'hasan@gmail.com', '1234569', 'Accepted'),
(15, 'skdcgdskdg', 'ekgukvgfi', 'cisgd', 'iwgfeiwg', 'iwgi', 'AB+', 'hasanrafi.iit@gmail.com', '123456789', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `bgroup` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mno` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `age`, `address`, `city`, `pass`, `bgroup`, `email`, `mno`) VALUES
(2, 'mehedi', '20', 'noakhali', 'Noakhali', '2011', 'B+', 'hasanrafi.iit@gmail.com', '01631081007'),
(3, 'Mehedi Hasan', '25', 'Banglabazar', 'Noakhali', '2011481', 'B+', 'mehedihasan81007@gmail.com', '01646065553');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_registration`
--
ALTER TABLE `donor_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor_registration`
--
ALTER TABLE `donor_registration`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
