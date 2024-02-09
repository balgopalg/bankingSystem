-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 11:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `code`) VALUES
(1, 'BHADRAK COLLEGE', 'BDK001'),
(2, 'KUANSH', 'BDK002');

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `id` int(11) NOT NULL,
  `accno` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`id`, `accno`, `description`, `credit`, `debit`, `balance`) VALUES
(1, 450712, 'transfer', 0, 899, 602),
(2, 685499, 'transfer', 0, 899, 0),
(3, 450712, 'transfer', 0, 1000, -398),
(4, 685499, 'transfer', 0, 1000, 0),
(5, 685499, 'transfer', 0, 2000, 399),
(6, 450712, 'transfer', 2000, 0, 0),
(7, 450712, 'transfer', 0, 602, 1000),
(8, 685499, 'transfer', 602, 0, 0),
(9, 450712, 'transfer', 0, 300, 700),
(10, 685499, 'transfer', 300, 0, 0),
(11, 450712, 'transfer', 0, 100, 600),
(12, 685499, 'transfer', 100, 0, 0),
(13, 450712, 'transfer', 0, 100, 500),
(14, 685499, 'transfer', 100, 0, 0),
(15, 685499, 'transfer', 0, 501, 1000),
(16, 450712, 'transfer', 501, 0, 0),
(17, 450712, 'transfer', 0, 1, 1000),
(18, 450712, 'transfer', 1, 0, 1001),
(19, 450712, 'transfer', 0, 500, 501),
(20, 685499, 'transfer', 500, 0, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--
-- Error reading structure for table bank.contactus: #1932 - Table &#039;bank.contactus&#039; doesn&#039;t exist in engine
-- Error reading data for table bank.contactus: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `bank`.`contactus`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `feedback` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `subject`, `feedback`) VALUES
(3, 'balgopal', 'banking need', 'gasdwerdad');

-- --------------------------------------------------------

--
-- Table structure for table `loanapp`
--

CREATE TABLE `loanapp` (
  `id` int(11) NOT NULL,
  `accno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `reason` varchar(2000) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'INPROCESS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loanapp`
--

INSERT INTO `loanapp` (`id`, `accno`, `name`, `amount`, `reason`, `status`) VALUES
(3, 450712, 'balgopal', 2000, 'study', 'Senctioned'),
(4, 685499, 'gayatri', 5000, 'gift', 'Senctioned'),
(5, 685499, 'gayatri', 5000, 'study', 'Senctioned'),
(6, 450712, 'balgopal', 5000, 'study', 'Senctioned'),
(7, 450712, 'balgopal', 5000, 'study', 'Senctioned'),
(8, 450712, 'balgopal', 5000, 'gift', 'Senctioned'),
(9, 450712, 'balgopal', 2000, 'gift', 'Senctioned'),
(10, 450712, 'balgopal', 500, '', 'Senctioned'),
(11, 450712, 'balgopal', 1000, '', 'Senctioned');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `accno` bigint(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `notice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `uname`, `accno`, `action`, `notice`) VALUES
(7, 'balgopal', 450712, 'debit', 'Your account is debited with 1 rupees'),
(8, 'balgopal', 450712, 'credit', 'Your account is credited with 1 rupees'),
(9, 'balgopal', 450712, 'debit', 'Your account is debited with 500 rupees'),
(10, 'gayatri', 685499, 'credit', 'Your account is credited with 500 rupees'),
(11, 'balgopal', 450712, 'loanSenction', 'your 2000 rupees loan is senctioned'),
(12, 'balgopal', 450712, 'loanSenction', 'your 1000 rupees loan is senctioned');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `sname`, `password`, `branch`, `role`) VALUES
(1, 'balgopalg', 'bal', '1', 'manager'),
(3, 'balaji', 'bal', '2', 'cashier'),
(5, 'kanha', 'kanha', '2', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `sendacc` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `recvacc` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender`, `sendacc`, `amount`, `receiver`, `recvacc`, `date`) VALUES
(2, 'gayatri', 685499, 501, 'balgopal', 450712, '2024-02-07'),
(3, 'balgopal', 450712, 899, 'gayatri', 685499, '2024-02-07'),
(4, 'balgopal', 450712, 1000, 'gayatri', 685499, '2024-02-07'),
(5, 'gayatri', 685499, 2000, 'balgopal', 450712, '2024-02-07'),
(6, 'balgopal', 450712, 602, 'gayatri', 685499, '2024-02-07'),
(7, 'balgopal', 450712, 300, 'gayatri', 685499, '2024-02-07'),
(8, 'balgopal', 450712, 100, 'gayatri', 685499, '2024-02-07'),
(9, 'balgopal', 450712, 100, 'gayatri', 685499, '2024-02-07'),
(10, 'gayatri', 685499, 501, 'bal', 450712, '2024-02-08'),
(11, 'balgopal', 450712, 1, 'balgopal', 450712, '2024-02-08'),
(12, 'balgopal', 450712, 500, 'gayatri', 685499, '2024-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `aadhaarno` bigint(11) NOT NULL,
  `panno` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobno` bigint(20) NOT NULL,
  `crn` bigint(20) NOT NULL,
  `accountno` bigint(20) NOT NULL,
  `balance` bigint(20) NOT NULL DEFAULT 0,
  `loanamt` int(11) NOT NULL,
  `loandue` int(11) NOT NULL,
  `acctype` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `source` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`uname`, `password`, `aadhaarno`, `panno`, `name`, `email`, `mobno`, `crn`, `accountno`, `balance`, `loanamt`, `loandue`, `acctype`, `city`, `address`, `source`, `branch`, `date`, `status`) VALUES
('balgopal', 'bal', 780049458511, 'DRCPG3431D', 'G. Bal Gopal', 'iambalgopal@gmail.com', 8260429141, 46173, 450712, 501, 3000, 2500, 'savings', 'Bhadrak', 'Kuansh, Bhadrak', 'student', '2', '2024-02-07', 'ACTIVE'),
('gayatri', 'gayatri', 780049458511, 'ABCD3235D', 'Gayatri Jena', 'gayatri@gmail.com', 8260429151, 10895, 685499, 1500, 5000, 5000, 'savings', 'bhadrak', 'bhadrak', 'student', '2', '2024-02-07', 'ACTIVE'),
('sai', 'sai', 702385887283, '2dkaiu283', 'sai', 'sai@gmail.com', 8260429141, 69696, 630746, 2, 0, 0, 'current', 'bhadrak', 'bhadrak', 'student', '1', '2024-02-07', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanapp`
--
ALTER TABLE `loanapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loanapp`
--
ALTER TABLE `loanapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
