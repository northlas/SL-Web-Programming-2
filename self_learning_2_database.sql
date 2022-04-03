-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 10:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `self_learning_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE `msuser` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birth_place` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `mailbox` int(11) NOT NULL,
  `profile_picture` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`id`, `first_name`, `middle_name`, `last_name`, `birth_place`, `birth_date`, `nik`, `nationality`, `email`, `phone`, `address`, `mailbox`, `profile_picture`, `username`, `password`) VALUES
(2, 'ricky', 'jonathan', 'nathaniel', 'hahaha', '2022-04-20', '1234567890123456', 'hihihi', 'abc@gmail.com', '012345678912', 'hohoho', 12345, 'greg-rivers-rChFUMwAe7E-unsplash.jpg', 'abcde', '123123'),
(3, 'a', 'b', 'c', 'aaa', '2022-04-15', '123456890123456', 'bbb', 'abc@gmail.com', '0123456789123', 'ccc', 45678, 'r-architecture-Cn87TISYij8-unsplash.jpg', 'abc', '123'),
(4, 'test', 'input', 'output', 'kakaka', '2022-04-22', '1112223334445556', 'lalala', 'omg@yahoo.com', '011122233344', 'lilili lololo', 12321, 'spacejoy-PyeXkOVmG1Y-unsplash.jpg', 'user', 'admin'),
(5, 'lorem', 'ipsum', 'dolor', 'sit', '2022-04-15', '1234567891234567', 'amet', 'test@testing.com', '0123456789012', 'lorem ipsum dolor sit amet', 12345, '1.png', 'test', 'test123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msuser`
--
ALTER TABLE `msuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
