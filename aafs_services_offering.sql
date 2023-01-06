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
-- Table structure for table `aafs_services_offering`
--

CREATE TABLE `aafs_services_offering` (
  `services_id` int(11) NOT NULL,
  `services_name` varchar(100) NOT NULL,
  `services_category_id` int(11) NOT NULL,
  `services_status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL,
  `client_services_default_value` tinyint(1) DEFAULT 0,
  `request_service_default_value` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aafs_services_offering`
--

INSERT INTO `aafs_services_offering` (`services_id`, `services_name`, `services_category_id`, `services_status`, `created_on`, `updated_on`, `client_services_default_value`, `request_service_default_value`) VALUES
(1, 'AAFS TMs That Work on My Project Must Have a Background Check', 5, 1, '2022-12-18 19:58:15', NULL, 1, 0),
(2, 'AAFS Windows 10/11 File Explorer, MS Office 360, MS Word & Excel', 4, 1, '2022-12-18 20:18:07', NULL, 0, 1),
(3, 'AAFS Migration From QuickBooks Desktop to QuickBooks Online', 1, 1, '2022-12-18 20:19:09', NULL, 1, 0),
(4, 'AAFS Migration From Other Bookkeeping Apps To QuickBooks Online', 1, 1, '2022-12-18 20:30:32', NULL, 0, 1),
(5, 'QBSOL Accountant Month to Month Certified GL Bookkeeping Services', 1, 1, '2022-12-18 20:30:32', NULL, 1, 0),
(6, 'QBSOL Bank Account & Credit Card Reconciliation Reports', 1, 1, '2022-12-18 20:30:32', NULL, 0, 0),
(7, 'QBSOL Customer Profiles-Monthly Billing & Accounts Receivable Mgmt', 1, 1, '2022-12-18 20:30:32', NULL, 0, 1),
(8, 'QBSOL Vendor Profiles - Monthly Bill Paying & Accounts Payable Mgmt', 1, 1, '2022-12-18 20:30:32', NULL, 1, 0),
(9, 'QBSOL Monthly Payroll Processing - Tax Report Filings & Deposits', 1, 1, '2022-12-18 20:30:32', NULL, 1, 0),
(10, 'QBSOL Bookkeeping - Training & Support', 1, 1, '2022-12-18 20:41:32', NULL, 1, 0),
(11, 'QBSOL Monthly Financial Statements - Presentation & Consultation', 1, 1, '2022-12-18 20:41:32', NULL, 1, 0),
(12, 'QBSOL Monthly Cash Flow & Budget Reports', 1, 1, '2022-12-18 20:41:32', NULL, 0, 0),
(13, 'QBSOL Monthly Cost of Sales Reports', 1, 1, '2022-12-18 20:41:32', NULL, 0, 0),
(14, 'QBSOL Monthly Inventory Control & Reports', 1, 1, '2022-12-18 20:41:32', NULL, 0, 0),
(15, 'QBSOL Monthly Expense Reports', 1, 1, '2022-12-18 20:41:32', NULL, 0, 0),
(16, 'QBSOL Monthly Department Cost Reports', 1, 1, '2022-12-18 20:41:32', NULL, 0, 0),
(17, 'QBSOL Monthly Job or Project or Cost Reports', 1, 1, '2022-12-18 20:41:32', NULL, 1, 0),
(18, 'AAFS Capital Assets and Depreciation Schedules', 1, 1, '2022-12-18 20:41:32', NULL, 0, 0),
(19, 'AAFS Business and Asset Security & Strategies', 1, 1, '2022-12-18 20:41:32', NULL, 1, 0),
(20, 'AAFS Fiduciary, Nondisclosure & Other Contractual Agreements Anal', 1, 1, '2022-12-18 20:54:38', NULL, 1, 0),
(21, 'AAFS Business Insurance Coverage/Policies & Claim Processing', 1, 1, '2022-12-18 20:54:38', NULL, 0, 0),
(22, 'AAFS Writing, Articles, Periodicals, Newsletters & Proof Reading', 1, 1, '2022-12-18 20:54:38', NULL, 0, 0),
(23, 'AAFS Website Design, Development, SEO & Hosting', 1, 1, '2022-12-18 20:54:38', NULL, 0, 0),
(24, 'AAFS Windows 10/11 & Android Operating System Config', 4, 1, '2022-12-18 20:54:38', NULL, 0, 0),
(25, 'AAFS Computer Programming, Hardware & Software Config', 2, 1, '2022-12-18 20:54:38', NULL, 0, 0),
(26, 'AAFS Information Technology and Equipment Upgrades', 1, 1, '2022-12-18 21:03:11', NULL, 0, 0),
(27, 'AAFS Credit Analysis & Enhancement of Credit Ratings', 1, 1, '2022-12-18 21:03:11', NULL, 0, 0),
(28, 'AAFS Loan Analysis, Loan & Line of Credit Procurement', 1, 1, '2022-12-18 21:03:11', NULL, 0, 0),
(29, 'AAFS Debt Analysis, Debt Management & Cost Control', 1, 1, '2022-12-18 21:03:11', NULL, 0, 0),
(30, 'AAFS Business Operations Analysis & Strategies', 1, 1, '2022-12-18 21:03:11', NULL, 0, 0),
(31, 'AAFS Business Growth Opportunities & Strategies', 1, 1, '2022-12-18 21:03:11', NULL, 0, 0),
(32, 'AAFS Tax Planning and Tax Preparation & Filing', 1, 1, '2022-12-18 21:24:05', NULL, 0, 0),
(33, 'AAFS CPA - Certified Audits & Financial Statements', 1, 1, '2022-12-18 21:24:05', NULL, 0, 0),
(34, 'AAFS Advertising and Marketing Campaigns', 1, 1, '2022-12-18 21:24:05', NULL, 0, 0),
(35, 'AAFS Promotions, Sponsorships & Name Recognition Ads', 1, 1, '2022-12-18 21:24:05', NULL, 0, 0),
(36, 'AAFS Commercial Artwork and Graphic Design', 1, 1, '2022-12-18 21:24:05', NULL, 0, 0),
(37, 'AAFS Photography & Videographer, Commercial & Ad Videos', 1, 1, '2022-12-18 21:24:05', NULL, 0, 0),
(38, 'AAFS Start-up Company Consultation', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(39, 'AAFS Business Plans, Capitalization & Budgeting', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(40, 'AAFS Paralegal Services - Licensed Paralegal', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(41, 'AAFS Fictitious Name, Sole Proprietorship, LLC, Corp Filings', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(42, 'AAFS Legal Services - Licensed Lawyer/Attorney', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(43, 'AAFS Insurance Specialist-Licensed Insurance Agent', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(44, 'AAFS Financial Investment-Licensed Financial Advisor', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(45, 'AAFS Business Partnership Opportunities & Structures', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0),
(46, 'AAFS Bankruptcy Analysis & Filings', 1, 1, '2022-12-18 21:31:59', NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aafs_services_offering`
--
ALTER TABLE `aafs_services_offering`
  ADD PRIMARY KEY (`services_id`),
  ADD KEY `services_name` (`services_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aafs_services_offering`
--
ALTER TABLE `aafs_services_offering`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
