-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 06:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_password`, `admin_status`, `created_at`) VALUES
(4, 'admin@gmail.com', '12', 0, '2021-10-08 02:00:10'),
(5, 't@g.c', '12', 1, '2021-10-26 09:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `check_table`
--

CREATE TABLE `check_table` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_table`
--

INSERT INTO `check_table` (`id`, `customer_id`, `emp_id`) VALUES
(9, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(11) NOT NULL,
  `name` varchar(151) NOT NULL,
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
(3, 'Hamids', 'Instructtor', 'hamid@gmail.com', '+8801111111111', 'img/b3baddc405.png', '10000', '2021-10-08 02:43:58', 'sdf', 4, 1),
(4, 'DDD', 'Instructtor', 'dd@gmail.com', '+8801123456789', 'img/7551243ea9.png', '100000', '2021-10-08 09:15:36', 'df', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `id` int(11) NOT NULL,
  `age_limit` varchar(150) NOT NULL,
  `menu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `mobile_no` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_id` int(11) NOT NULL,
  `pack_price` int(11) NOT NULL,
  `pack_month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_discount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `mobile_no`, `pack_id`, `pack_price`, `pack_month`, `pack_discount`, `status`, `created_at`, `trainer_id`) VALUES
(24, '+88011111111111', 8, 4444, '4', '4', 1, '2021-10-08', 0),
(25, '+88011111111111', 8, 4444, '4', '4', 1, '2021-10-08', 0),
(26, '+8801444444444', 8, 4444, '4', '4', 1, '2021-05-05', 3),
(27, '+8801444444444', 8, 4444, '4', '4', 1, '2021-10-08', 0),
(28, '+8801111111111', 8, 4444, '4', '4', 1, '2021-10-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_table`
--

CREATE TABLE `package_table` (
  `package_id` int(20) NOT NULL,
  `pack_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(25) NOT NULL,
  `discount` int(25) NOT NULL,
  `del_pack` tinyint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_table`
--

INSERT INTO `package_table` (`package_id`, `pack_name`, `details`, `month`, `price`, `discount`, `del_pack`) VALUES
(8, 'test', 'tewsvsd', '4', 4444, 4, 0);

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
(3, 3, 'October', '10000', 2021, '2021-10-26 09:47:07');

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
(12, 'a', 'a', 'admifn@gmail.com', '44444444', '2021-09-26', 'male', '+8801444444444', 'fdf', 'img/7c7c531de2.png', 0, 0, '2021-10-07 15:05:04'),
(13, 'dipa', 'dey', 'dipta95@gmail.com', '123456', '2021-09-26', 'male', '+8801123456789', 'df', 'img/91eae5a561.png', 0, 0, '2021-10-08 02:43:10'),
(14, 'Dipta', 'Dey', 'dipta@gmail.com', '12345678', '2021-10-04', 'male', '+8801111111111', 'bcv', 'img/b336edb0f1.png', 0, 0, '2021-10-26 08:57:16'),
(15, 'Dipta', 'Dey', 'dipta1@gmail.com', '12345678', '2021-10-03', 'male', '+8801111111111', 'xfzg', 'img/88ed54f7f8.png', 0, 0, '2021-10-26 09:12:01'),
(26, 'Dipta', 'Dey', 'dipta995@gmail.com', '12345678', '2021-10-31', 'male', '+8801111111111', 'fsd', 'img/aea5f0085f.png', 0, 1636044061, '2021-11-04 16:41:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `check_table`
--
ALTER TABLE `check_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `package_table`
--
ALTER TABLE `package_table`
  MODIFY `package_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary_table`
--
ALTER TABLE `salary_table`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
