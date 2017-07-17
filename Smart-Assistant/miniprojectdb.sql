-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 10:22 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `miniprojectuser`
--

CREATE TABLE `miniprojectuser` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miniprojectuser`
--

INSERT INTO `miniprojectuser` (`id`, `name`, `password`, `email`, `type`) VALUES
('14-26269-1', 'imran', '1234', 'khan_imran619@outlook.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `miniprojectusers`
--

CREATE TABLE `miniprojectusers` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(5) NOT NULL,
  `note` varchar(500) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miniprojectusers`
--

INSERT INTO `miniprojectusers` (`id`, `name`, `password`, `email`, `type`, `note`, `address`, `gender`) VALUES
('14-26269-1', 'imran khan', '1234', 'khan_imran619@outlook.com', 'admin', 'fgssg', 'fgs45sg', 'male'),
('14-26269-3', 'nana patekar', '5678', 'amir_khan@outlook.com', 'user', '', '', ''),
('15-69565-1', 'rafat rashid', '1278', 'rafatx003@outlook.com', 'admin', '', '', ''),
('14-14141-1', 'ghghgh', '2345', 'xvbx@gmail.com', 'USER', '', '', ''),
('14-41411-1', 'hawekka', '6969', 'jkhdd@gmail.com', 'USER', '', '', ''),
('14-85858-1', 'zdfdd', '3663', 'asdfa@gmail.com', 'USER', '', '', ''),
('14-69699-1', 'hakka', '1212', 'qwerq@gmail.com', 'USER', '', '', ''),
('14-36363-1', 'hakkazdfa', '7878', 'lhfhgf@gmail.com', 'USER', '', '', ''),
('14-74512-1', 'hakhnf', '1245', 'qwerqw@gmail.com', 'USER', '', '', ''),
('14-23232-1', 'hakkaaefa', '1212', 'ghjkgh@gmail.com', 'USER', '', '', ''),
('14-12121-1', 'asdfasdf', '4444', 'dfgsdf@gmail.com', 'USER', '', '', ''),
('14-77878-1', 'qwerasd', '4545', 'cvbncvb@gmail.com', 'USER', '', '', ''),
('14-78789-1', 'hakka', '6546', 'hakka@gmail.com', 'USER', '', '', ''),
('14-25252-1', 'sdfgsdf', '5678', 'tyty@gmail.com', 'USER', '', '', ''),
('14-78211-1', 'sdfgse', '7890', 'asdfzx@gmail.com', 'USER', '', '', ''),
('14-23568-1', 'lkljk', '0978', 'bxcvbx@gmail.com', 'USER', '', '', ''),
('14-78445-1', 'hghgh', '2121', 'dhjfghj@gmail.com', 'USER', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profileinfo`
--

CREATE TABLE `profileinfo` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `profileid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileinfo`
--

INSERT INTO `profileinfo` (`id`, `name`, `phone`, `email`, `address`, `companyname`, `profileid`) VALUES
(1, 'mak mashuk', '01511111111', 'makmashuk@gmail.com', 'mirpur', 'mak Com', '14-26269-1'),
(2, 'asib', '123', 'asib@gmail', 'mirpur', 'lanka', '14-26269-1'),
(3, 'asd', 'sadasd', 'adad', 'asd', 'asd', '14-26269-1'),
(4, 'asib', '015555', 'adad@gmail.com', 'asd', 'asd', '14-26269-1'),
(5, 'asib', '015555', 'adad@gmail.com', 'asd', 'asd', '14-26269-1'),
(6, 'asib', '015555', 'adad@gmail.com', 'asd', 'asd', ''),
(7, 'asib', '01521107920', 'adad@gmail.com', 'asd', 'asd', ''),
(8, 'asib', '01521107920', 'adad@gmail.com', 'asd', 'asd', ''),
(9, 'asib', '8801521107920', 'adad@gmail.com', 'asd', 'asd', ''),
(10, 'asib', '8801521107920', 'adad@gmail.com', 'asd', 'asd', ''),
(11, 'asib', '01521107920', 'adad@gmail.com', 'asd', 'asd', ''),
(14, 'asdd', ' ', ' ', ' ', ' ', ''),
(18, 'asdd', ' ', ' ', ' ', ' ', ''),
(19, 'asdd', ' ', ' ', ' ', ' ', ''),
(20, 'asdd', ' ', ' ', ' ', ' ', ''),
(21, 'asdd', ' ', ' ', ' ', ' ', ''),
(22, 'asdd', ' ', ' ', ' ', ' ', ''),
(23, 'asdd', ' ', ' ', ' ', ' ', ''),
(24, 'asdd', ' ', ' ', ' ', ' ', '');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `date` date NOT NULL,
  `eventname` varchar(50) NOT NULL,
  `at` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `with` varchar(50) NOT NULL,
  `shortnote` varchar(100) NOT NULL,
  `id` varchar(10) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`date`, `eventname`, `at`, `location`, `with`, `shortnote`, `id`, `comment`) VALUES
('2017-06-02', 'hungamaa', '09:00:00', 'dhaka', 'mashuk', 'hehe', '14-26269-1', ''),
('2017-01-01', 'aa', '00:00:06', 'dhaka', 'xx', 'akkabakka', '14-26269-2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profileinfo`
--
ALTER TABLE `profileinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
