-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 08:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixel6_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_category`
--

CREATE TABLE `animal_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_category`
--

INSERT INTO `animal_category` (`category_id`, `category_name`) VALUES
(1, 'Carnivores'),
(2, 'Omnivores'),
(3, 'Herbivores');

-- --------------------------------------------------------

--
-- Table structure for table `animal_info`
--

CREATE TABLE `animal_info` (
  `anial_id` int(11) NOT NULL,
  `animal_name` varchar(50) DEFAULT NULL,
  `animal_category` varchar(20) DEFAULT NULL,
  `animal_life_expectancy` varchar(20) NOT NULL,
  `animal_description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `animal_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `life_expectancy`
--

CREATE TABLE `life_expectancy` (
  `life_expectancy_id` int(11) NOT NULL,
  `life_expectancy_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `life_expectancy`
--

INSERT INTO `life_expectancy` (`life_expectancy_id`, `life_expectancy_value`) VALUES
(1, '0-1 Year'),
(2, '1-5 Year'),
(3, '5-10 Year'),
(4, '10+ Year');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counter`
--

CREATE TABLE `visitor_counter` (
  `counts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_counter`
--

INSERT INTO `visitor_counter` (`counts`) VALUES
(58);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_category`
--
ALTER TABLE `animal_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `animal_info`
--
ALTER TABLE `animal_info`
  ADD PRIMARY KEY (`anial_id`);

--
-- Indexes for table `life_expectancy`
--
ALTER TABLE `life_expectancy`
  ADD PRIMARY KEY (`life_expectancy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_category`
--
ALTER TABLE `animal_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animal_info`
--
ALTER TABLE `animal_info`
  MODIFY `anial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `life_expectancy`
--
ALTER TABLE `life_expectancy`
  MODIFY `life_expectancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
