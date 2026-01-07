-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 02:09 PM
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
(7, 'Narayan Hegde', '1975-06-22', 'Male', '@Guruvalli,Keregadde Po:Vanalli Tq:Sirsi(U.K)', 'narayankeregadde@gmail.com', '9448579998', 'Farmer', '9890123789', '2025-05-12', '../uploads/photos/narayan.jpg', '../uploads/signatures/narayan_sign.jpg', '456534236787'),
(8, 'Soubhagya Hegde', '1993-06-06', 'Female', '@Guruvalli Keregadde Po:Vanalli Tq:Sirsi(U.K)', 'soubhagyahegde@gmail.com', '8277600491', 'Housewife', '9290229862', '2025-05-12', '../uploads/photos/soubhagya.jpg', '../uploads/signatures/sign.jpg', '345423123454'),
(9, 'Keerti Hegde', '2004-08-27', 'Female', '@Vanalli Po:Vanalli Tq:Sirsi(U.K)', 'keertihegde009@gmail.com', '9483938781', 'student', '8101564585', '2025-05-12', '../uploads/photos/keerti50kb.jpg', '../uploads/signatures/sign.jpg', '345465786756'),
(10, 'Anant Hegde', '1973-05-06', 'Male', '@Jaddigadde Po:Vanalli Tq:Sirsi (U.K)', 'ananthegde@gmail.com', '8277350092', 'Farmer', '3953242408', '2025-05-12', '../uploads/photos/anant.jpg', '../uploads/signatures/sign.jpg', '768798765645'),
(12, 'Bhavyashree Hegde', '2002-03-15', 'Female', '@Ambalike Po:Bakkala Tq:Sirsi', 'bhavyahegde@gmail.com', '8767654543', 'Worker', '4793284640', '2025-05-12', '../uploads/photos/bhavya.jpg', '../uploads/signatures/sign.jpg', '7687986588');

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
(5, 7, 'Incorrect Interest Calculation', 'The interest on my savings account for April seems wrong. Please review the calculation', '2025-05-12', 'REQUEST', NULL, NULL);

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
(1, 'admin', '321321', 'admin', 'Active'),
(8, '9890123789', '9890123789', 'customer', 'Active');

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
(4, 1, '100', 1, 'CASH', '2025-05-13');

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
(2, 10, '9890123789', 1, '2025-05-13', 'Pending');

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
(9, 'DEPOSIT', 9, '1000', '2025-05-16', '14:00:00');

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
  MODIFY `accountholder_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_request`
--
ALTER TABLE `product_request`
  MODIFY `productreq_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `scheme_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
