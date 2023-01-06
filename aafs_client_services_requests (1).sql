-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2023 at 07:14 PM
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
-- Table structure for table `aafs_client_services_requests`
--

CREATE TABLE `aafs_client_services_requests` (
  `clinet_service_request_id` int(11) NOT NULL,
  `client_master_id` int(11) NOT NULL,
  `client_request_video_link` varchar(155) DEFAULT NULL,
  `request_letter_file` varchar(55) DEFAULT NULL,
  `client_request_photo_1` varchar(55) DEFAULT NULL,
  `client_request_photo_2` varchar(55) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `services_id` varchar(255) NOT NULL,
  `schedule_services` varchar(255) NOT NULL,
  `services_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aafs_client_services_requests`
--

INSERT INTO `aafs_client_services_requests` (`clinet_service_request_id`, `client_master_id`, `client_request_video_link`, `request_letter_file`, `client_request_photo_1`, `client_request_photo_2`, `created_on`, `updated_on`, `services_id`, `schedule_services`, `services_name`) VALUES
(1, 1, 'https://www.youtube.com/watch?v=0eWrpsCLMJQ&list=PLC3y8-rFHvwhBRAgFinJR8KHIrCdTkZcZ', 'arun.png', 'kumar.png', 'Priya.pdf', '2022-12-27 06:13:29', '2022-12-27 06:13:29', '1,3,8,10', '2', ''),
(2, 7, 'https://www.youtube.com/watch?v=0eWrpsCLMJQ&list=PLC3y8-rFHvwhBRAgFinJR8KHIrCdTkZcZ', 'arun.png', 'kumar.png', 'Priya.pdf', '2023-01-06 17:37:15', '2023-01-06 17:37:15', '35', '1', ''),
(3, 10, 'dsafdfas1234.com', 'arun.png', 'kumar.png', 'Priya.pdf', '2023-01-06 17:54:10', '2023-01-06 17:54:10', '28', '', NULL),
(4, 11, 'https://www.youtube.com/watch?v=0eWrpsCLMJQ&list=PLC3y8-rFHvwhBRAgFinJR8KHIrCdTkZcZ', 'arun.png', 'kumar.png', 'Priya.pdf', '2023-01-06 17:55:38', '2023-01-06 17:55:38', '15', '1', 'client Services'),
(5, 12, 'https://www.youtube.com/watch?v=0eWrpsCLMJQ&list=PLC3y8-rFHvwhBRAgFinJR8KHIrCdTkZcZ', 'arun.png', 'Priya.pdf', 'kumar.png', '2023-01-06 17:58:15', '2023-01-06 17:58:15', '1,3,5,9,11,17,19,8,10,20,28', '', 'client Services'),
(6, 13, 'https://www.youtube.com/watch?v=0eWrpsCLMJQ&list=PLC3y8-rFHvwhBRAgFinJR8KHIrCdTkZcZ', '', '', '', '2023-01-06 18:12:35', '2023-01-06 18:12:35', '7,2,4', '1', 'Request Services');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aafs_client_services_requests`
--
ALTER TABLE `aafs_client_services_requests`
  ADD PRIMARY KEY (`clinet_service_request_id`),
  ADD KEY `client_master_id` (`client_master_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aafs_client_services_requests`
--
ALTER TABLE `aafs_client_services_requests`
  MODIFY `clinet_service_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
