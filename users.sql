-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 09:06 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `excel_file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `excel_file`) VALUES
('Gaurav', 'Kumar', 'admin@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '[{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"MY DATA\",\"B\":\"\",\"C\":\"\"}]'),
('Gaurav', 'Kumar', 'gaurav@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '[{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Status\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"Status\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Status\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"Status\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Status\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"Status\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Status\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"Status\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"NEW\",\"B\":\"Hello 2\",\"C\":\"Hello 3\"},{\"A\":\"Test 1\",\"B\":\"Test 2\",\"C\":\"OLD\"},{\"A\":\"MY DATA\",\"B\":\"\",\"C\":\"\"}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
