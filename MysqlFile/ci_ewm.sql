-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 01:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

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
  `Recycler_Id` int(10) NOT NULL,
  `RecyclerName` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `ProfilePic` varchar(100) NOT NULL,
  `Ratings` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_center`
--

CREATE TABLE `service_center` (
  `Service_Id` int(5) NOT NULL,
  `ServiceCenterName` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Email_id` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Ratings` int(10) NOT NULL,
  `ProfilePic` varchar(1000) NOT NULL,
  `Credits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pword` varchar(50) NOT NULL,
  `profile_img` varchar(100) NOT NULL,
  `CreditPoints` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `fname`, `cname`, `role`, `contact`, `email`, `pword`, `profile_img`, `CreditPoints`) VALUES
(1, 'Rohan Shah', 'Good', 'User', 8169885434, 'rohan27@somaiya.edu', 'rohan', 'http://[::1]/CodeIgniter_EWM/uploads/profilepic/photo_2020-07-24_15-56-53.jpg', NULL),
(2, 'dolphin', 'Somaiya', 'User', 9453627231, 'pb@gmail.com', '123456', 'http://[::1]/codeigniter/EWM/uploads/profilepic/E-Waste_logo.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `fk_user` (`User_Id`),
  ADD KEY `fk_recycler` (`Recycler_Id`),
  ADD KEY `fk_service` (`Service_Id`);

--
-- Indexes for table `recycler`
--
ALTER TABLE `recycler`
  ADD PRIMARY KEY (`Recycler_Id`),
  ADD UNIQUE KEY `UNIQUE` (`EmailId`);

--
-- Indexes for table `service_center`
--
ALTER TABLE `service_center`
  ADD PRIMARY KEY (`Service_Id`),
  ADD UNIQUE KEY `UNIQUE` (`Email_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_recycler` FOREIGN KEY (`Recycler_ID`) REFERENCES `recycler` (`Recycler_Id`),
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`Service_Id`) REFERENCES `service_center` (`service_id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
