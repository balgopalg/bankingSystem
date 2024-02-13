-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 02:23 PM
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
(0, 'Not Assigned', ''),
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
  `balance` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`id`, `accno`, `description`, `credit`, `debit`, `balance`, `date`) VALUES
(1, 450712, 'deposite', 10000, 0, 22501, '2024-02-12 20:33:23'),
(2, 450712, 'transfer', 0, 10000, 12501, '2024-02-12 20:33:23'),
(3, 822605, 'transfer', 10000, 0, 10000, '2024-02-12 20:33:23'),
(5, 450712, 'deposit', 2000, 0, 14501, '2024-02-12 20:33:23'),
(6, 822605, 'transfer', 0, 2000, 8000, '2024-02-12 20:33:23'),
(7, 450712, 'transfer', 2000, 0, 16501, '2024-02-12 20:33:23'),
(8, 822605, 'transfer', 0, 2000, 6000, '2024-02-12 20:33:23'),
(9, 450712, 'transfer', 2000, 0, 18501, '2024-02-12 20:33:23'),
(10, 287178, 'deposit', 30000, 0, 30000, '2024-02-12 20:33:23'),
(11, 287178, 'transfer', 0, 20000, 10000, '2024-02-12 20:33:23'),
(12, 450712, 'transfer', 20000, 0, 38501, '2024-02-12 20:33:23'),
(13, 450712, 'transfer', 0, 10000, 28501, '2024-02-12 20:34:14'),
(14, 287178, 'transfer', 10000, 0, 20000, '2024-02-12 20:34:14'),
(15, 822605, 'transfer', 0, 3000, 3000, '2024-02-12 22:30:47'),
(16, 450712, 'transfer', 3000, 0, 31501, '2024-02-12 22:30:47'),
(17, 822605, 'transfer', 0, 1000, 2000, '2024-02-12 22:37:49'),
(18, 450712, 'transfer', 1000, 0, 32501, '2024-02-12 22:37:49'),
(19, 822605, 'transfer', 0, 500, 1500, '2024-02-12 22:38:24'),
(20, 450712, 'transfer', 500, 0, 33001, '2024-02-12 22:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobno` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `mobno`, `subject`, `message`) VALUES
(6, 'sai', 'sai@gmail.com', 7750854699, 'inactive account', ' hi sir my account flaged as inactive please remove flag . so i can access my dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `branchId` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `feedback` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(23, 450712, 'balgopal', 2000, '', 'Senctioned'),
(24, 450712, 'balgopal', 10000, '', 'Senctioned'),
(25, 287178, 'balgopalg', 3000, '', 'Senctioned'),
(26, 287178, 'balgopalg', 30000, '', 'Senctioned');

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
(1, 'balgopal', 450712, 'deposite', '10000 is deposited in your account new balance is : 22501'),
(2, 'balgopal', 450712, 'debit', 'Your account is debited with 10000 rupees'),
(3, 'gayatri', 822605, 'credit', 'Your account is credited with 10000 rupees'),
(4, 'gayatri', 822605, 'loanSenction', 'your 20000 rupees loan is senctioned'),
(5, 'balgopal', 450712, 'loanSenction', 'your 10000 rupees loan is senctioned'),
(6, 'gayatri', 822605, 'loanSenction', 'your 10000 rupees loan is rejected by manager'),
(7, 'balgopal', 450712, 'deposit', '2000 is deposited in your account new balance is : 14501'),
(8, '', 822605, '', 'you are not eligible'),
(9, 'gayatri', 822605, 'debit', 'Your account is debited with 2000 rupees'),
(10, 'balgopal', 450712, 'credit', 'Your account is credited with 2000 rupees'),
(11, 'balgopal', 450712, 'loanSenction', 'your 3000 rupees loan is senctioned'),
(12, 'balgopal', 450712, 'loanSenction', 'your 2000 rupees loan is rejected by manager'),
(13, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(14, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(15, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(16, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(17, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(18, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(19, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(20, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(21, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(22, 'balgopal', 450712, 'loanSenction', 'your 0 rupees loan is rejected by manager'),
(23, 'balgopal', 450712, 'loanSenction', 'your 0 rupees loan is rejected by manager'),
(24, 'balgopal', 450712, 'loanSenction', 'your 0 rupees loan is rejected by manager'),
(25, 'balgopal', 450712, 'loanSenction', 'your 2333 rupees loan is rejected by manager'),
(26, 'balgopal', 450712, 'loanSenction', 'your 2000 rupees loan is senctioned'),
(27, 'balgopal', 450712, 'loanSenction', 'your 2222 rupees loan is rejected by manager'),
(28, 'balgopal', 450712, 'loanSenction', 'your 2000 rupees loan is senctioned'),
(29, 'balgopal', 450712, 'loanSenction', 'your 2000 rupees loan is senctioned'),
(30, 'balgopal', 450712, 'loanSenction', 'your 10000 rupees loan is senctioned'),
(31, 'gayatri', 822605, 'debit', 'Your account is debited with 2000 rupees'),
(32, 'balgopal', 450712, 'credit', 'Your account is credited with 2000 rupees'),
(33, 'balgopalg', 287178, 'loanSenction', 'your 3000 rupees loan is senctioned'),
(34, 'balgopalg', 287178, 'deposit', '30000 is deposited in your account new balance is : 30000'),
(35, 'balgopalg', 287178, 'debit', 'Your account is debited with 20000 rupees'),
(36, 'balgopal', 450712, 'credit', 'Your account is credited with 20000 rupees'),
(37, 'balgopalg', 287178, 'loanSenction', 'your 30000 rupees loan is senctioned'),
(38, 'balgopal', 450712, 'debit', 'Your account is debited with 10000 rupees'),
(39, 'balgopalg', 287178, 'credit', 'Your account is credited with 10000 rupees'),
(40, 'gayatri', 822605, 'debit', 'Your account is debited with 3000 rupees'),
(41, 'balgopal', 450712, 'credit', 'Your account is credited with 3000 rupees'),
(42, 'gayatri', 822605, 'debit', 'Your account is debited with 1000 rupees'),
(43, 'balgopalg', 450712, 'credit', 'Your account is credited with 1000 rupees'),
(44, 'gayatri', 822605, 'debit', 'Your account is debited with 500 rupees'),
(45, 'balgopal', 450712, 'credit', 'Your account is credited with 500 rupees');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `sname`, `password`, `branch`, `role`, `balance`) VALUES
(1, 'balgopalg', 'bal', '1', 'manager', 0),
(12, 'gayatri', 'gayatri', '2', 'manager', 15000),
(13, 'bibek', 'bibek', '2', 'employee', 6000),
(16, 'kanha', 'kanha', '1', 'employee', 11000);

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
(1, 'balgopal', 450712, 10000, 'gayatri', 822605, '2024-02-10'),
(2, 'gayatri', 822605, 2000, 'balgopal', 450712, '2024-02-11'),
(3, 'gayatri', 822605, 2000, 'balgopal', 450712, '2024-02-12'),
(4, 'balgopalg', 287178, 20000, 'balgopal', 450712, '2024-02-12'),
(5, 'balgopal', 450712, 10000, 'balgopalg', 287178, '2024-02-12'),
(6, 'gayatri', 822605, 3000, 'balgopal', 450712, '2024-02-12'),
(7, 'gayatri', 822605, 1000, 'balgopalg', 450712, '2024-02-12'),
(8, 'gayatri', 822605, 500, 'balgopal', 450712, '2024-02-12');

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
  `branch` bigint(50) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`uname`, `password`, `aadhaarno`, `panno`, `name`, `email`, `mobno`, `crn`, `accountno`, `balance`, `loanamt`, `loandue`, `acctype`, `city`, `address`, `source`, `branch`, `date`, `status`) VALUES
('balgopal', 'bal', 780049458511, 'DRCPG3431D', 'G. Bal Gopal', 'iambalgopal@gmail.com', 8260429141, 46173, 450712, 33001, 0, 0, 'savings', 'Bhadrak', 'Kuansh, Bhadrak', 'student', 2, '2024-02-07', 'ACTIVE'),
('balgopalg', 'balgopal', 780049458511, 'DRCPG3431D', 'G. Bal Gopal', 'guruvellibalgopal@gmail.com', 8260429141, 98251, 287178, 20000, 0, 0, 'savings', 'Bhadrak', 'Bhadrak', 'Student', 1, '2024-02-12', 'ACTIVE'),
('gayatri', 'gaya', 699149804311, 'AQDJ7348AG', 'gayatri jena', 'gayatri@gmail.com', 7008857619, 46384, 822605, 1500, 0, 0, 'savings', 'bhadrak', 'near zilla high school , bankasahi , bhadrak', 'student', 1, '2024-02-10', 'ACTIVE'),
('sai', 'sai', 728018457012, 'PDHDN374OA', 'Guruvelli Shanmukh Rao', 'sai@gmail.com', 7750854699, 54273, 352949, 0, 0, 0, 'savings', 'Bhadrak', 'Kuansh, Bhadrak ', 'Student', 2, '2024-02-10', 'ACTIVE'),
('sai1', 'sai1', 780049458511, 'DKHSI582D', 'shanmukh rao', 'sa@gmail.com', 7750854699, 45372, 982438, 0, 0, 0, 'savings', 'asdigiah', 'AP', 'Student', 1, '2024-02-12', 'ACTIVE');

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
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
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
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loanapp`
--
ALTER TABLE `loanapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
