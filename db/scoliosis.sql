-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 03:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scoliosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `other_interest` varchar(255) NOT NULL,
  `submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `firstname`, `lastname`, `email`, `sex`, `interest`, `other_interest`, `submit_date`) VALUES
(1, 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'Male', 'per', '', '0000-00-00'),
(2, 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'Male', 'cur', '', '2023-01-19'),
(3, 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'Male', 'proj', '', '2023-01-19'),
(4, 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'Male', 'other', 'college', '2023-01-19'),
(5, 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'Male', 'other', 'college', '2023-01-19'),
(6, 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'Male', 'cur', '', '2023-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `license_accepted` int(10) NOT NULL,
  `verified` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password_hash`, `firstname`, `lastname`, `birthday`, `sex`, `phonenumber`, `license_accepted`, `verified`) VALUES
(1, '190ibrahimahmed@gmail.com', '$2y$10$cpq1fcYzXF5zVs86lNIjLuV79pXbdZUcic7kJE0xRXmUyCzpbWvYm', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '2023-01-13', 'Male', '+36306524294', 1, 1),
(2, 'ibrahimahmed@gmail.com', '$2y$10$bKm3Ucg.tei8u7E8TbxSZ./sM.bze5J4AGRj6/3Aj1XUqiPVegS0m', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '2023-01-13', 'Male', '+36306524294', 1, 1),
(4, 'dita@gmail.com', '$2y$10$q04/3MhyT/QsTYj2TOUcSeB/MuGj4./ro0bCD8G6bXk6o59ZMcWLu', 'Dumbo', 'Dita', '2023-01-05', 'Male', '+36306524294', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
