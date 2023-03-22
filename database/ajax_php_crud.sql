-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 02:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `title`, `description`) VALUES
(1, 'adipisicing elit. Cumque necessitatibus asperiores ', 'eos iste odio, dicta, corporis nulla quaerat optio \naliquam facere delectus ipsa provident? Officia, \nuos laborum! Repudiandae perspiciatis, voluptate \nassumenda beatae perferendis nostrum nulla! Ab, \nconsequuntur soluta non beatae aspernatur ad doloremque \ndoloribus neque illum odit nobis praesentium totam\nalias vero perferendis corrupti libero quam animi '),
(2, 'eos iste odio, dicta, corporis nulla quaerat optio ', 'eos iste odio, dicta, corporis nulla quaerat optio \naliquam facere delectus ipsa provident? Officia, \nuos laborum! Repudiandae perspiciatis, voluptate \nassumenda beatae perferendis nostrum nulla! Ab, \nconsequuntur soluta non beatae aspernatur ad doloremque \ndoloribus neque illum odit nobis praesentium totam\nalias vero perferendis corrupti libero quam animi '),
(3, 'eos iste odio, dicta hhhhhhhhhhhhh', '                                eos iste odio, dicta, corporis nulla quaerat optio \naliquam facere delectus ipsa provident? Officia, \nuos laborum! Repudiandae perspiciatis, voluptate \nassumenda beatae perferendis nostrum nulla! Ab, \nconsequuntur soluta non beatae aspernatur ad doloremque \ndoloribus neque illum odit nobis praesentium totam\nalias vero perferendis corrupti libero quam animi                                 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
