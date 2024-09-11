-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 09:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `lfy_users`
--

CREATE TABLE `lfy_users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lfy_users`
--

INSERT INTO `lfy_users` (`userId`, `userName`, `password`) VALUES
(1, 'john_doe', 'password123'),
(2, 'jane_smith', 'pass1234'),
(3, 'mike_jones', 'mikepass'),
(4, 'emma_watson', 'emma456'),
(5, 'will_smith', 'will_pass'),
(6, 'julia_roberts', 'julia789'),
(7, 'tom_cruise', 'tom987'),
(8, 'kevin_durant', 'kdpass'),
(9, 'stephen_curry', 'curry123'),
(10, 'lebron_james', 'lebron789'),
(11, 'elon_musk', 'musk123'),
(12, 'bill_gates', 'billpass'),
(13, 'mark_zuckerberg', 'mark789'),
(14, 'sundar_pichai', 'google123'),
(15, 'tim_cook', 'applepass'),
(16, 'jeff_bezos', 'amazonpass'),
(17, 'warren_buffett', 'investor123'),
(18, 'larry_page', 'search456'),
(19, 'sergey_brin', 'search789'),
(20, 'jack_ma', 'alibaba123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lfy_users`
--
ALTER TABLE `lfy_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lfy_users`
--
ALTER TABLE `lfy_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
