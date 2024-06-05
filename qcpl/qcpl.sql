-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 07:29 AM
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
-- Database: `qcpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'Guillermo Mercado', 'Administrative Services', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `boss1`
--

CREATE TABLE `boss1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boss1`
--

INSERT INTO `boss1` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'Guillermo Mercado', 'Administrative Services', 'boss1', 'boss1');

-- --------------------------------------------------------

--
-- Table structure for table `boss2`
--

CREATE TABLE `boss2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boss2`
--

INSERT INTO `boss2` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'boss2', 'boss2', 'boss2', 'boss2');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `division` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `category` enum('Incoming','Outgoing','','') DEFAULT NULL,
  `locator_num` varchar(255) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `received_from` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `boss2_comment` varchar(255) NOT NULL,
  `boss1_comment` varchar(255) NOT NULL,
  `status` enum('Pending','Processing','Completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `file_name`, `division`, `section`, `category`, `locator_num`, `received_date`, `received_from`, `subject`, `description`, `type`, `file_path`, `boss2_comment`, `boss1_comment`, `status`) VALUES
(101, 'Theory of Programming.pdf', 'Readers Service Division', 'Periodical Section', 'Incoming', '1', '2024-05-25', 'QCPL', 'QCPL', 'QCPL', 'PDF', 'File_Uploaded/Theory of Programming.pdf', 'done', 'locate', 'Completed'),
(102, 'Programmig.pdf', 'Administrative Services', 'No Section', 'Outgoing', '5', '2024-05-25', 'QCPL', 'QCPL', 'QCPL', 'PDF', 'File_Uploaded/Programmig.pdf', 'jkjhjkj', 'done', 'Completed'),
(103, 'Backtrack Programming.pdf', 'Administrative Services', 'No Section', 'Incoming', '2', '2024-05-25', 'QCPL', 'QCPL', 'QCPL', 'PDF', 'File_Uploaded/Backtrack Programming.pdf', 'done', ' Done', 'Completed'),
(104, 'PARADIGM OF PROGRAMMING.pdf', NULL, NULL, 'Incoming', '3', '2024-05-25', 'QCPL', 'QCPL', 'QCPL', 'PDF', 'File_Uploaded/PARADIGM OF PROGRAMMING.pdf', 'oks', '', 'Processing'),
(105, 'ProgLang.pdf', NULL, NULL, 'Incoming', '4', '2024-05-25', 'QCPL', 'QCPL', 'QCPL', 'PDF', 'File_Uploaded/ProgLang.pdf', '', '', 'Pending'),
(106, 'TASK OJT.txt', 'Technical Division', 'Binding and Preservation Section', 'Incoming', '0', '2024-05-25', 'ok', 'ok', 'ok', 'DOCS', 'File_Uploaded/TASK OJT.txt', 'oks', 'gjlkklgdsklckzlx', 'Completed'),
(107, '441387242_7605432596213440_6127717901911252576_n.jpg', NULL, NULL, 'Incoming', '12345', '2024-05-31', 'QCPL', 'QCPL', 'QCPL', 'DOCS', 'File_Uploaded/441387242_7605432596213440_6127717901911252576_n.jpg', '', '', 'Pending'),
(108, 'receiving.php', NULL, NULL, NULL, '888', '2024-05-31', 'QCPL', 'QCPL', 'QCPL', 'PDF', 'File_Uploaded/receiving.php', '', '', 'Pending'),
(109, 'uploadincoming.php', NULL, NULL, 'Incoming', '136362070066', '2024-05-31', 'QCPL', 'QCPL', 'QCPL', 'PDF', 'File_Uploaded/uploadincoming.php', '', '', 'Pending'),
(110, '441387242_7605432596213440_6127717901911252576_n.jpg', NULL, NULL, 'Outgoing', '90909', '2024-05-31', 'oks', 'okso', 'oks', 'PDF', 'File_Uploaded/441387242_7605432596213440_6127717901911252576_n.jpg', '', '', 'Pending'),
(111, '441387242_7605432596213440_6127717901911252576_n.jpg', NULL, NULL, 'Incoming', '111', '2024-05-31', 'EQRQ', 'REWRQ', 'EWRQ', 'DOCS', 'File_Uploaded/441387242_7605432596213440_6127717901911252576_n.jpg', '', '', 'Pending'),
(112, 'QCPL.jpg', NULL, NULL, 'Incoming', '1', '2024-06-01', '00', '00', '00', 'IMG', 'File_Uploaded/QCPL.jpg', '', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `receiving`
--

CREATE TABLE `receiving` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiving`
--

INSERT INTO `receiving` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'Guillermo Mercado', 'try', 'receive', 'receive');

-- --------------------------------------------------------

--
-- Table structure for table `testupload`
--

CREATE TABLE `testupload` (
  `ID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testupload`
--

INSERT INTO `testupload` (`ID`, `filename`, `filepath`) VALUES
(25, 'PDF 2.docx', 0x433a2f78616d70702f6874646f63732f7163706c2f4261636b656e642f46696c655f55706c6f616465642f50444620322e646f6378),
(26, 'PDF 2.pdf', 0x433a2f78616d70702f6874646f63732f7163706c2f4261636b656e642f46696c655f55706c6f616465642f50444620322e706466);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `division`, `username`, `password`) VALUES
(1, 'user', 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boss1`
--
ALTER TABLE `boss1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boss2`
--
ALTER TABLE `boss2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiving`
--
ALTER TABLE `receiving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testupload`
--
ALTER TABLE `testupload`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `boss1`
--
ALTER TABLE `boss1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `boss2`
--
ALTER TABLE `boss2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `receiving`
--
ALTER TABLE `receiving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testupload`
--
ALTER TABLE `testupload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
