-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 06:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `athonesayin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `sid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `cash_status` tinyint(1) NOT NULL COMMENT 'cash_in:1/out : 0',
  `createDate` date NOT NULL,
  `updateDate` date NOT NULL,
  `isactive` tinyint(1) NOT NULL COMMENT 'delete : 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`sid`, `user_id`, `cid`, `detail`, `amount`, `cash_status`, `createDate`, `updateDate`, `isactive`) VALUES
(14, 1, 7, 'salary get', 100000, 1, '2023-04-01', '2023-04-02', 1),
(17, 1, 22, 'bicycle', 30000, 1, '2023-03-31', '2023-04-02', 1),
(18, 1, 21, 'bicycle', 3000, 1, '2023-04-02', '2023-04-02', 0),
(19, 1, 7, 'salary gets', 100000, 1, '2023-03-01', '2023-04-02', 1),
(20, 1, 14, 'home', 40000, 1, '2023-04-01', '2023-04-02', 1),
(21, 1, 1, 'kfc', 5000, 0, '2023-04-01', '2023-04-02', 0),
(25, 1, 31, 'lottery', 100000, 1, '2023-04-01', '2023-04-03', 1),
(26, 1, 17, 'kfc', 100000, 0, '2023-04-01', '2023-04-03', 1),
(27, 1, 2, 'h1ooredooh1', 1000, 0, '2023-04-01', '2023-04-03', 1),
(28, 2, 7, 'car', 200000, 1, '2023-04-01', '2023-04-03', 1),
(29, 3, 21, 'other', 10000, 1, '2023-04-01', '2023-04-03', 1),
(30, 1, 7, 'salaryget', 1000000, 1, '2023-04-03', '2023-04-03', 1),
(31, 1, 1, 'kfc', 10000, 0, '2023-04-03', '2023-04-03', 1),
(32, 1, 21, 'frommother', 10000, 1, '2023-04-03', '2023-04-03', 1),
(33, 1, 1, 'breakfast', 10000, 0, '2023-04-08', '2023-04-03', 1),
(34, 1, 2, 'ooredoo', 1000, 0, '2023-04-03', '2023-04-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `category_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `category_name`, `createDate`, `updateDate`, `category_status`) VALUES
(1, 'food', '2023-03-31 11:53:05', '2023-03-31 11:53:05', 0),
(2, 'phone-bills', '2023-03-31 11:53:32', '2023-03-31 11:53:32', 0),
(3, 'transportation', '2023-03-31 11:53:56', '2023-03-31 11:53:56', 0),
(4, 'course fee', '2023-03-31 11:54:54', '2023-03-31 11:54:54', 0),
(5, 'school fee', '2023-03-31 11:55:53', '2023-03-31 11:55:53', 0),
(6, 'internet bill', '2023-03-31 11:56:10', '2023-03-31 11:56:10', 0),
(7, 'salary', '2023-03-31 11:56:19', '2023-03-31 11:56:19', 1),
(8, 'snack', '2023-03-31 11:56:34', '2023-03-31 11:56:34', 0),
(9, 'travel', '2023-03-31 11:56:42', '2023-03-31 11:56:42', 0),
(10, 'clothes', '2023-03-31 11:56:50', '2023-03-31 11:56:50', 0),
(11, 'movie', '2023-03-31 11:57:03', '2023-03-31 11:57:03', 0),
(12, 'health', '2023-03-31 11:57:24', '2023-03-31 11:57:24', 0),
(13, 'gym', '2023-03-31 11:57:34', '2023-03-31 11:57:34', 0),
(14, 'pocket money', '2023-03-31 11:58:28', '2023-03-31 11:58:28', 1),
(15, 'religion', '2023-03-31 11:59:06', '2023-03-31 11:59:06', 0),
(16, 'other expense', '2023-03-31 11:59:22', '2023-03-31 11:59:22', 0),
(17, 'birthday', '2023-03-31 11:59:35', '2023-03-31 11:59:35', 0),
(18, 'shopping', '2023-03-31 11:59:46', '2023-03-31 11:59:46', 0),
(19, 'tax', '2023-03-31 11:59:57', '2023-03-31 11:59:57', 0),
(20, 'sport', '2023-03-31 12:00:08', '2023-03-31 12:00:08', 0),
(21, 'present', '2023-03-31 12:00:20', '2023-03-31 12:00:20', 1),
(22, 'sale', '2023-03-31 12:02:30', '2023-03-31 12:02:30', 1),
(23, 'bonus', '2023-03-31 12:02:38', '2023-03-31 12:02:38', 1),
(24, 'income from rent', '2023-03-31 12:03:18', '2023-03-31 12:03:18', 1),
(25, 'profit', '2023-03-31 12:03:25', '2023-03-31 12:03:25', 1),
(26, 'deposit', '2023-03-31 12:03:34', '2023-03-31 12:03:34', 0),
(27, 'destitution', '2023-03-31 12:08:40', '2023-03-31 12:08:40', 0),
(31, 'other income', '2023-03-31 13:42:50', '2023-03-31 13:42:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `createDate`, `updateDate`) VALUES
(1, 'tatsumi123', 'cyberhyper147@gmail.com', '$2y$10$o9F/xY02ayJdTOH7ysCFGeqRMawKfLWMytX9ADN8MLdqmCQAQ/fXW', '2023-04-02 17:40:13', '2023-04-02 17:40:13'),
(2, 'TatsumiVE', 'hello@gmail.com', '$2y$10$Yj5rjpdlobqHfWH1WJvdNeFEnUngxqB6SVDSHf4ke/rLk/09LcZUW', '2023-04-03 00:56:00', '2023-04-03 00:56:00'),
(3, 'venoky778', 'venoky147@gmail.com', '$2y$10$XonHEdNIBoHml0vyfb07PevQAXANA0P1S96w2wEPXykISCWE86cwu', '2023-04-03 01:59:07', '2023-04-03 01:59:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
