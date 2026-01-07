-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 02:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_holder`
--

CREATE TABLE `account_holder` (
  `accountholder_id` int(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `accountholder_photo` text NOT NULL,
  `signature` text NOT NULL,
  `adhar_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_holder`
--

INSERT INTO `account_holder` (`accountholder_id`, `full_name`, `date_of_birth`, `gender`, `address`, `email_id`, `contact_no`, `occupation`, `account_no`, `create_date`, `accountholder_photo`, `signature`, `adhar_no`) VALUES
(13, 'Narayan Hegde', '1975-06-22', 'Male', '@Guruvalli, Keregadde Po:Vanalli Tq: Sirsi(U,K)', 'narayankeregadde@gmail.com', '9448579998', 'Farmer', '7724429116', '2025-05-21', '../uploads/photos/narayan.jpg', '../uploads/signatures/narayan_sign.jpg', '456534236787'),
(14, 'Soubhagya Hegde', '1983-06-07', 'Female', '@Guruvalli, Keregadde Po:Vanalli Tq:Sirsi(U,K)', 'soubhagyahegde@gmail.com', '8277600491', 'Housewife', '7375098264', '2025-05-21', '../uploads/photos/soubhagya-Photoroom.png', '../uploads/signatures/sign.jpg', '345423123454'),
(15, 'Anant Hegde', '1981-05-06', 'Male', '@Vanalli Tq:Sirsi(U,K)', 'ananthegde@gmail.com', '8277350092', 'Farmer', '9403605657', '2025-05-21', '../uploads/photos/anant-Photoroom.png', '../uploads/signatures/sign.jpg', '675645345676'),
(16, 'Keerti Hegde', '2004-12-27', 'Female', '@Vanalli Tq:Sirsi(U,K)', 'keertihegde009@gmail.com', '9483937973', 'Student', '5227038855', '2025-05-21', '../uploads/photos/keerti50kb.jpg', '../uploads/signatures/sign.jpg', '345676878909'),
(17, 'Bhavyashree Hegde', '2004-03-15', 'Male', '@Jaddigadde Po:Vanalli Tq:Sirsi(U,K)', 'bhavyashreehegde0@gmail.com', '9448567898', 'Worker', '1897284257', '2025-05-21', '../uploads/photos/bhavya-Photoroom.png', '../uploads/signatures/sign.jpg', '234354567898'),
(18, 'Dhanya Hegde', '2004-03-21', 'Female', '@Vanalli Po:Vanalli ', 'ddhanyahegde@gmail.com', '8765678987', 'Worker', '3821950322', '2025-05-24', '../uploads/photos/WhatsApp Image 2025-05-24 at 22.00.13_a3afbeca.jpg', '../uploads/signatures/sign.jpg', '789876564534');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(100) NOT NULL,
  `accountholder_id` int(100) NOT NULL,
  `complaint_title` varchar(255) NOT NULL,
  `complaint_description` text NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_status` varchar(200) NOT NULL,
  `admin_response` text DEFAULT NULL,
  `response_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `accountholder_id`, `complaint_title`, `complaint_description`, `complaint_date`, `complaint_status`, `admin_response`, `response_date`) VALUES
(3, 7, 'Transaction Issue', 'I deposited 5,000 on 5th May but it is not reflecting in my account balance.', '2025-05-12', 'Resolved', 'Dear Narayan,\r\n\r\nWe apologize for the delay in your ₦5,000 deposit. Our team is working on it, and the amount will be reflected in your account within 24 hours.\r\n\r\nThank you for your patience.\r\n\r\nBest regards,\r\nMSS Vanalli', '2025-05-12'),
(5, 7, 'Incorrect Interest Calculation', 'The interest on my savings account for April seems wrong. Please review the calculation', '2025-05-12', 'REQUEST', NULL, NULL),
(6, 16, 'Transaction Issue', 'Issue reported regarding a failed,delayed or incorrect transaction for further investigation.', '2025-05-21', 'Resolved', 'Your transaction complaint has been received and is currently under review for resolution.', '2025-05-21'),
(7, 14, 'Incorrect account balance ', 'Incorrect account balance after recent transaction.', '2025-05-21', 'REQUEST', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `type`, `status`) VALUES
(1, 'admin', '123123', 'admin', 'Active'),
(8, '9890123789', '9890123789', 'customer', 'Active'),
(14, '7724429116', '7724429116', 'customer', 'Active'),
(15, '7375098264', '7375098264', 'customer', 'Active'),
(16, '9403605657', '9403605657', 'customer', 'Active'),
(17, '5227038855', '5227038855', 'customer', 'Active'),
(18, '1897284257', '1897284257', 'customer', 'Active'),
(19, '3821950322', '3821950322', 'customer', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `productreq_id` int(100) NOT NULL,
  `bill_amount` decimal(10,0) NOT NULL,
  `transaction_id` int(100) NOT NULL,
  `transaction_type` varchar(200) NOT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `productreq_id`, `bill_amount`, `transaction_id`, `transaction_type`, `transaction_date`) VALUES
(4, 1, '100', 1, 'CASH', '2025-05-13'),
(5, 3, '100', 1, 'CASH', '2025-05-21'),
(6, 4, '500', 2, 'CHEQUE', '2025-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`, `product_status`) VALUES
(7, 'Organic fertilizer', 'Eco friendly', 'fertilizers.jpg', '100.00', ''),
(8, 'Ultratech cement', 'Strong foundation lasting impression', 'cement.jpg', '500.00', ''),
(9, 'Rice', 'Pure fluffy and fragrant', 'rice.jpg', '300.00', ''),
(10, 'Dhara hindi', 'Health cattle higher milk better profits', 'dhara.jpg', '800.00', 'No Stock'),
(11, 'Salt', 'Pure and Essential', 'salt.jpg', '100.00', 'No Stock');

