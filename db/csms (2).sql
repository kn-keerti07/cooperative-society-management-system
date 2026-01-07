-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 03:39 PM
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
(1, 'SANTOSH S KATAGI', '2015-12-29', 'Male', 'BANAGAR ONI, MRITHUNJAY NAGAR', 'venture.santosh@gmail.com', '9886645468', 'Business', '2044367903', '2025-05-05', '../uploads/photos/SJMV-LOG.jpg', '../uploads/signatures/SLIDER1.png', '243243'),
(2, 'RASHMI SANTOSH KATAGI', '2025-05-01', 'Male', 'BANAGAR ONI, MRITHUNJAY NAGAR', 'rashmi.katagi1994@gmail.com', '9886645468', 'Business', '5775727328', '2025-05-05', '../uploads/photos/admin_panel3.png', '../uploads/signatures/admin_panel.png', '2432439900'),
(3, 'Keerti Hegde', '2004-08-27', 'Female', 'guruvalli, keregadde po:vanalli ta:sirsi(u.k)', 'keertihegde009@gmail.com', '9483937973', 'student', '5819503625', '2025-05-06', '../uploads/photos/WhatsApp Image 2025-05-05 at 19.16.47_f3491ea9.jpg', '../uploads/signatures/WhatsApp Image 2025-05-05 at 19.37.04_108f881e.jpg', '324212435654'),
(4, 'Bhavyashree Hegde', '2004-03-15', 'Female', '@bakkala, ambalike', 'bhavyahegde@gmail.com', '8767654543', 'worker', '9040566520', '2025-05-07', '', '', '786578650989');

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
  `complaint_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `accountholder_id`, `complaint_title`, `complaint_description`, `complaint_date`, `complaint_status`) VALUES
(1, 1, 'abcd', 'abcd', '2025-05-05', 'REQUEST');

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
(2, '2044367903', '123123', 'customer', 'Active'),
(3, '5775727328', '5775727328', 'customer', 'Active'),
(4, '5819503625', '5819503625', 'customer', 'Active'),
(5, '9040566520', '9040566520', 'customer', 'Active');

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
(1, 1, '200', 200888, 'CASH', '2025-05-06'),
(2, 1, '200', 101, 'CASH', '2025-05-07'),
(3, 1, '200', 101, 'CASH', '2025-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`) VALUES
(7, 'organic fertilizer', 'eco friendly', 'fertilizers.jpg', '100.00'),
(8, 'ultratech cement', 'strong foundation lasting impression', 'cement.jpg', '500.00'),
(9, 'Rice', 'pure fluffy and fragrant', 'rice.jpg', '300.00'),
(10, 'Dhara hindi', 'health cattle higher milk better profits', 'dhara.jpg', '1000.00'),
(11, 'Salt', 'pure and essential', 'salt.jpg', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_request`
--

CREATE TABLE `product_request` (
  `productreq_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `account_no` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_request`
--

INSERT INTO `product_request` (`productreq_id`, `product_id`, `account_no`, `quantity`, `request_date`, `request_status`) VALUES
(1, 7, 2044367903, 2, '2025-05-05', 'CONFIRMED'),
(2, 8, 2044367903, 2, '2025-05-05', 'CONFIRMED'),
(3, 7, 2044367903, 1, '2025-05-06', 'Pending'),
(4, 7, 2147483647, 1, '2025-05-07', 'Pending'),
(5, 8, 2147483647, 1, '2025-05-07', 'Pending'),
(6, 7, 2147483647, 1, '2025-05-07', 'Pending'),
(7, 7, 2147483647, 1, '2025-05-07', 'Pending'),
(8, 7, 2147483647, 1, '2025-05-07', 'Pending');

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
(7, 'loan', 'less interest', 'loan.pdf', 12, 'inactive'),
(8, 'agri loan', 'less interest', 'agri_loan.pdf', 10, 'active'),
(10, 'educational loan', 'less', 'edu_loan.pdf', 9, 'active'),
(11, 'abcd', 'asdas', 'branch_panel-2.png', 20, 'ACTIVE');

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
(1, 'DEPOSIT', 1, '3000', '2025-05-05', '19:32:00'),
(2, 'WITHDRAWAL', 1, '1000', '2025-05-05', '19:32:00'),
(3, 'DEPOSIT', 2, '80000', '2025-05-05', '19:49:00'),
(4, 'WITHDRAWAL', 2, '3200', '2025-05-05', '19:49:00'),
(5, 'DEPOSIT', 4, '1000', '2025-05-07', '04:09:00'),
(6, 'DEPOSIT', 3, '1000', '2025-05-07', '14:36:00');

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
  MODIFY `accountholder_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_request`
--
ALTER TABLE `product_request`
  MODIFY `productreq_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `scheme_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
