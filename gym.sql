-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 08:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` tinyint(4) NOT NULL,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `first_name`, `last_name`, `admin_email`, `admin_password`, `phone`, `admin_status`, `soft_delete`, `created_at`) VALUES
(4, 'Supty', 'Ahmed', 'admin@gmail.com', 'Pa$$w0rd!', '+8801300813663', 0, 0, '2021-10-08 02:00:10'),
(7, 'Dipta', 'Dey', 'dipta@gmail.com', '123456', '+8801456787653', 1, 1, '2022-08-22 15:53:56'),
(8, 'Aline', 'Berger', 'Aline@hotmail.com', 'Pa$$w0rd!', '+8801345876980', 1, 0, '2022-09-04 05:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `check_table`
--

CREATE TABLE `check_table` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `emp_job_status` varchar(200) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `emp_phone` varchar(200) NOT NULL,
  `emp_image` varchar(200) NOT NULL,
  `emp_salary` varchar(200) NOT NULL,
  `create_emp` timestamp NOT NULL DEFAULT current_timestamp(),
  `emp_address` text NOT NULL,
  `total_rat` int(11) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`emp_id`, `emp_name`, `emp_job_status`, `emp_email`, `emp_phone`, `emp_image`, `emp_salary`, `create_emp`, `emp_address`, `total_rat`, `hit`) VALUES
(7, 'Lyle Lawson', 'Instructor', 'Lyle@gmail.com', '+8801554587987', 'img/29af87ec71.jpg', '10000', '2022-08-22 15:53:56', 'Dhaka', NULL, NULL),
(8, 'Simone Parker', 'Instructor', 'simone@gmail.com', '+8801376876567', 'img/18a9d6e6eb.jpg', '10000', '2022-08-30 14:13:01', 'Dhaka', NULL, NULL),
(9, 'William Blake', 'Instructor', 'blake@gmail.com', '+8801346756876', 'img/0c31aa61d3.jpg', '10000', '2022-08-30 14:14:58', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `mobile_no` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `pack_id` int(11) DEFAULT NULL,
  `pack_price` int(11) DEFAULT NULL,
  `pack_month` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pack_discount` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `trainer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `mobile_no`, `product_id`, `pack_id`, `pack_price`, `pack_month`, `pack_discount`, `status`, `created_at`, `trainer_id`) VALUES
(52, '+8801300813663', NULL, 14, 5000, '6', '5', 1, '2022-09-04', 7),
(53, '+8801300813663', NULL, 15, 4000, '5', '5', 1, '2022-09-04', 8),
(54, '+8801300813663', 4, NULL, NULL, NULL, NULL, 1, '2022-09-04', NULL),
(55, '+8801300813663', 7, NULL, NULL, NULL, NULL, 1, '2022-09-04', NULL),
(56, '+8801300813663', 3, NULL, NULL, NULL, NULL, 0, '2022-09-04', NULL),
(57, '+8801300813663', 2, NULL, NULL, NULL, NULL, 0, '2022-09-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_table`
--

CREATE TABLE `package_table` (
  `package_id` int(20) NOT NULL,
  `pack_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(25) NOT NULL,
  `discount` int(25) NOT NULL,
  `del_pack` tinyint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_table`
--

INSERT INTO `package_table` (`package_id`, `pack_name`, `details`, `image`, `month`, `price`, `discount`, `del_pack`) VALUES
(14, 'Weight Loss', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.', 'upload/84cd9a76c6.png', '6', 5000, 5, 0),
(15, 'Yoga Class', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.', 'upload/305cc626fc.png', '5', 4000, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `order_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`order_id`, `cus_id`, `product_id`, `buying_price`, `selling_price`, `discount`, `quantity`, `status`) VALUES
(36, 37, 4, 300, 470, 5, 2, 0),
(37, 37, 3, 2000, 3500, 5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `name`, `description`, `image`, `stock`, `buying_price`, `selling_price`, `discount`, `soft_delete`) VALUES
(2, 'Exercise ball', 'Anti-Burst Fitness Exercise Stevility yoga Gym Ball', 'upload/356b0e0d9f.jpg', '85', 1800, 2000, 15, 0),
(3, 'Dumbbells', '5Kg Hex Dumbbell Pair', 'upload/f9f2425d67.jpg', '88', 2000, 3500, 5, 0),
(4, 'Yoga Mat', '6Mm Gym Exercise Yoga Mat Latex And Pvc Free', 'upload/296ff346e8.jpg', '78', 300, 470, 5, 0),
(7, 'L Key Dumbbells', 'Steel,Rubber Adjustable Dumbbells Pvc Dumbbell L Key, Weight: 25 Kg', 'upload/fe6c98fee2.jpg', '97', 700, 900, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_table`
--

CREATE TABLE `salary_table` (
  `salary_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `year` int(11) NOT NULL,
  `pay_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_table`
--

INSERT INTO `salary_table` (`salary_id`, `emp_id`, `month`, `salary`, `year`, `pay_at`) VALUES
(3, 3, 'October', '10000', 2020, '2021-10-26 09:47:07'),
(6, 4, 'October', '100000', 2021, '2021-12-13 07:38:52'),
(7, 7, 'August', '10000', 2022, '2022-08-30 08:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` tinyint(10) NOT NULL DEFAULT 0,
  `otp` int(11) NOT NULL,
  `reg_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `first_name`, `last_name`, `email`, `password`, `dob`, `gender`, `mobile`, `address`, `image`, `flag`, `otp`, `reg_at`) VALUES
(36, 'Supty', 'Ahmed', 'ayrin.supty806@gmail.com', '123456', '1996-12-21', 'Female', '+8801300813663', 'Dhaka', 'img/253ed84cb0.jpg', 0, 1661509527, '2022-08-26 10:25:27'),
(37, 'Kendall', 'Camacho', 'Kendall@hotmail.com', 'Pa$$w0rd!', '1997-07-24', 'Female', '+8801173456876', 'Dhaka', 'img/579b1596a4.jpg', 0, 1661510198, '2022-08-26 10:36:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_table`
--
ALTER TABLE `check_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `package_table`
--
ALTER TABLE `package_table`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `check_table`
--
ALTER TABLE `check_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `package_table`
--
ALTER TABLE `package_table`
  MODIFY `package_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary_table`
--
ALTER TABLE `salary_table`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
