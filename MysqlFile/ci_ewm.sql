-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 05:29 PM
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
(9, 1, 0, 0, 'laptop/pc', 'IphoneX', 12, 1, 'Apple A11 Bionic (10 nm)\r\nCPU	Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)', 'http://[::1]/CI_EWM/uploads/ewaste/iphone.jpg', '2020-12-07 17:38:09', 0, '', 0, ''),
(10, 2, 0, 0, 'laptop/pc', 'iphoneX', 12, 1, 'its a phone with A11 bionic chipset', 'http://[::1]/CI_EWM/uploads/ewaste/img_avatar.png', '2020-12-10 15:13:38', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(10) NOT NULL,
  `s_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `p_specs` varchar(500) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_price` int(10) NOT NULL,
  `photo1` varchar(200) NOT NULL,
  `photo2` varchar(200) NOT NULL,
  `photo3` varchar(200) NOT NULL,
  `photo4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `s_id`, `p_name`, `p_type`, `p_specs`, `p_quantity`, `p_price`, `photo1`, `photo2`, `photo3`, `photo4`) VALUES
(1, 1, 'IphoneX', 'Mobile Phone', 'Iphone', 5, 30000, 'http://[::1]/CI_EWM/uploads/service/products/iphone.jpg', 'http://[::1]/CI_EWM/uploads/service/products/iphone.jpg', 'http://[::1]/CI_EWM/uploads/service/products/iphone.jpg', 'http://[::1]/CI_EWM/uploads/service/products/iphone.jpg'),
(2, 1, 'One Plus', 'Mobile Phone', 'one plus', 5, 20000, 'http://[::1]/CI_EWM/uploads/service/products/oneplus.jpg', '', '', '');

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
(1, 'Vandit Popat', 'Vandit Private LTD', 'recycler', 9876543218, 'vandit@gmail.com', 'Charni Road', 'vandit', 'http://[::1]/CI_EWM/uploads/profilepic/recycler/img_avatar.png');

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
(1, 'Pranav Bhat', 'Pranav Ent', 'service', 1234567891, 'pranav@gmail.com', 'Mulund', 'pranav', 'http://[::1]/CI_EWM/uploads/profilepic/service/img_avatar.png');

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
(1, 'Rohan Shah', 'Rohan Corp', 'user', 8169885434, 'rohan27@somaiya.edu', 'Byculla, Mumbai27', 'rohan', 'http://[::1]/CI_EWM/uploads/profilepic/user/img_avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ewaste`
--
ALTER TABLE `ewaste`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

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
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
