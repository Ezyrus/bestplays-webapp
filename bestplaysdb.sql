-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 11:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestplaysdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `plays_id` int(10) NOT NULL,
  `video_url` text NOT NULL,
  `player_username` varchar(50) NOT NULL,
  `rank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`plays_id`, `video_url`, `player_username`, `rank`) VALUES
(1, 'video-629095575ff123.67876916.mp4', 'errorByCy', 'Platinum 01'),
(2, 'video-629096101096b7.00245902.mp4', 'paowie', 'Radiant'),
(3, 'video-6290969ad0d361.14273634.mp4', 'virayyy', 'Immortal');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(10) NOT NULL,
  `inGameName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `inGameName`, `username`, `password`) VALUES
(1, 'PublicEnemy#2525', 'errorByCy', 'cybycyby'),
(2, 'MugiwaraPaowie#Paolo', 'paowie', 'paopao'),
(3, 'Prayer4U#5480', 'virayyy', 'jviray');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`plays_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `plays_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