-- --------------------------------------------------------

--
-- Table structure for table `product_request`
--

CREATE TABLE `product_request` (
  `productreq_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_request`
--

INSERT INTO `product_request` (`productreq_id`, `product_id`, `account_no`, `quantity`, `request_date`, `request_status`) VALUES
(1, 7, '9890123789', 1, '2025-05-13', 'CONFIRMED'),
(2, 10, '9890123789', 1, '2025-05-13', 'Pending'),
(3, 7, '5227038855', 1, '2025-05-21', 'CONFIRMED'),
(4, 8, '5227038855', 1, '2025-05-21', 'CONFIRMED'),
(5, 9, '7375098264', 1, '2025-05-21', 'Pending'),
(6, 8, '7375098264', 3, '2025-05-21', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `scheme_id` int(100) NOT NULL,
  `scheme_name` varchar(200) NOT NULL,
  `scheme_description` text NOT NULL,
  `scheme_attachfile` text NOT NULL,
  `scheme_duration` int(50) NOT NULL,
  `scheme_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`scheme_id`, `scheme_name`, `scheme_description`, `scheme_attachfile`, `scheme_duration`, `scheme_status`) VALUES
(14, 'Monthly Savings Plan', 'Members contribute a fixed amount monthly and earn interest.', 'uploads/monthly_plan.pdf', 12, 'ACTIVE'),
(15, 'Fixed Deposit Scheme', 'Lump sum deposit for a fixed term with higher interest.', 'uploads/fixed_deposit.pdf', 24, 'ACTIVE'),
(16, 'Welfare Fund Contribution', 'Monthly contributions to a welfare fund used during emergencies.', 'uploads/welfare_details.pdf', 12, 'ACTIVE'),
(17, 'Education Support Scheme', 'Savings scheme aimed at supporting educational expenses.', 'uploads/education_support.pdf', 18, 'INACTIVE'),
(18, 'Festival Bonus Scheme', 'Members receive a bonus payout during major festivals.', 'uploads/festival_bonus.pdf', 6, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(100) NOT NULL,
  `transaction_type` varchar(200) NOT NULL,
  `accountholder_id` int(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_type`, `accountholder_id`, `amount`, `date`, `time`) VALUES
(7, 'DEPOSIT', 7, '1000', '2025-05-12', '20:19:00'),
(8, 'WITHDRAWAL', 7, '500', '2025-05-12', '20:29:00'),
(9, 'DEPOSIT', 9, '1000', '2025-05-16', '14:00:00'),
(10, 'WITHDRAWAL', 13, '1000', '2025-05-21', '13:00:00'),
(11, 'DEPOSIT', 16, '1000', '2025-05-21', '13:00:00'),
(12, 'DEPOSIT', 14, '675', '2025-05-21', '13:01:00'),
(13, 'WITHDRAWAL', 15, '500', '2025-05-21', '13:01:00'),
(14, 'DEPOSIT', 17, '1000', '2025-05-24', '17:22:00'),
(15, 'DEPOSIT', 18, '575', '2025-05-24', '18:34:00'),
(16, 'WITHDRAWAL', 18, '200', '2025-05-24', '18:34:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_holder`
--
ALTER TABLE `account_holder`
  ADD PRIMARY KEY (`accountholder_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_request`
--
ALTER TABLE `product_request`
  ADD PRIMARY KEY (`productreq_id`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`scheme_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_holder`
--
ALTER TABLE `account_holder`
  MODIFY `accountholder_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_request`
--
ALTER TABLE `product_request`
  MODIFY `productreq_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `scheme_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
