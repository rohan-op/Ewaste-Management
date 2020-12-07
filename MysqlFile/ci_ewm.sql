-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 04:46 PM
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
-- Table structure for table `ewaste`
--

CREATE TABLE `ewaste` (
  `e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `e_type` varchar(100) NOT NULL,
  `e_name` varchar(200) NOT NULL,
  `e_age` int(11) NOT NULL,
  `e_quantity` int(11) NOT NULL,
  `e_specs` text NOT NULL,
  `e_img` text NOT NULL,
  `date` text NOT NULL,
  `s_stars` int(11) NOT NULL,
  `s_info` text NOT NULL,
  `r_stars` int(11) NOT NULL,
  `r_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewaste`
--

INSERT INTO `ewaste` (`e_id`, `u_id`, `s_id`, `r_id`, `e_type`, `e_name`, `e_age`, `e_quantity`, `e_specs`, `e_img`, `date`, `s_stars`, `s_info`, `r_stars`, `r_info`) VALUES
(1, 1, 0, 0, 'laptop/pc', 'dell xps', 12, 1, 'good pc', 'http://[::1]/CI_EWM/uploads/ewaste/img_avatar.png', '2020-12-07 15:51:48', 0, '', 0, ''),
(2, 1, 0, 0, 'laptop/pc', 'lenovo', 12, 2, 'they are fine', 'http://[::1]/CI_EWM/uploads/ewaste/img_avatar.png', '2020-12-07 15:52:08', 0, '', 0, ''),
(3, 1, 0, 0, 'laptop/pc', 'MSI gf638rc', 11, 1, 'amazing gaming laptop', 'http://[::1]/CI_EWM/uploads/ewaste/img_avatar.png', '2020-12-07 15:55:14', 0, '', 0, '');

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
-- Indexes for table `ewaste`
--
ALTER TABLE `ewaste`
  ADD PRIMARY KEY (`e_id`);

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
-- AUTO_INCREMENT for table `ewaste`
--
ALTER TABLE `ewaste`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
