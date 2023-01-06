-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2023 at 07:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arthuran`
--

-- --------------------------------------------------------

--
-- Table structure for table `aafs_client_master`
--

CREATE TABLE `aafs_client_master` (
  `clnt_master_id` int(11) NOT NULL,
  `clnt_master_fname` varchar(255) NOT NULL,
  `clnt_master_lname` varchar(255) NOT NULL,
  `clnt_master_company` varchar(155) NOT NULL,
  `clnt_master_website` varchar(255) NOT NULL,
  `clnt_master_email` varchar(95) NOT NULL,
  `clnt_master_phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aafs_client_master`
--

INSERT INTO `aafs_client_master` (`clnt_master_id`, `clnt_master_fname`, `clnt_master_lname`, `clnt_master_company`, `clnt_master_website`, `clnt_master_email`, `clnt_master_phone`) VALUES
(1, 'Anand', 'S', 'arthu', 'http://localhost/project/aafinancials/aafs/client_services.php', 'aruncourage@gmail.com', '6362618278'),
(2, 'Arun', 'Kumar', 'Arthur', 'arthur.com', 'aruncourage123@gmail.com', '6362618278'),
(5, 'dsf', 'sdfsdf', 'sdfsd', 'arthur.com', 'sdfads@gmail.com', '6362618278'),
(6, 'adssda', 'sdfsdf', 'sdfs', 'adfadfdfa', 'aruncourage123@gmail.com', '6362618278'),
(7, 'es', 'adfa', 'afdsfdas', 'dsfsdffs', 'aruncourage123@gmail.com', '6362618278'),
(9, 'dsfa', 'sdfdsf', 'sdfs', 'dsfsdffs', 'aruncourage@gmail.com', '12312123'),
(10, 'adsa', 'sdfsdf', 'sdfsd', 'sdssdf', 'sdfa@gmai.com', '6362618278'),
(11, 'test', 'sdfdsf', 'sdfsd', 'sdssdf', 'aruncourage123@gmail.com', '6362618278'),
(12, 'dsfa', 'Kumar', 'sdfsd', 'sdssdf', 'sdfads@gmail.com', '6362618278'),
(13, 'adssda', 'Kumar', 'sdfsd', 'sdssdf', 'arer@gamil.com', '9991111211');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aafs_client_master`
--
ALTER TABLE `aafs_client_master`
  ADD PRIMARY KEY (`clnt_master_id`),
  ADD UNIQUE KEY `clnt_master_website` (`clnt_master_website`,`clnt_master_email`),
  ADD KEY `clnt_master_fname` (`clnt_master_fname`,`clnt_master_lname`,`clnt_master_company`,`clnt_master_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aafs_client_master`
--
ALTER TABLE `aafs_client_master`
  MODIFY `clnt_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
