-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 04:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`user_id`) VALUES
(5);

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `asset_id` int(11) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `asset_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`asset_id`, `asset_name`, `category_id`, `asset_price`) VALUES
(1, 'wire', 2, 50),
(2, 'book', 1, 70),
(3, 'PC Table', 3, 1500),
(4, 'Arduino', 4, 500);

-- --------------------------------------------------------

--
-- Table structure for table `asset_request_status`
--

CREATE TABLE `asset_request_status` (
  `request_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `ap_by_hod` int(11) NOT NULL DEFAULT '0',
  `ap_by_dpo` int(11) NOT NULL DEFAULT '0',
  `ap_by_cpo` int(11) NOT NULL DEFAULT '0',
  `ap_by_principal` int(11) NOT NULL DEFAULT '0',
  `approved_in_college` int(11) NOT NULL DEFAULT '0',
  `ap_by_store_manager` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_request_status`
--

INSERT INTO `asset_request_status` (`request_id`, `asset_id`, `user_id`, `date`, `quantity`, `total_price`, `ap_by_hod`, `ap_by_dpo`, `ap_by_cpo`, `ap_by_principal`, `approved_in_college`, `ap_by_store_manager`) VALUES
(1, 1, 3, '2019-01-10', 10, 500, 1, 1, 1, 1, 0, 1),
(2, 2, 1, '2019-01-09', 6, 130, 1, 0, 0, 0, 0, 0),
(3, 3, 3, '2019-01-08', 2, 3000, 1, 1, 1, 1, 0, 1),
(4, 4, 2, '2019-01-04', 6, 3000, 1, 1, 0, 0, 0, 0),
(5, 2, 4, '2019-01-09', 4, 280, 0, 0, 0, 0, 0, 0),
(6, 1, 11, '2019-01-03', 4, 200, 1, 1, 1, 1, 0, 1),
(7, 3, 11, '2019-01-09', 1, 1500, 1, 1, 1, 1, 0, 0),
(8, 2, 1, '2019-01-09', 5, 250, 1, 1, 1, 0, 0, 0),
(9, 4, 1, '2019-01-07', 2, 1000, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Stationery'),
(2, 'Electrical'),
(3, 'Furniture'),
(4, 'IOT');

-- --------------------------------------------------------

--
-- Table structure for table `category_user_map`
--

CREATE TABLE `category_user_map` (
  `category_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_user_map`
--

INSERT INTO `category_user_map` (`category_id`, `user_type`) VALUES
(2, 4),
(1, 2),
(1, 3),
(1, 5),
(1, 4),
(3, 4),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `collegeassets`
--

CREATE TABLE `collegeassets` (
  `asset_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cpo`
--

CREATE TABLE `cpo` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpo`
--

INSERT INTO `cpo` (`user_id`) VALUES
(7);

-- --------------------------------------------------------

--
-- Table structure for table `dpo`
--

CREATE TABLE `dpo` (
  `user_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `exchange_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_by` int(11) NOT NULL,
  `request_to` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`exchange_id`, `request_id`, `request_by`, `request_to`, `quantity`, `approved`) VALUES
(1, 1, 11, 3, 1, 1),
(2, 3, 11, 3, 2, 0),
(3, 6, 3, 11, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `user_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`user_id`, `branch`) VALUES
(5, 'INFT'),
(6, 'CMPN');

-- --------------------------------------------------------

--
-- Table structure for table `lab_assistant`
--

CREATE TABLE `lab_assistant` (
  `user_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `lab_assigned` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_assistant`
--

INSERT INTO `lab_assistant` (`user_id`, `branch`, `lab_assigned`) VALUES
(3, 'INFT', '512B'),
(11, 'CMPN', '308');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`user_id`) VALUES
(8);

-- --------------------------------------------------------

--
-- Table structure for table `store_manager`
--

CREATE TABLE `store_manager` (
  `user_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_address` varchar(255) NOT NULL,
  `store_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_manager`
--

INSERT INTO `store_manager` (`user_id`, `store_name`, `store_address`, `store_contact`) VALUES
(9, 'Hira Book Seller', 'Shivaji chownk', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `roll_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `branch`, `division`, `roll_no`) VALUES
(1, 'CMPN', 'D12A', 58);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `branch`) VALUES
(2, 'INFT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `contact`, `user_type`) VALUES
(1, 'Chirag', 'chiragrohra@gmail.com', 'chirag123', 1234567890, 2),
(2, 'Dhiraj', 'dhiraj@gmail.com', 'dhiraj123', 1234567890, 3),
(3, 'Juhi', 'juhi@gmail.com', 'juhi123', 1234567890, 4),
(4, 'Yogita', 'yogita@gmail.com', 'yogita123', 1234567890, 5),
(5, 'Sanjay', 'sanjay@gmail.com', 'sanjay123', 1234567890, 6),
(6, 'Karan', 'karan@gmail.com', 'karan123', 1234567890, 7),
(7, 'Latika', 'latika@gmail.com', 'latika123', 1234567890, 8),
(8, 'Puja', 'puja@gmail.com', 'puja123', 1234567890, 9),
(9, 'Jiten', 'jiten@gmail.com', 'jiten123', 1234567890, 10),
(10, 'Admin', 'admin@gmail.com', 'admin123', 1234567890, 1),
(11, 'Rahul', 'rahul@gmail.com', 'rahul123', 1234567890, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `asset_request_status`
--
ALTER TABLE `asset_request_status`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cpo`
--
ALTER TABLE `cpo`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `dpo`
--
ALTER TABLE `dpo`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`exchange_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `lab_assistant`
--
ALTER TABLE `lab_assistant`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `store_manager`
--
ALTER TABLE `store_manager`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asset_request_status`
--
ALTER TABLE `asset_request_status`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `exchange_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
