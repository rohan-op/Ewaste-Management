-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 03:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_ewm`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(10) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Specification` varchar(500) NOT NULL,
  `Progress` varchar(100) DEFAULT NULL,
  `UsedYears` int(10) NOT NULL,
  `Buy/NoBuy` varchar(10) DEFAULT NULL,
  `Price` int(10) DEFAULT NULL,
  `Report` varchar(200) DEFAULT NULL,
  `Photo` varchar(200) NOT NULL,
  `CreditPoints` int(10) DEFAULT NULL,
  `User_Id` int(11) NOT NULL,
  `Recycler_Id` int(11) DEFAULT NULL,
  `Service_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recycler`
--

CREATE TABLE `recycler` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pword` varchar(50) NOT NULL,
  `profile_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recycler`
--

INSERT INTO `recycler` (`id`, `fname`, `cname`, `role`, `contact`, `email`, `address`, `pword`, `profile_img`) VALUES
(1, 'Vandit Popat', 'Vandit Private LTD', 'recycler', 9876543219, 'vandit@gmail.com', 'Charni Road', 'vandit', 'http://[::1]/CI_EWM/uploads/profilepic/img_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pword` varchar(50) NOT NULL,
  `profile_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `fname`, `cname`, `role`, `contact`, `email`, `address`, `pword`, `profile_img`) VALUES
(1, 'Pranav Bhat', 'Pranav Ent', 'service', 1234567891, 'pranav@gmail.com', 'Mulund', 'pranav', 'http://[::1]/CI_EWM/uploads/profilepic/img_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pword` varchar(50) NOT NULL,
  `profile_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `cname`, `role`, `contact`, `email`, `address`, `pword`, `profile_img`) VALUES
(1, 'Rohan Shah', 'Rohan Corps', 'user', 8169885434, 'rohan27@somaiya.edu', 'Byculla, Mumbai', 'rohan', 'http://[::1]/CI_EWM/uploads/profilepic/img_avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recycler`
--
ALTER TABLE `recycler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_id` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recycler`
--
ALTER TABLE `recycler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
